<?php
/*
Template name: Volunteer vacancy index
*/

get_header(); ?>

<div class="container">
    <div class="row mt-5">
        <div class="col-12">
            <?php the_post(); ?>
            <h1><?php the_title(); ?></h1>

            <?php
            the_content();

            $vacancies = new WP_Query([
                'post_type' => 'volunteer_vacancy',
                'posts_per_page' => -1
            ]);

            while($vacancies->have_posts()){
                $vacancies->the_post();

                ?><h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2><?php
            }

            wp_reset_query();
            ?>

        </div>
    </div>
</div>

<?php get_footer();
