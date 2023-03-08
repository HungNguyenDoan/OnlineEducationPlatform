<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'password',
        'first_name',
        'last_name',
        'dob',
        'phone_number',
        'email'
    ];
    public function classOwner()
    {
        return $this->hasMany(StudentClass::class, 'owner_id', 'id');
    }
    public function joinedClass()
    {
        return $this->belongsToMany(StudentClass::class);
    }
    private function oAuthAccessToken()
    {
        return $this->hasMany(OauthAccessToken::class);
    }
}
