<?php
/**
 * The template part for displaying the list of demands
 */
?>

  <div class="demands-list">

    <?php if (get_field('xrnl_demands_txt_above', 'option')) : ?>
      <div class="mt-4">
        <?php the_field('xrnl_demands_txt_above', 'option'); ?>
      </div>
    <?php endif; ?>

    <?php if( have_rows('xrnl_demands_list', 'option') ): ?>
      <ol class="pl-3 counter mt-3">
        <?php while( have_rows('xrnl_demands_list', 'option') ): the_row(); ?>
          <?php $demand = get_sub_field('demand'); ?>
            <li class="pl-4">
              <span class="text-green font-xr">
                <?php echo $demand['bold_text']; ?>
              </span>
              <span>
                <?php echo $demand['regular_text']; ?>
              </span>
            </li>
        <?php endwhile; ?>
      </ol>
    <?php endif; ?>

    <?php if (get_field('xrnl_demands_txt_below', 'option')) : ?>
      <div class="mt-4">
        <?php the_field('xrnl_demands_txt_below', 'option'); ?>
      </div>
    <?php endif; ?>

    <?php if (get_field('xrnl_demands_link_target', 'option')) : ?>
      <div class="pt-3 text-center">
        <a href="<?php the_field('xrnl_demands_link_target', 'option'); ?>"><?php the_field('xrnl_demands_link_label', 'option'); ?></a>
      </div>
    <?php endif; ?>

  </div>
