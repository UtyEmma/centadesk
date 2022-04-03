<?php

namespace Database\Seeders;

use App\Library\Token;
use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DefaultAdminSeeder extends Seeder{

    public function __construct(){
        return $this->run();
    }

    public function run() {
        $this->createDefaultAdmin();
    }

    private function createDefaultAdmin(){
        $unique_id = Token::unique('admins');
        $password = "admin@1234";
        $email = 'admin@centadesk.com';
        $name = 'John Grisham';
        if(!Admin::where('email', $email)->first()){
            Admin::create([
                'unique_id' => $unique_id,
                'name' => $name,
                'email' => $email,
                'role' => 'administrator',
                'password' => Hash::make($password),
            ]);
        }
    }
}
