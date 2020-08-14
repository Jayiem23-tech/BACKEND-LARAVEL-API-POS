<?php

namespace App\Http\Controllers;


use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str; 
use Illuminate\Http\Request; 
use App\Product; 
use App\Http\Resources\ProductCollection ; 
class ProductsController extends Controller
{
    public function save(Request $req){
 
        $data = $req->validate([
            "code"=>"required",
            "name"=>"required",
            "price"=>"required", 
            "categories_id"=>"",
        ]); 
    //     if ($req->hasFIle('picture')) {
    //         $data_image = $req->validate([
    //             "picture"=>"File|image"
    //         ]); 
    //     } 

    //     $image_64 = $req->picture; //your base64 encoded data  
    //     $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];   // .jpg .png .pdf
    //     $replace = substr($image_64, 0, strpos($image_64, ',')+1); 
      
    //   // find substring fro replace here eg: data:image/png;base64, 
    //    $image = str_replace($replace, '', $image_64);  
    //    $image = str_replace(' ', '+', $image);  
    //    $imageName = time().'.'.$req->picture_originalName; 
    //    Storage::disk('public')->put($imageName, base64_decode($image)); 
    //     // return response(base64_decode($image));


        // SAVING DATA 
        if ($req->id) {
            $products = Product::find($req->id);
        }else{
            $products = new Product;
        }  
        // $products->picture = $imageName;   
        $products->code = $req->code;
        $products->name = $req->name;
        $products->price = $req->price; 
        $products->categories_id = $req->categories_id; 
        $products->save(); 
        return product::all();  


        // http://127.0.0.1:8000/storage/uploads/download.png
    }

    public function delete(Request $req){ 
        $products = Product::find($req->id);
         
        $products->delete();
    }
    public function show(Request $req){

        $products = Product::all();
        return new ProductCollection($products);
    }

}
