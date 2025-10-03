<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Don't forget to pray before you start coding!
        \App\Models\Person::factory()->count(50)->create();
    }
}
