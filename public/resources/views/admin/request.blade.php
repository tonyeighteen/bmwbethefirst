@extends("admin.layout")
@section("content")
    <app-template>

        <div id="app">

            <div class="card list">
                <div class="card-body">
                    <div style="float:right">
                        <button v-on:click="exportCSV" type="button" class="btn btn-outline-primary">
                            Xuất CSV
                        </button>
                    </div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Họ tên</th>
                            <th scope="col">Số điện thoại</th>
                            <th scope="col">Email</th>
                            <th scope="col">Mẫu xe</th>
                            <th scope="col">Địa điểm</th>
                            <th scope="col">Showroom</th>
                            <th scope="col">Mục đích</th>
                            <th scope="col">Ngày yêu cầu</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(item,index) in list">
                            <td scope="row">@{{item.id}}</td>
                            <td>@{{item.name}}</td>
                            <td>@{{item.phone}}</td>
                            <td>@{{item.email}}</td>
                            <td>@{{item.model}}</td>
                            <td>@{{item.location}}</td>
                            <td>@{{item.showroom}}</td>
                            <td>@{{item.purpose}}</td>
                            <td>@{{item.created_at}}</td>

                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </app-template>
    <script>
        $(".request").addClass("active");
        Vue.component("app-template", {})
        let app = new Vue({
            el: "#app",
            data: function () {
                return {

                    list: [],

                }
            },
            methods: {
                exportCSV(){
                    if (!app.list || app.list.length<1) {
                        swal.fire("Lỗi","Không thông tin để xuất CSV","error");
                        return;
                    }
                    var data = [];
                    data.push(["#","Họ và tên","Số điện thoại","Email","Mẫu xe","Địa chỉ","Showroom","Mục đích","Ngày yêu cầu"]);
                    app.list.forEach(function (item,index){
                        data.push([index+1,item.name,item.phone,item.email,item.model,item.location,item.showroom,item.purpose,item.created_at]);
                    })
                    var csvContent = '';
                    data.forEach(function(infoArray, index) {
                        dataString = infoArray.join(',');
                        csvContent += index < data.length ? dataString + '\n' : dataString;
                    });

                    var universalBOM = "\uFEFF";
                    var a = window.document.createElement('a');
                    a.setAttribute('href', 'data:text/csv; charset=utf-8,' + encodeURIComponent(universalBOM+csvContent));
                    a.setAttribute('download', 'report.csv');
                    window.document.body.appendChild(a);
                    a.click();
                },

                fetch_list() {
                    app.list = [];
                    $.post("{{route("admin.request.list")}}")
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

            }
        })
        app.fetch_list();

    </script>

@endsection
