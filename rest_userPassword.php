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

        input{
            width: 100%;
            padding: 12px 40px;
            border: 2px solid #ddd;
            border-radius: 8px;
            /*font-size: 16px;*/
            transition: border-color 0.3s;
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
            color: purple;
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
        <h2>تعديل كلمة المرور</h2>
        <form role="form" id="resetForm" action="" method="post">
            <div class="form-group">
                <label>اسم المستخدم</label>
                <div class="input-icon">
                    <i class="fas fa-user"></i>
                    <input name="username" type="text" required id="username" placeholder="أدخل اسم المستخدم">
                </div>
                <span class="error-message" id="usernameError"></span>
            </div>

            <div class="form-group">
                <label>كلمة المرور الجديدة</label>
                <div class="input-icon">
                    <i class="fas fa-lock"></i>
                    <input required name="password" type="password" id="password" placeholder="أدخل كلمة المرور">
                    <i class="fas fa-eye-slash" id="togglePassword" style="left: auto; right: 15px; cursor: pointer;"></i>
                </div>
            </div>
            
            <div class="form-group">
                <label>تأكيد كلمة المرور الجديدة</label>
                <div class="input-icon">
                    <i class="fas fa-lock"></i>
                    <input required name="newpassword" type="password" id="confirmPassword" placeholder="أدخل كلمة المرور">
                    <i class="fas fa-eye-slash" id="togglePassword" style="left: auto; right: 15px; cursor: pointer;"></i>
                </div>
                <span class="error-message" id="passwordMatchError"></span>
            </div>
            <button class="btn-edit" id="saveEdit" type="submit">تعديل</button>
        </form>

        <div class="links">
            <a href="login_page.php">تسجيل الدخول </a>
        </div>
    </div>
    <?php
    require 'config.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $new_password = $_POST['password'];
        $confirm_password = $_POST['newpassword'];
    
        // التحقق من تطابق كلمة المرور
        if ($new_password !== $confirm_password) {
            //$_SESSION['error'] = "كلمات المرور غير متطابقة";
            //header("Location: rest_userPassword.php");
            echo "<script>const passwordMatchError = document.getElementById('passwordMatchError');
            passwordMatchError.style.display = 'block';
            passwordMatchError.innerHTML = 'كلمات المرور غير متطابقتان'; 
            const confirmPasswordInput = document.getElementById('confirmPassword');
            confirmPasswordInput.addEventListener('focus', function(){
             passwordMatchError.style.display = 'none';
            });
            const usernameInput = document.getElementById('username');
            usernameInput.addEventListener('focus', function(){
             passwordMatchError.style.display = 'none';
            });
            const passwordInput = document.getElementById('password');
            passwordInput.addEventListener('focus', function(){
             passwordMatchError.style.display = 'none';
            });
            </script>" ;
            exit();
        }
    
        // البحث عن المستخدم
        $stmt = $conn->prepare("SELECT user_id FROM users WHERE user_name = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows == 1) {
            // تحديث كلمة المرور
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
            $update = $conn->prepare("UPDATE users SET user_password = ? WHERE user_name = ?");
            $update->bind_param("ss", $hashed_password, $username);
            
            if ($update->execute()) {
                $_SESSION['success'] = "<script>alert('تم تحديث كلمة المرور بنجاح')</script>";
                echo "<script>alert('تم تحديث كلمة المرور بنجاح')</script>";
                //header("Location: login_page.php");
                echo "<script>windows: location='login_page.php'</script>";
            } else {
                $_SESSION['error'] = "<script>alert('حدث خطأ أثناء تحديث كلمة المرور')</script>";
                echo "<script>alert('حدث خطأ أثناء تحديث كلمة المرور')</script>";
                //header("Location: rest_userPassword.php");
                echo "<script>windows: location='rest_userPassword.php'</script>";
            }
        } else {
            //$_SESSION['error'] = "<script>alert('اسم المستخدم غير صحيح')</script>";
            //echo "<script>alert('اسم المستخدم غير صحيح')</script>";
            //header("Location: rest_userPassword.php");
            echo "<script>const usernameError = document.getElementById('usernameError');
            usernameError.style.display = 'block';
            usernameError.innerHTML = 'اسم المستخدم خاطئ'; 
            const confirmPasswordInput = document.getElementById('confirmPassword');
            confirmPasswordInput.addEventListener('focus', function(){
             usernameError.style.display = 'none';
            });
            const usernameInput = document.getElementById('username');
            usernameInput.addEventListener('focus', function(){
             usernameError.style.display = 'none';
            });
            const passwordInput = document.getElementById('password');
            passwordInput.addEventListener('focus', function(){
             usernameError.style.display = 'none';
            });
            </script>" ;
            exit();
        }
        
        $conn->close();
    }
    ?>
    <script>
// عرض/إخفاء كلمة المرور
document.querySelectorAll('#togglePassword').forEach(icon => {
    icon.addEventListener('click', function() {
        const input = this.previousElementSibling;
        const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
        input.setAttribute('type', type);
        this.classList.toggle('fa-eye-slash');
        this.classList.toggle('fa-eye');
    });
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
// التحقق من تطابق كلمة المرور
/*document.getElementById('resetForm').addEventListener('submit', function(e) {
    const newPassword = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirmPassword').value;
    const errorElement = document.getElementById('passwordMatchError');
    
    if (newPassword !== confirmPassword) {
        e.preventDefault();
        errorElement.style.display = 'block';
    } else {
        errorElement.style.display = 'none';
    }
});*/
    </script>
</body>
</html>