<?php

/**
 * Return optimized heading
 *
 * @return string
 */
function cgit_seo_heading()
{
    return (Cgit\Seo\Plugin::getInstance())->optimizer->getHeading();
}
