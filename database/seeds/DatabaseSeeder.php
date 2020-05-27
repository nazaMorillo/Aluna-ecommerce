<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Product;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
        //factory(Product::class)->times(20)->create();
        $this->call(ProductSeeder::class);
        $this->call(BrandSeeder::class);
        $this->call(CategorySeeder::class);
    }
}
