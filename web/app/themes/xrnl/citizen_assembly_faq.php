<?php
/**
 * Template name: Citizen Assembly - FAQ
 */

get_header(); ?>

<?php
  function formatElementID($str) {
    return strtolower(str_replace(array(' ', ' & '), '-', $str));
  }
?>

<div class="citizien-assembly">
  <div class="py-5">
    <?php the_content(); ?>
  </div>
</div>


<div class="text-center bg-light py-5">
  <?php while ( have_rows('groups') ){ the_row(); ?>
  <div class="row py-2">
    <div id="<?php echo formatElementID(get_sub_field('group_name')); ?>" class="col-12 col-lg-6 mx-auto">
      <a class="btn btn-yellow btn-lg btn-block text-left" data-toggle="collapse"
        href="#group-<?php echo get_row_index(); ?>" role="button" aria-expanded="false"
        aria-controls="group-<?php echo get_row_index(); ?>">
        <?php the_sub_field('group_name') ?>
        <i class="fas fa-chevron-down float-right pt-1"></i>
      </a>
      <div class="text-left collapse" id="group-<?php echo get_row_index(); ?>">
        <?php while ( have_rows('group_questions') ){ the_row(); ?>
          <div class="row py-2">
            <div id="<?php echo formatElementID(get_sub_field('group_questions')); ?>" class="col-12 col-lg-6 mx-auto">
              <a class="btn btn-green btn-lg btn-block text-left" data-toggle="collapse"
                href="#group-questions-<?php echo get_row_index(); ?>" role="button" aria-expanded="false"
                aria-controls="group-questions-<?php echo get_row_index(); ?>">
                <?php the_sub_field('question') ?>
                <i class="fas fa-chevron-down float-right pt-1"></i>
              </a>
              <div class="text-left collapse" id="group-questions-<?php echo get_row_index(); ?>">
                <div class="pt-3">
                  <?php the_sub_field('answer'); ?>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
  <?php } ?>
</div>

</div>

<?php get_footer(); ?>