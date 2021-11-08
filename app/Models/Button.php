<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Button extends Model
{
    use HasFactory;
    protected $guarded  = [];
    protected $fillable = ['namebutton','score','color_id'];
    public function colors()
    {
        return $this->belongsTo(Color::class, 'color_id');
    }
}
