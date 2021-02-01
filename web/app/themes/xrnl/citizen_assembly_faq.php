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

<div class="container py-5 citizen-assembly">
  <div class="col-lg-12 mb-5 text-justify">
    <?php the_content(); ?>
  </div>
  
  <div class="row">
    <?php while ( have_rows('groups') ){ the_row(); 
      $groupId = "group-" . get_row_index();
    ?>
    <div class="col-12 py-2">
      <div id="<?php echo formatElementID(get_sub_field('group_name')); ?>" class="mx-auto">
        <a class="btn btn-yellow btn-lg btn-block text-left" data-toggle="collapse"
          href="#<?php echo $groupId; ?>" role="button" aria-expanded="false"
          aria-controls="<?php echo $groupId; ?>">
          <?php the_sub_field('group_name') ?>
          <i class="fas fa-chevron-down float-right pt-1"></i>
        </a>
        <div class="text-left collapse pt-2" id="<?php echo $groupId; ?>">
          <?php while ( have_rows('group_questions') ){ the_row(); 
           $groupQuestionsId = "group_questions-" . get_row_index();
          ?>
          <div class="col-12 py-2 pr-0">
            <div id="<?php echo formatElementID(get_sub_field('group_questions')); ?>" class="mx-auto">
              <a class="btn bg-xr-light-green btn-lg btn-block text-left" data-toggle="collapse"
                href="#<?php echo $groupId . $groupQuestionsId; ?>" role="button" aria-expanded="false"
                aria-controls="<?php echo $groupId . $groupQuestionsId; ?>">
                <?php the_sub_field('question') ?>
                <i class="fas fa-chevron-down float-right pt-1"></i>
              </a>
              <div class="text-left collapse" id="<?php echo $groupId . $groupQuestionsId; ?>">
                <div class="pt-3 text-justify">
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