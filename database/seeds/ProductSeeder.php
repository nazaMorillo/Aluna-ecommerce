<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('products')->insert([
            'image' => 'A10.jpg',
            'name' => 'Samsung A10',
            'description' => 'Pantalla Infinity-V IPS de 6,2 pulgadas, resolución HD+ y relación de aspecto 19,5:9
            Procesador Exynos 7884, octa core a 1,6 GHz
            2 GB de memoria RAM',
            'price' => 17999.00,
            'stock' => 200,
            'brand_id' => 1,
            'category_id' => 1,
        ]);
        DB::table('products')->insert([
            'image' => 'S20.jpg',
            'name' => 'Samsung S20',
            'description' => 'Dynamic AMOLED
6,2 pulgadas
QHD+ 563 ppp
120 Hz
HDR10+
Exynos 990
7nm, 64 bits
Octa-core (2,73 + 2,6 + 2 GHz)
Ram 8/12 GB LPDDR5',
            'price' => 142319.52,
            'stock' => 10,
            'brand_id' => 1,
            'category_id' => 1,
        ]);
        DB::table('products')->insert([
            'image' => 'Flat4KUHDSerie7.jpg',
            'name' => 'Samsung Flat 4K UHD Serie 7',
            'description' => '4K UHD PROCESSOR: Powerful 4K UHD processor optimizes your TV’s performance by upscaling every show, season, and scene with 4K picture quality',
            'price' => 90000.00,
            'stock' => 350,
            'brand_id' => 1,
            'category_id' => 3,
        ]);

        DB::table('products')->insert([
            'image' => 'G7.jpg',
            'name' => 'Motorola G7',
            'description' => 'Pantalla: 6.2 pulgadas (2,270x1,080 con 403ppp)
            Procesador: Snapdragon 632 (1.8GHz)
            Dimensiones: 157x75.3x8mm
            Almacenamiento: 64GB
            Memoria RAM: 4GB',
            'price' => 34999.00,
            'stock' => 100,
            'brand_id' => 2,
            'category_id' => 1,
        ]);
        DB::table('products')->insert([
            'image' => 'Pulse200Bass.jpg',
            'name' => 'Motorola Pulse 200 Bass',
            'description' => 'Los auricular Motorola Pulse 200 Bass Over Ear Negro con altavoces de 40mm con graves mejorados. Sonido de la alta calidad. Aislamiento del ruido ambiental. Ultra ligero. Orejas giratorias.',
            'price' => 2000.00,
            'stock' => 3000,
            'brand_id' => 2,
            'category_id' => 4,
        ]);
        DB::table('products')->insert([
            'image' => 'RN8.jpg',
            'name' => 'Xiaomi Redmi Note 8',
            'description' => 'Almacenamiento: Memoria interna 64GB
            RAM 4GB
            Procesador: Snapdragon 665
            Pantalla: IPS LCD 6,3" FHD
            Cámara trasera: 48 MP',
            'price' => 42384.00,
            'stock' => 500,
            'brand_id' => 4,
            'category_id' => 1,
        ]);
        DB::table('products')->insert([
            'image' => 'MiTrueEarbudsAirdots.jpg',
            'name' => 'Xiaomi Mi True Earbuds Airdots',
            'description' => 'Tipo: In-Ear
Bluetooth: 5.0 HFP / A2DP / HSP / AVRCP
Distancia alcance: 10 metros (espacio abierto accesible).
Control por voz: Sí
Batería: Hasta 4 horas de conversación y 12 horas en standby',
            'price' => 5500.00,
            'stock' => 1500,
            'brand_id' => 4,
            'category_id' => 4,
        ]);
        DB::table('products')->insert([
            'image' => 'P30.jpg',
            'name' => 'Huawei P30',
            'description' => 'Pantalla: 6.1 pulgadas (OLED plana), 2,340x1,080 pixeles
        Procesador: 2.6GHz Kirin 980 (ocho núcleos)
        Almacenamiento: 128GB, expandible mediante NM de Huawei
        RAM: 6GB',
            'price' => 75000.00,
            'stock' => 1,
            'brand_id' => 5,
            'category_id' => 1,
        ]);
        DB::table('products')->insert([
            'image' => 'Corolla.jpg',
            'name' => 'Toyota Corolla',
            'description' => 'Longitud: 3945 mm
            Ancho: 1506 mm
            Altura: 1346 mm
            Distancia entre ejes: 2335 mm',
            'price' => 1474000.00,
            'stock' => 3,
            'brand_id' => 3,
            'category_id' => 2,
        ]);
        DB::table('products')->insert([
            'image' => '3008.jpg',
            'name' => 'Peugeot 3008',
            'description' => 'CARROCERÍA: SUV
            PUERTAS: 5
            PLAZAS: 5
            POTENCIA: 130 - 180 cv
            CONSUMO: 4,2 - 5,8 l/100km
            MALETERO: 520 litros',
            'price' => 3027000.00,
            'stock' => 5,
            'brand_id' => 6,
            'category_id' => 2,
        ]);
    }
}
