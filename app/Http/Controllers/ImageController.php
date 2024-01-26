<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function upload(Request $request)
    {
        /* dd(auth()->user()->id); */
       /*  $csrfToken = $request->header('X-CSRF-TOKEN'); */
        $image = $request->file('file');

        // Generuj unikalną nazwę pliku na podstawie skrótu MD5
        $filename = substr(md5(time() . $image->getClientOriginalName()), 0, 10);

        // Dodaj rozszerzenie pliku
        $extension = $image->getClientOriginalExtension();
        $filenameWithExtension = "{$filename}.{$extension}";

        // Przetwarzanie i zapisywanie obrazka, np. do folderu public/uploads
        $path = $image->storeAs('uploads', $filenameWithExtension, 'public');

        // Zwróć ścieżkę do obrazka
        return response()->json(['location' => asset("storage/{$path}")]);
    }
}
