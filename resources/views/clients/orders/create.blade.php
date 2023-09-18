@include('clients.header')
<div class="content">

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h1 class="text-2xl font-bold mb-16"> {{__('create_order')}}</h1>

                <div class="relative rounded-tl-md  rounded-tr-md overflow-auto">
                    <div class="overflow-x-auto relative p-2">

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

                        <form action="{{ route('client.order.create.action' , $engineer_id) }}" method="post" class="w-full" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-4  space-x-4 gap-2 items-center">
                                <label for="order_title" class="lable_form">{{ __('order_title') }} </label>
                                <input type="text" name="title" id="order_title" class="form_input !w-full" value="{{ old('title') }}" />
                            </div>       

                            <div class="mb-4  space-x-4 gap-2 items-center">
                                <label for="order_details" class="lable_form">{{ __('order_details') }} </label>
                                <textarea name="order_details" id="order_details" class="form_input !w-full" cols="30" rows="10">{{ old('order_details') }}</textarea>
                            </div>                            

                            <div class="mb-4 space-x-4 gap-2 items-center">
                                <div class="my-4">
                                    <label for="external_garden" class="lable_form_number">{{ __('upload_image_for_order') }} </label>
                                    <input type="file" name="image" accept="image/*">
                                </div>
                                <div>
                                    {{__('or')}}
                                </div>
                                <div class="my-4">
                                    <label for="external_garden" class="lable_form_number">{{ __('draw_image') }} </label>
                                    <input type="hidden" name="drawn_image" id="drawn_image" value="">
                                    <canvas id="drawingCanvas" width="900" height="500" class="w-auto border border-blue-600 rounded-md"></canvas>
                                </div>
                            </div>

                            <div class="mb-4">
                                <input id="submitButton" type="submit" value="{{ __('create') }}" class="normal_button" />
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    const canvas = document.getElementById('drawingCanvas');
    const ctx = canvas.getContext('2d');
    let drawing = false;
    let didTouched = false

    // const canvasWidth = 400; // Width based on the original aspect ratio
    // const canvasHeight = 300; // Height based on the original aspect ratio

    // canvas.width = canvasWidth; // Set canvas width
    // canvas.height = canvasHeight; // Set canvas height

    const screenWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;

    // Set a threshold width (e.g., 768 pixels) for mobile devices
    const mobileThreshold = 768;

    // Check if the screen width is less than the mobile threshold
    if (screenWidth < mobileThreshold) {
        // Set a new canvas width for mobile devices
        canvas.width = screenWidth - 100; // Adjust the width as needed
        canvas.height = 400
    } else {
        // Set the canvas width for desktop or larger screens
        canvas.width = 900; // Your default canvas width for desktop
    }

    canvas.addEventListener('mousedown', () => {
        drawing = true;
        didTouched = true;
    });

    canvas.addEventListener('mousemove', (e) => {
        if (!drawing) return;
        ctx.lineWidth = 1;
        ctx.lineCap = 'round';
        ctx.strokeStyle = 'black';
        ctx.lineTo(e.clientX - canvas.getBoundingClientRect().left, e.clientY - canvas.getBoundingClientRect().top);
        ctx.stroke();
    });

    canvas.addEventListener('mouseup', () => {
        drawing = false;
        ctx.beginPath();
    });

    canvas.addEventListener('mouseout', () => {
        drawing = false;
        ctx.beginPath();
    });

    document.getElementById('submitButton').addEventListener('click', () => {

        if (didTouched == true) {
            const imageBase64 = canvas.toDataURL('image/png'); // Convert drawing to base64

            // Set the value of the hidden input field
            document.getElementById('drawn_image').value = imageBase64;

            // Submit the form
            const form = document.querySelector('form');
            form.submit();
        }

    });
</script>
@include('clients.footer')