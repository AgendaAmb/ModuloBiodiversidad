<?php

namespace App\Http\Controllers;

use App\Planta;
use App\NombreEjemplar;
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
        return \view('HojaCampo.index');
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
      
        $validatedData = Validator::make($request->all(),[
            'FechaRecoleccion' => ['required','max:15','bail'],
            'FechaFotografia' => ['required','max:15','bail'],
            'NombreRecolectorD' => ['required','max:40','bail'],
            'NombreRecolectorm' => ['required','max:40','bail'],
            'NombreAutorFoto' => ['required','max:40','bail'],
            'NombreC' => ['required','max:40','bail'],
            'NombreCientifico' => ['required','max:40','bail'],
            'NombreCientificoConf' => ['required','max:40','bail'],
            'RegistroIdentificacion' => ['required','max:40','bail'],
            
        ]);
        if ($validatedData->fails()) {
            return redirect(route('HojaCampo'))
                        ->withErrors($validator)
                        ->withInput();
        }else{
            
       
            $NombreEjem = new NombreEjemplar();
            $NombreEjem->NombreComun=$request->NombreC;
            $NombreEjem->NombreCientifico=$request->NombreCientifico;
            $NombreEjem->save();

            $Planta = new Planta();
            $Planta->FechaRecoleccion=$request->FechaRecoleccion;
            $Planta->NombreRecolectorDatos=$request->NombreRecolectorD;
            $Planta->FechaRecoleccion=$request->FechaFotografia;
            $Planta->NombreRecolectorMuestra=$request->NombreRecolectorm;
            $Planta->Verificado=false;

            $Nom=NombreEjemplar::find($NombreEjem->id);
            
            $Planta->NombreEjem()->associate($Nom);
            
            dd(count($request->file()));
            

            $Planta->save();
            
          
        }
       
    
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
