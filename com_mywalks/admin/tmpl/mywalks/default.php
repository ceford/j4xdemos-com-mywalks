<?php
/**
 * @package     Mywalks.Administrator
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

$listOrder = $this->escape($this->state->get('list.ordering'));
$listDirn  = $this->escape($this->state->get('list.direction'));
$states = array (
		'0' => Text::_('JUNPUBLISHED'),
		'1' => Text::_('JPUBLISHED'),
		'2' => Text::_('JARCHIVED'),
		'-2' => Text::_('JTRASHED')
);
$editIcon = '<span class="fa fa-pen-square me-2" aria-hidden="true"></span>';
?>A1111 2
<form action="<?php echo Route::_('index.php?option=com_mywalks'); ?>" method="post" name="adminForm" id="adminForm">
	<?php echo LayoutHelper::render('joomla.searchtools.default', array('view' => $this)); ?>
	<?php if (empty($this->items)) : ?>
		<div class="alert alert-info">
			<span class="fa fa-info-circle" aria-hidden="true"></span><span class="sr-only"><?php echo Text::_('INFO'); ?></span>
			<?php echo Text::_('JGLOBAL_NO_MATCHING_RESULTS'); ?>
		</div>
	<?php else : ?>aaaaaa1
		<table class="table" id="mywalksList">
			<thead>
				<tr>
					<td class="w-5 text-center">
						<?php echo HTMLHelper::_('grid.checkall'); ?>
					</td>
					<th scope="col" style="min-width:85px" class="w-5 text-center">
						<?php echo HTMLHelper::_('searchtools.sort', 'JSTATUS', 'a.state', $listDirn, $listOrder); ?>
					</th>
					<th scope="col" class="w-20">
						<?php echo HTMLHelper::_('searchtools.sort', 'JGLOBAL_TITLE', 'a.title', $listDirn, $listOrder); ?>
					</th>
					<th scope="col" class="w-25">
						<?php echo HTMLHelper::_('searchtools.sort', 'COM_MYWALKS_MYWALKS_LABEL_DESCRIPTION', 'a.description', $listDirn, $listOrder); ?>
					</th>
					<th scope="col" class="w-10">
						<?php echo HTMLHelper::_('searchtools.sort', 'COM_MYWALKS_MYWALKS_LABEL_DISTANCE', 'a.distance', $listDirn, $listOrder); ?>
					</th>
					<th scope="col" class="w-10">
						<?php echo HTMLHelper::_('searchtools.sort', 'COM_MYWALKS_MYWALKS_LABEL_NVISITS', 'nvisits', $listDirn, $listOrder); ?>
					</th>
					<th scope="col" class="w-5 d-none d-md-table-cell">
						<?php echo HTMLHelper::_('searchtools.sort', 'COM_MYWALKS_MYWALKS_LABEL_TOILETS', 'a.toilets', $listDirn, $listOrder); ?>
					</th>
					<th scope="col" class="w-5 d-none d-md-table-cell">
						<?php echo HTMLHelper::_('searchtools.sort', 'COM_MYWALKS_MYWALKS_LABEL_CAFE', 'a.cafe', $listDirn, $listOrder); ?>
					</th>
					<th scope="col" class="w-5 d-none d-md-table-cell">
						<?php echo HTMLHelper::_('searchtools.sort', 'COM_MYWALKS_MYWALKS_LABEL_HILLS', 'a.hills', $listDirn, $listOrder); ?>
					</th>
					<th scope="col" class="w-5 d-none d-md-table-cell">
						<?php echo HTMLHelper::_('searchtools.sort', 'COM_MYWALKS_MYWALKS_LABEL_BOGS', 'a.bogs', $listDirn, $listOrder); ?>
					</th>
					<th scope="col" class="w-5 d-none d-md-table-cell">
						<?php echo HTMLHelper::_('searchtools.sort', 'JGRID_HEADING_ID', 'a.id', $listDirn, $listOrder); ?>
					</th>
				</tr>
			</thead>
			<tbody>
			<?php
			$n = count($this->items);
			foreach ($this->items as $i => $item) :
				?>
				<tr class="row<?php echo $i % 2; ?>">
					<td class="text-center">
						<?php echo HTMLHelper::_('grid.id', $i, $item->id); ?>
					</td>
					<td class="article-status">
						<?php echo $states[$item->state]; ?>
					</td>
					<th scope="row" class="has-context">
						<a class="hasTooltip" href="<?php echo Route::_('index.php?option=com_mywalks&task=mywalk.edit&id=' . $item->id); ?>">
							<?php echo $editIcon; ?><?php echo $this->escape($item->title); ?>
						</a>
					</th>
					<td class="">
						<?php echo $item->description; ?>
					</td>
					<td class="">
						<?php echo $item->distance; ?>
					</td>
					<td class="">
						<a href="index.php?option=com_mywalks&view=mywalk_dates&walk_id=<?php echo $item->id; ?>">
						<?php echo $editIcon; ?><?php echo $item->nvisits; ?></a>
					</td>
					<td class="d-none d-md-table-cell">
						<?php echo $item->toilets; ?>
					</td>
					<td class="d-none d-md-table-cell">
						<?php echo $item->cafe; ?>
					</td>
					<td class="d-none d-md-table-cell">
						<?php echo $item->hills; ?>
					</td>
					<td class="d-none d-md-table-cell">
						<?php echo $item->bogs; ?>
					</td>
					<td class="d-none d-md-table-cell">
						<?php echo $item->id; ?>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>

		<?php // load the pagination. ?>
		<?php echo $this->pagination->getListFooter(); ?>

	<?php endif; ?>
	<input type="hidden" name="task" value="">
	<input type="hidden" name="boxchecked" value="0">
	<?php echo HTMLHelper::_('form.token'); ?>
</form>
