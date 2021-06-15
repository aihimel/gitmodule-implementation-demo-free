<?php
/*
 * Plugin Name: GitModule Free
 * Textdomain: gitmodule-free
 * */

// Security Check
defined('ABSPATH') || die();

// Constant defination
if( defined('GIT_MODULE_FREE') )
    return;

define('GIT_MODULE_FREE', 'git_module_free_version');

if( !class_exists( 'WebAppickGMF' ) ):

class WebAppickGMF{

    public function __construct()
    {
        // hook registration
        add_action( 'admin_menu', [&$this, 'add_menu'] );

    }

    /* *
     *
     * Adds a main menu in WordPress admin panel with submenus
     *
     * */
    public function add_menu(){

        add_menu_page(
            __( 'WebAppick', 'gitmodule-free' ),
            __( 'WebAppick', 'gitmodule-free' ),
            'manage_options',
            '/webappic/main.php',
            [&$this, 'main_menu_page']
        );

    }

    /*
     * Renders main menu page
     * */
    public function main_menu_page(){

        $output = apply_filters('webappick_menu_page', 'WebAppick GitModule Free Plugin');

        esc_html_e($output);

    }

}

global $WebAppickGMF;
$WebAppickGMF = new WebAppickGMF();

endif;