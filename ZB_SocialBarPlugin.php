<?php
/**
 * Plugin Name: ZeroBase SocialBar
 * Plugin URI: https://github.com/rdeeb/ZeroBase-SocialBar
 * Description: Social Networking for your theme
 * Version: 0.3
 * Author: Ramy Deeb
 * Author URI: http://www.ramydeeb.com
 * License: Creative Commons Attribution-NonCommercial-NoDerivs 3.0 Unported License. http://creativecommons.org/licenses/by-nc-nd/3.0/.
 *
 * @author  Ramy Deeb <me@ramydeeb.com>
 * @package ZeroBase
 */

add_action( 'zerobase_load_plugins', 'hookSocialBarPluginToPlatform' );

function hookSocialBarPluginToPlatform(ZerobasePlatform $platform)
{

}