<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Rate;
use App\Models\Comment;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Users;
use App\Models\Product;
use Illuminate\Support\Str;

class BlogsController extends Controller
{
    //
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    
    public function blog()
    {
        $blog = Blog::paginate(3);
        // $blog = Blog::find(Auth::id());
        // dd($blog);
        $category = Category::all();
        $brand = Brand::all();
        $id_auth = Blog::select('id_auth')->get()->toArray();
        $author = Users::all();
        // dd($author);
        
        return view('frontend.blog.blog', compact('blog','category','brand', 'author', 'id_auth'));
    }
        
    // public function blogsingle($id)
    // {
    //     $blog = Blog::where('id', $id)->get();
    //     return view('frontend.blog.blog-single', compact('blog'));
    // }

    public function blogsingle($id)
    {
        $category = Category::all();
        $brand = Brand::all();
        
        $blog = Blog::where('id', $id)->get();
                
        dd($blog);
        $next = Blog::where('id','>', $id)->min('id');
        $previous = Blog::where('id', '<', $id)->max('id');

        $rate = Rate::where('id_blog', $id)->avg('rate');
        $rate = round($rate);
        
        $comment = Comment::where('id_blog', $id)->get();
        // dd($comment);
        $count_cmt = Comment::where('id_blog', $id)->count();
        return view('frontend.blog.blog-single', compact('blog', 'previous', 'next', 'rate', 'comment', 'count_cmt', 'category', 'brand'));
               
    }

    public function blograte(Request $request)
    {
                
       
        $rating = new Rate();

        $rating->id_blog = $request->id_blog;
        // dd($request->id_user);
        $rating->id_user = $request->id_user;
        $rating->rate = $request->rate;
        $rating->save();
        
        
        
       
    }


    public function blogcomment(Request $request )
    {
        $comment = new Comment();
        
        $comment->comment = $request->comment;

        // dd($request->comment);
        $comment->id_user = Auth::user()->id;
        $comment->id_blog = $request->id_blog;
        $comment->name = Auth::user()->name;
        $comment->avatar = Auth::user()->avatar;
        $comment->level = $request->level;

        
        // $data = (int)$comment->level;
        
        // if ($data == 1)
        // {
        //     $comment->id = $request->id_cmt; // id cua cmt se bang id cua cmt cha
        // }
        
        
        // dd($data);
        $comment->save();
        // return $comment;
        // dd($comment);
        return redirect()->back()->with(compact('comment'));

        
    }

    public function show($id)
    {
        $category = Category::all();
        $brand = Brand::all();
        if (!empty($id))
        {
            $blog = Blog::with(['comment' => function ($q)
            {
                $q->orderBy('id', 'desc');

            }


            
            ])->find($id);

            // dd($blog);
            $next = Blog::where('id','>', $id)->min('id');
            $previous = Blog::where('id', '<', $id)->max('id');

            $rate = Rate::where('id_blog', $id)->avg('rate');
            $rate = round($rate);
        
            // $comment = Comment::where('id_blog', $id)->get();
        // dd($blog);
            $count_cmt = Comment::where('id_blog', $id)->count();
            return view('frontend.blog.blog-single-first', compact('blog' , 'previous', 'next', 'rate', 'count_cmt', 'category', 'brand'));

        }
    }


    public function Tag(Request $request, $blog_tags)
    {
        $author = Users::all();
        $category = Category::all();
        $brand = Brand::all();
        $tag = str_replace("-", " ", $blog_tags);
        // dd($tag);
        $product_with_tag = Blog::where('title', 'LIKE', '%'.$tag.'%')->orWhere('blog_tags', 'LIKE', '%'.$tag.'%')->orWhere('blog_slug', 'LIKE', '%'.$tag.'%')->get();
        // dd($product_with_tag);
        return view('frontend.blog.tag', compact('category', 'brand', 'blog_tags', 'product_with_tag', 'author'));
    }
}
