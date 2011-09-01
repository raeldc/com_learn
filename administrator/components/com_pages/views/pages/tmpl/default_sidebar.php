<?php
/**
 * @version     $Id: default_sidebar.php 2629 2011-09-01 03:04:20Z johanjanssens $
 * @category    Nooku
 * @package     Nooku_Server
 * @subpackage  Pages
 * @copyright   Copyright (C) 2011 Timble CVBA and Contributors. (http://www.timble.net).
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.nooku.org
 */

defined('KOOWA') or die('Restricted access') ?>

<div id="sidebar">
	<h3><?= @text('Menus'); ?></h3>
	<?= @template('com://admin/pages.view.menus.list', array('state' => $state, 'menus' => KFactory::get('com://admin/pages.model.menus')->getList())); ?>
</div>