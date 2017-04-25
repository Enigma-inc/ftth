<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    private $tables = [
        'surveys',
        'locations',
        'users'

    ];
    public function run()
    {
        //Clean Database
        Model::unguard();
        $this->cleanDatabase();

        //Seed Database
         $this->call(AllTablesSeeder::class);
    }
    public function cleanDatabase()
    {

        DB::statement("SET foreign_key_checks=0");
        foreach ($this->tables as $table) {
            DB::table($table)->truncate();
        }
        DB::statement("SET foreign_key_checks=1");

    }
}
