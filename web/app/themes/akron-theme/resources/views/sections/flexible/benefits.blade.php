@php
  $variant = $data['variant'] ?? 'default';

  $items = collect($data['items'] ?? [])->map(function ($row, $index) use ($variant) {
      $icon = $row['icon'] ?? null;
      $iconUrl = is_array($icon) ? ($icon['url'] ?? '') : '';
      $iconAlt = is_array($icon) ? ($icon['alt'] ?? '') : '';

      $bgImg = $row['bg_image'] ?? null;
      $bgImgUrl = is_array($bgImg) ? ($bgImg['url'] ?? '') : '';

      $bgColor = $row['bg_color'] ?? ($variant === 'features'
          ? ($index % 2 === 0 ? 'blue-100' : 'gray')
          : 'primary-400');

      return [
          'title'       => $row['title'] ?? '',
          'description' => $row['description'] ?? '',
          'icon'        => ['url' => $iconUrl, 'alt' => $iconAlt],
          'bgColor'     => $bgColor,
          'bgImageUrl'  => $bgImgUrl,
          'number'      => str_pad($index + 1, 2, '0', STR_PAD_LEFT),
          'isLight'     => in_array($bgColor, ['gray', 'blue-100']),
      ];
  })->all();

  $benefits = [
      'label'       => $data['label'] ?? '',
      'heading'     => $data['heading'] ?? '',
      'description' => $data['description'] ?? '',
      'variant'     => $variant,
      'items'       => $items,
  ];
@endphp

@include('sections.benefits.index')
