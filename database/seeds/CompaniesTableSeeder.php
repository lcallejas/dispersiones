<?php

use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            'name' => 'Empresa 1',
            'disperser' => '0',
        ]);
        DB::table('companies')->insert([
            'name' => 'Empresa 2',
            'disperser' => '0',
        ]);
        DB::table('companies')->insert([
            'name' => 'Dispersora 1',
            'disperser' => '1',
        ]);
        DB::table('companies')->insert([
            'name' => 'Dispersora 2',
            'disperser' => '1',
        ]);
    }
}
