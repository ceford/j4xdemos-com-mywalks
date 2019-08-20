<?php
/**
 * @package     Mywalks.Site
 * @subpackage  com_mywalks
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace J4xdemos\Component\Mywalks\Site\View\Mywalks;

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
//use Joomla\CMS\HTML\HTMLHelper;
//use Joomla\CMS\Language\Text;
use Joomla\CMS\MVC\View\GenericDataException;
use Joomla\CMS\MVC\View\HtmlView as BaseHtmlView;
//use Joomla\CMS\Router\Route;

/**
 * Walks List View class
 *
 * @since  1.6
 */
class HtmlView extends BaseHtmlView
{
	/**
	 * The item model state
	 *
	 * @var    \Joomla\Registry\Registry
	 * @since  1.6.0
	 */
	protected $state;

	/**
	 * The item details
	 *
	 * @var    \JObject
	 * @since  1.6.0
	 */
	protected $items;

	/**
	 * The pagination object
	 *
	 * @var    \JPagination
	 * @since  1.6.0
	 */
	protected $pagination;

	/**
	 * The page parameters
	 *
	 * @var    \Joomla\Registry\Registry|null
	 * @since  4.0.0
	 */
	protected $params = null;

	/**
	 * Method to display the view.
	 *
	 * @param   string  $tpl  The name of the template file to parse; automatically searches through the template paths.
	 *
	 * @return  mixed  \Exception on failure, void on success.
	 *
	 * @since   1.6
	 */
	public function display($tpl = null)
	{
		$app    = Factory::getApplication();
		$params = $app->getParams();

		// Get some data from the models
		$state      = $this->get('State');
		$items      = $this->get('Items');
		$pagination = $this->get('Pagination');

		// Flag indicates to not add limitstart=0 to URL
		$pagination->hideEmptyLimitstart = true;

		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			throw new GenericDataException(implode("\n", $errors), 500);
		}

		$this->state      = &$state;
		$this->items      = &$items;
		$this->params     = &$params;
		$this->pagination = &$pagination;

		return parent::display($tpl);
	}
}
