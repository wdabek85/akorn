@php
  $items = $data['items'] ?? [];
@endphp

@if(!empty($items))
<section class="w-full bg-white">
  <div class="max-w-[1600px] mx-auto px-4 py-6 lg:px-[80px] lg:py-12 flex flex-col gap-6">

    {{-- Nagłówek --}}
    @if(!empty($data['heading']))
      <div class="flex flex-col gap-4">
        <h2 class="text-[36px] leading-10 font-normal text-black">{{ $data['heading'] }}</h2>
        @if(!empty($data['description']))
          <p class="text-md-regular text-black max-w-[800px]">{{ $data['description'] }}</p>
        @endif
      </div>
    @endif

    {{-- Karty --}}
    <div class="flex flex-col lg:flex-row gap-4 py-6 lg:py-12">
      @foreach($items as $item)
        @include('sections.uslugi-grid.card', [
          'title' => $item['title'] ?? '',
          'description' => $item['description'] ?? '',
          'contains' => $item['contains'] ?? '',
          'href' => $item['link'] ?? '#',
          'variant' => $item['variant'] ?? 'white',
          'showNumber' => false,
        ])
      @endforeach
    </div>

  </div>
</section>
@endif
