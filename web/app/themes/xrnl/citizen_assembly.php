<?php
/**
 * Template name: Citizen Assembly - Global
 */

get_header(); ?>

<?php get_template_part( 'template-parts/citizen-assembly-header' ); ?>

<div class="container text-center py-5 citizen-assembly">
  <div class="col-lg-12 mb-5 text-justify">
    <?php the_content(); ?>
  </div>
</div>

<?php get_footer(); ?>