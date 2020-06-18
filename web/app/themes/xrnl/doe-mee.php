<?php
/**
 * Template name: Doe mee
 */


get_header(); ?>

<?php function getSection($section_id) {
  return (object) get_field($section_id);
} ?>

<div class="join">
  <div class="bg-blue text-center text-white join-cover-image py-5" style="background: linear-gradient(rgba(0, 0, 0, 0.65), rgba(0, 0, 0, 0.45)), url('<?php the_field('join_cover_image_url'); ?>') no-repeat;">
      <h1 class="display-2 text-uppercase font-xr"><?php the_title(); ?></h1>
      <div class="container">
        <div class="col-lg-8 mx-auto">
          <?php the_content(); ?>
        </div>
      </div>
  </div>

  <?php $section = getSection('signup_section'); ?>
  <?php if ($section->enabled) : ?>
    <section class="join-section container-fluid bg-pink px-2">
      <div class="row">
        <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-6 mx-auto">
          <h2><?php echo($section->heading); ?></h2>
          <p><?php echo($section->content); ?></p>
        </div>
      </div>
    </section>
  <?php endif; ?>

  <?php $section = getSection('actions_section'); ?>
  <?php if ($section->enabled) : ?>
    <section class="join-section bg-blue text-white join-cover-image px-2" style="background: linear-gradient(rgba(0, 0, 0, 0.65), rgba(0, 0, 0, 0.45)), url('<?php echo($section->cover_image); ?>') no-repeat;">
      <div class="row">
        <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-6 mx-auto">
          <h2><?php echo($section->heading); ?></h2>
          <p><?php echo($section->description); ?></p>
          <div class="join-action-btns">
            <?php foreach ($section->broadcasts as $broadcast) : ?>
              <a class="btn btn-pink my-2" href="<?php echo($broadcast['link']); ?>"><?php echo($broadcast['label']); ?></a>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </section>
  <?php endif; ?>

  <?php $section = getSection('groups_section'); ?>
  <?php if ($section->enabled) : ?>
    <section class="join-section bg-white px-2">
      <div class="row">
        <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-6 mx-auto">
          <h2><?php echo($section->heading); ?></h2>
          <p><?php echo($section->description); ?></p>
          <div class="join-action-btns">
            <?php foreach ($section->groups as $group) : ?>
              <a class="btn btn-yellow my-2" href="/<?php echo($group['type']); ?>"><?php echo($group['button_label']); ?></a>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </section>
  <?php endif; ?>

  <?php $section = getSection('resources_section'); ?>
  <?php if ($section->enabled) : ?>
    <section class="join-section container-fluid bg-yellow px-2">
      <div class="row">
        <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-6 mx-auto">
          <h2><?php echo($section->heading); ?></h2>
          <p><?php echo($section->description); ?></p>
          <a class="btn btn-black" href="/resources"><?php echo($section->button_label); ?></a>
        </div>
      </div>
    </section>
  <?php endif; ?>

  <?php $section = getSection('events_section'); ?>
  <?php if ($section->enabled) : ?>
    <section class="join-section bg-blue text-white join-cover-image px-2" style="background: linear-gradient(rgba(0, 0, 0, 0.65), rgba(0, 0, 0, 0.45)), url('<?php echo($section->cover_image); ?>') no-repeat;">
      <div class="row">
        <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-6 mx-auto">
          <h2><?php echo($section->heading); ?></h2>
          <p><?php echo($section->description); ?></p>
          <a class="btn btn-blue" href="/events"><?php echo($section->button_label); ?></a>
        </div>
      </div>
    </section>
  <?php endif; ?>

  <?php $section = getSection('do_more_section'); ?>
  <?php if ($section->enabled) : ?>
    <section class="join-section container-fluid bg-blue px-2">
      <div class="row">
        <div class="col-12 col-sm-10 col-md-9 col-lg-8 col-xl-8 mx-auto">
          <h2><?php echo($section->heading); ?></h2>
          <p><?php echo($section->description); ?></p>
          <div class="row do-more-actions">
            <?php foreach ($section->actions as $action) : ?>
              <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-6 mx-auto mb-5">
                <h3><?php echo($action['title']) ?></h3>
                <p><?php echo($action['description']) ?></p>
                <?php if(is_array($action['buttons'])) : ?>
                  <?php foreach ($action['buttons'] as $button) : ?>
                    <?php if ($button['button_label']): ?>
                      <a class="btn btn-black mt-1" href="<?php echo($button['button_link']); ?>"><?php echo($button['button_label']); ?></a>
                    <?php endif; ?>
                  <?php endforeach; ?>
                <?php endif; ?>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </section>
  <?php endif; ?>
</div>

<?php get_footer(); ?>
