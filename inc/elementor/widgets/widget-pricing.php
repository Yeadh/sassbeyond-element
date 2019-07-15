<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Pricing
class sassbeyond_Widget_Pricing extends Widget_Base {
 
   public function get_name() {
      return 'pricing';
   }
 
   public function get_title() {
      return esc_html__( 'Pricing', 'sassbeyond' );
   }
 
   public function get_icon() { 
        return 'eicon-price-table';
   }
 
   public function get_categories() {
      return [ 'sassbeyond-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'pricing_section',
         [
            'label' => esc_html__( 'Pricing', 'sassbeyond' ),
            'type' => Controls_Manager::SECTION,
         ]
      );

      $this->add_control(
         'title',
         [
            'label' => __( 'title', 'sassbeyond' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'Standard Plan'
         ]
      );

      $this->add_control(
         'icon',
         [
            'label' => __( 'icon', 'sassbeyond' ),
            'type' => \Elementor\Controls_Manager::ICON,
            'label_block' => true,
            'default' => 'fa fa-shield'
         ]
      );

      $this->add_control(
         'price',
         [
            'label' => __( 'Price', 'sassbeyond' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '70'
         ]
      );

      
      $this->add_control(
         'package',
         [
            'label' => __( 'Package', 'sassbeyond' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'Yealry',
            'options' => [
               'Daily'  => __( 'Daily', 'sassbeyond' ),
               'Weekly'  => __( 'Weekly', 'sassbeyond' ),
               'Monthly' => __( 'Monthly', 'sassbeyond' ),
               'Yealry' => __( 'Yealry', 'sassbeyond' ),
               'none' => __( 'None', 'sassbeyond' )
            ],
         ]
      );

      $feature = new \Elementor\Repeater();

      $feature->add_control(
         'feature',
         [
            'label' => __( 'Feature', 'sassbeyond' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => __( '10 Free Domain Names', 'sassbeyond' )
         ]
      );

      $this->add_control(
         'feature_list',
         [
            'label' => __( 'Feature List', 'sassbeyond' ),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $feature->get_controls(),
            'default' => [
               [
                  'feature' => __( '5GB Storage Space', 'sassbeyond' )
               ],
               [
                  'feature' => __( '20GB Monthly Bandwidth', 'sassbeyond' )
               ],
               [
                  'feature' => __( 'My SQL Databases', 'sassbeyond' )
               ],
               [
                  'feature' => __( '100 Email Account', 'sassbeyond' )
               ],
               [
                  'feature' => __( '10 Free Domain Names', 'sassbeyond' )
               ]
            ],
            'title_field' => '{{{ feature }}}',
         ]
      );

      $this->add_control(
         'btn_text',
         [
            'label' => __( 'button text', 'sassbeyond' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'Get started',
         ]
      );

      $this->add_control(
         'btn_url',
         [
            'label' => __( 'button URL', 'sassbeyond' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '#',
         ]
      );

      $this->add_control(
         'recommended',
         [
            'label' => __( 'Recommended', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'On', 'sassbeyond' ),
            'label_off' => __( 'Off', 'sassbeyond' ),
            'return_value' => 'on',
            'default' => 'off',
         ]
      );

      $this->end_controls_section();
   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display(); ?>

      <div class="pricing-box <?php if ( 'on' == $settings['recommended'] ){ echo"active"; }?>">
         <div class="pricing-head mb-40 text-center">
            <h4><?php echo esc_html( $settings['title'] ); ?></h4>
            <div class="price-count">
                <h2><?php echo esc_html( $settings['price'] ); ?><span>$/<?php echo esc_html( $settings['package'] ); ?></span></h2>
            </div>
         </div>
         <div class="pricing-list mb-50">
            <ul>
               <?php 
                  foreach (  $settings['feature_list'] as $index => $feature ) { ?>
                  <li><?php echo $feature['feature'] ?></li>
               <?php } ?>
            </ul>
         </div>
         <div class="pricing-btn text-center">
            <a href="<?php echo esc_attr( $settings['btn_url'] ) ?>" class="btn"><?php echo esc_html( $settings['btn_text'] ) ?></a>
         </div>
      </div>
      <?php
   }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new sassbeyond_Widget_Pricing );