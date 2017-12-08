<?php

/**
 * Return optimized heading
 *
 * If Yoast is installed, this will be the same as the title element. Otherwise,
 * it will use SEO Redux to generate or return a heading.
 *
 * @return string
 */
function cgit_seo_heading()
{
    if (defined('WPSEO_FILE')) {
        return wp_title(' | ', false);
    }

    return (new \Cgit\Seo\Optimizer)->getHeading();
}
