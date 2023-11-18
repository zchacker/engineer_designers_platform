@include('admin.header')
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

                                            <div class="my-2">
                                                <strong>{{__('order_status')}}:</strong> {{ __($order->status) }}
                                            </div>

                                            @if( $order->status != 'completed')
                                            <div>
                                                <form action="{{ route('admin.order.status.update', $order->id) }}" class="flex items-center justify-start space-x-4" method="post">
                                                    @csrf
                                                    <div class="mb-4 flex space-x-1 gap-2 items-center">                                                        
                                                        <select name="update_status" id="update_status" class="form_input !w-full !py-2">
                                                            <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>{{ __('pending') }}</option>
                                                            <option value="supervisor_review" {{ $order->status == 'supervisor_review' ? 'selected' : '' }}>{{ __('supervisor_review') }}</option>
                                                            <option value="under_review" {{ $order->status == 'under_review' ? 'selected' : '' }}>{{ __('under_review') }}</option>
                                                            <option value="rejected_by_admin" {{ $order->status == 'rejected_by_admin' ? 'selected' : '' }}>{{ __('rejected_by_admin') }}</option>                                                            
                                                            <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>{{ __('completed') }}</option>
                                                        </select>
                                                    </div>

                                                    <div class="mb-4">
                                                        <input id="submitButton" type="submit" value="{{ __('update_status') }}" class="action_btn !p-2 !px-4" />
                                                    </div>
                                                </form>
                                            </div>                                            
                                            @endif

                                        </div>
                                        
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

                                        <form action="{{ route('engineer.order.add_comment', $order->id) }}" method="post">
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
                                <div class="mb-0">
                                    <span>
                                        <strong>{{ $comment->user_data->name }}</strong>
                                    </span>
                                </div>
                                <div class="mb-3">
                                    <span class="text-gray-500">{{ $comment->created_at }}</span>
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
@include('admin.footer')