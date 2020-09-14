<?php
/**
 * The template for displaying all single posts and attachments
 */

get_header(); ?>
<div class="container-fluid blog-wrapper">
    <div class="row mt-5">
        <div class="col-12 col-lg-8">
            <?php
            // Start the loop.
            while ( have_posts() ) : the_post();

                // Include the single post content template.
                get_template_part( 'template-parts/content', 'single' );

                if ( is_singular( 'attachment' ) ) {
                    // Parent post navigation.
                    the_post_navigation( array(
                        'screen_reader_text' => ' ',
                        'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'theme-xrnl' ),
                    ) );
                } elseif ( is_singular( 'post' ) ) {
                    // Previous/next post navigation.
                    the_post_navigation( array(
                        'screen_reader_text' => ' ',
                        'next_text' => '<span class="screen-reader-text">' . __( 'Next post:', 'theme-xrnl' ) . '</span> ' .
                            '<span class="post-title">%title</span>',
                        'prev_text' => '<span class="screen-reader-text">' . __( 'Previous post:', 'theme-xrnl' ) . '</span> ' .
                            '<span class="post-title">%title</span>',
                    ) );
                }

                // End of the loop.
            endwhile;
            ?>
        </div>
        <div class="col-12 col-lg-4">
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>

<div class="cover-image" style="background: linear-gradient(rgba(0, 0, 0, 0.65), rgba(0, 0, 0, 0.55)), url('<?php the_field('join_cover_image', 94); ?>') no-repeat; background-position: 50% 90%;">
  <div class="container">
    <div class="row py-5 text-center text-white">
      <div class="col-12 col-lg-8 mx-auto my-5">
        <h1><?php _e('Ready to rebel?', 'theme-xrnl'); ?></h1>
        <p><?php _e('Join the thousands of people that are already taking real meaningful action with Extinction Rebellion. Whoever you are or however much time you have, there is a place for you within our movement.', 'theme-xrnl'); ?>
        </p>
        <p><a class="btn btn-lg btn-blue" href="<?php _e('/en/join', 'theme-xrnl');?>"><?php _e('Join', 'theme-xrnl'); ?></a></p>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>
