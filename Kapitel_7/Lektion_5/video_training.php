<?php
/*
Plugin Name: Video-Training
Description: ...
*/

defined('ABSPATH') || exit;


function vt_filter($content)
{
    return str_replace('Video-Training', '<b>Video-Training</b>', $content);
}
add_filter('the_content', 'vt_filter');


function vt_email_an_freunde()
{
    wp_mail(
        'service@rheinwerk-verlag.de',
        'Neuer Blog Post',
        'Ich habe einen neuen Artikel auf meinem Blog veröffentlicht.'
    );
}
add_action('publish_post', 'vt_email_an_freunde');