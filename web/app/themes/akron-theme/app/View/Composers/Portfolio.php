<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Portfolio extends Composer
{
    protected static $views = [
        'sections.portfolio.index',
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

        $itemsRaw = get_field('portfolio_items', $id) ?: [];

        $items = array_map(function ($row) {
            $img = $row['image'] ?? null;
            $imgUrl = '';
            $imgAlt = '';

            if (is_array($img)) {
                $imgUrl = $img['url'] ?? '';
                $imgAlt = $img['alt'] ?? '';
            } elseif (is_numeric($img)) {
                $imgUrl = wp_get_attachment_image_url((int) $img, 'large') ?: '';
                $imgAlt = get_post_meta((int) $img, '_wp_attachment_image_alt', true) ?: '';
            }

            return [
                'title'       => $row['title'] ?? '',
                'description' => $row['description'] ?? '',
                'image'       => ['url' => $imgUrl, 'alt' => $imgAlt],
                'link'        => $row['link'] ?? '',
            ];
        }, $itemsRaw);

        return [
            'portfolio' => [
                'label'   => get_field('portfolio_label', $id) ?: 'Portfolio',
                'heading' => get_field('portfolio_heading', $id) ?: '',
                'items'   => $items,
            ],
        ];
    }
}
