<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        *{ box-sizing: border-box; }
        body{ margin: 0; padding: 0; font-family: 'Tahoma', sans-serif; }
        .clearfix:after{ content: ""; display: block; clear: both; }
        .container{ max-width: 980px; padding: 0 15px; margin: 0 auto; }
        header{ background: #792B8E; }
        main{padding: 30px 0;}
        img{ width: 100%; }
        *[class*='col-']{ float: left; padding: 0 15px; }
        .col-6{ width: 50%; }
        .img_logo{ max-width: 475px; }
        .title{ font-size: 42px; font-weight: normal; text-align: center; position: relative; line-height: 75px }
        .title:after{ content: ""; display: block; width: 30%; height: 2px;background: #000; position: absolute; transform: translateX(-50%); left: 50%; top: 100% }
        .table{width: 100%;border-collapse: collapse;}
        .table tr td, .table tr th{line-height: 45px;border: 1px solid #ccc;padding: 0 15px;}
        .text-center{text-align: center;}
        footer{min-height: 125px;background: #792B8E; color: #fff; padding: 15px;}
    </style>
</head>
<body>
<div class="wrap">
    <div class="container">
        <header class="clearfix">
            <div class="col-6">
                <img class="img_logo" src="https://bachkhoa-aptech.edu.vn/upload/image/logo-trang-01(1).png" alt="">
            </div>
        </header>
        <main>
            {{$data['name']}}
        </main>
        <footer>
            <p>LIÊN HỆ</p>
            <p>Tòa nhà HTC, 236B & 238 Hoàng Quốc Việt, Bắc Từ Liêm, Hà Nội.</p>
            <p>Tư Vấn Online: 0968.27.6996 / 024 3755 4010</p>
            <p>tuyensinh@bachkhoa-aptech.edu.vn</p>
        </footer>
    </div>
</div>
</body>
</html>
