<?php
/*
 * Plugin Name: Gallery Master - Photo Gallery - Image Gallery - Photo Albums - WordPress Gallery Plugin
 * Plugin URI: https://gallery-master.tech-banker.com
 * Description: Gallery Master - Responsive Gallery Images, Photo Albums in Gallery Widget, Images Gallery, Media Gallery, Filterable Portfolio, Gallery Lightbox.
 * Author: Tech Banker
 * Author URI: https://gallery-master.tech-banker.com
 * Version: 2.0.7
 * License: GPLv3
 * Text Domain: gallery-master
 * Domain Path: /languages
 */
if (!defined("ABSPATH")) {
   exit;
} // Exit if accessed directly

/* Constant Declaration */

if (!defined("GALLERY_MASTER_PLUGIN_DIR_PATH")) {
   define("GALLERY_MASTER_PLUGIN_DIR_PATH", plugin_dir_path(__FILE__));
}

if (!defined("GALLERY_MASTER_PLUGIN_DIRNAME")) {
   define("GALLERY_MASTER_PLUGIN_DIRNAME", plugin_basename(dirname(__FILE__)));
}

if (!defined("GALLERY_MASTER_MAIN_DIR")) {
   define("GALLERY_MASTER_MAIN_DIR", dirname(dirname(dirname(__FILE__))) . "/gallery-master/");
}

if (!defined("GALLERY_MASTER_UPLOAD_DIR")) {
   define("GALLERY_MASTER_UPLOAD_DIR", GALLERY_MASTER_MAIN_DIR . "original-uploads/");
}

if (!defined("GALLERY_MASTER_THUMBS_CROPPED_DIR")) {
   define("GALLERY_MASTER_THUMBS_CROPPED_DIR", GALLERY_MASTER_MAIN_DIR . "thumbs-cropped/");
}

if (!defined("GALLERY_MASTER_THUMBS_NON_CROPPED_DIR")) {
   define("GALLERY_MASTER_THUMBS_NON_CROPPED_DIR", GALLERY_MASTER_MAIN_DIR . "thumbs-non-cropped/");
}
if (!defined("tech_banker_stats_url")) {
   define("tech_banker_stats_url", "http://stats.tech-banker-services.org");
}
if (!defined("GALLERY_MASTER_ORIGINAL_DIR")) {
   define("GALLERY_MASTER_ORIGINAL_DIR", GALLERY_MASTER_MAIN_DIR . "original-images/");
}

if (!defined("GALLERY_MASTER_ALBUMS_ORIGINAL_DIR")) {
   define("GALLERY_MASTER_ALBUMS_ORIGINAL_DIR", GALLERY_MASTER_MAIN_DIR . "albums-original-images/");
}
if (!defined("GALLERY_MASTER_USER_VIEWS_PATH")) {
   define("GALLERY_MASTER_USER_VIEWS_PATH", GALLERY_MASTER_PLUGIN_DIR_PATH . "user-views/");
}

if (!defined("GALLERY_MASTER_PLUGIN_DIR_URL")) {
   define("GALLERY_MASTER_PLUGIN_DIR_URL", plugin_dir_url(__FILE__));
}

if (!defined("GALLERY_MASTER_MAIN_URL")) {
   define("GALLERY_MASTER_MAIN_URL", WP_CONTENT_URL . "/gallery-master/");
}

if (!defined("GALLERY_MASTER_ORIGINAL_URL")) {
   define("GALLERY_MASTER_ORIGINAL_URL", WP_CONTENT_URL . "/gallery-master/original-images/");
}

if (!defined("GALLERY_MASTER_THUMBS_CROPPED_URL")) {
   define("GALLERY_MASTER_THUMBS_CROPPED_URL", WP_CONTENT_URL . "/gallery-master/thumbs-cropped/");
}

if (!defined("GALLERY_MASTER_THUMBS_NON_CROPPED_URL")) {
   define("GALLERY_MASTER_THUMBS_NON_CROPPED_URL", WP_CONTENT_URL . "/gallery-master/thumbs-non-cropped/");
}
if (!defined("gallery_master_wizard_version_number")) {
   define("gallery_master_wizard_version_number", "2.0.7");
}
if (is_ssl()) {
   if (!defined("tech_banker_url")) {
      define("tech_banker_url", "https://tech-banker.com");
   }
   if (!defined("tech_banker_gallery_url")) {
      define("tech_banker_gallery_url", "https://gallery-master.tech-banker.com/");
   }
} else {
   if (!defined("tech_banker_url")) {
      define("tech_banker_url", "http://tech-banker.com");
   }
   if (!defined("tech_banker_gallery_url")) {
      define("tech_banker_gallery_url", "http://gallery-master.tech-banker.com/");
   }
}

if (!is_dir(GALLERY_MASTER_MAIN_DIR)) {
   wp_mkdir_p(GALLERY_MASTER_MAIN_DIR);
}
if (!is_dir(GALLERY_MASTER_UPLOAD_DIR)) {
   wp_mkdir_p(GALLERY_MASTER_UPLOAD_DIR);
}
if (!is_dir(GALLERY_MASTER_THUMBS_NON_CROPPED_DIR)) {
   wp_mkdir_p(GALLERY_MASTER_THUMBS_NON_CROPPED_DIR);
}
if (!is_dir(GALLERY_MASTER_THUMBS_CROPPED_DIR)) {
   wp_mkdir_p(GALLERY_MASTER_THUMBS_CROPPED_DIR);
}
if (!is_dir(GALLERY_MASTER_ORIGINAL_DIR)) {
   wp_mkdir_p(GALLERY_MASTER_ORIGINAL_DIR);
}

$memory_limit_gallery_master = intval(ini_get("memory_limit"));
if (!extension_loaded('suhosin') && $memory_limit_gallery_master < 512) {
   @ini_set("memory_limit", "1024M");
}
@ini_set("max_execution_time", 6000);

/*
  Function Name: install_script_for_gallery_master
  Parameter: No
  Description: This function is used to include install script for gallery master
  Created On: 01-06-2017 09:00
  Created By: Tech Banker Team
 */
function install_script_for_gallery_master() {
   global $wpdb;
   if (is_multisite()) {
      $blog_ids = $wpdb->get_col("SELECT blog_id FROM $wpdb->blogs");
      foreach ($blog_ids as $blog_id) {
         switch_to_blog($blog_id);
         $version = get_option("gallery-master-key");
         if ($version < "2.0") {
            if (file_exists(GALLERY_MASTER_PLUGIN_DIR_PATH . "lib/install-script.php")) {
               include GALLERY_MASTER_PLUGIN_DIR_PATH . "lib/install-script.php";
            }
         }
         restore_current_blog();
      }
   } else {
      $version = get_option("gallery-master-key");
      if ($version < "2.0") {
         if (file_exists(GALLERY_MASTER_PLUGIN_DIR_PATH . "lib/install-script.php")) {
            include_once GALLERY_MASTER_PLUGIN_DIR_PATH . "lib/install-script.php";
         }
      }
   }
}
/*
  Function Name: gallery_master
  Parameter: no
  Description: This function is used for creating a parent table.
  Created On: 01-06-2017 09:00
  Created By: Tech Banker Team
 */
