<?php

/**
 * Return optimized heading
 *
 * @return string
 */
function cgit_seo_heading()
{
    $plugin = Cgit\Seo\Plugin::getInstance();
    return $plugin->optimizer->getHeading();
}
