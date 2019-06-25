<?php

if ( ! function_exists('sassbeyond_custom_post_type') ) {
	
    /**
     * Register a custom post type.
     *
     * @link http://codex.wordpress.org/Function_Reference/register_post_type
     */
    function sassbeyond_custom_post_type() {

        //portfolio
        register_post_type(
            'portfolio', array(
            'labels'                 => array(
                'name'               => _x( 'Portfolio', 'post type general name', 'sassbeyond' ),
                'singular_name'      => _x( 'Portfolio', 'post type singular name', 'sassbeyond' ),
                'menu_name'          => _x( 'Portfolio', 'admin menu', 'sassbeyond' ),
                'name_admin_bar'     => _x( 'Portfolio', 'add new on admin bar', 'sassbeyond' ),
                'add_new'            => _x( 'Add New', 'Portfolio', 'sassbeyond' ),
                'add_new_item'       => __( 'Add New Portfolio', 'sassbeyond' ),
                'new_item'           => __( 'New Portfolio', 'sassbeyond' ),
                'edit_item'          => __( 'Edit Portfolio', 'sassbeyond' ),
                'view_item'          => __( 'View Portfolio', 'sassbeyond' ),
                'all_items'          => __( 'All Portfolio', 'sassbeyond' ),
                'search_items'       => __( 'Search Portfolio', 'sassbeyond' ),
                'parent_item_colon'  => __( 'Parent Portfolio:', 'sassbeyond' ),
                'not_found'          => __( 'No Portfolio found.', 'sassbeyond' ),
                'not_found_in_trash' => __( 'No Portfolio found in Trash.', 'sassbeyond' )
            ),

            'description'        => __( 'Description.', 'sassbeyond' ),
            'menu_icon'          => 'dashicons-layout',
            'public'             => true,
            'show_in_menu'       => true,
            'has_archive'        => false,
            'hierarchical'       => true,
            'rewrite'            => array( 'slug' => 'portfolio' ),
            'supports'           => array( 'title', 'editor', 'thumbnail' )
        ));

        // portfolio taxonomy
        register_taxonomy(
            'portfolio_category',
            'portfolio',
            array(
                'labels' => array(
                    'name' => __( 'Portfolio Category', 'sassbeyond' ),
                    'add_new_item'      => __( 'Add New Category', 'sassbeyond' ),
                ),
                'hierarchical' => true,
                'show_admin_column'     => true
        ));
    }

    add_action( 'init', 'sassbeyond_custom_post_type' );

}