<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model{
    use HasFactory;

    protected $fillable = ['unique_id', 'base_currency', 'charges', 'app_name', 'rave_public_key', 'rave_secret_key', 'rave_api_base_url', 'paystack_base_url', 'paystack_secret', 'paystack_public', 'cloudinary_url', 'facebook_client_id', 'facebook_client_secret', 'facebook_redirect_uri', 'google_client_id', 'google_client_secret', 'google_redirect_uri', 'exchangerate_api_url', 'referal_bonus', 'withdrawal_day_count'];

    protected $primaryKey = 'unique_id';
    protected $keyType = 'string';
    public $incrementing = false;
}
