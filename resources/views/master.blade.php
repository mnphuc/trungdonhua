
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <base href="{{asset(''), true}}">
    <meta name="theme-color" content="#FFFFFF"/>
    <title>TrungDoNhua.vn - @yield('title', false)</title>
    <base />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="TrungDoNhua.vn - Đồ Nhựa Tiết Kiệm Và An Toàn"/>
    <meta property="og:url" content="{{route('admin')}}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="TrungDoNhua.vn - Đồ Nhựa Tiết Kiệm Và An Toàn" />
    <meta property="og:description" content="TrungDoNhua.vn - Đồ Nhựa Tiết Kiệm Và An Toàn" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:description" content="TrungDoNhua.vn - Đồ Nhựa Tiết Kiệm Và An Toàn" />
    <meta name="twitter:title" content="TrungDoNhua.vn - Đồ Nhựa Tiết Kiệm Và An Toàn" />
    <meta name="robots" content="index, follow, noodp, noydir" />
    <!-- ================= Style ================== -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
    <script type="text/javascript" src="assets/scripts/main.min.js"></script>
    <link href="assets/images/Asset-1logo.png" rel="icon"/>

    <link href="assets/css/style_custom.css" rel="stylesheet"/>
    @yield('style', false)
    <style>
        @media only screen and (min-width: 1281px){
            .image-pc {
                height: 210px;
                width: 170px;
            }
        }
    </style>
</head>
<body class="common-home">
<div class="hidden-md hidden-lg opacity_menu"></div>
<div class="opacity_filter"></div>
<!-- Menu mobile -->
<div id="mySidenav" class="sidenav menu_mobile hidden-md hidden-lg">
    <div class="top_menu_mobile">
						<span class="close_menu">
							<img src="assets/images/Asset-1logo.png" alt="Trung Đồ Nhựa">
							</span>
    </div>
    <div class="content_memu_mb">
        <div class="link_list_mobile">
            <ul class="ct-mobile hidden"></ul>
            <ul class="ct-mobile">
                <li class="level0 level-top parent level_ico">
                    <a href="/">Trang chủ</a>
                </li>
                <li class="level0 level-top parent level_ico">
                    <a href="gioi-thieu.html">Về chúng tôi</a>
                </li>
                <li class="level0 level-top parent level_ico">
                    <a>Sản phẩm</a>
                    <i class="fa fa-angle-down"></i>
                    <ul class="sub-menu" style="display:none;">
                        <li class="level1 level-top parent level_ico">
                            <a href="phong-khach.html">
                                <span>- Phòng khách</span>
                            </a>
                            <i class="fa fa-angle-down"></i>
                            <ul class="sub-menu" style="display: none;">
                                <li class="level2">
                                    <a href="ghe-sofa.html">
                                        <span>- - Ghế sofa</span>
                                    </a>
                                </li>
                                <li class="level2">
                                    <a href="tu-ke.html">
                                        <span>- - Tủ &amp; kệ</span>
                                    </a>
                                </li>
                                <li class="level2">
                                    <a href="ban-ca-phe.html">
                                        <span>- - Bàn cà phê</span>
                                    </a>
                                </li>
                                <li class="level2">
                                    <a href="ke-tv.html">
                                        <span>- - Ghế lười &amp; đôn mềm</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="level1 level-top parent level_ico">
                            <a href="giay-dep.html">
                                <span>- Phòng ngủ</span>
                            </a>
                            <i class="fa fa-angle-down"></i>
                            <ul class="sub-menu" style="display: none;">
                                <li class="level2">
                                    <a href="dong-ho.html">
                                        <span>- - Giường ngủ</span>
                                    </a>
                                </li>
                                <li class="level2">
                                    <a href="phu-kien.html">
                                        <span>- - Bàn kê đầu giường</span>
                                    </a>
                                </li>
                                <li class="level2">
                                    <a href="ban-trang-diem.html">
                                        <span>- - Bàn trang điểm</span>
                                    </a>
                                </li>
                                <li class="level2">
                                    <a href="tui-xach.html">
                                        <span>- - Tủ quần áo</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="level1 level-top parent level_ico">
                            <a href="phong-bep.html">
                                <span>- Phòng bếp</span>
                            </a>
                            <i class="fa fa-angle-down"></i>
                            <ul class="sub-menu" style="display: none;">
                                <li class="level2">
                                    <a href="ban-an.html">
                                        <span>- - Bàn ăn</span>
                                    </a>
                                </li>
                                <li class="level2">
                                    <a href="ghe-an.html">
                                        <span>- - Ghế ăn</span>
                                    </a>
                                </li>
                                <li class="level2">
                                    <a href="tu-bat-dia.html">
                                        <span>- - Tủ bát đĩa</span>
                                    </a>
                                </li>
                                <li class="level2">
                                    <a href="cham-soc-sac-dep.html">
                                        <span>- - Ghế quầy bar &amp; quầy bar</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="level1 level-top parent level_ico">
                            <a href="thoi-trang.html">
                                <span>- Đồ trang trí</span>
                            </a>
                            <i class="fa fa-angle-down"></i>
                            <ul class="sub-menu" style="display: none;">
                                <li class="level2">
                                    <a href="den-phong-khach.html">
                                        <span>- - Đèn phòng khách</span>
                                    </a>
                                </li>
                                <li class="level2">
                                    <a href="tranh-nghe-thuat.html">
                                        <span>- - Tranh nghệ thuật</span>
                                    </a>
                                </li>
                                <li class="level2">
                                    <a href="goi-trang-tri.html">
                                        <span>- - Gối trang trí</span>
                                    </a>
                                </li>
                                <li class="level2">
                                    <a href="tham.html">
                                        <span>- - Thảm</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="level1 level-top parent level_ico">
                            <a href="ghe-sofa.html">
                                <span>- Ghế sofa</span>
                            </a>
                        </li>
                        <li class="level1 level-top parent level_ico">
                            <a href="dong-ho.html">
                                <span>- Giường ngủ</span>
                            </a>
                        </li>
                        <li class="level1 level-top parent level_ico">
                            <a href="tranh-nghe-thuat.html">
                                <span>- Tranh nghệ thuật</span>
                            </a>
                        </li>
                        <li class="level1 level-top parent level_ico">
                            <a href="ke-tv.html">
                                <span>- Ghế thư giãn</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="level0 level-top parent level_ico">
                    <a href="nha-dep.html">Tin tức</a>
                </li>
                <li class="level0 level-top parent level_ico">
                    <a href="lien-he.html">Liên hệ</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- End -->
