<?php get_header(); ?>

<?php the_post(); ?>

<div class="masthead px-3 py-5">
	<?php if(ICL_LANGUAGE_CODE === "nl"): ?>
		<h1>
			<span class="first">Kom in</span>
			<span class="second">opstand</span>
			<span class="third">voor het</span>
			<span class="fourth">leven</span>
		</h1>
	<?php else: ?>
		<h1 class="my-5">
			<span class="fourth">Rebel</span>
			<span class="first">for life</span>
		</h1>
	<?php endif; ?>
	<a href="#details" class="d-block my-5 ">
        <i class="fas fa-chevron-down fa-2x text-black"></i>
    </a>
</div>

<div class="container-fluid">
    <a name="details"></a>
    <div class="row text-center">
        <a href="<?php echo (ICL_LANGUAGE_CODE === "nl") ? "" : "/en"; ?>/talk" class="col-12 col-xl-6 bg-yellow p-4 py-5">
            <i class="fab fa-youtube fa-3x text-black"></i>
            <h2 class="text-black mt-3"><?php echo (ICL_LANGUAGE_CODE === "nl") ? "Bekijk de Extinction Rebellion Talk" : "Watch de Extinction Rebellion Talk"; ?></h2>
        </a>
        <a href="<?php echo (ICL_LANGUAGE_CODE === "nl") ? "" : "/en"; ?>/wie-wij-zijn/" class="col-6 col-xl-3 bg-blue p-4 py-5">
            <img class="featured-xr-logo img-fluid" src="<?php echo get_theme_file_uri("assets/images/XR-symbol.svg"); ?>" />
            <h2 class="text-black mt-3">
                <?php echo (ICL_LANGUAGE_CODE === "nl") ? "Wie zijn wij" : "Who we are"; ?>
            </h2>
        </a>
        <a href="<?php echo (ICL_LANGUAGE_CODE === "nl") ? "" : "/en"; ?>/local/" class="col-6 col-xl-3 bg-pink p-4 py-5">
            <i class="fas fa-map-marked-alt fa-3x text-black"></i>
            <h2 class="text-black mt-3">
                <?php echo (ICL_LANGUAGE_CODE === "nl") ? "Lokale Groepen" : "Local Groups"; ?>
            </h2>
        </a>
    </div>
</div>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 demands">
            <h1><?php _e('OUR <span class="text-green">DEMANDS</span>', 'theme-xrnl'); ?></h1>
            <ol class="pl-3">
                <?php
                while ( have_rows('demands') ){
                    the_row();
                    ?>
                    <li class="pl-4">
                        <?php the_sub_field('demand'); ?>
                    </li>
                    <?php
                }
                ?>
            </ol>
        </div>
    </div>
</div>

<div class="bg-green py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-8 offset-lg-2">
                <h2><?php _e('JOIN THE REBELLION', 'theme-xrnl'); ?></h2>
                <?php the_field('signup_form_code'); ?>
            </div>
        </div>
    </div>
</div>

<?php if(have_rows('more_info')) { ?>
    <div class="container">
        <div class="row">
            <h2 class="col-12"><?php _e('More <span class="text-green">information</span>', 'theme-xrnl'); ?></h2>
        </div>
        <div class="row">
            <?php
            while (have_rows('more_info')) {
                the_row();
                ?>
                <div class="col-md-4 col-12">
                    <img src="<?php the_sub_field('image'); ?>"/>
                    <h3>
                        <?php the_sub_field('title'); ?>
                    </h3>
                    <?php the_sub_field('info'); ?>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
<?php } ?>

<div class="container py-5">
    <div class="row">
        <div class="col-12">
            <h2><?php _e('WHO IS <span class="text-green">EXTINCTION REBELLION</span>?', 'theme-xrnl'); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-lg-6">
            <?php the_content(); ?>
        </div>
        <div class="col-12 col-lg-6">
            <?php the_post_thumbnail(); ?>
        </div>
    </div>
</div>

<?php if(have_rows('media')) { ?>
    <div class="py-5 bg-green">
        <div class="container">
            <h2><?php _e('Media', 'theme-xrnl'); ?></h2>
            <div class="row">
                <?php
                while (have_rows('media')) {
                    the_row();
                    $embed = get_sub_field('embed_code');
                    if(preg_match('/(youtu\.be\/|youtube\.com\/(watch\?(.*&)?v=|(embed|v)\/))([^\?&"\'>]+)/', $embed, $matches)){
                        ?>
                        <div class="col-12 col-md-6">
                            <div class="embed-responsive embed-responsive-16by9 mb-3">
                                <?php echo $embed; ?>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
<?php } ?>

<?php get_footer(); ?>
