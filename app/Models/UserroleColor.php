<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserroleColor extends Model
{
    use HasFactory;

    protected $guarded  = [];

    protected $fillable = ['color_id' , 'userrole_id'];
}
