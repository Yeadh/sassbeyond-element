<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Title
class sassbeyond_Widget_Testimonials extends Widget_Base {
 
   public function get_name() {
      return 'testimonials';
   }
 
   public function get_title() {
      return esc_html__( 'Testimonials', 'sassbeyond' );
   }
 
   public function get_icon() { 
        return 'eicon-testimonial';
   }
 
   public function get_categories() {
      return [ 'sassbeyond-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'title_section',
         [
            'label' => esc_html__( 'Testimonials', 'sassbeyond' ),
            'type' => Controls_Manager::SECTION,
         ]
      );
      
      $this->add_control(
         'title',
         [
            'label' => __( 'Title', 'sassbeyond' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( 'Users love us', 'sassbeyond' )
            
         ]
      );

      $repeater = new \Elementor\Repeater();

      $repeater->add_control(
         'image',
         [
            'label' => __( 'Choose Photo', 'sassbeyond' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
               'url' => \Elementor\Utils::get_placeholder_image_src(),
            ],
         ]
      );
      
      $repeater->add_control(
         'name',
         [
            'label' => __( 'Name', 'sassbeyond' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            
         ]
      );

      $repeater->add_control(
         'designation',
         [
            'label' => __( 'Designation', 'sassbeyond' ),
            'type' => \Elementor\Controls_Manager::TEXT
         ]
      );

      $repeater->add_control(
         'testimonial',
         [
            'label' => __( 'Testimonial', 'sassbeyond' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA
         ]
      );

      $this->add_control(
         'testimonial_list',
         [
            'label' => __( 'Testimonial List', 'sassbeyond' ),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'title_field' => '{{name}}',

         ]
      );
      
      $this->end_controls_section();

   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display();
      
      //Inline Editing
      $this->add_inline_editing_attributes( 'style', 'basic' );
      $this->add_inline_editing_attributes( 'color', 'basic' );
      $this->add_inline_editing_attributes( 'testimonial_list', 'basic' );
      
      ?>
      
      <!-- testimonial-area -->
      <section class="testimonial-area">
          <div class="container">
              <div class="row justify-content-between">
                  <div class="col-xl-3 col-lg-4 d-none d-md-block">
                      <div class="testimonial-quote">
                          <img src="<?php echo get_template_directory_uri() ?>/img/images/quote_icon.png" alt="quote">
                      </div>
                  </div>
                  <div class="col-xl-8 col-lg-8">
                      <div class="section-title mb-80">
                          <h2><?php echo esc_html( $settings['title'] ); ?></h2>
                      </div>
                      <div class="testimonial-active">
                           <?php foreach (  $settings['testimonial_list'] as $testimonial_single ): ?>
                           <div class="single-testimonial">
                              <div class="testi-content">
                                  <p><?php echo esc_html($testimonial_single['testimonial']); ?></p>
                              </div>
                              <div class="testi-avatar">
                                  <div class="t-avatar-img">
                                      <img src="<?php echo esc_url($testimonial_single['image']['url']); ?>" alt="img">
                                  </div>
                                  <div class="t-avatar-info">
                                      <h5><?php echo esc_html($testimonial_single['name']); ?></h5>
                                      <p><?php echo esc_html($testimonial_single['designation']); ?></p>
                                  </div>
                              </div>
                           </div>
                           <?php endforeach; ?>
                      </div>
                  </div>
              </div>
          </div>
      </section>
      <!-- testimonial-area-end -->
   <?php } 
 
}

Plugin::instance()->widgets_manager->register_widget_type( new sassbeyond_Widget_Testimonials );