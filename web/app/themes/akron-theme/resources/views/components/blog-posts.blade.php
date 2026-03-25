@props([
  'label' => 'Blog',
  'heading' => 'Wiedza, którą dzielimy się za darmo.',
  'description' => 'Praktyczne artykuły o web designie, e-commerce i SEO. Bez marketingowego bełkotu — tylko to, co realnie przydaje się w prowadzeniu biznesu online.',
  'category' => null,
  'count' => 3,
  'exclude' => [],
])

@php
  $args = [
    'post_type'      => 'post',
    'posts_per_page' => $count,
    'post_status'    => 'publish',
    'orderby'        => 'date',
    'order'          => 'DESC',
  ];

  if ($category) {
    $args['category_name'] = $category;
  }

  if (!empty($exclude)) {
    $args['post__not_in'] = (array) $exclude;
  }

  $posts = get_posts($args);
@endphp

@if(!empty($posts))
<section class="w-full bg-white">
  <div class="max-w-[1600px] mx-auto">

    {{-- Nagłówek --}}
    <div class="px-4 py-4 lg:px-[80px] flex flex-col gap-4 text-center">
      @if($label)
        <span class="text-xs-regular text-black">{{ $label }}</span>
      @endif
      @if($heading)
        <h2 class="text-[36px] leading-10 font-normal text-black">{{ $heading }}</h2>
      @endif
      @if($description)
        <p class="text-xs-regular text-black hidden lg:block">{{ $description }}</p>
      @endif
    </div>

    {{-- Posty --}}
    <div class="px-4 py-6 lg:px-[80px] lg:py-6 flex flex-col gap-[78px] lg:flex-row lg:justify-between lg:gap-6">
      @foreach($posts as $post)
        @php
          $thumbnail = get_the_post_thumbnail_url($post->ID, 'medium_large') ?: '';
          $categories = get_the_category($post->ID);
          $firstCat = !empty($categories) ? $categories[0]->name : '';
          $wordCount = str_word_count(strip_tags($post->post_content));
          $readTime = max(1, round($wordCount / 200));
          $excerpt = has_excerpt($post->ID)
            ? get_the_excerpt($post->ID)
            : wp_trim_words(strip_tags($post->post_content), 20, '…');
        @endphp

        <article class="flex flex-col gap-6 flex-1">
          {{-- Thumbnail --}}
          <a href="{{ get_permalink($post->ID) }}" class="block aspect-[3/2] overflow-hidden bg-gray-100">
            @if($thumbnail)
              <img
                src="{{ $thumbnail }}"
                alt="{{ get_the_title($post->ID) }}"
                class="w-full h-full object-cover"
                loading="lazy"
              >
            @endif
          </a>

          {{-- Info --}}
          <div class="flex flex-col gap-4">
            <div class="flex items-center gap-4">
              @if($firstCat)
                <span class="border border-black/15 rounded-md px-2.5 py-1 text-md-semibold text-black">
                  {{ $firstCat }}
                </span>
              @endif
              <span class="text-md-semibold text-black">{{ $readTime }} min czytania</span>
            </div>

            {{-- Tytuł + excerpt --}}
            <div class="flex flex-col gap-2">
              <a href="{{ get_permalink($post->ID) }}" class="display-xs-bold text-black !no-underline hover:underline">
                {{ get_the_title($post->ID) }}
              </a>
              <p class="text-md-regular text-black">{{ $excerpt }}</p>
            </div>
          </div>

          {{-- Link --}}
          <a href="{{ get_permalink($post->ID) }}" class="inline-flex items-center gap-2 text-md-regular text-black !no-underline hover:underline">
            Czytaj więcej
            <x-icon.chevron-right class="size-5" />
          </a>
        </article>
      @endforeach
    </div>

  </div>
</section>
@endif
