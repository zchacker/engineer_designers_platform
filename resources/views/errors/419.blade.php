@include('public.header')

<section class="min-h-screen p-8">
    <div class="flex flex-col  h-[70vh] items-center justify-center mx-8">
        <img src="{{ asset('imgs/empty.png') }}" alt="" class="w-40">
        <h2 class="font-bold text-gray-700 text-xl mt-8 mb-8">
            انتهت صلاحية الجلسة التي تقوم بها، لأمانك وأمان الموقع تم إنهاء المحاولة، الرجاء إعادة المحاولة مرة أخرى
        </h2>
        <a href="{{ url()->previous() ?? route('home') }}" class="normal_button">العودة</a>
    </div>

</section>

@include('public.footer')