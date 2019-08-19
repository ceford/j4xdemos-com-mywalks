<?php
/**
 * @package     Mywalks.Site
 * @subpackage  com_mywalks
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
//use Joomla\CMS\Layout\LayoutHelper;

HTMLHelper::_('behavior.core');

?>
<h1><?php echo Text::_('COM_MYWALKS_LIST_PAGE_HEADING'); ?></h1>
<div class="com-contact-categories categories-list">
	<?php
		echo $this->loadTemplate('items');
	?>
</div>
