<section class="w-full bg-white">
  <div class="max-w-[1600px] mx-auto px-4 pt-4 lg:pt-0 lg:pl-[80px] lg:pr-0 flex flex-col gap-10 lg:flex-row lg:items-center lg:gap-[80px]">

    {{-- Lewa kolumna: breadcrumby + tytuł + opis --}}
    <div class="flex flex-col gap-4 lg:w-[600px] lg:shrink-0">

      @if(function_exists('rank_math_the_breadcrumbs'))
        <div class="text-[10px] leading-3 text-black [&_a]:text-black [&_a]:!no-underline [&_a]:hover:underline [&_.separator]:mx-1 [&_.last]:font-bold">
          {!! rank_math_the_breadcrumbs() !!}
        </div>
      @endif

      <div class="flex flex-col gap-2.5">
        <h1 class="text-[52px] leading-[56px] font-normal tracking-[-1px] text-black">
          Poznaj ludzi, którzy stoją za Twoim projektem.
        </h1>
        <p class="text-md-regular text-black">
          Akorn to agencja digital, która łączy strategię, design, technologię i marketing w jeden spójny system wzrostu. Pomagamy firmom sprzedawać więcej, wyglądać lepiej i być widocznym tam, gdzie szukają ich klienci.
        </p>
      </div>
    </div>

    {{-- Prawa kolumna: zdjęcie z dekoracją --}}
    <div class="lg:flex-1">
      <div class="relative h-[478px] overflow-hidden rounded-l bg-[#F2F2F2]">
        <img
          src="{{ Vite::asset('resources/images/about-hero.jpg') }}"
          alt="Zespół Akorn"
          class="absolute inset-0 w-full h-full object-cover"
          loading="eager"
        >

        {{-- Plus button --}}
        <div class="absolute top-4 left-5 bg-white rounded-full p-1.5">
          <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
            <line x1="12" y1="5" x2="12" y2="19"></line>
            <line x1="5" y1="12" x2="19" y2="12"></line>
          </svg>
        </div>

        {{-- Podpis --}}
        <p class="absolute bottom-4 left-5 text-sm-medium text-black">
          Dołącz do grona zadowolonych<br>klientów
        </p>
      </div>
    </div>

  </div>
</section>
