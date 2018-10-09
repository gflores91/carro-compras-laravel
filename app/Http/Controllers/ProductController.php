<?php

namespace CCLV\Http\Controllers;

use Illuminate\Http\Request;

//Librerias
use Auth;

//Models
use CCLV\Models\Cart;
use CCLV\Models\Product;
use CCLV\Models\Category;
use CCLV\Models\Order;
use CCLV\Models\Brand;

class ProductController extends Controller
{
    //Page: Inicio
    //route: product.index
    //params:
    //Models: CCLV\Models\Product
    //        CCLV\Models\Category
    //        CCLV\Models\Brand
    //return: $ofertas, $categorias, $marcas, $products -> views/shop/index
    public function index()
    {
        $user = Auth::user();
        $ofertas = Product::where('oferta',1)->get();
        $categorias = Category::with('marcas')->get();
        $marcas = Brand::with('productos')->get();
        $products = Product::with('imagenes')->orderBy('id','DESC')->take(6)->get();

        return view('home.index',[
            'ofertas' => $ofertas,
            'categorias' => $categorias,
            'marcas' => $marcas,
            'products' => $products
            ]);
    }
}
