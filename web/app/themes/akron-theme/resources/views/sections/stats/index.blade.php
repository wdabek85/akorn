@props([
  'heading' => '',
  'description' => '',
  'ctaText' => '',
  'ctaLink' => '',
  'items' => [],
])

@if(!empty($items))
<section class="w-full bg-white">
  <div class="max-w-[1600px] mx-auto px-4 py-6 lg:px-[80px] lg:py-12 flex flex-col gap-10 lg:flex-row lg:gap-[80px] lg:items-center">

    {{-- Lewa kolumna: tekst + CTA --}}
    <div class="flex flex-col gap-14 lg:w-[600px] lg:shrink-0">
      <div class="flex flex-col gap-4">
        @if($heading)
          <h2 class="text-[36px] leading-10 font-normal text-black">{{ $heading }}</h2>
        @endif
        @if($description)
          <p class="text-md-regular text-black">{{ $description }}</p>
        @endif
      </div>

      @if($ctaText)
        <x-button
          href="{{ $ctaLink ?: home_url('/kontakt') }}"
          variant="primary"
          size="lg"
          class="!bg-blue-300 w-full lg:w-auto lg:self-start"
        >
          {{ $ctaText }}
          <x-slot:rightIcon>
            <x-icon.arrow-circle-right />
          </x-slot:rightIcon>
        </x-button>
      @endif
    </div>

    {{-- Prawa kolumna: 3 statystyki o różnych wysokościach --}}
    <div class="flex flex-col gap-2 lg:flex-row lg:items-end lg:flex-1 lg:gap-6">
      @foreach($items as $index => $stat)
        @php
          $heights = ['h-[200px]', 'h-[333px]', 'h-[484px]'];
          $height = $heights[$index] ?? 'h-[200px]';

          $bgs = ['bg-[#F9FAFB]', 'bg-[#E5E7EB]', 'bg-orange-400'];
          $bg = $bgs[$index] ?? 'bg-[#F9FAFB]';

          $isLast = $index === 2;
          $textColor = $isLast ? 'text-white' : 'text-black';
          $bgOpacity = $isLast ? 'opacity-20' : 'opacity-60';
        @endphp

        <div class="flex flex-col gap-2 items-center flex-1">
          <div class="relative flex flex-col justify-between p-4 w-full overflow-hidden {{ $height }} {{ $bg }}">
            @if(!empty($stat['bgImage']))
              <div class="absolute inset-0 pointer-events-none {{ $bgOpacity }}">
                <img src="{{ $stat['bgImage'] }}" alt="" class="absolute w-full h-full object-cover" loading="lazy" aria-hidden="true">
              </div>
            @endif

            <span class="relative text-[52px] leading-[56px] font-normal tracking-[-1px] {{ $textColor }}">
              {{ $stat['value'] ?? '' }}
            </span>

            <p class="relative text-xs-regular {{ $textColor }}">
              {{ $stat['label'] ?? '' }}
            </p>
          </div>

          @if(!empty($stat['source']))
            <p class="text-[10px] leading-3 text-black/50 text-center">
              <span class="font-bold">Źródło:</span><br>{{ $stat['source'] }}
            </p>
          @endif
        </div>
      @endforeach
    </div>

  </div>
</section>
@endif
