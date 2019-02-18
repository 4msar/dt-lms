<?php

namespace App\Models;

use Route;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'email_verified_at', 'mobile_number', 'facebook_profile_id', 'linkedin_profile_id', 'google_id', 'avatar', 'designation', 'work_at', 'mailing_address', 'username', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function ucan($name, $action=null)
    {
        $roles = config('roles')[$this->role];
        
        $controller = ucfirst($name).'Controller';
        if($action == null){
            if(isset($roles[$controller]) && in_array(true, array_values($roles[$controller]))){
                return true;
            }
        }else{
            if(isset($roles[$controller][$action])){
                return $roles[$controller][$action];
            }
        }
        return false;
        
    }
}
