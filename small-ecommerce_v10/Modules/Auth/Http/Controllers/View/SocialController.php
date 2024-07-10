<?php

namespace Modules\Auth\Http\Controllers\View;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Modules\Auth\Services\SocialService;
use Tymon\JWTAuth\Facades\JWTAuth;

class SocialController extends Controller
{
    protected $socialService;
    public function __construct(SocialService $socialService)
    {
        $this->socialService = $socialService;
    }
    public function loginCallback($drive, Request $request)
    {
        $token = $this->socialService->loginCallback($drive, $request);
        $url = Session::pull(config("app.URL_INTENDED",'url_intended')) ?? config('app.url_default');
        return redirect($url)->withCookie("token",$token,JWTAuth::factory()->getTTL());
    }
}
