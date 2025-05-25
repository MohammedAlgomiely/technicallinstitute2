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
            width: 40%;
            display:inline;
        }
        b{
            margin-right:-15%;
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
            margin-top: 5px;
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
        <h2>إنشاء حساب</h2>
        <form id="loginForm" action="" method="post">
            <div class="form-group">
                <label>اسم المستخدم</label>
                <div class="input-icon">
                    <i class="fas fa-user"></i>
                    <input name="user_name" type="text" id="username" placeholder="أدخل اسم المستخدم" required>
                </div>
                <span class="error-message" id="usernameError"></span>
            </div>
            
            <div class="form-group">
                <label>البريد الإلكتروني</label>
                <div class="input-icon">
                    <i class="fas fa-envelope"></i>
                    <input name="user_email" type="email" id="useremail" placeholder="أدخل البريد الإلكتروني" required>
                </div>
                <span class="error-message" id="emailError"></span>
                <span class="error-message" id="emailError2"></span>
            </div>

            <div class="form-group">
                <label>كلمة المرور</label>
                <div class="input-icon">
                    <i class="fas fa-lock"></i>
                    <input name="user_password" type="password" id="password" placeholder="أدخل كلمة المرور" required>
                    <i class="fas fa-eye-slash" id="togglePassword" style="left: auto; right: 15px; cursor: pointer;"></i>
                </div>
                 <label style="display:none;" class="rolelabel">الصلاحية</label>
                 <!--<input name="userRole" class="role" type="radio" value="طالب"><b>طالب</b>-->
                    <select style="display:none;" name="user_role">
                        <option>طالب</option>
                    </select>
                <span class="error-message" id="passwordError"></span>
            </div>

            <button type="submit">إنشاء حساب</button>
        </form>

        <div class="links">
            <a href="login_page.php">تسجيل دخول</a>
        </div>
    </div>

    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require 'config.php';
    // استقبال البيانات
    $user_name = mysqli_real_escape_string($conn, $_POST["user_name"]);
    $user_role = mysqli_real_escape_string($conn, $_POST["user_role"]);
    $user_email = mysqli_real_escape_string($conn, $_POST["user_email"]);
    $user_password = $_POST["user_password"];

    //التحقق من صحة البريد الإلكتروني
    if(!filter_var($user_email , FILTER_VALIDATE_EMAIL)){
    //$_SESSION['registration_errors'] = ["بريد إلكتروني غير صالح"];
    echo "<script>const emailError2 = document.getElementById('emailError2');
        emailError2.style.display = 'block';
        emailError2.innerHTML = 'يرجى ادخال البريد الإلكتروني بشكل صحيح'; 
        const emailInput2 = document.getElementById('useremail');
        emailInput2.addEventListener('focus', function(){
          emailError2.style.display = 'none';
        });
        const usernameInput = document.getElementById('username');
        usernameInput.addEventListener('focus', function(){
          emailError2.style.display = 'none';
        });
        const passwoedInput = document.getElementById('password');
        passwoedInput.addEventListener('focus', function(){
          emailError2.style.display = 'none';
        });
        </script>" ;
    //echo '<script> window.location.href = "registration_page.php"; </script>';
    exit();
    }
    //التحقق من قوة كلمة المرور
    if(strlen($user_password)<8){
    //$_SESSION['registration_errors'] = ["كلمة المرور يجب أن تحتوي على 8 أحرف على الأقل"];
    echo "<script>const passwordError = document.getElementById('passwordError');
                  passwordError.style.display = 'block';
                  passwordError.innerHTML = 'كلمة المرور يجب أن تحتوي على 8 أحرف على الأقل'; 
                  const passwordInput = document.getElementById('password');
                  passwordInput.addEventListener('focus', function(){
                    passwordError.style.display = 'none';
                  });
                  const emailInput = document.getElementById('useremail');
                  emailInput.addEventListener('focus', function(){
                    passwordError.style.display = 'none';
                  });
                  const usernameInput = document.getElementById('username');
                  usernameInput.addEventListener('focus', function(){
                    passwordError.style.display = 'none';
                  });
                  </script>" ;
    //echo '<script> window.location.href = "registration_page.php"; </script>';
    exit();
    }

    // التحقق من وجود المستخدم
    $check_sql = "SELECT user_id FROM users WHERE user_name = ?";
    $stmts = $conn->prepare($check_sql);
    $stmts->bind_param("s", $user_name);
    $stmts->execute();
    $result = $stmts->get_result();

    if ($result->num_rows > 0) {
        echo "<script>const usernameError = document.getElementById('usernameError');
        usernameError.style.display = 'block';
        usernameError.innerHTML = 'اسم المستخدم مستخدم حالياً في حساب اخر'; 
        const usernameInput = document.getElementById('username');
        usernameInput.addEventListener('focus', function(){
          usernameError.style.display = 'none';
        });
        const emailInput = document.getElementById('useremail');
        emailInput.addEventListener('focus', function(){
          usernameError.style.display = 'none';
        });
        const passwordInput = document.getElementById('password');
        passwordInput.addEventListener('focus', function(){
          usernameError.style.display = 'none';
        });
        </script>" ;
    /*echo '<script>
        window.location.href = "registration_page.php";
    </script>';*/
    exit();
    }

    $check_sqls = "SELECT user_id FROM users WHERE user_email = ?";
    $stmts = $conn->prepare($check_sqls);
    $stmts->bind_param("s", $user_email);
    $stmts->execute();
    $results = $stmts->get_result();

    if ($results->num_rows > 0) {
        echo "<script>const emailError = document.getElementById('emailError');
        emailError.style.display = 'block';
        emailError.innerHTML = 'البريد الإلكتروني مستخدم حالياً في حساب اخر'; 
        const emailInput = document.getElementById('useremail');
        emailInput.addEventListener('focus', function(){
          emailError.style.display = 'none';
        });
        const usernameInput = document.getElementById('username');
        usernameInput.addEventListener('focus', function(){
          emailError.style.display = 'none';
        });
        const passwordInput = document.getElementById('password');
        passwordInput.addEventListener('focus', function(){
          emailError.style.display = 'none';
        });
        </script>" ;
    /*echo '<script>
        window.location.href = "registration_page.php";
    </script>';*/
    exit();
    }

    // إذا لم يكن المستخدم موجوداً - المتابعة في التسجيل
    $hashed_password = password_hash($user_password, PASSWORD_DEFAULT);

    $insert_sql = "INSERT INTO users (user_name, user_password, user_email, user_role) VALUES (?, ?, ?, ?)";
    $stmts = $conn->prepare($insert_sql);
    $stmts->bind_param("sssi", $user_name, $hashed_password, $user_email, $user_role);
    


    if ($stmts->execute()) {
    //$_SESSION['registration_success'] = true;
    echo '<script>
        alert("تم إضافة المستخدم بنجاح");
    </script>';
    echo '<script>
        window.location.href = "login_page.php";
    </script>';
    } else {
    //$_SESSION['registration_errors'] = ["حدث خطأ أثناء التسجيل" . $conn->error];
    /*echo '<script>
        alert("خطأ في إضافة المستخدم: ' . addslashes($conn->error) . '");
    </script>';*/
    echo '<script>
        window.location.href = "registration_page.php";
    </script>';
    }

    //$stmt->close();
    //$conn->close();
}
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
});/*

       // التحقق من صحة النموذج
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const username = document.getElementById('username');
            const password = document.getElementById('password');
            const email = document.getElementById('useremail');
            let isValid = true;

            // التحقق من اسم المستخدم
            if (username.value.trim() === '') {
                document.getElementById('usernameError').style.display = 'block';
                isValid = false;
            } else {
                document.getElementById('usernameError').style.display = 'none';
            }

            // التحقق من كلمة المرور
            if (password.value.trim() === '') {
                document.getElementById('passwordError').style.display = 'block';
                isValid = false;
            } else {
                document.getElementById('passwordError').style.display = 'none';
            }

            // التحقق من البريد الإلكتروني
            if (email.value.trim() === '') {
                document.getElementById('useremailError').style.display = 'block';
                isValid = false;
            } else {
                document.getElementById('useremailError').style.display = 'none';
            }
            // إذا كانت البيانات صحيحة
            /*if (isValid) {
                // هنا يمكنك إضافة كود الإرسال إلى الخادم
                this.reset();
            }*/
        /*});
        /*document.getElementById('userName').addEventListener('blur',function(){
            const username = this.value;
            fetch('check_username.php?username=' + encodeURIComponent(username)).then(response => response.json()).then(data => {
                if(date.exists){
                    alert('اسم المستخدم موجود مسبقاً');
                    this.value = '';
                }
            });
        });*/
    </script>
</body>
</html>