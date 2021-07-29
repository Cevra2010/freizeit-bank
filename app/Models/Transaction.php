<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Group;
use App\Models\User;

class Transaction extends Model
{
    use HasFactory;

    public function group() {
        return $this->hasOne(Group::class,'id','type');
    }

    public function user() {
        return $this->hasOne(User::class,'id','user_id');
    }

    public function amount() {
        return number_format($this->amount,2)." €";
    }
}
