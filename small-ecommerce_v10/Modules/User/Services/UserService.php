<?php

namespace Modules\User\Services;

use App\Helpers\ResponseJson;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Modules\User\Entities\User;
use Modules\User\Repositories\Repository\UserRepository;
use Str;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserService
{
    protected $userRepo;
    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }
    public function findUserById($id)
    {
        return $this->userRepo->find($id);
    }
}
