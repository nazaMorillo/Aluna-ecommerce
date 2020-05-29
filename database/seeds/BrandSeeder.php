<?php

use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('brands')->insert([
            'name' => 'Samsung',
        ]);
        DB::table('brands')->insert([
            'name' => 'Motorola',
        ]);
        DB::table('brands')->insert([
            'name' => 'Toyota',
        ]);
        DB::table('brands')->insert([
            'name' => 'Xiaomi',
        ]);
        DB::table('brands')->insert([
            'name' => 'Huawei',
        ]);
        DB::table('brands')->insert([
            'name' => 'Peugeot',
        ]);
    }
}
