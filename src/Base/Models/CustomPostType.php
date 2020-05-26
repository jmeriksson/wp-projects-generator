<?php
/**
 * @package ProjectsGenerator
 */

namespace Src\Base\Models;

/**
 * class CustomPostType
 * 
 * CustomPostType model
 */
class CustomPostType
{
    protected $name;
    protected $label;
    protected $labels;
    protected $public;
    protected $menu_icon;
    protected $supports;
    protected $has_archive;
    protected $template_path;
    protected $stylesheet_url; 
    protected $scripts_url; 

    public function __construct($cpt_array)
    {
        $this->name = $cpt_array['name'];
        $this->label = $cpt_array['label'];
        $this->labels = $cpt_array['labels'];
        $this->public = $cpt_array['public'];
        $this->menu_icon = $cpt_array['menu_icon'];
        $this->supports = $cpt_array['supports'];
        $this->has_archive = $cpt_array['has_archive'];
        $this->template_path = $cpt_array['template_path'];
        $this->stylesheet_url = $cpt_array['stylesheet_url'];
        $this->scripts_url = $cpt_array['scripts_url'];
    }

    /**
     * Registers this post type.
     *
     * @return void
     */
    public function register()
    {
        register_post_type( $this->getName(), $this->getArgs() );
    }

    /**
     * Enqueues the style and scripts.
     *
     * @return void
     */
    public function enqueueScripts()
    {
        wp_enqueue_style( 'cpt-' . $this->getName() . '-styles', $this->getStylesheetUrl() );
        wp_enqueue_script( 'cpt-' . $this->getName() . '-scripts', $this->getScriptsUrl() );
    }

    /**
     * Returns the name of this custom post type.
     *
     * @return String name of post type
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Returns an array of the argumnets for this custom post type.
     *
     * @return Array argumnets
     */
    public function getArgs()
    {
        return array(
            'label' => $this->label,
            'labels' => $this->labels,
            'public' => $this->public,
            'menu_icon' => $this->menu_icon,
            'supports' => $this->supports,
            'has_archive' => $this->has_archive
        );
    }

    /**
     * Returns the path to the template of this custom post type.
     *
     * @return String template path
     */
    public function getTemplatePath()
    {
        return $this->template_path;
    }

    /**
     * Returns the url to the stylesheet of this custom post type.
     *
     * @return String url to stylesheet
     */
    public function getStylesheetUrl()
    {
        return $this->stylesheet_url;
    }

    /**
     * Returns the url to the javascript document of this custom post type.
     *
     * @return String url to scripts
     */
    public function getScriptsUrl()
    {
        return $this->scripts_url;
    }
}