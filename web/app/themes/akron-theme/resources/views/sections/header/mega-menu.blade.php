@if(!empty($menuServices))
{{-- Mega menu dropdown — full width under navbar --}}
<div
  class="hidden lg:block absolute left-0 right-0 top-full z-50 opacity-0 invisible transition-all duration-300"
  data-mega-dropdown
>
  <div class="max-w-[1600px] mx-auto px-[80px]">
    <div class="bg-white shadow-[0px_8px_40px_rgba(0,0,0,0.12)] flex overflow-hidden">

      {{-- Lewa kolumna: lista usług --}}
      <div class="flex flex-col w-[400px] p-6 gap-1 border-r border-black/5">
        <p class="text-xs-regular text-black/50 mb-2 uppercase tracking-wider">Nasze usługi</p>

        @foreach($menuServices as $service)
          <a href="{{ $service['url'] }}"
             class="group flex flex-col gap-0.5 px-3 py-2.5 transition-colors hover:bg-[#F3F4F6]"
             data-mega-item
             @if($service['image']) data-mega-img="{{ $service['image'] }}" @endif
             @if($service['description']) data-mega-desc="{{ $service['description'] }}" @endif
          >
            <span class="text-sm-semibold text-black group-hover:text-blue-300 transition-colors">{{ $service['title'] }}</span>
            @if($service['subtitle'])
              <span class="text-xs-regular text-black/50">{{ $service['subtitle'] }}</span>
            @endif
          </a>
        @endforeach

        <div class="mt-2 pt-2 border-t border-black/5">
          <a href="{{ home_url('/uslugi') }}" class="flex items-center gap-2 px-3 py-2 text-sm-medium text-blue-300 hover:underline">
            Wszystkie usługi
            <x-icon.chevron-right class="size-4" />
          </a>
        </div>
      </div>

      {{-- Prawa kolumna: opis + zdjęcie --}}
      <div class="flex-1 p-6 flex gap-6 items-start" data-mega-preview>
        <div class="flex-1 flex flex-col gap-3">
          <p class="text-sm-regular text-black/70 leading-5" data-mega-preview-desc>
            Najedź na usługę, żeby zobaczyć szczegóły.
          </p>
        </div>
        <div class="w-[320px] h-[200px] shrink-0 overflow-hidden bg-[#F3F4F6] rounded-sm">
          <img
            src=""
            alt=""
            class="w-full h-full object-cover transition-opacity duration-300 opacity-0"
            data-mega-preview-img
            loading="lazy"
          >
        </div>
      </div>

    </div>
  </div>
</div>
@endif
