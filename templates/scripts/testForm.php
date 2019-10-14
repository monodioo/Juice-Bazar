<?php
$emailSignup = $fnameSignup = $passwordSignup = $password2Signup = $telSignup = '';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (isset($_POST["loginBtn"])) {
            if (empty($_POST["emailLogin"]) || empty($_POST["passwordLogin"])) {
                echo "<script>alert('Email and Password is required!');loginForm.emailLogin.focus();</script>";
            }
            else {
                $sqlMember = "SELECT * FROM Member WHERE Email = '".$_POST["emailLogin"]."' AND Pass = '".$_POST["passwordLogin"]."'";
                $resultMember = mysqli_query($con,$sqlMember);
                if (mysqli_num_rows($resultMember)) {
                    $rowMember = mysqli_fetch_array($resultMember);
                    if ($rowMember['Status'] == '0') {
                        echo "<script>alert('Tài khoản của bạn đã bị khóa. Vui lòng liên hệ với bộ phận quản trị.');</script>";
                    }
                    else {
                        $_SESSION["nameMember"] = $rowMember['Name'];
                        $_SESSION["memberId"] = $rowMember["MemberId"];
                        if (isset($_POST['rememberCheckLogin'])) {
                            setcookie('emailLogin',$_POST['emailLogin'],time()+(86400*30),'/','',0,0);
                            setcookie('passwordLogin',$_POST['passwordLogin'],time()+(86400*30),'/','',0,0);
                        }
                        echo "<script>alert('Đăng nhập thành công!');</script>";
                        echo "<script>location='?'</script>";
                    }
                }
                else {
                    echo "<script>alert('Email and Password is incorrect!'); onload()=function(){loginForm.emailLogin.focus();}</script>";
                }
            }
        }

        if (isset($_POST["signupBtn"])) {
            $signup = validation();
            if ($signup) {
                $sqlMember = "SELECT * FROM Member WHERE Email = '".$_POST["emailSignup"]."'";
                $resultMember = mysqli_query($con,$sqlMember);
                if (mysqli_num_rows($resultMember)) {
                    echo "<script>alert('Email đã tồn tại');</script>";
                }
                else {
                    $emailSignup = test_input($_POST['emailSignup']);
                    $fnameSignup = test_input($_POST["fnameSignup"]);
                    $passwordSignup = test_input($_POST["passwordSignup"]);
                    $telSignup = test_input($_POST["telSignup"]);
                    $addSignup = test_input($_POST["addSignup"]);
                    $fnameSignup = standardizedData($fnameSignup);
                    $insertMemberSQL = "INSERT INTO Member(Email,Pass,Name,Phone,Address) VALUES('$emailSignup','$passwordSignup','$fnameSignup','$telSignup','$addSignup')";
                    if (mysqli_query($con,$insertMemberSQL)) {
                        echo "<script>alert('Bạn đã đăng ký thành công!');</script>";
                        
                    }
                    else echo "<script>alert('Đăng ký thất bại!');</script>";
                }
            }
        }
    }

    function test_input($input) {
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);
        return $input;
    };

    function standardizedData($data) {
        while(strpos($data,'  ')) {
            $data = str_replace('  ',' ',$data);
        }
        return $data;
    }

    function validation() {
        if (empty($_POST['emailSignup'])) {
            echo "<script>alert('Email is required');</script>";
            return false;
        }
        else {
            $emailSignup = test_input($_POST['emailSignup']);
            if (!filter_var($emailSignup, FILTER_VALIDATE_EMAIL)) {
                echo "<script>alert('Invalid email format');</script>";
                return false;
            }
        }

        if (empty($_POST["fnameSignup"])) {
            echo "<script>alert('Name is required');</script>";
            return false;
        }
        else {
            $fnameSignup = test_input($_POST["fnameSignup"]);
            if (!preg_match("/^[a-zA-Z ]*$/",$fnameSignup)) {
                echo "<script>alert('Invalid name format');</script>";
                return false;
            }
        }

        if (empty($_POST["passwordSignup"])) {
            echo "<script>alert('Password is required');</script>";
            return false;
        }
        else {
            $passwordSignup = test_input($_POST["passwordSignup"]);
            if (!preg_match("/^.+$/",$passwordSignup)) {
                echo "<script>alert('Invalid password format');</script>";
                return false;
            }
        }

        if (empty($_POST["password2Signup"])) {
            echo "<script>alert('Password is retype');</script>";
            return false;
        }
        else {
            $password2Signup = test_input($_POST["password2Signup"]);
            if ($password2Signup != $passwordSignup) {
                echo "<script>alert('Retype password incorrect.');</script>";
                return false;
            }
        }

        if (empty($_POST["telSignup"])) {
            echo "<script>alert('Telephone number is required');</script>";
            return false;
        }
        else {
            $telSignup = test_input($_POST["telSignup"]);
            if (!preg_match("/^\d{10}$/",$telSignup)) {
                echo "<script>alert('Invalid Telephone number format');</script>";
                return false;
            }
        }
        return true;
    }
?>