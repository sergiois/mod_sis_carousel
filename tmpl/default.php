<?php
/**
 * @copyright	Copyright © 2018 - All rights reserved.
 * @license		GNU General Public License v2.0
 * @author 		Sergio Iglesias (@sergiois)
 */
defined('_JEXEC') or die;
$client = JFactory::getApplication()->client;
if($client->mobile && $params->get('touchswipe', 0)):
$doc = JFactory::getDocument();
$doc->addScript(Juri::base() . 'modules/mod_sis_carousel/assets/js/jquery.touchSwipe.min.js');
$js = 'jQuery(function() {
    jQuery("#'.$module->module.$module->id.'").swipe( {
        swipeStatus:function(event, phase, direction, distance, duration, fingers, fingerData, currentDirection)
        {
            if (direction == "left")
            {   
                jQuery(this).carousel("next");
            }
            if (direction == "right")
            {
                jQuery(this).carousel("prev");
            }
        },
    });
});';
$doc->addScriptDeclaration($js);
endif;
?>
<div id="<?php echo $module->module.$module->id; ?>" class="carousel slide" data-ride="carousel">
    <?php if($params->get('show_indicators')): ?>
    <ol class="carousel-indicators">
    <?php $i = 0; ?>
    <?php foreach($images as $key => $image) : ?>
        <?php reset($images); ?>
        <li data-target="#<?php echo $module->module.$module->id; ?>" data-slide-to="<?php echo $i; ?>" class="<?php if($key === key($images)): echo 'active'; endif; ?>"></li>
        <?php $i++; ?>
    <?php endforeach; ?>
    </ol>
    <?php endif; ?>
    <div class="carousel-inner" role="listbox">
    <?php foreach($images as $key => $image) : ?>
        <?php reset($images); ?>
        <div class="item<?php if($key === key($images)): echo ' active'; endif; ?>">
            <?php if($params->get('show_url')): ?>
                <a href="<?php echo $image->url; ?>" title="<?php echo $image->title; ?>" target="<?php echo $image->open_link; ?>">
            <?php endif; ?>
            <img src="<?php echo $image->image; ?>" alt="<?php echo $image->title; ?>" <?php if($params->get('width')): echo 'width="'.$params->get('width').'"'; endif; ?> <?php if($params->get('height')): echo 'height="'.$params->get('height').'"'; endif; ?>>
            <?php if($params->get('show_url')): ?>
                </a>
            <?php endif; ?>
            <?php if($params->get('show_title') || $params->get('show_description')): ?>
            <div class="carousel-caption d-none d-md-block">
                <?php if($params->get('show_title')): ?>
                <h3><?php echo $image->title; ?></h3>
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
    <a class="left carousel-control" href="#<?php echo $module->module.$module->id; ?>" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#<?php echo $module->module.$module->id; ?>" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    <?php endif; ?>
</div>