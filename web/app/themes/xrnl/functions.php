<?PHP
add_theme_support("post-thumbnails");
add_theme_support("custom-logo");

add_filter('upload_mimes', function($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
});


add_filter('acf/settings/save_json', function( $path ) {

    // update path
    $path = get_stylesheet_directory() . '/acf-json';

    // return
    return $path;

});



add_filter('acf/settings/load_json', function( $paths ) {

    // remove original path (optional)
    unset($paths[0]);


    // append path
    $paths[] = get_stylesheet_directory() . '/acf-json';


    // return
    return $paths;

});


add_action('wp_enqueue_scripts', function(){
    wp_enqueue_script('xrnl', get_theme_file_uri("dist/js/app.js"), ['jquery']);
});


add_action('init', function() {
    register_nav_menu('primary', 'Main menu');
    register_nav_menu('primary-mobile', 'Main menu mobile');
    register_nav_menu('footer-1', 'Footer menu 1');
    register_nav_menu('footer-2', 'Footer menu 2');
    register_nav_menu('language', 'Language selector');
});

function exclude_category( $query ) {
	if ( $query->is_home() && $query->is_main_query() ) {
		$query->set( 'cat', '-29' );
	}
}
add_action( 'pre_get_posts', 'exclude_category' );

require_once(__DIR__. '/class-wp-bootstrap-navwalker.php');