function gallery_master_parent() {
   global $wpdb;
   return $wpdb->prefix . "gallery_master";
}
/*
  Function Name: gallery_master_meta
  Parameter: no
  Description: This function is used for creating a meta table.
  Created On: 01-06-2017 09:00
  Created By: Tech Banker Team
 */
function gallery_master_meta() {
   global $wpdb;
   return $wpdb->prefix . "gallery_master_meta";
}
/*
  Function Name: check_user_roles_gallery_master
  Parameters: Yes($user)
  Description: This function is used for checking roles of different users.
  Created On: 01-06-2017 09:00
  Created By: Tech Banker Team
 */
function check_user_roles_gallery_master($user = null) {
   $user = $user ? new WP_User($user) : wp_get_current_user();
   return $user->roles ? $user->roles[0] : false;
}
/*
  Function Name: get_others_capabilities_gallery_master
  Parameters: No
  Description: This function is used to get all the roles available in WordPress
  Created On: 01-06-2017 09:00
  Created By: Tech Banker Team
 */
function get_others_capabilities_gallery_master() {
   $user_capabilities = array();
   if (function_exists("get_editable_roles")) {
      foreach (get_editable_roles() as $role_name => $role_info) {
         foreach ($role_info["capabilities"] as $capability => $values) {
            if (!in_array($capability, $user_capabilities)) {
               array_push($user_capabilities, $capability);
            }
         }
      }
   } else {
      $user_capabilities = array(
          "manage_options",
          "edit_plugins",
          "edit_posts",
          "publish_posts",
          "publish_pages",
          "edit_pages",
          "read"
      );
   }
   return $user_capabilities;
}
if (is_admin()) {

   /*
     Function Name: backend_js_css_for_gallery_master
     Parameter: no
     Description:	This is used for calling a js and css backend function.
     Created On: 01-06-2017 09:00
     Created By: Tech Banker Team
    */
   function backend_js_css_for_gallery_master($hook) {
      $pages_gallery_master = array(
          "gm_welcome_gallery_master",
          "gallery_master",
          "gm_other_settings",
          "gm_add_gallery",
          "gm_sort_galleries",
          "gm_manage_albums",
          "gm_add_album",
          "gm_sort_albums",
          "gm_add_tag",
          "gm_manage_tags",
          "gm_thumbnail_layout",
          "gm_masonry_layout",
          "gm_slideshow_layout",
          "gm_image_browser_layout",
          "gm_justified_grid_layout",
          "gm_blog_style_layout",
          "gm_compact_album_layout",
          "gm_extended_album_layout",
          "gm_custom_css",
          "gm_fancy_box",
          "gm_color_box",
          "gm_foo_box_free_edition",
          "gm_nivo_lightbox",
          "gm_lightcase",
          "gm_global_options",
          "gm_filter_settings",
          "gm_lazy_load_settings",
          "gm_search_box_settings",
          "gm_order_by_settings",
          "gm_page_navigation",
          "gm_watermark_settings",
          "gm_advertisement",
          "gm_thumbnail_layout_shortcode",
          "gm_masonry_layout_shortcode",
          "gm_slideshow_layout_shortcode",
          "gm_image_browser_layout_shortcode",
          "gm_justified_grid_layout_shortcode",
          "gm_blog_style_layout_shortcode",
          "gm_roles_and_capabilities",
          "gm_feature_requests",
          "gm_system_information"
      );
      $datatable_pages_gallery_master = array(
          "gallery_master",
          "gm_manage_albums",
          "gm_add_gallery",
          "gm_manage_tags",
          "gm_roles_and_capabilities"
      );
      $layout_pages_gallery_master = array(
          "gm_thumbnail_layout",
          "gm_masonry_layout",
          "gm_slideshow_layout",
          "gm_image_browser_layout",
          "gm_justified_grid_layout",
          "gm_blog_style_layout",
          "gm_compact_album_layout",
          "gm_extended_album_layout",
          "gm_custom_css",
          "gm_fancy_box",
          "gm_color_box",
          "gm_foo_box_free_edition",
          "gm_nivo_lightbox",
          "gm_lightcase",
          "gm_global_options",
          "gm_filter_settings",
          "gm_lazy_load_settings",
          "gm_search_box_settings",
          "gm_order_by_settings",
          "gm_page_navigation",
          "gm_watermark_settings",
          "gm_advertisement"
      );
      if (strpos($hook, "post") !== false) {
         wp_enqueue_script("jquery");
         wp_enqueue_script("custom.js", GALLERY_MASTER_PLUGIN_DIR_URL . "assets/global/plugins/custom/js/custom.js");
         wp_enqueue_script("toastr.js", GALLERY_MASTER_PLUGIN_DIR_URL . "assets/global/plugins/toastr/toastr.js");
         wp_enqueue_style("gallery-master-custom.css", GALLERY_MASTER_PLUGIN_DIR_URL . "assets/admin/layout/css/gallery-master-custom.css");
         if (is_rtl()) {
            wp_enqueue_style("gallery-master-bootstrap.css", GALLERY_MASTER_PLUGIN_DIR_URL . "assets/global/plugins/custom/css/custom-rtl.css");
            wp_enqueue_style("tech-banker-custom-rtl.css", GALLERY_MASTER_PLUGIN_DIR_URL . "assets/admin/layout/css/tech-banker-custom-rtl.css");
         } else {
            wp_enqueue_style("gallery-master-bootstrap.css", GALLERY_MASTER_PLUGIN_DIR_URL . "assets/global/plugins/custom/css/custom.css");
            wp_enqueue_style("tech-banker-custom.css", GALLERY_MASTER_PLUGIN_DIR_URL . "assets/admin/layout/css/tech-banker-custom.css");
         }
         wp_enqueue_style("gallery-master-toastr.min.css", GALLERY_MASTER_PLUGIN_DIR_URL . "assets/global/plugins/toastr/toastr.css");
      }
      if (isset($_REQUEST["page"])) {
         $page_url = $_REQUEST["page"];
         if (in_array($page_url, $pages_gallery_master)) {
            wp_enqueue_script("jquery");
            wp_enqueue_script("custom.js", GALLERY_MASTER_PLUGIN_DIR_URL . "assets/global/plugins/custom/js/custom.js");
            wp_enqueue_script("jquery.validate.js", GALLERY_MASTER_PLUGIN_DIR_URL . "assets/global/plugins/validation/jquery.validate.js");
            wp_enqueue_script("toastr.js", GALLERY_MASTER_PLUGIN_DIR_URL . "assets/global/plugins/toastr/toastr.js");
            wp_enqueue_style("simple-line-icons.css", GALLERY_MASTER_PLUGIN_DIR_URL . "assets/global/plugins/icons/icons.css");
            wp_enqueue_style("components.css", GALLERY_MASTER_PLUGIN_DIR_URL . "assets/global/css/components.css");
            wp_enqueue_style("gallery-master-custom.css", GALLERY_MASTER_PLUGIN_DIR_URL . "assets/admin/layout/css/gallery-master-custom.css");
            if (is_rtl()) {
               wp_enqueue_style("gallery-master-bootstrap.css", GALLERY_MASTER_PLUGIN_DIR_URL . "assets/global/plugins/custom/css/custom-rtl.css");
               wp_enqueue_style("gallery-master-layout-rtl.css", GALLERY_MASTER_PLUGIN_DIR_URL . "assets/admin/layout/css/layout-rtl.css");
               wp_enqueue_style("tech-banker-custom-rtl.css", GALLERY_MASTER_PLUGIN_DIR_URL . "assets/admin/layout/css/tech-banker-custom-rtl.css");
            } else {
               wp_enqueue_style("gallery-master-bootstrap.css", GALLERY_MASTER_PLUGIN_DIR_URL . "assets/global/plugins/custom/css/custom.css");
               wp_enqueue_style("gallery-master-layout.css", GALLERY_MASTER_PLUGIN_DIR_URL . "assets/admin/layout/css/layout.css");
               wp_enqueue_style("tech-banker-custom.css", GALLERY_MASTER_PLUGIN_DIR_URL . "assets/admin/layout/css/tech-banker-custom.css");
            }
            wp_enqueue_script("jquery.clipboard.js", GALLERY_MASTER_PLUGIN_DIR_URL . "assets/global/plugins/clipboard/clipboard.js");
            wp_enqueue_style("gallery-master-plugins.css", GALLERY_MASTER_PLUGIN_DIR_URL . "assets/global/css/plugins.css");
            wp_enqueue_style("gallery-master-default.css", GALLERY_MASTER_PLUGIN_DIR_URL . "assets/admin/layout/css/themes/default.css");
            wp_enqueue_style("gallery-master-toastr.min.css", GALLERY_MASTER_PLUGIN_DIR_URL . "assets/global/plugins/toastr/toastr.css");
            if (in_array($page_url, $datatable_pages_gallery_master)) {
               wp_enqueue_script("jquery.datatables.js", GALLERY_MASTER_PLUGIN_DIR_URL . "assets/global/plugins/datatables/media/js/jquery.datatables.js");
               wp_enqueue_script("jquery.fngetfilterednodes.js", GALLERY_MASTER_PLUGIN_DIR_URL . "assets/global/plugins/datatables/media/js/fngetfilterednodes.js");
               wp_enqueue_style("gallery-master-datatables.foundation.css", GALLERY_MASTER_PLUGIN_DIR_URL . "assets/global/plugins/datatables/media/css/datatables.foundation.css");
            }
            if (in_array($page_url, $layout_pages_gallery_master)) {
               wp_enqueue_script("colpick.js", GALLERY_MASTER_PLUGIN_DIR_URL . "assets/global/plugins/colorpicker/colpick.js");
               wp_enqueue_style("colpick.css", GALLERY_MASTER_PLUGIN_DIR_URL . "assets/global/plugins/colorpicker/colpick.css");
            }
            if ($page_url == "gm_sort_galleries" || $page_url == "gm_sort_albums") {
               wp_enqueue_script(array("jquery-ui-draggable", "jquery-ui-sortable", "jquery-ui-dialog", "jquery-ui-widget"), false);
            }
         }
      }
      if (strpos($hook, "gm_add_gallery") !== false) {
         wp_enqueue_script("plupload-all");
         wp_enqueue_script("jquery.ui.plupload.js", GALLERY_MASTER_PLUGIN_DIR_URL . "assets/global/plugins/pluploader/js/jquery.ui.plupload.js", array("jquery-ui-draggable", "jquery-ui-sortable", "jquery-ui-dialog", "jquery-ui-widget", "jquery-ui-progressbar"), null, true);
         wp_enqueue_style("jquery.ui.plupload.css", GALLERY_MASTER_PLUGIN_DIR_URL . "assets/global/plugins/pluploader/css/jquery.ui.plupload.css");
         wp_enqueue_style("jquery-ui.css", GALLERY_MASTER_PLUGIN_DIR_URL . "assets/global/plugins/pluploader/css/jquery-ui.css");
         wp_enqueue_script("bootstrap-hover-dropdown.js", GALLERY_MASTER_PLUGIN_DIR_URL . "assets/global/plugins/custom/js/bootstrap-hover-dropdown.js");
         wp_enqueue_script("bootstrap-modal.js", GALLERY_MASTER_PLUGIN_DIR_URL . "assets/global/plugins/modal/js/bootstrap-modal.js");
         wp_enqueue_script("bootstrap-modalmanager.js", GALLERY_MASTER_PLUGIN_DIR_URL . "assets/global/plugins/modal/js/bootstrap-modalmanager.js");
         wp_enqueue_style("bootstrap-modal.css", GALLERY_MASTER_PLUGIN_DIR_URL . "assets/global/plugins/modal/css/bootstrap-modal.css");
         wp_enqueue_style("bootstrap-modal-bs3patch.css", GALLERY_MASTER_PLUGIN_DIR_URL . "assets/global/plugins/modal/css/bootstrap-modal-bs3patch.css");
      }
   }
   add_action("admin_enqueue_scripts", "backend_js_css_for_gallery_master");
}
$version = get_option("gallery-master-key");
if ($version == "2.0") {
   /*
     Function Name: add_dashboard_widgets_gallery_master
     Parameters: No
     Description: This function is used to add a widget to the dashboard.
     Created On: 21-08-2017 14:08
     Created By: Tech Banker Team
    */
   function add_dashboard_widgets_gallery_master() {

      wp_add_dashboard_widget(
          'gm_dashboard_widget', // Widget slug.
          'Gallery Master Statistics', // Title.
          'dashboard_widget_function_gallery_master'// Display function.
      );
   }
   /*
     Function Name: dashboard_widget_function_gallery_master
     Parameters: No
     Description: This function is used to to output the contents of our Dashboard Widget.
     Created On: 21-08-2017 14:08
     Created By: Tech Banker Team
    */
   function dashboard_widget_function_gallery_master() {

      global $wpdb;
      if (file_exists(GALLERY_MASTER_PLUGIN_DIR_PATH . "lib/dashboard-widget.php")) {
         include_once GALLERY_MASTER_PLUGIN_DIR_PATH . "lib/dashboard-widget.php";
      }
   }
   /*
     Function Name: get_users_capabilities_gallery_master
     Parameters: No
     Description: This function is used to get users capabilities.
     Created On: 01-06-2017 09:00
     Created By: Tech Banker Team
    */
   function get_users_capabilities_gallery_master() {
      global $wpdb;
      $capabilities = $wpdb->get_var
          (
          $wpdb->prepare
              (
              "SELECT meta_value FROM " . gallery_master_meta() . "
                                WHERE meta_key = %s", "roles_and_capabilities_settings"
          )
      );
      $core_roles = array(
          "manage_options",
          "edit_plugins",
          "edit_posts",
          "publish_posts",
          "publish_pages",
          "edit_pages"
      );
      $unserialized_capabilities = unserialize($capabilities);
      return isset($unserialized_capabilities["capabilities"]) ? $unserialized_capabilities["capabilities"] : $core_roles;
   }
   /*
     Function Name: sidebar_menu_for_gallery_master
     Parameter: no
     Description: This is used for calling a sidebar menu function.
     Created On: 01-06-2017 09:00
     Created By: Tech Banker Team
    */
   function sidebar_menu_for_gallery_master() {
      global $wpdb, $current_user;
      $user_role_permission = get_users_capabilities_gallery_master();
      if (file_exists(GALLERY_MASTER_PLUGIN_DIR_PATH . "includes/translations.php")) {
         include GALLERY_MASTER_PLUGIN_DIR_PATH . "includes/translations.php";
      }
      if (file_exists(GALLERY_MASTER_PLUGIN_DIR_PATH . "lib/sidebar-menu.php")) {
         include_once GALLERY_MASTER_PLUGIN_DIR_PATH . "lib/sidebar-menu.php";
      }
   }
   /*
     Function Name: helper_file_for_gallery_master
     Parameter: no
     Description: This function is used to call helper file for gallery master
     Created On: 01-06-2017 09:00
     Created By: Tech Banker Team
    */
   function helper_file_for_gallery_master() {
      global $wpdb, $current_user;
      $user_role_permission = get_users_capabilities_gallery_master();

      if (file_exists(GALLERY_MASTER_PLUGIN_DIR_PATH . "lib/helper.php")) {
         include_once GALLERY_MASTER_PLUGIN_DIR_PATH . "lib/helper.php";
      }
   }
   /*
     Function Name: main_ajax_file_for_gallery_master
     Parameter: no
     Description: This function is used to register ajax for gallery master
     Created On: 01-06-2017 09:00
     Created By: Tech Banker Team
    */
   function main_ajax_file_for_gallery_master() {
      global $wpdb, $current_user;
      $user_role_permission = get_users_capabilities_gallery_master();
      if (file_exists(GALLERY_MASTER_PLUGIN_DIR_PATH . "lib/action-library.php")) {
         include_once GALLERY_MASTER_PLUGIN_DIR_PATH . "lib/action-library.php";
      }
   }
   /*
     Function Name: top_bar_menu_for_gallery_master
     Parameter: no
     Description: This is used for calling a top bar menu function.
     Created On: 01-06-2017 09:00
     Created By: Tech Banker Team
    */
   function top_bar_menu_for_gallery_master() {
      global $wpdb, $current_user, $wp_admin_bar;
      $user_role_permission = get_users_capabilities_gallery_master();
      $role_capabilities = $wpdb->get_var
          (
          $wpdb->prepare
              (
              "SELECT meta_value from " . gallery_master_meta() . "
                                            WHERE " . gallery_master_meta() . " . meta_key = %s", "roles_and_capabilities_settings"
          )
      );
      $role_capabilities_serialized = unserialize($role_capabilities);
      if ($role_capabilities_serialized["show_gallery_master_top_bar_menu"] == "enable") {
         if (file_exists(GALLERY_MASTER_PLUGIN_DIR_PATH . "includes/translations.php")) {
            include GALLERY_MASTER_PLUGIN_DIR_PATH . "includes/translations.php";
         }
         if (file_exists(GALLERY_MASTER_PLUGIN_DIR_PATH . "lib/admin-bar-menu.php")) {
            include_once GALLERY_MASTER_PLUGIN_DIR_PATH . "lib/admin-bar-menu.php";
         }
      }
   }
   /*
     Function Name: plugin_load_textdomain_gallery_master
     Parameters: No
     Description: This function is used to load languages.
     Created On: 01-06-2017 09:00
     Created By: Tech Banker Team
    */
   function plugin_load_textdomain_gallery_master() {
      if (function_exists("load_plugin_textdomain")) {
         load_plugin_textdomain("gallery-master", false, GALLERY_MASTER_PLUGIN_DIRNAME . "/languages");
      }
   }
   /*
     Function Name: admin_functions_gallery_master
     Parameter: no
     Description: This function used for calling admin function fired on admin_init hook.
     Created On: 01-06-2017 09:00
     Created By: Tech Banker Team
    */
   function admin_functions_gallery_master() {
      helper_file_for_gallery_master();
   }
   /*
     Function Name: gallery_master_UrlEncode
     Argument:yes ($string)
     Description: decode url symbols into original form.
     Created On: 01-06-2017 09:00
     Created By: Tech Banker Team
    */
   function gallery_master_UrlEncode($string) {
      $entities = array("%21", "%2A", "%27", "%28", "%29", "%3B", "%3A", "%40", "%26", "%3D", "%2B", "%24", "%2C", "%2F", "%3F", "%25", "%23", "%5B", "%5D");
      $replacements = array("!", "*", "'", "(", ")", ";", ":", "@", "&", "=", "+", "$", ",", "/", "?", "%", "#", "[", "]");
      return str_replace($entities, $replacements, urlencode($string));
   }
   /*
     Function Name: upload_ajax_file_for_gallery_master
     Parameter: no
     Description: This function is used to register ajax for gallery master
     Created On: 01-06-2017 09:00
     Created By: Tech Banker Team
    */
   function upload_ajax_file_for_gallery_master() {
      global $wpdb, $current_user;
      $user_role_permission = get_users_capabilities_gallery_master();
      if (file_exists(GALLERY_MASTER_PLUGIN_DIR_PATH . "lib/upload.php")) {
         include_once GALLERY_MASTER_PLUGIN_DIR_PATH . "lib/upload.php";
      }
   }
   function parse_shortcode_content_gallery_master($content) {

      /* Parse nested shortcodes and add formatting. */
      $content = trim(do_shortcode(shortcode_unautop($content)));

      /* Remove '' from the start of the string. */
      if (substr($content, 0, 4) == '') {
         $content = substr($content, 4);
      }

      /* Remove '' from the end of the string. */
      if (substr($content, -3, 3) == '') {
         $content = substr($content, 0, -3);
      }

      /* Remove any instances of ''. */
      $content = str_replace(array('<p></p>'), '', $content);
      $content = str_replace(array('<p>  </p>'), '', $content);

      return $content;
   }
   /*
     Function Name: gallery_master_shortcode
     Parameter: Yes
     Description: It is used for a creating shortcode for gallery master.
     Created On: 01-06-2017 09:00
     Created by: Tech Banker Team
    */
   function gallery_master_shortcode($atts, $content) {
      extract(shortcode_atts(array(
          "layout_type" => "",
          "source_type" => "",
          "id" => "",
          "album_type" => "",
          "sort_images_by" => "",
          "album_title" => "",
          "album_description" => "",
          "order_images_by" => "",
          "alignment" => "",
          "lightbox_type" => "",
          "columns" => "",
          "filters" => "",
          "lazy_load" => "",
          "search_box" => "",
          "order_by" => "",
          "page_navigation" => "",
          "images_per_page" => "",
          "gallery_title" => "",
          "gallery_description" => "",
          "thumbnail_title" => "",
          "thumbnail_description" => "",
          "animation_effects" => "",
          "special_effects" => "",
          "auto_play" => "",
          "time_interval" => "",
          "next_previous_button" => "",
          "play_pause_button" => "",
          "slideshow_width" => "",
          "control_buttons" => "",
          "buttons_type" => "",
          "slideshow_filmstrips" => "",
          "image_browser_height" => "",
          "image_browser_width" => "",
          "blog_image_width" => "",
          "row_height" => "",
          "theme" => "",
          "gallery_type" => "",
          "show_title" => "",
          "show_desc" => "",
          "lightbox" => ""
              ), $atts));
      if (!is_feed()) {
         if (isset($theme) && $theme != "") {
            $source_type = "gallery";
            switch ($theme) {
               case "thumbnails":
                  $layout_type = "thumbnail_layout";
                  break;
               case "masonry":
                  $layout_type = "masonry_layout";
                  break;
            }
            $gallery_title = $show_title == "show" || $show_desc == "show" ? "show" : "hide";
            $gallery_description = $show_title == "show" || $show_desc == "show" ? "show" : "hide";
            $thumbnail_title = $show_title == "show" ? "show" : "hide";
            $thumbnail_description = $show_desc == "show" ? "show" : "hide";
            $lightbox_type = $lightbox == "enabled" ? "foo_box_free_edition" : "";
            switch ($order_by) {
               case "random":
                  $sort_images_by = "random_order";
                  break;
               case "pic_id":
                  $sort_images_by = "image_name";
                  break;
               case "pic_name":
                  $sort_images_by = "image_name";
                  break;
               case "title":
                  $sort_images_by = "image_title";
                  break;
               case"date":
                  $sort_images_by = "upload_date";
                  break;
            }
         }
         if (isset($_REQUEST["gallery_id"])) {
            $source_type = "gallery";
         }
         ob_start();
         if (isset($source_type)) {
            if (file_exists(GALLERY_MASTER_PLUGIN_DIR_PATH . "user-views/includes/common-variables.php")) {
               require GALLERY_MASTER_PLUGIN_DIR_PATH . "user-views/includes/common-variables.php";
            }
            switch (esc_attr($source_type)) {
               case "gallery" :
                  if (file_exists(GALLERY_MASTER_PLUGIN_DIR_PATH . "user-views/includes/galleries/structure.php")) {
                     require GALLERY_MASTER_PLUGIN_DIR_PATH . "user-views/includes/galleries/structure.php";
                  }
                  break;
            }
         }
         if (class_exists("SiteOrigin_Panels") || class_exists("ckeditor_wordpress") || class_exists("Tinymce_Advanced")) {
            $content = parse_shortcode_content_gallery_master($content);
            return $content;
         } else {
            $gallery_master_output = ob_get_clean();
            wp_reset_query();
            return $gallery_master_output;
         }
      }
   }
   /*
     Function Name: helper_file_for_gallery_master_frontend
     Parameter: no
     Description: This function is used to call helper file for gallery master frontend
     Created On: 01-06-2017 09:00
     Created By: Tech Banker Team
    */
   function helper_file_for_gallery_master_frontend() {
      global $wpdb;
      if (file_exists(GALLERY_MASTER_PLUGIN_DIR_PATH . "user-views/lib/helper.php")) {
         include_once GALLERY_MASTER_PLUGIN_DIR_PATH . "user-views/lib/helper.php";
      }
   }
   /*
     Function Name: user_functions_gallery_master
     Parameter: No
     Description: This function is used to call user_functions_gallery_master
     Created On: 01-06-2017 09:00
     Created By: Tech Banker Team
    */
   function user_functions_gallery_master() {
      frontend_js_css_gallery_master();
      helper_file_for_gallery_master_frontend();
      plugin_load_textdomain_gallery_master();
   }
   /*
     Function Name: add_gallery_master_shortcode_button
     Description: This function is used for button show on frontend.
     Parameters: Yes($context)
     Created On: 07-07-2017 02:34
     Created By: Tech Banker Team
    */
   function add_gallery_master_shortcode_button($context) {
      add_thickbox();
      $context .= "<a href=\"#TB_inline?width=300&height=400&inlineId=gallery-master\"  class=\"button thickbox\"  title=\"" . __("Add Galllery Bank Shortcode", "gallery-master") . "\">
            <span class=\"contact_icon\"></span> Add Gallery Master Shortcode</a>";
      return $context;
   }
   /*
     Function Name: frontend_js_css_gallery_master
     Parameter: no
     Description: This function is used to call css and js for gallery master frontend
     Created On: 22-08-2017 14:18
     Created By: Tech Banker Team
    */
   function frontend_js_css_gallery_master() {
      wp_enqueue_style("gallery-master-popup.css", plugins_url("assets/admin/layout/css/gallery-master-popup.css", __FILE__));
   }
   /*
     Function Name: add_gallery_master_mce_popup
     Description: This function is used for popup show on page/post.
     Parameters: No
     Created On: 22-08-2017 14:18
     Created By: Tech Banker Team
    */
   function add_gallery_master_mce_popup() {
      global $wpdb;
      $user_role_permission = get_users_capabilities_gallery_master();
      add_thickbox();
      if (file_exists(GALLERY_MASTER_PLUGIN_DIR_PATH . "includes/translations.php")) {
         include GALLERY_MASTER_PLUGIN_DIR_PATH . "includes/translations.php";
      }
      if (file_exists(GALLERY_MASTER_PLUGIN_DIR_PATH . "lib/shortcode-button.php")) {
         include_once GALLERY_MASTER_PLUGIN_DIR_PATH . "lib/shortcode-button.php";
      }
   }
   /*
     add_action for add_gallery_master_shortcode_button
     Description:This hook is used for calling the function of add to button.
     Created On: 07-07-2017 02:25
     Created By: Tech Banker Team
    */
   add_action("media_buttons_context", "add_gallery_master_shortcode_button", 1);

   /*
     add_action for add_gallery_master_mce_popup
     Description:This hook is used for calling the function of show popup.
     Created On: 07-07-2017 02:25
     Created By: Tech Banker Team
    */
   add_action("admin_footer", "add_gallery_master_mce_popup");

   /*
     Class Name: gallery_master_widget
     Parameter: No
     Description: This class is used to add widget.
     Created On: 05-06-2017 11:14
     Created By: Tech Banker Team
    */
   class gallery_master_widget extends WP_Widget {
      function __construct() {
         parent::__construct(
             "gallery_master_widget", __("Gallery Master", "gallery-master"), array("description" => __("Display Gallery Master", "gallery-master"),)
         );
      }
      /*
        Function Name: form
        Parameters: Yes($instance)
        Description: This function is used to add widget form.
        Created On: 05-06-2017 11:14
        Created By: Tech Banker Team
       */
      public function form($instance) {
         global $wpdb;
         $user_role_permission = get_users_capabilities_gallery_master();
         if (file_exists(GALLERY_MASTER_PLUGIN_DIR_PATH . "user-views/includes/galleries/translations.php")) {
            include GALLERY_MASTER_PLUGIN_DIR_PATH . "user-views/includes/galleries/translations.php";
         }
         if (file_exists(GALLERY_MASTER_PLUGIN_DIR_PATH . "user-views/includes/widget-form.php")) {
            include GALLERY_MASTER_PLUGIN_DIR_PATH . "user-views/includes/widget-form.php";
         }
      }
      /*
        Function Name: widget
        Parameters: Yes($args, $instance)
        Description: This function is used to display widget.
        Created On: 05-06-2017 11:14
        Created By: Tech Banker Team
       */
      public function widget($args, $instance) {
         extract($args, EXTR_SKIP);
         echo $before_widget;
         $shortcode_data = empty($instance["shortcode"]) ? " " : apply_filters("widget_gallery_master_shortcode", $instance["shortcode"]);
         if (!empty($shortcode_data)) {
            $shortcode = $shortcode_data;
         }
         echo do_shortcode($shortcode);
         echo $after_widget;
      }
      /*
        Function Name: update
        Parameters: Yes($new_instance, $old_instance)
        Description: This function is used to update widget.
        Created On: 05-06-2017 11:14
        Created By: Tech Banker Team
       */
      public function update($new_instance, $old_instance) {
         $instance = $old_instance;
         $instance["shortcode"] = $new_instance["ux_txt_gallery_master_shortcode"];
         return $instance;
      }
   }
   /*
     Function Name: gallery_master_action_links
     Parameters: Yes
     Description: This function is used to create link for Pro Editions.
     Created On: 12-06-2017 17:35
     Created By: Tech Banker Team
    */
   function gallery_master_action_links($plugin_link) {
      $plugin_link[] = "<a href=" . tech_banker_gallery_url . " style=\"color: red; font-weight: bold;\" target=\"_blank\">Go Pro!</a>";
      return $plugin_link;
   }
   //Hooks

   /* add_action for admin_functions_gallery_master
     Description: This hook is used for calling all the Backend Functions
     Created On: 01-06-2017 09:00
     Created by: Tech Banker Team
    */

   add_action("admin_init", "admin_functions_gallery_master");

   /* add_action for main_ajax_file_for_gallery_master
     Description: This hook is used for calling backend ajax function
     Created On: 01-06-2017 09:00
     Created by: Tech Banker Team
    */

   add_action("wp_ajax_gallery_master_action_module", "main_ajax_file_for_gallery_master");

   /* add_action for upload_ajax_file_for_gallery_master
     Description: This hook is used for calling upload ajax function
     Created On: 01-06-2017 09:00
     Created by: Tech Banker Team
    */

   add_action("wp_ajax_gallery_master_image_upload", "upload_ajax_file_for_gallery_master");

   /* add_action
     Description: This hook is used for calling a function of sidebar menu
     Created On: 01-06-2017 09:00
     Created By: Tech Banker Team
    */
   add_action("admin_menu", "sidebar_menu_for_gallery_master");
   add_action("network_admin_menu", "sidebar_menu_for_gallery_master");

   /* add_action
     Description: This hook is used for calling a function of top bar menu.
     Created On: 01-06-2017 09:00
     Created By: Tech Banker Team
    */
   add_action("admin_bar_menu", "top_bar_menu_for_gallery_master", 100);

   /*
     add_action for user_functions_gallery_master
     Description: This hook is used for calling all the frontend Functions
     Created On: 01-06-2017 09:00
     Created by: Tech Banker Team
    */
   add_action("init", "user_functions_gallery_master");

   /*
     add_shortcode
     Description: function for shortcode.
     Created On: 01-06-2017 09:00
     Created by: Tech Banker Team
    */
   add_shortcode("gallery_master", "gallery_master_shortcode");

   /* add_filter create Go Pro link for Gallery Master
     Description: This hook is used for create link for premium Editions.
     Created On: 17-06-2017 17:38
     Created by: Tech Banker Team
    */
   add_filter("plugin_action_links_" . plugin_basename(__FILE__), "gallery_master_action_links");

   /*
     add_action for MapWidget class
     Description: This hook is used for initiate Widget
     Created On: 05-06-2017 10:29
     Created by: Tech Banker Team
    */

   add_action("widgets_init", create_function("", "return register_widget(\"gallery_master_widget\");"));

   /*
     add_action for Widget.
     Description: This hook is used for apply the shortcode for Widget.
     Created On: 05-06-2017 10:29
     Created by: Tech Banker Team
    */

   add_filter("widget_text", "do_shortcode");

   /*
     add_action for Widget.
     Description: This hook is used to add widget on dashboard.
     Created On: 21-08-2017 14:00
     Created by: Tech Banker Team
    */
   add_action("wp_dashboard_setup", "add_dashboard_widgets_gallery_master");
} else {
   function sidebar_menu_gallery_master_temp() {
      add_menu_page("Gallery Master", "Gallery Master", "read", "gallery_master", "", plugins_url("assets/global/img/icon.png", __FILE__));
      add_submenu_page("Gallery Master", "Gallery Master", "", "read", "gallery_master", "gallery_master");
   }
   function gallery_master() {
      global $wpdb;
      $user_role_permission = array(
          "manage_options",
          "edit_plugins",
          "edit_posts",
          "publish_posts",
          "publish_pages",
          "edit_pages"
      );
      if (file_exists(GALLERY_MASTER_PLUGIN_DIR_PATH . "includes/translations.php")) {
         include GALLERY_MASTER_PLUGIN_DIR_PATH . "includes/translations.php";
      }
      if (file_exists(GALLERY_MASTER_PLUGIN_DIR_PATH . "includes/queries.php")) {
         include_once GALLERY_MASTER_PLUGIN_DIR_PATH . "includes/queries.php";
      }
      if (file_exists(GALLERY_MASTER_PLUGIN_DIR_PATH . "includes/header.php")) {
         include_once GALLERY_MASTER_PLUGIN_DIR_PATH . "includes/header.php";
      }
      if (file_exists(GALLERY_MASTER_PLUGIN_DIR_PATH . "includes/sidebar.php")) {
         include_once GALLERY_MASTER_PLUGIN_DIR_PATH . "includes/sidebar.php";
      }
      if (file_exists(GALLERY_MASTER_PLUGIN_DIR_PATH . "views/wizard/wizard.php")) {
         include_once GALLERY_MASTER_PLUGIN_DIR_PATH . "views/wizard/wizard.php";
      }
      if (file_exists(GALLERY_MASTER_PLUGIN_DIR_PATH . "includes/footer.php")) {
         include_once GALLERY_MASTER_PLUGIN_DIR_PATH . "includes/footer.php";
      }
   }
   add_action("admin_menu", "sidebar_menu_gallery_master_temp");
   add_action("network_admin_menu", "sidebar_menu_gallery_master_temp");
}
// Hooks

