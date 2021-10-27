<?php

namespace App\Http\Controllers;

use App\Bibliografia;
use App\FichaTecnica;
use App\NombreEjemplar;
use App\Notifications\VerificacionNotification;
use App\User;
use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use PDF;
use Image;

class FichaTecnicaController extends Controller
{
    public $SubUnidades;
    public $SubUnidadTP;
    public $urlFoto;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        Controller::loadEjemplares();
        Controller::loadSubUnidades();
        //**Regresar nombre de ejemplares que no tengan ficha tecnica */

        return view('FichasTecnicas.index')->with("Ejemplar", $this->Ejemplar->where('ficha_tecnicas_id', '==', null))
            ->with("SubUnidades", $this->SubUnidades)
            ->with("SubUnidadTP", $this->SubUnidadTP)
            ->with("isReO", false);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $nombreEjemplar = NombreEjemplar::findorFail($request->NombreC);
        $directoryEspecie = '/FichasTecnicas/' . Str::of($nombreEjemplar->NombreComun)->replace(' ', '_');
        $Ficha_Tecnica = new FichaTecnica();
        
        $this->saveImagenes($request, $Ficha_Tecnica, $nombreEjemplar, $directoryEspecie, false);
        
        $Ficha_Tecnica->FechaRecoleccion = $request->FechaRecoleccion;
        $Ficha_Tecnica->FechaFotografia = $request->FechaFotografia;
        $Ficha_Tecnica->NombreRecolectorDatos = $request->NombreRecolectorD;
        $Ficha_Tecnica->NombreRecolectorMuestra = $request->NombreRecolectorm;
        $Ficha_Tecnica->NombreAutorFoto = $request->NombreAutorFoto;

        $Ficha_Tecnica->TPertenencia = $request->PermanenciaHojas;
        $Ficha_Tecnica->Fcrecimiento = $request->FormaCrecimiento;
        $Ficha_Tecnica->Origen = $request->Origen;
        $Ficha_Tecnica->Floracion = $request->Floracion;
        $Ficha_Tecnica->Descripcion = $request->Descripcion;
        $Ficha_Tecnica->EstatusEco = $request->EstatusEco;
        $Ficha_Tecnica->EstatusConv = $request->EstatusConser;
        $Ficha_Tecnica->Altura = $request->Altura;
        $Ficha_Tecnica->AlturaCondicionesUrbanos = $request->AlturaCurbanas;
        $Ficha_Tecnica->TipoC = $request->TipoC;
        $Ficha_Tecnica->TipoR = $request->TipoR;
        $Ficha_Tecnica->RaicesObs = $request->RaicesObs;
        $Ficha_Tecnica->Usos = $request->Usos;
        $Ficha_Tecnica->Clima = $request->ClimaN;
        $Ficha_Tecnica->Porte = $request->Porte;
        // $Ficha_Tecnica->SistemR = $request->SistemaRa;
        $Ficha_Tecnica->RequerimientosE = $request->Requerimientos;
        $Ficha_Tecnica->ServiciosAmb = $request->ServicioAmbiental;
        $Ficha_Tecnica->AmenazasRiesgos = $request->AmenazasR;
        $inter = array(
            'Cableado' => $request->CBCableado,
            'Infra' => $request->CBInfra,
            'Mobili' => $request->CBMobili,
            'Sena' => $request->CBSena,
            'Edifi' => $request->CBEdifi,
        );

        $Ficha_Tecnica->Interfencia = json_encode($inter);

        $Ficha_Tecnica->Estado = "Verificacion";
        $Ficha_Tecnica->user_id = Auth::id();
        $nombreEjemplar->FichaTecnica()->save($Ficha_Tecnica);

        $nombreEjemplar->ficha_tecnicas_id = $Ficha_Tecnica->id;

