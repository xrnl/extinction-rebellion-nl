<?php
/**
 * Template name: Citizen Assembly - Home
 */

get_header(); ?>

<?php
  function formatElementID($str) {
    return strtolower(str_replace(array(' ', ' & '), '-', $str));
  }
?>

<div class="join">
  <div class="bg-yellow text-center py-5">
      <h1 class="display-3 text-uppercase font-xr"><?php the_title(); ?></h1>
  </div>
</div>

<div class="container text-center py-5">
  <div class="col-lg-12 mb-5 text-justify">
    <?php the_content(); ?>
  </div>

  <div class="row">
    <div class="display-4 text-uppercase font-xr text-center col-12" style="font-size: 2.5rem;"><?php the_field("tiles_before_text") ?></div>
    <div class=" d-flex flew-row flex-wrap justify-content-center">
      <?php while ( have_rows('tiles') ){ the_row(); ?>
          <div id="<?php formatElementID(get_sub_field('tile_text')); ?>" class="bg-yellow mx-autor m-4 p-2" style="flex-basis: 180; max-width: 180px;">
          <a href="<?php the_sub_field('tile_url'); ?>" style="text-decoration: none;"><img class="img-fluid p-4" src="<?php the_sub_field('tile_pictogram'); ?>" /></a>
          <a href="<?php the_sub_field('tile_url'); ?>" style="text-decoration: none;"><div class="display-5 text-uppercase font-xr"><?php the_sub_field('tile_text') ?></div></a>
          </div>
      <?php } ?>
    </div>
  </div>
</div>

<div class="join">
  <div class="text-center py-5 px-3" style="background-color: #ffedb8;">
    <div class="text-uppercase font-xr"><?php the_field('flag_title'); ?></div>
    <div><?php the_field('flag_text'); ?></div>
  </div>
</div>

<div class="container py-5">
  <div class="row">
    <div class="col-11 col-md-12 mx-auto border border-dark pt-3">
      <?php the_field('end_note'); ?>
    </div>
  </div>
</div>

</div>

<?php get_footer(); ?>
