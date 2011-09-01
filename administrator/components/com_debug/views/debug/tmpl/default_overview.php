<?php
/**
 * @version     $Id: default_overview.php 786 2011-07-14 01:09:23Z johanjanssens $
 * @category	Nooku
 * @package     Nooku_Components
 * @subpackage  Debug
 * @copyright   Copyright (C) 2011 Timble CVBA and Contributors. (http://www.timble.net).
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.nooku.org
 */
defined('KOOWA') or die( 'Restricted access' ); ?>

<h4>
<?= @text('Memory : ') ?>
<?= $memory; ?>
</h4>

<h4>
<?= @text('Queries : ') ?>
<?= count($queries);?>
</h4>