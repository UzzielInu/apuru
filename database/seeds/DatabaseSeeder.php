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
      $this->call('OperativeSystemSeeder');
      $this->command->info('OS have been created!');
    }
}
