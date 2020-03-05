<?php
/**
 * The template for displaying posts for volunteer positions
 */

get_header(); ?>

<div class="container mt-5">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
<div class="row">
        <div class="col-12">
        <h3><?php the_title(); ?></h3>
        </header>
        </div>
    </div>
    <?php $role = json_decode(get_the_content()); ?>
    <p><?php echo $role->title ?></p>
    
</div> 
<?php get_footer(); ?>