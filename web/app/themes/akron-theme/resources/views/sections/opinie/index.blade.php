@if(!empty($opinie['items']))
<section class="w-full bg-white" data-opinie>
  <div class="max-w-[1600px] mx-auto px-4 py-6 lg:px-[80px] lg:py-12">

    {{-- Nagłówek --}}
    <div class="flex flex-col gap-2 mb-8">
      @if(!empty($opinie['heading']))
        <h2 class="display-md-medium text-black">{{ $opinie['heading'] }}</h2>
      @endif
      @if(!empty($opinie['description']))
        <p class="text-md-regular text-black">{{ $opinie['description'] }}</p>
      @endif
    </div>

    {{-- Slider --}}
    <div
      class="flex gap-8 lg:gap-12 overflow-x-auto snap-x snap-mandatory pb-4 cursor-grab active:cursor-grabbing"
      data-opinie-slider
      style="-webkit-overflow-scrolling: touch; scrollbar-width: none;"
    >
      @foreach($opinie['items'] as $item)
        <div class="shrink-0 w-[85vw] lg:w-[600px] snap-start flex flex-col gap-6 first:ml-0 last:mr-4 lg:last:mr-0">

          {{-- Zdjęcie / wideo --}}
          @if(!empty($item['image']['url']))
            <div class="relative h-[220px] lg:h-[320px] rounded overflow-hidden">
              <img
                src="{{ $item['image']['url'] }}"
                alt="{{ $item['image']['alt'] }}"
                class="w-full h-full object-cover"
                loading="lazy"
              >

              @if(!empty($item['videoUrl']))
                <a
                  href="{{ $item['videoUrl'] }}"
                  target="_blank"
                  rel="noopener noreferrer"
                  class="absolute bottom-4 left-4 lg:bottom-8 lg:left-8 size-8 bg-white rounded-full flex items-center justify-center shadow-md hover:scale-110 transition-transform"
                  aria-label="Odtwórz wideo"
                >
                  <svg class="size-4 ml-0.5 text-black" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M8 5v14l11-7z"/>
                  </svg>
                </a>
              @endif
            </div>
          @endif

          {{-- Tekst --}}
          <div class="flex flex-col gap-2">
            @if(!empty($item['quote']))
              <p class="text-textsize-lg font-light leading-normal text-black">
                „{{ $item['quote'] }}"
              </p>
            @endif
            @if(!empty($item['author']))
              <p class="text-sm-regular text-black">
                {{ $item['author'] }}
              </p>
            @endif
          </div>
        </div>
      @endforeach
    </div>

  </div>
</section>
@endif
