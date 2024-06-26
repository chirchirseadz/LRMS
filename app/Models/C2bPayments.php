<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class C2bPayments extends Model
{
    use HasFactory;
    public function TenantPayments()
    {
        return $this->hasMany(AssignTransaction::class, 'c2b_payments_id');
    }
}
