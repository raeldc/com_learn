<?php
/**
 * @version     $Id: executable.php 2265 2011-07-18 18:01:25Z johanjanssens $
 * @category    Nooku
 * @package     Nooku_Server
 * @subpackage  Settings
 * @copyright   Copyright (C) 2011 Timble CVBA and Contributors. (http://www.timble.net).
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.nooku.org
 */

/**
 * Executable Controller Behavior
 *
 * @author      Johan Janssens <http://nooku.assembla.com/profile/johanjanssens>
 * @category    Nooku
 * @package     Nooku_Server
 * @subpackage  Settings
 */
class ComSettingsControllerBehaviorExecutable extends ComDefaultControllerBehaviorExecutable
{  
    public function canAdd()
    {
        return false; 
    }
    
    public function canDelete()
    { 
        return false; 
    }
}