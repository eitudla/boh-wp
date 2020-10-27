<?php

/*
    Plugin Name: Base Plugin
    Description: Bespoke Plugin for Wordpress essentials
    Version: 1.0
    Author: mjbaga@yahoo.com
*/

if( !defined('ABSPATH') )
    die('Access denied.');

require_once dirname( __FILE__ ) . '/includes/plugin-config.php';
require_once dirname( __FILE__ ) . '/vendor/autoload.php';

/** Returns Plugin Directory Path */
function base_plugin_path () {
    return plugin_dir_path(__FILE__);
}

/**
 * Returns the absolute path of the specified template
 *
 * @param       string $template template path relative to templates directory
 *
 * @return      string absolute path to template
 */
function base_template_path ($template) {
    return base_plugin_path() . 'templates/' . $template;
}

/**
 * Autoloader for Plugin classes
 *
 * @param       string $className Name of the class that shall be loaded
 */
function base_autoload ($className) {

    $filepath = base_plugin_path() . '/' . str_replace('\\', '/', $className) . '.php';

    if (file_exists($filepath))
        require_once($filepath);
}

spl_autoload_register('base_autoload');
