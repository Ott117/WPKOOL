<?php
/**
 * Template to view and update the settings for Blog Style Layout.
 *
 * @author 	Tech Banker
 * @package 	gallery-master/views/layout-settings
 * @version	2.0.0
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
   } else if (layout_settings_gallery_master == "1") {
      $blog_style_layout_nonce = wp_create_nonce("blog_style_layout_nonce");
      $blog_style_layout_general_margin = isset($blog_style_layout_data["blog_style_layout_general_margin"]) ? explode(",", esc_attr($blog_style_layout_data["blog_style_layout_general_margin"])) : array(0, 0, 15, 0);
      $blog_style_layout_general_padding = isset($blog_style_layout_data["blog_style_layout_general_padding"]) ? explode(",", esc_attr($blog_style_layout_data["blog_style_layout_general_padding"])) : array(5, 5, 5, 5);
      $blog_style_layout_general_border_style = isset($blog_style_layout_data["blog_style_layout_general_border_style"]) ? explode(",", esc_attr($blog_style_layout_data["blog_style_layout_general_border_style"])) : array(2, "solid", "#000000");
      $blog_style_layout_general_shadow = isset($blog_style_layout_data["blog_style_layout_general_shadow"]) ? explode(",", esc_attr($blog_style_layout_data["blog_style_layout_general_shadow"])) : array(0, 1, 3, 0);
      $blog_style_layout_general_hover_effect_value = isset($blog_style_layout_data["blog_style_layout_general_hover_effect_value"]) ? explode(",", esc_attr($blog_style_layout_data["blog_style_layout_general_hover_effect_value"])) : array("none", 0, 0, 0);
      $blog_style_layout_gallery_title_font_style = isset($blog_style_layout_data["blog_style_layout_gallery_title_font_style"]) ? explode(",", esc_attr($blog_style_layout_data["blog_style_layout_gallery_title_font_style"])) : array(20, "#000000");
      $blog_style_layout_gallery_title_margin = isset($blog_style_layout_data["blog_style_layout_gallery_title_margin"]) ? explode(",", esc_attr($blog_style_layout_data["blog_style_layout_gallery_title_margin"])) : array(10, 0, 10, 0);
      $blog_style_layout_gallery_title_padding = isset($blog_style_layout_data["blog_style_layout_gallery_title_padding"]) ? explode(",", esc_attr($blog_style_layout_data["blog_style_layout_gallery_title_padding"])) : array(10, 0, 10, 0);
      $blog_style_layout_gallery_description_font_style = isset($blog_style_layout_data["blog_style_layout_gallery_description_font_style"]) ? explode(",", esc_attr($blog_style_layout_data["blog_style_layout_gallery_description_font_style"])) : array(16, "#787D85");
      $blog_style_layout_gallery_description_margin = isset($blog_style_layout_data["blog_style_layout_gallery_description_margin"]) ? explode(",", esc_attr($blog_style_layout_data["blog_style_layout_gallery_description_margin"])) : array(10, 0, 10, 0);
      $blog_style_layout_gallery_description_padding = isset($blog_style_layout_data["blog_style_layout_gallery_description_padding"]) ? explode(",", esc_attr($blog_style_layout_data["blog_style_layout_gallery_description_padding"])) : array(0, 0, 10, 0);
      $blog_style_layout_thumbnail_title_font_style = isset($blog_style_layout_data["blog_style_layout_thumbnail_title_font_style"]) ? explode(",", esc_attr($blog_style_layout_data["blog_style_layout_thumbnail_title_font_style"])) : array(14, "#787D85");
      $blog_style_layout_thumbnail_title_margin = isset($blog_style_layout_data["blog_style_layout_thumbnail_title_margin"]) ? explode(",", esc_attr($blog_style_layout_data["blog_style_layout_thumbnail_title_margin"])) : array(0, 5, 0, 5);
      $blog_style_layout_thumbnail_title_padding = isset($blog_style_layout_data["blog_style_layout_thumbnail_title_padding"]) ? explode(",", esc_attr($blog_style_layout_data["blog_style_layout_thumbnail_title_padding"])) : array(10, 10, 10, 10);
      $blog_style_layout_thumbnail_description_margin_font_style = isset($blog_style_layout_data["blog_style_layout_thumbnail_description_font_style"]) ? explode(",", esc_attr($blog_style_layout_data["blog_style_layout_thumbnail_description_font_style"])) : array(12, "#787D85");
      $blog_style_layout_thumbnail_description_margin = isset($blog_style_layout_data["blog_style_layout_thumbnail_description_margin"]) ? explode(",", esc_attr($blog_style_layout_data["blog_style_layout_thumbnail_description_margin"])) : array(0, 5, 0, 5);
      $blog_style_layout_thumbnail_description_padding = isset($blog_style_layout_data["blog_style_layout_thumbnail_description_padding"]) ? explode(",", esc_attr($blog_style_layout_data["blog_style_layout_thumbnail_description_padding"])) : array(5, 10, 10, 5);
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
               <a href="admin.php?page=gm_thumbnail_layout">
                  <?php echo $gm_layout_settings; ?>
               </a>
               <span>></span>
            </li>
            <li>
               <span>
                  <?php echo $gm_blog_style_layout; ?>
               </span>
            </li>
         </ul>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="portlet box vivid-green">
               <div class="portlet-title">
                  <div class="caption">
                     <i class="icon-custom-bubble"></i>
                     <?php echo $gm_blog_style_layout; ?>
                  </div>
                  <p class="premium-editions">
                     <?php echo $gm_upgrade_need_help ?><a href="<?php echo tech_banker_gallery_url; ?>" target="_blank" class="premium-editions-documentation"><?php echo $gm_documentation ?></a><?php echo $gm_read_and_check; ?><a href="<?php echo tech_banker_gallery_url; ?>frontend-demos/" target="_blank" class="premium-editions-documentation"><?php echo $gm_demos_section; ?></a>
                  </p>
               </div>
               <div class="portlet-body form">
                  <form id="ux_frm_blog_style_layout">
                     <div class="form-body">
                        <div class="form-actions">
                           <div class="pull-right">
                              <input type="submit" class="btn vivid-green" name="ux_btn_save_changes" id="ux_btn_save_changes" value="<?php echo $gm_save_changes; ?>">
                           </div>
                        </div>
                        <div class="line-separator"></div>
                        <div class="tabbable-custom">
                           <ul class="nav nav-tabs ">
                              <li class="active">
                                 <a aria-expanded="true" href="#general" data-toggle="tab">
                                    <?php echo $gm_general_title; ?>
                                 </a>
                              </li>
                              <li>
                                 <a aria-expanded="false" href="#gallery_title" data-toggle="tab">
                                    <?php echo $gm_gallery_title; ?>
                                 </a>
                              </li>
                              <li>
                                 <a aria-expanded="false" href="#gallery_description" data-toggle="tab">
                                    <?php echo $gm_gallery_description_title; ?>
                                 </a>
                              </li>
                              <li>
                                 <a aria-expanded="false" href="#thumbnail_title" data-toggle="tab">
                                    <?php echo $gm_thumbnail_title; ?>
                                 </a>
                              </li>
                              <li>
                                 <a aria-expanded="false" href="#thumbnail_description" data-toggle="tab">
                                    <?php echo $gm_thumbnail_description_title; ?>
                                 </a>
                              </li>
                           </ul>
                           <div class="tab-content">
                              <div class="tab-pane active" id="general">
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gm_background_color; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_general_background_color_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* ( <?php echo $gm_premium_edition; ?> ) </span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control" name="ux_txt_blog_background_color" id="ux_txt_blog_background_color" placeholder="<?php echo $gm_lightbox_colorbox_background_color_placeholder; ?>" onfocus="color_picker_gallery_master(this, this.value)"  value="<?php echo isset($blog_style_layout_data["blog_style_layout_general_background_color"]) ? esc_attr($blog_style_layout_data["blog_style_layout_general_background_color"]) : "#ffffff"; ?>">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gm_background_transparency; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_background_transparency_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* ( <?php echo $gm_premium_edition; ?> ) </span>
                                          </label>
                                          <input type="text" class="form-control" name="ux_txt_blog_background_transperancy" id="ux_txt_blog_background_transperancy" maxlength="3" placeholder="<?php echo $gm_background_transparency_placeholder; ?>"  onblur="default_value_gallery_master('#ux_txt_blog_background_transperancy', 100);" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);"  onchange="check_opacity_gallery_master(this);" value="<?php echo isset($blog_style_layout_data["blog_style_layout_general_background_transparency"]) ? intval($blog_style_layout_data["blog_style_layout_general_background_transparency"]) : 100; ?>">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="control-label">
                                       <?php echo $gm_blog_style_layout_opacity_title; ?> :
                                       <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_blog_style_layout_opacity_tooltip; ?>" data-placement="right"></i>
                                       <span class="required" aria-required="true">* ( <?php echo $gm_premium_edition; ?> ) </span>
                                    </label>
                                    <div class="input-icon right">
                                       <input type="text" class="form-control" name="ux_txt_blog_opacity" id="ux_txt_blog_opacity" placeholder="<?php echo $gm_opacity_placeholder; ?>" onblur="default_value_gallery_master('#ux_txt_blog_opacity', 100);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" onchange="check_opacity_gallery_master(this);" value="<?php echo isset($blog_style_layout_data["blog_style_layout_general_blog_style_opacity"]) ? intval($blog_style_layout_data["blog_style_layout_general_blog_style_opacity"]) : 100; ?>">
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gm_border_style_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_blog_style_layout_border_style_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* ( <?php echo $gm_premium_edition; ?> ) </span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control input-width-25 input-inline" name="ux_txt_blog_border_style[]" id="ux_txt_blog_border_style_width" placeholder="<?php echo $gm_width_placeholder; ?>" onblur="default_value_gallery_master('#ux_txt_blog_border_style_width', 2)" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo isset($blog_style_layout_general_border_style[0]) ? intval($blog_style_layout_general_border_style[0]) : 2; ?>">
                                             <select name="ux_txt_blog_border_style[]" id="ux_ddl_blog_border_style_thickness" class="form-control input-width-27 input-inline">
                                                <option value="none"><?php echo $gm_none; ?></option>
                                                <option value="solid"><?php echo $gm_solid; ?></option>
                                                <option value="dashed"><?php echo $gm_dashed; ?></option>
                                                <option value="dotted"><?php echo $gm_dotted; ?></option>
                                             </select>
                                             <input type="text" class="form-control input-normal input-inline" name="ux_txt_blog_border_style[]" id="ux_txt_blog_border_style_color" onblur="default_value_gallery_master('#ux_txt_blog_border_style_color', '#cccccc')" onfocus="color_picker_gallery_master(this, this.value)" placeholder="<?php echo $gm_color_placeholder; ?>" value="<?php echo isset($blog_style_layout_general_border_style[2]) ? esc_attr($blog_style_layout_general_border_style[2]) : "#cccccc"; ?>">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gm_border_radius_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_blog_style_layout_border_radius_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* ( <?php echo $gm_premium_edition; ?> ) </span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control" name="ux_txt_blog_border_radius" id="ux_txt_blog_border_radius" placeholder="<?php echo $gm_border_radius_placeholder; ?>" maxlength="3"  onblur="default_value_gallery_master('#ux_txt_blog_border_radius', 0);" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo isset($blog_style_layout_data["blog_style_layout_general_border_radius"]) ? intval($blog_style_layout_data["blog_style_layout_general_border_radius"]) : 0; ?>">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gm_shadow; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_blog_style_layout_shadow_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* ( <?php echo $gm_premium_edition; ?> ) </span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_blog_style_shadow[]" id="ux_txt_blog_shadow1" onblur="default_value_gallery_master('#ux_txt_blog_shadow1', 0);" onfocus="paste_prevent_gallery_master(this.id);" maxlength="3" onkeypress="only_digits_gallery_master(event);" placeholder="<?php echo $gm_horizontal_length_placeholder; ?>" value="<?php echo intval($blog_style_layout_general_shadow[0]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_blog_style_shadow[]" id="ux_txt_blog_shadow2" onblur="default_value_gallery_master('#ux_txt_blog_shadow2', 0);" onfocus="paste_prevent_gallery_master(this.id);" maxlength="3" onkeypress="only_digits_gallery_master(event);" placeholder="<?php echo $gm_vertical_length_placeholder; ?>" value="<?php echo intval($blog_style_layout_general_shadow[1]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_blog_style_shadow[]" id="ux_txt_blog_shadow3" onblur="default_value_gallery_master('#ux_txt_blog_shadow3', 0);" onfocus="paste_prevent_gallery_master(this.id);" maxlength="3" onkeypress="only_digits_gallery_master(event);" placeholder="<?php echo $gm_blur_radius_placeholder; ?>" value="<?php echo intval($blog_style_layout_general_shadow[2]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_blog_style_shadow[]" id="ux_txt_blog_shadow4" onblur="default_value_gallery_master('#ux_txt_blog_shadow4', 0);" onfocus="paste_prevent_gallery_master(this.id);" maxlength="3" onkeypress="only_digits_gallery_master(event);" placeholder="<?php echo $gm_spread_radius_placeholder; ?>" value="<?php echo intval($blog_style_layout_general_shadow[3]); ?>">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gm_shadow_color; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_shadow_color_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* ( <?php echo $gm_premium_edition; ?> ) </span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control" name="ux_txt_blog_shadow_color" id="ux_txt_blog_shadow_color" onblur="default_value_gallery_master('#ux_txt_blog_shadow_color', '#000000')" placeholder="<?php echo $gm_shadow_color_placeholder; ?>" onfocus="color_picker_gallery_master(this, this.value)" value="<?php echo isset($blog_style_layout_data["blog_style_layout_general_shadow_color"]) ? esc_attr($blog_style_layout_data["blog_style_layout_general_shadow_color"]) : "#000000"; ?>">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gm_hover_effect_value_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_hover_effect_value_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* ( <?php echo $gm_premium_edition; ?> ) </span>
                                             <span id="ux_spn_hover_value" aria-required="true" style="margin-left:10%"></span>
                                          </label>
                                          <div class="input-icon right">
                                             <select name="ux_txt_hover_effect[]" id="ux_ddl_hover_effect" class="form-control custom-input-medium input-inline" onchange="hover_effect_value_gallery_master();">
                                                <option value="none"><?php echo $gm_none; ?></option>
                                                <option value="rotate"><?php echo $gm_rotate; ?></option>
                                                <option value="scale"><?php echo $gm_scale; ?></option>
                                                <option value="skew"><?php echo $gm_skew ?></option>
                                             </select>
                                             <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_hover_effect[]" id="ux_txt_hover_effect_value" placeholder="<?php echo $gm_hover_effect_value_placeholder; ?>" onblur="default_value_gallery_master('#ux_txt_hover_effect_value', 0);" maxlength="3" onkeypress="digits_with_dot_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($blog_style_layout_general_hover_effect_value[1]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_hover_effect[]" id="ux_txt_hover_scale_value_x" placeholder="<?php echo $gm_hover_effect_value_placeholder; ?>" onblur="default_value_gallery_master('#ux_txt_hover_scale_value_x', 0);" maxlength="3" onkeypress="digits_with_dot_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($blog_style_layout_general_hover_effect_value[2]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_hover_effect[]" id="ux_txt_hover_scale_value_y" placeholder="<?php echo $gm_hover_effect_value_placeholder; ?>" onblur="default_value_gallery_master('#ux_txt_hover_scale_value_y', 0);" maxlength="3" onkeypress="digits_with_dot_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($blog_style_layout_general_hover_effect_value[3]); ?>">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gm_transition_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_transition_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* ( <?php echo $gm_premium_edition; ?> ) </span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control" name="ux_txt_transition_time" id="ux_txt_transition_time" placeholder="<?php echo $gm_transition_time_placeholder; ?>" onblur="default_value_gallery_master('#ux_txt_transition_time', 2)" maxlength="1" onkeypress="digits_with_dot_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo isset($blog_style_layout_data["blog_style_layout_general_trasition"]) ? intval($blog_style_layout_data["blog_style_layout_general_trasition"]) : 2; ?>">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gm_margin_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_blog_style_layout_margin_tooltip; ?>" data-placement="right" ></i>
                                             <span class="required" aria-required="true">* ( <?php echo $gm_premium_edition; ?> ) </span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_blog_style_layout_margin[]" id="ux_txt_blog_style_margin_top_text" placeholder="<?php echo $gm_top; ?>" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" onblur="default_value_gallery_master('#ux_txt_blog_style_margin_top_text', 0);" value="<?php echo intval($blog_style_layout_general_margin[0]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_blog_style_layout_margin[]" id="ux_txt_blog_style_margin_right_text" placeholder="<?php echo $gm_right; ?>" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" onblur="default_value_gallery_master('#ux_txt_blog_style_margin_right_text', 0);" value="<?php echo intval($blog_style_layout_general_margin[1]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_blog_style_layout_margin[]" id="ux_txt_blog_style_margin_bottom_text" placeholder="<?php echo $gm_bottom; ?>" onblur="default_value_gallery_master('#ux_txt_blog_style_margin_bottom_text', 15);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($blog_style_layout_general_margin[2]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_blog_style_layout_margin[]" id="ux_txt_blog_style_margin_left_text" placeholder="<?php echo $gm_left; ?>" onblur="default_value_gallery_master('#ux_txt_blog_style_margin_left_text', 0);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($blog_style_layout_general_margin[3]); ?>">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gm_padding_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_blog_style_layout_padding_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* ( <?php echo $gm_premium_edition; ?> ) </span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_blog_style_layout_padding[]" id="ux_txt_blog_style_padding_top_text" placeholder="<?php echo $gm_top; ?>" onblur="default_value_gallery_master('#ux_txt_blog_style_padding_top_text', 0);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($blog_style_layout_general_padding[0]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_blog_style_layout_padding[]" id="ux_txt_blog_style_padding_right_text" placeholder="<?php echo $gm_right; ?>" onblur="default_value_gallery_master('#ux_txt_blog_style_padding_right_text', 0);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($blog_style_layout_general_padding[1]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_blog_style_layout_padding[]" id="ux_txt_blog_style_padding_bottom_text" placeholder="<?php echo $gm_bottom; ?>" onblur="default_value_gallery_master('#ux_txt_blog_style_padding_bottom_text', 0);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($blog_style_layout_general_padding[2]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_blog_style_layout_padding[]" id="ux_txt_blog_style_padding_left_text" placeholder="<?php echo $gm_left; ?>" onblur="default_value_gallery_master('#ux_txt_blog_style_padding_left_text', 0);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($blog_style_layout_general_padding[3]); ?>">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="tab-pane" id="gallery_title">
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gm_html_tag; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_html_tag_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* ( <?php echo $gm_premium_edition; ?> ) </span>
                                          </label>
                                          <div class="input-icon right">
                                             <select name="ux_ddl_gallery_title_html_tag" id="ux_ddl_gallery_title_html_tag" class="form-control">
                                                <option value="h1"><?php echo $gm_h1_tag; ?></option>
                                                <option value="h2"><?php echo $gm_h2_tag; ?></option>
                                                <option value="h3"><?php echo $gm_h3_tag; ?></option>
                                                <option value="h4"><?php echo $gm_h4_tag; ?></option>
                                                <option value="h5"><?php echo $gm_h5_tag; ?></option>
                                                <option value="h6"><?php echo $gm_h6_tag; ?></option>
                                                <option value="blockquote"><?php echo $gm_blockquote_tag; ?></option>
                                                <option value="p"><?php echo $gm_paragraph_tag; ?></option>
                                                <option value="span"><?php echo $gm_span_tag; ?></option>
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gm_text_alignment_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_text_alignment_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* ( <?php echo $gm_premium_edition; ?> ) </span>
                                          </label>
                                          <div class="input-icon right">
                                             <select name="ux_ddl_blog_title_alignment_gallery" id="ux_ddl_blog_title_alignment_gallery" class="form-control">
                                                <option value="left"><?php echo $gm_left; ?></option>
                                                <option value="center"><?php echo $gm_center; ?></option>
                                                <option value="right"><?php echo $gm_right; ?></option>
                                                <option value="justify"><?php echo $gm_justify; ?> </option>
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gm_font_style; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_font_style_title_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* ( <?php echo $gm_premium_edition; ?> ) </span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_blog_title_font_style_gallery[]" id="ux_txt_title_font_size_gallery" placeholder="<?php echo $gm_font_size_placeholder; ?>" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" onblur="default_value_gallery_master('#ux_txt_title_font_size_gallery', 20);" value="<?php echo intval($blog_style_layout_gallery_title_font_style[0]); ?>">
                                             <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_blog_title_font_style_gallery[]" id="ux_txt_title_blog_font_style_color_gallery" onblur="default_value_gallery_master('#ux_txt_title_blog_font_style_color_gallery', '#000000')" onfocus="color_picker_gallery_master(this, this.value)" placeholder="<?php echo $gm_color_placeholder; ?>" value="<?php echo esc_attr($blog_style_layout_gallery_title_font_style[1]); ?>">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gm_line_height; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_line_height_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* ( <?php echo $gm_premium_edition; ?> ) </span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control" name="ux_txt_blog_style_gallery_title_line_height" id="ux_txt_blog_style_gallery_title_line_height"  placeholder="<?php echo $gm_line_height_placeholder; ?>" onblur="default_value_gallery_master('#ux_txt_blog_style_gallery_title_line_height', '1.7em');"  onfocus="paste_prevent_gallery_master(this.id);"  value="<?php echo isset($blog_style_layout_data["blog_style_layout_gallery_title_line_height"]) ? esc_attr($blog_style_layout_data["blog_style_layout_gallery_title_line_height"]) : "1.7em"; ?>">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gm_font_family_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_font_family_title_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* ( <?php echo $gm_premium_edition; ?> ) </span>
                                          </label>
                                          <div class="input-icon right">
                                             <select name="ux_ddl_blog_title_font_family_gallery" id="ux_ddl_blog_title_font_family_gallery" class="form-control">
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
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gm_margin_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_margin_gallery_title_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* ( <?php echo $gm_premium_edition; ?> ) </span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_blog_title_margin_text_gallery[]" id="ux_txt_blog_title_margin_top_gallery" placeholder="<?php echo $gm_top; ?>" onblur="default_value_gallery_master('#ux_txt_blog_title_margin_top_gallery', 10);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($blog_style_layout_gallery_title_margin[0]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_blog_title_margin_text_gallery[]" id="ux_txt_blog_title_margin_right_gallery" placeholder="<?php echo $gm_right; ?>" onblur="default_value_gallery_master('#ux_txt_blog_title_margin_right_gallery', 0);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($blog_style_layout_gallery_title_margin[1]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_blog_title_margin_text_gallery[]" id="ux_txt_blog_title_margin_bottom_gallery" placeholder="<?php echo $gm_bottom; ?>" onblur="default_value_gallery_master('#ux_txt_blog_title_margin_bottom_gallery', 10);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($blog_style_layout_gallery_title_margin[2]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_blog_title_margin_text_gallery[]" id="ux_txt_blog_title_margin_left_gallery" placeholder="<?php echo $gm_left; ?>" onblur="default_value_gallery_master('#ux_txt_blog_title_margin_left_gallery', 0);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($blog_style_layout_gallery_title_margin[3]); ?>">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gm_padding_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_padding_gallery_title_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* ( <?php echo $gm_premium_edition; ?> ) </span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_blog_title_padding_text_gallery[]" id="ux_txt_blog_title_padding_top_gallery" placeholder="<?php echo $gm_top; ?>" onblur="default_value_gallery_master('#ux_txt_blog_title_padding_top_gallery', 10);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($blog_style_layout_gallery_title_padding[0]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_blog_title_padding_text_gallery[]" id="ux_txt_blog_title_padding_right_gallery" placeholder="<?php echo $gm_right; ?>" onblur="default_value_gallery_master('#ux_txt_blog_title_padding_right_gallery', 0);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($blog_style_layout_gallery_title_padding[1]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_blog_title_padding_text_gallery[]" id="ux_txt_blog_title_padding_bottom_gallery" placeholder="<?php echo $gm_bottom; ?>" onblur="default_value_gallery_master('#ux_txt_blog_title_padding_bottom_gallery', 10);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($blog_style_layout_gallery_title_padding[2]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_blog_title_padding_text_gallery[]" id="ux_txt_blog_title_padding_left_gallery" placeholder="<?php echo $gm_left; ?>" onblur="default_value_gallery_master('#ux_txt_blog_title_padding_left_gallery', 0);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($blog_style_layout_gallery_title_padding[3]); ?>">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="tab-pane" id="gallery_description">
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gm_html_tag; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_html_tag_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* ( <?php echo $gm_premium_edition; ?> ) </span>
                                          </label>
                                          <div class="input-icon right">
                                             <select name="ux_ddl_gallery_description_html_tag" id="ux_ddl_gallery_description_html_tag" class="form-control">
                                                <option value="h1"><?php echo $gm_h1_tag; ?></option>
                                                <option value="h2"><?php echo $gm_h2_tag; ?></option>
                                                <option value="h3"><?php echo $gm_h3_tag; ?></option>
                                                <option value="h4"><?php echo $gm_h4_tag; ?></option>
                                                <option value="h5"><?php echo $gm_h5_tag; ?></option>
                                                <option value="h6"><?php echo $gm_h6_tag; ?></option>
                                                <option value="blockquote"><?php echo $gm_blockquote_tag; ?></option>
                                                <option value="p"><?php echo $gm_paragraph_tag; ?></option>
                                                <option value="span"><?php echo $gm_span_tag; ?></option>
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gm_text_alignment_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_text_alignment_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* ( <?php echo $gm_premium_edition; ?> ) </span>
                                          </label>
                                          <div class="input-icon right">
                                             <select name="ux_ddl_blog_description_alignment_gallery" id="ux_ddl_blog_description_alignment_gallery" class="form-control">
                                                <option value="left"><?php echo $gm_left; ?></option>
                                                <option value="center"><?php echo $gm_center; ?></option>
                                                <option value="right"><?php echo $gm_right; ?></option>
                                                <option value="justify"><?php echo $gm_justify; ?> </option>
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gm_font_style; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_font_style_description_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* ( <?php echo $gm_premium_edition; ?> ) </span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_blog_description_font_style_gallery[]" id="ux_txt_blog_description_font_size_gallery" placeholder="<?php echo $gm_font_size_placeholder; ?>" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" onblur="default_value_gallery_master('#ux_txt_blog_description_font_size_gallery', 16);" value="<?php echo intval($blog_style_layout_gallery_description_font_style[0]); ?>">
                                             <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_blog_description_font_style_gallery[]" id="ux_txt_description_blog_font_style_color_gallery" onblur="default_value_gallery_master('#ux_txt_description_blog_font_style_color_gallery', '#787D85')" onfocus="color_picker_gallery_master(this, this.value)" placeholder="<?php echo $gm_color_placeholder; ?>" value="<?php echo esc_attr($blog_style_layout_gallery_description_font_style[1]); ?>">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gm_line_height; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_line_height_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* ( <?php echo $gm_premium_edition; ?> ) </span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control" name="ux_txt_blog_style_gallery_description_line_height" id="ux_txt_blog_style_gallery_description_line_height"  placeholder="<?php echo $gm_line_height_placeholder; ?>" onblur="default_value_gallery_master('#ux_txt_blog_style_gallery_description_line_height', '1.7em');"  onfocus="paste_prevent_gallery_master(this.id);"  value="<?php echo isset($blog_style_layout_data["blog_style_layout_gallery_description_line_height"]) ? esc_attr($blog_style_layout_data["blog_style_layout_gallery_description_line_height"]) : "1.7em"; ?>">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gm_font_family_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_font_family_description_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* ( <?php echo $gm_premium_edition; ?> ) </span>
                                          </label>
                                          <div class="input-icon right">
                                             <select name="ux_ddl_blog_description_font_family_gallery" id="ux_ddl_blog_description_font_family_gallery" class="form-control">
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
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gm_margin_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_margin_gallery_description_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* ( <?php echo $gm_premium_edition; ?> ) </span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_blog_style_description_margin_gallery[]" id="ux_txt_blog_description_margin_top_gallery" placeholder="<?php echo $gm_top; ?>" onblur="default_value_gallery_master('#ux_txt_blog_description_margin_top_gallery', 10);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($blog_style_layout_gallery_description_margin[0]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_blog_style_description_margin_gallery[]" id="ux_txt_blog_description_margin_right_gallery" placeholder="<?php echo $gm_right; ?>" onblur="default_value_gallery_master('#ux_txt_blog_description_margin_right_gallery', 0);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($blog_style_layout_gallery_description_margin[1]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_blog_style_description_margin_gallery[]" id="ux_txt_blog_description_margin_bottom_gallery" placeholder="<?php echo $gm_bottom; ?>" onblur="default_value_gallery_master('#ux_txt_blog_description_margin_bottom_gallery', 10);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($blog_style_layout_gallery_description_margin[2]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_blog_style_description_margin_gallery[]" id="ux_txt_blog_description_margin_left_gallery" placeholder="<?php echo $gm_left; ?>" onblur="default_value_gallery_master('#ux_txt_blog_description_margin_left_gallery', 0);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($blog_style_layout_gallery_description_margin[3]); ?>">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gm_padding_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_padding_gallery_description_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* ( <?php echo $gm_premium_edition; ?> ) </span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_blog_style_description_padding_gallery[]" id="ux_txt_blog_description_padding_top_gallery" placeholder="<?php echo $gm_top; ?>" onblur="default_value_gallery_master('#ux_txt_blog_description_padding_top_gallery', 0);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($blog_style_layout_gallery_description_padding[0]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_blog_style_description_padding_gallery[]" id="ux_txt_blog_description_padding_right_gallery" placeholder="<?php echo $gm_right; ?>" onblur="default_value_gallery_master('#ux_txt_blog_description_padding_right_gallery', 0);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($blog_style_layout_gallery_description_padding[1]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_blog_style_description_padding_gallery[]" id="ux_txt_blog_description_padding_bottom_gallery" placeholder="<?php echo $gm_bottom; ?>" onblur="default_value_gallery_master('#ux_txt_blog_description_padding_bottom_gallery', 10);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($blog_style_layout_gallery_description_padding[2]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_blog_style_description_padding_gallery[]" id="ux_txt_blog_description_padding_left_gallery" placeholder="<?php echo $gm_left; ?>" onblur="default_value_gallery_master('#ux_txt_blog_description_padding_left_gallery', 0);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($blog_style_layout_gallery_description_padding[3]); ?>">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="tab-pane" id="thumbnail_title">
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gm_html_tag; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_html_tag_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* ( <?php echo $gm_premium_edition; ?> ) </span>
                                          </label>
                                          <div class="input-icon right">
                                             <select name="ux_ddl_thumbnail_title_html_tag" id="ux_ddl_thumbnail_title_html_tag" class="form-control">
                                                <option value="h1"><?php echo $gm_h1_tag; ?></option>
                                                <option value="h2"><?php echo $gm_h2_tag; ?></option>
                                                <option value="h3"><?php echo $gm_h3_tag; ?></option>
                                                <option value="h4"><?php echo $gm_h4_tag; ?></option>
                                                <option value="h5"><?php echo $gm_h5_tag; ?></option>
                                                <option value="h6"><?php echo $gm_h6_tag; ?></option>
                                                <option value="blockquote"><?php echo $gm_blockquote_tag; ?></option>
                                                <option value="p"><?php echo $gm_paragraph_tag; ?></option>
                                                <option value="span"><?php echo $gm_span_tag; ?></option>
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gm_text_alignment_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_text_alignment_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* ( <?php echo $gm_premium_edition; ?> ) </span>
                                          </label>
                                          <div class="input-icon right">
                                             <select name="ux_ddl_blog_title_alignment_thumbnail" id="ux_ddl_blog_title_alignment_thumbnail" class="form-control">
                                                <option value="left"><?php echo $gm_left; ?></option>
                                                <option value="center"><?php echo $gm_center; ?></option>
                                                <option value="right"><?php echo $gm_right; ?></option>
                                                <option value="justify"><?php echo $gm_justify; ?> </option>
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gm_font_style; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_font_style_title_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* ( <?php echo $gm_premium_edition; ?> ) </span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_blog_title_font_style_thumbnail[]" id="ux_txt_title_font_size_thumbnail" placeholder="<?php echo $gm_font_size_placeholder; ?>" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" onblur="default_value_gallery_master('#ux_txt_title_font_size_thumbnail', 14);" value="<?php echo intval($blog_style_layout_thumbnail_title_font_style[0]); ?>">
                                             <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_blog_title_font_style_thumbnail[]" id="ux_txt_title_blog_font_style_color_thumbnail" onblur="default_value_gallery_master('#ux_txt_title_blog_font_style_color_thumbnail', '#787D85')" onfocus="color_picker_gallery_master(this, this.value)" placeholder="<?php echo $gm_color_placeholder; ?>" value="<?php echo esc_attr($blog_style_layout_thumbnail_title_font_style[1]); ?>">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gm_line_height; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_line_height_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* ( <?php echo $gm_premium_edition; ?> ) </span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control" name="ux_txt_blog_style_thumbnail_title_line_height" id="ux_txt_blog_style_thumbnail_title_line_height"  placeholder="<?php echo $gm_line_height_placeholder; ?>" onblur="default_value_gallery_master('#ux_txt_blog_style_thumbnail_title_line_height', '1.7em');"  onfocus="paste_prevent_gallery_master(this.id);"  value="<?php echo isset($blog_style_layout_data["blog_style_layout_thumbnail_title_line_height"]) ? esc_attr($blog_style_layout_data["blog_style_layout_thumbnail_title_line_height"]) : "1.7em"; ?>">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gm_font_family_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_font_family_title_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* ( <?php echo $gm_premium_edition; ?> ) </span>
                                          </label>
                                          <div class="input-icon right">
                                             <select name="ux_ddl_blog_title_font_family_thumbnail" id="ux_ddl_blog_title_font_family_thumbnail" class="form-control">
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
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gm_margin_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_margin_thumbnail_title_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* ( <?php echo $gm_premium_edition; ?> ) </span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_blog_title_margin_text_thumbnail[]" id="ux_txt_blog_title_margin_top_thumbnail" placeholder="<?php echo $gm_top; ?>" onblur="default_value_gallery_master('#ux_txt_blog_title_margin_top_thumbnail', 0);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($blog_style_layout_thumbnail_title_margin[0]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_blog_title_margin_text_thumbnail[]" id="ux_txt_blog_title_margin_right_thumbnail" placeholder="<?php echo $gm_right; ?>" onblur="default_value_gallery_master('#ux_txt_blog_title_margin_right_thumbnail', 5);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($blog_style_layout_thumbnail_title_margin[1]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_blog_title_margin_text_thumbnail[]" id="ux_txt_blog_title_margin_bottom_thumbnail" placeholder="<?php echo $gm_bottom; ?>" onblur="default_value_gallery_master('#ux_txt_blog_title_margin_bottom_thumbnail', 0);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($blog_style_layout_thumbnail_title_margin[2]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_blog_title_margin_text_thumbnail[]" id="ux_txt_blog_title_margin_left_thumbnail" placeholder="<?php echo $gm_left; ?>" onblur="default_value_gallery_master('#ux_txt_blog_title_margin_left_thumbnail', 5);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($blog_style_layout_thumbnail_title_margin[3]); ?>">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gm_padding_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_padding_thumbnail_title_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* ( <?php echo $gm_premium_edition; ?> ) </span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_blog_title_padding_text_thumbnail[]" id="ux_txt_blog_title_padding_top_thumbnail" placeholder="<?php echo $gm_top; ?>" onblur="default_value_gallery_master('#ux_txt_blog_title_padding_top_thumbnail', 10);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($blog_style_layout_thumbnail_title_padding[0]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_blog_title_padding_text_thumbnail[]" id="ux_txt_blog_title_padding_right_thumbnail" placeholder="<?php echo $gm_right; ?>" onblur="default_value_gallery_master('#ux_txt_blog_title_padding_right_thumbnail', 10);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($blog_style_layout_thumbnail_title_padding[1]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_blog_title_padding_text_thumbnail[]" id="ux_txt_blog_title_padding_bottom_thumbnail" placeholder="<?php echo $gm_bottom; ?>" onblur="default_value_gallery_master('#ux_txt_blog_title_padding_bottom_thumbnail', 10);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($blog_style_layout_thumbnail_title_padding[2]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_blog_title_padding_text_thumbnail[]" id="ux_txt_blog_title_padding_left_thumbnail" placeholder="<?php echo $gm_left; ?>" onblur="default_value_gallery_master('#ux_txt_blog_title_padding_left_thumbnail', 10);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($blog_style_layout_thumbnail_title_padding[3]); ?>">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="tab-pane" id="thumbnail_description">
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gm_html_tag; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_html_tag_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* ( <?php echo $gm_premium_edition; ?> ) </span>
                                          </label>
                                          <div class="input-icon right">
                                             <select name="ux_ddl_thumbnail_description_html_tag" id="ux_ddl_thumbnail_description_html_tag" class="form-control">
                                                <option value="h1"><?php echo $gm_h1_tag; ?></option>
                                                <option value="h2"><?php echo $gm_h2_tag; ?></option>
                                                <option value="h3"><?php echo $gm_h3_tag; ?></option>
                                                <option value="h4"><?php echo $gm_h4_tag; ?></option>
                                                <option value="h5"><?php echo $gm_h5_tag; ?></option>
                                                <option value="h6"><?php echo $gm_h6_tag; ?></option>
                                                <option value="blockquote"><?php echo $gm_blockquote_tag; ?></option>
                                                <option value="p"><?php echo $gm_paragraph_tag; ?></option>
                                                <option value="span"><?php echo $gm_span_tag; ?></option>
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gm_text_alignment_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_text_alignment_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* ( <?php echo $gm_premium_edition; ?> ) </span>
                                          </label>
                                          <div class="input-icon right">
                                             <select name="ux_ddl_blog_description_alignment_thumbnail" id="ux_ddl_blog_description_alignment_thumbnail" class="form-control">
                                                <option value="left"><?php echo $gm_left; ?></option>
                                                <option value="center"><?php echo $gm_center; ?></option>
                                                <option value="right"><?php echo $gm_right; ?></option>
                                                <option value="justify"><?php echo $gm_justify; ?> </option>
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gm_font_style; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_font_style_description_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* ( <?php echo $gm_premium_edition; ?> ) </span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_blog_description_font_style_thumbnail[]" id="ux_txt_blog_description_font_size_thumbnail" placeholder="<?php echo $gm_font_size_placeholder; ?>" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" onblur="default_value_gallery_master('#ux_txt_blog_description_font_size_thumbnail', 12);" value="<?php echo intval($blog_style_layout_thumbnail_description_margin_font_style[0]); ?>">
                                             <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_blog_description_font_style_thumbnail[]" id="ux_txt_description_font_color_thumbnail" onblur="default_value_gallery_master('#ux_txt_description_font_color_thumbnail', '#787D85')" onfocus="color_picker_gallery_master(this, this.value)" placeholder="<?php echo $gm_color_placeholder; ?>" value="<?php echo esc_attr($blog_style_layout_thumbnail_description_margin_font_style[1]); ?>">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gm_line_height; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_line_height_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* ( <?php echo $gm_premium_edition; ?> ) </span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control" name="ux_txt_blog_style_thumbnail_description_line_height" id="ux_txt_blog_style_thumbnail_description_line_height"  placeholder="<?php echo $gm_line_height_placeholder; ?>" onblur="default_value_gallery_master('#ux_txt_blog_style_thumbnail_description_line_height', '1.7em');"  onfocus="paste_prevent_gallery_master(this.id);"  value="<?php echo isset($blog_style_layout_data["blog_style_layout_thumbnail_description_line_height"]) ? esc_attr($blog_style_layout_data["blog_style_layout_thumbnail_description_line_height"]) : "1.7em"; ?>">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gm_font_family_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_font_family_description_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* ( <?php echo $gm_premium_edition; ?> ) </span>
                                          </label>
                                          <div class="input-icon right">
                                             <select name="ux_ddl_blog_description_font_family_thumbnail" id="ux_ddl_blog_description_font_family_thumbnail" class="form-control">
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
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gm_margin_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_margin_thumbnail_description_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* ( <?php echo $gm_premium_edition; ?> ) </span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_blog_style_description_margin_thumbnail[]" id="ux_txt_blog_description_margin_top_thumbnail" placeholder="<?php echo $gm_top; ?>" onblur="default_value_gallery_master('#ux_txt_blog_description_margin_top_thumbnail', 0);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($blog_style_layout_thumbnail_description_margin[0]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_blog_style_description_margin_thumbnail[]" id="ux_txt_blog_description_margin_right_thumbnail" placeholder="<?php echo $gm_right; ?>" onblur="default_value_gallery_master('#ux_txt_blog_description_margin_right_thumbnail', 5);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($blog_style_layout_thumbnail_description_margin[1]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_blog_style_description_margin_thumbnail[]" id="ux_txt_blog_description_margin_bottom_thumbnail" placeholder="<?php echo $gm_bottom; ?>" onblur="default_value_gallery_master('#ux_txt_blog_description_margin_bottom_thumbnail', 0);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($blog_style_layout_thumbnail_description_margin[2]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_blog_style_description_margin_thumbnail[]" id="ux_txt_blog_description_margin_left_thumbnail" placeholder="<?php echo $gm_left; ?>" onblur="default_value_gallery_master('#ux_txt_blog_description_margin_left_thumbnail', 5);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($blog_style_layout_thumbnail_description_margin[3]); ?>">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gm_padding_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_padding_thumbnail_description_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* ( <?php echo $gm_premium_edition; ?> ) </span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_blog_style_description_padding_thumbnail[]" id="ux_txt_blog_description_padding_top_thumbnail" placeholder="<?php echo $gm_top; ?>" onblur="default_value_gallery_master('#ux_txt_blog_description_padding_top_thumbnail', 5);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($blog_style_layout_thumbnail_description_padding[0]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_blog_style_description_padding_thumbnail[]" id="ux_txt_blog_description_padding_right_thumbnail" placeholder="<?php echo $gm_right; ?>" onblur="default_value_gallery_master('#ux_txt_blog_description_padding_right_thumbnail', 10);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($blog_style_layout_thumbnail_description_padding[1]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_blog_style_description_padding_thumbnail[]" id="ux_txt_blog_description_padding_bottom_thumbnail" placeholder="<?php echo $gm_bottom; ?>" onblur="default_value_gallery_master('#ux_txt_blog_description_padding_bottom_thumbnail', 10);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($blog_style_layout_thumbnail_description_padding[2]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_blog_style_description_padding_thumbnail[]" id="ux_txt_blog_description_padding_left_thumbnail" placeholder="<?php echo $gm_left; ?>" onblur="default_value_gallery_master('#ux_txt_blog_description_padding_left_thumbnail', 5);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($blog_style_layout_thumbnail_description_padding[3]); ?>">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="line-separator"></div>
                           <div class="form-actions">
                              <div class="pull-right">
                                 <input type="submit" class="btn vivid-green" name="ux_btn_blog_save_changes" id="ux_btn_blog_save_changes" value="<?php echo $gm_save_changes; ?>">
                              </div>
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
               <a href="admin.php?page=gm_thumbnail_layout">
                  <?php echo $gm_layout_settings; ?>
               </a>
               <span>></span>
            </li>
            <li>
               <span>
                  <?php echo $gm_blog_style_layout; ?>
               </span>
            </li>
         </ul>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="portlet box vivid-green">
               <div class="portlet-title">
                  <div class="caption">
                     <i class="icon-custom-bubble"></i>
                     <?php echo $gm_blog_style_layout; ?>
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