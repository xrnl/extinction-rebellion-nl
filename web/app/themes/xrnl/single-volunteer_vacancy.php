<?php
/**
 * The template for displaying posts for volunteer positions
 */

get_header(); ?>

<div class="container mb-4">
<a href="/volunteer" class="btn btn-blue my-4"><i class="fas fa-arrow-left"></i> View all roles</a>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<header>
<h2 class="font-xr text-uppercase"><?php the_title(); ?></h2>
</header>
<?php $role = json_decode(get_the_content()); ?>
<div class="row">
<div class="col-12">
    <h4><?php echo $role->localGroup ?>, <?php echo $role->workingGroup ?></h4>
    <h6 class="text-muted">Published on <?php the_date(); ?></h6>
    <h5 class="role-section-header">Responsibilities</h5>
    <?php 
    echo '<ul>';
    echo '<li>' . implode( '</li><li>', $role->responsibilities) . '</li>';
    echo '</ul>';
    ?>
    <h5 class="role-section-header">Description</h5>
    <p><?php echo $role->description ?></p>
    <?php if($role->requirements): ?>
    <h5 class="role-section-header">Requirements</h5>
    <p><?php echo $role->requirements ?></p>
    <?php endif; ?>
    <h5 class="role-section-header">Time commitment</h5>
    <p><?php echo $role->timeCommitment->min ?> - <?php echo $role->timeCommitment->max ?> hours / week</p>
    <h4 class="font-xr text-uppercase">Apply</h3>
    <p>Contact the role aide to apply or to learn more about the role.</p>
    <div class="mt-2">
        <div>
            <i class="fas fa-envelope mr-2"></i>
            <b>Email: </b>
            <a href="mailto:<?php echo $role->email ?>?subject=Role application: <?php echo $role->title ?>" target="_blank">
            <?php echo $role->email ?>
            </a>
        </div>
        <div>
            <i class="fas fa-comment mr-2"></i>
            <b>Mattermost: </b><a href="https://organise.earth/xr-netherlands/messages/<?php echo $role->mattermostId ?>" target="_blank">
            <?php echo $role->mattermostId ?>
            </a>
        </div>
        <?php if($role->phone): ?>
        <div>
            <i class="fas fa-phone mr-2"></i>
            <b>Phone: </b><a href="tel:<?php echo $role->phone ?>" target="_blank">
            <?php echo $role->phone ?>
            </a>
        </div>
        <?php endif; ?>
    </div>
</div>        
</div>
</div> 
<?php get_footer(); ?>