<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pytania extends Model
{
    use HasFactory;
    protected $table = 'pytania';
    protected $fillable =[
        'kategoria_id',   
        'pytanie_tresc',   
        'odpowiedz',   
    ];

    public function kategorie() //relacja z userem
    {
        return $this->belongsTo(Kategorie::class);
    }
}
