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
        DB::table('users')->insert([
			'name' => 'Theo',
			'email' => 'merchadou@bmvcom.eu',
			'password' => bcrypt('mdp')
        ]);
        
        factory(App\Models\Billet::class, 5)->create();
        factory(App\Models\Commentaire::class, 25)->create();
    }
}
