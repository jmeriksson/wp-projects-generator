<?php
/**
 * @package ProjectsGenerator
 */

namespace Src\Base;

/**
 * class Deactivate
 * 
 * Should be run on plugin deactivation.
 */
class Deactivate
{
    /**
     * Deactivate plugin.
     *
     * @return void
     */
    public static function deactivate()
    {
        flush_rewrite_rules();
    }
}