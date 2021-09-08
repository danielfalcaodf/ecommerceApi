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
     * @responseFile scenario=(result) responses/users/getListAll.200.json
     * @responseFile status=401 scenario="Token is Invalid, Token is Expired, Authorization Token not found" responses/token.invalid.json
     * @responseFile status=422 scenario="Erros semânticos do código" responses/errorsInCode.json
     *
     * @group Usuários
     * @authenticated
     * @return \Illuminate\Http\Response
     */
    public function getListAll()
    {
        $users = User::all();
        if ($users->isEmpty()) {
            return $this->sendError('Não encontrado!');
        }
        return $this->sendResponse(UserResources::collection($users), 'Usuários encontrado!');
    }
    /**
     * Buscar usuário JWT
     *
     * Apresenta as informações do usuário logado que foi passado com JWT
     *
     * @responseFile scenario=(result) responses/users/getMe.200.json
     * @responseFile status=401 scenario="Token is Invalid, Token is Expired, Authorization Token not found" responses/token.invalid.json
     * @responseFile status=422 scenario="Erros semânticos do código" responses/errorsInCode.json
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
     * @responseFile scenario=(result) responses/users/editNameEmail.200.json
     * @responseFile status=401 scenario="Token is Invalid, Token is Expired, Authorization Token not found" responses/token.invalid.json
     * @responseFile status=422 scenario="Erros semânticos do código" responses/errorsInCode.json
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
