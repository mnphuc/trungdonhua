@extends('master')
@section('contents')
    @php($totalPrice = 0)
    <section class="bread-crumb">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <ul class="breadcrumb">
                        <li class="home">
                            <a href="">
							<span>
								<i class="fa fa-home"></i> Trang chủ
							</span>
                            </a>
                            <span>
							<i class="fa">/</i>
						</span>
                        </li>
                        <li>
                            <strong>Giỏ hàng</strong>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    @if(session('cart'))
        <div class="container white collections-container margin-bottom-20">
            <div class="white-background">
                <div class="row">
                    <div class="col-md-12">
                        <div class="shopping-cart">
                            <div class="visible-md visible-lg">
                                <div class="shopping-cart-table">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h1 class="lbl-shopping-cart lbl-shopping-cart-gio-hang">Giỏ hàng</h1>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-main cart_desktop_page cart-page">
                                                <div class="cart page_cart cart_des_page hidden-xs-down">
                                                    <div class="col-xs-9 cart-col-1">
                                                        <div class="cart-tbody">

                                                            @foreach(session('cart') as $id => $detaill)
                                                                @php($totalPrice += $detaill['price'] * $detaill['quantity'])
                                                            <div class="row shopping-cart-item productid-0">
                                                                <div class="col-xs-3 img-thumnail-custom">
                                                                    <p class="image">
                                                                        <img class="img-responsive" src="{{$detaill['photo']}}" alt="{{$detaill['name']}}">
                                                                    </p>
                                                                </div>
                                                                <div class="col-right col-xs-9">
                                                                    <div class="box-info-product">
                                                                        <p class="name">
                                                                            <a href="{{asset(route('getProduct',$detaill['slug']))}}" title="{{$detaill['name']}}" >{{$detaill['name']}}</a>
                                                                        </p>
                                                                        <p class="seller-by hidden">{{$detaill['name']}}</p>
                                                                        <p class="action">
                                                                            <a class="btn btn-link btn-item-delete remove-item-cart" onclick="cart.remove('{{$id}}');">Xóa</a>
                                                                        </p>
                                                                    </div>
                                                                    <div class="box-price">
                                                                        <p class="price">{{number_format($detaill['price'])}}đ</p>
                                                                    </div>
                                                                    <div class="quantity-block">
                                                                        <div class="input-group bootstrap-touchspin">
                                                                            <div class="input-group-btn input_qty_pr">
                                                                                <button class="increase_pop items-count btn-plus btn btn-default bootstrap-touchspin-up" type="button">+</button>
                                                                                <input type="text" maxlength="12" min="1" class="form-control quantity-r2 quantity js-quantity-product input-text number-sidebar input_pop input_pop qtyItem1035080095" id="quantityPc{{$id}}" data-key="{{$id}}" name="quantity{{$id}}" disabled size="4" value="{{$detaill['quantity']}}">
                                                                                <button class="reduced_pop items-count btn-minus btn btn-default bootstrap-touchspin-down" type="button" >–</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-3 cart-col-2 cart-collaterals cart_submit">
                                                        <div id="right-affix">
                                                            <div class="each-row">
                                                                <div class="box-style fee">
                                                                    <p class="list-info-price">
                                                                        <span>Thành tiền: </span>
                                                                        <strong class="totals_price price _text-right text_color_right1" id="totalPrice">{{number_format($totalPrice)}}đ</strong>
                                                                    </p>
                                                                </div>
                                                                <div class="box-style fee">
                                                                    <p class="list-info-price">
                                                                        <span>Tổng số: </span>
                                                                        <strong class="totals_price price _text-right text_color_right1" id="totalPrice2">{{number_format($totalPrice+20000)}}đ</strong>
                                                                    </p>
                                                                </div>
                                                                <button class="button btn-proceed-checkout btn btn-large btn-block btn-danger btn-checkout" title="Tiến hành thanh toán" type="button" onclick="window.location.href='{{asset(route('checkout'))}}'">Tiến hành thanh toán</button>
                                                                <button class="button btn-proceed-checkout btn btn-large btn-block btn-danger btn-checkouts" title="Tiếp tục mua hàng" type="button" onclick="window.location.href='{{asset(route('index'))}}'">Tiếp tục mua hàng</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="visible-sm visible-xs">
                                <div class="cart-mobile">
                                        <div class="header-cart">
                                            <div class="title-cart">
                                                <h3>Giỏ hàng</h3>
                                            </div>
                                        </div>
                                        <div class="header-cart-content">
                                            <div class="cart_page_mobile content-product-list">
                                                @foreach(session('cart') as $id => $detaill)
                                                <div class="item-product item productid-">
                                                    <div class="item-product-cart-mobile">
                                                        <a class="product-images1" href="" title="">
                                                            <img width="80" height="150" src="{{$detaill['photo']}}" alt="{{$detaill['name']}}">
                                                        </a>
                                                    </div>
                                                    <div class="title-product-cart-mobile">
                                                        <p>Tổng:
                                                            <span>{{number_format($detaill['price']* $detaill['quantity'])}}đ</span>
                                                        </p>
                                                    </div>
                                                    <div class="select-item-qty-mobile">
                                                        <div class="quantity-block">
                                                            <div class="input-group bootstrap-touchspin">
                                                                <div class="input-group-btn input_qty_pr">
                                                                    <button class="increase_pop items-count btn-plus btn btn-default bootstrap-touchspin-up" type="button" >+</button>
                                                                    <input type="text" maxlength="12" min="1" class="form-control quantity-r2 quantity js-quantity-product input-text number-sidebar input_pop qtyItem1035080095" id="qtyItem{{$id}}" name="quantity" size="4" value="{{$detaill['quantity']}}">
                                                                    <button class="reduced_pop items-count btn-minus btn btn-default bootstrap-touchspin-down" type="button">–</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <a class="btn btn-link btn-item-delete remove-item-cart" onclick="cart.remove('{{$id}}');">Xóa</a>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                            <div class="header-cart-price">
                                                <div class="title-cart ">
                                                    <h3 class="text-xs-left">Tổng số:</h3>
                                                    <a class="text-xs-right totals_price_mobile">{{number_format($totalPrice+20000)}}đ</a>
                                                </div>
                                                <div class="checkout">
                                                    <button class="button btn-proceed-checkout btn btn-large btn-block btn-danger btn-checkout" title="Tiến hành thanh toán" type="button" onclick="window.location.href='{{asset(route('checkout'))}}'">Tiến hành thanh toán</button>
                                                    <button class="button btn-proceed-checkout btn btn-large btn-block btn-danger btn-checkouts" title="Tiếp tục mua hàng" type="button" onclick="window.location.href='{{asset(route('index'))}}'">Tiếp tục mua hàng</button>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <section class="page">
            <div class="container">
                <div class="row">
                    <div id="content" class="col-sm-12 col-xs-12 col-md-12">
                        <div class="page-title category-title">
                            <h1 class="title-head">
                                <span>Giỏ hàng</span>
                            </h1>
                        </div>
                        <div class="content-page rte">
                            <p>Giỏ hàng trống!</p>
                            <div class="buttons clearfix">
                                <div class="pull-right">
                                    <a href="{{asset(route('index'))}}" class="btn btn-primary">Tiếp tục mua hàng</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <div class="container"></div>
