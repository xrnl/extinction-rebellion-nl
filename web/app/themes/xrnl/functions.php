<?PHP
add_theme_support("post-thumbnails");

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

