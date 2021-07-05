<?php

namespace App\Http\Controllers;

use App\FichaTecnica;
use Illuminate\Http\Request;
use App\NombreEjemplar;

class FichaTecnicaController extends Controller
{
    public $SubUnidades;
    public $SubUnidadTP;
    
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
        return view('FichasTecnicas.index') ->with("Ejemplar", $this->Ejemplar)
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
        $Ficha_Tecnica=new FichaTecnica();
        $Ficha_Tecnica->TPertenencia=$request->Fenologia;
        $Ficha_Tecnica->Fcrecimiento=$request->FormaCrecimiento;
        $Ficha_Tecnica->Origen=$request->Origen;
        $Ficha_Tecnica->Floracion=$request->Floracion;
        $Ficha_Tecnica->Descripcion=$request->Descripcion;
        $Ficha_Tecnica->EstatusEco=$request->EstatusEco;
        $Ficha_Tecnica->EstatusConv=$request->EstatusConser;
        $Ficha_Tecnica->Altura=$request->Altura;
        $Ficha_Tecnica->TipoC=$request->TipoC;
        $Ficha_Tecnica->TipoR=$request->TipoR;
        $Ficha_Tecnica->RaicesObs=$request->RaicesObs;
        $Ficha_Tecnica->Usos=$request->Usos;
        $Ficha_Tecnica->Clima=$request->ClimaN;
        $Ficha_Tecnica->Porte=$request->Porte;
        $Ficha_Tecnica->SistemR=$request->SistemaRa;
        $Ficha_Tecnica->RequerimientosE=$request->Requerimietos;
        $Ficha_Tecnica->ServiciosAmb=$request->ServicioAmbiental;
        $Ficha_Tecnica->AmenazasRiesgos=$request->AmenazasR;
        $Ficha_Tecnica->AmenazasRiesgosHab=$request->AmenazasRC;
       // $Ficha_Tecnica->save();
       $nombreEjemplar->FichaTecnica()->save( $Ficha_Tecnica);
      
       $nombreEjemplar->ficha_tecnicas_id=$Ficha_Tecnica->id;
        return back()->with('message', '¡¡¡Ficha Tecnica registrada con exito!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FichaTecnica  $fichaTecnica
     * @return \Illuminate\Http\Response
     */
    public function show(FichaTecnica $fichaTecnica)
    {
        //
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
