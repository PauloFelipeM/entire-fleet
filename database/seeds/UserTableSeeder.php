<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        factory(App\User::class)->create([
            'email' => 'admin@admin.com',
            'password' => '123456',
            'role' => 'admin'
        ]);
    }
}
