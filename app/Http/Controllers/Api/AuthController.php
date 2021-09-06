<?php

namespace App\Http\Controllers\Api;


use App\Http\Requests\AuthRequest;
use App\Http\Resources\Auth as AuthResource;
use App\Http\Resources\User as UserResources;
use App\models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends BaseController
{
    //

    /**
     * @param Request $request
     *
     * @return [type]
     */
    /**
     * @param AuthResquest $request
     *
     * @return [type]
     */
    public function register(AuthRequest $request)
    {
        # code...
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
            return $this->sendError('Erro logar, mas o usuário ja foi criado!', [], 401);
        }

        $user->token = $this->arrayWithToken($token);

        return $this->sendResponse(new AuthResource($user), 'Usuário Cadastrado!');
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (!$token = auth('api')->attempt($credentials)) {
            return $this->sendError('Email ou senha inválidos', [], 401);
        }

        $user = auth('api')->user();
        $user->token = $this->arrayWithToken($token);;
        return $this->sendResponse(new AuthResource($user), '');
    }
    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(Auth::user());
    }

    /**
     * Log the user out (Invalidate the token).
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
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth('api')->refresh());
    }


    /**
     * Get the token array structure.
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
     * @param mixed $token
     *
     * @return [type]
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