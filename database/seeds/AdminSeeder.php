<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;
use Faker\Generator as Faker;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User ::create([
            'name'=> 'oussama',
            'email'=>'ayad.oussama@gmail.com',
            'telp'=> '4568765678',
            'ville' =>'oujda',
            'image'=> 'iiiii.jpg',
            'email_verified_at' => now(),
            'password' => Hash::make('admin'),
            'remember_token' => Str::random(10),
            'admin' => 1
        ]);
    }
}
