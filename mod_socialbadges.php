<?php
/**
 * Social Badges
 *
 * @package     Joomla
 * @subpackage  mod_socialbadges
 *
 * @copyright   Copyright(C) Michael E Allen
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Helper\ModuleHelper;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Uri\Uri;
use Joomla\CMS\Language\Text;

require_once dirname(__FILE__).'/helper.php';

$app             = Factory::getApplication();
$doc             = Factory::getDocument();

// Detecting Active Variables
$option   = $app->input->getCmd('option', '');
$view     = $app->input->getCmd('view', '');
$layout   = $app->input->getCmd('layout', '');
$task     = $app->input->getCmd('task', '');
$itemid   = $app->input->getCmd('Itemid', '');

$doc->addStyleSheet($templatePath . 'modules/mod_socialbadges/media/css/style.css');

$badges = modSocialBadgesHelper::getBadges($params);
$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));

require JModuleHelper::getLayoutPath('mod_socialbadges', $params->get('layout', 'default'));
