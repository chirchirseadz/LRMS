<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{
    use HasFactory;
    
    protected $table = 'rooms';
    protected $primary_key = 'id';

    public function Tenant(){
        return $this->hasOne(Tenants::class);
    }

    public function Appartments() {
        return $this->belongsTo(Appartments::class);
    }
}
