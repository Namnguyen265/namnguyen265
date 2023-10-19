<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\AddCountryRequest;

class CountryController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function country()
    {
        
        // $country = Country::all();
        $country = Country::paginate(5);
        // dd($country);
        return view('admin.country.country' , compact('country'));
    }

    public function addcountry()
    {
        // $country = new Country();
        // $country ->name = $request->name;
        // $country ->save();
        return view('admin.country.addcountry');
    }

    public function insert_country(AddCountryRequest $request)
    {
        
        
        $country = new Country();
        $country->name = $request->name;
        //  $country->name = $request->name;
        //  $country->save();
        // $data = Country::where('name', $request->name)->get();
        // $data =  Country::where('name', $request->name) -> get();
        // dd($data);
        // dd($data);
        if (Country::where('name', $request->name)->count()>0)
        {
            return redirect()->back()->withErrors('Ten country already exists');
        }
        //  return redirect('country');
        // return redirect('admin/country');
        else
        {
            $country->name = $request->name;
            $country -> save();
            return redirect()->back()->with('success', ('Add country success'));
        }
    }

    public function delete_country($id)
    {
        Country::where('id', $id)->delete();
        return redirect()->back()->with('success', ('Delete country success'));
    }

    public function profile_country()
    {


        // $user = Auth::user();

        // dd($user);

        // $country = Country::select('name')->get();
        // dd($country[0]);
        // $country = Country::pluck('name','id');
        $country = Country::all();
        // dd($country);
        return view('admin.profile.profile', compact('country'));
    }


    public function show_country()
    {
        $id = Auth::user()->id_country;
        $country = Country::select('name')->where('id' , $id);
        // $country = Country::paginate(5);
        // dd($country);
        return view('admin.profile.profile' , compact('country'));
    }


}
