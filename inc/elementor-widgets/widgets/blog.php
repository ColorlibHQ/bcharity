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
 * Bcharity elementor few words section widget.
 *
 * @since 1.0
 */

class Bcharity_Blog extends Widget_Base {

	public function get_name() {
		return 'bcharity-blog';
	}

	public function get_title() {
		return __( 'Blog', 'bcharity' );
	}

	public function get_icon() {
		return 'eicon-post-list';
	}

	public function get_categories() {
		return [ 'bcharity-elements' ];
    }
    
    public function bcharity_featured_post_cat(){
        $post_cat_array = [];
        $cat_args = [
            'orderby' => 'name',
            'order'   => 'ASC'
        ];
        $categories = get_categories($cat_args);
        foreach($categories as $category) {
            $args = array(
                'showposts' => 4,
                'category_name' => $category->slug,
                'ignore_sticky_posts'=> 1
            );
            $posts = get_posts($args);
            if ($posts) {
                $post_cat_array[ $category->slug ] = $category->name;
            } else {
                return __( 'Select a different category, because this category have not enough posts.', 'bcharity' );
            }
        }
    
        return $post_cat_array;

             
    }

	protected function _register_controls() {

        // ----------------------------------------  Blog content ------------------------------
        $this->start_controls_section(
            'blog_content',
            [
                'label' => __( 'Latest Blog Post', 'bcharity' ),
            ]
        );
		$this->add_control(
			'sec_title',
			[
				'label'         => esc_html__( 'Section Title', 'bcharity' ),
				'description'   => __( "Use < span> tag for color and italic word", "bcharity" ),
				'type'          => Controls_Manager::WYSIWYG,
				'label_block'   => true,
				'default'       => __( '<p>OUr blog</p><h2>Every Single Update</h2>', 'bcharity' )
			]
        );

        $this->end_controls_section(); // End Blog content


        // Blog post settings
        $this->start_controls_section(
            'blog_post_sec',
            [
                'label' => __( 'Blog Post Settings', 'bcharity' ),
            ]
        );
        $this->add_control(
            'post_cat',
            [
                'label'         => esc_html__( 'Select Category', 'bcharity' ),
                'type'          => Controls_Manager::SELECT,
                'default'       => 'inspiration',
                'description'   => esc_html__( 'Please use the featured images size 1159px width & 811px height or more for better look.', 'bcharity' ),
                'options'       => $this->bcharity_featured_post_cat()
            ]
        );
		$this->add_control(
			'post_order',
			[
				'label'         => esc_html__( 'Post Order', 'bcharity' ),
				'type'          => Controls_Manager::SWITCHER,
				'label_block'   => false,
				'label_on'      => 'ASC',
				'label_off'     => 'DESC',
                'default'       => 'yes',
                'options'       => [
                    'no'        => 'ASC',
                    'yes'       => 'DESC'
                ]
			]
		);

        $this->end_controls_section(); // End few words content


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
                    '{{WRAPPER}} .blog_part .section_tittle p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_big_ttitle', [
                'label'     => __( 'Big Title Color', 'bcharity' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog_part .section_tittle h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        //------------------------------ Single item Style Section ------------------------------
        $this->start_controls_section(
            'blog_post_style_section', [
                'label' => __( 'Blog Post Styles', 'bcharity' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'blog_post_title', [
                'label'     => __( 'Blog Title Color', 'bcharity' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog_part .single_blog .single_appartment_content h4' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .blog_part .right_single_blog .single_blog .media-body h5' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'blog_cat_color', [
                'label'     => __( 'Blog Category Color', 'bcharity' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog_part .right_single_blog .single_blog .media-body p a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'blog_meta_color', [
                'label'     => __( 'Blog Meta Color', 'bcharity' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog_part .single_blog .list-unstyled li a' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .blog_part .single_blog .list-unstyled li a span' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .blog_part .single_blog .list-unstyled li:after' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'hov_style_sep', [
                'label'     => __( 'Hover Styles', 'bcharity' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
            'blog_post_hvr_color', [
                'label'     => __( 'Blog Item Hover Bg Color', 'bcharity' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog_part .right_single_blog .single_blog .media-body:hover' => 'background-color: {{VALUE}}!important;',
                    '{{WRAPPER}} .blog_part .right_single_blog .single_blog .media-body:hover a, .blog_part .right_single_blog .single_blog .media-body:hover h5, .blog_part .right_single_blog .single_blog .media-body:hover .list-unstyled li a span' => 'color: #fff!important;',
                    '{{WRAPPER}} .blog_part .right_single_blog .single_blog .media-body:hover .list-unstyled li:after' => 'background-color: #fff!important;',
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
                'selector' => '{{WRAPPER}} .blog_part',
            ]
        );

        $this->end_controls_section();
	}

	protected function render() {

    $settings  = $this->get_settings();
    $title = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $post_cat = !empty( $settings['post_cat'] ) ? $settings['post_cat'] : '';
    $post_order = !empty( $settings['post_order'] ) ? $settings['post_order'] : '';
    $post_order = $post_order == 'yes' ? 'DESC' : 'ASC';
    ?>

    <!--::blog_part start::-->
    <section class="blog_part padding_bottom">
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
            <div class="row">
                <?php
                    if( function_exists( 'bcharity_latest_blog' ) ) {
                        bcharity_latest_blog( $post_cat, $post_order );
                    }
                ?>
            </div>
        </div>
    </section>
    <!--::blog_part end::-->
    <?php
	}
}
