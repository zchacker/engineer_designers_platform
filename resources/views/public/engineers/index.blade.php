@include('public.header')
<section class="flex h-40 justify-center items-center flex-col">
    <div class="w-full h-full bg-cover bg-no-repeat md:bg-cover md:bg-center" style="background-image: url('{{asset('imgs/image/head-pages.webp')}}');">
        <div class="w-full h-full px-8 py-8 flex  justify-start items-end bg-black/5 backdrop-brightness-100">
            <h1 class="text-white text-3xl font-bold mb-4">{{__('public')['engineers']}}</h1>
        </div>
    </div>
</section>

<section class="min-h-screen p-8">
    @if($engineers->isNotEmpty())
    {{--
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 md:mx-8">
        @foreach($engineers as $engineer)
        <div class="flex flex-col items-center justify-center text-center p-8 hover:shadow-lg border rounded-lg shadow-md">
            <a href="{{ route('engineers.details', $engineer->id) }}" class="">
    <img src="{{ $engineer->avatar->image->fileName ?? asset('imgs/user.png') }}" alt="" class="w-full object-cover" />
    <h2 class="text-black text-xl mt-4 font-bold">{{ $engineer->name }}</h2>
    </a>
    </div>
    @endforeach
    </div>
    --}}

    <div class="my-4 mb-8 text-gray-700">
        <h3 class="text-center">يمكنك التواصل مع أكثر من مهندس بنفس الوقت</h3>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
        @foreach($engineers as $engineer)
        <div class="flex flex-col justify-between p-4 shadow-md shadow-gray-400 rounded-2xl h-[345px]">
            <div class="flex justify-end">
                <form action="{{ route('client.conversation.create') }}" method="post" class="flex">
                    @csrf
                    <input type="hidden" name="other_user_id" value="{{ $engineer->id }}">
                    <button type="submit" class="flex text-yellow-400 hover:underline">
                        {{-- {{__('start_chat')}} --}}
                        <img src="{{ asset('imgs/messenger.png') }}" alt="{{__('start_chat')}}" title="{{__('start_chat')}}" class="w-[30px]" />
                    </button>
                </form>
            </div>
            <img src="{{ $engineer->avatar->image->fileName ?? asset('imgs/user.png') }}" class="w-[100px] h-[100px] mx-auto p-2 rounded-full object-cover border-0 border-blue-300" alt="{{ $engineer->name }}">
            <div class="flex flex-col justify-start items-center">
                <h3 class="font-bold text-lg">{{ $engineer->name }}</h3>
                <div class="my-2">
                    @if(app()->getLocale() == 'ar')
                    <a href="{{ route('engineers.details', ['', $engineer->id] ) }}" class="link">{{__('works_details')}}</a>
                    @else
                    <a href="{{ route('engineers.details', [app()->getLocale(), $engineer->id] ) }}" class="link">{{__('works_details')}}</a>
                    @endif
                </div>
                <div class="my-2">
                    @if(app()->getLocale() == 'ar')
                    <a href="{{ route('client.order.create' ,[$engineer->id] ) }}" class="normal_button">{{__('create_order')}}</a>
                    @else
                    <a href="{{ route('client.order.create' ,[ $engineer->id] ) }}" class="normal_button">{{__('create_order')}}</a>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else

    <div class="flex flex-col  h-[70vh] items-center justify-center mx-8">
        <img src="{{ asset('imgs/empty.png') }}" alt="" class="w-40">
        <h2 class="font-bold text-gray-700 text-xl mt-8">{{ __('public')['no_engineers'] }}</h2>
    </div>

    @endif
</section>
@include('public.footer')