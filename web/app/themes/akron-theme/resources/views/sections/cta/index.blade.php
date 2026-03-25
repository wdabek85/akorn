<section class="w-full bg-primary-400">
  <div class="max-w-[1600px] mx-auto px-4 py-12 lg:px-[80px] flex flex-col items-center gap-12">

    {{-- Logo + tekst --}}
    <div class="flex flex-col items-center gap-4 w-full text-center">
      <img
        src="{{ Vite::asset('resources/images/logo.svg') }}"
        alt="Akorn"
        class="h-8 w-auto"
      >
      <h2 class="display-md-medium lg:display-lg-medium text-white tracking-[-1px]">
        Gotowy, żeby Twój biznes zaczął rosnąć online?
      </h2>
      <p class="text-sm-regular text-white">
        Umów bezpłatną 30-minutową konsultację. Porozmawiamy o Twoich celach i pokażemy, co możemy dla Ciebie zrobić.
      </p>
    </div>

    {{-- CTA --}}
    <x-button
      href="{{ home_url('/kontakt') }}"
      variant="primary"
      size="lg"
      class="!bg-orange-400 !border-orange-400 w-full lg:w-auto"
    >
      Umów konsultację — to nic nie kosztuje
    </x-button>

  </div>
</section>
