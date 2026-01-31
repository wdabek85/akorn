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

        // Group field "procenty"
        $procenty = get_field('procenty', $id) ?: [];

        // subfield z groupy
        $bg = $procenty['bg-procent'] ?? null;

        // URL + ALT niezależnie czy ACF zwraca array czy ID
        $bgUrl = is_array($bg) ? ($bg['url'] ?? '') : '';
        $bgAlt = is_array($bg) ? ($bg['alt'] ?? '') : '';

        if (!$bgUrl && is_numeric($bg)) {
            $bgUrl = wp_get_attachment_image_url((int) $bg, 'full') ?: '';
            $bgAlt = get_post_meta((int) $bg, '_wp_attachment_image_alt', true) ?: '';
        }

        /**
         * Repeater "benefits"
         * UWAGA: u Ciebie "benefits" to etykieta, a NAZWA POLA repeatera to "number"
         */
        $benefitsRaw = get_field('number', $id) ?: [];

        $benefits = array_map(function ($row) {
            // subfields: number, icon, benefits-tiitle, benefits-text

            $icon = $row['icon'] ?? null;

            $iconUrl = is_array($icon) ? ($icon['url'] ?? '') : '';
            $iconAlt = is_array($icon) ? ($icon['alt'] ?? '') : '';

            if (!$iconUrl && is_numeric($icon)) {
                $iconUrl = wp_get_attachment_image_url((int) $icon, 'full') ?: '';
                $iconAlt = get_post_meta((int) $icon, '_wp_attachment_image_alt', true) ?: '';
            }

            return [
                'number' => $row['number'] ?? '',
                'title'  => $row['benefits-tittle'] ?? '', // (u Ciebie jest literówka "tiitle")
                'text'   => $row['benefits-text'] ?? '',
                'icon'   => [
                    'url' => $iconUrl,
                    'alt' => $iconAlt,
                ],
            ];
        }, $benefitsRaw);

        $below = [
            'text'     => $procenty['text-under-procent'] ?? '',
            'bgUrl'    => $bgUrl,
            'bgAlt'    => $bgAlt,
            'benefits' => $benefits,
        ];

        return [
            'hero' => [
                'title'   => get_field('hero-tiitle', $id) ?: '',
                'text'    => get_field('hero-desc', $id) ?: '',
                'tagText' => get_field('hero-tag-text', $id) ?: '',
                'image'   => get_field('hero-img', $id) ?: null,
                'below'   => $below,
            ],
        ];
    }
}
