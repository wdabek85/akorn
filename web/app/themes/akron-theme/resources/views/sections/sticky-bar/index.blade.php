@props([
  'title' => '',
  'subtitle' => '',
])

{{-- Desktop: sticky pod navbarem --}}
<div
  class="hidden fixed left-0 right-0 z-30 bg-white border-b border-black/10 transition-all duration-300 -translate-y-full opacity-0"
  data-sticky-bar
>
  <div class="max-w-[1600px] mx-auto px-4 py-3 lg:px-[80px] flex items-center justify-between gap-4">
    <div class="flex items-center gap-3 min-w-0">
      <span class="text-md-medium text-black truncate">{{ $title }}</span>
      @if($subtitle)
        <span class="text-sm-regular text-black/50 truncate hidden xl:inline">{{ $subtitle }}</span>
      @endif
    </div>

    <div class="flex items-center gap-2 shrink-0">
      <a
        href="{{ home_url('/kontakt') }}"
        class="inline-flex items-center justify-center text-sm-semibold bg-orange-300 text-white px-4 py-2 !no-underline hover:opacity-90 transition-opacity"
      >
        Umów konsultację
      </a>
      <a
        href="{{ home_url('/brief') }}"
        class="inline-flex items-center justify-center text-sm-semibold bg-white text-black border border-black/15 px-4 py-2 !no-underline hover:bg-[#F3F4F6] transition-colors"
      >
        Wypełnij brief
      </a>
    </div>
  </div>
</div>

{{-- Mobile: fixed na dole ekranu --}}
<div
  class="lg:hidden fixed bottom-0 left-0 right-0 z-30 bg-white border-t border-black/10 transition-all duration-300 translate-y-full opacity-0"
  data-sticky-bar-mobile
>
  <div class="px-4 py-3">
    <a
      href="{{ home_url('/brief') }}"
      class="flex items-center justify-center w-full text-sm-semibold bg-blue-300 text-white px-4 py-3 !no-underline hover:opacity-90 transition-opacity"
    >
      Wypełnij brief — {{ $title }}
    </a>
  </div>
</div>
