<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('category')->insert([
            'name' => 'Celulares'
        ]);
        DB::table('category')->insert([
            'name' => 'Automóviles'
        ]);
        DB::table('category')->insert([
            'name' => 'Televisores'
        ]);
        DB::table('category')->insert([
            'name' => 'Sonido'
        ]);
    }
}
