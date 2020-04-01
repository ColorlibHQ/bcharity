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
class Bcharity_Passion extends Widget_Base {

	public function get_name() {
		return 'bcharity-passions';
	}

	public function get_title() {
		return __( 'Passions', 'bcharity' );
	}

	public function get_icon() {
		return 'eicon-info-box';
	}

	public function get_categories() {
		return [ 'bcharity-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // ----------------------------------------  Passion Section ------------------------------
        $this->start_controls_section(
            'passions_heading',
            [
                'label' => __( 'Passion Heading', 'bcharity' ),
            ]
        );
        $this->add_control(
            'passion_header',
            [
                'label'         => esc_html__( 'Passion Header', 'bcharity' ),
                'description'   => esc_html__('Use <br> tag for line break', 'bcharity'),
                'type'          => Controls_Manager::WYSIWYG,
                'label_block'   => true,
                'default'       => __( '<p>Donation shows Passion</p><h2>Featured causes</h2>', 'bcharity' )
            ]
        );

        $this->end_controls_section(); // End section top content
        
		// ----------------------------------------   Passions content ------------------------------
		$this->start_controls_section(
			'passions_block',
			[
				'label' => __( 'Passions', 'bcharity' ),
			]
		);
		$this->add_control(
            'passions_content', [
                'label' => __( 'Create Passion', 'bcharity' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ title }}}',
                'fields' => [
                    [
                        'name'      => 'image',
                        'label'     => __( 'Select Image', 'bcharity' ),
                        'type'  => Controls_Manager::MEDIA,
                    ],
                    [
                        'name'  => 'title',
                        'label' => __( 'Title', 'bcharity' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => __( 'Fourth created forth fill moving created subdue be', 'bcharity' )
                    ],
                    [
                        'name'  => 'percentage_val',
                        'label' => __( 'Percentage Value In Slide', 'bcharity' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => '75%'
                    ],
                    [
                        'name'  => 'goal_icon',
                        'label' => __( 'Goal Icon', 'bcharity' ),
                        'type'      => Controls_Manager::ICON,
                        'label_block'   => true,
                        'default'   => 'fa fa-mobile',
                        'options'   => bcharity_flaticon_list()
                    ],
                    [
                        'name'      => 'goal_title',
                        'label'     => __( 'Goal Title', 'bcharity' ),
                        'type'      => Controls_Manager::TEXT,
                        'label_block'   => true,
                        'default'   => __( 'Goal: $2500', 'bcharity' )
                    ],
                    [
                        'name'  => 'raised_icon',
                        'label' => __( 'Raised Icon', 'bcharity' ),
                        'type'      => Controls_Manager::ICON,
                        'label_block'   => true,
                        'default'   => 'fa fa-mobile',
                        'options'   => bcharity_flaticon_list()
                    ],
                    [
                        'name'      => 'raised_title',
                        'label'     => __( 'Raised Title', 'bcharity' ),
                        'type'      => Controls_Manager::TEXT,
                        'label_block'   => true,
                        'default'   => __( 'Raised: $1533', 'bcharity' )
                    ],
                    [
                        'name'      => 'btn_label',
                        'label'     => __( 'Button Label', 'bcharity' ),
                        'type'      => Controls_Manager::TEXT,
                        'default'   => __( 'read more', 'bcharity' )
                    ],
                    [
                        'name'      => 'btn_url',
                        'label'     => __( 'Button URL', 'bcharity' ),
                        'type'      => Controls_Manager::URL,
                        'default'   => [
                            'url'   => '#'
                        ]
                    ],
                ],
            ]
        );

		$this->end_controls_section(); // End Passions content

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
                    '{{WRAPPER}} .passion_part .section_tittle p' => 'color: {{VALUE}};',
                ],
            ]
        );    

        $this->add_control(
            'color_sub_ttitle', [
                'label'     => __( 'Big Title Color', 'bcharity' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .passion_part .section_tittle h2' => 'color: {{VALUE}};',
                ],
            ]
        );    
        
        $this->end_controls_section();

        // Single Passion Color Settings ==============================
        $this->start_controls_section(
            'single_serv_color_sett', [
                'label' => __( 'Single Passion Color Settings', 'bcharity' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'item_title_color', [
                'label'     => __( 'Item Title Color', 'bcharity' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .passion_part .single-home-passion .card h5' => 'color: {{VALUE}};',
                ],
            ]
        );    
        $this->add_control(
            'item_title_hvr_color', [
                'label'     => __( 'Item Title Hover Color', 'bcharity' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .passion_part .single-home-passion .card h5:hover' => 'color: {{VALUE}};',
                ],
            ]
        );    
        $this->add_control(
            'slide_color', [
                'label'     => __( 'Slide Color', 'bcharity' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .passion_part .skill-bar, .passion_part .skill-bar:after' => 'background-color: {{VALUE}};',
                ],
            ]
        );    
        $this->add_control(
            'goal_raised_icon_color', [
                'label'     => __( 'Goal & Raised Icon Color', 'bcharity' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .passion_part .single-home-passion .card ul li span' => 'color: {{VALUE}};',
                ],
            ]
        );    
        $this->add_control(
            'goal_raised_txt_color', [
                'label'     => __( 'Goal & Raised Text Color', 'bcharity' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .passion_part .single-home-passion .card ul li' => 'color: {{VALUE}};',
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
                    '{{WRAPPER}} .passion_part .single-home-passion .card .card-body a' => 'background-color: {{VALUE}};border-color: {{VALUE}};',
                ],
            ]
        ); 

        $this->add_control(
            'btn_txt_color', [
                'label'     => __( 'Button Text Color', 'bcharity' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .passion_part .single-home-passion .card .card-body a' => 'color: {{VALUE}}!important;',
                ],
            ]
        ); 

        $this->add_control(
            'btn_hvr_bg_color', [
                'label'     => __( 'Button Hover Bg Color', 'bcharity' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .passion_part .single-home-passion .card .card-body a:hover' => 'background-color: {{VALUE}}!important;border-color: {{VALUE}}',
                ],
            ]
        ); 

        $this->add_control(
            'btn_hvr_txt_color', [
                'label'     => __( 'Button Hover Text Color', 'bcharity' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .passion_part .single-home-passion .card .card-body a:hover' => 'color: {{VALUE}}!important;',
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
                'selector' => '{{WRAPPER}} .passion_part',
            ]
        );
        $this->end_controls_section();

	}

	protected function render() {

    $settings = $this->get_settings();
    $passion_header = !empty( $settings['passion_header'] ) ? $settings['passion_header'] : '';
    $passions = !empty( $settings['passions_content'] ) ? $settings['passions_content'] : '';
    ?>

    <!--::passion part start::-->
    <section class="passion_part section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8">
                    <div class="section_tittle text-center">
                        <?php
                            // Passion Header =============
                            if( $passion_header ){
                                echo wp_kses_post( wpautop( $passion_header ) );
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                if( is_array( $passions ) && count( $passions ) > 0 ){
                    foreach ( $passions as $passion ) {
                        $passion_img    = !empty( $passion['image']['id'] ) ? wp_get_attachment_image( $passion['image']['id'], 'bcharity_passion_part_360x411', false, array( 'class' => 'card-img-top', 'alt' => 'passion image' ) ) : '';
                        $passion_title  = !empty( $passion['title'] ) ? $passion['title'] : '';
                        $percentage_val = !empty( $passion['percentage_val'] ) ? $passion['percentage_val'] : '';
                        $goal_icon      = !empty( $passion['goal_icon'] ) ? $passion['goal_icon'] : '';
                        $goal_title     = !empty( $passion['goal_title'] ) ? $passion['goal_title'] : '';
                        $raised_icon    = !empty( $passion['raised_icon'] ) ? $passion['raised_icon'] : '';
                        $raised_title   = !empty( $passion['raised_title'] ) ? $passion['raised_title'] : '';
                        $btn_label      = !empty( $passion['btn_label'] ) ? $passion['btn_label'] : '';
                        $btn_url        = !empty( $passion['btn_url']['url'] ) ? $passion['btn_url']['url'] : '';
                ?>
                <div class="col-sm-6 col-lg-4 col-xl-4">
                    <div class="single-home-passion">
                        <div class="card">
                            <?php
                                if( $passion_img ){
                                    echo wp_kses_post( $passion_img );
                                }
                            ?>
                            <div class="card-body">
                                <a href="passion.html">
                                    <h5 class="card-title"><?php echo esc_html( $passion_title );?> </h5>
                                </a>
                                <div class="skill">
                                    <div class="skill-bar skill11 wow slideInLeft animated" style="width: <?php echo esc_html( $percentage_val )?>">
                                        <span class="skill-count11"><?php echo esc_html( $percentage_val );?></span>
                                    </div>
                                </div>
                                <ul>
                                    <li><span class="<?php echo esc_html( $goal_icon );?>"></span> <?php echo esc_html( $goal_title );?></li>
                                    <li><span class="<?php echo esc_html( $raised_icon );?>"></span> <?php echo esc_html( $raised_title );?></li>
                                </ul>
                                <a href="<?php echo esc_url( $btn_url );?>" class="btn_3"><?php echo esc_html( $btn_label );?></a>
                            </div>
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
    <!--::passion part end::-->
    <?php
    }
}
