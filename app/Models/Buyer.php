<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
    //
    public function getUser()
    {
        return  $this->belongsTo(User::class, 'iduser');
    }
}