<?php

namespace Cgit\Seo;

class Plugin
{
    /**
     * Optimizer instance
     *
     * @var Optimizer
     */
    public $optimizer;

    /**
     * Constructor
     *
     * @return void
     */
    private function __construct()
    {
        register_activation_hook(CGIT_SEO_PLUGIN, [$this, 'activate']);

        new CustomFieldMaker;
        new OptionsPageMaker;
        new UserGuideSectionMaker;

        $this->optimizer = new Optimizer;
    }

    /**
     * Activation
     *
     * @return void
     */
    public function activate()
    {
        if (!function_exists('acf_add_local_field_group')) {
            wp_die(Renderer::render('error-no-acf'));
        }
    }
}
