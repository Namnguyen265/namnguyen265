<?php

namespace App\Http\Controllers\Admin;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;

class ProductController extends Controller
{
    //
    public function View()
    {
        $product = Product::paginate(5);
        // dd($product);
        return view('admin.product.product', compact('product'));
    }

    
    public function Edit($id)
    {
        $product = Product::where('id' , $id )->get();
        $category = Category::all();
        $brand = Brand::all();
        return view('admin.product.updateproduct', compact('category', 'brand', 'product'));
    }
    

    public function Create()
    {

        $category = Category::all();
        $brand = Brand::all();
        $product = Product::all();
        // $getProducts = Product::find(1)->toArray();
        // dd($getProducts);

        // $getArrImage = json_decode($getProducts['image'], true);
        // dd($getArrImage);
        return view('admin.product.createproduct', compact('category','brand'));
    }

    public function Store(Request $request)

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
        $product->quantity = $request->quantity;
        $product->sold_quantity = 0;
        $product->product_revenue = 0;
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
            return redirect()->back()->withErrors('Kh??ng ???????c upload qu?? 3 file ???nh');
        }
        else
        {
            $product->image=json_encode($data);
            // // dd($product->image);
            $product->save();

            return back()->with('success', 'Your images has been successfully');
        }
        
    }


    public function Update(Request $request , $id)
    {
        $product = Product::findorFail($id);



        Product::where('id', $id)
                ->update([
                    'name'=> $request->name,
                    'price' => $request->price,
                    'quantity' => $request->quantity,
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
        // // $checked_img = $request->checked; //m???ng c??c h??nh ???nh mu???n xo?? (???? check);
        // // // dd($checked_img[0]);
        $pro = Product::find($id)->toArray(); //m???ng th??ng tin v??? product c???n update
        

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
        $count = count($getArrImage);  // ?????m s??? ???nh c??n l???i
        
        
        
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
                $aa = count($data);     // ?????m s??? ???nh s??? ????ng (ko t??nh ???nh c?? s???n)
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
            return redirect()->back()->withErrors('???? upload qu?? 3 file ???nh');
        }
        else if (count($sum) == 0)
        {
            return redirect()->back()->withErrors('M???c h??nh ???nh kh??ng ???????c ????? tr???ng!!');
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
    }


    public function Delete($id)
    {
        $query = Product::where('id', $id)->delete();
        if ($query)
        {
            return redirect()->back()->with('success', 'Xo?? s???n ph???m th??nh c??ng');
        }
        else
        {
            return redirect()->back()->withErrors('???? c?? l???i x???y ra');
        }
    }

    public function Search(Request $request)
    {
        $keyword = $request->keyword;
        // $category = Category::all();
        // $brand = Brand::all();
        $product = Product::where('name', 'like' , '%'.$keyword.'%')->get();
        
        // // dd($search_product);
        if (count($product) != 0)
        {
            return view('admin.product.search_product', compact( 'product'));
        }
        else
        {
            return view('admin.product.search_product', compact('product'))->withErrors('Kh??ng c?? s???n ph???m ????? hi???n th???');

        }

        
    }
    
}
