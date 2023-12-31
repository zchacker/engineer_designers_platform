@include('public.header')
<section class="bg-gray-50 mb-20 py-8 md:mb-52 xl:mb-8 md:min-h-screen">
    <div class="container max-w-screen-xl mx-auto px-4 flex flex-col-reverse md:flex-row  items-center">
        <section>
            <img src="{{ asset('imgs/image/working-desk.png') }}" alt="" class="w-[500px]">
        </section>
        <section class="md:w-1/2 mx-auto p-8 rounded-lg bg-white">
            <h2 class="text-3xl font-bold text-black text-right">{{ __('confirm_your_account') }}</h2>
            @if(Session::has('errors'))
            <div class="my-3 w-full p-4 bg-orange-500 text-white rounded-md">
                {!! session('errors')->first('error') !!}
            </div>
            @endif
            <div class="block lg:flex m-2 overflow-x-auto my-5">
                <form action="{{ route('confirm.email.action') }}" method="post" class="w-full">
                    @csrf
                    <div class="mb-4">
                        <label for="confirm_code" class="lable_form">{{ __('confirm_code') }}</label>
                        <input type="text" name="confirm_code" class="form_input !w-full" value="{{ old('confirm_code') }}" />
                    </div>
                    <div class="mb-4">
                        <input type="submit" value="{{ __('submit') }}" class="normal_button" />
                    </div>
                    <div class="mb-4">
                        <a href="{{ route('confirm.email.resend.action') }}" class="link">{{__('resend_code')}}</a>                    
                    </div>
                </form>
            </div>
        </section>
    </div>
</section>
@include('public.footer')