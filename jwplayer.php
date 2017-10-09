<?php
/*
Plugin Name: WP-Parsi JW Player
Plugin URI: http://wp-parsi.com/
Description: Create player with JW Player shortcode on-the-fly!
Version: 1.1
Author: Morteza Geransayeh
Author URI: http://geransayeh.com/
License: GPLv2
*/


/* * * ** * * * * * * * * * * * * * * * * * * * * * * */
/*                   BASE FUNCTION                    */
/* * * * * * * * * * * * * * * * * * * * * * * * * * */

function wpp_jwp_shortcode( $atts, $content = null ) {
		extract(shortcode_atts(array(
		   'preview' => 1,
		   'video' => 1,
		   'duration' => 1,
		   'width' => '480',
		   'height' => '270',
		   'fullscreen' => 'true',
		   'autostart' => 'false',
		), $atts)); 

		$url = get_bloginfo('url').'/wp-content/plugins/'. basename(dirname(__FILE__));
		
		$content .= "
			<div id='mediaplayer'>JW Player 5</div>
			<embed
			 flashvars='file=$video&image=$preview&skin=&duration=$duration&autostart=$autostart'
 			 allowfullscreen=$fullscreen
  			 allowscriptaccess='always'
  			 id='mediaplayer'
 			 name='mediaplayer'
 			 src='$url/player.swf'
 			 width=$width
 			 height=$height
			/>
		";
	return $content;
}
add_shortcode( 'wppjwp', 'wpp_jwp_shortcode' );

?>