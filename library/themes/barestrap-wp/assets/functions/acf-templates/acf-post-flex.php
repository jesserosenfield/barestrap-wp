<?php
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array (
	'key' => 'group_56e53e6bc4cf2',
	'title' => 'Post Flexible Layout',
	'fields' => array (
		array (
			'key' => 'field_56e53e7a3dd01',
			'label' => 'Section',
			'name' => 'post_fl',
			'type' => 'flexible_content',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'button_label' => 'Add a section',
			'min' => '',
			'max' => '',
			'layouts' => array (
				array (
					'key' => '56e53e8a3f758',
					'name' => 'default',
					'label' => 'Default Text',
					'display' => 'block',
					'sub_fields' => array (
						array (
							'key' => 'field_56e53ebf3dd02',
							'label' => 'Text',
							'name' => 'fl_txt',
							'type' => 'wysiwyg',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'tabs' => 'all',
							'toolbar' => 'full',
							'media_upload' => 1,
						),
					),
					'min' => '',
					'max' => '',
				),
				array (
					'key' => '56e62cf39e43f',
					'name' => 'two_col',
					'label' => 'Two Column',
					'display' => 'block',
					'sub_fields' => array (
						array (
							'key' => 'field_56e62d079e440',
							'label' => 'Text',
							'name' => 'fl_tc_txt',
							'type' => 'wysiwyg',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'tabs' => 'all',
							'toolbar' => 'full',
							'media_upload' => 1,
						),
					),
					'min' => '',
					'max' => '',
				),
				array (
					'key' => '57052ea232347',
					'name' => 'three_column',
					'label' => 'Three Column',
					'display' => 'block',
					'sub_fields' => array (
						array (
							'key' => 'field_57052eac32348',
							'label' => 'Column #1 Text',
							'name' => 'col_1_txt',
							'type' => 'wysiwyg',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'tabs' => 'all',
							'toolbar' => 'full',
							'media_upload' => 1,
						),
						array (
							'key' => 'field_57052ebd32349',
							'label' => 'Image',
							'name' => 'col_img',
							'type' => 'image',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'return_format' => 'array',
							'preview_size' => 'thumbnail',
							'library' => 'all',
							'min_width' => '',
							'min_height' => '',
							'min_size' => '',
							'max_width' => '',
							'max_height' => '',
							'max_size' => '',
							'mime_types' => '',
						),
						array (
							'key' => 'field_57052ecd3234a',
							'label' => 'Column #2 Text',
							'name' => 'col_2_txt',
							'type' => 'wysiwyg',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'tabs' => 'all',
							'toolbar' => 'full',
							'media_upload' => 1,
						),
					),
					'min' => '',
					'max' => '',
				),
				array (
					'key' => '56e53f393dd03',
					'name' => 'slider',
					'label' => 'Image Slider',
					'display' => 'block',
					'sub_fields' => array (
						array (
							'key' => 'field_56e53f493dd04',
							'label' => 'Image Slides',
							'name' => 'fl_slides',
							'type' => 'repeater',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'collapsed' => '',
							'min' => '',
							'max' => '',
							'layout' => 'block',
							'button_label' => 'Add a slide',
							'sub_fields' => array (
								array (
									'key' => 'field_56e53f6a3dd05',
									'label' => 'Image (700px wide)',
									'name' => 'fl_slide_img',
									'type' => 'image',
									'instructions' => '',
									'required' => 0,
									'conditional_logic' => 0,
									'wrapper' => array (
										'width' => '',
										'class' => '',
										'id' => '',
									),
									'return_format' => 'id',
									'preview_size' => 'thumbnail',
									'library' => 'all',
									'min_width' => '',
									'min_height' => '',
									'min_size' => '',
									'max_width' => '',
									'max_height' => '',
									'max_size' => '',
									'mime_types' => '',
								),
								array (
									'key' => 'field_56e540213dd06',
									'label' => 'Lightbox Image (1280px max-width)',
									'name' => 'fl_slide_lb',
									'type' => 'image',
									'instructions' => '',
									'required' => 0,
									'conditional_logic' => 0,
									'wrapper' => array (
										'width' => '',
										'class' => '',
										'id' => '',
									),
									'return_format' => 'id',
									'preview_size' => 'thumbnail',
									'library' => 'all',
									'min_width' => '',
									'min_height' => '',
									'min_size' => '',
									'max_width' => '',
									'max_height' => '',
									'max_size' => '',
									'mime_types' => '',
								),
								array (
									'key' => 'field_56e540663dd07',
									'label' => 'Caption',
									'name' => 'fl_slide_cap',
									'type' => 'text',
									'instructions' => '',
									'required' => 0,
									'conditional_logic' => 0,
									'wrapper' => array (
										'width' => '',
										'class' => '',
										'id' => '',
									),
									'default_value' => '',
									'placeholder' => '',
									'prepend' => '',
									'append' => '',
									'maxlength' => '',
									'readonly' => 0,
									'disabled' => 0,
								),
							),
						),
					),
					'min' => '',
					'max' => '',
				),
				array (
					'key' => '56e540a56dd5c',
					'name' => 'imgcol',
					'label' => 'Image Column',
					'display' => 'block',
					'sub_fields' => array (
						array (
							'key' => 'field_56e540e46dd5d',
							'label' => 'Images',
							'name' => 'fl_imgcol',
							'type' => 'repeater',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'collapsed' => '',
							'min' => 2,
							'max' => 2,
							'layout' => 'block',
							'button_label' => 'Add an image',
							'sub_fields' => array (
								array (
									'key' => 'field_56e541096dd5e',
									'label' => 'Image (335px min-width)',
									'name' => 'fl_imgcol_img',
									'type' => 'image',
									'instructions' => '',
									'required' => 0,
									'conditional_logic' => 0,
									'wrapper' => array (
										'width' => '',
										'class' => '',
										'id' => '',
									),
									'return_format' => 'id',
									'preview_size' => 'thumbnail',
									'library' => 'all',
									'min_width' => '',
									'min_height' => '',
									'min_size' => '',
									'max_width' => '',
									'max_height' => '',
									'max_size' => '',
									'mime_types' => '',
								),
								array (
									'key' => 'field_56e54a0195bed',
									'label' => 'Lightbox Image (1280px max-width)',
									'name' => 'fl_imgcol_lb',
									'type' => 'image',
									'instructions' => '',
									'required' => 0,
									'conditional_logic' => 0,
									'wrapper' => array (
										'width' => '',
										'class' => '',
										'id' => '',
									),
									'return_format' => 'id',
									'preview_size' => 'thumbnail',
									'library' => 'all',
									'min_width' => '',
									'min_height' => '',
									'min_size' => '',
									'max_width' => '',
									'max_height' => '',
									'max_size' => '',
									'mime_types' => '',
								),
								array (
									'key' => 'field_56e541966dd5f',
									'label' => 'Caption',
									'name' => 'fl_imgcol_cap',
									'type' => 'text',
									'instructions' => '',
									'required' => 0,
									'conditional_logic' => 0,
									'wrapper' => array (
										'width' => '',
										'class' => '',
										'id' => '',
									),
									'default_value' => '',
									'placeholder' => '',
									'prepend' => '',
									'append' => '',
									'maxlength' => '',
									'readonly' => 0,
									'disabled' => 0,
								),
							),
						),
					),
					'min' => '',
					'max' => '',
				),
				array (
					'key' => '56e541e0f85a5',
					'name' => 'txtimg',
					'label' => 'Text/Img Column',
					'display' => 'block',
					'sub_fields' => array (
						array (
							'key' => 'field_56e54206f85a7',
							'label' => 'Text',
							'name' => 'fl_txtimg_txt',
							'type' => 'wysiwyg',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'tabs' => 'all',
							'toolbar' => 'full',
							'media_upload' => 1,
						),
						array (
							'key' => 'field_56e5427ff85a8',
							'label' => 'Image (440px wide)',
							'name' => 'fl_txtimg_img',
							'type' => 'image',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'return_format' => 'id',
							'preview_size' => 'thumbnail',
							'library' => 'all',
							'min_width' => '',
							'min_height' => '',
							'min_size' => '',
							'max_width' => '',
							'max_height' => '',
							'max_size' => '',
							'mime_types' => '',
						),
						array (
							'key' => 'field_56e54353f85aa',
							'label' => 'Image first?',
							'name' => 'fl_txtimg_rtl',
							'type' => 'true_false',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'message' => '',
							'default_value' => 0,
						),
					),
					'min' => '',
					'max' => '',
				),
				array (
					'key' => '56e5936df20e1',
					'name' => 'full_bleed',
					'label' => 'Full Bleed Image',
					'display' => 'block',
					'sub_fields' => array (
						array (
							'key' => 'field_56e59379f20e2',
							'label' => 'Image (1300 x 570px min-dimensions)',
							'name' => 'fl_fb_img',
							'type' => 'image',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'return_format' => 'array',
							'preview_size' => 'thumbnail',
							'library' => 'all',
							'min_width' => '',
							'min_height' => '',
							'min_size' => '',
							'max_width' => '',
							'max_height' => '',
							'max_size' => '',
							'mime_types' => '',
						),
						array (
							'key' => 'field_56e593d4f20e3',
							'label' => 'Caption',
							'name' => 'fl_fb_cap',
							'type' => 'text',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'maxlength' => '',
							'readonly' => 0,
							'disabled' => 0,
						),
					),
					'min' => '',
					'max' => '',
				),
				array (
					'key' => '57052e6132345',
					'name' => 'gallery',
					'label' => 'Gallery',
					'display' => 'block',
					'sub_fields' => array (
						array (
							'key' => 'field_57052e7032346',
							'label' => 'Gallery Shortcode',
							'name' => 'gallery_shortcode',
							'type' => 'wysiwyg',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'tabs' => 'all',
							'toolbar' => 'full',
							'media_upload' => 1,
						),
					),
					'min' => '',
					'max' => '',
				)
			),
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'post',
			),
		),
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'page',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

endif;
?>