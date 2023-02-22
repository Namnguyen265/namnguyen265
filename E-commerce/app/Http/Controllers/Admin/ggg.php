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
        $user = Users::findOrFail($userId);
        
        $data = $request->all();
        
        $file = $request->avatar;
              
        if (!empty($file))
        {
            $data['avatar'] = $file->getClientOriginalName();
        }
        
        if ($data['password'])
        {
            $data['password'] = bcrypt($data['password']);         
        }
        else
        {
            $data['password'] = $user->password;
        }

        if($user->update($data))
        {
            if(!empty($file))
            {
                $file->move('upload/user/avatar', $file->getClientOriginalName());
            }           
            return redirect()->back()->with('success',__('Update profile success'));
        }
        else
        {
            return redirect()->back()->withErrors('Update profile error');
        }
    }

}
