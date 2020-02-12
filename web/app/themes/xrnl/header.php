<!DOCTYPE html>
<html>
<head>
    <meta charSet="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <meta name="google-site-verification" content="Oc-GUQaXHiPF-oVpMLzShjKqQTDGGZ3caVsE9t1Y5Kg" />
    <link rel="icon" href="<?php echo get_theme_file_uri("assets/images/favicon.png") ?>" type="image/x-icon" />

    <link href="https://fonts.googleapis.com/css?family=Crimson+Text|Montserrat" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo get_theme_file_uri("dist/fonts/fucxed.css"); ?>" />
    <link rel="stylesheet" href="<?php echo get_theme_file_uri("dist/css/app.css".date("?Ymd")); ?>" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous" />

    <?php wp_head(); ?>
</head>
<body>
    <header class="bg-green">
        <nav class="navbar navbar-light navbar-expand-xl" role="navigation">
            <a href="<?php echo (ICL_LANGUAGE_CODE === "nl") ? "" : "/en"; ?>/" class="navbar-brand">
                <?PHP echo wp_get_attachment_image( get_theme_mod( 'custom_logo' ), 'full', false, array( "class" => "img-fluid", "width" => "150" )); ?>
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-nav" aria-controls="main-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="main-nav">
                <?php wp_nav_menu( [
                    'theme_location' => 'primary',
                    'depth'	          => 2,
                    'container'       => '',
                    'menu_class'      => 'navbar-nav',
                    'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                    'walker'          => new WP_Bootstrap_Navwalker(),
                ] ); ?>

                <div class="ml-auto d-flex">
                    <?php wp_nav_menu( [
                        'theme_location' => 'language',
                        'container'       => '',
                        'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                        'menu_class'      => 'navbar-nav language-menu',
                        'walker'          => new WP_Bootstrap_Navwalker(),
                    ] ); ?>
                </div>

                <ul class="list-unstyled d-flex my-3 my-xl-0 align-items-center">
                    <li class="mx-3 mx-lg-2">
                        <a href="https://www.facebook.com/ExtinctionRebellionNL/" target="_blank" class="facebook" aria-label="facebook"><i class="fab text-black fa-facebook-f"></i></a></li>
                    <li class="mx-3 mx-lg-2">
                        <a href="https://twitter.com/nlrebellion" class="twitter" target="_blank" aria-label="twitter"><i class="fab text-black fa-twitter"></i></a></li>
                    <li class="mx-3 mx-lg-2">
                        <a href="https://www.instagram.com/extinctionrebellionnl/?hl=nl" target="_blank" class="insta" aria-label="instagram"><i class="fab text-black fa-instagram"></i></a></li>
                    <li class="mx-3 mx-lg-2">
                        <a href="/donate" class="btn btn-black"><?php _e('donate'); ?></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <main>
