<?php
/*
Plugin Name: Custom Post Types and Custom Post Meta
Description: Adds all the post type filters.
Author: Lauren Maxwell
Version: 1.0
*/

add_action( 'init', 'create_post_type' );

function create_post_type() {


  /*****************************************************?
   * Galleries
   */
  register_post_type( 'arcf_gallery',
    array(
      'labels' => array(
        'name' => __( 'Galleries' ),
        'singular_name' => __( 'Gallery' )
      ),
      'public' => true,
      'has_archive' => true,
      'show_in_nav_menus' => false,
      'menu_position' => 100,
      'menu_icon' => '/wp-content/themes/arcf/images/icons/ico-galleries.png',
      'supports' => array('title','editor','thumbnail','excerpt','custom-fields','page-attributes'),
      'rewrite' => array( 'slug' => 'gallery' ),
      'taxonomies' => array('category'),
      'hierarchical' => true
    )
  );


  /*****************************************************?
   * Exhibits
   */
  register_post_type( 'arcf_exhibit',
    array(
      'labels' => array(
        'name' => __( 'Exhibits' ),
        'singular_name' => __( 'Exhibits' )
      ),
      'public' => true,
      'has_archive' => true,
      'show_in_nav_menus' => false,
      'menu_position' => 100,
      'heirarchial' => false,
      'menu_icon' => '/wp-content/themes/arcf/images/icons/ico-exhibits.png',
      'supports' => array('title','editor','thumbnail','excerpt','custom-fields','page-attributes'),
      'rewrite' => array( 'slug' => 'exhibit' ),
      'taxonomies' => array('category')
    )
  );

  /*****************************************************?
   * Donors
   */
  register_post_type( 'arcf_donors',
    array(
      'labels' => array(
        'name' => __( 'Donors' ),
        'singular_name' => __( 'Donors' ),
        'add_new_item' => __( 'Add New Donor' ),
        'edit_item' => __( 'Edit Donor' ),
        'add_new' => __( 'New Donor' ),
        'new_item' => __( 'New Donor' ),
        'view_item' => __( 'View Donor' ),
        'not_found' => __( 'No Donors found' )
      ),
      'public' => true,
      'has_archive' => true,
      'show_in_nav_menus' => false,
      'menu_position' => 100,
      'heirarchial' => false,
      'menu_icon' => '/wp-content/themes/arcf/images/icons/ico-hand.png',
      'supports' => array('title','editor','custom-fields','page-attributes'),
      'rewrite' => array( 'slug' => 'donors' )
    )
  );

}

/**
 * Custom columns for Exhibits
 */
function change_columns( $cols ) {
  $cols = array(
    'cb'		=> '<input type="checkbox" />',
    'title'	=> __( 'Exhibit Name',      'trans' ),
    'gallery'	=> __( 'Gallery', 'trans' ),
    'category' => __( 'Category', 'trans' ),
    'order' => __( 'Order', 'trans' )

  );
  return $cols;
}
add_filter( "manage_arcf_exhibit_posts_columns", "change_columns" );

function custom_columns( $column, $post_id ) {
  switch ( $column ) {
    case "title":
      $title = get_post_meta( $post_id, 'title', true);
      echo $title;
      break;
    case "gallery":
      $gallery = get_post_meta( $post_id, 'gallery', true);
      echo get_the_title($gallery);
      break;
    case "category":
      $gallery = get_post_meta( $post_id, 'gallery', true);
      $cat = get_the_category( get_post_meta( $gallery, 'gallery', true) );
      echo $cat[0]->name;
      break;
    case "order":
      $p =  get_post($post_id);
      $order = $p->menu_order;
      echo $order;
      break;
  }
}

add_action( "manage_posts_custom_column", "custom_columns", 10, 2 );