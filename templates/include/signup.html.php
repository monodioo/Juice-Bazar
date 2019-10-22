<?php include "templates/scripts/testForm.php"; ?>
<div class="row mt-5 ">
  <div class="page-section card col-6 mx-auto">
    <div class="row">
      <div class="col-12 bg-light p-5">
        <div class="h3 mb-1 textBazar">Đăng ký</div>
        <div class="mb-3">
          Bạn có thể dễ dàng đăng ký tài khoản trên Juice Bazar để nhận
          được thêm nhiều khuyến mãi của chúng tôi!
        </div>
        <form method="post" id="signupForm" name="signupForm" action="">
          <div class="form-group">
            <label for="emailSignup">Email<span class="text-danger"> * </span>:
            </label>
            <input type="text" class="form-control" id="emailSignup" name="emailSignup" aria-describedby="emailSignup" placeholder="Email đăng ký" value='<?php if (isset($_POST["emailSignup"])) echo $_POST["emailSignup"]; ?>' />
          </div>
          <div class="form-group">
            <label for="fnameSignup">Họ tên<span class="text-danger"> * </span>:
            </label>
            <input type="text" class="form-control" id="fnameSignup" name="fnameSignup" aria-describedby="fnameSignup" placeholder="Họ tên" value='<?php if (isset($_POST["fnameSignup"])) echo $_POST["fnameSignup"]; ?>' />
          </div>
          <div class="form-group">
            <label for="passwordSignup">Mật khẩu<span class="text-danger"> * </span>:
            </label>
            <input type="password" class="form-control" name="passwordSignup" id="passwordSignup" placeholder="Mật khẩu" value='<?php if (isset($_POST["passwordSignup"])) echo $_POST["passwordSignup"]; ?>' />
          </div>
          <div class="form-group">
            <label for="password2Signup">Nhập lại Mật khẩu<span class="text-danger"> * </span>:
            </label>
            <input type="password" class="form-control" name="password2Signup" id="password2Signup" placeholder="Nhập lại Mật khẩu" value='<?php if (isset($_POST["password2Signup"])) echo $_POST["password2Signup"]; ?>' />
          </div>
          <!-- <div class="form-group">
                  <label class="mr-2">Giới tính: </label>
                  <div class="form-check form-check-inline">
                    <input
                      class="form-check-input"
                      type="radio"
                      name="genderSignup"
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
                      name="genderSignup"
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
                      name="genderSignup"
                      id="radioGender3"
                      value="other"
                    />
                    <label class="form-check-label" for="radioGender3"
                      >Khác</label
                    >
                  </div>
                </div>
                <div class="form-group">
                  <label for="birthdaySignup" class="">Ngày sinh:</label>
                  <input
                    type="date"
                    name="birthdaySignup"
                    class="form-control"
                  />
                </div> -->

          <div class="form-group">
            <label for="telSignup" class="">Số điện thoại<span class="text-danger"> * </span>:</label>
            <input type="text" class="form-control" id="telSignup" name="telSignup" placeholder="" value='<?php if (isset($_POST["telSignup"])) echo $_POST["telSignup"]; ?>' />
          </div>

          <div class="form-group row">
            <div class="col-md-12">
              <label for="addSignup" class="">Địa chỉ:</label>
              <input type="text" class="form-control" id="addSignup" name="addSignup" placeholder="Số nhà, Tên đường, Xã / Phường, Quận" value='<?php if (isset($_POST["telSignup"])) echo $_POST["telSignup"]; ?>' />
            </div>
          </div>

          <button class="btn btn-cart mt-1" type="submit" name="signupBtn">Đăng ký</button>
        </form>
      </div>
    </div>
  </div>
</div>