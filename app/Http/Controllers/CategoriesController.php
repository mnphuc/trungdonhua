<?php

namespace App\Http\Controllers;

use App\categories;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = categories::all();
        return view('admin.page.categories', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        session(['check_action' => 'add']);
        $this->validate( $request, [
            'categories_name' => 'required|unique:categories',
            'images' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],[
            'categories_name.required' => 'Tên Danh Mục Không Được Để Trống',
            'categories_name.unique' => 'Tên Danh Mục Đã Tồn Tại',
            'images.image' => 'Ảnh Không Đúng Định Dạng',
            'images.mimes' => 'Logo Sai Định Dạng Cho Phép',
            'images.max' => 'Ảnh Vượt Quá Dung Lượng Cho Phép'
        ]);
        $images = null;
        $path = 'assets/images/upload/';
        if($request->hasFile('images'))
        {
            $file = $request->file('images');
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

        $categories = new categories();
        $categories->categories_name = $request->categories_name;
        $slug = Str::slug($request->categories_name, '-');
        $categories->slug = Str::slug($request->categories_name, '-');
        $categories->images = $images;
        $categories->status = $request->status;
        $check = $categories->save();
        $url = $slug.'-'.$categories->id;
        $categories->where('id', $categories->id)->update(['slug' => $url]);
        if ($check){
            return redirect()->route('danhmuc.index')->with('thongbao', 'Thêm Thành Công Danh Mục '.$request->categories_name);
        }
        return view('admin/danhmuc')->with('thongbao', 'Có Lỗi Trong Quá Trình Thêm Mới '.$request->categories_name);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function show(categories $categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function edit(categories $categories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, categories $categories)
    {
        //
        session(['check_action' => 'edit', 'eid'=>$request->id]);
        $this->validate( $request, [
            'categories_name' => 'required',
            'images' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],[
            'categories_name.required' => 'Tên Danh Mục Không Được Để Trống',
            'images.image' => 'Ảnh Không Đúng Định Dạng',
            'images.mimes' => 'Logo Sai Định Dạng Cho Phép',
            'images.max' => 'Ảnh Vượt Quá Dung Lượng Cho Phép'
        ]);
        $images = null;
        $path = 'assets/images/upload/';
        if($request->hasFile('images'))
        {
            $file = $request->file('images');
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
        $cat = categories::find($request->id);
        $cat->categories_name = $request->categories_name;
        if ($images != null){
            $cat->images = $images;
        }else{
            $cat->images = $cat->images;
        }
        $cat->status = $request->status;
        $cat->save();
        return redirect()->route('danhmuc.index')
            ->with('thongbao','cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function destroy($id ,categories $categories)
    {
        dd($categories);
        $categories::destroy($id);

        return redirect()->route('danhmuc.index')
            ->with('thongbao','Xóa Danh Mục Thành Công');
    }
}
