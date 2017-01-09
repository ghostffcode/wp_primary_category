<?php
/*
* Plugin Name: Primary Categories Taxonomy
* Description: You mean a custom taxonomy? Sure, why not?.
* Version: 1.0
* Author: TenUp
* Author URI: https://10up.com
*/
 

 /**
  * [Function to call when the theme is activated to create our custom taxonomy]
  * 
  * @return {void}
  */
function create_primary_category () {

    // labels array for labels in register_taxonomy argument
    $labels = [
        'name'              => _x('Primary Categories', 'taxonomy general name'),
        'singular_name'     => _x('Primary Category', 'taxonomy singular name'),
        'search_items'      => __('Search Primary Categories'),
        'all_items'         => __('All Primary categories'),
        'parent_item'       => __('Parent Primary category'),
        'parent_item_colon' => __('Parent Primary Category:'),
        'edit_item'         => __('Edit Primary Category'),
        'update_item'       => __('Update Primary Category'),
        'add_new_item'      => __('Add New Primary Category'),
        'new_item_name'     => __('Primary Category Name'),
        'menu_name'         => __('Primary Categories'),
    ];


    // values for arguments of register_taxonomy
    $args = [
        'hierarchical'      => true, // make it hierarchical (like categories)
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => ['slug' => 'primary_category'],
    ];


    // register our custom taxonomy to wordpress
    register_taxonomy('primary_category', ['post'], $args);
}


// register function as action
add_action('init', 'create_primary_category');


/**
 * [executes on plugin deactivation to unregister taxonomy]
 * 
 * @return {void}
 */
function destroy_primary_category () {
	unregister_taxonomy('primary_category');
}

// hooks for activating and deactivating plugins respectively
register_activation_hook(__FILE__, 'create_primary_category');
register_deactivation_hook(__FILE__, 'destroy_primary_category');
