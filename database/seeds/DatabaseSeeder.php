<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\factories\StudentFactory;

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

	        StudentSeeder::class,
	        
	    ]);
	}
}
