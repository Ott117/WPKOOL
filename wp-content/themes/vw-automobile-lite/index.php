<?php
/**
 * The template for displaying home page.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package VW Automobile Lite
 */

get_header();

?>
<div class="container">
  <div class="middle-align">
    <?php
        $left_right = get_theme_mod( 'vw_automobile_lite_theme_options','One Column');
        if($left_right == 'Left Sidebar'){ ?>
        <div class="col-md-4" id="sidebar"><?php dynamic_sidebar('sidebar-1');?></div>
        <section id="our-services" class="services col-md-8">
                  
          <?php if ( have_posts() ) :
            /* Start the Loop */
              
              while ( have_posts() ) : the_post();

                get_template_part( 'template-parts/content' ); 
              
              endwhile;

              else :

                get_template_part( 'no-results', 'archive' ); 

              endif; 
          ?>
          <div class="navigation">
            <?php
                // Previous/next page navigation.
                the_posts_pagination( array(
                    'prev_text'          => __( 'Previous page', 'vw-automobile-lite' ),
                    'next_text'          => __( 'Next page', 'vw-automobile-lite' ),
                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'vw-automobile-lite' ) . ' </span>',
                ) );
            ?>
              <div class="clearfix"></div>
          </div>
        </section>
        <div class="clearfix"></div>
    <?php }else if($left_right == 'Right Sidebar'){ ?>
        <section id="our-services" class="services flipInX col-md-8">
                    
          <?php if ( have_posts() ) :
            /* Start the Loop */
              
              while ( have_posts() ) : the_post();

                get_template_part( 'template-parts/content' ); 
              
              endwhile;

              else :

                get_template_part( 'no-results', 'archive' ); 

              endif; 
          ?>
          <div class="navigation">
            <?php
                // Previous/next page navigation.
                the_posts_pagination( array(
                    'prev_text'          => __( 'Previous page', 'vw-automobile-lite' ),
                    'next_text'          => __( 'Next page', 'vw-automobile-lite' ),
                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'vw-automobile-lite' ) . ' </span>',
                ) );
            ?>
              <div class="clearfix"></div>
          </div>
        </section>
        <div class="col-md-4" id="sidebar"><?php dynamic_sidebar('sidebar-1');?></div>
    <?php }else if($left_right == 'One Column'){ ?>
        <section id="our-services" class="services flipInX col-md-12">
                    
          <?php if ( have_posts() ) :
            /* Start the Loop */
              
              while ( have_posts() ) : the_post();

                get_template_part( 'template-parts/content' ); 
              
              endwhile;

              else :

                get_template_part( 'no-results', 'archive' ); 

              endif; 
          ?>
          <div class="navigation">
            <?php
                // Previous/next page navigation.
                the_posts_pagination( array(
                    'prev_text'          => __( 'Previous page', 'vw-automobile-lite' ),
                    'next_text'          => __( 'Next page', 'vw-automobile-lite' ),
                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'vw-automobile-lite' ) . ' </span>',
                ) );
            ?>
              <div class="clearfix"></div>
          </div>
        </section>
    <?php }else if($left_right == 'Three Columns'){ ?>
        <div class="col-md-3" id="sidebar"><?php dynamic_sidebar('sidebar-1');?></div>
        <section id="our-services" class="services col-md-6">
                    
          <?php if ( have_posts() ) :
            /* Start the Loop */
              
              while ( have_posts() ) : the_post();

                get_template_part( 'template-parts/content' ); 
              
              endwhile;

              else :

                get_template_part( 'no-results', 'archive' ); 

              endif; 
          ?>
          <div class="navigation">
            <?php
                // Previous/next page navigation.
                the_posts_pagination( array(
                    'prev_text'          => __( 'Previous page', 'vw-automobile-lite' ),
                    'next_text'          => __( 'Next page', 'vw-automobile-lite' ),
                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'vw-automobile-lite' ) . ' </span>',
                ) );
            ?>
              <div class="clearfix"></div>
          </div>
        </section>
        <div class="col-md-3" id="sidebar"><?php dynamic_sidebar('sidebar-2');?></div>
    <?php }else if($left_right == 'Four Columns'){ ?>
        <div class="col-md-3" id="sidebar"><?php dynamic_sidebar('sidebar-1');?></div>
        <section id="our-services" class="services col-md-3">
                    
          <?php if ( have_posts() ) :
            /* Start the Loop */
              
              while ( have_posts() ) : the_post();

                get_template_part( 'template-parts/content' ); 
              
              endwhile;

              else :

                get_template_part( 'no-results', 'archive' ); 

              endif; 
          ?>
          <div class="navigation">
            <?php
                // Previous/next page navigation.
                the_posts_pagination( array(
                    'prev_text'          => __( 'Previous page', 'vw-automobile-lite' ),
                    'next_text'          => __( 'Next page', 'vw-automobile-lite' ),
                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'vw-automobile-lite' ) . ' </span>',
                ) );
            ?>
              <div class="clearfix"></div>
          </div>
        </section>
        <div class="col-md-3" id="sidebar"><?php dynamic_sidebar('sidebar-2');?></div>
        <div class="col-md-3" id="sidebar"><?php dynamic_sidebar('sidebar-3');?></div>
    <?php }else if($left_right == 'Grid Layout'){ ?>
        <section id="our-services" class="services flipInX col-md-9">
                    
          <?php if ( have_posts() ) :
            /* Start the Loop */
              
              while ( have_posts() ) : the_post();

                get_template_part( 'template-parts/grid-layout' ); 
              
              endwhile;

              else :

                get_template_part( 'no-results', 'archive' ); 

              endif; 
          ?>
          <div class="navigation">
            <?php
                // Previous/next page navigation.
                the_posts_pagination( array(
                    'prev_text'          => __( 'Previous page', 'vw-automobile-lite' ),
                    'next_text'          => __( 'Next page', 'vw-automobile-lite' ),
                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'vw-automobile-lite' ) . ' </span>',
                ) );
            ?>
              <div class="clearfix"></div>
          </div>
        </section>
        <div class="col-md-3" id="sidebar"><?php dynamic_sidebar('sidebar-1');?></div>
    <?php } ?>
    <div class="clearfix"></div>
  </div>
</div>


<?php get_footer(); ?>