<section class="hero bg-primary-400" data-hero>
    <div class="mx-auto w-full lg:pl-[80px] max-w-[1600px]">
      <div class="grid gap-8 lg:grid-cols-2 lg:items-center">

        <div class="px-5 pt-5 lg:px-0 lg:pt-0">

          @if(function_exists('rank_math_the_breadcrumbs'))
            <div class="hero-breadcrumb text-textsize-xs text-white/60 mb-4">
              {!! rank_math_the_breadcrumbs() !!}
            </div>
          @endif

          <h1 class="display-md-regular text-white lg:hidden">
            <span class="text-orange-300">Strona, Sklep, Seo</span>- jeden zespół, spójny plan, realne wyniki
          </h1>
          <h1 class="hidden display-md-regular text-white lg:block">
            <span class="text-orange-300">Strona, Sklep, Seo</span>- jeden zespół, spójny plan, realne wyniki
          </h1>

          @if(!empty($hero['text']))
            <p class="mt-4 text-white text-md-regular">
              {{ $hero['text'] }}
            </p>
          @endif

          @if(!empty($hero['tagText']))
            <x-button href="{{ home_url('/kontakt') }}" variant="primary" size="sm" class="!bg-orange-300 rounded-xs text-xs-bold px-[8px] py-2 mt-4 w-full lg:w-auto">
              {{ $hero['tagText'] }}
              <x-slot:rightIcon>
                <x-icon.phone/>
              </x-slot:rightIcon>
            </x-button>
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
          @if(!empty($hero['image']['url']))
            <img
              src="{{ $hero['image']['url'] }}"
              alt="{{ $hero['image']['alt'] ?? '' }}"
              class="w-full max-h-[325px] object-cover lg:min-w-[640px]"
              loading="eager"
            >
          @endif
        </div>

      </div>
    </div>
  </section>

  {{-- Panel statystyk --}}
  <section class="w-full bg-[#F3F4F6]">
    <div class="max-w-[1600px] mx-auto px-4 py-6 lg:px-[80px] lg:py-12">

      {{-- Górny wiersz: cytat + opis --}}
      <div class="grid gap-5 lg:grid-cols-2 mb-8 lg:mb-12">
        <p class="display-sm-regular text-black">
          Zanim powstał Akorn, zdobywaliśmy doświadczenie tam, gdzie liczy się każdy piksel i każda złotówka klienta.
        </p>
        <p class="text-md-regular">
          Nasz zespół ma za sobą lata pracy przy projektach dla agencji i klientów z różnych branż. Tę wiedzę — przetestowaną na dziesiątkach projektów — teraz wkładamy w każdy projekt Akorn
        </p>
      </div>

      {{-- Dolny wiersz: 4 statystyki --}}
      <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">

        <div class="flex flex-col items-baseline gap-3  lg:items-start">
          <span class="display-lg-regular text-orange-300">60+</span>
          <span class="text-md-regular text-black">Projektów w portfolio zespołu</span>
        </div>

        <div class="flex flex-col items-baseline gap-3  lg:items-start">
          <span class="display-lg-regular text-orange-300">5+ Lat</span>
          <span class="text-md-regular text-black">Doświadczenia w branży digital</span>
        </div>

        <div class="flex flex-col items-baseline gap-3  lg:items-start">
          <span class="display-lg-regular text-orange-300">20+</span>
          <span class="text-md-regular text-black">Branż, z którymi pracowaliśmy</span>
        </div>

        <div class="flex flex-col items-baseline gap-3  lg:items-start">
          <span class="display-lg-regular text-orange-300">4w1</span>
          <span class="text-md-regular text-black">Strategia, design, development i SEO — bez outsource'ingu</span>
        </div>

      </div>
    </div>
  </section>
