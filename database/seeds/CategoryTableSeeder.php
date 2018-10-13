<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= 5; $i++) { 
            $category = new CCLV\Models\Category(
            [
                'nombre'=>'Categoria '. $i
            ]);
            $category->save();
        }
    }
}
