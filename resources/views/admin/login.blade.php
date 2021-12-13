@extends("admin.layout2")
@section("content")
    <style>
        .myForm{
            min-width: 500px;
            position: absolute;
text-align: center;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);

        }
        @media (max-width: 500px) {
            .myForm{
                min-width: 90%;
            }
        }
    </style>
  <div class="container">
      <form class="myForm" method="post" action="{{route("login")}}">
          @csrf

              <div class="form-group">
                  <label>Tên tài khoản</label>
                  <input style="margin-top: 10px" name="username" type="text" class="form-control"  placeholder="Nhập tên tài khoản">
              </div>
              <div class="form-group">
                  <label >Mật khẩu</label>
                  <input  style="margin-top: 10px" type="password" class="form-control" name="password" placeholder="Mật khẩu">
              </div>
          @if($error)
            <span style="color:red">{{$error}}</span>
          @endif
             <div class="text-center"> <button  style="margin-top: 10px" value="Login" type="submit" class="btn btn-primary">Đăng nhập</button></div>

      </form>
  </div>

@endsection
