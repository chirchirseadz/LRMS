<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandLord extends Model
{
    use HasFactory;

    protected $table = 'land_lord';
    
    public function appartments(){
        $this->hasMany(Appartments::class);
    }

    public function Flats(){
        return $this->hasMany(Flats::class);
    }
    
}