<header class="header">
    <div class="top-link header-link hidden-sm hidden-xs">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-xs-12">
                    <div class="header-static">
                        <i class="ion ion-md-globe"></i> Chào mừng bạn đến với TrungDoNhua.VN
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-main">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-100-h">
                    <button type="button" class="menu-bar-h nav-mobile-button hidden-md hidden-lg" id="trigger-mobile">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="logo">
                        <a href="index.html" class="logo-wrapper">
                            <img src="assets/images/Asset-1logo.png" alt="logo " />
                        </a>
                    </div>
                    <div class="mobile-cart visible-sm visible-xs">
                        @include('layout.cart')
                    </div>
                </div>
                <div class="col-md-7 hidden-sm hidden-xs service-header"></div>
                <div class="col-md-2 hidden-sm hidden-xs">
                    @include('layout.cart')
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-9 hidden-sm hidden-xs">
                    <nav class="hidden-sm hidden-xs">
                        <ul id="nav" class="nav">
                            <li class="nav-item active ">
                                <a href="/" class="nav-link">Trang chủ</a>
                            <li class="nav-item ">
                                <a href="gioi-thieu.html" class="nav-link">Về chúng tôi</a>
                            <li class="nav-item ">
                                <a href="anhthodien.vn/video/videoall.html" class="nav-link">aaa</a>
                            <li class="nav-item has-mega ">
                                <a href="san-pham.html" class="nav-link">Sản phẩm
                                    <i class="fa fa-angle-right" data-toggle="dropdown"></i>
                                </a>
                                <div class="mega-content">
                                    <div class="level0-wrapper2">
                                        <div class="nav-block nav-block-center">
                                            <ul class="level0" id="loadProduct">


                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            <li class="nav-item ">
                                <a href="nha-dep.html" class="nav-link">Tin tức</a>
                            <li class="nav-item ">
                                <a href="lien-he.html" class="nav-link">Liên hệ</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-md-3">
                    <div class="block block-search" role="search" id="search">
                        <div class="input-group search-bar search_form has-validation-callback">
                            <input type="search" name="search" value="" placeholder="Tìm kiếm" class="input-group-field st-default-search-input search-text search-voice" autocomplete="off">
                            <input type="hidden" name="type" value="product" />
                            <span class="input-group-btn">
																			<button class="btn icon-fallback-text">
																				<i class="fa fa-search"></i>
																			</button>
																		</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="our-service">
    <div class="row">
        <div class="box col-md-4">
            <div class="box-inner">
                <i class="ion ion-md-globe"></i>
                <div class="content">
                    <h5>GIAO HÀNG 24H</h5>
                    <p>
                    <p>Với đơn h&agrave;ng tr&ecirc;n 500.000 đ</p>
                    </p>
                </div>
            </div>
        </div>
        <div class="box col-md-4">
            <div class="box-inner">
                <i class="ion ion-md-checkmark-circle-outline"></i>
                <div class="content">
                    <h5>CHẤT LƯỢNG</h5>
                    <p>
                    <p>Bảo đảm chất lượng</p>
                    </p>
                </div>
            </div>
        </div>
        <div class="box col-md-4">
            <div class="box-inner">
                <i class="ion ion-ios-notifications"></i>
                <div class="content">
                    <h5>NGUỒN GỐC</h5>
                    <p>
                    <p>Nhập khẩu ch&iacute;nh h&atilde;ng</p>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@yield('contents')
