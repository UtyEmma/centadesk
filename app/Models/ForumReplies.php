<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForumReplies extends Model{
    use HasFactory;

    protected $fillable = ['unique_id', 'sender_id', 'message_id', 'message', 'batch_id' ];

    protected $primaryKey = 'unique_id';
    protected $keyType = 'string';
    public $incrementing = false;

}
