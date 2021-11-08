<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clubcolorsStudent extends Model
{
    use HasFactory;

    protected $fillable = ['clubcolor_id','student_id'];
}
