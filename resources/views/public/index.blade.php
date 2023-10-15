@include('public.header')

<!-- home section -->
<section class="md:block mb-20 md:mb-52 xl:mb-72" >

    <div class="container max-w-screen-xl mx-auto px-4">

        <div class="flex items-center justify-center xl:justify-start">

            <div class="mt-28 text-center xl:text-right z-20">
                <h1 class="font-semibold text-2xl md:text-4xl lg:text-5xl leading-normal text-gray-900 mb-6">{!! __('public')['hero_msg'] !!}</h1>

                <p class="font-normal text-xl text-gray-800 leading-relaxed mb-12">{{__('public')['sub_hero']}}</p>

                <a href="{{ route('register.user') }}" class="px-6 py-2 bg-green-700 text-white font-semibold text-lg rounded-none hover:bg-green-900 transition ease-in-out duration-500">{{__('public')['start_now']}}</a>
            </div>

            <div class="hidden absolute2 xl:block xl:absolute top-40 md:top-0 md:left-0" >
                <img src="{{asset('imgs/image/home-img.png')}}" alt="Home img"  :class="{'hidden':navbarOpen}" />
            </div>

        </div>

    </div> <!-- container.// -->

</section>
<!-- home section //nd -->

<!-- about company -->
<section class="bg-green-50 py-10 md:py-16 xl:relative">

    <div class="container max-w-screen-xl mx-auto px-4">

        <div class="flex flex-col gap-14 xl:flex-row justify-start">

            <div class="xl:w-1/2 mt-14">

                <h1 class="font-semibold text-black text-xl md:text-4xl text-right leading-normal mb-6">{{__('public')['get_know_us']}}</h1>

                <p class="font-normal text-gray-700 text-md md:text-xl text-justify mb-16">{{__('public')['about_message']}}</p>

                <div class="flex flex-col md:flex-row-reverse justify-center xl:justify-start space-x-4 mb-20">

                    <div class="text-center md:text-right">
                        <h4 class="font-semibold text-black text-right text-2xl mb-2">{{__('public')['vision']}}</h4>
                        <p class="font-normal text-gray-700 text-xl leading-relaxed text-justify">{{__('public')['vision_details']}}</p>
                    </div>
                    <div class="hidden px-8 h-20 mx-auto md:mx-0 bg-gray-200 rounded-lg md:flex items-center justify-center mb-5 md:mb-0">
                        <i data-feather="check-circle" class=" text-green-900"></i>
                    </div>
                    <!-- <div class="hidden md:block px-8 h-20 mx-auto md:mx-0 bg-gray-200 rounded-lg flex2 items-center justify-center mb-5 md:mb-0">
                            <i data-feather="check-circle" class=" text-green-900"></i>
                        </div> -->
                </div>

                <div class="flex flex-col md:flex-row-reverse justify-center xl:justify-start space-x-4 mb-20">
                    <div class="text-center md:text-right">
                        <h4 class="font-semibold text-black text-right text-2xl mb-2">{{__('public')['mission']}}</h4>
                        <p class="font-normal text-gray-700 text-xl leading-relaxed text-justify">{{__('public')['mission_details']}}</p>
                    </div>

                    <div class="hidden px-8 h-20 mx-auto md:mx-0 bg-gray-200 rounded-lg md:flex items-center justify-center mb-5 md:mb-0">
                        <i data-feather="check-circle" class=" text-green-900"></i>
                    </div>
                </div>


                <!-- <div class="flex flex-col md:flex-row justify-center xl:justify-start space-x-4 mb-20">
                            <div class="px-8 h-20 mx-auto md:mx-0 bg-gray-200 rounded-lg flex items-center justify-center mb-5 md:mb-0">
                                <i data-feather="lock" class=" text-green-900"></i>
                            </div>

                            <div class="text-center md:text-left">
                                <h4 class="font-semibold text-gray-900 text-2xl mb-2">Safe Transaction</h4>
                                <p class="font-normal text-gray-400 text-xl leading-relaxed">Your transactions will always be kept confidential <br> and will get discounted</p>
                            </div>
                        </div>

                        <div class="flex flex-col md:flex-row justify-center xl:justify-start space-x-4">
                            <div class="px-8 h-20 mx-auto md:mx-0 bg-gray-200 rounded-lg flex items-center justify-center mb-5 md:mb-0">
                                <i data-feather="credit-card" class=" text-green-900"></i>
                            </div>

                            <div class="text-center md:text-left">
                                <h4 class="font-semibold text-gray-900 text-2xl mb-2">Low and Cost Home Taxes</h4>
                                <p class="font-normal text-gray-400 text-xl leading-relaxed">By buying a house from D’house, you will get a tax <br> discount</p>
                            </div>
                        </div> -->

            </div>

            <div class="hidden xl:block w-auto xl:mr-8 xl:mt-14">
                <img src="{{asset('imgs/image/feature-img.png')}}" alt="Feature img">
            </div>

        </div>

    </div> <!-- container.// -->

