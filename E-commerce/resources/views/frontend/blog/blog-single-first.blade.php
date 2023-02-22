@extends('frontend.layouts.app')
@section('content')

<style >
    .test{
        display : none;

    }

    .test1{
        display : inline;
    }
</style>
<div class="blog-post-area">
    
    {{-- <h2 class="title text-center">Latest From our Blog</h2> --}}
    <div class="single-blog-post">
        <h3>{{$blog['title']}}</h3>
        <div class="post-meta">
            <ul>
                <li><i class="fa fa-user"></i> Nguyễn Phương Nam</li>
                <li><i class="fa fa-clock-o"></i>1:33pm</li>
                <li><i class="fa fa-calendar"></i> SEP 20, 2022</li>
                <li><i class="fa fa-calendar"></i> </li>
                @if (Auth::check())
                <input type = 'hidden' class="iduser" value = "{{Auth::user()->id}}">
                <input type = 'hidden' class="nameuser" value = "{{Auth::user()->name}}">
                <input type = 'hidden' class="avataruser" value = "{{Auth::user()->avatar}}">
                @endif
            </ul>
            
            <div class="rate" style="float: right;">
                <div class="vote">
                    
                    @for($i = 1 ; $i <= 5 ; $i++)
                  
                    <div class="star_{{$i}} ratings_stars {{ $i <= $rate ? 'ratings_over' : ''}}"><input value="{{$i}}" type="hidden"></div>
                    
                    
             
                     
                    @endfor
                    <span class="rate-np">{{$rate}}</span>

            
                </div> 
            </div>
            @csrf
        </div>
        <a href="">
            {{-- <img src="{{asset('upload/blog/dog.png')}}" alt=""> --}}
        </a>
        <p>
            {{$blog['description']}}</p> <br>

        <p>
            {!!$blog['content']!!}.</p> <br>

            
            
        <div class="pager-area">
            <ul class="pager pull-right">
                
                    
                
                
                
                @if ($previous)
                <li><a href="{{route('blogsingle', $previous)}}">Trước</a></li>
                @endif

                @if ($next)
                <li><a href="{{route('blogsingle', $next)}}">Tiếp</a></li>
                @endif
                
            </ul>
            {{-- <table>
                    
                        
                        
                        
                <div class = 'pagination justify-content-center'>{!! $blog->links() !!}</div>
                
            
            </table> --}}
            

            
        </div>
    </div>

    
    
<!--/blog-post-area-->


<div class="rating-area">
    {{-- <ul class="ratings">
        <li class="rate-this">Rate this item:</li>
        <li>
            <i class="fa fa-star color"></i>
            <i class="fa fa-star color"></i>
            <i class="fa fa-star color"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
        </li>
        <li class="color">(6 votes)</li>
    </ul> --}}
    <ul class="tag">
        @php 
        
            $tags = $blog['blog_tags'];
            $tags = explode(',', $tags);
            // echo $tags[1];
        @endphp
        
        <li>TAG: <p><i class="fa fa-tag"></i></li>
        @foreach($tags as $tag)
        <li><a href="{{url('/tag/'.str_slug($tag))}}" class="tag_style" style="font-size: 15px">{{$tag}}<span></span></a></li>
        <li><span style="font-size: 15px">/</span></li>
        @endforeach
        {{-- <li><a class="color" href="">Pink <span>/</span></a></li>
        <li><a class="color" href="">T-Shirt <span>/</span></a></li>
        <li><a class="color" href="">Girls</a></li> --}}
    </ul>

    <ul>
    <style type='text/css'>
        a.tag_style{
            margin: 3px 2px;
            border: 1px solid;
            height: auto;
            background-color: #21ea0f;
            color: #fff;
            padding: 0px;
        }

        a.tag_style:hover{
            background: black;
        }
    </style>
    
    </ul>
</div><!--/rating-area-->


<div class="media commnets">
    <a class="pull-left" href="#">
        <img class="media-object" src="" alt="">
    </a>
    <div class="media-body">
        {{-- <h4 class="media-heading">Annie Davis</h4> --}}
        {{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p> --}}
        {{-- <div class="blog-socials">
            <ul>
                <li><a href=""><i class="fa fa-facebook"></i></a></li>
                <li><a href=""><i class="fa fa-twitter"></i></a></li>
                <li><a href=""><i class="fa fa-dribbble"></i></a></li>
                <li><a href=""><i class="fa fa-google-plus"></i></a></li>
            </ul>
            <a class="btn btn-primary" href="">Other Posts</a>
        </div> --}}
    </div>
