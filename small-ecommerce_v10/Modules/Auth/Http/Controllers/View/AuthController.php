<?php

namespace Modules\Auth\Http\Controllers\View;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\User\Repositories\Repository\UserRepository;
use Modules\User\Services\UserService;

class AuthController extends Controller
{
    protected $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    /**
     * Display a listing of the resource.
     */
    public function login()
    {
        return view('auth::login');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function register()
    {
        return view('auth::register');
    }
    public function verifyAccountEmail(string $id)
    {
        $user = $this->userService->findUserById($id);
        if(isset($user))
        {
            if(isset($user->email_verified_at))
                return view("auth::error-verify-account-email",[
                    "error"=>"This account has been previously verified"
            ]);
            return view('auth::verify-account-email');
        }
        return view("auth::error-verify-account-email",[
                    "error"=>"Account does not exist"
                ]);
    }
}
