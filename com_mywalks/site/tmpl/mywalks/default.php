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
use Joomla\CMS\Layout\LayoutHelper;
use Joomla\CMS\Router\Route;
use itconnect\Component\Mywalks\Site\Helper\RouteHelper as MywalksHelperRoute;

$listOrder = $this->escape($this->state->get('list.ordering'));
$listDirn  = $this->escape($this->state->get('list.direction'));

?>

<h1><?php echo Text::_('COM_MYWALKS_LIST_PAGE_HEADING'); ?></h1>

<form action="<?php echo Route::_('index.php?option=com_mywalks'); ?>" method="post" name="adminForm" id="adminForm">

<?php echo LayoutHelper::render('joomla.searchtools.default', array('view' => $this)); ?>

<div class="table-responsive">
  <table class="table table-striped">
  <thead>
    <tr>
 		<th scope="col">
			<?php echo HTMLHelper::_('searchtools.sort', 'JGLOBAL_TITLE', 'a.title', $listDirn, $listOrder); ?>
		</th>
		<th scope="col"><?php echo Text::_('COM_MYWALKS_LIST_DESCRIPTION'); ?></th>
		<th scope="col">
			<?php echo HTMLHelper::_('searchtools.sort', 'COM_MYWALKS_LIST_DISTANCE', 'a.distance', $listDirn, $listOrder); ?>
		</th>
		<th scope="col">
			<?php echo Text::_('COM_MYWALKS_LIST_LAST_VISIT'); ?>
		</th>
		<th scope="col">
			<?php echo Text::_('COM_MYWALKS_LIST_NVISITS'); ?>
		</th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($this->items as $id => $item) :
		$slug = preg_replace('/[^a-z\d]/i', '-', $item->title);
		$slug = strtolower(str_replace(' ', '-', $slug));
	?>
	<tr>
		<td><a href="<?php echo Route::_(MywalksHelperRoute::getWalkRoute($item->id, $slug)); ?>">
		<?php echo $item->title; ?></a></td>
		<td><?php echo $item->description; ?></td>
		<td><?php echo $item->distance; ?></td>
		<td><?php echo $item->last_visit //$item->lastvisit; ?></td>
		<td><?php echo $item->nvisits; ?></td>
	</tr>
	<?php endforeach; ?><?php //endif; ?>
	</tbody>
  </table>
</div>

<?php echo $this->pagination->getListFooter(); ?>

<input type="hidden" name="task" value="">
<input type="hidden" name="boxchecked" value="0">
<?php echo HTMLHelper::_('form.token'); ?>

</form>