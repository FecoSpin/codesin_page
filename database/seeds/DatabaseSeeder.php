<?php

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
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $this->call(PostTableSeeder::class);
        $this->call(ContenidoInteresPostSeeder::class);
        $this->call(EstrategiasPostSeeder::class);
        $this->call(NoticiasPostSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(DepartamentosSeeder::class);
        $this->call(SectionTableSeeder::class);
        $this->call(staffTableSeeder::class);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}