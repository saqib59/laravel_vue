<?php
/**
* @package w_a_p_l
* @version 1.0
*/
/*
Plugin Name: Login Register 96
Plugin URI: #
Description: Custom Login Register
Version: 1.0
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: ul_pro
Author URI: #
*/
/*
Copyright (C) Year  Author  Email : charlestsmith888@gmail.com
Woocommerce Advanced plugin layout is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as
published by the Free Software Foundation.
Woocommerce Advanced plugin layout is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.
You should have received a copy of the GNU General Public License
along with Woocommerce Advanced plugin layout; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

define('CHI_PATH', dirname(__FILE__));
$plugin = plugin_basename(__FILE__);
define('CHI_URL', plugin_dir_url($plugin));

require CHI_PATH.'/inc/LoginRegister96.php';
require CHI_PATH.'/inc/login_register_menu.php';
require CHI_PATH.'/inc/CHI_ajax.php';

