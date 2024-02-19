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

                        <form action="{{ route('editor.services.edit.action', $service->id) }}" method="post" enctype="multipart/form-data" onsubmit="return form_submit(this);" class="w-full">
                            @csrf
                            <div class="mb-4">
                                <label for="name" class="lable_form">{{ __('name') }} <span class="text-red-500">*</span> </label>
                                <input type="text" name="name" class="form_input" value="{{ $service->name }}" />
                            </div>

                            <div class="mb-4">
                                <label for="name" class="lable_form">English Name <span class="text-red-500">*</span> </label>
                                <input type="text" name="name_en" class="form_input" value="{{ $service->name_en }}" />
                            </div>

                            <div class="mb-4">
                                <label for="description" class="lable_form">{{ __('description') }} <span class="text-red-500">*</span></label>
                                <x-forms.tinymce-editor :body="$service->description" />
                            </div>

                            <div class="mb-4">
                                <label for="description" class="lable_form">English Description <span class="text-red-500">*</span></label>
                                <x-forms.tinymce-editor-en :body="$service->description_en" />
                            </div>

                            <div class="mb-4">
                                <label for="type" class="lable_form">{{ __('type') }} <span class="text-red-500">*</span></label>
                                <select name="type" id="type" class="form_input">
                                    <option value="internal" @if($service->type == 'internal') selected @endif >{{__('internal')}}</option>
                                    <option value="external" @if($service->type == 'external') selected @endif >{{__('external')}}</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label for="name" class="lable_form">{{ __('image') }} <span class="text-red-500">*</span> </label>
                                <input type="file" name="file" class="form_input" />
                            </div>

                            <div class="mb-4">
                                <label for="url" class="lable_form">{{ __('url') }}</label>
                                <input type="url" name="url" id="url" placeholder="http://...." class="form_input" dir="ltr" value="{{ $service->url }}" />
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