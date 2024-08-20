<?php

namespace App\Http\Controllers\Auth;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use App\Services\AuthService;


class LoginController extends Controller
{
    protected $authService;

    /**
     * Construtor
     * @param AuthService $authService
     */
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    /**
     * Exibe o formulário de login
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Processa a tentativa de login
     * usado para fazer o login apenas com as credenciais do request
     */
//    public function login(Request $request)
//    {
//        $request->validate([
//            'email' => 'required|email',
//            'password' => 'required|string',
//        ]);
//
//        $credentials = $request->only('email', 'password');
//
//        if ($this->authService->attemptLogin($credentials)) {
//            return redirect()->route('home');
//        }
//
//        return redirect()->route('login')->withErrors([
//            'email' => 'As credenciais fornecidas não correspondem aos nossos registros.',
//        ]);
//    }

    /**
     * Processa a tentativa de login
     * usado para fazer o login via api usando o sanctum
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('api-token')->plainTextToken;

            //retorna o token para o front
            //return response()->json(['token' => $token], 200);

            // Armazena o token na sessão
            session(['api_token' => $token]);

            // Redirecionar para a página home após o login bem-sucedido
            return redirect()->route('home');
        }

        //retorna a resposta json
       // return response()->json(['message' => 'Invalid credentials'], 401);

        // Redirecionar para a página login após o login mau-sucedido
        return redirect()->route('login')->withErrors([
            'email' => 'As credenciais fornecidas não correspondem aos nossos registros.',
        ]);
    }

    /**
     * Desloga o usuário
     */
    public function logout()
    {
        $this->authService->logout();
        return redirect()->route('login');
    }

    //pode ser usada para revogar o token do usuario
//    public function logout(Request $request)
//    {
//        $request->user()->tokens()->delete();
//        return response()->json(['message' => 'Logged out'], 200);
//    }


}
