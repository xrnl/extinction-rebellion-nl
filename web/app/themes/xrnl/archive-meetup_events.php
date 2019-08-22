<?php
/**
 * Template name: Events
 */

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
	'posts_per_page' => 10,
	'paged' => $paged,
	'post_type' => 'meetup_events',
	'orderby' => 'event_start_date',
	'order' => 'ASC'
);
$events = new WP_Query( $args );

get_header(); ?>

<div class="container my-5">
	<h1 class="page-title"><?php _e('EVENTS'); ?></h1>

	<div class="mt-4">
		<?php if ( $events->have_posts() ) : ?>
			<div class="row">
				<?php while ( $events->have_posts() ) : $events->the_post(); ?>
					<?php
					$event_date = get_post_meta( get_the_ID(), 'event_start_date', true );
					if( $event_date != '' ){
						$event_date = strtotime( $event_date );
					}
					$event_address = get_post_meta( get_the_ID(), 'venue_name', true );
					$venue_address = get_post_meta( get_the_ID(), 'venue_address', true );
					if( $event_address != '' && $venue_address != '' ){
						$event_address .= ' - '.$venue_address;
					}elseif( $venue_address != '' ){
						$event_address = $venue_address;
					}

					$image_url =  array();
					if ( '' !== get_the_post_thumbnail() ){
						$image_url =  wp_get_attachment_image_src( get_post_thumbnail_id(  get_the_ID() ), 'full' );
					}else{
						$image_date = date_i18n('F+d', $event_date );
						$image_url[] =  "http://placehold.it/420x150?text=".$image_date;
					}
					?>
					<div class="col-md-6 my-3">
						<a href="<?php echo esc_url( get_permalink() ) ?>">
							<div class="<?php echo $css_class; ?> archive-event">
								<div class="ime_event" >
									<div class="img_placeholder" style=" background: url('<?php echo $image_url[0]; ?>') no-repeat left top;"></div>
									<div class="event_details">
										<div class="event_date">
											<span class="month"><?php echo date_i18n('M', $event_date) ; ?></span>
											<span class="date"> <?php echo date_i18n('d', $event_date) ; ?> </span>
										</div>
										<div class="event_desc">
											<a href="<?php echo esc_url( get_permalink() ) ?>" rel="bookmark">
											<?php the_title( '<div class="event_title">','</div>' ); ?>
											</a>
											<?php if( $event_address != '' ){ ?>
												<div class="event_address"><i class="fa fa-map-marker"></i> <?php echo $event_address; ?></div>
											<?php }	?>
										</div>
										<div style="clear: both"></div>
									</div>
								</div>
							</div>
						</a>
					</div>
				<?php endwhile;

				?>
				</div>
				<nav class="pages my-5">
					<?php
					// Pagination
					$big = 999999999;
					$pagination = paginate_links(array(
						'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
						'current' => max(1, $paged),
						'total' => $events->max_num_pages,
						'type' => 'array',
						'prev_text' => '&laquo; Previous',
						'next_text' => 'Next &raquo;',
					));
					?>
					<?php if ( ! empty( $pagination ) ) : ?>
						<ul class="pagination justify-content-center">
							<?php foreach ( $pagination as $key => $page_link ) : ?>
								<li class="page-item <?php if ( strpos( $page_link, 'current' ) !== false ) { echo ' active'; } ?>">
									<?php echo $page_link ?>
								</li>
							<?php endforeach ?>
						</ul>
					<?php endif ?>
				</div>
				<?php
			// If no content, include the "No posts found" template.
			else :
				get_template_part( 'template-parts/content', 'none' );
			endif;
			?>
	</div>
</div>

<?php get_footer(); ?>

