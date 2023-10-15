@include('admin.header')

<div class="content">

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="relative rounded-tl-md  rounded-tr-md overflow-auto p-8">
                <h2 class="text-2xl font-bold mb-4"> إضافة مهندس </h2>
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

                        <form action="{{ route('admin.engineers.create.action') }}" method="post" onsubmit="return form_submit(this);" class="w-full">
                            @csrf
                            <div class="mb-4">
                                <label for="name" class="lable_form">{{ __('name') }}</label>
                                <input type="text" name="name" class="form_input" value="{{ old('name') }}" />
                            </div>

                            <div class="mb-4">
                                <label for="email" class="lable_form">{{ __('email') }}</label>
                                <input type="text" name="email" class="form_input" value="{{ old('email') }}" />
                            </div>

                            <div class="mb-4">
                                <label for="phone" class="lable_form">{{ __('phone') }}</label>
                                <input type="text" name="phone" id="phone" placeholder="512345678" class="form_input !border-blue-500 text-left" dir="ltr" value="{{ old('phone') }}" />
                            </div>

                            <div class="mb-4">
                                <label for="password" class="lable_form">{{ __('password') }}</label>
                                <input type="password" name="password" class="form_input" />
                            </div>

                            <div class="mb-4">
                                <input type="submit" value="{{ __('create_account') }}" class="bg-green-700 text-white rounded-md py-2 px-4" />
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>



    @include('admin.footer')