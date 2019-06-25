<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// portfolio
class sassbeyond_Widget_portfolio3 extends Widget_Base {
 
   public function get_name() {
      return 'portfolio3';
   }
 
   public function get_title() {
      return esc_html__( 'Portfolio 3', 'sassbeyond' );
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
            'label' => esc_html__( 'Portfolio 3', 'sassbeyond' ),
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
         'deacription',
         [
            'label' => __( 'Deacription', 'sassbeyond' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'Lorem ipsum dolor sit amet, consectetur sicing elit, sed do eiusmod tempor incidid ut labore et dolore',
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
      $this->add_inline_editing_attributes( 'deacription', 'basic' );
      $this->add_inline_editing_attributes( 'url', 'basic' );
      ?>

      <div class="container-fluid">
         <div class="portfolio-left">
            <div class="row">
               <div class="col-xl-3 col-md-12">
                  <div class="section-title">
                     <span><?php echo esc_html( $settings['sub-title'] ); ?></span>
                     <h1><?php echo esc_html( $settings['title'] ); ?></h1>
                     <p><?php echo esc_html( $settings['deacription'] ); ?></p>
                     <div class="sassbeyond-btn">
                        <a href="<?php echo esc_url( $settings['url'] ); ?>">View gallery</a>
                     </div>
                  </div>
               </div>
               <div class="col-xl-9 col-md-12">
                  <div class="portfolio-3">
                     <?php
                     $portfolio = new \WP_Query( array(
                     'post_type' => 'portfolio',
                     'posts_per_page' => $settings['ppp']['size']
                     ));

                     while ( $portfolio->have_posts() ) : $portfolio->the_post(); ?>

                     <div class="portfolio-item-3">
                        <a href="<?php the_permalink(); ?>">
                           <?php the_post_thumbnail('sassbeyond-360-500'); ?>
                           <h5><?php echo wp_trim_words( get_the_title(), 3, '...' );?></h5>
                        </a>
                     </div>

                     <?php endwhile; wp_reset_postdata(); ?>
                     
                  </div>
               </div>
            </div>
         </div>
      </div>
      <?php }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new sassbeyond_Widget_portfolio3 );