/* register_activation_hook
  Description: This hook is used to call install script
  Created On: 01-06-2017 09:00
  Created By: Tech Banker Team
 */
register_activation_hook(__FILE__, "install_script_for_gallery_master");

/*
  add_action for install_script_for_gallery_master
  Description: This hook is used for calling the function of install script.
  Created On: 01-06-2017 09:00
  Created By: Tech Banker Team
 */

add_action("admin_init", "install_script_for_gallery_master");

/*
  Class Name: plugin_activate_gallery_master
  Description: This function is used to add option on plugin activation.
  Created On: 01-06-2017 09:00
  Created By: Tech Banker Team
 */
function plugin_activate_gallery_master() {
   add_option("gallery_master_do_activation_redirect", true);
}
/*
  Class Name: gallery_master_redirect
  Description: This function is used to redirect to manage maps menu.
  Created On: 01-06-2017 09:00
  Created By: Tech Banker Team
 */
function gallery_master_redirect() {
   if (get_option('gallery_master_do_activation_redirect', false)) {
      delete_option("gallery_master_do_activation_redirect");
      wp_redirect(admin_url("admin.php?page=gallery_master"));
      exit;
   }
}
/*

  /*
  plugin_activate_gallery_master
  Description: This Hook is used for redirecting to main menu after activation.
  Created On: 01-06-2017 09:00
  Created By: Tech Banker Team
 */

