<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// List
class sassbeyond_Widget_List extends Widget_Base {
 
   public function get_name() {
      return 'list';
   }
 
   public function get_title() {
      return esc_html__( 'List', 'sassbeyond' );
   }
 
   public function get_icon() { 
        return 'eicon-editor-list-ul';
   }
 
   public function get_categories() {
      return [ 'sassbeyond-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'section',
         [
            'label' => esc_html__( 'List', 'sassbeyond' ),
            'type' => Controls_Manager::SECTION,
         ]
      );


      $repeater = new \Elementor\Repeater();

      $repeater->add_control(
         'list_text', [
            'label' => __( 'List Text', 'sassbeyond' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'Create your won list',
         ]
      );

      $this->add_control(
         'lists',
         [
            'label' => __( 'List', 'sassbeyond' ),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'title_field' => 'list Item',
            'default' => [
               [
                  'list_text' => 'Dedicated support'
               ],
               [
                  'list_text' => 'Creative minds'
               ],
               [
                  'list_text' => 'Lorem ipsum dum'
               ],
               [
                  'list_text' => 'Free consultant'
               ]
            ],
            'lists' => '{{{ lists }}}',
         ]
      );


      $this->end_controls_section();
   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display(); ?>
      
      <ul class="list">
         <?php 
         foreach (  $settings['lists'] as $index => $single_list ) {
         ?>
            <li>
               <img src="<?php echo get_template_directory_uri().'/img/list-icon.png' ?>" alt="<?php echo esc_attr($single_list['list_text']) ?>">
               <?php echo esc_html($single_list['list_text']) ?>
            </li>
         <?php 
         } ?>
      </ul>

      <?php
   }

}

Plugin::instance()->widgets_manager->register_widget_type( new sassbeyond_Widget_List );