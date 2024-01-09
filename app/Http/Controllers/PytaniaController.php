<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategorie;
use App\Models\Pytania;

class PytaniaController extends Controller
{
    public function index(){
        $kategorie = Kategorie::all();
        $pytania = Pytania::all();

        return view('show-pytania',['kategorie'=>$kategorie, 'pytania'=>$pytania]);
    }
}
