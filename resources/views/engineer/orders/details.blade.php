@include('engineer.header')
<div class="content">

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white2 overflow-hidden shadow-none sm:rounded-lg">
                {{-- Content--}}
                <div class="p-6 bg-white border-b shadow-sm rounded-3xl border-gray-200">

                    <div class="px-4 sm:px-6 lg:px-8">

                        <div class="sm:flex sm:items-center mb-8">
                            <div class="sm:flex-auto">
                                <h1 class="text-xl font-semibold text-gray-900">
                                    {{__('order_details_data')}}
                                </h1>

                                <p class="mt-2 text-sm text-gray-600">
                                    {{__('order_details_data_message')}}
                                </p>
                            </div>

                        </div>

                        <!-- order data card  -->
                        <div class="rounded-2xl shadow-sm shadow-gray-600 p-6">
                            <div class="flex flex-col-reverse md:flex-row justify-between">
                                <div>
                                    <div class="text-sm font-semibold text-black mb-4">
                                        <span class="text-gray-500">{{__('order_details_data')}}:</span>
                                        <span class="text-black text-md">{{ $order->title }}</span>
                                    </div>

                                    <h2 class="text-sm font-semibold text-black mb-4">
                                        <span class="text-gray-500">{{__('enineer_name')}}:</span>
                                        <span class="text-black text-md">{{ $order->engineer_data->name }}</span>
                                    </h2>

                                    <h2 class="text-sm font-semibold text-black mb-4">
                                        <span class="text-gray-500">{{__('order_status')}}:</span>
                                        <span class="text-black text-md">{{ __($order->status) }}</span>
                                    </h2>

                                    <h2 class="text-sm font-semibold text-black mb-4">
                                        <span class="text-gray-500">{{__('created_at')}}:</span>
                                        <span class="text-black text-md">{{ \Carbon\Carbon::parse($order->created_at)->isoFormat('YYYY-MM-DD ddd HH:mm A')}}</span>
                                    </h2>

                                    <form action="{{ route('engineer.conversation.create', $order->id) }}" method="post" class="flex">
                                        @csrf
                                        <input type="hidden" name="other_user_id" value="{{ $order->engineer_data->id }}">
                                        <button type="submit" class="flex text-yellow-400 hover:underline">
                                            {{__('start_chat')}}
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 stroke-yellow-400 fill-yellow-400" viewBox="0 0 24 24" id="chat">
                                                <path d="M20.61,19.19A7,7,0,0,0,17.87,8.62,8,8,0,1,0,3.68,14.91L2.29,16.29a1,1,0,0,0-.21,1.09A1,1,0,0,0,3,18H8.69A7,7,0,0,0,15,22h6a1,1,0,0,0,.92-.62,1,1,0,0,0-.21-1.09ZM8,15a6.63,6.63,0,0,0,.08,1H5.41l.35-.34a1,1,0,0,0,0-1.42A5.93,5.93,0,0,1,4,10a6,6,0,0,1,6-6,5.94,5.94,0,0,1,5.65,4c-.22,0-.43,0-.65,0A7,7,0,0,0,8,15ZM18.54,20l.05.05H15a5,5,0,1,1,3.54-1.46,1,1,0,0,0-.3.7A1,1,0,0,0,18.54,20Z"></path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                                <div class="md:w-[40%] mb-4 md:mb-0">
                                    <img src="{{ $order->image->fileName ?? null}}" class="max-h-[600px] rounded-xl border bg-slate-100" alt="">
                                </div>
                            </div>

                            <!-- order details text  -->
                            <div class="my-4">
                                <p class="text-xl">
                                    {{$order->details}}
                                </p>
                            </div>
                        </div>

                        <div class="mt-8 flex flex-col">
                            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                                    <section class="my-4 space-y-2">
                                        @if(Session::has('status_update_error'))
                                        <div class="my-3 w-auto p-4 bg-orange-500 text-white rounded-md">
                                            {!! session('status_update_error')->first('error') !!}
                                        </div>
                                        @endif

                                        @if(Session::has('status_update_success'))
                                        <div class="my-3 w-auto p-4 bg-green-700 text-white rounded-md">
                                            {!! session('status_update_success') !!}
                                        </div>
                                        @endif
                                        <div class="flex flex-col gap-5">

                                            {{--
                                            @if( $order->status != 'completed')
                                            <div>
                                                <form action="{{ route('engineer.order.status.update', $order->id) }}" class="flex items-center justify-start space-x-4" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="mb-4 flex space-x-1 gap-2 items-center">
                                                <!-- <label for="update_status" class="!font-bold !w-3/4">{{ __('update_status') }} </label> -->
                                                <select name="update_status" id="update_status" class="form_input !w-full !p-0 !py-2">
                                                    <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>{{ __('pending') }}</option>
                                                    <option value="under_review" {{ $order->status == 'under_review' ? 'selected' : '' }}>{{ __('under_review') }}</option>
                                                    <option value="rejected" {{ $order->status == 'rejected' ? 'selected' : '' }}>{{ __('rejected') }}</option>
                                                    <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>{{ __('completed') }}</option>
                                                </select>
                                            </div>

                                            <div class="mb-4">
                                                <input id="submitButton" type="submit" value="{{ __('update_status') }}" class="action_btn !p-2 !px-4" />
                                            </div>
                                            </form>
                                        </div>
                                        @else
                                        <div class="my-4">
                                            <a href="{{route('engineer.contract.create' , $order->id)}}" class="normal_button">
                                                {{__('create_contract')}}
                                            </a>
                                        </div>
                                        @endif
                                        --}}

                                </div>
                                </section>
                            </div>

                            <section class="my-2">

                                <div id="error_msg" class="my-3 w-auto p-4 bg-orange-500 text-white rounded-md hidden">

                                </div>

                                <div id="success_msg" class="my-3 w-auto p-4 bg-green-700 text-white rounded-md hidden">

                                </div>
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

                                @if($order->status == 'pending' || $order->status == 'client_reject_qoute')
                                <form action="{{ route('engineer.order.add_comment', $order->id) }}" method="post">
                                    @csrf

                                    <div class="mb-4">
                                        <p>قبل البدء بالعمل، يرجى كتابة سعر حتى يوافق عليه العميل</p>
                                    </div>

                                    <input type="hidden" name="status" value="add_quote" />
                                    <input type="hidden" name="type" value="add_quote" />

                                    <div class="mb-4 flex space-x-4 gap-2 items-center">
                                        <label for="comment" class="lable_form">{{ __('add_quote') }} </label>
                                        <input type="number" name="comment" id="comment" class="form_input " value="{{ old('comment') }}" autocomplete="off" />
                                    </div>

                                    <div class="mb-4">
                                        <input id="submitButton" type="submit" value="{{ __('submit') }}" class="normal_button" />
                                    </div>

                                    <div id="uploading">

                                    </div>
                                </form>
                                @elseif($order->status == 'progress' || $order->status == 'client_reject')
                                <form action="{{ route('engineer.order.add_comment', $order->id) }}" method="post" id="file-upload-form">
                                    @csrf

                                    <div class="mb-4">
                                        <p>يرجى رفع ملفات التصميم الجديد من هنا</p>
                                    </div>

                                    <input type="hidden" name="status" value="supervisor_review" />
                                    <input type="hidden" name="type" value="upload_design" />

                                    <div class="mb-4  space-x-4 gap-2 items-center">
                                        <label for="comment" class="lable_form">{{ __('write_comment') }} </label>
                                        <!-- <textarea name="comment" id="comment" class="form_input !w-full" rows="5">{{ old('comment') }}</textarea> -->
                                        <input name="comment" id="comment" class="form_input !w-full" value="{{ old('comment') }}" />
                                    </div>

                                    <div class="mb-4  items-center">
                                        <label for="file-input" class="block mt-4 mb-2">{{__('choose_files')}}</label>
                                        <input type="file" id="file-input" multiple onchange="previewFiles(event)" class="border py-2 px-3 w-full">
                                    </div>

                                    <div class="mb-4  items-center">
                                        <h2 class="text-lg font-semibold mb-2">{{__('preview_files')}}</h2>
                                        <div id="file-preview-container">
                                            <!-- File previews will be displayed here -->
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <input id="submitButton" type="submit" value="{{ __('submit') }}" class="normal_button" />
                                    </div>

                                    <div id="uploading">

                                    </div>
                                </form>
                                @endif

                            </section>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        @if($feedbacks->isNotEmpty())
        <h2 class="mt-5 font-bold">{{ __('feedback_log') }}</h2>

        <div class="mt-10 p-0 bg-transparent shadow-sm rounded-md">
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    @foreach($feedbacks as $feedback)
                    <div class="my-3 pb-2 border-r-2 border-gray-400 px-4 py-2 bg-white rounded-3xl">
                        <div class="mb-0 flex flex-col md:flex-row gap-2 justify-between">
                            <span class="text-md">
                                <strong>{{ $feedback->user_data->name }}</strong> | {{ __($feedback->user_data->user_type) }}
                            </span>
                            <span class="text-gray-500 text-xs">{{ \Carbon\Carbon::parse($feedback->created_at)->isoFormat('YYYY-MM-DD ddd HH:mm A') }}</span>
                        </div>
                        <div class="mb-3">

                        </div>
                        <p class="mb-2 font-bold text-yellow-400 px-2">{{ __($feedback->type) }}</p>

                        @if($feedback->comment != null)
                        <p class="bg-gray-50 p-4 rounded-full">{{ $feedback->comment }}</p>
                        @endif

                        <div class="flex flex-wrap min-w-full py-2 ">
                            @foreach($feedback->feedback_files as $file)
                            <div class="shadow-none rounded-sm border-0 border-gray-300 p-4 mx-2 my-1 justify-center grid">
                                <a href="{{ $file->file->fileName ?? '#' }}" download class="w-full h-full">
                                    <img src="{{ asset('imgs/file.png') }}" alt="" class="w-14" />
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif

    </div>
    
