<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST["loginBtn"])) {
        if (empty($_POST["emailLogin"]) && empty($_POST["passwordLogin"])) {
            echo "<script>alert('Email và mật khẩu không được để trống!');</script>";
        } else {
            $sqlMember = "SELECT * FROM Member WHERE Email = '" . $_POST["emailLogin"] . "' AND Pass = '" . $_POST["passwordLogin"] . "'";
            $resultMember = mysqli_query($con, $sqlMember);
            if (mysqli_num_rows($resultMember)) {
                $rowMember = mysqli_fetch_array($resultMember);
                if ($rowMember['Status'] == '0') {
                    echo "<script>alert('Tài khoản của bạn đã bị khóa. Vui lòng liên hệ với bộ phận quản trị.');</script>";
                } else {
                    $_SESSION["memberName"] = $rowMember['Name'];
                    $_SESSION["memberId"] = $rowMember["MemberId"];
                    echo "<script>alert('Đăng nhập thành công!');location='index.php?section=home';</script>";
                }
            } else {
                echo "<script>alert('Email hoặc mật khẩu không đúng!');</script>";
            }
        }
    }

    if (isset($_POST["signupBtn"])) {
        $signup = validate_signup_form($_POST['emailSignup'], $_POST['fnameSignup'], $_POST['passwordSignup'], $_POST['password2Signup'], $_POST['telSignup']);
        if ($signup) {
            $sqlMember = "SELECT * FROM Member WHERE Email = '" . $_POST["emailSignup"] . "'";
            $resultMember = mysqli_query($con, $sqlMember);
            if (mysqli_num_rows($resultMember)) {
                echo "<script>alert('Email đã tồn tại');</script>";
            } else {
                $emailSignup = test_input($_POST['emailSignup']);
                $fnameSignup = test_input($_POST["fnameSignup"]);
                $passwordSignup = test_input($_POST["passwordSignup"]);
                $genderSigup = $_POST['genderSignup'];
                $birthdaySignup = isset($_POST['birthdaySignup']) ? $_POST['birthdaySignup'] : 'NULL';
                $addSignup = isset($_POST["addSignup"]) ? $_POST["addSignup"] : 'NULL';
                $telSignup = test_input($_POST["telSignup"]);
                $addSignup = test_input($_POST["addSignup"]);
                $fnameSignup = standardizedData($fnameSignup);
                $addSignup = standardizedData($addSignup);
                $sqlInsertMember = "INSERT INTO Member(Email,Pass,Name,Phone,Address) VALUES('$emailSignup','$passwordSignup','$fnameSignup','$telSignup','$addSignup')";
                $rs = mysqli_query($con, $sqlInsertMember);
                if ($rs) {
                    echo "<script>alert('Bạn đã đăng ký thành công. Xin mời đăng nhập.');location='?section=login';</script>";
                } else echo "<script>alert('Đăng ký thất bại!');</script>";
            }
        } else echo "<script>alert('Nhập dữ liệu sai!');</script>";
    }

    if (isset($_POST['profile_update'])) {
        $change = validate_change_form($_POST['fnameChange'], $_POST['passwordChange'], $_POST['password2Change'], $_POST['telChange']);
        if ($change) {
            $birthdayChange = isset($_POST['birthdayChange']) ? $_POST['birthdayChange'] : 'NULL';
            $addChange = isset($_POST['addChange']) ? $_POST['addChange'] : 'NULL';
            $genderChange = (int) $_POST['genderChange'];
            $fnameChange = test_input($_POST["fnameChange"]);
            $passwordChange = test_input($_POST["passwordChange"]);
            $telChange = test_input($_POST["telChange"]);
            $addChange = test_input($_POST["addChange"]);
            $fnameChange = standardizedData($fnameChange);
            $addChange = standardizedData($addChange);
            $sqlUpdateMember = "UPDATE Member SET Pass='$passwordChange',Name='$nameChange',Birthday='$bithdayChange',Gender=$genderChange,Phone= '$telChange', Address = '$addChange' WHERE MemberId = " . $_SESSION['memberId'];
            $rs = mysqli_query($con, $sqlUpdateMember);
            if ($rs) {
                echo "<script>alert('Cập nhật thông tin thành công!');location='index.php?section=profile';</script>";
            } else echo "<script>alert('Cập nhật thông tin thất bại!');</script>";
        }
    }
}

function test_input($input)
{
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
};

function standardizedData($data)
{
    while (strpos($data, '  ')) {
        $data = str_replace('  ', ' ', $data);
    }
    return $data;
}

function validate_email($email)
{
    if (empty($email)) {
        echo "<script>alert('Email is required');</script>";
        return false;
    } else {
        $email_ok = test_input($email);
        if (!filter_var($email_ok, FILTER_VALIDATE_EMAIL)) {
            echo "<script>alert('Invalid email format');</script>";
            return false;
        } else
            return true;
    }
}

function validate_name($name)
{
    if (empty($name)) {
        echo "<script>alert('Name is required');</script>";
        return false;
    } else {
        $name_ok = test_input($name);
        if (!preg_match("/^[a-zA-Z ]*$/", $name_ok)) {
            echo "<script>alert('Invalid name format');</script>";
            return false;
        } else
            return true;
    }
}

function validate_pass($pass)
{
    if (empty($pass)) {
        echo "<script>alert('Password is required');</script>";
        return false;
    } else {
        $pass_ok = test_input($pass);
        if (!preg_match("/^.+$/", $pass_ok)) {
            echo "<script>alert('Invalid password format');</script>";
            return false;
        } else
            return true;
    }
}


function validate_repass($pass, $repass)
{
    if (empty($repass)) {
        echo "<script>alert('Password is retype');</script>";
        return false;
    } else {
        $repass_ok = test_input($repass);
        if ($repass_ok != $pass) {
            echo "<script>alert('Retype password incorrect.');</script>";
            return false;
        } else
            return true;
    }
}

function validate_tel($tel)
{
    if (empty($tel)) {
        echo "<script>alert('Telephone number is required');</script>";
        return false;
    } else {
        $tel_ok = test_input($tel);
        if (!preg_match("/^\d{10}$/", $tel_ok)) {
            echo "<script>alert('Invalid Telephone number format');</script>";
            return false;
        } else
            return true;
    }
}

function validate_signup_form($email, $name, $pass, $repass, $tel)
{
    $test_email = validate_email($email);
    $test_name = validate_name($name);
    $test_pass = validate_pass($pass);
    $test_repass = validate_repass($pass, $repass);
    $test_tel = validate_tel($tel);
    if ($test_email && $test_name && $test_pass && $test_repass && $test_tel) return true;
    else return false;
}

function validate_change_form($name, $pass, $repass, $tel)
{
    $test_name = validate_name($name);
    $test_pass = validate_pass($pass);
    $test_repass = validate_repass($pass, $repass);
    $test_tel = validate_tel($tel);
    if ($test_name && $test_pass && $test_repass && $test_tel) return true;
    else return false;
}
