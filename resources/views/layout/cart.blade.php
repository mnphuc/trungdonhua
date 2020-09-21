@php($total = 0)
@php($count = 0)
@if(session('cart'))
    @foreach(session('cart') as $id => $detail)
          @php($count += $detail['quantity'])
        @endforeach
@endif
<div id="cart">
    <div class="top-cart-contain f-right">
        <div class="mini-cart text-xs-center">
            @if(session('cart'))
                    <div class="minicart-wrapper">
                        <a class="showcart" href="{{asset(route('cart'))}}" title="Giỏ hàng">
                            <i class="ion ion-md-cart"></i>
                            <span class="cart-value cart-total count_item_pr">{{$count}}</span>
                            <span class="content">
						<span class="content-inner">
							<span class="text">Giỏ hàng</span>
						</span>
					</span>
                        </a>
                    </div>
                    <div class="top-cart-content">
                        <ul id="cart-sidebar" class="mini-products-list count_li">
                            <ul class="list-item-cart">
                                @foreach(session('cart') as $id => $detail)
                                @php($total += $detail['price'] * $detail['quantity'])
                                <li class="item productid-0">
                                    <div class="border_list">
                                        <a class="product-image" href="{{asset(route('getProduct', $detail['slug']))}}" title="{{$detail['name']}}">
                                            <img alt="{{$detail['name']}}" src="{{asset($detail['photo'])}}" width="100">
                                        </a>
                                        <div class="detail-item">
                                            <div class="product-details">
                                                <p class="product-name">
                                                    <a class="text2line" href="{{asset(route('getProduct', $detail['slug']))}}">{{$detail['name']}}</a>
                                                </p>
                                            </div>
                                            <div class="product-details-bottom">
                                                <span class="price">{{number_format($detail['price'])}}đ</span>
                                                <div class="quantity-select qty_drop_cart">x {{$detail['quantity']}}</div>
                                                <a href="javascript:void(0);" onclick="cart.remove({{$id}});" title="Xóa" class="remove-item-cart fa fa-times">&nbsp;</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                            <div class="pd">
                                <div class="top-subtotal">Thành tiền:
                                    <span class="price">{{number_format($total)}}đ</span>
                                </div>
                                <div class="top-subtotal">Tổng số:
                                    <span class="price">{{number_format($total)}}đ</span>
                                </div>
                            </div>
                            <div class="pd right_ct">
                                <a href="{{asset(route('cart'))}}" class="btn btn-primary">
                                    <span>Giỏ hàng</span>
                                </a>
                                <a href="{{asset(route('checkout'))}}" class="btn btn-white">
                                    <span>Thanh toán</span>
                                </a>
                            </div>
                        </ul>
                    </div>

            @else
                <div class="minicart-wrapper">
                    <a class="showcart" href="{{asset(route('cart'))}}" title="Giỏ hàng">
                        <i class="ion ion-md-cart"></i>
                        <span class="cart-value cart-total count_item_pr">0</span>
                        <span class="content">
						<span class="content-inner">
							<span class="text">Giỏ hàng</span>
						</span>
					</span>
                    </a>
                </div>
                <div class="top-cart-content">
                    <ul id="cart-sidebar" class="mini-products-list count_li">
                        <div class="no-item">
                            <p>Giỏ hàng của bạn trống!</p>
                        </div>
                    </ul>
                </div>
            @endif

        </div>
    </div>
</div>
{{--có hàng--}}
<div id="cart">
    <div class="top-cart-contain f-right">
        <div class="mini-cart text-xs-center">

        </div>
    </div>
</div>
