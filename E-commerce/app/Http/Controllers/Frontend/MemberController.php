<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Support\Facades\Auth;
// use App\Http\Controllers\Frontend\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Country;
use App\Models\Category;
use App\Models\Brand;
use App\Models\History;
use App\Http\Requests\frontend\UpdateMemberRequest;
use App\Models\Order_Details;
use App\Models\Product;

class MemberController extends Controller
{
    

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function LoginForm()
    {
        $category = Category::all();
        $brand = Brand::all();
        return view('frontend.member.login', compact('category', 'brand'));
    }

    public function RegisterForm()
    {
        $country = Country::all();
        // dd($country);
        $category = Category::all();
        $brand = Brand::all();
        return view('frontend.member.register', compact('country', 'category', 'brand'));
    }

    public function Register(Request $request)
    {
        $user = new Users();
        // $user -> name = $request->name;
        // $user -> email = $request->email;
        // $user ->password = $request->pass
        $data = $request->all();
        $data['level'] = 0;
        // dd($data);
        $file = $request->avatar;

        $country = $request->id_country;
        $data['id_country'] = (int)$country;
        $data['password'] = bcrypt($data['password']);

        if (!empty($file))
        {
            $data['avatar'] = $file->getClientOriginalName();

            $file->move('upload/blog/', $file->getClientOriginalName());
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->password = $data['password'];
            $user->phone = $data['phone'];
            $user->address = $data['address'];
            $user->avatar = $data['avatar'];
            $user->level = $data['level'];
            $user->id_country = $data['id_country'];
            $user ->save();

            return redirect()->back()->with('success', ('Dang ki thanh cong'));
        }

        else 
        {
            return redirect()->back()->withErrors('Da co loi xay ra');
        }


    }

    public function Login(Request $request)
    {
        $login = [
            'email' => $request->email,
            'password' =>$request->password,
            // 'level' => 0
        ];
        // dd($login);
        $remember = false ;

        if ($request->remember_me)
        {
            $remember = true;
        }

        if (Auth::attempt($login, $remember))
        {
            return redirect('/index');
        }
        else 
        {
            return redirect()->back()->withErrors('Email or password is not correct');
        }
    }

    // public function Logout()
    // {
        
    //     Auth::logout();
        
    //         // return redirect()->route('loginform');

    //         return redirect('/member/login');
        
    //     // return redirect()->back();
    // }

    public function Func()
    {
        // Auth::logout();
        return redirect('/member/login');
    }

    public function country()
    {
        $country = Country::all();
        return view('frontend.member.register', compact('country'));
    }
    
    public function Account()
    {
        $country = Country::all();

        // dd($country);
        return view('frontend.account.account', compact('country'));
    }

    public function Update(UpdateMemberRequest $request)
    {
        $userId = Auth::id();
        // dd($userId)
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
    }

    public function Product()
    {
        return view('frontend.product.product');
    }

    public function Createproduct()
    {
        
        $category = Category::all();
        $brand = Brand::all();

        return view('frontend.product.createproduct', compact('category', 'brand'));
    }
    
    public function Category()
    {

    }


    public function Logout()
    {
        
        Auth::logout();
        return redirect()->route('loginform');
        
        
    }


    public function History()
    {
        $id = Auth::id();
        // dd($id);
        $history = History::where('id_user', $id)->paginate(5);
        // dd($history);

        return view('frontend.history.history', compact('history'));
    }

    public function Detail_History($id)
    {
        // dd($id);
        $detail = Order_Details::where('id_history', $id)->get();
        // dd($detail);

        $product = Product::all();
        
        $customer = History::where('id', $id)->get();
        return view('frontend.history.historydetails', compact('detail', 'product', 'customer'));
    }

    public function Cancel_History(Request $request, $id)
    {
        // dd($id);
        
        // $history = History::where('id', $id)->first();
        $history = History::findOrFail($id);
        // dd($history->cancel);
        $history->order_status = 3;
        // $history->cancel = 1;
        $history->update();
        return redirect()->back()->with('success', "Đã huỷ đơn hàng");
        
    }
}
