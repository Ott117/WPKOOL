<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package VW Automobile Lite
 */
?>
<div  id="footer" class="copyright-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3">
                <?php dynamic_sidebar('footer-1');?>
            </div>
            <div class="col-md-3 col-sm-3">
                <?php dynamic_sidebar('footer-2');?>
            </div>
            <div class="col-md-3 col-sm-3">
                <?php dynamic_sidebar('footer-3');?>
            </div>
            <div class="col-md-3 col-sm-3">
                <?php dynamic_sidebar('footer-4');?>
            </div>
        </div>
    </div>
</div>

<div id="footer-2" class="inner">
  	<div class="copyright text-center">
        <p><?php echo esc_html(vw_automobile_lite_credit1(),'vw-automobile-lite'); ?> <?php echo esc_html(get_theme_mod('vw_automobile_lite_footer_copy',__('By','vw-automobile-lite'))); ?> <?php echo esc_html(vw_automobile_lite_credit(),'vw-automobile-lite'); ?></p>
  	</div>
  	<div class="clear"></div>
</div>

  <?php wp_footer(); ?>
  </body>
</html>