<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    protected $guarded  = [];
    public function clubs()
    {
        return $this->belongsToMany(Club::class, 'club_colors')->withPivot('id');
    }

    public function buttons()
    {
        return $this->hasMany(Button::class, 'color_id');
    }
    public function users()
    {
        return $this->belongsToMany(User::class,'user_colors','color_id','user_id')->withPivot('id');
    }


}
