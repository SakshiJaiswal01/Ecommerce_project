<?php

namespace App\Http\Controllers;
use App\Models\banner;
use App\Models\categorie;
use App\Models\product;
use App\Models\user;
use Illuminate\Http\Request;

class bannercontroller extends Controller
{
    public function banner(Request $request){
        $banners=banner::all();
        return response()->json(["banners" => $banners]);
    }
    public function categorie(Request $request){
        $categories=categorie::all();
        return response()->json(["categories" => $categories]);
    }
    public function categoriebyid($id){
        $categories=product::all()->where('categorie_id',$id);
        return $categories;
    }
    public function product(Request $request){
        $products=product::all();
        return response()->json(["products" => $products]);
    }
    public function productdetail($id){
        $productdetails=product::all()->where('id', $id)->first();
        return response()->json(["productdetails" => $productdetails]);
    }
}
