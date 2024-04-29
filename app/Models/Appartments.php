<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appartments extends Model
{
    use HasFactory;

    public function Rooms() {
        return $this->hasMany(Rooms::class);
    }

}
