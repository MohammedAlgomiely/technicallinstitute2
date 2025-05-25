<?php
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");
require 'config.php';
$validationResult = '';
if(isset($_POST['submit_news'])){
    $news_title = $_POST['news_title'];
    $news_content = $_POST['news_content'];
    $stmt8 = $conn->prepare("INSERT INTO news(news_title,news_content) VALUES (?,?)");
    $stmt8->bind_param("ss",$news_title,$news_content);
    if($stmt8->execute()){
    $validationResult = "<label class='block text-sm font-bold text-green-700 dark:text-green-300 mb-1'>تم اضافة الخبر بنجاح</label>";
    //echo "<script>windows: location='admin.php'</script>";
    //exit();
    }
}
?>
<?php
//header('Content-Type: text/html; charset=utf-8');
//$conn->set_charset("utf8mb4");
//session_start();
//$conn->set_charset("utf8mb4");
$orderid = $_POST['order'] ?? '';
$validationResult1 = '';
//if($_SERVER['REQUEST_METHOD'] === 'POST'){
    //echo $_POST['news_title'];
    $newstatue = $_POST['statue'] ?? '';
    if(isset($newstatue)){
        $stmt7 = $conn->prepare("update orders set status_order = ? where order_id = ?");
        $stmt7->bind_param("si",$newstatue,$orderid);
        if($stmt7->execute()){
            // اعادة توجيه لمنع اعادة ارسال النموذج
            $validationResult1 = "<label class='block text-sm font-bold text-green-700 dark:text-green-300 mb-1'>تمت العملية بنجاح</label>";
            //echo "<script>alert('تمت العملية بنجاح');</script>";
            //echo"<script>windows: location='admin.php'</script>";
            //exit();    
        }else{
            echo "خطأ في التحديث: ".$conn->error;
        }
    }
 //}
 /*
 //جلب الطلبات التي قيد المراجعة
     $stmt6 = "SELECT
            o.order_id AS order_id,
            s.stu_id AS stu_id,
            s.stu_name,
            s.place_birthday,
            s.date_birthday,
            s.city,
            s.director,
            s.village,
            s.phone,
            s.gender,
            s.statue,
            s.picture_student,
            s.addres,
            d.dept_name,
            q.picture_qualific,
            ca.picture_card,
            ca.picture2_card,
            GROUP_CONCAT(ch.choose_first ORDER BY ch.choose_id SEPARATOR ', ') AS choosedept
        FROM
            orders o
        JOIN
            student s ON o.stu_id = s.stu_id
        JOIN
            choosedept ch ON o.choose_id = ch.choose_id
        JOIN
            qualificdetails q ON s.stu_id = q.stu_id
        JOIN
            carddetails ca ON s.stu_id = ca.stu_id
        LEFT JOIN
            dept d ON d.dept_id = ch.choose_first
        WHERE
            o.status_order = 'قيد المراجعة'
        GROUP BY
            o.order_id";
     $results = $conn->query($stmt6);

     //$orderID = */
     $stmt6 = "SELECT
            o.order_id AS order_id,
            s.stu_id AS stu_id,
            MAX(s.stu_name) AS stu_name,
            MAX(s.place_birthday) AS place_birthday,
            MAX(s.date_birthday) AS date_birthday,
            MAX(s.city) AS city,
            MAX(s.director) AS director,
            MAX(s.village) AS village,
            MAX(s.phone) AS phone,
            MAX(s.gender) AS gender,
            MAX(s.statue) AS statue,
            MAX(s.picture_student) AS picture_student,
            MAX(s.addres) AS addres,
            MAX(d.dept_name) AS dept_name,
            MAX(q.picture_qualific) AS picture_qualific,
            MAX(ca.picture_card) AS picture_card,
            MAX(ca.picture2_card) AS picture2_card,
            GROUP_CONCAT(ch.choose_first ORDER BY ch.choose_id SEPARATOR ', ') AS choosedept
        FROM
            orders o
        JOIN
            student s ON o.stu_id = s.stu_id
        JOIN
            choosedept ch ON o.choose_id = ch.choose_id
        JOIN
            qualificdetails q ON s.stu_id = q.stu_id
        JOIN
            carddetails ca ON s.stu_id = ca.stu_id
        LEFT JOIN
            dept d ON d.dept_id = ch.choose_first
        WHERE
            o.status_order = 'قيد المراجعة'
        GROUP BY
            o.order_id, s.stu_id"; // أضفنا s.stu_id إلى GROUP BY

