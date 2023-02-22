<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Image;
use App\Models\Rate;
use App\Models\Comment;
use App\Http\Requests\frontend\ProductRequest;
use App\Http\Requests\frontend\UpdateProductRequest;

class ProductsController extends Controller
{
    //

    public function Create()
    {

        $category = Category::all();
        $brand = Brand::all();
        $product = Product::all();
        // $getProducts = Product::find(1)->toArray();
        // dd($getProducts);

        // $getArrImage = json_decode($getProducts['image'], true);
        // dd($getArrImage);
        return view('frontend.product.createproduct', compact('category','brand'));
    }

    public function Store(ProductRequest $request)

    {
        
        
        $product= new Product();
        $infor = $request->all();
        
        $category = $request->category;
        // dd($category);
        $infor['id_user'] = Auth::user()->id;
        $brand =  $request->brand;
        $status = $request->status;
        $sale = $request->sale;
        // dd($product);
        // $product->filename=json_encode($data);
        $product->id_user = Auth::user()->id;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->id_category = (int)$category;
        $product->id_brand = (int)$brand;
        $product->status = (int)$status;
        $product->sale = (int)$sale;
        $product->company = $request->company;
        $product->detail = $request->detail;
        // $product->image = '0.jpg';
        // dd($product);
        
        $data = [];
        if($request->hasfile('image'))
        {
                    
            
                foreach($request->file('image') as $image)
                {
                    
                    
                        $name = $image->getClientOriginalName();
                        // dd($name);
                        $name_2 = "2".$image->getClientOriginalName();
                        // dd($name_2);
                        $name_3 = "3".$image->getClientOriginalName();

                        //$image->move('upload/product/', $name);
                        
                        $path = public_path('upload/product/small/' . $name);
                        $path2 = public_path('upload/product/middle/' . $name_2);
                        $path3 = public_path('upload/product/full/' . $name_3);

                        Image::make($image->getRealPath())->resize(85,84)->save($path);
                        Image::make($image->getRealPath())->resize(329, 380)->save($path2);
                        Image::make($image->getRealPath())->save($path3);
                        
                        $data[] = $name;
                        
                        
                        
                    
                    
                }
                $aa = count($data);
                        // dd($aa);
            
            
        }
        if ($aa > 3)
        {
            return redirect()->back()->withErrors('Không được upload quá 3 file ảnh');
        }
        else
        {
            $product->image=json_encode($data);
            // // dd($product->image);
            $product->save();

            return back()->with('success', 'Your images has been successfully');
        }
        
    }
        // var_dump($data);
        
        
    
    

    public function Show()
    {
        
        $id = Auth::user()->id;
        // dd($id);
        $product = Product::where('id_user', $id)->get();
        
        if(count($product)==0)
        {
        return view('frontend.product.product', compact('product'))->withErrors('Không có sản phẩm để hiển thị');
        }
        else 
        {
            return view('frontend.product.product', compact('product'));

        }
    }


    public function Delete($id)
    {
        Product::where('id', $id)->delete();
        return redirect()->back()->with('success', ('Delete product success'));
    }


    public function Edit($id)
    {
        $product = Product::where('id' , $id )->get();
        $category = Category::all();
        $brand = Brand::all();
        return view('frontend.product.updateproduct', compact('category', 'brand', 'product'));
    }