register_activation_hook(__FILE__, "plugin_activate_gallery_master");
add_action("admin_init", "gallery_master_redirect");

/*
  Function Name:gallery_master_admin_notice_class
  Parameter: No
  Description: This function is used to create the object of admin notices.
  Created On: 08-22-2017 16:16
  Created By: Tech Banker Team
 */
function gallery_master_admin_notice_class() {
   global $wpdb;
   class gallery_master_admin_notices {
      protected $promo_link = '';
      public $config;
      public $notice_spam = 0;
      public $notice_spam_max = 2;
      // Basic actions to run
      public function __construct($config = array()) {
         // Runs the admin notice ignore function incase a dismiss button has been clicked
         add_action('admin_init', array($this, 'gm_admin_notice_ignore'));
         // Runs the admin notice temp ignore function incase a temp dismiss link has been clicked
         add_action('admin_init', array($this, 'gm_admin_notice_temp_ignore'));
         add_action('admin_notices', array($this, 'gm_display_admin_notices'));
      }
      // Checks to ensure notices aren't disabled and the user has the correct permissions.
      public function gm_admin_notices() {
         $settings = get_option('gm_admin_notice');
         if (!isset($settings['disable_admin_notices']) || ( isset($settings['disable_admin_notices']) && $settings['disable_admin_notices'] == 0 )) {
            if (current_user_can('manage_options')) {
               return true;
            }
         }
         return false;
      }
      // Primary notice function that can be called from an outside function sending necessary variables
      public function change_admin_notice_gallery_master($admin_notices) {
         // Check options
         if (!$this->gm_admin_notices()) {
            return false;
         }
         foreach ($admin_notices as $slug => $admin_notice) {
            // Call for spam protection
            if ($this->gm_anti_notice_spam()) {
               return false;
            }

            // Check for proper page to display on
            if (isset($admin_notices[$slug]['pages']) && is_array($admin_notices[$slug]['pages'])) {
               if (!$this->gm_admin_notice_pages($admin_notices[$slug]['pages'])) {
                  return false;
               }
            }

            // Check for required fields
            if (!$this->gm_required_fields($admin_notices[$slug])) {

               // Get the current date then set start date to either passed value or current date value and add interval
               $current_date = current_time("m/d/Y");
               $start = ( isset($admin_notices[$slug]['start']) ? $admin_notices[$slug]['start'] : $current_date );
               $start = date("m/d/Y");
               $date_array = explode('/', $start);
               $interval = ( isset($admin_notices[$slug]['int']) ? $admin_notices[$slug]['int'] : 0 );

               $date_array[1] += $interval;
               $start = date("m/d/Y", mktime(0, 0, 0, $date_array[0], $date_array[1], $date_array[2]));

               // This is the main notices storage option
               $admin_notices_option = get_option('gm_admin_notice', array());
               // Check if the message is already stored and if so just grab the key otherwise store the message and its associated date information
               if (!array_key_exists($slug, $admin_notices_option)) {
                  $admin_notices_option[$slug]['start'] = date("m/d/Y");
                  $admin_notices_option[$slug]['int'] = $interval;
                  update_option('gm_admin_notice', $admin_notices_option);
               }

               // Sanity check to ensure we have accurate information
               // New date information will not overwrite old date information
               $admin_display_check = ( isset($admin_notices_option[$slug]['dismissed']) ? $admin_notices_option[$slug]['dismissed'] : 0 );
               $admin_display_start = ( isset($admin_notices_option[$slug]['start']) ? $admin_notices_option[$slug]['start'] : $start );
               $admin_display_interval = ( isset($admin_notices_option[$slug]['int']) ? $admin_notices_option[$slug]['int'] : $interval );
               $admin_display_msg = ( isset($admin_notices[$slug]['msg']) ? $admin_notices[$slug]['msg'] : '' );
               $admin_display_title = ( isset($admin_notices[$slug]['title']) ? $admin_notices[$slug]['title'] : '' );
               $admin_display_link = ( isset($admin_notices[$slug]['link']) ? $admin_notices[$slug]['link'] : '' );
               $output_css = false;

               // Ensure the notice hasn't been hidden and that the current date is after the start date
               if ($admin_display_check == 0 && strtotime($admin_display_start) <= strtotime($current_date)) {

                  // Get remaining query string
                  $query_str = ( isset($admin_notices[$slug]['later_link']) ? $admin_notices[$slug]['later_link'] : esc_url(add_query_arg('gm_admin_notice_ignore', $slug)) );
                  if (strpos($slug, 'promo') === FALSE) {
                     // Admin notice display output
                     echo '<div class="update-nag gb-admin-notice" style="width:95%!important;">
                               <div></div>
                                <strong><p>' . $admin_display_title . '</p></strong>
                                <strong><p style="font-size:14px !important">' . $admin_display_msg . '</p></strong>
                                <strong><ul>' . $admin_display_link . '</ul></strong>
                              </div>';
                  } else {
                     echo '<div class="admin-notice-promo">';
                     echo $admin_display_msg;
                     echo '<ul class="notice-body-promo blue">
                                    ' . $admin_display_link . '
                                  </ul>';
                     echo '</div>';
                  }
                  $this->notice_spam += 1;
                  $output_css = true;
               }
            }
         }
      }
      // Spam protection check
      public function gm_anti_notice_spam() {
         if ($this->notice_spam >= $this->notice_spam_max) {
            return true;
         }
         return false;
      }
      // Ignore function that gets ran at admin init to ensure any messages that were dismissed get marked
      public function gm_admin_notice_ignore() {
         // If user clicks to ignore the notice, update the option to not show it again
         if (isset($_GET['gm_admin_notice_ignore'])) {
            $admin_notices_option = get_option('gm_admin_notice', array());
            $admin_notices_option[$_GET['gm_admin_notice_ignore']]['dismissed'] = 1;
            update_option('gm_admin_notice', $admin_notices_option);
            $query_str = remove_query_arg('gm_admin_notice_ignore');
            wp_redirect($query_str);
            exit;
         }
      }
      // Temp Ignore function that gets ran at admin init to ensure any messages that were temp dismissed get their start date changed
      public function gm_admin_notice_temp_ignore() {
         // If user clicks to temp ignore the notice, update the option to change the start date - default interval of 14 days
         if (isset($_GET['gm_admin_notice_temp_ignore'])) {
            $admin_notices_option = get_option('gm_admin_notice', array());
            $current_date = current_time("m/d/Y");
            $date_array = explode('/', $current_date);
            $interval = (isset($_GET['gm_int']) ? $_GET['gm_int'] : 7);
            $date_array[1] += $interval;
            $new_start = date("m/d/Y", mktime(0, 0, 0, $date_array[0], $date_array[1], $date_array[2]));

            $admin_notices_option[$_GET['gm_admin_notice_temp_ignore']]['start'] = $new_start;
            $admin_notices_option[$_GET['gm_admin_notice_temp_ignore']]['dismissed'] = 0;
            update_option('gm_admin_notice', $admin_notices_option);
            $query_str = remove_query_arg(array('gm_admin_notice_temp_ignore', 'gm_int'));
            wp_redirect($query_str);
            exit;
         }
      }
      public function gm_admin_notice_pages($pages) {
         foreach ($pages as $key => $page) {
            if (is_array($page)) {
               if (isset($_GET['page']) && $_GET['page'] == $page[0] && isset($_GET['tab']) && $_GET['tab'] == $page[1]) {
                  return true;
               }
            } else {
               if ($page == 'all') {
                  return true;
               }
               if (get_current_screen()->id === $page) {
                  return true;
               }
               if (isset($_GET['page']) && $_GET['page'] == $page) {
                  return true;
               }
            }
            return false;
         }
      }
      // Required fields check
      public function gm_required_fields($fields) {
         if (!isset($fields['msg']) || ( isset($fields['msg']) && empty($fields['msg']) )) {
            return true;
         }
         if (!isset($fields['title']) || ( isset($fields['title']) && empty($fields['title']) )) {
            return true;
         }
         return false;
      }
      public function gm_display_admin_notices() {
         $two_week_review_ignore = add_query_arg(array('gm_admin_notice_ignore' => 'two_week_review'));
         $two_week_review_temp = add_query_arg(array('gm_admin_notice_temp_ignore' => 'two_week_review', 'int' => 7));

         $notices['two_week_review'] = array(
             'title' => __('Leave A Gallery Master Review?'),
             'msg' => 'We love and care about you. Gallery Master Team is putting our maximum efforts to provide you the best functionalities.<br> We would really appreciate if you could spend a couple of seconds to give a Nice Review to the plugin for motivating us!',
             'link' => '<span class="dashicons dashicons-external gallery-master-admin-notice"></span><span class="gallery-master-admin-notice"><a href="https://wordpress.org/support/plugin/gallery-master/reviews/?filter=5" target="_blank" class="gallery-master-admin-notice-link">' . __('Sure! I\'d love to!', 'gb') . '</a></span>
                        <span class="dashicons dashicons-smiley gallery-master-admin-notice"></span><span class="gallery-master-admin-notice"><a href="' . $two_week_review_ignore . '" class="gallery-master-admin-notice-link"> ' . __('I\'ve already left a review', 'gb') . '</a></span>
                        <span class="dashicons dashicons-calendar-alt gallery-master-admin-notice"></span><span class="gallery-master-admin-notice"><a href="' . $two_week_review_temp . '" class="gallery-master-admin-notice-link">' . __('Maybe Later', 'gb') . '</a></span>',
             'later_link' => $two_week_review_temp,
             'int' => 7
         );

         $this->change_admin_notice_gallery_master($notices);
      }
   }
   $plugin_info_gallery_master = new gallery_master_admin_notices();
}
add_action("init", "gallery_master_admin_notice_class");
/*
  Function Name: deactivation_function_for_gallery_master
  Parameters: No
  Description: This function is used for executing the code on deactivation.
  Created On: 29-08-2017 12:08
  Created by: Tech Banker Team
 */
