<?php

namespace App\Http\Controllers\Admin;
use App\Models\History;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order_Details;
use App\Models\Product;
use App\Models\Users;
use App\Models\Statistics;
use Carbon\Carbon;


class OrderHistoryController extends Controller
{
    //

    public function View()
    {
        $history = History::paginate(5);
        

        return view('admin.history.history', compact('history'));
    }

    public function Detail($id)
    {
        // dd((int)$id);
        $detail = Order_Details::where('id_history', $id)->get();
        // dd($detail);
        // $image = Products
        // $customer = Users::all();
        $product = Product::all();
        // lay history co id = id_history cua order detail
        
        // dd($status);
        $customer = History::where('id',$id)->get();
        
        // dd($customer);
        // $id_user  = History::where('id_user', )
        // dd($product);
        // foreach($detail as $key )
        // {
        //     c($key['id_product']);
        // }
        return view('admin.history.historydetails', compact('detail', 'product', 'customer'));
    }

    public function Update(Request $request , $id)
    {
        $status_old = History::where('id', $id)->value('order_status');
        // if ($status_old == 2)
        // {
        //     dd('yess');
        // }
        // else
        // {
        //     dd('no');
        // }
        // dd($request->all());
        // dd($request->order_status);
        $data = $request->all();
        $data['order_status'] = (int)$request->order_status;
        $history = History::findOrFail($id);
        // dd($history);

        if ((int)$request->order_status == 2)
        {
            if ($status_old != 2)
            {
            $order_detail = Order_Details::where('id_history', $id)->pluck('id_product')->toArray();
            // dd($order_detail);
            // $product = Product::where()
            // $product = Product::join('order_details', 'product.id', '=', 'order_details.id_product')->join('history', 'order_details.id_history', '=', 'history.id')->select('product.id')->get()->toArray();
            $product = Product::join('order_details', 'product.id', '=', 'order_details.id_product')->where('id_history', $id)->get()->toArray();
            
            
            // dd($product);
            $data = [];
            $data[] = $product;
            // dd($product[1]['quantity']);

            $os = array("Mac", "NT", "Irix", "Linux");
            // dd($os);
            // if (is_array($product))
            // {
            //     dd('yes');
            // }
            // else
            // {
            //     dd('no');
            // }
            // foreach($os as $key => $value)
            // {
            //     // if (in_array("Irix", $os)) {
            //     //     dd("Got Irix");
            //     // }
            //     ($os[$key]);
            // }

            
            foreach ($product as $key => $value)
            {
                // dd($value['id_product']);
                if (in_array($value['id_product'], $order_detail))
                {
                    // dd($value['id_product']);
                    // dd($value['id_product']);
                    $value['quantity'] -= $value['product_sold_quantity'];
                    // dd($value['quantity']);
                    $prod = Product::where('id', $value['id_product'])->first();
                    // dd($prod);

                    $prod->quantity = $prod->quantity - $value['product_sold_quantity'];
                    $prod->sold_quantity = $prod->sold_quantity + $value['product_sold_quantity'];
                    // if ($prod->status == 1)
                    // {
                    // $prod->product_revenue += ($prod->price * (100 - ($prod->sale))/100) * $value['product_sold_quantity'];
                    // }
                    // else
                    // {
                        // $prod->product_revenue += $prod->price * $value['product_sold_quantity'];
                    // }
                    $prod->product_revenue += ($value['product_price'] * $value['product_sold_quantity']);
                    $prod->update();
                    // dd($prod->quantity);
                }
                // dd($value['quantity']);
                
            }

            
            $user = Statistics::where('finish_date', Carbon::now()->format('Y-m-d'))->first();
        if (Statistics::where('finish_date', '=' , Carbon::now()->format('Y-m-d'))->exists())
        {
            Statistics::where('finish_date' , Carbon::now()->format('Y-m-d'))
                        ->update([
                            'total_quantity' => $user->total_quantity += (int)$request->total_quantity,
                            'revenue' => $user->revenue += (int)$request->revenue,
                            'total_order' => $user->total_order += 1
                        ]);
        }
        else
        {
            $statistics = new Statistics();
        $statistics->finish_date = Carbon::now()->format('Y-m-d');
        $statistics->total_quantity = (int)$request->total_quantity;
        $statistics->revenue += (int)$request->revenue;
        $statistics->total_order += 1;
        $statistics->save();  
        }

        // return redirect()->back()->with('success',__('Cập nhật đơn hàng thành công'));

        }

            else
            {
                return redirect()->back()->withErrors('Chỉ được cập nhật thành công 1 lần cho phép');
            }
        }

           
        
        // $user = Statistics::where('finish_date', Carbon::now()->format('Y-m-d'))->first();
        // if (Statistics::where('finish_date', '=' , Carbon::now()->format('Y-m-d'))->exists())
        // {
        //     Statistics::where('finish_date' , Carbon::now()->format('Y-m-d'))
        //                 ->update([
        //                     'total_quantity' => $user->total_quantity += (int)$request->total_quantity,
        //                     'revenue' => $user->revenue += (int)$request->revenue,
        //                     'total_order' => $user->total_order += 1
        //                 ]);
        // }
        // else
        // {
        //     $statistics = new Statistics();
        // $statistics->finish_date = Carbon::now()->format('Y-m-d');
        // $statistics->total_quantity = (int)$request->total_quantity;
        // $statistics->revenue += (int)$request->revenue;
        // $statistics->total_order += 1;
        // $statistics->save();  
        // }

        History::where('id', $id)
                ->update([
                    'order_status' => $request->order_status,
                ]);
        // if ($history->update($data))
        // {
        return redirect()->back()->with('success',__('Cập nhật đơn hàng thành công'));
        // }
        // else
        // {
        //     return redirect()->back()->withErrors('Đã có lỗi xảy ra khi cập nhật');

        // }
    }
}
