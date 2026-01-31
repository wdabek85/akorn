<section class="hero bg-primary-400" data-hero>
    <div class="mx-auto w-full  lg:pl-15">
      <div class="grid gap-8 lg:grid-cols-2 lg:items-center">
  
        <div class="px-5">
          
          <h1 class="display-md-regular text-white lg:hidden">
            <span class="text-orange-300">Akorn</span> Agencja Digital
          </h1>
          <h1 class="hidden display-lg-regular text-white lg:block">
            <span class="text-orange-300">Akorn</span> Agencja Digital
          </h1>

          @if(!empty($hero['text']))
            <p class="mt-4 text-white text-md-regular">
              {{ $hero['text'] }}
            </p>
          @endif

          @if(!empty($hero['tagText']))
            <x-button href="{{ home_url('/kontakt') }}" variant="secondary" size="sm" class="rounded-xs text-xs-bold px-[8px] py-2 mt-4 w-full lg:w-auto">
              {{ $hero['tagText'] }}
              <x-slot:rightIcon>
                <x-icon.arrow-down/>
              </x-slot:rightIcon>
            </x-button>
          @endif

        </div>
  
        <div class="lg:justify-self-end">
          @if(!empty($hero['image']))
            @php
              // ACF image może być tablicą (url/alt) albo ID – obsługujemy oba
              $imgUrl = is_array($hero['image']) ? ($hero['image']['url'] ?? '') : '';
              $imgAlt = is_array($hero['image']) ? ($hero['image']['alt'] ?? '') : '';
  
              if (!$imgUrl && is_numeric($hero['image'])) {
                $imgUrl = wp_get_attachment_image_url((int) $hero['image'], 'full') ?: '';
                $imgAlt = get_post_meta((int) $hero['image'], '_wp_attachment_image_alt', true) ?: '';
              }
            @endphp
  
            @if($imgUrl)
              <img
                src="{{ $imgUrl }}"
                alt="{{ $imgAlt }}"
                class="w-full max-w-[640px] "
                loading="eager"
              >
            @endif
          @endif
        </div>
  
      </div>
    </div>
  </section>
  <section class="w-full flex flex-col lg:flex-row bg-primary-400 pb-4">
    <div class="flex flex-col max-h-[325px] overflow-hidden">
        @if(!empty($hero['below']['bgUrl']))
          <img
            src="{{ $hero['below']['bgUrl'] }}"
            alt="{{ $hero['below']['bgAlt'] ?? '' }}"
            class="w-full object-contain  flex-1 min-h-0 bg-orange-300"
            loading="lazy"
            decoding="async"
          >
        @endif
      
        <div class="w-full px-4 pb-[16px] bg-orange-300 shrink-0">
          @if(!empty($hero['below']['text']))
            <p class="text-black text-xs-regular">
              {{ $hero['below']['text'] }}
            </p>
          @endif
        </div>
    </div>  
    @if(!empty($hero['below']['benefits']))
    <div class="grid md:grid-cols-3">
        @foreach($hero['below']['benefits'] as $item)
        <div class="flex justify-between flex-col p-6 bg-[#E5E7EB] h-[325px] nth-2:bg-[#F9FAFB] ">
            <div class="flex justify-between">
                <div class="display-lg-regular">{{ $item['number'] }}</div>
                @if(!empty($item['icon']['url']))
                <img
                    src="{{ $item['icon']['url'] }}"
                    alt="{{ $item['icon']['alt'] ?? '' }}"
                    class="mb-4 h-[120px] w-[120px]"
                >
            @endif
            </div>
            <div>
                <div class="mt-2 display-sm-regular">{{ $item['title'] }}</div>
                <p class="mt-4 text-xs-regular">{{ $item['text'] }}</p>
            </div>
        </div>
        @endforeach
    </div>
    @endif
  </section>