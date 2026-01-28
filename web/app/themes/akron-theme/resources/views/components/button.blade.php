@props([
  'variant' => 'primary',  // primary | secondary
  'size' => 'md',          // sm | md | lg
  'href' => null,          // jeśli podasz → renderuje <a>
])

@php
  $base = 'inline-flex items-center justify-center !no-underline cursor-pointer text-md-medium';

  $variants = [
    'primary' => 'bg-primary-300 text-white',
    'secondary' => 'bg-white text-slate-900 border border-slate-200',
  ];

  $sizes = [
    'sm' => 'px-3 py-2 gap-2',
    'md' => 'px-4 py-2 gap-2',
    'lg' => 'px-6 py-2 gap-3',
  ];

  $classes = trim($base.' '.($variants[$variant] ?? $variants['primary']).' '.($sizes[$size] ?? $sizes['md']));
  $tag = $href ? 'a' : 'button';
@endphp

<{{ $tag }}
  {{ $attributes->class($classes) }}
  @if($href)
    href="{{ $href }}"
  @else
    type="{{ $attributes->get('type', 'button') }}"
  @endif
>
  {{-- ikona lewa (opcjonalnie) --}}
  @isset($leftIcon)
    <span class="shrink-0 [&_svg]:size-4">
      {{ $leftIcon }}
    </span>
  @endisset

  <span>{{ $slot }}</span>

  {{-- ikona prawa (opcjonalnie) --}}
  @isset($rightIcon)
    <span class="shrink-0 [&_svg]:size-4">
      {{ $rightIcon }}
    </span>
  @endisset
</{{ $tag }}>
