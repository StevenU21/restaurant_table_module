<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Table;
use App\Models\Type;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Steven Ulloa',
            'email' => 'steven@gmail.com',
            'password' => 'steven@gmail.com'
        ]);

        Type::factory(100)->create();
        Client::factory(50)->create();
        Table::factory(100)->create();
    }
}
