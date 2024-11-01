<?php
/*
Plugin Name: Target-Box
Plugin URI: http://no url
Description: This plugin is used to generate ad tag
Version: 1.1
Author: Ketan Mujumdar
License: GPL
*/
include_once 'target-box-plugin-admin.php';
include_once 'target-box-plugin-runtime.php';
include_once 'target-box-plugin-admin-option.php';


/*Calls admin_init when the admin page loads*/
add_action('admin_init',ic_setup_target_box);

/*Call to create a admin menu*/
add_action('admin_menu',create_admin_menu);

/*
 *@fn creates menu for administrator
 */
function create_admin_menu()
{
  add_options_page('IC AD Tag','IC AD Tag','administrator','target-menu', ic_generate_option_page);
}

/*
 * @fn admin_init
 *
 * This function would get called on init and this function would insert a side bar into post.
 */
function ic_setup_target_box()
{
    /*Inserts a box into the post page*/
    add_meta_box('target-box',__('Please Select A Target','ic-target-box-plugin'),ic_generate_targets,'post','side','default');
    add_action('save_post',ic_save_target);
}

/* Runs when plugin is activated */
register_activation_hook(__FILE__,ic_create_field);

/* Runs on plugin deactivation*/
register_deactivation_hook( __FILE__, ic_delete_field);


/* Adding Short code*/
add_shortcode('ic_ad_tag', ic_shortcode_ad_tag);



/*
 * @fn this function creates a coloumn 
 */
function ic_create_field() {
/* Creates new database field */
add_option('ic_pub_name', 'Default', '', 'yes');
}

function ic_delete_field() {
/* Deletes the database field */
delete_option('ic_pub_name');
}

/*End Of Target Plugin*/
?>