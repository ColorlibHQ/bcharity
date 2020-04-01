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
class Bcharity_Be_Part extends Widget_Base {

	public function get_name() {
		return 'bcharity-be-part';
	}

	public function get_title() {
		return __( 'Be A Part', 'bcharity' );
	}

	public function get_icon() {
		return 'eicon-thumbnails-half';
	}

	public function get_categories() {
		return [ 'bcharity-elements' ];
	}

	protected function _register_controls() {

        
		// ----------------------------------------  Be Part content ------------------------------
		$this->start_controls_section(
			'be_part_content',
			[
				'label' => __( 'Be Part Section', 'bcharity' ),
			]
		);
        
        $this->add_control(
            'left_text',
            [
                'label'         => esc_html__( 'Left Text', 'bcharity' ),
                'description'   => esc_html__('Use <br> tag for line break', 'bcharity'),
                'type'          => Controls_Manager::WYSIWYG,
                'label_block'   => true,
                'default'       => __( '<h2>Be a part of the break through and make someones dream come true</h2><p>Our his abundantly subdue she\'d night own of two two his herb seasons face you hesea placees can\'t upon dominion make beginning fowl waters seasons in also moveth hand beginning living face kind beginning from asid</p>', 'bcharity' )
            ]
        );
        $this->add_control(
            'btnlabel',
            [
                'label'         => esc_html__( 'Button Label', 'bcharity' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => esc_html__( 'learn more', 'bcharity' )
            ]
        );
        $this->add_control(
            'btnurl',
            [
                'label'         => esc_html__( 'Button Url', 'bcharity' ),
                'type'          => Controls_Manager::URL,
                'show_external' => false
            ]
        );

        $this->add_control(
			'right_img_sep',
			[
				'label'         => esc_html__( 'Right Image Section', 'bcharity' ),
                'type'          => Controls_Manager::HEADING,
                'separator'       => 'after'
			]
		);

        $this->add_control(
			'be_part_img',
			[
				'label'         => esc_html__( 'Select Image', 'bcharity' ),
                'type'          => Controls_Manager::MEDIA,
                'default'       => [
                    'url'       => Utils::get_placeholder_image_src(),
                ]
			]
		);
        $this->end_controls_section(); // End be-part content
        

        // Color Settings ==============================
        $this->start_controls_section(
            'color_sect', [
                'label' => __( 'Color Settings', 'bcharity' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
		$this->add_control(
			'left_title', [
				'label'     => __( 'Title Color', 'bcharity' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .be_part .be_part_text h2' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'text_color', [
				'label'     => __( 'Text Color', 'bcharity' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .be_part .be_part_text p' => 'color: {{VALUE}};',
				],
			]
        );

		$this->add_control(
			'button_styles_sep', [
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
					'{{WRAPPER}} .be_part .be_part_text .btn_2' => 'background-color: {{VALUE}};border-color: {{VALUE}};',
				],
			]
        );

		$this->add_control(
			'btn_txt_color', [
				'label'     => __( 'Button Txt Color', 'bcharity' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .be_part .be_part_text .btn_2' => 'color: {{VALUE}};',
				],
			]
        );

		$this->add_control(
			'btn_hvr_bg_color', [
				'label'     => __( 'Button Hover Bg Color', 'bcharity' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .be_part .be_part_text .btn_2:hover' => 'background-color: {{VALUE}};',
				],
			]
        );

		$this->add_control(
			'btn_hvr_txt_color', [
				'label'     => __( 'Button Hover Txt Color', 'bcharity' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .be_part .be_part_text .btn_2:hover' => 'color: {{VALUE}};border-color: {{VALUE}};',
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
                'selector' => '{{WRAPPER}} .be_part',
            ]
        );

        $this->end_controls_section();


	}

	protected function render() {
        $settings     = $this->get_settings();
        $left_text    = !empty( $settings['left_text'] ) ? $settings['left_text'] : '';
        $button_label = !empty( $settings['btnlabel'] ) ? $settings['btnlabel'] : '';
        $button_url   = !empty( $settings['btnurl']['url'] ) ? $settings['btnurl']['url'] : '';
        $right_img   = !empty( $settings['be_part_img']['id'] ) ? wp_get_attachment_image( $settings['be_part_img']['id'], 'bcharity_be_part_img_938x689', false, array( 'class' => 'be_img', 'alt' => 'be a part image' ) ) : '';
        ?>

    <!-- be part section start-->
    <section class="be_part">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-6">
                    <div class="be_part_text">
                        <?php
                            //Left text ==============
                            if( $left_text ){
                                echo wp_kses_post( wpautop( $left_text ) );
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
        <?php
            if( $right_img ){
                echo wp_kses_post( $right_img );
            }
        ?>
    </section>
    <!-- be part section end-->
    <?php

    }

}
