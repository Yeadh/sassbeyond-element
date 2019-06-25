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
            'title_field' => 'testimonial_list',

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
      
      <div class="testimonials">
         <?php foreach (  $settings['testimonial_list'] as $testimonial_single ): ?>
         <div class="testimonial-item">
            <img class="testi-quote" src="<?php echo get_template_directory_uri() ?>/img/quote.png" alt="img">
            <p><?php echo esc_html($testimonial_single['testimonial']); ?></p>
            <div class="row">
               <div class="col-sm-2">
                  <img src="<?php echo esc_url($testimonial_single['image']['url']); ?>" alt="Logo">
               </div>
               <div class="col-sm-5">
                  <h5><?php echo esc_html($testimonial_single['name']); ?></h5>
                  <span><?php echo esc_html($testimonial_single['designation']); ?></span>
               </div>
            </div>
         </div>
         <?php endforeach; ?>
      </div>

   <?php } 
 
}

Plugin::instance()->widgets_manager->register_widget_type( new sassbeyond_Widget_Testimonials );