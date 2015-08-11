<?php

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

