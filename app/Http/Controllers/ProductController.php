<?php

namespace App\Http\Controllers;

use App\products;
use App\categories;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $product = products::all();
        return view('admin.products.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $this->validate( $request, [
            'product_name' => 'required|unique:products',
            'price' => 'required|numeric',
        ],[
            'product_name.required' => 'Tên Sản Phẩm Không Được Để Trống',
            'product_name.unique' => 'Tên Sản Phẩm Đã Tồn Tại',
            'price.required' => 'Giá Không Được Để Trống',
            'price.numeric' => 'Giá Phải Là Số',
        ]);
        $images = null;
        $path = 'assets/images/upload/';
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $file_name = $file -> getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $name = date('d-m-Y').time().rand(11111,99999).'.'.$extension;
            $file->move(
                $path, //nơi cần lưu
                $name //tên file
            );
            $images = $path.$name;
        }
        else
        {
            $images = null;
        }

        $product = new products();
        $product->product_name = $request->product_name;
       // product_name	price	quantity	image	trademark	description	status	categories_id
        $product->price = $request->price;
        $product->quantity = 9999;
        $product->slug = Str::slug($request->product_name, '-');
        $product->price_seo = 0;
        $product->image = $images;
        $product->trademark = $request->trademark;
        $product->description = $request->description;
        $product->categories_id = $request->categories_id;
        $product->status = $request->status;
        $check = $product->save();
        $url = $product->slug.'-'.$product->id;
        $product->where('id', $product->id)->update(['slug' => $url]);
        if ($check){
            return redirect()->route('product.index')->with('thongbao', 'Thêm Thành Công Danh Mục '.$request->product_name);
        }
        return view('admin/product')->with('thongbao', 'Có Lỗi Trong Quá Trình Thêm Mới '.$request->product_name);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, products $products)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, products $products)
    {
        //

        products::find($id)->delete();
        return redirect()->route('product.index')
            ->with('Thông Báo','Xóa Sản Phẩm Thành Công');
    }
}
