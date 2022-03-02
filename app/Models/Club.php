<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    use HasFactory;

    protected $guarded  = [];

    protected $fillable = [
        'name',
        'image',
        'user_id',
    ];

    public function colors()
    {
        return $this->belongsToMany(Color::class,'club_colors','club_id','color_id')->withPivot('id');
    }

    public function usersadmin()
    {
        return $this->belongsTo(User::class, 'user_id')->withPivot('id');
    }
    public function users()
    {
        return $this->belongsToMany(User::class,'user_clubs','club_id','user_id')->withPivot('id');
    }
    public function roles()
    {
        return $this->hasMany(Role::class);
    }
    public function userroles()
    {
        return $this->belongsToMany(UserRole::class,'userrole_clubs','club_id' , 'userrole_id');
    }

}
