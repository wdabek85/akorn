<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Navigation extends Composer
{
    protected static $views = [
        'sections.header.desktop-menu',
        'sections.header.mega-menu',
        'sections.header.mobile-menu',
    ];

    public function with(): array
    {
        // Mega menu usługi z ACF Options
        $rawItems = get_field('mega_menu_items', 'option') ?: [];

        $menuServices = array_map(fn ($row) => [
            'title'       => $row['title'] ?? '',
            'subtitle'    => $row['subtitle'] ?? '',
            'description' => $row['description'] ?? '',
            'url'         => $row['url'] ?? '#',
            'image'       => $row['image'] ?? '',
        ], $rawItems);

        // Główne menu z WP Admin (Wygląd → Menu)
        $menuItems = [];
        $locations = get_nav_menu_locations();
        $menuId = $locations['primary_navigation'] ?? 0;

        if ($menuId) {
            $wpItems = wp_get_nav_menu_items($menuId) ?: [];

            // Tylko top-level (parent = 0)
            foreach ($wpItems as $item) {
                if ((int) $item->menu_item_parent === 0) {
                    $menuItems[] = [
                        'title'   => $item->title,
                        'url'     => $item->url,
                        'classes' => implode(' ', array_filter($item->classes ?? [])),
                        'target'  => $item->target ?: '_self',
                        'isCurrent' => in_array('current-menu-item', $item->classes ?? []),
                    ];
                }
            }
        }

        return [
            'menuServices' => $menuServices,
            'menuItems'    => $menuItems,
        ];
    }
}
