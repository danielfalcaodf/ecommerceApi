<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\UserRequest;
use App\Http\Resources\User as UserResources;
use App\Models\User;

use Illuminate\Support\Facades\Auth;

/**
 * @group Usuários
 *
 * API Módulo Usuário
 */
class UserController extends ApiController
{
    /**
     * Buscar todos os usuários
     *
     * Apresenta uma lista de todos os usuários com as informações
     *
     *
     * @group Usuários
     * @authenticated
     * @return \Illuminate\Http\Response
     */
    public function getListAll()
    {
        $users = User::all();
        return $this->sendResponse(UserResources::collection($users), 'Usuários encontrado!');
    }
    /**
     * Buscar usuário JWT
     *
     * Apresenta as informações do usuário logado que foi passado com JWT
     *
     * @group Usuários
     * @authenticated
     * @return \Illuminate\Http\Response
     */
    public function getMe()
    {
        $user = $this->user();
        $user = User::find($user->id);
        if (is_null($user)) {
            return $this->sendError('Usuário não encontrado!');
        }

        return $this->sendResponse(new UserResources($user), 'Usuário encontrado!');
    }
    /**
     * Editar usuário JWT
     *
     * Alterar dados do usuário logado que foi passado com JWT, se tudo estiver certo apresenta as informações do usuário
     *
     * @bodyParam name string required  Um nome do usuário.
     * @bodyParam email string required  Email do usuário que não existe no banco de dados.
     *
     * @group Usuários
     * @authenticated
     * @param UserRequest $request
     * @return \Illuminate\Http\Response
     */

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

        if (!$user->isDirty()) {

            return $this->sendResponse(new UserResources($user), 'Nenhum dado novo!', 202);
        }
        $user->save();
        return $this->sendResponse(new UserResources($user), 'Usuário alterado!');
    }

    /**
     * @return object
     */
    public function user()
    {

        return Auth::user();
    }
}