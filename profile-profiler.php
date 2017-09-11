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

// 参考になりそうなURL
// https://plugins.trac.wordpress.org/browser/pz-linkcard/tags/2.0.3#js
class Profile_Profiler {
  public function __construct() {
    add_action('admin_menu', array($this, 'add_menu'));

    // shortcode
    // http://www.webopixel.net/wordpress/53.html
  }

  public function add_menu() {
    add_options_page(
      'Profile Profiler',
      'Profile Profiler',
      'manage_options',
      'profile_profiler',
      'pp_show_plugin_page'
    );
  }
}

$Class_Profile_Profiler = new Profile_Profiler;
?>
