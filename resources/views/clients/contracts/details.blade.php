@include('clients.header')
<div class="content">

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                {{-- Content--}}
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="px-4 sm:px-6 lg:px-8">

                        <div class="sm:flex sm:items-center">
                            <div class="sm:flex-auto">
                                <h1 class="text-xl font-semibold text-gray-900">
                                    {{__('contracts_details')}}
                                </h1>

                                <p class="mt-2 text-sm text-gray-700">
                                    {{__('contracts_details_eng_message')}}
                                </p>
                            </div>

                        </div>

                        <div class="mt-8 flex flex-col">
                            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                                    <div class="mb-4  items-center">
                                        <h2 for="file-input" class="block mt-4 mb-2 font-bold">{{__('contract_file')}}</h2>
                                        <a href="{{ $contract->contractDoc->fileName }}" target="_blank" class="normal_button">{{__('download')}}</a>
                                    </div>


                                    <div class="mb-4  items-center">
                                        <h2 class="block mt-4 mb-2 font-bold">{{__('contract_client_replay')}}</h2>
                                        @if($contract_feedback != null)
                                        <h3 class="block mt-4 mb-2 font-bold">{{__('comments')}}</h3>
                                        <p>{{ $contract_feedback->comment }}</p>

                                        @if($contract_feedback->contractDoc != null)
                                        <a href="{{ $contract_feedback->contractDoc->fileName ?? '#' }}" target="_blank" class="action_btn my-8">{{__('download')}}</a>
                                        @endif

                                        @endif
                                    </div>

                                    @if($contract->status == 'pending')
                                    <div class="border-t border-t-gray-300 my-4"></div>

                                    <div class="mb-4  items-center">
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
                                        <form action="{{ route('client.contract.update.action', $contract->id) }}" method="POST">
                                            @csrf
                                            <div class="mb-4  space-x-1 gap-2 items-center">
                                                <label for="file-input" class="block mt-4 mb-2">{{__('upload_signed_contract')}}</label>
                                                <input type="file" name="file" id="file-input" class="border py-2 px-3 w-full" accept=".pdf" />
                                            </div>

                                            <div class="mb-4  space-x-1 gap-2 items-center">
                                                <label for="comment" class="block mt-4 mb-2">{{__('add_comment')}}</label>
                                                <textarea name="comment" id="comment" class="form_input !w-full" cols="30" rows="10"></textarea>
                                            </div>

                                            <div class="mb-4 flex space-x-1 gap-2 items-center">
                                                <!-- <label for="update_status" class="!font-bold !w-3/4">{{ __('update_status') }} </label> -->
                                                <select name="status" id="status" class="form_input !w-full !p-0 !py-2">
                                                    <option value="accepted">{{ __('accept') }}</option>
                                                    <option value="rejected">{{ __('reject') }}</option>
                                                </select>
                                            </div>

                                            <div class="mb-4">
                                                <input id="submitButton" type="submit" value="{{ __('update_status') }}" class="action_btn !p-2 !px-4" />
                                            </div>
                                        </form>
                                    </div>
                                    @endif



                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    function confirmDelete() {
        if (confirm(" {{__('cancel_contract_confirmation')}} ")) {
            // If the user confirms, submit the form
            document.forms[0].submit(); // You may need to adjust the form index if you have multiple forms on the page
        }
    }
</script>

@include('clients.footer')