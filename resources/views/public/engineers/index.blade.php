@include('public.header')

<section class="flex h-40 justify-center items-center flex-col bg-primary">
    <div class="w-full flex flex-col justify-center ps-8 h-full h-max-[1100px]">
        <h1 class="text-black text-3xl font-bold mb-4">{{__('public')['engineers']}}</h1>
    </div>
</section>

<section class="bg-white flex flex-col items-start justify-start space-y-4 py-8 px-8 h-max-[1100px]">
    <p class="font-medium text-xl text-start text-black">{{__('public')['vision_details']}}</p>
    <a href="https://wa.me/966536385896" class="cta_button">{{ __('service_cta_button') }}</a>
</section>

<section class="min-h-screen p-8">
    @if($engineers->isNotEmpty())
    {{--
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 md:mx-8">
        @foreach($engineers as $engineer)
        <div class="flex flex-col items-center justify-center text-center p-8 hover:shadow-lg border rounded-lg shadow-md">
            <a href="{{ route('engineers.details', $engineer->id) }}" class="">
    <img src="{{ $engineer->avatar->image->fileName ?? asset('imgs/user.png') }}" alt="" class="w-full object-cover" />
    @if(app()->getLocale() == 'ar')
    <h2 class="text-black text-xl mt-4 font-bold">{{ $engineer->name }}</h2>
    @else
    <h2 class="text-black text-xl mt-4 font-bold">{{ $engineer->name_en ?? $engineer->name }}</h2>
    @endif
    </a>
    </div>
    @endforeach
    </div>
    --}}

    <div class="my-4 mb-8 text-gray-700">
        <h3 class="text-center"> {{ __('public')['contact_with_more_than_engineer'] }}</h3>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        @foreach($engineers as $engineer)
        <div class="engineer-item flex flex-col justify-around p-4 shadow-sm border border-gray-300 shadow-gray-200 rounded-2xl h-[325px]" style="display: none;" >
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
                <a href="{{ route('client.order.create' ,[$engineer->id] ) }}">
                    @if(app()->getLocale() == 'ar')
                    <h3 class="font-bold text-lg">{{ Str::limit( $engineer->name, 25 ) }}</h3>
                    @else
                    <h3 class="font-bold text-lg">{{ Str::limit( $engineer->name_en ?? $engineer->name, 25 ) }} </h3>
                    @endif
                </a>
                <div class="my-2">
                    @if(app()->getLocale() == 'ar')
                    <a href="{{ route('engineers.details', ['', $engineer->id] ) }}" class="link">{{__('works_details')}}</a>
                    @else
                    <a href="{{ route('engineers.details', [app()->getLocale(), $engineer->id] ) }}" class="link">{{__('works_details')}}</a>
                    @endif
                </div>
                <div class="my-2">
                    @if(app()->getLocale() == 'ar')
                    <a href="{{ route('client.order.create' ,[$engineer->id] ) }}" class="cta_button">{{__('create_order')}}</a>
                    @else
                    <a href="{{ route('client.order.create' ,[ $engineer->id] ) }}" class="cta_button">{{__('create_order')}}</a>
                    @endif
                </div>
            </div>
        </div>
        @endforeach

    </div>

    <div class="flex justify-center mt-10">
        <button id="load-more" class="cta_button">{{ __('public')['more'] }}</button>
    </div>

    @else

    <div class="flex flex-col  h-[70vh] items-center justify-center mx-8">
        <img src="{{ asset('imgs/empty.png') }}" alt="" class="w-40">
        <h2 class="font-bold text-gray-700 text-xl mt-8">{{ __('public')['no_engineers'] }}</h2>
    </div>

    @endif
</section>



<script>
    document.addEventListener('DOMContentLoaded', function() {
        let items = document.querySelectorAll('.engineer-item');
        let loadMoreButton = document.getElementById('load-more');
        let itemsToShow = 6;
        let itemsIncrement = 10;

        function showItems() {
            for (let i = 0; i < itemsToShow && i < items.length; i++) {
                items[i].style.display = 'flex';
            }
            if (itemsToShow >= items.length) {
                loadMoreButton.style.display = 'none';
            }
        }

        loadMoreButton.addEventListener('click', function() {
            itemsToShow += itemsIncrement;
            showItems();
        });

        showItems();
    });
</script>


@include('public.footer')