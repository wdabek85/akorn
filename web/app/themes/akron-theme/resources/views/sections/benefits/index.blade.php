@if(!empty($benefits['items']))
<section class="w-full bg-white" data-benefits>
  <div class="max-w-[1600px] mx-auto">

    {{-- Nagłówek --}}
    @if(!empty($benefits['label']) || !empty($benefits['heading']))
      <div class="px-4 py-4 lg:px-[80px] flex flex-col gap-4">
        @if(!empty($benefits['label']))
          <span class="text-xs-regular text-primary-400">{{ $benefits['label'] }}</span>
        @endif
        @if(!empty($benefits['heading']))
          <h2 class="display-md-medium text-primary-400">{{ $benefits['heading'] }}</h2>
        @endif
        @if(!empty($benefits['description']))
          <p class="text-md-regular text-black max-w-[600px]">{{ $benefits['description'] }}</p>
        @endif
      </div>
    @endif

    {{-- Karty --}}
    <div class="px-4 py-6 lg:px-[80px] lg:py-12 flex flex-col lg:flex-row">
      @foreach($benefits['items'] as $item)
        @include('sections.benefits.card', [
          'variant'    => $benefits['variant'] ?? 'default',
          'number'     => $item['number'],
          'title'      => $item['title'],
          'description'=> $item['description'],
          'icon'       => $item['icon'] ?? [],
          'bgColor'    => $item['bgColor'],
          'bgImageUrl' => $item['bgImageUrl'] ?? '',
          'isLight'    => $item['isLight'],
        ])
      @endforeach
    </div>

  </div>
</section>
@endif
