<!DOCTYPE html>
<html>
<head>
    <title>MINI VIETNAM</title>
    <script  src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css"/>
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
<body>
<style>
    body
    {
        width: 100%;
        Height: 100%;
    }
    #main_body
    {
        position: absolute;
    }​

</style>
<div id="main_body">
    <div class="container">
        <div class="row text-center">
            <div class="col-12">
                <img style="width: 20%;height:auto" src="/assets/img/logo.png" >

                <h3 class="mt-3">
                    @if($error)
                        <span style="color:red">{{$error}} </span>
                        @else
                        <span>Cám ơn Quý khách đã quan tâm đến chương trình ưu đãi của MINI VIETNAM,<br> nhân viên CSKH của MINI sẽ liên hệ với Quý khách trong sớm nhất. </span>
                        <script>
                            setTimeout(function(){
                                window.location.href = "//minivietnam.com.vn";
                            },4000)
                        </script>
                    @endif




                </h3>
            </div>
        </div>
    </div>
</div>


<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TT4V3CX"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

</body>
<script>
    $(function(){
        var windowHeight = $(window).height();
        var windowWidth = $(window).width();
        var main = $("#main_body");
        $("#main_body").css({ top: ((windowHeight / 2) - (main.height() / 2)) + "px",
            left:((windowWidth / 2) - (main.width() / 2)) + "px" });
    });

</script>
</html>