<footer class="footer-container">
    <div class="footer-top">
        <div class="container">
            <div class="footer-static">
                <div class="row">
                    <div class="f-col f-col1 col-md-6 col-sm-12 col-xs-12">
                        <div class="logo-footer">
                            <a href="index.html">
                                <img src="image/catalog/logo/Asset-1logo.png" alt="" class="img-responsive" />
                            </a>
                        </div>
                        <div class="footer-content">
                            <ul class="info">
                                <li>A12, Đinh Tiên Hoàng, Q. Hoàn Kiếm, Hà Nội</li>
                                <li>Điện thoại:
                                    <a href="tel:0123456789">0123 456 789</a>
                                </li>
                                <li>Website:
                                    <a href="index.html">https://veles.exdomain.net/</a>
                                </li>
                                <li>Email:
                                    <a href="mailto:contact@yourdomain.com">contact@yourdomain.com</a>
                                </li>
                            </ul>
                            <div class="social-icons">
                                <ul>
                                    <li class="facebook">
                                        <a href="https://www.facebook.com/mnphuc/" target="_blank">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li class="twitter">
                                        <a href="#" target="_blank">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li class="youtube">
                                        <a href="#" target="_blank">
                                            <i class="fa fa-youtube"></i>
                                        </a>
                                    </li>
                                    <li class="instagram">
                                        <a href="#" target="_blank">
                                            <i class="fa fa-instagram"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="f-col f-col2 col-md-2 col-sm-6 col-xs-6">
                        <div class="footer-content">
                            <h4 class="footer-title">
                                <a role="button" class="" data-toggle="collapse" aria-expanded="true" data-target="#collapseListMenu02" aria-controls="collapseListMenu02"> Thông tin </a>
                            </h4>
                            <div class="collapse in" id="collapseListMenu02">
                                <ul class="list-menu list-menu22">
                                    <li class="li_menu">
                                        <a href="gioi-thieu.html"> Về chúng tôi </a>
                                    </li>
                                    <li class="li_menu">
                                        <a href="news/news0858.html?news_id=21"> Chính sách </a>
                                    </li>
                                    <li class="li_menu">
                                        <a href="lien-he.html"> Liên hệ </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="f-col f-col4 col-md-4 col-sm-12 col-xs-12">
                        <div class="footer-title">
                            <h3>Nhận bản tin</h3>
                        </div>
                        <div class="footer-content"> Đăng ký email để nhanh chóng nhận được các thông báo về khuyến mại, chương trình giảm giá của chúng tôi
                            <div class="block newsletter">
                                <div class="content">
                                    <form action="https://veles.exdomain.net/tool/newsletter" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" target="_blank">
                                        <input type="email" value="" class="email" placeholder="Nhập email tại đây..." name="email" id="mail-footer" aria-label="">
                                        <button class="btn subscribe" name="subscribe" id="subscribe-footer">
                                            <span>Đăng ký!</span>
                                        </button>
                                    </form>
                                    <div class="valid"></div>
                                </div>
                            </div>
                        </div>
                        <script type="text/javascript"> $(document).ready(function () { var id = '#mc-embedded-subscribe-form'; $(id).on('submit', function () { var email = $(id + ' .email').val(); if (!isValidEmailAddress(email)) { $(id + ' + .valid').html("Email không hợp lệ"); $(id + ' .email').focus(); return false; } var url = "/tool/newsletter"; $.ajax({ type : "post", url : url, data : $(id).serialize(), dataType: 'json', success : function (json) { $(".success_inline, .warning_inline, .error").remove(); if (json['error']) { $(id + ' + .valid').html(json['error']); } if (json['success']) { $(id + ' + .valid').html(json['success']); $(id)[0].reset(); } } }); return false; }); }); function isValidEmailAddress(emailAddress) { var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i); return pattern.test(emailAddress); } </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="footer-copyright">
                        <small class="copyright">
                            <span>&copy; Copyright 2019 Veles. </span>
                        </small>
                    </div>
                </div>
            </div>
        </div>
        <div class="back-to-top" id="back-to-top">
            <i class="fa fa-angle-double-up" aria-hidden="true"></i>
        </div>
    </div>
