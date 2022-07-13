<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Movie;

class Actor extends Model
{
    public function movies() {
        return $this->belongsToMany(Movie::class);
    }

    protected $fillable = [
        'name'
    ];

    use softDeletes;
}
