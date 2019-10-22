<?php include "templates/scripts/testForm.php"; ?>

<!-- <div class="row my-4" aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 pl-3 pl-lg-0 bg-transparent">
          <li class="breadcrumb-item"><a href="home.html">Trang chủ</a></li>
          <li class="breadcrumb-item active" aria-current="page">Đăng nhập</li>
        </ol>
      </div> -->

<div class="row mt-5 ">
  <div class="page-section card col-6 mx-auto">
    <div class="row">
      <div class="col-12 border p-5" w>
        <div class="h3 mb-1 textBazar">Đăng nhập</div>
        <div class="mb-3">
          Nếu bạn đã có tài khoản, xin đăng nhập ở đây.
        </div>
        <br />
        <form method="post" id="loginForm" name="loginForm" action="">
          <div class="form-group">
            <label for="emailLogin">Email: </label>
            <input type="text" class="form-control" id="emailLogin" name="emailLogin" aria-describedby="emailInput" placeholder="Email tài khoản" value='<?php if (isset($_POST["emailLogin"])) echo $_POST["emailLogin"];
                                                                                                                                                          else if (isset($_COOKIE["emailLogin"])) echo $_COOKIE["emailLogin"];
                                                                                                                                                          ?>' />
          </div>
          <div class="form-group">
            <label for="passwordLogin">Mật khẩu: </label>
            <a href="#" class="text-right" style="float:right">Quên mật khẩu?</a>
            <input type="password" class="form-control" name="passwordLogin" id="passwordLogin" placeholder="Mật khẩu" value='<?php if (isset($_POST["passwordLogin"])) echo $_POST["passwordLogin"];
                                                                                                                              else if (isset($_COOKIE["passwordLogin"])) echo $_COOKIE["passwordLogin"];
                                                                                                                              ?>' />
          </div>
          <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="rememberCheckLogin" name="rememberCheckLogin" <?php if (isset($_COOKIE["emailLogin"])) echo 'checked'; ?> />
            <label class="form-check-label" for="rememberCheckLogin">Lưu thông tin đăng nhập</label>
          </div>
          <button type="submit" id="loginBtn" name="loginBtn" class="btn btn-cart">
            Đăng nhập
          </button>
        </form>
        <div class="pt-3">Bạn chưa có tài khoản? <a href="?section=signup">Bấm vào đây</a> để đăng ký.</div>
      </div>
    </div>
  </div>
</div>