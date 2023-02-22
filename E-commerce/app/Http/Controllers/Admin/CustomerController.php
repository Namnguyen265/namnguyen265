<?php

namespace App\Http\Controllers\Admin;
use App\Models\Users;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //

    public function List_Customer()
    {
        $customer = Users::paginate(10);
        
        return view('admin.customer.customer', compact('customer'));
    }

    public function Delete_Customer($id)
    {
        
        $query = Users::where('id', $id)->delete();
        if ($query)
        {
            return redirect()->back()->with('success', 'Xoá người dùng thành công');
        }
        else
        {
            return redirect()->back()->withErrors('Đã có lỗi xảy ra');
        }
    }
}
