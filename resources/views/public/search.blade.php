@include('public.header')

<section class="bg-gray-200 py-14">
    <div class="max-w-screen-sm md:max-w-screen-md mx-auto bg-white p-8 rounded-lg">

        <form action="{{ route('search') }}" method="GET" class="flex items-stretch w-full">
            <input class="w-full rounded-s-md" type="text" name="query" placeholder="{{__('search')}}..." required value="{{ $query }}" />
            <button type="submit" class="bg-[#4b4b4b] p-2 rounded-e-md">
                <img src="{{ asset('imgs/image/search.png') }}" class="w-6 " alt="">
            </button>
        </form>

        
        
        @if(isset($posts))
        @if($posts->isEmpty() && $services->isEmpty() && $engineers->isEmpty())
        <p>{{__('not_found')}}</p>
        @else
        <div class="tabs mb-4 mt-4 flex flex-row">
            <button class="tablinks py-2 px-4 bg-gray-200 hover:bg-gray-300 focus:outline-none" onclick="openTab(event, 'Tab1')">{{__('public')['services']}}</button>
            <button class="tablinks py-2 px-4 bg-gray-200 hover:bg-gray-300 focus:outline-none" onclick="openTab(event, 'Tab2')">{{ __('public')['engineers'] }}</button>
            <button class="tablinks py-2 px-4 bg-gray-200 hover:bg-gray-300 focus:outline-none" onclick="openTab(event, 'Tab3')">{{ __('post_list') }}</button>
        </div>
        
        <h2>{{__('search_results')}}</h2>

        <div id="Tab1" class="tabcontent hidden p-4 bg-white">
            @if($services->isEmpty())
                <p>{{__('not_found')}}</p>
            @else
                <ul class="flex flex-col space-y-4 list-disc">
                    @foreach($services as $service)
                    <li class="text-blue-600">
                        @if(app()->getLocale() == 'ar')
                            <a href="{{ route('services.details' , ['', $service->id , $service->slug_ar ]) }}">{{ $service->name }}</a>
                        @else
                            <a href="{{ route('services.details' , [app()->getLocale(), $service->id ,  $service->slug_en ?? $service->slug_ar ]) }}">{{ $service->name_en }}</a>
                        @endif
                    </li>
                    @endforeach
                </ul>
            @endif
        </div>

        <div id="Tab2" class="tabcontent hidden p-4 bg-white">
            @if($engineers->isEmpty())
                <p>{{__('not_found')}}</p>
            @else
                <ul class="flex flex-col space-y-4">
                    @foreach($engineers as $engineer)
                    <li class="text-blue-600 hover:underline">
                        @if(app()->getLocale() == 'ar')
                            <a href="{{ route('engineers.details', ['', $engineer->id] ) }}">{{ $engineer->name }}</a>
                        @else
                            <a href="{{ route('engineers.details', [app()->getLocale(), $engineer->id] ) }}">{{ $engineer->name_en }}</a>
                        @endif
                    </li>
                    @endforeach
                </ul>
            @endif
        </div>

        <div id="Tab3" class="tabcontent hidden p-4 bg-white">
            @if($posts->isEmpty())
                <p>{{__('not_found')}}</p>
            @else
                <ul class="flex flex-col space-y-4 list-disc">
                    @foreach($posts as $post)
                    <li class="text-blue-600 hover:underline">
                        <a href="{{ route('blog.post', ['',$post->id, $post->slug]) }}">{{ $post->title }}</a>
                    </li>
                    @endforeach
                </ul>
            @endif
        </div>
        
        @endif
        @endif
        
    </div>
</section>



<script>
    function openTab(evt, tabName) {
        // Declare all variables
        var i, tabcontent, tablinks;

        // Get all elements with class="tabcontent" and hide them
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].classList.add("hidden");
        }

        // Get all elements with class="tablinks" and remove the class "active"
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].classList.remove("bg-[#4b4b4b]", "text-white");
            tablinks[i].classList.add("bg-gray-200", "hover:bg-gray-300");
        }

        // Show the current tab, and add an "active" class to the button that opened the tab
        document.getElementById(tabName).classList.remove("hidden");
        evt.currentTarget.classList.remove("bg-gray-200", "hover:bg-gray-300");
        evt.currentTarget.classList.add("bg-[#4b4b4b]", "text-white");
    }

    // Optional: Open the first tab by default
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelector('.tablinks').click();
    });
</script>

@include('public.footer')