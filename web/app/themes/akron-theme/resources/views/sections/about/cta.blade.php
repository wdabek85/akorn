<section class="w-full bg-[#F2F2F2]">
  <div class="max-w-[1600px] mx-auto px-4 py-6 lg:px-[80px] flex flex-col gap-8 lg:flex-row lg:items-center lg:gap-8">

    {{-- Lewa: tekst + CTA --}}
    <div class="flex flex-col gap-6 lg:flex-1">
      <div class="flex flex-col gap-4">
        <h2 class="display-md-medium lg:display-lg-medium text-black tracking-[-1px]">
          Chcesz wiedzieć, co możemy zrobić dla Twojego biznesu?
        </h2>
        <p class="text-sm-regular text-black">
          Umów się na bezpłatną 30-minutową konsultację. Bez zobowiązań, bez presji sprzedażowej — porozmawiamy o Twoich celach i pokażemy, jak możemy pomóc.
        </p>
      </div>

      <x-button
        href="{{ home_url('/kontakt') }}"
        variant="primary"
        size="lg"
        class="!bg-blue-300 !py-3 w-full lg:w-auto lg:self-start"
      >
        Umów bezpłatną konsultację
      </x-button>
    </div>

    {{-- Prawa: zdjęcie --}}
    <div class="shrink-0 size-[250px] lg:size-[325px]">
      <img
        src="{{ get_theme_file_uri('resources/images/about-cta.png') }}"
        alt="Konsultacja Akorn"
        class="w-full h-full object-cover"
        loading="lazy"
      >
    </div>

  </div>
</section>
