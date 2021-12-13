<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
    <link href="/admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="/admin/css/all.css" rel="stylesheet">
    <link href="/admin/swal2/sweetalert2.css" rel="stylesheet">
    <script src="/admin/js/vue.js"></script>
    <script src="/admin/js/jquery-3.5.1.min.js"></script>
    <script src="/admin/swal2/sweetalert2.all.min.js"></script>
    <title>Dashboard</title>
</head>
<body>

<script>
    let redirect = false;
    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, beforeSend: function (xhr) {
        }, error: function (xhr, textStatus, errorThrown) {
            switch (xhr.status) {
                case 419:
                    window.location.reload();
                    break;
                case 403:
            }
        },
    });

</script>
<style>


    li.header {

        color: #4b646f;
        background: #1a2226;

    }

    .sidebar-menu, .main-sidebar .user-panel, .sidebar-menu > li.header {
        white-space: nowrap;
        overflow: hidden;
    }

    .sidebar-menu {
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .sidebar-menu > li.header {
        color: #4b646f;
        background: #1a2226;
    }

    .sidebar-form, .sidebar-menu > li.header {
        overflow: hidden;
        text-overflow: clip;
    }

    .sidebar-menu, .main-sidebar .user-panel, .sidebar-menu > li.header {
        white-space: nowrap;
        overflow: hidden;
    }

    .sidebar-menu li.header {
        padding: 10px 25px 10px 15px;
        font-size: 12px;
    }

    .sidebar-menu > li {
        position: relative;
        margin: 0;
        padding: 0;
    }

    .sidebar-menu > li {
        position: relative;
        margin: 0;
        padding: 0;
    }

    .sidebar-menu li.active a {
        border-left-color: #3c8dbc;
    }

    .sidebar-menu > li:hover > a, .skin-blue .sidebar-menu > li.active > a, .skin-blue .sidebar-menu > li.menu-open > a {
        color: #fff;
        background: #1e282c;
    }

    .sidebar-menu > li > a {
        border-left: 3px solid transparent;
        border-left-color: transparent;
    }

    .sidebar a {
        color: #b8c7ce;
    }

    .sidebar-menu li > a {
        position: relative;
    }

    .sidebar-menu > li > a {
        padding: 12px 5px 12px 15px;
        display: block;
    }

    a {
        color: #3c8dbc;
    }

    a {
        color: #337ab7;
        text-decoration: none;
    }

    .sidebar-menu > li > a > .fa, .sidebar-menu > li > a > .glyphicon, .sidebar-menu > li > a > .ion {
        width: 20px;
    }


    .sidebar-menu > li:hover > a, .sidebar-menu > li.active > a, .sidebar-menu > li.menu-open > a {
        color: #fff;
    }

    .sidebar-menu li.active {
        background-color: #373737;
    }

    .row {
        --bs-gutter-x: 1.5rem;
        --bs-gutter-y: 0;
        display: flex;
        flex-wrap: wrap;
        margin-top: 0;
        margin-right: 0;
        margin-left: calc(var(--bs-gutter-x) / -2);
    }
</style>
<div class="row" style="height: 100vh;">
    <div class="col-12 col-md-3" style="padding-right: 0 ;background-color: #222d32;z-index: 810; max-width: 250px">
        <ul class="sidebar-menu tree" data-widget="tree">
            <li class="header">Dashboard</li>

            <li  class="product">
                <a href="{{route("admin.model")}}">
                    <i class="fa fa-link"></i>
                    Quản lí sản phẩm
                </a>
            </li>
            <li class="blog">
                <a href="{{route("admin.blog")}}">
                    <i class="fa fa-link"></i>
                    Quản lí trang báo
                </a>
            </li>
            <li class="request">
                <a href="{{route("admin.request")}}">
                    <i class="fa fa-link"></i>
                    Danh sách yêu cầu
                </a>
            </li>
            <li class="account">
                <a href="{{route("admin.account")}}">
                    <i class="fa fa-link"></i>
                    Tài khoản
                </a>
            </li>
            <li class="">
                <a href="{{route("logout")}}">
                    <i class="fa fa-link"></i>
                    Đăng xuất
                </a>
            </li>
        </ul>
    </div>
    <div class="col-12 col-md-9 mt-2">
        @yield('content')
    </div>

</div>


<script src="/admin/js/bootstrap.bundle.min.js"></script>


</body>
</html>
