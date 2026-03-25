@props([
  'title' => '',
  'description' => '',
  'href' => '#',
  'number' => '01',
  'variant' => 'white',
])

@php
  $isOrange = $variant === 'orange';
  $bg = $isOrange ? 'bg-orange-300' : 'bg-white shadow-[0px_1px_24px_0px_rgba(0,0,0,0.1)]';
  $textColor = $isOrange ? 'text-white' : 'text-black';
  $borderColor = $isOrange ? 'border-white/15' : 'border-blue-300/15';
  $numberColor = $isOrange ? 'text-white' : 'text-black';
@endphp

<div class="flex flex-col gap-4 justify-between h-[340px] overflow-hidden p-4 flex-1 {{ $bg }}">
  <div class="flex flex-col gap-12">
    {{-- Tytuł + ikona --}}
    <div class="flex items-start justify-between gap-6">
      <h3 class="text-textsize-lg font-semibold leading-5 {{ $textColor }}">{{ $title }}</h3>
      <x-icon.diamond class="size-10 shrink-0 {{ $isOrange ? '[&_rect]:fill-white/10 [&_path]:fill-white [&_path]:stroke-white' : '' }}" />
    </div>

    {{-- Opis --}}
    @if($description)
      <p class="text-sm-regular {{ $textColor }}">{{ $description }}</p>
    @endif
  </div>

  <div class="flex flex-col gap-0">
    {{-- CTA --}}
    <a
      href="{{ $href }}"
      class="flex items-center justify-center gap-2 border {{ $borderColor }} rounded p-2 text-sm-semibold {{ $textColor }} !no-underline hover:opacity-80 transition-opacity"
    >
      Dowiedz się więcej
      <x-icon.arrow-circle-right class="size-[18px]" />
    </a>

    {{-- Numer --}}
    <span class="text-[120px] leading-[130px] font-normal {{ $numberColor }}">{{ $number }}</span>
  </div>
</div>
