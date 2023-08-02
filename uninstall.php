<?php

/**
 * Trigger this file on plugin uninstall
 * 
 * @package StylishMenuButton
 */

 if ( !defined('WP_UNINSTALL_PLUGIN')){
    die('Silence is gold, knowledge is power!');
 }

 //Clear data stored in the database using sql
global $wpdb;
$wpdb->query("DELETE FROM wp_posts WHERE post_type = 'button'");
$wpdb->query("DELETE FROM wp_postmeta WHERE post_id NOT IN(SELECT id FROM wp_posts)");
$wpdb->query("DELETE FROM wp_term_relationships WHERE object_id NOT IN(SELECT id FROM wp_posts)");
