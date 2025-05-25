<?php
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");
session_start();
/*if ($_SERVER["REQUEST_METHOD"] == "POST") 
{*/
    $userID=$_SESSION['user_id'] ;
     require 'config.php';
     // استقبال البيانات  من النموذج
 
     $cardId = $_POST['cardType'] ?? '';//رقم البطاقة
     $qulificID = $_POST['qualificationType'] ?? '';//رقم المؤهل
     $errors [] = '' ?? '';
/****************************جدول ادخال البيانات الى جدول الطلاب ******/
    if(isset($_POST['submit']))
    {
        $stuName=mysqli_real_escape_string($conn,$_POST['first-name']);
        $placebirth=mysqli_real_escape_string($conn,$_POST['placebirth']);
        $birthdate=trim($_POST['birthdate']);
        $address=mysqli_real_escape_string($conn,$_POST['address']);
        $city=mysqli_real_escape_string($conn,$_POST['city']);
        $directorate=mysqli_real_escape_string($conn,$_POST['directorate']);
        $village=mysqli_real_escape_string($conn,$_POST['village']);
        $states=mysqli_real_escape_string($conn,$_POST['state']);
        $phone=trim($_POST['phone']);
        $gender=mysqli_real_escape_string($conn,$_POST['gender']);
        $number_card=trim($_POST['number_card']);
        $date_issu=trim($_POST['date_issu']);
        $name_issu=mysqli_real_escape_string($conn,$_POST['name_issu']);
        $qualificationType=mysqli_real_escape_string($conn,$_POST['qualificationType']);
        $datequalification=trim($_POST['date']);
        $choose1=(int)$_POST['choose_first'];/* يستقبل رقم لذلك احتاج احولها الى رقم*/
        $choose2=(int)$_POST['choose_second'];
        //شرط قبول الاسم
        if((!preg_match("/^[أ-ي]{3,50}$/u",  $stuName)) || empty($stuName)){
            $errors []="يجب ان يحتوي الاسم على احرف عربية والا يكون فارغا";
        }
    //  شرط قبول محل الميلاد
        elseif((!preg_match("/^[أ-ي]{3,50}$/u", $placebirth)) || empty( $placebirth)){
            $errors []="يجب ان يحتوي الاسم على احرف عربية والا يكون فارغا";
        }
    //شرط قبول تاريخ الميلاد
         $year= substr( $birthdate, 0, 4) ?? '';
         if ($year>=1990) {
             $errors[] = "تاريخ الميلاد يجب أن يكون اكبر او يساوي 1990 .";
         }
//شرط قبول المدينة
        elseif((!preg_match("/^[أ-ي]{3,50}$/u", $city)) || empty( $city)){
            $errors[]="يجب ان يحتوي الاسم على احرف عربية والا يكون فارغا";
        }
//5.المديرية
        elseif((!preg_match("/^[أ-ي]{3,50}$/u", $directorate)) || empty( $directorate)){
            $errors[]="يجب ان يحتوي الاسم على احرف عربية والا يكون فارغا";
        }
//6.القرية
        elseif ((!preg_match("/^[أ-ي]{3,50}$/u",  $village)) || empty(  $village)){
             $errors[]="يجب ان يحتوي الاسم على احرف عربية والا يكون فارغا";
         }
//7.نوع الهوية
        elseif(empty($cardId)){
            $errors[]="يجب ان يتم الاختيار"; 
        }
//8.الرقم الوطني
        elseif (!preg_match("/^[0-9]{1,11}$/", $number_card)) {
            $errors[] = "الرقم الوطني يجب أن يحتوي على 11 رقم بالضبط.";
        }
//9.تاريخ اصدار البطاقة
        $year=(int)substr( $date_issu, 0, 4);
        if ($year >= 2010 || $year <2035)
            $errors[] = "تاريخ اصدار البطاقة  يجب أن يكون بين 2010 و2035.";
        //10.جهة الاصدار
        elseif((!preg_match("/^[أ-ي]{3,50}$/u",$name_issu)) || empty($name_issu)){
            $errors[]="يجب ان يحتوي الاسم على احرف عربية والا يكون فارغا";
        }
       //11.الحالة الاجتماعية
       elseif(empty($states)){
            $errors[]="يجب ان يتم الاختيار"; 
        }
//12.المؤهل
       elseif(empty($qualificationType)){
            $errors[]="يجب ان يتم الاختيار"; 
        }
//13.تاريخ الحصول على المؤهل
       $year=(int)substr($datequalification, 0, 4);
       if ($year >= 2010 || $year <= 2022) {
           $errors[] = "تاريخ اصدار البطاقة  يجب أن يكون بين 2010 و2023.";
       }
//14.رقم الهاتف
       elseif((!preg_match("/^\+967(77|73|71)\d{7}$/",$phone)) || empty($phone)){
           $errors[]="يجب ان يكون الرقم يبدأ 73 او 77 او 71  , ولا يقل الرقم عن 9 ارقام";
       }
//15.النوع
       elseif(empty($gender)){
            $errors[]="يجب ان يتم الاختيار"; 
        }
//16.الرغبة الاولى
       elseif(empty($choose_first)){
            $errors[]="يجب ان يتم الاختيار"; 
        }
//17.الرغبة الثانية
       elseif(empty($choose_second)){
           $errors[]="يجب ان يتم الاختيار"; 
       }


/******************************************************* كود ادخال بيانات الطالب لقاعدة البيانات************************/
       if (isset($_FILES['picture_student']) && $_FILES['picture_student']['error'] === 0) {
        $studentImage=$_FILES['picture_student'];
        $name3=uniqid(). '_' .basename($studentImage['name']);
        move_uploaded_file($studentImage['tmp_name'], "uploads/" .$name3);
        } else {
            $errors [] = "❌ لم يتم رفع الصورة بشكل صحيح.";
        }
        $stmt3=$conn->prepare("INSERT INTO student(stu_name,place_birthday,date_birthday,city,director,village,phone,gender,statue,picture_student,addres,user_id) VALUE (?,?,?,?,?,?,?,?,?,?,?,?)");
        $stmt3->bind_param("sssssssssssi",$stuName ,$placebirth, $birthdate,$city,$directorate, $village,$phone,$gender, $states,$name3,$address,$userID);
        if($stmt3->execute())
        {    global  $stuID;
            $stuID = $stmt3->insert_id;  //حقل رقم البطاقة الذي انشاتها في قاعدة البيانات
            //echo "تم ادخال بيانات البطاقة بنجاح";
            echo "
            <script>
            const applicationForm = document.getElementById('application-form');
        const formSuccess = document.getElementById('form-success');
        
        applicationForm.addEventListener('submit', (e) => {
            e.preventDefault();
            
            // Simulate form submission (in a real app, this would send data to a server)
            setTimeout(() => {
                applicationForm.classList.add('hidden');
                formSuccess.classList.remove('hidden');
                formSuccess.scrollIntoView({ behavior: 'smooth' });
            }, 1000);
        });
            </script>
            ";
        }
        else{
            $errors [] = " حدث خطأ في ادخال بيانات الطالب";
        
            }
/****************************كود ادخال بيانات البطاقة لقاعدة البيانات ********************/
       
        if (isset($_FILES['picture_card']) && $_FILES['picture_card']['error'] === 0) {
        $cardImage=$_FILES['picture_card'];
        $name = uniqid(). '_' .basename($cardImage['name']);
        move_uploaded_file($cardImage['tmp_name'], "uploads/" . $name);
        } else {
            $errors [] = "❌ لم يتم رفع الصورة بشكل صحيح.";
            }
        if (isset($_FILES['picture2_card']) && $_FILES['picture2_card']['error'] === 0) {
        $cardImage2=$_FILES['picture2_card'];
        $name2 = uniqid(). '_' .basename($cardImage2['name']);
        move_uploaded_file($cardImage2['tmp_name'], "uploads/" . $name2);
        } else {
            $errors [] = "❌ لم يتم رفع الصورة بشكل صحيح.";
            }
        $stmt1=$conn->prepare("INSERT INTO carddetails(number_card,date_issu,name_issu,picture_card,picture2_card,card_id,stu_id) VALUES (?,?,?,?,?,?,?)");//ادخال الى قاعدة البيانات مغلومات البطاقة
        $stmt1->bind_param("issssii",$number_card,$date_issu,$name_issu,$name,$name2,$cardId,$stuID);
        if($stmt1->execute())
        {    global  $carddetailsID;
             $carddetailsID= $stmt1->insert_id;//حقل رقم البطاقة الذي انشاتها في قاعدة البيانات
             //echo "تم ادخال بيانات البطاقة بنجاح";
        }
        else{
            $errors [] = " حدث خطأ في ادخال بيانات البطاقة";
 
            }

    /*******************************كود اخال بيانات المؤهل لقاعدة البيانات*****************************************/
       
        if (isset($_FILES['picture_qulific']) && $_FILES['picture_qulific']['error'] === 0) {
        $qulificImage=$_FILES['picture_qulific'];
        $name2 = uniqid(). '_' .basename($qulificImage['name']);
        move_uploaded_file($qulificImage['tmp_name'], "uploads/" . $name2);
        } else {
            $errors [] = "❌ لم يتم رفع الصورة بشكل صحيح.";
        }
        $stmt2=$conn->prepare("INSERT INTO qualificdetails(date_qualific,picture_qualific,qualific_id,stu_id) VALUES (?,?,?,?)");//ادخال الى قاعدة البيانات مغلومات البطاقة
        $stmt2->bind_param("ssii",$datequalification,$name2,$qulificID,$stuID);
        if($stmt2->execute())
         {    global  $qulificdetailsId;
         $qulificdetailsId= $stmt2->insert_id;//حقل رقم المؤهل الذي انشاتها في قاعدة البيانات
        //echo "تم ادخال بيانات البطاقة بنجاح";
        }
         else
        {
            $errors [] = " حدث خطأ في ادخال بيانات المؤهل";
        }

       /**********************************************************كود ادخال بيانات الطالب لقاعدة البيانات**************************************/
        

    /******************************************************جدول ادخال الاقسام الى جدول القسم ***************************/
        $stmt3=$conn->prepare("INSERT INTO choosedept(choose_first,choose_second,stu_id) VALUE (?,?,?)");
        $stmt3->bind_param("iii",$choose1 ,$choose2, $stuID);
        if($stmt3->execute())
           {    global  $chooseID ;
              $chooseID= $stmt3->insert_id;//حقل رقم البطاقة الذي انشاتها في قاعدة البيانات
               //echo "تم ادخال بيانات القسم بنجاح";
           }
        else
           {
            $errors [] = " حدث خطأ في ادخال بيانات القسم";
           }
     /*****************************************************كود ادخال الى جدول الطلبات بقاعدة البيانات */
     $peding = 'قيد المراجعة';
     $stmt4=$conn->prepare("INSERT INTO orders(stu_id,choose_id,status_order) VALUES (?,?,?)");
     $stmt4->bind_param("iis",$stuID, $chooseID,$peding);
     if($stmt4->execute())
           {    global  $chooseID ;
              $chooseID= $stmt4->insert_id;
               //echo "تم ادخال بيانات القسم بنجاح";
           }
        else
           {
            $errors [] = " حدث خطأ في ادخال بيانات الطلب";
           }
     /************************************************************************************************ */
     
     //header("location:");
     echo "
            <script>
            const applicationForm = document.getElementById('application-form');
        const formSuccess = document.getElementById('form-success');
        
        applicationForm.addEventListener('submit', (e) => {
            e.preventDefault();
            
            // Simulate form submission (in a real app, this would send data to a server)
            setTimeout(() => {
                applicationForm.classList.add('hidden');
                formSuccess.classList.remove('hidden');
                formSuccess.scrollIntoView({ behavior: 'smooth' });
            }, 1000);
        });
            </script>
            ";
      
    }   
   $conn->close();  
