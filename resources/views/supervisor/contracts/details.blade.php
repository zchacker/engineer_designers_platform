@include('supervisor.header')
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

@include('supervisor.footer')