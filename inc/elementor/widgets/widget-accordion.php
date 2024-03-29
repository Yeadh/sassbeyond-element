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


      $accordion = new \Elementor\Repeater();

      $accordion->add_control(
         'title', [
            'label' => __( 'Title', 'sassbeyond' ),
            'type' => \Elementor\Controls_Manager::TEXT
         ]
      );
      $accordion->add_control(
         'text', [
            'label' => __( 'Text', 'sassbeyond' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA
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
                
              <?php }
            } ?>

          </div>
      </div>
      <!-- faq-area-end -->


      <?php
   }

}

Plugin::instance()->widgets_manager->register_widget_type( new sassbeyond_Widget_Accordion );