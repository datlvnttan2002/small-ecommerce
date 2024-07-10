<?php

namespace Modules\Mailer\Services;

use Carbon\Carbon;
use Modules\Mailer\Emails\AutomaticMassEmail;
use Modules\Mailer\Jobs\AutomaticMassEmailJob;
use Modules\User\Entities\User;
use Modules\User\Repositories\Repository\UserRepository;
use Str;

class MailService
{
    protected $UserRepo;
    public function __construct(UserRepository $userRepo)
    {
        $this->UserRepo = $userRepo;
    }
    public function resendEmailVerify(string $id)
    {
        // $user = User::find($id);
        $user = $this->UserRepo->find($id);
        // return $user;
        if(isset($user))
        {
            $otp_renew_at = Carbon::parse($user->otp_renew_at)->addMinutes();
            if ($otp_renew_at->greaterThan(now()))
                return false;
            $otp = str(rand(100000, 999999));
            $update = $this->UserRepo->update($id,[
                "OTP" => $otp,
                "otp_renew_at" => Carbon::now()
            ]);
            if ($update)
            {
                $this->sendEmailVerify($user->email,$user->fullname,$otp);
                return True;
            }
        }
        return False;

    }
    public function sendEmailVerify($email,$fullname, $otp)
    {
        AutomaticMassEmailJob::dispatch($email,$fullname,"Xác thực email của bạn","mailer::verify",[
            "otp"=>$otp,
        ]);
    }
    public function checkOTPCode($id,$otpCode)
    {
        $user = $this->UserRepo->find($id);
        if(isset($user))
        {
            $otp_renew_at = Carbon::parse($user->otp_renew_at)->addMinutes(10);
            if ($otp_renew_at->greaterThan(now()))
            {
                if($user->OTP === $otpCode)
                {
                    $this->UserRepo->update($id,[
                        "email_verified_at" => Carbon::now(),
                        "OTP" => null,
                        "otp_renew_at" => null
                    ]);
                    return 1; //successful authentication
                }
                return 0; //OTP code is incorrect
            }
            return -1; //OTP expired
        }
        return -2; //User not found
    }
}
