<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Card;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Card::factory(8)->sequence(
            ['value' => '?'],
            ['value' => '1/2'],
            ['value' => '1'],
            ['value' => '2'],
            ['value' => '3'],
            ['value' => '4'],
            ['value' => '5'],
            ['value' => '∞'],
        )->create();

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
        ]);
    }
}
