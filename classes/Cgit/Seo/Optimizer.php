<?php

namespace Cgit\Seo;

class Optimizer
{
    /**
     * SEO data source
     *
     * The ID of the post or page or the name of the options page that will be
     * used as the source for the SEO field data.
     *
     * @var mixed
     */
    private $sourceId = 0;

    /**
     * SEO data source field name prefix
     *
     * @var string
     */
    private $prefix = '';

    /**
     * Constructor
     *
     * @return void
     */
    public function __construct()
    {
        // The "wp" action runs after "posts_selection", so after the main query
        // has run, but before the header is generated in "get_header".
        // Therefore, conditional functions should work.
        add_action('wp', [$this, 'init']);
    }

    /**
     * Initialization
     *
     * This is separate from the constructor because it can only be run after
     * the main query is run in order to use the WordPress conditional query
     * functions.
     *
     * @return void
     */
    public function init()
    {
        $this->determineDataSource();

        // If there is not source for the SEO data, stop here and let WordPress
        // handle the title and description.
        if (!$this->sourceId) {
            return;
        }

        // Edit the title using the WordPress filter and add the description to
        // the document head.
        add_filter('pre_get_document_title', [$this, 'optimizeTitle']);
        add_action('wp_head', [$this, 'optimizeDescription']);
    }

    /**
     * Determine SEO data source
     *
     * Work out what we are looking at and adjust the source ID and field name
     * prefix accordingly. Single post or taxonomy term fields do not have a
     * field name prefix. Options page fields have a prefix based on the post
     * type or taxonomy name.
     *
     * @return void
     */
    private function determineDataSource()
    {
        if (is_page() || is_singular()) {
            $this->sourceId = get_post()->ID;

            return;
        }

        if (is_home() || is_post_type_archive()) {
            $this->sourceId = 'seo_options';
            $this->prefix = get_post_type() . '_';

            return;
        }

        if (is_category() || is_tag() || is_tax()) {
            $this->sourceId = 'term_' . get_queried_object()->term_id;

            return;
        }
    }

    /**
     * Optimize the page title
     *
     * Should be used with the pre_get_document_title filter to edit the page
     * title if a relevant SEO title exists.
     *
     * @return string
     */
    public function optimizeTitle($title)
    {
        $field = $this->prefix . 'seo_title';

        return get_field($field, $this->sourceId) ?: $title;
    }

    /**
     * Optimize the page description
     *
     * Should be run during the "wp_head" action to inject a meta description
     * element into the document head.
     *
     * @return void
     */
    public function optimizeDescription()
    {
        $field = $this->prefix . 'seo_description';
        $seo_description = get_field($field, $this->sourceId);

        if (!$seo_description) {
            return;
        }

        echo '<meta name="description" content="' . $seo_description . '" />';
    }

    /**
     * Return optimized or default page heading
     *
     * @return string
     */
    public function getHeading()
    {
        $field = $this->prefix . 'seo_heading';
        $seo_heading = get_field($field, $this->sourceId);

        if ($seo_heading) {
            return $seo_heading;
        }

        if (is_page() || is_singular()) {
            return get_the_title();
        }

        if (is_archive()) {
            return get_the_archive_title();
        }

        return get_bloginfo('name');
    }
}
