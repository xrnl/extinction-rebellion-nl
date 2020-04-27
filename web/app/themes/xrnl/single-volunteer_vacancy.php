<?php
/**
 * The template for displaying posts for volunteer positions
 */

get_header(); ?>

<div class="container mb-4">
    <?php 
    $volunteerPage = $translated_page = icl_object_id(51, 'page', true); // 51 is page ID
    $volunteerPageURL = get_permalink( $volunteerPage );
    ?>
<a href="<?php echo $volunteerPageURL ?>" class="btn btn-blue my-4"><i class="fas fa-arrow-left"></i> 
<?php _e('View all roles', 'theme-xrnl'); ?>
</a>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<header>
<h2 class="font-xr text-uppercase"><?php the_title(); ?></h2>
</header>
<?php $role = json_decode(get_the_content()); ?>
<div class="row">
<div class="col-12">
    <h4><?php echo $role->localGroup ?>, <?php echo $role->workingGroup ?></h4>
    <h6 class="text-muted">
        <?php _e('Published on', 'theme-xrnl'); ?> 
        <?php the_date(); ?></h6>
    <h5 class="role-section-header">
        <?php _e('Responsibilities', 'theme-xrnl'); ?> 
    </h5>
    <p><?php echo $role->responsibilities ?></p>
    <?php if($role->description): ?>
    <h5 class="role-section-header">
        <?php _e('Description', 'theme-xrnl'); ?> 
    </h5>
    <p><?php echo $role->description ?></p>
    <?php endif; ?>
    <?php if($role->requirements): ?>
    <h5 class="role-section-header">
    <?php _e('Requirements', 'theme-xrnl'); ?>
    </h5>
    <p><?php echo $role->requirements ?></p>
    <?php endif; ?>
    <h5 class="role-section-header">
    <?php _e('Time commitment', 'theme-xrnl'); ?>
    </h5>
    <p><?php echo $role->timeCommitment->min ?> - <?php echo $role->timeCommitment->max ?> <?php _e('hours / week', 'theme-xrnl'); ?></p>
    <h4 class="font-xr text-uppercase"><?php _e('Apply', 'theme-xrnl'); ?></h3>
    <p>
    <?php _e('Contact the role aide to apply or to learn more about the role.', 'theme-xrnl'); ?>
    </p>
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
            <b><?php _e('Phone', 'theme-xrnl'); ?>: </b><a href="tel:<?php echo $role->phone ?>" target="_blank">
            <?php echo $role->phone ?>
            </a>
        </div>
        <?php endif; ?>
    </div>
</div>        
</div>
</div> 
<?php get_footer(); ?>
