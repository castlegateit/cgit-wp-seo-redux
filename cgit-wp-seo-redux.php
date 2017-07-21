<?php

/*

Plugin Name: Castlegate IT WP SEO Redux
Plugin URI: https://github.com/castlegateit/cgit-wp-seo-redux
Description: Even better ACF SEO fields for titles, headings, and descriptions.
Version: 1.1
Author: Castlegate IT
Author URI: https://www.castlegateit.co.uk/
License: MIT

*/

if (!defined('ABSPATH')) {
    wp_die('Access denied');
}

define('CGIT_SEO_PLUGIN', __FILE__);

require_once __DIR__ . '/classes/autoload.php';
require_once __DIR__ . '/functions.php';

$plugin = new \Cgit\Seo\Plugin();

do_action('cgit_seo_redux_loaded');
