<?php

namespace App\Http\Controllers\V1\Auth;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

class AuthController extends BaseController
{
    //


    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->only(['username', 'password']);

        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        $this->generateEvent('用户登录', "用户登录");
        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function info()
    {
        return response()->json([
            'code' => 0,
            'message' => 'ok',
            'data' => auth()->user()
        ]);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        $user = auth()->user();
        $user->role->navigations;
        return response()->json([
            'code' => 0,
            'message' => 'ok',
            'data' => [
                'access_token' => $token,
                'token_type' => 'bearer',
                'expires_in' => time() + auth()->factory()->getTTL() * 60,
                'userinfo' => $user
            ]
        ]);
    }
}
