<?PHP
/*
Theme name: XRNL
 */
get_header();

the_post();
?>

<div class="masthead">
	<?php if(ICL_LANGUAGE_CODE === "nl"): ?>
		<h1>
			<span class="first">Kom in</span>
			<span class="second">opstand</span>
			<span class="third">voor het</span>
			<span class="fourth">leven</span>
		</h1>
	<?php else: ?>
		<h1>
			<span class="fourth">Rebel</span>
			<span class="first">for life</span>
		</h1>
	<?php endif; ?>
	<a href="#details" class="d-block my-5">
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
            <img class="featured-xr-logo img-fluid" src="<?PHP echo get_theme_file_uri("assets/images/XR-symbol.svg"); ?>" />
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
            <h1><?PHP _e('OUR <span class="text-green">DEMANDS</span>', 'theme-xrnl'); ?></h1>
            <ol class="pl-3">
                <?PHP
                while ( have_rows('demands') ){
                    the_row();
                    ?>
                    <li class="pl-4">
                        <?PHP the_sub_field('demand'); ?>
                    </li>
                    <?PHP
                }
                ?>
            </ol>
        </div>
    </div>

</div>

<div class="bg-green py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2><?PHP _e('JOIN THE REBELLION', 'theme-xrnl'); ?></h2>
            </div>
        </div>
        <?PHP

            the_field('signup_form_code');
            /*
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $body = <<<EOF
Name: {$_POST['firstname']} {$_POST['lastname']}
Email: {$_POST['email']}
Postcode: {$_POST['postcode']}
Phone: {$_POST['phone']}
Newsletter: {$_POST['newsletter']}
EOF;

            mail('xr-nl-contact@protonmail.com', 'contact form from XR-NL', $body);
            ?>
            <div class="row">
                <div class="col-sm-12 block">

                    <p>Thanks for registering</p>
                </div>
            </div>
            <?PHP
        }else{
        ?>
        <form class="row" method="post">
            <div class="col-lg-6 col-md-12">
                <div class="form-group">
                    <label for="firstname">Voornaam</label>
                    <input name="firstname" id="firstname" class="form-control" />
                </div>

                <div class="form-group">
                    <label for="lastname">Achternaam</label>
                    <input name="lastname" id="lastname" class="form-control" />
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input name="email" id="email" class="form-control" />
                </div>

                <div class="form-group">
                    <label for="postcode">Postcode</label>
                    <input name="postcode" id="postcode" class="form-control" />
                </div>

                <div class="form-group">
                    <label for="phone">Telefoonnummer</label>
                    <input name="phone" id="phone" class="form-control" />
                </div>


            </div>
            <div class="col-lg-6 col-md-12">

                <p><br/>
                    GDPR Toestemming: ik geef hierbij mijn
                    toestemming aan Extinction Rebellion om contact
                    met me op te nemen, gebruikmakende van de
                    informatie die ik heb verstrekt in dit formulier,
                    voor nieuws, updates en informatie over events.
                </p>

                <div class="form-check">
                    <input type="radio" name="gdpr" value="ok" class="form-check-input" id="gdpr-yes" required aria-required="true" />
                    <label class="form-check-label" for="gdpr-yes">I agree</label>
                </div>

                <p>Wil je email updates van de Extinction Rebellion
                    ontvangen?</p>


                <div class="form-check">
                    <input type="radio" name="newsletter" value="yes" class="form-check-input" id="newsletter-yes" />
                    <label class="form-check-label" for="newsletter-yes">Ja, ik ontvang graag email updates</label>
                </div>


                <div class="form-check">
                    <input type="radio" name="newsletter" value="no" class="form-check-input" id="newsletter-no" />
                    <label class="form-check-label" for="newsletter-no">Nee, ik wil geen updates ontvangen</label>
                </div>
            </div>

            <div class="col-md-12 col-lg-6 text-center">

                <button type="submit" class="btn btn-black">Doe mee aan de rebellion</button>

            </div>

        </form>
        <?PHP }
            */
        ?>
    </div>
</div>

<?PHP if(have_rows('more_info')) { ?>
    <div class="container">
        <div class="row">
            <h2 class="col-12"><?PHP _e('More <span class="text-green">information</span>', 'theme-xrnl'); ?></h2>
        </div>
        <div class="row">
            <?PHP
            while (have_rows('more_info')) {
                the_row();
                ?>
                <div class="col-md-4 col-12">
                    <img src="<?PHP the_sub_field('image'); ?>"/>
                    <h3>
                        <?PHP the_sub_field('title'); ?>
                    </h3>
                    <?PHP the_sub_field('info'); ?>
                </div>
                <?PHP
            }
            ?>
        </div>
    </div>
    <?PHP
}
?>


<div class="container py-5">

    <div class="row">
        <div class="col-12">
            <h1>
                <h2><?PHP _e('WHO IS <span class="text-green">EXTINCTION REBELLION</span>?', 'theme-xrnl'); ?></h1>
        </div>
    </div>


    <div class="row">
        <div class="col-sm-12 col-lg-6">
            <?PHP the_content(); ?>
        </div>

        <div class="col-12 col-lg-6">
            <?PHP the_post_thumbnail(); ?>
        </div>
    </div>
</div>

<?PHP

if(have_rows('media')) { ?>
    <div class="bg-green">
        <div class="container container-media">
            <div class="row">
                <h2 class="col-12"><?PHP _e('Media', 'theme-xrnl'); ?></h2>
            </div>
            <div class="row">
                <?PHP
                while (have_rows('media')) {
                    the_row();
                    $embed = get_sub_field('embed_code');
                    if(preg_match('/(youtu\.be\/|youtube\.com\/(watch\?(.*&)?v=|(embed|v)\/))([^\?&"\'>]+)/', $embed, $matches)){
                        ?>
                        <div class="col-12 col-md-6">
                            <?PHP echo $embed; ?>
                        </div>
                        <?PHP
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <?PHP
}

get_footer();
