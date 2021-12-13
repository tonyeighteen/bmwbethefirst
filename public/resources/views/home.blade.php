@section("title","ƯU ĐÃI MINI VIỆT NAM")
@section("description","Cập nhật các ưu đãi hấp dẫn khi mua các dòng xe MINI")

@extends('layout')
@section("content")

    <link rel="stylesheet" href="/assets/css/style.css"/>
    <link rel="stylesheet" href="/assets/css/color.css"/>
    <!-- Nav and Logo
================================================== -->
    <div id="menu-wrap" class="cbp-af-header black-menu-background-1st-trans menu-fixed-padding-small menu-shadow">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse bg-faded">
                        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavMenuMain" aria-controls="navbarNavMenuMain" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <a class="navbar-brand" href="/index.html">
                            <img src="/assets/img/logo-light.png" alt="" class="">
                        </a>
                        <div class="collapse navbar-collapse" id="navbarNavMenuMain">
                            <ul class="navbar-nav">
                                <a class="nav-link scroll " href="#models" >Xem các mẫu xe MINI</a>
                            </ul>
                            <ul class="navbar-nav ml-auto">
                                <a class="nav-link scroll " href="#footer"><i class="fa fa-map-marker"></i> Liên hệ các Showroom MINI</a>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Hero Block
    ================================================== -->
    <div id="slider" class="section full-height over-hide background-dark">
        <div class="hero-slider-wrap">
            <div id="hero-sync1" class="owl-carousel parallax-fade-top">
                @foreach($product as $item)
                    <div class="item full-height background-image-cover" style="background-image:url('{{$item->thumbnail}}')">
                        <div class="grey-fade-over"><</div>
                        <div class="hero-center-wrap move-top-2 z-bigger">
                            <div class="container text-left">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h1 class="color-white mt-4">{{mb_strtoupper($item->brand)}} {{mb_strtoupper($item->long_model)}} </h1>
                                        <h2 class="color-white mt-4">{{($item->slogan)}} </h2>
                                        <a href="#form" class="btn btn-primary btn-dark btn-simple  btn-long mt-5 scroll" >ĐĂNG KÝ LÁI THỬ</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
            <div id="hero-sync2" class="owl-carousel">
                @foreach($product as $item)
                    <div class="item">
                        <p>{{mb_strtoupper($item->brand)}}</p>
                        <h5 class="mt-1"><span>{{mb_strtoupper($item->short_model)}}</span></h5>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

    <!-- Model Block
    ================================================== -->
    <div id="models" class="section padding-top-bottom-smaller over-hide">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="on-light text-center padding-bottom-smaller">
                        <h4>CÁC MẪU XE</h4>
                    </div>
                </div>
            </div>
            <div class="row-model">
                @foreach($product as $item)
                    <div class="col-model">
                        <a href="/model/{{$item->slug}}.html" style="text-decoration: none" >
                            <div class="text-center model">
                                <img class="img-fluid" src="{{$item->images}}">
                                <h6 class="mt-4 text-padding-with-img">{{$item->brand}} {{$item->short_model}}</h6>
                                <h7 class="mt-4 text-padding-with-img">Giá từ {{$item->price}} </h7>

                                <!--<a href="#" class="btn-link btn-primary">Đăng ký lái thử</a>-->
                            </div>
                        </a>
                    </div>
                @endforeach


            </div>

        </div>
    </div>

    <!-- Video & Call To Action Block
    ================================================== -->
    <div class="section padding-top-bottom-small background-dark over-hide">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="text-center">
                        <h3 style="color: white" >EXPLORE MORE CORNERS</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-12 col-xl-12 ml-auto mr-auto">
            <div class="tabs-back">
                <ul class="nav nav-tabs text-center justify-content-center" role="tablist">
                    @for($i=0 ;$i< count($product);$i++)
                        @if($i==0)
                            <li class="nav-item ">
                                <a class="nav-link active" data-toggle="tab" href="#tab{{$i+1}}" role="tab">{{mb_strtoupper($product[$i]->brand)}} {{mb_strtoupper($product[$i]->short_model)}}</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link " data-toggle="tab" href="#tab{{$i+1}}" role="tab">{{mb_strtoupper($product[$i]->brand)}} {{mb_strtoupper($product[$i]->short_model)}}</a>
                            </li>
                        @endif
                    @endfor

                </ul>
                <!-- Tab panes -->
                <div class="tab-content text-center">
                    @for($i=0 ;$i< count($product);$i++)
                        @if($i==0)
                            <div class="tab-pane fade show active" id="tab{{$i+1}}" role="tabpanel">
                                <div class="container">
                                    <div class="row">
                                        <div class="clear"></div>
                                        <div class="col-lg-12 mt-lg-5 mt-xl-0">
                                            <div class="video-section">
                                                <figure class="vimeo rounded-2 img-raised over-hide">
                                                    <a href="https://www.youtube.com/embed/{{$product[$i]->youtubeId}}">
                                                        <img style="width: 100%" src="https://i.ytimg.com/vi/{{$product[$i]->youtubeId}}/maxresdefault.jpg" alt="image"  class="rounded-2 over-hide"/>
                                                    </a>
                                                </figure>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="tab-pane fade show" id="tab{{$i+1}}" role="tabpanel">
                                <div class="container">
                                    <div class="row">
                                        <div class="clear"></div>
                                        <div class="col-lg-12 mt-lg-5 mt-xl-0">
                                            <div class="video-section">
                                                <figure class="vimeo rounded-2 img-raised over-hide">
                                                    <a href="https://www.youtube.com/embed/{{$product[$i]->youtubeId}}">
                                                        <img style="width: 100%" src="https://i.ytimg.com/vi/{{$product[$i]->youtubeId}}/maxresdefault.jpg" alt="image"  class="rounded-2 over-hide"/>
                                                    </a>
                                                </figure>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endfor

                </div>
            </div>
        </div>
    </div>

    <!-- Blog Block
    ================================================== -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <div class="section padding-top-bottom background-grey-2">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="on-light text-center padding-bottom-smaller">
                    <h4>MINI BIỂU TƯỢNG ANH QUỐC</h4>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="grid-wraper clearfix">
                    @foreach($blog as $key=>$item)

                    <div class="grid-box float-inline third with-margin drop-shadow">

                        <div class="blog-box-1 background-white rounded over-hide">
                            <img  src="{{$item->images}}" class="blog-home-img" />
                            <div style="padding-left: 2.5rem;padding-right: 2.5rem">
                                <h5 class="pt-4 mt-3">{{$item->title}}</h5>

                                <p class="mt-3">{{$item->content}}</p>

                                <a  class="btn-link btn-primary pl-0 mt-4" onclick="showIframe('{{$item->url}}')" >Xem thêm</a>



                                <div class="author-wrap mt-5">
                                    <img  src="{{$item->logo_newspaper}}" alt="" />
                                    <p><a>{{$item->newspaper}}</a></p>
                                </div>

                            </div>
                        </div>

                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <script>
        function showIframe(url){
            Swal.fire({
                html: '<iframe style="height: 400px;width:100%" src="'+url+'" sandbox loading="eager" ></iframe>',
                showConfirmButton: false,
                width: 1100,
                showCloseButton:true,
            })
        }
    </script>
@endsection
