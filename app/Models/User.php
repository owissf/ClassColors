<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'admin',
        
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function clubsadmin()
    {
        return $this->hasMany(Club::class, 'user_id')->withPivot('id');
    }
    public function clubs()
    {
        return $this->belongsToMany(Club::class,'user_clubs')->withPivot('id');
    }
    public function colors()
    {
        return $this->belongsToMany(Color::class , 'user_colors')->withPivot('id');
    }
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_roles' , 'user_id' , 'role_id')->withPivot('id');
    }
    public function abils()
    {
        return $this->roles->map->perms->flatten()->pluck('perm')->unique();
    }

    public function praviteroles($club , $color)
    {
        $roles = [];
        $user = $this;
        if($club != null)
        {
            if($club != 'App\Models\Club')
            {
                $Club = Club::find($club);
                $userroles = $Club->userroles;
                $i = 0;
                foreach($userroles as $userrole)
                {
                    if($userrole->user_id != $user->id)
                    {
                        unset($userroles[$i]);
                    }
                    $i = $i + 1;
                }
                return $userroles;
            }
        }
        elseif($color != null)
        {
            $Color = Color::find($color);
            $userroles = $Color->userroles;
            $i = 0;
            foreach($userroles as $userrole)
            {
                if($userrole->user_id != $user->id)
                {
                    unset($userroles[$i]);
                }
                $i = $i + 1;
            }
            return $userroles;
        }
    }
}
