<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Card;
use App\Models\Session;
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

        Session::factory()->create();

        \App\Models\User::factory(2)->sequence(
            [
                'name' => 'First',
                'email' => 'first@admin.com',
            ],
            [
                'name' => 'Second',
                'email' => 'second@admin.com',
            ],
        )->create();
    }
}
