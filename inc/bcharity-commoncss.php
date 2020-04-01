<?php
// Block direct access
if( !defined( 'ABSPATH' ) ){
    exit( 'Direct script access denied.' );
} 
/**
 * @Packge     : BCHARITY
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
 
 
// enqueue css
function bcharity_common_custom_css(){
    
    wp_enqueue_style( 'bcharity-common', get_template_directory_uri().'/assets/css/dynamic.css' );
		$header_bg         		  = esc_url( get_header_image() );
		$header_bg_img 			  = !empty( $header_bg ) ? 'background-image: url('.esc_url( $header_bg ).')' : '';

		$themeColor     		  = bcharity_opt( 'bcharity_theme_color' );

		$buttonBorderColor     	  = bcharity_opt( 'bcharity_button_border_color' );
		$hoverColor     	  	  = bcharity_opt( 'bcharity_hover_color');

		$headerTop_bg     		  = bcharity_opt( 'bcharity_top_header_bg_color' );
		$headerTop_col     		  = bcharity_opt( 'bcharity_top_header_color' );

		$headerBg          		  = bcharity_opt( 'bcharity_header_bg_color');
		$menuColor          	  = bcharity_opt( 'bcharity_header_menu_color' );
		$menuHoverColor           = bcharity_opt( 'bcharity_header_menu_hover_color' ) != '#00c424' ? bcharity_opt('bcharity_header_menu_hover_color') : $themeColor;
		$dropMenuColor            = bcharity_opt( 'bcharity_header_drop_menu_color' );
		$dropMenuHovColor         = bcharity_opt( 'bcharity_header_drop_menu_hover_color' ) != '#00c424' ? bcharity_opt('bcharity_header_drop_menu_hover_color') : $themeColor;
		$headerBtnBgColor         = bcharity_opt( 'bcharity_booking_btn_bg_color' ) != '#00c424' ? bcharity_opt('bcharity_booking_btn_bg_color') : $themeColor;

		$footerwbgColor     	  = bcharity_opt('bcharity_footer_bg_color');
		$footerwTextColor   	  = bcharity_opt('bcharity_footer_widget_text_color') != '#777777' ? bcharity_opt('bcharity_footer_widget_text_color') : '';
		$widgettitlecolor  		  = bcharity_opt('bcharity_footer_widget_title_color');
		$footerwanchorcolor 	  = bcharity_opt('bcharity_footer_widget_anchor_color') != '#00c424' ? bcharity_opt('bcharity_footer_widget_anchor_color') : $themeColor;
		$footerwanchorhovcolor    = bcharity_opt('bcharity_footer_widget_anchor_hover_color') != '#00c424' ? bcharity_opt('bcharity_footer_widget_anchor_hover_color') : $themeColor;

		$fofbg					  = bcharity_opt('bcharity_fof_bg_color');
		$foftonecolor			  = bcharity_opt('bcharity_fof_textone_color');
		$fofttwocolor			  = bcharity_opt('bcharity_fof_texttwo_color');

		$customcss ="
			.hero-banner{
				{$header_bg_img}
			}
			
			.btn_2:hover, .btn_2, .passion_part .single-home-passion .card .card-body a:hover, .form-contact .form-group .btn_1:hover, .wpcf7-form .form-group .btn_1:hover
			{
				border-color: {$themeColor};
			}

			.btn_2:hover, .cta_part .cta_part_iner .cta_part_text p, .about_part .about_text h5, .our_latest_work .single_work_demo h5, .blog_part .single-home-blog .card h5:hover, .blog_part .single-home-blog .card ul li i, .feature_part .single_feature_part .eci, .counter .single_counter .eci, .passion_part .single-home-passion .card h5:hover, .blog_part .single_blog .list-unstyled li:hover a, .blog_part .right_single_blog .single_blog .media-body p a, .blog_area a :hover, .form-contact .form-group .btn_1:hover i, .wpcf7-form .form-group .btn_1:hover i
			{
				color: {$themeColor}
			}			

			.blog_item_date h3:hover, .blog_item_date p:hover
			{
				color: #fff;
			}

			.our_latest_work .single_work_demo .btn_3:hover, .team_member_section .single_team_member .single_team_text h3 a:hover, .team_member_section .single_team_member .team_member_social_icon a:hover, .blog_part .single-home-blog .card .card-body a:hover, .pre_icon a:hover, .next_icon a:hover, .review_part .section_tittle p, .banner-breadcrumb > ol > li.breadcrumb-item > a.bread-link:hover, .review_part .section_tittle p, .banner-breadcrumb .breadcrumb-item a:hover, .blog_details a:hover, .blog_right_sidebar .widget_categories ul li:hover, .blog_right_sidebar .widget_categories ul li:hover a, .blog_right_sidebar .widget_categories ul li a:hover, .volunteers_part .single_blog_item:hover h3{
				color: {$themeColor}!important;
			}

			.btn_2, .review_part .intro_video_bg .video-play-button, .review_part .owl-prev span:after, .review_part .owl-next span:after, .review_part .intro_video_bg .video-play-button:after, .review_part .intro_video_bg .video-play-button:before, .review_part .intro_video_bg .video-play-button:hover:after, .blog_item_img .blog_item_date, .button, .single_sidebar_widget .tagcloud a:hover, .blog_right_sidebar .single_sidebar_widget.widget_bcharity_newsletter .btn, .pre_icon :after, .next_icon :after, .passion_part .skill-bar, .passion_part .skill-bar:after, .volunteers_part .single_blog_item .single_blog_img .social_icon, .form-contact .form-group .btn_1 i
			{
				background: {$themeColor}
			}

			.service_part .single_service_part:hover .single_service_part_iner span, .passion_part .single-home-passion .card .card-body a:hover, .blog_part .right_single_blog .single_blog .media-body:hover, .form-contact .form-group .btn_1:hover, .wpcf7-form .form-group .btn_1:hover, .f0f-content-inner .btn_1:hover
			{
				background: {$themeColor}!important;
			}

			.btn_2:hover,
			.copyright_part .footer-social a:hover
			{
				background: {$hoverColor}!important;
			}

			.blog_part .single-home-blog .card h5:hover
			{
				color: {$hoverColor};
			}

			.about_part .about_img h2:after, .copyright_part .footer-social a
			{
				border-color: {$themeColor}
			}


			.sub_header{
				background: {$headerTop_bg}
			}
			.sub_header .sub_header_social_icon a,
			.sub_header .sub_header_social_icon .register_icon
			{
				color: {$headerTop_col}
			}

			.main_menu.menu_fixed
			{
				background: {$headerBg};
			}
			.main_menu .main-menu-item ul li a
			{
			   color: {$menuColor}!important;
			}
			.main_menu .main-menu-item ul li a:hover
			{
			   color: {$menuHoverColor}!important;
			}
			
			.dropdown .dropdown-menu .dropdown-item
			{
			   color: {$dropMenuColor}!important;
			}
			.dropdown .dropdown-menu .dropdown-item:hover
			{
			   color: {$dropMenuHovColor}!important;
			}

			.main_menu .btn_1:hover{
				background-color: {$headerBtnBgColor}!important;
			}

			.footer-area {
				background-color: {$footerwbgColor};
			}

			.footer-area .single-footer-widget p, .footer-area .single-footer-widget p span, .footer-area .widget_bcharity_newsletter .input-group input, .footer-area .copyright_part_text p, .footer-area .footer_2 .social_icon a
			{
				color: {$footerwTextColor}
			}
			.footer-area .widget_bcharity_newsletter .input-group .form-control, .footer-area .copyright_part_text {
				border-color: {$footerwTextColor}
			}

			.footer-area .widget_bcharity_newsletter .input-group .form-control::placeholder {
				color: {$footerwTextColor};
				opacity: 1;
			}
			
			.footer-area .widget_bcharity_newsletter .input-group .form-control:-ms-input-placeholder {
				color: {$footerwTextColor};
			}
			
			.footer-area .widget_bcharity_newsletter .input-group .form-control::-ms-input-placeholder {
				color: {$footerwTextColor};
			}

			.footer-area .single-footer-widget h4
			{
				color: {$widgettitlecolor}
			}

			.footer-area .copyright_part_text a
			{
			   color: {$footerwanchorcolor};
			}
			.footer-area .btn{
				background: {$footerwanchorcolor};
			}
			.footer-area .copyright_part_text a:hover, .footer-area .footer_2 .social_icon a:hover
			{
			   color: {$footerwanchorhovcolor}!important;
			}

			.f0f-content .h1 {
				color: {$foftonecolor};
			}
			.f0f-content p {
				color: {$fofttwocolor};
			}

        ";
       
    wp_add_inline_style( 'bcharity-common', $customcss );
    
}
add_action( 'wp_enqueue_scripts', 'bcharity_common_custom_css', 50 );