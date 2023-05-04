<?php
/**
 * @package     Mywalks.Administrator
 * @subpackage  com_mywalks
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace J4xdemos\Component\Mywalks\Administrator\Helper;

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\Database\ParameterType;

/**
 * Mywalks component helper.
 *
 * @since  4.0
 */
class MywalksHelper
{
	public static function getWalkTitle($id)
	{
		if (empty($id))
		{
			// throw an error or ...
			return false;
		}
		$db = Factory::getDbo();
		$query = $db->getQuery(true);
		$query->select($db->quoteName('title'))
		->from($db->quoteName('#__mywalks'))
		->where('id = :id')
		->bind(':id', $id, ParameterType::INTEGER);
		$db->setQuery($query);
		return $db->loadObject();
	}
}