</section>
<!-- about company //end -->

<!-- our services -->
<section class="bg-black py-10 md:py-16">

    <h2 class="font-bold text-3xl text-center my-4 text-white">{{__('public')['services']}}</h2>

    <div class="grid grid-cols-1 gap-8 justify-center items-stretch md:grid-cols-3 max-w-screen-xl mx-auto px-4">

        <div class="w-full text-center justify-center space-x-4 mb-10 md:mx-4 bg-green-50 hover:bg-white p-4 rounded-lg">
            <div class="px-8 h-20  mx-auto md:mx-0 rounded-lg flex items-center justify-center mb-5 md:mb-0">
                <i data-feather="codepen" class="h-14 w-20 text-green-900"></i>
            </div>

            <div class="text-center">
                <h4 class="font-semibold text-gray-900 text-xl mb-2">{{__('public')['service1']}}</h4>
                <p class="font-normal text-gray-700 text-md leading-relaxed text-justify">{{__('public')['service1_details']}}</p>
            </div>
        </div>

        <!-- <div class="w-full text-center justify-center space-x-4 mb-10 md:mx-4 bg-green-50 hover:bg-white p-4 rounded-lg">
                <div class="px-8 h-20  mx-auto md:mx-0 rounded-lg flex items-center justify-center mb-5 md:mb-0">
                    <i data-feather="check-circle" class="h-14 w-20 text-green-900"></i>
                </div>

                <div class="text-center">
                    <h4 class="font-semibold text-gray-900 text-xl mb-2">{{__('public')['service2']}}</h4>
                    <p class="font-normal text-gray-700 text-md leading-relaxed text-justify">{{__('public')['service2_details']}}</p>
                </div>
            </div> -->

        <!-- <div class="w-full text-center justify-center space-x-4 mb-10 md:mx-4 bg-green-50 hover:bg-white p-4 rounded-lg">
                <div class="px-8 h-20  mx-auto md:mx-0 rounded-lg flex items-center justify-center mb-5 md:mb-0">
                    <i data-feather="check-circle" class="h-14 w-20 text-green-900"></i>
                </div>

                <div class="text-center">
                    <h4 class="font-semibold text-gray-900 text-xl mb-2">{{__('public')['service3']}}</h4>
                    <p class="font-normal text-gray-700 text-md leading-relaxed text-justify">{{__('public')['service3_details']}}</p>
                </div>
            </div> -->

        <div class="w-full text-center justify-center space-x-4 mb-10 md:mx-4 bg-green-50 hover:bg-white p-4 rounded-lg">
            <div class="px-8 h-20  mx-auto md:mx-0 rounded-lg flex items-center justify-center mb-5 md:mb-0">
                <i data-feather="figma" class="h-14 w-20 text-green-900"></i>
            </div>

            <div class="text-center">
                <h4 class="font-semibold text-gray-900 text-xl mb-2">{{__('public')['service4']}}</h4>
                <p class="font-normal text-gray-700 text-md leading-relaxed text-justify">{{__('public')['service4_details']}}</p>
            </div>
        </div>

        <!-- <div class="w-full text-center justify-center space-x-4 mb-10 md:mx-4 bg-green-50 hover:bg-white p-4 rounded-lg">
                <div class="px-8 h-20  mx-auto md:mx-0 rounded-lg flex items-center justify-center mb-5 md:mb-0">
                    <i data-feather="check-circle" class="h-14 w-20 text-green-900"></i>
                </div>

                <div class="text-center">
                    <h4 class="font-semibold text-gray-900 text-xl mb-2">{{__('public')['service5']}}</h4>
                    <p class="font-normal text-gray-700 text-md leading-relaxed text-justify">{{__('public')['service5_details']}}</p>
                </div>
            </div> -->

        <div class="w-full text-center justify-center space-x-4 mb-10 md:mx-4 bg-green-50 hover:bg-white p-4 rounded-lg">
            <div class="px-8 h-20  mx-auto md:mx-0 rounded-lg flex items-center justify-center mb-5 md:mb-0">
                <i data-feather="sun" class="h-14 w-20 text-green-900"></i>
            </div>

            <div class="text-center">
                <h4 class="font-semibold text-gray-900 text-xl mb-2">{{__('public')['service6']}}</h4>
                <p class="font-normal text-gray-700 text-md leading-relaxed text-justify">{{__('public')['service6_details']}}</p>
            </div>
        </div>

        <!--
            <div class="w-full text-center justify-center space-x-4 mb-10 md:mx-4 bg-green-50 hover:bg-white p-4 rounded-lg">
                <div class="px-8 h-20  mx-auto md:mx-0 rounded-lg flex items-center justify-center mb-5 md:mb-0">
                    <i data-feather="check-circle" class="h-14 w-20 text-green-900"></i>
                </div>

                <div class="text-center">
                    <h4 class="font-semibold text-gray-900 text-xl mb-2">{{__('public')['service7']}}</h4>
                    <p class="font-normal text-gray-700 text-md leading-relaxed text-justify">{{__('public')['service7_details']}}</p>
                </div>
            </div>

            <div class="w-full text-center justify-center space-x-4 mb-10 md:mx-4 bg-green-50 hover:bg-white p-4 rounded-lg">
                <div class="px-8 h-20  mx-auto md:mx-0 rounded-lg flex items-center justify-center mb-5 md:mb-0">
                    <i data-feather="check-circle" class="h-14 w-20 text-green-900"></i>
                </div>

                <div class="text-center">
                    <h4 class="font-semibold text-gray-900 text-xl mb-2">{{__('public')['service8']}}</h4>
                    <p class="font-normal text-gray-700 text-md leading-relaxed text-justify">{{__('public')['service8_details']}}</p>
                </div>
            </div>

            <div class="w-full text-center justify-center space-x-4 mb-10 md:mx-4 bg-green-50 hover:bg-white p-4 rounded-lg">
                <div class="px-8 h-20  mx-auto md:mx-0 rounded-lg flex items-center justify-center mb-5 md:mb-0">
                    <i data-feather="check-circle" class="h-14 w-20 text-green-900"></i>
                </div>

                <div class="text-center">
                    <h4 class="font-semibold text-gray-900 text-xl mb-2">{{__('public')['service9']}}</h4>
                    <p class="font-normal text-gray-700 text-md leading-relaxed text-justify">{{__('public')['service9_details']}}</p>
                </div>
            </div>

            <div class="w-full text-center justify-center space-x-4 mb-10 md:mx-4 bg-green-50 hover:bg-white p-4 rounded-lg ">
                <div class="px-8 h-20  mx-auto md:mx-0 rounded-lg flex items-center justify-center mb-5 md:mb-0">
                    <i data-feather="check-circle" class="h-14 w-20 text-green-900"></i>
                </div>

                <div class="text-center">
                    <h4 class="font-semibold text-gray-900 text-xl mb-2">{{__('public')['service10']}}</h4>
                    <p class="font-normal text-gray-700 text-md leading-relaxed text-justify">{{__('public')['service10_details']}}</p>
                </div>
            </div>

            <div class="w-full text-center justify-center space-x-4 mb-10 md:mx-4 bg-green-50 hover:bg-white p-4 rounded-lg ">
                <div class="px-8 h-20  mx-auto md:mx-0 rounded-lg flex items-center justify-center mb-5 md:mb-0">
                    <i data-feather="check-circle" class="h-14 w-20 text-green-900"></i>
                </div>

                <div class="text-center">
                    <h4 class="font-semibold text-gray-900 text-xl mb-2">{{__('public')['service11']}}</h4>
                    <p class="font-normal text-gray-700 text-md leading-relaxed text-justify">{{__('public')['service11_details']}}</p>
                </div>
            </div> -->

    </div>
    <div class="my-10 md:my-auto w-full text-center ">
        <a href="{{ route('services') }}" class="bg-green-700 p-4 font-bold text-white hover:bg-green-600 ">اكتشف المزيد من الخدمات</a>
    </div>
