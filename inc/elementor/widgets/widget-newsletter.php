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
         'style',
         [
            'label' => __( 'Layout Style', 'sassbeyond' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'style1',
            'options' => [
               'style1' => __( 'Style 1', 'sassbeyond' ),
               'style2' => __( 'Style 2', 'sassbeyond' ),
            ],
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
         'shortcode', [
            'label' => __( 'Mailchimp Shortcode', 'sassbeyond' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'placeholder' => __( '[mc4wp_form id="123"]', 'sassbeyond' ),
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

      <?php if ( $settings['style'] == 'style1' ){ ?>

      <!-- newsletter-area -->
      <section class="newsletter-area <?php if (is_front_page()){echo 'newsletter-bg';}else{echo 's-newsletter-bg';} ?>" data-background="<?php echo get_template_directory_uri() ?>/img/newsletter_bg.png">
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
                      <?php echo do_shortcode( $settings['shortcode'] ); ?>
                    </div>
                  </div>
              </div>
          </div>
          <span class="moveshape-one"></span>
          <span class="moveshape-two"></span>
          <span class="moveshape-three"></span>
          <span class="moveshape-four"></span>
          <span class="moveshape-five"></span>
          <div class="newsletter-app wow slideInLeft" data-wow-duration="1.5s" data-wow-delay="0.2s"><img src="<?php echo esc_url($settings['background']['url']); ?>" alt="img" class="alltuchtopdown"></div>
      </section>
      <!-- newsletter-area-end -->

      <?php } elseif( $settings['style'] == 'style2' ){ ?>

      <!-- newsletter-area -->
      <section class="newsletter-area h-newsletter-bg">
          <div class="container">
              <div class="row justify-content-center">
                  <div class="col-xl-6 col-lg-8">
                      <div class="section-title s-section-title white-title text-center border-none mb-75">
                          <h2><?php echo esc_html($settings['title']); ?></h2>
                          <p><?php echo esc_html($settings['desc']); ?></p>
                      </div>
                  </div>
              </div>
              <div class="row justify-content-center">
                  <div class="col-xl-7 col-lg-10">
                      <div class="s-newsletter-form">
                          <?php echo do_shortcode( $settings['shortcode'] ); ?>
                      </div>
                  </div>
              </div>
          </div>
          <div class="sub-shape"><img src="<?php echo get_template_directory_uri() ?>/img/sub_img.png" alt="img"></div>
          <div class="sub-shape s-sub-shape"><img src="<?php echo get_template_directory_uri() ?>/img/sub_img02.png" alt="img"></div>
      </section>
      <!-- newsletter-area-end -->

    <?php } ?>

<?php }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new sassbeyond_Widget_newsletter );