<div class="row my-5">
<div class="page-section card col-12 p-5">
    <div class="section-title">Quản lý tài khoản</div>
    <div class="h4 mb-3 textBazar">Thông tin tài khoản</div>
    <div class="row mb-4">
    <div class="col-12 col-md-6">
        <div class="mb-1">
        <span>Họ tên:&nbsp;</span>
        <span class="font-weight-bold">Huỳnh Trung Nghĩa</span>
        </div>
        <div class="mb-1">
        <span>Email:&nbsp;</span>
        <span class="font-weight-bold">user@domain.com</span>
        </div>
        <div class="mb-1">
        <span>Mật khẩu:&nbsp;</span>
        <span class="font-weight-bold">******</span>
        </div>
        <!-- <div class="mb-1">
        <span>Giới tính:&nbsp;</span>
        <span class="font-weight-bold">Nam</span>
        </div>
        <div class="mb-1">
        <span>Ngày sinh:&nbsp;</span>
        <span class="font-weight-bold">31/12/1990 </span>
        </div> -->
        <div class="mb-1">
        <span>Số điện thoại:&nbsp;</span>
        <span class="font-weight-bold">0912345678</span>
        </div>
        <div class="mb-1">
        <span>Địa chỉ:&nbsp;</span>
        <span class="font-weight-bold">15 Tống Duy Tân, Hoàn Kiếm</span>
        </div>
    </div>
    <div class="col-12 col-md-6 align-top">
        <button type="button" class="btn btn-cart text-white mt-3 mt-md-0" data-toggle="modal" data-target="#changeProfile">
        Thay đổi thông tin
        </button>
        <!-- Modal -->
        <div class="modal fade" id="changeProfile" tabindex="-1" role="dialog" aria-labelledby="changeProfileTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="changeProfileTitle">Thay đổi thông tin tài khoản</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="changeForm">
                <div class="form-group">
                    <label for="fnameChange"
                    >Họ tên<span class="text-danger"> * </span>:
                    </label>
                    <input
                    type="text"
                    class="form-control"
                    id="fnameChange"
                    name="fnameChange"
                    aria-describedby="fnameChange"
                    placeholder="Họ tên"
                    />
                </div>
                <div class="form-group">
                    <label for="passwordChange"
                    >Mật khẩu<span class="text-danger"> * </span>:
                    </label>
                    <input
                    type="password"
                    class="form-control"
                    name="passwordChange"
                    id="passwordChange"
                    placeholder="Mật khẩu mới"
                    />
                </div>
                <div class="form-group">
                    <label for="password2Change"
                    >Nhập lại Mật khẩu<span class="text-danger"> * </span>:
                    </label>
                    <input
                    type="password"
                    class="form-control"
                    name="password2Change"
                    id="password2Change"
                    placeholder="Nhập lại Mật khẩu mới"
                    />
                </div>
                <!-- <div class="form-group">
                    <label class="mr-2">Giới tính: </label>
                    <div class="form-check form-check-inline">
                    <input
                        class="form-check-input"
                        type="radio"
                        name="genderChange"
                        id="radioGender1"
                        value="male"
                    />
                    <label class="form-check-label" for="radioGender1"
                        >Nam</label
                    >
                    </div>
                    <div class="form-check form-check-inline">
                    <input
                        class="form-check-input"
                        type="radio"
                        name="genderChange"
                        id="radioGender2"
                        value="female"
                    />
                    <label class="form-check-label" for="radioGender2"
                        >Nữ</label
                    >
                    </div>
                    <div class="form-check form-check-inline">
                    <input
                        class="form-check-input"
                        type="radio"
                        name="genderChange"
                        id="radioGender3"
                        value="other"
                    />
                    <label class="form-check-label" for="radioGender3"
                        >Khác</label
                    >
                    </div>
                </div>
                <div class="form-group">
                    <label for="birthdayChange" class="">Ngày sinh:</label>
                    <input
                    type="date"
                    name="birthdayChange"
                    class="form-control"
                    />
                </div> -->

                <div class="form-group">
                    <label for="telChange" class="">Số điện thoại<span class="text-danger"> * </span>:</label>
                    <input
                    type="text"
                    class="form-control"
                    id="telChange"
                    name="telChange"
                    placeholder=""
                    />
                </div>

                <div class="form-group row">
                    <div class="col-md-12">
                    <label for="addChange" class="">Địa chỉ:</label>
                    <input
                        type="text"
                        class="form-control"
                        id="addSignup"
                        name="addSignup"
                        placeholder="Số nhà, Tên đường, Xã / Phường, Quận"
                    />
                    </div>
                </div>

                <button class="btn btn-cart mt-1">Thay đổi</button>
                </form>
            </div>
            </div>
        </div>
        </div>
        <!-- End of modal -->
    </div>
    </div>
    
    <div class="">
    <div class="h4 textBazar mb-3">Quản lý đơn hàng</div>
    <table class="table table-hover table-responsive-md text-center mb-0">
        <thead class="thead-light">
            <tr>
            <th scope="col">Ngày</th>
            <th scope="col">Mã đơn</th>
            <th scope="col" style="width: 30%">Sản phẩm</th>
            <th scope="col">Tổng tiền</th>
            <th scope="col">Tình trạng đơn</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <th scope="row">01/09/2019</th>
            <td>123FR001</td>
            <td>Dưa hấu x 1</td>
            <td>40.000đ</td>
            <td>Thành công</td>
            </tr>
            <tr>
            <th scope="row">01/09/2019</th>
            <td>123456789</td>
            <td>Dưa hấu x 1</td>
            <td>40.000đ</td>
            <td>Thành công</td>
            </tr>
            <tr>
            <th scope="row">01/09/2019</th>
            <td>123456789</td>
            <td>Dưa hấu x 1</td>
            <td>40.000đ</td>
            <td>Thành công</td>
            </tr>
            <tr>
            <th scope="row">01/09/2019</th>
            <td>123456789</td>
            <td>Dưa hấu x 1</td>
            <td>40.000đ</td>
            <td>Thành công</td>
            </tr>
            <tr>
            <th scope="row">01/09/2019</th>
            <td>123456789</td>
            <td>Dưa hấu x 1</td>
            <td>40.000đ</td>
            <td>Thành công</td>
            </tr>
            
        </tbody>
    </table>
    </div>
    
</div>
</div>