<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ProductController extends Controller
{
    public function addProducts()
    {
        $products=[
            ["name"=>"Téléphone"],
            ["name"=>"Tablette"],
            ["name"=>"Ordinateur"],
            ["name"=>"Montre"],
            ["name"=>"Télévision"],
            ["name"=>"Onduleur"],
        ];
        Product::insert($products);
        return "Produits insérés avec succès!";
    }

    public function search()
    {
        return view('search');
    }
    public function autocomplete(Request $request)
    {
        $datas= Product::select("name")
        ->where("name","LIKE","%{$request->terms}%")
        ->get();
        return Response::json($datas);
    }
}
