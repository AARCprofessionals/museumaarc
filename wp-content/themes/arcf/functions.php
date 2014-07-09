<?php
// For post type logic, please check the Custom Post Changes Plugin in the plugins directory

// Custom function that formats the title if it has a date.
function year_match($string) {
  $string = html_entity_decode($string);
  // Check for dashes
  if ( preg_match('~\d{4}\040–~', $string) || preg_match('~\d{4}\040-~', $string) ||  preg_match('~\d{4}\040\040-~', $string) ) {
    return $string;
  }
  elseif ( preg_match('~\d{4}\040~', $string) ) {
    $count = strlen($string);

    // Get the point where the string is using the year format
    $strpos = preg_match( '~\d{4}\040~', $string, $matches);
    $match_count = strlen($matches[0]);

    $new_count = $count - $match_count;

    $title = substr_replace($string, "– ", 5, -$new_count);

    return $title;
  }
  else {return $string;}
}

add_filter('the_title', 'year_match');

function determine_donors_query($show, $search, $from, $to) {
  $args = array(
    'post_type' => 'arcf_donors',
    'order_by' => 'id',
    'order' => 'DESC',
    'posts_per_page' => -1,
    'date_query' => array(
      array(
        'after' => $from,
        'before' => $to
      ),
      'inclusive' => true,
    ),
    'meta_query' => array(
      array(
        'key' => 'type',
        'value' => 'donor',
        'compare' => '='
      )
    )
  );
  if ($show == 'name') {
    $args['s'] = $search;
  }
  if ($show == 'dedication') {
    $args['meta_query'] = array(
      array(
        'key' => array('brick_message', 'block_message'), // this key will change!
        'value' => $search,
        'compare' => 'LIKE'
      ),
      array(
        'key' => 'type',
        'value' => 'donor',
        'compare' => '='
      )
    );
  }
  return $args;
}