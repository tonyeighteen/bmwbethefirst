@extends("admin.layout")
@section("content")
    <app-template>

        <div id="app">
            <div v-if="view=='add'" class="card">
                <div class="card-body">
                    <h5><b>   <span v-if="add.id">
                                Cập nhật thông tin
                            </span>
                            <span v-else=>
                                Thêm trang báo mới
                            </span></b></h5>

                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Tiêu đề</label>
                        <div class="col-sm-10">
                            <input v-model="add.title" type="text" class="form-control" value="">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Nội dung</label>
                        <div class="col-sm-10">
                            <input v-model="add.content" type="text" class="form-control" value="">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Hình ảnh</label>
                        <div class="col-sm-10">
                            <div class="mb-3">
                                <div class="mb-3"><img v-bind:src="add.images"
                                                       style="height: 39px; width: 75px;float: left;margin-right: 10px;">
                                    <input v-on:change="upload($event.target,'images')" accept="image/x-png,image/jpeg"
                                           type="file" class="form-control" style="width: 400px;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Tên báo</label>
                        <div class="col-sm-10">
                            <input v-model="add.newspaper" type="text" class="form-control" value="">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Hình logo báo</label>
                        <div class="col-sm-10">
                            <div class="mb-3"><img v-bind:src="add.logo_newspaper"
                                                   style="height: 39px; width: 75px;float: left;margin-right: 10px;">
                                <input v-on:change="upload($event.target,'logo_newspaper')"
                                       accept="image/x-png,image/jpeg" type="file" class="form-control"
                                       style="width: 400px;">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Địa chỉ</label>
                        <div class="col-sm-10">
                            <input v-model="add.url" type="text" class="form-control" value="">
                        </div>
                    </div>

                    <div class="text-center">
                        <button v-on:click="update" class="btn btn-primary">   <span v-if="add.id">
                                Cập nhật thông tin
                            </span>
                            <span v-else=>
                                Thêm trang báo mới
                            </span></button>
                        <button style="margin-left: 10px" v-on:click="view='list';fetch_list();"
                                class="btn btn-primary">
                            Hủy bỏ
                        </button>
                    </div>
                </div>
            </div>
            <div v-else class="card list">
                <div class="card-body">
                    <div style="float:right">
                        <button v-on:click="add_new" type="button" class="btn btn-outline-primary">Thêm trang báo mới
                        </button>
                    </div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tiêu đề</th>
                            <th scope="col" style="width: 220px">Hành động</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(item,index) in list">
                            <th scope="row">@{{index+1}}</th>
                            <td><img v-bind:src=" item.images "
                                     style="height: 39px; width: 75px;float: left;margin-right: 10px;">@{{ item.title }}
                            </td>
                            <td>
                                <button v-on:click="edit(item)" class="btn btn-sm btn-primary">Sửa</button>
                                <button v-on:click="remove(item)" class="btn btn-sm btn-danger">Xóa</button>
                            </td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </app-template>
    <script>
        $(".blog").addClass("active");
        Vue.component("app-template", {})
        let app = new Vue({
            el: "#app",
            data: function () {
                return {
                    view: "list",
                    add: {
                        id: null,
                        title: null,
                        content: null,
                        images: null,
                        newspaper: null,
                        logo_newspaper: null,
                        url: null,
                    },
                    list: [],

                }
            },
            methods: {

                upload(e, callback) {
                    try {
                        let file = $(e).prop('files')[0];
                        var reader = new FileReader();
                        reader.readAsBinaryString(file, "UTF-8");
                        reader.onload = function (evt) {
                            Swal.fire({
                                text: 'Đang tải hình ảnh lên, vui lòng đợi...',
                                showConfirmButton: false,
                                allowOutsideClick: false,
                                didOpen: () => {
                                    Swal.showLoading()
                                },
                            })
                            $.post("{{route("admin.upload")}}", {
                                data: btoa(evt.target.result)
                            }).done(function (result) {
                                if (result.status) {
                                    Vue.set(app.add, callback, result.data)
                                } else {
                                    Swal.fire("Lỗi", result.message, "error");
                                    console.log("Result", result)
                                }
                            }).always(function () {
                                Swal.close();
                            })
                        }
                        reader.onerror = function (evt) {
                            swal.fire("Lỗi", "Không thể tải lên hình ảnh này, vui lòng thử lại", "error");
                        }
                    } catch (e) {
                        swal.fire("Lỗi", "Không thể tải lên hình ảnh này, vui lòng thử lại", "error");
                    }


                },
                add_new() {
                    Vue.set(app, "view", "add");
                    Vue.set(app, "add", {
                        id: null,
                        title: null,
                        content: null,
                        images: null,
                        newspaper: null,
                        logo_newspaper: null,
                        url: null,
                    });
                },
                edit(item) {
                    Vue.set(app, "add", item);
                    Vue.set(app, "view", "add");

                },
                remove(item) {
                    Swal.fire({
                        title: 'Bạn chắc chứ?',
                        text: "Bạn có thực sự muốn xóa!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Đúng vậy!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.post("{{route("admin.blog.delete")}}", {
                                id: item.id
                            })
                                .done(function (result) {
                                    if (result.status) {
                                        Swal.fire("Thành công", "Đã xóa thành công", "success");
                                        app.fetch_list();
                                    } else {
                                        Swal.fire("Lỗi", result.message, "error");
                                    }

                                    console.log("Result", result)
                                })
                                .fail(function () {

                                })
                                .always(function () {

                                });
                        }
                    })
                },
                fetch_list() {
                    app.list = [];
                    $.post("{{route("admin.blog.list")}}")
                        .done(function (result) {
                            if (result.status) {
                                Vue.set(app, "list", result.data);
                            } else {
                                Swal.fire("Lỗi", result.message, "error");
                            }

                            console.log("Result", result)
                        })
                        .fail(function () {

                        })
                        .always(function () {

                        });
                },
                update() {
                    $.post("{{route("admin.blog.add")}}", {
                        id: app.add.id,
                        title: app.add.title,
                        content: app.add.content,
                        images: app.add.images,
                        newspaper: app.add.newspaper,
                        logo_newspaper: app.add.logo_newspaper,
                        url: app.add.url,
                    }).done(function (result) {
                            if (result.status) {
                                Swal.fire("Thành công", "Đã thêm hoặc cập nhật thành công", "success");
                                Vue.set(app, "view", "list")
                                app.fetch_list();
                            } else {
                                Swal.fire("Lỗi", result.message, "error");
                            }
                        })
                },
                save() {
                    console.log("save")
                }
            }
        })
        app.fetch_list();

    </script>

@endsection
