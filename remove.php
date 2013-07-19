<?php

/**
 *
 * @package Expire Attachments mod
 * @version 1.0
 * @author Jessica González <suki@missallsunday.com>
 * @copyright Copyright (c) 2013, Jessica González
 * @license http://www.mozilla.org/MPL/MPL-1.1.html
 */

if (file_exists(dirname(__FILE__) . '/SSI.php') && !defined('SMF'))
	require_once(dirname(__FILE__) . '/SSI.php');

elseif (!defined('SMF'))
	exit('<b>Error:</b> Cannot install - please verify you put this in the same place as SMF\'s index.php.');

$hooks = array(
	'integrate_admin_include' => '$sourcedir/ExpireAttachments.php',
	'integrate_general_mod_settings' => 'ExpireAttachments::settings',
);

$call = 'remove_integration_function';

foreach ($hooks as $hook => $function)
	$call($hook, $function);

// Yes... a whole file just for replacing "add" with "remove"... I'm glad you finally passed the newbie phase where you didn't know how to remove a hook manually. This is for those of us who haven't figured it out yet.
