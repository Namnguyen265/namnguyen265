@extends('frontend.layouts.app')
@section('content')

<div class="blog-post-area">
    @foreach($blog as $value)
    <h2 class="title text-center">Latest From our Blog</h2>
    <div class="single-blog-post">
        <h3>{{$value->title}}</h3>
        <div class="post-meta">
            <ul>
                <li><i class="fa fa-user"></i> Mac Doe</li>
                <li><i class="fa fa-clock-o"></i> 1:33 pm</li>
                <li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
            </ul>
            <span>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-half-o"></i>
            </span>
        </div>
        <a href="">
            <img src="{{asset('upload/blog/dog.png')}}" alt="">
        </a>
        <p>
            {{$value->description}}</p> <br>

        <p>
            {!!$value->content!!}.</p> <br>

            @endforeach
            
        <div class="pager-area">
            <ul class="pager pull-right">
                
                    
                
                
                
                {{-- <li><a href="{{route('blogsingle', ['id'=>$idblog])}}">Pre</a></li> --}}
                <li><a href="{{route('blogsingle', ['id'=>$previous])}}">Pre</a></li>
                
                
                
            </ul>
            {{-- <table>
                    
                        
                        
                        
                <div class = 'pagination justify-content-center'>{!! $blog->links() !!}</div>
                
            
            </table> --}}
        </div>
    </div>
    
</div><!--/blog-post-area-->


@endsection