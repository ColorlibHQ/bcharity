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
 * Bcharity elementor section widget.
 *
 * @since 1.0
 */
class Bcharity_Partners extends Widget_Base {

	public function get_name() {
		return 'bcharity-partners';
	}

	public function get_title() {
		return __( 'Partners', 'bcharity' );
	}

	public function get_icon() {
		return 'eicon-post-slider';
	}

	public function get_categories() {
		return [ 'bcharity-elements' ];
	}

	protected function _register_controls() {

        // Partners Heading
		$this->start_controls_section(
			'section_heading',
			[
				'label' => __( 'Section Heading', 'bcharity' ),
			]
		);
        $this->add_control(
			'sec_title',
			[
				'label'         => esc_html__( 'Section Title', 'bcharity' ),
				'description'   => __( "Use < span> tag for color and italic word", "bcharity" ),
				'type'          => Controls_Manager::WYSIWYG,
				'label_block'   => true,
				'default'       => __( '<p>OUr Client</p><h2>Worldwide Partners</h2>', 'bcharity' )
			]
        );
		$this->end_controls_section();  


		// ----------------------------------------  Partners content ------------------------------
		$this->start_controls_section(
			'partners_content',
			[
				'label' => __( 'Our Partners', 'bcharity' ),
			]
		);

		$this->add_control(
            'partner_slider', [
                'label' => __( 'Create New', 'bcharity' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ client_name }}}',
                'fields' => [
                    [
                        'name'  => 'client_logo',
                        'label' => __( 'Client Logo', 'bcharity' ),
                        'type'  => Controls_Manager::MEDIA,
                    ],
                    [
                        'name'  => 'client_name',
                        'label' => __( 'Client Name', 'bcharity' ),
                        'type'  => Controls_Manager::TEXT,
                        'default'   => __('Creative', 'bcharity')
                    ],
                ],
            ]
		);

		$this->end_controls_section(); // End exibition content

        /**
         * Style Tab
         *
         */
		//------------------------------ Style Section ------------------------------
		$this->start_controls_section(
			'style_section', [
				'label' => __( 'Style Section Heading', 'bcharity' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'color_secttitle', [
				'label'     => __( 'Section Title Color', 'bcharity' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .client_part .section_tittle p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'color_big_ttitle', [
				'label'     => __( 'Big Title Color', 'bcharity' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .client_part .section_tittle h2' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();



        /*------------------------------ Background Style ------------------------------*/
		$this->start_controls_section(
            'section_bg', [
                'label' => __( 'Style Background', 'bcharity' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'client_bg_sep',
            [
                'label'     => __( 'Background Settings', 'bcharity' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'section-bg',
                'label' => __( 'Section Background', 'bcharity' ),
                'types' => [ 'classic' ],
                'selector' => '{{WRAPPER}} .client_part',
            ]
        );

        $this->end_controls_section();

	}

	protected function render() {

    $settings = $this->get_settings();

    // call load widget script
    $this->load_widget_script();
    
	$title          = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $partners       = !empty( $settings['partner_slider'] ) ? $settings['partner_slider'] : '';
    ?>


    <!--::our client part start::-->
    <section class="client_part">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8">
                    <div class="section_tittle text-center">
                        <?php
                            //Title text ==============
                            if( $title ){
                                echo wp_kses_post( wpautop( $title ) );
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="client_logo owl-carousel">
                        <?php
                            if( is_array( $partners ) && count( $partners ) > 0 ){
                                foreach ($partners as $partner ) {
                                    $image = !empty( $partner['client_logo']['id'] ) ? wp_get_attachment_image( $partner['client_logo']['id'], 'bcharity_partners_155x70', '', array('class' => 'image','alt' => $partner['client_name'] ) ) : '';
                                    $cName = !empty( $partner['client_name'] ) ? $partner['client_name'] : '';
                                    ?>
                                    <div class="single_client_logo">
                                        <?php
                                            if( $image ){
                                                echo wp_kses_post( $image );
                                            }
                                        ?>
                                    </div>
                                    <?php
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--::our client part end::-->
    <?php

    }

    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){
            $(document).ready(function() {
                var client = $('.client_logo');
                if (client.length) {
                client.owlCarousel({
                    items: 6,
                    loop: true,
                    dots: false,
                    autoplay: true,
                    autoplayHoverPause: true,
                    autoplayTimeout: 5000,
                    nav: false,
                    smartSpeed: 2000,
                    margin: 20,
                    responsive: {
                    0: {
                        items: 3
                    },
                    577: {
                        items:3,
                    },
                    991: {
                        items:5,
                    },
                    1200: {
                        items: 6,
                    }
                    },
                });
                }
            });
        })(jQuery);
        </script>
        <?php 
        }
    }
	
}
