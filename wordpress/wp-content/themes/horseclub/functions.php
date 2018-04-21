<?php
load_theme_textdomain('horseclub', get_template_directory() . '/lang');
require_once get_template_directory() . '/hcoptions/hc-config.php';    
require_once get_template_directory() . '/inc/up_utils.php';           			
require_once get_template_directory() . '/inc/up_init.php';            			
require_once get_template_directory() . '/inc/up_sidebar.php';         			
require_once get_template_directory() . '/inc/config.php';          			
require_once get_template_directory() . '/inc/up_cleanup.php';        			
require_once get_template_directory() . '/inc/up_navigations.php';            			   		
require_once get_template_directory() . '/inc/comments.php';        			
require_once get_template_directory() . '/inc/up_shortcodes.php';      			   				
require_once get_template_directory() . '/inc/up_widgets.php';         			
require_once get_template_directory() . '/inc/resizer.php';      			
require_once get_template_directory() . '/inc/up_scripts.php';        			
require_once get_template_directory() . '/inc/up_custom.php';          			        		
require_once get_template_directory() . '/inc/up_custom-woocommerce.php'; 		
require_once get_template_directory() . '/inc/activate-plugins.php';     	    
require_once get_template_directory() . '/inc/custom-css.php'; 		    
if (class_exists('WPBakeryVisualComposerAbstract')) {function requireVcExtend(){require_once get_template_directory() . '/vc_extend/extend-vc.php';}add_action('init', 'requireVcExtend',2);
add_action( 'init', 'horseclub_vcSetAsTheme' );function horseclub_vcSetAsTheme() {vc_set_as_theme(true);}}
if(!function_exists('horseclub_addslashes')) {	
	function horseclub_addslashes($str) {		
		$str = addslashes($str);		
		return $str;
	}
}
function horseclub_widget_featured_image() {
	global $post;
	echo tribe_event_featured_image( $post->ID, 'thumbnail' );
}
add_action( 'tribe_events_list_widget_before_the_event_title', 'horseclub_widget_featured_image' );

