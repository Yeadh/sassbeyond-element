<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Features
class sassbeyond_Widget_Features extends Widget_Base {
 
   public function get_name() {
      return 'features';
   }
 
   public function get_title() {
      return esc_html__( 'Features', 'sassbeyond' );
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
            'label' => esc_html__( 'Features', 'sassbeyond' ),
            'type' => Controls_Manager::SECTION,
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
            'default' => __('We offer All kind service features','sassbeyond')
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
            'default' => 'Easily customizable',
         ]
      );

      $feature->add_control(
         'feature_text', [
            'label' => __( 'Feature Text', 'sassbeyond' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => 'Lorem ipsum dummy text are use in this section. so you should replace orginal content.lLorem dummy',
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

      $this->add_control(
         'button_text', [
            'label' => __( 'Button Text', 'sassbeyond' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('View all features','sassbeyond')
         ]
      );

      $this->add_control(
         'button_url', [
            'label' => __( 'Button URL', 'sassbeyond' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '#'
         ]
      );
      

      
      $this->end_controls_section();

   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display(); ?>

      <!-- features-area -->
      <section class="features-area p-relative">
          <div class="container">
              <div class="row justify-content-center">
                  <div class="col-lg-10">
                      <div class="section-title text-center mb-100">
                          <h2><?php echo esc_html($settings['title']); ?></h2>
                      </div>
                  </div>
              </div>
              <div class="row">
              <?php foreach (  $settings['feature'] as $index => $feature ) { ?>
                  <div class="col-lg-6">
                      <div class="single-features fix mb-30">
                          <div class="features-icon">
                              <img src="<?php echo $feature['feature_icon']['url'] ?>" alt="icon">
                          </div>
                          <div class="features-content">
                              <h3><?php echo esc_html($feature['feature_title']) ?></h3>
                              <p><?php echo esc_html($feature['feature_text']) ?></p>
                          </div>
                      </div>
                  </div>
              <?php } ?>
              </div>
              <div class="row">
                  <div class="col-12">
                      <div class="features-btn text-center mt-70">
                          <a href="<?php echo esc_url( $settings['button_url'] ); ?>" class="btn"><?php echo esc_html( $settings['button_text'] ); ?></a>
                      </div>
                  </div>
              </div>
          </div>
          <div class="features-apps"><img src="<?php echo $settings['mockup_image']['url'] ?>" alt="img" class="alltuchtopdown"></div>
      </section>
      <!-- features-area-end -->
      <?php
   }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new sassbeyond_Widget_Features );