<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class messagesDB extends Model
{
    protected $table = 'messages';
    protected $fillable = [
        'to', 'message_thread', 'gender', 'name'
    ];
}
