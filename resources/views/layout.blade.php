<!DOCTYPE html>
<!--[if IE 8]><html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]>
<!--><html class="no-js" lang="en"><!--<![endif]-->
<head>

    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <title>@yield("title")</title>
    <meta name="description" content="@yield("description")">
    <meta name="author" content="">

    <!-- Mobile Specific Metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="theme-color" content="#212121"/>
    <meta name="msapplication-navbutton-color" content="#212121"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="#212121"/>
    <meta property="og:image" content="https://minivietnam.com.vn/assets/img/minivietnam.png">
    <meta property="og:url" content="https://minivietnam.com.vn/index.html">

    <!-- Include this to make the og:image larger -->
    <meta name="twitter:card" content="summary_large_image">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="/assets/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="/assets/css/owl.carousel.css"/>
    <link rel="stylesheet" href="/assets/css/owl.transitions.css"/>
    <link rel="stylesheet" href="/assets/css/style.css"/>
    <link rel="stylesheet" href="/assets/css/color.css"/>

    <!-- Favicons
    ================================================== -->
    <link rel="icon" type="image/png" href="/assets/img/fav.png">
    <link rel="apple-touch-icon" href="/assets/img/180.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/assets/img/72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/assets/img/114.png">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-FET2JHCL0B"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-FET2JHCL0B');
    </script>

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-TT4V3CX');</script>
    <!-- End Google Tag Manager -->

</head>
<body class="royal_preloader">

<div id="royal_preloader"></div>
@yield("content")

