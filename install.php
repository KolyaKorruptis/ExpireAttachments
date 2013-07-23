<?php

/**
 *
 * @package Expire Attachments mod
 * @version 1.0
 * @author Jessica Gonz�lez <suki@missallsunday.com>
 * @copyright Copyright (c) 2013, Jessica Gonz�lez
 * @license http://www.mozilla.org/MPL/MPL-1.1.html
 */

	if (file_exists(dirname(__FILE__) . '/SSI.php') && !defined('SMF'))
		require_once(dirname(__FILE__) . '/SSI.php');

	elseif (!defined('SMF'))
		exit('<b>Error:</b> Cannot install - please verify you put this in the same place as SMF\'s index.php.');

	global $smcFunc, $context;

	db_extend('packages');

	if (empty($context['uninstalling']))
	{
		$smcFunc['db_add_column'](
			'{db_prefix}attachments',
			array(
				'name' => 'expire_date',
				'type' => 'int',
				'size' => 10,
				'null' => false
			),
			array(),
			'update',
			null
		);

		// Create the scheduled task
			$smcFunc['db_insert'](
				'insert',
				'{db_prefix}scheduled_tasks',
				array(
					'id_task' => 'int',
					'next_time' => 'int',
					'time_offset' => 'int',
					'time_regularity' => 'int',
					'time_unit' => 'string',
					'disabled' => 'int',
					'task' => 'string',
				),
				array(
					0, 0, 0, 1, 'd', 0, 'attachments_expire_date',
				),
				array(
					'id_task',
				)
			);
	}
