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
