<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// video
class sassbeyond_Widget_video extends Widget_Base {
 
   public function get_name() {
      return 'video';
   }
 
   public function get_title() {
      return esc_html__( 'Video', 'sassbeyond' );
   }
 
   public function get_icon() { 
        return 'eicon-video-camera';
   }
 
   public function get_categories() {
      return [ 'sassbeyond-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'video_section',
         [
            'label' => esc_html__( 'Video', 'sassbeyond' ),
            'type' => Controls_Manager::SECTION,
         ]
      );

      $this->add_control(
         'background', [
            'label' => __( 'Background', 'sassbeyond' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
              'url' => \Elementor\Utils::get_placeholder_image_src(),
            ],
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
       
      $settings = $this->get_settings_for_display(); ?>

      <section class="video-area">
          <div class="container">
              <div class="row justify-content-center">
                  <div class="col-lg-10">
                      <div class="video-wrap p-relative">
                          <img src="<?php echo esc_url($settings['background'][url]); ?>" alt="img">
                          <a href="<?php echo esc_url($settings['url']); ?>" class="popup-video"><i class="fas fa-play"></i></a>
                      </div>
                  </div>
              </div>
          </div>
      </section>
   
      <?php }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new sassbeyond_Widget_video );