</div>

<script>
    const fileInput = document.getElementById('file-input');
    const selectedFiles = [];

    function previewFiles(event) {
        const filePreviewContainer = document.getElementById('file-preview-container');

        if (event.target.files.length > 0) {
            for (const file of event.target.files) {
                // Create a container div for each selected file
                const fileContainer = document.createElement('div');
                fileContainer.className = 'relative';

                // Create a text element for the file name
                const fileNameText = document.createElement('div');
                fileNameText.textContent = file.name;
                fileNameText.className = 'max-w-xs truncate my-4';

                // Create a remove button with "x" for the selected file
                const removeButton = document.createElement('button');
                removeButton.innerHTML = '&#10005;'; // "x" symbol
                removeButton.className = 'absolute h-8 w-8 top-2 left-2 bg-red-500 text-white rounded-full p-1 cursor-pointer';
                removeButton.addEventListener('click', () => removeItem(fileContainer, file, selectedFiles));

                // Append the file name text and remove button to the container
                fileContainer.appendChild(fileNameText);
                fileContainer.appendChild(removeButton);

                // Append the container to the preview section
                filePreviewContainer.appendChild(fileContainer);

                // Add the selected file to the array
                selectedFiles.push(file);
            }
        }
    }

    function removeItem(container, item, array) {
        // Remove the container from the preview
        container.remove();

        // Remove the selected item from the array
        const index = array.indexOf(item);
        if (index !== -1) {
            array.splice(index, 1);
        }
    }

    function removeAllImages() {
        // const imagePreviewContainer = document.getElementById('image-preview-container');

        // Remove all child elements from the imagePreviewContainer
        // while (imagePreviewContainer.firstChild) {
        //     imagePreviewContainer.removeChild(imagePreviewContainer.firstChild);
        // }

        // Clear the selectedImages array
        // selectedImages.length = 0;
    }
