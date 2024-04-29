<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentDetails extends Model
{
    use HasFactory;

    public function Tenants(){
        return $this->belongsToMany(Tenants::class);
    }
}
