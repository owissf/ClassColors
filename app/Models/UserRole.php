<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    use HasFactory;

    protected $guarded  = [];

    protected $fillable = ['user_id' , 'role_id'];

    public function clubs()
    {
        return $this->belongsToMany(Club::class,'userrole_clubs' ,'club_id' , 'userrole_id' );
    }
    public function colors()
    {
        return $this->belongsToMany(Color::class,'userrole_colors','color_id','userrole_id');
    }
}
