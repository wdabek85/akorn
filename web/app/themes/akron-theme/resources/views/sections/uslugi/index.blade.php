<section class="w-full bg-white" data-uslugi>
  <div class="max-w-[1600px] mx-auto px-4 py-6 lg:px-[80px] lg:py-12 flex flex-col gap-10 lg:flex-row lg:gap-[80px] lg:items-center">

    {{-- Lewa kolumna: nagłówek + opis + CTA --}}
    <div class="flex flex-col gap-8 lg:flex-1 lg:gap-14">
      <div class="flex flex-col gap-4">
        @if(!empty($uslugi['heading']))
          <h2 class="display-md-medium text-black">
            {{ $uslugi['heading'] }}
          </h2>
        @endif

        @if(!empty($uslugi['description']))
          <p class="text-md-regular text-black">
            {{ $uslugi['description'] }}
          </p>
        @endif
      </div>

      @if(!empty($uslugi['ctaText']))
        <x-button
          href="{{ $uslugi['ctaLink'] }}"
          variant="primary"
          size="lg"
          class="!bg-blue-300 w-full lg:w-auto lg:self-start"
        >
          {{ $uslugi['ctaText'] }}
          <x-slot:rightIcon>
            <x-icon.arrow-circle-right />
          </x-slot:rightIcon>
        </x-button>
      @endif
    </div>

    {{-- Prawa kolumna: akordeon usług --}}
    @if(!empty($uslugi['items']))
      <div class="flex flex-col lg:flex-1" data-accordion>
        @foreach($uslugi['items'] as $index => $item)
          <div
            class="border-b group"
            data-accordion-item
            @if($index === 1) data-accordion-open @endif
          >
            <button
              type="button"
              class="flex w-full items-center justify-between py-6 text-left"
              data-accordion-trigger
              aria-expanded="{{ $index === 1 ? 'true' : 'false' }}"
            >
              <span class="display-xs-medium lg:display-sm-medium text-black transition-colors group-[&[data-accordion-open]]:text-blue-300">
                {{ $item['title'] }}
              </span>
              <span class="shrink-0 ml-4 size-10 lg:size-[54px] flex items-center justify-center text-black transition-colors group-[&[data-accordion-open]]:text-blue-300">
                <x-icon.chevron-right class="size-6 lg:size-8 block group-[&[data-accordion-open]]:hidden" />
                <x-icon.chevron-up class="size-6 lg:size-8 hidden group-[&[data-accordion-open]]:block" />
              </span>
            </button>

            <div
              class="overflow-hidden transition-all duration-300"
              data-accordion-content
              @if($index !== 1) style="height: 0" @endif
            >
              @if(!empty($item['description']))
                <p class="text-md-regular text-black pb-6">
                  {{ $item['description'] }}
                </p>
              @endif
            </div>
          </div>
        @endforeach
      </div>
    @endif

  </div>
</section>
