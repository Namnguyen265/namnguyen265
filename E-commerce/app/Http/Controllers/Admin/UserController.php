<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\Admin\UpdateProfileRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Users;
use App\Models\Country;

class UserController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function user()
    {
        if (Auth::check())
        {
            $id = Auth::id();

            $in4 = Auth::user()->id;
            echo 'id user la ' .$id;

            echo $in4;

        }

    
        // return ' id la ' $id;
    }

    public function show()
    {
        
        
        // $user = Auth::user()->get();
        $id = Auth::id();
        $user = Users::where('id', $id)->get();
        
        return view('admin.profile.profile' , compact('user'));
        

        

    }


    public function edit_user()
    {
    	


        // $user = Auth::user();

        // dd($user);

        return view('admin.profile.profile'  );
        
        
    }

    public function profile_country()
    {
        
        
        $id = Auth::user()->id_country;
  
        
        $country = Country::all();
        return view('admin.profile.profile', compact('country'));
    }

    public function Up(UpdateProfileRequest $request)
    {
        $userId = Auth::id();
        $user = Users::findOrFail($userId);  //lấy thông tin của user thông qua id
        // dd($user);
        $data = $request->all();            //lấy dữ liệu user từ view
        // dd($user);
        $file = $request->avatar;
        $country = $request->id_country;
        // dd((int)$country);
        
        // dd($country);
        
        $data['id_country'] = (int)$country;


        // $id_ct = Auth::user()->id_country;
        // $country11 = Country::select('name')->where('id' , $id)->get();

        // return view('admin.profile.profile' , compact('country11'));

        if (!empty($file))
        {
            $data['avatar'] = $file->getClientOriginalName();
            //  dd($data['avatar']);
        }

        

        if ($data['password'])
        {
            $data['password'] = bcrypt($data['password']);
            // dd($data['password']);
            
        }
        else
        {
            $data['password'] = $user->password;
            // dd($data['password']);
        }

        // if ($data['address'])
        // {
        //     $data['address'] = $user->address; 
        // }

        if($user->update($data))
        {
            if(!empty($file))
            {
                $file->move('upload/user/avatar', $file->getClientOriginalName());
                // dd($file);
            }
            
            return redirect()->back()->with('success',__('Update profile success'));
        }
        else
        {
            return redirect()->back()->withErrors('Update profile error');
        }

        // return redirect('admin.profile.profile');
    }

    
}
