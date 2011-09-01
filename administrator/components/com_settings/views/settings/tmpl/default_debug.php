<?php
/**
 * @version     $Id: default_debug.php 2582 2011-08-23 22:16:58Z tomjanssens $
 * @category    Nooku
 * @package     Nooku_Server
 * @subpackage  Settings
 * @copyright   Copyright (C) 2011 Timble CVBA and Contributors. (http://www.timble.net).
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.nooku.org
 */
defined('KOOWA') or die( 'Restricted access' ); ?>

<section>
	<h3><?= @text( 'Debug' ); ?></h3>
	<table class="admintable" cellspacing="1">
		<tbody>
		<tr>
			<td class="key">
				<span class="editlinktip hasTip" title="<?= @text( 'Enable Debugging' ); ?>::<?= @text('TIPDEBUGGINGINFO'); ?>">
					<?= @text( 'Debug System' ); ?>
				</span>
			</td>
			<td>
				<?= @helper('select.booleanlist' , array('name' => 'settings[system][debug]', 'selected' => $settings->debug));?>
			</td>
		</tr>
		<tr>
			<td class="key">
				<span class="editlinktip hasTip" title="<?= @text( 'Debug Language' ); ?>::<?= @text('TIPDEBUGLANGUAGE'); ?>">
					<?= @text( 'Debug Language' ); ?>
				</span>
			</td>
			<td>
				<?= @helper('select.booleanlist' , array('name' => 'settings[system][debug_lang]', 'selected' => $settings->debug_lang));?>
			</td>
		</tr>
		<tr>
			<td class="key">
				<span class="editlinktip hasTip" title="<?= @text( 'Error Reporting' ); ?>::<?= @text( 'TIPERRORREPORTING' ); ?>">
					<?= @text( 'Error Reporting' ); ?>
				</span>
			</td>
			<td>
				<?= @helper('listbox.error_reportings', array('name' => 'settings[system][error_reporting]', 'selected' => $settings->error_reporting)); ?>
			</td>
		</tr>
	</table>
</section>
