@php
  $heading = $data['heading'] ?? '';
  $description = $data['description'] ?? '';
  $imageBefore = $data['image_before'] ?? '';
  $imageAfter = $data['image_after'] ?? '';
  $subheading = $data['subheading'] ?? '';
  $content = $data['content'] ?? '';
  $ctaText = $data['cta_text'] ?? '';
  $ctaLink = $data['cta_link'] ?? '';
@endphp

<section class="w-full bg-primary-400">

  {{-- Nagłówek --}}
  @if($heading)
    <div class="max-w-[1600px] mx-auto px-4 py-12 lg:px-[80px] text-center">
      <h2 class="display-md-medium lg:display-lg-regular text-white tracking-[-1px]">{{ $heading }}</h2>
      @if($description)
        <p class="text-md-regular text-white mt-4">{{ $description }}</p>
      @endif
    </div>
  @endif

  {{-- Before/After slider --}}
  @if($imageBefore && $imageAfter)
    <div class="max-w-[1600px] mx-auto px-4 py-12 lg:px-[80px]">
      <div class="relative h-[300px] lg:h-[478px] overflow-hidden select-none" data-before-after>
        {{-- After (pod spodem, pełna szerokość) --}}
        <img
          src="{{ $imageAfter }}"
          alt="Po zmianie"
          class="absolute inset-0 w-full h-full object-cover"
          draggable="false"
        >

        {{-- Before (na wierzchu, obcinane clipem) --}}
        <div class="absolute inset-0" data-before-clip style="clip-path: inset(0 50% 0 0)">
          <img
            src="{{ $imageBefore }}"
            alt="Przed zmianą"
            class="absolute inset-0 w-full h-full object-cover"
            draggable="false"
          >
        </div>

        {{-- Suwak --}}
        <div class="absolute top-0 bottom-0 w-1 bg-white cursor-ew-resize" data-before-slider style="left: 50%">
          <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 size-10 bg-white rounded-full shadow-lg flex items-center justify-center">
            <svg class="size-5 text-primary-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
              <path d="M18 8L22 12L18 16"/>
              <path d="M6 8L2 12L6 16"/>
            </svg>
          </div>
        </div>

        {{-- Labels --}}
        <span class="absolute top-4 left-4 bg-black/50 text-white text-xs px-2 py-1 rounded pointer-events-none">Przed</span>
        <span class="absolute top-4 right-4 bg-black/50 text-white text-xs px-2 py-1 rounded pointer-events-none">Po</span>
      </div>
    </div>
  @endif

  {{-- Dolny tekst --}}
  @if($subheading || $content)
    <div class="max-w-[1600px] mx-auto px-4 pb-12 lg:px-[80px]">
      <div class="flex flex-col gap-10 lg:flex-row lg:gap-[80px]">
        @if($subheading)
          <p class="display-xs-regular text-white lg:w-1/3 lg:shrink-0">{{ $subheading }}</p>
        @endif

        @if($content || $ctaText)
          <div class="flex flex-col gap-10 lg:flex-1">
            @if($content)
              <div class="text-md-regular text-white [&_p]:mb-6 [&_p:last-child]:mb-0">
                {!! $content !!}
              </div>
            @endif

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
        @endif
      </div>
    </div>
  @endif

</section>
