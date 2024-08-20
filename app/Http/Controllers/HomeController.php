<?php

namespace App\Http\Controllers;

use App\Services\UserService;

class HomeController extends Controller
{
    protected $userService;

    /**
     * Construtor
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Exibe a página inicial com a lista de usuários
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $users = $this->userService->getAllUsers();
        return view('home', compact('users'));
    }
}
