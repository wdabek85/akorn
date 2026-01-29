@dump($hero ?? 'NO HERO FROM COMPOSER')

<section class="hero" data-hero>
    <div class="mx-auto max-w-7xl px-5 lg:px-10 py-10 lg:py-16">
      <div class="grid gap-8 lg:grid-cols-2 lg:items-center">
  
        <div>
          @if(!empty($hero['tagText']))
            <p class="text-sm-semibold text-orange-300">
              {{ $hero['tagText'] }}
            </p>
          @endif
  
          @if(!empty($hero['title']))
            <h1 class="mt-2 display-md-bold text-white">
              {{ $hero['title'] }}
            </h1>
          @endif
  
          @if(!empty($hero['text']))
            <p class="mt-4 text-white/80 text-md-regular">
              {{ $hero['text'] }}
            </p>
          @endif
        </div>
  
        <div class="lg:justify-self-end">
          @if(!empty($hero['image']))
            @php
              // ACF image może być tablicą (url/alt) albo ID – obsługujemy oba
              $imgUrl = is_array($hero['image']) ? ($hero['image']['url'] ?? '') : '';
              $imgAlt = is_array($hero['image']) ? ($hero['image']['alt'] ?? '') : '';
  
              if (!$imgUrl && is_numeric($hero['image'])) {
                $imgUrl = wp_get_attachment_image_url((int) $hero['image'], 'full') ?: '';
                $imgAlt = get_post_meta((int) $hero['image'], '_wp_attachment_image_alt', true) ?: '';
              }
            @endphp
  
            @if($imgUrl)
              <img
                src="{{ $imgUrl }}"
                alt="{{ $imgAlt }}"
                class="w-full max-w-lg rounded-xl"
                loading="eager"
              >
            @endif
          @endif
        </div>
  
      </div>
    </div>
  </section>
  