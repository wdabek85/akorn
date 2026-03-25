<section class="w-full">
  <div class="max-w-[1600px] mx-auto px-4 lg:px-[80px] py-6 lg:py-12">
    <div class="bg-[#D9D9D9] px-5 py-6 lg:px-[80px] lg:py-6 flex flex-col items-center gap-8 lg:flex-row lg:items-center lg:gap-8">

      {{-- Lewa kolumna: tekst + formularz --}}
      <div class="flex flex-col gap-6 lg:flex-1">
        <div class="flex flex-col gap-4 text-center lg:text-left">
          <h2 class="display-md-medium lg:display-lg-medium text-black tracking-[-1px]">
            Bądź na Bieżąco
          </h2>
          <p class="text-sm-regular text-black">
            Zapisz się do naszego newslettera i jako pierwszy otrzymuj info o nowych kolekcjach, limitowanych dropach i specjalnych promocjach. Dorzucamy też porady dotyczące stylu, żebyś zawsze wyglądał dobrze – bez względu na okazję.
          </p>
        </div>

        {{-- Formularz --}}
        <form class="flex flex-col gap-2" data-newsletter-form>
          {{-- Honeypot --}}
          <div class="absolute -left-[9999px]" aria-hidden="true">
            <input type="text" name="website_url" tabindex="-1" autocomplete="off">
          </div>

          <div class="flex flex-col gap-4 lg:flex-row lg:items-end">
            {{-- Input --}}
            <div class="flex flex-col gap-2 lg:w-[328px]">
              <label class="text-sm-semibold text-[#8B8B8B]">Email</label>
              <div class="flex items-center gap-2 bg-white border border-[#E2E2E2] px-4 py-3">
                <x-icon.mail class="size-5 text-[#8B8B8B]" />
                <input
                  type="email"
                  name="email"
                  placeholder="Twój E-mail"
                  required
                  class="flex-1 text-md-medium text-black placeholder:text-[#8B8B8B] bg-transparent border-none outline-none"
                >
              </div>
            </div>

            {{-- Button --}}
            <button
              type="submit"
              data-submit
              class="inline-flex items-center justify-center !no-underline cursor-pointer text-md-medium bg-blue-300 text-white px-6 py-3 w-full lg:w-auto"
            >
              Zapisz mnie do Newslettera
            </button>
          </div>

          {{-- Feedback --}}
          <p class="text-sm-medium hidden" data-feedback></p>

          <p class="text-xs-regular text-black text-center lg:text-left">
            Zapisując się, akceptujesz nasze <a href="{{ home_url('/regulamin') }}" class="underline">warunki korzystania z usługi</a>.<br>
            Możesz wypisać się w każdej chwili. Zero spamu, tylko konkret.
          </p>
        </form>
      </div>

      {{-- Prawa kolumna: zdjęcie --}}
      <div class="shrink-0 size-[250px] lg:size-[325px]">
        <img
          src="{{ Vite::asset('resources/images/newsletter.png') }}"
          alt="Newsletter Akorn"
          class="w-full h-full object-cover"
          loading="lazy"
        >
      </div>

    </div>
  </div>
</section>
