<?php

namespace App\Http\Controllers;

use App\NombreEjemplar;
use Illuminate\Http\Request;
use App\FotoPlanta;

class NombreEjemplarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $Ejemplares = NombreEjemplar::orderBy('NombreComun','asc')->Paginate(15);
       
        return \view('Ejemplares.index')->with("Ejemplares", $Ejemplares);
    }
    public function indexPublic()
    {
        
        $Ejemplares = NombreEjemplar::orderBy('NombreComun','asc')->Paginate(12);
       
        return \view('Ejemplares.indexPublic')->with("Ejemplares", $Ejemplares);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\NombreEjemplar  $nombreEjemplar
     * @return \Illuminate\Http\Response
     */
    public function show(NombreEjemplar $nombreEjemplar, $id)
    {
        $nombreEjemplar = NombreEjemplar::findorFail($id);

        if (count($nombreEjemplar->plantaNom) == 0) {
            return \redirect()->back();
        } else {
           
           
            return \view('Ejemplares.showPxE')->with("nombreEjemplar", $nombreEjemplar);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\NombreEjemplar  $nombreEjemplar
     * @return \Illuminate\Http\Response
     */
    public function edit(NombreEjemplar $nombreEjemplar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\NombreEjemplar  $nombreEjemplar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NombreEjemplar $nombreEjemplar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\NombreEjemplar  $nombreEjemplar
     * @return \Illuminate\Http\Response
     */
    public function destroy(NombreEjemplar $nombreEjemplar)
    {
        //
    }
}
