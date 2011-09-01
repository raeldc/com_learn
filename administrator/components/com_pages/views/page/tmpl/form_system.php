<?php
/**
 * @version     $Id: form_system.php 2629 2011-09-01 03:04:20Z johanjanssens $
 * @category    Nooku
 * @package     Nooku_Server
 * @subpackage  Pages
 * @copyright   Copyright (C) 2011 Timble CVBA and Contributors. (http://www.timble.net).
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.nooku.org
 */

defined('KOOWA') or die('Restricted access') ?>
<? $model = KFactory::get('com://admin/pages.model.pages') ?>

<? $system_parameters = $model->getSystemParameters() ?>
<? if($rendered_parameters = $system_parameters->render('params')) : ?>
<?= @helper('tabs.startPanel', array('title' => 'System')); ?>
<section>
	<fieldset>
		<?= $rendered_parameters ?>
	</fieldset>
</section>
<?= @helper('tabs.endPanel'); ?>
<? endif ?>