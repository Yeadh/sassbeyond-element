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
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
               'url' => \Elementor\Utils::get_placeholder_image_src(),
            ],
         ]     
      );

      $this->add_control(
         'title',
         [
            'label' => __( 'Title', 'sassbeyond' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('Awesome Design','sassbeyond'),
         ]
      );
      $this->add_control(
         'text',
         [
            'label' => __( 'Text', 'sassbeyond' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => __('Lorem ipsum dummy text are used here so replace your app data, ipsum dummy text are used here so','sassbeyond'),
         ]
      );

      $this->add_control(
         'style',
         [
            'label' => __( 'Service Style', 'sassbeyond' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'solid',
            'options' => [
               'center'  => __( 'Center Icon', 'sassbeyond' ),
               'left' => __( 'Left Icon', 'sassbeyond' ),
            ],
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
      <?php 
      if ( $settings['style'] == 'center' ){ ?>

      <div class="s-inner-features text-center mb-50">
           <div class="ifeatures-icon mb-30">
               <?php echo wp_get_attachment_image( $settings['icon']['id'],'full'); ?>
           </div>
           <div class="ifeatures-content">
               <h4><?php echo esc_html($settings['title']); ?></h4>
               <p><?php echo esc_html($settings['text']); ?></p>
           </div>
       </div>

      <?php } elseif( $settings['style'] == 'left' ) { ?>

      <div class="s-single-features mb-30">
           <div class="s-features-icon">
               <?php echo wp_get_attachment_image( $settings['icon']['id'],'full'); ?>
           </div>
           <div class="features-content">
               <h3><?php echo esc_html($settings['title']); ?></h3>
               <p><?php echo esc_html($settings['text']); ?></p>
           </div>
       </div>

      <?php } ?>
      

      <?php
   }
 
}
Plugin::instance()->widgets_manager->register_widget_type( new sassbeyond_Widget_Service );