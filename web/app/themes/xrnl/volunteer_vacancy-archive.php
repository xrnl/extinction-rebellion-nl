<?php
/*
Template name: Volunteer vacancy index
*/

get_header(); ?>

<div class="container">
  <div class="row mt-5">
    <div class="col-12">
      <?php the_post(); ?>
      <h1><?php the_title(); ?></h1>
      <?php the_content(); ?>

      <?php
        $vacancies = new WP_Query([
          'post_type' => 'volunteer_vacancy',
          'posts_per_page' => -1
        ]);
        ?>
    </div>
  </div>
        <div class="d-flex flex-wrap justify-content-center">
          <?php while($vacancies->have_posts()){
            $vacancies->the_post(); ?>            
            <div class="card role-card" style="width: 300px; height: 200px; cursor: pointer;" onclick="window.location='<?php the_permalink(); ?>'">
            <div class="card-body d-flex flex-column">
              <h5 class="card-title font-xr text-uppercase">
                <?php the_title(); ?>
              </h5>
              <?php $role = json_decode(get_the_content()); ?>
              <h6 class="card-subtitle text-muted mt-1"><?php echo $role->localGroup ?></h6>
              <h6 class="card-subtitle text-muted mt-1"><?php echo $role->workingGroup ?></h6>
              <h6 class="card-subtitle text-muted mt-1">
                <?php echo $role->timeCommitment->min ?> - <?php echo $role->timeCommitment->max ?> hours / week
              </h6>
            </div>
            <a href="<?php the_permalink(); ?>" class="btn btn-blue">Read more</a>
            </div>
          <?php } wp_reset_query(); ?>
        </div>
    </div>
  </div>

</div>

<?php get_footer();
