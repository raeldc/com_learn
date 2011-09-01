<?php
/**
 * @version     $Id: mod_logged.php 2634 2011-09-01 03:05:24Z johanjanssens $
 * @category    Nooku
 * @package     Nooku_Server
 * @subpackage  Banners
 * @copyright   Copyright (C) 2011 Timble CVBA and Contributors. (http://www.timble.net).
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.nooku.org
 */

/**
 * Module Users
 *
 * @author      Johan Janssens <http://nooku.assembla.com/profile/johanjanssens>
 * @category    Nooku
 * @package     Nooku_Server
 * @subpackage  Banners
 */

echo KFactory::get('mod://admin/logged.html')
    	->module($module)
    	->attribs($attribs)
    	->display();