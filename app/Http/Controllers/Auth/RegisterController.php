<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use App\Services\EnderecoService;
use Illuminate\Http\Request;
use App\Services\CepService;

class RegisterController extends Controller
{
    protected $userService;
    protected $enderecoService;

    /**
     * Construtor
     * @param UserService $userService
     * @param EnderecoService $enderecoService
     */
    public function __construct(UserService $userService, EnderecoService $enderecoService)
    {
        $this->userService = $userService;
        $this->enderecoService = $enderecoService;
    }

    public function show()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'zip_code' => 'required|string|min:8|max:9',
            'number' => 'required|string|max:10',
        ]);


        $user = $this->userService->createUser($request->only('name', 'email', 'password'));


        $addressData = (new CepService())->getAddress($request->zip_code);
        $this->enderecoService->createEndereco($user, array_merge($addressData, [
            'number' => $request->number,
            'zip_code' => $request->zip_code,
        ]));

        return redirect()->route('home');
    }
}
