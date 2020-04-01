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
class Bcharity_Counter extends Widget_Base {

	public function get_name() {
		return 'bcharity-counter';
	}

	public function get_title() {
		return __( 'Counter', 'bcharity' );
	}

	public function get_icon() {
		return 'eicon-countdown';
	}

	public function get_categories() {
		return [ 'bcharity-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  Customers review content ------------------------------
		$this->start_controls_section(
			'counter_label_content',
			[
				'label' => __( 'Counter Setting', 'bcharity' ),
			]
		);

		$this->add_control(
            'counter_contents', [
                'label' => __( 'Create New', 'bcharity' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ count_title }}}',
                'fields' => [
                    [
                        'name'      => 'icon',
                        'label'     => __( 'Counter Icon', 'bcharity' ),
                        'type'      => Controls_Manager::ICON,
                        'default'   => 'cap',
                        'options'   => bcharity_themify_icon()
                    ],
                    [
                        'name'  => 'count_title',
                        'label' => __( 'Counter Title', 'bcharity' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => __( 'Total Collection', 'bcharity' ),
                    ],
                    [
                        'name'  => 'count_val',
                        'label' => __( 'Counter Value', 'bcharity' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => '58,9672412'
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
			'style_item',
			[
				'label' => __( 'Style Item', 'bcharity' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_control(
            'counter_icon_color', [
                'label'     => __( 'Counter Icon Color', 'bcharity' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .counter .single_counter .eci' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'counter_title_color', [
                'label'     => __( 'Counter title Color', 'bcharity' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .counter .single_counter p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'counter_value_color', [
                'label'     => __( 'Counter value Color', 'bcharity' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .counter .single_counter .count' => 'color: {{VALUE}};',
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
                'selector' => '{{WRAPPER}} .counter',
            ]
        );

        $this->end_controls_section();

	}

	protected function render() {

    $settings = $this->get_settings();
    // call load widget script
	$this->load_widget_script();
    $counter_contents = !empty( $settings['counter_contents'] ) ? $settings['counter_contents'] : '';
    ?>

    <!-- counter part start-->
    <section class="counter">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <?php
                    if( is_array( $counter_contents ) && count( $counter_contents ) > 0 ){
                        foreach ($counter_contents as $counter ) {
                            $icon        = !empty( $counter['icon'] ) ? $counter['icon'] : '';
                            $count_title = !empty( $counter['count_title'] ) ? $counter['count_title'] : '';
                            $count_val   = !empty( $counter['count_val'] ) ? $counter['count_val'] : '';
                        ?>
                        <div class="single_counter d-flex">
                            <?php
                                // Icon ----------------------
                                if( $icon ){
                                    echo '<span class="'. esc_attr( $icon ) .'"></span>';
                                }

                                echo '<div class="single_counter_text">';
                                
                                    // Counter Title ----------------------
                                    if( $count_title ){
                                        echo '<p>'. esc_html( $count_title ) .'</p>';
                                    }

                                    // Count value ----------------------
                                    if( $count_val ){
                                        echo '<span class="count">'. esc_html( $count_val ) .' </span>';
                                    }

                                echo '</div>';
                            ?>
                        </div>
                        <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
    <!-- counter part end-->
    <?php

    }

    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){
            //counter up
            $('.count').counterUp({
            delay: 10,
            time: 2000
            });
        })(jQuery);
        </script>
        <?php 
        }
    }
	
}
