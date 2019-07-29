<?php get_header(); ?>

<div class="container">
    <div class="row mt-5">
        <div class="col-12">
            <?php while(have_posts()) { the_post(); ?>
                <h1><?php the_title(); ?></h1>
            <?php the_content(); } ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
