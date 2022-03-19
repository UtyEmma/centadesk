<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $fillable = [ 'unique_id', 'email', 'firstname', 'lastname', 'account_name', 'account_no', 'bank', 'payment_method', 'crypto_address', 'specialties', 'interests', 'role', 'status', 'password', 'kyc_status', 'kyc_method', 'balance', 'affiliate_id', 'city', 'state', 'country', 'experience','qualification'];

    protected $primaryKey = 'unique_id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $attributes = [
        'total_batches' => 0,
        'total_courses' => 0,
        'total_reviews' => 0,
        'earnings' => 0,
        'avg_rating' => 1,
        'kyc_status' => 'pending',
        'role' => 'user',
        'is_verified' => false,
        'status' => true
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function courses (){
        return $this->hasMany(Courses::class, 'mentor_id', 'unique_id');
    }
}
