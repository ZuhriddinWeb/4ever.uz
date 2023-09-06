<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;
use DB;
use Hash;
use App\Models\Category;
use App\Models\Products;
use App\Models\StartBonus;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    { 
        $this->call([
            MainSeeder::class,
            TestDataSeeder::class,
        ]);
    }
}
