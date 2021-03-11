<?php

namespace App\Http\Controllers;

use App\Planta;
use App\NombreEjemplar;
use App\Morfologia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PlantaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Ejemplar=NombreEjemplar::all();
      
        return \view('HojaCampo.index')->with("Ejemplar",$Ejemplar);
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
        //dd($request);
        $validatedData = Validator::make($request->all(),[
            'FechaRecoleccion' => ['required','max:15','bail'],
            'FechaFotografia' => ['required','max:15','bail'],
            'NombreRecolectorD' => ['required','max:40','bail'],
            'NombreRecolectorm' => ['required','max:40','bail'],
            'NombreAutorFoto' => ['required','max:40','bail'],
            'NombreCientifico' => ['required','max:40','bail'],
            'NombreCientificoConf' => ['required','max:40','bail'],
            'RegistroIdentificacion' => ['required','max:40','bail'],
            'CondicionG' => ['required','max:255','bail'],
            'Ecrecimiento' => ['required','max:20','bail'],
            'Altura' => ['required','bail'],
            'AlturaLi' => ['required','bail'],
            'Copa' => ['required','max:50','bail'],
            'DiametroC' => ['required','bail'],
            'Raices' => ['required','max:40','bail'],
            'TRaices' => ['required','max:40','bail'],
            'Manejo' => ['required','max:100','bail'],
            'EstadoFiso' => ['required','max:40','bail'],
            'EnfermedadesA' => ['required','max:255','bail'],
            'EnfermedadesP' => ['required','max:255','bail'],
        ]);
        if ($validatedData->fails()) {
            return redirect(route('HojaCampo'))
                        ->withErrors($validator)
                        ->withInput();
        }else{
           
        $Morfologia = new Morfologia();
        $Morfologia->CondicionGeneral=$request->CondicionG;
        $Morfologia->EstadoCrecimiento=$request->Ecrecimiento;
        $Morfologia->Altura=floatval($request->Altura);
        $Morfologia->AlturaLiteratura=floatval($request->AlturaLi);
        $Morfologia->Tcopa=$request->Copa;
        $Morfologia->DiametroCopa=floatval($request->DiametroC);

        $Morfologia->Raices=$request->Raices;
        $Morfologia->TRaices=$request->TRaices;
        $Morfologia->Manejo=$request->Manejo;
        if($request->customRadioInline=="on"){
       
            $Morfologia->DanosF=$request->DanosFisicosText ;
        }
        $Morfologia->EstadoFiso=$request->EstadoFiso;
        $Morfologia->EnfermeAparentes=$request->EnfermedadesA;
        $Morfologia->EnfermeLitera=$request->EnfermedadesP;
        $Morfologia->save();

            $Planta = new Planta();
            $Planta->FechaRecoleccion=$request->FechaRecoleccion;
            $Planta->NombreRecolectorDatos=$request->NombreRecolectorD;
            $Planta->FechaRecoleccion=$request->FechaFotografia;
            $Planta->NombreRecolectorMuestra=$request->NombreRecolectorm;
            $Planta->Verificado=false;

            $Nom=NombreEjemplar::find($request->NombreC);
            $Planta->NombreEjem()->associate($Nom);

            $M=Morfologia::find($Morfologia->id);
           
            $Planta->Morfologia_id=$Morfologia->id;
            $Planta->save();
        }
       
        return \redirect()->back()->with('message', 'Hoja de campo registrada con exito');
    }
    public function GuardaMorfologia(Request $request){
       
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Planta  $planta
     * @return \Illuminate\Http\Response
     */
    public function show(Planta $planta)
    {
        //
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
}
