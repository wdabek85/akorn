<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Hero extends Composer
{
    protected static $views = [
        'sections.hero.index',
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

        // Hero image — obsługa array i ID
        $rawImage = get_field('hero-img', $id) ?: null;
        $imgUrl = '';
        $imgAlt = '';

        if (is_array($rawImage)) {
            $imgUrl = $rawImage['url'] ?? '';
            $imgAlt = $rawImage['alt'] ?? '';
        } elseif (is_numeric($rawImage)) {
            $imgUrl = wp_get_attachment_image_url((int) $rawImage, 'full') ?: '';
            $imgAlt = get_post_meta((int) $rawImage, '_wp_attachment_image_alt', true) ?: '';
        }

        return [
            'hero' => [
                'title'   => get_field('hero-tiitle', $id) ?: '',
                'text'    => get_field('hero-desc', $id) ?: '',
                'tagText' => get_field('hero-tag-text', $id) ?: '',
                'image'   => [
                    'url' => $imgUrl,
                    'alt' => $imgAlt,
                ],
            ],
        ];
    }
}
