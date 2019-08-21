<?php
/**
 * Template name: Rebel Without Borders
 */

get_header(); ?>

<div class="rwb">
  <div class="bg-blue px-3 py-5 text-center text-white rwb-cover-image" style="background: linear-gradient(rgba(0, 0, 0, 0.65), rgba(0, 0, 0, 0.45)), url('<?php the_field('rwb_cover_image_url'); ?>') no-repeat;">
    <div class="py-5">
      <h1 class="display-2"><?php the_title(); ?></h1>
      <h1 class="font-xr text-uppercase"><?php the_field('rwb_caption'); ?></h1>
    </div>

    <br>
    <h1 class="font-xr text-uppercase"><?php the_field('rwb_date'); ?></h1>
    <div class="rwb-location">
      <?php the_field('rwb_location'); ?>
    </div>

    <div class="my-3">
      <a class="btn btn-lg btn-blue" href="#details"><?php _e('JOIN'); ?></a>
    </div>

    <a href="<?php the_field('rwb_facebook_event_url'); ?>" target="_blank" class="text-white text-reset text-underline">
      Facebook
    </a> or <a class="text-white text-reset text-underline" href="<?php the_field('rwb_meetup_event_url'); ?>" target="_blank">
      Meetup
    </a>
  </div>

  <div class="text-center">
    <a name="details"></a>
    <div class="container">
      <div class="row py-5">
        <div class="col-12 col-lg-8 mx-auto">
          <a name="details"></a>
          <?php the_content(); ?>
        </div>
      </div>
    </div>
  </div>

  <div class="bg-pink">
    <a name="join"></a>
    <div class="container">
      <div class="row py-5 text-center">
        <div class="col-12 col-lg-8 mx-auto">
          <h2><?php _e('JOIN REBEL WITHOUT BORDERS', 'theme-xrnl'); ?></h2>
          <?php the_field('rwb_join_description'); ?>
        </div>
        <div class="col-12 col-lg-6 col-md-8 mx-auto mt-4">
          <?php the_field('sign_up_form_code'); ?>
        </div>
      </div>
    </div>
  </div>

  <div class="container text-center py-5">
    <div class="row">
      <div class="col-12 col-lg-8 mx-auto">
        <h2>
          <?php _e('WHY ARE WE PROTESTING', 'theme-xrnl'); ?>?
        </h2>
        <p><?php the_field('rwb_why_protest'); ?></p>
      </div>
      <div class="col-12 col-lg-6 mx-auto mt-3">
        <a class="btn btn-yellow btn-lg" data-toggle="collapse" href="#demands" role="button" aria-expanded="false" aria-controls="demands">
          <?php _e('OUR DEMANDS', 'theme-xrnl'); ?>
          <i class="fas fa-chevron-down"></i>
        </a>
        <div class="text-left collapse" id="demands">
          <?php the_field('rwb_demands'); ?>
        </div>
      </div>
    </div>
  </div>

  <div class="rwb-cover-image" style="background: linear-gradient(rgba(0, 0, 0, 0.65), rgba(0, 0, 0, 0.55)), url('<?php the_field('rwb_cover_image_url'); ?>') no-repeat; min-height: 45vh;">
    <div class="container">
      <div class="row py-5 text-center text-white">
        <div class="col-12 col-lg-8 mx-auto my-5">
          <h2>
            <?php _e('WHO IS EXTINCTION REBELLION', 'theme-xrnl'); ?>?
          </h2>
          <?php the_field('rwb_who_is_xr'); ?>
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid">
    <div class="row py-5 text-center">
      <div class="col-12 col-lg-8 mx-auto">
        <h2><?php _e('FAQ AND PRACTICAL INFO', 'theme-xrnl'); ?></h2>
        <?php the_field('rwb_faq_description') ?>
        <div class="row my-3">
          <div class="text-left col-lg-10 col-xl-8 mx-auto">
            <?php while ( have_rows('rwb_faqs') ){ the_row(); ?>
              <div class="my-3 border border-yellow">
                <a class="btn btn-yellow btn-lg btn-block d-flex justify-content-between align-content-center text-left" data-toggle="collapse" href="#faq-<?php echo get_row_index(); ?>" role="button" aria-expanded="false" aria-controls="faq-<?php echo get_row_index(); ?>">
                  <span><?php the_sub_field('question'); ?></span>
                  <i class="fas fa-chevron-down pt-1"></i>
                </a>
                <div class="collapse" id="faq-<?php echo get_row_index(); ?>">
                  <div class="p-4"><?php the_sub_field('answer'); ?></div>
                </div>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="bg-blue">
    <div class="container">
      <div class="row py-5 text-center">
        <div class="col-12 col-lg-8 mx-auto">
          <h2><?php _e('JOIN REBEL WITHOUT BORDERS', 'theme-xrnl'); ?></h2>
          <?php the_field('rwb_join_description'); ?>
          <div class="mt-3">
            <a href="#join" class="btn btn-black btn-lg">
              <?php _e('JOIN') ?> <i class="fas fa-chevron-up"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>
