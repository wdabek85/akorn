<footer class="w-full bg-white">
  <div class="max-w-[1600px] mx-auto px-4 lg:px-[80px]">

    {{-- Główna część --}}
    <div class="py-8 flex flex-col gap-6 lg:flex-row lg:gap-[70px]">

      {{-- Kolumna 1: Logo + opis --}}
      <div class="flex flex-col gap-4 lg:flex-1">
        <img
          src="{{ get_theme_file_uri('resources/images/logo.svg') }}"
          alt="Akorn"
          class="h-8 w-[93px] invert"
        >
        <p class="text-xs-regular text-black">
          Łączymy strategię, design, development i SEO w jednym zespole. Bez pośredników — pełna kontrola nad jakością i terminami Twojego projektu.
        </p>
        <p class="text-sm-medium text-black">
          Akorn Agencja Digital<br>Media
        </p>
      </div>

      {{-- Kolumna 2: Dane formalne --}}
      <div class="flex flex-col gap-6 lg:flex-1">
        <h4 class="text-md-medium text-black">Dane formalne</h4>

        <div class="flex items-start gap-2">
          <x-icon.location class="size-4 shrink-0 mt-0.5" />
          <p class="text-sm-regular text-black">
            ul. Częstochowska 36<br>26-065 Micigózd
          </p>
        </div>

        <div class="flex flex-col gap-2">
          <div class="flex items-center gap-2">
            <x-icon.document class="size-4 shrink-0" />
            <span class="text-sm-regular text-black">KRS: 0000706520</span>
          </div>
          <div class="flex items-center gap-2">
            <x-icon.document class="size-4 shrink-0" />
            <span class="text-sm-regular text-black">NIP: 9592085169</span>
          </div>
        </div>
      </div>

      {{-- Kolumna 3: Dane kontaktowe --}}
      <div class="flex flex-col gap-6 lg:flex-1">
        <h4 class="text-md-medium text-black">Dane kontaktowe</h4>

        <div class="flex flex-col gap-3">
          <p class="text-sm-medium text-black">Zadzwoń do nas:</p>
          <div class="flex items-center gap-2">
            <x-icon.phone class="size-4 shrink-0" />
            <a href="tel:+48884826068" class="text-sm-regular text-black">+48 884 826 068</a>
          </div>
        </div>

        <div class="flex flex-col gap-3">
          <p class="text-sm-medium text-black">Zostaw wiadomość:</p>
          <div class="flex items-center gap-2">
            <x-icon.mail class="size-4 shrink-0" />
            <a href="mailto:kontakt@akorn.pl" class="text-sm-regular text-black">kontakt@akorn.pl</a>
          </div>
        </div>
      </div>

      {{-- Kolumna 4: Usługi --}}
      <div class="flex flex-col gap-6 lg:flex-1">
        <h4 class="text-md-medium text-black">Usługi Akorn</h4>

        <div class="flex flex-col gap-2">
          <div class="flex items-center gap-2">
            <x-icon.support class="size-4 shrink-0" />
            <span class="text-sm-regular text-black">SEO dla Sklepów Internetowych</span>
          </div>
          <div class="flex items-center gap-2">
            <x-icon.support class="size-4 shrink-0" />
            <span class="text-sm-regular text-black">SEO dla Stron Internetowych</span>
          </div>
          <div class="flex items-center gap-2">
            <x-icon.support class="size-4 shrink-0" />
            <span class="text-sm-regular text-black">GEO dla Stron i Sklepów Internetowych</span>
          </div>
          <div class="flex items-center gap-2">
            <x-icon.support class="size-4 shrink-0" />
            <span class="text-sm-regular text-black">WEB Design</span>
          </div>
          <div class="flex items-center gap-2">
            <x-icon.support class="size-4 shrink-0" />
            <span class="text-sm-regular text-black">UX/UI</span>
          </div>
          <div class="flex items-center gap-2">
            <x-icon.support class="size-4 shrink-0" />
            <span class="text-sm-regular text-black">Fotografia</span>
          </div>
        </div>
      </div>

    </div>

    {{-- Dolny pasek --}}
    <div class="border-t border-blue-300/35 py-4 flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
      <p class="text-sm-regular text-black">
        Copyright © {{ date('Y') }} Akorn Agencja Digital
      </p>
      <div class="flex items-center gap-2">
        <a href="{{ home_url('/polityka-prywatnosci') }}" class="text-sm-regular text-black underline">Polityka Prywatności</a>
        <a href="{{ home_url('/regulamin') }}" class="text-sm-regular text-black underline">Regulamin</a>
      </div>
    </div>

  </div>
</footer>
