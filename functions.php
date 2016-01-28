<?php
/**
 * Plugin Name: Promotions Manager
 * Plugin URI: http://gangplankhq.com/
 * Description: Take gravity form entries from promotion requests and add to events...
 * Version: 1.0
 * Author: Dan G
 * Author URI: http://gangplankhq.com/
 * License: GPL2
 */

add_action( 'admin_menu', 'register_my_custom_menu_page' );

function register_my_custom_menu_page(){
    add_menu_page( 'Event Promotions Manager', 'Promote Events', 'manage_options', 'event_promotions', 'my_custom_menu_page', plugins_url( 'promotions-manager/images/event_promotion.png' ), 78.69 ); 
}

function my_custom_menu_page(){
    echo "<h2>Event Promotions Manager</h2>";


    $search_criteria = array();
    $sorting = array();
    $paging = array('offset' => 0, 'page_size' => 200);    
    $entries = GFAPI::get_entries(17, $search_criteria, $sorting, $paging);

    foreach ($entries as $entry) {

      $title = $entry['1'];
      $content = $entry['2'];
      $location_name = $entry['7'];
      $event_start_date = $entry['3'];
      $event_end_date = $entry['5'];

      echo " <a href=\"http://gangplankhq.com/wp-admin/post-new.php?post_type=event&post_title=".$title."&content=".$content."\">Promote</a> - ".$title; 
      echo "<br>";
      //print_r($entry);
    } 

}
