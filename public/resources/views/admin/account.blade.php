@extends("admin.layout")
@section("content")
    <app-template>

        <div id="app">
            <div class="card add_new">
                <div class="card-body">
                    <h5><b>Change Password</b></h5>

                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Mật khẩu hiện tại</label>
                        <div class="col-sm-10">
                            <input v-model="current_password" type="password" class="form-control" value="">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Mật khẩu mới</label>
                        <div class="col-sm-10">
                            <input v-model="new_password" type="password" class="form-control" value="">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Nhập lại mật khẩu</label>
                        <div class="col-sm-10">
                            <input v-model="renew_password" type="password" class="form-control" value="">
                        </div>
                    </div>

                    <div class="text-center">
                        <button v-on:click="update" class="btn btn-primary">Cập nhật ngay</button>
                    </div>
                </div>
            </div>


        </div>
    </app-template>
    <script>
        Vue.component("app-template", {})
        let app = new Vue({
            el: "#app",
            data: function () {
                return {
                   current_password:null,
                    new_password:null,
                    renew_password:null

                }
            },
            methods: {

                update() {
                    if (!app.current_password) {
                        swal.fire("Lỗi","Mật khẩu hiện tại không được để trống.","error");
                        return;
                    }
                    if (app.new_password !== app.renew_password) {
                        swal.fire("Lỗi","Mật khẩu mới không trùng nhau.","error");
                        return;
                    }
                    if (!app.new_password ) {
                        swal.fire("Lỗi","Mật khẩu mới không được để trống.","error");
                        return;
                    }
                    $.post("{{route("admin.change_password")}}", {
                        current_password: app.current_password,
                        new_password: app.new_password,
                        renew_password: app.renew_password,

                        }
                    )
                        .done(function (result) {
                            if (result.status) {
                                Swal.fire("Thành công", "Đã cập nhật mật khẩu thành công", "success");
                                window.location.reload();
                            } else {
                                Swal.fire("Lỗi", result.message, "error");
                            }
                        })

                },

            }
        })
        $(".account").addClass("active");
    </script>
@endsection
