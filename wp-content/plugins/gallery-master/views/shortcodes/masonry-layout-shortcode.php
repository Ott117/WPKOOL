<?php
/**
 * Template to view and generate Shortcode for Masonry Layout Shortcode.
 *
 * @author 	Tech Banker
 * @package 	gallery-master-business-edition/views/shortcodes
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
                  <?php echo $gm_masonry_layout; ?>
               </span>
            </li>
         </ul>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="portlet box vivid-green">
               <div class="portlet-title">
                  <div class="caption">
                     <i class="icon-custom-energy"></i>
                     <?php echo $gm_masonry_layout; ?>
                  </div>
                  <p class="premium-editions">
                     <?php echo $gm_upgrade_need_help ?><a href="<?php echo tech_banker_gallery_url; ?>" target="_blank" class="premium-editions-documentation"><?php echo $gm_documentation ?></a><?php echo $gm_read_and_check; ?><a href="<?php echo tech_banker_gallery_url; ?>frontend-demos/" target="_blank" class="premium-editions-documentation"><?php echo $gm_demos_section; ?></a>
                  </p>
               </div>
               <div class="portlet-body form">
                  <form id="ux_frm_masonry_layout">
                     <div class="form-body">
                        <div class="form-actions">
                           <div class="pull-right">
                              <input type="button" class="btn vivid-green reset-page" name="ux_btn_reset_shortcode" id="ux_btn_reset_shortcode" value="<?php echo $gm_reset_shortcode; ?>">
                           </div>
                        </div>
                        <div class="line-separator"></div>
                        <div id="ux_div_shortcode" class="ux_div_shortcode" style="display: none;">
                           <div class="form-group">
                              <label class="control-label">
                                 <?php echo $gm_shortcode_title; ?> :
                                 <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_shortcode_tooltip; ?>" data-placement="right"></i>
                                 <span class="required" aria-required="true">*</span>
                              </label>
                              <div class="icon-custom-docs tooltips pull-right" style="font-size:18px;" data-original-title="<?php echo $gm_copy_to_clipboard; ?>" data-placement="left" data-clipboard-action="copy" data-clipboard-target="#ux_txtarea_generate_shortcode"></div>
                              <textarea class="form-control ux_txtarea_generate_shortcode" readonly="ture" name="ux_txtarea_generate_shortcode" id="ux_txtarea_generate_shortcode" rows="4"></textarea>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="control-label">
                              <?php echo $gm_choose_gallery_title; ?> :
                              <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_choose_gallery_tooltip; ?>" data-placement="right"></i>
                              <span class="required" aria-required="true">*</span>
                           </label>
                           <select id="ux_ddl_choose_gallery" name="ux_ddl_choose_gallery" class="form-control" onchange="generate_shortcode_masonry_layout_gallery_master();">
                              <option value=""><?php echo $gm_choose_gallery_title; ?></option>
                              <?php
                              foreach ($masonry_layout_get_data as $value) {
                                 ?>
                                 <option value="<?php echo intval($value["meta_id"]); ?>"><?php echo isset($value["gallery_title"]) && $value["gallery_title"] != "" ? esc_attr($value["gallery_title"]) : $gm_untitled; ?></option>
                                 <?php
                              }
                              ?>
                           </select>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label">
                                    <?php echo $gm_alignment_title; ?> :
                                    <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_layout_settings_alignment_tooltip; ?>" data-placement="right"></i>
                                    <span class="required" aria-required="true">*</span>
                                 </label>
                                 <div class="input-icon right">
                                    <select name="ux_ddl_alignment" id="ux_ddl_alignment" class="form-control" onchange="generate_shortcode_masonry_layout_gallery_master();">
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
                                    <?php echo $gm_no_of_columns_title; ?> :
                                    <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_no_of_columns_tooltip; ?>" data-placement="right"></i>
                                    <span class="required" aria-required="true">*</span>
                                 </label>
                                 <input type="text" class="form-control" name="ux_txt_columns" id="ux_txt_columns" value="4" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" onblur="default_value_gallery_master('#ux_txt_columns', 4); generate_shortcode_masonry_layout_gallery_master();" placeholder="<?php echo $gm_no_of_columns_placeholder; ?>">
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label">
                                    <?php echo $gm_lightbox_type_title; ?> :
                                    <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_lightbox_type_tooltip; ?>" data-placement="right"></i>
                                    <span class="required" aria-required="true">*</span>
                                 </label>
                                 <div class="input-icon right">
                                    <select name="ux_ddl_lightbox_type" id="ux_ddl_lightbox_type" class="form-control" onchange="generate_shortcode_masonry_layout_gallery_master();">
                                       <option value="no_lightbox"><?php echo $gm_no_light_box; ?></option>
                                       <option value="lightcase" disabled="disabled" style="color:red;"><?php echo $gm_lightcase; ?></option>
                                       <option value="fancy_box" disabled="disabled" style="color:red;"><?php echo $gm_fancy_box; ?></option>
                                       <option value="color_box" disabled="disabled" style="color:red;"><?php echo $gm_color_box; ?></option>
                                       <option value="foo_box_free_edition" selected="selected"><?php echo class_exists("fooboxV2") ? $gm_foo_box_premium : $gm_foo_box_free_edition; ?></option>
                                       <option value="nivo_lightbox" disabled="disabled" style="color:red;"><?php echo $gm_nivo_lightbox; ?></option>
                                    </select>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label">
                                    <?php echo $gm_page_navigation; ?> :
                                    <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_page_navigation_galleries_title; ?>" data-placement="right"></i>
                                    <span class="required" aria-required="true">* <?php echo "( " . $gm_premium_edition . " )"; ?></span>
                                 </label>
                                 <select name="ux_ddl_page_navigation" id="ux_ddl_page_navigation" class="form-control" onchange="show_hide_control_gallery_master('ux_ddl_page_navigation', 'ux_div_masonry_layout_page_navigation'); generate_shortcode_masonry_layout_gallery_master();">
                                    <option value="disable"><?php echo $gm_disable; ?></option>
                                    <option value="enable" disabled="disabled"><?php echo $gm_enable; ?></option>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="form-group" id="ux_div_masonry_layout_page_navigation" style="display:none;">
                           <label class="control-label">
                              <?php echo $gm_no_of_image_per_page_title; ?> :
                              <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_no_of_image_per_page_tooltip; ?>" data-placement="right"></i>
                              <span class="required" aria-required="true">*</span>
                           </label>
                           <input type="text" class="form-control" name="ux_txt_images_per_page" id="ux_txt_images_per_page" value="10" maxlength="3" onkeypress="only_digits_gallery_master(event);" onfocus="paste_prevent_gallery_master(this.id);" onblur="default_value_gallery_master('#ux_txt_images_per_page', 10); generate_shortcode_masonry_layout_gallery_master();" placeholder="<?php echo $gm_no_of_image_per_page_placeholder; ?>">
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label">
                                    <?php echo $gm_gallery_title; ?> :
                                    <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_gallery_title_tooltip; ?>" data-placement="right"></i>
                                    <span class="required" aria-required="true">*</span>
                                 </label>
                                 <select id="ux_ddl_gallery_title" name="ux_ddl_gallery_title" class="form-control" onchange="generate_shortcode_masonry_layout_gallery_master();">
                                    <option value="show"><?php echo $gm_show; ?></option>
                                    <option value="hide"><?php echo $gm_hide; ?></option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label">
                                    <?php echo $gm_gallery_description_title ?> :
                                    <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_gallery_description_tooltip; ?>" data-placement="right"></i>
                                    <span class="required" aria-required="true">*</span>
                                 </label>
                                 <div class="input-icon right">
                                    <select name="ux_ddl_gallery_description" id="ux_ddl_gallery_description" class="form-control" onchange="generate_shortcode_masonry_layout_gallery_master();">
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
                                    <span class="required" aria-required="true">*</span>
                                 </label>
                                 <select id="ux_ddl_thumbnail_title" name="ux_ddl_thumbnail_title" class="form-control" onchange="generate_shortcode_masonry_layout_gallery_master();">
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
                                    <span class="required" aria-required="true">*</span>
                                 </label>
                                 <div class="input-icon right">
                                    <select name="ux_ddl_thumbnail_description" id="ux_ddl_thumbnail_description" class="form-control" onchange="generate_shortcode_masonry_layout_gallery_master();">
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
                                    <span class="required" aria-required="true">* <?php echo "( " . $gm_premium_edition . " )"; ?></span>
                                 </label>
                                 <select name="ux_ddl_sort_image_by" id="ux_ddl_sort_image_by" class="form-control" onchange="generate_shortcode_masonry_layout_gallery_master();">
                                    <option value="image_title" disabled="disabled"><?php echo $gm_title; ?></option>
                                    <option value="upload_date" disabled="disabled"><?php echo $gm_date; ?></option>
                                    <option value="image_name" disabled="disabled"><?php echo $gm_filename; ?></option>
                                    <option value="file_type" disabled="disabled"><?php echo $gm_type; ?></option>
                                    <option value="sort_order" selected="selected"><?php echo $gm_custom_order; ?></option>
                                    <option value="random_order" disabled="disabled"><?php echo $gm_random_order; ?></option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label">
                                    <?php echo $gm_order_by_title; ?> :
                                    <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_order_by_tooltip; ?>" data-placement="right"></i>
                                    <span class="required" aria-required="true">* <?php echo "( " . $gm_premium_edition . " )"; ?></span>
                                 </label>
                                 <select name="ux_ddl_order_images" id="ux_ddl_order_images" class="form-control" onchange="generate_shortcode_masonry_layout_gallery_master();">
                                    <option value="sort_asc"><?php echo $gm_ascending; ?></option>
                                    <option value="sort_desc" disabled="disabled"><?php echo $gm_descending; ?></option>
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
                                    <span class="required" aria-required="true">* <?php echo "( " . $gm_premium_edition . " )"; ?></span>
                                 </label>
                                 <div class="input-icon right">
                                    <select name="ux_ddl_lazy_load" id="ux_ddl_lazy_load" class="form-control" onchange="generate_shortcode_masonry_layout_gallery_master();">
                                       <option value="disable"><?php echo $gm_disable; ?></option>
                                       <option value="enable" disabled="disabled"><?php echo $gm_enable; ?></option>
                                    </select>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label">
                                    <?php echo $gm_filters; ?> :
                                    <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_filters_tooltip; ?>" data-placement="right"></i>
                                    <span class="required" aria-required="true">* <?php echo "( " . $gm_premium_edition . " )"; ?></span>
                                 </label>
                                 <div class="input-icon right">
                                    <select name="ux_ddl_filters" id="ux_ddl_filters" class="form-control" onchange="generate_shortcode_masonry_layout_gallery_master();">
                                       <option value="disable"><?php echo $gm_disable; ?></option>
                                       <option value="enable" disabled="disabled"><?php echo $gm_enable; ?></option>
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
                                    <span class="required" aria-required="true">* <?php echo "( " . $gm_premium_edition . " )"; ?></span>
                                 </label>
                                 <div class="input-icon right">
                                    <select name="ux_ddl_order_by" id="ux_ddl_order_by" class="form-control" onchange="generate_shortcode_masonry_layout_gallery_master();">
                                       <option value="disable"><?php echo $gm_disable; ?></option>
                                       <option value="enable" disabled="disabled"><?php echo $gm_enable; ?></option>
                                    </select>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label">
                                    <?php echo $global_option_search_box; ?> :
                                    <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_global_option_search_box_tooltip; ?>" data-placement="right"></i>
                                    <span class="required" aria-required="true">* <?php echo "( " . $gm_premium_edition . " )"; ?></span>
                                 </label>
                                 <div class="input-icon right">
                                    <select name="ux_ddl_search_box" id="ux_ddl_search_box" class="form-control" onchange="generate_shortcode_masonry_layout_gallery_master();">
                                       <option value="disable"><?php echo $gm_disable; ?></option>
                                       <option value="enable" disabled="disabled"><?php echo $gm_enable; ?></option>
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
                                       <span class="required" aria-required="true">* <?php echo "( " . $gm_premium_edition . " )"; ?></span>
                                    </label>
                                    <select id="ux_ddl_animation_effect" name="ux_ddl_animation_effect" class="form-control" onchange="generate_shortcode_masonry_layout_gallery_master();">
                                       <option value="none"><?php echo $gm_none; ?></option>
                                       <optgroup label="<?php echo $gm_magic_effect; ?>">
                                          <option value="twisterInDown" disabled="disabled"><?php echo $gm_twister_in_down; ?></option>
                                          <option value="twisterInUp" disabled="disabled"><?php echo $gm_twister_in_up; ?></option>
                                          <option value="swap" disabled="disabled"><?php echo $gm_swap; ?></option>
                                       </optgroup>
                                       <optgroup label="<?php echo $gm_bling; ?>">
                                          <option value="puffIn" disabled="disabled"><?php echo $gm_puff_in; ?></option>
                                          <option value="vanishIn" disabled="disabled"><?php echo $gm_vanish_in; ?></option>
                                       </optgroup>
                                       <optgroup label="<?php echo $gm_static_effect; ?>">                                                       
                                          <option value="openDownLeftReturn" disabled="disabled"><?php echo $gm_open_down_left_return; ?></option>
                                          <option value="openDownRightReturn" disabled="disabled"><?php echo $gm_open_down_right_return; ?></option>
                                          <option value="openUpLeftReturn" disabled="disabled"><?php echo $gm_open_up_left_return; ?></option>
                                          <option value="openUpRightReturn" disabled="disabled"><?php echo $gm_open_up_right_return; ?></option>
                                       </optgroup>
                                       <optgroup label="<?php echo $gm_perspective; ?>">
                                          <option value="perspectiveDownReturn" disabled="disabled"><?php echo $gm_perspective_down_return; ?></option>
                                          <option value="perspectiveUpReturn" disabled="disabled"><?php echo $gm_perspective_up_return; ?></option>
                                          <option value="perspectiveLeftReturn" disabled="disabled"><?php echo $gm_perspective_left_return; ?></option>
                                          <option value="perspectiveRightReturn" disabled="disabled"><?php echo $gm_perspective_right_return; ?></option>
                                       </optgroup>
                                       <optgroup label="<?php echo $gm_slide; ?>">
                                          <option value="slideDownReturn" disabled="disabled"><?php echo $gm_slide_down_return; ?></option>
                                          <option value="slideUpReturn" disabled="disabled"><?php echo $gm_slide_up_return; ?></option>
                                          <option value="slideLeftReturn" disabled="disabled"><?php echo $gm_slide_left_return; ?></option>
                                          <option value="slideRightReturn" disabled="disabled"><?php echo $gm_slide_right_return; ?></option>
                                       </optgroup>
                                       <optgroup label="<?php echo $gm_math; ?>">
                                          <option value="swashIn" disabled="disabled"><?php echo $gm_swash_in; ?></option>
                                          <option value="foolishIn" disabled="disabled"><?php echo $gm_foolish_in; ?></option>
                                       </optgroup>
                                       <optgroup label="<?php echo $gm_tin; ?>">
                                          <option value="tinRightIn" disabled="disabled"><?php echo $gm_tin_right_in; ?></option>
                                          <option value="tinLeftIn" disabled="disabled"><?php echo $gm_tin_left_in; ?></option>
                                       </optgroup>
                                       <optgroup label="<?php echo $gm_boing; ?>">
                                          <option value="boingInUp" disabled="disabled"><?php echo $gm_boing_in_up; ?></option>
                                       </optgroup>
                                       <optgroup label="<?php echo $gm_on_the_space; ?>">
                                          <option value="spaceInUp" disabled="disabled"><?php echo $gm_space_in_up; ?></option>
                                          <option value="spaceInRight" disabled="disabled"><?php echo $gm_space_in_right; ?></option>
                                          <option value="spaceInDown" disabled="disabled"><?php echo $gm_space_in_down; ?></option>
                                          <option value="spaceInLeft" disabled="disabled"><?php echo $gm_space_in_left; ?></option>                                                        
                                       </optgroup>
                                       <optgroup label="<?php echo $gm_attention_seekers; ?>">
                                          <option value="bounce" disabled="disabled"><?php echo $gm_bounce; ?></option>
                                          <option value="flash" disabled="disabled"><?php echo $gm_flash; ?></option>
                                          <option value="pulse" disabled="disabled"><?php echo $gm_pulse; ?></option>
                                          <option value="rubberBand" disabled="disabled"><?php echo $gm_rubber_band; ?></option>
                                          <option value="shake" disabled="disabled"><?php echo $gm_shake; ?></option>
                                          <option value="swing" disabled="disabled"><?php echo $gm_swing; ?></option>
                                          <option value="tada" disabled="disabled"><?php echo $gm_tada; ?></option>
                                          <option value="wobble" disabled="disabled"><?php echo $gm_wobble; ?></option>
                                          <option value="jello" disabled="disabled"><?php echo $gm_jello; ?></option>
                                       </optgroup>
                                       <optgroup label="<?php echo $gm_bouncing_entrances; ?>">
                                          <option value="bounceIn" disabled="disabled"><?php echo $gm_bounce_in; ?></option>
                                          <option value="bounceInDown" disabled="disabled"><?php echo $gm_bounce_in_down; ?></option>
                                          <option value="bounceInLeft" disabled="disabled"><?php echo $gm_bounce_in_left; ?></option>
                                          <option value="bounceInRight"  disabled="disabled"><?php echo $gm_bounce_in_right; ?></option>
                                          <option value="bounceInUp" disabled="disabled"><?php echo $gm_bounce_in_up; ?></option>
                                       </optgroup>
                                       <optgroup label="<?php echo $gm_fading_entrances; ?>">
                                          <option value="fadeIn" selected="selected"><?php echo $gm_fade_in; ?></option>
                                          <option value="fadeInDown" disabled="disabled"><?php echo $gm_fade_in_down; ?></option>
                                          <option value="fadeInLeft" disabled="disabled"><?php echo $gm_fade_in_left; ?></option>
                                          <option value="fadeInLeftBig" disabled="disabled"><?php echo $gm_fade_in_left_big; ?></option>
                                          <option value="fadeInRight" disabled="disabled"><?php echo $gm_fade_in_right; ?></option>
                                          <option value="fadeInRightBig" disabled="disabled"><?php echo $gm_fade_in_right_big; ?></option>
                                          <option value="fadeInUp" disabled="disabled"><?php echo $gm_fade_in_up; ?></option>
                                       </optgroup>
                                       <optgroup label="<?php echo $gm_flippers; ?>">
                                          <option value="flip" disabled="disabled"><?php echo $gm_flip; ?></option>
                                          <option value="flipInX" disabled="disabled"><?php echo $gm_flip_in_x; ?></option>
                                          <option value="flipInY" disabled="disabled"><?php echo $gm_flip_in_y; ?></option>
                                       </optgroup>
                                       <optgroup label="<?php echo $gm_lightspeed; ?>">
                                          <option value="lightSpeedIn" disabled="disabled"><?php echo $gm_light_speed_in; ?></option>
                                       </optgroup>
                                       <optgroup label="<?php echo $gm_rotating_entrances; ?>">
                                          <option value="rotateIn" disabled="disabled"><?php echo $gm_rotate_in; ?></option>
                                          <option value="rotateInDownLeft" disabled="disabled"><?php echo $gm_rotate_in_down_left; ?></option>
                                          <option value="rotateInDownRight" disabled="disabled"><?php echo $gm_rotate_in_down_right; ?></option>
                                          <option value="rotateInUpLeft" disabled="disabled"><?php echo $gm_rotate_in_up_left; ?></option>
                                          <option value="rotateInUpRight" disabled="disabled"><?php echo $gm_rotate_in_up_right; ?></option>
                                       </optgroup>
                                       <optgroup label="<?php echo $gm_sliding_entrances; ?>">
                                          <option value="slideInUp" disabled="disabled"><?php echo $gm_slide_in_up; ?></option>
                                          <option value="slideInDown" disabled="disabled"><?php echo $gm_slide_in_down; ?></option>
                                          <option value="slideInLeft" disabled="disabled"><?php echo $gm_slide_in_left; ?></option>
                                          <option value="slideInRight" disabled="disabled"><?php echo $gm_slide_in_right; ?></option>
                                       </optgroup>
                                       <optgroup label="<?php echo $gm_zoom_entrances; ?>">
                                          <option value="zoomIn" disabled="disabled"><?php echo $gm_zoom_in; ?></option>
                                          <option value="zoomInDown" disabled="disabled"><?php echo $gm_zoom_in_down; ?></option>
                                          <option value="zoomInLeft" disabled="disabled"><?php echo $gm_zoom_in_left; ?></option>
                                          <option value="zoomInRight" disabled="disabled"><?php echo $gm_zoom_in_right; ?></option>
                                          <option value="zoomInUp" disabled="disabled"><?php echo $gm_zoom_in_up; ?></option>
                                       </optgroup>
                                       <optgroup label="<?php echo $gm_specials; ?>">
                                          <option value="rollIn" disabled="disabled"><?php echo $gm_roll_in; ?></option>
                                       </optgroup>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label class="control-label">
                                       <?php echo $gm_special_effect_title; ?> :
                                       <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_special_effect_tooltip; ?>" data-placement="right"></i>
                                       <span class="required" aria-required="true">* <?php echo "( " . $gm_premium_edition . " )"; ?></span>
                                    </label>
                                    <div class="input-icon right">
                                       <select id="ux_ddl_special_effects" name="ux_ddl_special_effects" class="form-control" onchange="generate_shortcode_masonry_layout_gallery_master();">
                                          <option value="none"><?php echo $gm_none; ?></option>
                                          <option value="blur" disabled="disabled"><?php echo $gm_blur; ?></option>
                                          <option value="sepia" disabled="disabled"><?php echo $gm_sepia; ?></option>
                                          <option value="brightness" disabled="disabled"><?php echo $gm_brightness; ?></option>
                                          <option value="contrast" disabled="disabled"><?php echo $gm_contrast; ?></option>
                                          <option value="invert" disabled="disabled"><?php echo $gm_invert; ?></option>
                                          <option value="saturate" disabled="disabled"><?php echo $gm_saturate; ?></option>
                                          <option value="grayscale" disabled="disabled"><?php echo $gm_grayscale; ?></option>
                                          <option value="hue-rotate" disabled="disabled"><?php echo $gm_hue_rotate; ?></option>
                                       </select>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div id="ux_div_shortcode" class="ux_div_shortcode" style="display: none;">
                           <div class="form-group">
                              <label class="control-label">
                                 <?php echo $gm_shortcode_title; ?> :
                                 <i class="icon-custom-question tooltips" data-original-title="<?php echo $gm_shortcode_tooltip; ?>" data-placement="right"></i>
                                 <span class="required" aria-required="true">*</span>
                              </label>
                              <div class="icon-custom-docs tooltips pull-right" style="font-size:18px;" data-original-title="<?php echo $gm_copy_to_clipboard; ?>" data-placement="left" data-clipboard-action="copy" data-clipboard-target="#ux_txtarea_generate_shortcodes"></div>
                              <textarea class="form-control ux_txtarea_generate_shortcode" readonly="ture" name="ux_txtarea_generate_shortcodes" id="ux_txtarea_generate_shortcodes" rows="4"></textarea>
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
                  <?php echo $gm_masonry_layout; ?>
               </span>
            </li>
         </ul>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="portlet box vivid-green">
               <div class="portlet-title">
                  <div class="caption">
                     <i class="icon-custom-energy"></i>
                     <?php echo $gm_masonry_layout; ?>
                  </div>
               </div>
               <div class="portlet-body form">
                  <form id="ux_frm_masonry_layout">
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