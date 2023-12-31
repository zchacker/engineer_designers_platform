@include('public.header')
<section class="bg-green-50 py-14">
    <div class=" py-6 text-center">
        <h1 class="text-4xl font-bold text-gray-800">{{__('public')['contact']}}</h1>
    </div>
    <div class="container mx-auto p-8 mt-8 grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Right Column: Contact Details -->
        <div class="shadow-none rounded-lg p-6">
            <h2 class="text-2xl font-semibold text-gray-800 mb-14">{{__('public')['contact_details']}}</h2>
            <div class="mb-4">
                <p class="text-xl font-semibold text-gray-700">{{__('phone')}}:</p>
                <a href="tel:+966536385896">
                    <p class="text-gray-800 text-right" dir="ltr">+966 53 638 5896</p>
                </a>
            </div>
            <div class="mb-4">
                <p class="text-xl font-semibold text-gray-700">{{__('email')}}:</p>
                <a href="mailto:info@alojian.com">
                    <p class="text-gray-800">info@alojian.com</p>
                </a>
            </div>
            <div class="flex items-center justify-center">
                <img src="{{asset('imgs/image/mission.jpg')}}" alt="Image 1" class="rounded-none w-full">
            </div>
            <!-- Add other contact information here -->
            <!-- You can also add a map or other elements below this section -->
        </div>

        <!-- Left Column: Contact Form -->
        <div class="bg-white shadow-lg shadow-gray-500 rounded-xl p-6">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">{{__('public')['contact_us_today']}}</h2>

            @if(session('success'))
            <div class="my-3 w-auto p-4 bg-green-700 text-white rounded-md">
                {!! session('success') !!}
            </div>
            @endif

            <form action="{{ route('contact-us.send') }}" method="post">
                @csrf

                @error('name')
                <span class="text-red-600 font-bold">{{ $message }}</span>
                @enderror
                <div class="mb-4">
                    <label for="name" class="text-gray-800 text-lg">{{__('name')}}</label>
                    <input type="text" id="name" name="name" required class="w-full px-4 py-3 border border-gray-800 rounded-lg focus:ring focus:ring-indigo-400">
                </div>

                @error('email')
                <span class="text-red-600 font-bold">{{ $message }}</span>
                @enderror
                <div class="mb-4">
                    <label for="email" class="text-gray-800 text-lg">{{__('email')}}</label>
                    <input type="email" id="email" name="email" class="w-full px-4 py-3 border border-gray-800 rounded-lg focus:ring focus:ring-indigo-400">
                </div>
                
                @error('message')
                <span class="text-red-600 font-bold">{{ $message }}</span>
                @enderror
                <div class="mb-4">

                    <label for="message" class="text-gray-800 text-lg">{{__('public')['message']}}</label>
                    <textarea id="message" name="message" rows="4" class="w-full px-4 py-3 border border-gray-800 rounded-lg focus:ring focus:ring-indigo-400"></textarea>
                </div>
                <button type="submit" class="normal_button">{{__('public')['send_now']}}</button>
            </form>
        </div>
    </div>
</section>
@include('public.footer')