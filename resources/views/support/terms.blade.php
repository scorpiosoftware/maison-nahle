@extends('layouts.home')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Language Toggle -->
    <div class="fixed top-20 right-5 z-50 space-x-2">
        <button onclick="toggleLanguage('ar')" id="ar-btn" class="px-4 py-2 rounded-lg font-medium transition-colors duration-200 bg-purple-600 text-white">العربية</button>
        <button onclick="toggleLanguage('en')" id="en-btn" class="px-4 py-2 rounded-lg font-medium transition-colors duration-200 border border-purple-600 text-purple-600 hover:bg-purple-600 hover:text-white">English</button>
    </div>

    <!-- Arabic Version -->
    <div id="arabic-content" class="language-content" dir="rtl">
        <div class="container mx-auto px-4 py-16">
            <div class="max-w-4xl mx-auto">
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                    <div class="p-8 lg:p-12">
                        <header class="text-center mb-12">
                            <h1 class="text-4xl lg:text-5xl font-bold text-purple-600 mb-4">الشروط والأحكام</h1>
                            <h2 class="text-2xl text-gray-600 font-semibold">Maison Nahle</h2>
                            <p class="text-gray-500 mt-2">آخر تحديث: 05 آب 2025</p>
                        </header>

                        <div class="space-y-8">
                            <div class="bg-gradient-to-r from-purple-50 to-indigo-50 p-6 rounded-xl">
                                <h2 class="text-2xl font-bold text-purple-600 mb-4">مرحباً بكم في Maison Nahle!</h2>
                                <p class="text-lg leading-relaxed text-gray-700 mb-4">
                                    توضح هذه الشروط والأحكام القواعد واللوائح الخاصة باستخدام موقع 
                                    <span class="font-bold text-purple-600">Maison Nahle</span> الإلكتروني، الموجود على: 
                                    <a href="https://www.maisonnahle.fashion" class="text-purple-600 hover:text-purple-800 underline">www.maisonnahle.fashion</a>.
                                </p>
                                <p class="text-lg leading-relaxed text-gray-700">
                                    من خلال الوصول إلى هذا الموقع، نفترض أنك توافق على هذه الشروط والأحكام. لا تستمر في استخدام Maison Nahle إذا كنت لا توافق على جميع الشروط والأحكام المذكورة في هذه الصفحة.
                                </p>
                            </div>

                            <section class="border-r-4 border-blue-500 pr-6">
                                <h3 class="text-2xl font-bold text-blue-600 mb-4 flex items-center">
                                    <span class="bg-blue-100 text-blue-600 rounded-full w-8 h-8 flex items-center justify-center text-lg font-bold ml-3">1</span>
                                    استخدام الموقع
                                </h3>
                                <div class="space-y-3">
                                    <div class="flex items-start space-x-3 space-x-reverse bg-blue-50 p-4 rounded-lg">
                                        <div class="w-2 h-2 bg-blue-500 rounded-full mt-2 flex-shrink-0"></div>
                                        <p class="text-gray-700">هذا الموقع مخصص للمستخدمين الذين لا تقل أعمارهم عن 18 عاماً.</p>
                                    </div>
                                    <div class="flex items-start space-x-3 space-x-reverse bg-blue-50 p-4 rounded-lg">
                                        <div class="w-2 h-2 bg-blue-500 rounded-full mt-2 flex-shrink-0"></div>
                                        <p class="text-gray-700">توافق على استخدام الموقع فقط للأغراض المشروعة وبطريقة لا تنتهك حقوق الآخرين أو تقيد أو تمنع استخدامهم للموقع.</p>
                                    </div>
                                </div>
                            </section>

                            <section class="border-r-4 border-green-500 pr-6">
                                <h3 class="text-2xl font-bold text-green-600 mb-4 flex items-center">
                                    <span class="bg-green-100 text-green-600 rounded-full w-8 h-8 flex items-center justify-center text-lg font-bold ml-3">2</span>
                                    حقوق الملكية الفكرية
                                </h3>
                                <div class="space-y-4">
                                    <div class="bg-green-50 p-4 rounded-lg">
                                        <p class="text-gray-700 mb-3">ما لم يُذكر خلاف ذلك، تملك Maison Nahle و/أو مرخصوها حقوق الملكية الفكرية لجميع المواد الموجودة على هذا الموقع.</p>
                                        <p class="text-gray-700">يمكنك عرض و/أو طباعة الصفحات للاستخدام الشخصي وفقاً للقيود المنصوص عليها في هذه الشروط والأحكام.</p>
                                    </div>
                                    <div class="bg-red-50 border border-red-200 p-4 rounded-lg">
                                        <h4 class="font-semibold text-red-700 mb-3">يجب عدم القيام بما يلي:</h4>
                                        <div class="space-y-2">
                                            <div class="flex items-center space-x-3 space-x-reverse">
                                                <svg class="w-4 h-4 text-red-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                                </svg>
                                                <p class="text-gray-700">إعادة نشر المواد من Maison Nahle</p>
                                            </div>
                                            <div class="flex items-center space-x-3 space-x-reverse">
                                                <svg class="w-4 h-4 text-red-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                                </svg>
                                                <p class="text-gray-700">بيع أو تأجير أو ترخيص المواد من الباطن</p>
                                            </div>
                                            <div class="flex items-center space-x-3 space-x-reverse">
                                                <svg class="w-4 h-4 text-red-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                                </svg>
                                                <p class="text-gray-700">إعادة إنتاج أو تكرار أو نسخ المواد للاستخدام التجاري</p>
                                            </div>
                                            <div class="flex items-center space-x-3 space-x-reverse">
                                                <svg class="w-4 h-4 text-red-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                                </svg>
                                                <p class="text-gray-700">إعادة توزيع المحتوى من Maison Nahle</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <section class="border-r-4 border-yellow-500 pr-6">
                                <h3 class="text-2xl font-bold text-yellow-600 mb-4 flex items-center">
                                    <span class="bg-yellow-100 text-yellow-600 rounded-full w-8 h-8 flex items-center justify-center text-lg font-bold ml-3">3</span>
                                    معلومات المنتج والطلبات
                                </h3>
                                <div class="space-y-3">
                                    <div class="flex items-start space-x-3 space-x-reverse bg-yellow-50 p-4 rounded-lg">
                                        <div class="w-2 h-2 bg-yellow-500 rounded-full mt-2 flex-shrink-0"></div>
                                        <p class="text-gray-700">نسعى لضمان دقة جميع أوصاف المنتجات والأسعار وتوفرها.</p>
                                    </div>
                                    <div class="flex items-start space-x-3 space-x-reverse bg-yellow-50 p-4 rounded-lg">
                                        <div class="w-2 h-2 bg-yellow-500 rounded-full mt-2 flex-shrink-0"></div>
                                        <p class="text-gray-700">نحتفظ بالحق في رفض أو إلغاء الطلبات في أي وقت لأي سبب، بما في ذلك أخطاء التسعير أو عدم توفر المنتج.</p>
                                    </div>
                                    <div class="flex items-start space-x-3 space-x-reverse bg-yellow-50 p-4 rounded-lg">
                                        <div class="w-2 h-2 bg-yellow-500 rounded-full mt-2 flex-shrink-0"></div>
                                        <p class="text-gray-700">جميع الأسعار معروضة بالدولار الأمريكي ما لم يُذكر خلاف ذلك.</p>
                                    </div>
                                </div>
                            </section>

                            <section class="border-r-4 border-indigo-500 pr-6">
                                <h3 class="text-2xl font-bold text-indigo-600 mb-4 flex items-center">
                                    <span class="bg-indigo-100 text-indigo-600 rounded-full w-8 h-8 flex items-center justify-center text-lg font-bold ml-3">4</span>
                                    الشحن والإرجاع
                                </h3>
                                <div class="space-y-3">
                                    <div class="flex items-start space-x-3 space-x-reverse bg-indigo-50 p-4 rounded-lg">
                                        <div class="w-2 h-2 bg-indigo-500 rounded-full mt-2 flex-shrink-0"></div>
                                        <p class="text-gray-700">يُرجى الرجوع إلى صفحتي [سياسة الشحن] و [سياسة الإرجاع] للحصول على معلومات مفصلة.</p>
                                    </div>
                                    <div class="flex items-start space-x-3 space-x-reverse bg-indigo-50 p-4 rounded-lg">
                                        <div class="w-2 h-2 bg-indigo-500 rounded-full mt-2 flex-shrink-0"></div>
                                        <p class="text-gray-700">Maison Nahle غير مسؤولة عن التأخير الناجم عن الجمارك أو شركات النقل.</p>
                                    </div>
                                </div>
                            </section>

                            <section class="border-r-4 border-pink-500 pr-6">
                                <h3 class="text-2xl font-bold text-pink-600 mb-4 flex items-center">
                                    <span class="bg-pink-100 text-pink-600 rounded-full w-8 h-8 flex items-center justify-center text-lg font-bold ml-3">5</span>
                                    حسابات المستخدمين
                                </h3>
                                <div class="space-y-3">
                                    <div class="flex items-start space-x-3 space-x-reverse bg-pink-50 p-4 rounded-lg">
                                        <div class="w-2 h-2 bg-pink-500 rounded-full mt-2 flex-shrink-0"></div>
                                        <p class="text-gray-700">إذا قمت بإنشاء حساب على موقعنا، فأنت مسؤول عن الحفاظ على سرية معلومات تسجيل الدخول الخاصة بك.</p>
                                    </div>
                                    <div class="flex items-start space-x-3 space-x-reverse bg-pink-50 p-4 rounded-lg">
                                        <div class="w-2 h-2 bg-pink-500 rounded-full mt-2 flex-shrink-0"></div>
                                        <p class="text-gray-700">نحتفظ بالحق في تعليق أو إنهاء الحسابات التي تنتهك هذه الشروط.</p>
                                    </div>
                                </div>
                            </section>

                            <section class="border-r-4 border-red-500 pr-6">
                                <h3 class="text-2xl font-bold text-red-600 mb-4 flex items-center">
                                    <span class="bg-red-100 text-red-600 rounded-full w-8 h-8 flex items-center justify-center text-lg font-bold ml-3">6</span>
                                    تحديد المسؤولية
                                </h3>
                                <div class="bg-red-50 border border-red-200 p-4 rounded-lg">
                                    <p class="text-gray-700">لا تتحمل Maison Nahle المسؤولية عن أي أضرار غير مباشرة أو خاصة أو عرضية أو تبعية تنشأ عن استخدام أو عدم القدرة على استخدام الموقع.</p>
                                </div>
                            </section>

                            <section class="border-r-4 border-teal-500 pr-6">
                                <h3 class="text-2xl font-bold text-teal-600 mb-4 flex items-center">
                                    <span class="bg-teal-100 text-teal-600 rounded-full w-8 h-8 flex items-center justify-center text-lg font-bold ml-3">7</span>
                                    تغييرات على الشروط
                                </h3>
                                <div class="bg-teal-50 p-4 rounded-lg">
                                    <p class="text-gray-700">نحتفظ بالحق في مراجعة هذه الشروط في أي وقت. سيتم نشر التغييرات على هذه الصفحة، واستمرارك في استخدام الموقع يشكل قبولاً للشروط المحدثة.</p>
                                </div>
                            </section>

                            <section class="border-r-4 border-purple-500 pr-6">
                                <h3 class="text-2xl font-bold text-purple-600 mb-4 flex items-center">
                                    <span class="bg-purple-100 text-purple-600 rounded-full w-8 h-8 flex items-center justify-center text-lg font-bold ml-3">8</span>
                                    القانون الحاكم
                                </h3>
                                <div class="bg-gradient-to-r from-purple-50 to-pink-50 p-6 rounded-xl border border-purple-200">
                                    <p class="text-gray-700 font-medium">تخضع هذه الشروط وتُفسر وفقاً لقوانين الجمهورية اللبنانية.</p>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- English Version -->
    <div id="english-content" class="language-content hidden">
        <div class="container mx-auto px-4 py-16">
            <div class="max-w-4xl mx-auto">
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                    <div class="p-8 lg:p-12">
                        <header class="text-center mb-12">
                            <h1 class="text-4xl lg:text-5xl font-bold text-purple-600 mb-4">Terms & Conditions</h1>
                            <h2 class="text-2xl text-gray-600 font-semibold">Maison Nahle</h2>
                            <p class="text-gray-500 mt-2">Last Updated: August 5, 2025</p>
                        </header>

                        <div class="space-y-8">
                            <div class="bg-gradient-to-r from-purple-50 to-indigo-50 p-6 rounded-xl">
                                <h2 class="text-2xl font-bold text-purple-600 mb-4">Welcome to Maison Nahle!</h2>
                                <p class="text-lg leading-relaxed text-gray-700 mb-4">
                                    These terms and conditions outline the rules and regulations for the use of 
                                    <span class="font-bold text-purple-600">Maison Nahle's</span> Website, located at 
                                    <a href="https://www.maisonnahle.fashion" class="text-purple-600 hover:text-purple-800 underline">www.maisonnahle.fashion</a>.
                                </p>
                                <p class="text-lg leading-relaxed text-gray-700">
                                    By accessing this website, we assume you accept these terms and conditions. Do not continue to use Maison Nahle if you do not agree to take all of the terms and conditions stated on this page.
                                </p>
                            </div>

                            <section class="border-l-4 border-blue-500 pl-6">
                                <h3 class="text-2xl font-bold text-blue-600 mb-4 flex items-center">
                                    <span class="bg-blue-100 text-blue-600 rounded-full w-8 h-8 flex items-center justify-center text-lg font-bold mr-3">1</span>
                                    Use of the Site
                                </h3>
                                <div class="space-y-3">
                                    <div class="flex items-start space-x-3 bg-blue-50 p-4 rounded-lg">
                                        <div class="w-2 h-2 bg-blue-500 rounded-full mt-2 flex-shrink-0"></div>
                                        <p class="text-gray-700">This website is intended for users who are at least 18 years of age.</p>
                                    </div>
                                    <div class="flex items-start space-x-3 bg-blue-50 p-4 rounded-lg">
                                        <div class="w-2 h-2 bg-blue-500 rounded-full mt-2 flex-shrink-0"></div>
                                        <p class="text-gray-700">You agree to use the site only for lawful purposes and in a way that does not infringe the rights of, restrict or inhibit anyone else's use of the site.</p>
                                    </div>
                                </div>
                            </section>

                            <section class="border-l-4 border-green-500 pl-6">
                                <h3 class="text-2xl font-bold text-green-600 mb-4 flex items-center">
                                    <span class="bg-green-100 text-green-600 rounded-full w-8 h-8 flex items-center justify-center text-lg font-bold mr-3">2</span>
                                    Intellectual Property Rights
                                </h3>
                                <div class="space-y-4">
                                    <div class="bg-green-50 p-4 rounded-lg">
                                        <p class="text-gray-700 mb-3">Unless otherwise stated, Maison Nahle and/or its licensors own the intellectual property rights for all material on this site.</p>
                                        <p class="text-gray-700">You may view and/or print pages for your personal use subject to restrictions set in these terms and conditions.</p>
                                    </div>
                                    <div class="bg-red-50 border border-red-200 p-4 rounded-lg">
                                        <h4 class="font-semibold text-red-700 mb-3">You must not:</h4>
                                        <div class="space-y-2">
                                            <div class="flex items-center space-x-3">
                                                <svg class="w-4 h-4 text-red-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                                </svg>
                                                <p class="text-gray-700">Republish material from Maison Nahle</p>
                                            </div>
                                            <div class="flex items-center space-x-3">
                                                <svg class="w-4 h-4 text-red-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                                </svg>
                                                <p class="text-gray-700">Sell, rent or sub-license material</p>
                                            </div>
                                            <div class="flex items-center space-x-3">
                                                <svg class="w-4 h-4 text-red-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                                </svg>
                                                <p class="text-gray-700">Reproduce, duplicate or copy material for commercial use</p>
                                            </div>
                                            <div class="flex items-center space-x-3">
                                                <svg class="w-4 h-4 text-red-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                                </svg>
                                                <p class="text-gray-700">Redistribute content from Maison Nahle</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <section class="border-l-4 border-yellow-500 pl-6">
                                <h3 class="text-2xl font-bold text-yellow-600 mb-4 flex items-center">
                                    <span class="bg-yellow-100 text-yellow-600 rounded-full w-8 h-8 flex items-center justify-center text-lg font-bold mr-3">3</span>
                                    Product Information & Orders
                                </h3>
                                <div class="space-y-3">
                                    <div class="flex items-start space-x-3 bg-yellow-50 p-4 rounded-lg">
                                        <div class="w-2 h-2 bg-yellow-500 rounded-full mt-2 flex-shrink-0"></div>
                                        <p class="text-gray-700">We strive to ensure all product descriptions, pricing, and availability are accurate.</p>
                                    </div>
                                    <div class="flex items-start space-x-3 bg-yellow-50 p-4 rounded-lg">
                                        <div class="w-2 h-2 bg-yellow-500 rounded-full mt-2 flex-shrink-0"></div>
                                        <p class="text-gray-700">We reserve the right to refuse or cancel orders at any time for any reason, including pricing errors or product unavailability.</p>
                                    </div>
                                    <div class="flex items-start space-x-3 bg-yellow-50 p-4 rounded-lg">
                                        <div class="w-2 h-2 bg-yellow-500 rounded-full mt-2 flex-shrink-0"></div>
                                        <p class="text-gray-700">All prices are displayed in USD unless stated otherwise.</p>
                                    </div>
                                </div>
                            </section>

                            <section class="border-l-4 border-indigo-500 pl-6">
                                <h3 class="text-2xl font-bold text-indigo-600 mb-4 flex items-center">
                                    <span class="bg-indigo-100 text-indigo-600 rounded-full w-8 h-8 flex items-center justify-center text-lg font-bold mr-3">4</span>
                                    Shipping & Returns
                                </h3>
                                <div class="space-y-3">
                                    <div class="flex items-start space-x-3 bg-indigo-50 p-4 rounded-lg">
                                        <div class="w-2 h-2 bg-indigo-500 rounded-full mt-2 flex-shrink-0"></div>
                                        <p class="text-gray-700">Please refer to our [Shipping Policy] and [Return Policy] pages for detailed information.</p>
                                    </div>
                                    <div class="flex items-start space-x-3 bg-indigo-50 p-4 rounded-lg">
                                        <div class="w-2 h-2 bg-indigo-500 rounded-full mt-2 flex-shrink-0"></div>
                                        <p class="text-gray-700">Maison Nahle is not responsible for delays caused by customs or carriers.</p>
                                    </div>
                                </div>
                            </section>

                            <section class="border-l-4 border-pink-500 pl-6">
                                <h3 class="text-2xl font-bold text-pink-600 mb-4 flex items-center">
                                    <span class="bg-pink-100 text-pink-600 rounded-full w-8 h-8 flex items-center justify-center text-lg font-bold mr-3">5</span>
                                    User Accounts
                                </h3>
                                <div class="space-y-3">
                                    <div class="flex items-start space-x-3 bg-pink-50 p-4 rounded-lg">
                                        <div class="w-2 h-2 bg-pink-500 rounded-full mt-2 flex-shrink-0"></div>
                                        <p class="text-gray-700">If you create an account on our website, you are responsible for maintaining the confidentiality of your login information.</p>
                                    </div>
                                    <div class="flex items-start space-x-3 bg-pink-50 p-4 rounded-lg">
                                        <div class="w-2 h-2 bg-pink-500 rounded-full mt-2 flex-shrink-0"></div>
                                        <p class="text-gray-700">We reserve the right to suspend or terminate accounts that violate these terms.</p>
                                    </div>
                                </div>
                            </section>

                            <section class="border-l-4 border-red-500 pl-6">
                                <h3 class="text-2xl font-bold text-red-600 mb-4 flex items-center">
                                    <span class="bg-red-100 text-red-600 rounded-full w-8 h-8 flex items-center justify-center text-lg font-bold mr-3">6</span>
                                    Limitation of Liability
                                </h3>
                                <div class="bg-red-50 border border-red-200 p-4 rounded-lg">
                                    <p class="text-gray-700">Maison Nahle shall not be held liable for any indirect, special, incidental, or consequential damages arising out of the use or inability to use the website.</p>
                                </div>
                            </section>

                            <section class="border-l-4 border-teal-500 pl-6">
                                <h3 class="text-2xl font-bold text-teal-600 mb-4 flex items-center">
                                    <span class="bg-teal-100 text-teal-600 rounded-full w-8 h-8 flex items-center justify-center text-lg font-bold mr-3">7</span>
                                    Changes to Terms
                                </h3>
                                <div class="bg-teal-50 p-4 rounded-lg">
                                    <p class="text-gray-700">We reserve the right to revise these terms at any time. Changes will be posted on this page, and your continued use of the site constitutes acceptance of the updated terms.</p>
                                </div>
                            </section>

                            <section class="border-l-4 border-purple-500 pl-6">
                                <h3 class="text-2xl font-bold text-purple-600 mb-4 flex items-center">
                                    <span class="bg-purple-100 text-purple-600 rounded-full w-8 h-8 flex items-center justify-center text-lg font-bold mr-3">8</span>
                                    Governing Law
                                </h3>
                                <div class="bg-gradient-to-r from-purple-50 to-pink-50 p-6 rounded-xl border border-purple-200">
                                    <p class="text-gray-700 font-medium">These terms are governed by and construed in accordance with the laws of the Republic of Lebanon.</p>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function toggleLanguage(lang) {
    const arabicContent = document.getElementById('arabic-content');
    const englishContent = document.getElementById('english-content');
    const arBtn = document.getElementById('ar-btn');
    const enBtn = document.getElementById('en-btn');
    
    if (lang === 'ar') {
        arabicContent.classList.remove('hidden');
        englishContent.classList.add('hidden');
        arBtn.classList.remove('border', 'border-purple-600', 'text-purple-600', 'hover:bg-purple-600', 'hover:text-white');
        arBtn.classList.add('bg-purple-600', 'text-white');
        enBtn.classList.remove('bg-purple-600', 'text-white');
        enBtn.classList.add('border', 'border-purple-600', 'text-purple-600', 'hover:bg-purple-600', 'hover:text-white');
    } else {
        arabicContent.classList.add('hidden');
        englishContent.classList.remove('hidden');
        enBtn.classList.remove('border', 'border-purple-600', 'text-purple-600', 'hover:bg-purple-600', 'hover:text-white');
        enBtn.classList.add('bg-purple-600', 'text-white');
        arBtn.classList.remove('bg-purple-600', 'text-white');
        arBtn.classList.add('border', 'border-purple-600', 'text-purple-600', 'hover:bg-purple-600', 'hover:text-white');
    }
}

// Set default language to Arabic
document.addEventListener('DOMContentLoaded', function() {
    toggleLanguage('en');
});
</script>
@endsection