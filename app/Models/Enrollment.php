<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Enrollment extends Model{
    use HasFactory, SoftDeletes;

    protected $fillable = ['unique_id', 'batch_id', 'course_id', 'student_id', 'mentor_id', 'transaction_id'];

    protected $primaryKey = 'unique_id';
    protected $keyType = 'string';
    public $incrementing = false;

    public function student(){
        return $this->belongsTo(User::class, 'student_id', 'unique_id');
    }

    public function batch(){
        return $this->hasOne(Batch::class, 'batch_id', 'unique_id');
    }

}