</section>

<!-- gallery section -->
<!-- <section class="bg-white py-10 md:py-16">

            <div class="container max-w-screen-xl mx-auto px-4">

                <h1 class="font-semibold text-gray-900 text-4xl text-center mb-10">Our Gallery</h1>

                <div class="hidden md:block flex items-center text-center space-x-10 lg:space-x-20 mb-12">
                    <a href="#" class="px-6 py-2 bg-green-800 text-white font-semibold text-xl rounded-lg hover:bg-green-600 transition ease-in-out duration-500">All</a>
                    <a href="#" class="px-6 py-2 text-gray-900 font-normal text-xl rounded-lg hover:bg-gray-200 hover:text-gray-400 transition ease-in-out duration-500">Exterior</a>
                    <a href="#" class="px-6 py-2 text-gray-900 font-normal text-xl rounded-lg hover:bg-gray-200 hover:text-gray-400 transition ease-in-out duration-500">Interior</a>
                    <a href="#" class="px-6 py-2 text-gray-900 font-normal text-xl rounded-lg hover:bg-gray-200 hover:text-gray-400 transition ease-in-out duration-500">Building</a>
                </div>

                <div class="flex space-x-4 md:space-x-6 lg:space-x-8">
                    <div>
                        <img src="{{asset('imgs/image/gallery-1.png')}}" alt="image" class="mb-4 md:mb-6 lg:mb-8 hover:opacity-75 transition ease-in-out duration-500">
                        <img src="{{asset('imgs/image/gallery-4.png')}}" alt="image" class="hover:opacity-75 transition ease-in-out duration-500">
                    </div>

                    <div>
                        <img src="{{asset('imgs/image/gallery-2.png')}}" alt="image" class="mb-4 md:mb-6 lg:mb-8 hover:opacity-75 transition ease-in-out duration-500">
                        <img src="{{asset('imgs/image/gallery-5.png')}}" alt="image" class="mb-3 md:mb-6 lg:mb-8 hover:opacity-75 transition ease-in-out duration-500">
                        <img src="{{asset('imgs/image/gallery-6.png')}}" alt="image" class="hover:opacity-75 transition ease-in-out duration-500">
                    </div>

                    <div>
                        <img src="{{asset('imgs/image/gallery-3.png')}}" alt="image" class="mb-4 md:mb-6 lg:mb-8 hover:opacity-75 transition ease-in-out duration-500">
                        <img src="{{asset('imgs/image/gallery-7.png')}}" alt="image" class="hover:opacity-75 transition ease-in-out duration-500">
                    </div>
                </div>

            </div> 

        </section> -->
