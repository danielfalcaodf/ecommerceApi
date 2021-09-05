<?php

namespace App\Models;

use App\Http\Resources\User as UserResource;
use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
    //
    public function getUser()
    {
        return new UserResource(User::find($this->iduser));
    }
}