</div><!--Comments-->
<div class="response-area">
    <h2>{{$count_cmt}} Bình luận</h2>
    @foreach($blog['comment'] as $item)
     @if ($item->level == 0)
    <ul class="media-list">
        <li class="media">
            
            <a class="pull-left" href="#">
                <img class="media-object" src="{{ asset('upload/user/avatar/'. $item->avatar) }}" alt="" width = "100" height = "80">
            </a>
            <div class="media-body">
                <ul class="sinlge-post-meta">
                    <li><i class="fa fa-user"></i>{{$item->name}} {{$item->id}}</li>
                    <li><i class="fa fa-clock-o"></i>1:33 pm</li>
                    <li><i class="fa fa-calendar"></i>DEC 5, 2022 </li>
                </ul>
                <p>{{$item->comment}}</p>

                @foreach($blog['comment'] as $key)
                 @if ($key->level == $item->id )
                <ul class="sinlge-post-meta" style = "padding-left : 50px">
                    <li><i class="fa fa-user"></i>{{$key->name}} {{$key->id}}</li>
                    <li><i class="fa fa-clock-o"></i>1:33 pm</li>
                    <li><i class="fa fa-calendar"></i>Oct 5, 2022 </li>
                </ul>
                <p style = "padding-left : 50px">{{$key->comment}}</p>
                 @endif
                @endforeach

                {{-- <a class="btn btn-primary reply" id = {{$item->id}}><i class="fa fa-reply"></i></a> --}}
                <div class="text-area" style="display: none" id = "{{$item->id}}">
                    <div class="blank-arrow">
                        <label>Hãy để lại bình luận</label>
                    </div>
                    <span>*</span>
                    <textarea name="message" rows="11" id = 'postreply'></textarea>
                    <a class="btn btn-primary postreply" id = "{{$item->id}}" >Gửi bình luận</a>

                    
                </div>
            </div>
        </li>
        @endif
        @endforeach
        
        
    </ul>					
</div><!--/Response-area-->
<div class="replay-box">
    <div class="row">
        
        <div class="col-sm-8">
            <div class="text-area">
                <div class="blank-arrow">
                    <label>Hãy để lại bình luận</label>
                </div>
                <span>*</span>
                <textarea name="message" rows="11" id = 'postcomment'></textarea>
                <a class="btn btn-primary postcomment" >Gửi bình luận</a>
            </div>
        </div>
    </div>
</div><!--/Repaly Box-->
<script>

    $(document).ready(function(){
                //vote
                $('.ratings_stars').hover(
    
                    
                    // Handles the mouseover
                    function() {
                        $(this).prevAll().andSelf().addClass('ratings_hover');
                        // $(this).nextAll().removeClass('ratings_vote'); 
                    },
                    function() {
                        $(this).prevAll().andSelf().removeClass('ratings_hover');
                        // set_votes($(this).parent());
                    }
                );
    
                $('.ratings_stars').click(function(){
                    var Values =  $(this).find("input").val();
                    
                    var xx = '{{Auth::check()}}';
                    if (xx == 1)
                    {
                        

                        if ($(this).hasClass('ratings_over')) {
                            $('.ratings_stars').removeClass('ratings_over');
                            $(this).prevAll().andSelf().addClass('ratings_over');
                        } else {
                            $(this).prevAll().andSelf().addClass('ratings_over');
                        }

                        var iduser = $('input.iduser').val();
                        // console.log(iduser);
                        var _token = $('input[name="_token"]').val();
                        // console.log(_token);
                        $.ajax({
                            method: 'POST',
                            url : '{{url("/blog/ajax")}}',
                            data:{
                                id_blog : '{{$blog['id']}}',
                                id_user : iduser,
                                rate    : Values,
                                "_token": '{{csrf_token()}}'
                                // token = _token

                            },
                            success:function(){
                                
                            },
                        })
                    }
                    else
                    {
                        alert('Vui lòng đăng nhập');
                        
                    }


                    
                   
                });


                function ajax(comment , level){
                    $.ajax({
                            method: 'POST',
                            url : '{{url("/blog/comment")}}',
                            data : {
                                // id_cmt : id_cmt,
                                comment : comment ,
                                id_blog : '{{$blog['id']}}',
                                level : level,
                                "_token": '{{csrf_token()}}'
                            },

                            success: function(data){
                                
                            },

                        })
                }

                $('.postcomment').click(function(){
                    // var comment = $(this).closest('.text-area').find('#cmt').val();
                    var comment = $('#postcomment').val();
                    console.log(comment);
                    var xx = '{{Auth::check()}}';
                    if (xx == 1)
                    { 
                        
                        var id_user = $('input.iduser').val();
                        var name = $('input.nameuser').val();
                        var avatar = $('input.avataruser').val();
                        var _token = $('input[name="_token"]').val();
                        // alert(avatar);
                        // alert('Da login');
                       
                        ajax(comment , 0);

                        

                        
                    }

                    else
                    {
                        alert('moi dang nhap');
                    }
                });

                


                $('.reply').click(function(){
                    // alert('reply');
                    var x = $(this).attr('id');
                    // alert(x);
                    // var ?x = document.getElementById()
                    $(this).closest('.media-body').find('.text-area').attr("style", "display:block");

                    // document.getElementById(x).style.display="inline";

                    var zz = '{{Auth::check()}}';
                    if (zz == 1)
                    {
                        // var reply = $(this).
                    }
                });

                
                $('.postreply').click(function(){
                    zz = '{{Auth::check()}}';
                    var comment = $(this).closest('.text-area').find('#postreply').val();
                    var id_cmt  = $(this).attr('id');
                    console.log(id_cmt);
                    if (zz == 1)
                    {
                        ajax(comment , id_cmt);

                        
                    }
                    else 
                    {
                        alert('Moi dang nhap');
                    }
                })
            });
    </script>
@endsection