$results = $conn->query($stmt6);
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
                        third: '#ff0000',
                        fourth: '#00ff00'
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
                    <div class="flex-shrink-1">
                        <h2 class="text-xxl font-bold text-primary">المعهد التقني التجاري - الحصب</h2>
                    </div>
                </div>
                <div class="flex items-center">
                    <nav class="hidden md:flex space-x-1 space-x-reverse items-center">
                    <a href="main2.php" class="px-3 py-2 rounded-md text-center text-sm font-bold text-gray-700 dark:text-gray-300 hover:text-primary transition-colors duration-300 bg-transparent hover:bg-primary hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">الرئيسية</a>
                    <a href="AvailableDepts.php" class="px-3 py-2 rounded-md text-center text-sm font-bold text-gray-700 dark:text-gray-300 hover:text-primary transition-colors duration-300 bg-transparent hover:bg-primary hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">التخصصات</a>
                    <a href="requirements.php" class="px-3 py-2 rounded-md text-center text-sm font-bold text-gray-700 dark:text-gray-300 hover:text-primary transition-colors duration-300 bg-transparent hover:bg-primary hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">شروط التسجيل والقبول</a>
                    <a href="contact.php" class="px-3 py-2 rounded-md text-center text-sm font-bold text-gray-700 dark:text-gray-300 hover:text-primary transition-colors duration-300 bg-transparent hover:bg-primary hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">التواصل</a>
                    <a href="report.php" class="px-3 py-2 rounded-md text-center text-sm font-bold text-gray-700 dark:text-gray-300 hover:text-primary transition-colors duration-300 bg-transparent hover:bg-primary hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">التقارير</a>
                    <a href="add_accounts.php" class="px-3 py-2 rounded-md text-center text-sm font-bold text-gray-700 dark:text-gray-300 hover:text-primary transition-colors duration-300 bg-transparent hover:bg-primary hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">اضافة مستخدم</a>
                    </nav>
                </div>
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
                <a href="#home" class="block px-3 py-2 rounded-md text-base font-bold text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:bg-primary hover:text-primary dark:hover:text-primary transition-colors duration-300">الرئيسية</a>
                <a href="AvailableDepts.php" class="block px-3 py-2 rounded-md text-base font-bold text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:bg-primary hover:text-primary dark:hover:text-primary transition-colors duration-300">التخصصات</a>
                <a href="requirements.php" class="block px-3 py-2 rounded-md text-base font-bold text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:bg-primary hover:text-primary dark:hover:text-primary transition-colors duration-300">شروط التسجيل والقبول</a>
                <a href="contact.php" class="block px-3 py-2 rounded-md text-base font-bold text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:bg-primary hover:text-primary dark:hover:text-primary transition-colors duration-300">التواصل</a>
                <a href="report.php" class="block px-3 py-2 rounded-md text-base font-bold text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:bg-primary hover:text-primary dark:hover:text-primary transition-colors duration-300">التقارير</a>
                <a href="add_accounts.php" class="block px-3 py-2 rounded-md text-base font-bold text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:bg-primary hover:text-primary dark:hover:text-primary transition-colors duration-300">اضافة مستخدم</a>
            </div>
        </div>
    </header>
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-12">
        <section id="aboutIns" class="py-12 border-t border-gray-200 dark:border-gray-700 fade-in">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white">الطلاب المتقدمين</h2>
            </div>
            <?php if ($results->num_rows > 0){?>
            <?php while ($row = $results->fetch_assoc()){ ?>
            <div class="grid grid-cols-1 sm:grid-cols-1 lg:grid-cols-1 gap-6">
                <div class="bg-white mb-4 dark:bg-gray-800 rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                        <div class="bg-primary h-2 w-full"></div>
                        <div class="p-5">
                            <div class="inline-flex items-center float-right py-1">
                                <i class="inline-flex items-center text-gray-500 dark:text-gray-300" id="i1" onclick="toggleDetails(<?= $row['order_id']; ?>)">
                                    عرض البيانات
                                </i>
                            </div>
                            <div class="inline-flex items-center float-left">
                                <form method = "POST" >
                                    <input type="hidden" name="order" value = "<?= $row['order_id']?>">
                                    <button type = "submit" name = "statue" value="مرفوض" class="inline-flex items-center mb-6 mx-0.5 px-3 py-1 border border-transparent text-base font-bold rounded-md shadow-sm text-white bg-third/70 hover:bg-third/60 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-third/70 transition-colors duration-300">رفض</button>
                                    <button type = "submit" name = "statue" value="مقبول" class="inline-flex items-center mb-6 mx-0.5 px-3 py-1 border border-transparent text-base font-bold rounded-md shadow-sm text-white bg-fourth/70 hover:bg-fourth/60 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-fourth/70 transition-colors duration-300">قبول</button>
                                </form>
                            </div>
                            <div class="md:hidden hidden transition-all duration-300 ease-in-out mt-14" id="details-<?= $row['order_id'] ?>">
                                <label class="text-gray-600 dark:text-gray-400 mb-4 mt-8">اسم الطالب / </label><?= $row['stu_name'] ?><br>
                                <label class="text-gray-600 dark:text-gray-400 mb-4 mt-8">محل الميلاد / </label><?= $row['place_birthday'] ?><br>
                                <label class="text-gray-600 dark:text-gray-400 mb-4 mt-8">تاريخ الميلاد / </label><?= $row['date_birthday'] ?><br>
                                <label class="text-gray-600 dark:text-gray-400 mb-4 mt-8">المدينة / </label><?= $row['city'] ?><br>
                                <label class="text-gray-600 dark:text-gray-400 mb-4 mt-8">المديرية / </label><?= $row['director'] ?><br>
                                <label class="text-gray-600 dark:text-gray-400 mb-4 mt-8">القرية / </label><?= $row['village'] ?><br>
                                <label class="text-gray-600 dark:text-gray-400 mb-4 mt-8">رقم الهاتف / </label><?= $row['phone'] ?><br>
                                <label class="text-gray-600 dark:text-gray-400 mb-4 mt-8">النوع / </label><?= $row['gender'] ?><br>
                                <label class="text-gray-600 dark:text-gray-400 mb-4 mt-8">الحالة الإجتماعية / </label><?= $row['statue'] ?><br>
                                <?php  
                                $stuimgpath = "uploads/".htmlspecialchars($row['picture_student']);
                                $stupathexists = file_exists($stuimgpath);
                                $picture_qualific_path = "uploads/".htmlspecialchars($row['picture_qualific']);
                                $picture_qualific_pathexists = file_exists($picture_qualific_path);
                                $picture_card_path = "uploads/".htmlspecialchars($row['picture_card']);
                                $picture_card_pathexists = file_exists($picture_card_path);
                                $picture_card_path2 = "uploads/".htmlspecialchars($row['picture2_card']);
                                $picture_card_pathexists2 = file_exists($picture_card_path2);
                                ?>
                                <label class="text-gray-600 dark:text-gray-400 mb-4 mt-8">صورة الطالب / </label><img src = "<?php echo $stuimgpath; ?>"><br>
                                <label class="text-gray-600 dark:text-gray-400 mb-4 mt-8">صورة البطاقة الأمامية / </label><img src = "<?php echo $picture_card_path; ?>"><br>
                                <label class="text-gray-600 dark:text-gray-400 mb-4 mt-8">صورة البطاقة الخلفية / </label><img src = "<?php echo $picture_card_path2; ?>"><br>
                                <label class="text-gray-600 dark:text-gray-400 mb-4 mt-8">صورة الشهادة / </label><img src = "<?php echo $picture_qualific_path; ?>"><br>
                                <label class="text-gray-600 dark:text-gray-400 mb-4 mt-8">العنوان / </label><?= $row['addres'] ?><br>
                                <label class="text-gray-600 dark:text-gray-400 mb-4 mt-8">الرغبة / </label><?= $row['dept_name'] ?>
                            </div>
                        </div>
                </div>
            </div>
            <script>
                function toggleDetails(id) {
                var el = document.getElementById("details-" + id);
                if (el.style.display === "none") {
                el.style.display = "block";
                } else {
                el.style.display = "none";
                }
                }
            </script>
            <?php } ?>
            <?php } ?>
            <center>
                    <div>
                        <?php echo $validationResult1 ;?>
                    </div>
            </center>
        </section>

        <section id="contact" class="py-12 border-t border-gray-200 dark:border-gray-700 fade-in">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white">إضافة اخر الأخبار</h2>
            </div>
            <div class="mt-10 bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 md:p-8">
                <form class="space-y-6" method="post">
                    <div>
                        <label for="news_title" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-1">عنوان الخبر</label>
                        <textarea id="news_title" name="news_title" rows="1" required class="w-full px-4 py-2 text-base border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:text-white"></textarea>
                    </div>
                    <div>
                        <label for="news_content" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-1">الخبر</label>
                        <textarea id="news_content" name="news_content" rows="5" required class="w-full px-4 py-2 text-base border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:text-white"></textarea>
                    </div>
                    <div class="flex justify-center">
                        <button type="submit" name="submit_news" class="px-8 py-3 bg-primary hover:bg-secondary text-white rounded-md font-medium transition-colors duration-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                            إضافة الخبر
                        </button>
                    </div>
                </form>
            </div>
            <center>
                <div>
                    <?php echo $validationResult ;?>
                </div>
            </center>
        </section>
    </main>
    <footer class="bg-gray-900 text-white py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between">
                <div class="mb-6 md:mb-0">
                    <h2 class="text-2xl font-bold text-white mb-4">المعهد التقني التجاري - الحصب</h2>
                    <p class="text-gray-400 max-w-md">الجودة شعارنا والتميز غايتنا.</p>
                </div>
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-8">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-200 mb-4">روابط سريعة</h3>
                        <ul class="space-y-2">
                            <li><a href="main2.php" class="text-gray-400 hover:text-white transition-colors duration-300">الرئيسية</a></li>
                            <li><a href="AvailableDepts.php" class="text-gray-400 hover:text-white transition-colors duration-300">التخصصات</a></li>
                            <li><a href="requirements.php" class="text-gray-400 hover:text-white transition-colors duration-300">شروط التسجيل القبول</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-200 mb-4">التواصل</h3>
                        <ul class="space-y-2">
                            <li><a href="contact.html" class="text-gray-400 hover:text-white transition-colors duration-300">اتصل بنا</a></li>
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
        /*const ii = document.getElementById('ii');
        const order1 = document.getElementById('order1');
        
        ii.addEventListener('click', () => {
            order1.classList.toggle('hidden');
        });
        const iii = document.getElementById('iii');
        const order2 = document.getElementById('order2');
        
        iii.addEventListener('click', () => {
            order2.classList.toggle('hidden');
        });
        const iiii = document.getElementById('iii3');
        const order3 = document.getElementById('order3');
        
        iiii.addEventListener('click', () => {
            order3.classList.toggle('hidden');
        });
        const iiiii = document.getElementById('iiiii');
        const order4 = document.getElementById('order4');
        
        iiiii.addEventListener('click', () => {
            order4.classList.toggle('hidden');
        });*/

        /*$(document).ready(function() {
            $("#i1").click(function(){
                $("#details").slideToggle(300);
                var icon1 = $("#icon1");
                icon1.toggleClass("fa-angle-down fa-angle-up");
            });
        });*/
        /*$(document).ready(function() {
            $("#i2").click(function(){
                $("#order2").slideToggle(300);
                var icon2 = $("#icon2");
                icon2.toggleClass("fa-angle-down fa-angle-up");
            });
        });
        $(document).ready(function() {
            $("#i3").click(function(){
                $("#order3").slideToggle(300);
                var icon3 = $("#icon3");
                icon3.toggleClass("fa-angle-down fa-angle-up");
            });
        });
        $(document).ready(function() {
            $("#i4").click(function(){
                $("#order4").slideToggle(300);
                var icon4 = $("#icon4");
                icon4.toggleClass("fa-angle-down fa-angle-up");
            });
        });
        $(document).ready(function() {
            $("#i5").click(function(){
                $("#order5").slideToggle(300);
                var icon5 = $("#icon5");
                icon5.toggleClass("fa-angle-down fa-angle-up");
            });
        });
        $(document).ready(function() {
            $("#i6").click(function(){
                /*var icon6 = $(this).find("#icon6");
                var div6 = $("#order6");
                if(div6.is(":visible")){
                    div6.css({
                        'transform' : 'scale(0)',
                        'transition' : 'transform 0.3s'
                    }).hide(300);
                    icon6.removeClass("fa-angle-up").addClass("fa-angle-down");
                }else{
                    div6.show().css({
                        'transform' : 'scale(1)',
                        'transition' : 'transform 0.3s'
                    });
                    icon6.removeClass("fa-angle-down").addClass("fa-angle-up");
                }*/
                /*$("#order6").fadeToggle(200 ,function() {
                    var icon6 = $("#icon6");
                    icon6.toggleClass("fa-angle-down fa-angle-up");
                });*/
                /*$("#order6").slideToggle(300);
                var icon6 = $("#icon6");
                icon6.toggleClass("fa-angle-down fa-angle-up");
            });
        });

        /*const ii = document.getElementById('ii');
        const icon = document.getElementById('icon');
        
        ii.addEventListener('click', () => {
            icon.classList.toggle('hidden');
        });*/
        
        // Toggle Theme
        const themeToggle = document.getElementById('theme-toggle');
        themeToggle.addEventListener('click', () => {
            document.documentElement.classList.toggle('dark');
        });

        /*const showul = true;
        const showul1 = true;
        const showul2 = true;
        const showul3 = true;
       // var a = document.getElementById("down");
        function showUl() {
            if(showul){
                document.getElementById('icon').style.transform = "translateY(-10%) rotatex(-180deg)";
                document.getElementById('icon').style.transition = "transform 0.5s";
                document.getElementById('order1').style.display = "block";
            }else{
                document.getElementById('icon').style.transform = "translateY(0%) rotatex(0deg)";
                document.getElementById('icon').style.transition = "transform 0.5s";
                document.getElementById('order1').style.display = "none";
            }
            showul=!showul;
        }
        function showUl1() {
            if(showul){
                document.getElementById('icon1').style.transform = "translateY(-10%) rotatex(-180deg)";
                document.getElementById('icon1').style.transition = "transform 0.5s";
                document.getElementById('order2').style.display = "block";
            }else{
                document.getElementById('icon1').style.transform = "translateY(0%) rotatex(0deg)";
                document.getElementById('icon1').style.transition = "transform 0.5s";
                document.getElementById('order2').style.display = "none";
            }
            showul1=!showul1;
        }
        function showUl2() {
            if(showul){
                document.getElementById('icon2').style.transform = "translateY(-10%) rotatex(-180deg)";
                document.getElementById('icon2').style.transition = "transform 0.5s";
                document.getElementById('order3').style.display = "block";
            }else{
                document.getElementById('icon2').style.transform = "translateY(0%) rotatex(0deg)";
                document.getElementById('icon2').style.transition = "transform 0.5s";
                document.getElementById('order3').style.display = "none";
            }
            showul2=!showul2;
        }
        function showUl3() {
            if(showul){
                document.getElementById('icon3').style.transform = "translateY(-10%) rotatex(-180deg)";
                document.getElementById('icon3').style.transition = "transform 0.5s";
                document.getElementById('order4').style.display = "block";
            }else{
                document.getElementById('icon3').style.transform = "translateY(0%) rotatex(0deg)";
                document.getElementById('icon3').style.transition = "transform 0.5s";
                document.getElementById('order4').style.display = "none";
            }
            showu3=!showu3;
        }*/
        /*const a = true ;
        function click(a){
            if(a) {
                document.getElementById('down').style.transform = "translateY(-10%) rotate(-180deg)";
            }else{
                document.getElementById('down').style.transform = "translateY(0%) rotate(0deg)";
            }
            a=!a;
        }
        const movedownup = document.getElementById('ii');
        movedownup.addEventListener('click', () => {
            document.getElementById('down').style.transform = "translateY(-10%) rotate(-180deg)";
        });

        /*const movedownup2 = document.getElementById('ii');
        movedownup2.addEventListener('click', () => {
            document.getElementById('down').style.transform = "translateY(0%) rotate(0deg)";
        });*/
            //document.documentElement.classList.toggle('dark');
        
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
        /*const showMoreButton = document.getElementById('show-more-programs');
        
        showMoreButton.addEventListener('click', () => {
            showMoreButton.textContent = 'جارِ التحميل...';
            setTimeout(() => {
                showMoreButton.innerHTML = 'تم عرض جميع التخصصات';
                showMoreButton.disabled = true;
                showMoreButton.classList.add('opacity-50', 'cursor-not-allowed');
            }, 1000);
        });*/
        
        // Form Submission
        /*const applicationForm = document.getElementById('application-form');
        const formSuccess = document.getElementById('form-success');
        
        applicationForm.addEventListener('submit', (e) => {
            e.preventDefault();
            
            // Simulate form submission (in a real app, this would send data to a server)
            setTimeout(() => {
                applicationForm.classList.add('hidden');
                formSuccess.classList.remove('hidden');
                formSuccess.scrollIntoView({ behavior: 'smooth' });
            }, 1000);
        });*/
        
        // Contact Form Submission
        /*const contactForm = document.getElementById('contact-form');
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
        });*/
        
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



