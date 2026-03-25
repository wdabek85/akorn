<section class="w-full bg-white">
  <div class="max-w-[1600px] mx-auto px-4 py-6 lg:px-[80px] lg:py-12 flex flex-col gap-4">

    {{-- Rząd 1 --}}
    <div class="flex flex-col lg:flex-row gap-4">
      @include('sections.uslugi-grid.card', [
        'title' => 'Tworzenie stron internetowych',
        'description' => 'Strona, która nie tylko dobrze wygląda, ale prowadzi klienta do działania. Projektujemy pod konwersję, nie pod szablony.',
        'href' => home_url('/uslugi/strony-internetowe'),
        'number' => '01',
        'variant' => 'white',
      ])

      @include('sections.uslugi-grid.card', [
        'title' => 'Tworzenie sklepów internetowych',
        'description' => 'Sklep z czytelnym procesem zakupowym, szybkim ładowaniem i designem, który buduje zaufanie. Od pierwszego kliknięcia po finalizację zamówienia.',
        'href' => home_url('/uslugi/sklepy-internetowe'),
        'number' => '02',
        'variant' => 'white',
      ])

      @include('sections.uslugi-grid.card', [
        'title' => 'SEO dla stron i sklepów',
        'description' => 'Widoczność w Google, która przekłada się na ruch i zapytania. Struktura, treści i technikalia — robimy to, co realnie wpływa na pozycje.',
        'href' => home_url('/uslugi/seo'),
        'number' => '03',
        'variant' => 'orange',
      ])
    </div>

    {{-- Rząd 2 --}}
    <div class="flex flex-col lg:flex-row gap-4">
      @include('sections.uslugi-grid.card', [
        'title' => 'GEO — widoczność w AI',
        'description' => 'Twoi klienci szukają usług nie tylko w Google — także w ChatGPT, Gemini i Perplexity. Zadbamy, żeby Twoja firma pojawiała się w odpowiedziach AI.',
        'href' => home_url('/uslugi/geo'),
        'number' => '04',
        'variant' => 'white',
      ])

      @include('sections.uslugi-grid.card', [
        'title' => 'UX/UI Design',
        'description' => 'Projektujemy interfejsy, które są czytelne, szybkie i prowadzą użytkownika tam, gdzie chcesz. Każda decyzja projektowa oparta na danych, nie na gustach.',
        'href' => home_url('/uslugi/ux-ui'),
        'number' => '05',
        'variant' => 'orange',
      ])

      @include('sections.uslugi-grid.card', [
        'title' => 'Fotografia biznesowa i produktowa',
        'description' => 'Profesjonalne zdjęcia, które od razu trafiają na stronę. Sesje produktowe i wizerunkowe spójne z Twoim brandem — gotowe do użycia, bez dodatkowej obróbki.',
        'href' => home_url('/uslugi/fotografia'),
        'number' => '06',
        'variant' => 'white',
      ])
    </div>

  </div>
</section>
