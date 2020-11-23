<?php
/*
* Template name: Local groups
*/

get_header(); ?>

<?php
  $groups = new WP_Query([
    'order' => 'ASC',
    'meta_key' => 'group_name',
    'orderby' => 'meta_value',
    'post_type' => 'xrnl_local_group',
    'posts_per_page' => -1
  ]);
  $previous_letter = '';
?>

<div class="local-groups-hero" class="container-fluid" style="--bg-image: url('<?php the_field('hero_image'); ?>')">
  <div class="row">
    <div class="col-11 col-sm-10 col-lg-8 mx-auto">
      <h1 class=""><?php the_title(); ?></h1>
      <p class="top-text"><?php the_field('hero_text') ?></p>
    </div>
  </div>
</div>

<div class="local-groups-info">
  <div class="info-toggle expanded"><?php the_field('more_info_preview') ?></div>
  <div class="info-expand"> <?php the_field('more_info_expanded') ?></div>
</div>

<div class="local-groups-index row">
  <div class="col-11 col-sm-10 col-lg-8 mx-auto">

    <div class="index-container">
      <div class="select-region">
        <button type="button" name="all-regions" class="active" id="show-all-btn"><?php _e('All regions', 'theme-xrnl'); ?></button>
        <button type="button" name="noord-west" class="region-select-btn">Noord-West</button>
        <button type="button" name="noord-oost" class="region-select-btn">Noord-Oost</button>
        <button type="button" name="midden" class="region-select-btn">Midden</button>
        <button type="button" name="zuid-west" class="region-select-btn">Zuid-West</button>
        <button type="button" name="zuid-oost" class="region-select-btn">Zuid-Oost</button>
      </div>

      <div class="groups-list">
        <ul>
        <?php while($groups->have_posts()):$groups->the_post(); ?>
          <?php $group_name = get_field('group_name'); ?>
          <?php $initial_letter = substr($group_name,0,1); ?>
          <?php if (strcasecmp($initial_letter, $previous_letter) !== 0) : ?>
            <div class="initial-letter">
              <?php echo($initial_letter); ?>
            </div>
          <?php endif; ?>
          <?php $previous_letter = $initial_letter; ?>
          <li class="<?php echo strtolower(get_field('region')); ?> lg-name">
            <a href="<?php the_permalink(); ?>"><?php echo $group_name; ?></a>
          </li>
        <?php endwhile; wp_reset_query(); ?>
        </ul>
      </div>
    </div>

  </div>
</div>

<?php if (get_field('show_the_map') === 'yes'): ?>
  <div class="mt-5">
    <iframe
      title="XR Nederland <?php _e('map', 'theme-xrnl') ?>"
      allowfullscreen width="100%"
      height="600px"
      src="https://rebellion.global/maps/nl-netherlands/branches"
      >
    </iframe>
  </div>
<?php endif; ?>

<p><?php //the_content(); ?></p>

<script type="text/javascript">
  jQuery(document).ready(function(){

    jQuery('.select-region > button').show();

    // Show groups for one region
    jQuery('.region-select-btn').click(function(e) {

      // No doubleclicks please
      if(e.originalEvent.detail > 1){
        return;
      }

      jQuery('.lg-name').hide();
      jQuery('.'+this.name).fadeIn(300);

      // Only show index letters that have groups listed underneath
      jQuery('.initial-letter')
        .hide()
        .filter(function() {
          return jQuery(this).nextUntil('.initial-letter').not(':hidden').length
          })
        .fadeIn(300);

      makeActive(this);
    });

    // Show all groups
    jQuery("button[name='all-regions']").click(function() {
      jQuery('.lg-name, .initial-letter').fadeIn(300);
      makeActive(this);
    });

    // Info toggle
    jQuery('.info-expand').hide();
    jQuery('.info-toggle').click(function(e) {
      jQuery('.info-toggle').toggleClass('expanded');
      jQuery('.info-expand').slideToggle(300);
      e.preventDefault();
    });

  });

  function makeActive(btn) {
      jQuery('.select-region > button').removeClass('active');
      jQuery(btn).addClass('active');
  }
</script>

<?php get_footer();
