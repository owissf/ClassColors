<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolePerm extends Model
{
    use HasFactory;

    protected $guarded  = [];

    protected $fillable = ['role_id' , 'perm_id'];

}
