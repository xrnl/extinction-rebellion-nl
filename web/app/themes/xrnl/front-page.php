<?PHP
/*
Theme name: XRNL
 */
get_header();

the_post();
?>
<div class="container">

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

<div class="row blocks">
	<div class="col-12 col-md-6 block_1">
		<div class="padding">
		<?php the_field('blok'); ?>
		</div>
	</div>
	<div class="col-6 col-md-3 block_2">
		<div class="padding">
		<?php the_field('blok_2'); ?>
		</div>
	</div>
	<div class="col-6 col-md-3 block_3">
		<div class="padding">
		<?php the_field('blok_3'); ?>
		</div>
	</div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8 demands">
            <h1><?PHP _e('OUR <span class="text-green">DEMANDS</span>', 'theme-xrnl'); ?></h1>
            <ol>
                <?PHP
                while ( have_rows('demands') ){
                    the_row();
                    ?>
                    <li>
                        <?PHP the_sub_field('demand'); ?>
                    </li>
                    <?PHP
                }
                ?>
            </ol>
        </div>
    </div>

</div>

<div class="bg-green">
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