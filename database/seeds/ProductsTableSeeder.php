<?php

use Illuminate\Database\Seeder;
use App\Product;
use App\Category;
use App\ProductImage;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Model factory
        /*factory(Category::class, 5)->create();
        factory(Product::class, 100)->create();
        factory(ProductImage::class, 200)->create();*/
        
        $categories = factory(Category::class, 4)->create(); //Creamos 5 categorias en la BD haciendo uso del modelo Category y la guardamos en $categories para tener referencia
        $categories->each(function ($category) {        //Para cada categoria solicitamos la creacion de 20 productos
            $products = factory(Product::class, 5)->make();
            $category->products()->saveMany($products);     //Luego guardamos esa relacion
            
            $products->each(function($p) {      //Iteramos sobre cada producto creado y solicitamos la creacion de 5 imagenes para cada uno
                $images = factory(ProductImage::class, 3)->make();      
                $p->images()->saveMany($images);    //Guardamos las imagenes en la BD (LA URL)
            }); 
        });
    }
}
