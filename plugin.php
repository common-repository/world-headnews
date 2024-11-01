<?php
/*
Plugin Name: World HeadNews
Plugin URI: http://mr.hokya.com/world-headnews/
Description: Display actual news that recently happens on your dashboard page. It also create an animated headline on every admin page. So you can keep up the story up to date.
Version: 1.10
Author: Julian Widya Perdana
Author URI: http://mr.hokya.com/
*/


function headnews_widget () {
	$rss = fetch_feed ("http://blogsearch.google.com/blogsearch/feeds/");
	echo '<div class="rss-widget" style="overflow:scroll;height:200px">';
	wp_widget_rss_output($rss,"show_date=1&show_summary=1&show_author=1");
	echo '</div>';
}
function headnews_rss () {
	wp_add_dashboard_widget("World HeadNews","World HeadNews","headnews_widget");
}
function headnews_db_page () {
	echo "<marquee scrollamount='2' style='background-color:#FFC' id='storyline'>Loading HeadNews</marquee>";
	$home = get_option("home");
	echo "<script src='$home/wp-content/plugins/world-headnews/storyline.js'></script>";
}

add_action('wp_dashboard_setup','headnews_rss');
add_action('admin_head','headnews_db_page');

?>