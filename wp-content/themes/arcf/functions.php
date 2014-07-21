<?php
// For post type logic, please check the Custom Post Changes Plugin in the plugins directory

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

