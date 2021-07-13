<?php

namespace App\Http\Controllers;

use App\NombreEjemplar;
use Illuminate\Http\Request;

class NombreEjemplarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // ->with("Ejemplar", $this->Ejemplar->where('ficha_tecnicas_id', '==', null)
        $EjemplaresJava = NombreEjemplar::orderBy('NombreComun', 'asc')->get();
        
        $Ejemplares = NombreEjemplar::orderBy('NombreComun', 'asc')->Paginate(15);
        return \view('Ejemplares.index')->with("Ejemplares", $Ejemplares)->with("EjemplaresJava", $EjemplaresJava);
    }
    public function indexPublic()
    {
        $Ejemplares = NombreEjemplar::where('ficha_tecnicas_id', '!=', null)->Paginate(15);
        return \view('Ejemplares.indexPublic')->with("Ejemplares",$Ejemplares);
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

        if ($nombreEjemplar->FichaTecnica == null) {
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
