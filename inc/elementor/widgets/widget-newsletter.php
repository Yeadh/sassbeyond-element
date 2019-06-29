<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Newsletter
class sassbeyond_Widget_newsletter extends Widget_Base {
 
   public function get_name() {
      return 'newsletter';
   }
 
   public function get_title() {
      return esc_html__( 'Newsletter', 'sassbeyond' );
   }
 
   public function get_icon() { 
        return 'eicon-envelope';
   }
 
   public function get_categories() {
      return [ 'sassbeyond-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'newsletter_section',
         [
            'label' => esc_html__( 'Newsletter', 'sassbeyond' ),
            'type' => Controls_Manager::SECTION,
         ]
      );

      $this->add_control(
         'title', [
            'label' => __( 'Title', 'sassbeyond' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( 'Get reguler updates', 'sassbeyond' ),
         ]
      );

      $this->add_control(
         'desc', [
            'label' => __( 'Description', 'sassbeyond' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => __( 'Lorem ipsum dummy text are used here so replace your app data, Lorem ipsm', 'sassbeyond' ),
         ]
      );

      $this->add_control(
         'background', [
            'label' => __( 'Floating Image', 'sassbeyond' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
              'url' => \Elementor\Utils::get_placeholder_image_src(),
            ],
         ]
      );

      $this->end_controls_section();

   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display(); ?>

      <!-- newsletter-area -->
      <section class="newsletter-area newsletter-bg" data-background="<?php echo get_template_directory_uri() ?>/img/bg/newsletter_bg.png">
          <div class="container">
              <div class="row justify-content-center">
                  <div class="col-xl-8 col-lg-10">
                      <div class="section-title text-center border-none mb-75">
                          <h2><?php echo esc_html($settings['title']); ?></h2>
                          <p><?php echo esc_html($settings['desc']); ?></p>
                      </div>
                  </div>
              </div>
              <div class="row justify-content-center">
                  <div class="col-xl-8 col-lg-10">
                      <div class="newsletter-form">
                          <form action="#">
                              <input type="email" placeholder="Enter your email">
                              <button><?php echo esc_html__( 'SUBSCRIBE', 'sassbeyond' ); ?></button>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
          <span class="moveshape-one"></span>
          <span class="moveshape-two"></span>
          <span class="moveshape-three"></span>
          <span class="moveshape-four"></span>
          <span class="moveshape-five"></span>
          <div class="newsletter-app wow slideInLeft" data-wow-duration="1.5s" data-wow-delay="0.2s"><img src="<?php echo esc_url($settings['background'][url]); ?>" alt="img" class="alltuchtopdown"></div>
      </section>
      <!-- newsletter-area-end -->
   
      <?php }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new sassbeyond_Widget_newsletter );