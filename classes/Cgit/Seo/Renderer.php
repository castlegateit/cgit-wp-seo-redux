<?php

namespace Cgit\Seo;

class Renderer
{
    /**
     * Does a string start with a string?
     *
     * @param string $str
     * @param string $sub
     * @return boolean
     */
    public static function startsWith($str, $sub)
    {
        return substr($str, 0, strlen($sub)) === $sub;
    }

    /**
     * Does a string end with a string?
     *
     * @param string $str
     * @param string $sub
     * @return boolean
     */
    public static function endsWith($str, $sub)
    {
        return substr($str, strlen($str) - strlen($sub)) === $sub;
    }

    /**
     * Render a view
     *
     * @return string
     */
    public static function render($name)
    {
        $path = dirname(CGIT_SEO_PLUGIN) . '/views/' . $name;
        $ext = '.php';

        if (!self::endsWith($path, $ext)) {
            $path .= $ext;
        }

        if (!file_exists($path)) {
            return trigger_error('View not found: ' . $path);
        }

        ob_start();

        include $path;

        return ob_get_clean();
    }
}
