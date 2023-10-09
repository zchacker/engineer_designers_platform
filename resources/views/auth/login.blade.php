@include('public.header')

<section class="bg-white mb-20 md:mb-52 xl:mb-8">
    <div class="container max-w-screen-sm mx-auto px-4 ">
        <h2 class="text-3xl font-bold text-black text-right">{{ __('login') }}</h2>
        @if(Session::has('errors'))
        <div class="my-3 w-full p-4 bg-orange-500 text-white rounded-md">
            {!! session('errors')->first('login_error') !!}
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
                    <input type="submit" value="{{ __('login_btn') }}" class="bg-blue-600 text-white rounded-lg py-2 px-4" />
                </div>

                <div class="mb-4 flex justify-start gap-3 w-full">
                    <a href="{{ route('register.user') }}" title="{{__('register')}}" class="link">{{__('register')}}</a>
                    <span> . </span>
                    <a href="#" title="{{__('forgot_password')}}" class="link">{{__('forgot_password')}}</a>
                </div>

            </form>

        </div>

    </div>
</section>

@include('public.footer')