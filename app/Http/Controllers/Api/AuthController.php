<?php

namespace App\Http\Controllers\Api;


use App\Http\Requests\AuthRequest;
use App\Http\Resources\Auth as AuthResource;
use App\Http\Resources\User as UserResources;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/**
 * @group Autenticação Jwt
 *
 * API Autenticação Jwt
 *
 */
class AuthController extends ApiController
{
    //


    /**
     *
     * Autenticação com email e senha
     *
     * Obtenha um JWT com credenciais fornecidas
     *
     * @bodyParam email string required  Email do usuário cadastrado. Example: danielfalcao.df@gmail.com
     * @bodyParam password string required  Senha do usuário cadastrado.  Example: 123456
     * @responseFile scenario=(result) responses/auth/login.post.json
     * @responseFile status=400 responses/auth/login.400.json
     * @responseFile status=422 scenario="Erros semânticos do código" responses/errorsInCode.json
     *
     * @group Autenticação Jwt
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (!$token = auth('api')->attempt($credentials)) {
            return $this->sendError('Email ou senha inválidos', [], 400);
        }

        $user = auth('api')->user();
        $user->token = $this->arrayWithToken($token);;
        return $this->sendResponse(new AuthResource($user), '');
    }


    /**
     * Cadastrar um novo usuário
     *
     * Usando name, email, password e password_confirmation, se tudo estiver certo apresenta um token de acesso (JWT) e datalhes do usuario novo
     *
     * @responseFile scenario=(result) responses/auth/register.post.json
     * @responseFile status=422 scenario="Validação do bodyparam" responses/auth/register.422.json
     * @responseFile status=422 scenario="Validação do bodyparam" responses/auth/register.422.email_invalid.json
     * @responseFile status=422 scenario="Validação do bodyparam" responses/auth/register.422.email_password.json
     * @responseFile status=422 scenario="Erros semânticos do código" responses/errorsInCode.json
     *
     * @bodyParam name string required  Nome do usuário. Example: teste
     * @bodyParam email string required  Email do usuário que não é cadastrado. Example: teste@teste.com
     * @bodyParam password string required  Senha do usuário. Example: 123456
     * @bodyParam password_confirmation string required  Confirmação da senha. Example: 123456
     * @group Autenticação Jwt
     *
     * @param AuthResquest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(AuthRequest $request)
    {

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        if (!$user->save()) {
            # code...
            return $this->sendError('Erro a criar usuário', [], 401);
        }
        $credentials = $request->only(['email', 'password']);

        if (!$token = auth('api')->attempt($credentials)) {
            return $this->sendError('Erro logar, mas o usuário ja foi criado!', [], 400);
        }

        $user->token = $this->arrayWithToken($token);

        return $this->sendResponse(new AuthResource($user), 'Usuário Cadastrado!', 201);
    }


    /**
     *
     * Deslogar da Api
     *
     * Desconecte o usuário (invalide o token), se tudo estiver certo apresenta as informações do usuário
     *
     * @responseFile  scenario=(result) responses/auth/logout.post.json
     * @responseFile status=401 scenario="Token is Invalid, Token is Expired, Authorization Token not found" responses/token.invalid.json
     * @responseFile status=422 scenario="Erros semânticos do código" responses/errorsInCode.json
     *
     * @group Autenticação Jwt
     * @authenticated
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        $user = Auth::user();
        auth('api')->logout();


        return $this->sendResponse(new UserResources($user), 'Successfully logged out');
    }

    /**
     * Obtenha a estrutura tokens com JsonResponse.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }

    /**
     * Obtenha a estrutura tokens com array.
     * @param mixed $token
     *
     * @return array
     */
    protected function arrayWithToken($token)
    {
        return [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ];
    }
}