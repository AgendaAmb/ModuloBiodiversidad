<?php

namespace App\Http\Controllers;

use App\FichaTecnica;
use App\NombreEjemplar;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Str;
use App\FotoPlanta;

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
        //**Regresar nombre de ejemplares que no tengan hoja de campo */

        return view('FichasTecnicas.index')->with("Ejemplar", $this->Ejemplar->where('ficha_tecnicas_id', '==', null))
            ->with("SubUnidades", $this->SubUnidades)
            ->with("SubUnidadTP", $this->SubUnidadTP);
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

       // dd($request);
        $nombreEjemplar = NombreEjemplar::findorFail($request->NombreC);
        $directoryEspecie = '/FichasTecnicas/' . Str::of($nombreEjemplar->NombreComun)->replace(' ', '_');
        //$directoryEspecie = $directoryEspecie . '/' . $nombreEjemplar->Clave . '_' . $fotoIniciales;
        // $NF = $this->Nom->Clave;
        // $No_Ejemplar = count(Planta::where('nombre_ejem_id', '='->nombre_ejem_id)->get());
        $Ficha_Tecnica = new FichaTecnica();
        foreach ($request->file() as $image) {
          
            if ($request->fileImg0 == $image) {
                $this->saveImagen($directoryEspecie, $image, 'PC',"Planta Completa",$nombreEjemplar);
                $Ficha_Tecnica->Url_PC=$this->urlFoto;
            } else
            if ($request->fileImg1 == $image) {
                $this->saveImagen($directoryEspecie, $image, 'F',"Follaje",$nombreEjemplar);
                $Ficha_Tecnica->Url_F=$this->urlFoto;
            } else
            if ($request->fileImg2 == $image) {
                $this->saveImagen($directoryEspecie, $image, 'H',"Hojas",$nombreEjemplar);
                  $Ficha_Tecnica->Url_H=$this->urlFoto;
            } else
            if ($request->fileImg3 == $image) {
                $this->saveImagen($directoryEspecie, $image, 'FL',"Flores",$nombreEjemplar);
                  $Ficha_Tecnica->Url_FL=$this->urlFoto;
            } else
            if ($request->fileImg4 == $image) {
                $this->saveImagen($directoryEspecie, $image, 'FR',"Frutos",$nombreEjemplar);
                  $Ficha_Tecnica->Url_FR=$this->urlFoto;
            } else
            if ($request->fileImg5 == $image) {
                $this->saveImagen($directoryEspecie, $image, 'S',"Semillas",$nombreEjemplar);
                  $Ficha_Tecnica->Url_S=$this->urlFoto;
            } else
            if ($request->fileImg6 == $image) {
                $this->saveImagen($directoryEspecie, $image, 'T',"Tronco",$nombreEjemplar);
               
                $Ficha_Tecnica->Url_T=$this->urlFoto;
            } else
            if ($request->fileImg7 == $image) {
                $this->saveImagen($directoryEspecie, $image, 'R',"Raíces",$nombreEjemplar);
                  $Ficha_Tecnica->Url_R=$this->urlFoto;
            }
        }
       
        $Ficha_Tecnica->TPertenencia = $request->Fenologia;
        $Ficha_Tecnica->Fcrecimiento = $request->FormaCrecimiento;
        $Ficha_Tecnica->Origen = $request->Origen;
        $Ficha_Tecnica->Floracion = $request->Floracion;
        $Ficha_Tecnica->Descripcion = $request->Descripcion;
        $Ficha_Tecnica->EstatusEco = $request->EstatusEco;
        $Ficha_Tecnica->EstatusConv = $request->EstatusConser;
        $Ficha_Tecnica->Altura = $request->Altura;
        $Ficha_Tecnica->TipoC = $request->TipoC;
        $Ficha_Tecnica->TipoR = $request->TipoR;
        $Ficha_Tecnica->RaicesObs = $request->RaicesObs;
        $Ficha_Tecnica->Usos = $request->Usos;
        $Ficha_Tecnica->Clima = $request->ClimaN;
        $Ficha_Tecnica->Porte = $request->Porte;
        $Ficha_Tecnica->SistemR = $request->SistemaRa;
        $Ficha_Tecnica->RequerimientosE = $request->Requerimietos;
        $Ficha_Tecnica->ServiciosAmb = $request->ServicioAmbiental;
        $Ficha_Tecnica->AmenazasRiesgos = $request->AmenazasR;
        $Ficha_Tecnica->AmenazasRiesgosHab = $request->AmenazasRC;
        $Ficha_Tecnica->Estado = "Verificacion";
        $nombreEjemplar->FichaTecnica()->save($Ficha_Tecnica);
     

        $nombreEjemplar->ficha_tecnicas_id = $Ficha_Tecnica->id;

        $nombreEjemplar->save();
        return back()->with('message', '¡¡¡Ficha Tecnica registrada con exito!!!');
    }
    private function saveImagen(String $directoryEspecie, $image, String $ClaveF,String $Tipo,$nombreEjemplar)
    {
       
        $this->urlFoto = $directoryEspecie . '/' . $nombreEjemplar->Clave.'_'.$ClaveF . '.' . $image->getClientOriginalExtension();
      
        \Storage::disk('public')->put($this->urlFoto, \File::get($image));
        

       

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\FichaTecnica  $fichaTecnica
     * @return \Illuminate\Http\Response
     */
    public function show(FichaTecnica $fichaTecnica, $id)
    {
        $fichaTecnica = FichaTecnica::findorFail($id);
        //dd(NombreEjemplar::findorFail($fichaTecnica->id));
        return \view('FichasTecnicas.indexPublic')->with("fichaTecnica", NombreEjemplar::findorFail($fichaTecnica->id));

    }
    public function Imprimir(FichaTecnica $fichaTecnica, $id)
    {
        $fichaTecnica = FichaTecnica::findorFail($id);
        //dd(NombreEjemplar::findorFail($fichaTecnica->id));
        $fichaTecnica = NombreEjemplar::findorFail($fichaTecnica->id);
        $data = compact('fichaTecnica');
        $pdf = PDF::loadView('FichasTecnicas.pdf', $data)->setPaper([0, 0, 695.28, 1102.89]);
        // $pdf->setPaper('A4', 'portrait');
        return $pdf->stream('invoice.pdf');
        // return \view('FichasTecnicas.pdf')->with("fichaTecnica", NombreEjemplar::findorFail($fichaTecnica->id));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FichaTecnica  $fichaTecnica
     * @return \Illuminate\Http\Response
     */
    public function edit(FichaTecnica $fichaTecnica)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FichaTecnica  $fichaTecnica
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FichaTecnica $fichaTecnica)
    {
        //
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
