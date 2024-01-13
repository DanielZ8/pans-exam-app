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

    public function index_edit($id){
        $pytanie = Pytania::find($id);

        return view('admin/admin-pytanie-edit',['pytanie'=>$pytanie]);
    }

    public function update(Request $request){
        $pytanie = Pytania::find($request->pytanie_id);

        $pytanie->pytanie_tresc = $request->pytanie_tresc;
        $pytanie->odp_rozbudowana = $request->odp_dluga;
        $pytanie->odp_krotka = $request->odp_krotka;

        $pytanie->update();

        return redirect(route('pytanie-edit', $pytanie->id));
    }
}
