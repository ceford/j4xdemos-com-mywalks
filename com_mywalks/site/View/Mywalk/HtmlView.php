<?php
/**
 * @package     Mywalks.Site
 * @subpackage  com_mywalks
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Joomla\Component\Mywalks\Site\View\Mywalk;

defined('_JEXEC') or die;

//use Joomla\CMS\HTML\HTMLHelper;
//use Joomla\CMS\Language\Text;
use Joomla\CMS\MVC\View\GenericDataException;
use Joomla\CMS\MVC\View\HtmlView as BaseHtmlView;

/**
 * HTML Mywalk View class for the Mywalks component
 *
 * @since  1.5
 */
class HtmlView extends BaseHtmlView
{
	/**
	 * The item model state
	 *
	 * @var    \Joomla\Registry\Registry
	 * @since  1.6
	 */
	protected $state;

	/**
	 * The item object details
	 *
	 * @var    \JObject
	 * @since  1.6
	 */
	protected $item;
	protected $reports;

	/**
	 * Execute and display a template script.
	 *
	 * @param   string  $tpl  The name of the template file to parse; automatically searches through the template paths.
	 *
	 * @return  mixed  A string if successful, otherwise an Error object.
	 */
	public function display($tpl = null)
	{
		$state      = $this->get('State');
		$item       = $this->get('Item');
		$reports    = $this->get('Reports');

		$this->state       = &$state;
		$this->item        = &$item;
		$this->reports     = &$reports;

		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			throw new GenericDataException(implode("\n", $errors), 500);
		}

		return parent::display($tpl);
	}
}