</script>

<script type="module">
    const success_msg = $('#success_msg');
    const error_msg = $('#error_msg');

    document.getElementById('file-upload-form').addEventListener('submit', function(event) {
        event.preventDefault();

        // Clear the existing input files
        // imageInput.value = '';
        fileInput.value = '';

        // You can now use the formData objects to upload the selected images and files to your server.

        // Create a FormData object and append data to it (if needed)
        const formData = new FormData(this); // this to store data                                

        const formFields = this.elements; // Get all form elements

        for (let i = 0; i < formFields.length; i++) {
            const field = formFields[i];
            if (field.tagName === 'INPUT' || field.tagName === 'TEXTAREA' || field.tagName === 'SELECT') {
                formData.append(`${field.name}`, `${field.value}`);
            }
        }

        // get files
        for (const file of selectedFiles) {
            formData.append('files[]', file);
        }

        // Make a POST request to the server
        uploadFormData(formData);

    });

    async function uploadFormData(formData) {
        try {
            // Display "still uploading" message
            const uploadingBox = document.getElementById('uploading');
            const uploadMessage = document.createElement('div');
            uploadMessage.textContent = `{{__('uploading')}}`;
            uploadingBox.appendChild(uploadMessage);

            // Make a POST request to the server
            const response = await fetch(`{{ route('engineer.order.add_comment', $order->id) }}`, {
                method: 'POST',
                body: formData,
            });

            if (!response.ok) {
                // Handle server errors here
                // Remove the "still uploading" message
                uploadMessage.remove();
                $('#submit_btn').prop('disabled', false);
                error_msg.show();
                error_msg.html("{{__('unknown_error')}}");
                throw new Error(`HTTP error! Status: ${response.status}`);
            }

            // Remove the "still uploading" message
            uploadMessage.remove();
            $('#submit_btn').prop('disabled', false);

            // Parse the JSON response
            const responseData = await response.json();

            // Handle the JSON data
            console.log('JSON Data:', responseData);

            if (responseData.success) {
                removeAllImages()
                success_msg.show();
                success_msg.html(responseData.data)
            } else {
                removeAllImages()
                error_msg.show();
                error_msg.html(responseData.data)
            }

            // You can access the data from the JSON response here and perform further actions.
        } catch (error) {
            // Handle any errors that occur during the request
            console.error('Upload error:', error);
        }
    }
</script>

@include('engineer.footer')