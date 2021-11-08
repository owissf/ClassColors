<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    use HasFactory;

    protected $guarded  = [];


    public function colors()
    {
        return $this->belongsToMany(Color::class,'club_colors','club_id','color_id')->withPivot('id');
    }

    public function userrs()
    {
        return $this->belongsTo(User::class, 'user_id')->withPivot('id');
    }
    public function users()
    {
        return $this->belongsToMany(User::class,'user_clubs','club_id','user_id')->withPivot('id');
    }

}
