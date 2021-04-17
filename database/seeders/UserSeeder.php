<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'username' => 'admin',
            'email' => 'admin@web3.test',
            'auth' => 9,
        ]);

        User::factory()->create([
            'username' => 'moderator',
            'email' => 'moderator@web3.test',
            'auth' => 1,
        ]);
        User::factory(50)->create();
    }
}
