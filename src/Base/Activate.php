<?php
/**
 * @package ProjectsGenerator
 */

namespace Src\Base;

/**
 * class Activate
 * 
 * Should be executed on plugin activation.
 */
class Activate
{
    /**
     * Activate plugin.
     *
     * @return void
     */
    public static function activate()
    {
        flush_rewrite_rules(); 
    }
}