<!-- ĐĂNG KÝ LÁI THỬ
================================================== -->
<div id="form" class="wow fadeInUp animated background-dark">
    <div class="container">
        <div style="padding-top: 5px;padding-bottom: 10px">
            <div class="st-hd text-center">
                <h3 style="color: white;margin-top: 3%;font-weight: bold">ĐĂNG KÝ LÁI THỬ</h3>
            </div>
            <form method="post" action="{{route("request")}}" class="" style="max-width:680px; margin:0 auto;" id="frmMobile">
                @csrf
                <div id="formContentContactMobile">
                    <div class="form-group">
                        <input style="color: white" type="text" class="form-control" name="name" id="txtName" placeholder="Họ và tên" required>
                    </div>
                    <div class="form-group">
                        <input style="color: white" type="text" class="form-control" onkeypress="return isNumber(event)" id="phone"  name="phone" placeholder="Số điện thoại" required>
                    </div>
                    <div class="form-group">
                        <input style="color: white" type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="cboModel" name="model" required>
                            <option value="">Chọn dòng xe bạn muốn tư vấn và lái thử</option>
                            @if($list_product)
                                @foreach($list_product as $item)
                                    <option value="{{mb_strtoupper( $item->brand)}} {{$item->long_model}}">{{mb_strtoupper( $item->brand)}} {{$item->long_model}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="cboLocation" name="location" required>
                            <option value="">Chọn Tỉnh/Thành phố</option>
                            <option value="HÀ NỘI">HÀ NỘI</option>
                            <option value="HỒ CHÍ MINH">HỒ CHÍ MINH</option>
                            <option value="AN GIANG">AN GIANG</option>
                            <option value="BẮC CẠN">BẮC CẠN</option>
                            <option value="BẮC GIANG">BẮC GIANG</option>
                            <option value="BẠC LIÊU">BẠC LIÊU</option>
                            <option value="BẮC NINH">BẮC NINH</option>
                            <option value="BẾN TRE">BẾN TRE</option>
                            <option value="BÌNH ĐỊNH">BÌNH ĐỊNH</option>
                            <option value="BÌNH DƯƠNG">BÌNH DƯƠNG</option>
                            <option value="BÌNH PHƯỚC">BÌNH PHƯỚC</option>
                            <option value="BÌNH THUẬN">BÌNH THUẬN</option>
                            <option value="CÀ MAU">CÀ MAU</option>
                            <option value="CẦN THƠ">CẦN THƠ</option>
                            <option value="CAO BẰNG">CAO BẰNG</option>
                            <option value="ĐÀ NẴNG">ĐÀ NẴNG</option>
                            <option value="ĐẮK LẮK">ĐẮK LẮK</option>
                            <option value="ĐẮK NÔNG">ĐẮK NÔNG</option>
                            <option value="ĐIỆN BIÊN">ĐIỆN BIÊN</option>
                            <option value="ĐỒNG NAI">ĐỒNG NAI</option>
                            <option value="ĐỒNG THÁP">ĐỒNG THÁP</option>
                            <option value="GIA LAI">GIA LAI</option>
                            <option value="HÀ GIANG">HÀ GIANG</option>
                            <option value="HÀ NAM">HÀ NAM</option>
                            <option value="HÀ TĨNH">HÀ TĨNH</option>
                            <option value="HẢI DƯƠNG">HẢI DƯƠNG</option>
                            <option value="HẢI PHÒNG">HẢI PHÒNG</option>
                            <option value="HẬU GIANG">HẬU GIANG</option>
                            <option value="HÒA BÌNH">HÒA BÌNH</option>
                            <option value="HƯNG YÊN">HƯNG YÊN</option>
                            <option value="KHÁNH HÒA">KHÁNH HÒA</option>
                            <option value="KIÊN GIANG">KIÊN GIANG</option>
                            <option value="KON TUM">KON TUM</option>
                            <option value="LAI CHÂU">LAI CHÂU</option>
                            <option value="LÂM ĐỒNG">LÂM ĐỒNG</option>
                            <option value="LẠNG SƠN">LẠNG SƠN</option>
                            <option value="LÀO CAI">LÀO CAI</option>
                            <option value="LONG AN">LONG AN</option>
                            <option value="NAM ĐỊNH">NAM ĐỊNH</option>
                            <option value="NGHỆ AN">NGHỆ AN</option>
                            <option value="NINH BÌNH">NINH BÌNH</option>
                            <option value="NINH THUẬN">NINH THUẬN</option>
                            <option value="PHÚ THỌ">PHÚ THỌ</option>
                            <option value="PHÚ YÊN">PHÚ YÊN</option>
                            <option value="QUẢNG BÌNH">QUẢNG BÌNH</option>
                            <option value="QUẢNG NAM">QUẢNG NAM</option>
                            <option value="QUẢNG NGÃI">QUẢNG NGÃI</option>
                            <option value="QUẢNG NINH">QUẢNG NINH</option>
                            <option value="QUẢNG TRỊ">QUẢNG TRỊ</option>
                            <option value="SÓC TRĂNG">SÓC TRĂNG</option>
                            <option value="SƠN LA">SƠN LA</option>
                            <option value="TÂY NINH">TÂY NINH</option>
                            <option value="THÁI BÌNH">THÁI BÌNH</option>
                            <option value="THÁI NGUYÊN">THÁI NGUYÊN</option>
                            <option value="THANH HÓA">THANH HÓA</option>
                            <option value="HUẾ">HUẾ</option>
                            <option value="TIỀN GIANG">TIỀN GIANG</option>
                            <option value="TRÀ VINH">TRÀ VINH</option>
                            <option value="TUYÊN QUANG">TUYÊN QUANG</option>
                            <option value="VŨNG TÀU">VŨNG TÀU</option>
                            <option value="VĨNH LONG">VĨNH LONG</option>
                            <option value="VĨNH PHÚC">VĨNH PHÚC</option>
                            <option value="YÊN BÁI">YÊN BÁI</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="cboShowroom" name="showroom" required>
                            <option value="">Chọn Showroom Tư Vấn/Lái Thử</option>
                            <option value="mini_le_duan">MINI Lê Duẩn - Hà Nội</option>
                            <option value="mini_long_bien">MINI Long Biên - Hà Nội</option>
                            <option value="mini_le_van_luong">MINI Lê Văn Lương - Hà Nội</option>
                            <option value="mini_da_nang">MINI Đà Nẵng</option>
                            <option value="mini_nguyen_van_troi">MINI Nguyễn Văn Trỗi - TP.HCM</option>
                            <option value="mini_sa_la">MINI Sala - TP.HCM</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="cboNhuCau" name="purpose" required>
                            <option value="" selected>Nhu cầu của bạn</option>
                            <option value="Đăng ký lái thử">Đăng ký lái thử</option>
                            <option value="Nhận Ưu Đãi và Thông Số Kỹ Thuật">Nhận Ưu Đãi và Thông Số Kỹ Thuật</option>
                        </select>
                    </div>

                    <input type="hidden" onload="getDate()" class="form-control" id="date" name="Full_Time" value="">

                    <div class="form-group text-center">
                        <button class="btn btn-primary btn-dark btn-simple  btn-long mt-5">ĐĂNG KÝ</button>
                    </div>
                </div>
                <div id="content-mobile"></div>
            </form>
        </div>
    </div>
</div>

<div id="footer">
    <div class="container wow fadeInUp padding-top-bottom animated">
        <h3 class="text-uppercase padding-bottom-smaller"><strong>LIÊN HỆ VỚI CHÚNG TÔI.</strong></h3>
        <div class="row"> <!-- MB -->
            <div class="col-md-4 col-sm-4">
                <address>
                    <h5><strong>MINI Lê Duẩn</strong></h5>
                    <p>132 Lê Duẩn, Q. Hai Bà Trưng, Hà Nội.</p>
                    <p>Hotline: <a href="tel:0901829338" style="text-decoration: none" >0901 829 338</a></p>
                    <p>Website: <a target="_blank" href="http://minileduan.com.vn/" style="text-decoration: none">minileduan.com.vn</a></p>
                    <ul class="list-inline">
                        <a target="_blank" href="https://www.facebook.com/Official.MINI.LeDuan"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                        <a href="tel:0901829338"><i class="fa fa-phone-square" aria-hidden="true"></i></a>
                    </ul>
                </address> <!-- LE DUAN -->
            </div>
            <div class="col-md-4 col-sm-4">
                <address>
                    <h5><strong>MINI LONG BIÊN</strong></h5>
                    <p>01 Ngô Gia Tự, Phường Đức Giang, Quận Long Biên, Hà Nội.</p>
                    <p>Hotline: <a href="tel:0938908488" style="text-decoration: none" >0938 908 488</a></p>
                    <p>Website: <a target="_blank" href="http://minilongbien.vn/" style="text-decoration: none">minilongbien.vn</a></p>
                    <ul class="list-inline">
                        <a target="_blank" href="https://www.facebook.com/Official.MINI.LongBien"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                        <a href="tel:0901829338"><i class="fa fa-phone-square" aria-hidden="true"></i></a>
                    </ul>
                </address> <!-- LONG BIEN -->
            </div>
            <div class="col-md-4 col-sm-4">
                <address>
                    <h5><strong>MINI Lê VĂN LƯƠNG</strong></h5>
                    <p>68 Lê Văn Lương, P. Nhân Chính, Quận Thanh Xuân, Hà Nội.</p>
                    <p>Hotline: <a href="tel:0901881298" style="text-decoration: none" >0901 881 298</a></p>
                    <p>Website: <a target="_blank" href="http://minilevanluong.vn/" style="text-decoration: none">minilevanluong.vn</a></p>
                    <ul class="list-inline">
                        <a target="_blank" href="https://www.facebook.com/MINILeVanLuong"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                        <a href="tel:0901881298"><i class="fa fa-phone-square" aria-hidden="true"></i></a>
                    </ul>
                </address> <!-- LE VAN LUONG -->
            </div>
        </div>
        <div class="row"> <!-- MN -->
            <div class="col-md-4 col-sm-4">
                <address>
                    <h5><strong>MINI SALA </strong></h5>
                    <p>12 Mai Chí Thọ, Phường An Lợi Đông, Quận 2, TP HCM.</p>
                    <p>Hotline: <a href="tel:0938869310" style="text-decoration: none" >0938 869 310</a></p>
                    <p>Website: <a target="_blank" href="http://miniquan2.vn/" style="text-decoration: none">miniquan2.vn</a></p>
                    <ul class="list-inline">
                        <a target="_blank" href="https://www.facebook.com/Official.MINI.Sala/"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                        <a href="tel:0938869310"><i class="fa fa-phone-square" aria-hidden="true"></i></a>
                    </ul>
                </address> <!-- SALA -->
            </div>
            <div class="col-md-4 col-sm-4">
                <address>
                    <h5><strong>MINI NGUYỄN VĂN TRỖI</strong></h5>
                    <p>Tầng 3 - 80 Nguyễn Văn Trỗi, Phường 8, Quận Phú Nhuận, TP HCM.</p>
                    <p>Hotline: <a href="tel:0909273330" style="text-decoration: none" >0909 273 330</a></p>
                    <p>Website: <a target="_blank" href="http://miniphunhuan.vn/" style="text-decoration: none">miniphunhuan.vn</a></p>
                    <ul class="list-inline">
                        <a target="_blank" href="https://www.facebook.com/Official.MINI.NguyenVanTroi"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                        <a href="tel:0909273330"><i class="fa fa-phone-square" aria-hidden="true"></i></a>
                    </ul>
                </address> <!-- NGUYEN VAN TROI -->
            </div>
            <div class="col-md-4 col-sm-4">
                <address>
                    <h5><strong>MINI ĐÀ NẴNG</strong></h5>
                    <p>356 Điện Biên Phủ, Phường Thanh Khê Đông, Quận Thanh Khê, Đà Nẵng.</p>
                    <p>Hotline: <a href="tel:0901888334" style="text-decoration: none" > 0901 888 334</a></p>
                    <p>Website: <a target="_blank" href="http://minidanang.vn/" style="text-decoration: none">minidanang.vn</a></p>
                    <ul class="list-inline">
                        <a target="_blank" href="https://www.facebook.com/Official.MINI.DaNang"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                        <a href="tel:0901888334"><i class="fa fa-phone-square" aria-hidden="true"></i></a>
                    </ul>
                </address> <!-- LE VAN LUONG -->
            </div>
        </div>
    </div>
</div>

<!-- Button scroll
================================================== -->
<div id="fixButton">
    <div><a data-scroll="" data-options="easing: easeInQuad" href="#slider" class="scroll">
            <img src="/assets/img/ic-home.png">
            <span>Về trang đầu</span></a></div>
    <div><a data-scroll="" data-options="easing: easeInQuad" href="#form" class="scroll">
            <img src="/assets/img/ic-laithu.png">
            <span>Đăng ký lái thử</span></a></div>
    <div><a data-scroll="" data-options="easing: easeInQuad" href="#footer" class="scroll">
            <img src="/assets/img/ic-call.png">
            <span>Hotline</span></a></div>
</div>
<script>
    function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        return true;
    }
</script>
<!-- JAVASCRIPT
================================================== -->
<script type="text/javascript" src="/assets/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="/assets/js/royal_preloader.min.js"></script>
<script type="text/javascript" src="/assets/js/tether.min.js"></script>
<script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/assets/js/plugins.js"></script>
<script type="text/javascript" src="/assets/js/custom.js"></script>
<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>
    window.fbAsyncInit = function() {
        FB.init({
            xfbml            : true,
            version          : 'v10.0'
        });
    };

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<!-- Your Chat Plugin code -->
<div class="fb-customerchat"
     attribution="setup_tool"
     page_id="346321128833970"
     theme_color="#000000"
     logged_in_greeting=""Chào bạn ! Cám ơn bạn đã chọn MINI Việt Nam. Chúng tôi có thể gúp gì cho bạn ?""
logged_out_greeting=""Chào bạn ! Cám ơn bạn đã chọn MINI Việt Nam. Chúng tôi có thể gúp gì cho bạn ?"">
</div>
<!-- End Document
================================================== -->

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TT4V3CX"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->


</body>
</html>
