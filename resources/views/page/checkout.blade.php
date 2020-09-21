@extends('master')
@section('contents')
    @php($totalPro = 0)
    @php($totalPrice = 0)
    @if(session('cart'))
        @foreach(session('cart') as $id =>$detail)
            @php($totalPro += $detail['quantity'])
            @php($totalPrice += $detail['price'] * $detail['quantity'])
        @endforeach
    @endif
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
                    <li>
                        <strong>Thanh toán</strong>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<div class="container">
    <div class="row">
        <div id="content" class="col-sm-12">
            <div class="row">
                <form method="post" action="{{asset(route('postCheckOut'))}}" name="checkout_form" id="checkout_form" enctype="multipart/form-data" class="form-horizontal">
                    @csrf
                    <div class="col-sm-8">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="fa fa-info-circle" aria-hidden="true"></i> Địa chỉ nhận hàng
                                </h3>
                            </div>
                            <div class="panel-body">
                                <!-- Apply for VN -->
                                <div class="form-group required {{$errors->has('fullName') ? 'has-error' : ''}}">
                                    <label class="control-label col-md-2" for="input-fullName">Tên đầy đủ</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="fullName" id="input-fullName" value="{{old('fullName')}}" required placeholder="Ví dụ: Mai Nhân Phúc" class="form-control">
                                        @if($errors->has('fullName'))
                                        <div class="text-danger">{{$errors->first('fullName')}}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group required {{$errors->has('email') ? 'has-error' : ''}}">
                                            <label class="control-label col-sm-4" for="input-email">Email</label>
                                            <div class="col-sm-8">
                                                <input type="email" name="email" id="input-email" value="{{old('email')}}" required placeholder="phucmnp@gmail.com" class="form-control">
                                                @if($errors->has('email'))
                                                    <div class="text-danger">{{$errors->first('email')}}</div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group required {{$errors->has('email') ? 'has-error' : ''}}">
                                            <label class="control-label col-sm-4" for="input-phone">Điện thoại</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="phone" id="input-phone" value="{{old('phone')}}" required placeholder="Ví dụ: 0333888764" class="form-control">
                                                @if($errors->has('phone'))
                                                    <div class="text-danger">{{$errors->first('phone')}}</div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group required {{$errors->has('city') ? 'has-error' : ''}}">
                                            <label class="control-label col-md-4" for="input-zoneid" id="label-zone">Tỉnh / TP</label>
                                            <div class="col-md-8">
															<span id="load-ajax-zone">
															</span>
                                                @if($errors->has('city'))
                                                    <div class="text-danger">{{$errors->first('city')}}</div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group required">
                                            <label class="control-label col-md-4" for="input-address">Quận / Huyện</label>
                                            <div class="col-sm-8">
															<span id="load-ajax-ward">

															</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group required {{$errors->has('address_1') ? 'has-error' : ''}}">
                                            <label class="control-label col-md-4" for="input-address">Địa chỉ chi tiết</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="address_1" value="{{old('address_1')}}" id="input-address" placeholder="Ví dụ: Số 247, Cầu Giấy, Q. Cầu Giấy" class="form-control">
                                                @if($errors->has('address_1'))
                                                    <div class="text-danger">{{$errors->first('address_1')}}</div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2" for="input-zoneid" id="label-zone">Lời nhắn</label>
                                    <div class="col-sm-10">
                                        <textarea name="comment" id="input-comment" rows="3" class="form-control" placeholder="Ví dụ: Chuyển hàng ngoài giờ hành chính"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="fa fa-credit-card" aria-hidden="true"></i> Phương thức thanh toán
                                </h3>
                            </div>
                            <div class="panel-body" id="form_payment_method">
                                <div class="group">
                                    <div class="adr-oms radio select-method">
                                        <input type="radio" id="payment-method-bank_transfer" name="payment_method" value="bank_transfer">
                                        <label for="payment-method-bank_transfer">
                                            <div class="adr-oms payment-method">
                                                <div class="thumbnail">
                                                    <img alt="Chuyển khoản" src="assets/images/bank_transfer.png">
                                                </div>
                                                <div class="description">
                                                    <div class="title">Chuyển khoản</div>
                                                    <div class="subtitle">Sử dụng thẻ ATM hoặc dịch vụ Internet Banking để tiến hành chuyển khoản cho chúng tôi</div>
                                                    <div class="tkz-selection-info"></div>
                                                </div>
                                            </div>
                                        </label>
                                        <div class="payment-method-toggle box-installment installment-disabled" id="payment-method-info-bank_transfer" style="">
                                            <div class="disabled-cod-body">
                                                -Việt Combank Chi Nhánh này nọ
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="group">
                                    <div class="adr-oms radio select-method">
                                        <input type="radio" id="payment-method-cod" name="payment_method" value="cod" checked>
                                        <label for="payment-method-cod">
                                            <div class="adr-oms payment-method">
                                                <div class="thumbnail">
                                                    <img alt="Thu tiền tại nhà (COD)" src="assets/images/cod.png">
                                                </div>
                                                <div class="description">
                                                    <div class="title">Thu tiền tại nhà (COD)</div>
                                                    <div class="subtitle">Khách hàng thanh toán bằng tiền mặt cho nhân viên giao hàng khi sản phẩm được chuyển tới địa chỉ nhận hàng</div>
                                                    <div class="tkz-selection-info"></div>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> Đơn hàng ({{$totalPro}} sản phẩm)
                                </h3>
                            </div>
                            <div class="panel-body">
                                <table class="adr-oms table table_order_items">
                                    <tbody id="orderItem">
                                    @if(session('cart'))
                                        @foreach(session('cart') as $id => $detaill)

                                            <tr class="group-type-1 item-child-0">
                                                <td>
                                                    <div class="table_order_items-cell-thumbnail">
                                                        <div class="thumbnail">
                                                            <a target="_blank" rel="noopener" href="{{asset(route('getProduct', $detaill['slug']))}}" title="{{$detaill['name']}}">
                                                                <img src="{{asset($detaill['photo'])}}" alt="{{$detaill['name']}}" width="84">
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="table_order_items-cell-detail">
                                                        <div class="table_order_items-cell-title">
                                                            <div class="table_order_items_product_name">
                                                                <a target="_blank" rel="noopener" href="{{asset(route('getProduct', $detaill['slug']))}}" title="{{$detaill['name']}}">
                                                                    <span class="title">{{$detaill['name']}}</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="table_order_items-cell-price">
                                                        <div class="tt-price">{{number_format($detaill['price'])}}đ</div>
                                                        <div class="quantity">x{{$detaill['quantity']}}</div>
                                                        <div class="tt-price">{{number_format($detaill['price'] * $detaill['quantity'])}}đ</div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="fa fa-truck" aria-hidden="true"></i> Vận chuyển
                                </h3>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <span id="ajax-load-shipping-method">
                                            <div>
                                                <strong>Phí giao hàng tận nơi</strong>
                                            </div>
                                            <div class="radio">
                                                <label style="font-weight: inherit;">
                                                    <input type="radio" name="shipping_method" value="" checked="checked">Phí giao hàng tận nơi - 20.000đ
                                                </label>
                                            </div>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default" id="ajax-load-total">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td class="text-left">Thành tiền</td>
                                    <td class="text-right" style="font-size: 13px; font-weight: bold;">{{number_format($totalPrice)}}đ</td>
                                </tr>
                                <tr>
                                    <td class="text-left">Phí giao hàng tận nơi</td>
                                    <td class="text-right" style="font-size: 13px; font-weight: bold;">20.000đ</td>
                                </tr>
                                <tr>
                                    <td class="text-left">Tổng số</td>
                                    <td class="text-right" style="color: #d60c0c; font-size: 16px; font-weight: bold;">{{number_format($totalPrice+20000)}}đ</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="text-center">
                            <a class="pull-left" href="{{asset(route('cart'))}}" title="Quay lại giỏ hàng">
                                <i class="fa fa-mail-reply-all" aria-hidden="true"></i> Quay lại giỏ hàng
                            </a>
                            <button class="btn btn-primary pull-right" type="submit" id="submit_form_button">Đặt hàng
                                <i class="fa fa-angle-right"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('style')
    <style>
        .table-cart-content {
            background: #fff;
        }
        .login-page {
            border: 1px solid #e5e5e5;
            border-radius: 5px;
            padding: 20px 22%;
            min-height: 400px;
            margin-bottom: 20px;
            background: #fff;
        }
        #load_error{
            padding: 12px;
            background: #fdf6e2;
            border: 1px solid #f1ddb3;
            border-radius: 4px;
            margin-bottom: 22px;
            margin-top: 10px;
            display: block;
        }

        .adr-oms.form .group:after, .adr-oms.form .group:before, .adr-oms.form:after, .adr-oms.form:before {
            content: " ";
            display: table
        }

        :after, :before {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box
        }

        .adr-oms.radio input {
            width: 0;
            height: 0;
            opacity: 0;
            display: block \9;
            width: auto \9;
            height: auto \9;
            margin: 0 \9
        }

        .adr-oms.radio > label:after, .adr-oms.radio > label:before {
            display: block;
            position: absolute;
            content: "";
            top: 50%
        }

        .adr-oms.radio > label:before {
            width: 14px;
            height: 14px;
            left: 0;
            margin-top: -7px;
            border: 1px solid #666;
            border-radius: 7px
        }

        .adr-oms.radio :checked + label:before {
            border: 1px solid #0388cd;
            background: #0388cd
        }

        .adr-oms.radio > label:after {
            width: 0;
            height: 0;
            left: 7px;
            margin-top: 0;
            background: #fff;
            border-radius: 3px;
            transition: .2s ease-in-out
        }

        .adr-oms.radio :checked + label:after {
            color: #fff;
            height: 6px;
            width: 6px;
            margin-top: -3px;
            left: 4px
        }

        .adr-oms.form .group {
            margin-bottom: 16px;
            min-height: 1px
        }

        #form_payment_method .adr-oms.radio {
            margin-top: 0;
            margin-bottom: 0
        }

        .adr-oms.radio > label {
            display: inline-block;
            position: relative;
            margin-right: 14px;
            padding-left: 21px !important;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none
        }

        .adr-oms.form label {
            color: #111 !important;
            font-size: 12px !important;
            margin-bottom: 0
        }

        #form_payment_method .adr-oms.radio label {
            display: block;
            margin-right: 0
        }

        #form_payment_method .adr-oms.radio label .adr-oms.payment-method {
            border: 1px solid #ccc;
            overflow: hidden;
            border-radius: 4px;
            background-color: #fff !important;
            display: inherit;
        }

        #form_payment_method .adr-oms.radio :checked + label .adr-oms.payment-method {
            border-color: #0388cd;
            background-color: #fff !important
        }

        #form_payment_method .thumbnail {
            display: block;
            padding: 4px;
            margin-bottom: 20px;
            line-height: 1.42857143;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 4px;
            -webkit-transition: border .2s ease-in-out;
            -o-transition: border .2s ease-in-out;
            transition: border .2s ease-in-out
        }

        #form_payment_method .adr-oms.radio label .adr-oms.payment-method > .thumbnail {
            float: left;
            width: 80px;
            height: 76px;
            border: none;
            border-radius: 0;
            background-color: transparent;
            margin-bottom: 0
        }

        #form_payment_method .adr-oms.radio label .adr-oms.payment-method > .description {
            padding: 12px 16px;
            margin-left: 70px;
        }

        #form_payment_method .adr-oms.radio label .adr-oms.payment-method > .description > .title {
            font-size: 13px !important;
            font-weight: 700
        }

        #form_payment_method .adr-oms.radio label .adr-oms.payment-method > .description > .subtitle {
            font-size: 12px !important;
            color: #777
        }

        #form_payment_method .payment-method-toggle {
            background: #fff;
            border-bottom-left-radius: 4px;
            border-bottom-right-radius: 4px;
            border: 1px solid #ccc;
            border-top: none;
            padding: 10px;
            margin-left: 21px;
            margin-top: -2px
        }

        .installment-select {
            padding: 10px 5px
        }

        #form_payment_method .disabled-cod-body {
        }

        .adr-oms.table {
            margin-bottom: 16px;
            border-radius: 4px;
            border-collapse: separate;
            font-size: 12px !important
        }

        .panel-body table.table_order_items {
            margin: 0;
            width: 332px
        }

        .panel-body table.table_order_items > tbody {
            background-color: #fff !important
        }

        table.table_order_items > tbody > tr > td {
            border: none;
            vertical-align: top;
            position: relative
        }

        table.table_order_items > tbody tr td {
            padding: 0
        }

        table.table_order_items > tbody tr td .table_order_items-cell-thumbnail {
            width: 84px;
            padding: 0;
            float: left
        }

        .thumbnail {
            display: block;
            padding: 4px;
            margin-bottom: 20px;
            line-height: 1.42857143;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 4px;
            -webkit-transition: border .2s ease-in-out;
            -o-transition: border .2s ease-in-out;
            transition: border .2s ease-in-out
        }

        table.table_order_items > tbody > tr > td .thumbnail {
            width: 84px;
            min-height: 40px;
            border: none;
            border-radius: 0;
            background-color: #fff !important;
            padding: 0;
            float: left;
            margin-right: 8px;
            margin-bottom: 10px
        }

        table.table_order_items > tbody tr td .thumbnail img {
            opacity: .97
        }

        table.table_order_items > tbody tr td .table_order_items-cell-detail {
            width: 168px;
            float: left;
            padding: 0
        }

        table.table_order_items > tbody tr.item-child-0 td .table_order_items-cell-detail {
            border: none !important
        }

        table.table_order_items > tbody tr td .table_order_items-cell-title {
            width: 130px;
            padding: 0 0 0 8px;
            float: left
        }

        table.table_order_items > tbody tr td .table_order_items-cell-title .table_order_items_product_name {
            min-height: 32px
        }

        table.table_order_items > tbody tr td .table_order_items-cell-title .title {
            color: #333
        }

        table.table_order_items > tbody tr td .table_order_items-cell-price {
            width: 80px;
            text-align: right;
            padding: 0 0 0 8px;
            float: right
        }

        table.table_order_items > tbody tr td .quantity {
            color: #333 !important
        }

        table.table_order_items > tbody tr td .tt-price {
            color: #333
        }

        .adr-oms.checkbox input {
            width: 0;
            height: 0;
            opacity: 0;
            display: block \9;
            width: auto \9;
            height: auto \9;
            margin: 0 \9
        }

        .checkbox label, .radio label {
            min-height: 20px;
            padding-left: 20px;
            margin-bottom: 0;
            font-weight: 400;
            cursor: pointer
        }

        .adr-oms.checkbox > label {
            display: inline-block;
            position: relative;
            margin-right: 14px;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            padding-left: 20px !important;
            font-size: 15px;
            font-weight: 400;
            line-height: 20px
        }

        .adr-oms.checkbox > label:before {
            content: "";
            display: block;
            position: absolute;
            width: 14px;
            height: 14px;
            left: 0;
            top: 50%;
            margin-top: -7px;
            border: 1px solid #ccc;
            border-radius: 2px
        }

        adr-oms.checkbox > label:before {
            left: 17px
        }

        .adr-oms.checkbox > label:after {
            content: "✓";
            font-size: 18px;
            color: #fff;
            display: block;
            position: absolute;
            max-width: 0;
            height: 6px;
            top: 50%;
            left: 2px;
            margin-top: -11px;
            opacity: .5;
            transition: all .35s ease
        }

        .adr-oms.checkbox :checked + label:before {
            border: 1px solid #0388cd;
            background: #0388cd;
            opacity: 1
        }

        .adr-oms.checkbox :checked + label:after {
            opacity: 1
        }

        .adr-oms.table tbody tr {
            background: #fff
        }

        .adr-oms.table tbody tr td {
            padding: 5px 0;
            border: none;
            font-size: 13px
        }
    </style>
