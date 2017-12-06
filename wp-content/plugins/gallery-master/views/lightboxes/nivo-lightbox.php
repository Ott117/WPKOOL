<?php
/**
 * Template to display the Nivo Light Box settings.
 *
 * @author 	Tech Banker
 * @package 	gallery-master/views/lightboxes
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
   } else if (lightboxes_gallery_master == "1") {
      $lightbox_nivo_border_style = isset($gm_nivo_lightbox_meta_data["lightbox_nivo_border_style"]) ? explode(",", esc_attr($gm_nivo_lightbox_meta_data["lightbox_nivo_border_style"])) : array(5, "solid", "#ffffff");
      $lightbox_nivo_title_font_style = isset($gm_nivo_lightbox_meta_data["lightbox_nivo_title_font_style"]) ? explode(",", esc_attr($gm_nivo_lightbox_meta_data["lightbox_nivo_title_font_style"])) : array(16, "#ffffff");
      $lightbox_nivo_title_margin = isset($gm_nivo_lightbox_meta_data["lightbox_nivo_title_margin"]) ? explode(",", esc_attr($gm_nivo_lightbox_meta_data["lightbox_nivo_title_margin"])) : array(10, 0, 0, 0);
      $lightbox_nivo_title_padding = isset($gm_nivo_lightbox_meta_data["lightbox_nivo_title_padding"]) ? explode(",", esc_attr($gm_nivo_lightbox_meta_data["lightbox_nivo_title_padding"])) : array(10, 10, 0, 10);
      $lightbox_nivo_description_font_style = isset($gm_nivo_lightbox_meta_data["lightbox_nivo_description_font_style"]) ? explode(",", esc_attr($gm_nivo_lightbox_meta_data["lightbox_nivo_description_font_style"])) : array(14, "#ffffff");
      $lightbox_nivo_description_margin = isset($gm_nivo_lightbox_meta_data["lightbox_nivo_description_margin"]) ? explode(",", esc_attr($gm_nivo_lightbox_meta_data["lightbox_nivo_description_margin"])) : array(0, 0, 0, 0);
      $lightbox_nivo_description_padding = isset($gm_nivo_lightbox_meta_data["lightbox_nivo_description_padding"]) ? explode(",", esc_attr($gm_nivo_lightbox_meta_data["lightbox_nivo_description_padding"])) : array(0, 10, 10, 10);
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
               <a href="admin.php?page=gm_lightcase">
                  <?php echo $gm_lightboxes; ?>
               </a>
               <span>></span>
            </li>
            <li>
               <span>
                  <?php echo $gm_nivo_lightbox; ?>
               </span>
            </li>
         </ul>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="portlet box vivid-green">
               <div class="portlet-title">
                  <div class="caption">
                     <i class="icon-custom-paper-plane"></i>
                     <?php echo $gm_nivo_lightbox; ?>
                  </div>
                  <p class="premium-editions">
                     <?php echo $gm_upgrade_need_help ?><a href="<?php echo tech_banker_gallery_url; ?>" target="_blank" class="premium-editions-documentation"><?php echo $gm_documentation ?></a><?php echo $gm_read_and_check; ?><a href="<?php echo tech_banker_gallery_url; ?>frontend-demos/" target="_blank" class="premium-editions-documentation"><?php echo $gm_demos_section; ?></a>
                  </p>
               </div>
               <div class="portlet-body form">
                  <form id="ux_frm_nivo_lightbox_settings">
                     <div class="form-body">
                        <div class="form-actions">
                           <div class="pull-right">
                              <input type="submit" class="btn vivid-green" name="ux_btn_add_tag"  id="ux_btn_add_tag" value="<?php echo $gm_save_changes; ?>">
                           </div>
                        </div>
                        <div class="line-separator"></div>
                        <div class="tabbable-custom">
                           <ul class="nav nav-tabs ">
                              <li class="active">
                                 <a aria-expanded="true" href="#settings" data-toggle="tab">
                                    <?php echo $gm_settings; ?>
                                 </a>
                              </li>
                              <li>
                                 <a aria-expanded="false" href="#image_title" data-toggle="tab">
                                    <?php echo $gm_add_gallery_image_title; ?>
                                 </a>
                              </li>
                              <li>
                                 <a aria-expanded="false" href="#image_description" data-toggle="tab">
                                    <?php echo $gm_add_gallery_image_description_title; ?>
                                 </a>
                              </li>
                           </ul>
                           <div class="tab-content">
                              <div class="tab-pane active" id="settings">
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gm_nivo_lightbox_effect_title; ?>
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_nivo_lightbox_effect_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " ( " . $gm_premium_edition . " ) " ?></span>
                                          </label>
                                          <select id="ux_ddl_choose_effect" name="ux_ddl_choose_effect" class="form-control">
                                             <option value="fade"><?php echo $gm_fade; ?></option>
                                             <option value="fadeScale"><?php echo $gm_nivo_lightbox_fadescale; ?></option>
                                             <option value="slideLeft"><?php echo $gm_nivo_lightbox_slideLeft; ?></option>
                                             <option value="slideRight"><?php echo $gm_nivo_lightbox_slideRight; ?></option>
                                             <option value="slideUp"><?php echo $gm_nivo_lightbox_slideUp; ?></option>
                                             <option value="slideDown"><?php echo $gm_nivo_lightbox_slideDown; ?></option>
                                             <option value="fall"><?php echo $gm_nivo_lightbox_fall; ?></option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gm_nivo_lightbox_keyboard_navigation_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_nivo_lightbox_keyboard_navigation_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " ( " . $gm_premium_edition . " ) " ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <select id="ux_ddl_keyboard_navigation" name="ux_ddl_keyboard_navigation" class="form-control">
                                                <option value="true"><?php echo $gm_enable; ?></option>
                                                <option value="false"><?php echo $gm_disable; ?></option>
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gm_nivo_lightbox_click_image_to_close_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_nivo_lightbox_click_image_to_close_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " ( " . $gm_premium_edition . " ) " ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <select id="ux_ddl_click_image_to_close" name="ux_ddl_click_image_to_close" class="form-control">
                                                <option value="true"><?php echo $gm_enable; ?></option>
                                                <option value="false"><?php echo $gm_disable; ?></option>
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gm_nivo_lightbox_click_overlay_to_close_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_nivo_lightbox_click_overlay_to_close_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " ( " . $gm_premium_edition . " ) " ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <select id="ux_ddl_click_overlay_to_close" name="ux_ddl_click_overlay_to_close" class="form-control">
                                                <option value="true"><?php echo $gm_enable; ?></option>
                                                <option value="false"><?php echo $gm_disable; ?></option>
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gm_lightbox_overlay_color_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_lightbox_overlay_color_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " ( " . $gm_premium_edition . " ) " ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control" name="ux_txt_overlay_color" id="ux_txt_overlay_color" placeholder="<?php echo $gm_lightbox_overlay_color_placeholder; ?>" onfocus="color_picker_gallery_master(this, this.value)"  onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo isset($gm_nivo_lightbox_meta_data["lightbox_nivo_overlay_color"]) ? esc_attr($gm_nivo_lightbox_meta_data["lightbox_nivo_overlay_color"]) : "#000000"; ?>">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gm_lightbox_overlay_opacity_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_lightbox_overlay_opacity_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " ( " . $gm_premium_edition . " ) " ?></span>
                                          </label>
                                          <input type="text" class="form-control" name="ux_txt_overlay_opacity" id="ux_txt_overlay_opacity" maxlength="3" onkeypress="only_digits_gallery_master(event);" placeholder="<?php echo $gm_lightbox_overlay_opacity_placeholder; ?>" onblur="default_value_gallery_master('#ux_txt_overlay_opacity', 75);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo isset($gm_nivo_lightbox_meta_data["lightbox_nivo_overlay_opacity"]) ? intval($gm_nivo_lightbox_meta_data["lightbox_nivo_overlay_opacity"]) : 75; ?>">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gm_border_style_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_border_style_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " ( " . $gm_premium_edition . " ) " ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control input-width-25 input-inline" name="ux_txt_border_style[]" id="ux_txt_border_style_width" placeholder="<?php echo $gm_width_placeholder; ?>" onblur="default_value_gallery_master('#ux_txt_border_style_width', 5)" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($lightbox_nivo_border_style[0]); ?>">
                                             <select name="ux_txt_border_style[]" id="ux_ddl_border_style_thickness" class="form-control input-width-27 input-inline">
                                                <option value="none"><?php echo $gm_none; ?></option>
                                                <option value="solid"><?php echo $gm_solid; ?></option>
                                                <option value="dashed"><?php echo $gm_dashed; ?></option>
                                                <option value="dotted"><?php echo $gm_dotted ?></option>
                                             </select>
                                             <input type="text" class="form-control input-normal input-inline" name="ux_txt_border_style[]" id="ux_txt_border_style_color" onblur="default_value_gallery_master('#ux_txt_border_style_color', '#ffffff')" onfocus="color_picker_gallery_master(this, this.value)" placeholder="<?php echo $gm_color_placeholder; ?>" value="<?php echo $lightbox_nivo_border_style[2]; ?>">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gm_border_radius_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_border_radius_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " ( " . $gm_premium_edition . " ) " ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control" name="ux_txt_border_radius" id="ux_txt_border_radius" placeholder="<?php echo $gm_border_radius_placeholder; ?>" maxlength="3" onkeypress="only_digits_gallery_master(event);" onblur="default_value_gallery_master('#ux_txt_border_radius', 5)" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo isset($gm_nivo_lightbox_meta_data["lightbox_nivo_border_radius"]) ? intval($gm_nivo_lightbox_meta_data["lightbox_nivo_border_radius"]) : 5; ?>">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="tab-pane" id="image_title">
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gm_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_title_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " ( " . $gm_premium_edition . " ) " ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <select id="ux_ddl_nivo_title" name="ux_ddl_nivo_title" class="form-control" onchange="show_hide_control_gallery_master('ux_ddl_nivo_title', 'nivo_lightbox_title_div');">
                                                <option value="true"><?php echo $gm_show; ?></option>
                                                <option value="false"><?php echo $gm_hide; ?></option>
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row" id="nivo_lightbox_title_div">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gm_html_tag; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_html_tag_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " ( " . $gm_premium_edition . " ) " ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <select name="ux_ddl_image_title_html_tag" id="ux_ddl_image_title_html_tag" class="form-control">
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
                                             <span class="required" aria-required="true">* <?php echo " ( " . $gm_premium_edition . " ) " ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <select name="ux_ddl_image_title_alignment" id="ux_ddl_image_title_alignment" class="form-control">
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
                                             <?php echo $gm_lightbox_title_font_style; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_font_style_title_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " ( " . $gm_premium_edition . " ) " ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_gallery_title_font_style[]" id="ux_txt_gallery_title_font_size" placeholder="<?php echo $gm_font_size_placeholder; ?>" onblur="default_value_gallery_master('#ux_txt_gallery_title_font_size', 16);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($lightbox_nivo_title_font_style[0]); ?>">
                                             <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_gallery_title_font_style[]" id="ux_txt_gallery_title_style_color" onblur="default_value_gallery_master('#ux_txt_gallery_title_style_color', '#ffffff');" onfocus="color_picker_gallery_master(this, this.value)"  placeholder="<?php echo $gm_color_placeholder; ?>" value="<?php echo esc_attr($lightbox_nivo_title_font_style[1]); ?>">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gm_lightbox_title_font_family; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_lightbox_title_font_family_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " ( " . $gm_premium_edition . " ) " ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <select name="ux_ddl_gallery_title_font_family" id="ux_ddl_gallery_title_font_family" class="form-control">
                                                <?php
                                                if (file_exists(GALLERY_MASTER_PLUGIN_DIR_PATH . "includes/web-fonts.php")) {
                                                   include GALLERY_MASTER_PLUGIN_DIR_PATH . "includes/web-fonts.php";
                                                }
                                                ?>
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gm_margin_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_margin_gallery_title_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " ( " . $gm_premium_edition . " ) " ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_image_title_margin_text[]" id="ux_txt_image_title_margin_top" placeholder="<?php echo $gm_top; ?>" onblur="default_value_gallery_master('#ux_txt_image_title_margin_top', 10);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($lightbox_nivo_title_margin[0]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_image_title_margin_text[]" id="ux_txt_image_title_margin_right" placeholder="<?php echo $gm_right; ?>" onblur="default_value_gallery_master('#ux_txt_image_title_margin_right', 0);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($lightbox_nivo_title_margin[1]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_image_title_margin_text[]" id="ux_txt_image_title_margin_bottom" placeholder="<?php echo $gm_bottom; ?>" onblur="default_value_gallery_master('#ux_txt_image_title_margin_bottom', 0);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($lightbox_nivo_title_margin[2]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_image_title_margin_text[]" id="ux_txt_image_title_margin_left" placeholder="<?php echo $gm_left; ?>" onblur="default_value_gallery_master('#ux_txt_image_title_margin_left', 0);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($lightbox_nivo_title_margin[3]); ?>">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gm_padding_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_padding_gallery_title_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " ( " . $gm_premium_edition . " ) " ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_image_title_padding_text[]" id="ux_txt_image_title_padding_top" placeholder="<?php echo $gm_top; ?>" onblur="default_value_gallery_master('#ux_txt_image_title_padding_top', 10);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($lightbox_nivo_title_padding[0]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_image_title_padding_text[]" id="ux_txt_image_title_padding_right" placeholder="<?php echo $gm_right; ?>" onblur="default_value_gallery_master('#ux_txt_image_title_padding_right', 10);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($lightbox_nivo_title_padding[1]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_image_title_padding_text[]" id="ux_txt_image_title_padding_bottom" placeholder="<?php echo $gm_bottom; ?>" onblur="default_value_gallery_master('#ux_txt_image_title_padding_bottom', 0);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($lightbox_nivo_title_padding[2]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_image_title_padding_text[]" id="ux_txt_image_title_padding_left" placeholder="<?php echo $gm_left; ?>" onblur="default_value_gallery_master('#ux_txt_image_title_padding_left', 10);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($lightbox_nivo_title_padding[3]); ?>">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="tab-pane" id="image_description">
                                 <div class="form-group">
                                    <label class="control-label">
                                       <?php echo $gm_description; ?> :
                                       <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_description_tooltip; ?>" data-placement="right"></i>
                                       <span class="required" aria-required="true">* <?php echo " ( " . $gm_premium_edition . " ) " ?></span>
                                    </label>
                                    <div class="input-icon right">
                                       <select id="ux_ddl_nivo_description" name="ux_ddl_nivo_description" class="form-control" onchange="show_hide_control_gallery_master('ux_ddl_nivo_description', 'nivo_lightbox_description_div');">
                                          <option value="true"><?php echo $gm_show; ?></option>
                                          <option value="false"><?php echo $gm_hide; ?></option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="row" id="nivo_lightbox_description_div">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gm_html_tag; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_html_tag_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " ( " . $gm_premium_edition . " ) " ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <select name="ux_ddl_image_description_html_tag" id="ux_ddl_image_description_html_tag" class="form-control">
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
                                             <span class="required" aria-required="true">* <?php echo " ( " . $gm_premium_edition . " ) " ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <select name="ux_ddl_image_description_alignment" id="ux_ddl_image_description_alignment" class="form-control">
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
                                             <?php echo $gm_lightbox_description_font_style; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_lightbox_description_font_style_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " ( " . $gm_premium_edition . " ) " ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_gallery_description_font_style[]" id="ux_txt_gallery_description_font_size" placeholder="<?php echo $gm_font_size_placeholder; ?>" onblur="default_value_gallery_master('#ux_txt_gallery_description_font_size', 14);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($lightbox_nivo_description_font_style[0]); ?>">
                                             <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_gallery_description_font_style[]" id="ux_txt_gallery_description_style_color"  onblur="default_value_gallery_master('#ux_txt_gallery_description_style_color', '#ffffff');" onfocus="color_picker_gallery_master(this, this.value)"  placeholder="<?php echo $gm_color_placeholder; ?>" value="<?php echo esc_attr($lightbox_nivo_description_font_style[1]); ?>">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gm_lightbox_description_font_family; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_lightbox_description_font_family_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " ( " . $gm_premium_edition . " ) " ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <select name="ux_ddl_gallery_description_font_family" id="ux_ddl_gallery_description_font_family" class="form-control">
                                                <?php
                                                if (file_exists(GALLERY_MASTER_PLUGIN_DIR_PATH . "includes/web-fonts.php")) {
                                                   include GALLERY_MASTER_PLUGIN_DIR_PATH . "includes/web-fonts.php";
                                                }
                                                ?>
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gm_margin_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_margin_gallery_description_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " ( " . $gm_premium_edition . " ) " ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_image_description_margin[]" id="ux_txt_image_description_margin_top" placeholder="<?php echo $gm_top; ?>" onblur="default_value_gallery_master('#ux_txt_image_description_margin_top', 0);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($lightbox_nivo_description_margin[0]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_image_description_margin[]" id="ux_txt_image_description_margin_right" placeholder="<?php echo $gm_right; ?>" onblur="default_value_gallery_master('#ux_txt_image_description_margin_right', 0);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($lightbox_nivo_description_margin[1]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_image_description_margin[]" id="ux_txt_image_description_margin_bottom" placeholder="<?php echo $gm_bottom; ?>" onblur="default_value_gallery_master('#ux_txt_image_description_margin_bottom', 0);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($lightbox_nivo_description_margin[2]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_image_description_margin[]" id="ux_txt_image_description_margin_left" placeholder="<?php echo $gm_left; ?>" onblur="default_value_gallery_master('#ux_txt_image_description_margin_left', 0);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($lightbox_nivo_description_margin[3]); ?>">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gm_padding_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_padding_gallery_description_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " ( " . $gm_premium_edition . " ) " ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_image_description_padding[]" id="ux_txt_image_description_padding_top" placeholder="<?php echo $gm_top; ?>" onblur="default_value_gallery_master('#ux_txt_image_description_padding_top', 0);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($lightbox_nivo_description_padding[0]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_image_description_padding[]" id="ux_txt_image_description_padding_right" placeholder="<?php echo $gm_right; ?>" onblur="default_value_gallery_master('#ux_txt_image_description_padding_right', 10);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($lightbox_nivo_description_padding[1]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_image_description_padding[]" id="ux_txt_image_description_padding_bottom" placeholder="<?php echo $gm_bottom; ?>" onblur="default_value_gallery_master('#ux_txt_image_description_padding_bottom', 10);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($lightbox_nivo_description_padding[2]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_image_description_padding[]" id="ux_txt_image_description_padding_left" placeholder="<?php echo $gm_left; ?>" onblur="default_value_gallery_master('#ux_txt_image_description_padding_left', 10);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($lightbox_nivo_description_padding[3]); ?>">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="line-separator"></div>
                           <div class="form-actions">
                              <div class="pull-right">
                                 <input type="submit" class="btn vivid-green" name="ux_btn_save_changes" id="ux_btn_save_changes" value="<?php echo $gm_save_changes; ?>">
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
               <a href="admin.php?page=gm_lightcase">
                  <?php echo $gm_lightboxes; ?>
               </a>
               <span>></span>
            </li>
            <li>
               <span>
                  <?php echo $gm_nivo_lightbox; ?>
               </span>
            </li>
         </ul>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="portlet box vivid-green">
               <div class="portlet-title">
                  <div class="caption">
                     <i class="icon-custom-paper-plane"></i>
                     <?php echo $gm_nivo_lightbox; ?>
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