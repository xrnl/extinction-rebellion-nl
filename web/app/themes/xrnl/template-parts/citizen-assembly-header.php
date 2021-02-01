<?php
/**
 * The template part for displaying header in citizen assembly pages
 */

$current_lang = apply_filters( 'wpml_current_language', NULL );

if($current_lang == 'en') {
    $backButtonUrl = '/en/citizen-assembly';
    $backButtonText = 'Back';
} else {
    $backButtonUrl = '/burgerberaad';
    $backButtonText = 'Terug';
}

?>

<div class="join bg-yellow">
  <div class="text-left pt-3">
    <a id="back-button" href="<?php echo $backButtonUrl?>">
        <h1 id="back-text"class="display-5 text-uppercase font-xr">
            <i class="fas fa-chevron-left fa-xs px-3"></i><?php echo $backButtonText ?>
        </h1>
    </a>
  </div>
  <div class="text-center py-5 mx-auto" style="max-width:80%">
    <h1 class="display-3 text-uppercase font-xr"><?php the_title(); ?></h1>
  </div>
</div>