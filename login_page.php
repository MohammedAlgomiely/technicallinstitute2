<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول - المعهد التقني التجاري</title>
    <!-- خطوط جوجل للعربية -->
    <!--<link href="https://fonts.googleapis.com/css2?family=Tajawal&display=swap" rel="stylesheet">-->
    <!-- أيقونات Font Awesome -->
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">-->
    <link rel="stylesheet" href="fontawesome-free-6.6.0-web/css/all.min.css">
    <script src="jquery-3.4.1.js"></script>
    <style>
    @font-face {
    font-family: 'Tajawal';
    src: url('Tajawal_font/Tajawal-Regular.ttf') format('truetype');
    font-weight: normal;
    font-style: normal;
    font-display: swap;
}
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Tajawal', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-container {
            background: rgba(255, 255, 255, 0.95);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            width: 400px;
        }

        .logo {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo img {
            width: 100px;
        }

        h2 {
            text-align: center;
            color: #1e3c72;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
            font-weight: bold;
        }
        .rolelabel{
            margin-top: 15px;
        }

        .input-icon {
            position: relative;
        }

        .input-icon i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #666;
        }

        input,select {
            width: 100%;
            padding: 12px 40px;
            border: 2px solid #ddd;
            border-radius: 8px;
            /*font-size: 16px;*/
            transition: border-color 0.3s;
        }
        .role{
            width: 30%;
            display:inline;
        }
        b{
            margin-right:-10%;
        }

        input:focus {
            outline: none;
            border-color: #1e3c72;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #1e3c72;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            transition: background 0.3s;
        }

        button:hover {
            background: #2a5298;
        }

        .links {
            text-align: center;
            margin-top: 20px;
        }

        .links a {
            color: #1e3c72;
            text-decoration: none;
            font-size: 14px;
            transition: color 0.3s;
        }

        .links a:hover {
            color: /*#2a5298*/ purple ;
        }

        .error-message {
            color: #ff4444;
            font-size: 14px;
            margin-top: 15px;
            display: none;
        }

        /* تصميم متجاوب */
        @media (max-width: 480px) {
            .login-container {
                width: 90%;
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="logo">
            <img src="images/institute2.png" alt="شعار المعهد">
        </div>
        <h2>تسجيل الدخول</h2>
        <form role="form" id="loginForm" action="" method="post">
            <div class="form-group">
                <label>اسم المستخدم</label>
                <div class="input-icon">
                    <i class="fas fa-user"></i>
                    <input name="username" type="text" required id="username" placeholder="أدخل اسم المستخدم أو البريد الإلكتروني">
                </div>
                <span class="error-message" id="usernameError">يرجى إدخال اسم المستخدم</span>
                <span class="error-message" id="usernameError2"></span>
            </div>

            <div class="form-group">
                <label>كلمة المرور</label>
                <div class="input-icon">
                    <i class="fas fa-lock"></i>
                    <input required name="password" type="password" id="password" placeholder="أدخل كلمة المرور">
                    <i class="fas fa-eye-slash" id="togglePassword" style="left: auto; right: 15px; cursor: pointer;"></i>
                </div>
                <span class="error-message" id="passwordError">يرجى إدخال كلمة المرور</span>
                <span class="error-message" id="passwordError2"></span>
            </div>

            <button type="submit" name="submit">تسجيل الدخول</button>
        </form>

        <div class="links">
            <a href="rest_userPassword.php">نسيت كلمة المرور؟</a>
            <br>
            <a href="registration_page.php">إنشاء حساب جديد</a>
        </div>
    </div>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        require 'config.php'; // ملف يحتوي على اتصال قاعدة البيانات
    
        $username = trim($_POST["username"]);
        $useremail = trim($_POST["username"]);
        $password = trim($_POST["password"]);
        
        // تحقق من القيم الفارغة
        if(empty($username) || empty($password) || empty($useremail)) {
            die("يرجى إدخال اسم المستخدم وكلمة المرور");
        }
    
        $stmt = $conn->prepare("SELECT user_id, user_name, user_password, user_email, user_role FROM users WHERE user_name = ? or user_email = ?");
        $stmt->bind_param("ss", $username, $useremail);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();
            
            // تحقق من كلمة المرور بطريقتين (للأمان)
            if (password_verify($password, $user["user_password"])) {
                // تسجيل الدخول الناجح
                $_SESSION["user_id"] = $user["user_id"];
                $_SESSION["username"] = $user["user_name"];
                $_SESSION["user_role"] = $user["user_role"];
                $_SESSION["useremail"] = $user["user_email"];
                
                  switch($user["user_role"]) {
                    case "0":
                        $_SESSION["username"] = $user["user_name"];
                        echo "<script>windows: location='application.php'</script>";
                        break;
                    case "1":
                        echo "<script>windows: location='admin.php'</script>";
                        break;
                    default:
                        echo "<script>alert('صلاحية غير معروفة')</script>";
                }
                exit();
            } else {
                // إذا فشل التحقق، جرب التحقق بدون تشفير (للأغراض الاختبارية فقط)
                if ($password === $user["user_password"]) {
                    echo "<script>alert('كلمة المرور صحيحة ولكن غير مشفرة! يجب تشفير كلمات المرور في قاعدة البيانات')</script>" ;
                } else {
                    //$passwordError = 'كلمة المرور غير صحيحة. تأكد من كتابتها بشكل صحيح';
                    echo "<script>const passwordError2 = document.getElementById('passwordError2');
                      passwordError2.style.display = 'block';
                      passwordError2.innerHTML = 'كلمة المرور غير صحيحة. تأكد من كتابتها بشكل صحيح'; 
                      const passwordInput = document.getElementById('password');
                      passwordInput.addEventListener('input', function(){
                        passwordError2.style.display = 'none';
                      });
                      </script>" ;
                }
            }
        } else {
            //$usernameError = 'اسم المستخدم غير صحيح . تأكد من كتابته بشكل صحيح';
            echo "<script>const usernameError2 = document.getElementById('usernameError2');
              usernameError2.style.display = 'block';
              usernameError2.innerHTML = 'اسم المستخدم غير صحيح . تأكد من كتابته بشكل صحيح';
              const usernameInput = document.getElementById('username');
              usernameInput.addEventListener('input', function(){
                 usernameError2.style.display = 'none';
              });
            </script>" ;
        }
    }
    /*
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require 'config.php'; // ملف يحتوي على اتصال قاعدة البيانات

    $username = trim($_POST["username"]);
    $useremail = trim($_POST["username"]);
    $password = trim($_POST["password"]);
    
    // تحقق من القيم الفارغة
    if(empty($username) || empty($password) || empty($useremail)) {
        die("يرجى إدخال اسم المستخدم وكلمة المرور");
    }

    $stmt = $conn->prepare("SELECT user_id, user_name, user_password, user_email, user_role FROM users WHERE user_name = ? or user_email = ?");
    $stmt->bind_param("ss", $username, $useremail);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['user_id'];
            //header("Location:application.php");
            echo "<script>windows: location='application.php'</script>";
            exit;
        } else {
            //echo "❌ كلمة المرور خاطئة.";
            echo "<script>const passwordError2 = document.getElementById('usernameError2');
          passwordError2.style.display = 'block';
          passwordError2.innerHTML = '❌ كلمة المرور خاطئة.';
          const usernameInput = document.getElementById('username');
          usernameInput.addEventListener('input', function(){
             passwordError2.style.display = 'none';
          });
        </script>";
        }
    } else {
        echo "❌ البريد غير مسجل.";
    }
       

        //$_SESSION['user_id'] = $userID;
        
        // تحقق من كلمة المرور بطريقتين (للأمان)
        if (password_verify($password, $user["user_password"])) {
            // تسجيل الدخول الناجح
            $_SESSION["user_id"] = $user["user_id"];
            $_SESSION["username"] = $user["user_name"];
            $_SESSION["user_role"] = $user["user_role"];
            $_SESSION["useremail"] = $user["user_email"];
             
              switch($user["user_role"]) {
                case "0":
                    $_SESSION["username"] = $user["user_name"];
                    echo "<script>windows: location='application.php'</script>";
                    break;
                case "1":
                    echo "<script>windows: location='admin.php'</script>";
                    break;
                default:
                    echo "<script>alert('صلاحية غير معروفة')</script>";
            }
            exit();
        } else {
            // إذا فشل التحقق، جرب التحقق بدون تشفير (للأغراض الاختبارية فقط)
            if ($password === $user["user_password"]) {
                echo "<script>alert('كلمة المرور صحيحة ولكن غير مشفرة! يجب تشفير كلمات المرور في قاعدة البيانات')</script>" ;
            } else {
                //$passwordError = 'كلمة المرور غير صحيحة. تأكد من كتابتها بشكل صحيح';
                echo "<script>const passwordError2 = document.getElementById('passwordError2');
                  passwordError2.style.display = 'block';
                  passwordError2.innerHTML = 'كلمة المرور غير صحيحة. تأكد من كتابتها بشكل صحيح'; 
                  const passwordInput = document.getElementById('password');
                  passwordInput.addEventListener('input', function(){
                    passwordError2.style.display = 'none';
                  });
                  </script>" ;
            }
        }
    } else {
        //$usernameError = 'اسم المستخدم غير صحيح . تأكد من كتابته بشكل صحيح';
        /*echo "<script>const usernameError2 = document.getElementById('usernameError2');
          usernameError2.style.display = 'block';
          usernameError2.innerHTML = 'اسم المستخدم غير صحيح . تأكد من كتابته بشكل صحيح';
          const usernameInput = document.getElementById('username');
          usernameInput.addEventListener('input', function(){
             usernameError2.style.display = 'none';
          });
        </script>" ;*/
    //}

