<?php
function bcharity_portfolio_metabox( $meta_boxes ) {

	$bcharity_prefix = '_bcharity_';
	$meta_boxes[] = array(
		'id'        => 'portfolio_single_metaboxs',
		'title'     => esc_html__( 'Portfolio Single Metabox', 'bcharity' ),
		'post_types'=> array( 'portfolio' ),
		'context'   => 'side',
		'priority'  => 'high',
		'autosave'  => 'false',
		'fields'    => array(
			array(
				'id'         => $bcharity_prefix . 'project_start_time',
				'name'       => esc_html__( 'Project Start Time', 'bcharity' ),
				'type'       => 'time',
				'js_options' => array(
					'stepMinute'      => 10,
					'controlType'     => 'select'
				),
			),
			array(
				'id'    => $bcharity_prefix . 'project_start_date',
				'type'  => 'date',
				'name'  => esc_html__( 'Project Start Date', 'bcharity' ),
				'js_options' => array(
					'dateFormat'      => 'DD, M dd, yy   ',
					'showButtonPanel' => false,
				),
			),
			array(
				'id'         => $bcharity_prefix . 'project_end_time',
				'name'       => esc_html__( 'Project End Time', 'bcharity' ),
				'type'       => 'time',
				'js_options' => array(
					'stepMinute'      => 10,
					'controlType'     => 'select'
				),
			),
			array(
				'id'    => $bcharity_prefix . 'project_end_date',
				'type'  => 'date',
				'name'  => esc_html__( 'Project End Date', 'bcharity' ),
				'js_options' => array(
					'dateFormat'      => 'DD, M dd, yy   ',
					'showButtonPanel' => false,
				),
			),
			array(
				'id'    => $bcharity_prefix . 'project_location',
				'type'  => 'text',
				'name'  => esc_html__( 'Project Location', 'bcharity' ),
				'placeholder' => esc_html__( 'Project Location', 'bcharity' ),
			),
		),
	);


	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'bcharity_portfolio_metabox' );