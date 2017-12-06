<?php
/**
 * Template to view and generate Shortcode for Slideshow Layout Shortcode.
 *
 * @author 	Tech Banker
 * @package 	gallery-master/views/shortcodes
 * @version	 2.0.0
 */
if (!defined("ABSPATH")) {
   exit;
} // Exit if accessed directly
if (!is_user_logged_in()) {
   return;
} else {
   $access_granted = false;
   foreach ($user_role_permission as $permission) {
      if (current_user_can($permission)) {
         $access_granted = true;
         break;
      }
   }
   if (!$access_granted) {
      return;
   } elseif (shortcode_generator_gallery_master === "1") {
      $image_dimensions = isset($global_options_get_data["global_options_generated_image_dimensions"]) ? explode(",", $global_options_get_data["global_options_generated_image_dimensions"]) : array("1600", "900");
      ?>
      <div class="page-bar">
         <ul class="page-breadcrumb">
            <li>
               <i class="icon-custom-home"></i>
               <a href="admin.php?page=gallery_master">
                  <?php echo $gallery_master; ?>
               </a>
               <span>></span>
            </li>
            <li>
               <a href="admin.php?page=gm_thumbnail_layout_shortcode">
                  <?php echo $gm_shortcode_generator; ?>
               </a>
               <span>></span>
            </li>
            <li>
               <span>
                  <?php echo $gm_slideshow_layout; ?>
               </span>
            </li>
         </ul>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="portlet box vivid-green">
               <div class="portlet-title">
                  <div class="caption">
                     <i class="icon-custom-control-play"></i>
                     <?php echo $gm_slideshow_layout; ?>
                  </div>
                  <p class="premium-editions">
                     <?php echo $gm_upgrade_need_help ?><a href="<?php echo tech_banker_gallery_url; ?>" target="_blank" class="premium-editions-documentation"><?php echo $gm_documentation ?></a><?php echo $gm_read_and_check; ?><a href="<?php echo tech_banker_gallery_url; ?>frontend-demos/" target="_blank" class="premium-editions-documentation"><?php echo $gm_demos_section; ?></a>
                  </p>
               </div>
               <div class="portlet-body form">
                  <form id="ux_frm_slide_show_layout">
                     <div class="form-body">
                        <div class="form-actions">
                           <div class="pull-right">
                              <input type="button" class="btn vivid-green reset-page" name="ux_btn_reset_shortcode" id="ux_btn_reset_shortcode" value="<?php echo $gm_reset_shortcode; ?>">
                           </div>
                        </div>
                        <div class="line-separator"></div>
                        <div id="ux_div_shortcode" class="ux_div_shortcode" style="display:none;">
                           <div class="form-group">
                              <label class="control-label">
                                 <?php echo $gm_shortcode_title; ?> :
                                 <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_shortcode_tooltip; ?>" data-placement="right"></i>
                                 <span class="required" aria-required="true">* <?php echo "(" . $gm_premium_edition . ")"; ?></span>
                              </label>
                              <div class="icon-custom-docs tooltips pull-right" style="font-size:18px;" data-original-title="<?php echo $gm_copy_to_clipboard; ?>" data-placement="left" data-clipboard-action="copy" data-clipboard-target="#ux_txtarea_generate_shortcode"></div>
                              <textarea class="form-control ux_txtarea_generate_shortcode" readonly="true" name="ux_txtarea_generate_shortcode" id="ux_txtarea_generate_shortcode" rows="4"></textarea>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label">
                                    <?php echo $gm_choose_type; ?> :
                                    <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_choose_type_tooltip; ?>" data-placement="right"></i>
                                    <span class="required" aria-required="true">* <?php echo "(" . $gm_premium_edition . ")"; ?></span>
                                 </label>
                                 <select id="ux_ddl_choose_type" name="ux_ddl_choose_type" class="form-control" onchange="shortcode_source_type_control_gallery_master('ux_ddl_choose_type', 'ux_div_gallery', 'ux_div_album', 'ux_div_album_control'); premium_edition_notification_gallery_master();">
                                    <option value="gallery"><?php echo $gm_gallery; ?></option>
                                    <option value="album"><?php echo $gm_album; ?></option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group" id="ux_div_gallery">
                                 <label class="control-label">
                                    <?php echo $gm_choose_gallery_title; ?> :
                                    <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_choose_gallery_tooltip; ?>" data-placement="right"></i>
                                    <span class="required" aria-required="true">* <?php echo "(" . $gm_premium_edition . ")"; ?></span>
                                 </label>
                                 <select id="ux_ddl_choose_gallery" name="ux_ddl_choose_gallery" class="form-control" onchange="premium_edition_notification_gallery_master();">
                                    <option value=""><?php echo $gm_choose_gallery_title; ?></option>
                                    <?php
                                    foreach ($slideshow_layout_shortcode as $value) {
                                       ?>
                                       <option value="<?php echo intval($value["meta_id"]); ?>"><?php echo isset($value["gallery_title"]) && $value["gallery_title"] != "" ? esc_attr($value["gallery_title"]) : $gm_untitled; ?></option>
                                       <?php
                                    }
                                    ?>
                                 </select>
                              </div>
                              <div class="form-group" id="ux_div_album">
                                 <label class="control-label">
                                    <?php echo $gm_choose_album_title; ?> :
                                    <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_choose_album_tooltip; ?>" data-placement="right"></i>
                                    <span class="required" aria-required="true">* <?php echo "(" . $gm_premium_edition . ")"; ?></span>
                                 </label>
                                 <select id="ux_ddl_choose_album" name="ux_ddl_choose_album" class="form-control" onchange="premium_edition_notification_gallery_master();">
                                    <option value=""><?php echo $gm_choose_album_title; ?></option>
                                    <?php
                                    foreach ($slideshow_layout_get_album_data as $value) {
                                       ?>
                                       <option value="<?php echo intval($value["meta_id"]); ?>"><?php echo isset($value["album_name"]) && $value["album_name"] != "" ? esc_attr($value["album_name"]) : $gm_untitled_album; ?></option>
                                       <?php
                                    }
                                    ?>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div id="ux_div_album_type">
                           <div class="form-group">
                              <label class="control-label">
                                 <?php echo $gm_choose_album_type; ?> :
                                 <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_choose_album_type_tooltip; ?>" data-placement="right"></i>
                                 <span class="required" aria-required="true">* <?php echo "(" . $gm_premium_edition . ")"; ?></span>
                              </label>
                              <select id="ux_ddl_choose_album_type" name="ux_ddl_choose_album_type" class="form-control" onchange="premium_edition_notification_gallery_master();">
                                 <option value="compact_album"><?php echo $gm_album_compact; ?></option>
                                 <option value="extended_album"><?php echo $gm_album_extended; ?></option>
                              </select>
                           </div>
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label class="control-label">
                                       <?php echo $gm_sort_albums_title; ?> :
                                       <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_sort_albums_tooltip; ?>" data-placement="right"></i>
                                       <span class="required" aria-required="true">* <?php echo "(" . $gm_premium_edition . ")"; ?></span>
                                    </label>
                                    <select name="ux_ddl_sort_albums_by" id="ux_ddl_sort_albums_by" class="form-control" onchange="premium_edition_notification_gallery_master();">
                                       <option value="album_title"><?php echo $gm_title; ?></option>
                                       <option value="upload_date"><?php echo $gm_date; ?></option>
                                       <option value="album_name"><?php echo $gm_filename; ?></option>
                                       <option value="file_type"><?php echo $gm_type; ?></option>
                                       <option value="sort_order" selected="selected"><?php echo $gm_custom_order; ?></option>
                                       <option value="random_order"><?php echo $gm_random_order; ?></option>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label class="control-label">
                                       <?php echo $gm_order_albums_by_title; ?> :
                                       <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_order_albums_by_tooltip; ?>" data-placement="right"></i>
                                       <span class="required" aria-required="true">* <?php echo "(" . $gm_premium_edition . ")"; ?></span>
                                    </label>
                                    <select name="ux_ddl_order_albums" id="ux_ddl_order_albums" class="form-control" onchange="premium_edition_notification_gallery_master();">
                                       <option value="sort_asc"><?php echo $gm_ascending; ?></option>
                                       <option value="sort_desc"><?php echo $gm_descending; ?></option>
                                    </select>
                                 </div>
                              </div>
                           </div>
                        </div>

                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label">
                                    <?php echo $gm_alignment_title; ?> :
                                    <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_layout_settings_alignment_tooltip; ?>" data-placement="right"></i>
                                    <span class="required" aria-required="true">* <?php echo "(" . $gm_premium_edition . ")"; ?></span>
                                 </label>
                                 <div class="input-icon right">
                                    <select name="ux_ddl_alignment" id="ux_ddl_alignment" class="form-control" onchange="premium_edition_notification_gallery_master();">
                                       <option value="left"><?php echo $gm_left; ?></option>
                                       <option value="center"><?php echo $gm_center; ?></option>
                                       <option value="right"><?php echo $gm_right; ?></option>
                                    </select>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label">
                                    <?php echo $gm_slideshow_layout_shortcode_slideshow_width ?> :
                                    <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_slideshow_layout_shortcode_slideshow_tooltip; ?>" data-placement="right"></i>
                                    <span class="required" aria-required="true">* <?php echo "(" . $gm_premium_edition . ")"; ?></span>
                                 </label>
                                 <div class="input-icon right">
                                    <input type="text" class="form-control input-inline" name="ux_txt_slideshow_width" id="ux_txt_slideshow_width" placeholder="<?php echo $gm_width_layout_placeholder; ?>" onblur="set_thumbnail_dimension_in_shortcode(this,<?php echo $image_dimensions[0] ?>, '<?php echo $gm_shortcode_slideshow_width_exceed_msg; ?>'); premium_edition_notification_gallery_master();" maxlength="4" onkeypress="digits_with_dot_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="800">
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="control-label">
                              <?php echo $gm_slideshow_layout_slideshow_flimstrips_title; ?> :
                              <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_slideshow_layout_slideshow_flimstrips_tooltip; ?>" data-placement="right"></i>
                              <span class="required" aria-required="true">* <?php echo "(" . $gm_premium_edition . ")"; ?></span>
                           </label>
                           <select name="ux_ddl_filmstrips" id="ux_ddl_filmstrips" class="form-control" onchange="premium_edition_notification_gallery_master();">
                              <option value="show"><?php echo $gm_show; ?></option>
                              <option value="hide"><?php echo $gm_hide; ?></option>
                           </select>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label">
                                    <?php echo $gm_slideshow_layout_control_button_title; ?> :
                                    <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_slideshow_layout_control_button_tooltip; ?>" data-placement="right"></i>
                                    <span class="required" aria-required="true">* <?php echo "(" . $gm_premium_edition . ")"; ?></span>
                                 </label>
                                 <div class="input-icon right">
                                    <select name="ux_ddl_control_button" id="ux_ddl_control_button" class="form-control" onchange="premium_edition_notification_gallery_master();">
                                       <option value="show"><?php echo $gm_show; ?></option>
                                       <option value="hide"><?php echo $gm_hide; ?></option>
                                    </select>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label">
                                    <?php echo $gm_autoplay_title; ?> :
                                    <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_autoplay_tooltip; ?>" data-placement="right"></i>
                                    <span class="required" aria-required="true">* <?php echo "(" . $gm_premium_edition . ")"; ?></span>
                                 </label>
                                 <select id="ux_ddl_autoplay" name="ux_ddl_autoplay" class="form-control" onchange="premium_edition_notification_gallery_master();">
                                    <option value="yes" selected><?php echo $gm_yes; ?></option>
                                    <option value="no"><?php echo $gm_no; ?></option>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div id="ux_div_time_interval">
                           <div class="form-group">
                              <label class="control-label">
                                 <?php echo $gm_time_interval_title; ?> :
                                 <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_time_interval_tooltip; ?>" data-placement="right"></i>
                                 <span class="required" aria-required="true">* <?php echo "(" . $gm_premium_edition . ")"; ?></span>
                              </label>
                              <input type="text" class="form-control" name="ux_txt_time_interval" id="ux_txt_time_interval" value="5" maxlength="3" onkeypress="only_digits_gallery_master(event);" onblur="default_value_gallery_master('#ux_txt_time_interval', 5); premium_edition_notification_gallery_master();" onfocus="paste_prevent_gallery_master(this.id);" placeholder="<?php echo $gm_time_interval_placeholder; ?>">
                           </div>
                        </div>
                        <div class="row" id="ux_div_album_control">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label">
                                    <?php echo $gm_album_title; ?> :
                                    <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_album_title_tooltip; ?>" data-placement="right"></i>
                                    <span class="required" aria-required="true">* <?php echo "(" . $gm_premium_edition . ")"; ?></span>
                                 </label>
                                 <select id="ux_ddl_album_title" name="ux_ddl_album_title" class="form-control">
                                    <option value="show"><?php echo $gm_show; ?></option>
                                    <option value="hide"><?php echo $gm_hide; ?></option>
                                 </select>                                            </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label">
                                    <?php echo $gm_album_description; ?> :
                                    <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_album_description_tooltip; ?>" data-placement="right"></i>
                                    <span class="required" aria-required="true">* <?php echo "(" . $gm_premium_edition . ")"; ?></span>
                                 </label>
                                 <select id="ux_ddl_album_description" name="ux_ddl_album_description" class="form-control">
                                    <option value="show"><?php echo $gm_show; ?></option>
                                    <option value="hide"><?php echo $gm_hide; ?></option>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label">
                                    <?php echo $gm_gallery_title; ?> :
                                    <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_gallery_title_tooltip; ?>" data-placement="right"></i>
                                    <span class="required" aria-required="true">* <?php echo "(" . $gm_premium_edition . ")"; ?></span>
                                 </label>
                                 <select id="ux_ddl_gallery_title" name="ux_ddl_gallery_title" class="form-control" onchange="premium_edition_notification_gallery_master();">
                                    <option value="show"><?php echo $gm_show; ?></option>
                                    <option value="hide"><?php echo $gm_hide; ?></option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label">
                                    <?php echo $gm_gallery_description_title; ?> :
                                    <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_gallery_description_tooltip; ?>" data-placement="right"></i>
                                    <span class="required" aria-required="true">* <?php echo "(" . $gm_premium_edition . ")"; ?></span>
                                 </label>
                                 <div class="input-icon right">
                                    <select name="ux_ddl_gallery_description" id="ux_ddl_gallery_description" class="form-control" onchange="premium_edition_notification_gallery_master();">
                                       <option value="show"><?php echo $gm_show; ?></option>
                                       <option value="hide"><?php echo $gm_hide; ?></option>
                                    </select>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label">
                                    <?php echo $gm_thumbnail_title; ?> :
                                    <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_thumbnail_tooltip; ?>" data-placement="right"></i>
                                    <span class="required" aria-required="true">* <?php echo "(" . $gm_premium_edition . ")"; ?></span>
                                 </label>
                                 <select id="ux_ddl_thumbnail_title" name="ux_ddl_thumbnail_title" class="form-control" onchange="premium_edition_notification_gallery_master();">
                                    <option value="show"><?php echo $gm_show; ?></option>
                                    <option value="hide"><?php echo $gm_hide; ?></option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label">
                                    <?php echo $gm_thumbnail_description_title; ?> :
                                    <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_thumbnail_description_tooltip; ?>" data-placement="right"></i>
                                    <span class="required" aria-required="true">* <?php echo "(" . $gm_premium_edition . ")"; ?></span>
                                 </label>
                                 <div class="input-icon right">
                                    <select name="ux_ddl_thumbnail_description" id="ux_ddl_thumbnail_description" class="form-control" onchange="premium_edition_notification_gallery_master();">
                                       <option value="show"><?php echo $gm_show; ?></option>
                                       <option value="hide"><?php echo $gm_hide; ?></option>
                                    </select>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label">
                                    <?php echo $gm_sort_images_title; ?> :
                                    <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_sort_images_tooltip; ?>" data-placement="right"></i>
                                    <span class="required" aria-required="true">* <?php echo "(" . $gm_premium_edition . ")"; ?></span>
                                 </label>
                                 <div class="input-icon right">
                                    <select name="ux_ddl_sort_image_by" id="ux_ddl_sort_image_by" class="form-control" onchange="premium_edition_notification_gallery_master();">
                                       <option value="image_title"><?php echo $gm_title; ?></option>
                                       <option value="upload_date"><?php echo $gm_date; ?></option>
                                       <option value="image_name"><?php echo $gm_filename; ?></option>
                                       <option value="file_type"><?php echo $gm_type; ?></option>
                                       <option value="sort_order" selected="selected"><?php echo $gm_custom_order; ?></option>
                                       <option value="random_order"><?php echo $gm_random_order; ?></option>
                                    </select>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label">
                                    <?php echo $gm_order_by_title; ?> :
                                    <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_order_by_tooltip; ?>" data-placement="right"></i>
                                    <span class="required" aria-required="true">* <?php echo "(" . $gm_premium_edition . ")"; ?></span>
                                 </label>
                                 <select name="ux_ddl_order_images" id="ux_ddl_order_images" class="form-control" onchange="premium_edition_notification_gallery_master();">
                                    <option value="sort_asc"><?php echo $gm_ascending; ?></option>
                                    <option value="sort_desc"><?php echo $gm_descending; ?></option>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label">
                                    <?php echo $gm_global_option_lazy_load_title; ?> :
                                    <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_global_option_lazy_load_tooltip; ?>" data-placement="right"></i>
                                    <span class="required" aria-required="true">* <?php echo "(" . $gm_premium_edition . ")"; ?></span>
                                 </label>
                                 <div class="input-icon right">
                                    <select name="ux_ddl_lazy_load" id="ux_ddl_lazy_load" class="form-control" onchange="premium_edition_notification_gallery_master();">
                                       <option value="disable"><?php echo $gm_disable; ?></option>
                                       <option value="enable"><?php echo $gm_enable; ?></option>
                                    </select>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label">
                                    <?php echo $gm_filters; ?> :
                                    <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_filters_tooltip; ?>" data-placement="right"></i>
                                    <span class="required" aria-required="true">* <?php echo "(" . $gm_premium_edition . ")"; ?></span>
                                 </label>
                                 <div class="input-icon right">
                                    <select name="ux_ddl_filters" id="ux_ddl_filters" class="form-control" onchange="premium_edition_notification_gallery_master();">
                                       <option value="disable"><?php echo $gm_disable; ?></option>
                                       <option value="enable"><?php echo $gm_enable; ?></option>
                                    </select>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label">
                                    <?php echo $global_option_order_by; ?> :
                                    <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_global_option_order_by_tooltip; ?>" data-placement="right"></i>
                                    <span class="required" aria-required="true">* <?php echo "(" . $gm_premium_edition . ")"; ?></span>
                                 </label>
                                 <div class="input-icon right">
                                    <select name="ux_ddl_order_by" id="ux_ddl_order_by" class="form-control" onchange="premium_edition_notification_gallery_master();">
                                       <option value="disable"><?php echo $gm_disable; ?></option>                                                    
                                       <option value="enable"><?php echo $gm_enable; ?></option>
                                    </select>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label">
                                    <?php echo $global_option_search_box; ?> :
                                    <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_global_option_search_box_tooltip; ?>" data-placement="right"></i>
                                    <span class="required" aria-required="true">* <?php echo "(" . $gm_premium_edition . ")"; ?></span>
                                 </label>
                                 <div class="input-icon right">
                                    <select name="ux_ddl_search_box" id="ux_ddl_search_box" class="form-control" onchange="premium_edition_notification_gallery_master();">
                                       <option value="disable"><?php echo $gm_disable; ?></option>                                                    
                                       <option value="enable"><?php echo $gm_enable; ?></option>
                                    </select>
                                 </div>
                              </div> 
                           </div>
                        </div>
                        <div id="ux_div_special_effects">
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label class="control-label">
                                       <?php echo $gm_animation_effect_title; ?> :
                                       <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_animation_effect_tooltip; ?>" data-placement="right"></i>
                                       <span class="required" aria-required="true">* <?php echo "(" . $gm_premium_edition . ")"; ?></span>
                                    </label>
                                    <select id="ux_ddl_animation_effect" name="ux_ddl_animation_effect" class="form-control" onchange="premium_edition_notification_gallery_master();">
                                       <option value="none"><?php echo $gm_none; ?></option>
                                       <optgroup label="<?php echo $gm_magic_effect; ?>">
                                          <option value="twisterInDown"><?php echo $gm_twister_in_down; ?></option>
                                          <option value="twisterInUp"><?php echo $gm_twister_in_up; ?></option>
                                          <option value="swap"><?php echo $gm_swap; ?></option>
                                       </optgroup>
                                       <optgroup label="<?php echo $gm_bling; ?>">
                                          <option value="puffIn"><?php echo $gm_puff_in; ?></option>
                                          <option value="vanishIn"><?php echo $gm_vanish_in; ?></option>
                                       </optgroup>
                                       <optgroup label="<?php echo $gm_static_effect; ?>">                                                        
                                          <option value="openDownLeftReturn"><?php echo $gm_open_down_left_return; ?></option>
                                          <option value="openDownRightReturn"><?php echo $gm_open_down_right_return; ?></option>
                                          <option value="openUpLeftReturn"><?php echo $gm_open_up_left_return; ?></option>
                                          <option value="openUpRightReturn"><?php echo $gm_open_up_right_return; ?></option>
                                       </optgroup>
                                       <optgroup label="<?php echo $gm_perspective; ?>">
                                          <option value="perspectiveDownReturn"><?php echo $gm_perspective_down_return; ?></option>
                                          <option value="perspectiveUpReturn"><?php echo $gm_perspective_up_return; ?></option>
                                          <option value="perspectiveLeftReturn"><?php echo $gm_perspective_left_return; ?></option>
                                          <option value="perspectiveRightReturn"><?php echo $gm_perspective_right_return; ?></option>
                                       </optgroup>
                                       <optgroup label="<?php echo $gm_slide; ?>">
                                          <option value="slideDownReturn"><?php echo $gm_slide_down_return; ?></option>
                                          <option value="slideUpReturn"><?php echo $gm_slide_up_return; ?></option>
                                          <option value="slideLeftReturn"><?php echo $gm_slide_left_return; ?></option>
                                          <option value="slideRightReturn"><?php echo $gm_slide_right_return; ?></option>
                                       </optgroup>
                                       <optgroup label="<?php echo $gm_math; ?>">
                                          <option value="swashIn"><?php echo $gm_swash_in; ?></option>
                                          <option value="foolishIn"><?php echo $gm_foolish_in; ?></option>
                                       </optgroup>
                                       <optgroup label="<?php echo $gm_tin; ?>">
                                          <option value="tinRightIn"><?php echo $gm_tin_right_in; ?></option>
                                          <option value="tinLeftIn"><?php echo $gm_tin_left_in; ?></option>
                                       </optgroup>
                                       <optgroup label="<?php echo $gm_boing; ?>">
                                          <option value="boingInUp"><?php echo $gm_boing_in_up; ?></option>
                                       <optgroup label="<?php echo $gm_on_the_space; ?>">
                                          <option value="spaceInUp"><?php echo $gm_space_in_up; ?></option>
                                          <option value="spaceInRight"><?php echo $gm_space_in_right; ?></option>
                                          <option value="spaceInDown"><?php echo $gm_space_in_down; ?></option>
                                          <option value="spaceInLeft"><?php echo $gm_space_in_left; ?></option>                                                        
                                       </optgroup>
                                       <optgroup label="<?php echo $gm_attention_seekers; ?>">
                                          <option value="bounce"><?php echo $gm_bounce; ?></option>
                                          <option value="flash"><?php echo $gm_flash; ?></option>
                                          <option value="pulse"><?php echo $gm_pulse; ?></option>
                                          <option value="rubberBand"><?php echo $gm_rubber_band; ?></option>
                                          <option value="shake"><?php echo $gm_shake; ?></option>
                                          <option value="swing"><?php echo $gm_swing; ?></option>
                                          <option value="tada"><?php echo $gm_tada; ?></option>
                                          <option value="wobble"><?php echo $gm_wobble; ?></option>
                                          <option value="jello"><?php echo $gm_jello; ?></option>
                                       </optgroup>
                                       <optgroup label="<?php echo $gm_bouncing_entrances; ?>">
                                          <option value="bounceIn"><?php echo $gm_bounce_in; ?></option>
                                          <option value="bounceInDown"><?php echo $gm_bounce_in_down; ?></option>
                                          <option value="bounceInLeft"><?php echo $gm_bounce_in_left; ?></option>
                                          <option value="bounceInRight"><?php echo $gm_bounce_in_right; ?></option>
                                          <option value="bounceInUp"><?php echo $gm_bounce_in_up; ?></option>
                                       </optgroup>
                                       <optgroup label="<?php echo $gm_fading_entrances; ?>">
                                          <option value="fadeIn" selected="selected"><?php echo $gm_fade_in; ?></option>
                                          <option value="fadeInDown"><?php echo $gm_fade_in_down; ?></option>
                                          <option value="fadeInLeft"><?php echo $gm_fade_in_left; ?></option>
                                          <option value="fadeInLeftBig"><?php echo $gm_fade_in_left_big; ?></option>
                                          <option value="fadeInRight"><?php echo $gm_fade_in_right; ?></option>
                                          <option value="fadeInRightBig"><?php echo $gm_fade_in_right_big; ?></option>
                                          <option value="fadeInUp"><?php echo $gm_fade_in_up; ?></option>
                                       </optgroup>
                                       <optgroup label="<?php echo $gm_flippers; ?>">
                                          <option value="flip"><?php echo $gm_flip; ?></option>
                                          <option value="flipInX"><?php echo $gm_flip_in_x; ?></option>
                                          <option value="flipInY"><?php echo $gm_flip_in_y; ?></option>
                                       </optgroup>
                                       <optgroup label="<?php echo $gm_lightspeed; ?>">
                                          <option value="lightSpeedIn"><?php echo $gm_light_speed_in; ?></option>
                                       </optgroup>
                                       <optgroup label="<?php echo $gm_rotating_entrances; ?>">
                                          <option value="rotateIn"><?php echo $gm_rotate_in; ?></option>
                                          <option value="rotateInDownLeft"><?php echo $gm_rotate_in_down_left; ?></option>
                                          <option value="rotateInDownRight"><?php echo $gm_rotate_in_down_right; ?></option>
                                          <option value="rotateInUpLeft"><?php echo $gm_rotate_in_up_left; ?></option>
                                          <option value="rotateInUpRight"><?php echo $gm_rotate_in_up_right; ?></option>
                                       </optgroup>
                                       <optgroup label="<?php echo $gm_sliding_entrances; ?>">
                                          <option value="slideInUp"><?php echo $gm_slide_in_up; ?></option>
                                          <option value="slideInDown"><?php echo $gm_slide_in_down; ?></option>
                                          <option value="slideInLeft"><?php echo $gm_slide_in_left; ?></option>
                                          <option value="slideInRight"><?php echo $gm_slide_in_right; ?></option>
                                       </optgroup>
                                       <optgroup label="<?php echo $gm_zoom_entrances; ?>">
                                          <option value="zoomIn"><?php echo $gm_zoom_in; ?></option>
                                          <option value="zoomInDown"><?php echo $gm_zoom_in_down; ?></option>
                                          <option value="zoomInLeft"><?php echo $gm_zoom_in_left; ?></option>
                                          <option value="zoomInRight"><?php echo $gm_zoom_in_right; ?></option>
                                          <option value="zoomInUp"><?php echo $gm_zoom_in_up; ?></option>
                                       </optgroup>
                                       <optgroup label="<?php echo $gm_specials; ?>">
                                          <option value="rollIn"><?php echo $gm_roll_in; ?></option>
                                       </optgroup>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label class="control-label">
                                       <?php echo $gm_special_effect_title; ?> :
                                       <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_special_effect_tooltip; ?>" data-placement="right"></i>
                                       <span class="required" aria-required="true">* <?php echo "(" . $gm_premium_edition . ")"; ?></span>
                                    </label>
                                    <div class="input-icon right">
                                       <select id="ux_ddl_special_effects" name="ux_ddl_special_effects" class="form-control" onchange="premium_edition_notification_gallery_master();">
                                          <option value="none"><?php echo $gm_none; ?></option>
                                          <option value="blur"><?php echo $gm_blur; ?></option>
                                          <option value="sepia"><?php echo $gm_sepia; ?></option>
                                          <option value="brightness"><?php echo $gm_brightness; ?></option>
                                          <option value="contrast"><?php echo $gm_contrast; ?></option>
                                          <option value="invert"><?php echo $gm_invert; ?></option>
                                          <option value="saturate"><?php echo $gm_saturate; ?></option>
                                          <option value="grayscale"><?php echo $gm_grayscale; ?></option>
                                          <option value="hue-rotate"><?php echo $gm_hue_rotate; ?></option>
                                       </select>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div id="ux_div_shortcode" class="ux_div_shortcode" style="display:none;">
                           <div class="form-group">
                              <label class="control-label">
                                 <?php echo $gm_shortcode_title; ?> :
                                 <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_shortcode_tooltip; ?>" data-placement="right"></i>
                                 <span class="required" aria-required="true">* <?php echo "(" . $gm_premium_edition . ")"; ?></span>
                              </label>
                              <div class="icon-custom-docs tooltips pull-right" style="font-size:18px;" data-original-title="<?php echo $gm_copy_to_clipboard; ?>" data-placement="left" data-clipboard-action="copy" data-clipboard-target="#ux_txtarea_generate_shortcodes"></div>
                              <textarea class="form-control ux_txtarea_generate_shortcode" readonly="true" name="ux_txtarea_generate_shortcodes" id="ux_txtarea_generate_shortcodes" rows="4"></textarea>
                           </div>
                        </div>
                        <div class="line-separator"></div>
                        <div class="form-actions">
                           <div class="pull-right">
                              <input type="button" class="btn vivid-green reset-page" name="ux_btn_reset_shortcode" id="ux_btn_reset_shortcode" value="<?php echo $gm_reset_shortcode; ?>">
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <?php
   } else {
      ?>
      <div class="page-bar">
         <ul class="page-breadcrumb">
            <li>
               <i class="icon-custom-home"></i>
               <a href="admin.php?page=gallery_master">
                  <?php echo $gallery_master; ?>
               </a>
               <span>></span>
            </li>
            <li>
               <a href="admin.php?page=gm_thumbnail_layout_shortcode">
                  <?php echo $gm_shortcode_generator; ?>
               </a>
               <span>></span>
            </li>
            <li>
               <span>
                  <?php echo $gm_slideshow_layout; ?>
               </span>
            </li>
         </ul>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="portlet box vivid-green">
               <div class="portlet-title">
                  <div class="caption">
                     <i class="icon-custom-control-play"></i>
                     <?php echo $gm_slideshow_layout; ?>
                  </div>
               </div>
               <div class="portlet-body form">
                  <form id="ux_frm_slide_show_layout">
                     <div class="form-body">
                        <strong><?php echo $gm_user_access_message; ?></strong>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <?php
   }
}