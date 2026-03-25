@if(!empty($flexSections))
  @foreach($flexSections as $section)
    @switch($section['acf_fc_layout'])

      @case('benefits')
        @include('sections.flexible.benefits', ['data' => $section])
        @break

      @case('opinie')
        @include('sections.opinie.index')
        @break

      @case('cta')
        @include('sections.cta.index')
        @break

      @case('kontakt')
        @include('sections.kontakt.index')
        @break

      @case('newsletter')
        @include('sections.newsletter.index')
        @break

      @case('proces')
        @include('sections.proces.index')
        @break

      @case('uslugi_grid')
        @include('sections.uslugi-grid.index')
        @break

      @case('highlights')
        @include('sections.highlights.index', [
          'label' => $section['label'] ?? '',
          'heading' => $section['heading'] ?? '',
          'image' => $section['image'] ?? '',
          'imageCaption' => $section['image_caption'] ?? '',
          'items' => collect($section['items'] ?? [])->map(fn($row) => [
            'title' => $row['title'] ?? '',
            'description' => $row['description'] ?? '',
          ])->all(),
        ])
        @break

      @case('platforms')
        @include('sections.platforms.index', [
          'heading' => $section['heading'] ?? '',
          'description' => $section['description'] ?? '',
          'items' => collect($section['items'] ?? [])->map(fn($row) => [
            'logo' => $row['logo'] ?? '',
            'title' => $row['title'] ?? '',
            'link' => $row['link'] ?? '',
          ])->all(),
        ])
        @break

      @case('stats')
        @include('sections.stats.index', [
          'heading' => $section['heading'] ?? '',
          'description' => $section['description'] ?? '',
          'ctaText' => $section['cta_text'] ?? '',
          'ctaLink' => $section['cta_link'] ?? '',
          'items' => collect($section['items'] ?? [])->map(fn($row) => [
            'value' => $row['value'] ?? '',
            'label' => $row['label'] ?? '',
            'source' => $row['source'] ?? '',
            'bgImage' => $row['bg_image'] ?? null,
          ])->all(),
        ])
        @break

      @case('blog')
        <x-blog-posts
          :label="$section['label'] ?? 'Blog'"
          :heading="$section['heading'] ?? 'Wiedza, którą dzielimy się za darmo.'"
          :category="$section['category'] ?? null"
          :count="(int) ($section['count'] ?? 3)"
        />
        @break

    @endswitch
  @endforeach
@endif
