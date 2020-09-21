@extends('master')
@section('title', $product->product_name.' Siêu Bền Tiết Kiệm')
@section('contents')
    <section class="bread-crumb">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <ul class="breadcrumb">
                        <li class="home">
                            <a href="{{asset(route('index'))}}">
							<span>
								<i class="fa fa-home"></i> Trang chủ
							</span>
                            </a>
                            <span>
							<i class="fa">/</i>
						</span>
                        </li>
                        <li class="">
                            <a href="{{asset(route('categories', $product->categories->slug))}}">
                                <span>{{$product->categories->categories_name}}</span>
                            </a>
                            <span>
							<i class="fa">/</i>
						</span>
                        </li>
                        <li>
                            <strong>{{$product->product_name}}</strong>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
<section class="product margin-top-20">
    <section class="product">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 details-product">
                <div class="row product-bottom">
                    <div class="clearfix padding-bottom-10">
                        <div class="col-xs-12 col-sm-6 col-lg-5 col-md-4">
                            <div class="relative product-image-block no-thum">
                                <div class="large-image">
                                    <a href="{{asset($product->image)}}" class="large_image_url checkurl">
                                        <div style="height:468px;width:468px;" class="zoomWrapper"><img id="img_01" class="img-responsive" alt="Bàn ăn Reynosa" src="{{asset($product->image)}}" data-zoom-image="{{asset($product->image)}}" style="position: absolute;"></div>
                                    </a>
                                </div>
                            </div>
                            <div id="gallery_02" class="owl-carousel owl-theme thumbnail-product thumb_product_details not-dqowl owl-loaded owl-drag" data-loop="false" data-play="false" data-lg-items="3" data-md-items="3" data-sm-items="3" data-xs-items="3" data-xxs-items="3">

                                <div class="owl-stage-outer owl-height" style="height: 58px;"><div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 128px;"><div class="owl-item active" style="width: 97.5px; margin-right: 30px;"><div class="item">
                                                <a href="{{asset($product->image)}}" data-image="{{asset($product->image)}}" data-zoom-image="{{asset($product->image)}}">
                                                    <img src="{{asset($product->image)}}" alt="{{$product->product_name}}">
                                                </a>
                                            </div></div></div></div><div class="owl-nav disabled"><div class="owl-prev disabled"><i class="fa fa-angle-left" aria-hidden="true"></i></div><div class="owl-next disabled"><i class="fa fa-angle-right" aria-hidden="true"></i></div></div><div class="owl-dots disabled"></div></div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-lg-4 col-md-5 details-pro">
                            <div class="product-top clearfix">
                                <h1 class="title-head">{{$product->product_name}}</h1>
                            </div>
                            <div>
                                <div class="inve_brand">
																			<span class="stock-brand-title">
																				<strong>
																					<i class="ion ion-ios-checkmark-circle"></i>Thương hiệu:
																				</strong>
																			</span>
                                    <span class="a-brand">{{$product->trademark}}</span>
                                </div>
                                <div class="inventory_quantity deny 1">
																			<span class="stock-brand-title">
																				<strong>
																					<i class="ion ion-ios-checkmark-circle"></i>Tình trạng:
																				</strong>
																			</span>
                                    <span class="a-stock a0">
                                        @if($product->status == 1) Còn Trong Kho @elseif($product->status = 3) Tạm Hết Hàng @else Ngừng Bán @endif
																			</span>
                                </div>
                                <div class="price-box clearfix">
																			<span class="old-price">
																				<span class="price product-price-old" style="color:red;"> {{number_format($product->price)}}đ </span>
																			</span>
                                </div>
                            </div>
                            <div class="product-summary product_description margin-bottom-15">
                                <div class="rte description"></div>
                            </div>
                            <div class="form-product col-sm-12">
                                <div id="product">
                                    <form id="add-to-cart-form" class="form-inline margin-bottom-0">
                                        <div class="form-group form_button_details">
                                            <div class="form_hai ">
                                                <div class="custom input_number_product custom-btn-number form-control">
                                                    <button class="btn_num num_1 button button_qty" onclick="var result = document.getElementById('input-quantity'); var qtypro = result.value; if( !isNaN( qtypro ) &amp;&amp; qtypro >= 1 ) result.value--;return false;" type="button">-</button>
                                                    <input type="text" name="quantity" value="1" size="2" id="input-quantity" class="form-control prd_quantity">
                                                    <button class="btn_num num_2 button button_qty" onclick="var result = document.getElementById('input-quantity'); var qtypro = result.value; if( !isNaN( qtypro )) result.value++;return false;" type="button">+</button>
                                                </div>
                                                <div class="button_actions">
                                                    <button type="button" onclick="$quantity = $('#input-quantity').val();cart.add('{{$product->id}}', $quantity)" id="button-cart" data-loading-text="Đang tải..." class="btn btn-lg btn-cart button_cart_buy_enable add_to_cart btn_buy">
                                                        <span class="btn-content">Thêm vào giỏ</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                             </div>
                        <div class="col-xs-12 col-sm-12 col-lg-3 col-md-3 hidden-sm hidden-xs">
                            <div class="sidebar-block service-block">
                                <div class="sidebar-content">
                                    <div class="service-item service-item-two">
                                        <div class="item-top">
																					<span class="img">
																						<img src="assets/images/image/cache/catalog/policy_image_1-64x64.png" alt="Giao hàng trong 24h">
																					</span>
                                            <span class="title"> Giao hàng trong 24h </span>
                                        </div>
                                        <p class="caption">
                                        </p><p>Áp dụng với đơn hàng trên 500.000 đ ở Hồ Chí Minh và Hà Nội.</p>
                                        <p></p>
                                    </div>
                                    <div class="service-item service-item-two">
                                        <div class="item-top">
																					<span class="img">
																						<img src="assets/images/image/cache/catalog/policy_image_2-64x64.png" alt="Bảo đảm chất lượng">
																					</span>
                                            <span class="title"> Bảo đảm chất lượng </span>
                                        </div>
                                        <p class="caption">
                                        </p><p>Tất cả các sản phẩm Ant Furniture cung cấp đều đảm bảo chất lượng khi đến tay người tiêu dùng.</p>
                                        <p></p>
                                    </div>
                                    <div class="service-item service-item-two">
                                        <div class="item-top">
																					<span class="img">
																						<img src="assets/images/image/cache/catalog/policy_image_3-64x64.png" alt="Sản phẩm chính hãng">
																					</span>
                                            <span class="title"> Sản phẩm chính hãng </span>
                                        </div>
                                        <p class="caption">
                                        </p><p>Chúng tôi cung cấp các sản phẩm nhập khẩu chính hãng.</p>
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row margin-top-10">
                    <div class="col-md-9">
                        <div class="product-tab e-tabs padding-bottom-10">
                            <div class="border-ghghg">
                                <ul class="tabs tabs-title clearfix">
                                    <li class="tab-link current" data-tab="tab-description">
                                        <h3>
                                            <span>Mô tả</span>
                                        </h3>
                                    </li>
                                </ul>
                            </div>
                            <div id="tab-description" class="tab-content current">
                                <div class="rte">{!! $product->description !!}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="right_module">

                            <script type="text/javascript"> $(document).ready(function(){ $('.service-header').append($('.our-service')); }); </script>
                            <div class="similar-product">
                                <div class="right-bestsell">
                                    <h2>
                                        <a href="phong-khach.html" title="Sản phẩm mới ra mắt">Sản phẩm mới ra mắt</a>
                                    </h2>
                                    <div class="list-bestsell">
                                        <div class="list-bestsell-item">
                                            <div class="thumbnail-container clearfix">
                                                <div class="product-image">
                                                    <a href="dau-giuong-appleton.html">
                                                        <img class="img-responsive" src="image/cache/catalog/products/41-400x300.jpg" alt="Đầu giường Appleton">
                                                    </a>
                                                </div>
                                                <div class="product-meta">
                                                    <h3>
                                                        <a href="dau-giuong-appleton.html" title="Đầu giường Appleton">Đầu giường Appleton</a>
                                                    </h3>
                                                    <div class="zozo-product-reviews-badge"></div>
                                                    <div class="product-price-and-shipping">
                                                        <span class="price">4,230,000đ</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-bestsell-item">
                                            <div class="thumbnail-container clearfix">
                                                <div class="product-image">
                                                    <a href="tu-tenisha.html">
                                                        <img class="img-responsive" src="image/cache/catalog/products/40-400x300.jpg" alt="Tủ Tenisha">
                                                    </a>
                                                </div>
                                                <div class="product-meta">
                                                    <h3>
                                                        <a href="tu-tenisha.html" title="Tủ Tenisha">Tủ Tenisha</a>
                                                    </h3>
                                                    <div class="zozo-product-reviews-badge"></div>
                                                    <div class="product-price-and-shipping">
                                                        <span class="price">12,655,000đ</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-bestsell-item">
                                            <div class="thumbnail-container clearfix">
                                                <div class="product-image">
                                                    <a href="tu-curio.html">
                                                        <img class="img-responsive" src="image/cache/catalog/products/39-400x300.jpg" alt="Tủ Curio">
                                                    </a>
                                                </div>
                                                <div class="product-meta">
                                                    <h3>
                                                        <a href="tu-curio.html" title="Tủ Curio">Tủ Curio</a>
                                                    </h3>
                                                    <div class="zozo-product-reviews-badge"></div>
                                                    <div class="product-price-and-shipping">
                                                        <span class="price">9,238,000đ</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-bestsell-item">
                                            <div class="thumbnail-container clearfix">
                                                <div class="product-image">
                                                    <a href="tu-tadley-curio.html">
                                                        <img class="img-responsive" src="image/cache/catalog/products/38-400x300.jpg" alt="Tủ Tadley Curio">
                                                    </a>
                                                </div>
                                                <div class="product-meta">
                                                    <h3>
                                                        <a href="tu-tadley-curio.html" title="Tủ Tadley Curio">Tủ Tadley Curio</a>
                                                    </h3>
                                                    <div class="zozo-product-reviews-badge"></div>
                                                    <div class="product-price-and-shipping">
                                                        <span class="price">5,278,000đ</span>
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
            </div>
        </div>

    </div>