        if ($request->Bibliografia != null) {
            foreach ($request->Bibliografia as $key => $value) {
                $Biblio = new Bibliografia();
                $Biblio->Referencia = $value;
                $Biblio->ficha_tecnicas_id = $Ficha_Tecnica->id;
                $Biblio->save();
            }
        }

        $nombreEjemplar->save();
        Log::info("El usuario con id " . Auth::id() . " registro una nueva ficha tecnica con id " . $Ficha_Tecnica->id);
        return back()->with('message', '¡¡¡Ficha Tecnica registrada con exito!!!');
    }
  
    private function saveImagen(String $directoryEspecie, $image, String $ClaveF, String $Tipo, $nombreEjemplar)
    {
        $this->urlFoto = $directoryEspecie . '/' . $nombreEjemplar->Clave . '_' . $ClaveF . '.' . $image->getClientOriginalExtension();
      
        if (file_exists(public_path() . '\storage' . $this->urlFoto)) {
            @unlink(public_path() . '\storage' . $this->urlFoto);
            \Storage::disk('public')->put($this->urlFoto, \File::get($image));
        } else {
            \Storage::disk('public')->put($this->urlFoto, \File::get($image));
          
        }

    }

    private function createImagesQuality(int $quality, String $directoryEspecie,NombreEjemplar $nombreEjemplar,String $Clave,String $urlFoto){
        $URL = $directoryEspecie . '/50/' . $nombreEjemplar->Clave . '_' .$Clave. '_'.$quality.'.jpg';
        $image=Image::make(public_path('storage'.$urlFoto));
        if (!\File::exists(public_path('storage'.$directoryEspecie . '/50'))){
            \File::makeDirectory(public_path('storage'.$directoryEspecie . '/50'));
        }
        $image->save(public_path('storage').$URL, 50);

    }
    private function saveImagenes(Request $request, FichaTecnica $Ficha_Tecnica, NombreEjemplar $nombreEjemplar, String $directoryEspecie)
    {
        // dd($directoryEspecie);
        foreach ($request->file() as $image) {
            if ($request->fileImg0 == $image) {
                $this->saveImagen($directoryEspecie, $image, 'PC', "Planta Completa", $nombreEjemplar,$this->urlFoto);
              
                $Ficha_Tecnica->Url_PC = $this->urlFoto;
                $this->createImagesQuality(50,$directoryEspecie,$nombreEjemplar,"PC",  $this->urlFoto);

            } else
            if ($request->fileImg1 == $image) {
                $this->saveImagen($directoryEspecie, $image, 'F', "Follaje", $nombreEjemplar);
                $Ficha_Tecnica->Url_F = $this->urlFoto;
                $this->createImagesQuality(50,$directoryEspecie,$nombreEjemplar,"F",  $this->urlFoto);
            } else
            if ($request->fileImg2 == $image) {
                $this->saveImagen($directoryEspecie, $image, 'H', "Hojas", $nombreEjemplar);
                $Ficha_Tecnica->Url_H = $this->urlFoto;
                $this->createImagesQuality(50,$directoryEspecie,$nombreEjemplar,"H",  $this->urlFoto);
            } else
            if ($request->fileImg3 == $image) {
                $this->saveImagen($directoryEspecie, $image, 'FL', "Flores", $nombreEjemplar);
                $Ficha_Tecnica->Url_FL = $this->urlFoto;
                $this->createImagesQuality(50,$directoryEspecie,$nombreEjemplar,"FL", $this->urlFoto);
            } else
            if ($request->fileImg4 == $image) {
                $this->saveImagen($directoryEspecie, $image, 'FR', "Frutos", $nombreEjemplar);
                $Ficha_Tecnica->Url_FR = $this->urlFoto;
                $this->createImagesQuality(50,$directoryEspecie,$nombreEjemplar,"FR", $this->urlFoto);
            } else
            if ($request->fileImg5 == $image) {
                $this->saveImagen($directoryEspecie, $image, 'S', "Semillas", $nombreEjemplar);
                
                $Ficha_Tecnica->Url_S = $this->urlFoto;
                $this->createImagesQuality(50,$directoryEspecie,$nombreEjemplar,"S",  $this->urlFoto);
            } else
            if ($request->fileImg6 == $image) {
                $this->saveImagen($directoryEspecie, $image, 'T', "Tronco", $nombreEjemplar);

                $Ficha_Tecnica->Url_T = $this->urlFoto;
                $this->createImagesQuality(50,$directoryEspecie,$nombreEjemplar,"T",  $this->urlFoto);
            } else
            if ($request->fileImg7 == $image) {
                $this->saveImagen($directoryEspecie, $image, 'R', "Raíces", $nombreEjemplar);
                $Ficha_Tecnica->Url_R = $this->urlFoto;
                $this->createImagesQuality(50,$directoryEspecie,$nombreEjemplar,"R",  $this->urlFoto);
            }
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\FichaTecnica  $fichaTecnica
     * @return \Illuminate\Http\Response
     */
    public function show(FichaTecnica $fichaTecnica, $id, Request $request)
    {
        $request->user()->authorizeRoles(['administrador', 'Gestor', 'Coordinador']);
        $fichaTecnica = FichaTecnica::findorFail($id);
        if (Auth::user()->hasRole('Gestor')) {
            if ($fichaTecnica->User->id == Auth::id()) {
                Controller::loadEjemplares();
                Controller::loadSubUnidades();
                $Biblio = Bibliografia::where('ficha_tecnicas_id', '=', $id)->get();
                return \view('FichasTecnicas.index')
                    ->with("Ejemplar", $this->Ejemplar)
                    ->with("SubUnidades", $this->SubUnidades)
                    ->with("SubUnidadTP", $this->SubUnidadTP)
                    ->with("isReO", true)
                    ->with("FichaTecnica", $fichaTecnica)
                    ->with("Biblio", $Biblio);
            } else {
                return \redirect()->back();

            }
        } else {
            Controller::loadEjemplares();
            Controller::loadSubUnidades();

            $Biblio = Bibliografia::where('ficha_tecnicas_id', '=', $id)->get();

            return \view('FichasTecnicas.index')
                ->with("Ejemplar", $this->Ejemplar)
                ->with("SubUnidades", $this->SubUnidades)
                ->with("SubUnidadTP", $this->SubUnidadTP)
                ->with("isReO", false)
                ->with("FichaTecnica", $fichaTecnica)
                ->with("Biblio", $Biblio);
        }

    }
    public function showPublic(FichaTecnica $fichaTecnica, $id)
    {
        $fichaTecnica = FichaTecnica::findorFail($id);

        if ($fichaTecnica->Estado == "Verificado") {

            $Biblio = Bibliografia::where('ficha_tecnicas_id', '=', $id)->get();
            return \view('FichasTecnicas.indexPublic')->with("fichaTecnica", NombreEjemplar::findorFail($fichaTecnica->id))->with('Biblio', $Biblio);
        } else {
            if ($fichaTecnica->Estado == "Verificacion" && Auth::check() || $fichaTecnica->Estado == "Rechazada" && Auth::check()) {
                if (Auth::id() == $fichaTecnica->user_id || Auth::user()->hasAnyRole(['administrador', 'Coordinador'])) {
                    $Biblio = Bibliografia::where('ficha_tecnicas_id', '=', $id)->get();
                    return \view('FichasTecnicas.indexPublic')->with("fichaTecnica", NombreEjemplar::findorFail($fichaTecnica->id))->with('Biblio', $Biblio);
                }
            } else {
                return \redirect()->back();
            }

        }

    }
    public function Imprimir(FichaTecnica $fichaTecnica, $id)
    {

        $fichaTecnicaA = FichaTecnica::findorFail($id);
        $fichaTecnica = NombreEjemplar::findorFail($fichaTecnicaA->id);
        $Biblio = Bibliografia::where('ficha_tecnicas_id', '=', $id)->get();
        if ($fichaTecnicaA->Estado == "Verificado") {
            $data = compact('fichaTecnica', 'Biblio');
            $pdf = PDF::loadView('FichasTecnicas.pdf', $data)->setPaper([0, 0, 612.00, 792.00]);
            $pdf->getDomPDF()->set_option("enable_php", true);
            $pdfNombre = 'Ficha_Tecnica_' . $fichaTecnica->NombreComun . '.pdf';
            return $pdf->stream($pdfNombre);
        } else {

            if ($fichaTecnicaA->Estado == "Verificacion" && Auth::check() || $fichaTecnicaA->Estado == "Rechazada" && Auth::check()) {
                if (Auth::id() == $fichaTecnicaA->user_id || Auth::user()->hasAnyRole(['administrador', 'Coordinador'])) {
                    $data = compact('fichaTecnica', 'Biblio');

                    $pdf = PDF::loadView('FichasTecnicas.pdf', $data)->setPaper([0, 0, 612.00, 792.00]);
                    $pdf->getDomPDF()->set_option("enable_php", true);
                  
                    $pdfNombre = 'Ficha_Tecnica_' . $fichaTecnica->NombreComun . '.pdf';

                    return $pdf->stream($pdfNombre, $data);
                }
            } else {
                return \redirect()->back();
            }
        }

    }

    public function verificar(Request $request)
    {

        $request->user()->authorizeRoles(['administrador', 'Coordinador']);

        $FichaTecnica = FichaTecnica::findorFail($request->idFichaT);

        $FichaTecnica->Estado = "Verificado";
        $FichaTecnica->NomVerificador = Auth::user()->name;
        Log::info("El usuario con id " . Auth::id() . " Autorizo una nueva ficha tecnica con id " . $request->idFichaT);

        $FichaTecnica->save();
        $User = User::findorFail($FichaTecnica->user_id);
        $User->notify(new VerificacionNotification($FichaTecnica->id, "FichaTecnica", false));
        return back()->with('message', 'Se ha verificado la hoja de campo con exito');

    }
    public function rechazar(Request $request)
    {

        $request->user()->authorizeRoles(['administrador', 'Coordinador']);
        $FichaTecnica = FichaTecnica::findorFail($request->idFichaT);
        Log::info("El usuario con id " . Auth::id() . " Rechazo una nueva ficha tecnica con id " . $request->idFichaT);
        $FichaTecnica->Estado = "Rechazada";
        $FichaTecnica->NomVerificador = Auth::user()->name;
        $FichaTecnica->MotivoRechazo = $request->MRechazo;
        $FichaTecnica->save();
        $User = User::findorFail($FichaTecnica->user_id);
        $User->notify(new VerificacionNotification($FichaTecnica->id, "FichaTecnica", true));
        return back()->with('message', 'La hoja de campo ha sido RECHAZADA');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FichaTecnica  $fichaTecnica
     * @return \Illuminate\Http\Response
     */
    public function edit(FichaTecnica $fichaTecnica, Request $request, $id)
    {

        $request->user()->authorizeRoles(['administrador', 'Gestor']);
        $fichaTecnica = FichaTecnica::findorFail($id);

        if ($fichaTecnica->User->id == Auth::id()) {
            Controller::loadEjemplares();
            Controller::loadSubUnidades();
            $Biblio = Bibliografia::where('ficha_tecnicas_id', '=', $id)->get();
            return \view('FichasTecnicas.User.editar')
                ->with("Ejemplar", $this->Ejemplar)
                ->with("SubUnidades", $this->SubUnidades)
                ->with("SubUnidadTP", $this->SubUnidadTP)
                ->with("isReO", false)
                ->with("FichaTecnica", $fichaTecnica)
                ->with("Biblio", $Biblio);
        } else {
            return \redirect()->back();

        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FichaTecnica  $fichaTecnica
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FichaTecnica $fichaTecnica, $id)
    {

        $nombreEjemplar = NombreEjemplar::findorFail($request->id);
        $directoryEspecie = '/FichasTecnicas/' . Str::of($nombreEjemplar->NombreComun)->replace(' ', '_');
        $Ficha_Tecnica = FichaTecnica::findorFail($id);
        // dd($Ficha_Tecnica);

        if ($request->file() != []) {
            $this->saveImagenes($request, $Ficha_Tecnica, $nombreEjemplar, $directoryEspecie);
        }
        $Ficha_Tecnica->FechaRecoleccion = $request->FechaRecoleccion;
        $Ficha_Tecnica->FechaFotografia = $request->FechaFotografia;
        $Ficha_Tecnica->NombreRecolectorDatos = $request->NombreRecolectorD;
        $Ficha_Tecnica->NombreRecolectorMuestra = $request->NombreRecolectorm;
        $Ficha_Tecnica->NombreAutorFoto = $request->NombreAutorFoto;
        $Ficha_Tecnica->TPertenencia = $request->PermanenciaHojas;
        $Ficha_Tecnica->Fcrecimiento = $request->FormaCrecimiento;
        $Ficha_Tecnica->Origen = $request->Origen;
        $Ficha_Tecnica->Floracion = $request->Floracion;
        $Ficha_Tecnica->Descripcion = $request->Descripcion;
        $Ficha_Tecnica->EstatusEco = $request->EstatusEco;
        $Ficha_Tecnica->EstatusConv = $request->EstatusConser;
        $Ficha_Tecnica->Altura = $request->Altura;
        $Ficha_Tecnica->AlturaCondicionesUrbanos = $request->AlturaCurbanas;
        $Ficha_Tecnica->TipoC = $request->TipoC;
        $Ficha_Tecnica->TipoR = $request->TipoR;
        $Ficha_Tecnica->RaicesObs = $request->RaicesObs;
        $Ficha_Tecnica->Usos = $request->Usos;
        $Ficha_Tecnica->Clima = $request->ClimaN;
        $Ficha_Tecnica->Porte = $request->Porte;
        //$Ficha_Tecnica->SistemR = $request->SistemaRa;
        $Ficha_Tecnica->RequerimientosE = $request->Requerimientos;
        $Ficha_Tecnica->ServiciosAmb = $request->ServicioAmbiental;
        $Ficha_Tecnica->AmenazasRiesgos = $request->AmenazasR;
        //$Ficha_Tecnica->AmenazasRiesgosHab = $request->AmenazasRC;
        $Ficha_Tecnica->Estado = "Verificacion";
        $Ficha_Tecnica->user_id = Auth::id();
        $Ficha_Tecnica->MotivoRechazo = null;
        $Ficha_Tecnica->save();
        $nombreEjemplar->FichaTecnica()->save($Ficha_Tecnica);

        $nombreEjemplar->ficha_tecnicas_id = $Ficha_Tecnica->id;

        $nombreEjemplar->save();
        return back()->with('message', '¡¡¡Ficha Tecnica editada con exito!!!');

    }

    public function showAllFichasT(Request $request)
    {
        $request->user()->authorizeRoles(['administrador', 'Coordinador']);
        $FichasTecnicas = DB::table('nombre_ejemplars')
            ->join('ficha_tecnicas', function ($join) {
                $join->on('nombre_ejemplars.ficha_tecnicas_id', '=', 'ficha_tecnicas.id')
                    ->orderBy('NombreComun', 'asc');
            })->paginate(15);
        return view('FichasTecnicas.User.index')->with('FichasTecnicas', $FichasTecnicas);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FichaTecnica  $fichaTecnica
     * @return \Illuminate\Http\Response
     */
    public function destroy(FichaTecnica $fichaTecnica)
    {
        //
    }
}
