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
                <a href="tel:+966112666766">
                    <p class="text-gray-800 text-right" dir="ltr">+966 11 266 6766</p>
                </a>
            </div>
            <div class="mb-4">
                <p class="text-xl font-semibold text-gray-700">{{__('email')}}:</p>
                <a href="mailto:info@alojian.com">
                    <p class="text-gray-800">info@alojian.com</p>
                </a>
            </div>
            <div class="flex items-center justify-center">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14508.07128006819!2d46.549774!3d24.6230707!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e2f19e072479591%3A0x5c9bc475274e590b!2z2LTYsdmD2Kkg2LHYtNmK2K8g2KfZhNi52KzZitin2YYg2YTZhNin2LPYqti02KfYsdin2Kog2KfZhNmH2YbYr9iz2YrYqQ!5e0!3m2!1sen!2ssa!4v1709969915852!5m2!1sen!2ssa" width="400" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                <!-- <div id="map" class="w-[400px] h-[400px]"></div> -->
                <!-- <img src="{{asset('imgs/image/mission.jpg')}}" alt="Image 1" class="rounded-none w-full"> -->
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

{{--
<script>
    // Initialize and add the map
    function initMap() {
        // The location of your desired center on the map
        var center = {
            lat: 24.623094303102697,
            lng: 46.549708843017804
        }; // Example: New York City
        // The map, centered at your chosen location
        var map = new google.maps.Map(
            document.getElementById('map'), {
                zoom: 15,
                center: center
            });
        // The marker, positioned at your chosen location
        var marker = new google.maps.Marker({
            position: center,
            map: map
        });
    }
</script>
<!-- Load the Google Maps API script with your API key -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCB9vXyr4q2Tn9D9gDKzUw7dO2VrPcPKxo&callback=initMap"></script>
--}}
@include('public.footer')