<nav class="hidden lg:block">
  <ul class="flex items-center gap-6 text-sm-regular text-white">
    @foreach($menuItems as $item)
      @if(str_contains(strtolower($item['title']), 'usług') && !empty($menuServices))
        {{-- Item "Usługi" → mega menu trigger --}}
        <li data-mega-menu>
          <button
            type="button"
            class="flex items-center gap-1 hover:text-orange-300 transition-colors cursor-pointer {{ $item['isCurrent'] ? 'text-orange-300' : '' }}"
            data-mega-trigger
          >
            {{ $item['title'] }}
            <x-icon.chevron-down class="size-3 transition-transform" data-mega-chevron />
          </button>
        </li>
      @else
        <li>
          <a
            href="{{ $item['url'] }}"
            class="hover:text-orange-300 transition-colors {{ $item['isCurrent'] ? 'text-orange-300' : '' }}"
            @if($item['target'] !== '_self') target="{{ $item['target'] }}" rel="noopener noreferrer" @endif
          >
            {{ $item['title'] }}
          </a>
        </li>
      @endif
    @endforeach
  </ul>
</nav>
