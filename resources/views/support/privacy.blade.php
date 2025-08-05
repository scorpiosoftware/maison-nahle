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
                            <h1 class="text-4xl lg:text-5xl font-bold text-purple-600 mb-4">سياسة الخصوصية</h1>
                            <h2 class="text-2xl text-gray-600 font-semibold">Maison Nahle</h2>
                            <p class="text-gray-500 mt-2">آخر تحديث: 05 آب 2025</p>
                        </header>

                        <div class="space-y-8">
                            <div class="bg-gradient-to-r from-purple-50 to-indigo-50 p-6 rounded-xl">
                                <p class="text-lg leading-relaxed text-gray-700">
                                    في <span class="font-bold text-purple-600">Maison Nahle</span>، نحترم خصوصيتك ونلتزم بحماية المعلومات الشخصية التي تشاركها معنا عند زيارة موقعنا الإلكتروني: 
                                    <a href="https://www.maisonnahle.fashion" class="text-purple-600 hover:text-purple-800 underline">www.maisonnahle.fashion</a>. 
                                    تهدف سياسة الخصوصية هذه إلى توضيح كيفية جمع واستخدام وحماية معلوماتك.
                                </p>
                            </div>

                            <section class="border-r-4 border-purple-500 pr-6">
                                <h3 class="text-2xl font-bold text-purple-600 mb-4 flex items-center">
                                    <span class="bg-purple-100 text-purple-600 rounded-full w-8 h-8 flex items-center justify-center text-lg font-bold ml-3">1</span>
                                    المعلومات التي نقوم بجمعها:
                                </h3>
                                <p class="text-gray-700 mb-4">قد نقوم بجمع الأنواع التالية من المعلومات:</p>
                                <div class="space-y-4">
                                    <div class="flex items-start space-x-4 space-x-reverse bg-gray-50 p-4 rounded-lg">
                                        <div class="bg-purple-100 p-2 rounded-lg flex-shrink-0">
                                            <svg class="w-6 h-6 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <h4 class="font-semibold text-gray-800 mb-1">المعلومات الشخصية:</h4>
                                            <p class="text-gray-600">مثل الاسم، رقم الهاتف، عنوان البريد الإلكتروني، وعنوان التوصيل، عند إتمام عملية شراء أو تأجير.</p>
                                        </div>
                                    </div>
                                    <div class="flex items-start space-x-4 space-x-reverse bg-gray-50 p-4 rounded-lg">
                                        <div class="bg-purple-100 p-2 rounded-lg flex-shrink-0">
                                            <svg class="w-6 h-6 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4zM18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <h4 class="font-semibold text-gray-800 mb-1">معلومات الدفع:</h4>
                                            <p class="text-gray-600">تتم معالجتها من خلال بوابات دفع آمنة (لا نخزن بيانات البطاقات بأنفسنا).</p>
                                        </div>
                                    </div>
                                    <div class="flex items-start space-x-4 space-x-reverse bg-gray-50 p-4 rounded-lg">
                                        <div class="bg-purple-100 p-2 rounded-lg flex-shrink-0">
                                            <svg class="w-6 h-6 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <h4 class="font-semibold text-gray-800 mb-1">بيانات الاستخدام:</h4>
                                            <p class="text-gray-600">مثل الصفحات التي تزورها، وقت التصفح، ونوع الجهاز المستخدم -- بهدف تحسين تجربتك.</p>
                                        </div>
                                    </div>
                                    <div class="flex items-start space-x-4 space-x-reverse bg-gray-50 p-4 rounded-lg">
                                        <div class="bg-purple-100 p-2 rounded-lg flex-shrink-0">
                                            <svg class="w-6 h-6 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M6.672 1.911a1 1 0 10-1.932.518l.259.966a1 1 0 001.932-.518l-.26-.966zM2.429 4.74a1 1 0 10-.517 1.932l.966.259a1 1 0 00.517-1.932l-.966-.26zm8.814-.569a1 1 0 00-1.415-1.414l-.707.707a1 1 0 101.415 1.415l.707-.708zm-7.071 7.072l.707-.707A1 1 0 003.465 9.12l-.708.707a1 1 0 001.415 1.415zm3.2-5.171a1 1 0 00-1.3 1.3l4 10a1 1 0 001.823.075l1.38-2.759 3.018 3.02a1 1 0 001.414-1.415l-3.019-3.02 2.76-1.379a1 1 0 00-.076-1.822l-10-4z" clip-rule="evenodd"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <h4 class="font-semibold text-gray-800 mb-1">ملفات تعريف الارتباط (Cookies):</h4>
                                            <p class="text-gray-600">نستخدمها لتقديم تجربة مخصصة وتسهيل التصفح.</p>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <section class="border-r-4 border-green-500 pr-6">
                                <h3 class="text-2xl font-bold text-green-600 mb-4 flex items-center">
                                    <span class="bg-green-100 text-green-600 rounded-full w-8 h-8 flex items-center justify-center text-lg font-bold ml-3">2</span>
                                    كيف نستخدم معلوماتك:
                                </h3>
                                <div class="grid gap-3">
                                    <div class="flex items-center space-x-3 space-x-reverse">
                                        <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                                        <p class="text-gray-700">لمعالجة الطلبات (شراء أو تأجير).</p>
                                    </div>
                                    <div class="flex items-center space-x-3 space-x-reverse">
                                        <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                                        <p class="text-gray-700">للاتصال بك بشأن الطلب أو خدمة العملاء.</p>
                                    </div>
                                    <div class="flex items-center space-x-3 space-x-reverse">
                                        <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                                        <p class="text-gray-700">لإرسال تحديثات وعروض خاصة (فقط بعد موافقتك).</p>
                                    </div>
                                    <div class="flex items-center space-x-3 space-x-reverse">
                                        <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                                        <p class="text-gray-700">لتحسين أداء الموقع وتجربتك معنا.</p>
                                    </div>
                                </div>
                            </section>

                            <section class="border-r-4 border-blue-500 pr-6">
                                <h3 class="text-2xl font-bold text-blue-600 mb-4 flex items-center">
                                    <span class="bg-blue-100 text-blue-600 rounded-full w-8 h-8 flex items-center justify-center text-lg font-bold ml-3">3</span>
                                    حماية المعلومات:
                                </h3>
                                <div class="bg-gradient-to-r from-blue-50 to-cyan-50 p-6 rounded-xl border border-blue-200">
                                    <p class="text-gray-700 mb-3">نتّبع أفضل الممارسات الأمنية لحماية بياناتك من الوصول غير المصرّح به، الفقدان، أو الاستخدام غير القانوني.</p>
                                    <p class="text-gray-700">نستخدم بروتوكولات تشفير واتصال آمن (HTTPS) وبوابات دفع موثوقة.</p>
                                </div>
                            </section>

                            <section class="border-r-4 border-yellow-500 pr-6">
                                <h3 class="text-2xl font-bold text-yellow-600 mb-4 flex items-center">
                                    <span class="bg-yellow-100 text-yellow-600 rounded-full w-8 h-8 flex items-center justify-center text-lg font-bold ml-3">4</span>
                                    مشاركة المعلومات:
                                </h3>
                                <p class="text-gray-700 mb-4">لا نشارك معلوماتك الشخصية مع أي جهة خارجية، باستثناء:</p>
                                <div class="space-y-3">
                                    <div class="flex items-center space-x-3 space-x-reverse bg-yellow-50 p-3 rounded-lg">
                                        <div class="w-2 h-2 bg-yellow-500 rounded-full"></div>
                                        <p class="text-gray-700">شركاء الشحن لتوصيل الطلبات.</p>
                                    </div>
                                    <div class="flex items-center space-x-3 space-x-reverse bg-yellow-50 p-3 rounded-lg">
                                        <div class="w-2 h-2 bg-yellow-500 rounded-full"></div>
                                        <p class="text-gray-700">مزودي الدفع الآمن.</p>
                                    </div>
                                    <div class="flex items-center space-x-3 space-x-reverse bg-yellow-50 p-3 rounded-lg">
                                        <div class="w-2 h-2 bg-yellow-500 rounded-full"></div>
                                        <p class="text-gray-700">الهيئات القانونية إذا طُلب ذلك بموجب القانون.</p>
                                    </div>
                                </div>
                            </section>

                            <section class="border-r-4 border-indigo-500 pr-6">
                                <h3 class="text-2xl font-bold text-indigo-600 mb-4 flex items-center">
                                    <span class="bg-indigo-100 text-indigo-600 rounded-full w-8 h-8 flex items-center justify-center text-lg font-bold ml-3">5</span>
                                    حقوقك كمستخدم:
                                </h3>
                                <p class="text-gray-700 mb-4">بموجب القوانين المعتمدة (مثل الـ GDPR)، يحق لك:</p>
                                <div class="grid gap-3">
                                    <div class="flex items-center space-x-3 space-x-reverse bg-indigo-50 p-3 rounded-lg">
                                        <div class="w-2 h-2 bg-indigo-500 rounded-full"></div>
                                        <p class="text-gray-700">الوصول إلى بياناتك الشخصية.</p>
                                    </div>
                                    <div class="flex items-center space-x-3 space-x-reverse bg-indigo-50 p-3 rounded-lg">
                                        <div class="w-2 h-2 bg-indigo-500 rounded-full"></div>
                                        <p class="text-gray-700">طلب تعديل أو حذف بياناتك.</p>
                                    </div>
                                    <div class="flex items-center space-x-3 space-x-reverse bg-indigo-50 p-3 rounded-lg">
                                        <div class="w-2 h-2 bg-indigo-500 rounded-full"></div>
                                        <p class="text-gray-700">سحب موافقتك على تلقي الإعلانات.</p>
                                    </div>
                                    <div class="flex items-center space-x-3 space-x-reverse bg-indigo-50 p-3 rounded-lg">
                                        <div class="w-2 h-2 bg-indigo-500 rounded-full"></div>
                                        <p class="text-gray-700">التواصل معنا للاستفسار أو الاعتراض.</p>
                                    </div>
                                </div>
                            </section>

                            <section class="border-r-4 border-pink-500 pr-6">
                                <h3 class="text-2xl font-bold text-pink-600 mb-4 flex items-center">
                                    <span class="bg-pink-100 text-pink-600 rounded-full w-8 h-8 flex items-center justify-center text-lg font-bold ml-3">6</span>
                                    ملفات تعريف الارتباط (Cookies):
                                </h3>
                                <p class="text-gray-700">يستخدم موقعنا ملفات تعريف الارتباط لتحليل الأداء وتحسين الخدمة. يمكنك تعطيلها من إعدادات المتصفح إذا رغبت بذلك، مع العلم أن بعض الوظائف قد تتأثر.</p>
                            </section>

                            <section class="border-r-4 border-red-500 pr-6">
                                <h3 class="text-2xl font-bold text-red-600 mb-4 flex items-center">
                                    <span class="bg-red-100 text-red-600 rounded-full w-8 h-8 flex items-center justify-center text-lg font-bold ml-3">7</span>
                                    روابط خارجية:
                                </h3>
                                <p class="text-gray-700">قد يحتوي موقعنا على روابط لمواقع أخرى. نحن غير مسؤولين عن سياسات الخصوصية لتلك المواقع، لذا يُرجى مراجعتها عند الانتقال إليها.</p>
                            </section>

                            <section class="border-r-4 border-teal-500 pr-6">
                                <h3 class="text-2xl font-bold text-teal-600 mb-4 flex items-center">
                                    <span class="bg-teal-100 text-teal-600 rounded-full w-8 h-8 flex items-center justify-center text-lg font-bold ml-3">8</span>
                                    التعديلات على سياسة الخصوصية:
                                </h3>
                                <p class="text-gray-700">قد نقوم بتحديث هذه السياسة من وقت لآخر. سيتم نشر أي تغييرات على هذه الصفحة مع تحديث التاريخ في الأعلى.</p>
                            </section>

                            <section class="border-r-4 border-purple-500 pr-6">
                                <h3 class="text-2xl font-bold text-purple-600 mb-4 flex items-center">
                                    <span class="bg-purple-100 text-purple-600 rounded-full w-8 h-8 flex items-center justify-center text-lg font-bold ml-3">9</span>
                                    تواصل معنا:
                                </h3>
                                <p class="text-gray-700 mb-4">إذا كان لديك أي استفسار بخصوص سياسة الخصوصية أو بياناتك الشخصية، يُرجى التواصل معنا عبر:</p>
                                <div class="bg-gradient-to-r from-purple-50 to-pink-50 p-6 rounded-xl border border-purple-200">
                                    <div class="space-y-3">
                                        <div class="flex items-center space-x-3 space-x-reverse">
                                            <svg class="w-5 h-5 text-purple-600 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                                            </svg>
                                            <div>
                                                <span class="font-semibold text-gray-800">البريد الإلكتروني:</span>
                                                <a href="mailto:info@maisonnahle.fashion" class="text-purple-600 hover:text-purple-800 underline mr-2">info@maisonnahle.fashion</a>
                                            </div>
                                        </div>
                                        <div class="flex items-center space-x-3 space-x-reverse">
                                            <svg class="w-5 h-5 text-purple-600 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                                            </svg>
                                            <div>
                                                <span class="font-semibold text-gray-800">العنوان:</span>
                                                <span class="text-gray-700 mr-2">بيروت، لبنان -- صالة Maison Nahle</span>
                                            </div>
                                        </div>
                                    </div>
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
                            <h1 class="text-4xl lg:text-5xl font-bold text-purple-600 mb-4">Privacy Policy</h1>
                            <h2 class="text-2xl text-gray-600 font-semibold">Maison Nahle</h2>
                            <p class="text-gray-500 mt-2">Last Updated: August 5, 2025</p>
                        </header>

                        <div class="space-y-8">
                            <div class="bg-gradient-to-r from-purple-50 to-indigo-50 p-6 rounded-xl">
                                <p class="text-lg leading-relaxed text-gray-700">
                                    At <span class="font-bold text-purple-600">Maison Nahle</span>, we respect your privacy and are committed to protecting the personal information you share with us when visiting our website: 
                                    <a href="https://www.maisonnahle.fashion" class="text-purple-600 hover:text-purple-800 underline">www.maisonnahle.fashion</a>. 
                                    This Privacy Policy explains how we collect, use, and protect your data.
                                </p>
                            </div>

                            <section class="border-l-4 border-purple-500 pl-6">
                                <h3 class="text-2xl font-bold text-purple-600 mb-4 flex items-center">
                                    <span class="bg-purple-100 text-purple-600 rounded-full w-8 h-8 flex items-center justify-center text-lg font-bold mr-3">1</span>
                                    Information We Collect:
                                </h3>
                                <p class="text-gray-700 mb-4">We may collect the following types of information:</p>
                                <div class="space-y-4">
                                    <div class="flex items-start space-x-4 bg-gray-50 p-4 rounded-lg">
                                        <div class="bg-purple-100 p-2 rounded-lg flex-shrink-0">
                                            <svg class="w-6 h-6 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <h4 class="font-semibold text-gray-800 mb-1">Personal Information:</h4>
                                            <p class="text-gray-600">Such as your name, phone number, email address, and delivery address -- when completing a purchase or rental order.</p>
                                        </div>
                                    </div>
                                    <div class="flex items-start space-x-4 bg-gray-50 p-4 rounded-lg">
                                        <div class="bg-purple-100 p-2 rounded-lg flex-shrink-0">
                                            <svg class="w-6 h-6 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4zM18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <h4 class="font-semibold text-gray-800 mb-1">Payment Information:</h4>
                                            <p class="text-gray-600">Processed securely through trusted payment gateways (we do not store your card details ourselves).</p>
                                        </div>
                                    </div>
                                    <div class="flex items-start space-x-4 bg-gray-50 p-4 rounded-lg">
                                        <div class="bg-purple-100 p-2 rounded-lg flex-shrink-0">
                                            <svg class="w-6 h-6 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <h4 class="font-semibold text-gray-800 mb-1">Usage Data:</h4>
                                            <p class="text-gray-600">Pages visited, browsing time, and device type -- used to enhance your experience.</p>
                                        </div>
                                    </div>
                                    <div class="flex items-start space-x-4 bg-gray-50 p-4 rounded-lg">
                                        <div class="bg-purple-100 p-2 rounded-lg flex-shrink-0">
                                            <svg class="w-6 h-6 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M6.672 1.911a1 1 0 10-1.932.518l.259.966a1 1 0 001.932-.518l-.26-.966zM2.429 4.74a1 1 0 10-.517 1.932l.966.259a1 1 0 00.517-1.932l-.966-.26zm8.814-.569a1 1 0 00-1.415-1.414l-.707.707a1 1 0 101.415 1.415l.707-.708zm-7.071 7.072l.707-.707A1 1 0 003.465 9.12l-.708.707a1 1 0 001.415 1.415zm3.2-5.171a1 1 0 00-1.3 1.3l4 10a1 1 0 001.823.075l1.38-2.759 3.018 3.02a1 1 0 001.414-1.415l-3.019-3.02 2.76-1.379a1 1 0 00-.076-1.822l-10-4z" clip-rule="evenodd"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <h4 class="font-semibold text-gray-800 mb-1">Cookies:</h4>
                                            <p class="text-gray-600">Used to personalize your visit and improve navigation on the site.</p>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <section class="border-l-4 border-green-500 pl-6">
                                <h3 class="text-2xl font-bold text-green-600 mb-4 flex items-center">
                                    <span class="bg-green-100 text-green-600 rounded-full w-8 h-8 flex items-center justify-center text-lg font-bold mr-3">2</span>
                                    How We Use Your Information:
                                </h3>
                                <div class="grid gap-3">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                                        <p class="text-gray-700">To process your orders (purchase or rental).</p>
                                    </div>
                                    <div class="flex items-center space-x-3">
                                        <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                                        <p class="text-gray-700">To contact you regarding your order or for customer support.</p>
                                    </div>
                                    <div class="flex items-center space-x-3">
                                        <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                                        <p class="text-gray-700">To send you updates and promotional offers (only with your consent).</p>
                                    </div>
                                    <div class="flex items-center space-x-3">
                                        <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                                        <p class="text-gray-700">To improve website performance and user experience.</p>
                                    </div>
                                </div>
                            </section>

                            <section class="border-l-4 border-blue-500 pl-6">
                                <h3 class="text-2xl font-bold text-blue-600 mb-4 flex items-center">
                                    <span class="bg-blue-100 text-blue-600 rounded-full w-8 h-8 flex items-center justify-center text-lg font-bold mr-3">3</span>
                                    Data Protection:
                                </h3>
                                <div class="bg-gradient-to-r from-blue-50 to-cyan-50 p-6 rounded-xl border border-blue-200">
                                    <p class="text-gray-700 mb-3">We follow best industry practices to protect your data from unauthorized access, loss, or misuse.</p>
                                    <p class="text-gray-700">We use secure encryption protocols (HTTPS) and trusted payment gateways.</p>
                                </div>
                            </section>

                            <section class="border-l-4 border-yellow-500 pl-6">
                                <h3 class="text-2xl font-bold text-yellow-600 mb-4 flex items-center">
                                    <span class="bg-yellow-100 text-yellow-600 rounded-full w-8 h-8 flex items-center justify-center text-lg font-bold mr-3">4</span>
                                    Information Sharing:
                                </h3>
                                <p class="text-gray-700 mb-4">We do <strong>not</strong> share your personal information with third parties, except for:</p>
                                <div class="space-y-3">
                                    <div class="flex items-center space-x-3 bg-yellow-50 p-3 rounded-lg">
                                        <div class="w-2 h-2 bg-yellow-500 rounded-full"></div>
                                        <p class="text-gray-700"><strong>Shipping Partners:</strong> To deliver your orders.</p>
                                    </div>
                                    <div class="flex items-center space-x-3 bg-yellow-50 p-3 rounded-lg">
                                        <div class="w-2 h-2 bg-yellow-500 rounded-full"></div>
                                        <p class="text-gray-700"><strong>Secure Payment Providers.</strong></p>
                                    </div>
                                    <div class="flex items-center space-x-3 bg-yellow-50 p-3 rounded-lg">
                                        <div class="w-2 h-2 bg-yellow-500 rounded-full"></div>
                                        <p class="text-gray-700"><strong>Legal Authorities:</strong> If required by applicable law.</p>
                                    </div>
                                </div>
                            </section>

                            <section class="border-l-4 border-indigo-500 pl-6">
                                <h3 class="text-2xl font-bold text-indigo-600 mb-4 flex items-center">
                                    <span class="bg-indigo-100 text-indigo-600 rounded-full w-8 h-8 flex items-center justify-center text-lg font-bold mr-3">5</span>
                                    Your Rights:
                                </h3>
                                <p class="text-gray-700 mb-4">Under applicable data protection laws (such as GDPR), you have the right to:</p>
                                <div class="grid gap-3">
                                    <div class="flex items-center space-x-3 bg-indigo-50 p-3 rounded-lg">
                                        <div class="w-2 h-2 bg-indigo-500 rounded-full"></div>
                                        <p class="text-gray-700">Access your personal data.</p>
                                    </div>
                                    <div class="flex items-center space-x-3 bg-indigo-50 p-3 rounded-lg">
                                        <div class="w-2 h-2 bg-indigo-500 rounded-full"></div>
                                        <p class="text-gray-700">Request correction or deletion of your data.</p>
                                    </div>
                                    <div class="flex items-center space-x-3 bg-indigo-50 p-3 rounded-lg">
                                        <div class="w-2 h-2 bg-indigo-500 rounded-full"></div>
                                        <p class="text-gray-700">Withdraw your consent to receive marketing.</p>
                                    </div>
                                    <div class="flex items-center space-x-3 bg-indigo-50 p-3 rounded-lg">
                                        <div class="w-2 h-2 bg-indigo-500 rounded-full"></div>
                                        <p class="text-gray-700">Contact us for any inquiries or concerns regarding your data.</p>
                                    </div>
                                </div>
                            </section>

                            <section class="border-l-4 border-pink-500 pl-6">
                                <h3 class="text-2xl font-bold text-pink-600 mb-4 flex items-center">
                                    <span class="bg-pink-100 text-pink-600 rounded-full w-8 h-8 flex items-center justify-center text-lg font-bold mr-3">6</span>
                                    Cookies:
                                </h3>
                                <p class="text-gray-700">Our website uses cookies to analyze performance and enhance service quality. You may disable cookies via your browser settings; however, some features of the site may not function properly.</p>
                            </section>

                            <section class="border-l-4 border-red-500 pl-6">
                                <h3 class="text-2xl font-bold text-red-600 mb-4 flex items-center">
                                    <span class="bg-red-100 text-red-600 rounded-full w-8 h-8 flex items-center justify-center text-lg font-bold mr-3">7</span>
                                    External Links:
                                </h3>
                                <p class="text-gray-700">Our site may contain links to other websites. We are not responsible for the privacy practices of those websites and encourage you to review their policies.</p>
                            </section>

                            <section class="border-l-4 border-teal-500 pl-6">
                                <h3 class="text-2xl font-bold text-teal-600 mb-4 flex items-center">
                                    <span class="bg-teal-100 text-teal-600 rounded-full w-8 h-8 flex items-center justify-center text-lg font-bold mr-3">8</span>
                                    Changes to This Policy:
                                </h3>
                                <p class="text-gray-700">We may update this Privacy Policy occasionally. All changes will be posted on this page with the updated date above.</p>
                            </section>

                            <section class="border-l-4 border-purple-500 pl-6">
                                <h3 class="text-2xl font-bold text-purple-600 mb-4 flex items-center">
                                    <span class="bg-purple-100 text-purple-600 rounded-full w-8 h-8 flex items-center justify-center text-lg font-bold mr-3">9</span>
                                    Contact Us:
                                </h3>
                                <p class="text-gray-700 mb-4">For any questions regarding this Privacy Policy or your personal data, please contact us:</p>
                                <div class="bg-gradient-to-r from-purple-50 to-pink-50 p-6 rounded-xl border border-purple-200">
                                    <div class="space-y-3">
                                        <div class="flex items-center space-x-3">
                                            <svg class="w-5 h-5 text-purple-600 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                                            </svg>
                                            <div>
                                                <span class="font-semibold text-gray-800">Email:</span>
                                                <a href="mailto:info@maisonnahle.fashion" class="text-purple-600 hover:text-purple-800 underline ml-2">info@maisonnahle.fashion</a>
                                            </div>
                                        </div>
                                        <div class="flex items-center space-x-3">
                                            <svg class="w-5 h-5 text-purple-600 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                                            </svg>
                                            <div>
                                                <span class="font-semibold text-gray-800">Address:</span>
                                                <span class="text-gray-700 ml-2">Beirut, Lebanon -- Maison Nahle Showroom</span>
                                            </div>
                                        </div>
                                    </div>
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