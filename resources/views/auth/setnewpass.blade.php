@include('public.header')
<section class="bg-gray-50 mb-20 py-8 md:mb-52 xl:mb-8 md:min-h-screen">
    <div class="container max-w-screen-xl mx-auto px-4 flex flex-col-reverse md:flex-row  items-center">
        <section>
            <img src="{{ asset('imgs/image/working-desk.png') }}" alt="" class="w-[500px]">
        </section>
        <section class="md:w-1/2 mx-auto p-8 rounded-lg bg-white">
            <h2 class="text-3xl font-bold text-black text-right">{{ __('reset_password') }}</h2>
            @if(Session::has('errors'))
            <div class="my-3 w-full p-4 bg-orange-500 text-white rounded-md">
                {!! session('errors')->first('error') !!}
            </div>
            @endif
            @if(Session::has('success'))
            <div class="my-3 w-auto p-4 bg-green-700 text-white rounded-md">
                {!! session('success') !!}
            </div>
            @endif
            <div class="block lg:flex m-2 overflow-x-auto my-5">
                <form action="{{ route('set.new.password') }}" method="post" class="w-full">
                    @csrf
                    <input type="hidden" name="id" value="{{$id}}" />
                    <input type="hidden" name="token" value="{{$token}}">
                    <div class="mb-4">
                        <label for="password" class="lable_form">{{ __('password') }}</label>
                        <input type="password" name="password" class="form_input !w-full" value="{{ old('password') }}" />
                    </div>
                    <div class="mb-4">
                        <label for="re-password" class="lable_form">{{ __('re-password') }}</label>
                        <input type="password" name="re-password" class="form_input !w-full" value="{{ old('re-password') }}" />
                    </div>
                    <div class="mb-4">
                        <input type="submit" value="{{ __('submit') }}" class="normal_button" />
                    </div>                    
                </form>
            </div>
        </section>
    </div>
</section>
@include('public.footer')