<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // $product->category
    public function category()
    {
        return $this->belongsTo(Category::class); //Un producto pertenece a una categoria
    }
    
    //$product->image
    public function images()
    {
        return $this->hasMany(ProductImage::class); //Un producto tiene muchas imagenes
    }
    
    //accesor para imagen destacada
    public function getFeaturedImageUrlAttribute()
    {
        $featuredImage = $this->images()->where('destacada', true)->first();
        
        if(!$featuredImage)
            $featuredImage = $this->images()->first();
        
        if ($featuredImage) {
            return $featuredImage->url; //url = Accesor definido en el modelo ProductImage
        }
        
        //default
        return '/images/products/default.jpg';
    }
}
