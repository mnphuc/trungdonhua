<?php

namespace App\Http\Controllers;
use App\categories;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    //
    public function upload(Request $Request)
    {
        echo $Request->upload;
//        $ProjectID=$Request->get('ProjectID');
//        $filename = $Request->DocumentFile->getClientOriginalName();
//
//        $Request->DocumentFile->storeAs('/public/projects/'.$ProjectID.'/files',$filename);
//
//        return response()->json(['success'=>'done']);

    }
    public function getCategories(){
        $categories =  categories::all();
        $data = json_decode($categories);
        return Response()->json($data)->header('Content-Type', 'text/plain');
    }
}
