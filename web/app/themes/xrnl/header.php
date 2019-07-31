<!DOCTYPE html>
<html>
<head>
    <title>Extinction Rebellion - De Opstand Begint</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="extinctionrebellion-icon" href="images/favicon.png"/>
    <link rel="icon" href="images/favicon.png" type="image/x-icon"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link href="https://fonts.googleapis.com/css?family=Crimson+Text|Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="<?PHP echo get_theme_file_uri("dist/fonts/fucxed.css"); ?>" />
    <link rel="stylesheet" href="<?PHP echo get_theme_file_uri("dist/css/app.css".date("?Ymd")); ?>" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<meta name="google-site-verification" content="Oc-GUQaXHiPF-oVpMLzShjKqQTDGGZ3caVsE9t1Y5Kg" />
    <?PHP wp_head(); ?>
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

                <?php wp_nav_menu( [
                    'theme_location' => 'language',
                    'container'       => '',
                    'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                    'menu_class'      => 'navbar-nav language-menu ml-auto',
                    'walker'          => new WP_Bootstrap_Navwalker(),
                ] ); ?>

                <ul class="list-unstyled d-flex my-3 my-xl-0 align-items-center">
                    <li class="mx-3 mx-lg-2">
                        <a href="https://www.facebook.com/ExtinctionRebellionNL/" target="_blank" class="facebook" aria-label="facebook"><i class="fab text-black fa-facebook-f"></i></a></li>
                    <li class="mx-3 mx-lg-2">
                        <a href="https://twitter.com/nlrebellion" class="twitter" target="_blank" aria-label="twitter"><i class="fab text-black fa-twitter"></i></a></li>
                    <li class="mx-3 mx-lg-2">
                        <a href="https://www.instagram.com/extinctionrebellion/?hl=nl" target="_blank" class="insta" aria-label="instagram"><i class="fab text-black fa-instagram"></i></a></li>
                    <li class="mx-3 mx-lg-2">
                        <a href="/donate" class="btn btn--primary-dark"><?php _e('donate'); ?></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <main>
