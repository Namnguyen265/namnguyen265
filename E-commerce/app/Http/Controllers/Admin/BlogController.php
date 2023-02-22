<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\Admin\UpdateBlogRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Users;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class BlogController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function blog()
    {
        $blog = Blog::paginate(3);
        // $blog = Blog::find(Auth::id());
        // dd($blog);
        
        return view('admin.blog.blog', compact('blog'));
    }

    public function addblog()
    { 

        return view('admin.blog.addblog');
    }

    // public function insertblog(Request $request)
    // {
    //     $blog = new Blog();
    //     $blog -> title = $request->title;
    //     $blog ->description = $request->description;
    //     $blog -> content = $request->content;
    //     $blog->save();
        
    //     return redirect('blog');
    //     // return view('admin.blog.blog');
    // }

    public function insertblog(UpdateBlogRequest $request)
    {
        
        $blog = new Blog();
        $data = $request->all();
        
        $file = $request->image;
        
        if (!empty($file))
        {
            $data['image'] = $file->getClientOriginalName();
            
            $file->move('upload/blog/', $file->getClientOriginalName());
            
        
        
            $blog->title = $data['title'];
            $blog->blog_tags = $data['blog_tags'];
            $blog->blog_slug = Str::slug($data['title'], '-');
            $blog->image = $data['image'];
            $blog->description = $data['description'];
            $blog->content = $data['content'];
            // $blog->id_auth = Auth::id();
            $blog ->save();
            
            return redirect()->back()->with('success',__('Update profile success'));

        
        }
        
        
        else 
        {
            return redirect()->back()->withErrors('Vui lòng chọn file Image');
        }
        

    }


    public function deleteblog($id)
    {
        Blog::where('id', $id)->delete();
        return redirect('admin/blog')->with('success',__('Đã xoá thành công'));
    }

    public function editblog($id)
    {
        $blog = Blog::where('id', $id)->get();
        // return view('edit', compact('players'));
        return view('admin.blog.editblog', compact('blog'));
    }

    public function updateblog(UpdateBlogRequest $request, $id)
    { 
        // $userid = Auth::id();
        // dd($userid);
        $blog = Blog::findOrFail($id);
        // $blog = new Blog();
        $data = $request->all();
        $blog->blog_tags = $data['blog_tags'];
        $data['blog_slug'] = Str::slug($data['title'], '-');
        $data['id_auth'] = Auth::id();
        
        // dd($data);
        $file = $request->image;
        if (!empty($file))
        {
            $data['image'] = $file->getClientOriginalName();
            // $data['imag']
            // $file->move('upload/blog/', $file->getClientOriginalName());
        }
        
        //  Blog::where('id', $id)->update([
        //     'title' => $request->title,
        //     'image' => $data['image'],
        //     'description' =>$request->description,
        //     'content' => $request->content

        // ]);

        // return redirect()->back();
        // dd($bo);

        if($blog->update($data))
        {
            if(!empty($file))
            {
                $file->move('upload/blog/', $file->getClientOriginalName());
                // dd($blog);
            }
            return redirect()->back()->with('success', __('Cập nhật blog thành công'));
        }
        else 
        {
            return redirect()->back()->withErrors('Cap nhat bi loi');
        }
    
        

        
    }
}
