<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        $this->call(UsersTableSeeder::class);
        $this->call(ProblemsTableSeeder::class);
        $this->call(TypesTableSeeder::class);
        $this->call(ClientsTableSeeder::class);
       // $this->call(ParametersTableSeeder::class);
        $this->call(RefrigerantsTableSeeder::class);
      //  $this->call(PostsTableSeeder::class);
        
    }
}
