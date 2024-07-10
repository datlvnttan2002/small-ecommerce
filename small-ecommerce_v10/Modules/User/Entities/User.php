<?php

namespace Modules\User\Entities;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Modules\User\Database\Factories\UserFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory;

      /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'id',
        'fullname',
        'nickname',
        'OTP',
        'phone_name',
        'email',
        'otp_renew_at',
        'provider_id',
        'password',
        'google_id',
        'email_verified_at'
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    protected static function newFactory(): UserFactory
    {
        return UserFactory::new();
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}