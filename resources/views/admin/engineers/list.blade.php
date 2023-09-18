@include('admin.header')

<div class="content">

    <h2 class="text-2xl font-bold mb-4"> المهندسين </h2>
    <a href="{{route('admin.engineers.create')}}" class="normal_button">{{__('add_engineer')}}</a>

    <div class="my-4">
        {{ 'مجموع المهندسين: '.$sum}}
    </div>

    <div class="relative rounded-tl-md  rounded-tr-md overflow-auto">
        <div class="overflow-x-auto relative">
            
            <table class="table">
                <thead class="table_head">
                    <tr>
                        <th scope="col" class="py-3 px-6">#</th>
                        <th scope="col" class="py-3 px-6"> الاسم </th>
                        <th scope="col" class="py-3 px-6"> الايميل </th>
                        <th scope="col" class="py-3 px-6"> رقم الهاتف </th>
                        <th scope="col" class="py-3 px-6"> الاعمال </th>
                        <th scope="col" class="py-3 px-6"> تحكم </th>
                    </tr>
                </thead>
                <tbody class="table_body">
                    @foreach($engineers as $engineer)
                        <tr data-href="" class="clickable-row cursor-pointer hover:bg-gray-200">
                            <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400"> {{$engineer->id}} </td>                                                                                    
                            <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 text-right"> {{ $engineer->name }} </td>
                            <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 text-right"> {{ $engineer->email }} </td>
                            <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 text-right" dir="ltr"> {{ $engineer->phone }} </td>                            
                            <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 text-right"> <a href="#">تفاصيل الاعمال</a> </td>                            
                            <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 text-right"> 
                                <a href="#" class="text-orange-400 font-bold">تعديل</a>    
                                <a href="#" class="text-red-500 font-bold">حظر</a>    
                            </td>                            
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>        
    </div>

    <div class="text-left mt-10" dir="rtl">
        {{ $engineers->onEachSide(5)->links('pagination::tailwind') }}
    </div>

</div>


<script>
    $(document).ready(function($) {
        $(".clickable-row").click(function() {
            window.location = $(this).data("href");
        });
    });
</script>
@include('admin.footer')