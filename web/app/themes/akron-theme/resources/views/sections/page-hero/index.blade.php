<section class="w-full bg-white">
  <div class="max-w-[1600px] mx-auto px-5 lg:px-[80px] flex flex-col gap-10 lg:flex-row lg:items-center lg:gap-[80px]">

    {{-- Lewa kolumna: breadcrumby + tytuł + opis --}}
    <div class="flex flex-col gap-4 lg:gap-4 lg:flex-1">

      @if(function_exists('rank_math_the_breadcrumbs'))
        <div class="text-[10px] leading-3 text-black [&_a]:text-black [&_a]:!no-underline [&_a]:hover:underline [&_.separator]:mx-1 [&_.last]:font-bold">
          {!! rank_math_the_breadcrumbs() !!}
        </div>
      @endif

      <div class="flex flex-col gap-2.5">
        @if(!empty($pageHero['title']))
          <h1 class="text-[52px] leading-[56px] font-normal tracking-[-1px] text-black">
            {{ $pageHero['title'] }}
          </h1>
        @endif

        @if(!empty($pageHero['description']))
          <p class="text-md-regular text-black">
            {{ $pageHero['description'] }}
          </p>
        @endif
      </div>
    </div>

    {{-- Prawa kolumna: dwa panele ze zdjęciami --}}
    <div class="flex flex-col lg:flex-row lg:flex-1">

      {{-- Panel lewy — zdjęcie z nakładką --}}
      <div class="relative flex flex-col justify-between h-[478px] lg:w-[240px] rounded-l overflow-hidden p-5">
        <div class="absolute inset-0 bg-[#F2F2F2]"></div>

        @if(!empty($pageHero['imageLeft']['url']))
          <img
            src="{{ $pageHero['imageLeft']['url'] }}"
            alt="{{ $pageHero['imageLeft']['alt'] }}"
            class="absolute inset-0 w-full h-full object-cover"
            loading="eager"
          >
        @endif

        <div class="relative flex items-center justify-center size-[30px] bg-white rounded-full">
          <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
            <line x1="12" y1="5" x2="12" y2="19"></line>
            <line x1="5" y1="12" x2="19" y2="12"></line>
          </svg>
        </div>

        @if(!empty($pageHero['captionLeft']))
          <p class="relative text-sm-medium text-black">
            {{ $pageHero['captionLeft'] }}
          </p>
        @endif
      </div>

      {{-- Panel prawy — pełne zdjęcie --}}
      <div class="relative flex flex-col justify-end h-[478px] lg:flex-1 rounded-r overflow-hidden p-5">
        @if(!empty($pageHero['imageRight']['url']))
          <img
            src="{{ $pageHero['imageRight']['url'] }}"
            alt="{{ $pageHero['imageRight']['alt'] }}"
            class="absolute inset-0 w-full h-full object-cover"
            loading="eager"
          >
        @else
          <div class="absolute inset-0 bg-[#E5E5E5]"></div>
        @endif

        @if(!empty($pageHero['captionRight']))
          <p class="relative text-sm-medium text-black">
            {{ $pageHero['captionRight'] }}
          </p>
        @endif
      </div>

    </div>

  </div>
</section>
