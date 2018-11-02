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
      $this->call('TypeSeeder');
      $this->command->info('Type have been created!');
      $this->call('ModelDeviceSeeder');
      $this->command->info('ModelDevice have been created!');
      $this->call('LocationSeeder');
      $this->command->info('Location have been created!');
      $this->call('AntivirusSeeder');
      $this->command->info('Antivirus have been created!');
      $this->call('ServiceSeeder');
      $this->command->info('Service have been created!');
    }
}
