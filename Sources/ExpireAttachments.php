<?php/** * * @package Expire Attachments mod * @version 1.0 * @author Jessica González <suki@missallsunday.com> * @copyright Copyright (c) 2013, Jessica González * @license http://www.mozilla.org/MPL/MPL-1.1.html */if (!defined('SMF'))	die('No direct access...');class ExpireAttachments{	public static $name = 'ExpireAttachments';	public static $shortName = 'ExAt';	public static function Activity_Bar_settings(&$config_vars)	{		global $txt;		if (!isset($txt['ExAt_modName']))			loadLanguage(__CLASS__);		$config_vars[] = $txt['Activity_Bar_title'];		$config_vars[] = array('check', 'Activity_Bar_enable');		$config_vars[] = array('check', 'Activity_Bar_show_in_posts');		$config_vars[] = array('check', 'Activity_Bar_show_in_profile');		$config_vars[] = array('text', 'Activity_Bar_label');		$config_vars[] = array('int', 'Activity_Bar_timeframe');		$config_vars[] = array('int', 'Activity_Bar_max_posts');		$config_vars[] = array('int', 'Activity_Bar_max_width');		$config_vars[] = '';	}}