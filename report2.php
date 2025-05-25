<?php
session_start();
require 'config.php';
/*if(isset($_FILES['picture'])){
    $target_dir = $_SERVER['DOCUMENT_ROOT']."/uploads/";
    $target_file = $target_dir . basename($_FILES["picture"]["name"]);
    move_uploaded_file($_FILES["picture"]["temp_name"],$target_file);
}*/

if(isset($_POST['studentss'])) {
    $students = $_POST['studentss'];
?>
<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
    <meta charset="UTF-8">
    <title>تقرير جميع الطلاب المنسقين</title>
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
<body class="bg-gray-100 p-8">
    <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
    <div class="text-center mb-8">
        <!-- العنوان الرئيسي -->
            <h1 class="text-3xl font-bold text-gray-800 border-b-2 border-blue-500 pb-2 inline-block">
            تقرير جميع الطلاب المنسقين
            </h1>
            <p class="text-gray-600 mt-2">تاريخ التقرير: <?= date('Y-m-d') ?></p>
    </div>

        <!-- الجدول -->
        <div class="overflow-x-auto rounded-lg border dark:border-green-600">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600">
                <thead class="bg-white">
                    <tr> 
                        <th class="px-1 py-3 text-sm font-bold text-center border border-solid-8 border-black space-x-reverse text-black-700">اسم الطالب</th>
                        <th class="px-1 py-3 text-center text-sm font-bold border border-solid-8 border-black space-x-reverse text-black-700">محل الميلاد</th>
                        <th class="px-1 py-3 text-center text-sm font-bold border border-solid-8 border-black space-x-reverse text-black-700">تاريخ الميلاد</th>
                        <th class="px-1 py-3 text-center text-sm font-bold border border-solid-8 border-black space-x-reverse text-black-700">المدينة</th>
                        <th class="px-1 py-3 text-center text-sm font-bold border border-solid-8 border-black space-x-reverse text-black-700">المديرية</th>
                        <th class="px-1 py-3 text-center text-sm font-bold border border-solid-8 border-black space-x-reverse text-black-700">القرية</th>
                        <th class="px-1 py-3 text-center text-sm font-bold border border-solid-8 border-black space-x-reverse text-black-700">رقم الهاتف</th>
                        <th class="px-1 py-3 text-center text-sm font-bold border border-solid-8 border-black space-x-reverse text-black-700">النوع</th>
                        <th class="px-1 py-3 text-center text-sm font-bold border border-solid-8 border-black space-x-reverse text-black-700">الحالة الإجتماعية</th>
                        <th class="px-1 py-3 text-center text-sm font-bold border border-solid-8 border-black space-x-reverse text-black-700">صورة الطالب</th>
                        <th class="px-1 py-3 text-center text-sm font-bold border border-solid-8 border-black space-x-reverse text-black-700">صورة البطاقة الامامية</th>
                        <th class="px-1 py-3 text-center text-sm font-bold border border-solid-8 border-black space-x-reverse text-black-700">صورة البطاقة الخلفية</th>
                        <th class="px-1 py-3 text-center text-sm font-bold border border-solid-8 border-black space-x-reverse text-black-700">صورة الشهادة</th>
                        <th class="px-1 py-3 text-center text-sm font-bold border border-solid-8 border-black space-x-reverse text-black-700">العنوان</th>
                        <th class="px-1 py-3 text-center text-sm font-bold border border-solid-8 border-black space-x-reverse text-black-700">الرغبة</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 ">
                    <?php foreach($students as $student): ?>
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-1 py-3 text-sm text-black-700 text-center border border-solid-8 border-black font-bold"><?= $student['stu_name2'] ?></td>
                        <td class="px-1 py-3 text-sm text-black-700 text-center border border-solid-8 border-black font-bold"><?= $student['place_birthday2'] ?></td>
                        <td class="px-1 py-3 text-sm text-black-700 text-center border border-solid-8 border-black font-bold"><?= $student['date_birthday2'] ?></td>
                        <td class="px-1 py-3 text-sm text-black-700 text-center border border-solid-8 border-black font-bold"><?= $student['city2'] ?></td>
                        <td class="px-1 py-3 text-sm text-black-700 text-center border border-solid-8 border-black font-bold"><?= $student['director2'] ?></td>
                        <td class="px-1 py-3 text-sm text-black-700 text-center border border-solid-8 border-black font-bold"><?= $student['village2'] ?></td>
                        <td class="px-1 py-3 text-sm text-black-700 text-center border border-solid-8 border-black font-bold"><?= $student['phone2'] ?></td>
                        <td class="px-1 py-3 text-sm text-black-700 text-center border border-solid-8 border-black font-bold"><?= $student['gender2'] ?></td>
                        <td class="px-1 py-3 text-sm text-black-700 text-center border border-solid-8 border-black font-bold"><?= $student['statue2'] ?></td>
                        <td class="px-1 py-3 text-sm text-black-700 item-center border border-solid-8 border-black font-bold"><img src="uploads/<?= $student['picture_student2']?>"></td>
                        <td class="px-1 py-3 text-sm text-black-700 item-center border border-solid-8 border-black font-bold"><img src="uploads/<?= $student['picture_card2']?>"></td>
                        <td class="px-1 py-3 text-sm text-black-700 item-center border border-solid-8 border-black font-bold"><img src="uploads/<?= $student['picture2_card2']?>"></td>
                        <td class="px-1 py-3 text-sm text-black-700 item-center border border-solid-8 border-black font-bold"><img src="uploads/<?= $student['picture_qualific2']?>"></td>
                        <td class="px-1 py-3 text-sm text-black-700 text-center border border-solid-8 border-black font-bold"><?= $student['addres2'] ?></td>
                        <td class="px-1 py-3 text-sm text-black-700 text-center border border-solid-8 border-black font-bold"><?= $student['dept_name2'] ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- زر الطباعة -->
        <div class="mt-8 text-center no-print">
            <button onclick="window.print()" 
                    class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg 
                           transition-all duration-300 transform hover:scale-105
                           flex items-center justify-center gap-2 mx-auto">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                </svg>
                طباعة التقرير
            </button>
        </div>
    </div>
</body>
</html>
<?php
} else {
    header("Location: report.php");
    exit();
}
?>