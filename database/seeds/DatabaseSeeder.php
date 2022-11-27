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
        $this->call('Niveau1');
        $this->call('Niveau2');
        $this->call('Niveau3');
        $this->call('Niveau4');
        $this->call('Niveau5');
        $this->call('Niveau6');
        $this->call('Niveau7');
        $this->call('Niveau8');
    }
}
