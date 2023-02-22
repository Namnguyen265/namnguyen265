<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function Category()
    {
        $category = Category::paginate(5);
        // dd($country);
        return view('admin.category.category' , compact('category'));
    }

    public function AddCategory()
    {
        return view('admin.category.addcategory');
    }

    public function InsertCategory(Request $request)
    {
        $category = new Category();
        $category->category = $request->category;

        if (Category::where('category', $request->category)->count()>0)
        {
            return redirect()->back()->withErrors('Ten category already exists');
            
        }
        else
        {
            $category->category = $request->category;
            $category->save();
            return redirect()->back()->with('success', ('Add country success'));
        }
    }

    public function DeleteCategory($id)
    {
        Category::where('id', $id)->delete();
        return redirect()->back()->with('success',('Delete category success'));
    }

    public function ShowType()
    {
        $category = Category::all();
        return view('frontend.layouts.menu-left', compact('category'));
    }
}
