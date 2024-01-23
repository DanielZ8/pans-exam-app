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

        $odp_brak = 0;
        $odp_k = 0;
        $odp_k_b = 0;
        $odp_roz = 0;
        $odp_roz_b = 0;
        $odp_brak = 0;
        $pytania_ilosc = $pytania->count();
        foreach($pytania as $pytanie){
            if($pytanie->odp_rozbudowana != null){
                $odp_roz++;
            }
            else{
                $odp_roz_b++;
            }

            if($pytanie->odp_krotka != null){
                $odp_k++;
            }
            else{
                $odp_k_b++;
            }

            if($pytanie->odp_krotka == null && $pytanie->odp_rozbudowana == null){
                $odp_brak++;
            }


        }
        return view('show-pytania',[
            'kategorie'=>$kategorie, 
            'pytania'=>$pytania,
            'odp_roz' => $odp_roz,
            'odp_roz_b' => $odp_roz_b,
            'odp_k' => $odp_k,
            'odp_k_b' => $odp_k_b,
            'odp_brak' => $odp_brak,
            'pytania_ilosc' => $pytania_ilosc,
            ]);
    }

    public function index_edit($id){
        $pytanie = Pytania::find($id);

        return view('admin/admin-pytanie-edit',['pytanie'=>$pytanie]);
    }

    public function update(Request $request){
        $pytanie = Pytania::find($request->pytanie_id);

        if($request->pytanie_tresc != null){
            $pytanie->pytanie_tresc = $request->pytanie_tresc;
        }

        if($request->odp_dluga != null){
            $pytanie->odp_rozbudowana = $request->odp_dluga;
        }

        if($request->odp_krotka != null){
            $pytanie->odp_krotka = $request->odp_krotka;
        }
               
        $pytanie->update();

        return redirect(route('pytanie-edit', $pytanie->id));
    }

    public function random_index(){
        $kategorie = Kategorie::inRandomOrder()->limit(5)->get();   
        $pytaniaListaTeoretyczne= [];


        foreach($kategorie as $kategoria){
            $pytanie = Pytania::inRandomOrder()
                ->where('kategorie_id',  $kategoria->id)
                ->where('typ_pytania',  'teoretyczne')
                ->first();
    
            // Dodawanie pojedynczego pytania, a nie kolekcji, do listy
            if ($pytanie) {
                $pytaniaListaTeoretyczne[] = $pytanie;
            }
        }
        return response()->json($pytaniaListaTeoretyczne, 200, [], JSON_PRETTY_PRINT);

    }

    public function egzamin_index(){

        $kategorie = Kategorie::inRandomOrder()->limit(5)->get();   
        $pytania= [];


        foreach($kategorie as $kategoria){
            $pytanie = Pytania::inRandomOrder()
                ->where('kategorie_id',  $kategoria->id)
                ->where('typ_pytania',  'teoretyczne')
                ->first();
    
            // Dodawanie pojedynczego pytania, a nie kolekcji, do listy
            if ($pytanie) {
                $pytania[] = $pytanie;
            }
        }
        return view('egzamin-index', ['pytania'=>$pytania]);
    }
}
