<?php

/**
 * Plugin Name: Picture A Day Plugin
 * Description: My first plugin
 * Version: 1.0.0
 * Author: Alex
 */

 // Include admin stuff (menu item, settings page)
 require_once __DIR__ . "/admin/pictureaday-plugin-admin.php";
 // Include public stuff (shortcode)
 require_once __DIR__ . "/public/pictureaday-plugin-public.php";