<?php
/*
Plugin Name: Profile Profiler
Plugin URI:
Description: Profile Profiles allows to show the user's profile clearly in articles.
Version: 1.0.0
Author: fumikoi
Author URI: http://tabippo.net
License: GPL2
*/
/*  Copyright 2017/03/10 fumikoi(fumikoi@tabippo.net)
    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
     published by the Free Software Foundation.
    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

class Profile_Profiler {
  public function __construct() {
    add_action('admin_menu', array($this, 'pp_add_plugin_menu'));
    add_shortcode('pprofile', 'Profile_Profiler::create_profile');
  }

  public static function create_profile($atts, $content = null) {
    $html = get_site_option('pp_html');
    $default_img = get_site_option('pp_default_img');

    extract(shortcode_atts(array(
        'name' => '',
        'img_url' => get_template_directory_uri().'/'.$default_img,
    ), $atts));

    $html = str_replace("%img%", $img_url, $html);
    $html = str_replace("%name%", $name, $html);
    $html = str_replace("%profile%", $content, $html);

    return $html;
  }

  function pp_add_plugin_menu() {
    add_options_page(
      'Profile Profiler',
      'Profile Profiler',
      'manage_options',
      'profile_profiler',
      'Profile_Profiler::pp_show_plugin_page'
    );
    register_setting(
      'pp-group',
      'pp_html',
      'Profile_Profiled::pp_register_html'
    );
    register_setting(
      'pp-group',
      'pp_default_img',
      'Profile_Profiled::pp_register_default_img'
    );
  }

  public static function pp_show_plugin_page() {
    include_once('views/pp_settings.php');
  }

  public static function pp_register_html() {
  }
  public static function pp_register_default_img() {
  }
}

$Class_Profile_Profiler = new Profile_Profiler;
?>
