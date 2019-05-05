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


    <header class="container-fluid">

        <div class="col-xs-12">

            <nav class="navbar navbar-light" role="navigation">
                <a href="/" class="navbar-brand logo">
                    <?PHP echo wp_get_attachment_image( get_theme_mod( 'custom_logo' ), 'full'); ?>
                </a>

                <?php wp_nav_menu( [
                    'theme_location' => 'primary',
                    'depth'	          => 2,
                    'container'       => 'div',
                    'container_class' => '',
                    'container_id'    => 'desktop-nav',
                    'menu_class'      => 'navbar-nav mr-auto mt-2 mt-lg-0',
                    'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                    'walker'          => new WP_Bootstrap_Navwalker(),
                ] ); ?>

				<div class="social-donate-language">
					<div class="social-donate">
						
						<div class="social-nav social-nav--head">
							<ul>
								<li><a href="https://www.facebook.com/ExtinctionRebellionNL/" target="_blank" class="facebook" aria-label="facebook"><i class="fab fa-facebook-f"></i></a></li>
								<li><a href="https://twitter.com/nlrebellion" class="twitter" target="_blank" aria-label="twitter"><i class="fab fa-twitter"></i></a></li>
								<li><a href="https://www.instagram.com/extinctionrebellion/?hl=nl" target="_blank" class="insta" aria-label="instagram"><i class="fab fa-instagram"></i></a></li>
							</ul>
						</div>

						<div class="donate donate--head">
							<a href="/donate" class="btn btn--primary-dark"><?php _e('donate'); ?></a>
						</div>
						
					</div>
					
					<?php wp_nav_menu( [
						'theme_location' => 'language',
						'container'       => 'div',
						'container_id'    => 'language-selector',
						'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
						'menu_class'      => 'hide-mobile',
						'walker'          => new WP_Bootstrap_Navwalker(),
					] ); ?>
				</div>
				
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-nav" aria-controls="main-nav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <?php wp_nav_menu( [
                    'theme_location' => 'primary-mobile',
                    'depth'	          => 2,
                    'container'       => 'div',
                    'container_class' => 'collapse navbar-collapse',
                    'container_id'    => 'main-nav',
                    'menu_class'      => 'navbar-nav mr-auto mt-2 mt-lg-0',
                    'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                    'walker'          => new WP_Bootstrap_Navwalker(),
                ] ); ?>

            </nav>
        </div>
    </header>
	
    <main>
