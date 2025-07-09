<div class="bg-cover bg-center bg-no-repeat" style="background-image: url({{ url('/') }}/assets/img/bg.png); background-color: #000;">
    <div class="bg-black/30 min-h-screen flex flex-col justify-center items-center">
        
        <div>
            {{ $logo }}
        </div>

        @if(env('PW_LOGIN') == true)
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 md:bg-white md:bg-opacity-25 md:shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        @else
            <div>
                {{ $slot }}
            </div>
        @endif
    </div>
        
</div>
