<section class="w-full bg-[#F2F2F2]">
  <div class="max-w-[1600px] mx-auto px-4 py-6 lg:px-[80px] flex flex-col gap-8 lg:flex-row lg:items-center lg:gap-[80px]">

    {{-- Lewa: tekst --}}
    <div class="flex flex-col gap-2 py-10 lg:py-0 lg:flex-1">
      <h2 class="display-md-medium lg:display-lg-regular text-black tracking-[-1px]">
        Natomiast jesteśmy idealnym partnerem, jeśli:
      </h2>
      <p class="text-md-regular text-black">
        Chcesz, żeby Twoja obecność online generowała realne przychody. Cenisz transparentność i konkretne wyniki. I szukasz zespołu, który potraktuje Twój biznes jak swój.
      </p>
    </div>

    {{-- Prawa: zdjęcie --}}
    <div class="relative h-[280px] lg:w-[350px] lg:shrink-0 overflow-hidden rounded-l">
      <img
        src="{{ get_theme_file_uri('resources/images/about-partner.jpg') }}"
        alt="Zespół Akorn"
        class="absolute inset-0 w-full h-full object-cover"
        loading="lazy"
      >

      <div class="absolute top-4 left-5 bg-white rounded-full p-1.5">
        <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M20.24 12.24a6 6 0 0 0-8.49-8.49L5 10.5V19h8.5z"/>
          <line x1="16" y1="8" x2="2" y2="22"/>
          <line x1="17.5" y1="15" x2="9" y2="15"/>
        </svg>
      </div>

      <p class="absolute bottom-4 left-5 text-[11px] font-medium text-white">
        Pasja i Zaangażowanie
      </p>
    </div>

  </div>
</section>
