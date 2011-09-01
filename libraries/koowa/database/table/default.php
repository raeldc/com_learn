<?php
/**
 * @version		$Id: default.php 3821 2011-09-01 02:16:06Z johanjanssens $
 * @category	Koowa
 * @package     Koowa_Database
 * @subpackage  Table
 * @copyright	Copyright (C) 2007 - 2010 Johan Janssens. All rights reserved.
 * @license		GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link     	http://www.nooku.org
 */

/**
 * Default Database Table Class
 *
 * @author		Johan Janssens <johan@nooku.org>
 * @category	Koowa
 * @package     Koowa_Database
 * @subpackage  Table
 */
class KDatabaseTableDefault extends KDatabaseTableAbstract
{
	/**
     * Force creation of a singleton
     *
     * @return KDatabaseTableDefault
     */
    public static function instantiate($config = array())
    {
        static $instance;
        
        if ($instance === NULL) 
        {
            //Create the singleton
            $classname = $config->identifier->classname;
            $instance = new $classname($config);
        }
        
        return $instance;
    }
}