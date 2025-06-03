<?
function enqueue_theme()
{
     enqueue_js('bundle', 'basetheme-scripts');
     enqueue_css('bundle', 'basetheme-styles');
}
add_action('wp_enqueue_scripts', 'enqueue_theme');
