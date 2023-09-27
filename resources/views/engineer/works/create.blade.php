@include('engineer.header')
<div class="content">

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h1 class="text-2xl font-bold mb-16"> {{__('create_work')}}</h1>

                <div class="relative rounded-tl-md  rounded-tr-md overflow-auto">
                    <div class="overflow-x-auto relative p-2">

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

                        <form method="POST" enctype="multipart/form-data" action="{{ route('engineer.work.create.action') }}" id="file-upload-form">
                            @csrf
                            <div class="mb-4 items-center">
                                <label for="order_title" class="lable_form">{{ __('work_title') }} </label>
                                <input type="text" name="title" id="work_title" class="form_input !w-full" value="{{ old('title') }}" />
                            </div>

                            <div class="mb-4 items-center">
                                <label for="work_details" class="lable_form">{{ __('work_details') }} </label>
                                <textarea name="work_details" id="work_details" class="form_input !w-full" cols="30" rows="10">{{ old('order_details') }}</textarea>
                            </div>

                            <div class="mb-4  items-center">
                                <label for="image-input" class="block mb-2">{{__('select_images')}}</label>
                                <input type="file" name="images[]" id="image-input" accept="image/*" multiple onchange="previewImages(event)" class="border py-2 px-3 w-full">
                            </div>

                            <div class="mb-4  items-center">
                                <h2 class="text-lg font-semibold mb-2">{{__('preview_images')}}</h2>
                                <div id="image-preview-container" class="flex flex-wrap gap-2">
                                    <!-- Image previews will be displayed here -->
                                </div>
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

                            <hr>
                            <div class="my-4  items-center">
                                <button type="submit" id="submit_btn" class="normal_button">{{__('create')}}</button>
                            </div>

                            <div id="uploading">

                            </div>
                        </form>

                        <script>
                            const imageInput = document.getElementById('image-input');
                            const fileInput = document.getElementById('file-input');
                            const selectedImages = [];
                            const selectedFiles = [];

                            function previewImages(event) {
                                const imagePreviewContainer = document.getElementById('image-preview-container');

                                if (event.target.files.length > 0) {
                                    for (const file of event.target.files) {
                                        // Create a container div for each selected image
                                        const imageContainer = document.createElement('div');
                                        imageContainer.className = 'relative';

                                        // Create an image element for the selected image
                                        const imagePreview = document.createElement('img');
                                        imagePreview.src = URL.createObjectURL(file);
                                        imagePreview.style.maxWidth = '200px';
                                        imagePreview.style.maxHeight = '200px';

                                        // Create a remove button with "x" for the selected image
                                        const removeButton = document.createElement('button');
                                        removeButton.innerHTML = '&#10005;'; // "x" symbol
                                        removeButton.className = 'w-8 h-8 absolute top-2 right-2 bg-red-500 text-white rounded-full p-1 cursor-pointer';
                                        removeButton.addEventListener('click', () => removeItem(imageContainer, file, selectedImages));

                                        // Append the image and remove button to the container
                                        imageContainer.appendChild(imagePreview);
                                        imageContainer.appendChild(removeButton);

                                        // Append the container to the preview section
                                        imagePreviewContainer.appendChild(imageContainer);

                                        // Add the selected image to the array
                                        selectedImages.push(file);
                                    }
                                }
                            }

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
                                const imagePreviewContainer = document.getElementById('image-preview-container');

                                // Remove all child elements from the imagePreviewContainer
                                while (imagePreviewContainer.firstChild) {
                                    imagePreviewContainer.removeChild(imagePreviewContainer.firstChild);
                                }

                                // Clear the selectedImages array
                                selectedImages.length = 0;
                            }
                        </script>

                        <script type="module">
                            const success_msg = $('#success_msg');
                            const error_msg = $('#error_msg');

                            document.getElementById('file-upload-form').addEventListener('submit', function(event) {
                                event.preventDefault();

                                // Clear the existing input files
                                imageInput.value = '';
                                fileInput.value = '';

                                // Create a new FormData object for images and append all selected images to it
                                const imageFormData = new FormData();
                                for (const image of selectedImages) {
                                    imageFormData.append('images[]', image);
                                }

                                // Create a new FormData object for files and append all selected files to it
                                const fileFormData = new FormData();
                                for (const file of selectedFiles) {
                                    imageFormData.append('files[]', file);
                                }

                                // You can now use the formData objects to upload the selected images and files to your server.
                                // For demonstration, let's log them to the console.
                                //console.log('FormData with Selected Images:', imageFormData);
                                //console.log('FormData with Selected Files:', fileFormData);


                                // Create a FormData object and append data to it (if needed)
                                const formData = new FormData(this); // this to store data                                

                                const formFields = this.elements; // Get all form elements

                                for (let i = 0; i < formFields.length; i++) {
                                    const field = formFields[i];
                                    if (field.tagName === 'INPUT' || field.tagName === 'TEXTAREA' || field.tagName === 'SELECT') {
                                        formData.append(`${field.name}`, `${field.value}`);
                                    }
                                }

                                // get images
                                for (const image of selectedImages) {
                                    formData.append('images[]', image);
                                }

                                // get files
                                for (const file of selectedFiles) {
                                    formData.append('files[]', file);
                                }

                                uploadFormData(formData);

                                // Make a POST request to the server
                                /*fetch(`{{ route('engineer.work.create.action') }}`, {
                                    method: 'POST',
                                    body: formData,
                                }).then(response => {
                                    
                                    console.log(response);

                                    if (!response.ok) {
                                        $('#submit_btn').prop('disabled', false);
                                        error_msg.show();
                                        error_msg.text(`{{__('unkowen_error')}}`) //"{{__('unkowen_error')}}"
                                        throw new Error(`HTTP error! Status: ${response.status}`);
                                    }
                                                                        
                                    $('#submit_btn').prop('disabled', false);

                                    // Create a progress container element
                                    const progressContainer = document.createElement('div');
                                    progressContainer.className = 'relative h-4 bg-gray-200 rounded';

                                    // Create a progress bar element
                                    const progressBar = document.createElement('div');
                                    progressBar.className = 'h-full bg-green-500 rounded';

                                    // Append the progress bar to the container
                                    progressContainer.appendChild(progressBar);

                                    // Append the progress container to the DOM
                                    document.body.appendChild(progressContainer);

                                    // Create a progress variable to track the upload progress
                                    let progress = 0;

                                    // Function to update the progress bar
                                    function updateProgressBar() {
                                        progressBar.style.width = `${progress}%`;
                                    }

                                    // Create a progress stream to monitor upload progress
                                    const reader = response.body.getReader();
                                    const contentLength = Number(response.headers.get('Content-Length'));

                                    let bytesUploaded = 0;

                                    // Function to handle each chunk of data
                                    function handleChunk({ done, value }) {
                                        if (done) {
                                            // Upload is complete
                                            console.log('Upload complete');
                                            progressContainer.remove(); // Remove progress bar when done
                                        } else {
                                            // Update progress
                                            bytesUploaded += value.byteLength;
                                            progress = (bytesUploaded / contentLength) * 100;
                                            updateProgressBar();

                                            // Continue reading the next chunk
                                            return reader.read().then(handleChunk);
                                        }
                                    }

                                    // Start reading the response body as chunks
                                    return reader.read().then(handleChunk);
                                }).catch(error => {
                                    // Handle any errors that occur during the request
                                    console.error('Upload error:', error);
                                });*/

                                // After logging the FormData, you can submit the form
                                //this.submit(); // 'this' refers to the form element

                            });

                            async function uploadFormData(formData) {
                                try {
                                    // Display "still uploading" message
                                    const uploadingBox = document.getElementById('uploading');
                                    const uploadMessage = document.createElement('div');
                                    uploadMessage.textContent = 'Uploading...';
                                    uploadingBox.appendChild(uploadMessage);

                                    // Make a POST request to the server
                                    const response = await fetch(`{{ route('engineer.work.create.action') }}`, {
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

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


@include('engineer.footer')