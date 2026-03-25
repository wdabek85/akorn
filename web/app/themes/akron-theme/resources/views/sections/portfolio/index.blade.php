<section class="w-full bg-white" data-portfolio>
  <div class="max-w-[1600px] mx-auto py-6 lg:py-12">

    {{-- Nagłówek sekcji --}}
    <div class="px-4 lg:px-[80px] flex flex-col gap-4 mb-6 lg:mb-12">
      @if(!empty($portfolio['label']))
        <span class="text-xs-regular text-black">{{ $portfolio['label'] }}</span>
      @endif
      @if(!empty($portfolio['heading']))
        <h2 class="display-md-medium text-black">{{ $portfolio['heading'] }}</h2>
      @endif
    </div>

    {{-- Lista projektów --}}
    @if(!empty($portfolio['items']))
      <div class="px-4 lg:px-[80px]" data-portfolio-list>
        @foreach($portfolio['items'] as $index => $item)
          <div
            class="border-t border-black/10 py-6"
            data-portfolio-item
            @if($index === 0) data-portfolio-open @endif
          >
            {{-- Desktop --}}
            <div class="hidden lg:flex items-start justify-between gap-6">
              {{-- Numer + tytuł --}}
              <div class="flex gap-5 items-start w-[330px] shrink-0">
                <span class="text-[25px] font-semibold leading-normal text-black">
                  {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                </span>
                <h3 class="display-xs-semibold text-black flex-1">
                  {{ $item['title'] }}
                </h3>
              </div>

              {{-- Zdjęcie (widoczne tylko gdy rozwinięte) --}}
              <div
                class="overflow-hidden rounded-[10px] transition-all duration-500 ease-in-out shrink-0"
                data-portfolio-image
                @if($index === 0)
                  style="width: 440px; height: 250px; opacity: 1"
                @else
                  style="width: 0; height: 0; opacity: 0"
                @endif
              >
                @if(!empty($item['image']['url']))
                  <img
                    src="{{ $item['image']['url'] }}"
                    alt="{{ $item['image']['alt'] }}"
                    class="w-[440px] h-[250px] object-cover rounded-[10px]"
                    loading="lazy"
                  >
                @endif
              </div>

              {{-- Opis (widoczny zawsze, flex-1 gdy zwinięte) --}}
              <div class="flex items-start gap-4 flex-1 min-w-0">
                <p
                  class="text-textsize-lg leading-6 text-black flex-1 transition-opacity duration-300"
                  data-portfolio-description
                >
                  {{ $item['description'] }}
                </p>

                {{-- Toggle --}}
                <button
                  type="button"
                  class="shrink-0 size-[34px] rounded flex items-center justify-center border border-blue-300/15 transition-colors duration-300"
                  data-portfolio-trigger
                  :class="open ? 'bg-white text-black' : 'bg-blue-300 text-white'"
                >
                  <x-icon.minus-circle class="size-[18px] hidden" data-icon-minus />
                  <x-icon.plus-circle class="size-[18px]" data-icon-plus />
                </button>
              </div>
            </div>

            {{-- Mobile --}}
            <div class="flex flex-col gap-4 lg:hidden">
              {{-- Numer + tytuł --}}
              <div class="flex gap-5 items-start">
                <span class="text-[25px] font-semibold leading-normal text-black">
                  {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                </span>
                <h3 class="display-xs-semibold text-black flex-1">
                  {{ $item['title'] }}
                </h3>
              </div>

              {{-- Zdjęcie (widoczne tylko gdy rozwinięte) --}}
              <div
                class="overflow-hidden rounded-[10px] transition-all duration-500 ease-in-out"
                data-portfolio-image-mobile
                @if($index === 0)
                  style="height: 200px; opacity: 1"
                @else
                  style="height: 0; opacity: 0"
                @endif
              >
                @if(!empty($item['image']['url']))
                  <img
                    src="{{ $item['image']['url'] }}"
                    alt="{{ $item['image']['alt'] }}"
                    class="w-full h-[200px] object-cover rounded-[10px]"
                    loading="lazy"
                  >
                @endif
              </div>

              {{-- Opis --}}
              <p class="text-textsize-lg leading-6 text-black">
                {{ $item['description'] }}
              </p>

              {{-- Toggle --}}
              <button
                type="button"
                class="w-full rounded flex items-center justify-center p-2 border border-blue-300/15 transition-colors duration-300"
                data-portfolio-trigger
              >
                <x-icon.minus-circle class="size-[18px] hidden" data-icon-minus />
                <x-icon.plus-circle class="size-[18px]" data-icon-plus />
              </button>
            </div>
          </div>
        @endforeach
      </div>
    @endif

  </div>
</section>
