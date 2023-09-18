@include('guest.header')

<link rel="stylesheet" itemprop="url" href="{{asset('css/intlTelInput.min.css')}}" />

<div class="bg-white rounded-lg p-8 shadow-lg w-[500px]">
    
    <section title="page header" class="w-full px-[10%] py-[2%] bg-white" id="form-cover">
        <h2 class="text-3xl font-bold text-black text-right">{{ __('register') }}</h2>
        @if(Session::has('errors'))
        <div class="my-3 w-2/4 p-4 bg-orange-500 text-white rounded-md">
            {!! session('errors')->first('register_error') !!}
        </div>
        @endif
        <div class="block lg:flex m-2 lg:full overflow-x-auto my-2 md:my-5">

            <form action="{{ route('register.user.action') }}" method="post" onsubmit="return form_submit(this);" class="w-full">
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
                    <label for="phone" class="lable_form">{{ __('phone') }}</label>
                    <input type="text" name="phone" id="phone" placeholder="512345678" class="form_input !w-full !border-blue-500 text-left" dir="ltr" value="{{ old('phone') }}" />
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


<!-- https://github.com/jackocnr/intl-tel-input  -->
<script src="{{asset('js/intlTelInput-jquery.min.js')}}"></script>
<script src="{{asset('js/intlTelInput.min.js')}}"></script>
<script>
    $('#phone').intlTelInput({

        initialCountry: 'sa',
        separateDialCode: true,
        preferredCountries: ["sa", "ae", 'uk', 'us'],
        utilsScript: "{{asset('js/utils.js')}}",
        dropdownContainer: document.getElementById("form-cover")

    });

    function form_submit(e) {

        if ($('#phone').intlTelInput("getNumber")) {
            if ($('#phone').val().charAt(0) == 0) {
                $('#phone').val($('#phone').val().substring(1));
            }

            if ($('#phone').val().length == 9) {
                $('#phone').val($('#phone').intlTelInput("getNumber"));
                return true;
            } else {
                e.preventDefault();
                alert('الرجاء ادخال رقم هاتف صحيح');
                return false;
            }
        } else {
            e.preventDefault();
            alert('الرجاء ادخال رقم هاتف صحيح');
            return false;
        }

    }
</script>
@include('guest.footer')