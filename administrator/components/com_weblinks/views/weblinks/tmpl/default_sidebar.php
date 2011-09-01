<?
/**
 * @version		$Id: default_sidebar.php 2631 2011-09-01 03:04:50Z johanjanssens $
 * @category	Nooku
 * @package     Nooku_Server
 * @subpackage  Weblinks
 * @copyright	Copyright (C) 2011 Timble CVBA and Contributors. (http://www.timble.net)
 * @license		GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link		http://www.nooku.org
 */

defined('KOOWA') or die('Restricted access'); ?>

<div id="sidebar">
	<h3><?= @text('Categories') ?></h3>
	<?= @template('com://admin/categories.view.categories.list', array('categories' => KFactory::get('com://admin/categories.model.categories')->section('com_weblinks')->sort('title')->getList())); ?>
</div>