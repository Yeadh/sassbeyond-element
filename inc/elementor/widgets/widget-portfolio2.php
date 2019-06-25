<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// portfolio
class sassbeyond_Widget_Portfolio2 extends Widget_Base {
 
   public function get_name() {
      return 'portfolio2';
   }
 
   public function get_title() {
      return esc_html__( 'Portfolio 2', 'sassbeyond' );
   }
 
   public function get_icon() { 
        return 'eicon-gallery-masonry';
   }
 
   public function get_categories() {
      return [ 'sassbeyond-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'portfolio_section',
         [
            'label' => esc_html__( 'Portfolio 2', 'sassbeyond' ),
            'type' => Controls_Manager::SECTION,
         ]
      );

      $this->add_control(
         'sub-title',
         [
            'label' => __( 'Title', 'sassbeyond' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'Projects',
         ]
      );

      $this->add_control(
         'title',
         [
            'label' => __( 'Title', 'sassbeyond' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'Check our portfolios',
         ]
      );

      $this->add_control(
         'ppp',
         [
            'label' => __( 'Number of Portfolio', 'sassbeyond' ),
            'type' => Controls_Manager::SLIDER,
            'range' => [
               'no' => [
                  'min' => 0,
                  'max' => 100,
                  'step' => 1,
               ],
            ],
            'default' => [
               'size' => 5,
            ]
         ]
      );

      $this->add_control(
         'url',
         [
            'label' => __( 'URL', 'sassbeyond' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '#',
         ]
      );

      $this->end_controls_section();

   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display();
      
      //Inline Editing
      $this->add_inline_editing_attributes( 'ppp', 'basic' );
      $this->add_inline_editing_attributes( 'sub-title', 'basic' );
      $this->add_inline_editing_attributes( 'title', 'basic' );
      $this->add_inline_editing_attributes( 'url', 'basic' );
      ?>

      <div class="portfolio-container">
         <div class="row swiper-title">
            <div class="col-xl-3 col-md-12">
               <div class="section-title color" style="text-align: left">
                 <span><?php echo esc_html( $settings['sub-title'] ); ?></span>
                 <h1><?php echo esc_html( $settings['title'] ); ?></h1>
              </div>
            </div>
            <div class="col-xl-4">
               <div class="swiper-pagination"></div>
            </div>
            <div class="col-xl-2">
               <div class="sassbeyond-btn">
                  <a href="<?php echo esc_url( $settings['view-all-url'] ); ?>">View gallery</a>
               </div>
            </div>
         </div>
         <div class="portfolio-2 swiper-wrapper">
            <?php
            $portfolio = new \WP_Query( array(
            'post_type' => 'portfolio',
            'posts_per_page' => $settings['ppp']['size']
            ));
            /* Start the Loop */
            while ( $portfolio->have_posts() ) : $portfolio->the_post();
            $portfolio_terms = get_the_terms( get_the_ID() , 'portfolio_category' );
            ?>

            <div class="portfolio-item-2 swiper-slide">
               <a href="<?php the_permalink(); ?>">
                  <?php the_post_thumbnail('sassbeyond-470-470'); ?>
                  <h5><?php echo wp_trim_words( get_the_title(), 3, '...' );?></h5>
               </a>
            </div>

            <?php endwhile; wp_reset_postdata(); ?> 
         </div>
      </div>
      <?php }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new sassbeyond_Widget_Portfolio2 );