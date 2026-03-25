<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Uslugi extends Composer
{
    protected static $views = [
        'sections.uslugi.index',
    ];

    public function with(): array
    {
        $id = (int) get_queried_object_id();

        if (!$id && is_front_page()) {
            $id = (int) get_option('page_on_front');
        }

        if (!$id) {
            $id = (int) get_the_ID();
        }

        $itemsRaw = get_field('uslugi_items', $id) ?: [];

        $items = array_map(fn ($row) => [
            'title'       => $row['title'] ?? '',
            'description' => $row['description'] ?? '',
            'link'        => $row['link'] ?? '',
        ], $itemsRaw);

        return [
            'uslugi' => [
                'heading'     => get_field('uslugi_heading', $id) ?: '',
                'description' => get_field('uslugi_description', $id) ?: '',
                'ctaText'     => get_field('uslugi_cta_text', $id) ?: '',
                'ctaLink'     => get_field('uslugi_cta_link', $id) ?: home_url('/kontakt'),
                'items'       => $items,
            ],
        ];
    }
}
