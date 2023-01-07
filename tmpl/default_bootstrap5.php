<?php
/**
 * @copyright	Copyright © 2022 - All rights reserved.
 * @license		GNU General Public License v2.0
 * @author 		Sergio Iglesias (@sergiois)
 */

use Joomla\CMS\HTML\HTMLHelper;

defined('_JEXEC') or die;

HTMLHelper::_('bootstrap.carousel', '.selector');
?>
<div id="<?php echo $module->module.$module->id; ?>" <?php if(!(int)$params->get('slide_move', 0)){ echo 'data-bs-interval="false"'; } ?>  data-bs-ride="carousel" class="carousel slide <?php if($params->get('fade_effect', 0)){ echo 'carousel-fade'; } ?>">
    <?php if($params->get('show_indicators')): ?>
	<div class="carousel-indicators">
    <?php $i = 0; ?>
    <?php foreach($images as $key => $image) : ?>
        <?php reset($images); ?>
        <button type="button" data-bs-target="#<?php echo $module->module.$module->id; ?>" data-bs-slide-to="<?php echo $i; ?>" <?php if($key === key($images)): echo 'class="active" aria-current="true"'; endif; ?>></button>
        <?php $i++; ?>
    <?php endforeach; ?>
    </div>
    <?php endif; ?>
    <div class="carousel-inner">
    <?php foreach($images as $key => $image) : ?>
        <?php reset($images); ?>
        <div class="carousel-item<?php if($key === key($images)): echo ' active'; endif; ?>">
            <?php if($params->get('show_url')): ?>
                <a href="<?php echo $image->url; ?>" target="<?php echo $image->open_url; ?>" title="<?php echo $image->title; ?>">
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
	<button class="carousel-control-prev" type="button" data-bs-target="#<?php echo $module->module.$module->id; ?>" data-bs-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="visually-hidden">Previous</span>
	</button>
	<button class="carousel-control-next" type="button" data-bs-target="#<?php echo $module->module.$module->id; ?>" data-bs-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="visually-hidden">Next</span>
	</button>
    <?php endif; ?>
</div>