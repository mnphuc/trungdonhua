@extends('master')
@section('contents')
    <section class="bread-crumb">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <ul class="breadcrumb" >
                        <li class="home">
                            <a href="{{asset(route('index'))}}">
																<span >
																	<i class="fa fa-home"></i> Trang chủ
																</span>
                            </a>
                            <span>
																<i class="fa">/</i>
															</span>
                        </li>
                        <li class="">
                            <a href="{{$cat->slug}}">
                                <span >{{$cat->categories_name}}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row">
            <section class="main_container collection col-md-9 col-md-push-3">
                <h1 class="title-head margin-top-0">{{$cat->categories_name}}</h1>
                <div class="category-products products category-products-grids">
                    <div class="sort-cate clearfix margin-top-10 margin-bottom-10">


                    </div>
                    <section class="products-view products-view-grid">
                        <div class="row">
                           @foreach($proCate as $pro)
                            <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
                                <div class="ant-product-item">
                                    <div class="product_row">
                                        <div class="item">
                                            <div class="item-inner">
                                                <div class="image-container">
                                                    <span class="sale">{{$pro->price_seo ? $pro->price_seo : '0'}} % </span>
                                                    <a href="{{asset(route('getProduct', $pro->slug))}}" class="product-item-photo">
                                                        <img class="product-image-photo img-responsive center-block" src="{{asset($pro->image)}}" data-lazyload="{{asset($pro->image)}}" alt="{{$pro->product_name}}" style="width: 195px;height: 195px"/>
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
                                                                    <button onclick="cart.add('{{$pro->id}}', '1');" class="btn-buy btn-cart btn btn-gray left-to" title="Mua ngay">
                                                                        <i class="ion ion-md-cart"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <a href="ban-an-virton.html" class="quick-view" title="Xem">
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
            </section>
            <aside class="ant-sidebar left-content col-md-3 col-md-pull-9">
                <div id="column-left" class="left-column compliance">
                    <div class="col-md-3 hidden-sm hidden-xs">
                        <div class="mainmenu">
															<span class="edit-span">
																<i class="fa fa-dashcube" aria-hidden="true"></i>Danh mục sản phẩm
															</span>
                            <div class="nav-cate">
                                <ul id="menu2017">
                                    @foreach($cate as $cat)
                                        <li class="menu-item-count">
                                            <h3>
                                                <img src="{{$cat->images ? $cat->images : asset('assets/images/no-image-news.png')}}" data-lazyload="{{$cat->images ? $cat->images : asset('assets/images/no-image-news.png')}}" alt="{{$cat->categories_name}}" />
                                                <a href="{{asset(route('categories',$cat->slug))}}">{{$cat->categories_name}}</a>
                                            </h3>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <aside class="aside-item sidebar-category collection-category filter ">
                        <div class="aside-title">
                            <h2 class="title-head margin-top-0">
                                <span>Sản Phẩm Đang Bán Chạy</span>
                            </h2>
                        </div>
                        <div class="aside-content">
                            <div class="right_module">
                                <div class="similar-product">
                                    <div class="right-bestsell">
                                        <div class="list-bestsell">
                                            <div class="list-bestsell-item">
                                                <div class="thumbnail-container clearfix">
                                                    <div class="product-image">
                                                        <a href="https://veles.exdomain.net/dau-giuong-appleton">
                                                            <img class="img-responsive" src="https://veles.exdomain.net/image/cache/catalog/products/41-400x300.jpg" alt="Đầu giường Appleton">
                                                        </a>
                                                    </div>
                                                    <div class="product-meta">
                                                        <h3>
                                                            <a href="https://veles.exdomain.net/dau-giuong-appleton" title="Đầu giường Appleton">Đầu giường Appleton</a>
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
                                                        <a href="https://veles.exdomain.net/tu-tenisha">
                                                            <img class="img-responsive" src="https://veles.exdomain.net/image/cache/catalog/products/40-400x300.jpg" alt="Tủ Tenisha">
                                                        </a>
                                                    </div>
                                                    <div class="product-meta">
                                                        <h3>
                                                            <a href="https://veles.exdomain.net/tu-tenisha" title="Tủ Tenisha">Tủ Tenisha</a>
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
                                                        <a href="https://veles.exdomain.net/tu-curio">
                                                            <img class="img-responsive" src="https://veles.exdomain.net/image/cache/catalog/products/39-400x300.jpg" alt="Tủ Curio">
                                                        </a>
                                                    </div>
                                                    <div class="product-meta">
                                                        <h3>
                                                            <a href="https://veles.exdomain.net/tu-curio" title="Tủ Curio">Tủ Curio</a>
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
                                                        <a href="https://veles.exdomain.net/tu-tadley-curio">
                                                            <img class="img-responsive" src="https://veles.exdomain.net/image/cache/catalog/products/38-400x300.jpg" alt="Tủ Tadley Curio">
                                                        </a>
                                                    </div>
                                                    <div class="product-meta">
                                                        <h3>
                                                            <a href="https://veles.exdomain.net/tu-tadley-curio" title="Tủ Tadley Curio">Tủ Tadley Curio</a>
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
                    </aside>
                    <aside class="aside-item banner">
                        <div class="aside-title">
                            <h2 class="title-head margin-top-0">
                                <span>Khuyến mãi hot</span>
                            </h2>
                        </div>
                        <div class="aside-content zoom-banner">
                            <a href="#">
                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-lazyload="https://veles.exdomain.net/image/cache/catalog/aside_banner-270x420.jpg" alt="" class="img-responsive center-block" />
                            </a>
                        </div>
                    </aside>
                </div>
            </aside>
        </div>
    </div>
@endsection
