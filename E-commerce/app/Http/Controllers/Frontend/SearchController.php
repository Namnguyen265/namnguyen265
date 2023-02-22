<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;

class SearchController extends Controller
{
    //

    public function Search(Request $request)
    {
        $keyword = $request->keyword;
        $category = Category::all();
        $brand = Brand::all();
        $search_product = Product::where('name', 'like' , '%'.$keyword.'%')->get();
        
        // dd($search_product);
        if (count($search_product) != 0)
        {
            return view('frontend.search.search', compact('category', 'brand', 'search_product'));
        }
        else
        {
            return view('frontend.search.search', compact('category', 'brand','search_product'))->withErrors('Không có sản phẩm để hiển thị');

        }
    }

    public function Search_Advanced()
    {
        $category = Category::all();
        $brand = Brand::all();
    
        return view('frontend.search.search_advanced', compact('category', 'brand'));
    }

    public function Search_Advanced_Click(Request $request)
    {
        $category = Category::all();
        $brand = Brand::all();
        $id_category = (int)$request->category;
        // dd($request->name);
        $id_brand = (int)$request->brand;
        $name_product = $request->name;
        $id_status = (int)$request->status;
        // dd($status)
        $search_product = Product::query();
        if ($request->has('name'))
        {
            // dd($request->name);
            
            $search_product->where('name', 'like' , '%'.$name_product.'%')->get();
            // dd($search_product);
            // return view('frontend.search.search_advanced', compact('category', 'brand', 'category', 'search_product'));
        }
        
        
    
    

        if ($request->has('category'))
        {
            // dd($request->category);
            $search_product->where('id_category', $id_category);
            // return view('frontend.search.search_advanced', compact('category', 'brand', 'category'));

        }

        if ($request->has('brand'))
        {
            $search_product->where('id_brand', $id_brand );
        }

        if ($request->has('status'))
        {
            $search_product->where('status', $id_status );

        }
        
        if ($request->has('price'))
        {
            // dd($request->price);

            $array = explode('-', $request->price);
            $min = (int)$array[0];
            $max = (int)$array[1];
            $search_product->whereBetween('price', [$min, $max]);
        }

        $search_products = $search_product->get();
        // dd($search_products);
        if (count($search_products) != 0)
        {
        return view('frontend.search.search_advanced', compact('category', 'brand', 'search_products'));
        }
        else
        {
            return view('frontend.search.search_advanced', compact('category', 'brand','search_products'))->withErrors('Không có sản phẩm để hiển thị');
        }
        
            
        
        
    
        
        
    }

    public function Search_Price(Request $request)
    {
        $category = Category::all();
        $brand = Brand::all();
        $request->price;
        // var_dump($request->price);
        $arr = explode(':', $request->price);
        $min = (int)$arr[0];
        $max = (int)$arr[1];
        $search_product = Product::whereBetween('price', [$min , $max])->get();
        
        
        // echo '<pre>';
        // return (($search_product));
        
        return response()->json([
            'search_product' => $search_product
        ]);
        
        // foreach ($search_product as $key => $value)
        // {
        //     echo '<pre>';
        //     // echo ($search_product[$key]['price']);
        //     echo $search_prod
        // }
    }

    public function Product_By_Category(Request $request)
    {
        $id = (int)$request->id_category;
        
        $product = Product::join('category', 'product.id_category','=', 'category.id')->where('id_category', $id)->get()->toArray();
        // echo '<pre>';
        // var_dump($product);
        return response()->json([
            'product' => $product
        ]);
    }


    public function Product_Category($id)
    {
        $category  = Category::all();
        $brand = Brand::all();
        $prod = Product::where('id_category', (int)$id)->get();
        // dd($prod);
        // $prod = Product::join('category', 'product.id_category','=', 'category.id')->where('id_category', $id)->get()->toArray();
        // dd($prod)
        return view('frontend.index.product_by_category', compact('prod', 'category', 'brand'));
    }


    public function Product_Brand($id)
    {
        dd((int)$id);
        $category = Category::all();  dd($id);
        $brand = Brand::all();
        $product = Product::where('id_brand', (int)$id)->get();
        $most_sold_product = Product::orderBy('product_revenue', 'DESC')->take(3)->get();
        $most_sold_product_2 = Product::orderBy('product_revenue', 'DESC')->skip(3)->take(3)->get();
        return view('frontend.index.product_by_company', compact('product', 'category', 'brand', 'most_sold_product', 'most_sold_product_2'));

    }
}
