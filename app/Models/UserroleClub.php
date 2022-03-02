<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserroleClub extends Model
{
    use HasFactory;

    protected $guarded  = [];

    protected $fillable = ['club_id' , 'userrole_id'];
}
