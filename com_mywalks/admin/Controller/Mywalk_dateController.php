<?php
/**
 * @package     Mywalks.Administrator
 * @subpackage  com_mywalks
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace J4xdemos\Component\Mywalks\Administrator\Controller;

defined('_JEXEC') or die;

use Joomla\CMS\MVC\Controller\FormController;

/**
 * Controller for a single mywalk
 *
 * @since  1.6
 */
class Mywalk_dateController extends FormController
{
	public function cancel($key = null) {
		$this->setRedirect('index.php?option=com_mywalks&view=mywalk_dates');
	}
}
