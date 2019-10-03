<?php
/**
 * Template name: About
 */

get_header(); ?>

<div class="about">
  <div class="bg-blue px-3 py-lg-5 pb-5 text-center text-white cover-image" style="background: linear-gradient(rgba(0, 0, 0, 0.65), rgba(0, 0, 0, 0.45)), url('<?php the_field('about_cover_image'); ?>') no-repeat;">
    <div class="py-5">
      <?php the_content(); ?>
    </div>
  </div>

  <div class="text-center bg-light">
    <div class="container py-5 my-sm-5 my-4">
      <div class="row">
        <div class="col-12 col-lg-10 mx-auto">
          <h1><?php the_field('why_title'); ?></h1>
          <?php the_field('why_description'); ?>
        </div>
        <div class="col-12 col-lg-6 mx-auto mt-3">
          <a class="btn btn-yellow btn-lg" data-toggle="collapse" href="#demands" role="button" aria-expanded="false" aria-controls="demands">
            <?php _e('OUR DEMANDS', 'theme-xrnl'); ?>
            <i class="fas fa-chevron-down"></i>
          </a>
          <div class="text-left collapse" id="demands">
            <?php the_field('demands'); ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="text-center my-sm-5 my-4">
    <div class="container py-5">
      <h1><?php the_field('who_we_are_title'); ?></h1>
      <p><?php the_field('who_we_are_description'); ?></p>
      <br>
      [gallery / photos]
    </div>
  </div>

  <div class="text-center my-sm-5 my-4">
    <div class="container py-5">
      <h1><?php the_field('organisation_title'); ?></h1>
      <p><?php the_field('organisation_description'); ?></p>

      <?php while ( have_rows('organisation_topics') ){ the_row(); ?>
        <div class="row py-3">
          <div class="col-12 col-lg-6 mx-auto mt-3">
            <a class="btn btn-yellow btn-lg" data-toggle="collapse" href="#topic-<?php echo get_row_index(); ?>" role="button" aria-expanded="false" aria-controls="topic-<?php echo get_row_index(); ?>">
              <?php the_sub_field('topic_tilte') ?>
              <i class="fas fa-chevron-down"></i>
            </a>
            <div class="text-left collapse" id="topic-<?php echo get_row_index(); ?>">
              <?php the_sub_field('topic_description'); ?>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>

  <div class="cover-image" style="background: linear-gradient(rgba(0, 0, 0, 0.65), rgba(0, 0, 0, 0.55)), url('<?php the_field('join_cover_image_url'); ?>') no-repeat; min-height: 45vh;">
    <div class="container">
      <div class="row py-5 text-center text-white">
        <div class="col-12 col-lg-8 mx-auto my-5">
          <h1><?php the_field('join_title'); ?></h1>
          <p><?php the_field('join_description'); ?></p>
        </div>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>


