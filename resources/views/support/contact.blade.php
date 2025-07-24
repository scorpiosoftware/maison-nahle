@extends('layouts.home')
@section('content')
    <section class=" dark:bg-gray-900 max-w-xl mx-auto">
        <div class="py-8 lg:py-16 px-4 mx-auto max-w-screen-md">
            <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-center text-gray-900 dark:text-white">{{ session('lang') == 'en' ? 'Contact Us' : 'تواصل معنا' }}</h2>
            <p class="mb-8 lg:mb-16 font-light text-center text-gray-500 dark:text-gray-400 sm:text-xl">{{ session('lang') == 'en' ? ' Want to send feedback about a beta feature? Need details about our Business plan? Let us know.' : 'هل ترغب في إرسال ملاحظات حول ميزة تجريبية؟ أو تحتاج إلى تفاصيل حول خطتنا التجارية؟ أخبرنا بذلك.' }}</p>
            <form action="{{ route('send-comment') }}" class="space-y-8" method="POST">
                @csrf
                @method('POST')
                <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                         {{ session('lang') == 'en' ? 'Full Name' : 'الاسم الكامل' }}</label>
                    <input type="text" id="name" name="name"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light"
                        placeholder="" required>
                </div>
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                         {{ session('lang') == 'en' ? 'email' : 'بريد الكتروني' }}</label>
                    <input type="email" id="email" name="email"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light"
                        placeholder="" required>
                </div>
                <div>
                    <label for="subject"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"> {{ session('lang') == 'en' ? 'Subject' : 'الموضوع' }}</label>
                    <input type="text" id="subject" name="subject"
                        class="block p-3 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 shadow-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light"
                        placeholder="" required>
                </div>
                <div class="sm:col-span-2">
                    <label for="comment" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">
                         {{ session('lang') == 'en' ? 'message' : 'الرسالة' }}</label>
                    <textarea id="comment" rows="6" name="comment"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg shadow-sm border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder=""></textarea>
                </div>

                <div class="mt-2 flex justify-end">
                    <button type="submit"
                        class="py-3 px-5 text-sm font-medium text-center text-white rounded-lg bg-gray-500 sm:w-fit hover:bg-gray-600 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                         {{ session('lang') == 'en' ? 'send message' : 'ارسال' }}</button>
                </div>

            </form>
        </div>
    </section>
@endsection
