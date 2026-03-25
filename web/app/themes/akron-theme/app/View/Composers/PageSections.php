<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class PageSections extends Composer
{
    protected static $views = [
        'sections.flexible.index',
    ];

    public function with(): array
    {
        $id = (int) get_queried_object_id();

        if (!$id) {
            $id = (int) get_the_ID();
        }

        $sections = get_field('page_sections', $id);

        // Ensure we always have an array of arrays
        if (!is_array($sections)) {
            $sections = [];
        }

        return [
            'flexSections' => array_filter($sections, 'is_array'),
        ];
    }
}
