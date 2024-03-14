<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WebcamController extends Controller
{
    public function index()
    {
        $index = 0; // Aquí defines el valor del índice según tus necesidades
        return view('HojaCampo.CrearHC.welcome', compact('index'));
    }

    // public function store(Request $request)
    // {
    //     $this->validate($request, [
    //         'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
    //     ]);

    //     $img = $request->image;
    //     $folderPath = "uploads/";
    //     $image_parts = explode(";base64,", $img);
    //     $image_base64 = base64_decode($image_parts[1]);
    //     $fileName = uniqid() . '.png';

    //     $file = $folderPath . $fileName;
    //     Storage::put($file, $image_base64);

    //     dd('Image uploaded successfully: '.$fileName);
    // }
}
