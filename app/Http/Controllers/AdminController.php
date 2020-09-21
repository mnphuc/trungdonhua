<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\categories;
class AdminController extends Controller
{
    //
    public function index(){

        return view('admin.page.index');
    }
    public function getCategories(){
        $categories = categories::all();
        return view('admin.page.categories', ['categories' => $categories]);
    }
}
