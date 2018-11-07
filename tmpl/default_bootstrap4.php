<?php
/**
 * @copyright	Copyright © 2018 - All rights reserved.
 * @license		GNU General Public License v2.0
 * @author 		Sergio Iglesias (@sergiois)
 */
defined('_JEXEC') or die;
?>
<div id="<?php echo $module->module.$module->id; ?>" class="carousel slide" data-ride="carousel">
    <?php if($params->get('show_indicators')): ?>
    <ol class="carousel-indicators">
    <?php foreach($images as $key => $image) : ?>
        <?php reset($images); ?>
        <li data-target="#<?php echo $module->module.$module->id; ?>" data-slide-to="0" class="<?php if($key === key($images)): echo 'active'; endif; ?>"></li>
    <?php endforeach; ?>
    </ol>
    <?php endif; ?>
    <div class="carousel-inner">
    <?php foreach($images as $key => $image) : ?>
        <?php reset($images); ?>
        <div class="carousel-item<?php if($key === key($images)): echo ' active'; endif; ?>">
            <?php if($params->get('show_url')): ?>
                <a href="<?php echo $image->url; ?>" title="<?php echo $image->title; ?>">
            <?php endif; ?>
            <img class="d-block" src="<?php echo $image->image; ?>" alt="<?php echo $image->title; ?>" <?php if($params->get('width')): echo 'width="'.$params->get('width').'"'; endif; ?> <?php if($params->get('height')): echo 'height="'.$params->get('height').'"'; endif; ?>>
            <?php if($params->get('show_url')): ?>
                </a>
            <?php endif; ?>
            <?php if($params->get('show_title') || $params->get('show_description')): ?>
            <div class="carousel-caption d-none d-md-block">
                <?php if($params->get('show_title')): ?>
                <h5><?php echo $image->title; ?></h5>
                <?php endif; ?>
                <?php if($params->get('show_description')): ?>
                <p><?php echo $image->description; ?></p>
                <?php endif; ?>
            </div>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
    </div>
    <?php if($params->get('show_controls')): ?>
    <a class="carousel-control-prev" href="#<?php echo $module->module.$module->id; ?>" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#<?php echo $module->module.$module->id; ?>" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    <?php endif; ?>
</div>