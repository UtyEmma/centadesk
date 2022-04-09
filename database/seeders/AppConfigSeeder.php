<?php

namespace Database\Seeders;

use App\Library\Token;
use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AppConfigSeeder extends Seeder{

    function __construct(){
        return $this->run();
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        $settings = Setting::all();

        if(!(count($settings) > 0)) {
            $unique_id = Token::unique('settings');
            Setting::create([
                'unique_id' => $unique_id,
                'base_currency' => env('DEFAULT_CURRENCY'),
                'charges' => env('DEFAULT_CHARGE'),
                'app_name' => env('APP_NAME'),
                'rave_public_key' => env('RAVE_PUBLIC_KEY'),
                'rave_secret_key' => env('RAVE_SECRET_KEY'),
                'rave_api_base_url' => env('RAVE_API_BASE_URL'),
                'paystack_base_url' => env('PAYSTACK_BASE_URL'),
                'paystack_secret' => env('PAYSTACK_SECRET'),
                'paystack_public' => env('PAYSTACK_PUBLIC'),
                'cloudinary_url' => env('CLOUDINARY_URL'),
                'facebook_client_id' => env('FACEBOOK_CLIENT_ID'),
                'facebook_client_secret' => env('FACEBOOK_CLIENT_SECRET'),
                'facebook_redirect_uri' => env('FACEBOOK_REDIRECT_URI'),
                'google_client_id' => env('GOOGLE_CLIENT_ID'),
                'google_client_secret' => env('GOOGLE_CLIENT_SECRET'),
                'google_redirect_uri' => env('GOOGLE_REDIRECT_URI'),
                'exchangerate_api_url' => env('EXCHANGERATE_API_URL'),
                'referal_bonus' => env('REFERAL_BONUS')
            ]);
        };
    }
}