<!-- gallery section //end -->

<!-- testimoni section -->
<section class="bg-white py-10 md:py-16">

    <div class="container max-w-screen-xl mx-auto px-4 xl:relative">

        <p class="font-normal text-gray-400 text-lg md:text-xl text-center uppercase mb-6">{{__('public')['testimonial']}}</p>

        <h1 class="font-semibold text-gray-900 text-2xl md:text-4xl text-center leading-normal mb-14">{{__('public')['testimonial_says']}}</h1>

        <div class="hidden xl:block xl:absolute top-0">
            <img src="{{asset('imgs/image/testimoni-1.png')}}" alt="Image">
        </div>

        <div class="hidden xl:block xl:absolute top-32">
            <img src="{{asset('imgs/image/testimoni-2.png')}}" alt="Image">
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-32 md:items-center justify-center md:space-x-8 lg:space-x-12 mb-10 md:mb-20">

            <div class="bg-gray-100 rounded-lg mb-10 md:mb-0">
                <img src="{{asset('imgs/image/testimoni-3.png')}}" alt="Image" class="mx-8 my-8">

                <div class="flex items-center gap-5 mx-8">
                    <i data-feather="star" class="text-yellow-500"></i>
                    <i data-feather="star" class="text-yellow-500"></i>
                    <i data-feather="star" class="text-yellow-500"></i>
                    <i data-feather="star" class="text-yellow-500"></i>
                    <!-- <i data-feather="star" class="text-yellow-500"></i> -->
                </div>

                <p class="font-normal text-sm lg:text-md text-gray-700 mx-8 my-8">{{__('public')['testimonial1']}}</p>

                <h3 class="font-semibold text-gray-900 text-xl md:text-2xl lg:text-3xl mx-8 mb-8">{{__('public')['testimonial1_name']}}</h3>
            </div>

            <div class="bg-gray-100 rounded-lg">
                <img src="{{asset('imgs/image/testimoni-4.png')}}" alt="Image" class="mx-8 my-8">

                <div class="flex items-center gap-5 mx-8">
                    <i data-feather="star" class="text-yellow-500"></i>
                    <i data-feather="star" class="text-yellow-500"></i>
                    <i data-feather="star" class="text-yellow-500"></i>
                    <i data-feather="star" class="text-yellow-500"></i>
                    <i data-feather="star" class="text-yellow-500"></i>
                </div>

                <p class="font-normal text-sm lg:text-md text-gray-700 mx-8 my-8">{{__('public')['testimonial2']}}</p>

                <h3 class="font-semibold text-gray-900 text-xl md:text-2xl lg:text-3xl mx-8 mb-8">{{__('public')['testimonial1_name']}}</h3>
            </div>

        </div>

    </div> <!-- container.// -->

