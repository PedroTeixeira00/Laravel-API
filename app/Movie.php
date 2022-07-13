<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Actor;
use App\Genre;

class Movie extends Model
{
    public function actors() {
        return $this->belongsToMany(Actor::class);
    }

    public function genres() {
        return $this->belongsToMany(Genre::class);
    }

    protected $fillable = [
        'title',
        'year',
        'released',
        'runtime',
        'director',
        'imdb_votes',
    ];

    // protected $hidden = [   //Serve para "esconder" atributos da classe 
    //     'pivot' -> Feito automaticamente quando existem tabelas Pivot!
    // ];

    use softDeletes;
}
