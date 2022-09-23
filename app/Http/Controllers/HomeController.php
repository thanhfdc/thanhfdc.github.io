<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Slider;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
  public function index(){
   $sliders = Slider::latest()->get();
   $categorys = Category::where('parent_id',0)->get();
   $products = Product::latest()->take(6)->get();
     return view('home.home',compact('sliders', 'categorys','products'));
  }
 
public function detail($id){
  $categorys = Category::where('parent_id',0)->get();
  $product = Product::find($id);
  
  $categories = Category::find($product->category_id);
  $comment = Comment::where('comment_product_id',$product)->get();
  
   return view('product.detail',compact('categorys','categories','product','comment'));
}
public function search(Request $request){
  $categorys = Category::where('parent_id',0)->get();
  $products = Product::latest()->take(6)->get();
  $keyword = $request->search;
  $search_product = DB::table('products')->where('name','like','%'.$keyword.'%')->get();
  return view('product.search',compact('categorys','products','search_product'));
}


}