    public function Update(UpdateProductRequest $request, $id)
    {
        // if ($request->hasfile('image'))
        // {
        //     dd($request->hasfile('image'));
        // }

        $product = Product::findorFail($id);



        Product::where('id', $id)
                ->update([
                    'name'=> $request->name,
                    'price' => $request->price,
                    'id_category' => (int)($request->category),
                    'id_brand'  => (int)($request->brand),
                    'status'   => (int)($request->status) ,
                    'sale'     => $request->sale ,
                    'company'  => $request->company,
                    // 'image'    => json_encode($sum),
                    'detail'   => $request->detail
                ]);
        
        // $infor = $request->all();
        // $infor['id_category'] = (int)($request->category);
        // $infor['brand'] = (int)($request->brand);
        // $infor['status'] = (int)($request->status);
        // $infor['sale'] = (int)($request->sale);
        // dd($infor);
        // dd($product);
        // dd($request->sale);

        // if ($product->update())

        
        // $name = '0.jpg';
        // $data[] = $name; 

        
        // return redirect()->back();

        // if ($product->update($infor))
        // {
            if ($request->checked)
        {
            // echo 'success';
            $checked_img = $request->checked;
            // dd($checked_img);
            // dd(count($checked_img));
        }
        else
        {
            $checked_img = [];
            // dd(count($checked_img));
        }
    

        // // // dd($request->checked);   //mang cac hinh anh muon xoa
        // // $checked_img = $request->checked; //mảng các hình ảnh muốn xoá (đã check);
        // // // dd($checked_img[0]);
        $pro = Product::find($id)->toArray(); //mảng thông tin về product cần update
        

        $getArrImage = json_decode($pro['image'], true); 
        // dd($getArrImage[0]);

        foreach($getArrImage as $key => $value)
        {
            
            if (in_array($value, $checked_img))
            {
                unset($getArrImage[$key]);
            }
        }
        
        echo '<pre>';
        $getArrImage = array_values($getArrImage);
        $count = count($getArrImage);  // đếm số ảnh còn lại
        
        
        
        $data = [];
        if($request->hasfile('image'))
        {
                    
            
                foreach($request->file('image') as $image)
                {
                    
                    
                        $name = $image->getClientOriginalName();
                        // dd($name);
                        $name_2 = "2".$image->getClientOriginalName();
                        // dd($name_2);
                        $name_3 = "3".$image->getClientOriginalName();

                        //$image->move('upload/product/', $name);
                        
                        $path = public_path('upload/product/small/' . $name);
                        $path2 = public_path('upload/product/middle/' . $name_2);
                        $path3 = public_path('upload/product/full/' . $name_3);

                        Image::make($image->getRealPath())->resize(85,84)->save($path);
                        Image::make($image->getRealPath())->resize(329, 380)->save($path2);
                        Image::make($image->getRealPath())->save($path3);
                        
                        $data[] = $name;
                        
                        
                        
                    
                    
                }
                $aa = count($data);     // đếm số ảnh sẽ đăng (ko tính ảnh có sẵn)
                // dd($data);
                foreach ($data as $key => $value)
                {
                    if (in_array($value, $getArrImage))
                    {
                        // dd( $value);
                        unset($data[$key]);
                    }
                }
        }
        else
        {
            $data = [];
            
        }

        $sum = array_merge($getArrImage, $data); 
        
        // // dd($count + count($data));
        // // dd($count + $aa);
        if ( count($sum) > 3)
        {
            return redirect()->back()->withErrors('Đã upload quá 3 file ảnh');
        }
        else if (count($sum) == 0)
        {
            return redirect()->back()->withErrors('Mục hình ảnh không được để trống!!');
        }
        else
        {
            // $product->image=json_encode($sum);
            // dd(json_encode($sum));
            // $product->save();
            
            Product::where('id', $id)
                ->update([
                    'image'=> json_encode($sum)
                ]);
            return back()->with('success', 'Your images has been successfully');
        }

        // }

        
        

// exit;
        // echo ($item);

        
    }


