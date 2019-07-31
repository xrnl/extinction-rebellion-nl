<?php
/**
 * The template for displaying search results pages
 */

get_header(); ?>

<div class="container">
    <div class="row mt-5">
        <div class="col-12">

            <?php if ( have_posts() ) : ?>

                <header class="page-header">
                    <h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'theme-xrnl' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
                </header>

                <?php
                // Start the loop.
                while ( have_posts() ) : the_post();

                    /**
                     * Run the loop for the search to output the results.
                     * If you want to overload this in a child theme then include a file
                     * called content-search.php and that will be used instead.
                     */
                    get_template_part( 'template-parts/content', 'search' );

                // End the loop.
                endwhile;

                // Previous/next page navigation.
                the_posts_pagination( array(
                    'prev_text'          => __( 'Previous page', 'theme-xrnl' ),
                    'next_text'          => __( 'Next page', 'theme-xrnl' ),
                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'theme-xrnl' ) . ' </span>',
                ) );

            // If no content, include the "No posts found" template.
            else :
                get_template_part( 'template-parts/content', 'none' );
            endif;
            ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
