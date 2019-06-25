<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Banner Parallax
class sassbeyond_Widget_Banner2 extends Widget_Base {
 
   public function get_name() {
      return 'banner2';
   }
 
   public function get_title() {
      return esc_html__( 'Banner 2', 'sassbeyond' );
   }
 
   public function get_icon() { 
        return 'eicon-fb-feed';
   }
 
   public function get_categories() {
      return [ 'sassbeyond-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'banner_2',
         [
            'label' => esc_html__( 'Banner 2', 'sassbeyond' ),
            'type' => Controls_Manager::SECTION,
         ]
      );

      $this->add_control(
      'banner_image',
        [
          'label' => __( 'Choose banner background image', 'sassbeyond' ),
          'type' => \Elementor\Controls_Manager::MEDIA,
          'default' => [
            'url' => \Elementor\Utils::get_placeholder_image_src(),
          ],
        ]
      );

      $this->add_control(
      'banner_vector',
        [
          'label' => __( 'Choose banner vector', 'sassbeyond' ),
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
            'default' => __('Turn your ideas into real!','sassbeyond')
         ]
      );

      $this->add_control(
         'description',
         [
            'label' => __( 'Description', 'sassbeyond' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => __('Lorem ipsum dummy text are usually used in print and website industry. Lorem ipsum dummy','sassbeyond')
         ]
      );
      

      $this->add_control(
         'btn_text', [
            'label' => __( 'Text', 'sassbeyond' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('Learn More','sassbeyond')
         ]
      );

      $this->add_control(
         'btn_url', [
            'label' => __( 'URL', 'sassbeyond' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '#',
         ]
      );

      $this->add_control(
          'image-1',
          [
            'label' => __( 'Choose Image', 'sassbeyond' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
              'url' => \Elementor\Utils::get_placeholder_image_src(),
            ],
          ]
      );


      $this->add_control(
         'title-1',
         [
            'label' => __( 'Title', 'sassbeyond' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('Creative minds','sassbeyond'),
         ]
      );
      $this->add_control(
         'text-1',
         [
            'label' => __( 'Text', 'sassbeyond' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => __('Lorem ipsum dummy text used on thins industry are usually used. So replace your text','sassbeyond'),
         ]
      );

      $this->add_control(
          'image-2',
          [
            'label' => __( 'Choose Image', 'sassbeyond' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
              'url' => \Elementor\Utils::get_placeholder_image_src(),
            ],
          ]
      );


      $this->add_control(
         'title-2',
         [
            'label' => __( 'Title', 'sassbeyond' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('Excellent support','sassbeyond'),
         ]
      );
      $this->add_control(
         'text-2',
         [
            'label' => __( 'Text', 'sassbeyond' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => __('Lorem ipsum dummy text used on thins industry are usually used. So replace your text','sassbeyond'),
         ]
      );

      $this->add_control(
          'image-3',
          [
            'label' => __( 'Choose Image', 'sassbeyond' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
              'url' => \Elementor\Utils::get_placeholder_image_src(),
            ],
          ]
      );


      $this->add_control(
         'title-3',
         [
            'label' => __( 'Title', 'sassbeyond' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('Creative minds','sassbeyond'),
         ]
      );
      $this->add_control(
         'text-3',
         [
            'label' => __( 'Text', 'sassbeyond' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => __('Lorem ipsum dummy text used on thins industry are usually used. So replace your text','sassbeyond'),
         ]
      );


      
      $this->end_controls_section();

   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display(); ?>




    <section class="banner-2" style="background-image: url(<?php echo $settings['banner_image'][url] ?>);">
        <span class="moving_circle circle1"></span>
        <span class="moving_circle circle2"></span>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-lg-6 col-sm-12">
                    <div class="banner-3-content">
                        <h1><?php echo esc_html($settings['title']); ?></h1>
                        <p><?php echo esc_html($settings['description']); ?></p>
                        <div class="bnr-btn">
                            <ul class="list-inline">
                                <li class="list-inline-item"><a href="<?php echo esc_url( $settings['btn_url'] ); ?>"><?php echo esc_attr( $settings['btn_text'] ); ?></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-lg-6 col-sm-12">
                    <div class="banner-images">
                        <img src="<?php echo $settings['banner_vector'][url] ?>" alt="vector">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="feature_services">
      <div class="service-banner-shape">
        <div class="container">
          <div class="row">
            <div class="col-md-4">
              <div class="banner-service">
                <img src="<?php echo esc_url($settings['image-1']['url']); ?>" alt="img">
                <h3><?php echo esc_html($settings['title-1']); ?></h3>
                <p><?php echo esc_html($settings['text-1']); ?></p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="banner-service">
                <img src="<?php echo esc_url($settings['image-2']['url']); ?>" alt="img">
                <h3><?php echo esc_html($settings['title-2']); ?></h3>
                <p><?php echo esc_html($settings['text-2']); ?></p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="banner-service">
                <img src="<?php echo esc_url($settings['image-3']['url']); ?>" alt="img">
                <h3><?php echo esc_html($settings['title-3']); ?></h3>
                <p><?php echo esc_html($settings['text-3']); ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

      <?php
   }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new sassbeyond_Widget_Banner2 );