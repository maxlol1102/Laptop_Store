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
            padding-top: 15px;
            width: 150px;
            height: 50px;
            color: #FFFFFF;
            font-size: 16px;
        }
        #header_bar:hover{
            background-color: #FFFFFF;
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
                        <img src="{{asset('public/frontend/images/logos.png')}}" width="100px"; height=50px style="padding-top: 5px" ">
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
    <div class="header-middle" style="margin-top: 15px; background-color:#FE980F; height: 50px">
        <div class="container" style="height: 50px;">
            <ul id="header_bar" >
                <li style="list-style-type: none"><a href="{{url('/trang-chu')}}"  class="active" style="color: black; ">Trang chủ</a></li>
            </ul>
        </div>
    </div><!--/header-middle-->
</header><!--/header-->
    {{--Đoạn Giới thiệu--}}
    <section>
        <img src="https://jobsgo.vn/blog/wp-content/uploads/2021/05/sinh-vien-nen-mua-laptop-nao-1.jpg" style="width: 1000px; height: 500px; padding-top: 30px; margin-left: 190px">
        <h1 style="margin-top: 80px; text-align: center"> GIỚI THIỆU VỀ MY-LAPTOP</h1>
        <div style=" margin: 40px 200px 100px 200px">
            {{--Đoạn 1--}}
            <h2 style="padding-top: 20px">Giới thiệu chung</h2>
            <p class="indent">
                Cửa hàng MY-LAPTOP chuyên cung cấp các sản phẩm công nghệ chính hãng tại thị trường Việt Nam. Với khẩu hiệu “Nếu những gì chúng tôi không có, nghĩa là bạn không cần”, chúng tôi đã, đang và sẽ tiếp tục nỗ lực đem đến các sản phẩm công nghệ chính hãng đa dạng, phong phú đi kèm mức giá tốt nhất phục vụ nhu cầu của quý khách hàng.
            </p>

            {{--Đoạn 2--}}
            <h2 style="padding-top: 10px">Tôn chỉ hoạt động</h2>
            <p class="indent">
                MY-LAPTOP luôn hoạt động dựa trên tôn chỉ đặt khách hàng là trung tâm, mọi nỗ lực để đạt được mục tiêu cao nhất là làm hài lòng người dùng thông qua các sản phẩm được cung cấp và dịch vụ khách hàng. MY-LAPTOP đang từng bước xây dựng dịch vụ khách hàng vượt trội, xứng đáng là đơn vị bán lẻ hàng đầu tại Việt Nam. Sự tin tưởng và ủng hộ nhiệt tình của quý khách hàng tại chuỗi chi nhánh đã phần nào khẳng định hiệu quả hoạt động của đội ngũ nhân viên chúng tôi.
            </p>
            <ul>
                <li>
                    Đối với quý khách hàng, chúng tôi luôn đặt cái tâm làm gốc, làm việc với tinh thần nghiêm túc, trung thực và có trách nhiệm, để mang tới trải nghiệm dịch vụ tốt nhất.
                </li>
                <li>
                    Đối với đồng nghiệp, chúng tôi đề cao văn hóa học hỏi, đoàn kết, tương trợ lẫn nhau tạo nên môi trường làm việc tôn trọng - công bằng - văn minh cho nhân viên trong công ty.
                </li>
                <li>
                    Đối với các đối tác, MY-LAPTOP luôn làm việc dựa trên nguyên tắc tôn trọng, cùng tạo ra giá trị cho cộng đồng và cùng phát triển bền vững.
                </li>
            </ul>
            {{--Đoạn 3--}}
            <h2 style="padding-top: 10px">Tầm nhìn và sứ mệnh</h2>
            <p class="indent">
                Những năm qua, chúng tôi không ngừng cải thiện dịch vụ tại các chi nhánh và hỗ trợ khách hàng qua các kênh online. MY-LAPTOP cam kết mang đến những sản phẩm chất lượng và chế độ bảo hành uy tín, sẵn sàng hỗ trợ khách hàng trong thời gian nhanh nhất.
            </p>
            <p>
                Trong tương lai, MY-LAPTOP sẽ tiếp tục mở rộng hệ thống chi nhánh, hướng tới mục tiêu có mặt tại 63 tỉnh thành trên toàn quốc. Đồng thời, nâng cao chất lượng dịch vụ, hạn chế những rủi ro, lắng nghe và tiếp thu góp ý của quý khách hàng nhằm đem đến trải nghiệm tốt nhất khi mua sắm tại MY-LAPTOP.
            </p>
            <p>
                Cuối cùng, MY-LAPTOP hy vọng sẽ trở thành nhà tiên phong đưa những sản phẩm công nghệ mới nhất đến tay người dùng sớm nhất, tạo ra cuộc sống hiện đại nơi công nghệ kết nối con người, công nghệ phục vụ con người
            </p>
            {{--Đoạn 4--}}
            <h1 style="margin-top: 80px; text-align: center"> HỢP TÁC KINH DOANH</h1>
            {{--p1--}}
            <h2 style="padding-top: 30px; font-size: 20px">Mọi thông tin liên hệ hợp tác, cho thuê mặt bằng vui lòng liên hệ:</h2>
            <ul>
                <li><strong>Mrs.Trang Dao</strong></li>
                <li>Email: <i style="color: red">daotrang2001@gmail.com</i></li>
            </ul>
            {{--p2--}}
            <h3 style="font-size: 18px">Hợp tác với các kênh video:</h3>
            <ul>
                <li><strong>Mr.Vu</strong></li>
                <li>Email: <i style="color: red">cnv@gmail.com</i></li>
            </ul>
            {{--p3--}}
            <h3 style="font-size: 18px">Mua hàng doanh nghiệp:</h3>
            <ul>
                <li><strong>Gọi miễn phí: <i style="color: red">1800.2097</i> (Miền Nam) hoặc <i style="color: red">1800.2044</i> (Miền Bắc)</strong></li>
                <li>Email: <i style="color: red">cskh@MYLAPTOP.com.vn</i></li>
            </ul>
            <h3 style="font-size: 18px">Địa chỉ:</h3>
            <ul>
                <li> Nhà A1717 P. Tạ Quang Bửu, Bách Khoa, Hai Bà Trưng, Hà Nội</li>
                <li style="list-style-type: none"> <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.739639456053!2d105.84826060865315!3d21.00307128746092!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac743bb83537%3A0xf3f7a91f010a8ef0!2zTmjDoCBBMTcsIDE3IFAuIFThuqEgUXVhbmcgQuG7rXUsIELDoWNoIEtob2EsIEhhaSBCw6AgVHLGsG5nLCBIw6AgTuG7mWksIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1659363376200!5m2!1svi!2s" width="700" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></li>
            </ul>

            <h1 style="margin-top: 80px; font-size: 22px;"> <i style="color: red">MY-LAPTOP</i> xin cảm ơn và và kính mong hợp tác.</h1>
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
