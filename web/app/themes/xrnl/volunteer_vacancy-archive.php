<?php
/*
Template name: Volunteer vacancy index
*/
get_header();

?>
    <div class="container">
        <?PHP

        ?>

        <div class="row">
            <div class="col-12">
                <?PHP
                the_post();

                ?><h1><?PHP the_title(); ?></h1><?PHP
                the_content();

                $vacancies = new WP_Query([
                    'post_type' => 'volunteer_vacancy',
                    'posts_per_page' => -1
                ]);

                while($vacancies->have_posts()){
                    $vacancies->the_post();

                    ?><h2><a href="<?PHP the_permalink(); ?>"><?PHP the_title(); ?></a></h2><?PHP
                }

                wp_reset_query();

                ?>

            </div>
        </div>
    </div>
<?PHP

get_footer();