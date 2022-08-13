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
        *{
            font-family: Calibri;
        }
        p{
            font-size: 18px;
        }
        p.indent{
            text-indent: 50px;
        }
        .productinfo img{
            height: 200px;
        }
        ul li{
            list-style-type: square;
            font-size: 18px;
        }
        /*Search btn*/
        .search {
            width: 100%;
            position: relative;
            display: flex;
        }

        .searchTerm {
            width: 100%;
            border: 3px solid #FE980F;
            border-right: none;
            padding: 5px;
            height: 36px;
            border-radius: 5px 0 0 5px;
            outline: none;
            color: #9DBFAF;
        }

        .searchTerm:focus{
            color: #FE980F;
        }

        .searchButton {
            width: 40px;
            height: 36px;
            border: 1px solid #FE980F;
            background: #FE980F;
            text-align: center;
            color: #fff;
            border-radius: 0 5px 5px 0;
            cursor: pointer;
            font-size: 20px;
        }

        /*Resize the wrap to see the search bar change!*/
        .wrap{
            width: 30%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        /*end*/
        #header_bar{
            padding: 10px 0;
            width: 220px;
            color: #FFFFFF;
            font-size: 20px;
            text-transform: uppercase;
            text-align: center;
            font-weight: bold;
            display: inline-block;
        }

        #header_bar:hover{
            background-color: #FFFFFF;
            color: #d58512;
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
<header class="" id="header"><!--header-->
    <div class="header_top" style="position: fixed;z-index: 13;width: 100%; padding-bottom: 5px"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="logo pull-left">
                        <a href="{{URL::to('/trang-chu')}}">
                            <img src="{{asset('public/frontend/images/logos.png')}}" width="100px"; height=50px style="padding-top: 5px">
                        </a>
                        <div style="text-align: center">
                            <!-- Search form -->
                            <form action="{{URL::to('/trang-chu')}}" method="post" enctype="multipart/form-data" class="form-inline md-form mr-auto mb-4">
                                <div class="wrap">
                                    <div class="search">
                                        <input type="hidden" name="_token" value="{{ csrf_token()}}"> {{-- khong chuyen trang sau khi load form --}}
                                        <input  class="searchTerm"  style="text-align: center" name="search" type="text" placeholder="Tìm kiếm sản phẩm" aria-label="Search" value="<?php
                                                $value = Session::get('value');
                                                if($value) {
                                                    echo $value;
                                                    Session::put('value', null);
                                                }
                                            ?>">
                                        <button type="submit" class="searchButton">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
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
                            <li><a href="{{URL::to('/signin')}}"><i class="fa fa-user"></i> Đăng nhập Khách hàng</a></li>
                            <li><a href="{{url('/admin-login')}}"><i class="fa fa-lock"></i> Đăng nhập Admin</a></li>
                            <li><a href="{{URL::to('/show-cart')}}"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
                            <?php
                            } else { // neu kh da login thi chuyen den trang quan ly don hang cua khach hang
                            ?>
                            <li><a href="{{URL::to('/customer')}}"><i class="fa fa-user"></i> <?php $name = Session::get('customer_name'); echo $name; ?></a></li>
                            <li><a href="{{URL::to('/show-cart')}}"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
                            <?php
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->
    <br><br>
    <div class="header-middle" style="margin-top: 10px; background-color:#FE980F; height: 50px">
        <div class="container" style="height: 50px;">
            <ul id="header_bar">
                <li style="list-style: none;"><a href="{{url('/trang-chu')}}"  class="active" style="color: black;font-size: 21px;padding: 10px;">Trang chủ</a></li>
            </ul>
            <ul id="header_bar">
                <li style="list-style: none;"><a href="{{url('/lien-he')}}"  class="active" style="color: black;font-size: 21px;padding: 10px;">Thông tin liên hệ</a></li>
            </ul>
            <ul id="header_bar">
                <li style="list-style: none;"><a href="{{url('/')}}"  class="active" style="color: black;font-size: 21px;padding: 10px;">Contact</a></li>
            </ul>
            <ul id="header_bar">
                <li style="list-style: none;"><a href="{{url('/tuyen-dung')}}"  class="active" style="color: black;font-size: 21px;padding: 10px;">Tuyển dụng</a></li>
            </ul>
            <ul id="header_bar">
                <li style="list-style: none;"><a href="{{url('/bai-viet-gan-day')}}"  class="active" style="color: black;font-size: 20px;padding: 10px;">Bài viết gần đây</a></li>
            </ul>
        </div>
    </div><!--/header-middle-->
</header><!--/header-->
    {{--Đoạn Giới thiệu--}}
    <section>
        <h1 style="margin-top: 50px; text-align: center"> Thông tin tuyển dụng</h1>
        <div style="margin: 0px 0 35px; text-align: center;">
        <p><i>Hiện tại chúng tôi chưa có nhu cầu tuyển dụng!</i></p>
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

                    </div>
                    <div class="col-sm-3">
                        <div class="companyinfo" style="margin-left: 150px;">
                            <p style="font-size: 16px; color: black; font-weight: bold"> Menu</p>
                            <a href="{{url('/trang-chu')}}" class="active" style="color: black">Trang chủ</a>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="companyinfo" style="margin-left: 100px">
                            <a href="{{url('/lien-he')}}" style="font-size: 16px; color: black; font-weight: bold">Thông tin liên hệ</a>
                            <p style="color: black">
                                Quang Bửu-Hà Nội<br>
                                <i class="fa fa-phone"></i> 0167.899.999<br>
                                <i class="fa fa-envelope"></i> cskh@MYLAPTOP.com.vn
                            </p>
                        </div>
                    </div>

                    <div class="col-sm-5"style="width: 21%;">
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