</footer>
<!-- Show Popup Cart -->
<button id="btn_show_cart" type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-popupcart-modal-lg" style="display: none;"></button>
<div class="modal fade bs-popupcart-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> Giỏ hàng
                </h4>
            </div>
            <div class="modal-body" id="load_info_cart"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tiếp tục mua hàng</button>
                <a href="{{asset(route('checkout'))}}" class="btn btn-primary">Tiến hành thanh toán</a>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript"> $(document).ready(function(){ $('.service-header').append($('.our-service')); }); </script>
@yield('script', false)
<script type="text/javascript">
    /* Sau khi tat khung popup cart, cap nhat lai gio hang tren header */
    $('.bs-popupcart-modal-lg').on('hidden.bs.modal', function (e) {
        $.ajax({
            url: '/checkout/cart/getTotalProductInCart',
            type: 'post',
            dataType: 'json',
            beforeSend: function () {

            }, complete: function () {

            }, success: function (json) {
                var out = json['total'].substr(0, json['total'].indexOf(' '));
                $('#cart-total').html(out); $('#cart > ul').load('/info ul li');
            }
        });
    });
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '{{route('getProductCategories')}}',
            type: 'GET',
            dataType: 'json',
                success : function (result){
                $select = $('#loadProduct');
                $htm = '';

                $product = '';
                $new_row = $('<li>',{'class' : 'level1 parent item'});
                $pro = '';
                $.each( result, function( key, value ) {

                    $dau = '<li class="level1 parent item"><h2 class="h4"><a href="danhmuc/'+value.slug+'"><span>'+value.categories_name+'</span></a></h2><ul class="level1">';
                    $.each(value.products,function (k, v) {
                        $pro += '<li class="level2"><a href="sanpham/'+v.slug+'"><span>'+v.product_name+'</span></a></li>';
                    });
                    $dit =  '</ul></li>';
                    $htm += $dau + $pro + $dit;
                    $pro = '';
                });
                $($select).append($htm);

            }
        })
    });

</script>
</body>
</html>
