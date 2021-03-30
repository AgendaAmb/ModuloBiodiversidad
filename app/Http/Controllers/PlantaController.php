<?php

namespace App\Http\Controllers;

use App\Morfologia;
use App\NombreEjemplar;
use App\Planta;
use App\SituacionEntorno;
use DB;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        $Ejemplar = NombreEjemplar::all();
        $SubUnidadTP = DB::table('sub_unidades')
            ->orderBy('NombreUnidad', 'asc')
            ->get();

        $json = File::get("storage/TSubUnidades.json");
        $SubUnidad = json_decode($json);
        $SubUnidades = array();
        for ($i = 0; $i < count($SubUnidad); $i++) {
            $SubUnidades[] = array(
                "IdSubUnidad" => $SubUnidad[$i]->IdSubUnidad,
                "IdUnidad" => $SubUnidad[$i]->IdUnidad,
                "SubUnidad" => $SubUnidad[$i]->SubUnidad,
            );
        }
        foreach ($SubUnidades as $key => $row) {
            $aux[$key] = $row['SubUnidad'];
        }
        array_multisort($aux, SORT_ASC, $SubUnidades);
        return \view('HojaCampo.index')->with("Ejemplar", $Ejemplar)
            ->with("SubUnidades", $SubUnidades)
            ->with("SubUnidadTP", $SubUnidadTP);
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

        $validatedData = Validator::make($request->all(), [
            'FechaRecoleccion' => ['required', 'max:15', 'bail'],
            'FechaFotografia' => ['required', 'max:15', 'bail'],
            'NombreRecolectorD' => ['required', 'max:40', 'bail'],
            'NombreRecolectorm' => ['required', 'max:40', 'bail'],
            'NombreAutorFoto' => ['required', 'max:40', 'bail'],
            'NombreCientifico' => ['required', 'max:40', 'bail'],
            "EntidadA" => ['required'],
            "NombreC" => ['required'],

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
            $Morfologia->save();

            $SituacionEnt = new SituacionEntorno();
            $SituacionEnt->Latitud = $request->Latitud;
            $SituacionEnt->Altitud = $request->Altitud;
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
            $SituacionEnt->save();

            $Planta = new Planta();
            $Planta->FechaRecoleccion = $request->FechaRecoleccion;
            $Planta->NombreRecolectorDatos = $request->NombreRecolectorD;
            $Planta->FechaRecoleccion = $request->FechaFotografia;
            $Planta->NombreRecolectorMuestra = $request->NombreRecolectorm;
            $Planta->Verificado = false;

            $Nom = NombreEjemplar::find($request->NombreC);

            $Planta->nombre_ejemplar_id = ($Nom != null) ? $Nom->id : null;

            $M = Morfologia::find($Morfologia->id);

            $Planta->Morfologia_id = $Morfologia->id;

            $Planta->situacion_entornos_id = $SituacionEnt->id;

            $Planta->save();
        }

        return \redirect()->back()->with('message', '¡¡¡Hoja de campo registrada con exito!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Planta  $planta
     * @return \Illuminate\Http\Response
     */
    public function show(Planta $planta, $id)
    {
        dd($id);
        $planta = Planta::findorFail($id);

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
