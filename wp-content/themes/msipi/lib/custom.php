<?php
/**
 * Custom functions
 */

function my_em_custom_content($content){
  if( true ){
      $content .= "Here, I'm adding this extra text to the end of my event content.";
  }
//Whatever happens, you must return the $content variable, altered or not.
 return $content;
}
add_filter('em_content','my_em_custom_content');
