@include('admin.header')

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

                        <div class="my-3 w-auto p-2 text-green-600 rounded-md" id="save-msg">

                        </div>

                        <form action="{{ route('admin.post.create.action', $post->id) }}" method="post" id="blog-post" enctype="multipart/form-data" class="w-full">
                            @csrf

                            <div class="mb-4">
                                <label for="title" class="lable_form">{{ __('post_title') }}</label>
                                <input type="text" name="title" class="form_input !w-full" value="{{ $post->title ?? old('title') }}" maxlength="100" required autocomplete="off" />
                            </div>

                            <div class="mb-4">
                                <label for="body" class="lable_form">{{ __('post_body') }}</label>
                                <!-- <textarea name="body" id="body" cols="30" rows="10" class="form_input"></textarea> -->
                                <x-forms.tinymce-editor :body="$post->body ?? old('body')" autocomplete="off" required />
                            </div>

                            <div class="mb-4">
                                <label for="seo_title" class="lable_form">{{ __('post_seo_title') }}</label>
                                <input type="text" name="seo_title" class="form_input !w-full" value="{{ $post->seo_title ?? old('seo_title') }}" maxlength="255" autocomplete="off" required />
                            </div>

                            <div class="mb-4">
                                <label for="seo_description" class="lable_form">{{ __('post_seo_description') }}</label>
                                <input type="text" name="seo_description" class="form_input !w-full" value="{{ $post->seo_description ?? old('seo_description') }}" maxlength="170" autocomplete="off" required />
                            </div>

                            <div class="mb-4">
                                <label for="name" class="lable_form">{{ __('cover_image') }}</label>
                                <input type="file" name="cover_image_file" class="form_input !w-full" autocomplete="off" />
                            </div>

                            <div class="mb-4">
                                <label for="slug" class="lable_form">{{ __('slug') }}</label>
                                <input type="text" name="slug" class="form_input !w-full" value="{{ $post->slug ?? old('slug') }}" maxlength="250" autocomplete="off" required />
                            </div>

                            <div class="mb-4">
                                <label for="language" class="lable_form">{{ __('language') }}</label>
                                <select name="language" id="language" class="form_input !w-full">
                                    <option value="ar" {{ ($post->language ?? old('language')) == 'ar' ? 'selected' : "" }}>{{__('ar')}}</option>
                                    <option value="en" {{ ($post->language ?? old('language')) == 'en' ? 'selected' : "" }}>{{__('en')}}</option>
                                </select>
                            </div>

                            <div class="mb-16">
                                <label for="keywords" class="lable_form">{{ __('post_keywords') }}</label>
                                <input type="text" name="keywords" class="form_input !w-full" value="{{ $post->keywords ?? old('keywords') }}" maxlength="250" autocomplete="off" required />
                            </div>

                            <div class="mb-8">
                                <div class="my-3 w-auto p-2 text-green-600 rounded-md" id="save-msg2">

                                </div>
                            </div>

                            <div class="mb-4 flex flex-col md:flex-row gap-5">
                                <input type="button" value="{{ __('save_draft') }}" onclick="autoSaveForm();" class="gray_button" />
                                <input type="submit" value="{{ __('publish') }}" class="normal_button" />
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include this script in your Blade file or in a separate JavaScript file -->
<script>
    var autoSaveTimer;

    function startAutoSave() {
        autoSaveTimer = setInterval(function() {
            // Call the function to auto-save the form
            autoSaveForm();
        }, 180000); // 2 minutes in milliseconds
    }

    function autoSaveForm() {

        tinymce.activeEditor.execCommand('mceSave');

        // Create a new Date object
        var currentDate = new Date();

        // Get the current time components
        var hours = currentDate.getHours();
        var minutes = currentDate.getMinutes();
        var seconds = currentDate.getSeconds();

        // Format the time as a string
        var currentTime = hours + ":" + (minutes < 10 ? "0" + minutes : minutes) + ":" + (seconds < 10 ? "0" + seconds : seconds);

        var myDiv = document.getElementById('save-msg');
        var saveMsg = document.getElementById('save-msg2');
        // Add text content to the div
        myDiv.textContent = 'جاري حفظ البيانات';
        saveMsg.textContent = 'جاري حفظ البيانات';

        // Exclude the file input from the serialized data
        var formData = new FormData($('#blog-post')[0]); //$('#blog-post').serialize();

        $.ajax({
            method: 'POST',
            url: '{{ route("admin.autosave", $post->id) }}', // Change this route as per your setup
            data: formData,
            contentType: false, // Set contentType to false, FormData will automatically set it
            processData: false, // Set processData to false, FormData will automatically process the data           
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                console.log(response.message);
                myDiv.textContent = `{{ __('saved_successfuly') }}` + " " + `{{ __('draft') }}` + ' ' + currentTime;
                saveMsg.textContent = `{{ __('saved_successfuly') }}` + " " + `{{ __('draft') }}` + ' ' + currentTime;
            },
            error: function(error) {
                console.error('Autosave failed', error);
                myDiv.textContent = 'حدث خطأ لم يتم الحفظ <br/>' + error;
                saveMsg.textContent = 'حدث خطأ لم يتم الحفظ <br/>' + error;
            },
        });


    }

    // Start auto-save when the page is loaded
    $(document).ready(function() {
        startAutoSave();
    });

    // Stop auto-save when the form is submitted
    $('#blog-post').submit(function() {
        clearInterval(autoSaveTimer);
    });
</script>


@include('admin.footer')