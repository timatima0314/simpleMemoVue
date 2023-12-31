<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use \Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use App\Models\UserLog;

class AuthController extends Controller
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(AuthRequest $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return response()->json(true, Response::HTTP_OK);
        }

        return response()->json(['errorMessage' => 'メールアドレス、またはパスワードが有効ではありません。'], 500);
    }

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function authenticated(Request $request)
    {
        $userLog = UserLog::create([
            'ip' => $request->ip(),
            'device' => $request->header('User-Agent'),
            'user_id' => $request->user_id
        ]);

        return $userLog
            ? response()->json($userLog, 201)
            : response()->json([], 500);
    }
    /**
     * @param  Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return response()->json(true);
    }
}
