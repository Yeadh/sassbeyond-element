<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
// blog
class sassbeyond_Widget_Blog extends Widget_Base {
 
   public function get_name() {
      return 'blog';
   }
 
   public function get_title() {
      return esc_html__( 'Latest Blog', 'sassbeyond' );
   }
 
   public function get_icon() { 
        return 'eicon-posts-carousel';
   }
 
   public function get_categories() {
      return [ 'sassbeyond-elements' ];
   }
   protected function _register_controls() {
      $this->start_controls_section(
         'blog_section',
         [
            'label' => esc_html__( 'Blog', 'sassbeyond' ),
            'type' => Controls_Manager::SECTION,
         ]
      );
      $this->add_control(
         'order',
         [
            'label' => __( 'Order', 'sassbeyond' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'ASC',
            'options' => [
               'ASC'  => __( 'Ascending', 'sassbeyond' ),
               'DESC' => __( 'Descending', 'sassbeyond' )
            ],
         ]
      );
      $this->end_controls_section();
   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display();
      
      //Inline Editing
      $this->add_inline_editing_attributes( 'ppp', 'basic' );
      ?>

      <div class="container">
         <div class="row justify-content-center">
               <?php
               $blog = new \WP_Query( array( 
                  'post_type' => 'post',
                  'posts_per_page' => 3,
                  'ignore_sticky_posts' => true,
                  'order' => $settings['order'],
               ));
               /* Start the Loop */
               while ( $blog->have_posts() ) : $blog->the_post();
               ?>

               <div class="col-lg-4 col-md-6">
                   <div class="single-blog mb-50">
                       <div class="s-blog-thumb p-relative">
                           <a href="<?php the_permalink() ?>"><img src="<?php echo get_the_post_thumbnail_url( get_the_ID(),'sassbeyond-360-200'); ?>" alt="<?php the_title() ?>"></a>

                           <?php

                           $posttags = get_the_tags();
                           if ($posttags) {
                             foreach($posttags as $tag) {
                               echo '<a href="' . get_tag_link($tag->term_id) . '" class="b-tag">' .$tag->name. '</a>'; 
                             }
                           }
                           ?>
                       </div>
                       <div class="s-blog-content">
                           <span><?php echo get_the_time() ?></span>
                           <h4><a href="#"><?php the_title() ?></a></h4>
                           <a href="<?php the_permalink() ?>"><?php echo esc_html__( 'Read more', 'sassbeyond' ) ?> <i class="arrow_right"></i></a>
                       </div>
                   </div>
               </div>
               <?php 
               endwhile; 
            wp_reset_postdata();
            ?>
         </div>
      </div>

      <?php
   }
 
}
Plugin::instance()->widgets_manager->register_widget_type( new sassbeyond_Widget_Blog );