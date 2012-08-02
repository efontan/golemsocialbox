<?php 

/**
 * @package ElGolem
 * @subpackage mod_golemsocialbox
 * @version   1.3.2 - 02/08/2012
 * @author    Emmanuel Fontan
 * @copyright (C) 2012 Emmanuel Fontan (email : fontanemmanel@gmail.com)
 *
 * @license		GNU/GPL, see LICENSE.php
 * This program is free software: you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation, either version 3 of the License, or
 (at your option) any later version.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with this program.  If not, see http://www.gnu.org/licenses/.
 *
 *
 */

defined('_JEXEC') or die('Restricted access');

// Include the helper file
require_once (dirname(__FILE__).DS.'helper.php');

$golemsocialbox = modGolemSocialBoxHelper::get_golemsocialbox( $params );

require(JModuleHelper::getLayoutPath('mod_golemsocialbox'));

?>
