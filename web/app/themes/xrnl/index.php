<?PHP
get_header();

while(have_posts()){
    the_post();

    ?><h1><?PHP the_title(); ?></h1><?PHP
    the_content();
}

get_footer();