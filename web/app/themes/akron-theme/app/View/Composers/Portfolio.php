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
        // Get category filter from view data (passed from FC or template)
        $category = $this->data->get('portfolioCategory', '');
        $count = $this->data->get('portfolioCount', 3);

        $args = [
            'post_type'      => 'portfolio',
            'posts_per_page' => $count,
            'post_status'    => 'publish',
            'orderby'        => 'date',
            'order'          => 'DESC',
        ];

        if ($category) {
            $args['tax_query'] = [[
                'taxonomy' => 'portfolio_category',
                'field'    => 'slug',
                'terms'    => $category,
            ]];
        }

        $posts = get_posts($args);

        $items = array_map(function ($post) {
            $imgUrl = get_the_post_thumbnail_url($post->ID, 'large') ?: '';
            $imgAlt = get_post_meta(get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt', true) ?: '';

            $excerpt = has_excerpt($post->ID)
                ? get_the_excerpt($post->ID)
                : wp_trim_words(strip_tags($post->post_content), 30, '…');

            return [
                'title'       => html_entity_decode(get_the_title($post->ID)),
                'description' => html_entity_decode($excerpt),
                'image'       => ['url' => $imgUrl, 'alt' => $imgAlt],
                'link'        => get_permalink($post->ID),
            ];
        }, $posts);

        return [
            'portfolio' => [
                'label'   => 'Portfolio',
                'heading' => 'Realizacje, które pokazują, jak pracujemy.',
                'items'   => $items,
            ],
        ];
    }
}
