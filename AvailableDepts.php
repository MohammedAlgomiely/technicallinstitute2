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
                        third: '#FFFF00'
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
                    <a href="#programs" class="px-3 py-2 rounded-md text-sm font-bold text-gray-700 dark:text-gray-300 hover:text-primary transition-colors duration-300 bg-transparent hover:bg-primary hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">التخصصات</a>
                    <a href="requirements.php" class="px-3 py-2 rounded-md text-sm font-bold text-gray-700 dark:text-gray-300 hover:text-primary transition-colors duration-300 bg-transparent hover:bg-primary hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">شروط التسجيل والقبول</a>
                    <a href="login_page.php" class="px-3 py-2 rounded-md text-sm font-bold text-gray-700 dark:text-gray-300 hover:text-primary transition-colors duration-300 bg-transparent hover:bg-primary hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">تنسيق</a>
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
                <a href="#programs" class="block px-3 py-2 rounded-md text-base font-bold text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-primary dark:hover:text-primary transition-colors duration-300">التخصصات</a>
                <a href="requirements.php" class="block px-3 py-2 rounded-md text-base font-bold text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-primary dark:hover:text-primary transition-colors duration-300">شروط التسجيل والقبول</a>
                <a href="login_page.php" class="block px-3 py-2 rounded-md text-base font-bold text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-primary dark:hover:text-primary transition-colors duration-300">تنسيق</a>
                <a href="contact.php" class="block px-3 py-2 rounded-md text-base font-bold text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-primary dark:hover:text-primary transition-colors duration-300">التواصل</a>
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
                        <a href="#application" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-bold rounded-md shadow-sm text-white bg-primary hover:bg-secondary focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-colors duration-300">
                            قم بالتنسيق الآن
                        </a>
                        <a href="#programs" class="inline-flex items-center px-6 py-3 border border-primary text-base font-bold rounded-md text-primary bg-transparent hover:bg-primary hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-colors duration-300">
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
        <section id="programs" class="py-12 border-t border-gray-200 dark:border-gray-700 fade-in">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white">التخصصات المتاحة</h2>
                <!--<p class="mt-2 text-lg text-gray-600 dark:text-gray-400">استكشف برامجنا التعليمية المتميزة</p>-->
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Program Card 1 -->
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
                            <span class="px-2 py-1 bg-third/20 text-xs rounded-full">المدة: سنتان</span>
                        </div>
                    </div>
                </div>
                
                <!-- Program Card 2 -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                    <div class="bg-primary h-2 w-full"></div>
                    <div class="p-6">
                        <div class="w-12 h-12 rounded-lg bg-primary/10 flex items-center justify-center text-primary mb-4">
                            <i class="fas fa-shield-halved text-xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">الأمن السيبراني</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-4">تصميم وإدارة أمن شبكات الحاسب وأنظمة الأمن السيبراني.</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-2 py-1 bg-primary/10 text-primary text-xs rounded-full">أمن شبكات</span>
                            <span class="px-2 py-1 bg-primary/10 text-primary text-xs rounded-full">أمن سيبراني</span>
                        </div>
                        <div class="flex justify-between text-sm text-gray-500 dark:text-gray-400">
                            <span class="px-2 py-1 bg-third/20 text-xs rounded-full">المدة: سنتان</span>
                        </div>
                    </div>
                </div>
                
                <!-- Program Card 3 -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                    <div class="bg-primary h-2 w-full"></div>
                    <div class="p-6">
                        <div class="w-12 h-12 rounded-lg bg-primary/10 flex items-center justify-center text-primary mb-4">
                            <i class="fas fa-calculator text-xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">المحاسبة</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-4">إدارة السجلات المالية وتحليلها ، مع التركيز على الجوانب التطبيقية لسوق العمل.</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-2 py-1 bg-primary/10 text-primary text-xs rounded-full">محاسبة التكاليف</span>
                            <span class="px-2 py-1 bg-primary/10 text-primary text-xs rounded-full">برامج محاسبية</span>
                            <span class="px-2 py-1 bg-primary/10 text-primary text-xs rounded-full">مراجعة الحسابات</span>
                        </div>
                        <div class="flex justify-between text-sm text-gray-500 dark:text-gray-400">
                            <span class="px-2 py-1 bg-third/20 text-xs rounded-full">المدة: سنتان</span>
                        </div>
                    </div>
                </div>
                
                <!-- Program Card 4 -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                    <div class="bg-primary h-2 w-full"></div>
                    <div class="p-6">
                        <div class="w-12 h-12 rounded-lg bg-primary/10 flex items-center justify-center text-primary mb-4">
                            <i class="fas fa-briefcase text-xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">إدارة الأعمال</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-4">الجمع بين مهارات إدارة الأعمال والتقنيات الحديثة لقيادة المشاريع التقنية.</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-2 py-1 bg-primary/10 text-primary text-xs rounded-full">إدارة</span>
                            <span class="px-2 py-1 bg-primary/10 text-primary text-xs rounded-full">ريادة أعمال</span>
                        </div>
                        <div class="flex justify-between text-sm text-gray-500 dark:text-gray-400">
                            <span class="px-2 py-1 bg-third/20 text-xs rounded-full">المدة: سنتان</span>
                        </div>
                    </div>
                </div>
                
                <!-- Program Card 5 -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                    <div class="bg-primary h-2 w-full"></div>
                    <div class="p-6">
                        <div class="w-12 h-12 rounded-lg bg-primary/10 flex items-center justify-center text-primary mb-4">
                            <i class="fas fa-cart-shopping text-xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">التسويق</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-4">تعلم مهارات التسويق اللازمة ومهارات التسويق الرقمي.</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-2 py-1 bg-primary/10 text-primary text-xs rounded-full">تسويق</span>
                            <span class="px-2 py-1 bg-primary/10 text-primary text-xs rounded-full">تسويق رقمي</span>
                        </div>
                        <div class="flex justify-between text-sm text-gray-500 dark:text-gray-400">
                            <span class="px-2 py-1 bg-third/20 text-xs rounded-full">المدة: سنتان</span>
                        </div>
                    </div>
                </div>
                
                <!-- Program Card 6 -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                    <div class="bg-primary h-2 w-full"></div>
                    <div class="p-6">
                        <div class="w-12 h-12 rounded-lg bg-primary/10 flex items-center justify-center text-primary mb-4">
                            <i class="fas fa-desktop text-xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">ادارة المكاتب</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-4">ادارة المهام الإدارية اليومية في المكاتب بكفاءة والتركيز على المهارات اللازمة لسوق العمل.</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-2 py-1 bg-primary/10 text-primary text-xs rounded-full">تنظيم المكاتب</span>
                            <span class="px-2 py-1 bg-primary/10 text-primary text-xs rounded-full">مهارات التواصل</span>
                            <span class="px-2 py-1 bg-primary/10 text-primary text-xs rounded-full">إدارة الموارد</span>
                        </div>
                        <div class="flex justify-between text-sm text-gray-500 dark:text-gray-400">
                            <span class="px-2 py-1 bg-third/20 text-xs rounded-full">المدة: سنتان</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!--<div class="mt-10 text-center">
                <button id="show-more-programs" class="inline-flex items-center px-6 py-3 border border-primary text-base font-bold rounded-md text-primary bg-transparent hover:bg-primary hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-colors duration-300">
                    <span>عرض المزيد من التخصصات</span>
                    <i class="fas fa-chevron-down mr-2"></i>
                </button>
            </div>-->
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
                            <li><a href="#programs" class="text-gray-400 hover:text-white transition-colors duration-300">التخصصات</a></li>
                            <li><a href="requirements.php" class="text-gray-400 hover:text-white transition-colors duration-300">شروط  التسجيل والقبول</a></li>
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
        });
        */
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
