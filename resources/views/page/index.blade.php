@extends('master')
@section('title', 'Đồ Nhựa Tiết Kiệm Và An Toàn')
@section('contents')
@include('layout.banner')
<div class="container-fluid">
    <div class="row">
        <div id="content" class="col-sm-12 col-xs-12 col-md-12">
            <section class="awe-section-2">
                <div class="section_banner_home hidden-xs">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3 col-sm-3 box box1">
                                <div class="box-inner">
                                    <a href="#">
                                        <img src="assets/images/image/cache/catalog/one_banner_1_image-270x340.jpg" alt="Hàng mới về" />
                                    </a>
                                    <div class="text">
                                        <p>Hàng mới về</p>
                                        <p>
                                            <strong>Mẫu bàn ăn 2018</strong>
                                        </p>
                                        <p>Giảm giá đến 20%</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 box box2">
                                <div class="box-inner">
                                    <a href="#">
                                        <img src="assets/images/image/cache/catalog/one_banner_2_image-565x340.jpg" alt="Ý tưởng thiết kế nội thất" />
                                    </a>
                                    <div class="text">
                                        <p>Ý tưởng thiết kế nội thất</p>
                                        <p>
                                            <strong>Ghế gỗ - Mẫu bàn mới</strong>
                                        </p>
                                        <p>Chỉ từ 1tr VNĐ - Giảm giá 60%</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 box box3">
                                <div class="box-inner">
                                    <a href="#">
                                        <img src="assets/images/image/cache/catalog/one_banner_3_image-270x340.jpg" alt="Thương hiệu mới" />
                                    </a>
                                    <div class="text">
                                        <p>Thương hiệu mới</p>
                                        <p>
                                            <strong>Ghế Conpenhagen</strong>
                                        </p>
                                        <p>Giảm giá đến 40%</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="awe-section-3">
                <div class="section_product">
                    <div class="container">
                        <div class="row">
                            @include('layout.categories')
                            <div class="col-md-9">

                                        <div class="section-head">
                                            <span class="group-icon">
                                                <i class="fa fa-dashcube" aria-hidden="true"></i>
                                            </span>
                                            <h2>Sản phẩm bán chạy</h2>
                                        </div>

                                    <section class="products-view products-view-grid">
                                        <div class="row">
                                            @foreach($productHot as $pro)
                                            <div class="col-xs-4 col-sm-4 col-md-3 col-lg-3">
                                                <div class="ant-product-item">
                                                    <div class="product_row">
                                                        <div class="item">
                                                            <div class="item-inner">
                                                                <div class="image-container">
                                                                    <a href="{{route('getProduct', $pro->slug)}}" class="product-item-photo">
                                                                        <img class="product-image-photo img-responsive center-block image-pc" src="{{asset($pro->image)}}" data-lazyload="{{asset($pro->image)}}" alt="{{$pro->product_name}}" style="">
                                                                    </a>
                                                                </div>
                                                                <div class="box-info">
                                                                    <h2 class="product-item-name">
                                                                        <a title="{{$pro->product_name}}" href="{{asset(route('getProduct', $pro->slug))}}" class="product-item-link"> {{$pro->product_name}} </a>
                                                                    </h2>
                                                                    <div class="item-price">
                                                                        <div class="price-box price-final_price">
                                                                            <span class="">
                                                                                <span class="price-container">
                                                                                    <span class="price-wrapper">
                                                                                        <span class="price">{{$pro->price}}đ</span>
                                                                                    </span>
                                                                                </span>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="box-hover hidden-sm hidden-xs hidden-md">
                                                                        <div class="add-to-links">
                                                                            <div class="actions-primary">
                                                                                <div class="variants form-nut-grid">
                                                                                    <button onclick="cart.add('{{$pro->id}}', '1');" class="btn-buy btn-cart btn btn-gray left-to" title="Mua ngay">
                                                                                        <i class="ion ion-md-cart"></i>
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                            <a href="{{asset(route('getProduct',$pro->slug))}}" class="quick-view" title="Xem">
                                                                                <i class="ion ion-ios-search"></i>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        <div class="text-xs-right">
                                            <nav class="text-center"></nav>
                                        </div>
                                    </section>
                        </div>
                    </div>
                </div>
                    </div>

            </section>
            <section class="awe-section-4">
                <div class="section_product">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="section-head">
                                    <span class="group-icon">
                                        <i class="fa fa-dashcube" aria-hidden="true"></i>
                                    </span>
                                    <h2>Tất Cả Sản Phẩm</h2>
                                </div>
                            </div>
                            <section class="products-view products-view-grid">
                                <div class="row">
                                    @foreach($product as $pro)
                                        <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
                                            <div class="ant-product-item">
                                                <div class="product_row">
                                                    <div class="item">
                                                        <div class="item-inner">
                                                            <div class="image-container">
                                                                @if($pro->price_seo)
                                                                    <span class="sale"> {{$pro->price_seo}}% </span>
                                                                @endif
                                                                <a href="{{asset(route('getProduct', $pro->slug))}}" class="product-item-photo">
                                                                    <img class="product-image-photo img-responsive center-block" src="{{asset($pro->image)}}" data-lazyload="{{asset($pro->image)}}" alt="{{$pro->product_name}}" style="width: 285px; height: 285px">
                                                                </a>
                                                            </div>
                                                            <div class="box-info">
                                                                <h2 class="product-item-name">
                                                                    <a title="{{$pro->product_name}}" href="{{asset(route('getProduct', $pro->slug))}}" class="product-item-link"> {{$pro->product_name}} </a>
                                                                </h2>
                                                                <div class="item-price">
                                                                    <div class="price-box price-final_price">
                                                        <span class="special-price">
                                                            <span class="price-container">
                                                                <span class="price-wrapper">
                                                                    <span class="price">{{number_format($pro->price)}}đ</span>
                                                                </span>
                                                            </span>
                                                        </span>
                                                                        <span class="old-price">
                                                            <span class="price-container">
                                                                <span class="price-wrapper">
                                                                    <span class="price">{{number_format($pro->price_seo)}}đ</span>
                                                                </span>
                                                            </span>
                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="box-hover hidden-sm hidden-xs hidden-md">
                                                                    <div class="add-to-links">
                                                                        <div class="actions-primary">
                                                                            <div class="variants form-nut-grid">
                                                                                <button onclick="cart.add('{{$pro->id}}', '1');" data-id="{{$pro->id}}" id="addToCart" class="btn-buy btn-cart btn btn-gray left-to" title="Mua ngay">
                                                                                    <i class="ion ion-md-cart"></i>
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                        <a href="{{asset(route('getProduct', $pro->slug))}}" class="quick-view" title="Xem">
                                                                            <i class="ion ion-ios-search"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="container text-center">
                                {!! $product->links() !!}
                                </div>
                                <div class="text-xs-right">
                                    <nav class="text-center"></nav>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
</div>
@endsection
@section('script')
    <script >
        function getInfo() {
            $.ajax({
                url: '{{route('info')}}',
                type: 'GET',
                success : function (result) {
                    console.log(result);
                }
            })
        }
        function addToCart(id , quantity){
            console.log(id);
            $.ajax({
                url: '{{route('addToCart')}}',
                type: 'POST',
                data: {
                    id: id,
                    quantity: quantity
                },
                dataType: 'json',
                success : function (result){
                    console.log(result);
                    if (result != null){
                            getInfo();
                    }

                }
            });
        }
        // $(document).ready(function() {
        //     $('#addToCart').on('click', function(e) {
        //
        //     });
        // });
    </script>
@endsection