</section>
</section>
@endsection
@section('script')
    <script !src="">
        var ww = $(window).width(); $(document).ready(function () { $('#gallery_02 a').on('click', function(e) { e.preventDefault() }); if (ww > 991) { $('#img_01').elevateZoom({ gallery : 'gallery_02', zoomWindowWidth : 300, zoomWindowHeight : 300, zoomWindowOffetx : 0, easing : true, scrollZoom : true, cursor : 'pointer', galleryActiveClass: 'active', imageCrossfade : true, loadingIcon : 'http://www.elevateweb.co.uk/spinner.gif' }); /*pass the images to Fancybox*/ $("#img_01").on("click", function(e) { var ez = $('#img_01').attr('src'); $.magnificPopup.open({ items: { src: ez }, delegate: 'a', type: 'image' }); return false; }); } else { $('#gallery_02 a').on('click', function(e) { var image = $(this).attr('href'); $(".large_image_url.checkurl").attr('href',image).find('#img_01').attr('src',image).attr('data-zoom-image',image); }); } /*rating in comment*/ $('#dvRating i').on('click', function() { var rate = parseInt($(this).attr('data-alt')); $('#dvRating input[name="rating"]').val(rate); for(i = 1; i <= 5; i++){ if(i<=rate){ $('#dvRating i[data-alt="'+i+'"]').removeClass('star-off-png').addClass('star-on-png'); } else { $('#dvRating i[data-alt="'+i+'"]').removeClass('star-on-png').addClass('star-off-png'); } } }); /* show/hide comment form */ $('#btnnewreview').on('click', function() { $('#product-comment-form').slideToggle(200); }); $('.store-product-reviews-form .comment-form-close').on('click', function() { $('#product-comment-form').hide(200); }); }); /*$(window).on("load resize", function (e) { if ($(window).width() < 768) { $('.product-tab .tab-link:nth-child(1) ').append('<div class="tab-content-mobile"></div>'); $('.product-tab .tab-link:nth-child(1) .tab-content-mobile').append($('#tab-1').html()); $('.product-tab .tab-link:nth-child(1)').addClass('current'); $('.product-tab .tab-link:nth-child(2)').append('<div class="tab-content-mobile"></div>'); $('.product-tab .tab-link:nth-child(2) .tab-content-mobile').append($('#tab-2').html()); $('.product-tab .tab-link:nth-child(3)').append('<div class="tab-content-mobile"></div>'); $('.product-tab .tab-link:nth-child(3) .tab-content-mobile').append($('#tab-3').html()); $('.product-tab .tab-content').remove(); $('.tab-link').click(function (e) { }) } }); if ($(window).width() < 768) { $('.product-tab .tab-link:nth-child(1) ').append('<div class="tab-content-mobile"></div>'); $('.product-tab .tab-link:nth-child(1) .tab-content-mobile').append($('#tab-1').html()); $('.product-tab .tab-link:nth-child(1)').addClass('current'); $('.product-tab .tab-link:nth-child(2)').append('<div class="tab-content-mobile"></div>'); $('.product-tab .tab-link:nth-child(2) .tab-content-mobile').append($('#tab-2').html()); $('.product-tab .tab-link:nth-child(3)').append('<div class="tab-content-mobile"></div>'); $('.product-tab .tab-link:nth-child(3) .tab-content-mobile').append($('#tab-3').html()); $('.product-tab .tab-content').remove(); }*/
    </script>
@endsection
