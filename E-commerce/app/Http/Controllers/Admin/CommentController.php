<?php

namespace App\Http\Controllers\Admin;
use App\Models\Comment;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //

    public function View_Comment()
    {
        // $comment = Comment::a;
        $comment = Comment::join('product', 'comment.id_product', '=', 'product.id')->select(['comment.*', 'comment.id as id_comment', 'product.id as id_prod' ,'comment.name as user','product.*'])->paginate(5);
        // $id_comment = Comment::where('id_blog', 0)->pluck('id');
        // $id_comment = Comment::join('product', 'comment.id_product', '=', 'product.id')->sekl('comment.id as id_comment ', 'product.id as id_prod');
        // dd($comment);
        return view('admin.comment.comment', compact('comment'));
    }

    public function View_Comment_Blog()
    {
        $comment = Comment::join('blog','comment.id_blog', '=', 'blog.id')->select(['comment.*', 'comment.id as id_comment', 'blog.id as id_blogg' ,'comment.name as user','blog.*'])->paginate(5);
        // dd($comment['title']);
        // dd($comment);
        return view('admin.comment.comment_blog', compact('comment'));
    }

    public function Delete_Comment($id)
    {
        $query = Comment::where('id', $id)->delete();
        if ($query)
        {
            return redirect()->back()->with('success', 'Xoá bình luận thành công');
        }
        else
        {
            return redirect()->back()->withErrors('Đã có lỗi xảy ra');
        }
    }
}
