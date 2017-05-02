<?php

namespace Cgit\Seo;

class Plugin
{
    /**
     * Singleton instance
     *
     * @var self
     */
    private static $instance;

    /**
     * Optimizer instance
     *
     * @var Optimizer
     */
    public $optimizer;

    /**
     * Private constructor
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
     * Return the singleton instance
     *
     * @return self
     */
    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self;
        }

        return self::$instance;
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
