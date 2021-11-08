<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $guarded  = [];

    protected $fillable = ['role'];

    public function perms()
    {
        return $this->belongsToMany(Perm::class, 'role_perms' , 'role_id' , 'perm_id')->withPivot('id');
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_roles')->withPivot('id');
    }
}
