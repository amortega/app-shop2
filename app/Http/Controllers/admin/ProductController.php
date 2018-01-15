<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function index() //Listado de productos, opcion de editarlo y eliminarlo
    {
        $products = Product::paginate(10);
        return view('admin.products.index')->with(compact('products')); //Listado de productos
    }
    
    public function create()
    {
        return view('admin.products.create'); //Formulario de registro
    }
    
    public function store(Request $request)
    {
        //validar
        $messages = [
            'name.required' => 'Es necesario ingresar un nombre para el producto.',
            'name.min' => 'El nombre del producto debe tener al menos 3 caracteres.',
            'description.required' => 'La descripción corta es un campo obligatorio.',
            'description.max' => 'La descripción corta admite hasta 200 caracteres como máximo.',
            'price.required' => 'Es obligatorio definir un precio para el producto.',
            'price.numeric' => 'Ingrese un precio válido.',
            'price.min' => 'No se admiten valores negativos.'
        ];
        
        $rules = [
            'name' => 'required|min:3', //que sea requerido y que tenga al menos 3 caracteres
            'description' => 'required|max:200', //que sea requerido y como maximo debe tener 200 caracteres
            'price' => 'required|numeric|min:0' //que sea requerido, numerico y que NO sea negativo
        ];
        
        $this->validate($request, $rules, $messages );
        
        //Registrar nuevo producto en la base de datos
        //dd($request->all());
        $product = new Product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->long_description = $request->input('long_description');
        $product->save(); //EJECUTA INSERT SOBRE LA TABLA DE PRODUCTS
        
        return redirect('/admin/products');
    }
    
    public function edit($id)
    {
        //return "Mostrar aqui el form de edicion para el producto con id $id";
        $product = Product::find($id);
        return view('admin.products.edit')->with(compact('product')); //Formulario de Edicion
    }
    
   public function update(Request $request, $id)
    {
        //validar
        $messages = [
            'name.required' => 'Es necesario ingresar un nombre para el producto.',
            'name.min' => 'El nombre del producto debe tener al menos 3 caracteres.',
            'description.required' => 'La descripción corta es un campo obligatorio.',
            'description.max' => 'La descripción corta admite hasta 200 caracteres como máximo.',
            'price.required' => 'Es obligatorio definir un precio para el producto.',
            'price.numeric' => 'Ingrese un precio válido.',
            'price.min' => 'No se admiten valores negativos.'
        ];
        
        $rules = [
            'name' => 'required|min:3', //que sea requerido y que tenga al menos 3 caracteres
            'description' => 'required|max:200', //que sea requerido y como maximo debe tener 200 caracteres
            'price' => 'required|numeric|min:0' //que sea requerido, numerico y que NO sea negativo
        ];
        
        $this->validate($request, $rules, $messages );
        
        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->long_description = $request->input('long_description');
        $product->save(); //EJECUTA UPDATE SOBRE LA TABLA DE PRODUCTS
        
        return redirect('/admin/products');
    }
    
    public function destroy($id)
    {
        $product = Product::find($id); 
        $product->delete(); //EJECUTA DELETE
        
        return back();
    }
    
    
    
    
    
}
