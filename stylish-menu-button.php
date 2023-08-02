<?php
/**
 * @package StylishMenuButton
 */

/*
 * Plugin Name:       Stylish Menu Button
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       Creates a beautiful button on the menu.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            ASAtech
 * Author URI:        awujiaa2018@gmail.com
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       stylish-menu-button
 * Domain Path:       /languages
 */

 if ( !defined('ABSPATH')){
    die('Silence is gold, knowledge is power!');
 }

 class StylishMenuButton {


    function __construct() {
        add_action('init', array($this, 'custom_post_type'));
    }

    function register(){
        add_action('admin_enqueue_scripts', array($this, 'enqueue'));
    }


    function activate(){
        //Generate a CPT
        $this->custom_post_type();

        //Flush rewrite rules
        flush_rewrite_rules();

    }


    function deactivate(){
        //Flush rewrite rules
        flush_rewrite_rules();
    }


    //CPT
    function custom_post_type(){
        register_post_type('button', ['public' => true, 'label' => 'Stylish Button']);
    }

    //Add all scripts to plugin
    function enqueue(){
        wp_enqueue_script('mypluginstyle', plugins_url('/assets/mystyle.css', __FILE__));
        wp_enqueue_script('mypluginscript', plugins_url('/assets/myscript.js', __FILE__));
    }


 }

 if(class_exists('StylishMenuButton')){
    $stylishMenuButton = new StylishMenuButton();
    $stylishMenuButton->register();
 }

 //Activation
 register_activation_hook( __FILE__, array($stylishMenuButton, 'activate'));

//Deactivation
register_deactivation_hook( __FILE__, array($stylishMenuButton, 'deactivate'));

