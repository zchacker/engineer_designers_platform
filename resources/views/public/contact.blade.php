@include('public.header')

<div class="relative block md:block ">
    @if(app()->getLocale() == 'ar')
    <img src="{{ asset('imgs/image/yellow-bg.png') }}" alt="" class="absolute hidden md:block top-0 -z-10 left-0 h-[400px] opacity-100">
    @else
    <img src="{{ asset('imgs/image/yellow-bg-l.png') }}" alt="" class="absolute  hidden md:block top-0 -z-10  right-0 h-[400px]  opacity-100">
    @endif
</div>

<section class="bg-transparent w-full ">
    
    <div class="mx-auto flex flex-col gap-0">        

        <section class="flex flex-col justify-center items-center h-40 md:bg-transparent bg-primary">
            <div class="w-full flex flex-col justify-center ps-8 h-full w-max-[1100px]">
                <h1 class="text-black text-4xl font-bold mb-4 text-center">{{__('public')['contact']}}</h1>
            </div>
        </section>

        <section  ></section>
        
        <!-- Left Column: Contact Form -->
        <div style="background-image: url( {{ asset('imgs/image/right-yellow-bg.png') }} ); background-size: 200px" class="p-0 md:bg-transparent bg-no-repeat bg-right bg-mobile2 ">
            <x-contact />
        </div>


        <!-- Right Column: Contact Details -->
        <div class=" p-0">            
            <div class="flex items-center justify-center">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14508.07128006819!2d46.549774!3d24.6230707!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e2f19e072479591%3A0x5c9bc475274e590b!2z2LTYsdmD2Kkg2LHYtNmK2K8g2KfZhNi52KzZitin2YYg2YTZhNin2LPYqti02KfYsdin2Kog2KfZhNmH2YbYr9iz2YrYqQ!5e0!3m2!1sen!2ssa!4v1709969915852!5m2!1sen!2ssa" class="w-full"  height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>                
            </div>            
        </div>
        
    </div>
</section>


@include('public.footer')