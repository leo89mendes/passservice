<div class="w-full">
    <div class="fixed mt-[20%] right-4 z-50">
        <a target="_blank" href="https://wa.me/11979900750">    
            <img alt="Chat on WhatsApp" width="65" src="{{ asset('storage/images/icons/whatsapp.png') }}"/>
        <a />
    </div>
    <div class="menu desktop w-full py-6 bg-white border-b-2 border-black justify-center hidden md:block">
        <div class="flex h-10 items-center justify-center">
            @foreach ($menu as $m)
                <div class="px-4 hover:text-[#86cee9] cursor-pointer">{{ $m->menu }}</div>
            @endforeach
            <div class="work-time md:grid grid-flow-col grid-rows-2 px-6">
                <div class="row-span-2 self-center pr-2"><img src="{{ asset('/storage/images/icons/hour.png') }}" /></div>
                <div class="row-span-1 text-[#86cee9]">Horários</div>
                <div class="row-span-1">{{ $config->time }}</div>
            </div>
            <div class="telephone md:grid grid-flow-col grid-rows-2 px-6">
                <div class="row-span-2 self-center pr-2"><img src="{{ asset('/storage/images/icons/telephone.png') }}" /></div>
                <div class="row-span-1 text-[#86cee9]">Fale Conosco</div>
                <div class="row-span-1">{{ $config->mobile }}</div>
            </div>
            <div class="bg-[#0D72BE] hover:bg-[#86cee9] py-4 px-6 ml-4 cursor-pointer flex">
                <div class="text-white font-bold uppercase">Marcar Horário</div>
            </div>
        </div>
    </div>
    <div class="mobile grid  grid-cols-2 bg-white z-10 w-full p-4 md:hidden ">
        <div class="text-[#0D72BE] font-bold uppercase flex items-center text-center">Pass Service</div>
        <!-- <div onmousenter="alert('teste')" class="time flex flex-col text-sm justify-between text-center">
            <div class="row-span-2 self-center pr-2"><img src="images/icons/hour.png" /></div>
            <div class="row-span-1 text-[#86cee9]">Horários</div>
        </div>
        <div class="telephone flex flex-col text-sm justify-between text-center">
            <div class=" self-center pr-2"><img src="images/icons/telephone.png" /></div>
            <div class="row-span-1 text-[#86cee9]">Contato</div>
        </div> -->
        <div id="menuMobile" class="icon flex justify-end ">
            <svg xmlns="http://www.w3.org/2000/svg" id="open" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-[#0D72BE] ">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" id="close" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-[#0D72BE] hidden">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>

        </div>
    </div>
    <div id="menu_mobile" class="hidden absolute w-svw h-full bg-white z-10">
        <ul>
            @foreach ($menu as $m)
                <li class="px-12 uppercase font-bold text-center text-[#0D72BE] hover:text-[#86cee9] cursor-pointer">{{ $m->menu }}</li>
            @endforeach
        </ul>
    </div>
    <div class="main-carousel"  data-flickity='{ "cellAlign": "left", "contain": true, "wrapAround": true, "friction": 0.5, "pageDots": false, "adaptiveHeight": true, "accessibility": true, "autoplay": true, "autoPlay": 10000 }'>
        @foreach($banners as $banner => $b)
            <div class="md:max-h-[380px]  w-full">
                <img src="{{ asset('/storage/' . $b['desktop'][0]) }}" />
            </div>
        @endforeach
    </div>
    <div class="aboutUs w-full">
        <div class="p-10 grid md:grid-cols-2">
            <div class="grid-col-1 px-4 text-wrap text-center py-4">
                <h1 class="text-[#0D72BE] text-2xl uppercase pb-4">{{ $about->title }}</h1>
                {!! $about->description !!}
            </div>
            <div class="grid-col-1">
                <img src="{{ asset('/storage/' . $about->image) }}" />
            </div>
        </div>
    </div>
    <div class="newslatter w-full grid md:grid-cols-3 bg-[#0D72BE] p-4 md:p-10">
        <div class="text-[#0D72BE] md:col-span-2">
            <form wire:submit="submit" class="flex flex-row subscribe">
                <input wire:model="email" class="md:w-8/12 py-4 text-[#0D72BE]" type="text" placeholder="Receber Novidades">
                <button class="text-white p-4 md:w-1/5 font-bold uppercase bg-[#86cee9] hover:bg-[#0D72BE] hover:border mx-4" type="submit">Inscrever</button>
            </form>
            <div class="text-white my-2">{{ $message }}</div>
        </div>
        <div class="social_icons flex justify-center my-4 md:m-0">
            <div class="facebook mx-2 sm:justify-end">
                <img class="md:float-right cursor-pointer" src="{{ asset('storage/images/icons/facebook.png') }}" />
            </div>
            <div class="instagram mx-2 flex sm:justify-left">
            <img class="cursor-pointer" src="{{ asset('storage/images/icons/instagram.png') }}" />
            </div>

        </div>
    </div>
    <div class="service w-full p-10 bg-[#86cee9]">
        <h3 class="text-center uppercase text-white font-bold text-4xl pb-5">{{ $config->service_title }}</h3>
        <div class="flex flex-col max-w-full px-4" data-flickity='{ "cellAlign": "left", "contain": true, "wrapAround": true, "pageDots": false}' >
            @foreach($services as $service)
                <div class="bg-white p-4 md:w-[375px] md:mx-2">
                    <div class="service-img">
                        <img src="{{ asset('storage/' . $service->image) }}" />
                    </div>
                    <h3 class="text-2xl text-center py-2 font-bold text-[#0D72BE]">{{ $service->title }}</h3>
                    <span class="text-center">
                        {!! $service->description !!}
                    </span>
                </div>
            @endforeach
        </div>
    </div>
    <div class="map w-full"> 
    <iframe
        width="100%"
        height="380"
        style="border:0"
        loading="lazy"
        allowfullscreen
        referrerpolicy="no-referrer-when-downgrade"
        src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAhsIwd2H_nu-Ss5YKa9neCAm2AusyRDoY&q={{ $config->location  }}">
    </iframe>
        
    </div>
    <div class="footer w-full bg-[#0D72BE] h-10 flex justify-center items-center py-8">
        <span class="text-white text-center">{{ $config->footer }}</span>
    </div>
</div>