@endsection
@section('script')
    <script>
        function loadListShipping() {
            var country_id = $("select[name=country_id]").val();
            var zone_id = $("select[name=zone_id]").val();
            var ward_id = $("select[name=ward_id]").val();
            $.ajax({
                url: '/checkout/checkout/ajaxGetHtmlShipping',
                dataType: 'json',
                method: 'post',
                data: {
                    country_id: country_id,
                    zone_id: zone_id,
                    ward_id: ward_id
                },
                beforeSend: function() {
                    /*$('#ajax-load-shipping-method').html('');*/ },
                complete: function() {},
                success: function(json) {
                    if (json['error'] == false) {
                        $('#ajax-load-shipping-method').html(json['data']);
                        updateFee();
                    } else {
                        console.log(json['error_message']);
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                }
            });
        }
        $(document).ready(function() {
            $('.payment-method-toggle').hide();
            $('input[name=payment_method]').click(function() {
                $('.payment-method-toggle').hide();
                $('#payment-method-info-' + $(this).val()).toggle(); /* Cap nhat cac loai phi */
            });

            $idProvince = 0;
            $.ajax({
                url: '{{asset(route('getProvince'))}}',
                dataType: 'json',
                success: function (json) {
                   // $('#load-ajax-zone').html();
                    $html = '';
                    $giua = '';
                    $dau =  '<select name="city" id="input-zoneid" onchange="getContry()" class="form-control"><option value="">--Chọn Tỉnh Thành Phố--</option>';
                    $dau2 =  '<select name="city" id="input-zoneid2" onchange="getContry2()" class="form-control"><option>--Chọn Tỉnh Thành Phố--</option>';
                    $dit = '</select>';
                    $.each(json, function (key, value) {
                        $giua += '<option value="'+value.id+'">'+value.name+'</option>'
                    });
                    $html = $dau + $giua + $dit;
                    $html2 = $dau2 + $giua + $dit;
                    $('#load-ajax-zone-2').append($html2);
                    $('#load-ajax-zone').append($html);
                }
            });
        });
        function getContry(){
            $id = $("#input-zoneid option:selected").val();
            $.ajax({
                url: '{{asset(route('getCountry'))}}',
                type: 'GET',
                data: {
                    'idProvince': $id
                },
                dataType: 'json',
                success: function (json) {
                    $htm = '';
                    $da = '<select name="contry" id="input-wardid" class="form-control">';
                    $giu = '';
                    $cuoi = '</select>';
                    $.each(json, function (key, value) {
                            $giu += '<option value="'+value.id+'">'+value.name+'</option>'
                    })
                    $htm = $da + $giu + $cuoi;
                    $html2 =
                    $('#load-ajax-ward').html($htm);
                }
            });
        }
        function getContry2(){
            $id = $("#input-zoneid2 option:selected").val();
            $.ajax({
                url: '{{asset(route('getCountry'))}}',
                type: 'GET',
                data: {
                    'idProvince': $id
                },
                dataType: 'json',
                success: function (json) {
                    $htm = '';
                    $da = '<select name="contry" id="input-wardid" class="form-control">';
                    $giu = '';
                    $cuoi = '</select>';
                    $.each(json, function (key, value) {
                        $giu += '<option value="'+value.id+'">'+value.name+'</option>'
                    })
                    $htm = $da + $giu + $cuoi;
                    $('#load-ajax-ward-2').html($htm);
                }
            });
        }
        $(document).ready(function() {
            if ($('#is-delivery-address').is(":checked") == true) {
                $('#container-form-address-ship').css('display', 'none');
            } else {
                $('#container-form-address-ship').css('display', 'block');
            }
        });

        function showHideDeliveryAddress() {
            var toggle_info_payment = $('#is-delivery-address').is(":checked");
            if (toggle_info_payment == true) {
                $('#container-form-address-ship').css('display', 'none');
            } else {
                $('#container-form-address-ship').css('display', 'block');
            }
        }
        $(document).ready(function() {
            if ($('#request-invoice').is(":checked") == true) {
                $('#container-form-invoice').show();
            } else {
                $('#container-form-invoice').hide();
            }
        });

        function showHideInvoice() {
            var toggle_invoice = $('#request-invoice').is(":checked");
            if (toggle_invoice == true) {
                $('#container-form-invoice').css('display', 'block');
            } else {
                $('#container-form-invoice').css('display', 'none');
            }
        }
        $(document).ready(function() {
            var id = '#mc-embedded-subscribe-form';
            $(id).on('submit', function() {
                var email = $(id + ' .email').val();
                if (!isValidEmailAddress(email)) {
                    $(id + ' + .valid').html("Email không hợp lệ");
                    $(id + ' .email').focus();
                    return false;
                }
                var url = "/tool/newsletter";
                $.ajax({
                    type: "post",
                    url: url,
                    data: $(id).serialize(),
                    dataType: 'json',
                    success: function(json) {
                        $(".success_inline, .warning_inline, .error").remove();
                        if (json['error']) {
                            $(id + ' + .valid').html(json['error']);
                        }
                        if (json['success']) {
                            $(id + ' + .valid').html(json['success']);
                            $(id)[0].reset();
                        }
                    }
                });
                return false;
            });
        });

        function isValidEmailAddress(emailAddress) {
            var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
            return pattern.test(emailAddress);
        }
    </script>
@endsection
