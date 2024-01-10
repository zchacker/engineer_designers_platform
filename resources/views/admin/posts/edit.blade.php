@include('admin.header')


<div class="content">
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="relative rounded-tl-md  rounded-tr-md overflow-auto p-8">
                    <h2 class="text-2xl font-bold mb-4"> {{ __('edit_post') }} </h2>
                    <div class="overflow-x-auto relative">

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

                        
                        <form action="{{ route('admin.policy.edit.action' , $post->id) }}" method="post" enctype="multipart/form-data" onsubmit="return form_submit(this);" class="w-full">
                            @csrf
                            <div class="mb-4">
                                <label for="title" class="lable_form">{{ __('post_title') }}</label>
                                <input type="text" name="title" class="form_input !w-full" value="{{ $post->title ?? old('title') }}" required/>
                            </div>
                            
                            <div class="mb-4">
                                <label for="body" class="lable_form">{{ __('post_body') }}</label>                            
                                <x-forms.tinymce-editor :body="$post->body ?? old('body')" />
                            </div>                                                        

                            <div class="mb-4">
                                <input type="submit" value="{{ __('save') }}" class="normal_button" />
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@include('admin.footer')