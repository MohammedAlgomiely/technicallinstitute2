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
                    <a href="login_page.php" class="px-3 py-2 rounded-md text-sm font-bold text-gray-700 dark:text-gray-300 hover:text-primary transition-colors duration-300 bg-transparent hover:bg-primary hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">تنسيق</a>
                    <a href="#contact" class="px-3 py-2 rounded-md text-sm font-bold text-gray-700 dark:text-gray-300 hover:text-primary transition-colors duration-300 bg-transparent hover:bg-primary hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">التواصل</a>
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
                <a href="login_page.php" class="block px-3 py-2 rounded-md text-base font-bold text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-primary dark:hover:text-primary transition-colors duration-300">تنسيق</a>
                <a href="#contact" class="block px-3 py-2 rounded-md text-base font-bold text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-primary dark:hover:text-primary transition-colors duration-300">التواصل</a>
            </div>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-12">
        <!-- Hero Section -->
        <!--<section id="home" class="py-12 md:py-20 slide-in" style="background-image: url('images/back1.jpg'); background-size:100%; background-repeat:no-repeat;">
            <div class="flex flex-col md:flex-row gap-10 items-center">
                <div class="md:w-1/2 space-y-6">
                    <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 dark:text-white">
                        <span class="text-primary"></span> </h2>
                    <p class="text-lg text-gray-600 dark:text-gray-400">
                         </p><br><br><br><br><br><br><br>
                    <div class="flex flex-wrap gap-4">
                        <a href="application.html" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-bold rounded-md shadow-sm text-white bg-primary hover:bg-secondary focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-colors duration-300">
                            قم بالتنسيق الآن
                        </a>
                        <a href="AvailableDepts.html" class="inline-flex items-center px-6 py-3 border border-primary text-base font-bold rounded-md text-primary bg-transparent hover:bg-primary hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-colors duration-300">
                            استكشف التخصصات
                        </a>
                    </div>
                </div>
                <div class="md:w-1/2 p-4 bg-gray-100 dark:bg-gray-800 rounded-lg shadow-lg">
                    <div class="bg-white dark:bg-gray-700 p-6 rounded-lg border-t-4 border-primary shadow-inner">
                        <h3 class="text-xl font-semibold mb-4 text-gray-900 dark:text-white">أخبار وتحديثات</h3>
                        <ul class="space-y-4">
                            <li class="flex gap-3">
                                <div class="flex-shrink-0 text-primary">
                                    <i class="fas fa-bullhorn"></i>
                                </div>
                                <div>
                                    <p class="font-bold text-gray-800 dark:text-gray-200">بدء التسجيل للفصل الدراسي الجديد</p>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">يبدأ التسجيل من 1 أغسطس حتى 30 سبتمبر</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>-->

        <!-- Programs Section -->
        <!--<section id="programs" class="py-12 border-t border-gray-200 dark:border-gray-700 fade-in">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white">التخصصات المتاحة</h2>
                <p class="mt-2 text-lg text-gray-600 dark:text-gray-400">استكشف برامجنا التعليمية المتميزة</p>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                    <div class="bg-primary h-2 w-full"></div>
                    <div class="p-6">
                        <div class="w-12 h-12 rounded-lg bg-primary/10 flex items-center justify-center text-primary mb-4">
                            <i class="fas fa-laptop-code text-xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">البرمجة</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-4">تطوير تطبيقات وبرمجيات متقدمة ومهارات في لغات البرمجة الحديثة.</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-2 py-1 bg-primary/10 text-primary text-xs rounded-full">برمجة</span>
                            <span class="px-2 py-1 bg-primary/10 text-primary text-xs rounded-full">تطوير الويب</span>
                        </div>
                        <div class="flex justify-between text-sm text-gray-500 dark:text-gray-400">
                            <span>المدة: سنتان</span>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                    <div class="bg-primary h-2 w-full"></div>
                    <div class="p-6">
                        <div class="w-12 h-12 rounded-lg bg-primary/10 flex items-center justify-center text-primary mb-4">
                            <i class="fas fa-network-wired text-xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">الأمن السيبراني</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-4">تصميم وإدارة شبكات الحاسب وأنظمة الأمن السيبراني والبنية التحتية.</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-2 py-1 bg-primary/10 text-primary text-xs rounded-full">شبكات</span>
                            <span class="px-2 py-1 bg-primary/10 text-primary text-xs rounded-full">أمن سيبراني</span>
                        </div>
                        <div class="flex justify-between text-sm text-gray-500 dark:text-gray-400">
                            <span>المدة: سنتان</span>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                    <div class="bg-primary h-2 w-full"></div>
                    <div class="p-6">
                        <div class="w-12 h-12 rounded-lg bg-primary/10 flex items-center justify-center text-primary mb-4">
                            <i class="fas fa-brain text-xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">المحاسبة</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-4">تطوير حلول الذكاء الاصطناعي وتعلم الآلة ومعالجة البيانات الضخمة.</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-2 py-1 bg-primary/10 text-primary text-xs rounded-full">تعلم الآلة</span>
                            <span class="px-2 py-1 bg-primary/10 text-primary text-xs rounded-full">بيانات</span>
                            <span class="px-2 py-1 bg-primary/10 text-primary text-xs rounded-full">خوارزميات</span>
                        </div>
                        <div class="flex justify-between text-sm text-gray-500 dark:text-gray-400">
                            <span>المدة: سنتان</span>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                    <div class="bg-primary h-2 w-full"></div>
                    <div class="p-6">
                        <div class="w-12 h-12 rounded-lg bg-primary/10 flex items-center justify-center text-primary mb-4">
                            <i class="fas fa-chart-line text-xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">إدارة الأعمال</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-4">الجمع بين مهارات إدارة الأعمال والتقنيات الحديثة لقيادة المشاريع التقنية.</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-2 py-1 bg-primary/10 text-primary text-xs rounded-full">إدارة</span>
                            <span class="px-2 py-1 bg-primary/10 text-primary text-xs rounded-full">ريادة أعمال</span>
                        </div>
                        <div class="flex justify-between text-sm text-gray-500 dark:text-gray-400">
                            <span>المدة: سنتان</span>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                    <div class="bg-primary h-2 w-full"></div>
                    <div class="p-6">
                        <div class="w-12 h-12 rounded-lg bg-primary/10 flex items-center justify-center text-primary mb-4">
                            <i class="fas fa-vr-cardboard text-xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">التسويق</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-4">تطوير تطبيقات الواقع الافتراضي والمعزز وتصميم تجارب المستخدم المتقدمة.</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-2 py-1 bg-primary/10 text-primary text-xs rounded-full">تسويق</span>
                            <span class="px-2 py-1 bg-primary/10 text-primary text-xs rounded-full">تسويق رقمي</span>
                        </div>
                        <div class="flex justify-between text-sm text-gray-500 dark:text-gray-400">
                            <span>المدة: سنتان</span>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                    <div class="bg-primary h-2 w-full"></div>
                    <div class="p-6">
                        <div class="w-12 h-12 rounded-lg bg-primary/10 flex items-center justify-center text-primary mb-4">
                            <i class="fas fa-solar-panel text-xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">ادارة المكاتب</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-4">تصميم وتشغيل أنظمة الطاقة المتجددة والحلول البيئية المستدامة.</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-2 py-1 bg-primary/10 text-primary text-xs rounded-full">طاقة شمسية</span>
                            <span class="px-2 py-1 bg-primary/10 text-primary text-xs rounded-full">طاقة رياح</span>
                            <span class="px-2 py-1 bg-primary/10 text-primary text-xs rounded-full">استدامة</span>
                        </div>
                        <div class="flex justify-between text-sm text-gray-500 dark:text-gray-400">
                            <span>المدة: سنتان</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="mt-10 text-center">
                <button id="show-more-programs" class="inline-flex items-center px-6 py-3 border border-primary text-base font-bold rounded-md text-primary bg-transparent hover:bg-primary hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-colors duration-300">
                    <span>عرض المزيد من التخصصات</span>
                    <i class="fas fa-chevron-down mr-2"></i>
                </button>
            </div>
        </section>-->

        <!-- Requirements Section -->
        <!--<section id="requirements" class="py-12 border-t border-gray-200 dark:border-gray-700 fade-in">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white">شروط القبول</h2>
                <p class="mt-2 text-lg text-gray-600 dark:text-gray-400">تعرف على متطلبات الالتحاق بالمعهد التقني</p>
            </div>
            
            <div class="flex flex-col md:flex-row gap-8">
                <div class="md:w-1/2 bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4 flex items-center">
                        <span class="w-8 h-8 rounded-full bg-primary flex items-center justify-center text-white text-sm mr-2">1</span>
                        المؤهلات الأكاديمية
                    </h3>
                    <ul class="space-y-3 text-gray-600 dark:text-gray-400">
                        <li class="flex items-start">
                            <div class="flex-shrink-0 text-primary mt-1"><i class="fas fa-check-circle"></i></div>
                            <div class="mr-3">شهادة الثانوية العامة أو ما يعادلها بمعدل لا يقل عن 65%</div>
                        </li>
                        <li class="flex items-start">
                            <div class="flex-shrink-0 text-primary mt-1"><i class="fas fa-check-circle"></i></div>
                            <div class="mr-3">اجتياز اختبار القدرات العامة بدرجة لا تقل عن 60%</div>
                        </li>
                        <li class="flex items-start">
                            <div class="flex-shrink-0 text-primary mt-1"><i class="fas fa-check-circle"></i></div>
                            <div class="mr-3">إتقان اللغة الإنجليزية (يفضل وجود شهادة TOEFL أو IELTS)</div>
                        </li>
                        <li class="flex items-start">
                            <div class="flex-shrink-0 text-primary mt-1"><i class="fas fa-check-circle"></i></div>
                            <div class="mr-3">اجتياز المقابلة الشخصية للتخصص المتقدم إليه</div>
                        </li>
                    </ul>
                </div>
                <div class="md:w-1/2 bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4 flex items-center">
                        <span class="w-8 h-8 rounded-full bg-primary flex items-center justify-center text-white text-sm mr-2">2</span>
                        المستندات المطلوبة
                    </h3>
                    <ul class="space-y-3 text-gray-600 dark:text-gray-400">
                        <li class="flex items-start">
                            <div class="flex-shrink-0 text-primary mt-1"><i class="fas fa-file-alt"></i></div>
                            <div class="mr-3">نسخة من شهادة الثانوية العامة أو ما يعادلها</div>
                        </li>
                        <li class="flex items-start">
                            <div class="flex-shrink-0 text-primary mt-1"><i class="fas fa-file-alt"></i></div>
                            <div class="mr-3">نسخة من بطاقة الهوية الوطنية أو جواز السفر</div>
                        </li>
                        <li class="flex items-start">
                            <div class="flex-shrink-0 text-primary mt-1"><i class="fas fa-file-alt"></i></div>
                            <div class="mr-3">نسخة من شهادات اللغة الإنجليزية (إن وجدت)</div>
                        </li>
                        <li class="flex items-start">
                            <div class="flex-shrink-0 text-primary mt-1"><i class="fas fa-file-alt"></i></div>
                            <div class="mr-3">صور شخصية حديثة (عدد 4)</div>
                        </li>
                        <li class="flex items-start">
                            <div class="flex-shrink-0 text-primary mt-1"><i class="fas fa-file-alt"></i></div>
                            <div class="mr-3">شهادة طبية تثبت اللياقة الصحية</div>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="mt-10 bg-primary/10 rounded-lg p-6">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">المواعيد المهمة</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-300 dark:divide-gray-700">
                        <thead>
                            <tr>
                                <th class="py-3 text-right text-sm font-semibold text-gray-900 dark:text-white pr-4">الحدث</th>
                                <th class="py-3 text-right text-sm font-semibold text-gray-900 dark:text-white pr-4">تاريخ البداية</th>
                                <th class="py-3 text-right text-sm font-semibold text-gray-900 dark:text-white pr-4">تاريخ النهاية</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            <tr>
                                <td class="py-4 text-right text-sm text-gray-600 dark:text-gray-400 pr-4">فترة تقديم طلبات الالتحاق</td>
                                <td class="py-4 text-right text-sm text-gray-600 dark:text-gray-400 pr-4">1 أغسطس</td>
                                <td class="py-4 text-right text-sm text-gray-600 dark:text-gray-400 pr-4">30 سبتمبر</td>
                            </tr>
                            <tr>
                                <td class="py-4 text-right text-sm text-gray-600 dark:text-gray-400 pr-4">اختبارات القبول</td>
                                <td class="py-4 text-right text-sm text-gray-600 dark:text-gray-400 pr-4">5 أكتوبر</td>
                                <td class="py-4 text-right text-sm text-gray-600 dark:text-gray-400 pr-4">15 أكتوبر</td>
                            </tr>
                            <tr>
                                <td class="py-4 text-right text-sm text-gray-600 dark:text-gray-400 pr-4">المقابلات الشخصية</td>
                                <td class="py-4 text-right text-sm text-gray-600 dark:text-gray-400 pr-4">20 أكتوبر</td>
                                <td class="py-4 text-right text-sm text-gray-600 dark:text-gray-400 pr-4">30 أكتوبر</td>
                            </tr>
                            <tr>
                                <td class="py-4 text-right text-sm text-gray-600 dark:text-gray-400 pr-4">إعلان نتائج القبول</td>
                                <td class="py-4 text-right text-sm text-gray-600 dark:text-gray-400 pr-4">5 نوفمبر</td>
                                <td class="py-4 text-right text-sm text-gray-600 dark:text-gray-400 pr-4">5 نوفمبر</td>
                            </tr>
                            <tr>
                                <td class="py-4 text-right text-sm text-gray-600 dark:text-gray-400 pr-4">بدء الدراسة</td>
                                <td class="py-4 text-right text-sm text-gray-600 dark:text-gray-400 pr-4">15 نوفمبر</td>
                                <td class="py-4 text-right text-sm text-gray-600 dark:text-gray-400 pr-4">15 نوفمبر</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>-->

        <!-- Application Form Section -->
        <!--<section id="application" class="py-12 border-t border-gray-200 dark:border-gray-700 fade-in">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white">تقديم طلب الالتحاق</h2>
                <p class="mt-2 text-lg text-gray-600 dark:text-gray-400">املأ النموذج التالي للتقديم في المعهد التقني</p>
            </div>
            
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 md:p-8">
                <form id="application-form" class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            
                        <div class="md:col-span-2 border-b border-gray-200 dark:border-gray-700 pb-4 mb-4">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">المعلومات الشخصية</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="first-name" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-1">الاسم الأول</label>
                                    <input type="text" id="first-name" name="first-name" required class="w-full px-4 py-2 text-base border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:text-white">
                                </div>
                                <div>
                                    <label for="last-name" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-1">الاسم الأخير</label>
                                    <input type="text" id="last-name" name="last-name" required class="w-full px-4 py-2 text-base border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:text-white">
                                </div>
                                <div>
                                    <label for="email" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-1">البريد الإلكتروني</label>
                                    <input type="email" id="email" name="email" required class="w-full px-4 py-2 text-base border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:text-white">
                                </div>
                                <div>
                                    <label for="phone" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-1">رقم الهاتف</label>
                                    <input type="tel" id="phone" name="phone" required class="w-full px-4 py-2 text-base border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:text-white">
                                </div>
                                <div>
                                    <label for="birthdate" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-1">تاريخ الميلاد</label>
                                    <input type="date" id="birthdate" name="birthdate" required class="w-full px-4 py-2 text-base border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:text-white">
                                </div>
                                <div>
                                    <label for="id-number" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-1">رقم الهوية/جواز السفر</label>
                                    <input type="text" id="id-number" name="id-number" required class="w-full px-4 py-2 text-base border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:text-white">
                                </div>
                            </div>
                        </div>
                        
            
                        <div class="md:col-span-2 border-b border-gray-200 dark:border-gray-700 pb-4 mb-4">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">المعلومات التعليمية</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="highschool" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-1">اسم المدرسة الثانوية</label>
                                    <input type="text" id="highschool" name="highschool" required class="w-full px-4 py-2 text-base border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:text-white">
                                </div>
                                <div>
                                    <label for="graduation-year" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-1">سنة التخرج</label>
                                    <input type="number" id="graduation-year" name="graduation-year" min="2000" max="2030" required class="w-full px-4 py-2 text-base border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:text-white">
                                </div>
                                <div>
                                    <label for="gpa" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-1">المعدل التراكمي</label>
                                    <input type="number" id="gpa" name="gpa" min="0" max="100" step="0.01" required class="w-full px-4 py-2 text-base border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:text-white">
                                </div>
                                <div>
                                    <label for="english-level" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-1">مستوى اللغة الإنجليزية</label>
                                    <select id="english-level" name="english-level" required class="w-full px-4 py-2 text-base border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:text-white">
                                        <option value="">اختر المستوى</option>
                                        <option value="beginner">مبتدئ</option>
                                        <option value="intermediate">متوسط</option>
                                        <option value="advanced">متقدم</option>
                                        <option value="fluent">طلاقة</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
            
                        <div class="md:col-span-2">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">اختيار الرغبة</h3>
                            <div class="space-y-6">
                                <div>
                                    <label for="program" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-1">الرغبة المطلوبة</label>
                                    <select id="program" name="program" required class="w-full px-4 py-2 text-base border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:text-white">
                                        <option value="">اختر رغبتك</option>
                                        <option value="software-engineering">برمجة</option>
                                        <option value="network-technology">أمن سيبراني</option>
                                        <option value="artificial-intelligence">محاسبة</option>
                                        <option value="tech-business">إدارة الأعمال</option>
                                        <option value="vr-technology">إدارة المكاتب</option>
                                        <option value="renewable-energy">تسويق</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="study-mode" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-1">نظام الدراسة</label>
                                    <div class="flex flex-wrap gap-4 mt-2">
                                        <label class="flex items-center cursor-pointer">
                                            <input type="radio" name="study-mode" value="full-time" class="h-4 w-4 text-primary focus:ring-primary" checked>
                                            <span class="mr-2 text-gray-700 dark:text-gray-300">دوام كامل</span>
                                        </label>
                                        <label class="flex items-center cursor-pointer">
                                            <input type="radio" name="study-mode" value="part-time" class="h-4 w-4 text-primary focus:ring-primary">
                                            <span class="mr-2 text-gray-700 dark:text-gray-300">دوام جزئي</span>
                                        </label>
                                        <label class="flex items-center cursor-pointer">
                                            <input type="radio" name="study-mode" value="distance" class="h-4 w-4 text-primary focus:ring-primary">
                                            <span class="mr-2 text-gray-700 dark:text-gray-300">تعليم عن بعد</span>
                                        </label>
                                    </div>
                                </div>
                                <div>
                                    <label for="motivation" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-1">ما هو سبب اختيارك لهذا البرنامج؟</label>
                                    <textarea id="motivation" name="motivation" rows="4" required class="w-full px-4 py-2 text-base border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:text-white"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="flex justify-center">
                        <button type="submit" class="px-8 py-3 bg-primary hover:bg-secondary text-white rounded-md font-bold transition-colors duration-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
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
                            <p class="font-bold">تم استلام طلبك بنجاح!</p>
                            <p>سيتم مراجعة طلبك والتواصل معك في أقرب وقت ممكن. شكراً لاهتمامك بالالتحاق بالمعهد التقني.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>-->

        <!-- Contact Section -->
        <section id="contact" class="py-12 border-t border-gray-200 dark:border-gray-700 fade-in">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white">تواصل معنا</h2>
                <p class="mt-2 text-lg text-gray-600 dark:text-gray-400">هل لديك استفسارات؟ فريقنا جاهز للإجابة على أسئلتك</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 text-center">
                    <div class="w-12 h-12 mx-auto rounded-full bg-primary/10 flex items-center justify-center text-primary mb-4">
                        <i class="fas fa-map-marker-alt text-xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">العنوان</h3>
                    <p class="text-gray-600 dark:text-gray-400">
                        مدينة تعز - شارع المرور - خلف مدرسة 26 سبتمبر<br>
                        المدينة، تعز
                    </p>
                </div>
                
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 text-center">
                    <div class="w-12 h-12 mx-auto rounded-full bg-primary/10 flex items-center justify-center text-primary mb-4">
                        <i class="fas fa-phone-alt text-xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">الهاتف</h3>
                    <p class="text-gray-600 dark:text-gray-400">
                        الإدارة: 123-456-7890<br>
                        خدمة الطلاب: 123-456-7891<br>
                        القبول والتسجيل: 123-456-7892
                    </p>
                </div>
                
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 text-center">
                    <div class="w-12 h-12 mx-auto rounded-full bg-primary/10 flex items-center justify-center text-primary mb-4">
                        <i class="fas fa-envelope text-xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">البريد الإلكتروني</h3>
                    <p class="text-gray-600 dark:text-gray-400">
                        معلومات عامة: info@technical-institute.edu<br>
                        القبول: admission@technical-institute.edu<br>
                        الدعم الفني: support@technical-institute.edu
                    </p>
                </div>
            </div>
            
            <div class="mt-10 bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 md:p-8">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-6 text-center">أرسل لنا رسالة</h3>
                <form id="contact-form" class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="contact-name" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-1">الاسم الكامل</label>
                            <input type="text" id="contact-name" name="contact-name" required class="w-full px-4 py-2 text-base border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:text-white">
                        </div>
                        <div>
                            <label for="contact-email" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-1">البريد الإلكتروني</label>
                            <input type="email" id="contact-email" name="contact-email" required class="w-full px-4 py-2 text-base border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:text-white">
                        </div>
                    </div>
                    <div>
                        <label for="message-subject" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-1">موضوع الرسالة</label>
                        <select id="message-subject" name="message-subject" required class="w-full px-4 py-2 text-base border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:text-white">
                            <option value="">اختر الموضوع</option>
                            <option value="admission">استفسار عن القبول</option>
                            <option value="programs">استفسار عن التخصصات</option>
                            <option value="requirements">استفسار عن المتطلبات</option>
                            <option value="fees">استفسار عن الرسوم</option>
                            <option value="other">موضوع آخر</option>
                        </select>
                    </div>
                    <div>
                        <label for="message" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-1">الرسالة</label>
                        <textarea id="message" name="message" rows="5" required class="w-full px-4 py-2 text-base border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:text-white"></textarea>
                    </div>
                    <div class="flex justify-center">
                        <button type="submit" class="px-8 py-3 bg-primary hover:bg-secondary text-white rounded-md font-bold transition-colors duration-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                            إرسال الرسالة
                        </button>
                    </div>
                </form>
                
                <div id="contact-success" class="hidden mt-6 p-4 bg-green-100 dark:bg-green-900 border border-green-400 dark:border-green-600 text-green-700 dark:text-green-200 rounded-md">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 text-green-500 dark:text-green-200">
                            <i class="fas fa-check-circle text-xl"></i>
                        </div>
                        <div class="mr-3">
                            <p class="font-bold">تم إرسال رسالتك بنجاح!</p>
                            <p>سنقوم بالرد على استفسارك في أقرب وقت ممكن. شكراً لتواصلك معنا.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- FAQ Section -->
        <!--<section class="py-12 border-t border-gray-200 dark:border-gray-700 fade-in">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white">الأسئلة الشائعة</h2>
                <p class="mt-2 text-lg text-gray-600 dark:text-gray-400">إجابات على الأسئلة الأكثر شيوعاً</p>
            </div>
            
            <div class="space-y-4 max-w-3xl mx-auto">
                <div class="faq-item border border-gray-200 dark:border-gray-700 rounded-lg overflow-hidden">
                    <button class="faq-question w-full text-right px-6 py-4 flex justify-between items-center bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-300 focus:outline-none">
                        <span class="font-bold text-gray-900 dark:text-white">ما هي مدة الدراسة في المعهد التقني؟</span>
                        <i class="fas fa-chevron-down text-gray-400 transition-transform duration-300"></i>
                    </button>
                    <div class="faq-answer px-6 py-4 bg-gray-50 dark:bg-gray-700 text-gray-600 dark:text-gray-300 hidden">
                        <p>تتراوح مدة الدراسة في المعهد التقني بين سنتين إلى ثلاث سنوات حسب البرنامج المختار. معظم البرامج تستغرق سنتين دراسيتين (أربعة فصول)، بينما بعض البرامج المتخصصة قد تستغرق فترة أطول.</p>
                    </div>
                </div>
                
                <div class="faq-item border border-gray-200 dark:border-gray-700 rounded-lg overflow-hidden">
                    <button class="faq-question w-full text-right px-6 py-4 flex justify-between items-center bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-300 focus:outline-none">
                        <span class="font-bold text-gray-900 dark:text-white">ما هي رسوم الدراسة؟</span>
                        <i class="fas fa-chevron-down text-gray-400 transition-transform duration-300"></i>
                    </button>
                    <div class="faq-answer px-6 py-4 bg-gray-50 dark:bg-gray-700 text-gray-600 dark:text-gray-300 hidden">
                        <p>تختلف الرسوم الدراسية حسب البرنامج المختار. تتراوح الرسوم بين 15,000 إلى 25,000 سنوياً. كما تتوفر خيارات مختلفة للمنح الدراسية والدعم المالي للطلاب المتميزين أكاديمياً أو الذين لديهم ظروف اقتصادية خاصة.</p>
                    </div>
                </div>
                
                <div class="faq-item border border-gray-200 dark:border-gray-700 rounded-lg overflow-hidden">
                    <button class="faq-question w-full text-right px-6 py-4 flex justify-between items-center bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-300 focus:outline-none">
                        <span class="font-bold text-gray-900 dark:text-white">هل هناك إمكانية للتدريب العملي أثناء الدراسة؟</span>
                        <i class="fas fa-chevron-down text-gray-400 transition-transform duration-300"></i>
                    </button>
                    <div class="faq-answer px-6 py-4 bg-gray-50 dark:bg-gray-700 text-gray-600 dark:text-gray-300 hidden">
                        <p>نعم، يوفر المعهد التقني برامج تدريب عملي إلزامية كجزء من الخطة الدراسية. يتم التنسيق مع شركات ومؤسسات رائدة في مجالات مختلفة لتوفير فرص تدريب عملي للطلاب خلال فترة الصيف أو الفصل الأخير من الدراسة. كما يوفر المعهد معامل ومختبرات متطورة للتدريب العملي داخل المعهد.</p>
                    </div>
                </div>
                
                <div class="faq-item border border-gray-200 dark:border-gray-700 rounded-lg overflow-hidden">
                    <button class="faq-question w-full text-right px-6 py-4 flex justify-between items-center bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-300 focus:outline-none">
                        <span class="font-bold text-gray-900 dark:text-white">هل يمكن تغيير التخصص بعد بدء الدراسة؟</span>
                        <i class="fas fa-chevron-down text-gray-400 transition-transform duration-300"></i>
                    </button>
                    <div class="faq-answer px-6 py-4 bg-gray-50 dark:bg-gray-700 text-gray-600 dark:text-gray-300 hidden">
                        <p>نعم، يمكن للطالب تغيير تخصصه خلال السنة الأولى من الدراسة، وذلك بعد استيفاء الشروط الخاصة بالتخصص الجديد والحصول على موافقة المرشد الأكاديمي. قد يتطلب تغيير التخصص دراسة مواد إضافية لاستيفاء متطلبات التخصص الجديد.</p>
                    </div>
                </div>
                
                <div class="faq-item border border-gray-200 dark:border-gray-700 rounded-lg overflow-hidden">
                    <button class="faq-question w-full text-right px-6 py-4 flex justify-between items-center bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-300 focus:outline-none">
                        <span class="font-bold text-gray-900 dark:text-white">ما هي فرص العمل بعد التخرج؟</span>
                        <i class="fas fa-chevron-down text-gray-400 transition-transform duration-300"></i>
                    </button>
                    <div class="faq-answer px-6 py-4 bg-gray-50 dark:bg-gray-700 text-gray-600 dark:text-gray-300 hidden">
                        <p>يتمتع خريجو المعهد التقني بمعدلات توظيف عالية، حيث تصل نسبة التوظيف إلى 85% خلال الستة أشهر الأولى بعد التخرج. يوفر المعهد مكتب توظيف خاص يساعد الخريجين في إيجاد فرص عمل مناسبة، كما يقيم معارض توظيف سنوية بالتعاون مع الشركات والمؤسسات المحلية والدولية. تتنوع مجالات عمل الخريجين بين القطاع الحكومي والخاص والشركات التقنية المتخصصة.</p>
                    </div>
                </div>
                
                <div class="faq-item border border-gray-200 dark:border-gray-700 rounded-lg overflow-hidden">
                    <button class="faq-question w-full text-right px-6 py-4 flex justify-between items-center bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-300 focus:outline-none">
                        <span class="font-bold text-gray-900 dark:text-white">هل هناك سكن طلابي؟</span>
                        <i class="fas fa-chevron-down text-gray-400 transition-transform duration-300"></i>
                    </button>
                    <div class="faq-answer px-6 py-4 bg-gray-50 dark:bg-gray-700 text-gray-600 dark:text-gray-300 hidden">
                        <p>نعم، يوفر المعهد سكن طلابي للطلاب القادمين من مناطق بعيدة. يحتوي السكن على غرف مفردة ومزدوجة مجهزة بالكامل، بالإضافة إلى مرافق مشتركة مثل قاعات الدراسة، والمطبخ، وصالات الترفيه. تتوفر خدمة الإنترنت والأمن على مدار الساعة. يمكن التقديم على السكن الطلابي أثناء عملية التسجيل في المعهد.</p>
                    </div>
                </div>
            </div>
        </section>-->
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
                            <li><a href="#contact" class="text-gray-400 hover:text-white transition-colors duration-300">اتصل بنا</a></li>
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
        /*
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