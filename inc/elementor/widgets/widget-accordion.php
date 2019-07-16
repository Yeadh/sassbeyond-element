<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Accordion
class sassbeyond_Widget_Accordion extends Widget_Base {
 
   public function get_name() {
      return 'accordion';
   }
 
   public function get_title() {
      return esc_html__( 'Accordion', 'sassbeyond' );
   }
 
   public function get_icon() { 
        return 'eicon-accordion';
   }
 
   public function get_categories() {
      return [ 'sassbeyond-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'accordion_section',
         [
            'label' => esc_html__( 'Accordion', 'sassbeyond' ),
            'type' => Controls_Manager::SECTION,
         ]
      );

      $this->add_control(
         'accordion_style',
         [
            'label' => __( 'Accordion Style', 'sassbeyond' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'style-1',
            'options' => [
               'style-1'  => __( 'Style 1', 'sassbeyond' ),
               'style-2' => __( 'Style 2', 'sassbeyond' ),
               'style-3' => __( 'Style 3', 'sassbeyond' ),
               'none' => __( 'None', 'sassbeyond' ),
            ],
         ]
      );

      $this->add_control(
         'collapsed_icon',
         [
            'label' => __( 'Collapsed Icon', 'sassbeyond' ),
            'type' => \Elementor\Controls_Manager::ICON,
            'default' => 'fa fa-plus',
            'condition' => [
               'accordion_style' => ['style-1','style-2']
            ]
         ]
      );

      $this->add_control(
         'expanded_icon',
         [
            'label' => __( 'Expanded Icon', 'sassbeyond' ),
            'type' => \Elementor\Controls_Manager::ICON,
            'default' => 'fa fa-minus',
            'condition' => [
               'accordion_style' => ['style-1','style-2']
            ]
         ]
      );

      $accordion = new \Elementor\Repeater();

      $accordion->add_control(
         'title', [
            'label' => __( 'Title', 'sassbeyond' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'label_block' => true,
         ]
      );
      $accordion->add_control(
         'text', [
            'label' => __( 'Text', 'sassbeyond' ),
            'type' => \Elementor\Controls_Manager::WYSIWYG,
            'label_block' => true,
         ]
      );

      $this->add_control(
         'accordion_list',
         [
            'label' => __( 'Accordion list', 'sassbeyond' ),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $accordion->get_controls(),
            'default' => [
               [
                  'title' => __( 'Lorem ipsum dummy text used here?', 'sassbeyond' ),
                  'text' => __( 'Lorem ipsum dolor sit amet, vix an natum labitur eleifd, mel am laoreet menandri. Ei justo complectitur duo. Ei mundi solet utos soletu possit quo. Sea cu justo laudem.', 'sassbeyond' )
               ],
               [
                  'title' => __( 'Why i should buy this Theme?', 'sassbeyond' ),
                  'text' => __( 'Lorem ipsum dolor sit amet, vix an natum labitur eleifd, mel am laoreet menandri. Ei justo complectitur duo. Ei mundi solet utos soletu possit quo. Sea cu justo laudem.', 'sassbeyond' )
               ],
               [
                  'title' => __( 'Can i change any elements easilly?', 'sassbeyond' ),
                  'text' => __( 'Lorem ipsum dolor sit amet, vix an natum labitur eleifd, mel am laoreet menandri. Ei justo complectitur duo. Ei mundi solet utos soletu possit quo. Sea cu justo laudem.', 'sassbeyond' )
               ]
            ],
            'title_field' => '{{{ title }}}',
         ]
      );

      $this->end_controls_section();

   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.

      $randID = wp_rand();

      $settings = $this->get_settings_for_display(); ?>

      <!-- faq-area -->
      <div class="faq-wrapper">
          <div class="accordion" id="accordionExample<?php echo $randID ?>">
              <?php if ( $settings['accordion_list'] ) {
                foreach (  $settings['accordion_list'] as $key => $accordion ) { ?>

              <div class="card">
                  <div class="card-header" id="headingFive">
                      <h5 class="mb-0">
                          <a href="#" class="btn-link collapsed" data-toggle="collapse" data-target="#collapse<?php echo $key.$randID ?>"
                              aria-expanded="false" aria-controls="collapse<?php echo $key.$randID ?>">
                              <?php echo esc_html( $accordion['title'] ); ?>
                          </a>
                      </h5>
                  </div>
                  <div id="collapse<?php echo $key.$randID ?>" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample<?php echo $randID ?>">
                      <div class="card-body">
                          <?php echo esc_html( $accordion['text'] ); ?>
                      </div>
                  </div>
              </div>
              <?php } ?>

          </div>
      </div>
      <!-- faq-area-end -->
            
            


      <div id="accordion<?php echo $randID ?>" class="sassbeyond-accordion <?php echo esc_attr( $settings['accordion_style'] ) ?>">
        <?php if ( $settings['accordion_list'] ) { 
          foreach (  $settings['accordion_list'] as $key => $accordion ) { ?>
          <div class="sassbeyond-accordion-item">
            <h5 data-toggle="collapse" data-target="#collapse-<?php echo $key.$randID ?>" aria-expanded="false" aria-controls="collapse-<?php echo $key.$randID ?>">
                <?php echo esc_html( $accordion['title'] ); ?>
                <span class="<?php echo esc_attr( $settings['collapsed_icon'] ) ?>"></span>
                <span class="<?php echo esc_attr( $settings['expanded_icon'] ) ?>"></span>
            </h5>

            <div id="collapse-<?php echo $key.$randID ?>" class="collapse" data-parent="#accordion<?php echo $randID ?>">
              <?php echo esc_html( $accordion['text'] ); ?>
            </div>
          </div>
          <?php } 
      } ?>
      </div>

      

      <?php
   }

}

Plugin::instance()->widgets_manager->register_widget_type( new sassbeyond_Widget_Accordion );