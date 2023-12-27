@include('editor.header')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/css/intlTelInput.css">

<div class="content">
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="relative rounded-tl-md  rounded-tr-md overflow-auto p-8">
                    <h2 class="text-2xl font-bold mb-4"> {{ __('add_post') }} </h2>
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

                        
                        <form action="{{ route('admin.engineers.create.action') }}" method="post" enctype="multipart/form-data" onsubmit="return form_submit(this);" class="w-full">
                            @csrf
                            <div class="mb-4">
                                <label for="title" class="lable_form">{{ __('post_title') }}</label>
                                <input type="text" name="title" class="form_input !w-full" value="{{ old('title') }}" required/>
                            </div>
                            
                            <div class="mb-4">
                                <label for="body" class="lable_form">{{ __('post_body') }}</label>
                                <!-- <textarea name="body" id="body" cols="30" rows="10" class="form_input"></textarea> -->
                                @php 
                                    $data = "Ahmed";
                                @endphp
                                <x-forms.tinymce-editor :body="old('body')" />
                            </div>

                            <div class="mb-4">
                                <label for="seo_title" class="lable_form">{{ __('post_seo_title') }}</label>
                                <input type="text" name="seo_title" class="form_input !w-full" value="{{ old('seo_title') }}" required/>
                            </div>

                            <div class="mb-4">
                                <label for="seo_description" class="lable_form">{{ __('post_seo_description') }}</label>
                                <input type="text" name="seo_description" class="form_input !w-full" value="{{ old('seo_description') }}" required />
                            </div>

                            <div class="mb-4">
                                <label for="name" class="lable_form">{{ __('cover_image') }}</label>
                                <input type="file" name="name" class="form_input !w-full"  />
                            </div>

                            <div class="mb-4">
                                <label for="slug" class="lable_form">{{ __('slug') }}</label>
                                <input type="text" name="slug" class="form_input !w-full" value="{{ old('slug') }}" required/>
                            </div>

                            <div class="mb-4">
                                <label for="language" class="lable_form">{{ __('language') }}</label>
                                <select name="language" id="language" class="form_input !w-full">
                                    <option value="ar" {{ old('language') == 'ar' ? selected : "" }} >{{__('ar')}}</option>
                                    <option value="en" {{ old('language') == 'en' ? selected : "" }} >{{__('en')}}</option>
                                </select>                                
                            </div>

                            <div class="mb-4">
                                <label for="keywords" class="lable_form">{{ __('post_keywords') }}</label>
                                <input type="text" name="keywords" class="form_input !w-full" value="{{ old('keywords') }}" />
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