<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Scout\Searchable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Searchable;


    protected $fillable = [ 'unique_id', 'email', 'firstname', 'lastname', 'username', 'account_name', 'account_no', 'bank', 'payment_method', 'crypto_address', 'specialty', 'id_number', 'id_image', 'interests', 'role', 'status', 'password', 'kyc_status', 'kyc_method', 'avatar', 'affiliate_id', 'city', 'state', 'country', 'experience','qualification', 'approved', 'currency', 'referrer_id'];

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
        'is_verified' => 'not_verified',
        'status' => true,
        'approved' => false,
        'currency' => 'NGN'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function courses (){
        return $this->hasMany(Courses::class, 'mentor_id', 'unique_id');
    }

    public function wallet(){
        return $this->hasOne(Wallet::class, 'user_id', 'unique_id');
    }

    public function withdrawals(){
        return $this->hasMany(Withdrawal::class, 'user_id', 'unique_id');
    }

    public function deposits(){
        return $this->hasMany(Deposit::class, 'user_id', 'unique_id');
    }
}
