<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogMessage extends Model
{
    protected $fillable = ['chat_id', 'message_id'];
}
