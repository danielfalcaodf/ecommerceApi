<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
    //
    public function getUser()
    {
        return  $this->belongsTo(User::class, 'iduser');
    }
}
