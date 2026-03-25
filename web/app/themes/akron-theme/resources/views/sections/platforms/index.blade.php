@props([
  'heading' => '',
  'description' => '',
  'items' => [],
])

@if(!empty($items))
<section class="w-full bg-white">
  <div class="max-w-[1600px] mx-auto">

    {{-- Nagłówek --}}
    @if($heading)
      <div class="px-4 py-4 lg:px-[80px] lg:py-6 flex flex-col gap-4">
        <h2 class="display-md-medium lg:display-lg-regular text-black tracking-[-1px]">{{ $heading }}</h2>
        @if($description)
          <p class="text-md-regular text-black">{{ $description }}</p>
        @endif
      </div>
    @endif

    {{-- Grid platform --}}
    <div class="px-4 py-6 lg:px-[80px] lg:py-12 flex flex-col gap-10 lg:gap-10">
      @foreach(array_chunk($items, 3) as $row)
        <div class="flex flex-col gap-10 lg:flex-row lg:justify-between">
          @foreach($row as $item)
            <div class="flex flex-col gap-2 items-center text-center lg:min-w-[380px]">
              @if(!empty($item['logo']))
                <div class="h-10 flex items-center justify-center">
                  <img
                    src="{{ $item['logo'] }}"
                    alt="{{ $item['title'] ?? '' }}"
                    class="h-10 w-auto object-contain"
                    loading="lazy"
                  >
                </div>
              @endif

              <div class="flex flex-col gap-1">
                @if(!empty($item['title']))
                  <h3 class="text-xl-semibold text-black">{{ $item['title'] }}</h3>
                @endif
                @if(!empty($item['link']))
                  <a href="{{ $item['link'] }}" class="text-[10px] leading-3 text-black underline">
                    Przeczytaj czy to platforma dla Ciebie
                  </a>
                @endif
              </div>
            </div>
          @endforeach
        </div>
      @endforeach
    </div>

  </div>
</section>
@endif
