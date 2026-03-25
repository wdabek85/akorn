<section class="w-full bg-white overflow-clip">
  <div class="max-w-[1600px] mx-auto px-4 py-6 lg:px-[80px] lg:py-12">
    <div class="flex flex-col gap-10 lg:flex-row lg:gap-[80px]">

      {{-- Lewa kolumna --}}
      <div class="flex flex-col gap-8 lg:flex-1">
        <div class="flex flex-col gap-4">
          <span class="text-xs-regular text-black">W Jaki Sposób Pracujemy na Twój Sukces</span>
          <h2 class="display-md-medium text-black">Od pierwszego kontaktu do efektów — 4 proste kroki.</h2>
          <p class="text-md-regular text-black">
            Wiesz, czego się spodziewać na każdym etapie. Zero zaskoczeń, pełna transparentność — od wyceny po wdrożenie.
          </p>
        </div>

        <x-button
          href="{{ home_url('/kontakt') }}"
          variant="primary"
          size="lg"
          class="!bg-blue-300 w-full lg:w-auto lg:self-start"
        >
          Umów bezpłatną konsultację
          <x-slot:rightIcon>
            <x-icon.arrow-circle-right />
          </x-slot:rightIcon>
        </x-button>
      </div>

      {{-- Prawa kolumna: timeline --}}
      <div class="flex flex-col gap-4 lg:flex-1">

        {{-- Krok 1 --}}
        <div class="flex gap-10">
          <div class="flex flex-col items-center shrink-0">
            <x-icon.diamond class="size-12" />
            <div class="w-0 h-[100px] border-l border-dashed border-black/20"></div>
          </div>
          <div class="flex flex-col gap-4 flex-1">
            <div>
              <p class="text-xl-medium text-black">Krok 1</p>
              <p class="text-xl-medium text-black">Krótka konsultacja i cel</p>
            </div>
            <p class="text-md-regular text-black">
              Wypełniasz formularz, a my dopytujemy o branżę, ofertę i cel (leady / sprzedaż / widoczność). Ustalamy, co ma być „wynikiem" projektu.
            </p>
          </div>
        </div>

        {{-- Krok 2 --}}
        <div class="flex gap-10">
          <div class="flex flex-col items-center shrink-0 self-stretch">
            <x-icon.diamond class="size-12" />
            <div class="w-0 flex-1 border-l border-dashed border-black/20"></div>
          </div>
          <div class="flex flex-col gap-4 flex-1 pb-4">
            <div>
              <p class="text-xl-medium text-black">Krok 2</p>
              <p class="text-xl-medium text-black">Plan i oferta dopasowana do potrzeb</p>
            </div>
            <p class="text-md-regular text-black">
              Dostajesz konkretny plan: zakres, priorytety, harmonogram i budżet. Bez waty — co robimy i dlaczego to ma zadziałać.
            </p>
            {{-- Zdjęcie — desktop przy kroku 2 --}}
            <div class="hidden lg:block h-[240px] rounded overflow-hidden">
              <img
                src="{{ Vite::asset('resources/images/jak-dzialamy.png') }}"
                alt="Proces pracy Akorn"
                class="w-full h-full object-cover rounded"
                loading="lazy"
              >
            </div>
          </div>
        </div>

        {{-- Krok 3 --}}
        <div class="flex gap-10">
          <div class="flex flex-col items-center shrink-0 lg:shrink-0 self-stretch lg:self-auto">
            <x-icon.diamond class="size-12" />
            <div class="w-0 flex-1 lg:h-[100px] lg:flex-none border-l border-dashed border-black/20"></div>
          </div>
          <div class="flex flex-col gap-4 flex-1">
            <div>
              <p class="text-xl-medium text-black">Krok 3</p>
              <p class="text-xl-medium text-black">Realizacja i testy</p>
            </div>
            <p class="text-md-regular text-black">
              Projektujemy i wdrażamy rozwiązanie (strona/sklep/SEO/GEO/foto), dbając o szybkość, czytelność i zaufanie. Przed publikacją testujemy na mobile i desktop.
            </p>
            {{-- Zdjęcie — mobile przy kroku 3 --}}
            <div class="lg:hidden h-[160px] rounded overflow-hidden">
              <img
                src="{{ Vite::asset('resources/images/jak-dzialamy.png') }}"
                alt="Proces pracy Akorn"
                class="w-full h-full object-cover rounded"
                loading="lazy"
              >
            </div>
          </div>
        </div>

        {{-- Krok 4 --}}
        <div class="flex gap-10">
          <div class="flex flex-col items-center shrink-0">
            <x-icon.diamond class="size-12" />
          </div>
          <div class="flex flex-col gap-4 flex-1">
            <div>
              <p class="text-xl-medium text-black">Krok 4</p>
              <p class="text-xl-medium text-black">Start i optymalizacja</p>
            </div>
            <p class="text-md-regular text-black">
              Publikujemy, ustawiamy pomiar i zbieramy dane. Jeśli trzeba — dopracowujemy elementy, które mają największy wpływ na konwersję.
            </p>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>
