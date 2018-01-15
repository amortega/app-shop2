<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    //relacion entre el modelo cartDetail y el modelo producs
    public function product()
    {
        return $this->belongsTo(Product::class); //Un detalle de un shop cart pertenece a un producto
    }
}
