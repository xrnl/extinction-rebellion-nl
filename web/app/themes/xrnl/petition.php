<?php
/**
 * Template name: Petition
 */


get_header(); ?>

<?php function getSection($section_id) {
  return (object) get_field($section_id);
} ?>

<?php function insertURL($page_id) {
  echo get_permalink(apply_filters('wpml_object_id', $page_id, 'page', true));
} ?>

<div class="petition">
  <div class="bg-blue text-center text-white petition-cover-image py-5" style="background: linear-gradient(rgba(0, 0, 0, 0.65), rgba(0, 0, 0, 0.45)), url('<?php the_field('join_cover_image_url'); ?>') no-repeat;">
      <h1 class="display-2 text-uppercase font-xr"><?php the_title(); ?></h1>
      <div class="container">
        <div class="col-lg-8 mx-auto">
          <?php the_content(); ?>
        </div>
      </div>
  </div>


    <?php
        function roundUpToNearest($n, $x=500) {
            return ceil( $n / $x ) * $x;
        }


        Env::init();
        $actionnetwork_api_key = env('ACTION_NETWORK_API_KEY');

        $response = wp_remote_get("https://actionnetwork.org/api/v2/forms/" . get_field('form_id'), [
            'headers' => [
                'OSDI-API-Token'=> $actionnetwork_api_key
            ]
        ]);

        $data = json_decode($response['body'], true);
        $total_submissions = $data['total_submissions'];
        $max_submissions = roundUpToNearest($total_submissions, 500);
        $percent = $total_submissions/$max_submissions*100;

        ?>


    <section class="progress-section container-fluid bg-yellow" style="padding: 100px 20px;">
        <div class="row">
            <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-6 mx-auto">
                <h2 class="text-uppercase font-xr">
                    <span class="display-3" id="total-submissions"><?= $total_submissions ?></span> van <span id="max-submissions"><?= $max_submissions ?></span> handtekeningen
                </h2>


                <div class="progress" style="height: 20px;border-radius: 5px; margin-bottom: 20px;">
                    <div class="progress-bar" role="progressbar" style="width: <?= $percent ?>%; background: black" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>


                <?= do_shortcode(get_field('actionnetwork_shortcode')) ?>
            </div>
        </div>
    </section>

    <script>

    </script>


    <?php $section = getSection('signup_section'); ?>
    <?php if ($section->enabled) : ?>
        <section class="petition-section container-fluid">
            <div class="row">
                <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-6 mx-auto">
                    <h2><?php echo($section->heading); ?></h2>
                    <?php echo($section->content); ?>
                </div>
            </div>
        </section>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
