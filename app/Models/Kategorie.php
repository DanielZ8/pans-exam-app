<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategorie extends Model
{
    use HasFactory;
    protected $table = 'kategorie';
    protected $fillable =[
        'nazwa',   
    ];

    public function pytania() //relacja z pytaniami
    {
        return $this->hasMany(Pytania::class);
    }
}
