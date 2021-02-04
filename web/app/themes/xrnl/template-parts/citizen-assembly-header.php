<?php
/**
 * The template part for displaying header in citizen assembly pages
 */

function insertURL($page_id) {
  echo get_permalink(apply_filters('wpml_object_id', $page_id, 'page', true));
}

?>

<div class="join bg-yellow">
  <div class="text-left pt-3">
    <a id="back-button" href="<?php echo insertURL(13269)?>">
      <h1 id="back-text" class="display-5 text-uppercase font-xr">
        <i class="fas fa-chevron-left fa-xs px-3"></i><?php _e('Back', 'theme-xrnl'); ?>
      </h1>
    </a>
  </div>
  <div class="text-center pb-5 pt-1 mx-auto header-title">
    <h1 class="display-3 text-uppercase font-xr"><?php the_title(); ?></h1>
  </div>
</div>