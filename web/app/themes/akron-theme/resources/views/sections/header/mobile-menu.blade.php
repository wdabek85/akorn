{{-- overlay --}}
<div id="mobile-menu-overlay" class="fixed inset-0 z-50 hidden bg-black/50" data-menu-close></div>

{{-- drawer --}}
<aside
  id="mobile-menu"
  class="fixed right-0 top-0 z-50 h-full w-full translate-x-full bg-white transition-transform duration-200 overflow-y-auto"
  aria-hidden="true"
>
  <div class="flex items-center justify-between border-b px-4 py-4">
    <span class="font-semibold">Menu</span>
    <button type="button" class="h-10 w-10 cursor-pointer" data-menu-close aria-label="Zamknij menu">✕</button>
  </div>

  <nav class="p-4">
    <ul class="flex flex-col gap-1">
      @foreach($menuItems as $item)
        @if(str_contains(strtolower($item['title']), 'usług') && !empty($menuServices))
          {{-- Item "Usługi" → akordeon --}}
          <li data-mobile-accordion>
            <button
              type="button"
              class="flex items-center justify-between w-full px-3 py-3 text-md-medium text-black hover:bg-[#F3F4F6] transition-colors cursor-pointer"
              data-mobile-accordion-trigger
            >
              {{ $item['title'] }}
              <x-icon.chevron-down class="size-4 transition-transform" data-mobile-accordion-chevron />
            </button>

            <div class="overflow-hidden transition-all duration-300" style="height: 0" data-mobile-accordion-content>
              <ul class="flex flex-col gap-0.5 pl-4 pb-2">
                @foreach($menuServices as $service)
                  <li>
                    <a href="{{ $service['url'] }}" class="block px-3 py-2 text-sm-regular text-black hover:text-blue-300 transition-colors">
                      {{ $service['title'] }}
                    </a>
                  </li>
                @endforeach
                <li class="border-t border-black/5 mt-1 pt-1">
                  <a href="{{ $item['url'] }}" class="block px-3 py-2 text-sm-medium text-blue-300">
                    Wszystkie usługi →
                  </a>
                </li>
              </ul>
            </div>
          </li>
        @else
          <li>
            <a
              href="{{ $item['url'] }}"
              class="block px-3 py-3 text-md-medium text-black hover:bg-[#F3F4F6] transition-colors"
              @if($item['target'] !== '_self') target="{{ $item['target'] }}" rel="noopener noreferrer" @endif
            >
              {{ $item['title'] }}
            </a>
          </li>
        @endif
      @endforeach
    </ul>

    {{-- CTA --}}
    <div class="mt-4 pt-4 border-t border-black/5">
      <x-button href="{{ home_url('/kontakt') }}" variant="primary" size="lg" class="!bg-orange-300 w-full">
        Darmowa wycena
      </x-button>
    </div>
  </nav>
</aside>
