<?php
/**
 * Template name: Events
 */

// city query param
$param_city = get_query_var('city');

// city query
$query_city = $param_city ? array(
  'key' => 'venue_city',
  'value' => $param_city,
  'compare' => '='
) : array();

// page query param
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

// Events Query
$args = array(
	'posts_per_page' => 10,
	'paged' => $paged,
	'post_type' => 'meetup_events',
	'orderby' => 'meta_value',
	'meta_key' => 'event_start_date',
	'order' => 'ASC',
	'meta_query' => array(
		array(
			'key' => 'event_start_date', // Check the start date field
			'value' => date("Y-m-d"), // Set today's date (note the similar format)
			'compare' => '>=', // Return the ones greater than today's date
			'type' => 'DATE' // Let WordPress know we're working with date
    ),
    // adds city filter
    $query_city
	)
);
$events = new WP_Query( $args );

get_header(); ?>

<div class="container my-5">
	<h1 class="page-title"><?php _e('EVENTS'); ?> <?php echo $param_city ?></h1>

  <?php if (event_cities()) { ?>
    <form class="form-inline mt-4" method="get">
      <label class="my-1 mr-2" for="city">City</label>
      <select name="city" class="custom-select my-1 mr-sm-2" id="city">
        <option value=""><?php _e('All') ?></option>
        <?php foreach(event_cities() as $city) { ?>
          <option value="<?php echo $city->meta_value ?>" <?php echo $param_city == $city->meta_value ? 'selected="selected"' : '' ?>>
            <?php echo $city->meta_value ?>
          </option>
        <?php } ?>
      </select>
      <button type="submit" class="btn btn-black">
        <?php _e('Apply') ?>
      </button>
    </form>
  <?php } ?>

	<div class="mt-4">
		<?php if ( $events->have_posts() ) : ?>
			<div class="row">
				<?php while ( $events->have_posts() ) : $events->the_post(); ?>
					<?php
					$event_date = get_post_meta( get_the_ID(), 'event_start_date', true );
					if( $event_date != '' ){
						$event_date = strtotime( $event_date );
					}
					$event_address = get_post_meta( get_the_ID(), 'venue_city', true );
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

