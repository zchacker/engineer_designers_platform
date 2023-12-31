@include('engineer.header')
<div class="content">

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h1 class="text-2xl font-bold mb-16"> {{__('create_contract')}}</h1>

                <div class="relative rounded-tl-md  rounded-tr-md overflow-auto">
                    <div class="overflow-x-auto relative p-2">                        

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

                        <form method="POST" enctype="multipart/form-data" action="{{ route('engineer.contract.create.action' , $order_id) }}" id="file-upload-form">
                            @csrf
                           
                            <div class="mb-4  items-center">
                                <label for="file-input" class="block mt-4 mb-2">{{__('choose_files')}}</label>
                                <input type="file" name="file" id="file-input" class="border py-2 px-3 w-full" accept=".pdf" />
                            </div>
                            

                            <hr>
                            <div class="my-4  items-center">
                                <button type="submit" id="submit_btn" class="normal_button">{{__('create')}}</button>
                            </div>

                        </form>
                        
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


@include('engineer.footer')