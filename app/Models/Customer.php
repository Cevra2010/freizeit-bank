<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Transaction;

class Customer extends Model
{
    use HasFactory;

    public function amount() {
        return number_format($this->amount,2)." €";
    }

    public function transactions() {
        return $this->hasMany(Transaction::class);
    }
}
