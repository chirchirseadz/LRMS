<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenants extends Model
{

    use HasFactory;

    public function RentDetails(){
        return $this->belongsToMany(Tenants::class);
    }

    public function CashPayments(){
        return $this->hasMany(CashPayments::class);
    }

    public function C2bPayments(){
        return $this->hasMany(C2bPayments::class);
    }

    public function Appartments(){
        return $this->belongsTo(Appartments::class);
    }




    public function Flat() {
        $this->belongsTo(Flats::class);
    }
}
