<?php

namespace App\Models;

use App\Library\DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Date;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Scout\Searchable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Searchable;


    protected $fillable = [ 'unique_id', 'email', 'firstname', 'lastname', 'username', 'account_name', 'account_no', 'bank', 'payment_method', 'crypto_address', 'specialty', 'id_number', 'id_image', 'interests', 'role', 'status', 'password', 'kyc_status', 'kyc_method', 'avatar', 'affiliate_id', 'city', 'state', 'country', 'experience','qualification', 'approved', 'currency', 'referrer_id', 'twitter', 'facebook', 'instagram', 'linkedin', 'desc'];

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

    public function enrolledBatches(){
        return Enrollment::where('student_id', $this->unique_id)
                            ->join('courses', 'courses.unique_id', 'enrollments.course_id')
                            ->join('batches', 'batches.unique_id', 'enrollments.batch_id')
                            ->join('users', 'users.unique_id', 'enrollments.mentor_id')
                            ->select('courses.name', 'courses.slug', 'courses.tags', 'users.firstname', 'users.lastname', 'users.username', 'batches.*')->get();
    }

    public function batches(){
        $enrolledBatches = $this->enrolledBatches();

        $ongoingBatches = $enrolledBatches->filter(function($value, $key){
                                return Date::parse($value->startdate)->lessThanOrEqualTo(Date::now()) && Date::parse($value->enddate)->greaterThanOrEqualTo(Date::now());
                            });

        $upcomingBatches = $enrolledBatches->filter(function($value, $key){
                                return Date::parse($value->startdate)->greaterThan(Date::now());
                            });

        $previousBatches = $enrolledBatches->filter(function($value, $key){
                                return Date::parse($value->enddate)->lessThan(Date::now());
                            });

        return [
            'upcoming' => $upcomingBatches->all(),
            'ongoing' => $ongoingBatches->all(),
            'previous' => $previousBatches->all()
        ];
    }

    public function previousClasses(){

    }
}
