<?php

namespace App\Http\Controllers\Frontend;
use App\Models\History;
use App\Models\Country;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CheckoutController extends Controller
{
    //
    
    public function Checkout()
    {
        $country = Country::all();
        return view('frontend.checkout.checkout', compact('country'));
    }
    
    public function Order(Request $request)
    {
        dd($request->price);
        $history = new History();
        // $price = (int)$request->price;
        // dd($price);
        $history->email = Auth::user()->email;
        $history->phone = Auth::user()->phone;
        $history->name = Auth::user()->name;
        $history->id_user = Auth::user()->id;
        $history->price = (int)$request->price;
        // dd($history);
        // $history->save();
        // return redirect()->back()->with('success', "Order success");
        
    }
}
