<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Movie;

class Genre extends Model
{
    public function movies() {
        return $this->belongsToMany(Movie::class);
    }

    protected $fillable = [
        'description'
    ];

    

    use softDeletes;
}
