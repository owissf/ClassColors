<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perm extends Model
{
    use HasFactory;

    protected $guarded  = [];

    protected $fillable = ['perm'];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_perms' )->withPivot('id');
    }

}
