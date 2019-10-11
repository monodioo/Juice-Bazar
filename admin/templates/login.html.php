<div class="page-section card col-12 col-lg-6 p-5">
    <div class="section-title">Đăng nhập</div>

    <form method="POST" id="adminLoginForm" name="adminLoginForm">
        <div class="form-group">
            <label for="adminName">Tên đăng nhập: </label>
            <input type="text" class="form-control" id="adminName" name="adminName" aria-describedby="adminInput" placeholder="Tên đăng nhập" />
        </div>
        <div class="form-group">
            <label for="adminPass">Mật khẩu: </label>
            <!-- <a href="#" class="text-right" style="float:right">Quên mật khẩu?</a> -->
            <input type="password" class="form-control" name="adminPass" id="adminPass" placeholder="Mật khẩu" />
        </div>
        <button type="submit" id="loginBtn" name="loginSubmit" class="btn btn-cart">
            Đăng nhập
        </button>
    </form>
</div>