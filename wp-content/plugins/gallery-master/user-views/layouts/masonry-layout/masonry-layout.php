<?php
/**
 * This file is used for Masonry Layout.
 *
 * @author	Tech Banker
 * @package	gallery-master/user-views/layouts
 * @version	2.0.0
 */
if (!defined("ABSPATH")) {
   exit;
} // Exit if accessed directly
?>
<div id="control_container_<?php echo $random; ?>" class="masonry_grid_layout_container">
   <?php
   if (isset($gallery_image_detail_only_included_images)) {
      if (count($gallery_image_detail_only_included_images) > 0) {
         foreach ($gallery_image_detail_only_included_images as $pic) {
            ?>
            <div id="grid_wrapper_item_<?php echo $random . "_" . $pic["id"]; ?>" class="masonry_grid_wrapper_item gm_animate" data-animate="<?php echo isset($animation_effects) ? $animation_effects : 'none'; ?>"  data-duration="1.0s" data-delay="0.1s" data-offset="100">
               <div id="grid_item_image_<?php echo $random . "_" . $pic["id"]; ?>" class="masonry_grid_item_image_<?php echo $random; ?>">
                  <?php
                  if ($pic["file_type"] == "image") {
                     $filename_thumbs = GALLERY_MASTER_THUMBS_NON_CROPPED_URL . $pic["image_name"];
                     $filename_original_path = GALLERY_MASTER_ORIGINAL_URL . $pic["image_name"];
                     if (!file_exists(GALLERY_MASTER_THUMBS_NON_CROPPED_DIR . $pic["image_name"])) {
                        if (strpos($pic["image_name"], ".") !== false) {
                           $filename_actual = explode(".", $pic["image_name"]);
                           $filename_thumbs = GALLERY_MASTER_THUMBS_NON_CROPPED_URL . $filename_actual[0] . "." . strtoupper($filename_actual[1]);
                           $filename_original_path = GALLERY_MASTER_ORIGINAL_URL . $filename_actual[0] . "." . strtoupper($filename_actual[1]);
                        } else {
                           $filename_thumbs = GALLERY_MASTER_PLUGIN_DIR_URL . "/assets/admin/images/gallery-cover.png";
                           $filename_original_path = GALLERY_MASTER_PLUGIN_DIR_URL . "/assets/admin/images/gallery-cover.png";
                        }
                     }
                  }
                  $no_lightbox_imageurl = isset($pic["enable_redirect"]) && $pic["enable_redirect"] != "1" ? "" : (isset($pic["redirect_url"]) ? esc_attr($pic["redirect_url"]) : "");
                  $enable_redirect = $pic["enable_redirect"];
                  $imageurl = isset($pic["enable_redirect"]) && $pic["enable_redirect"] != "1" ? $filename_original_path : (isset($pic["redirect_url"]) ? esc_attr($pic["redirect_url"]) : "");
                  $foobox_imageurl = isset($pic["enable_redirect"]) && $pic["enable_redirect"] != "0" && $pic["enable_redirect"] != "" ? esc_attr($pic["redirect_url"]) : ($pic["file_type"] == "image" ? $filename_original_path : "");
                  $target = isset($pic["enable_redirect"]) && $pic["enable_redirect"] != "0" && $pic["enable_redirect"] != "" ? '_blank' : '';
                  if (isset($lightbox_type)) {
                     switch ($lightbox_type) {
                        case "no_lightbox" :
                           if ($enable_redirect == "1") {
                              ?>
                              <a href="<?php echo $no_lightbox_imageurl; ?>" target="<?php echo $target; ?>">
                                 <?php
                              }
                              break;
                           case "foo_box_free_edition":
                              if ($pic["image_title"] == "" && $pic["image_description"] == "") {
                                 ?>
                                 <a href="<?php echo $foobox_imageurl; ?>" class="foobox" target="<?php echo $target; ?>" rel="foobox_gallery_<?php echo $random; ?>">
                                    <?php
                                 } else if ($pic["image_title"] != "" && $pic["image_description"] == "") {
                                    ?>
                                    <a href="<?php echo $foobox_imageurl; ?>" class="foobox" target="<?php echo $target; ?>" rel="foobox_gallery_<?php echo $random; ?>"  data-caption-title="<<?php echo isset($foobox_meta_data["foo_box_image_title_html_tag"]) ? $foobox_meta_data["foo_box_image_title_html_tag"] : "h1"; ?>><?php echo esc_attr($pic["image_title"]); ?></<?php echo isset($foobox_meta_data["foo_box_image_title_html_tag"]) ? $foobox_meta_data["foo_box_image_title_html_tag"] : "h1"; ?>>">
                                       <?php
                                    } else if ($pic["image_title"] == "" && $pic["image_description"] != "") {
                                       ?>
                                       <a href="<?php echo $foobox_imageurl; ?>" class="foobox" target="<?php echo $target; ?>" rel="foobox_gallery_<?php echo $random; ?>" data-caption-desc="<<?php echo isset($foobox_meta_data["foo_box_image_description_html_tag"]) ? $foobox_meta_data["foo_box_image_description_html_tag"] : "h1"; ?>><?php echo esc_attr($pic["image_description"]); ?></<?php echo isset($foobox_meta_data["foo_box_image_description_html_tag"]) ? $foobox_meta_data["foo_box_image_description_html_tag"] : "h1"; ?>>">
                                          <?php
                                       } else {
                                          ?>
                                          <a href="<?php echo $foobox_imageurl; ?>" class="foobox" target="<?php echo $target; ?>" rel="foobox_gallery_<?php echo $random; ?>"  data-caption-title="<<?php echo isset($foobox_meta_data["foo_box_image_title_html_tag"]) ? $foobox_meta_data["foo_box_image_title_html_tag"] : "h1"; ?>><?php echo esc_attr($pic["image_title"]); ?></<?php echo isset($foobox_meta_data["foo_box_image_title_html_tag"]) ? $foobox_meta_data["foo_box_image_title_html_tag"] : "h1"; ?>>" data-caption-desc="<<?php echo isset($foobox_meta_data["foo_box_image_description_html_tag"]) ? $foobox_meta_data["foo_box_image_description_html_tag"] : "h1"; ?>><?php echo esc_attr($pic["image_description"]); ?></<?php echo isset($foobox_meta_data["foo_box_image_description_html_tag"]) ? $foobox_meta_data["foo_box_image_description_html_tag"] : "h1"; ?>>">
                                             <?php
                                          }
                                          break;
                                    }
                                 }
                                 ?>
                                 <img src="<?php echo $pic["file_type"] == "image" ? $filename_thumbs : esc_attr($pic["video_thumb"]); ?>" alt="<?php echo $pic["alt_text"] ?>" image_full_path="<?php echo $pic["file_type"] == "image" ? $filename_original_path : esc_attr($pic["video_thumb"]); ?>"  id="ux_gm_file_<?php echo $random . "_" . $pic["id"]; ?>" name="ux_gm_file" />
                              </a>
                              </div>
                              <?php
                              if ($pic["image_title"] != "" || $pic["image_description"] != "") {
                                 ?>
                                 <div id="grid_content_item" class="masonry_grid_content_item">
                                    <?php
                                    if ($thumbnail_title == "show" && $pic["image_title"] != "") {
                                       ?>
                                       <div id="grid_single_text_title_<?php echo $random . "_" . $pic["id"]; ?>" class="masonry_grid_single_text_title">
                                          <<?php echo isset($masonry_layout_settings["masonry_layout_thumbnail_title_html_tag"]) ? esc_attr($masonry_layout_settings["masonry_layout_thumbnail_title_html_tag"]) : "h3"; ?>>
                                          <?php echo isset($pic["image_title"]) ? htmlspecialchars_decode($pic["image_title"]) : ""; ?>
                                          </<?php echo isset($masonry_layout_settings["masonry_layout_thumbnail_title_html_tag"]) ? esc_attr($masonry_layout_settings["masonry_layout_thumbnail_title_html_tag"]) : "h3"; ?>>
                                       </div>
                                       <?php
                                    }
                                    if ($thumbnail_description == "show" && $pic["image_description"] != "") {
                                       ?>
                                       <div id="grid_single_text_desc_<?php echo $random . "_" . $pic["id"]; ?>" class="masonry_grid_single_text_desc">
                                          <<?php echo isset($masonry_layout_settings["masonry_layout_thumbnail_description_html_tag"]) ? esc_attr($masonry_layout_settings["masonry_layout_thumbnail_description_html_tag"]) : "p"; ?>>
                                          <?php echo isset($pic["image_description"]) ? htmlspecialchars_decode($pic["image_description"]) : ""; ?>
                                          </<?php echo isset($masonry_layout_settings["masonry_layout_thumbnail_description_html_tag"]) ? esc_attr($masonry_layout_settings["masonry_layout_thumbnail_description_html_tag"]) : "p"; ?>>
                                       </div>
                                       <?php
                                    }
                                    ?>
                                 </div>
                                 <?php
                              }
                              ?>
                              </div>
                              <?php
                           }
                        }
                     }
                     ?>
                     </div>