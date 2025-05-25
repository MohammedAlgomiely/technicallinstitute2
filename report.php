<?php
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");
require 'config.php';
session_start();
/*
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
        GROUP BY
            o.order_id, s.stu_id"; // أضفنا s.stu_id إلى GROUP BY

$result_report2 = $conn->query($stmt6);*/
$stmr = "SELECT
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
        GROUP BY
            o.order_id";
        $result_report2 = $conn->query($stmr);

        /*if($_SERVER['REQUEST_METHOD'] === "post"){
            global $selecteddept;
            $selecteddept = $_POST['selected_dept'];
        }*/
        if(isset($_POST['submit1'])){
            $stmt2 = "SELECT
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
                ch.choose_first = $_POST[selected_dept]
            GROUP BY
                o.choose_id";
            $result_report1 = $conn->query($stmt2);
        /*  $stmt = "SELECT
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
            ch.choose_first = $_POST[selected_dept]
        GROUP BY
            o.order_id"; // أضفنا s.stu_id إلى GROUP BY

$result_report1 = $conn->query($stmt); */ 
            
        }
        
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>المعهد التقني التجاري-الحصب - التنسيق والقبول</title>
    <script src="cdn.js"></script>
    <link rel="stylesheet" href="fontawesome-free-6.6.0-web/css/all.min.css">
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
<body class="bg-gray-50 dark:bg-gray-900">
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
                    <a href="add_accounts.php" class="px-3 py-2 rounded-md text-center text-sm font-bold text-gray-700 dark:text-gray-300 hover:text-primary transition-colors duration-300 bg-transparent hover:bg-primary hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">اضافة مستخدم</a>
                    </nav>
                </div>
                <div class="flex items-center gap-4">
                    <button id="theme-toggle" class="p-2 rounded-full hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors duration-300">
                        <i class="fas fa-moon dark:hidden"></i>
                        <i class="fas fa-sun hidden dark:text-gray-400 dark:block"></i>
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
                <a href="add_accounts.php" class="block px-3 py-2 rounded-md text-base font-bold text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:bg-primary hover:text-primary dark:hover:text-primary transition-colors duration-300">اضافة مستخدم</a>
            </div>
        </div>
    </header>
    
    <main class="container mx-auto px-4 py-8">
        <!-- تقرير حسب الرغبة -->
        <section class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 mb-8">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-6">
                <i class="fas fa-filter mr-2"></i>
                تقرير الطلاب حسب الرغبة
            </h2>

            <form method="post" class="flex flex-col md:flex-row gap-4 mb-6">
                <?php $sql = "SELECT dept_id, dept_name FROM dept"; 
                                    $result = $conn->query($sql);?>
                <select name="selected_dept" class="w-full md:w-64 p-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    <option value="">اختر الرغبة...</option>
                    <?php
                                         while($row = $result->fetch_assoc()){?>
                                        <option value="<?php echo  $row["dept_id"];?>">
                                        <?php echo $row['dept_name']; ?>
                                        </option>
                                        <?php } ?>
                </select>
                <button type="submit" name ="submit1" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg transition-colors">
                    <i class="fas fa-search mr-2"></i>
                    عرض التقرير
                </button>
            </form>
            <?php if(isset($result_report1)){ ?>
            <div class="overflow-x-auto rounded-lg border dark:border-gray-600">
                <form action="report1.php" method="post">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600" id="table1">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th class="px-4 py-3 text-right text-sm font-bold   text-black-700 dark:text-gray-300">اسم الطالب</th>
                                <th class="px-4 py-3 text-right text-sm font-bold   text-black-700 dark:text-gray-300">محل الميلاد</th>
                                <th class="px-4 py-3 text-right text-sm font-bold   text-black-700 dark:text-gray-300">تاريخ الميلاد</th>
                                <th class="px-4 py-3 text-right text-sm font-bold   text-black-700 dark:text-gray-300">المدينة</th>
                                <th class="px-4 py-3 text-right text-sm font-bold   text-black-700 dark:text-gray-300">المديرية</th>
                                <th class="px-4 py-3 text-right text-sm font-bold   text-black-700 dark:text-gray-300">القرية</th>
                                <th class="px-4 py-3 text-right text-sm font-bold   text-black-700 dark:text-gray-300">رقم الهاتف</th>
                                <th class="px-4 py-3 text-right text-sm font-bold   text-black-700 dark:text-gray-300">النوع</th>
                                <th class="px-4 py-3 text-right text-sm font-bold   text-black-700 dark:text-gray-300">الحالة الإجتماعية</th>
                                <th class="px-4 py-3 text-right text-sm font-bold   text-black-700 dark:text-gray-300">صورة الطالب</th>
                                <th class="px-4 py-3 text-right text-sm font-bold   text-black-700 dark:text-gray-300">صورة البطاقة الامامية</th>
                                <th class="px-4 py-3 text-right text-sm font-bold   text-black-700 dark:text-gray-300">صورة البطاقة الخلفية</th>
                                <th class="px-4 py-3 text-right text-sm font-bold   text-black-700 dark:text-gray-300">صورة الشهادة</th>
                                <th class="px-4 py-3 text-right text-sm font-bold   text-black-700 dark:text-gray-300">العنوان</th>
                                <th class="px-4 py-3 text-right text-sm font-bold   text-black-700 dark:text-gray-300">الرغبة</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-600">
                            <?php while($row = $result_report1->fetch_assoc()){ ?>
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                                <td class="px-4 py-3 text-sm text-black-700 font-bold dark:text-gray-300"><?= $row['stu_name'] ?></td>
                                <td name="stu_name" class="px-4 py-3 text-sm text-black-700 font-bold dark:text-gray-300"><?= $row['place_birthday'] ?></td>
                                <td name="date_birthday" class="px-4 py-3 text-sm text-black-700 font-bold dark:text-gray-300"><?= $row['date_birthday'] ?></td>
                                <td name="city" class="px-4 py-3 text-sm text-black-700 font-bold dark:text-gray-300"><?= $row['city'] ?></td>
                                <td name="director" class="px-4 py-3 text-sm text-black-700 font-bold dark:text-gray-300"><?= $row['director'] ?></td>
                                <td name="village" class="px-4 py-3 text-sm text-black-700 font-bold dark:text-gray-300"><?= $row['village'] ?></td>
                                <td name="phone" class="px-4 py-3 text-sm text-black-700 font-bold dark:text-gray-300"><?= $row['phone'] ?></td>
                                <td name="gender" class="px-4 py-3 text-sm text-black-700 font-bold dark:text-gray-300"><?= $row['gender'] ?></td>
                                <td name="statue" class="px-4 py-3 text-sm text-black-700 font-bold dark:text-gray-300"><?= $row['statue'] ?></td>
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
                                <td name="picture_student" class="px-4 py-3 text-sm text-gray-700 dark:text-gray-300"><img src = "<?php echo $stuimgpath; ?>"></td>
                                <td name="picture_qualific" class="px-4 py-3 text-sm text-gray-700 dark:text-gray-300"><img src = "<?php echo $picture_card_path;?>"></td>
                                <td name="picture_qualific" class="px-4 py-3 text-sm text-gray-700 dark:text-gray-300"><img src = "<?php echo $picture_card_path2;?>"></td>
                                <td name="picture_card" class="px-4 py-3 text-sm text-gray-700 dark:text-gray-300"><img src = "<?php echo $picture_qualific_path; ?>"></td>
                                <td name="addres" class="px-4 py-3 text-sm text-black-700 font-bold dark:text-gray-400"><?= $row['addres'] ?></td>
                                <td name="dept_name" class="px-4 py-3 text-sm text-black-700 font-bold dark:text-green-400"><?= $row['dept_name'] ?></td>


                                <input type="hidden" name="students[<?= $row['stu_id']?>][stu_name]" value="<?= htmlspecialchars($row['stu_name'])?>">
                                <input type="hidden" name="students[<?= $row['stu_id']?>][place_birthday]" value="<?= htmlspecialchars($row['place_birthday'])?>">
                                <input type="hidden" name="students[<?= $row['stu_id']?>][date_birthday]" value="<?= htmlspecialchars($row['date_birthday'])?>">
                                <input type="hidden" name="students[<?= $row['stu_id']?>][city]" value="<?= htmlspecialchars($row['city'])?>">
                                <input type="hidden" name="students[<?= $row['stu_id']?>][director]" value="<?= htmlspecialchars($row['director'])?>">
                                <input type="hidden" name="students[<?= $row['stu_id']?>][village]" value="<?= htmlspecialchars($row['village'])?>">
                                <input type="hidden" name="students[<?= $row['stu_id']?>][phone]" value="<?= htmlspecialchars($row['phone'])?>">
                                <input type="hidden" name="students[<?= $row['stu_id']?>][gender]" value="<?= htmlspecialchars($row['gender'])?>">
                                <input type="hidden" name="students[<?= $row['stu_id']?>][statue]" value="<?= htmlspecialchars($row['statue'])?>">
                                <input type="hidden" name="students[<?= $row['stu_id']?>][picture_student]" value="<?= htmlspecialchars($row['picture_student'])?>">
                                <input type="hidden" name="students[<?= $row['stu_id']?>][picture_qualific]" value="<?= htmlspecialchars($row['picture_qualific'])?>">
                                <input type="hidden" name="students[<?= $row['stu_id']?>][picture_card]" value="<?= htmlspecialchars($row['picture_card'])?>">
                                <input type="hidden" name="students[<?= $row['stu_id']?>][picture2_card]" value="<?= htmlspecialchars($row['picture2_card'])?>">
                                <input type="hidden" name="students[<?= $row['stu_id']?>][addres]" value="<?= htmlspecialchars($row['addres'])?>">
                                <input type="hidden" name="students[<?= $row['stu_id']?>][dept_name]" value="<?= htmlspecialchars($row['dept_name'])?>">
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <div class = "mt-5">
                        <center>
                            <button type="submit" name="print_report1" class = "px-8 bg-blue-500 text-white p-2 rounded">طباعة</button>
                        </center>
                    </div>
                </form>
            </div>
            <?php } ?>
            <!-- داخل حلقة عرض البيانات -->
        </section>

        <!-- تقرير جميع الطلاب -->
        <section class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-6">
                <i class="fas fa-users mr-2"></i>
                تقرير جميع الطلاب المنسقين
            </h2>

            <div class="overflow-x-auto rounded-lg border dark:border-gray-600">
                <form action="report2.php" method="post">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600" id="table2">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                                <th class="px-4 py-3 text-right text-sm font-bold   text-black-700 dark:text-gray-300">اسم الطالب</th>
                                <th class="px-4 py-3 text-right text-sm font-bold   text-black-700 dark:text-gray-300">محل الميلاد</th>
                                <th class="px-4 py-3 text-right text-sm font-bold   text-black-700 dark:text-gray-300">تاريخ الميلاد</th>
                                <th class="px-4 py-3 text-right text-sm font-bold   text-black-700 dark:text-gray-300">المدينة</th>
                                <th class="px-4 py-3 text-right text-sm font-bold   text-black-700 dark:text-gray-300">المديرية</th>
                                <th class="px-4 py-3 text-right text-sm font-bold   text-black-700 dark:text-gray-300">القرية</th>
                                <th class="px-4 py-3 text-right text-sm font-bold   text-black-700 dark:text-gray-300">رقم الهاتف</th>
                                <th class="px-4 py-3 text-right text-sm font-bold   text-black-700 dark:text-gray-300">النوع</th>
                                <th class="px-4 py-3 text-right text-sm font-bold   text-black-700 dark:text-gray-300">الحالة الإجتماعية</th>
                                <th class="px-4 py-3 text-right text-sm font-bold   text-black-700 dark:text-gray-300">صورة الطالب</th>
                                <th class="px-4 py-3 text-right text-sm font-bold   text-black-700 dark:text-gray-300">صورة البطاقة الامامية</th>
                                <th class="px-4 py-3 text-right text-sm font-bold   text-black-700 dark:text-gray-300">صورة البطاقة الخلفية</th>
                                <th class="px-4 py-3 text-right text-sm font-bold   text-black-700 dark:text-gray-300">صورة الشهادة</th>
                                <th class="px-4 py-3 text-right text-sm font-bold   text-black-700 dark:text-gray-300">العنوان</th>
                                <th class="px-4 py-3 text-right text-sm font-bold   text-black-700 dark:text-gray-300">الرغبة</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-600">
                            <?php while($row = $result_report2->fetch_assoc()): ?>
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                                <td class="px-4 py-3 text-sm text-black-700 font-bold dark:text-gray-300"><?= $row['stu_name'] ?></td>
                                <td name="stu_name" class="px-4 py-3 text-sm text-black-700 font-bold dark:text-gray-300"><?= $row['place_birthday'] ?></td>
                                <td name="date_birthday" class="px-4 py-3 text-sm text-black-700 font-bold dark:text-gray-300"><?= $row['date_birthday'] ?></td>
                                <td name="city" class="px-4 py-3 text-sm text-black-700 font-bold dark:text-gray-300"><?= $row['city'] ?></td>
                                <td name="director" class="px-4 py-3 text-sm text-black-700 font-bold dark:text-gray-300"><?= $row['director'] ?></td>
                                <td name="village" class="px-4 py-3 text-sm text-black-700 font-bold dark:text-gray-300"><?= $row['village'] ?></td>
                                <td name="phone" class="px-4 py-3 text-sm text-black-700 font-bold dark:text-gray-300"><?= $row['phone'] ?></td>
                                <td name="gender" class="px-4 py-3 text-sm text-black-700 font-bold dark:text-gray-300"><?= $row['gender'] ?></td>
                                <td name="statue" class="px-4 py-3 text-sm text-black-700 font-bold dark:text-gray-300"><?= $row['statue'] ?></td>
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
                                <td name="picture_student" class="px-4 py-3 text-sm text-gray-700 dark:text-gray-300"><img src = "<?php echo $stuimgpath; ?>"></td>
                                <td name="picture_qualific" class="px-4 py-3 text-sm text-gray-700 dark:text-gray-300"><img src = "<?php echo $picture_card_path;?>"></td>
                                <td name="picture_qualific" class="px-4 py-3 text-sm text-gray-700 dark:text-gray-300"><img src = "<?php echo $picture_card_path2;?>"></td>
                                <td name="picture_card" class="px-4 py-3 text-sm text-gray-700 dark:text-gray-300"><img src = "<?php echo $picture_qualific_path; ?>"></td>
                                <td name="addres" class="px-4 py-3 text-sm text-black-700 font-bold dark:text-gray-400"><?= $row['addres'] ?></td>
                                <td name="dept_name" class="px-4 py-3 text-sm text-black-700 font-bold dark:text-green-400"><?= $row['dept_name'] ?></td>


                                <input type="hidden" name="studentss[<?= $row['stu_id']?>][stu_name2]" value="<?= htmlspecialchars($row['stu_name'])?>">
                                <input type="hidden" name="studentss[<?= $row['stu_id']?>][place_birthday2]" value="<?= htmlspecialchars($row['place_birthday'])?>">
                                <input type="hidden" name="studentss[<?= $row['stu_id']?>][date_birthday2]" value="<?= htmlspecialchars($row['date_birthday'])?>">
                                <input type="hidden" name="studentss[<?= $row['stu_id']?>][city2]" value="<?= htmlspecialchars($row['city'])?>">
                                <input type="hidden" name="studentss[<?= $row['stu_id']?>][director2]" value="<?= htmlspecialchars($row['director'])?>">
                                <input type="hidden" name="studentss[<?= $row['stu_id']?>][village2]" value="<?= htmlspecialchars($row['village'])?>">
                                <input type="hidden" name="studentss[<?= $row['stu_id']?>][phone2]" value="<?= htmlspecialchars($row['phone'])?>">
                                <input type="hidden" name="studentss[<?= $row['stu_id']?>][gender2]" value="<?= htmlspecialchars($row['gender'])?>">
                                <input type="hidden" name="studentss[<?= $row['stu_id']?>][statue2]" value="<?= htmlspecialchars($row['statue'])?>">
                                <input type="hidden" name="studentss[<?= $row['stu_id']?>][picture_student2]" value="<?= htmlspecialchars($row['picture_student'])?>">
                                <input type="hidden" name="studentss[<?= $row['stu_id']?>][picture_qualific2]" value="<?= htmlspecialchars($row['picture_qualific'])?>">
                                <input type="hidden" name="studentss[<?= $row['stu_id']?>][picture_card2]" value="<?= htmlspecialchars($row['picture_card'])?>">
                                <input type="hidden" name="studentss[<?= $row['stu_id']?>][picture2_card2]" value="<?= htmlspecialchars($row['picture2_card'])?>">
                                <input type="hidden" name="studentss[<?= $row['stu_id']?>][addres2]" value="<?= htmlspecialchars($row['addres'])?>">
                                <input type="hidden" name="studentss[<?= $row['stu_id']?>][dept_name2]" value="<?= htmlspecialchars($row['dept_name'])?>">
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                    <div class = "mt-5">
                        <center>
                            <button type="submit" name="print_report2" class = "px-8 bg-blue-500 text-white p-2 rounded">طباعة</button>
                        </center>
                    </div>
                </form>
            </div>
        </section>
    </main>
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

    <!-- ... نفس الفوتر من الملف الأصلي ... -->
</body>
</html>