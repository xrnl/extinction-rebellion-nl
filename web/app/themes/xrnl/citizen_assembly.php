<?php
/**
 * Template name: Citizen Assembly - Generic
 */

get_header(); ?>

<main class="citizen-assembly">
  <?php get_template_part( 'template-parts/citizen-assembly-header' ); ?>

  <div class="container text-center py-5">
    <div class="col-lg-12 mb-5 text-justify">
      <?php the_content(); ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>
