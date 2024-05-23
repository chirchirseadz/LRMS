<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashPayments extends Model
{
    use HasFactory;
    protected $table = 'cash_payments';
    protected $primary_key = 'id';

    public function Tenants(){
     return  $this->belongsTo(Tenants::class);
    }
}
