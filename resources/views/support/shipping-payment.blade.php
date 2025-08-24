@extends('layouts.home')

@section('content')
<div class="min-h-screen bg-white">
    <!-- Language Toggle -->
    <div class="fixed top-20 right-5 z-50 space-x-2">
        <button onclick="toggleLanguage('ar')" id="ar-btn" class="px-4 py-2 rounded-lg font-medium transition-colors duration-200 bg-black text-white">العربية</button>
        <button onclick="toggleLanguage('en')" id="en-btn" class="px-4 py-2 rounded-lg font-medium transition-colors duration-200 border border-black text-black hover:bg-black hover:text-white">English</button>
    </div>

    <!-- Arabic Version -->
    <div id="arabic-content" class="language-content" dir="rtl">
        <div class="container mx-auto px-4 py-16">
            <div class="max-w-4xl mx-auto">
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-300">
                    <div class="p-8 lg:p-12">
                        <header class="text-center mb-12">
                            <h1 class="text-4xl lg:text-5xl font-bold text-black mb-4">الشحن والدفع</h1>
                            <h2 class="text-2xl text-gray-700 font-semibold">Maison Nahle</h2>
                            <p class="text-gray-500 mt-2">تجربة تسوق سلسة وآمنة ومريحة</p>
                        </header>

                        <div class="space-y-8">
                            <div class="bg-gray-100 p-6 rounded-xl border border-gray-300">
                                <p class="text-lg leading-relaxed text-gray-800">
                                    نحن في <span class="font-bold text-black">Maison Nahle</span> نحرص على أن تكون تجربة 
                                    تسوّقك سلسة، آمنة، ومريحة من خطوات الطلب الأولى وحتى استلام القطعة التي 
                                    اخترتها بعناية.
                                </p>
                            </div>

                            <section class="border-r-4 border-black pr-6">
                                <h3 class="text-2xl font-bold text-black mb-4 flex items-center">
                                    <span class="bg-gray-200 text-black rounded-full w-8 h-8 flex items-center justify-center text-lg font-bold ml-3">1</span>
                                    خيارات الدفع المتاحة:
                                </h3>
                                <div class="space-y-4">
                                    <div class="flex items-start space-x-4 space-x-reverse bg-gray-50 p-4 rounded-lg border border-gray-200">
                                        <div class="bg-gray-200 p-2 rounded-lg flex-shrink-0">
                                            <svg class="w-6 h-6 text-black" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"></path>
                                                <path fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" clip-rule="evenodd"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <h4 class="font-semibold text-black mb-1">الدفع عند الاستلام (Cash on Delivery):</h4>
                                            <p class="text-gray-600">متوفر داخل الأراضي اللبنانية.</p>
                                        </div>
                                    </div>
                                    <div class="flex items-start space-x-4 space-x-reverse bg-gray-50 p-4 rounded-lg border border-gray-200">
                                        <div class="bg-gray-200 p-2 rounded-lg flex-shrink-0">
                                            <svg class="w-6 h-6 text-black" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z"></path>
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <h4 class="font-semibold text-black mb-1">التحويلات الإلكترونية السريعة:</h4>
                                            <p class="text-gray-600">عبر مزوّدين موثوقين (OMT، Whish، Western Union، BOB Finance...) لتسهيل الدفعات داخل لبنان وخارجه.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-6 bg-amber-50 border border-amber-200 p-4 rounded-lg">
                                    <div class="flex items-start space-x-3 space-x-reverse">
                                        <svg class="w-5 h-5 text-amber-600 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                        </svg>
                                        <p class="text-amber-800 text-sm"><strong>ملاحظة مهمة:</strong> نظرًا للقيود المصرفية الحالية في لبنان، لا نوفر الدفع عبر البطاقات الائتمانية، ونعتمد طرقًا مرنة وآمنة تتناسب مع واقع السوق المحلي لضمان راحتك وثقتك.</p>
                                    </div>
                                </div>
                            </section>

                            <section class="border-r-4 border-gray-600 pr-6">
                                <h3 class="text-2xl font-bold text-gray-800 mb-4 flex items-center">
                                    <span class="bg-gray-200 text-black rounded-full w-8 h-8 flex items-center justify-center text-lg font-bold ml-3">2</span>
                                    الشحن والتوصيل:
                                </h3>
                                <div class="space-y-4">
                                    <div class="flex items-start space-x-4 space-x-reverse bg-gray-50 p-4 rounded-lg border border-gray-200">
                                        <div class="bg-gray-200 p-2 rounded-lg flex-shrink-0">
                                            <svg class="w-6 h-6 text-black" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <h4 class="font-semibold text-black mb-1">داخل لبنان:</h4>
                                            <p class="text-gray-600">توصيل سريع من ٢ إلى ٥ أيام عمل، عبر شركات شحن موثوقة.</p>
                                        </div>
                                    </div>
                                    <div class="flex items-start space-x-4 space-x-reverse bg-gray-50 p-4 rounded-lg border border-gray-200">
                                        <div class="bg-gray-200 p-2 rounded-lg flex-shrink-0">
                                            <svg class="w-6 h-6 text-black" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <h4 class="font-semibold text-black mb-1">خارج لبنان:</h4>
                                            <p class="text-gray-600">نوفر خدمة الشحن الدولي لمعظم الدول، ويتم احتساب التكلفة ومدة التوصيل بحسب الوجهة عند تأكيد الطلب.</p>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <section class="border-r-4 border-gray-400 pr-6">
                                <h3 class="text-2xl font-bold text-gray-700 mb-4 flex items-center">
                                    <span class="bg-gray-200 text-black rounded-full w-8 h-8 flex items-center justify-center text-lg font-bold ml-3">3</span>
                                    عملية الطلب:
                                </h3>
                                <div class="bg-gray-100 p-6 rounded-xl border border-gray-300">
                                    <div class="flex items-start space-x-4 space-x-reverse">
                                        <div class="bg-green-200 p-2 rounded-lg flex-shrink-0">
                                            <svg class="w-6 h-6 text-green-800" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M18 3a1 1 0 00-1.447-.894L8.763 6H5a3 3 0 000 6h.28l1.771 5.316A1 1 0 008 18h1a1 1 0 001-1v-4.382l6.553 3.276A1 1 0 0018 15V3z" clip-rule="evenodd"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <h4 class="font-semibold text-black mb-2">تأكيد شخصي عبر WhatsApp:</h4>
                                            <p class="text-gray-700">سيتم التواصل معك عبر WhatsApp لتأكيد كافة تفاصيل الطلب (المقاس، العنوان، والدفع) قبل الشحن، لضمان أفضل تجربة ممكنة.</p>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <div class="text-center bg-black text-white p-6 rounded-xl">
                                <blockquote class="text-xl font-semibold italic">
                                    "Maison Nahle... تجربة تسوق فاخرة تليق بأناقتك."
                                </blockquote>
                            </div>
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
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-300">
                    <div class="p-8 lg:p-12">
                        <header class="text-center mb-12">
                            <h1 class="text-4xl lg:text-5xl font-bold text-black mb-4">Shipping & Payment</h1>
                            <h2 class="text-2xl text-gray-700 font-semibold">Maison Nahle</h2>
                            <p class="text-gray-500 mt-2">A smooth, safe, and elegant shopping experience</p>
                        </header>

                        <div class="space-y-8">
                            <div class="bg-gray-100 p-6 rounded-xl border border-gray-300">
                                <p class="text-lg leading-relaxed text-gray-800">
                                    At <span class="font-bold text-black">Maison Nahle</span>, we strive to offer you a smooth, safe, and elegant 
                                    shopping experience — from placing your order to receiving your handcrafted couture piece.
                                </p>
                            </div>

                            <section class="border-l-4 border-black pl-6">
                                <h3 class="text-2xl font-bold text-black mb-4 flex items-center">
                                    <span class="bg-gray-200 text-black rounded-full w-8 h-8 flex items-center justify-center text-lg font-bold mr-3">1</span>
                                    Payment Options:
                                </h3>
                                <div class="space-y-4">
                                    <div class="flex items-start space-x-4 bg-gray-50 p-4 rounded-lg border border-gray-200">
                                        <div class="bg-gray-200 p-2 rounded-lg flex-shrink-0">
                                            <svg class="w-6 h-6 text-black" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"></path>
                                                <path fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" clip-rule="evenodd"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <h4 class="font-semibold text-black mb-1">Cash on Delivery (COD):</h4>
                                            <p class="text-gray-600">Available across Lebanon.</p>
                                        </div>
                                    </div>
                                    <div class="flex items-start space-x-4 bg-gray-50 p-4 rounded-lg border border-gray-200">
                                        <div class="bg-gray-200 p-2 rounded-lg flex-shrink-0">
                                            <svg class="w-6 h-6 text-black" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z"></path>
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <h4 class="font-semibold text-black mb-1">Fast & Secure Money Transfers:</h4>
                                            <p class="text-gray-600">Via trusted local providers such as OMT, Whish, Western Union, BOB Finance, and others.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-6 bg-amber-50 border border-amber-200 p-4 rounded-lg">
                                    <div class="flex items-start space-x-3">
                                        <svg class="w-5 h-5 text-amber-600 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                        </svg>
                                        <p class="text-amber-800 text-sm"><strong>Important Note:</strong> Due to current banking restrictions in Lebanon, we do not support card payments. Instead, we offer flexible and secure alternatives that suit the local market and ensure your convenience.</p>
                                    </div>
                                </div>
                            </section>

                            <section class="border-l-4 border-gray-600 pl-6">
                                <h3 class="text-2xl font-bold text-gray-800 mb-4 flex items-center">
                                    <span class="bg-gray-200 text-black rounded-full w-8 h-8 flex items-center justify-center text-lg font-bold mr-3">2</span>
                                    Shipping Policy:
                                </h3>
                                <div class="space-y-4">
                                    <div class="flex items-start space-x-4 bg-gray-50 p-4 rounded-lg border border-gray-200">
                                        <div class="bg-gray-200 p-2 rounded-lg flex-shrink-0">
                                            <svg class="w-6 h-6 text-black" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <h4 class="font-semibold text-black mb-1">Within Lebanon:</h4>
                                            <p class="text-gray-600">Fast delivery in 2-5 business days via reliable couriers.</p>
                                        </div>
                                    </div>
                                    <div class="flex items-start space-x-4 bg-gray-50 p-4 rounded-lg border border-gray-200">
                                        <div class="bg-gray-200 p-2 rounded-lg flex-shrink-0">
                                            <svg class="w-6 h-6 text-black" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <h4 class="font-semibold text-black mb-1">International:</h4>
                                            <p class="text-gray-600">We ship globally to most countries. Shipping cost and delivery time will be calculated at checkout depending on your destination.</p>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <section class="border-l-4 border-gray-400 pl-6">
                                <h3 class="text-2xl font-bold text-gray-700 mb-4 flex items-center">
                                    <span class="bg-gray-200 text-black rounded-full w-8 h-8 flex items-center justify-center text-lg font-bold mr-3">3</span>
                                    Order Process:
                                </h3>
                                <div class="bg-gray-100 p-6 rounded-xl border border-gray-300">
                                    <div class="flex items-start space-x-4">
                                        <div class="bg-green-200 p-2 rounded-lg flex-shrink-0">
                                            <svg class="w-6 h-6 text-green-800" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M18 3a1 1 0 00-1.447-.894L8.763 6H5a3 3 0 000 6h.28l1.771 5.316A1 1 0 008 18h1a1 1 0 001-1v-4.382l6.553 3.276A1 1 0 0018 15V3z" clip-rule="evenodd"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <h4 class="font-semibold text-black mb-2">Personal Confirmation via WhatsApp:</h4>
                                            <p class="text-gray-700">Our team will contact you via WhatsApp to confirm your size, address, and preferred payment method before dispatching your order — ensuring a flawless couture experience.</p>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <div class="text-center bg-black text-white p-6 rounded-xl">
                                <blockquote class="text-xl font-semibold italic">
                                    "Maison Nahle... where every detail tells a story of elegance and craftsmanship."
                                </blockquote>
                            </div>
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
        arBtn.classList.remove('border', 'border-black', 'text-black', 'hover:bg-black', 'hover:text-white');
        arBtn.classList.add('bg-black', 'text-white');
        enBtn.classList.remove('bg-black', 'text-white');
        enBtn.classList.add('border', 'border-black', 'text-black', 'hover:bg-black', 'hover:text-white');
    } else {
        arabicContent.classList.add('hidden');
        englishContent.classList.remove('hidden');
        enBtn.classList.remove('border', 'border-black', 'text-black', 'hover:bg-black', 'hover:text-white');
        enBtn.classList.add('bg-black', 'text-white');
        arBtn.classList.remove('bg-black', 'text-white');
        arBtn.classList.add('border', 'border-black', 'text-black', 'hover:bg-black', 'hover:text-white');
    }
}

// Set default language to English
document.addEventListener('DOMContentLoaded', function() {
    toggleLanguage('en');
});
</script>
@endsection