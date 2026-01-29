<header class="w-full">
    {{-- TOP BAR (email + tel) --}}
    <div class="bg-zinc-100">
      <div class="mx-auto flex items-center justify-center gap-8 px-4 py-3 lg:px-10 items-between lg:max-w-[1440px] 2xl:max-w-[1600px]">
        <a href="mailto:kontakt@akorn.pl" class="flex items-center gap-2 text-xs-semibold">
          {{-- icon mail --}}
          <x-icon.mail />
          <span>kontakt@akorn.pl</span>
        </a>
  
        <a href="tel:+48884826068" class="flex items-center gap-2 text-xs-semibold">
          {{-- icon phone --}}
          <x-icon.phone/>
          <span>+48 884 826 068</span>
        </a>
  
        <p class="hidden lg:block flex-1 text-right text-xs-semibold">
          Darmowa Wycena. Oraz <span class="text-blue-200">RABAT 5%</span> na pierwsze zakupy dla Zarejestrowanych użytkowników. <a href="" class="text-blue-200">Sprawdź Regulamin Promocji</a>
        </p>
      </div>
    </div>
  
    {{-- NAV BAR (logo + kontakt + burger) --}}
    <div class="bg-slate-950">
      <div class="max-w-[1600px] mx-auto flex items-center justify-between gap-4 px-5 py-3 lg:px-10">
        <div class="flex gap-8">
          <a href="{{ home_url('/') }}" class="text-4xl font-extrabold italic text-white">
            <img src="{{ get_theme_file_uri('resources/images/logo.svg') }}" alt="Akorn">
          </a>
          @include('sections.header.desktop-menu')
        </div>
        <div class="flex gap-2 items-center">
          {{-- CTA (link) --}}
          <x-button href="{{ home_url('/kontakt') }}" variant="primary" size="lg" class="!bg-orange-300">
            <span class="lg:hidden">Kontakt</span>
            <span class="hidden lg:inline">Darmowa wycena</span>
          </x-button>
  
          {{-- Burger --}}
          <button
            type="button"
            class="grid h-12 w-12 place-items-center cursor-pointer lg:hidden"
            data-menu-toggle
            aria-controls="mobile-menu"
            aria-expanded="false"
          >
            <x-icon.hamburger />
          </button>
        </div>
      </div>
    </div>
  
    @include('sections.header.mobile-menu')
  </header>
  