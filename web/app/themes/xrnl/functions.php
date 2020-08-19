<?PHP
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

add_theme_support("post-thumbnails");
add_theme_support("custom-logo");
add_theme_support( 'title-tag' );

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

add_action('init', function(){
    $labels = array(
        'name'                  => _x( 'Volunteer Vacancies', 'Post Type General Name', 'text_domain' ),
        'singular_name'         => _x( 'Volunteer Vacancy', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'             => __( 'Vacancies', 'text_domain' ),
        'name_admin_bar'        => __( 'Volunteer Vacancies', 'text_domain' ),
        'archives'              => __( 'Item Archives', 'text_domain' ),
        'attributes'            => __( 'Item Attributes', 'text_domain' ),
        'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
        'all_items'             => __( 'All Items', 'text_domain' ),
        'add_new_item'          => __( 'Add New Item', 'text_domain' ),
        'add_new'               => __( 'Add New', 'text_domain' ),
        'new_item'              => __( 'New Item', 'text_domain' ),
        'edit_item'             => __( 'Edit Item', 'text_domain' ),
        'update_item'           => __( 'Update Item', 'text_domain' ),
        'view_item'             => __( 'View Item', 'text_domain' ),
        'view_items'            => __( 'View Items', 'text_domain' ),
        'search_items'          => __( 'Search Item', 'text_domain' ),
        'not_found'             => __( 'Not found', 'text_domain' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
        'featured_image'        => __( 'Featured Image', 'text_domain' ),
        'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
        'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
        'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
        'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
        'items_list'            => __( 'Items list', 'text_domain' ),
        'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
        'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
    );
    $rewrite = array(
        'slug'                  => 'volunteer',
        'with_front'            => true,
        'pages'                 => true,
        'feeds'                 => true,
    );
    $args = array(
        'label'                 => __( 'Volunteer Vacancy', 'text_domain' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'rewrite'               => $rewrite,
        'capability_type'       => 'page',
    );
    register_post_type( 'volunteer_vacancy', $args );

});

add_action('init', function(){
    $labels = array(
        'name'                  => _x( 'Community Groups', 'Post Type General Name', 'text_domain' ),
        'singular_name'         => _x( 'Community Group', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'             => __( 'Community', 'text_domain' ),
        'name_admin_bar'        => __( 'Community Groups', 'text_domain' ),
        'archives'              => __( 'Item Archives', 'text_domain' ),
        'attributes'            => __( 'Item Attributes', 'text_domain' ),
        'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
        'all_items'             => __( 'All Items', 'text_domain' ),
        'add_new_item'          => __( 'Add New Item', 'text_domain' ),
        'add_new'               => __( 'Add New', 'text_domain' ),
        'new_item'              => __( 'New Item', 'text_domain' ),
        'edit_item'             => __( 'Edit Item', 'text_domain' ),
        'update_item'           => __( 'Update Item', 'text_domain' ),
        'view_item'             => __( 'View Item', 'text_domain' ),
        'view_items'            => __( 'View Items', 'text_domain' ),
        'search_items'          => __( 'Search Item', 'text_domain' ),
        'not_found'             => __( 'Not found', 'text_domain' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
        'featured_image'        => __( 'Featured Image', 'text_domain' ),
        'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
        'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
        'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
        'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
        'items_list'            => __( 'Items list', 'text_domain' ),
        'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
        'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
    );
    $rewrite = array(
        'slug'                  => 'community',
        'with_front'            => true,
        'pages'                 => true,
        'feeds'                 => true,
    );
    $args = array(
        'label'                 => __( 'Community Group', 'text_domain' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'rewrite'               => $rewrite,
        'capability_type'       => 'page',
    );
    register_post_type( 'community_group', $args );

});

// Register Sidebars
function blog_sidebar() {
	register_sidebar( array(
		'id'            => 'blog_sidebar',
		'class'         => 'blog_sidebar',
        'name'          => __( 'Blog Sidebar', 'theme-xrnl' ),
        'description'   => __( 'Appears on blog posts in the sidebar.', 'theme-xrnl' ),
	) );
}
add_action( 'widgets_init', 'blog_sidebar' );


// Yoast SEO seems to not render og:image, so we are going to do this
// hack
function add_og_image() {
    if (is_page('spring-rebellion-2020') || is_page('lente-rebellie-2020')) {
    ?>
        <meta name="og:image" content="https://extinctionrebellion.nl/app/uploads/2020/02/seo-image.png" />
    <?php }
}
add_action( 'wp_head', 'add_og_image' );

// Make sure events details page has `/events/:slug` url instead of `/meetup-event/:slug`
add_filter( 'register_post_type_args', function($args, $post_type){
    if ( $post_type == 'meetup_events') {
        $args['rewrite']['slug'] = 'events';
    }
    return $args;
}, 10, 2 );

// Get Distinct Event cities
function event_cities() {
    $args = array(
        'posts_per_page' => 1e9,
        'post_type' => 'meetup_events',
        'fields' => 'ids',
        'meta_query' => array(
            array(
                'key' => 'event_start_date', // Check the start date field
                'value' => date("Y-m-d"), // Set today's date (note the similar format)
                'compare' => '>=', // Return the ones greater than today's date
                'type' => 'DATE' // Let WordPress know we're working with date
            )
        )
    );

    $events = new WP_Query( $args );
    $cities = array();

    while ( $events->have_posts() ) {
        $events->the_post();
        $city = get_post_meta( get_the_ID(), 'venue_city', true );
        $venue = get_post_meta( get_the_ID(), 'venue_address', true );
        if ($venue == 'Online'){
            $city = 'Online';
        } elseif ($city == ''){
            $city = $venue;
        }
        if (array_key_exists($city, $cities)) {
            $cities[$city]++;
        } elseif ($city != '') {
            $cities[$city] = 1;
        }
    }
    ksort($cities);

    return $cities;
}

// Get Distinct Vacancy working and local groups
function vacancy_groups( $vacancies ) {
    $working_groups = array();
    $local_groups = array();

    while ( $vacancies->have_posts() ) {
        $vacancies->the_post();
        $role = json_decode(get_the_content());
        $working_groups[] = $role->workingGroup;
        $local_groups[] = $role->localGroup;
    }

    function unique_sorted( $array ) {
        $array = array_unique($array);
        sort($array);
        return $array;
    }

    return array(
        'local_groups' => unique_sorted($local_groups),
        'working_groups' => unique_sorted($working_groups)
    );
}

function xrnl_query_vars( $qvars ) {
    $qvars[] = 'city';
    $qvars[] = 'working_group';
    $qvars[] = 'local_group';
    return $qvars;
}
add_filter( 'query_vars', 'xrnl_query_vars' );

function excerpt($limit) {
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
    } else {
        $excerpt = implode(" ",$excerpt);
    }
    $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
    return $excerpt;
}


/**
 * Grab events from database
 *
 * @param array $data None, city, category or both
 * @return array Of events that satisfy the request
 */
function events_query( $data ) {
  global $wpdb;
  $meta_query = "SELECT * FROM {$wpdb->postmeta} pm WHERE pm.post_id IN
            (SELECT p.ID
            FROM {$wpdb->posts} p
            LEFT JOIN {$wpdb->term_relationships} tr
            ON tr.object_id = p.ID

            LEFT JOIN {$wpdb->term_taxonomy} tt
            ON tt.term_taxonomy_id = tr.term_taxonomy_id
            AND tt.taxonomy = 'meetup_category'

            LEFT JOIN {$wpdb->terms} t
            ON t.term_id = tt.term_id)";

  $query = "SELECT p.ID as id, p.post_title as title, p.post_content as content, t.name as category
            FROM {$wpdb->posts} p
            LEFT JOIN {$wpdb->term_relationships} tr
            ON tr.object_id = p.ID

            LEFT JOIN {$wpdb->term_taxonomy} tt
            ON tt.term_taxonomy_id = tr.term_taxonomy_id
            AND tt.taxonomy = 'meetup_category'

            LEFT JOIN {$wpdb->terms} t
            ON t.term_id = tt.term_id

            LEFT JOIN {$wpdb->postmeta} pm_city
            ON p.ID = pm_city.post_id

            LEFT JOIN {$wpdb->postmeta} pm_address
            ON p.ID = pm_address.post_id

            WHERE p.post_type = 'meetup_events'";


            // $query = "SELECT p.ID as id, p.post_title as title, p.post_content as content, t.name as category, pm_city.meta_value as city, pm_address.meta_value as address
            //           FROM {$wpdb->posts} p
            //           LEFT JOIN {$wpdb->term_relationships} tr
            //           ON tr.object_id = p.ID
            //
            //           LEFT JOIN {$wpdb->term_taxonomy} tt
            //           ON tt.term_taxonomy_id = tr.term_taxonomy_id
            //           AND tt.taxonomy = 'meetup_category'
            //
            //           LEFT JOIN {$wpdb->terms} t
            //           ON t.term_id = tt.term_id
            //
            //           LEFT JOIN {$wpdb->postmeta} pm_city
            //           ON p.ID = pm_city.post_id
            //
            //           LEFT JOIN {$wpdb->postmeta} pm_address
            //           ON p.ID = pm_address.post_id
            //
            //           WHERE p.post_type = 'meetup_events'
            //           AND pm_city.meta_key = 'venue_city'
            //           AND pm_address.meta_key = 'venue_address'";

    $params = [];
    if($data['city'] != NULL)  {
      if ($data['city'] == 'Online') {
        $query = $query . " AND pm_address.meta_value = %s";
        array_push($params, $data['city']);
      } else {
        $query = $query . " AND pm_city.meta_value = %s";
        array_push($params, $data['city']);
      }
    }

    if($data['category'] != NULL) {
      $query = $query . " AND t.name = %s";
      array_push($params, $data['category']);
    }

   $prepared_sql = $wpdb->prepare($query, ...$params);

  $events = $wpdb->get_results($prepared_sql, OBJECT);
  $metas = $wpdb->get_results($wpdb->prepare($meta_query));

  $metas_by_id = array();
  foreach($metas as $meta) {
    if($metas_by_id[$meta->post_id]) {
      $metas_by_id[$meta->post_id][$meta->meta_key] = $meta->meta_value;
    } else {
      $metas_by_id[$meta->post_id] = array($meta->meta_key => $meta->meta_value);
    }
  }

  foreach($events as $event) {
    $single_metas = $metas_by_id[$event->id];
    $event->meta = $single_metas;
    // foreach($single_metas as $meta_key => $meta_value) {
    //   $event->{$meta_key} = $meta_value;
    // }
  }

  return $events;
  //return $metas_by_id[$events[0]->id];
}


/**
 * Insert event into  database
*/
function insert_event($data) {
  $start_date = new DateTime($data['start_date']);//new DateTime('2020-09-18 09:00:00');
  $end_date = new DateTime($data['end_date']);//new DateTime('2020-09-21 18:30:00');

  $post = array(
    'post_title' => $data['title'],
    'post_content' => $data['content'],//<h2>JESSE</h2><p>Allemaal data</p>',
    //'post_date_gmt' => '2020-08-19 00:00:00',
    'post_status' => 'publish',
    'post_type' => 'meetup_events',
    'meta_input' => array(
      'venue_name' => $data['venue_name'],//'Centraal Station',
      'venue_city' => $data['venue_city'],//'Enschede',
      'venue_address' => $data['venue_address'],//'Stationsplein 1',
      'venue_state' => $data['venue_state'],
      'venue_country' => $data['venue_country'],//'Nederland',
      'venue_zipcode' => $data['venue_zipcode'],
      'venue_lat' => $data['venue_lat'],//52.2223649,
      'venue_lon' => $data['venue_lon'],//6.8897811,
      'venue_url' => $data['venue_url'],
      'organizer_name' => $data['organizer_name'],//'Jesse',
      'organizer_email' => $data['organizer_email'],//jesse@xr.nl',
      'organizer_phone' => $data['organizer_phone'],
      'organizer_url' => $data['organizer_url'],
      'event_start_date' => $start_date->format('Y-m-d'),
      'event_start_hour' => $start_date->format('h'),
      'event_start_minute' => $start_date->format('i'),
      'event_start_meridian' => $start_date->format('a'),
      'event_end_date' =>  $end_date->format('Y-m-d'),
      'event_end_hour' => $end_date->format('h'),
      'event_end_minute' => $end_date->format('i'),
      'event_end_meridian' => $end_date->format('a'),
      'start_ts' => date_timestamp_get($start_date),
      'end_ts' => date_timestamp_get($end_date),
      '_thumbnail_id' => $data['thumbnail_id']
    ),
    'post_author' => 50,
  );
  $err = wp_insert_post($post, true);

  return $err;
}

add_action( 'rest_api_init', function () {
  register_rest_route( 'events_api/v1', '/events/', array(
    'methods' => 'GET',
    'callback' => 'events_query',
  ) );
  register_rest_route( 'events_api/v1', '/events/', array(
    'methods' => 'POST',
    'callback' => 'insert_event',
  ) );
} );
