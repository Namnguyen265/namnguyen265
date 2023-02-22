<?php

namespace App\Http\Controllers\Frontend;
use App\Models\History;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;
use App\Models\Country;
use App\Models\Category;
use App\MOdels\Product;
use App\Mail\MailNotify;
use Illuminate\Support\Facades\Auth;
use App\Models\Users;
use App\Models\Order_Details;
use App\Http\Requests\frontend\OrderRequest;



class MailController extends Controller
{
    //
    

    public function Checkout()
    {
        $product = Product::all();
        $category = Category::all();
        $country = Country::all();
        return view('frontend.index.index', compact('product', 'category', 'country'));
    }

    public function Login(Request $request)
    { 

        // dd($request->email);
        $login = [
            'email' => $request->email,
            'password' =>$request->password,
            'level' => 0
        ];
        // dd($login);
        $remember = false ;

        if ($request->remember_me)
        {
            $remember = true;
        }

        if (Auth::attempt($login, $remember))
        {
            return redirect('/member-checkout');
        }
        else 
        {
            return redirect()->back()->withErrors('Email or password is not correct');
        }
    }

    public function Order1()
    {
        echo Auth::user()->name;
    }

    public function Historyyy(Request $request)
    {
        dd($request->phone);
    }

    public function Order(OrderRequest $request)
    {
        

        $history = new History();
        // $price = (int)$request->price;
        // dd($price);
        $history->email = Auth::user()->email;
        $history->phone = $request->phone;
        $history->name = Auth::user()->name;
        $history->id_user = Auth::user()->id;
        $history->delivery_address = $request->address;
        $history->price = $request->price;
        // $history->price = $tong;
        // dd($history);
        $history->save();

        // dd($history->id);
        $product = Product::pluck('id')->toArray();
        $getSession = session()->get('cart');
            // echo '<pre>';
            // var_dump($getSession);
            foreach ($getSession as $key => $value)
            {
                echo '<pre>';
                // var_dump($value['id']);

                if (in_array($value['id'], $product))
                {
                    $value['quantity'] -= $value['qty'];
                    // var_dump($value['quantity']);
                    
                    $prod = Product::where('id', $value['id'])->first();
                    // dd($prod->quantity);

                    $prod->quantity = $prod->quantity - $value['qty'];

                    // $prod->update();
                    
                    $order = new Order_Details();
                    $order->id_product = $value['id'];
                    $order->id_history = $history->id;
                    $order->name_product = $value['name'];
                    $order->product_price = $value['sale_price'];
                    $order->product_sold_quantity = $value['qty'];
                    $order->save();
                    
                }
                

                
            }


        $dulieu = [
            'subject' => 'Mail từ Shopping.vn',
            'body'    => 'Đây là đơn đặt hàng của bạn!',
            'price'   => $history->price
        ];
        // dd($data);

        
        try 
        {
            Mail::to('vinhtrung@gmail.com')->send(new MailNotify($dulieu));
            // return response()->json(['Great check your gmail box']);
            // dd(session('cart'));
            session()->forget('cart');
            
            return redirect()->back()->with('success', 'Đặt hàng thành công');
        } 
        catch (Exception $th)

        {
            return response()->json(['Something went wrong']);
        }
    }


    public function Order_Register(Request $request)
    {
        

        $history = new History();
        // $price = (int)$request->price;
        // dd($price);
        $history->email = Auth::user()->email;
        $history->phone = $request->phone;
        $history->name = Auth::user()->name;
        $history->id_user = Auth::user()->id;
        $history->delivery_address = $request->address;
        $history->price = $request->price;
        // $history->price = $tong;
        // dd($history);
        $history->save();

        // dd($history->id);
        $product = Product::pluck('id')->toArray();
        $getSession = session()->get('cart');
            // echo '<pre>';
            // var_dump($getSession);
            foreach ($getSession as $key => $value)
            {
                echo '<pre>';
                // var_dump($value['id']);

                if (in_array($value['id'], $product))
                {
                    $value['quantity'] -= $value['qty'];
                    // var_dump($value['quantity']);
                    
                    $prod = Product::where('id', $value['id'])->first();
                    // dd($prod->quantity);

                    $prod->quantity = $prod->quantity - $value['qty'];

                    // $prod->update();
                    
                    $order = new Order_Details();
                    $order->id_product = $value['id'];
                    $order->id_history = $history->id;
                    $order->name_product = $value['name'];
                    $order->product_price = $value['sale_price'];
                    $order->product_sold_quantity = $value['qty'];
                    $order->save();
                    
                }
                

                
            }


        $dulieu = [
            'subject' => 'Mail từ Shopping.vn',
            'body'    => 'Đây là đơn đặt hàng của bạn!',
            'price'   => $history->price
        ];
        // dd($data);

        
        try 
        {
            Mail::to('vinhtrung@gmail.com')->send(new MailNotify($dulieu));
            // return response()->json(['Great check your gmail box']);
            // dd(session('cart'));
            session()->forget('cart');
            
            return redirect()->back()->with('success', 'Đặt hàng thành công');
        } 
        catch (Exception $th)

        {
            return response()->json(['Something went wrong']);
        }
    }

