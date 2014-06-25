<?php
// For post type logic, please check the Custom Post Changes Plugin in the plugins directory

// Custom function that formats the title if it has a date.
function year_match($string) {
  $string = html_entity_decode($string);
  if ( preg_match('~\d{4}\040–~', $string) ) {
    return $string;
  }
  elseif ( preg_match('~\d{4}\040~', $string) ) {
    $count = strlen($string);

    // Get the point where the string is using the year format
    $strpos = preg_match( '~\d{4}\040~', $string, $matches);
    $match_count = strlen($matches[0]);

    $strpos = $count - $match_count;

    $title = substr_replace($string, "– ", 5, -$strpos);

    return $title;
  }
  else {return $string;}
}

