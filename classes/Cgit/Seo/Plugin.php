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
    public function __construct()
    {
        register_activation_hook(CGIT_SEO_PLUGIN, [$this, 'activate']);
        add_action('plugins_loaded', [$this, 'init']);
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

    /**
     * Initialization
     *
     * If Yoast is already installed, we should leave it alone. Therefore, this
     * has to run after plugins have loaded.
     */
    public function init()
    {
        if ($this->hasYoast()) {
            return;
        }

        new CustomFieldMaker;
        new OptionsPageMaker;
        new UserGuideSectionMaker;

        $this->optimizer = new Optimizer;
    }

    /**
     * Is Yoast installed?
     *
     * @return boolean
     */
    private function hasYoast()
    {
        return defined('WPSEO_FILE');
    }
}
