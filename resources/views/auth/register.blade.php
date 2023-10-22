@include('public.header')

<!-- <link rel="stylesheet" itemprop="url" href="{{asset('css/intlTelInput.min.css')}}" /> -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/css/intlTelInput.css">

<section class="bg-gray-50 mb-20 py-8 md:mb-52 xl:mb-8 min-h-screen">
    <div class="container max-w-screen-xl mx-auto px-4">
        <section title="page header" class="md:w-1/2 mx-auto p-8 rounded-lg bg-white" id="form-cover">
            <h2 class="text-3xl font-bold text-black text-right">{{ __('register') }}</h2>
            @if(Session::has('errors'))
            <div class="my-3 w-2/4 p-4 bg-orange-500 text-white rounded-md">
                {!! session('errors')->first('register_error') !!}
            </div>
            @endif
            <div class="block lg:flex m-2 lg:full overflow-x-auto my-2 md:my-5">

                <form action="{{ route('register.user.action') }}" method="post" class="w-full">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="lable_form">{{ __('name') }}</label>
                        <input type="text" name="name" class="form_input !w-full" value="{{ old('name') }}" />
                    </div>

                    <div class="mb-4">
                        <label for="email" class="lable_form">{{ __('email') }}</label>
                        <input type="text" name="email" class="form_input !w-full" value="{{ old('email') }}" />
                    </div>

                    <div class="mb-4">
                        <label for="phone_no" class="lable_form">{{ __('phone') }}</label>
                        <input type="text" name="phone_no" id="phone_no" placeholder="512345678" class="form_input !w-full !border-blue-500 text-left" dir="ltr" value="{{ old('phone') }}" />
                        <input type="hidden" name="phone_no[phone]" />
                    </div>

                    <div class="mb-4">
                        <label for="password" class="lable_form">{{ __('password') }}</label>
                        <input type="password" name="password" class="form_input !w-full" />
                    </div>

                    <div class="mb-4">
                        <input type="submit" value="{{ __('create_account') }}" class="bg-blue-600 text-white rounded-lg py-2 px-4" />
                    </div>

                    <div class="mb-4">
                        <a href="{{ route( 'login' ) }}" title="{{__('login')}}" class="link">{{__('login')}}</a>
                    </div>

                </form>

            </div>
        </section>
    </div>
</section>

<!-- https://github.com/jackocnr/intl-tel-input  -->
<!-- <script src="{{asset('js/intlTelInput-jquery.min.js')}}"></script> -->
<!-- <script src="{{asset('js/intlTelInput.min.js')}}"></script> -->
<script  src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/intlTelInput.min.js"></script>
<script>

    const input = document.querySelector("#phone_no");
    window.intlTelInput(input, {
        utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/utils.js",
        dropdownContainer: document.getElementById("form-cover"),
        initialCountry: 'sa',
        separateDialCode: true,
        preferredCountries: ["sa", "ae", 'uk', 'us'],
        hiddenInput: "phone"
    });

</script>

@include('public.footer')