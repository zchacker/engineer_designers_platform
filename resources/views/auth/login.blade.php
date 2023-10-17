@include('public.header')

<section class="bg-gray-50 mb-20 py-8 md:mb-52 xl:mb-8 md:min-h-screen">
    <div class="container max-w-screen-xl mx-auto px-4 ">
        <section class="md:w-1/2 mx-auto p-8 rounded-lg bg-white">
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
                        <input type="submit" value="{{ __('login_btn') }}" class="bg-blue-600 text-white rounded-lg py-2 px-4" />
                    </div>

                    <div class="md:flex mb-4 justify-start gap-3 w-full">
                        <a href="{{ route('register.user') }}" title="{{__('register')}}" class="link">{{__('register')}}</a>
                        <span> . </span>
                        <a href="{{ route('password.forgot') }}" title="{{__('forgot_password')}}" class="link">{{__('forgot_password')}}</a>
                    </div>

                </form>

            </div>
        </section>
    </div>
</section>

@include('public.footer')