<?php
/**
 * Template to display the fancy Box settings.
 *
 * @author 	Tech Banker
 * @package 	gallery-master/views/lightboxes
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
   } else if (lightboxes_gallery_master == "1") {
      $fancy_box_title_font_style = isset($gm_fancy_box_get_data["fancy_box_title_font_style"]) ? explode(",", esc_attr($gm_fancy_box_get_data["fancy_box_title_font_style"])) : array(14, "#000000");
      $fancy_box_description_font_style = isset($gm_fancy_box_get_data["fancy_box_description_font_style"]) ? explode(",", esc_attr($gm_fancy_box_get_data["fancy_box_description_font_style"])) : array(12, "#000000");
      $fancy_box_border_style = isset($gm_fancy_box_get_data["fancy_box_border_style"]) ? explode(",", esc_attr($gm_fancy_box_get_data["fancy_box_border_style"])) : array(2, "solid", "#cccccc");
      $fancy_box_title_margin = isset($gm_fancy_box_get_data["fancy_box_title_margin"]) ? explode(",", esc_attr($gm_fancy_box_get_data["fancy_box_title_margin"])) : array(5, 0, 5, 0);
      $fancy_box_title_padding = isset($gm_fancy_box_get_data["fancy_box_title_padding"]) ? explode(",", esc_attr($gm_fancy_box_get_data["fancy_box_title_padding"])) : array(0, 0, 0, 0);
      $fancy_box_description_margin = isset($gm_fancy_box_get_data["fancy_box_description_margin"]) ? explode(",", esc_attr($gm_fancy_box_get_data["fancy_box_description_margin"])) : array(5, 0, 5, 0);
      $fancy_box_description_padding = isset($gm_fancy_box_get_data["fancy_box_description_padding"]) ? explode(",", esc_attr($gm_fancy_box_get_data["fancy_box_description_padding"])) : array(0, 0, 0, 0);
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
                  <?php echo $gm_fancy_box; ?>
               </span>
            </li>
         </ul>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="portlet box vivid-green">
               <div class="portlet-title">
                  <div class="caption">
                     <i class="icon-custom-social-dropbox"></i>
                     <?php echo $gm_fancy_box; ?>
                  </div>
                  <p class="premium-editions">
                     <?php echo $gm_upgrade_need_help ?><a href="<?php echo tech_banker_gallery_url; ?>" target="_blank" class="premium-editions-documentation"><?php echo $gm_documentation ?></a><?php echo $gm_read_and_check; ?><a href="<?php echo tech_banker_gallery_url; ?>frontend-demos/" target="_blank" class="premium-editions-documentation"><?php echo $gm_demos_section; ?></a>
                  </p>
               </div>
               <div class="portlet-body form">
                  <form id="ux_frm_fancy_box">
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
                                             <?php echo $gm_fancy_box_title_position_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_fancy_box_title_position_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* ( <?php echo $gm_premium_edition; ?> ) </span>
                                          </label>
                                          <div class="input-icon right">
                                             <select name="ux_ddl_title_position" id="ux_ddl_title_position" class="form-control">
                                                <option value="outside"><?php echo $gm_fancy_box_outside; ?></option>
                                                <option value="inside"><?php echo $gm_fancy_box_inside; ?></option>
                                                <option value="over"><?php echo $gm_fancy_box_over; ?></option>
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gm_fancy_box_button_position_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_fancy_box_button_position_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* ( <?php echo $gm_premium_edition; ?> ) </span>
                                          </label>
                                          <select name="ux_ddl_button_position" id="ux_ddl_button_position" class="form-control">
                                             <option value="top"><?php echo $gm_fancy_box_top; ?></option>
                                             <option value="bottom"><?php echo $gm_fancy_box_bottom; ?></option>
                                          </select>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gm_fancy_box_arrows_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_fancy_box_arrows_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* ( <?php echo $gm_premium_edition; ?> ) </span>
                                          </label>
                                          <select name="ux_ddl_arrows" id="ux_ddl_arrows" class="form-control">
                                             <option value="true"><?php echo $gm_show; ?></option>
                                             <option value="false"><?php echo $gm_hide; ?></option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gm_fancy_box_mouse_wheel_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_fancy_box_mouse_wheel_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* ( <?php echo $gm_premium_edition; ?> ) </span>
                                          </label>
                                          <select name="ux_ddl_mouse_wheel" id="ux_ddl_mouse_wheel" class="form-control">
                                             <option value="true"><?php echo $gm_enable; ?></option>
                                             <option value="false"><?php echo $gm_disable; ?></option>
                                          </select>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gm_fancy_box_cyclic_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_fancy_box_cyclic_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* ( <?php echo $gm_premium_edition; ?> ) </span>
                                          </label>
                                          <select name="ux_ddl_cyclic" id="ux_ddl_cyclic" class="form-control">
                                             <option value="true"><?php echo $gm_enable; ?></option>
                                             <option value="false"><?php echo $gm_disable; ?></option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gm_fancy_box_change_speed_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_fancy_box_change_speed_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* ( <?php echo $gm_premium_edition; ?> ) </span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control" name="ux_txt_change_speed" id="ux_txt_change_speed" placeholder="<?php echo $gm_fancy_box_change_speed_placeholder; ?>" onfocus="paste_prevent_gallery_master(this.id);" maxlength="4" onkeypress="only_digits_gallery_master(event);" onblur="default_value_gallery_master('#ux_txt_change_speed', 3000);" value="<?php echo isset($gm_fancy_box_get_data["fancy_box_change_speed"]) ? intval($gm_fancy_box_get_data["fancy_box_change_speed"]) : 3000; ?>">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gm_fancy_box_open_speed_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_fancy_box_open_speed_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* ( <?php echo $gm_premium_edition; ?> ) </span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control" name="ux_txt_open_speed" id="ux_txt_open_speed" placeholder="<?php echo $gm_fancy_box_open_speed_placeholder; ?>" onblur="default_value_gallery_master('#ux_txt_open_speed', 300);" maxlength="4" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo isset($gm_fancy_box_get_data["fancy_box_open_speed"]) ? intval($gm_fancy_box_get_data["fancy_box_open_speed"]) : 300; ?>">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gm_fancy_box_close_speed_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_fancy_box_close_speed_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* ( <?php echo $gm_premium_edition; ?> ) </span>
                                          </label>
                                          <input type="text" class="form-control" name="ux_txt_close_speed" id="ux_txt_close_speed" maxlength="4" placeholder="<?php echo $gm_fancy_box_close_speed_placeholder; ?>" onblur="default_value_gallery_master('#ux_txt_close_speed', 300);" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo isset($gm_fancy_box_get_data["fancy_box_close_speed"]) ? intval($gm_fancy_box_get_data["fancy_box_close_speed"]) : 300; ?>">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gm_escape_button; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_fancy_box_enable_escapebutton_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* ( <?php echo $gm_premium_edition; ?> ) </span>
                                          </label>
                                          <div class="input-icon right">
                                             <select name="ux_ddl_enable_escape_button" id="ux_ddl_enable_escape_button" class="form-control">
                                                <option value="false"><?php echo $gm_enable; ?></option>
                                                <option value="true"><?php echo $gm_disable; ?></option>
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gm_close_button; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_fancy_box_show_close_button_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* ( <?php echo $gm_premium_edition; ?> ) </span>
                                          </label>
                                          <div class="input-icon right">
                                             <select name="ux_ddl_show_close_button" id="ux_ddl_show_close_button" class="form-control">
                                                <option value="true"><?php echo $gm_show; ?></option>
                                                <option value="false"><?php echo $gm_hide; ?></option>
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gm_fancy_box_open_effect_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_fancy_box_open_effect_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* ( <?php echo $gm_premium_edition; ?> ) </span>
                                          </label>
                                          <div class="input-icon right">
                                             <select name="ux_ddl_open_effect" id="ux_ddl_open_effect" class="form-control">
                                                <option value="fade"><?php echo $gm_fade; ?></option>
                                                <option value="elastic"><?php echo $gm_elastic; ?></option>
                                                <option value="none"><?php echo $gm_none; ?></option>
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gm_fancy_box_close_effect_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_fancy_box_close_effect_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* ( <?php echo $gm_premium_edition; ?> ) </span>
                                          </label>
                                          <select name="ux_ddl_close_effect" id="ux_ddl_close_effect" class="form-control">
                                             <option value="fade"><?php echo $gm_fade; ?></option>
                                             <option value="elastic"><?php echo $gm_elastic; ?></option>
                                             <option value="none"><?php echo $gm_none; ?></option>
                                          </select>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gm_margin_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_fancy_box_margin_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* ( <?php echo $gm_premium_edition; ?> ) </span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control" name="ux_txt_margin" id="ux_txt_margin" placeholder="<?php echo $gm_fancy_box_margin_placeholder; ?>" onblur="default_value_gallery_master('#ux_txt_margin', 100);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo isset($gm_fancy_box_get_data["fancy_box_margin"]) ? intval($gm_fancy_box_get_data["fancy_box_margin"]) : 100; ?>">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gm_padding_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_fancy_box_padding_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* ( <?php echo $gm_premium_edition; ?> ) </span>
                                          </label>
                                          <input type="text" class="form-control" name="ux_txt_padding" id="ux_txt_padding" maxlength="3" placeholder="<?php echo $gm_fancy_box_padding_placeholder; ?>" onblur="default_value_gallery_master('#ux_txt_padding', 20);" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo isset($gm_fancy_box_get_data["fancy_box_padding"]) ? intval($gm_fancy_box_get_data["fancy_box_padding"]) : 20; ?>">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gm_background_color; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_general_background_color_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* ( <?php echo $gm_premium_edition; ?> ) </span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control" name="ux_txt_background_color" id="ux_txt_background_color" placeholder="<?php echo $gm_lightbox_colorbox_background_color_placeholder; ?>" onfocus="color_picker_gallery_master(this, this.value)" value="<?php echo isset($gm_fancy_box_get_data["fancy_box_background_color"]) ? esc_attr($gm_fancy_box_get_data["fancy_box_background_color"]) : "#ffffff"; ?>">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gm_opacity_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_lightbox_colorbox_opacity_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* ( <?php echo $gm_premium_edition; ?> ) </span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control" name="ux_txt_background_opacity" id="ux_txt_background_opacity" placeholder="<?php echo $gm_opacity_placeholder; ?>" onblur="default_value_gallery_master('#ux_txt_background_opacity', 100)" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo isset($gm_fancy_box_get_data["fancy_box_background_opacity"]) ? intval($gm_fancy_box_get_data["fancy_box_background_opacity"]) : 100; ?>">
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
                                             <span class="required" aria-required="true">* ( <?php echo $gm_premium_edition; ?> ) </span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control" name="ux_txt_overlay_color" id="ux_txt_overlay_color" placeholder="<?php echo $gm_lightbox_overlay_color_placeholder; ?>" onfocus="color_picker_gallery_master(this, this.value)" value="<?php echo isset($gm_fancy_box_get_data["fancy_box_overlay_color"]) ? esc_attr($gm_fancy_box_get_data["fancy_box_overlay_color"]) : "#000000"; ?>">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gm_lightbox_overlay_opacity_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_lightbox_overlay_opacity_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* ( <?php echo $gm_premium_edition; ?> ) </span>
                                          </label>
                                          <input type="text" class="form-control" name="ux_txt_overlay_opacity" onkeypress="only_digits_gallery_master(event);" id="ux_txt_overlay_opacity" maxlength="3" placeholder="<?php echo $gm_lightbox_overlay_opacity_placeholder; ?>" onblur="default_value_gallery_master('#ux_txt_overlay_opacity', 75);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo isset($gm_fancy_box_get_data["fancy_box_overlay_opacity"]) ? intval($gm_fancy_box_get_data["fancy_box_overlay_opacity"]) : 75; ?>">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gm_border_style_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_border_style_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* ( <?php echo $gm_premium_edition; ?> ) </span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control input-width-25 input-inline" name="ux_txt_border_style[]" id="ux_txt_border_style_width" placeholder="<?php echo $gm_width_placeholder; ?>" onblur="default_value_gallery_master('#ux_txt_border_style_width', 2)" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($fancy_box_border_style[0]); ?>">
                                             <select name="ux_txt_border_style[]" id="ux_ddl_border_style_thickness" class="form-control input-width-27 input-inline">
                                                <option value="none"><?php echo $gm_none; ?></option>
                                                <option value="solid"><?php echo $gm_solid; ?></option>
                                                <option value="dashed"><?php echo $gm_dashed; ?></option>
                                                <option value="dotted"><?php echo $gm_dotted ?></option>
                                             </select>
                                             <input type="text" class="form-control input-normal input-inline" name="ux_txt_border_style[]" id="ux_txt_border_style_color" onblur="default_value_gallery_master('#ux_txt_border_style_color', '#cccccc');" onfocus="color_picker_gallery_master(this, this.value)" placeholder="<?php echo $gm_color_placeholder; ?>" value="<?php echo esc_attr($fancy_box_border_style[2]); ?>">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $gm_border_radius_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_border_radius_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* ( <?php echo $gm_premium_edition; ?> ) </span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control" name="ux_txt_border_radius" id="ux_txt_border_radius" placeholder="<?php echo $gm_border_radius_placeholder; ?>" maxlength="3" onkeypress="only_digits_gallery_master(event);" onblur="default_value_gallery_master('#ux_txt_border_radius', 2)" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo isset($gm_fancy_box_get_data["fancy_box_border_radius"]) ? intval($gm_fancy_box_get_data["fancy_box_border_radius"]) : 2; ?>">
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
                                       <span class="required" aria-required="true">* ( <?php echo $gm_premium_edition; ?> ) </span>
                                    </label>
                                    <div class="input-icon right">
                                       <select id="ux_ddl_fancy_box_title" name="ux_ddl_fancy_box_title" class="form-control" onchange="show_hide_control_gallery_master('ux_ddl_fancy_box_title', 'fancy_box_title_div');">
                                          <option value="true"><?php echo $gm_show; ?></option>
                                          <option value="false"><?php echo $gm_hide; ?></option>
                                       </select>
                                    </div>
                                 </div>
                                 <div id="fancy_box_title_div">
                                    <div class="row">
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label class="control-label">
                                                <?php echo $gm_html_tag; ?> :
                                                <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_html_tag_tooltip; ?>" data-placement="right"></i>
                                                <span class="required" aria-required="true">* ( <?php echo $gm_premium_edition; ?> ) </span>
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
                                                <span class="required" aria-required="true">* ( <?php echo $gm_premium_edition; ?> ) </span>
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
                                                <span class="required" aria-required="true">* ( <?php echo $gm_premium_edition; ?> ) </span>
                                             </label>
                                             <div class="input-icon right">
                                                <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_gallery_title_font_style[]" id="ux_txt_gallery_title_font_size" placeholder="<?php echo $gm_font_size_placeholder; ?>" onblur="default_value_gallery_master('#ux_txt_gallery_title_font_size', 14);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($fancy_box_title_font_style[0]); ?>">
                                                <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_gallery_title_font_style[]" id="ux_txt_gallery_title_style_color" onblur="default_value_gallery_master('#ux_txt_gallery_title_style_color', '#000000');" onfocus="color_picker_gallery_master(this, this.value)" placeholder="<?php echo $gm_color_placeholder; ?>" value="<?php echo esc_attr($fancy_box_title_font_style[1]); ?>">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label class="control-label">
                                                <?php echo $gm_lightbox_title_font_family; ?> :
                                                <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_lightbox_title_font_family_tooltip; ?>" data-placement="right"></i>
                                                <span class="required" aria-required="true">* ( <?php echo $gm_premium_edition; ?> ) </span>
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
                                                <span class="required" aria-required="true">* ( <?php echo $gm_premium_edition; ?> ) </span>
                                             </label>
                                             <div class="input-icon right">
                                                <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_image_title_margin_text[]" id="ux_txt_image_title_margin_top" placeholder="<?php echo $gm_top; ?>" onblur="default_value_gallery_master('#ux_txt_image_title_margin_top', 5);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($fancy_box_title_margin[0]); ?>">
                                                <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_image_title_margin_text[]" id="ux_txt_image_title_margin_right" placeholder="<?php echo $gm_right; ?>" onblur="default_value_gallery_master('#ux_txt_image_title_margin_right', 0);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($fancy_box_title_margin[1]); ?>">
                                                <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_image_title_margin_text[]" id="ux_txt_image_title_margin_bottom" placeholder="<?php echo $gm_bottom; ?>" onblur="default_value_gallery_master('#ux_txt_image_title_margin_bottom', 5);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($fancy_box_title_margin[2]); ?>">
                                                <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_image_title_margin_text[]" id="ux_txt_image_title_margin_left" placeholder="<?php echo $gm_left; ?>" onblur="default_value_gallery_master('#ux_txt_image_title_margin_left', 0);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($fancy_box_title_margin[3]); ?>">
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
                                                <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_image_title_padding_text[]" id="ux_txt_image_title_padding_top" placeholder="<?php echo $gm_top; ?>" onblur="default_value_gallery_master('#ux_txt_image_title_padding_top', 0);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($fancy_box_title_padding[0]); ?>">
                                                <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_image_title_padding_text[]" id="ux_txt_image_title_padding_right" placeholder="<?php echo $gm_right; ?>" onblur="default_value_gallery_master('#ux_txt_image_title_padding_right', 0);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($fancy_box_title_padding[1]); ?>">
                                                <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_image_title_padding_text[]" id="ux_txt_image_title_padding_bottom" placeholder="<?php echo $gm_bottom; ?>" onblur="default_value_gallery_master('#ux_txt_image_title_padding_bottom', 0);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($fancy_box_title_padding[2]); ?>">
                                                <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_image_title_padding_text[]" id="ux_txt_image_title_padding_left" placeholder="<?php echo $gm_left; ?>" onblur="default_value_gallery_master('#ux_txt_image_title_padding_left', 0);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($fancy_box_title_padding[3]); ?>">
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
                                       <span class="required" aria-required="true">* ( <?php echo $gm_premium_edition; ?> ) </span>
                                    </label>
                                    <div class="input-icon right">
                                       <select id="ux_ddl_fancy_box_description" name="ux_ddl_fancy_box_description" class="form-control" onchange="show_hide_control_gallery_master('ux_ddl_fancy_box_description', 'fancy_box_description_div');">
                                          <option value="true"><?php echo $gm_show; ?></option>
                                          <option value="false"><?php echo $gm_hide; ?></option>
                                       </select>
                                    </div>
                                 </div>
                                 <div id="fancy_box_description_div">
                                    <div class="row">
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label class="control-label">
                                                <?php echo $gm_html_tag; ?> :
                                                <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_html_tag_tooltip; ?>" data-placement="right"></i>
                                                <span class="required" aria-required="true">* ( <?php echo $gm_premium_edition; ?> ) </span>
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
                                                <span class="required" aria-required="true">* ( <?php echo $gm_premium_edition; ?> ) </span>
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
                                                <span class="required" aria-required="true">* ( <?php echo $gm_premium_edition; ?> ) </span>
                                             </label>
                                             <div class="input-icon right">
                                                <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_gallery_description_font_style[]" id="ux_txt_gallery_description_font_size" placeholder="<?php echo $gm_font_size_placeholder; ?>" onblur="default_value_gallery_master('#ux_txt_gallery_description_font_size', 12);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($fancy_box_description_font_style[0]); ?>">
                                                <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_gallery_description_font_style[]" id="ux_txt_gallery_description_style_color" onblur="default_value_gallery_master('#ux_txt_gallery_description_style_color', '#000000');" onfocus="color_picker_gallery_master(this, this.value)" placeholder="<?php echo $gm_color_placeholder; ?>" value="<?php echo esc_attr($fancy_box_description_font_style[1]); ?>">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label class="control-label">
                                                <?php echo $gm_lightbox_description_font_family; ?> :
                                                <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_lightbox_description_font_family_tooltip; ?>" data-placement="right"></i>
                                                <span class="required" aria-required="true">* ( <?php echo $gm_premium_edition; ?> ) </span>
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
                                                <span class="required" aria-required="true">* ( <?php echo $gm_premium_edition; ?> ) </span>
                                             </label>
                                             <div class="input-icon right">
                                                <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_image_description_margin[]" id="ux_txt_image_description_margin_top" placeholder="<?php echo $gm_top; ?>" onblur="default_value_gallery_master('#ux_txt_image_description_margin_top', 5);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($fancy_box_description_margin[0]); ?>">
                                                <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_image_description_margin[]" id="ux_txt_image_description_margin_right" placeholder="<?php echo $gm_right; ?>" onblur="default_value_gallery_master('#ux_txt_image_description_margin_right', 0);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($fancy_box_description_margin[1]); ?>">
                                                <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_image_description_margin[]" id="ux_txt_image_description_margin_bottom" placeholder="<?php echo $gm_bottom; ?>" onblur="default_value_gallery_master('#ux_txt_image_description_margin_bottom', 5);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($fancy_box_description_margin[2]); ?>">
                                                <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_image_description_margin[]" id="ux_txt_image_description_margin_left" placeholder="<?php echo $gm_left; ?>" onblur="default_value_gallery_master('#ux_txt_image_description_margin_left', 0);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($fancy_box_description_margin[3]); ?>">
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
                                                <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_image_description_padding[]" id="ux_txt_image_description_padding_top" placeholder="<?php echo $gm_top; ?>" onblur="default_value_gallery_master('#ux_txt_image_description_padding_top', 0);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($fancy_box_description_padding[0]); ?>">
                                                <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_image_description_padding[]" id="ux_txt_image_description_padding_right" placeholder="<?php echo $gm_right; ?>" onblur="default_value_gallery_master('#ux_txt_image_description_padding_right', 0);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($fancy_box_description_padding[1]); ?>">
                                                <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_image_description_padding[]" id="ux_txt_image_description_padding_bottom" placeholder="<?php echo $gm_bottom; ?>" onblur="default_value_gallery_master('#ux_txt_image_description_padding_bottom', 0);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($fancy_box_description_padding[2]); ?>">
                                                <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_image_description_padding[]" id="ux_txt_image_description_padding_left" placeholder="<?php echo $gm_left; ?>" onblur="default_value_gallery_master('#ux_txt_image_description_padding_left', 0);" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" value="<?php echo intval($fancy_box_description_padding[3]); ?>">
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
                  <?php echo $gm_fancy_box; ?>
               </span>
            </li>
         </ul>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="portlet box vivid-green">
               <div class="portlet-title">
                  <div class="caption">
                     <i class="icon-custom-social-dropbox"></i>
                     <?php echo $gm_fancy_box; ?>
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