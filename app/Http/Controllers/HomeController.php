<?php

namespace App\Http\Controllers;
use App\categories;
use App\products;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $cate = categories::all();
        $productHot = products::all()->take(4);
        $product = products::paginate(8);
        return view('page.index', compact('cate', 'productHot', 'product'));
    }
    public function getProduct($slug){
        $idd = explode('-', $slug);
        //print_r($id);
        $key = count($idd);
        $id = $idd[$key-1];
        $product = products::find($id);
        if (!$product){
            return abort(404);
        }
        else{
            return view('page.product', compact('product'));
        }


    }

    public function getProductCategories(){
           $productCat = Categories::with('products')->get();
        return Response()->json($productCat)->header('Content-Type', 'text/plain');
    }
}
