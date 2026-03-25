<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class PageHero extends Composer
{
    protected static $views = [
        'sections.page-hero.index',
    ];

    public function with(): array
    {
        $id = (int) get_queried_object_id();

        if (!$id) {
            $id = (int) get_the_ID();
        }

        $leftImg = get_field('page_hero_image_left', $id) ?: null;
        $rightImg = get_field('page_hero_image_right', $id) ?: null;

        return [
            'pageHero' => [
                'title'        => get_field('page_hero_title', $id) ?: get_the_title($id),
                'description'  => get_field('page_hero_description', $id) ?: '',
                'imageLeft'    => $this->resolveImage($leftImg),
                'captionLeft'  => get_field('page_hero_caption_left', $id) ?: '',
                'imageRight'   => $this->resolveImage($rightImg),
                'captionRight' => get_field('page_hero_caption_right', $id) ?: '',
            ],
        ];
    }

    private function resolveImage($img): array
    {
        if (is_array($img)) {
            return ['url' => $img['url'] ?? '', 'alt' => $img['alt'] ?? ''];
        }

        if (is_numeric($img)) {
            return [
                'url' => wp_get_attachment_image_url((int) $img, 'large') ?: '',
                'alt' => get_post_meta((int) $img, '_wp_attachment_image_alt', true) ?: '',
            ];
        }

        return ['url' => '', 'alt' => ''];
    }
}
