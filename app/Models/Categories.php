<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    protected $table = 'Categories';

    protected $primary_key = 'id';

    public function Appartments(){
        $this->hasMany(Appartments::class); 
    }
}
