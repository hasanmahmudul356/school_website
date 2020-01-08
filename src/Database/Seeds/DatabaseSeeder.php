<?php
use Illuminate\Database\Seeder;
use Tmss\School_website\Database\Seeds\WebsiteConfigSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(WebsiteConfigSeeder::class);
    }
}