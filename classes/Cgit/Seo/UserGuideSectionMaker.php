<?php

namespace Cgit\Seo;

class UserGuideSectionMaker
{
    /**
     * Constructor
     *
     * @return void
     */
    public function __construct()
    {
        add_filter('cgit_user_guide_sections', [$this, 'register']);
    }

    /**
     * Register user guide section
     *
     * @param array $sections
     * @return array
     */
    public function register($sections)
    {
        $sections['cgit-wp-seo'] = [
            'heading' => 'SEO',
            'content' => Renderer::render('user-guide'),
            'order' => 100,
        ];

        return $sections;
    }
}
