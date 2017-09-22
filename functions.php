<?php

/**
 * Return optimized heading
 *
 * @return string
 */
function cgit_seo_heading()
{
    return (new \Cgit\Seo\Optimizer)->getHeading();
}
