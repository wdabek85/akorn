<section class="w-full bg-white" data-kontakt>
  <div class="max-w-[1600px] mx-auto px-4 py-6 lg:px-[80px] lg:py-12 flex flex-col gap-10 lg:flex-row lg:gap-[80px] lg:items-start">

    {{-- Lewa kolumna: info --}}
    <div class="flex flex-col gap-6 lg:flex-1">
      <div class="flex flex-col gap-2 lg:gap-4">
        <span class="text-textsize-lg font-medium leading-[22px] text-black">Kontakt</span>
        <div class="flex flex-col gap-1 lg:gap-2">
          <h2 class="display-md-medium lg:display-lg-medium text-black tracking-[-1px]">Skontaktuj się</h2>
          <p class="text-md-regular text-black">Czekamy na Twoje Pytania i Sugestie</p>
        </div>
      </div>

      <div class="flex flex-col gap-4 lg:gap-6">
        {{-- Email --}}
        <div class="flex flex-col gap-2">
          <div class="flex items-center gap-1">
            <x-icon.mail class="size-5" />
            <span class="text-md-regular text-black">E-mail:</span>
          </div>
          <a href="mailto:kontakt@akorn.pl" class="text-sm-regular text-black">kontakt@akorn.pl</a>
        </div>

        {{-- Telefon --}}
        <div class="flex flex-col gap-2">
          <div class="flex items-center gap-1">
            <x-icon.phone class="size-5" />
            <span class="text-md-regular text-black">Telefon</span>
          </div>
          <a href="tel:+48884826068" class="text-sm-regular text-black">+48 884 826 068</a>
        </div>

        {{-- Adres --}}
        <div class="flex flex-col gap-2">
          <div class="flex items-center gap-1">
            <x-icon.location class="size-6" />
            <span class="text-md-regular text-black">Adres:</span>
          </div>
          <p class="text-sm-regular text-black">
            Micigózd ul. Częstochowska 36<br>26-065
          </p>
        </div>
      </div>
    </div>

    {{-- Prawa kolumna: formularz --}}
    <div class="flex flex-col gap-4 lg:flex-1">
      <form class="flex flex-col gap-4" data-kontakt-form>
        {{-- Honeypot — ukryte pole, boty je wypełnią --}}
        <div class="absolute -left-[9999px]" aria-hidden="true">
          <input type="text" name="website_url" tabindex="-1" autocomplete="off">
        </div>

        {{-- Imię --}}
        <div class="flex flex-col gap-2">
          <label class="text-sm-semibold text-[#8B8B8B]">Imie</label>
          <input
            type="text"
            name="name"
            placeholder="Twoje Imie"
            required
            minlength="2"
            class="w-full border border-[#E2E2E2] px-4 py-3 text-md-medium text-black placeholder:text-[#8B8B8B] bg-transparent outline-none"
          >
        </div>

        {{-- Email --}}
        <div class="flex flex-col gap-2">
          <label class="text-sm-semibold text-[#8B8B8B]">E-mail</label>
          <div class="flex items-center gap-2 border border-[#E2E2E2] px-4 py-3">
            <x-icon.mail class="size-5 text-[#8B8B8B] shrink-0" />
            <input
              type="email"
              name="email"
              placeholder="Twój adres e-mail"
              required
              class="flex-1 text-md-medium text-black placeholder:text-[#8B8B8B] bg-transparent border-none outline-none"
            >
          </div>
        </div>

        {{-- Wiadomość --}}
        <div class="flex flex-col gap-2">
          <label class="text-sm-semibold text-[#8B8B8B]">Wiadomość</label>
          <textarea
            name="message"
            placeholder="Wprowadź tekst swojej wiadomości.."
            rows="4"
            required
            minlength="10"
            maxlength="5000"
            class="w-full border border-[#E2E2E2] px-4 py-3 text-sm-regular text-black placeholder:text-[#8B8B8B] bg-transparent outline-none resize-none"
          ></textarea>
        </div>

        <p class="text-xs-regular text-black">
          Zapisując się, akceptujesz nasze <a href="{{ home_url('/regulamin') }}" class="underline">warunki korzystania z usługi</a>. Możesz wypisać się w każdej chwili. Zero spamu, tylko konkret.
        </p>

        {{-- Feedback --}}
        <p class="text-sm-medium hidden" data-feedback></p>

        <button
          type="submit"
          data-submit
          class="inline-flex items-center justify-center !no-underline cursor-pointer text-md-medium bg-orange-300 text-white px-6 py-4 w-full"
        >
          Wyślij
        </button>
      </form>
    </div>

  </div>
</section>
