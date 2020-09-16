<?php
/**
 * Template name: Why rebel
 */


get_header(); ?>

<?php function getSection($section_id, $post_id=NULL) {
    return (object) get_field($section_id, $post_id);
  }
?>

<div class="why-rebel">

  <?php $section = getSection('hero_section'); ?>
  <section class="hero" style="background: linear-gradient(rgba(0, 0, 0, 0.65), rgba(0, 0, 0, 0.45)), url('<?php echo $section->image; ?>') no-repeat;">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 col-sm-10 col-md-8 col-lg-8 col-xl-7 mx-auto">
            <p class="reading-time"><?php echo $section->reading_time ? $section->reading_time : '' ?></p>
            <h1 class="display-2 text-uppercase font-xr"><?php echo $section->title; ?></h1>
            <p><?php echo $section->content ?></p>
          </div>
        </div>
      </div>
  </section>

  <?php $section = getSection('quote_1'); $picture = $section->picture; ?>
  <section id="quote-1" class="quote-section container-fluid">
    <div class="row">
      <div class="col-12 col-sm-10 col-md-8 col-lg-8 col-xl-7 mx-auto">
        <div class="quote-container top">
          <div class="quote-content">
            <div class="text-blocks">
              <p class="quote"><?php echo $section->quote ?></p>
              <div class="person-details">
                <div class="person-name"><?php echo $section->name ?></div>
                <div class="person-description"><?php echo $section->description ?></div>
              </div>
            </div>
            <img class="person-portrait" src="<?php echo $picture['url'] ?>" alt="<?php echo $picture['alt'] ?>">
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="the-problem" class="text-section container-fluid">
    <div class="row">
      <div class="col-12 col-sm-10 col-md-8 col-lg-8 col-xl-7 mx-auto">
        <?php the_field('problem_section'); ?>
      </div>
    </div>
  </section>

  <?php $section = getSection('quote_2'); $picture = $section->picture; ?>
  <section id="quote-2" class="quote-section container-fluid">
    <div class="row">
      <div class="col-12 col-sm-10 col-md-8 col-lg-8 col-xl-7 mx-auto">
        <div class="quote-container">
          <div class="quote-content quote-right">
            <div class="text-blocks">
              <p class="quote quote-right"><?php echo $section->quote ?></p>
              <div class="person-details">
                <div class="person-name"><?php echo $section->name ?></div>
                <div class="person-description"><?php echo $section->description ?></div>
              </div>
            </div>
            <img class="person-portrait" src="<?php echo $picture['url'] ?>" alt="<?php echo $picture['alt'] ?>">
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="change-is-possible" class="text-section container-fluid">
    <div class="row">
      <div class="col-12 col-sm-10 col-md-8 col-lg-8 col-xl-7 mx-auto">
        <?php the_field('change_section'); ?>
      </div>
    </div>
  </section>

  <?php $labels = getSection('demands'); ?>
  <section id="demands" class="container-fluid">
    <div class="row">
      <div class="col-12 col-sm-10 col-md-8 col-lg-8 col-xl-7 mx-auto">
        <div id="demands-btn">
          <span id="reveal-demands-btn" class="demands-toggle reveal-demands"><?php echo $labels->show_demands_text ?></span>
          <span id="hide-demands-btn" class="demands-toggle hide-demands" style="display: none;"><?php echo $labels->hide_demands_text ?></span>
        </div>
        <div id="demands-list" style="display: none;">
          <?php the_field('demands', 94); // Grabbing the demands from the About us page, which has ID 94 ?>
        </div>
      </div>
    </div>
  </section>

  <section id="why-rebel" class="text-section container-fluid">
    <div class="row">
      <div class="col-12 col-sm-10 col-md-8 col-lg-8 col-xl-7 mx-auto">
        <?php the_field('why_rebel_section'); ?>
      </div>
    </div>
  </section>

  <?php $section = getSection('ctas'); ?>
  <section id="calls-to-action" class="container-fluid">
    <div class="row">
      <div class="col-12 col-sm-10 col-md-8 col-lg-8 col-xl-7 mx-auto">
        <div class="ctas">
          <a class="cta btn btn-lg btn-green" href="<?php echo $section->button_cta['url'] ?>">
            <?php echo $section->button_cta['label'] ?>
          </a>
          <a class="cta link" href="<?php echo $section->link_cta['url'] ?>">
            <?php echo $section->link_cta['label'] ?>
          </a>
        </div>
      </div>
    </div>
  </section>

  <?php $section = getSection('do_more_section'); ?>
    <section class="do-more-section text-section container-fluid bg-blue">
      <div class="row">
        <div class="col-12 col-sm-10 col-md-9 col-lg-8 col-xl-8 mx-auto">
          <h2 class="text-center"><?php echo($section->heading); ?></h2>
          <p class="do-more-description text-center"><?php echo($section->description); ?></p>
          <div class="row do-more-actions container-fluid">
            <?php if(is_array($section->actions)) : ?>
              <?php foreach ($section->actions as $action) : ?>
                <div class="col-12 col-sm-10 col-md-10 col-lg-4 col-xl-4 mx-auto mb-5">
                  <h3><?php echo($action['title']) ?></h3>
                  <p><?php echo($action['description']) ?></p>
                  <?php if(is_array($action['buttons'])) : ?>
                    <div class="ctas">
                      <?php foreach ($action['buttons'] as $button) : ?>
                        <?php if ($button['button_label']): ?>
                          <a class="btn btn-black my-2" href="<?php echo($button['button_link']); ?>"><?php echo($button['button_label']); ?></a>
                        <?php endif; ?>
                      <?php endforeach; ?>
                    </div>
                  <?php endif; ?>
                </div>
              <?php endforeach; ?>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </section>
</div>

<script type="text/javascript">
   jQuery(document).ready(function() {
     jQuery('.demands-toggle').click(function(e) {
       jQuery('.demands-toggle').toggle();
       jQuery('#demands-list').slideToggle(300);
       e.preventDefault();
     });
   });
</script>

<?php get_footer(); ?>
