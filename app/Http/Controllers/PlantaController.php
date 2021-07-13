<?php

namespace App\Http\Controllers;

use App\FotoPlanta;
use App\Morfologia;
use App\NombreEjemplar;
use App\Planta;
use App\SituacionEntorno;
use App\SubUnidades;
use App\User;

use Auth;
use DB;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Notifications\VerificacionNotification;

class PlantaController extends Controller
{
    public $Nom;
    public $Ejemplar;
    public $SubUnidades;
    public $SubUnidadTP;
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['administrador', 'Gestor']);
       // $controller = new Controller();
        Controller::loadEjemplares();
        Controller::loadSubUnidades();
        $Planta = new Planta();
        return \view('HojaCampo.CrearHC.index')
            ->with("Ejemplar", $this->Ejemplar)
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

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->user()->authorizeRoles(['administrador', 'Gestor']);

        $validatedData = Validator::make($request->all(), [
            'fileImg0' => 'image|mimes:png,jpeg',
            'fileImg1' => 'image|mimes:png,jpeg',
            'fileImg2' => 'image|mimes:png,jpeg',
            'fileImg3' => 'image|mimes:png,jpeg',
            'fileImg4' => 'image|mimes:png,jpeg',
            'fileImg5' => 'image|mimes:png,jpeg',
            'fileImg6' => 'image|mimes:png,jpeg',
            'fileImg7' => 'image|mimes:png,jpeg',

            'FechaRecoleccion' => ['required', 'max:15', 'bail'],
            'FechaFotografia' => ['required', 'max:15', 'bail'],
            'NombreRecolectorD' => ['required', 'max:40', 'bail'],
            'NombreRecolectorm' => ['required', 'max:40', 'bail'],
            'NombreAutorFoto' => ['required', 'max:40', 'bail'],
            'NombreCientifico' => ['required', 'max:40', 'bail'],
            "EntidadA" => ['required'],
            "NombreC" => ['required'],
            'Latitud' => ['required', 'max:40', 'bail','regex:/^[+-]?[0-9]{1,9}(?:.[0-9]{1,4})?$/'],
            'longitud' => ['required', 'max:40', 'bail','regex:/^[+-]?[0-9]{1,9}(?:.[0-9]{1,4})?$/'],

            'RegistroIdentificacion' => ['max:40', 'bail'],
            'CondicionG' => ['max:255', 'bail'],
            'Ecrecimiento' => ['max:20', 'bail'],
            'Altura' => ['bail'],
            'AlturaLi' => ['bail'],
            'Copa' => ['max:50', 'bail'],
            'DiametroC' => ['bail'],
            'Raices' => ['max:40', 'bail'],
            'TRaices' => ['max:40', 'bail'],
            'Manejo' => ['max:100', 'bail'],
            'EstadoFiso' => ['max:40', 'bail'],
            'EnfermedadesA' => ['max:300', 'bail'],
            'EnfermedadesP' => ['max:400', 'bail'],

        ]);
        if ($validatedData->fails()) {
            return redirect(route('HojaCampo'))
                ->withErrors($validatedData)
                ->withInput();
        } else {

            $Planta = $this->savePlanta($request);

            //**Obtener Iniciales del nombre del fotografo */
            $fotoIniciales = Str::of($Planta->NombreAutorFoto)->studly()->split('/([a-z]+)/')->implode('');
            //*-----------------------------------------------* */
            $sr = Str::of($this->Nom->NombreCientifico)->slug('_');
            $directoryEspecie = '/plantas/EspeciesPorIdentificar/' . $sr;
            $SU = SubUnidades::where('IdUnidad', $request->EntidadA)->firstOrFail();
            $directoryPersona = $directoryEspecie . '/' . $SU->Abreviatura . '_' . $fotoIniciales;

            $NF = $this->Nom->Clave;
            $No_Ejemplar = count(Planta::where('nombre_ejem_id', '=', $Planta->nombre_ejem_id)->get());

            foreach ($request->file() as $image) {

                if ($request->fileImg0 == $image) {
                    $this->saveImagen($directoryPersona, $NF, $image, 'PC', $Planta, $No_Ejemplar,"Planta Completa");
                } else
                if ($request->fileImg1 == $image) {
                    $this->saveImagen($directoryPersona, $NF, $image, 'F', $Planta, $No_Ejemplar,"Follaje");
                } else
                if ($request->fileImg2 == $image) {
                    $this->saveImagen($directoryPersona, $NF, $image, 'H', $Planta, $No_Ejemplar,"Hojas");
                } else
                if ($request->fileImg3 == $image) {
                    $this->saveImagen($directoryPersona, $NF, $image, 'FL', $Planta, $No_Ejemplar,"Flores");
                } else
                if ($request->fileImg4 == $image) {
                    $this->saveImagen($directoryPersona, $NF, $image, 'FR', $Planta, $No_Ejemplar,"Frutos");
                } else
                if ($request->fileImg5 == $image) {
                    $this->saveImagen($directoryPersona, $NF, $image, 'S', $Planta, $No_Ejemplar,"Semillas");
                } else
                if ($request->fileImg6 == $image) {
                    $this->saveImagen($directoryPersona, $NF, $image, 'T', $Planta, $No_Ejemplar,"Tronco");
                } else
                if ($request->fileImg7 == $image) {
                    $this->saveImagen($directoryPersona, $NF, $image, 'R', $Planta, $No_Ejemplar,"Raíces");
                }
            }

        }

        return back()->with('message', '¡¡¡Hoja de campo registrada con exito!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Planta  $planta
     * @return \Illuminate\Http\Response
     */
    public function show(Planta $planta, $id, Request $request)
    {
        
        $request->user()->authorizeRoles(['administrador', 'Gestor', 'Coordinador']);

        $Planta = Planta::findorFail($id);
        if ($request->user()->hasRole('Gestor')) {
            if ($Planta->User->id == Auth::id()) {
                $this->loadEjemplares();
                $this->loadSubUnidades();

                return \view('HojaCampo.CrearHC.index')
                    ->with("Ejemplar", $this->Ejemplar)
                    ->with("SubUnidades", $this->SubUnidades)
                    ->with("SubUnidadTP", $this->SubUnidadTP)
                    ->with("isReO", true)
                    ->with("Planta", $Planta);
            } else {
                return \redirect()->back();

            }
        } else {
            $this->loadEjemplares();
            $this->loadSubUnidades();

            return \view('HojaCampo.CrearHC.index')
                ->with("Ejemplar", $this->Ejemplar)
                ->with("SubUnidades", $this->SubUnidades)
                ->with("SubUnidadTP", $this->SubUnidadTP)
                ->with("isReO", true)
                ->with("Planta", $Planta);
        }
    }
    public function showAllPlantas(Request $request)
    {
        $request->user()->authorizeRoles(['administrador', 'Coordinador']);
        $Planta = Planta::orderBy('created_at', 'asc')->Paginate(15);

        return view('HojaCampo.User.index')->with('MisHojasCampo', $Planta);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Planta  $planta
     * @return \Illuminate\Http\Response
     */
    public function edit(Planta $planta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Planta  $planta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Planta $planta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Planta  $planta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Planta $planta)
    {
        //
    }
    public function saveMorfo(Request $request, $Planta)
    {
        $Morfologia = new Morfologia();
        $Morfologia->CondicionGeneral = $request->CondicionG;
        $Morfologia->EstadoCrecimiento = $request->Ecrecimiento;
        $Morfologia->Altura = floatval($request->Altura);
        $Morfologia->AlturaLiteratura = floatval($request->AlturaLi);
        $Morfologia->Tcopa = $request->Copa;
        $Morfologia->DiametroCopa = floatval($request->DiametroC);

        $Morfologia->Raices = $request->Raices;
        $Morfologia->TRaices = $request->TRaices;
        $Morfologia->Manejo = $request->Manejo;
        if ($request->customRadioInline == "on") {
            $Morfologia->DanosF = $request->DanosFisicosText;
        }
        $Morfologia->EstadoFiso = $request->EstadoFiso;
        $Morfologia->EnfermeAparentes = $request->EnfermedadesA;
        $Morfologia->EnfermeLitera = $request->EnfermedadesP;
        //$Morfologia->save();

        $Planta->Morfologia()->save($Morfologia);
    }
    private function saveSitEnt(Request $request, $Planta)
    {
        $SituacionEnt = new SituacionEntorno();
        $SituacionEnt->Latitud = $request->Latitud;
        $SituacionEnt->Altitud = $request->longitud;
        $SituacionEnt->TArea = $request->TAreaVerde;
        $SituacionEnt->Aspecto = $request->AspectoEspacio;
        $inter = array(
            'Cableado' => $request->CBCableado,
            'Infra' => $request->CBInfra,
            'Mobili' => $request->CBMobili,
            'Sena' => $request->CBSena,
            'Edifi' => $request->CBEdifi,
        );

        $SituacionEnt->Interfencia = json_encode($inter);
        $SituacionEnt->No_Ejemplar = $request->NoEjemplar;

        $SituacionEnt->EntidadAcademica = $request->EntidadA;
        $SituacionEnt->SubEntidadAcademica = $request->SubUnidadesFiltrada;
        //$SituacionEnt->save();
        $Planta->SituacionEntorno()->save($SituacionEnt);
    }

    private function saveImagen(String $directoryPersona, String $NF, $image, String $ClaveF, Planta $Planta, int $No_Ejemplar,String $Tipo)
    {
        $urlFoto = $directoryPersona . '/' . $No_Ejemplar . $NF . $ClaveF . '.' . $image->getClientOriginalExtension();
        \Storage::disk('public')->put($urlFoto, \File::get($image));

        $foto = new FotoPlanta();
        $foto->planta_id = $Planta->id;
        $foto->url = $urlFoto;
        $foto->PartePlanta=$Tipo;
        $foto->nombre = $No_Ejemplar . $NF . $ClaveF;
        $foto->save();
    }

    private function savePlanta(Request $request)
    {
        $Planta = new Planta();
        $this->saveMorfo($request, $Planta);
        $this->saveSitEnt($request, $Planta);
        $Planta->FechaFotografia = $request->FechaFotografia;
        $Planta->FechaRecoleccion = $request->FechaRecoleccion;
        $Planta->NombreRecolectorDatos = $request->NombreRecolectorD;

        $Planta->NombreRecolectorMuestra = $request->NombreRecolectorm;
        $Planta->NombreAutorFoto = $request->NombreAutorFoto;
        $Planta->Verificado = false;

        $this->Nom = NombreEjemplar::find($request->NombreC);
        $Planta->NombreEjem()->associate($this->Nom);

        $Planta->imagenes = date('dmyHi');
        $Planta->urlImg = Str::slug("fotos", '-');
        $Planta->user_id = Auth::id();
        $Planta->save();
        return $Planta;
    }
    public function verificar(Request $request)
    {
        //dd($request);
        $request->user()->authorizeRoles(['administrador', 'Coordinador']);
        $Planta = Planta::findorFail($request->idPlanta);

        $User=User::findorFail($FichaTecnica->user_id);
        $User->notify(new VerificacionNotification($FichaTecnica->id,"HojaCampo",false));
        
        $Planta->Verificado = true;
        $Planta->NomVerificador = Auth::user()->name;
        $Planta->save();
        return back()->with('message', 'Se ha verificado la hoja de campo con exito');

    }
    public function rechazar(Request $request){
        
       
        $request->user()->authorizeRoles(['administrador', 'Coordinador']);
        $Planta = Planta::findorFail($request->idPlanta);

        $User=User::findorFail($FichaTecnica->user_id);
        $User->notify(new VerificacionNotification($FichaTecnica->id,"HojaCampo",true));
        
        $Planta->Verificado = false;
        $Planta->NomVerificador = Auth::user()->name;
        $Planta->MotivoRechazo=$request->MRechazo;
        $Planta->save();
        return back()->with('message', 'La hoja de campo ha sido RECHAZADA');
    }
    public function showVerificadas(Request $request){

        //$request->user()->authorizeRoles(['administrador', 'Coordinador']);
        $Planta=Planta::select("*")
        ->where("Verificado", true)
        ->orderBy('created_at', 'asc')->Paginate(15);
        
       

        return view('HojaCampo.User.index')->with('MisHojasCampo', $Planta);
    }
    public function allPlantas(Request $request){

        //$request->user()->authorizeRoles(['administrador', 'Coordinador']);
        $Planta=Planta::all();
       // dd($Planta);
        return view('Mapa.index')->with('Planta', $Planta);
    }
}
