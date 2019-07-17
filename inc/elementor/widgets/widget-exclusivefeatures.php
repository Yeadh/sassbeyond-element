<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Features
class sassbeyond_Widget_ExFeatures extends Widget_Base {
 
   public function get_name() {
      return 'exfeatures';
   }
 
   public function get_title() {
      return esc_html__( 'Exclusive Features', 'sassbeyond' );
   }
 
   public function get_icon() { 
        return 'eicon-featured-image';
   }
 
   public function get_categories() {
      return [ 'sassbeyond-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'features',
         [
            'label' => esc_html__( 'Exclusive Features', 'sassbeyond' ),
            'type' => Controls_Manager::SECTION,
         ]
      );

      $this->add_control(
      'bg_color_1',
        [
          'label' => __( 'Gradient Color 1', 'sassbeyond' ),
          'type' => \Elementor\Controls_Manager::COLOR,
          'scheme' => [
            'type' => \Elementor\Scheme_Color::get_type(),
            'value' => \Elementor\Scheme_Color::COLOR_1,
          ]
        ]
      );

      $this->add_control(
      'bg_color_2',
        [
          'label' => __( 'Gradient Color 2', 'sassbeyond' ),
          'type' => \Elementor\Controls_Manager::COLOR,
          'scheme' => [
            'type' => \Elementor\Scheme_Color::get_type(),
            'value' => \Elementor\Scheme_Color::COLOR_1,
          ]
        ]
      );

      $this->add_control(
      'mockup_image',
        [
          'label' => __( 'Mockup image', 'sassbeyond' ),
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
            'default' => __('Exclusive Features','sassbeyond')
         ]
      );


      $this->add_control(
         'sub_title',
         [
            'label' => __( 'Sub Title', 'sassbeyond' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('Lorem ipsum dummy text are used here so replace your app data','sassbeyond')
         ]
      );

      $feature = new \Elementor\Repeater();

      $feature->add_control(
         'feature_icon', [
            'label' => __( 'Feature Icon', 'sassbeyond' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
              'url' => \Elementor\Utils::get_placeholder_image_src(),
            ],
         ]
      );
      
      $feature->add_control(
         'feature_title', [
            'label' => __( 'Feature Title', 'sassbeyond' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'Clean Designs',
         ]
      );

      $feature->add_control(
         'feature_text', [
            'label' => __( 'Feature Text', 'sassbeyond' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => 'Lorem ipsum dummy text are used here so replace your app data, Lorem ipsum dummy text are used here',
         ]
      );

      $this->add_control(
         'feature',
         [
            'label' => __( 'Features', 'sassbeyond' ),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $feature->get_controls(),
            'title_field' => '{{{ feature_title }}}',
         ]
      );

      $screenshot = new \Elementor\Repeater();

      $screenshot->add_control(
         'shot', [
            'label' => __( 'Screenshot', 'sassbeyond' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
              'url' => \Elementor\Utils::get_placeholder_image_src(),
            ],
         ]
      );

      $this->add_control(
         'screenshot',
         [
            'label' => __( 'Screenshot', 'sassbeyond' ),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $screenshot->get_controls()
         ]
      );

      
      $this->end_controls_section();

   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display(); ?>

      <!-- exclusive-features -->
      <section class="exclusive-features p-relative pb-145 pt-180" style="background-image: -webkit-linear-gradient( right, <?php echo $settings['bg_color_1'] ?> 0%, <?php echo $settings['bg_color_2'] ?> 100%);">
          <div class="container">
              <div class="row">
                  <div class="col-lg-8">
                      <div class="section-title white-title border-none mb-65">
                          <h2 class="mb-0"><?php echo esc_html($settings['title']); ?></h2>
                          <p><?php echo esc_html($settings['sub_title']); ?></p>
                      </div>
                      <div class="row">
                      <?php foreach (  $settings['feature'] as $index => $feature ) { ?>
                        <div class="col-md-6">
                            <div class="single-efeatures mb-60">
                                <div class="ef-icon mb-30">
                                    <img src="<?php echo $feature['feature_icon']['url'] ?>" alt="icon">
                                </div>
                                <div class="ef-content">
                                    <h5><?php echo esc_html($feature['feature_title']) ?></h5>
                                    <p><?php echo esc_html($feature['feature_text']) ?></p>
                                </div>
                            </div>
                        </div>
                      <?php } ?>
                      </div>
                  </div>
                  <div class="col-lg-4 col-md-6">
                      <div class="screenshot-active text-right">
                        <?php foreach (  $settings['screenshot'] as $index => $screenimage ) { ?>
                          <div class="single-screenshot">
                              <img src="<?php echo $screenimage['shot']['url'] ?>" alt="img">
                          </div>
                        <?php } ?>
                      </div>
                  </div>
              </div>
          </div>
          <div class="e-features-shape">
              <img src="<?php echo get_template_directory_uri() ?>/img/screenshot_circle.png">           
          </div>
      </section>
      <!-- exclusive-features-end -->
      <?php
   }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new sassbeyond_Widget_ExFeatures );