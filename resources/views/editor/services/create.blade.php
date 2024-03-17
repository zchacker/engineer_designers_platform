@include('editor.header')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/css/intlTelInput.css">

<div class="content">
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="relative rounded-tl-md  rounded-tr-md overflow-auto p-8">
                    <h2 class="text-2xl font-bold mb-4"> {{__('service_create')}} </h2>
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

                        <form action="{{ route('editor.services.create.action') }}" method="post" enctype="multipart/form-data" onsubmit="return form_submit(this);" class="w-full">
                            @csrf
                            <div class="bg-white p-8 shadow-md rounded-xl my-8">
                                <div class="mb-4">
                                    <label for="name" class="lable_form">عنوان الخدمة بالعربي <span class="text-red-500">*</span> </label>
                                    <input type="text" name="name" class="form_input" value="{{ old('name') }}" required maxlength="255" />
                                </div>

                                <div class="mb-4">
                                    <label for="name" class="lable_form">Service English title <span class="text-red-500">*</span> </label>
                                    <input type="text" name="name_en" class="form_input" value="{{ old('name_en') }}" required maxlength="255" />
                                </div>

                                <!-- sub hero  -->
                                <div class="mb-4">
                                    <label for="sub_title" class="lable_form">العنوان الفرعي <span class="text-red-500">*</span> </label>
                                    <input type="text" name="sub_title" class="form_input" value="{{ old('sub_title') }}" required maxlength="255" />
                                </div>

                                <div class="mb-4">
                                    <label for="sub_title_en" class="lable_form">Sub English title <span class="text-red-500">*</span> </label>
                                    <input type="text" name="sub_title_en" class="form_input" value="{{ old('sub_title_en') }}" required maxlength="255" />
                                </div>


                                <div class="mb-4">
                                    <label for="description" class="lable_form">الوصف المختصر <span class="text-red-500">*</span></label>
                                    <textarea name="description" class="form_input" id="description" cols="30" rows="10" required>{{ old('description') }}</textarea>
                                </div>

                                <div class="mb-4">
                                    <label for="description" class="lable_form">English short description <span class="text-red-500">*</span></label>
                                    <textarea name="description_en" class="form_input" id="description_en" cols="30" rows="10" required>{{ old('description_en') }}</textarea>
                                </div>
                            </div>

                            <div class="bg-white p-8 shadow-md rounded-xl my-8">
                                <div class="mb-4">
                                    <label for="about_service" class="lable_form">عن الخدمة (داخل الصفحة) <span class="text-red-500">*</span></label>
                                    @php
                                    $input_name = "about_service";
                                    @endphp
                                    <x-forms.tinymce-editor-custome :name="$input_name" required />
                                </div>

                                <div class="mb-4">
                                    <label for="about_service" class="lable_form">About Server (inside page) <span class="text-red-500">*</span></label>
                                    @php
                                    $input_name = "about_service_en";
                                    @endphp
                                    <x-forms.tinymce-editor-custome :name="$input_name" required />
                                </div>
                            </div>

                            <div class="bg-white p-8 shadow-md rounded-xl my-8">
                                <div class="mb-4">
                                    <label for="about_plus" class="lable_form">النص المقابل للفديو <span class="text-red-500">*</span></label>
                                    @php
                                    $input_name = "about_plus";
                                    @endphp
                                    <x-forms.tinymce-editor-custome :name="$input_name" required />
                                </div>

                                <div class="mb-4">
                                    <label for="about_plus_en" class="lable_form">Text Next to Video <span class="text-red-500">*</span></label>
                                    @php
                                    $input_name = "about_plus_en";
                                    @endphp
                                    <x-forms.tinymce-editor-custome :name="$input_name" required />
                                </div>
                            </div>


                            <div class="bg-white p-8 shadow-md rounded-xl my-8">
                                <div class="mb-4">
                                    <label for="cta" class="lable_form"> عنوان دعوة لاتخاذ إجراء <span class="text-red-500">*</span></label>
                                    <input type="text" name="cta" class="form_input" value="{{ old('cta') }}" required maxlength="255" />
                                </div>

                                <div class="mb-4">
                                    <label for="cta_en" class="lable_form">Call to action title <span class="text-red-500">*</span></label>
                                    <input type="text" name="cta_en" class="form_input" value="{{ old('cta_en') }}" required maxlength="255" />
                                </div>

                                <div class="mb-4">
                                    <label for="sub_cta" class="lable_form">عنوان فرعي للحث على اتخاذ إجراء <span class="text-red-500">*</span></label>
                                    <input type="text" name="sub_cta" class="form_input" value="{{ old('sub_cta') }}" required maxlength="255" />
                                </div>

                                <div class="mb-4">
                                    <label for="sub_cta_en" class="lable_form">Call to action subtitle <span class="text-red-500">*</span></label>
                                    <input type="text" name="sub_cta_en" class="form_input" value="{{ old('sub_cta_en') }}" required maxlength="255" />
                                </div>

                                <div class="mb-4">
                                    <label for="type" class="lable_form">{{ __('type') }} <span class="text-red-500">*</span></label>
                                    <select name="type" id="type" class="form_input">
                                        <option value="internal" @if(old('type')=='internal' ) selected @endif>{{__('internal')}}</option>
                                        <option value="external" @if(old('type')=='external' ) selected @endif>{{__('external')}}</option>
                                    </select>
                                </div>

                                <div class="mb-4">
                                    <span class="text-red-500">الرجاء رفع صورة لا تتخطى 1MB يمكن استخدام موقع <a href="https://tinypng.com/" class="text-blue-700 hover:underline" target="_blank">https://tinypng.com</a> </span>
                                    <label for="name" class="lable_form">
                                        {{ __('cover_image') }} <span class="text-red-500">*</span>
                                    </label>
                                    <input type="file" name="file" class="form_input" onchange="checkFileSize(this)" accept="image/png, image/gif, image/jpeg, image/webp" required />
                                </div>

                                <div class="mb-4">
                                    <label for="cover_img_alt" class="lable_form">نص ALT الخاص بصور ةالغلاف</label>
                                    <input type="text" name="cover_img_alt" class="form_input" value="{{ old('cover_img_alt') }}" maxlength="255" />
                                </div>

                                <div class="mb-4">
                                    <span class="text-red-500">الرجاء رفع صورة لا تتخطى 1MB يمكن استخدام موقع <a href="https://tinypng.com/" class="text-blue-700 hover:underline" target="_blank">https://tinypng.com</a> </span>
                                    <label for="name" class="lable_form">
                                        صورة القسم العلوي من الصفحة <span class="text-red-500">*</span>
                                    </label>
                                    <input type="file" name="hero_img_file" class="form_input" onchange="checkFileSize(this)" accept="image/png, image/gif, image/jpeg, image/webp" required />
                                </div>

                                <div class="mb-4">
                                    <span class="text-red-500">الرجاء رفع صورة لا تتخطى 1MB يمكن استخدام موقع <a href="https://tinypng.com/" class="text-blue-700 hover:underline" target="_blank">https://tinypng.com</a> </span>
                                    <label for="name" class="lable_form">
                                        الصورة بجوار عن الخدمة <span class="text-red-500">*</span>
                                    </label>
                                    <input type="file" name="about_img_file" class="form_input" onchange="checkFileSize(this)" accept="image/png, image/gif, image/jpeg, image/webp" required />
                                </div>

                                <div class="mb-4">
                                    <label for="about_img_alt" class="lable_form">نص ALT الخاص بصورة عن الخدمة</label>
                                    <input type="text" name="about_img_alt" class="form_input" value="{{ old('about_img_alt') }}" maxlength="255" />
                                </div>

                                <div class="mb-4">
                                    <label for="name" class="lable_form">
                                        الفديو MP4 <span class="text-red-500">*</span>
                                    </label>
                                    <input type="file" name="video_file" class="form_input" accept="video/mp4" required />
                                </div>

                                <div class="mb-4">
                                    <span class="text-red-500">الرجاء رفع صورة لا تتخطى 1MB يمكن استخدام موقع <a href="https://tinypng.com/" class="text-blue-700 hover:underline" target="_blank">https://tinypng.com</a> </span>
                                    <label for="name" class="lable_form">
                                        صورة قسم الدعوة لإتخاذ إجراء <span class="text-red-500">*</span>
                                    </label>
                                    <input type="file" name="cta_img_file" class="form_input" onchange="checkFileSize(this)" accept="image/png, image/gif, image/jpeg, image/webp" required />
                                </div>

                                <div class="mb-4">
                                    <label for="cta_url" class="lable_form">رابط زر اتخاذ إجراء (في حالة تركه فارغ يتم التوجيه إلى رقم الواتساب)</label>
                                    <input type="url" name="cta_url" id="cta_url" placeholder="http://...." class="form_input" dir="ltr" value="{{  old('cta_url') }}" />
                                </div>
                            </div>

                            <div class="mb-4 mt-8">
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