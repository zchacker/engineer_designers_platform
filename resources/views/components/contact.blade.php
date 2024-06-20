<!-- contact us  -->
<div class="mt-[5%] md:p-10 md:px-16">
    <div class="bg-[#333333] grid grid-cols-1 md:grid-cols-2 p-10 md:rounded-3xl max-w-[1100px] mx-auto gap-y-6">
        <div class="flex flex-col items-start justify-start space-y-8">
            <h2 class="font-bold text-3xl text-white">{{ __('public')['contact_us_today'] }}</h2>
            <div class="flex flex-col space-y-4">  
                <div>
                    <h4 class="text-white font-bold text-lg">{{ __('phone') }}</h4>
                    <a href="tel:+966536385896" class="flex space-x-4 gap-1 text-white">
                        <img src="{{ asset('imgs/image/call.png') }}" alt="" class="object-contain w-6">
                        <span>0536385896</span>
                    </a>
                </div>

                <div>
                    <h4 class="text-white font-bold text-lg">{{ __('phone') }}</h4>
                    <a href="tel:+966112666766" class="flex space-x-4 gap-1 text-white">
                        <img src="{{ asset('imgs/image/call.png') }}" alt="" class="object-contain w-6">
                        <span>0112666766</span>
                    </a>
                </div> 

                <div>
                    <h4 class="text-white font-bold text-lg">{{ __('email') }}</h4>
                    <a href="mailto:info@alojian.com" class="flex space-x-4 gap-2 text-white">
                        <img src="{{ asset('imgs/image/mail.png ') }}" alt="" class="object-contain w-6">
                        <span>info@alojian.com</span>
                    </a>
                </div>     
            </div>
        </div>
        <div class="bg-white rounded-xl px-4">
            @if(session('success'))
            <div class="my-3 w-auto p-4 bg-green-700 text-white rounded-md">
                {!! session('success') !!}
            </div>
            @endif

            <form action="{{ route('contact-us.send') }}" method="post">
                @csrf

                <div class="py-3">
                    @error('name')
                    <span class="text-red-600 font-bold">{{ $message }}</span>
                    @enderror
                    <input type="text" name="name" placeholder="{{__('name')}}" class="px-4 py-4 md:w-full w-full bg-gray-100  rounded-full border-none placeholder-gray-400 outline-none">
                </div>

                <div class="py-3">
                    @error('email')
                    <span class="text-red-600 font-bold">{{ $message }}</span>
                    @enderror
                    <input type="text" name="email" placeholder="{{__('email')}}" class="px-4 py-4 md:w-full w-full bg-gray-100  rounded-full border-none placeholder-gray-400 outline-none">
                </div>


                <div class="py-3 relative">
                    @error('message')
                    <span class="text-red-600 font-bold">{{ $message }}</span>
                    @enderror
                    <textarea type="text" name="message" placeholder="{{__('notes')}}" class="px-4 py-4 md:w-full w-full bg-gray-100 rounded-3xl border-none placeholder-gray-400 outline-none"></textarea>
                </div>

                <div class="py-3 text-center">
                    <button type="submit" class="cta_button">{{__('public')['send_now']}}</button>
                </div>
            </form>
        </div>
    </div>
</div>