<?php
/**
 * @version		$Id: users.php 2630 2011-09-01 03:04:40Z johanjanssens $
 * @category	Nooku
 * @package		Nooku_Server
 * @subpackage	Users
 * @copyright	Copyright (C) 2011 Timble CVBA and Contributors. (http://www.timble.net).
 * @license		GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link		http://www.nooku.org
 */

/**
 * Component Loader
 *
 * @author      Gergo Erdosi <http://nooku.assembla.com/profile/gergoerdosi>
 * @category	Nooku
 * @package     Nooku_Server
 * @subpackage  Sections    
 */

//if (!KFactory::get('joomla:user')->authorize( 'com_users', 'manage' )) {
//	KFactory::get('koowa:application')->redirect( 'index.php', JText::_('ALERTNOTAUTH') );
//}

echo KFactory::get('com://admin/users.dispatcher')->dispatch();