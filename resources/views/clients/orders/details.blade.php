@include('clients.header')
<div class="content">

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white2 overflow-hidden shadow-none sm:rounded-lg">
                {{-- Content--}}
                <div class="p-6 bg-white border-b shadow-sm rounded-3xl border-gray-200">

                    <div class="px-0 sm:px-6 lg:px-8">

                        <div class="sm:flex sm:items-center mb-8">
                            <div class="sm:flex-auto">
                                <h1 class="text-xl font-semibold text-gray-900">
                                    {{__('order_details_data')}}
                                </h1>

                                <p class="mt-2 text-sm text-gray-400">
                                    {{__('order_details_data_message')}}
                                </p>
                            </div>

                        </div>

                        <!-- order data card  -->
                        <div class="rounded-2xl shadow-md shadow-gray-300 p-6">
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

                                    <form action="{{ route('client.conversation.create') }}" method="post" class="flex">
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

                        <!-- this is controllers  -->
                        <div class="mt-8 flex flex-col">
                            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                                    <section class="my-2">

                                        @if(Session::has('errors'))
                                        <div class="my-3 w-auto p-4 bg-red-600 text-white rounded-md">
                                            {!! session('errors')->first('error') !!}
                                        </div>
                                        @endif

                                        @if(Session::has('success'))
                                        <div class="my-3 w-auto p-4 bg-green-700 text-white rounded-md">
                                            {!! session('success') !!}
                                        </div>
                                        @endif

                                        @if($order->status == 'add_quote')
                                        <form action="{{ route('client.order.add_comment', $order->id) }}" method="post">
                                            @csrf
                                            <input type="hidden" name="comment" value="">
                                            <input type="hidden" name="type" value="replay_on_quote" />

                                            <div class="mb-4">
                                                <label for="comment" class="lable_form mb-2"> هل أنت موافق على عرض السعر؟ {{ $order->price_quote }} ريال سعودي</label>
                                                <p class="mb-4">عند الضغط على موافق أنت توافق على
                                                    <a href="#" class="text-blue-800">الشروط والأحكام</a>
                                                </p>
                                                <input id="submitButton" type="submit" name="submit" value="{{ __('accept') }}" class="action_btn" />
                                                <input id="submitButton" type="submit" name="submit" value="{{ __('reject') }}" class="send_btn" />
                                            </div>
                                        </form>
                                        @elseif($order->status == 'client_review')

                                        <form action="{{ route('client.order.add_comment', $order->id) }}" method="post">
                                            @csrf
                                            <input type="hidden" name="comment" value="">
                                            <input type="hidden" name="type" value="replay_on_design" />

                                            <div class="mb-4">
                                                <label for="comment" class="lable_form mb-2"> لقد قام المهندس بإرفاق تصميم هندسي لطلبك، يرجى التكرم بتحميله والاطلاع عليه </label>

                                                @if($design != null)
                                                <div class="flex flex-wrap min-w-full py-2 ">
                                                    @foreach($design->feedback_files as $file)
                                                    <div class="shadow-none rounded-sm border-0 border-gray-300 p-4 mx-2 my-1 justify-center grid">
                                                        <a href="{{ $file->file->fileName ?? '#' }}" download class="w-full h-full">
                                                            <img src="{{ asset('imgs/file.png') }}" alt="" class="w-14" />
                                                        </a>
                                                    </div>
                                                    @endforeach
                                                </div>
                                                @endif

                                                <p class="mb-4">
                                                    بعد إطلاعك على التصميم، هل أنت موافق عليه؟ تطبق
                                                    <a href="#" class="text-blue-800">الشروط والأحكام</a>
                                                </p>
                                                <input id="submitButton" type="submit" name="submit" value="{{ __('accept') }}" class="action_btn" />
                                                <input id="submitButton" type="submit" name="submit" value="{{ __('reject') }}" class="send_btn" />
                                            </div>
                                        </form>

                                        @elseif($order->status == 'client_accept')

                                        <form action="{{ route('client.order.add_comment', $order->id) }}" method="post">
                                            @csrf
                                            <input type="hidden" name="comment" value="">
                                            <input type="hidden" name="type" value="update_status" />

                                            <div class="mb-4">
                                                <label for="comment" class="lable_form mb-2"> لقد تم إتمام التصميم والموافقة عليه، هل تود طلب خدمة متابعة المشروع؟ أو إنهاء العمل ووضع علامة مكتمل؟</label>                                                

                                                <p class="mb-4">
                                                    تطبق
                                                    <a href="#" class="text-blue-800">الشروط والأحكام</a>
                                                </p>

                                                <div class="mb-4">
                                                    <select name="followup" id="" class="form_input">
                                                        <option value="followup_project">{{__('followup_project')}}</option>
                                                        <option value="completed">{{__('completed')}}</option>
                                                    </select>
                                                </div>

                                                <input id="submitButton" type="submit" name="submit" value="{{ __('submit') }}" class="normal_button" />
                                                
                                            </div>
                                        </form>

                                        @elseif($order->status == 'followup_project')

                                        <form action="{{ route('client.order.add_comment', $order->id) }}" method="post">
                                            @csrf
                                            <input type="hidden" name="comment" value="">
                                            <input type="hidden" name="type" value="request_visit" />

                                            <div class="mb-4">
                                                <label for="comment" class="lable_form mb-2 !text-green-500"> لرفع طلب زيارة موقع، يرجى الضغط على الزر أدناه لرفع تنبيه طلب زيارة إلى المكتب الهندسي </label>                                                

                                                <p class="mb-4">
                                                    تطبق
                                                    <a href="#" class="text-blue-600 hover:underline">الشروط والأحكام</a>
                                                </p>                                                

                                                <input id="submitButton" type="submit" name="submit" value="{{ __('request_visit') }}" class="normal_button" />                                                
                                            </div>
                                        </form>

                                        @else
                                        {{--<form action="{{ route('client.order.add_comment', $order->id) }}" method="post">
                                        @csrf
                                        <div class="mb-4  space-x-4 gap-2 items-center">
                                            <label for="comment" class="lable_form">{{ __('write_comment') }} </label>
                                            <textarea name="comment" id="comment" class="form_input !w-full" rows="5">{{ old('comment') }}</textarea>
                                        </div>

                                        <div class="mb-4">
                                            <input id="submitButton" type="submit" value="{{ __('add_comment') }}" class="normal_button" />
                                        </div>
                                        </form>--}}
                                        @endif

                                    </section>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                @if($feedbacks->isNotEmpty())
                <h2 class="mt-10 font-bold">{{ __('feedback_log') }}</h2>

                <div class="mt-5 p-0 bg-transparent shadow-sm rounded-md">
                    <div class="px-4 sm:px-6 lg:px-8">
                        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">

                            @foreach($feedbacks as $feedback)
                            <div class="my-3 pb-2 border-r-2 border-gray-400 px-4 py-2 bg-white rounded-3xl">
                                <div class="mb-0 flex flex-col md:flex-row gap-2 justify-between">
                                    <span class="text-md">
                                        <strong>{{ $feedback->user_data->name }}</strong> | {{ __($feedback->user_data->user_type) }}
                                    </span>
                                    <span class="text-gray-500 text-xs">{{ \Carbon\Carbon::parse($feedback->updated_at)->isoFormat('YYYY-MM-DD ddd HH:mm A') }}</span>
                                </div>
                                <div class="mb-3">

                                </div>
                                <p class="mb-2 font-bold text-yellow-400 px-2">{{ __($feedback->type) }}</p>

                                @if($feedback->comment != null)
                                <p class="bg-gray-50 p-4 rounded-full">{{ $feedback->comment }}</p>
                                @endif

                                @if($feedback->type == 'add_invoice')
                                <div class="flex flex-wrap min-w-full py-2 ">                                    
                                    <div class="shadow-none rounded-sm border-0 border-gray-300 p-4 mx-2 my-1 justify-center grid">
                                        <a href="{{ route('invoices.show' , $feedback->invoice) }}" target="_blank" class="w-full h-full">
                                            <img src="{{ asset('imgs/invoice.png') }}" alt="" class="w-14" />
                                        </a>
                                    </div>                                    
                                </div>
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
    </div>

</div>
@include('clients.footer')