</section>
<!-- testimoni section //end -->


<!-- book section -->
<section class="bg-white py-10 md:py-16">

    <div class="container max-w-screen-xl mx-auto px-4 xl:relative">

        <div class="bg-green-800 flex flex-col lg:flex-row items-center justify-evenly py-14 rounded-3xl">

            <div class="text-center lg:text-right mb-10 lg:mb-0">
                <h1 class="font-semibold text-white text-4xl md:text-5xl lg:text-7xl leading-normal mb-4">{!! __('public')['talk_us'] !!}</h1>

                <p class="font-normal text-white text-md md:text-xl">{!! __('public')['more_talk'] !!}</p>
            </div>

            <div class="hidden xl:block xl:absolute right-0">
                <img src="{{asset('imgs/image/book.png')}}" alt="Image">
            </div>

            <div class=" md:block bg-white xl:relative px-4 w-5/6 md:w-auto py-3 rounded-none">
                <div class="py-3">
                    <h3 class="font-semibold text-gray-900 text-3xl">{{__('public')['book_meeting']}}</h3>
                </div>

                <div class="py-3">
                    <input type="text" placeholder="{{__('name')}}" class="px-4 py-4 md:w-96 w-full bg-gray-100 placeholder-gray-400 rounded-xl outline-none">
                </div>

                <div class="py-3">
                    <input type="text" placeholder="{{__('email')}}" class="px-4 py-4 md:w-96 w-full bg-gray-100 placeholder-gray-400 rounded-xl outline-none">
                </div>

                <div class="py-3 relative">
                    <input type="date" placeholder="{{__('date')}}" class="px-4 py-4 md:w-96 w-full bg-gray-100 font-normal text-lg placeholder-gray-400 rounded-xl outline-none">

                    <!-- <div class="absolute inset-y-0 left-80 ml-6 flex items-center text-xl text-gray-600">
                            <i data-feather="calendar"></i>
                        </div> -->
                </div>

                <div class="py-3 relative">
                    <input type="text" placeholder="{{__('notes')}}" class="px-4 py-4 md:w-96 w-full bg-gray-100 placeholder-gray-400 rounded-xl outline-none">

                    <!-- <div class="absolute inset-y-0 left-80 ml-6 flex items-center text-xl text-gray-600">
                            <i data-feather="chevron-down"></i>
                        </div> -->
                </div>

                <div class="py-3">
                    <button class="w-full py-4 font-semibold text-lg text-white bg-green-700 rounded-none hover:bg-green-900 transition ease-in-out duration-500">أرسل</button>
                </div>
            </div>

        </div>

    </div> <!-- container.// -->

</section>
<!-- book section //end -->

@include('public.footer')