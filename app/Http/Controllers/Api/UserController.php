<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\UserRequest;
use App\Http\Resources\User as UserResources;
use App\models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getListAll()
    {
        $users = User::all();
        return $this->sendResponse(UserResources::collection($users), 'Usuários encontrado!');
    }
    public function getMe()
    {
        $user = $this->user();
        $user = User::find($user->id);
        if (is_null($user)) {
            return $this->sendError('Usuário não encontrado!');
        }

        return $this->sendResponse(new UserResources($user), 'Usuário encontrado!');
    }
    public function editNameEmail(UserRequest $request)
    {
        //
        $user = $this->user();
        $user = User::find($user->id);

        if (is_null($user)) {
            return $this->sendError('Usuário não encontrado!');
        }
        $user->name = $request->name;
        $user->email = $request->email;

        if (!$user->wasChanged()) {

            return $this->sendResponse(new UserResources($user), 'Nenhum dado novo!');
        }
        $user->save();
        return $this->sendResponse(new UserResources($user), 'Produto alterado!');
    }

    /**
     * @return object
     */
    public function user()
    {

        return Auth::user();
    }
}