<?php

/*

Plugin Name: Castlegate IT WP SEO Redux
Plugin URI: https://github.com/castlegateit/cgit-wp-seo-redux
Description: Even better ACF SEO fields for titles, headings, and descriptions.
Version: 1.0
Author: Castlegate IT
Author URI: https://www.castlegateit.co.uk/
License: MIT

*/

// Constants
define('CGIT_SEO_PLUGIN', __FILE__);

// Load classes and functions
require_once __DIR__ . '/classes/autoload.php';
require_once __DIR__ . '/functions.php';

// Initialization
Cgit\Seo\Plugin::getInstance();
