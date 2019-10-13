<div class="page-section card col-6 p-5">
    <div class="section-title">Admin Login</div>

    <form method="POST" id="adminLoginForm" name="adminLoginForm">
        <div class="form-group">
            <label for="adminName">Username: </label>
            <input type="text" class="form-control" id="adminName" name="adminName" aria-describedby="adminInput" placeholder="Username" />
        </div>
        <div class="form-group">
            <label for="adminPass">Password: </label>
            <!-- <a href="#" class="text-right" style="float:right">Quên Password?</a> -->
            <input type="password" class="form-control" name="adminPass" id="adminPass" placeholder="Password" />
        </div>
        <button type="submit" id="loginBtn" name="loginSubmit" class="btn btn-cart">
            Open Sesame!
        </button>
    </form>
</div>