    public function View()
    {
        $data = [
            'subject' => 'Mail từ Shopping.vn',
            'body'    => 'Đây là đơn đặt hàng của bạn!',
            'price'   => 'price'
        ];
        return view('frontend.email.email1', compact('data'));
    }

    public function Store(Request $request)
    {
        dd($request->email);
        return view('frontend.index.index');
        // switch ($request->input('action')) {
        //     case 'login':
        //         // Save model
        //         $data = $request->password;
        //         dd($data);
        //         break;
    
        //     case 'order':
        //         // Preview model
        //         break;
    
        //     case 'advanced_edit':
        //         // Redirect to advanced edit
        //         break;
        // }
    }

    public function Up(Request $request)
    {
        dd($request->all);
    }


    public function Register(Request $request)
    {
        $user = new Users();
        // $user -> name = $request->name;
        // $user -> email = $request->email;
        // $user ->password = $request->pass


        $data = $request->all();
        $data['level'] = 1;
        // $data['price'] = $request->price; 
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
            // $this->Order( $request->email);

            $history = new History();
        // $price = (int)$request->price;
        // dd($price);
        $id_user = Users::where('email', $user->email )->value('id');
        $history->email = $user->email;
        $history->phone = $user->phone;
        $history->name = $user->name;
        $history->id_user = $id_user;
        $history->price = (int)$request->price;
        // dd($history);
        $history->save();
        Auth::loginUsingId($id_user);

        
        $dulieu = [
            'subject' => 'Mail từ Shopping.vn',
            'body'    => 'Đây là đơn đặt hàng của bạn!',
            'price'   => $history->price
        ];

        try 
        {
            Mail::to('vinhtrungtk@gmail.com')->send(new MailNotify($dulieu));
            // return response()->json(['Great check your gmail box']);
            // dd(session('cart'));
            session()->forget('cart');
            
            return redirect()->back()->with('success', 'Đặt hàng thành công');
        } catch (Exception $th)
        {
            return response()->json(['Something went wrong']);
        }
            return redirect()->back()->with('success', ('Dang ki thanh cong'));
        }

        else 
        {
            return redirect()->back()->withErrors('Da co loi xay ra');
        }


    }

    public function Registere(Request $request)
    {
        return redirect()->back();
    }



    public function Get(Request $request)
    {
        $data = $request->all();
        dd($data);
        return $this->Ordering($data);
    }
    public function Ordering($data)
    {
        //process data....
        dd($data);
        // return $answer;
    }


    public function Registering(Request $request)
    {
        $user = new Users();
        // $user -> name = $request->name;
        // $user -> email = $request->email;
        // $user ->password = $request->pass

        
        $data = $request->all();
        $data['level'] = 0;
        // $data['price'] = $request->price; 
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
            
            $id_user = Users::where('email', $user->email )->value('id');
    
        
            Auth::loginUsingId($id_user);

            // dd($request);
            $this->Order_Register($request);
            // dd($request);

        
            return redirect()->back()->with('success', ('Dang ki thanh cong'));
        }

        else 
        {
            return redirect()->back()->withErrors('Da co loi xay ra');
        }


    }


    public function index()
    {
        

        

        $dulieu = [
            'subject' => 'Mail từ Shopping.vn',
            'body'    => 'Đây là đơn đặt hàng của bạn!',
            'price'   => $history->price
        ];
        // dd($data);

        
        try 
        {
            Mail::to('nguyenduythuong2k@gmail.com')->send(new MailNotify($dulieu));
            // return response()->json(['Great check your gmail box']);
            // dd(session('cart'));
            session()->forget('cart');
            
            return redirect()->back()->with('success', 'Đặt hàng thành công');
        } 
        catch (Exception $th)

        {
            return response()->json(['Something went wrong']);
        }
    }

    

    public function Stock()
    {
        $product = Product::pluck('id')->toArray();
        // dd($product);
        
        // echo '<pre>';
        // var_dump(session('cart'));

        if (session()->has('cart'))
        {
            $getSession = session()->get('cart');
            // echo '<pre>';
            // var_dump($getSession);
            foreach ($getSession as $key => $value)
            {
                echo '<pre>';
                // var_dump($value['id']);

                if (in_array($value['id'], $product))
                {
                    $value['quantity'] -= $value['qty'];
                    // var_dump($value['quantity']);
                    
                    $prod = Product::where('id', $value['id'])->first();
                    // dd($prod->quantity);

                    $prod->quantity = $prod->quantity - $value['qty'];

                    $prod->update();
                    
                    $order = new Order_Details();
                    $order->id_product = $value['id'];
                    // $order->id_history
                    $order->save();
                    
                }
                

                
            }
            return back()->with('success', 'Da cap nhat so luong');
            
        }
    }
}
