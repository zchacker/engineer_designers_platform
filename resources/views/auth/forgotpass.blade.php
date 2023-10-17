@include('public.header')
<section class="bg-gray-50 mb-20 py-8 md:mb-52 xl:mb-8 md:min-h-screen">
    <div class="container max-w-screen-xl mx-auto px-4 ">
        <section class="md:w-1/2 mx-auto p-8 rounded-lg bg-white">
            <h2 class="text-3xl font-bold text-black text-right">{{ __('reset_password') }}</h2>
            @if(Session::has('errors'))
            <div class="my-3 w-full p-4 bg-orange-500 text-white rounded-md">
                {!! session('errors')->first('error') !!}
            </div>
            @endif
            @if(Session::has('success'))
            <div class="my-3 w-auto p-4 bg-green-700 text-white rounded-md">
                {!! session('success') !!}
            </div>
            @endif
            <div class="block lg:flex m-2 overflow-x-auto my-5">
                <form action="{{ route('password.forgot.action') }}" method="post" class="w-full">
                    @csrf
                    <div class="mb-4">
                        <label for="email" class="lable_form">{{ __('email') }}</label>
                        <input type="email" name="email" class="form_input !w-full" value="{{ old('email') }}" />
                    </div>
                    <div class="mb-4">
                        <input type="submit" value="{{ __('submit') }}" class="bg-blue-600 text-white rounded-lg py-2 px-4" />
                    </div>
                    <div class="mb-4">
                        <a href="{{ route('confirm.email.resend.action') }}" class="link">{{__('submit')}}</a>                    
                    </div>
                </form>
            </div>
        </section>
    </div>
</section>
@include('public.footer')