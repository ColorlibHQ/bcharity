<?php
namespace Bcharityelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;
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
 * Bcharity elementor section widget.
 *
 * @since 1.0
 */
class Bcharity_Become_Volunteer extends Widget_Base {

	public function get_name() {
		return 'bcharity-become-volunteer';
	}

	public function get_title() {
		return __( 'Become A Volunteer', 'bcharity' );
	}

	public function get_icon() {
		return 'eicon-posts-ticker';
	}

	public function get_categories() {
		return [ 'bcharity-elements' ];
	}

	protected function _register_controls() {

        
		// ----------------------------------------  Become A Volunteer content ------------------------------
		$this->start_controls_section(
			'become_volunteer_content',
			[
				'label' => __( 'Become A Volunteer Section', 'bcharity' ),
			]
		);
        $this->add_control(
            'title_txt',
            [
                'label'         => esc_html__( 'Title Text', 'bcharity' ),
                'type'          => Controls_Manager::TEXTAREA,
                'label_block'   => true,
                'default'       => esc_html__( 'Forget what you can get and see what you can give', 'bcharity' )
            ]
        );
        $this->add_control(
            'btnlabel',
            [
                'label'         => esc_html__( 'Button Label', 'bcharity' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => esc_html__( 'Become a Volunteer', 'bcharity' )
            ]
        );
        $this->add_control(
            'btnurl',
            [
                'label'         => esc_html__( 'Button Url', 'bcharity' ),
                'type'          => Controls_Manager::URL,
                'show_external' => false,
                'default'       => [
                    'url'       => '#'
                ]
            ]
        );
		$this->end_controls_section(); // End become_volunteer content

        // Color Settings ==============================
        $this->start_controls_section(
            'color_sect', [
                'label' => __( 'Color Settings', 'bcharity' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
		$this->add_control(
			'color_title', [
				'label'     => __( 'Title Color', 'bcharity' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .intro_video_bg h2' => 'color: {{VALUE}};',
				],
			]
        );
        
        $this->add_control(
            'btn_styles_sep', [
                'label'     => __( 'Button Styles', 'bcharity' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );    

        $this->add_control(
            'btn_bg_color', [
                'label'     => __( 'Button Bg Color', 'bcharity' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .intro_video_bg .btn_2' => 'background-color: {{VALUE}};border-color: {{VALUE}};',
                ],
            ]
        ); 

        $this->add_control(
            'btn_txt_color', [
                'label'     => __( 'Button Text Color', 'bcharity' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .intro_video_bg .btn_2' => 'color: {{VALUE}};',
                ],
            ]
        ); 

        $this->add_control(
            'btn_hvr_bg_color', [
                'label'     => __( 'Button Hover Bg Color', 'bcharity' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .intro_video_bg .btn_2:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        ); 

        $this->add_control(
            'btn_hvr_txt_color', [
                'label'     => __( 'Button Hover Text Color', 'bcharity' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .intro_video_bg .btn_2:hover' => 'color: {{VALUE}};border-color: {{VALUE}};',
                ],
            ]
        ); 

        $this->end_controls_section();

        /**
         * Style Tab
         * ------------------------------ Background Style ------------------------------
         *
         */
        $this->start_controls_section(
            'section_bg', [
                'label' => __( 'Style Background', 'bcharity' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_control(
            'section_bg_overlay_sep',
            [
                'label'     => __( 'Background Overlay', 'bcharity' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'section_bg_overlay', [
                'label'     => __( 'Background Overlay Color', 'bcharity' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .intro_video_bg:after' => 'background-color: {{VALUE}};',
                ],
            ]
        ); 
        
        $this->add_control(
            'section_bgheading',
            [
                'label'     => __( 'Background Settings', 'bcharity' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'sectionbg',
                'label' => __( 'Background', 'bcharity' ),
                'types' => [ 'classic' ],
                'selector' => '{{WRAPPER}} .intro_video_bg',
            ]
        );

        $this->end_controls_section();


	}

	protected function render() {
        $settings     = $this->get_settings();
        $title_txt    = !empty( $settings['title_txt'] ) ? $settings['title_txt'] : '';
        $button_label = !empty( $settings['btnlabel'] ) ? $settings['btnlabel'] : '';
        $button_url   = !empty( $settings['btnurl']['url'] ) ? $settings['btnurl']['url'] : '';
        ?>

    <!-- become a volunteer start-->
    <section class="intro_video_bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <div class="intro_video_iner text-center">
                        <?php
                            //Title text ==============
                            if( $title_txt ){
                                echo '<h2>' . esc_html( $title_txt ) . '</h2>';
                            }
                            // Button =============
                            if( $button_label ){
                                echo '<a class="btn_2" href="'. esc_url( $button_url ) .'">'. esc_html( $button_label ) .'</a>';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- become a volunteer part end-->
    <?php

    }

}
