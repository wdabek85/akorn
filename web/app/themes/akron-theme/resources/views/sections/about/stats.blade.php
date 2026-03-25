@if(!empty($aboutStats))
<section class="w-full bg-white">
  <div class="max-w-[1600px] mx-auto px-4 py-8 lg:px-[80px] lg:py-12">
    <div class="flex flex-col gap-6 lg:flex-row lg:flex-wrap lg:gap-x-4 lg:gap-y-6">
      @foreach($aboutStats as $stat)
        <div class="flex flex-col gap-1 items-center text-center lg:flex-1 lg:min-w-[380px]">
          <span class="text-xl-semibold text-black">{{ $stat['value'] }}</span>
          <span class="text-xl-semibold text-black">{{ $stat['label'] }}</span>
          @if(!empty($stat['link']))
            <a href="{{ $stat['link'] }}" class="text-[10px] leading-3 text-black underline">
              Przeczytaj więcej
            </a>
          @endif
        </div>
      @endforeach
    </div>
  </div>
</section>
@endif
