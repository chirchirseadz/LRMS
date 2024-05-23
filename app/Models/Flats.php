<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flats extends Model
{
    use HasFactory;
    
    protected $table = 'flats';
    protected $primary_key = 'id';



    public function Appartments() {
        return $this->hasMany(Appartments::class);
    }

    public function LandLord(){
        return $this->belongsTo(LandLord::class);
    }
     
    public function Tenants() {
        return $this->hasMany(Tenants::class);
    }
}
