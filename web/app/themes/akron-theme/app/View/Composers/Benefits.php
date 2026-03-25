<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Benefits extends Composer
{
    protected static $views = [
        'sections.benefits.index',
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

        $itemsRaw = get_field('benefits_items', $id) ?: [];

        $items = array_map(function ($row, $index) {
            // Icon
            $icon = $row['icon'] ?? null;
            $iconUrl = is_array($icon) ? ($icon['url'] ?? '') : '';
            $iconAlt = is_array($icon) ? ($icon['alt'] ?? '') : '';
            if (!$iconUrl && is_numeric($icon)) {
                $iconUrl = wp_get_attachment_image_url((int) $icon, 'thumbnail') ?: '';
                $iconAlt = get_post_meta((int) $icon, '_wp_attachment_image_alt', true) ?: '';
            }

            // Decorative bg image
            $bgImg = $row['bg_image'] ?? null;
            $bgImgUrl = is_array($bgImg) ? ($bgImg['url'] ?? '') : '';
            if (!$bgImgUrl && is_numeric($bgImg)) {
                $bgImgUrl = wp_get_attachment_image_url((int) $bgImg, 'medium') ?: '';
            }

            $bgColor = $row['bg_color'] ?? 'primary-400';

            return [
                'title'       => $row['title'] ?? '',
                'description' => $row['description'] ?? '',
                'icon'        => ['url' => $iconUrl, 'alt' => $iconAlt],
                'bgColor'     => $bgColor,
                'bgImageUrl'  => $bgImgUrl,
                'number'      => str_pad($index + 1, 2, '0', STR_PAD_LEFT),
                'isLight'     => $bgColor === 'gray',
            ];
        }, $itemsRaw, array_keys($itemsRaw));

        return [
            'benefits' => [
                'label'   => get_field('benefits_label', $id) ?: '',
                'heading' => get_field('benefits_heading', $id) ?: '',
                'items'   => $items,
            ],
        ];
    }
}
