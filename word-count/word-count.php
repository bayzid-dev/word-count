<?php

/**
 * Plugin Name: Word counter
 * Plugin Uri: https://word-counter
 * Description:  This plugin can count any wordpress post's total word
 * Author:  sejan ahmed bayzid
 * Version: 1.0
 * License: 
 * Text Domain: word-count
 * Domain path: /language 
 */

 // function activation hook / when user  click to activate the plugin
/* function wordcount_activation_hook(){}
 register_activation_hook(__FILE__, "wordcount_activation_hook"); */

 // function deactivation hook/ when user click to deactivate the plugin
/*  function wordcount_deactivation_hook(){ }
 register_deactivation_hook(__FILE__, "wordcount_deactivation_hook") */


 
 // loading text domain
function wordcount_load_textdomain(){
    load_plugin_textdomain("word-count", false, dirname(__FILE__)."/languages");
}
add_action("plugin_loaded", "wordcount_load_textdomain");

 
// word counter
function wordcount_count_words( $content ) {

    $stripped_content = strip_tags($content);     // abolishing the tag like p,h1,h3
    $wordn = str_word_count($stripped_content);   // counting the words
    $label = __('Total number of word ', 'word-count');
    $label = apply_filters('wordcount_heading', $label);
    $tag = apply_filters('wordcount_tag', 'h2');
    $content .= sprintf('<%s>%s:  %s</%s>',$tag, $label, $wordn, $tag);
    return $content;

}
add_filter( 'the_content', 'wordcount_count_words' );























































