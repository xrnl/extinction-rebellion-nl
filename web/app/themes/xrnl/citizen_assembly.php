<?php
/**
 * Template name: Citizen Assembly - All pages
 */

get_header(); ?>

<?php
  function formatElementID($str) {
    return strtolower(str_replace(array(' ', ' & '), '-', $str));
  }
?>

<div class="join bg-yellow">
  <div class="text-left py-5">
      <a href="/burgerberaad"><h1 class="display-4 text-uppercase font-xr">Terug</h1></a>
  </div>
  <div class="text-center py-5">
      <h1 class="display-3 text-uppercase font-xr"><?php the_title(); ?></h1>
  </div>
</div>

<div class="container text-center py-5 citizen-assembly">
  <div class="col-lg-12 mb-5 text-justify">
    <?php the_content(); ?>
  </div>
</div>

<?php get_footer(); ?>