    public function Updatesss(Request $request, $id)
    {
        $product = Product::findorFail($id);
        // dd($product);
        $infor = $request->all();
        $infor['id_category'] = (int)($request->category);
        $infor['brand'] = (int)($request->brand);
        $infor['status'] = (int)($request->status);
        $infor['sale'] = (int)($request->sale);
        // dd($product);
        // dd($request->sale);

        // if ($product->update())

        
        // $name = '0.jpg';
        // $data[] = $name; 

        // Product::where('id', $id)
        //         ->update([
        //             'name'=> $request->name,
        //             'price' => $request->price,
        //             'id_category' => (int)($request->category),
        //             'id_brand'  => (int)($request->brand),
        //             'status'   => (int)($request->status) ,
        //             'sale'     => (int)($request->sale) ,
        //             'company'  => $request->company,
        //             'image'    => json_encode($data),
        //             'detail'   => $request->detail
        //         ]);
        // return redirect()->back();

        if($product->update($infor))
        {
            if ($request->checked)
        {
            $checked_img = $request->checked;
            // dd($checked_img);
            // dd(count($checked_img));
        }
        else
        {
            $checked_img = [];
            // dd(count($checked_img));
        }

        // // dd($request->checked);   //mang cac hinh anh muon xoa
        // $checked_img = $request->checked; //mảng các hình ảnh muốn xoá (đã check);
        // // dd($checked_img[0]);
        $pro = Product::find($id)->toArray(); //mảng thông tin về product cần update
        

        $getArrImage = json_decode($pro['image'], true); 
        // dd($getArrImage[1]);

        foreach($getArrImage as $key => $value)
        {
            
            if (in_array($value, $checked_img))
            {
                unset($getArrImage[$key]);
            }
        }
        
        echo '<pre>';
        $getArrImage = array_values($getArrImage);
        $count = count($getArrImage);  // đếm số ảnh còn lại
        
        
        
        $data = [];
        if($request->hasfile('image'))
        {
                    
            
                foreach($request->file('image') as $image)
                {
                    
                    
                        $name = $image->getClientOriginalName();
                        // dd($name);
                        $name_2 = "2".$image->getClientOriginalName();
                        // dd($name_2);
                        $name_3 = "3".$image->getClientOriginalName();

                        //$image->move('upload/product/', $name);
                        
                        $path = public_path('upload/product/small/' . $name);
                        $path2 = public_path('upload/product/middle/' . $name_2);
                        $path3 = public_path('upload/product/full/' . $name_3);

                        Image::make($image->getRealPath())->resize(85,84)->save($path);
                        Image::make($image->getRealPath())->resize(329, 380)->save($path2);
                        Image::make($image->getRealPath())->save($path3);
                        
                        $data[] = $name;
                        
                        
                        
                    
                    
                }
                $aa = count($data);     // đếm số ảnh sẽ đăng (ko tính ảnh có sẵn)
                // dd($aa);
        }
        else
        {
            $data = [];
            // dd(count($data));
        }

        $sum = array_merge($getArrImage, $data); 
        $num = count($sum);
        // dd($sum);
        // dd($count + count($data));
        // dd($count + $aa);
        if ( count($sum) > 3)
        {
            return redirect()->back()->withErrors('Đã upload quá 3 file ảnh');
        }

        // else if (count($sum) == 0)
        // {
        //     return redirect()->back()->withErrors('Ảnh product không được trống');
        // }
        else
        {
            $product->image=json_encode($sum);
            // dd(json_encode($sum));
            // $product->save();
            return back()->with('success', 'Your images has been successfully');
        }
        }

        
        

exit;
        // echo ($item);

        
    }


    public function Updates(Request $request, $id)
    {
        if ($request->hasFile('image'))
        {
            // echo 'aaa';

            $file = $request->image;
            // dd($file);
            foreach ($file as $value)
            {
               $fi =  $value->getClientOriginalName();
            echo $fi;
            }
            // dd($filename[0]);
        }
    }

    public function Detail($id)
    {
        $id_cate = Product::where('id', $id)->value('id_category');
        // dd($id_cate);
        $product = Product::where('id', $id)->get();
        $brand = Brand::all();
        $category = Category::all();
        $rate = Rate::where('id_blog', $id)->avg('rate');
        $rate = round($rate);
        $count_rate = Rate::where('id_blog', $id)->count();
        $comment = Comment::where('id_product', $id)->where('type', 1)->paginate(3);
        $same_cate_product = Product::where('id_category', $id_cate)->take(3)->get();
        $same_cate_product_2 = Product::where('id_category', $id_cate)->skip(3)->take(3)->get();

        // var_dump($count_rate);
        return view('frontend.product.productdetail', compact('product','brand', 'category', 'rate', 'count_rate','comment','same_cate_product','same_cate_product_2'));
    }


    public function Rate_Product(Request $request)
    {
        $rating = new Rate();

        $rating->id_blog = $request->id_product;
        // dd($request->id_user);
        $rating->id_user = Auth::user()->id;

        $rating->rate = $request->rate;
        $rating->type = 1;
        $rating->save();
        // dd($rating);

        if(!$rating->save()){
            App::abort(500, 'Error');
        }
        else
        {
            return redirect()->back()->with('success', 'Đã gửi đánh giá!');
        }

    }

    public function Product_Comment(Request $request)
    {
        $comment = new Comment();
        $comment->comment = $request->comment;
        // dd($request->comment);
        
        $comment->id_user = Auth::user()->id;
        $comment->id_blog = 0;
        $comment->id_product = $request->id_product;
        $comment->name = Auth::user()->name;
        $comment->avatar = Auth::user()->avatar;
        $comment->level = 0;
        $comment->type = 1;
        $comment->save();

        return redirect()->back()->with(compact('comment'));
    }

}
