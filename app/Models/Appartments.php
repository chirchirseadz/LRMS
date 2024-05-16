<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appartments extends Model
{
    use HasFactory;

    // protected $table = 'appartments';
    // protected $primary_key = 'id';

    public function Flat() {
        return $this->belongsTo(Flats::class);
    }
    public function Categories (){
        return $this->belongsTo(Categories::class);
    }
    public function Tenants(){
        return $this->belongsTo(Tenants::class);
    }

    public function landlord() {
        $this->belongsTo(LandLord::class);
    }



}
