<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | My-COMPUTER</title>
    <link href="{{asset('public/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/responsive.css')}}" rel="stylesheet">
    <style type="text/css">
        .productinfo img{
            height: 200px;
        }
    </style>
    <link rel="shortcut icon" href="{{asset('public/frontend/images/logo.jpg')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('public/frontend/1.jpg')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('public/frontend/images/2.jpg')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('public/frontend/images/3.jpg')}}">
    <link rel="apple-touch-icon-precomposed" href="{{asset('public/frontend/images/4.jpg')}}" >
    <script type="text/javascript" src="https://code.jquery.com/jquery-latest.pack.js"></script>
</head><!--/head-->
<body style="background-color: #FFFFFF;">
    <header id="header"><!--header-->
        <div class="header_top" style="position: fixed;z-index: 13;width: 100%; padding-bottom: 5px"><!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="logo pull-left">
                            <ul class="nav navbar-nav">
                                <li><a href="{{url('/trang-chu')}}" class="active">Trang chủ</a></li>
                            </ul>
                            <div style="text-align: center">
                                <!-- Search form -->
                                <form action="{{URL::to('/trang-chu')}}" method="post" enctype="multipart/form-data" class="form-inline md-form mr-auto mb-4">
                                    <input type="hidden" name="_token" value="{{ csrf_token()}}"> {{-- khong chuyen trang sau khi load form --}}
                                    <input style="text-align: center" name="search" class="form-control mr-sm-2" type="text" placeholder="Tìm kiếm sản phẩm" aria-label="Search" value="<?php
                                        $value = Session::get('value');
                                        if($value) {
                                            echo $value;
                                            Session::put('value', null);
                                        }
                                    ?>">
                                </form>
                                <?php
                                    foreach ($Product as $value) {}
                                    $dem = count($Product);
                                    $noti = Session::get('noti');
                                    if($noti) {
                                        echo $noti."<b>".$dem."</b> kết quả";
                                        Session::put('noti', null);
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="logo pull-right">
                            <ul class="nav navbar-nav">
                                <?php
                                    $customer_id = Session::get('customer_id');
                                    if($customer_id == null) {
                                ?> {{-- neu kh chua login thi chuyen den trang login --}}
                                    <li><a href="{{URL::to('/signin')}}"><i class="fa fa-lock"></i> Đăng nhập Khách hàng</a></li>
                                    <li><a href="{{url('/admin-login')}}"><i class="fa fa-lock"></i> Đăng nhập Admin</a></li>
                                    <li><a href="{{URL::to('/show-cart')}}"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
                                <?php
                                    } else { // neu kh da login thi chuyen den trang quan ly don hang cua khach hang
                                ?>
                                    <li><a href="{{URL::to('/customer')}}"><i class="fa fa-user"></i> <?php $name = Session::get('customer_name'); echo $name; ?></a></li>
                                    <li><a href="{{URL::to('/info-customer')}}">Thông tin của bạn</a></li>

                                <?php
                                    }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/header_top-->
        <div class="header-middle"><!--header-middle-->
            <div class="container">
            </div>
        </div><!--/header-middle-->
        <div class="header-bottom"><!--header-bottom-->
            <div class="container">
                </div>
            </div>
        </div><!--/header-bottom-->
    </header><!--/header-->

    <section>
        <div class="container">
            <div class="row">
                <!-- Hiển thị tất cả sản phẩm -->
                <div class="col-sm-9 padding-right">
                @yield('content')
                </div>
            </div>
        </div>
    </section>
    <footer id="footer"><!--Footer-->
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.719304959115!2d105.84576654248296!3d21.00388600131077!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac743bb83537%3A0xf3f7a91f010a8ef0!2zTmjDoCBBMTcsIDE3IFAuIFThuqEgUXVhbmcgQuG7rXUsIELDoWNoIEtob2EsIEhhaSBCw6AgVHLGsG5nLCBIw6AgTuG7mWksIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1659266912514!5m2!1svi!2s" width="1345" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="companyinfo" style="width: 210px">
                            <h2><span>My</span>-COMPUTER</h2>
                            <p style="color: #000000">Thỏa mãn đam mê theo cách của bạn.</p>
                        </div>
                        <div>
                            <a href="{{url('/lien-he')}}">Thông tin liên hệ</a>
                        </div>
                    </div>
                    <div class="col-sm-7">
                    </div>
                    <div class="col-sm-3"style="width: 21%;">
                        <div class="address">
                            <img src="{{asset('public/frontend/images/map.png')}}" alt="" />
                            <p style="color: #000000">Chúng tôi mang đến dịch vụ trực tuyến tốt nhất trên thế giới</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <p class="" style="text-align: center;">Được phát triển bởi Sinh Viên Trang- Vũ  K11-BTECC01 Học viện Cộng nghệ Thông tin BKACAD </p>
                </div>
            </div>
        </div>
    </footer><!--/Footer-->

    <script src="{{asset('public/frontend/js/jquery.js')}}"></script>
    <script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/price-range.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('public/frontend/js/main.js')}}"></script>
</body>
</html>
