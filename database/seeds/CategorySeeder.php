<?php

use Illuminate\Database\Seeder;
use App\Category;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private static $list = [
        'Yangiliklar uchun',
        'Ma`lumotlar',
        'Texnologiyalar'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(self::$list as $item)
        {
            Category::create([
                'name' => $item,
                'slug' => str_slug($item, '-')
            ]);
        }
    }
}
