@extends('frontend.layouts.app')
@section('content')

<div class="blog-post-area">
    <h2 class="title text-center">Bài viết hỗ trợ chăm sóc cây cảnh</h2>
    @foreach($blog as $value)
    <div class="single-blog-post">
        
        <h3>{{$value->title}}</h3>
        <div class="post-meta">
            <ul>
                
                @foreach($author as $item => $key)
                @if($key->id == $value->id_auth)
                <li><i class="fa fa-user"></i> {{$key->name}}</li>
                @endif
                @endforeach
                
                <li><i class="fa fa-clock-o"></i> {{$value->created_at->format(' H:i:s')}}</li>
                <li><i class="fa fa-calendar"></i> {{$value->created_at->format('M d, Y')}}</li>
            </ul>

        </div>
        <a href="">
            <img src="{{asset('upload/blog/'. $value->image)}}" alt="" style = 'width:400px ; height:300px'>
        </a>
        <p>{{$value->description}}</p>
        <a  class="btn btn-primary" href="{{route('blogsingle', ['id'=>$value->id])}}">Xem chi tiết</a>
    </div>
    
    
    @endforeach
    <div class="pagination-area">
        {{-- <ul class="pagination">
            <li><a href="" class="active">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href=""><i class="fa fa-angle-double-right"></i></a></li>
        </ul> --}}

        {!! $blog->links() !!}
    </div>
</div>


@endsection