function deactivation_function_for_gallery_master() {
   $type = get_option("gallery-master-welcome-page");
   $user_admin_email = get_option("gallery-master-admin-email");
   if ($type == "opt_in") {
      $plugin_info_gallery_master = new plugin_info_gallery_master();
      global $wp_version, $wpdb;
      $url = tech_banker_stats_url . "/wp-admin/admin-ajax.php";
      $theme_details = array();

      if ($wp_version >= 3.4) {
         $active_theme = wp_get_theme();
         $theme_details["theme_name"] = strip_tags($active_theme->Name);
         $theme_details["theme_version"] = strip_tags($active_theme->Version);
         $theme_details["author_url"] = strip_tags($active_theme->{"Author URI"});
      }

      $plugin_stat_data = array();
      $plugin_stat_data["plugin_slug"] = "gallery-master";
      $plugin_stat_data["type"] = "standard_edition";
      $plugin_stat_data["version_number"] = gallery_master_wizard_version_number;
      $plugin_stat_data["status"] = $type;
      $plugin_stat_data["event"] = "de-activate";
      $plugin_stat_data["domain_url"] = site_url();
      $plugin_stat_data["wp_language"] = defined("WPLANG") && WPLANG ? WPLANG : get_locale();
      $plugin_stat_data["email"] = $user_admin_email != "" ? $user_admin_email : get_option("admin_email");
      $plugin_stat_data["wp_version"] = $wp_version;
      $plugin_stat_data["php_version"] = esc_html(phpversion());
      $plugin_stat_data["mysql_version"] = $wpdb->db_version();
      $plugin_stat_data["max_input_vars"] = ini_get("max_input_vars");
      $plugin_stat_data["operating_system"] = PHP_OS . "  (" . PHP_INT_SIZE * 8 . ") BIT";
      $plugin_stat_data["php_memory_limit"] = ini_get("memory_limit") ? ini_get("memory_limit") : "N/A";
      $plugin_stat_data["extensions"] = get_loaded_extensions();
      $plugin_stat_data["plugins"] = $plugin_info_gallery_master->get_plugin_info_gallery_master();
      $plugin_stat_data["themes"] = $theme_details;

      $response = wp_safe_remote_post($url, array
          (
          "method" => "POST",
          "timeout" => 45,
          "redirection" => 5,
          "httpversion" => "1.0",
          "blocking" => true,
          "headers" => array(),
          "body" => array("data" => serialize($plugin_stat_data), "site_id" => get_option("gm_tech_banker_site_id") != "" ? get_option("gm_tech_banker_site_id") : "", "action" => "plugin_analysis_data")
      ));
      if (!is_wp_error($response)) {
         $response["body"] != "" ? update_option("gm_tech_banker_site_id", $response["body"]) : "";
      }
   }
   delete_option("gallery-master-welcome-page");
}
/* deactivation_function_for_gallery_master
  Description: This hook is used to sets the deactivation hook for a plugin.
  Created On: 29-08-2017 12:08
  Created by: Tech Banker Team
 */

register_deactivation_hook(__FILE__, "deactivation_function_for_gallery_master");
