<?php
/**
 * @package     Mywalks.Administrator
 * @subpackage  com_mywalks
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Associations;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Layout\LayoutHelper;
use Joomla\CMS\Router\Route;
use Joomla\CMS\MVC\View\GenericDataException;

HTMLHelper::_('behavior.formvalidator');
HTMLHelper::_('behavior.keepalive');

$app = Factory::getApplication();
$walk_id = $app->getUserState('com_mywalks.walk_id');

if (empty($walk_id)) {
	throw new GenericDataException("\nThe walk id was not set!\n", 500);
}

// Fieldsets to not automatically render by /layouts/joomla/edit/params.php
$this->ignore_fieldsets = array('details', 'item_associations', 'jmetadata');
$this->useCoreUI = true;
?>

<form action="<?php echo Route::_('index.php?option=com_mywalks&view=mywalk_date&layout=edit&id=' . (int) $this->item->id); ?>" method="post" name="adminForm" id="mywalk-dates-form" class="form-validate">

	<?php echo LayoutHelper::render('joomla.edit.title_alias', $this); ?>

	<div>
		<?php echo HTMLHelper::_('uitab.startTabSet', 'myTab', array('active' => 'details')); ?>

		<?php echo HTMLHelper::_('uitab.addTab', 'myTab', 'details', Text::_('COM_MYWALKS_MYWALK_DATE_TAB_DETAILS')); ?>
		<div class="row">
			<div class="col-md-9">
				<div class="row">
					<div class="col-md-6">
						<?php echo $this->form->renderField('date'); ?>
						<?php echo $this->form->renderField('weather'); ?>
						<?php echo $this->form->renderField('id'); ?>
						<?php $this->form->setValue('walk_id', null, $walk_id); ?>
						<?php echo $this->form->renderField('walk_id'); ?>
					</div>
					<div class="col-md-6">
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="card card-light">
					<div class="card-body">
						<?php echo LayoutHelper::render('joomla.edit.global', $this); ?>
					</div>
				</div>
			</div>
		</div>
		<?php echo HTMLHelper::_('uitab.endTab'); ?>

		<?php echo HTMLHelper::_('uitab.endTabSet'); ?>
	</div>
	<input type="hidden" name="task" value="">
	<input type="hidden" name="walk_id" value="<?php echo $walk_id; ?>">
	<?php echo HTMLHelper::_('form.token'); ?>
</form>
