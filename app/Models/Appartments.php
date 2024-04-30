<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appartments extends Model
{
    use HasFactory;

    protected $table = 'appartments';
    protected $primary_key = 'id';

    public function Rooms() {
        return $this->hasMany(Rooms::class);
    }

}
