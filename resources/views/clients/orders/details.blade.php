@include('clients.header')
<div class="content">

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white2 overflow-hidden shadow-none sm:rounded-lg">
                {{-- Content--}}
                <div class="p-6 bg-white border-b shadow-sm rounded-md border-gray-200">

                    <div class="px-4 sm:px-6 lg:px-8">

                        <div class="sm:flex sm:items-center">
                            <div class="sm:flex-auto">
                                <h1 class="text-xl font-semibold text-gray-900">
                                    {{__('order_details_data')}}
                                </h1>

                                <p class="mt-2 text-sm text-gray-700">
                                    {{__('order_details_data_message')}}
                                </p>
                            </div>

                        </div>

                        <div class="mt-8 flex flex-col">
                            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                                    <h2 class="text-3xl font-semibold text-black mb-4">
                                        {{ $order->title }}
                                    </h2>
                                    <hr>                                    
                                    @if($order->image != null) 
                                        <img src="{{ $order->image->fileName ?? null}}" class="max-h-[600px] shadow-md my-4 rounded-md border" alt="">
                                    @endif

                                    <p class="my-8">
                                        {{$order->details}}
                                    </p>
                                    <hr>
                                    <section class="my-4 space-y-2">
                                        <p><strong>{{__('order_status')}}:</strong> {{ __($order->status) }}</p>
                                        <p class="flex gap-2">
                                            <strong>{{__('enineer_name')}}:</strong> {{ $order->engineer_data->name }}
                                            <a href="#" class="flex text-blue-600 hover:underline">
                                                {{__('start_chat')}}
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 stroke-blue-400 fill-blue-700"  viewBox="0 0 24 24" id="chat">
                                                    <path d="M20.61,19.19A7,7,0,0,0,17.87,8.62,8,8,0,1,0,3.68,14.91L2.29,16.29a1,1,0,0,0-.21,1.09A1,1,0,0,0,3,18H8.69A7,7,0,0,0,15,22h6a1,1,0,0,0,.92-.62,1,1,0,0,0-.21-1.09ZM8,15a6.63,6.63,0,0,0,.08,1H5.41l.35-.34a1,1,0,0,0,0-1.42A5.93,5.93,0,0,1,4,10a6,6,0,0,1,6-6,5.94,5.94,0,0,1,5.65,4c-.22,0-.43,0-.65,0A7,7,0,0,0,8,15ZM18.54,20l.05.05H15a5,5,0,1,1,3.54-1.46,1,1,0,0,0-.3.7A1,1,0,0,0,18.54,20Z"></path>
                                                </svg>
                                            </a>
                                        </p>
                                        <p><strong>{{__('created_at')}}:</strong> {{ $order->created_at }}</p>
                                    </section>
                                    <hr>
                                    <section class="my-2">

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

                                        <form action="{{ route('client.order.add_comment', $order->id) }}" method="post">
                                            @csrf
                                            <div class="mb-4  space-x-4 gap-2 items-center">
                                                <label for="comment" class="lable_form">{{ __('write_comment') }} </label>
                                                <textarea name="comment" id="comment" class="form_input !w-full" rows="5">{{ old('comment') }}</textarea>
                                            </div>

                                            <div class="mb-4">
                                                <input id="submitButton" type="submit" value="{{ __('add_comment') }}" class="normal_button" />
                                            </div>
                                        </form>

                                    </section>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                @if($comments->isNotEmpty()) 
                <h2 class="mt-5 font-bold">{{ __('comments') }}</h2>

                <div class="mt-10 p-6 bg-white shadow-sm rounded-md border-b border-gray-300">
                    <div class="px-4 sm:px-6 lg:px-8">
                        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            @foreach($comments as $comment)
                            <div class="my-3 pb-2">
                                <div class="mb-2">
                                    <span>
                                        <strong>{{ $comment->user_data->name }}</strong>                                        
                                    </span>
                                </div>
                                <p class="bg-blue-200 p-4 rounded-lg">{{ $comment->comment }}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif

            </div>
        </div>
    </div>

</div>
@include('clients.footer')