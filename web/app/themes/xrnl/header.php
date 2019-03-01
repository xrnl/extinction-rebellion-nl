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
    <?PHP wp_head(); ?>
</head>
<body>


    <header class="container-fluid">

        <div class="col-xs-12">

            <nav class="navbar navbar-light" role="navigation">
                <a href="/" class="navbar-brand logo">
                    <?PHP echo wp_get_attachment_image( get_theme_mod( 'custom_logo' ), 'full'); ?>
                </a>
    <!--            <div class="container">-->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-nav" aria-controls="main-nav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <?php wp_nav_menu( [
                    'theme_location' => 'primary',
                    'depth'	          => 2,
                    'container'       => 'div',
                    'container_class' => 'collapse navbar-collapse',
                    'container_id'    => 'main-nav',
                    'menu_class'      => 'navbar-nav mr-auto mt-2 mt-lg-0',
                    'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                    'walker'          => new WP_Bootstrap_Navwalker(),
                ] ); ?>

    <!--            </div>-->
            </nav>
        </div>
    </header>

    <main>
