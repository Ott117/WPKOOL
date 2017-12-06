<?php
/**
 * Template for adding a New Tag or Modifying an Existing Tag.
 *
 * @author 	Tech Banker
 * @package 	gallery-master/views/tags
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
   } else if (tags_gallery_master == "1") {
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
               <a href="admin.php?page=gm_manage_tags">
                  <?php echo $gm_tags; ?>
               </a>
               <span>></span>
            </li>
            <li>
               <span>
                  <?php echo $gm_manage_tags; ?>
               </span>
            </li>
         </ul>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="portlet box vivid-green">
               <div class="portlet-title">
                  <div class="caption">
                     <i class="icon-custom-tag"></i>
                     <?php echo $gm_manage_tags; ?>
                  </div>
                  <p class="premium-editions">
                     <?php echo $gm_upgrade_need_help ?><a href="<?php echo tech_banker_gallery_url; ?>" target="_blank" class="premium-editions-documentation"><?php echo $gm_documentation ?></a><?php echo $gm_read_and_check; ?><a href="<?php echo tech_banker_gallery_url; ?>frontend-demos/" target="_blank" class="premium-editions-documentation"><?php echo $gm_demos_section; ?></a>
                  </p>
               </div>
               <div class="portlet-body form">
                  <form id="ux_frm_add_tag">
                     <div class="form-body">
                        <div class="table-top-margin">
                           <select name="ux_ddl_manage_tags" id="ux_ddl_manage_tags">
                              <option value=""><?php echo $gm_bulk_action; ?></option>
                              <option value="delete" style="color:red;"><?php echo $gm_delete . " ( " . $gm_premium_edition . " )"; ?></option>
                           </select>
                           <input type="button" class="btn vivid-green" name="ux_btn_apply_manage_tags" id="ux_btn_apply_manage_tags" value="<?php echo $gm_apply; ?>" onclick='premium_edition_notification_gallery_master();'>
                           <a href="admin.php?page=gm_add_tag" class="btn vivid-green"><?php echo $gm_add_tag; ?></a>
                        </div>
                        <div class="line-separator"></div>
                        <table class="table table-striped table-bordered table-hover table-margin-top" id="ux_tbl_manage_tags">
                           <thead>
                              <tr>
                                 <th style="width: 4%; text-align:center;" class="chk-action">
                                    <input type="checkbox" class="custom-chkbox-operation" name="ux_chk_all" id="ux_chk_all">
                                 </th>
                                 <th class="custom-gallery-title">
                                    <label class="control-label">
                                       <?php echo $gm_tag_name_title; ?>
                                    </label>
                                 </th>
                                 <th class="custom-gallery-description">
                                    <label class="control-label">
                                       <?php echo $gm_tag_description_title; ?>
                                    </label>
                                 </th>
                                 <th>
                                    <label class="control-label">
                                       <?php echo $gm_status; ?>
                                    </label>
                                 </th>
                                 <th class="chk-action" style="text-align:center; width: 10%;">
                                    <label class="control-label">
                                       <?php echo $gm_action; ?>
                                    </label>
                                 </th>
                              </tr>
                           </thead>
                           <tbody>
                           </tbody>
                        </table>
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
               <a href="admin.php?page=gm_manage_tags">
                  <?php echo $gm_tags; ?>
               </a>
               <span>></span>
            </li>
            <li>
               <span>
                  <?php echo $gm_manage_tags; ?>
               </span>
            </li>
         </ul>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="portlet box vivid-green">
               <div class="portlet-title">
                  <div class="caption">
                     <i class="icon-custom-tag"></i>
                     <?php echo $gm_manage_tags; ?>
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