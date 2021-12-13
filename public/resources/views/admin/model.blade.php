@extends("admin.layout")
@section("content")
    <app-template>

        <div id="app">
            <div v-if="view=='add'" class="card">
                <div class="card-body">
                    <h5><b>
                              <span v-if="add.id">
                                Sửa thông tin
                            </span>
                            <span v-else=>
                                Thêm sản phẩm mới
                            </span>
                        </b></h5>
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Địa chỉ URL</label>
                        <div class="col-sm-10">
                            <input v-on:keyup="$event.target.value = convert_slug($event.target.value) "
                                   v-model="add.slug" type="text" class="form-control" value="">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Hãng xe</label>
                        <div class="col-sm-10">
                            <input v-model="add.brand" type="text" class="form-control" value="">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Tên ngắn gọn</label>
                        <div class="col-sm-10">
                            <input v-model="add.short_model" type="text" class="form-control" value="">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Tên đầy đủ</label>
                        <div class="col-sm-10">
                            <input v-model="add.long_model" type="text" class="form-control" value="">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Giá sản phẩm</label>
                        <div class="col-sm-10">
                            <input v-model="add.price" type="text" class="form-control" value="">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Slogan sản phẩm</label>
                        <div class="col-sm-10">
                            <input v-model="add.slogan" type="text" class="form-control" value="">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Youtube</label>
                        <div class="col-sm-10">
                            <input v-model="add.youtube" type="text" class="form-control" value="">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Hình ảnh xe</label>
                        <div class="col-sm-10">
                            <div class="mb-3"><img v-bind:src="add.images"
                                                   style="height: 39px; width: 75px;float: left;margin-right: 10px;">
                                <input v-on:change="upload($event.target,'images')" accept="image/x-png,image/jpeg"
                                       type="file" class="form-control" style="width: 400px;"></div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Hình lớn</label>
                        <div class="col-sm-10">
                            <div class="mb-3">
                                <div class="mb-3"><img v-bind:src="add.thumbnail"
                                                       style="height: 39px; width: 75px;float: left;margin-right: 10px;">
                                    <input v-on:change="upload($event.target,'thumbnail')"
                                           accept="image/x-png,image/jpeg" type="file" class="form-control"
                                           style="width: 400px;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Đặc điểm nổi bật</label>
                        <div class="col-sm-10">
                            <div class="mb-3">
                                <div class="card">

                                    <div class="card-body">
                                        <h6><b>Đặc điểm 1</b></h6>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">Tiêu đề</label>
                                            <div class="col-sm-10">
                                                <input v-model="add.feature[0].title" type="text" class="form-control"
                                                       value="">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">Nội dung</label>
                                            <div class="col-sm-10">
                                                <input v-model="add.feature[0].content" type="text" class="form-control"
                                                       value="">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">Hình ảnh</label>
                                            <div class="col-sm-10">
                                                <div class="mb-3"><img v-bind:src="add.feature[0].images"
                                                                       style="height: 39px; width: 75px;float: left;margin-right: 10px;">
                                                    <input v-on:change="upload($event.target,'feature[0].images')"
                                                           accept="image/x-png,image/jpeg" type="file"
                                                           class="form-control" style="width: 400px;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h6><b>Đặc điểm 2</b></h6>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">Tiêu đề</label>
                                            <div class="col-sm-10">
                                                <input v-model="add.feature[1].title" type="text" class="form-control"
                                                       value="">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">Nội dung</label>
                                            <div class="col-sm-10">
                                                <input v-model="add.feature[1].content" type="text" class="form-control"
                                                       value="">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">Hình ảnh</label>
                                            <div class="col-sm-10">
                                                <div class="mb-3"><img v-bind:src="add.feature[1].images"
                                                                       style="height: 39px; width: 75px;float: left;margin-right: 10px;">
                                                    <input v-on:change="upload($event.target,'feature[1].images')"
                                                           accept="image/x-png,image/jpeg" type="file"
                                                           class="form-control" style="width: 400px;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h6><b>Đặc điểm 3</b></h6>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">Tiêu đề</label>
                                            <div class="col-sm-10">
                                                <input v-model="add.feature[2].title" type="text" class="form-control"
                                                       value="">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">Nội dung</label>
                                            <div class="col-sm-10">
                                                <input v-model="add.feature[2].content" type="text" class="form-control"
                                                       value="">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">Hình ảnh</label>
                                            <div class="col-sm-10">
                                                <div class="mb-3"><img v-bind:src="add.feature[2].images"
                                                                       style="height: 39px; width: 75px;float: left;margin-right: 10px;">
                                                    <input v-on:change="upload($event.target,'feature[2].images')"
                                                           accept="image/x-png,image/jpeg" type="file"
                                                           class="form-control" style="width: 400px;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Thiết kế</label>
                        <div class="col-sm-10">

                            <div class="mb-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h6><b>Thiết kế ngoại thất</b></h6>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">Tiêu đề</label>
                                            <div class="col-sm-10">
                                                <input v-model="add.design.outside.title" type="text"
                                                       class="form-control"
                                                       value="">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">Nội dung</label>
                                            <div class="col-sm-10">
                                                <input v-model="add.design.outside.content" type="text"
                                                       class="form-control"
                                                       value="">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">Hình ảnh</label>
                                            <div class="col-sm-10">
                                                <div class="mb-3"><img v-bind:src="add.design.outside.images"
                                                                       style="height: 39px; width: 75px;float: left;margin-right: 10px;">
                                                    <input v-on:change="upload($event.target,'design.outside.images')"
                                                           accept="image/x-png,image/jpeg" type="file"
                                                           class="form-control" style="width: 400px;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">

                                    <div class="card-body">
                                        <h6><b>Thiết kế nội thất</b></h6>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">Tiêu đề</label>
                                            <div class="col-sm-10">
                                                <input v-model="add.design.inside.title" type="text"
                                                       class="form-control"
                                                       value="">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">Nội dung</label>
                                            <div class="col-sm-10">
                                                <input v-model="add.design.inside.content" type="text"
                                                       class="form-control"
                                                       value="">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">Hình ảnh</label>
                                            <div class="col-sm-10">
                                                <div class="mb-3"><img v-bind:src="add.design.inside.images"
                                                                       style="height: 39px; width: 75px;float: left;margin-right: 10px;">
                                                    <input v-on:change="upload($event.target,'design.inside.images')"
                                                           accept="image/x-png,image/jpeg" type="file"
                                                           class="form-control" style="width: 400px;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Vận hành</label>
                        <div class="col-sm-10">

                            <div class="mb-3">
                                <div class="card">

                                    <div class="card-body">

                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">Hình ảnh</label>
                                            <div class="col-sm-10">
                                                <div class="mb-3"><img v-bind:src="add.operate.images"
                                                                       style="height: 39px; width: 75px;float: left;margin-right: 10px;">
                                                    <input v-on:change="upload($event.target,'operate.images')"
                                                           accept="image/x-png,image/jpeg" type="file"
                                                           class="form-control" style="width: 400px;"></div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h6><b>Vận hành 1</b></h6>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">Tiêu đề</label>
                                            <div class="col-sm-10">
                                                <input v-model="add.operate.list[0].title" type="text"
                                                       class="form-control"
                                                       value="">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">Nội dung</label>
                                            <div class="col-sm-10">
                                                <input v-model="add.operate.list[0].content" type="text"
                                                       class="form-control"
                                                       value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h6><b>Vận hành 2</b></h6>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">Tiêu đề</label>
                                            <div class="col-sm-10">
                                                <input v-model="add.operate.list[1].title" type="text"
                                                       class="form-control"
                                                       value="">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">Nội dung</label>
                                            <div class="col-sm-10">
                                                <input v-model="add.operate.list[1].content" type="text"
                                                       class="form-control"
                                                       value="">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h6><b>Vận hành 3</b></h6>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">Tiêu đề</label>
                                            <div class="col-sm-10">
                                                <input v-model="add.operate.list[2].title" type="text"
                                                       class="form-control"
                                                       value="">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">Nội dung</label>
                                            <div class="col-sm-10">
                                                <input v-model="add.operate.list[2].content" type="text"
                                                       class="form-control"
                                                       value="">
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Công nghệ</label>
                        <div class="col-sm-10">

                            <div class="mb-3">
                                <div class="card">

                                    <div class="card-body">
                                        <h6><b>Công nghệ 1</b></h6>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">Tiêu đề</label>
                                            <div class="col-sm-10">
                                                <input v-model="add.technology[0].title" type="text"
                                                       class="form-control"
                                                       value="">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">Nội dung</label>
                                            <div class="col-sm-10">
                                                <input v-model="add.technology[0].content" type="text"
                                                       class="form-control"
                                                       value="">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">Hình ảnh</label>
                                            <div class="col-sm-10">
                                                <div class="mb-3"><img v-bind:src="add.technology[0].images"
                                                                       style="height: 39px; width: 75px;float: left;margin-right: 10px;">
                                                    <input v-on:change="upload($event.target,'technology[0].images')"
                                                           accept="image/x-png,image/jpeg" type="file"
                                                           class="form-control" style="width: 400px;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h6><b>Công nghệ 2</b></h6>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">Tiêu đề</label>
                                            <div class="col-sm-10">
                                                <input v-model="add.technology[1].title" type="text"
                                                       class="form-control"
                                                       value="">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">Nội dung</label>
                                            <div class="col-sm-10">
                                                <input v-model="add.technology[1].content" type="text"
                                                       class="form-control"
                                                       value="">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">Hình ảnh</label>
                                            <div class="col-sm-10">
                                                <div class="mb-3"><img v-bind:src="add.technology[1].images"
                                                                       style="height: 39px; width: 75px;float: left;margin-right: 10px;">
                                                    <input v-on:change="upload($event.target,'technology[1].images')"
                                                           accept="image/x-png,image/jpeg" type="file"
                                                           class="form-control" style="width: 400px;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h6><b>Công nghệ 3</b></h6>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">Tiêu đề</label>
                                            <div class="col-sm-10">
                                                <input v-model="add.technology[2].title" type="text"
                                                       class="form-control"
                                                       value="">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">Nội dung</label>
                                            <div class="col-sm-10">
                                                <input v-model="add.technology[2].content" type="text"
                                                       class="form-control"
                                                       value="">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">Hình ảnh</label>
                                            <div class="col-sm-10">
                                                <div class="mb-3"><img v-bind:src="add.technology[2].images"
                                                                       style="height: 39px; width: 75px;float: left;margin-right: 10px;">
                                                    <input v-on:change="upload($event.target,'technology[2].images')"
                                                           accept="image/x-png,image/jpeg" type="file"
                                                           class="form-control" style="width: 400px;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h6><b>Công nghệ 4</b></h6>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">Tiêu đề</label>
                                            <div class="col-sm-10">
                                                <input v-model="add.technology[3].title" type="text"
                                                       class="form-control"
                                                       value="">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">Nội dung</label>
                                            <div class="col-sm-10">
                                                <input v-model="add.technology[3].content" type="text"
                                                       class="form-control"
                                                       value="">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">Hình ảnh</label>
                                            <div class="col-sm-10">
                                                <div class="mb-3"><img v-bind:src="add.technology[3].images"
                                                                       style="height: 39px; width: 75px;float: left;margin-right: 10px;">
                                                    <input v-on:change="upload($event.target,'technology[3].images')"
                                                           accept="image/x-png,image/jpeg" type="file"
                                                           class="form-control" style="width: 400px;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h6><b>Công nghệ 5</b></h6>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">Tiêu đề</label>
                                            <div class="col-sm-10">
                                                <input v-model="add.technology[4].title" type="text"
                                                       class="form-control"
                                                       value="">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">Nội dung</label>
                                            <div class="col-sm-10">
                                                <input v-model="add.technology[4].content" type="text"
                                                       class="form-control"
                                                       value="">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">Hình ảnh</label>
                                            <div class="col-sm-10">
                                                <div class="mb-3"><img v-bind:src="add.technology[4].images"
                                                                       style="height: 39px; width: 75px;float: left;margin-right: 10px;">
                                                    <input v-on:change="upload($event.target,'technology[4].images')"
                                                           accept="image/x-png,image/jpeg" type="file"
                                                           class="form-control" style="width: 400px;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button v-on:click="update" class="btn btn-primary">
                              <span v-if="add.id">
                                Cập nhật thông tin
                            </span>
                            <span v-else=>
                                Thêm sản phẩm mới
                            </span>
                        </button>
                        <button style="margin-left: 10px" v-on:click="view='list';fetch_list();"

                                class="btn btn-primary">
                            Hủy bỏ
                        </button>
                    </div>
                </div>
            </div>
            <div v-else class="card">
                <div class="card-body">
                    <div style="float:right">
                        <button v-on:click="add_new" type="button" class="btn btn-outline-primary">
                            Thêm sản phẩm mới
                        </button>
                    </div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Sản phẩm</th>
                            <th scope="col" style="width: 220px">Hành động</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(item,index) in list">
                            <th scope="row">@{{ index+1 }}</th>
                            <td><img v-bind:src="item.images"
                                     style="height: 39px; width: 75px;float: left;margin-right: 10px;">@{{ item.brand.toUpperCase()
                                }}: @{{ item.long_model }}
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
        $(".product").addClass("active");
        Vue.component("app-template", {})
        let app = new Vue({
            el: "#app",
            data: function () {
                return {
                    view: "list",
                    add: {
                        id: null,
                        slug: null,
                        brand: null,
                        short_model: null,
                        long_model: null,
                        price: null,
                        slogan:null,
                        youtube: null,
                        images: null,
                        thumbnail: null,
                        feature: [
                            {
                                title: null,
                                content: null,
                                images: null,
                            },
                            {
                                title: null,
                                content: null,
                                images: null,
                            },
                            {
                                title: null,
                                content: null,
                                images: null,
                            }
                        ],
                        design: {
                            outside: {
                                title: null,
                                content: null,
                                images: null,
                            },
                            inside: {
                                title: null,
                                content: null,
                                images: null,
                            },

                        },
                        operate: {
                            images: null,
                            list: [
                                {
                                    title: null,
                                    content: null,
                                },
                                {
                                    title: null,
                                    content: null,
                                },
                                {
                                    title: null,
                                    content: null,
                                }
                            ]
                        },
                        technology: [
                            {
                                title: null,
                                content: null,
                                images: null,
                            },
                            {
                                title: null,
                                content: null,
                                images: null,
                            },
                            {
                                title: null,
                                content: null,
                                images: null,
                            },
                            {
                                title: null,
                                content: null,
                                images: null,
                            },
                            {
                                title: null,
                                content: null,
                                images: null,
                            }
                        ],
                    },
                    list: [],

                }
            },
            methods: {
                convert_slug(str) {
                    str = str.replace(/^\s+|\s+$/g, ''); // trim
                    str = str.toLowerCase();

                    // remove accents, swap ñ for n, etc
                    var from = "àáãäâèéëêìíïîòóöôùúüûñç·/_,:;";
                    var to = "aaaaaeeeeiiiioooouuuunc------";

                    for (var i = 0, l = from.length; i < l; i++) {
                        str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
                    }

                    str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
                        .replace(/\s+/g, '-') // collapse whitespace and replace by -
                        .replace(/-+/g, '-'); // collapse dashes

                    return str;
                },
                checkYoutube(url) {
                    var p = /^(?:https?:\/\/)?(?:www\.)?youtube\.com\/watch\?(?=.*v=((\w|-){11}))(?:\S+)?$/;
                    return (url.match(p)) ? RegExp.$1 : false;
                },
                upload(e, callback) {
                    try{
                        let file = $(e).prop('files')[0];
                        var reader = new FileReader();
                        reader.readAsBinaryString(file, "UTF-8");
                        reader.onload = function (evt) {
                            Swal.fire({
                                text: 'Đang tải hình ảnh lên, vui lòng đợi...',
                                showConfirmButton:false,
                                allowOutsideClick:false,
                                didOpen: () => {
                                    Swal.showLoading()
                                },
                            })
                            $.post("{{route("admin.upload")}}", {
                                data: btoa(evt.target.result)
                            }).done(function (result) {
                                if (result.status) {
                                    if (callback === "feature[0].images") Vue.set(app.add.feature[0], "images", result.data)
                                    else if (callback === "feature[1].images") Vue.set(app.add.feature[1], "images", result.data)
                                    else if (callback === "feature[2].images") Vue.set(app.add.feature[2], "images", result.data)
                                    else if (callback === "design.outside.images") Vue.set(app.add.design.outside, "images", result.data)
                                    else if (callback === "design.inside.images") Vue.set(app.add.design.inside, "images", result.data)
                                    else if (callback === "operate.images") Vue.set(app.add.operate, "images", result.data)
                                    else if (callback === "operate.list[0].images") Vue.set(app.add.operate.list[0], "images", result.data)
                                    else if (callback === "operate.list[1].images") Vue.set(app.add.operate.list[1], "images", result.data)
                                    else if (callback === "operate.list[2].images") Vue.set(app.add.operate.list[2], "images", result.data)
                                    else if (callback === "technology[0].images") Vue.set(app.add.technology[0], "images", result.data)
                                    else if (callback === "technology[1].images") Vue.set(app.add.technology[1], "images", result.data)
                                    else if (callback === "technology[2].images") Vue.set(app.add.technology[2], "images", result.data)
                                    else if (callback === "technology[3].images") Vue.set(app.add.technology[3], "images", result.data)
                                    else if (callback === "technology[4].images") Vue.set(app.add.technology[4], "images", result.data)
                                    else Vue.set(app.add, callback, result.data)
                                } else {
                                    Swal.fire("Lỗi", result.message, "error");
                                    console.log("Result", result)
                                }
                            }).always(function (){
                                Swal.close();
                            })
                        }
                        reader.onerror = function (evt) {
                            swal.fire("Lỗi", "Không thể tải lên hình ảnh này, vui lòng thử lại", "error");
                        }
                    }catch (e) {
                        swal.fire("Lỗi", "Không thể tải lên hình ảnh này, vui lòng thử lại", "error");
                    }



                },
                add_new() {
                    Vue.set(app, "view", "add");
                    Vue.set(app, "add", {
                            id: null,
                            slug: null,
                            brand: null,
                            short_model: null,
                            long_model: null,
                            price: null,
                            slogan: null,
                            youtube: null,
                            images: null,
                            thumbnail: null,
                            feature: [
                                {
                                    title: null,
                                    content: null,
                                    images: null,
                                },
                                {
                                    title: null,
                                    content: null,
                                    images: null,
                                },
                                {
                                    title: null,
                                    content: null,
                                    images: null,
                                }
                            ],
                            design: {
                                outside: {
                                    title: null,
                                    content: null,
                                    images: null,
                                },
                                inside: {
                                    title: null,
                                    content: null,
                                    images: null,
                                },

                            },
                            operate: {
                                images: null,
                                list: [
                                    {
                                        title: null,
                                        content: null,
                                    },
                                    {
                                        title: null,
                                        content: null,
                                    },
                                    {
                                        title: null,
                                        content: null,
                                    }
                                ]
                            },
                            technology: [
                                {
                                    title: null,
                                    content: null,
                                    images: null,
                                },
                                {
                                    title: null,
                                    content: null,
                                    images: null,
                                },
                                {
                                    title: null,
                                    content: null,
                                    images: null,
                                },
                                {
                                    title: null,
                                    content: null,
                                    images: null,
                                },
                                {
                                    title: null,
                                    content: null,
                                    images: null,
                                }
                            ],
                        }
                    );
                },
                edit(item) {
                    item.feature = JSON.parse(item.feature);
                    item.design = JSON.parse(item.design);
                    item.operate = JSON.parse(item.operate);
                    item.technology = JSON.parse(item.technology);

                    console.log("item", item)
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
                            $.post("{{route("admin.model.delete")}}", {
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
                    $.post("{{route("admin.model.list")}}")
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
                    if (!this.checkYoutube(app.add.youtube)) {
                        Swal.fire("Lỗi", "Sai link youtube vui lòng kiểm tra lại!", "error");
                        return;
                    }
                    $.post("{{route("admin.model.add")}}", {
                            id: app.add.id,
                            slug: app.add.slug,
                            brand: app.add.brand,
                            short_model: app.add.short_model,
                            long_model: app.add.long_model,
                            price: app.add.price,
                            slogan: app.add.slogan,
                            youtube: app.add.youtube,
                            images: app.add.images,
                            thumbnail: app.add.thumbnail,
                            feature: JSON.stringify(app.add.feature),
                            design: JSON.stringify(app.add.design),
                            operate: JSON.stringify(app.add.operate),
                            technology: JSON.stringify(app.add.technology)
                        }
                    )
                        .done(function (result) {
                            if (result.status) {
                                Swal.fire("Thành công", "Đã thêm hoặc cập nhật thành công", "success");
                                Vue.set(app, "view", "list")
                                app.fetch_list();
                            } else {
                                Swal.fire("Lỗi", result.message, "error");
                            }
                        })
                        .fail(function () {

                        })
                        .always(function () {

                        });
                },
                save() {
                    console.log("save")
                }
            }
        })
        app.fetch_list();

    </script>

@endsection
