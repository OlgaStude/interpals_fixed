<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class posts extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'lang',
        'text'
    ];

    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
