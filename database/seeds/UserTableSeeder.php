<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create([
            'nome' => 'Thiago',
            'email' => 'thiagops7@gmail.com',
            'password' => bcrypt(123456),
            'remember_token' => str_random(10),
            'level' => 3
        ]);
    }
}
