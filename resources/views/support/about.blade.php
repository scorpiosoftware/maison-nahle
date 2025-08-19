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
                            <h1 class="text-4xl lg:text-5xl font-bold text-black mb-4">من نحن</h1>
                            <h2 class="text-2xl text-gray-700 font-semibold">Maison Nahle</h2>
                            <p class="text-gray-500 mt-2">تأسس في عام 2020</p>
                        </header>

                        <div class="space-y-8">
                            <div class="bg-gray-100 p-6 rounded-xl border border-gray-300">
                                <p class="text-lg leading-relaxed text-gray-800">
                                    في عام 2020، انطلقت <span class="font-bold text-black">Maison Nahle</span> من شغف 
                                    المصمّمة اللبنانية فرح نحلة بعالم الخياطة الراقية، حيث بدأت رحلتها من داخل منزلها، قبل أن تتحوّل رؤيتها 
                                    إلى دار أزياء تحمل توقيعها الخاص من قلب بيروت -- عاصمة الموضة والأنوثة في الشرق الأوسط.
                                </p>
                            </div>

                            <section class="border-r-4 border-black pr-6">
                                <h3 class="text-2xl font-bold text-black mb-4 flex items-center">
                                    <span class="bg-gray-200 text-black rounded-full w-8 h-8 flex items-center justify-center text-lg font-bold ml-3">1</span>
                                    رؤيتنا وهدفنا:
                                </h3>
                                <div class="space-y-4">
                                    <div class="flex items-start space-x-4 space-x-reverse bg-gray-50 p-4 rounded-lg border border-gray-200">
                                        <div class="bg-gray-200 p-2 rounded-lg flex-shrink-0">
                                            <svg class="w-6 h-6 text-black" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <h4 class="font-semibold text-black mb-1">الشغف والإبداع:</h4>
                                            <p class="text-gray-600">ولدت من الشغف والموهبة والعزيمة، لتمكين المرأة المعاصرة من خلال الموضة.</p>
                                        </div>
                                    </div>
                                    <div class="flex items-start space-x-4 space-x-reverse bg-gray-50 p-4 rounded-lg border border-gray-200">
                                        <div class="bg-gray-200 p-2 rounded-lg flex-shrink-0">
                                            <svg class="w-6 h-6 text-black" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <h4 class="font-semibold text-black mb-1">الأناقة الخالدة:</h4>
                                            <p class="text-gray-600">تصاميم تجمع بين الأناقة الخالدة والجرأة العصرية.</p>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <section class="border-r-4 border-gray-600 pr-6">
                                <h3 class="text-2xl font-bold text-gray-800 mb-4 flex items-center">
                                    <span class="bg-gray-200 text-black rounded-full w-8 h-8 flex items-center justify-center text-lg font-bold ml-3">2</span>
                                    تخصصاتنا:
                                </h3>
                                <div class="grid gap-3">
                                    <div class="flex items-center space-x-3 space-x-reverse">
                                        <div class="w-2 h-2 bg-black rounded-full"></div>
                                        <p class="text-gray-700">فساتين سهرة فاخرة مصممة خصيصاً.</p>
                                    </div>
                                    <div class="flex items-center space-x-3 space-x-reverse">
                                        <div class="w-2 h-2 bg-black rounded-full"></div>
                                        <p class="text-gray-700">فساتين زفاف وخطوبة حسب الطلب.</p>
                                    </div>
                                    <div class="flex items-center space-x-3 space-x-reverse">
                                        <div class="w-2 h-2 bg-black rounded-full"></div>
                                        <p class="text-gray-700">خياطة راقية مخصصة للمناسبات الخاصة.</p>
                                    </div>
                                    <div class="flex items-center space-x-3 space-x-reverse">
                                        <div class="w-2 h-2 bg-black rounded-full"></div>
                                        <p class="text-gray-700">تصاميم للسجادة الحمراء والمناسبات الرسمية.</p>
                                    </div>
                                </div>
                            </section>

                            <section class="border-r-4 border-gray-400 pr-6">
                                <h3 class="text-2xl font-bold text-gray-700 mb-4 flex items-center">
                                    <span class="bg-gray-200 text-black rounded-full w-8 h-8 flex items-center justify-center text-lg font-bold ml-3">3</span>
                                    الحرفية والجودة:
                                </h3>
                                <div class="bg-gray-100 p-6 rounded-xl border border-gray-300">
                                    <p class="text-gray-700 mb-3">كل تصميم هو قصة تُرسم بدقّة، وتُخاط بحرفية عالية، وتُنفَّذ يدويًا باستخدام أفخم الأقمشة وأدق التطريزات.</p>
                                    <p class="text-gray-700">نعتمد على خبرة أمهر الخيّاطات وتقنيات التطريز اليدوي لضمان التميز في كل قطعة.</p>
                                </div>
                            </section>

                            <section class="border-r-4 border-gray-500 pr-6">
                                <h3 class="text-2xl font-bold text-gray-600 mb-4 flex items-center">
                                    <span class="bg-gray-200 text-black rounded-full w-8 h-8 flex items-center justify-center text-lg font-bold ml-3">4</span>
                                    عملاؤنا:
                                </h3>
                                <p class="text-gray-700 mb-4">توجّه الدار تصاميمها للمرأة التي تبحث عن:</p>
                                <div class="space-y-3">
                                    <div class="flex items-center space-x-3 space-x-reverse bg-gray-50 p-3 rounded-lg border border-gray-200">
                                        <div class="w-2 h-2 bg-gray-600 rounded-full"></div>
                                        <p class="text-gray-700">التفرد والحصرية في التصميم.</p>
                                    </div>
                                    <div class="flex items-center space-x-3 space-x-reverse bg-gray-50 p-3 rounded-lg border border-gray-200">
                                        <div class="w-2 h-2 bg-gray-600 rounded-full"></div>
                                        <p class="text-gray-700">الثقة والأناقة اللافتة.</p>
                                    </div>
                                    <div class="flex items-center space-x-3 space-x-reverse bg-gray-50 p-3 rounded-lg border border-gray-200">
                                        <div class="w-2 h-2 bg-gray-600 rounded-full"></div>
                                        <p class="text-gray-700">الأناقة الخالدة للمناسبات الخاصة.</p>
                                    </div>
                                </div>
                            </section>

                            <section class="border-r-4 border-black pr-6">
                                <h3 class="text-2xl font-bold text-black mb-4 flex items-center">
                                    <span class="bg-gray-200 text-black rounded-full w-8 h-8 flex items-center justify-center text-lg font-bold ml-3">5</span>
                                    سمعتنا وانتشارنا:
                                </h3>
                                <div class="bg-gray-100 p-6 rounded-xl border border-gray-300">
                                    <p class="text-gray-700">أصبحت تصاميم <span class="font-bold text-black">Maison Nahle Haute Couture</span> خيارًا محبّبًا لدى عشاق الموضة، العرائس، والسيدات المؤثرات في لبنان والعالم العربي، وأصبحت مرادفة للفخامة المُتقنة والأنوثة الدراماتيكية.</p>
                                </div>
                            </section>

                            <section class="border-r-4 border-black pr-6">
                                <h3 class="text-2xl font-bold text-black mb-4 flex items-center">
                                    <span class="bg-gray-200 text-black rounded-full w-8 h-8 flex items-center justify-center text-lg font-bold ml-3">6</span>
                                    تواصل معنا:
                                </h3>
                                <p class="text-gray-700 mb-4">للاستفسار عن تصاميمنا أو حجز موعد للاستشارة:</p>
                                <div class="bg-gray-100 p-6 rounded-xl border border-gray-300">
                                    <div class="space-y-3">
                                        <div class="flex items-center space-x-3 space-x-reverse">
                                            <svg class="w-5 h-5 text-black flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                                            </svg>
                                            <div>
                                                <span class="font-semibold text-black">البريد الإلكتروني:</span>
                                                <a href="mailto:info@maisonnahle.fashion" class="text-black hover:text-gray-600 underline mr-2">info@maisonnahle.fashion</a>
                                            </div>
                                        </div>
                                        <div class="flex items-center space-x-3 space-x-reverse">
                                            <svg class="w-5 h-5 text-black flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                                            </svg>
                                            <div>
                                                <span class="font-semibold text-black">العنوان:</span>
                                                <span class="text-gray-700 mr-2">بيروت، لبنان -- صالة عرض Maison Nahle</span>
                                            </div>
                                        </div>
                                        <div class="flex items-center space-x-3 space-x-reverse">
                                            <svg class="w-5 h-5 text-black flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path>
                                            </svg>
                                            <div>
                                                <span class="font-semibold text-black">الموقع الإلكتروني:</span>
                                                <a href="https://www.maisonnahle.fashion" class="text-black hover:text-gray-600 underline mr-2">www.maisonnahle.fashion</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <div class="text-center bg-black text-white p-6 rounded-xl">
                                <blockquote class="text-xl font-semibold italic">
                                    "Maison Nahle... حيث تُحاك التفاصيل بشغف، وتُروى الحكاية في كل فستان."
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
                            <h1 class="text-4xl lg:text-5xl font-bold text-black mb-4">About Us</h1>
                            <h2 class="text-2xl text-gray-700 font-semibold">Maison Nahle</h2>
                            <p class="text-gray-500 mt-2">Founded in 2020</p>
                        </header>

                        <div class="space-y-8">
                            <div class="bg-gray-100 p-6 rounded-xl border border-gray-300">
                                <p class="text-lg leading-relaxed text-gray-800">
                                    Born out of passion, talent, and undeniable determination, <span class="font-bold text-black">Maison Nahle by Farah Nahle</span> is a Lebanese fashion house founded in 2020. What began from a small home atelier quickly grew into a distinguished couture destination in the heart of <span class="font-bold text-black">Beirut</span>, celebrated for its luxurious evening gowns, bespoke bridal dresses, and signature custom-made couture.
                                </p>
                            </div>

                            <section class="border-l-4 border-black pl-6">
                                <h3 class="text-2xl font-bold text-black mb-4 flex items-center">
                                    <span class="bg-gray-200 text-black rounded-full w-8 h-8 flex items-center justify-center text-lg font-bold mr-3">1</span>
                                    Our Vision & Mission:
                                </h3>
                                <div class="space-y-4">
                                    <div class="flex items-start space-x-4 bg-gray-50 p-4 rounded-lg border border-gray-200">
                                        <div class="bg-gray-200 p-2 rounded-lg flex-shrink-0">
                                            <svg class="w-6 h-6 text-black" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <h4 class="font-semibold text-black mb-1">Empowering Women:</h4>
                                            <p class="text-gray-600">With a vision to empower modern women through fashion that combines timeless elegance with contemporary boldness.</p>
                                        </div>
                                    </div>
                                    <div class="flex items-start space-x-4 bg-gray-50 p-4 rounded-lg border border-gray-200">
                                        <div class="bg-gray-200 p-2 rounded-lg flex-shrink-0">
                                            <svg class="w-6 h-6 text-black" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <h4 class="font-semibold text-black mb-1">Storytelling Through Design:</h4>
                                            <p class="text-gray-600">Each Maison Nahle gown is a story -- sketched with precision, tailored with artistic craftsmanship.</p>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <section class="border-l-4 border-gray-600 pl-6">
                                <h3 class="text-2xl font-bold text-gray-800 mb-4 flex items-center">
                                    <span class="bg-gray-200 text-black rounded-full w-8 h-8 flex items-center justify-center text-lg font-bold mr-3">2</span>
                                    Our Specialties:
                                </h3>
                                <div class="grid gap-3">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-2 h-2 bg-black rounded-full"></div>
                                        <p class="text-gray-700">Luxurious evening gowns crafted to perfection.</p>
                                    </div>
                                    <div class="flex items-center space-x-3">
                                        <div class="w-2 h-2 bg-black rounded-full"></div>
                                        <p class="text-gray-700">Bespoke bridal dresses for your special day.</p>
                                    </div>
                                    <div class="flex items-center space-x-3">
                                        <div class="w-2 h-2 bg-black rounded-full"></div>
                                        <p class="text-gray-700">Signature custom-made haute couture.</p>
                                    </div>
                                    <div class="flex items-center space-x-3">
                                        <div class="w-2 h-2 bg-black rounded-full"></div>
                                        <p class="text-gray-700">Red-carpet dresses and engagement gowns.</p>
                                    </div>
                                </div>
                            </section>

                            <section class="border-l-4 border-gray-400 pl-6">
                                <h3 class="text-2xl font-bold text-gray-700 mb-4 flex items-center">
                                    <span class="bg-gray-200 text-black rounded-full w-8 h-8 flex items-center justify-center text-lg font-bold mr-3">3</span>
                                    Craftsmanship & Quality:
                                </h3>
                                <div class="bg-gray-100 p-6 rounded-xl border border-gray-300">
                                    <p class="text-gray-700 mb-3">Every gown is hand-finished by experienced seamstresses using premium fabrics and hand-embellishment techniques.</p>
                                    <p class="text-gray-700">We pride ourselves on artistic craftsmanship that ensures each piece is unique and of the highest quality.</p>
                                </div>
                            </section>

                            <section class="border-l-4 border-gray-500 pl-6">
                                <h3 class="text-2xl font-bold text-gray-600 mb-4 flex items-center">
                                    <span class="bg-gray-200 text-black rounded-full w-8 h-8 flex items-center justify-center text-lg font-bold mr-3">4</span>
                                    Our Clientele:
                                </h3>
                                <p class="text-gray-700 mb-4">Maison Nahle designs are crafted for the bold woman who seeks:</p>
                                <div class="space-y-3">
                                    <div class="flex items-center space-x-3 bg-gray-50 p-3 rounded-lg border border-gray-200">
                                        <div class="w-2 h-2 bg-gray-600 rounded-full"></div>
                                        <p class="text-gray-700"><strong>Exclusivity</strong> and unique design.</p>
                                    </div>
                                    <div class="flex items-center space-x-3 bg-gray-50 p-3 rounded-lg border border-gray-200">
                                        <div class="w-2 h-2 bg-gray-600 rounded-full"></div>
                                        <p class="text-gray-700"><strong>Confidence</strong> and striking elegance.</p>
                                    </div>
                                    <div class="flex items-center space-x-3 bg-gray-50 p-3 rounded-lg border border-gray-200">
                                        <div class="w-2 h-2 bg-gray-600 rounded-full"></div>
                                        <p class="text-gray-700"><strong>Unforgettable elegance</strong> for special occasions.</p>
                                    </div>
                                </div>
                            </section>

                            <section class="border-l-4 border-black pl-6">
                                <h3 class="text-2xl font-bold text-black mb-4 flex items-center">
                                    <span class="bg-gray-200 text-black rounded-full w-8 h-8 flex items-center justify-center text-lg font-bold mr-3">5</span>
                                    Our Recognition:
                                </h3>
                                <div class="bg-gray-100 p-6 rounded-xl border border-gray-300">
                                    <p class="text-gray-700">A favorite among fashion lovers, brides-to-be, and influential women across Lebanon and the Arab world, <span class="font-bold text-black">Maison Nahle Haute Couture</span> has become synonymous with refined luxury and dramatic femininity.</p>
                                </div>
                            </section>

                            <section class="border-l-4 border-black pl-6">
                                <h3 class="text-2xl font-bold text-black mb-4 flex items-center">
                                    <span class="bg-gray-200 text-black rounded-full w-8 h-8 flex items-center justify-center text-lg font-bold mr-3">6</span>
                                    Contact Us:
                                </h3>
                                <p class="text-gray-700 mb-4">For inquiries about our designs or to book a consultation:</p>
                                <div class="bg-gray-100 p-6 rounded-xl border border-gray-300">
                                    <div class="space-y-3">
                                        <div class="flex items-center space-x-3">
                                            <svg class="w-5 h-5 text-black flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                                            </svg>
                                            <div>
                                                <span class="font-semibold text-black">Email:</span>
                                                <a href="mailto:info@maisonnahle.fashion" class="text-black hover:text-gray-600 underline ml-2">info@maisonnahle.fashion</a>
                                            </div>
                                        </div>
                                        <div class="flex items-center space-x-3">
                                            <svg class="w-5 h-5 text-black flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                                            </svg>
                                            <div>
                                                <span class="font-semibold text-black">Address:</span>
                                                <span class="text-gray-700 ml-2">Beirut, Lebanon -- Maison Nahle Showroom</span>
                                            </div>
                                        </div>
                                        <div class="flex items-center space-x-3">
                                            <svg class="w-5 h-5 text-black flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path>
                                            </svg>
                                            <div>
                                                <span class="font-semibold text-black">Website:</span>
                                                <a href="https://www.maisonnahle.fashion" class="text-black hover:text-gray-600 underline ml-2">www.maisonnahle.fashion</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <div class="text-center bg-black text-white p-6 rounded-xl">
                                <blockquote class="text-xl font-semibold italic">
                                    "Maison Nahle... where every stitch tells a story of beauty, passion, and Beirut's timeless spirit."
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