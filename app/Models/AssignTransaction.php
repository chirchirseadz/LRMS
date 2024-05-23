<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignTransaction extends Model
{
    use HasFactory;

    public function C2bPayments() {
        $this->belongsTo(C2bPayments::class);
    }
}
