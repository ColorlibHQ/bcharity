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
 * Bcharity elementor volunteer section widget.
 *
 * @since 1.0
 */
class Bcharity_Volunteer extends Widget_Base {

	public function get_name() {
		return 'bcharity-volunteer';
	}

	public function get_title() {
		return __( 'Volunteer', 'bcharity' );
	}

	public function get_icon() {
		return 'eicon-person';
	}

	public function get_categories() {
		return [ 'bcharity-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // ----------------------------------------  Volunteer Section ------------------------------
        $this->start_controls_section(
            'volunteer_heading',
            [
                'label' => __( 'Volunteer Heading', 'bcharity' ),
            ]
        );
        $this->add_control(
            'volunteer_header',
            [
                'label'         => esc_html__( 'Volunteer Header', 'bcharity' ),
                'description'   => esc_html__('Use <br> tag for line break', 'bcharity'),
                'type'          => Controls_Manager::WYSIWYG,
                'label_block'   => true,
                'default'       => __( '<p>volunteers</p><h2>Expert Volunteers</h2>', 'bcharity' )
            ]
        );

        $this->end_controls_section(); // End section top content
        
		// ----------------------------------------   Volunteers content ------------------------------
		$this->start_controls_section(
			'volunteers_block',
			[
				'label' => __( 'Volunteers', 'bcharity' ),
			]
		);
		$this->add_control(
            'volunteers_content', [
                'label' => __( 'Create Volunteer', 'bcharity' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ label }}}',
                'fields' => [
                    [
                        'name'  => 'image',
                        'label' => __( 'Volunteer Image', 'bcharity' ),
                        'type'  => Controls_Manager::MEDIA,
                    ],
                    [
                        'name'  => 'label',
                        'label' => __( 'Name', 'bcharity' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => __( 'David Phillips', 'bcharity' )
                    ],
                    [
                        'name'      => 'desg',
                        'label'     => __( 'Designation', 'bcharity' ),
                        'type'      => Controls_Manager::TEXT,
                        'default'   => __( 'Project Manager', 'bcharity' )
                    ],
                    [
                        'name'      => 'fb',
                        'label'     => __( 'Facebook URL', 'bcharity' ),
                        'type'      => Controls_Manager::URL,
                        'show_external' => false,
                        'default'   => [
                            'url'   => '#',
                        ]
                    ],
                    [
                        'name'      => 'tw',
                        'label'     => __( 'Twitter URL', 'bcharity' ),
                        'type'      => Controls_Manager::URL,
                        'show_external' => false,
                        'default'   => [
                            'url'   => '#',
                        ]
                    ],
                    [
                        'name'      => 'ins',
                        'label'     => __( 'Instagram URL', 'bcharity' ),
                        'type'      => Controls_Manager::URL,
                        'show_external' => false,
                        'default'   => [
                            'url'   => '#',
                        ]
                    ],
                    [
                        'name'      => 'skp',
                        'label'     => __( 'Skype URL', 'bcharity' ),
                        'type'      => Controls_Manager::URL,
                        'show_external' => false,
                        'default'   => [
                            'url'   => '#',
                        ]
                    ],
                ],
            ]
        );

		$this->end_controls_section(); // End Volunteers content

        /**
         * Style Tab
         * ------------------------------ Style Tab Content ------------------------------
         *
         */

        // Heading Style ==============================
        $this->start_controls_section(
            'color_sect', [
                'label' => __( 'Style Volunteer Heading', 'bcharity' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_secttitle', [
                'label'     => __( 'Title Color', 'bcharity' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .volunteers_part .section_tittle p' => 'color: {{VALUE}};',
                ],
            ]
        );    
        $this->add_control(
            'color_sec_big_title', [
                'label'     => __( 'Big Title Color', 'bcharity' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .volunteers_part .section_tittle h2' => 'color: {{VALUE}};',
                ],
            ]
        );    
        
        $this->end_controls_section();


        // Single Passion Color Settings ==============================
        $this->start_controls_section(
            'single_item_color_sett', [
                'label' => __( 'Single Item Color Settings', 'bcharity' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'item_title_color', [
                'label'     => __( 'Volunteer Name Color', 'bcharity' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .volunteers_part .single_blog_item h3' => 'color: {{VALUE}};',
                ],
            ]
        );    
        $this->add_control(
            'item_sec_title_color', [
                'label'     => __( 'Volunteer Designatioin Color', 'bcharity' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .volunteers_part .single_blog_item p' => 'color: {{VALUE}};',
                ],
            ]
        );    

        $this->add_control(
            'vol_hrv_styles_sep', [
                'label'     => __( 'Volunteer Hover Styles', 'bcharity' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );   

        $this->add_control(
            'item_hvr_bg_color', [
                'label'     => __( 'Volunteer Hover Bg Color', 'bcharity' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .volunteers_part .single_blog_item .single_blog_img .social_icon' => 'background-color: {{VALUE}}!important;',
                ],
            ]
        );    
        $this->add_control(
            'item_hvr_title_color', [
                'label'     => __( 'Volunteer Hover Name Color', 'bcharity' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .volunteers_part .single_blog_item:hover h3' => 'color: {{VALUE}}!important;',
                ],
            ]
        );    

        $this->add_control(
            'item_hvr_sec_title_color', [
                'label'     => __( 'Volunteer Hover Designatioin Color', 'bcharity' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .volunteers_part .single_blog_item:hover p' => 'color: {{VALUE}};',
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
                'selector' => '{{WRAPPER}} .volunteers_part',
            ]
        );

        $this->end_controls_section();


	}

	protected function render() {

    $settings = $this->get_settings();
    $volunteer_header = !empty( $settings['volunteer_header'] ) ? $settings['volunteer_header'] : '';
    $volunteers = !empty( $settings['volunteers_content'] ) ? $settings['volunteers_content'] : '';
    $dynamic_class  = is_front_page() ? 'volunteers_part section_padding' : 'volunteers_part padding_top single_page_volunteers';
    ?>

    <!--::volunteers_part start::-->
    <section class="<?php echo $dynamic_class?>">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8">
                    <div class="section_tittle text-center">
                        <?php
                            // Volunteer Header =============
                            if( $volunteer_header ){
                                echo wp_kses_post( wpautop( $volunteer_header ) );
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                if( is_array( $volunteers ) && count( $volunteers ) > 0 ){
                    foreach ( $volunteers as $volunteer ) {
                        $volunteer_img   = !empty( $volunteer['image']['id'] ) ? wp_get_attachment_image( $volunteer['image']['id'], 'bcharity_volunteer_img_263x360', false, array( 'alt' => $volunteer['label'] ) ) : '';
                        $name       = !empty( $volunteer['label'] ) ? $volunteer['label'] : '';
                        $desig      = !empty( $volunteer['desg'] ) ? $volunteer['desg'] : '';
                        $fb         = !empty( $volunteer['fb']['url'] ) ? $volunteer['fb']['url'] : '';
                        $tw         = !empty( $volunteer['tw']['url'] ) ? $volunteer['tw']['url'] : '';
                        $ins        = !empty( $volunteer['ins']['url'] ) ? $volunteer['ins']['url'] : '';
                        $skp        = !empty( $volunteer['skp']['url'] ) ? $volunteer['skp']['url'] : '';
                ?>
                <div class="col-sm-6 col-lg-3">
                    <div class="single_blog_item">
                        <div class="single_blog_img">
                            <?php
                                if( $volunteer_img ){
                                    echo wp_kses_post( $volunteer_img );
                                }
                            ?>
                            <div class="social_icon">
                                <a href="<?php echo esc_url( $fb );?>"> <i class="ti-facebook"></i> </a>
                                <a href="<?php echo esc_url( $tw );?>"> <i class="ti-twitter-alt"></i> </a>
                                <a href="<?php echo esc_url( $ins );?>"> <i class="ti-instagram"></i> </a>
                                <a href="<?php echo esc_url( $skp );?>"> <i class="ti-skype"></i> </a>
                            </div>
                        </div>
                        <div class="single_text">
                            <div class="single_blog_text">
                                <h3><?php echo esc_html( $name );?></h3>
                                <p><?php echo esc_html( $desig );?></p>
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
    <!--::volunteers_part end::-->
    <?php
    }
}
