<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Messages extends Model{
    use HasFactory;

    protected $fillable = ['unique_id', 'batch_id', 'sender_id', 'message' ];

    protected $primaryKey = 'unique_id';
    protected $keyType = 'string';
    public $incrementing = false;

    function batch(){
        return $this->belongsTo(Batch::class, 'batch_id', 'unique_id');
    }

    function user(){
        return $this->belongsTo(User::class, 'sender_id', 'unique_id');
    }
}
