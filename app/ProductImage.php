<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    //$productImage->product
    public function product()
    {
        return $this->belongsTo(Product::class); //La imagen pertenece a un producto determinado
    }
    
    //accesor
    public function getUrlAttribute()
    {
        if (substr($this->image, 0, 4) === "http"){
            return $this->image;
        }
        
        return '/images/products/' . $this->image;
    }
}
