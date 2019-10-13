<?php
/**
 * @copyright	Copyright © 2018 - All rights reserved.
 * @license		GNU General Public License v2.0
 * @author 		Sergio Iglesias (@sergiois)
 */
defined('_JEXEC') or die;

$images	= $params->get("images");
$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'), ENT_COMPAT, 'UTF-8');
$layout = $params->get('layout', 'default').''.$params->get('templateframework');
if(count((array)$images)):
    require JModuleHelper::getLayoutPath('mod_sis_carousel', $layout);
endif;