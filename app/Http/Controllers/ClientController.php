<?php

namespace App\Http\Controllers;
use  App\categories;
use App\mnphuc_quanhuyen;
use  App\products;
use App\mnphuc_tinhthanhpho;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendMail;
class ClientController extends Controller
{
    //
    public function getCategories($slug){
        $cate = categories::all();
        $cat = categories::where('slug', $slug)->first();
        $proCate = products::where('categories_id', $cat->id)->get();
        return view('page.categories', compact('cat','cate', 'proCate'));
    }
    public function Cart(){
        return view('page.cart');
    }
    public function addToCart(Request $request){
        $id = $request->product_id;
        $quantity = $request->quantity;
        $product = products::find($id);
        if (!$product){
            return Response('Mã sản phẩm này không tồn tại', 200)->header('Content-Type', 'text/plain');
        }
        $cart = session()->get('cart');
        if (!$cart){
            $cart = [
                $id => [
                    "id" => $product->id,
                    "name" => $product->product_name,
                    "quantity" => $quantity,
                    "slug" => $product->slug,
                    "price" => $product->price,
                    "photo" => $product->image
                ]
            ];
            $totalAddCart = 0;
            foreach ($cart as $ca => $c){
                $totalAddCart += $c['quantity'];
            }
           session()->put('cart', $cart);
           return Response()->json(['success' => 'Thành công: Bạn Đã Thêm <a href="sanpham/'.$product->slug.'">'.$product->product_name.'</a> vào <a href="/giohang"></a>', 'total' => ''.$totalAddCart.' Sản phẩm - '.$cart[$id]['quantity']*$product->price.'', 'number' => $totalAddCart])->header('Content-Type', 'text/plain');
        }
        if(isset($cart[$id])) {
            $cart[$id]['quantity']+=$quantity;
            session()->put('cart', $cart);
            $totalCart = 0;
            foreach ($cart as $ca => $c){
                $totalCart += $c['quantity'];
            }
            return Response()->json(['success' => 'Cập Nhật Thành công: Bạn Đã Cập Nhật <a href="sanpham/'.$product->slug.'">'.$product->product_name.'</a> vào <a href="/giohang"></a>', 'total' => ''.$totalCart.' Sản phẩm - '.$cart[$id]['quantity']*$product->price.'', 'number' => $totalCart])->header('Content-Type', 'text/plain');
        }
        $cart[$id] = [
            "id" => $product->id,
            "name" => $product->product_name,
            "quantity" => $quantity,
            "slug" => $product->slug,
            "price" => $product->price,
            "photo" => $product->image
        ];
        session()->put('cart', $cart);
        $totalAddCart2 = 0;
        foreach ($cart as $ca =>$c){
            $totalAddCart2 += $c['quantity'];
        }
        return Response()->json(['success' => 'Thành công: Bạn Đã Thêm <a href="sanpham/'.$product->slug.'">'.$product->product_name.'</a> vào <a href="/giohang"></a>', 'total' => ''.$totalAddCart2.' Sản phẩm - '.$cart[$id]['quantity']*$product->price.'', 'number' => $totalAddCart2])->header('Content-Type', 'text/plain');

    }
    public function updateCart(Request $request){
        $id = $request->id;
        $quantity = $request->quantity;
        $product = products::find($id);
        $cart = session()->get('cart');
        $cart[$id]['quantity'] = $quantity;
        session()->put('cart', $cart);
        $totalCart = 0;
        foreach ($cart as $ca => $c){
            $totalCart += $c['quantity'];
        }
        return Response()->json(['success' => 'Cập Nhật Thành công: Bạn Đã Cập Nhật <a href="sanpham/'.$product->slug.'">'.$product->product_name.'</a> vào <a href="/giohang"></a>', 'total' => ''.$totalCart.' Sản phẩm - '.$totalCart * $product->price.'', 'number' => $totalCart])->header('Content-Type', 'text/plain');
    }
    public function removeCart(Request $request){
        $getKey = $request->key;
        $key = 'cart.'.$getKey.'';
        session()->forget($key);
        $cart = session()->get('cart');
        $total = 0;
        $price = 0;
        foreach ($cart as $ca =>$c){
            $total += $c['quantity'];
            $price += $c['price'] * $c['quantity'];
        }
        return response()->json(['success' => 'Thành Công: bạn Đã Sửa Thành Công Giỏ Hàng', 'total'=> ''.$total.' Sản Phẩm - '.number_format($price).'đ']);

        //dd($request->all());
    }
    public function getInfo(){
        return view('layout.cart');
    }
    public function checkout(){
        if (session('cart')){
            return view('page.checkout');
        }
        else{
            return view('page.cart');
        }

    }
    public function postCheckout(Request $request){
        $this->validate( $request, [
            'fullName' => 'required|min:2',
            'email' => 'required|email',
            'city' => 'required|required_with:null',
            'phone' => 'required|numeric',
            'address_1' => 'required|min:5'
        ],[
            'fullName.required' => 'Họ Tên Không Được Để Trống',
            'fullName.min' => 'Họ Tên Phải Lớn Hơn 2 Ký Tự',
            'city.required' => 'Phải Chọn Thành Phố',
            'phone.required' => 'Phải Nhập Số Điện Thoại',
            'phone.numeric' => 'Phải Nhập Số',
            'email.required' => 'Email Không Được Để Trống',
            'email.email' => 'Email Không Đúng Định Dạng',
            'address_1.required' => 'Phải Nhập Địa Chỉ',
            'address_1.min' => 'Địa Chỉ Không Đúng Định Dạng',
        ]);
        $details = [
            'title' => 'Mail from ItSolutionStuff.com',
            'body' => 'This is for testing email using smtp'
        ];
        $data = array(
            'name'=> $request->fullName
        );
        Mail::to('phucmnp@gmail.com')->cc('phucmnp@gmail.com')->send(new sendMail($data));
        dd("send thành công rồi");

    }
    public function getProvince(){
        $province = mnphuc_tinhthanhpho::all();
        return response()->json($province);
    }
    public function getCountry(Request $request){
        $contry = mnphuc_quanhuyen::where('cityId', '=', $request->idProvince)->get();
        return response()->json($contry);
    }

}
