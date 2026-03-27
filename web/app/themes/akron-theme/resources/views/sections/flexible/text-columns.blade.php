@php
  $bg = ($data['bg'] ?? 'white') === 'gray' ? 'bg-[#F3F4F6]' : 'bg-white';
@endphp

<section class="w-full {{ $bg }}">
  <div class="max-w-[1600px] mx-auto px-4 py-12 lg:px-[80px] lg:py-12">
    <div class="flex flex-col gap-10 lg:flex-row lg:gap-[80px]">

      @if(!empty($data['heading']))
        <p class="display-xs-regular text-black lg:w-1/3 lg:shrink-0">
          {{ $data['heading'] }}
        </p>
      @endif

      @if(!empty($data['content']))
        <div class="flex flex-col gap-6 text-md-regular text-black lg:flex-1 [&_p]:mb-0">
          {!! $data['content'] !!}
        </div>
      @endif

    </div>
  </div>
</section>
