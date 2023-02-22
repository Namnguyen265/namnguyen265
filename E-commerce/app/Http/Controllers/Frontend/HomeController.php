<?php

namespace App\Http\Controllers\Frontend;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //


    public function index()
    {
        $product = Product::orderBy('created_at', 'ASC')->take(12)->get();
        // dd($product);
        // $product = Peod
        $most_sold_product = Product::orderBy('product_revenue', 'DESC')->take(3)->get();
        $most_sold_product_2 = Product::orderBy('product_revenue', 'DESC')->skip(3)->take(3)->get();
        $category = Category::all();
        $brand = Brand::all();
        // dd($category);
        
        $tongsp = 0;
        if (!session('cart'))
        {
            $tongsp = 0;
        }
        else
        {
            foreach(session('cart') as $key => $value)
            {
                $tongsp = $tongsp + $value['qty'];
            }
        }
        return view('frontend.index.index', compact('product', 'category', 'brand','tongsp', 'most_sold_product', 'most_sold_product_2'));
    }
}