//}    
  //session_destroy();
  //session_start();

  
   
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>المعهد التقني التجاري-الحصب - التنسيق والقبول</title>
    <script src="cdn.js"></script>
    <link rel="stylesheet" href="fontawesome-free-6.6.0-web/css/all.min.css">
    <script src="jquery-3.4.1.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#5D5CDE',
                        secondary: '#4F4FC9',
                    },
                },
                fontFamily: {
                    sans: ['Tajawal', 'sans-serif'],
                },
            },
            darkMode: 'class',
        }

        // تحقق من تفضيل وضع الألوان
        if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
            document.documentElement.classList.add('dark');
        }
        window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', event => {
            if (event.matches) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        });
    </script>
    <style>
        @font-face {
    font-family: 'Tajawal';
    src: url('Tajawal_font/Tajawal-Regular.ttf') format('truetype');
    font-weight: normal;
    font-style: normal;
    font-display: swap;
}
        
        * {
            font-family: 'Tajawal', sans-serif;
        }
        
        .slide-in {
            animation: slideIn 0.5s ease-in-out;
        }
        
        @keyframes slideIn {
            from {
                transform: translateY(20px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
        
        .fade-in {
            animation: fadeIn 0.7s ease-in-out;
        }
        
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
        
        ::-webkit-scrollbar {
            width: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        
        .dark ::-webkit-scrollbar-track {
            background: #2d2d2d;
        }
        
        ::-webkit-scrollbar-thumb {
            background: #5D5CDE;
            border-radius: 10px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: #4F4FC9;
        }
    </style>
</head>
<body class="bg-white dark:bg-gray-900 text-gray-800 dark:text-gray-200 transition-colors duration-300">
    <header class="bg-white dark:bg-gray-800 shadow-md transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <image id="logo2" src="images/institute_ins2.jpg" style="height:auto; width:50px; border-radius:50%; margin-left:5px;"></image>
                    </div>
                    <div class="flex-shrink-0">
                        <h2 class="text-xxl font-bold text-primary">المعهد التقني التجاري - الحصب</h2>
                    </div>
                </div>
                <nav class="hidden md:flex space-x-4 space-x-reverse">
                    <a href="main2.php" class="px-3 py-2 rounded-md text-sm font-bold text-gray-700 dark:text-gray-300 hover:text-primary transition-colors duration-300 bg-transparent hover:bg-primary hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">الرئيسية</a>
                    <a href="AvailableDepts.php" class="px-3 py-2 rounded-md text-sm font-bold text-gray-700 dark:text-gray-300 hover:text-primary transition-colors duration-300 bg-transparent hover:bg-primary hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">التخصصات</a>
                    <a href="requirements.php" class="px-3 py-2 rounded-md text-sm font-bold text-gray-700 dark:text-gray-300 hover:text-primary transition-colors duration-300 bg-transparent hover:bg-primary hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">شروط التسجيل والقبول</a>
                    <a href="#application" class="px-3 py-2 rounded-md text-sm font-bold text-gray-700 dark:text-gray-300 hover:text-primary transition-colors duration-300 bg-transparent hover:bg-primary hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">تنسيق</a>
                    <a href="contact.php" class="px-3 py-2 rounded-md text-sm font-bold text-gray-700 dark:text-gray-300 hover:text-primary transition-colors duration-300 bg-transparent hover:bg-primary hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">التواصل</a>
                </nav>
                <div class="flex items-center gap-4">
                    <button id="theme-toggle" class="p-2 rounded-full hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors duration-300">
                        <i class="fas fa-moon dark:hidden"></i>
                        <i class="fas fa-sun hidden dark:block"></i>
                    </button>
                    <div class="-ml-2 md:hidden">
                        <button id="mobile-menu-button" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none transition-colors duration-300">
                            <i class="fas fa-bars"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Mobile Menu -->
        <div id="mobile-menu" class="md:hidden hidden transition-all duration-300 ease-in-out">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="main2.php" class="block px-3 py-2 rounded-md text-base font-bold text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-primary dark:hover:text-primary transition-colors duration-300">الرئيسية</a>
                <a href="AvailableDepts.php" class="block px-3 py-2 rounded-md text-base font-bold text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-primary dark:hover:text-primary transition-colors duration-300">التخصصات</a>
                <a href="requirements.php" class="block px-3 py-2 rounded-md text-base font-bold text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-primary dark:hover:text-primary transition-colors duration-300">شروط التسجيل والقبول</a>
                <a href="#application" class="block px-3 py-2 rounded-md text-base font-bold text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-primary dark:hover:text-primary transition-colors duration-300">تقديم الطلب</a>
                <a href="contact.php" class="block px-3 py-2 rounded-md text-base font-bold text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-primary dark:hover:text-primary transition-colors duration-300">التواصل</a>
            </div>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-12">
        <!-- Application Form Section -->
        <section id="application" class="py-12 border-t border-gray-200 dark:border-gray-700 fade-in">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white">تقديم طلب الالتحاق</h2>
                <p class="mt-2 text-lg text-gray-600 dark:text-gray-400">املأ النموذج التالي للتقديم في المعهد التقني التجاري - الحصب.</p>
            </div>
            
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 md:p-8">
                <form id="application-form" class="space-y-6" method="post"  enctype="multipart/form-data">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            
                        <div class="md:col-span-2 border-b border-gray-200 dark:border-gray-700 pb-4 mb-4">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">المعلومات الشخصية</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="first-name" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-1">الاسم رباعياً مع اللقب</label>
                                    <input type="text" id="first-name" name="first-name"  require class="w-full px-4 py-2 text-base border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:text-white">
                                </div>
                                <div>
                                    <label for="last-name" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-1">محل الميلاد</label>
                                    <input type="text" id="last-name" name="placebirth"   require class="w-full px-4 py-2 text-base border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:text-white">
                                </div>
                                <div>
                                    <label for="birthdate" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-1">تاريخ الميلاد</label>
                                    <input type="date" id="birthdate" name="birthdate"   require class="w-full px-4 py-2 text-base border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:text-white">
                                </div>
                                <div>
                                    <label for="last-name" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-1">ادخل صورتك الشخصية 4*6</label>
                                    <input type="file" id="last-name" name="picture_student"  require class="w-full px-4 py-2 text-base border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:text-white">
                                </div>
                                <div>
                                    <label for="state" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-1">المحافظة</label>
                                    <select id="state" name="city"   require class="w-full px-4 py-2 text-base border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:text-white">
                                        <option value="">اختر المحافظة</option>
                                        <option>تعز</option>
                                        <option>صنعاء</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="last-name" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-1">المديرية</label>
                                    <input type="text" id="last-name" name="directorate"  require class="w-full px-4 py-2 text-base border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:text-white">
                                </div>
                                <div>
                                    <label for="last-name" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-1">القرية</label>
                                    <input type="text" id="last-name" name="village"   require class="w-full px-4 py-2 text-base border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:text-white">
                                </div>
                                <div>
                                    <label for="last-name" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-1">العنوان</label>
                                    <input type="text" id="last-name" name="address"   require class="w-full px-4 py-2 text-base border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:text-white">
                                </div>
                                <div>
                                    <label for="state"   require class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-1">نوع البطاقة</label>
                                    <?php 
                                     require 'config.php';
                                    $sql = "SELECT card_id, card_type FROM cards"; // تأكد من أن الحقول صحيحة
                                    $result =$conn->query($sql);?>
                                    <select id="state" name="cardType"   require class="w-full px-4 py-2 text-base border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:text-white">
                                    <option value="">اختر نوع البطاقة</option>
                                    <?php 
                                         while($row = $result->fetch_assoc()){?>
                                        <option value="<?php echo  $row['card_id'];?>">
                                        <?php echo $row['card_type']; ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div>
                                    <label for="last-name" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-1">رقم البطاقة</label>
                                    <input type="text" id="last-name" name="number_card"   require class="w-full px-4 py-2 text-base border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:text-white">
                                </div>
                                <div>
                                    <label for="last-name" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-1">صورةالبطاقة الأمامية</label>
                                    <input type="file" id="last-name" name="picture_card"   require class="w-full px-4 py-2 text-base border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:text-white">
                                </div>
                                <div>
                                    <label for="first-name" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-1">صورةالبطاقة الخلفية</label>
                                    <input type="file" id="first-name" name="picture2_card"   require class="w-full px-4 py-2 text-base border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:text-white">
                                </div>
                                <div>
                                    <label for="date" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-1">تاريخ اصدار البطاقة</label>
                                    <input type="date" id="birthdate" name="date_issu"  require class="w-full px-4 py-2 text-base border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:text-white">
                                </div>
                                <div>
                                    <label for="last-name" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-1">جهة الإصدار</label>
                                    <input type="text" id="last-name" name="name_issu"  require  class="w-full px-4 py-2 text-base border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:text-white">
                                </div>
                                <div>
                                    <label for="state" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-1">الحالة الإجتماعية</label>
                                    <select id="state" name="state" required class="w-full px-4 py-2 text-base border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:text-white">
                                    <option value="">اختر الحالة</option>
                                        <option >اعزب</option>
                                        <option >متزوج</option>
                                        <option>مطلق</option>
                                        <option>ارمل</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="state"   require class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-1">المؤهل</label> 
                                    <?php $sql = "SELECT qualific_id, qualific_type FROM qualification"; // تأكد من أن الحقول صحيحة
                                    $result = $conn->query($sql);?>
                                    <select id="state" name="qualificationType"   require  class="w-full px-4 py-2 text-base border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:text-white">
                                     <option>اختر المؤهل</option>
                                      <?php
                                         while($row2 = $result->fetch_assoc()){?>
                                        <option value="<?php echo  $row2["qualific_id"];?>">
                                        <?php echo $row2['qualific_type']; ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div>
                                    <label for="last-name" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-1">ادخل صورةالمؤهل</label>
                                    <input type="file" id="last-name" name="picture_qulific"  require  class="w-full px-4 py-2 text-base border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:text-white">
                                </div>
                                <div>
                                    <label for="date" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-1">تاريخ الحصول عل المؤهل</label>
                                    <input type="date" id="birthdate" name="date"   require  class="w-full px-4 py-2 text-base border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:text-white">
                                </div>
                                <div>
                                    <label for="phone" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-1">رقم الهاتف</label>
                                    <input type="tel" id="phone" name="phone"   require class="w-full px-4 py-2 text-base border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:text-white">
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-1">النوع</label>
                                    <div class="flex flex-wrap gap-4 mt-2">
                                        <label class="flex items-center cursor-pointer">
                                            <input type="radio" name="gender" value="ذكر"  require class="h-4 w-4 text-primary focus:ring-primary" checked>
                                            <span class="mr-2 text-gray-700 dark:text-gray-300">ذكر</span>
                                        </label>
                                        <label class="flex items-center cursor-pointer">
                                            <input type="radio" name="gender" value="انثى"   require class="h-4 w-4 text-primary focus:ring-primary">
                                            <span class="mr-2 text-gray-700 dark:text-gray-300">انثى</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
            
                        <div class="md:col-span-2">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">اختيار الرغبة</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="program1"   require class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-1">الرغبة الأولى</label>
                                    <?php $sql = "SELECT dept_id, dept_name FROM dept";
                                     $result = $conn->query($sql);?>
                                    <select id="program1" name="choose_first" required class="w-full px-4 py-2 text-base border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:text-white">
                                    <option value="">اختر رغبتك</option> 
                                        <?php
                                         while($row = $result->fetch_assoc()){?>
                                        <option value="<?php echo  $row["dept_id"];?>">
                                        <?php echo $row['dept_name']; ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div>
                                    <label for="program2" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-1">الرغبة الثانية</label>
                                    <?php $sql = "SELECT dept_id, dept_name FROM dept"; 
                                    $result = $conn->query($sql);?>
                                    <select id="program1" name="choose_second" required class="w-full px-4 py-2 text-base border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:text-white">
                                    <option value="">اختر رغبتك</option>
                                    <?php
                                         while($row = $result->fetch_assoc()){?>
                                        <option value="<?php echo  $row["dept_id"];?>">
                                        <?php echo $row['dept_name']; ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-center item-center">
                        <button type="submit" name="submit" class="px-8 py-3 bg-primary hover:bg-secondary text-white rounded-md font-bold transition-colors duration-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                            تقديم الطلب
                        </button>
                    </div>
                </form>
                <div id="form-success" class="hidden mt-6 p-4 bg-green-100 dark:bg-green-900 border border-green-400 dark:border-green-600 text-green-700 dark:text-green-200 rounded-md">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 text-green-500 dark:text-green-200">
                            <i class="fas fa-check-circle text-xl"></i>
                        </div>
                        <div class="mr-3">
                            <p class="font-medium">تم استلام طلبك بنجاح!</p>
                            <p>سيتم مراجعة طلبك والتواصل معك في أقرب وقت ممكن. شكراً لاهتمامك بالالتحاق بالمعهد التقني التجاري - الحصب.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="bg-gray-900 text-white py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between">
                <div class="mb-6 md:mb-0">
                    <h2 class="text-2xl font-bold text-white mb-4">المعهد التقني</h2>
                    <p class="text-gray-400 max-w-md">الجودة شعارنا والتميز غايتنا.</p>
                </div>
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-8">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-200 mb-4">روابط سريعة</h3>
                        <ul class="space-y-2">
                            <li><a href="main2.php" class="text-gray-400 hover:text-white transition-colors duration-300">الرئيسية</a></li>
                            <li><a href="AvailableDepts.php" class="text-gray-400 hover:text-white transition-colors duration-300">التخصصات</a></li>
                            <li><a href="requirements.php" class="text-gray-400 hover:text-white transition-colors duration-300">شروط التسجيل والقبول</a></li>
                            <li><a href="login_page.php" class="text-gray-400 hover:text-white transition-colors duration-300">تنسيق</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-200 mb-4">التواصل</h3>
                        <ul class="space-y-2">
                            <li><a href="contact.php" class="text-gray-400 hover:text-white transition-colors duration-300">اتصل بنا</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-200 mb-4">تابعنا</h3>
                        <div class="flex space-x-4 space-x-reverse">
                            <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">
                                <i class="fab fa-twitter text-xl"></i>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">
                                <i class="fab fa-facebook text-xl"></i>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">
                                <i class="fab fa-instagram text-xl"></i>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">
                                <i class="fab fa-linkedin text-xl"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-8 pt-8 flex flex-col sm:flex-row justify-between items-center">
                <p class="text-gray-400">&copy; 2025 المعهد التقني. جميع الحقوق محفوظة.</p>
                <div class="mt-4 sm:mt-0 flex space-x-4 space-x-reverse">
                    <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">سياسة الخصوصية</a>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">الشروط والأحكام</a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Toggle Mobile Menu
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        
        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
        
        // Toggle Theme
        const themeToggle = document.getElementById('theme-toggle');
        themeToggle.addEventListener('click', () => {
            document.documentElement.classList.toggle('dark');
        });
        
        // Close mobile menu when clicking on a navigation link
        document.querySelectorAll('#mobile-menu a').forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.add('hidden');
            });
        });
        
        // FAQ Accordion
        const faqQuestions = document.querySelectorAll('.faq-question');
        
        faqQuestions.forEach(question => {
            question.addEventListener('click', () => {
                const answer = question.nextElementSibling;
                const icon = question.querySelector('i');
                
                // Close all other answers
                document.querySelectorAll('.faq-answer').forEach(item => {
                    if (item !== answer) {
                        item.classList.add('hidden');
                        item.previousElementSibling.querySelector('i').classList.remove('transform', 'rotate-180');
                    }
                });
                
                // Toggle current answer
                answer.classList.toggle('hidden');
                icon.classList.toggle('rotate-180');
            });
        });
        
        // Show More Programs Button
        const showMoreButton = document.getElementById('show-more-programs');
        
        showMoreButton.addEventListener('click', () => {
            showMoreButton.textContent = 'جارِ التحميل...';
            setTimeout(() => {
                showMoreButton.innerHTML = 'تم عرض جميع التخصصات';
                showMoreButton.disabled = true;
                showMoreButton.classList.add('opacity-50', 'cursor-not-allowed');
            }, 1000);
        });
        
        // Form Submission
        const applicationForm = document.getElementById('application-form');
        const formSuccess = document.getElementById('form-success');
        
        applicationForm.addEventListener('submit', (e) => {
            e.preventDefault();
            
            // Simulate form submission (in a real app, this would send data to a server)
            setTimeout(() => {
                applicationForm.classList.add('hidden');
                formSuccess.classList.remove('hidden');
                formSuccess.scrollIntoView({ behavior: 'smooth' });
            }, 1000);
        });
        // Contact Form Submission
        const contactForm = document.getElementById('contact-form');
        const contactSuccess = document.getElementById('contact-success');
        
        contactForm.addEventListener('submit', (e) => {
            e.preventDefault();
            
            // Simulate form submission
            setTimeout(() => {
                contactForm.reset();
                contactSuccess.classList.remove('hidden');
                contactSuccess.scrollIntoView({ behavior: 'smooth' });
                
                // Hide success message after 5 seconds
                setTimeout(() => {
                    contactSuccess.classList.add('hidden');
                }, 5000);
            }, 1000);
        });
        
        // Smooth scrolling for anchor links
       document.querySelectorAll('a[href^="#"]').forEach(anchor => {
         anchor.addEventListener('click', function (e) {
                e.preventDefault();
                
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>
</body>
</html>