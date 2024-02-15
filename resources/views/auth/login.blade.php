@include('public.header')

<section class="bg-gray-100 pb-20 py-8 md:pb-52 xl:pb-8 md:min-h-screen">
    <div class="container max-w-screen-xl mx-auto px-4 flex flex-col-reverse md:flex-row  items-center">
        <section>
            <img src="{{ asset('imgs/image/working-desk.png') }}" alt="" class="w-[500px]">
        </section>
        <section class="md:w-1/2 mx-auto p-8 rounded-xl shadow-lg shadow-gray-400 bg-white">
            <h2 class="text-3xl font-bold text-black text-right">{{ __('login') }}</h2>
            @if(Session::has('errors'))
            <div class="my-3 w-full p-4 bg-orange-500 text-white rounded-md">
                {!! session('errors')->first('login_error') !!}
            </div>
            @endif
            @if(Session::has('success'))
            <div class="my-3 w-auto p-4 bg-green-700 text-white rounded-md">
                {!! session('success') !!}
            </div>
            @endif
            <div class="block lg:flex m-2 overflow-x-auto my-5">

                <form action="{{ route('login.action') }}" method="post" class="w-full">
                    @csrf
                    <div class="mb-4">
                        <label for="email" class="lable_form">{{ __('email') }}</label>
                        <input type="text" name="email" class="form_input !w-full" value="{{ old('email') }}" />
                    </div>

                    <div class="mb-4">
                        <label for="password" class="lable_form">{{ __('password') }}</label>
                        <input type="password" name="password" class="form_input !w-full" />
                    </div>

                    <div class="mb-4">
                        <input type="submit" value="{{ __('login_btn') }}" class="normal_button" />
                    </div>

                    <div class="md:flex mb-4 justify-start gap-3 w-full">
                        @if(app()->getLocale() == 'en')
                        <a href="{{ route('register.user' , app()->getLocale() ) }}" title="{{__('register')}}" class="link">{{__('register')}}</a>
                        @else
                        <a href="{{ route('register.user' ) }}" title="{{__('register')}}" class="link">{{__('register')}}</a>
                        @endif
                        <span> | </span>
                        <a href="{{ route('password.forgot') }}" title="{{__('forgot_password')}}" class="link">{{__('forgot_password')}}</a>
                    </div>

                </form>

            </div>
        </section>
    </div>
</section>

@include('public.footer')