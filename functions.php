<?php

/**
 * Return optimized heading
 *
 * @return string
 */
function cgit_seo_heading()
{
    $plugin = new Cgit\Seo\Plugin();
    return $plugin->optimizer->getHeading();
}
