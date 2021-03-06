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

<!-- ????NG K?? L??I TH???
================================================== -->
<div id="form" class="wow fadeInUp animated background-dark">
    <div class="container">
        <div style="padding-top: 5px;padding-bottom: 10px">
            <div class="st-hd text-center">
                <h3 style="color: white;margin-top: 3%;font-weight: bold">????NG K?? L??I TH???</h3>
            </div>
            <form method="post" action="{{route("request")}}" class="" style="max-width:680px; margin:0 auto;" id="frmMobile">
                @csrf
                <div id="formContentContactMobile">
                    <div class="form-group">
                        <input style="color: white" type="text" class="form-control" name="name" id="txtName" placeholder="H??? v?? t??n" required>
                    </div>
                    <div class="form-group">
                        <input style="color: white" type="text" class="form-control" onkeypress="return isNumber(event)" id="phone"  name="phone" placeholder="S??? ??i???n tho???i" required>
                    </div>
                    <div class="form-group">
                        <input style="color: white" type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="cboModel" name="model" required>
                            <option value="">Ch???n d??ng xe b???n mu???n t?? v???n v?? l??i th???</option>
                            @if($list_product)
                                @foreach($list_product as $item)
                                    <option value="{{mb_strtoupper( $item->brand)}} {{$item->long_model}}">{{mb_strtoupper( $item->brand)}} {{$item->long_model}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="cboLocation" name="location" required>
                            <option value="">Ch???n T???nh/Th??nh ph???</option>
                            <option value="H?? N???I">H?? N???I</option>
                            <option value="H??? CH?? MINH">H??? CH?? MINH</option>
                            <option value="AN GIANG">AN GIANG</option>
                            <option value="B???C C???N">B???C C???N</option>
                            <option value="B???C GIANG">B???C GIANG</option>
                            <option value="B???C LI??U">B???C LI??U</option>
                            <option value="B???C NINH">B???C NINH</option>
                            <option value="B???N TRE">B???N TRE</option>
                            <option value="B??NH ?????NH">B??NH ?????NH</option>
                            <option value="B??NH D????NG">B??NH D????NG</option>
                            <option value="B??NH PH?????C">B??NH PH?????C</option>
                            <option value="B??NH THU???N">B??NH THU???N</option>
                            <option value="C?? MAU">C?? MAU</option>
                            <option value="C???N TH??">C???N TH??</option>
                            <option value="CAO B???NG">CAO B???NG</option>
                            <option value="???? N???NG">???? N???NG</option>
                            <option value="?????K L???K">?????K L???K</option>
                            <option value="?????K N??NG">?????K N??NG</option>
                            <option value="??I???N BI??N">??I???N BI??N</option>
                            <option value="?????NG NAI">?????NG NAI</option>
                            <option value="?????NG TH??P">?????NG TH??P</option>
                            <option value="GIA LAI">GIA LAI</option>
                            <option value="H?? GIANG">H?? GIANG</option>
                            <option value="H?? NAM">H?? NAM</option>
                            <option value="H?? T??NH">H?? T??NH</option>
                            <option value="H???I D????NG">H???I D????NG</option>
                            <option value="H???I PH??NG">H???I PH??NG</option>
                            <option value="H???U GIANG">H???U GIANG</option>
                            <option value="H??A B??NH">H??A B??NH</option>
                            <option value="H??NG Y??N">H??NG Y??N</option>
                            <option value="KH??NH H??A">KH??NH H??A</option>
                            <option value="KI??N GIANG">KI??N GIANG</option>
                            <option value="KON TUM">KON TUM</option>
                            <option value="LAI CH??U">LAI CH??U</option>
                            <option value="L??M ?????NG">L??M ?????NG</option>
                            <option value="L???NG S??N">L???NG S??N</option>
                            <option value="L??O CAI">L??O CAI</option>
                            <option value="LONG AN">LONG AN</option>
                            <option value="NAM ?????NH">NAM ?????NH</option>
                            <option value="NGH??? AN">NGH??? AN</option>
                            <option value="NINH B??NH">NINH B??NH</option>
                            <option value="NINH THU???N">NINH THU???N</option>
                            <option value="PH?? TH???">PH?? TH???</option>
                            <option value="PH?? Y??N">PH?? Y??N</option>
                            <option value="QU???NG B??NH">QU???NG B??NH</option>
                            <option value="QU???NG NAM">QU???NG NAM</option>
                            <option value="QU???NG NG??I">QU???NG NG??I</option>
                            <option value="QU???NG NINH">QU???NG NINH</option>
                            <option value="QU???NG TR???">QU???NG TR???</option>
                            <option value="S??C TR??NG">S??C TR??NG</option>
                            <option value="S??N LA">S??N LA</option>
                            <option value="T??Y NINH">T??Y NINH</option>
                            <option value="TH??I B??NH">TH??I B??NH</option>
                            <option value="TH??I NGUY??N">TH??I NGUY??N</option>
                            <option value="THANH H??A">THANH H??A</option>
                            <option value="HU???">HU???</option>
                            <option value="TI???N GIANG">TI???N GIANG</option>
                            <option value="TR?? VINH">TR?? VINH</option>
                            <option value="TUY??N QUANG">TUY??N QUANG</option>
                            <option value="V??NG T??U">V??NG T??U</option>
                            <option value="V??NH LONG">V??NH LONG</option>
                            <option value="V??NH PH??C">V??NH PH??C</option>
                            <option value="Y??N B??I">Y??N B??I</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="cboShowroom" name="showroom" required>
                            <option value="">Ch???n Showroom T?? V???n/L??i Th???</option>
                            <option value="mini_le_duan">MINI L?? Du???n - H?? N???i</option>
                            <option value="mini_long_bien">MINI Long Bi??n - H?? N???i</option>
                            <option value="mini_le_van_luong">MINI L?? V??n L????ng - H?? N???i</option>
                            <option value="mini_da_nang">MINI ???? N???ng</option>
                            <option value="mini_nguyen_van_troi">MINI Nguy???n V??n Tr???i - TP.HCM</option>
                            <option value="mini_sa_la">MINI Sala - TP.HCM</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="cboNhuCau" name="purpose" required>
                            <option value="" selected>Nhu c???u c???a b???n</option>
                            <option value="????ng k?? l??i th???">????ng k?? l??i th???</option>
                            <option value="Nh???n ??u ????i v?? Th??ng S??? K??? Thu???t">Nh???n ??u ????i v?? Th??ng S??? K??? Thu???t</option>
                        </select>
                    </div>

                    <input type="hidden" onload="getDate()" class="form-control" id="date" name="Full_Time" value="">

                    <div class="form-group text-center">
                        <button class="btn btn-primary btn-dark btn-simple  btn-long mt-5">????NG K??</button>
                    </div>
                </div>
                <div id="content-mobile"></div>
            </form>
        </div>
    </div>
</div>

<div id="footer">
    <div class="container wow fadeInUp padding-top-bottom animated">
        <h3 class="text-uppercase padding-bottom-smaller"><strong>LI??N H??? V???I CH??NG T??I.</strong></h3>
        <div class="row"> <!-- MB -->
            <div class="col-md-4 col-sm-4">
                <address>
                    <h5><strong>MINI L?? Du???n</strong></h5>
                    <p>132 L?? Du???n, Q. Hai B?? Tr??ng, H?? N???i.</p>
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
                    <h5><strong>MINI LONG BI??N</strong></h5>
                    <p>01 Ng?? Gia T???, Ph?????ng ?????c Giang, Qu???n Long Bi??n, H?? N???i.</p>
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
                    <h5><strong>MINI L?? V??N L????NG</strong></h5>
                    <p>68 L?? V??n L????ng, P. Nh??n Ch??nh, Qu???n Thanh Xu??n, H?? N???i.</p>
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
                    <p>12 Mai Ch?? Th???, Ph?????ng An L???i ????ng, Qu???n 2, TP HCM.</p>
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
                    <h5><strong>MINI NGUY???N V??N TR???I</strong></h5>
                    <p>T???ng 3 - 80 Nguy???n V??n Tr???i, Ph?????ng 8, Qu???n Ph?? Nhu???n, TP HCM.</p>
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
                    <h5><strong>MINI ???? N???NG</strong></h5>
                    <p>356 ??i???n Bi??n Ph???, Ph?????ng Thanh Kh?? ????ng, Qu???n Thanh Kh??, ???? N???ng.</p>
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
            <span>V??? trang ?????u</span></a></div>
    <div><a data-scroll="" data-options="easing: easeInQuad" href="#form" class="scroll">
            <img src="/assets/img/ic-laithu.png">
            <span>????ng k?? l??i th???</span></a></div>
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
     logged_in_greeting=""Ch??o b???n ! C??m ??n b???n ???? ch???n MINI Vi???t Nam. Ch??ng t??i c?? th??? g??p g?? cho b???n ?""
logged_out_greeting=""Ch??o b???n ! C??m ??n b???n ???? ch???n MINI Vi???t Nam. Ch??ng t??i c?? th??? g??p g?? cho b???n ?"">
</div>
<!-- End Document
================================================== -->

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TT4V3CX"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->


</body>
</html>
