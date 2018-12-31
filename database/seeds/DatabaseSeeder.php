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
         $this->call(DemoTableSeeder::class);
    }
}
class manageTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('manage')->insert([
            array('name' => 'Nguyễn Sỹ Lê', 'age' => 25, 'email' => 'lek57v@gmail.com'),
            array('name' => 'Nguyễn Nam Anh', 'age' => 20, 'email' => 'namanh@gmail.com'),
            array('name' => 'Trần Văn Sỹ', 'age' => 23, 'email' => 'vansy@gmail.com'),
            array('name' => 'Đinh Công Sáng', 'age' => 26, 'email' => 'sangdc@gmail.com'),
            array('name' => 'Nhung Bùi', 'age' => 22, 'email' => 'nhungbt@gmail.com'),
        ]);
    }
}
class CategoryTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('category')->insert([
            array('name' => 'ô tô'),
            array('name' => 'xe máy')
        ]);
    }
}
class ProductTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('products')->insert([
            array('name' => 'jsion', 'gia' => '20', 'cate_id' => '2')
        ]);
    }
}
class CateSexTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('cate_sex')->insert([
            array('sex' => 'nam'),
            array('sex' => 'nữ')
        ]);
    }
}
class infoTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('info')->insert([
            array('name' => 'Nguyễn Tuấn Anh', 'cate_id' => 1),
            array('name' => 'Nguyễn Văn An', 'cate_id' => 1),
            array('name' => 'Nguyễn Ngọc Thiện', 'cate_id' => 1),
            array('name' => 'Nguyễn Hoài Thương', 'cate_id' => 2),
            array('name' => 'Nguyễn Hoài Ngọc', 'cate_id' => 2)
        ]);
    }
}
class imagesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('images')->insert([
            array('name' => 'vision_img_01.png', 'product_id' => 6),
            array('name' => 'vision_img_02.png', 'product_id' => 6),
            array('name' => 'vision_img_03.png', 'product_id' => 6),
            array('name' => 'vision_img_04.png', 'product_id' => 6),
            array('name' => 'huyndai_img_01.png', 'product_id' => 8),
            array('name' => 'huyndai_img_02.png', 'product_id' => 8),
            array('name' => 'huyndai_img_03.png', 'product_id' => 8),
            array('name' => 'huyndai_img_04.png', 'product_id' => 8)
        ]);
    }
}
class carsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('cars')->insert([
            array('name' => 'huyndai', 'price' => 600),
            array('name' => 'ferari', 'price' => 1200),
            array('name' => 'honda', 'price' => 800),
            array('name' => 'camry', 'price' => 900),
            array('name' => 'toyota', 'price' => 1000)
        ]);
    }
}
class colorsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('colors')->insert([
            array('name' => 'red'),
            array('name' => 'green'),
            array('name' => 'yellow')
        ]);
    }
}
class carColorTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('car_color')->insert([
            array('cars_id' => 1, 'colors_id' => 2),
            array('cars_id' => 2, 'colors_id' => 2),
            array('cars_id' => 4, 'colors_id' => 1),
            array('cars_id' => 5, 'colors_id' => 3),
            array('cars_id' => 3, 'colors_id' => 2),
            array('cars_id' => 2, 'colors_id' => 1),
        ]);
    }
}
class DemoTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('demo_users')->insert([
            array('name' => 'admin', 'email' => 'admin@gmail.com' , 'password' => bcrypt('123456')),
            array('name' => 'ttthang', 'email' => 'ttthang@gmail.com' , 'password' => bcrypt('123456')),
            array('name' => 'ngngoc', 'email' => 'ngngoc@gmail.com' , 'password' => bcrypt('123456'))
        ]);
    }
}
