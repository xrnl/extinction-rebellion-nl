<?php
/**
 * Template name: Citizen Assembly - Global
 */

get_header(); ?>

<div class="join bg-yellow">
  <div class="text-left pt-3">
      <a id="back-button" href="/">
        <h1 id="back-text"class="display-5 text-uppercase font-xr"><i class="fas fa-chevron-left fa-xs px-3"></i></h1>
      </a>
  </div>
  <div class="text-center py-5 mx-auto" style="max-width:80%">
      <h1 class="display-3 text-uppercase font-xr"><?php the_title(); ?></h1>
  </div>
</div>

<div class="container text-center py-5 citizen-assembly">
  <div class="col-lg-12 mb-5 text-justify">
    <?php the_content(); ?>
  </div>
</div>

<?php get_footer(); ?>