<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
// service item
class sassbeyond_Widget_Service extends Widget_Base {
 
   public function get_name() {
      return 'service item';
   }
 
   public function get_title() {
      return esc_html__( 'Service Item', 'sassbeyond' );
   }
 
   public function get_icon() { 
        return 'eicon-facebook-comments';
   }
 
   public function get_categories() {
      return [ 'sassbeyond-elements' ];
   }
   protected function _register_controls() {
      $this->start_controls_section(
         'service_section',
         [
            'label' => esc_html__( 'Service Item', 'sassbeyond' ),
            'type' => Controls_Manager::SECTION,
         ]
      );
      $this->add_control(
         'icon',
         [
            'label' => __( 'Icon', 'sassbeyond' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('flaticon-money','sassbeyond'),
         ]     
      );

      $this->add_control(
         'title',
         [
            'label' => __( 'Title', 'sassbeyond' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('Design','sassbeyond'),
         ]
      );
      $this->add_control(
         'text',
         [
            'label' => __( 'Text', 'sassbeyond' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => __('Lorem ipsum dummy text in print and website industry are usually use in these section','sassbeyond'),
         ]
      );
      
      $this->end_controls_section();
   }
   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display();
      
      //Inline Editing
      $this->add_inline_editing_attributes( 'icon', 'basic' );
      $this->add_inline_editing_attributes( 'title', 'basic' );
      $this->add_inline_editing_attributes( 'text', 'basic' );
      $this->add_inline_editing_attributes( 'style', 'basic' );
      ?>
 
      <div class="service-item-2">
         <i class="<?php echo esc_attr($settings['icon']); ?>"></i>
         <h5><?php echo esc_html($settings['title']); ?></h5>
         <p><?php echo esc_html($settings['text']); ?></p>
      </div>

      <?php
   }
 
}
Plugin::instance()->widgets_manager->register_widget_type( new sassbeyond_Widget_Service );