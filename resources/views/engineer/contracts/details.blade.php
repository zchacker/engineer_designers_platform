@include('engineer.header')
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
                                        <a href="{{ $contract->contractDoc->fileName }}" target="_blank" class="action_btn">{{__('download')}}</a>
                                    </div>

                                    
                                    <div class="mb-4  items-center">
                                        <h2 class="block mt-4 mb-2 font-bold">{{__('contract_client_replay')}}</h2>
                                        @if($contract_feedback != null)
                                        <h3 class="block mt-4 mb-2 font-bold">{{__('comments')}}</h3>
                                        <p>{{ $contract_feedback->comment }}</p>
                                        <a href="{{ $contract_feedback->contractDoc->fileName ?? '#' }}" target="_blank" class="action_btn">{{__('download')}}</a>
                                        @endif
                                    </div>

                                    <div class="border-t border-t-gray-300 my-4"></div>

                                    @if($contract->status != 'accepted' && $contract->status != 'canceled')
                                    <form action="{{ route('engineer.contract.status.update', $contract->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf

                                        <button type="button" onclick="confirmDelete()" class="flex text-red-600 hover:text-red-900" title="Delete">                                            
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                            {{__('cancel_contract')}}
                                        </button>
                                    </form>
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

@include('engineer.footer')