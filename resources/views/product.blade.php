@section("title", mb_strtoupper( $product->brand) . " " .  $product->long_model . " | MINI VIETNAM")
@section("description","Test")
@extends("layout")
@section("content")

    <link rel="stylesheet" href="/assets/css/style-model.css"/>
    <link rel="stylesheet" href="/assets/css/color.css"/>
    <!-- Nav and Logo
    ================================================== -->

    <div id="menu-wrap" style="position: sticky" class="cbp-af-header white-menu-background-1st-trans menu-fixed-padding-small-same menu-shadow">
        <div class="container-fluid max-width-90">
            <div class="row">
                <div class="col-md-4">
                    <nav class="navbar navbar-toggleable-md navbar-light bg-inverse bg-faded justify-content-center">
                        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                                data-target="#navbarNavMenuMain" aria-controls="navbarNavMenuMain" aria-expanded="false"
                                aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <a class="navbar-brand" href="/index.html">
                            <img src="/assets/img/logo.png" alt="" class="">
                        </a>
                    </nav>
                </div>
                <div class="col-md-4" style="text-align: center">
                    <a href="/index.html#models"><p style="font-family: mini_sans_regular; color: black;text-decoration: none">XEM CÁC MẪU XE KHÁC
                        <p></a>
                    <h4>{{mb_strtoupper( $product->brand)}} {{mb_strtoupper( $product->long_model)}} </h4>
                </div>
                <div class="col-md-4">
                    <nav class="navbar navbar-toggleable-md navbar-light justify-content-center">
                        <a href="#form" class="btn btn-primary btn-simple  btn-long scroll">ĐĂNG KÝ LÁI THỬ</a>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-toggleable-md navbar-light bg-inverse bg-faded">
                        <div class="collapse navbar-collapse justify-content-center" id="navbarNavMenuMain">
                            <ul class="navbar-nav">
                                <li>
                                    <a class="btn btn-primary btn-simple btn-simple-menu scroll" href="#dac-diem">ĐẶC ĐIỂM NỔI BẬT</a>
                                </li>
                                <li>
                                    <a class="btn btn-primary btn-simple btn-simple-menu scroll" href="#thiet-ke">THIẾT KẾ</a>
                                </li>
                                <li>
                                    <a class="btn btn-primary btn-simple btn-simple-menu scroll" href="#van-hanh">VẬN HÀNH</a>
                                </li>
                                <li>
                                    <a class="btn btn-primary btn-simple btn-simple-menu scroll" href="#cong-nghe">CÔNG NGHỆ</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Hero Block
    ================================================== -->

    <div id="slider" class="section full-height over-hide background-dark ">
        <div class="item full-height background-image-cover"
                     style="background-image:url('{{$product->thumbnail}}')">
        </div>
    </div>

    <!-- Video & Call To Action Block
    ================================================== -->
    <div class="section padding-top-bottom-small background-dark over-hide">
        <div class="container z-bigger">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="main-title on-dark text-center">
                        <h3>EXPLORE MORE CORNERS</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="clear"></div>
                <div class="col-lg-12 mt-lg-5 mt-xl-0">
                    <div class="video-section">
                        <figure class="vimeo rounded-2 img-raised over-hide">
                            <a href="https://www.youtube.com/embed/{{$product->youtubeId}}">
                                <img style="width: 100%"
                                     src="https://i.ytimg.com/vi/{{$product->youtubeId}}/hqdefault.jpg" alt="image"
                                     class="rounded-2 over-hide"/>
                            </a>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Feature
    ================================================== -->

    <div id="dac-diem" class="section padding-top-bottom background-white over-hide">
        <div class="container z-bigger">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="main-title on-light text-center">
                        <h3>ĐẶC ĐIỂM NỔI BẬT</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @foreach($product->featureArray as $item)
                    @if($item->title && $item->content && $item->images)
                        <div class="col-lg-4" data-scroll-reveal="enter bottom move 40px over 0.8s after 0.2s">
                            <div class="services-box-1 border-on-light text-center over-hide pt-0 pl-0 pr-0">
                                <img class="img-fluid" src="{{$item->images}}" alt="">
                                <h5 class="mt-4 text-padding-with-img">{{$item->title}}</h5>
                                <p class="mt-3 mb-4 text-padding-with-img">{{$item->content}}</p>
                                <!--<a href="#" class="btn-link btn-primary">ĐĂNG KÝ LÁI THỬ</a>-->
                            </div>
                        </div>
                    @endif
                @endforeach

            </div>
        </div>
    </div>


    <!-- Design
    ================================================== -->

    <div id="thiet-ke" class="section background-grey over-hide">
        <div class="container-fluid m-0 p-0 background-grey">
            <div class="row column-reverse">
                <div class="col-lg-6 row-in background-image-cover padding-top-bottom"
                     style="background-image: url('{{$product->designArray->outside->images}}')"></div>
                <div class="col-lg-6 row-in padding-top-bottom">
                    <div class="section align-self-center text-left padding-on-grid-12">
                        <div class="main-title no-subtitle">
                            <div class="main-subtitle-top mb-4">Thiết kế ngoại thất</div>
                            <h3 class="mb-0">{{$product->designArray->outside->title}}</h3>
                        </div>
                        <p class="lead mb-5">{{$product->designArray->outside->content}}</p>
                        <a href="#form" class="btn btn-primary btn-simple  btn-long scroll">ĐĂNG KÝ LÁI THỬ</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="section background-grey over-hide">
        <div class="container-fluid m-0 p-0 background-grey">
            <div class="row mobile-column-reverse">
                <div class="col-lg-6 row-in padding-top-bottom">
                    <div class="section align-self-center text-left padding-on-grid-12">
                        <div class="main-title no-subtitle">
                            <div class="main-subtitle-top mb-4">Thiết kế nội thất</div>
                            <h3 class="mb-0">{{$product->designArray->inside->title}}</h3>
                        </div>
                        <p class="lead mb-5">{{$product->designArray->inside->content}}</p>
                        <a href="#form" class="btn btn-primary btn-simple  btn-long scroll">ĐĂNG KÝ LÁI THỬ</a>
                    </div>
                </div>
                <div class="col-lg-6 row-in background-image-cover padding-top-bottom"
                     style="background-image: url('{{$product->designArray->inside->images}}')"></div>
            </div>
        </div>
    </div>

    <!-- Engine
    ================================================== -->

    <div id="van-hanh" class="section padding-top-bottom background-white over-hide">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <img class="img-fluid rounded-2 img-raised" src="{{$product->operateArray->images}}" alt="">
                </div>
                <div class="col-lg-6 mt-4 mt-lg-0 mt-xl-5">
                    <div id="accordion-1" class="accordion-style dark" role="tablist" aria-multiselectable="true">

                        @for($i=0;$i<count($product->operateArray->list);$i++)
                            @if($product->operateArray->list[$i]->title && $product->operateArray->list[$i]->content)
                                @if($i==0)
                                    <div class="card">
                                        <div class="card-header" role="tab" id="headingOne-{{$i+1}}">
                                            <a data-toggle="collapse" data-parent="#accordion-1"
                                               href="#collapseOne-{{$i+1}}" aria-expanded="true"
                                               aria-controls="collapseOne">
                                                {{$product->operateArray->list[$i]->title}}
                                            </a>
                                        </div>
                                        <div id="collapseOne-{{$i+1}}" class="collapse show" role="tabpanel"
                                             aria-labelledby="headingOne-{{$i+1}}">
                                            <div class="card-block">
                                                <p>{{$product->operateArray->list[$i]->content}}</p>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="card">
                                        <div class="card-header" role="tab" id="headingOne-{{$i+1}}">
                                            <a data-toggle="collapse" data-parent="#accordion-1"
                                               href="#collapseOne-{{$i+1}}" aria-expanded="true"
                                               aria-controls="collapseOne">
                                                {{$product->operateArray->list[$i]->title}}
                                            </a>
                                        </div>
                                        <div id="collapseOne-{{$i+1}}" class="collapse" role="tabpanel"
                                             aria-labelledby="headingOne-{{$i+1}}">
                                            <div class="card-block">
                                                <p>{{$product->operateArray->list[$i]->content}}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endif
                        @endfor


                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Techno
    ================================================== -->
    <div id="cong-nghe" class="container padding-bottom-big">
        <div class="row justify-content-center">
            <div class="col-md-10 mt-4 mt-md-0 ">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @for($i=0;$i<count($product->technologyArray);$i++)
                            @if($product->technologyArray[$i]->title && $product->technologyArray[$i]->content && $product->technologyArray[$i]->images)
                                @if($i==0)
                                    <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}"
                                        class="active"></li>
                                @else
                                    <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}" class=""></li>
                                @endif
                            @endif

                        @endfor

                    </ol>
                    <div class="carousel-inner padding-bottom-big" role="listbox">
                        @for($i=0;$i<count($product->technologyArray);$i++)
                            @if($product->technologyArray[$i]->title && $product->technologyArray[$i]->content && $product->technologyArray[$i]->images)
                                @if($i==0)
                                    <div class="carousel-item active">
                                        <div><img style="width: 100%" class="d-block img-fluid"
                                                  src="{{$product->technologyArray[$i]->images}}" alt="First slide">
                                        </div>
                                        <div class="carousel-caption mb-3 d-md-block dark-bg" style="bottom: -180px">
                                            <h5>{{$product->technologyArray[$i]->title}}</h5>
                                            <p style="color: black">{{$product->technologyArray[$i]->content}}</p>
                                        </div>
                                    </div>
                                @else
                                    <div class="carousel-item ">
                                        <div><img style="width: 100%" class="d-block img-fluid"
                                                  src="{{$product->technologyArray[$i]->images}}" alt="First slide">
                                        </div>
                                        <div class="carousel-caption mb-3 d-md-block dark-bg" style="bottom: -180px">
                                            <h5>{{$product->technologyArray[$i]->title}}</h5>
                                            <p style="color: black">{{$product->technologyArray[$i]->content}}</p>
                                        </div>
                                    </div>
                                @endif
                            @endif


                        @endfor


                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <i class="fa fa-arrow-left"></i>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <i class="fa fa-arrow-right"></i>
                    </a>

                </div>
            </div>
        </div>
    </div>

@endsection

