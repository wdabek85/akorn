@props([
  'variant' => 'default',
  'number' => '01',
  'title' => '',
  'description' => '',
  'icon' => [],
  'bgColor' => 'primary-400',
  'bgImageUrl' => '',
  'isLight' => false,
])

@php
  $bgClasses = match($bgColor) {
    'primary-400' => 'bg-primary-400',
    'blue-500'    => 'bg-blue-500',
    'blue-300'    => 'bg-blue-300',
    'blue-100'    => 'bg-blue-100',
    'gray'        => 'bg-[#F3F4F6]',
    default       => 'bg-primary-400',
  };
  $textColor = $isLight ? 'text-black' : 'text-white';
  $bgOpacity = $isLight ? 'opacity-20' : 'opacity-5';
@endphp

@if($variant === 'features')
  {{-- Wariant Features: numer na górze, ikona 48px, dłuższy opis --}}
  <div class="relative flex flex-col gap-28 min-h-[360px] p-6 flex-1 overflow-hidden {{ $bgClasses }}">
    @if($bgImageUrl)
      <div class="absolute inset-0 pointer-events-none {{ $bgOpacity }}">
        <img src="{{ $bgImageUrl }}" alt="" class="absolute w-full h-full object-cover" loading="lazy" aria-hidden="true">
      </div>
    @endif

    <span class="relative text-xl-semibold text-black">{{ $number }}</span>

    <div class="relative flex flex-col gap-6 flex-1">
      @if(!empty($icon['url'] ?? ($icon ?: '')))
        <img src="{{ is_array($icon) ? ($icon['url'] ?? '') : $icon }}" alt="{{ is_array($icon) ? ($icon['alt'] ?? '') : '' }}" class="size-12" loading="lazy">
      @endif

      <div class="flex flex-col gap-2">
        <h3 class="text-textsize-lg font-semibold leading-5 text-black">{{ $title }}</h3>
        @if($description)
          <p class="text-md-regular text-black">{{ $description }}</p>
        @endif
      </div>
    </div>
  </div>

@else
  {{-- Wariant Default: ikona na górze, duży numer na dole --}}
  <div class="relative flex flex-col justify-between h-[285px] overflow-hidden p-4 flex-1 {{ $bgClasses }}">
    @if($bgImageUrl)
      <div class="absolute inset-0 pointer-events-none {{ $bgOpacity }}">
        <img src="{{ $bgImageUrl }}" alt="" class="absolute w-full h-full object-cover" loading="lazy" aria-hidden="true">
      </div>
    @endif

    <div class="relative flex flex-col gap-12">
      @if(!empty($icon['url'] ?? ''))
        <img src="{{ is_array($icon) ? ($icon['url'] ?? '') : $icon }}" alt="{{ is_array($icon) ? ($icon['alt'] ?? '') : '' }}" class="size-10" loading="lazy">
      @endif

      <div class="flex flex-col gap-6">
        <h3 class="text-textsize-lg font-semibold leading-5 {{ $textColor }}">{{ $title }}</h3>
        @if($description)
          <p class="text-sm-regular {{ $textColor }}">{{ $description }}</p>
        @endif
      </div>
    </div>

    <span class="relative text-[120px] leading-[130px] font-normal {{ $textColor }}">{{ $number }}</span>
  </div>
@endif
