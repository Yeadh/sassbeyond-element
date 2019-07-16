<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Title
class sassbeyond_Widget_Partner extends Widget_Base {
 
   public function get_name() {
      return 'partner';
   }
 
   public function get_title() {
      return esc_html__( 'Partner', 'sassbeyond' );
   }
 
   public function get_icon() { 
        return 'eicon-logo';
   }
 
   public function get_categories() {
      return [ 'sassbeyond-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'partner_section',
         [
            'label' => esc_html__( 'Partner', 'sassbeyond' ),
            'type' => Controls_Manager::SECTION,
         ]
      );

      $repeater = new \Elementor\Repeater();

      $repeater->add_control(
         'logo',
         [
            'label' => __( 'Logo', 'sassbeyond' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
               'url' => \Elementor\Utils::get_placeholder_image_src()
            ],
         ]
      );

      $this->add_control(
         'partner_list',
         [
            'label' => __( 'Partner List', 'sassbeyond' ),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls()

         ]
      );
      
      $this->end_controls_section();

   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display(); ?>
    <!-- brand-area -->
    <div class="brand-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="brand-active">
                      <?php foreach (  $settings['partner_list'] as $partner_single ): ?>
                        <div class="single-brand text-center">
                            <img src="<?php echo esc_url($partner_single['logo']['url']); ?>" alt="img">
                        </div>
                      <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- brand-area-end -->

   <?php } 
 
}

Plugin::instance()->widgets_manager->register_widget_type( new sassbeyond_Widget_Partner );