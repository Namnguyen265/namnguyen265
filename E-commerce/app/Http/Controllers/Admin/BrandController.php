<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function Brand()
    {
        $brand = Brand::paginate(5);
        // dd($country);
        return view('admin.brand.brand' , compact('brand'));
    }

    public function AddBrand()
    {
        return view('admin.brand.addbrand');
    }

    public function InsertBrand(Request $request)
    {
        $brand = new Brand();
        $brand->brand = $request->brand;

        if (Brand::where('brand', $request->brand)->count()>0)
        {
            return redirect()->back()->withErrors('Ten brand already exists');
            
        }
        else
        {
            $brand->brand = $request->brand;
            $brand->save();
            return redirect()->back()->with('success', ('Add country success'));
        }
    }

    public function DeleteBrand($id)
    {
        Brand::where('id', $id)->delete();
        return redirect()->back()->with('success',('Delete brand success'));
    }
}
