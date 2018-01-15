<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    //relacion entre modelos cart y user
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
    
    //accesor para cart_id
    public function getCartAttribute()
    {
        $cart = $this->carts()->where('status', 'Active')->first(); //Solicitamos la primera coincidencia del carrito que tenga el estatus active del usuario autenticado
        
        if ($cart)
            return $cart;
            
        //Else
        $cart = new Cart();
        $cart->status = 'Active';
        $cart->user_id = $this->id;
        $cart->save();
        
        return $cart;
        
    }
}























