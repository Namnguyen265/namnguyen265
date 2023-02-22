<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    //

    public function AddToCart(Request $request)
    {
        // session()->forget('cart');
        
        // $request->session()->flush();
        $id = $request->id;
        $up = (int)$request->up;
        $qty = $request->qty;
        // var_dump($up);
        $product = Product::where('id', $id)->get();
        // echo $product[0]['name'];
        $array = [];
        
        $array['id'] = (int)$id;
        $array['id_user'] = $product[0]['id_user'];
        $array['name'] = $product[0]['name'];
        $array['price'] = $product[0]['price'];
        $array['id_category'] = $product[0]['id_category'];
        $array['id_brand'] = $product[0]['id_brand'];
        $array['status'] = $product[0]['status'];
        $array['sale'] = $product[0]['sale'];
        if ($product[0]['status'] == 0)
        {
        $array['sale_price'] = $product[0]['price'];
        }
        if ($product[0]['status'] == 1)
        {
            $array['sale_price'] = $product[0]['price'] * ((100 - $product[0]['sale']) / 100);
        }
        $array['company'] = $product[0]['company'];
        $array['image'] = $product[0]['image'];
        $array['detail'] = $product[0]['detail'];
        $array['quantity'] = $product[0]['quantity'];
        if($up == 1)
        {
            $array['qty'] = 1;
        }
        if($up == 4)
        {
            $array['qty'] = $qty;
        }
        // var_dump($array);
        
        // session()->push('cart', $array);
        $flag = 1;
        if (session()->has('cart'))
        {
            $getSession = session()->get('cart');
            foreach ($getSession as $key => $value)
            {
                if ( $id == $value['id'] && $up == 1)
                {
                    $flag = 0; 
                    // var_dump($value['quantity']);
                    // if ($value['qty'] < $value['quantity'])
                    {
                    $getSession[$key]['qty'] += 1;
                    // var_dump($getSession[$key]['qty']);
                    session()->put('cart', $getSession);
                    // var_dump($getSession[$key]['qty']);
                    
                    break;
                    }
                    // return back()->with('success', 'Đã thêm vào giỏ hàng');
                }


                if ( $id == $value['id'] && $up == 2)
                {
                    $flag = 0; 
                    $getSession[$key]['qty'] -= 1;
                    // var_dump($getSession[$key]['qty']);
                    session()->put('cart', $getSession);
                    // var_dump($getSession[$key]['qty']);
                    if ($getSession[$key]['qty'] == 0)
                    {
                        // var_dump($getSession[$key]);
                        unset($getSession[$key]);
                        session()->put('cart', $getSession);
                    }
                    break;
                }

                if ( $id == $value['id'] && $up == 3)
                {
                    $flag = 0;
                    unset($getSession[$key]);
                    session()->put('cart', $getSession);
                    break;
                }
                
                if ($id == $value['id'] && $up == 4)
                {
                    $flag = 0;
                    $getSession[$key]['qty'] += $qty;
                    session()->put('cart', $getSession);
                    break;
                }
            }
            
        }

        
        
        
    

        
        if ($flag == 1)
        {
              session()->push('cart', $array);
            //  $getSession = session()->get('cart');
            //  var_dump(session('cart'));
            //  echo "<pre>";
            //  var_dump($getSession[0]['id']);
            

        }

        // var_dump(session('cart'));

        // $value = session('cart');

        $tongsp = 0;
        foreach (session('cart') as $key => $value)
        {
            $tongsp = $tongsp + $value['qty'];
            // echo $value['qty'];
            
        }

        // $getSession['tong'] = $tongsp;
        // echo '<pre>';
        // var_dump(session('cart'));
        echo $tongsp;
        // echo '<pre>';
        // var_dump($value);
        // session()->forget('cart');
        // dd($tongsp);
        // return view('frontend.layouts.header', compact('tongsp'));
    }


    public function ShowCart()
    {
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

        // dd($tongsp);
        return view('frontend.cart.cart');
    }

    public function AddToCartMany()
    {}
}