@endsection
@section('script')


    <script>
        $(document).ready(function() {
            $('button.items-count').on('click', function() {
                var result = $(this).closest('.input_qty_pr').find('input.input_pop');
                var qty = parseInt(result.val());
                var id = parseInt(result.data('key'));

                if($(this).hasClass('reduced_pop'))
                    if( !isNaN(qty) && qty > 1 ) result.val(--qty);
                    if($(this).hasClass('increase_pop'))
                        if( !isNaN(qty)) result.val(++qty);
                uploadProduct(id, qty);

            });

        });

        // $(document).ready(function () {
        //     $('.bootstrap-touchspin-up').on('click',function () {
        //         $quantity = $('.qtyItem').val();
        //         if ($quantity != 1){
        //             uploadProduct($quantity);
        //         }
        //     })
        //     $('.bootstrap-touchspin-down').on('click', function () {
        //         $quantity = $('#quantityPc').val();
        //         if ($quantity != 1){
        //             uploadProduct($quantity);
        //         }
        //     })
        // })
        function formatNumber (num) {
            return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
        }
        function uploadProduct(id, quantity) {
            $.ajax({
                url: '{{asset(route('updateCart'))}}',
                data: {
                    id: id,
                    quantity: quantity
                },
                type: 'POST',
                dataType: 'JSON',
                success: function (json) {
                    var number = json.total.split(' ')[0];
                    var price = json.total.split(' ')[4];
                    setTimeout(function() {

                        $('#cart .cartCount2').html('(' + number + ')');
                        $('#cart .cart-total').html(number);
                        $('.icon-cart-mobile .cartCount').html(number);
                        $('#totalPrice').text(formatNumber(price)+'đ');
                        $('#totalPrice2').text(formatNumber(parseInt(price)+ 20000)+'đ');
                    }, 100);
                    $('#cart .top-cart-content').load('/info ul#cart-sidebar')
                }
            })
        }
    </script>
@endsection
