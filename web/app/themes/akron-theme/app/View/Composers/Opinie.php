<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Opinie extends Composer
{
    protected static $views = [
        'sections.opinie.index',
    ];

    public function with(): array
    {
        $itemsRaw = get_field('opinie_items', 'option') ?: [];

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
                'image'    => ['url' => $imgUrl, 'alt' => $imgAlt],
                'quote'    => $row['quote'] ?? '',
                'author'   => $row['author'] ?? '',
                'videoUrl' => $row['video_url'] ?? '',
            ];
        }, $itemsRaw);

        return [
            'opinie' => [
                'heading'     => get_field('opinie_heading', 'option') ?: '',
                'description' => get_field('opinie_description', 'option') ?: '',
                'items'       => $items,
            ],
        ];
    }
}
