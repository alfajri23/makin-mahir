<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(UserSeeder::class);
        $this->call(ProdukVODSeeder::class);
        $this->call(ProdukKonsulSeeder::class);
        $this->call(ProdukEventSeeder::class);
        $this->call(BlogSeeder::class);
        $this->call(KomentarBlogSeeder::class);
    }
}
