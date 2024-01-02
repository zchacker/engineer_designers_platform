@include('editor.header')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/css/intlTelInput.css">

<div class="content">
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="relative rounded-tl-md  rounded-tr-md overflow-auto p-8">
                    <h2 class="text-2xl font-bold mb-4"> {{ __('add_page_data') }} </h2>
                    <div class="overflow-x-auto relative">

                        @if(Session::has('errors'))
                        <div class="my-3 w-auto p-4 bg-orange-500 text-white rounded-md">
                            {!! session('errors')->first('error') !!}
                        </div>
                        @endif

                        @if(Session::has('success'))
                        <div class="my-3 w-auto p-4 bg-green-700 text-white rounded-md">
                            {!! session('success') !!}
                        </div>
                        @endif

                        
                        <form action="{{ route('editor.page.create.action') }}" method="post" enctype="multipart/form-data" onsubmit="return form_submit(this);" class="w-full">
                            @csrf
                            <div class="mb-4">
                                <label for="title" class="lable_form">{{ __('title') }}</label>
                                <input type="text" name="title" class="form_input !w-full" value="{{ old('title') }}" required/>
                            </div>
                            
                            <div class="mb-4">
                                <label for="description" class="lable_form">{{ __('description') }}</label>
                                <textarea name="description" id="description" cols="30" rows="4" class="form_input !w-full"></textarea>                                
                            </div>                            

                            <div class="mb-4">
                                <label for="path" class="lable_form">{{ __('path') }}</label>
                                <input type="text" name="path" class="form_input !w-full" value="{{ old('path') }}" required/>
                            </div>

                            <div class="mb-4">
                                <label for="language" class="lable_form">{{ __('language') }}</label>
                                <select name="language" id="language" class="form_input !w-full">
                                    <option value="ar" {{ old('language') == 'ar' ? 'selected' : "" }} >{{__('ar')}}</option>
                                    {{--<option value="en" {{ old('language') == 'en' ? 'selected' : "" }} >{{__('en')}}</option>--}}
                                </select>                                
                            </div>                                                       

                            <div class="mb-4">
                                <input type="submit" value="{{ __('save') }}" class="normal_button" />
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/intlTelInput.min.js"></script>
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

@include('editor.footer')