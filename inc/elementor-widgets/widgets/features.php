<?php
namespace Bcharityelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 *
 * Bcharity elementor Team Member section widget.
 *
 * @since 1.0
 */
class Bcharity_Features extends Widget_Base {

	public function get_name() {
		return 'bcharity-features';
	}

	public function get_title() {
		return __( 'Features', 'bcharity' );
	}

	public function get_icon() {
		return 'eicon-info-box';
	}

	public function get_categories() {
		return [ 'bcharity-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // ----------------------------------------  Feature Section ------------------------------
        $this->start_controls_section(
            'features_heading',
            [
                'label' => __( 'Feature Heading', 'bcharity' ),
            ]
        );
        $this->add_control(
            'feature_header',
            [
                'label'         => esc_html__( 'Feature Header', 'bcharity' ),
                'description'   => esc_html__('Use <br> tag for line break', 'bcharity'),
                'type'          => Controls_Manager::WYSIWYG,
                'label_block'   => true,
                'default'       => __( '<p>Awesome Feature</p><h2>How Could You Help </h2>', 'bcharity' )
            ]
        );

        $this->end_controls_section(); // End section top content
        
		// ----------------------------------------   Features content ------------------------------
		$this->start_controls_section(
			'features_block',
			[
				'label' => __( 'Features', 'bcharity' ),
			]
		);
		$this->add_control(
            'features_content', [
                'label' => __( 'Create Feature', 'bcharity' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ label }}}',
                'fields' => [
                    [
                        'name'      => 'icon',
                        'label'     => __( 'Select Icon', 'bcharity' ),
                        'type'      => Controls_Manager::ICON,
                        'default'   => 'fa fa-mobile',
                        'options'   => bcharity_flaticon_list()
                    ],
                    [
                        'name'  => 'label',
                        'label' => __( 'Title', 'bcharity' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => __( 'Give Donation', 'bcharity' )
                    ],
                    [
                        'name'      => 'desc',
                        'label'     => __( 'Descriptions', 'bcharity' ),
                        'type'      => Controls_Manager::TEXTAREA,
                        'default'   => __( 'Our his abundantly subdue she\'d night own of two two his deasons face you place can upon
                        letter.', 'bcharity' )
                    ],
                ],
            ]
        );

		$this->end_controls_section(); // End Features content

        /**
         * Style Tab
         * ------------------------------ Style Tab Content ------------------------------
         *
         */

        // Heading Style ==============================
        $this->start_controls_section(
            'color_sect', [
                'label' => __( 'Style Heading', 'bcharity' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_sec_ttitle', [
                'label'     => __( 'Section Title Color', 'bcharity' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature_part .section_tittle p' => 'color: {{VALUE}};',
                ],
            ]
        );    

        $this->add_control(
            'color_sub_ttitle', [
                'label'     => __( 'Big Title Color', 'bcharity' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature_part .section_tittle h2' => 'color: {{VALUE}};',
                ],
            ]
        );    
        
        $this->end_controls_section();

        // Single Feature Color Settings ==============================
        $this->start_controls_section(
            'single_serv_color_sett', [
                'label' => __( 'Single Feature Color Settings', 'bcharity' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'item_bg_color', [
                'label'     => __( 'Item BG Color', 'bcharity' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature_part .single_feature_part' => 'background-color: {{VALUE}};',
                ],
            ]
        );    
        $this->add_control(
            'icon_color', [
                'label'     => __( 'Icon Color', 'bcharity' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature_part .single_feature_part .eci' => 'color: {{VALUE}};',
                ],
            ]
        );    
        $this->add_control(
            'item_title_color', [
                'label'     => __( 'Item Title Color', 'bcharity' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature_part .single_feature_part h4' => 'color: {{VALUE}};',
                ],
            ]
        );    
        $this->add_control(
            'item_text_color', [
                'label'     => __( 'Item Text Color', 'bcharity' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature_part .single_feature_part p' => 'color: {{VALUE}};',
                ],
            ]
        );    

        $this->end_controls_section();


        // Background Style ==============================
        $this->start_controls_section(
            'section_bg', [
                'label' => __( 'Style Background', 'bcharity' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'sectionbg',
                'label' => __( 'Background', 'bcharity' ),
                'types' => [ 'classic' ],
                'selector' => '{{WRAPPER}} .feature_part',
            ]
        );
        $this->end_controls_section();

	}

	protected function render() {

    $settings = $this->get_settings();
    $feature_header = !empty( $settings['feature_header'] ) ? $settings['feature_header'] : '';
    $features = !empty( $settings['features_content'] ) ? $settings['features_content'] : '';
    ?>

    <!-- feature_part start-->
    <section class="feature_part">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8">
                    <div class="section_tittle text-center">
                        <?php
                            // Feature Header =============
                            if( $feature_header ){
                                echo wp_kses_post( wpautop( $feature_header ) );
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <?php
                if( is_array( $features ) && count( $features ) > 0 ){
                    foreach ( $features as $feature ) {
                        $fontIcon      = !empty( $feature['icon'] ) ? $feature['icon'] : '';
                        $feature_title = !empty( $feature['label'] ) ? $feature['label'] : '';
                        $feature_desc  = !empty( $feature['desc'] ) ? $feature['desc'] : '';
                ?>
                <div class="col-lg-5 col-sm-6">
                    <div class="single_feature">
                        <div class="single_feature_part">
                            <div class=" d-flex align-items-center">
                                <?php
                                    if( $fontIcon ){
                                        echo '<span class="'. esc_attr( $fontIcon ) .'"></span>';
                                    }
                                ?>
                                <h4><?php echo esc_html( $feature_title );?></h4>
                            </div>                            
                            <p><?php echo esc_html( $feature_desc );?></p>
                        </div>
                    </div>
                </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </section>
    <!-- feature_part start-->
    <?php
    }
}