?>
    <script>
        // عرض/إخفاء كلمة المرور
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');

        togglePassword.addEventListener('click', function () {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.classList.toggle('fa-eye-slash');
            this.classList.toggle('fa-eye');
        });

       $(function (){
    'use strict';
    $('[placeholder]').focus(function (){
        $(this).attr('data-text' , $(this).attr('placeholder'));
        $(this).attr('placeholder' , '');
    }).blur(function (){
        $(this).attr('placeholder' , $(this).attr('data-text'));
    });
});
        // التحقق من صحة النموذج
       /*
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const username = document.getElementById('username');
            const password = document.getElementById('password');
            let isValid = true;*/

            // التحقق من اسم المستخدم
            /*
            if (username.value.trim() === '') {
                document.getElementById('usernameError').style.display = 'block';
                isValid = false;
            } else {
                document.getElementById('usernameError').style.display = 'none';
            }

            // التحقق من كلمة المرور
            if (password.value.trim() === '') {
                document.getElementById('roleError').style.display = 'block';
                isValid = false;
            } else {
                document.getElementById('passwordError').style.display = 'none';
            }

            // إذا كانت البيانات صحيحة
            if (isValid) {
                // هنا يمكنك إضافة كود الإرسال إلى الخادم
                this.reset();
            }
        });*/
    </script>
</body>
</html>