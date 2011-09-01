<?php
/**
 * @version     $Id: banners.php 2644 2011-09-01 03:07:20Z johanjanssens $
 * @category    Nooku
 * @package     Nooku_Server
 * @subpackage  Banners
 * @copyright   Copyright (C) 2011 Timble CVBA and Contributors. (http://www.timble.net).
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.nooku.org
 */

/**
 * Component Loader
 *
 * @author      Cristiano Cucco <http://nooku.assembla.com/profile/cristiano.cucco>
 * @category    Nooku
 * @package     Nooku_Server
 * @subpackage  Banners    
 */

KLoader::load('com://site/banners.mappings');

echo KFactory::get('com://site/banners.dispatcher')->dispatch();