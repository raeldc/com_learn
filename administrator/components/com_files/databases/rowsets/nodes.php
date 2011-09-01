<?php
/**
 * @version     $Id: nodes.php 860 2011-08-12 11:18:55Z johanjanssens $
 * @category	Nooku
 * @package     Nooku_Server
 * @subpackage  Files
 * @copyright   Copyright (C) 2011 Timble CVBA and Contributors. (http://www.timble.net).
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.nooku.org
 */

/**
 * Nodes Database Rowset Class
 *
 * @author      Ercan Ozkaya <http://nooku.assembla.com/profile/ercanozkaya>
 * @category	Nooku
 * @package     Nooku_Server
 * @subpackage  Files   
 */

class ComFilesDatabaseRowsetNodes extends KDatabaseRowsetAbstract
{
    protected function _initialize(KConfig $config)
    {
        $config->append(array(
            'identity_column' => 'path'
        ));

        parent::_initialize($config);
    }
}