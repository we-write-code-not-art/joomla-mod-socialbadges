<?php
/**
 * Social Badges
 *
 * @version 	1.0.0
 * @author		Michael Allen <michael@we-write-code-not-art.com>
 * @license 	GNU/GPL v.3 or later.
 */
 
// no direct access
defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Language\Multilanguage;
use Joomla\CMS\Router\Route;

class modSocialBadgesHelper {	
	public static function getBadges($params) {
    $badges = [
        'facebook' => [
            'title' => 'Facebook',
            'url'   => 'www.facebook.com/',
        ],
        'google' => [
            'title' => 'Google',
            'url'   => 'plus.google.com/+',
        ],
        'twitter' => [
            'title' => 'Twitter',
            'url'   => 'twitter.com/',
        ],
        'instagram' => [
            'title' => 'Instagram',
            'url'   => 'instagram.com/',
        ],
        'Pinterest' => [
            'title' => 'Pinterest',
            'url'   => 'www.pinterest.com/',
        ],
        'youtube' => [
            'title' => 'Youtube',
            'url'   => 'www.youtube.com/user/',
        ],
        'flickr' => [
            'title' => 'Flickr',
            'url'   => 'flickr.com/photos/',
        ],
        'linkedin' => [
            'title' => 'LinkedIn',
            'url'   => 'linkedin.com/in/',
        ],
        'tumblr' => [
            'title' => 'Tumblr',
            'url'   => '/',
        ],
        'tiktok' => [
            'title' => 'Tiktok',
            'url'   => '/',
        ],
        'snapchat' => [
            'title' => 'Snapchat',
            'url'   => '/',
        ],
        'wordpress' => [
            'title' => 'Wordpress',
            'url'   => '/',
        ],
        'vimeo' => [
            'title' => 'Vimeo',
            'url'   => '/',
        ],
        'yelp' => [
            'title' => 'Yelp',
            'url'   => '/',
        ],
    ];

    $badge_list = $params->get('badge_list', []);

    if (!empty($badge_list)) {
      foreach ($badge_list as $badge_form) {
        $decoded[$badge_form->badge_fields->type]['title'] = $badges[$badge_form->badge_fields->type]['title'];
        $decoded[$badge_form->badge_fields->type]['url'] = "http://" . $badges[$badge_form->badge_fields->type]['url'] . $badge_form->badge_fields->id;
      }
    }
	
		$about=$params->get('about');
		$contact=$params->get('contact');
		
		if($about!='') {
			$decoded["about"]["title"]='About';
			$decoded["about"]["url"]=modSocialBadgesHelper::getURL($about);
		}

		if($contact!='') {
			$decoded["contact"]["title"]='Contact';
			$decoded["contact"]["url"]=modSocialBadgesHelper::getURL($contact);
		}
		
    return $decoded;
  }
  
	private static function getURL($menuItemID) {
    $app  = Factory::getApplication();
    $menu = $app->getMenu();
    $item = $menu->getItem((int) $menuItemID);

    if (!$item)
    {
      return '';
    }

    $lang = '';

    if (Multilanguage::isEnabled() && $item->language !== '*')
    {
        $lang = '&lang=' . $item->language;
    }

    $url = 'index.php?Itemid=' . $item->id . $lang;

    return Route::_($url);
  }
}
