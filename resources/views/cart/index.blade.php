@extends('layouts.home')
@section('content')
    @if (session('cart'))
        <section class="bg-white py-8 antialiased dark:bg-gray-900 md:py-16">
            <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">
                    {{ session('lang') == 'en' ? 'shopping cart' : 'عربة التسوق' }}</h2>
                <div class="mt-6 sm:mt-8 md:gap-6 lg:flex lg:items-start xl:gap-8">

                    {{-- Items Side Left --}}

                    <div class="mx-auto w-full flex-none lg:max-w-2xl xl:max-w-4xl">
                        <div class="space-y-6">
                            {{-- items components --}}
                            @foreach (session('cart') as $id => $details)
                                <div
                                    class="rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 md:p-6">
                                    <div class="space-y-4 md:flex md:items-center md:justify-between md:gap-6 md:space-y-0">
                                        <a href="#" class="shrink-0 md:order-1">
                                            <img class="box-content object-cover size-60 mx-auto transition-all delay-0 hover:scale-95 dark:hidden"
                                                src="{{ URL::to('storage/' . $details['photo']) }}" alt="imac image" />
                                        </a>
                                        <div class="flex items-center justify-between md:order-3 md:justify-end">
                                            <div class="text-end md:order-4 md:w-32">
                                                <p class="text-base font-bold text-gray-900 dark:text-white">
                                                    quantity : {{ $details['quantity'] }}</p>
                                            </div>
                                            <div class="text-end md:order-4 md:w-32">
                                                <p class="text-base font-bold text-gray-900 dark:text-white">
                                                    $ {{ $details['price'] }}</p>
                                            </div>

                                        </div>

                                        <div class="w-full min-w-0 flex-1 space-y-4 md:order-2 md:max-w-md">
                                            <div class="flex justify-start items-center space-x-2">
                                                <a href="#"
                                                    class="text-base font-medium text-gray-900 hover:underline dark:text-white">{{ $details['name'] }}</a>
                                                @if (!empty($details['color']->hex_code))
                                                    <div class="px-2 py-2 rounded-full border box-border size-6"
                                                        style="background-color: {{ $details['color']->hex_code ?? '' }};">
                                                    </div>
                                                @endif
                                                <div class=" rounded-full size-6"> size : {{ $details['size']->name }}</div>
                                            </div>

                                            <div class="flex items-center gap-4">
                                                <button type="button"
                                                    class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-gray-900 hover:underline dark:text-gray-400 dark:hover:text-white">
                                                    <svg class="me-1.5 h-5 w-5" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        fill="none" viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="M12.01 6.001C6.5 1 1 8 5.782 13.001L12.011 20l6.23-7C23 8 17.5 1 12.01 6.002Z" />
                                                    </svg>
                                                    {{ session('lang') == 'en' ? 'Add to Wishlist' : 'إضافة إلى المفضلة' }}
                                                </button>
                                                <form action="{{ route('cart.remove', $id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="inline-flex items-center text-sm font-medium pt-2 text-red-600 hover:underline dark:text-red-500">
                                                        <svg class="me-1.5 h-5 w-5" aria-hidden="true"
                                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            fill="none" viewBox="0 0 24 24">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="M6 18 17.94 6M18 18 6.06 6" />
                                                        </svg>
                                                        {{ session('lang') == 'en' ? 'Remove' : 'حذف' }}
                                                    </button>

                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach


                        </div>

                    </div>

                    {{-- Right Side --}}
                    <div class="mx-auto mt-6 max-w-4xl flex-1 space-y-6 lg:mt-0 lg:w-full">
                        <div
                            class="space-y-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6">
                            <p class="text-xl font-semibold text-gray-900 dark:text-white">
                                {{ session('lang') == 'en' ? 'order summary' : 'ملخص الطلب' }}</p>

                            <div class="space-y-4">
                                <div class="space-y-2">
                                    <dl class="flex items-center justify-between gap-4">
                                        {{-- <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Original price
                                        </dt>
                                        <dd class="text-base font-medium text-gray-900 dark:text-white">$7,592.00</dd> --}}
                                    </dl>

                                    <dl class="flex items-center justify-between gap-4">
                                        {{-- <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Savings</dt>
                                        <dd class="text-base font-medium text-green-600">-$299.00</dd> --}}
                                    </dl>

                                    <dl class="flex items-center justify-between gap-4">
                                        {{-- <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Store Pickup</dt>
                                        <dd class="text-base font-medium text-gray-900 dark:text-white">$99</dd> --}}
                                    </dl>

                                    <dl class="flex items-center justify-between gap-4">
                                        {{-- <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Tax</dt>
                                        <dd class="text-base font-medium text-gray-900 dark:text-white">$799</dd> --}}
                                    </dl>
                                </div>

                                <dl
                                    class="flex items-center justify-between gap-4 border-t border-gray-200 pt-2 dark:border-gray-700">
                                    <dt class="text-base font-bold text-gray-900 dark:text-white">
                                        {{ session('lang') == 'en' ? 'Total' : 'المجموع' }} </dt>
                                    <dd class="text-base font-bold text-gray-900 dark:text-white">$ {{ $totale }}
                                    </dd>
                                </dl>
                            </div>

                            <a href="{{ route('address') }}"
                                class="flex w-full items-center justify-center rounded-lg bg-white border-2 px-5 py-2.5 text-sm font-medium text-black  focus:outline-none focus:ring-4">{{ session('lang') == 'en' ? 'Confirm order' : 'تاكيد الطلب' }}</a>

                            <div class="flex items-center justify-center gap-2">
                                <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                                    {{ session('lang') == 'en' ? 'or' : 'او' }} </span>
                                <a href="{{ route('filter.products') }}" title=""
                                    class="inline-flex items-center gap-2 text-sm font-medium text-black underline hover:no-underline">
                                    {{ session('lang') == 'en'
                                        ? 'continue shopping'
                                        : '
                                                                                                            مواصلة التسوق' }}
                                    <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection
