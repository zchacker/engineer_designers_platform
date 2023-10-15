@include('public.header')
<section class="bg-gray-50 py-10 md:py-16">
    <div class="container max-w-screen-xl mx-auto px-4">
        <h2 class="font-bold text-3xl text-center my-14">{{ __('public')['services'] }}</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8 max-w-screen-xl mx-auto">
            <!-- Service 1 -->
            <div class="bg-white shadow-lg rounded-lg transition transform hover:bg-green-100 hover:-translate-y-1">
                <div class="p-6">
                    <i data-feather="check-circle" class="h-12 w-16 text-green-700 mb-4 mx-auto"></i>
                    <h4 class="font-semibold text-gray-900 text-xl mb-2 text-center">{{ __('public')['service1'] }}</h4>
                    <p class="font-normal text-gray-700 text-md leading-relaxed text-justify">{{ __('public')['service1_details'] }}</p>
                </div>
            </div>

            <!-- Service 2 -->
            <div class="bg-white shadow-lg rounded-lg transition transform hover:bg-green-100 hover:-translate-y-1">
                <div class="p-6">
                    <i data-feather="check-circle" class="h-12 w-16 text-green-700 mb-4 mx-auto"></i>
                    <h4 class="font-semibold text-gray-900 text-xl mb-2 text-center">{{ __('public')['service2'] }}</h4>
                    <p class="font-normal text-gray-700 text-md leading-relaxed text-justify">{{ __('public')['service2_details'] }}</p>
                </div>
            </div>

            <div class="bg-white shadow-lg rounded-lg transition transform hover:bg-green-100 hover:-translate-y-1">
                <div class="p-6">
                    <i data-feather="check-circle" class="h-12 w-16 text-green-700 mb-4 mx-auto"></i>
                    <h4 class="font-semibold text-gray-900 text-xl mb-2 text-center">{{ __('public')['service3'] }}</h4>
                    <p class="font-normal text-gray-700 text-md leading-relaxed text-justify">{{ __('public')['service3_details'] }}</p>
                </div>
            </div>

            <div class="bg-white shadow-lg rounded-lg transition transform hover:bg-green-100 hover:-translate-y-1">
                <div class="p-6">
                    <i data-feather="check-circle" class="h-12 w-16 text-green-700 mb-4 mx-auto"></i>
                    <h4 class="font-semibold text-gray-900 text-xl mb-2 text-center">{{ __('public')['service4'] }}</h4>
                    <p class="font-normal text-gray-700 text-md leading-relaxed text-justify">{{ __('public')['service4_details'] }}</p>
                </div>
            </div>

            <div class="bg-white shadow-lg rounded-lg transition transform hover:bg-green-100 hover:-translate-y-1">
                <div class="p-6">
                    <i data-feather="check-circle" class="h-12 w-16 text-green-700 mb-4 mx-auto"></i>
                    <h4 class="font-semibold text-gray-900 text-xl mb-2 text-center">{{ __('public')['service5'] }}</h4>
                    <p class="font-normal text-gray-700 text-md leading-relaxed text-justify">{{ __('public')['service5_details'] }}</p>
                </div>
            </div>

            <div class="bg-white shadow-lg rounded-lg transition transform hover:bg-green-100 hover:-translate-y-1">
                <div class="p-6">
                    <i data-feather="check-circle" class="h-12 w-16 text-green-700 mb-4 mx-auto"></i>
                    <h4 class="font-semibold text-gray-900 text-xl mb-2 text-center">{{ __('public')['service6'] }}</h4>
                    <p class="font-normal text-gray-700 text-md leading-relaxed text-justify">{{ __('public')['service6_details'] }}</p>
                </div>
            </div>

            <div class="bg-white shadow-lg rounded-lg transition transform hover:bg-green-100 hover:-translate-y-1">
                <div class="p-6">
                    <i data-feather="check-circle" class="h-12 w-16 text-green-700 mb-4 mx-auto"></i>
                    <h4 class="font-semibold text-gray-900 text-xl mb-2 text-center">{{ __('public')['service7'] }}</h4>
                    <p class="font-normal text-gray-700 text-md leading-relaxed text-justify">{{ __('public')['service7_details'] }}</p>
                </div>
            </div>

            <div class="bg-white shadow-lg rounded-lg transition transform hover:bg-green-100 hover:-translate-y-1">
                <div class="p-6">
                    <i data-feather="check-circle" class="h-12 w-16 text-green-700 mb-4 mx-auto"></i>
                    <h4 class="font-semibold text-gray-900 text-xl mb-2 text-center">{{ __('public')['service8'] }}</h4>
                    <p class="font-normal text-gray-700 text-md leading-relaxed text-justify">{{ __('public')['service8_details'] }}</p>
                </div>
            </div>

            <div class="bg-white shadow-lg rounded-lg transition transform hover:bg-green-100 hover:-translate-y-1">
                <div class="p-6">
                    <i data-feather="check-circle" class="h-12 w-16 text-green-700 mb-4 mx-auto"></i>
                    <h4 class="font-semibold text-gray-900 text-xl mb-2 text-center">{{ __('public')['service9'] }}</h4>
                    <p class="font-normal text-gray-700 text-md leading-relaxed text-justify">{{ __('public')['service9_details'] }}</p>
                </div>
            </div>

            <div class="bg-white shadow-lg rounded-lg transition transform hover:bg-green-100 hover:-translate-y-1">
                <div class="p-6">
                    <i data-feather="check-circle" class="h-12 w-16 text-green-700 mb-4 mx-auto"></i>
                    <h4 class="font-semibold text-gray-900 text-xl mb-2 text-center">{{ __('public')['service10'] }}</h4>
                    <p class="font-normal text-gray-700 text-md leading-relaxed text-justify">{{ __('public')['service10_details'] }}</p>
                </div>
            </div>

            <!-- Add more services in a similar structure as above -->
        </div>
    </div>
</section>
@include('public.footer')