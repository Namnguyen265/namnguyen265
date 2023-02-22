<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
 
use Illuminate\Support\Facades\Auth;
use App\Models\Users;
use App\Models\History;
use App\Models\Order_Details;
use Carbon\Carbon;
use App\Models\Product;
use App\Models\Statistics;
use App\Http\Requests\Admin\UpdateProfileRequest;

class DashboardController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }


    
    public function index()
    {
        return view('admin.user.dashboard');
    }


    public function dashboard()
    {
        $top_sell_qty = Product::orderBy('sold_quantity', 'DESC')->get()->take(5);
        $top_revenue = Product::orderBy('product_revenue', 'DESC')->paginate(5);
        $sum_revenue = (int)Product::sum('product_revenue');
        $sum_sold_quantity = (int)Product::sum('sold_quantity');
        $sum_quantity = Product::sum('quantity');
        $count_order_waiting = History::where('order_status', 0)->count();
        $count_order_delivering = History::where('order_status', 1)->count();
        $count_order_success = History::where('order_status', 2)->count();
        $count_order_cancel = History::where('order_status', 3)->count();

        
    	return view('admin.user.dashboard', compact('top_revenue' , 'top_sell_qty', 'sum_revenue', 'sum_sold_quantity','sum_quantity','count_order_waiting','count_order_delivering', 'count_order_success','count_order_cancel'));
    }

    

    public function user()
    {
        if (Auth::check())
        {
            $id = Auth::id();

            $in4 = Auth::user();
            echo 'id user la ' .$id;

            echo $in4;

        }

    
        // return ' id la ' $id;
    }



    public function edit_user()
    {
    	


        // $user = Auth::user();

        // dd($user);

        return view('admin.profile.profile'  );
        
        
    }

    public function update_user(UpdateProfileRequest $request)
    {
        $userId = Auth::id();
        // $username = Auth::user()->email;

        // dd($userId);
        $user = Users::findOrFail($userId);

        $data = $request->all();
        // $file = $request->avatar;

        
        if ($request -> hasFile('avatar'))
        {
            echo 'ok';
            $file = $request->avatar; 
            dd($file);
        }
        
        // $user->update([
        //     'name' => $request->name,
        //     'password' =>$request->password,
        //     'email' => $request->email,
        //     'phone' => $request->phone,

        // ]);
        // $data = $request->all();
        // $file = $request->avatar;
        // return redirect()->route('edit');
     
    }
    

    public function UploadFile(Request $request)
    {

        // if ($request -> hasFile('file'))
        // {
            
        //     $file = $request->avatar; 
        //     dd($file);
        // }
        $data = $request->all();
        if ($request->hasFile('avatar'))
        {
            $file = $request->avatar;

            echo 'Tên Files: ' .$file->getClientOriginalName();

            echo '</br>';

            echo 'Đuôi file: '. $file->getClientOriginalExtension();
            echo '</br>';

            echo 'Đường dẫn tạm: ' .$file->getRealPath();
            echo '</br>';

            echo 'Kích cỡ file: ' .$file->getSize();
            echo '</br>';

            echo 'Kiểu files: ' .$file->getMimeType();

            $file->move('upload', $file->getClientOriginalName());
        }
        else 
        {
            echo 'Chưa up load ảnh';
        }
        // dd($data['avatar']);

        // $userId = Auth::id();

        //     $user = Users::findOrFail($userId);

        //     $data = $request->all();
        // if ($request -> hasFile('avatar'))
        // {
            
        //     echo 'aaaaaa';
            // return view(admin.user.dashboard);
            // $file = $request->avatar; 
        
        // else 
        // {
        //     return view(admin.profile.profile);
        // }
    }

    public function Up(UpdateProfileRequest $request)
    {
        $userId = Auth::id();
        $user = Users::findOrFail($userId);

        $data = $request->all();
        // dd($user);
        $file = $request->avatar;
        if (!empty($file))
        {
            $data['avatar'] = $file->getClientOriginalName();
            // echo $data['avatar'];
        }

        if ($data['password'])
        {
            $data['password'] = bcrypt($data['password']);
            // dd($data['password']);
            
        }
        else
        {
            $data['password'] = $user->password;
            dd($data['password']);
        }

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
    
    public function Logout()
    {
        Auth::logout();
        return redirect()->route('logout_admin');
    }

    public function Filter(Request $request)
    {
        $data = $request->all();
        // var_dump($data);
        $date_from = $data['date_from'];
        $date_to = $data['date_to'];
        $get = Statistics::whereBetween('finish_date',[$date_from, $date_to])->orderBy('finish_date', 'ASC')->get();
        // $get = History::whereBetween('updated_at',[$date_from, $date_to])->where('order_status', 2)->sum->get();

        // $id_history = History::whereBetween('updated_at', [$date_from, $date_to])->where('order_status', 2)->pluck('id')->toArray();
        // // var_dump($id_history);
        // // echo '<pre>';
        // // var_dump($get);
        // $total_order = count($get);
        // $order_detail = Order_Details::join('history', 'order_details.id_history', '=', 'history.id')->whereBetween('history.updated_at', [$date_from, $date_to])->where('history.order_status', 2)->get()->toArray();
        // echo '<pre>';
        


        // var_dump($order_detail);
        // foreach ($order_detail as $key => $value)
        // {
        //     $sum = 0;
        //     if(in_array($value['id'], $id_history))
        //     {
        //         $sum = $sum + $value['product_sold_quantity'];
        //     }

        //     // echo $sum ;
        //     echo '<pre>';
        //     echo $sum;
        //     // echo $value['id'];
        //     // echo $value['price'];
        // }
        if (count($get) != 0)
        {
            foreach ($get as $key => $val)
            {
                $chart_detail[] = array(
                    'period' => ($val->finish_date),
                    'revenue' => $val->revenue,
                    'total_quantity' =>$val->total_quantity,
                    // 'total_order' => $toal
                    'total_order' => $val->total_order
                    // 'price'   => 5000,
                    // 'qty'     => 100
                );
            }
            echo $data = json_encode($chart_detail);
        }
        else
        {
            echo 'khong co du lieu';
        }
    }

    
    public function Filter30days(Request $request)
    {
        $before_date = new Carbon('first day of previous month');
        // $before_date = $before_date->format('Y-m-d');
        // echo $before_date;
        // echo '</br>';
        // echo $data = json_encode($before_date->format('d-m-Y'));
        $after_date = new Carbon('last day of this month');
        // $after_date = $after_date->format('Y-m-d');
        $get = Statistics::whereBetween('finish_date',[$before_date, $after_date])->orderBy('finish_date', 'ASC')->get();


        if (count($get) != 0)
        {
            foreach ($get as $key => $val)
            {
                $chart_detail[] = array(
                    'period' => $val->finish_date,
                    'revenue' => $val->revenue,
                    'total_quantity' =>$val->total_quantity,
                    // 'total_order' => $toal
                    'total_order' => $val->total_order
                    
                    
                );
            }
            echo $data = json_encode($chart_detail);
        }
        else
        {
            echo 'khong co du lieu';
        }
    }


    public function Dashboard_Filter(Request $request)
    {
        $data = $request->all();
        
        $sub7day = Carbon::now('Asia/Ho_Chi_Minh')->subdays(7)->toDateString();
        $sub365day = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        // echo $now;
        $first_this_month = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
        // echo $first_this_month;
        $first_last_month = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
        $end_last_month = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();


        if ($data['filter_by'] == 'week')
        {
            $getchart = Statistics::whereBetween('finish_date', [$sub7day, $now])->orderBy('finish_date', 'ASC')->get();
        }

        elseif ($data['filter_by'] == 'thismonth')
        {
            $getchart = Statistics::whereBetween('finish_date', [$first_this_month, $now])->orderBy('finish_date', 'ASC')->get();
        }

        elseif ($data['filter_by'] == 'lastmonth')
        {
            $getchart = Statistics::whereBetween('finish_date', [$first_last_month, $end_last_month])->orderBy('finish_date', 'ASC')->get();
        }

        else 
        {
            $getchart = Statistics::whereBetween('finish_date', [$sub365day, $now])->orderBy('finish_date', 'ASC')->get();
        }

        foreach ($getchart as $key => $val)
        {
            $chart_detail[] = array(
                'period' => $val->finish_date,
                'revenue'  => $val->revenue,
                'total_quantity' => $val->total_quantity,
                'total_order'  =>$val->total_order
            );
        }
        echo $data = json_encode($chart_detail);
    }
}
