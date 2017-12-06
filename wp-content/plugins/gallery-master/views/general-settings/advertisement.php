<?php
/**
 * Template for view and update settings in Advertisement.
 *
 * @author 	Tech Banker
 * @package 	gallery-master/views/general-settings
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
   } else if (general_settings_gallery_master == "1") {
      $advertisement_font_style = isset($advertisement_get_data["advertisement_font_style"]) ? explode(",", esc_attr($advertisement_get_data["advertisement_font_style"])) : array(20, "#cccccc");
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
               <a href="admin.php?page=gm_global_options">
                  <?php echo $gm_general_settings; ?>
               </a>
               <span>></span>
            </li>
            <li>
               <span>
                  <?php echo $gm_advertisement; ?>
               </span>
            </li>
         </ul>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="portlet box vivid-green">
               <div class="portlet-title">
                  <div class="caption">
                     <i class="icon-custom-volume-2"></i>
                     <?php echo $gm_advertisement; ?>
                  </div>
                  <p class="premium-editions">
                     <?php echo $gm_upgrade_need_help ?><a href="<?php echo tech_banker_gallery_url; ?>" target="_blank" class="premium-editions-documentation"><?php echo $gm_documentation ?></a><?php echo $gm_read_and_check; ?><a href="<?php echo tech_banker_gallery_url; ?>frontend-demos/" target="_blank" class="premium-editions-documentation"><?php echo $gm_demos_section; ?></a>
                  </p>
               </div>
               <div class="portlet-body form">
                  <form id="ux_frm_advertisement">
                     <div class="form-body">
                        <div class="form-actions">
                           <div class="pull-right">
                              <input type="submit" class="btn vivid-green" name="ux_btn_add_tag"  id="ux_btn_add_tag" value="<?php echo $gm_save_changes; ?>">
                           </div>
                        </div>
                        <div class="line-separator"></div>
                        <div class="form-group">
                           <label class="control-label">
                              <?php echo $gm_advertisement_title; ?> :
                              <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_advertisement_tooltip; ?>" data-placement="right"></i>
                              <span class="required" aria-required="true">* <?php echo " (" . $gm_premium_edition . " )" ?></span>
                           </label>
                           <select name="ux_ddl_advertisement" id="ux_ddl_advertisement" class="form-control" onchange="advertisment_settings_gallery_master();">
                              <option value="none"><?php echo $gm_none; ?></option>
                              <option value="text"><?php echo $gm_text; ?></option>
                              <option value="image"><?php echo $gm_image; ?></option>
                           </select>
                        </div>
                        <div id="ux_div_advertisement_text" style="display:none">
                           <div class="form-group">
                              <label class="control-label">
                                 <?php echo $gm_advertisement_text_title; ?> :
                                 <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_advertisement_text_tooltip; ?>" data-placement="right"></i>
                                 <span class="required" aria-required="true">* <?php echo " (" . $gm_premium_edition . " )" ?></span>
                              </label>
                              <input type="text" class="form-control" name="ux_txt_advertisement_text" id="ux_txt_advertisement_text" value="<?php echo isset($advertisement_get_data["advertisement_text"]) ? esc_attr($advertisement_get_data["advertisement_text"]) : ""; ?>" placeholder="<?php echo $gm_advertisement_text_placeholder; ?>">
                           </div>
                        </div>
                        <div id="ux_div_advertisement_url">
                           <div class="form-group">
                              <label class="control-label">
                                 <?php echo $gm_advertisement_link_title; ?> :
                                 <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_advertisement_link_tooltip; ?>" data-placement="right"></i>
                                 <span class="required" aria-required="true"> <?php echo " (" . $gm_premium_edition . " )" ?></span>
                              </label>
                              <input type="text" class="form-control" name="ux_txt_advertisement_link" id="ux_txt_advertisement_link" value="<?php echo isset($advertisement_get_data["advertisement_link"]) ? esc_attr($advertisement_get_data["advertisement_link"]) : ""; ?>" placeholder="<?php echo $gm_advertisemnt_link_placeholder; ?>">
                           </div>
                        </div>
                        <div id="ux_div_advertisement_opacity">
                           <div class="form-group">
                              <label class="control-label">
                                 <?php echo $gm_advertisemnt_link_opacity_title; ?> :
                                 <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_advertisemnt_link_opacity_tooltip; ?>" data-placement="right"></i>
                                 <span class="required" aria-required="true">* <?php echo " (" . $gm_premium_edition . " )" ?></span>
                              </label>
                              <input type="text" class="form-control" name="ux_txt_advertisement_opacity" id="ux_txt_advertisement_opacity" onchange="check_opacity_gallery_master(this)" onblur="default_value_gallery_master('#ux_txt_advertisement_opacity', 100)" maxlength="3" onkeypress="only_digits_gallery_master(event);" value="<?php echo isset($advertisement_get_data["advertisement_opacity"]) ? intval($advertisement_get_data["advertisement_opacity"]) : 100; ?>" placeholder="<?php echo $gm_opacity_placeholder; ?>">
                           </div>
                        </div>
                        <div id="ux_div_style" style="display:none">
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label class="control-label">
                                       <?php echo $gm_font_style; ?> :
                                       <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_font_style_tooltip; ?>" data-placement="right"></i>
                                       <span class="required" aria-required="true">* <?php echo " (" . $gm_premium_edition . " )" ?></span>
                                    </label>
                                    <div class="input-icon right">
                                       <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_advertise_font[]" id="ux_txt_advertise_size" placeholder="<?php echo $gm_font_size_placeholder; ?>" onblur="default_value_gallery_master('#ux_txt_advertise_size', 20)" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($advertisement_font_style[0]); ?>"  >
                                       <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_advertise_font[]" id="ux_txt_advertisement_color" onfocus="color_picker_gallery_master(this, this.value)" onblur="default_value_gallery_master('#ux_txt_advertisement_color', '#cccccc')"  placeholder="<?php echo $gm_color_placeholder; ?>" value="<?php echo esc_attr($advertisement_font_style[1]); ?>" >
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label class="control-label">
                                       <?php echo $gm_font_family_title; ?> :
                                       <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_advertisemnt_link_font_family_tooltip; ?>" data-placement="right"></i>
                                       <span class="required" aria-required="true">* <?php echo " (" . $gm_premium_edition . " )" ?></span>
                                    </label>
                                    <select name="ux_ddl_font" id="ux_ddl_font" class="form-control">
                                       <?php
                                       if (file_exists(GALLERY_MASTER_PLUGIN_DIR_PATH . "includes/web-fonts.php")) {
                                          include GALLERY_MASTER_PLUGIN_DIR_PATH . "includes/web-fonts.php";
                                       }
                                       ?>
                                    </select>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div id="ux_div_advertisement_image" style="display:none">
                           <div class="form-group">
                              <label class="control-label">
                                 <?php echo $gm_advertisement_url_title; ?> :
                                 <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_advertisement_url_tooltip; ?>" data-placement="right"></i>
                                 <span class="required" aria-required="true">* <?php echo " (" . $gm_premium_edition . " )" ?></span>
                              </label>
                              <input class="form-control custom-input-large input-inline" name="ux_txt_advertisement_url" id="ux_txt_advertisement_url" value="<?php echo isset($advertisement_get_data["advertisement_url"]) ? esc_attr($advertisement_get_data["advertisement_url"]) : ""; ?>" placeholder="<?php echo $gm_url_placeholder; ?>" type="text">
                              <input id="wp_upload_button" class="btn vivid-green" onclick="premium_edition_notification_gallery_master();" value="<?php echo $gm_url_add_image; ?>" type="button">
                              <p id="wp_media_upload_error_message" style="display: none;"><?php echo $gm_url_message; ?></p>
                           </div>
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label class="control-label">
                                       <?php echo $gm_advertisement_width_title; ?> :
                                       <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_advertisement_width_tooltip; ?>" data-placement="right"></i>
                                       <span class="required" aria-required="true">* <?php echo " (" . $gm_premium_edition . " )" ?></span>
                                    </label>
                                    <input type="text" class="form-control" name="ux_txt_advertisment_width" id="ux_txt_advertisment_size" value="<?php echo isset($advertisement_get_data["advertisement_width"]) ? intval($advertisement_get_data["advertisement_width"]) : 100; ?>" placeholder="<?php echo $gm_advertisement_width_placeholder; ?>" onblur="default_value_gallery_master('#ux_txt_advertisment_size', 100)" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);">
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label class="control-label">
                                       <?php echo $gm_advertisement_height_title; ?> :
                                       <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_advertisement_height_tooltip; ?>" data-placement="right"></i>
                                       <span class="required" aria-required="true">* <?php echo " (" . $gm_premium_edition . " )" ?></span>
                                    </label>
                                    <input type="text" class="form-control" name="ux_txt_advertisment_height" id="ux_txt_advertisment_height" value="<?php echo isset($advertisement_get_data["advertisement_height"]) ? intval($advertisement_get_data["advertisement_height"]) : 100; ?>" placeholder="<?php echo $gm_advertisement_hieght_placeholder; ?>" onblur="default_value_gallery_master('#ux_txt_advertisment_height', 100)" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);">
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div id="ux_div_font" style="display:none">
                           <div class="form-group">
                              <label class="control-label">
                                 <?php echo $gm_advertisement_position_title; ?> :
                                 <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_advertisement_position_tooltip; ?>" data-placement="right"></i>
                                 <span class="required" aria-required="true">* <?php echo " (" . $gm_premium_edition . " )" ?></span>
                              </label>
                              <select name="ux_ddl_advertisement_position" id="ux_ddl_advertisement_position" class="form-control">
                                 <option value="top_left"><?php echo $gm_position_top_left; ?></option>
                                 <option value="top_center"><?php echo $gm_position_top_center; ?></option>
                                 <option value="top_right"><?php echo $gm_position_top_right; ?></option>
                                 <option value="middle_left"><?php echo $gm_position_middle_left; ?></option>
                                 <option value="middle_center"><?php echo $gm_position_middle_center; ?></option>
                                 <option value="middle_right"><?php echo $gm_position_middle_right; ?></option>
                                 <option value="bottom_left"><?php echo $gm_position_bottom_left; ?></option>
                                 <option value="bottom_center"><?php echo $gm_position_bottom_center; ?></option>
                                 <option value="bottom_right"><?php echo $gm_position_bottom_right; ?></option>
                              </select>
                           </div>
                        </div>
                        <div class="line-separator"></div>
                        <div class="form-actions">
                           <div class="pull-right">
                              <input type="submit" class="btn vivid-green" name="ux_btn_save_changes" id="ux_btn_save_changes" value="<?php echo $gm_save_changes ?>">
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
               <a href="admin.php?page=gm_global_options">
                  <?php echo $gm_general_settings; ?>
               </a>
               <span>></span>
            </li>
            <li>
               <span>
                  <?php echo $gm_advertisement; ?>
               </span>
            </li>
         </ul>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="portlet box vivid-green">
               <div class="portlet-title">
                  <div class="caption">
                     <i class="icon-custom-volume-2"></i>
                     <?php echo $gm_advertisement; ?>
                  </div>
               </div>
               <div class="portlet-body form">
                  <div class="form-body">
                     <strong><?php echo $gm_user_access_message; ?></strong>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <?php
   }
}