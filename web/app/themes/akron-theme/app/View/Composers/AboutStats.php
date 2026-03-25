<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class AboutStats extends Composer
{
    protected static $views = [
        'sections.about.stats',
    ];

    public function with(): array
    {
        $id = (int) get_queried_object_id();

        if (!$id) {
            $id = (int) get_the_ID();
        }

        $rawItems = get_field('about_stats_items', $id) ?: [];

        $items = array_map(fn ($row) => [
            'value' => $row['value'] ?? '',
            'label' => $row['label'] ?? '',
            'link'  => $row['link'] ?? '',
        ], $rawItems);

        return [
            'aboutStats' => $items,
        ];
    }
}
