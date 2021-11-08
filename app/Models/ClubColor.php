<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClubColor extends Model
{
    use HasFactory;

    protected $fillable = ['club_id','color_id'];

    public function students()
    {
        return $this->belongsToMany(Student::class, 'clubcolors_students','clubcolor_id', 'student_id');
    }
}
