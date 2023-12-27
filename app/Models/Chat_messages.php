<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat_messages extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_id',
        'reciewer_id',
        'message',
        'is_read'
    ];
}
