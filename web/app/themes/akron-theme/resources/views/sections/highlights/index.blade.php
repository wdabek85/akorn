@props([
  'label' => '',
  'heading' => '',
  'description' => '',
  'items' => [],
  'image' => '',
  'imageCaption' => '',
  'footnote' => '',
  'ctaText' => '',
  'ctaLink' => '',
  'bg' => 'white',
])

@php
  $bgClass = $bg === 'gray' ? 'bg-[#F3F4F6]' : 'bg-white';
@endphp

@if(!empty($items))
<section class="w-full {{ $bgClass }}">
  <div class="max-w-[1600px] mx-auto px-4 py-6 lg:px-[80px] lg:py-12 flex flex-col gap-8 lg:flex-row lg:gap-[80px] lg:items-center">

    {{-- Lewa kolumna: nagłówek + punkty + CTA --}}
    <div class="flex flex-col gap-6 py-10 lg:flex-1">
      @if($label)
        <p class="text-[10px] leading-3 text-black">
          {!! $label !!}
        </p>
      @endif

      <div class="flex flex-col gap-6">
        @if($heading)
          <h2 class="display-md-medium text-black">{{ $heading }}</h2>
        @endif

        @if($description)
          <p class="text-md-regular text-black">{!! $description !!}</p>
        @endif

        <div class="flex flex-col gap-6">
          @foreach(array_chunk($items, 2) as $row)
            <div class="flex flex-col gap-6 lg:flex-row lg:gap-6">
              @foreach($row as $item)
                <div class="flex gap-2 items-start flex-1">
                  <div class="shrink-0 bg-black rounded-full p-2.5">
                    <svg class="size-6 text-white" viewBox="0 0 24 24" fill="currentColor">
                      <path d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"/>
                      <path d="M20.488 11H13V3.512A9.025 9.025 0 0120.488 11z"/>
                    </svg>
                  </div>
                  <div class="flex flex-col gap-2 flex-1">
                    <h3 class="text-sm-semibold text-black">{{ $item['title'] ?? '' }}</h3>
                    <p class="text-xs-regular text-black">{{ $item['description'] ?? '' }}</p>
                  </div>
                </div>
              @endforeach
            </div>
          @endforeach
        </div>
      </div>

      @if($footnote)
        <p class="text-sm-regular text-black">{{ $footnote }}</p>
      @endif

      @if($ctaText)
        <x-button
          href="{{ $ctaLink ?: home_url('/kontakt') }}"
          variant="primary"
          size="lg"
          class="!bg-blue-300 w-full lg:w-auto lg:self-start"
        >
          {{ $ctaText }}
        </x-button>
      @endif
    </div>

    {{-- Prawa kolumna: zdjęcie --}}
    @if($image)
      <div class="lg:w-1/4 shrink-0">
        <div class="relative h-[280px] lg:h-[400px] overflow-hidden bg-primary-400">
          <img
            src="{{ $image }}"
            alt="{{ $imageCaption }}"
            class="absolute inset-0 w-full h-full object-cover"
            loading="lazy"
          >
          @if($imageCaption)
            <p class="absolute bottom-4 left-5 text-sm-medium text-white">{{ $imageCaption }}</p>
          @endif
        </div>
      </div>
    @endif

  </div>
</section>
@endif
