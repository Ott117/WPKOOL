<?php
/**
 * Template to display the Color Box settings.
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

      $color_box_title_font_style = isset($color_box_get_data["lightbox_color_box_title_font_style"]) ? explode(",", esc_attr($color_box_get_data["lightbox_color_box_title_font_style"])) : array(16, "#ffffff");
      $color_box_title_margin = isset($color_box_get_data["lightbox_color_box_title_margin"]) ? explode(",", esc_attr($color_box_get_data["lightbox_color_box_title_margin"])) : array(5, 0, 5, 0);
      $color_box_title_padding = isset($color_box_get_data["lightbox_color_box_title_padding"]) ? explode(",", esc_attr($color_box_get_data["lightbox_color_box_title_padding"])) : array(0, 0, 0, 10);

      $color_box_description_font_style = isset($color_box_get_data["lightbox_color_box_description_font_style"]) ? explode(",", esc_attr($color_box_get_data["lightbox_color_box_description_font_style"])) : array(14, "#ffffff");
      $color_box_description_margin = isset($color_box_get_data["lightbox_color_box_description_margin"]) ? explode(",", esc_attr($color_box_get_data["lightbox_color_box_description_margin"])) : array(5, 0, 5, 0);
      $color_box_description_padding = isset($color_box_get_data["lightbox_color_box_description_padding"]) ? explode(",", esc_attr($color_box_get_data["lightbox_color_box_description_padding"])) : array(0, 0, 0, 10);
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
                  <?php echo $gm_color_box; ?>
               </span>
            </li>
         </ul>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="portlet box vivid-green">
               <div class="portlet-title">
                  <div class="caption">
                     <i class="icon-custom-magic-wand"></i>
                     <?php echo $gm_color_box; ?>
                  </div>
                  <p class="premium-editions">
                     <?php echo $gm_upgrade_need_help ?><a href="<?php echo tech_banker_gallery_url; ?>" target="_blank" class="premium-editions-documentation"><?php echo $gm_documentation ?></a><?php echo $gm_read_and_check; ?><a href="<?php echo tech_banker_gallery_url; ?>frontend-demos/" target="_blank" class="premium-editions-documentation"><?php echo $gm_demos_section; ?></a>
                  </p>
               </div>
               <div class="portlet-body form">
                  <form id="ux_frm_color_box">
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
                                             <?php echo $gm_lightbox_colorbox_type_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_lightbox_colorbox_type_tooltip; ?>" data-placement="right" ></i>
                                             <span class="required" aria-required="true">* <?php echo " ( " . $gm_premium_edition . " ) " ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <select name="ux_ddl_colorbox_type" id="ux_ddl_colorbox_type" class="form-control">
                                                <option value="type1"><?php echo $gm_lightbox_colorbox_type1; ?></option>
                                                <option value="type2"><?php echo $gm_lightbox_colorbox_type2; ?></option>
                                                <option value="type3"><?php echo $gm_lightbox_colorbox_type3; ?></option>
                                                <option value="type4"><?php echo $gm_lightbox_colorbox_type4; ?></option>
                                                <option value="type5"><?php echo $gm_lightbox_colorbox_type5; ?></option>
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gm_lightbox_colorbox_effect_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_lightbox_colorbox_effect_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " ( " . $gm_premium_edition . " ) " ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <select name="ux_ddl_colorbox_effect" id="ux_ddl_colorbox_effect" class="form-control">
                                                <option value="none"><?php echo $gm_none; ?></option>
                                                <option value="elastic"><?php echo $gm_elastic; ?></option>
                                                <option value="fade"><?php echo $gm_fade; ?></option>
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gm_lightbox_colorbox_effect_speed_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_lightbox_colorbox_effect_speed_tooltip; ?>" data-placement="right" ></i>
                                             <span class="required" aria-required="true">* <?php echo " ( " . $gm_premium_edition . " ) " ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control" name="ux_txt_transition_speed" id="ux_txt_transition_speed" placeholder="<?php echo $gm_lightbox_colorbox_effect_speed_placeholder; ?>" onblur="default_value_gallery_master('#ux_txt_transition_speed', 350)" maxlength="4" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo isset($color_box_get_data["lightbox_color_box_transition_speed"]) ? intval($color_box_get_data["lightbox_color_box_transition_speed"]) : 350; ?>">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gm_lightbox_colorbox_fadeout_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_lightbox_colorbox_fadeout_tooltip; ?>" data-placement="right" ></i>
                                             <span class="required" aria-required="true">* <?php echo " ( " . $gm_premium_edition . " ) " ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control" name="ux_txt_fadeout_speed" id="ux_txt_fadeout_speed" placeholder="<?php echo $gm_lightbox_colorbox_fadeout_placeholder; ?>" onblur="default_value_gallery_master('#ux_txt_fadeout_speed', 300)" maxlength="4" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo isset($color_box_get_data["lightbox_color_box_fadeout"]) ? intval($color_box_get_data["lightbox_color_box_fadeout"]) : 300; ?>">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gm_lightbox_colorbox_slideshow_positioning_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_lightbox_colorbox_slideshow_positioning_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " ( " . $gm_premium_edition . " ) " ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <select name="ux_ddl_positioning" id="ux_ddl_positioning" class="form-control" onchange="position_setting_gallery_master(this)">
                                                <option value="top"><?php echo $gm_top; ?></option>
                                                <option value="bottom"><?php echo $gm_bottom; ?></option>
                                                <option value="left"><?php echo $gm_left; ?></option>
                                                <option value="right"><?php echo $gm_right; ?></option>
                                                <option value="reposition"><?php echo $gm_lightbox_colorbox_slideshow_reposition; ?></option>
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gm_lightbox_colorbox_slideshow_fixed_position_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_lightbox_colorbox_slideshow_fixed_position_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " ( " . $gm_premium_edition . " ) " ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <select name="ux_ddl_fixed_positioning" id="ux_ddl_fixed_positioning" class="form-control">
                                                <option value="true"><?php echo $gm_enable; ?></option>
                                                <option value="false"><?php echo $gm_disable; ?></option>
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div id="positioning_setting" style="display:none;">
                                    <div class="form-group">
                                       <label class="control-label">
                                          <?php echo $gm_lightbox_colorbox_slideshow_positioning_value_title; ?> :
                                          <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_lightbox_colorbox_slideshow_positioning_value_tooltip; ?>" data-placement="right"></i>
                                          <span class="required" aria-required="true">* <?php echo " ( " . $gm_premium_edition . " ) " ?></span>
                                       </label>
                                       <div class="input-icon right">
                                          <input type="text" class="form-control" name="ux_txt_positioning_value" id="ux_txt_positioning_value" placeholder="<?php echo $gm_lightbox_colorbox_slideshow_positioning_value_placeholder; ?>" onblur="default_value_gallery_master('#ux_txt_positioning_value', 50)" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo isset($color_box_get_data["lightbox_color_box_postioning_value"]) ? intval($color_box_get_data["lightbox_color_box_postioning_value"]) : 50; ?>">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gm_lightbox_colorbox_open_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_lightbox_colorbox_open_tooltip; ?>" data-placement="right" ></i>
                                             <span class="required" aria-required="true">* <?php echo " ( " . $gm_premium_edition . " ) " ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <select name="ux_ddl_colorbox_open" id="ux_ddl_colorbox_open" class="form-control">
                                                <option value="true"><?php echo $gm_enable; ?></option>
                                                <option value="false"><?php echo $gm_disable; ?></option>
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gm_lightbox_colorbox_close_button_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_lightbox_colorbox_close_button_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " ( " . $gm_premium_edition . " ) " ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <select name="ux_ddl_show_close_button" id="ux_ddl_show_close_button" class="form-control">
                                                <option value="true"><?php echo $gm_enable; ?></option>
                                                <option value="false"><?php echo $gm_disable; ?></option>
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="control-label">
                                       <?php echo $gm_lightbox_colorbox_slideshow_title; ?> :
                                       <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_lightbox_colorbox_slideshow_tooltip; ?>" data-placement="right"></i>
                                       <span class="required" aria-required="true">* <?php echo " ( " . $gm_premium_edition . " ) " ?></span>
                                    </label>
                                    <div class="input-icon right">
                                       <select name="ux_ddl_slide_show" id="ux_ddl_slide_show" class="form-control" onchange="show_hide_control_gallery_master('ux_ddl_slide_show', 'slideshow_settings');">
                                          <option value="true"><?php echo $gm_enable; ?></option>
                                          <option value="false"><?php echo $gm_disable; ?></option>
                                       </select>
                                    </div>
                                 </div>
                                 <div id="slideshow_settings" style="display:none;">
                                    <div class="row">
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label class="control-label">
                                                <?php echo $gm_lightbox_colorbox_slideshow_speed_title; ?> :
                                                <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_lightbox_colorbox_slideshow_speed_tooltip; ?>" data-placement="right" ></i>
                                                <span class="required" aria-required="true">* <?php echo " ( " . $gm_premium_edition . " ) " ?></span>
                                             </label>
                                             <div class="input-icon right">
                                                <input type="text" class="form-control" name="ux_txt_slideshow_speed" id="ux_txt_slideshow_speed" placeholder="<?php echo $gm_lightbox_colorbox_slideshow_speed_placeholder; ?>" onblur="default_value_gallery_master('#ux_txt_slideshow_speed', 10000)" maxlength="5" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo isset($color_box_get_data["lightbox_color_box_slideshow_speed"]) ? intval($color_box_get_data["lightbox_color_box_slideshow_speed"]) : 10000; ?>">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label class="control-label">
                                                <?php echo $gm_lightbox_colorbox_slideshow_auto_title; ?> :
                                                <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_lightbox_colorbox_slideshow_auto_tooltip; ?>" data-placement="right"></i>
                                                <span class="required" aria-required="true">* <?php echo " ( " . $gm_premium_edition . " ) " ?></span>
                                             </label>
                                             <div class="input-icon right">
                                                <select name="ux_ddl_auto_slide_show" id="ux_ddl_auto_slide_show" class="form-control">
                                                   <option value="true"><?php echo $gm_enable; ?></option>
                                                   <option value="false"><?php echo $gm_disable; ?></option>
                                                </select>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gm_background_color; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_lightbox_colorbox_background_color_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " ( " . $gm_premium_edition . " ) " ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control" name="ux_txt_colorbox_background_color" id="ux_txt_colorbox_background_color" placeholder="<?php echo $gm_lightbox_colorbox_background_color_placeholder; ?>" onfocus="color_picker_gallery_master(this, this.value)" value="<?php echo isset($color_box_get_data["lightbox_color_box_background"]) ? esc_attr($color_box_get_data["lightbox_color_box_background"]) : "#000000"; ?>">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gm_opacity_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_lightbox_colorbox_opacity_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " ( " . $gm_premium_edition . " ) " ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control" name="ux_txt_colorbox_opacity" id="ux_txt_colorbox_opacity" placeholder="<?php echo $gm_opacity_placeholder; ?>" onblur="default_value_gallery_master('#ux_txt_colorbox_opacity', 75)" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo isset($color_box_get_data["lightbox_color_box_opacity"]) ? intval($color_box_get_data["lightbox_color_box_opacity"]) : 75; ?>">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="tab-pane" id="image_title">
                                 <div class="form-group">
                                    <label class="control-label">
                                       <?php echo $gm_title; ?> :
                                       <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_title_tooltip; ?>" data-placement="right"></i>
                                       <span class="required" aria-required="true">* <?php echo " ( " . $gm_premium_edition . " ) " ?></span>
                                    </label>
                                    <div class="input-icon right">
                                       <select id="ux_ddl_color_box_title" name="ux_ddl_color_box_title" class="form-control" onchange="show_hide_control_gallery_master('ux_ddl_color_box_title', 'color_box_title_div');">
                                          <option value="true"><?php echo $gm_show; ?></option>
                                          <option value="false"><?php echo $gm_hide; ?></option>
                                       </select>
                                    </div>
                                 </div>
                                 <div id="color_box_title_div">
                                    <div class="row">
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
                                    </div>
                                    <div class="row">
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label class="control-label">
                                                <?php echo $gm_lightbox_title_font_style; ?> :
                                                <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_font_style_title_tooltip; ?>" data-placement="right"></i>
                                                <span class="required" aria-required="true">* <?php echo " ( " . $gm_premium_edition . " ) " ?></span>
                                             </label>
                                             <div class="input-icon right">
                                                <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_gallery_title_font_style[]" id="ux_txt_gallery_title_font_size" placeholder="<?php echo $gm_font_size_placeholder; ?>" onblur="default_value_gallery_master('#ux_txt_gallery_title_font_size', 16);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($color_box_title_font_style[0]); ?>">
                                                <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_gallery_title_font_style[]" id="ux_txt_gallery_title_style_color" onblur="default_value_gallery_master('#ux_txt_gallery_title_style_color', '#ffffff');" onfocus="color_picker_gallery_master(this, this.value)" placeholder="<?php echo $gm_color_placeholder; ?>" value="<?php echo esc_attr($color_box_title_font_style[1]); ?>">
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
                                    </div>
                                    <div class="row">
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label class="control-label">
                                                <?php echo $gm_margin_title; ?> :
                                                <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_margin_gallery_title_tooltip; ?>" data-placement="right"></i>
                                                <span class="required" aria-required="true">* <?php echo " ( " . $gm_premium_edition . " ) " ?></span>
                                             </label>
                                             <div class="input-icon right">
                                                <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_image_title_margin_text[]" id="ux_txt_image_title_margin_top" placeholder="<?php echo $gm_top; ?>" onblur="default_value_gallery_master('#ux_txt_image_title_margin_top', 5);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($color_box_title_margin[0]); ?>">
                                                <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_image_title_margin_text[]" id="ux_txt_image_title_margin_right" placeholder="<?php echo $gm_right; ?>" onblur="default_value_gallery_master('#ux_txt_image_title_margin_right', 0);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($color_box_title_margin[1]); ?>">
                                                <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_image_title_margin_text[]" id="ux_txt_image_title_margin_bottom" placeholder="<?php echo $gm_bottom; ?>" onblur="default_value_gallery_master('#ux_txt_image_title_margin_bottom', 5);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($color_box_title_margin[2]); ?>">
                                                <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_image_title_margin_text[]" id="ux_txt_image_title_margin_left" placeholder="<?php echo $gm_left; ?>" onblur="default_value_gallery_master('#ux_txt_image_title_margin_left', 0);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($color_box_title_margin[3]); ?>">
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
                                                <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_image_title_padding_text[]" id="ux_txt_image_title_padding_top" placeholder="<?php echo $gm_top; ?>" onblur="default_value_gallery_master('#ux_txt_image_title_padding_top', 0);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($color_box_title_padding[0]); ?>">
                                                <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_image_title_padding_text[]" id="ux_txt_image_title_padding_right" placeholder="<?php echo $gm_right; ?>" onblur="default_value_gallery_master('#ux_txt_image_title_padding_right', 0);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($color_box_title_padding[1]); ?>">
                                                <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_image_title_padding_text[]" id="ux_txt_image_title_padding_bottom" placeholder="<?php echo $gm_bottom; ?>" onblur="default_value_gallery_master('#ux_txt_image_title_padding_bottom', 0);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($color_box_title_padding[2]); ?>">
                                                <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_image_title_padding_text[]" id="ux_txt_image_title_padding_left" placeholder="<?php echo $gm_left; ?>" onblur="default_value_gallery_master('#ux_txt_image_title_padding_left', 10);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($color_box_title_padding[3]); ?>">
                                             </div>
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
                                       <select id="ux_ddl_color_box_description" name="ux_ddl_color_box_description" class="form-control" onchange="show_hide_control_gallery_master('ux_ddl_color_box_description', 'color_box_description_div');">
                                          <option value="true"><?php echo $gm_show; ?></option>
                                          <option value="false"><?php echo $gm_hide; ?></option>
                                       </select>
                                    </div>
                                 </div>
                                 <div id="color_box_description_div">
                                    <div class="row">
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
                                    </div>
                                    <div class="row">
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label class="control-label">
                                                <?php echo $gm_lightbox_description_font_style; ?> :
                                                <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_lightbox_description_font_style_tooltip; ?>" data-placement="right"></i>
                                                <span class="required" aria-required="true">* <?php echo " ( " . $gm_premium_edition . " ) " ?></span>
                                             </label>
                                             <div class="input-icon right">
                                                <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_gallery_description_font_style[]" id="ux_txt_gallery_description_font_size" placeholder="<?php echo $gm_font_size_placeholder; ?>" onblur="default_value_gallery_master('#ux_txt_gallery_description_font_size', 14);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($color_box_description_font_style[0]); ?>">
                                                <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_gallery_description_font_style[]" id="ux_txt_gallery_description_style_color"  onblur="default_value_gallery_master('#ux_txt_gallery_description_style_color', '#ffffff');" onfocus="color_picker_gallery_master(this, this.value)" placeholder="<?php echo $gm_color_placeholder; ?>" value="<?php echo esc_attr($color_box_description_font_style[1]); ?>">
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
                                    </div>
                                    <div class="row">
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label class="control-label">
                                                <?php echo $gm_margin_title; ?> :
                                                <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_margin_gallery_description_tooltip; ?>" data-placement="right"></i>
                                                <span class="required" aria-required="true">* <?php echo " ( " . $gm_premium_edition . " ) " ?></span>
                                             </label>
                                             <div class="input-icon right">
                                                <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_image_description_margin[]" id="ux_txt_image_description_margin_top" placeholder="<?php echo $gm_top; ?>" onblur="default_value_gallery_master('#ux_txt_image_description_margin_top', 5);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($color_box_description_margin[0]); ?>">
                                                <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_image_description_margin[]" id="ux_txt_image_description_margin_right" placeholder="<?php echo $gm_right; ?>" onblur="default_value_gallery_master('#ux_txt_image_description_margin_right', 0);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($color_box_description_margin[1]); ?>">
                                                <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_image_description_margin[]" id="ux_txt_image_description_margin_bottom" placeholder="<?php echo $gm_bottom; ?>" onblur="default_value_gallery_master('#ux_txt_image_description_margin_bottom', 5);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($color_box_description_margin[2]); ?>">
                                                <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_image_description_margin[]" id="ux_txt_image_description_margin_left" placeholder="<?php echo $gm_left; ?>" onblur="default_value_gallery_master('#ux_txt_image_description_margin_left', 0);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($color_box_description_margin[3]); ?>">
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
                                                <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_image_description_padding[]" id="ux_txt_image_description_padding_top" placeholder="<?php echo $gm_top; ?>" onblur="default_value_gallery_master('#ux_txt_image_description_padding_top', 0);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($color_box_description_padding[0]); ?>">
                                                <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_image_description_padding[]" id="ux_txt_image_description_padding_right" placeholder="<?php echo $gm_right; ?>" onblur="default_value_gallery_master('#ux_txt_image_description_padding_right', 0);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($color_box_description_padding[1]); ?>">
                                                <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_image_description_padding[]" id="ux_txt_image_description_padding_bottom" placeholder="<?php echo $gm_bottom; ?>" onblur="default_value_gallery_master('#ux_txt_image_description_padding_bottom', 0);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($color_box_description_padding[2]); ?>">
                                                <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_image_description_padding[]" id="ux_txt_image_description_padding_left" placeholder="<?php echo $gm_left; ?>" onblur="default_value_gallery_master('#ux_txt_image_description_padding_left', 10);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($color_box_description_padding[3]); ?>">
                                             </div>
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
                  <?php echo $gm_color_box; ?>
               </span>
            </li>
         </ul>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="portlet box vivid-green">
               <div class="portlet-title">
                  <div class="caption">
                     <i class="icon-custom-magic-wand"></i>
                     <?php echo $gm_color_box; ?>
                  </div>
                  <p class="premium-editions">
                     <?php echo $gm_upgrade_need_help ?><a href="<?php echo tech_banker_gallery_url; ?>" target="_blank" class="premium-editions-documentation"><?php echo $gm_documentation ?></a><?php echo $gm_read_and_check; ?><a href="<?php echo tech_banker_gallery_url; ?>frontend-demos/" target="_blank" class="premium-editions-documentation"><?php echo $gm_demos_section; ?></a>
                  </p>
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