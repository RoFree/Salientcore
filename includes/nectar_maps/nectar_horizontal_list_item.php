<?php 

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

return array(
	"name" => esc_html__("Horizontal List Item", "salient-core"),
	"base" => "nectar_horizontal_list_item",
	"icon" => "icon-wpb-nectar-horizontal-list-item",
	"allowed_container_element" => 'vc_row',
	"category" => esc_html__('Nectar Elements', 'salient-core'),
	"description" => esc_html__('Organize data into a clean list', 'salient-core'),
	"params" => array(
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "Columns",
			'save_always' => true,
			"param_name" => "columns",
			"value" => array(
				"1" => "1",
				"2" => "2",
				"3" => "3",
				"4" => "4"
			)
		),
		
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Column Layout", "salient-core"),
			'save_always' => true,
			"param_name" => "column_layout_using_2_columns",
			"value" => array(
				"Even Widths" => "even",
				"70% | 30%" => "large_first",
				"80% | 20%" => "xlarge_first",
				"30% | 70%" => "small_first",
				"20% | 80%" => "xsmall_first",
			),
			"dependency" => Array('element' => "columns", 'value' => array('2')),
		),
		
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Column Layout", "salient-core"),
			'save_always' => true,
			"param_name" => "column_layout_using_3_columns",
			"value" => array(
				"Even Widths" => "even",
				"20% | 40% | 40%" => "small_first",
				"50% | 25% | 25%" => "large_first",
				"25% | 50% | 25%" => "large_middle",
				"25% | 25% | 50%" => "large_last",	
			),
			"dependency" => Array('element' => "columns", 'value' => array('3')),
		),
		
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Column Layout", "salient-core"),
			'save_always' => true,
			"param_name" => "column_layout_using_4_columns",
			"value" => array(
				"Even Widths" => "even",
				"15% | 35% | 35% | 15%" => "small_first_last",
				"35% | 35% | 15% | 15%" => "large_first",
				"35% | 15% | 35% | 15%" => "large_nth",
				"15% | 35% | 15% | 35%" => "small_nth",
			),
			"dependency" => Array('element' => "columns", 'value' => array('4')),
		),
		
		array(
			"type" => "dropdown",
			"edit_field_class" => "col-md-2",
			'save_always' => true,
			"heading" => "Text Alignment <span class='row-heading'>Column One</span>",
			"param_name" => "col_1_text_align",
			"value" => array(
				"Left" => "left",
				"Center" => "center",
				"Right" => "right"
			)
		),
		array(
			"type" => "dropdown",
			"edit_field_class" => "col-md-2",
			'save_always' => true,
			"heading" => "<span class='row-heading'>Column Two</span>",
			"param_name" => "col_2_text_align",
			"value" => array(
				"Left" => "left",
				"Center" => "center",
				"Right" => "right"
			),
			"dependency" => Array('element' => "columns", 'value' => array('2','3','4')),
		),
		array(
			"type" => "dropdown",
			"edit_field_class" => "col-md-2",
			'save_always' => true,
			"heading" => "<span class='row-heading'>Column Three</span>",
			"param_name" => "col_3_text_align",
			"value" => array(
				"Left" => "left",
				"Center" => "center",
				"Right" => "right"
			),
			"dependency" => Array('element' => "columns", 'value' => array('3','4')),
		),
		array(
			"type" => "dropdown",
			"edit_field_class" => "col-md-2",
			'save_always' => true,
			"heading" => "<span class='row-heading'>Column Four</span>",
			"param_name" => "col_4_text_align",
			"value" => array(
				"Left" => "left",
				"Center" => "center",
				"Right" => "right"
			),
			"dependency" => Array('element' => "columns", 'value' => array('4')),
		),
		
		
		array(
			"type" => "textfield",
			"heading" => esc_html__("Column One Content", "salient-core"),
			"param_name" => "col_1_content",
			"admin_label" => true,
			"description" => esc_html__("Enter your column text here", "salient-core")
		),
		
		array(
			"type" => "textfield",
			"heading" => esc_html__("Column Two Content", "salient-core"),
			"param_name" => "col_2_content",
			"admin_label" => true,
			"description" => esc_html__("Enter your column text here", "salient-core"),
			"dependency" => Array('element' => "columns", 'value' => array('2','3','4')),
		),
		
		array(
			"type" => "textfield",
			"heading" => esc_html__("Column Three Content", "salient-core"),
			"param_name" => "col_3_content",
			"admin_label" => true,
			"description" => esc_html__("Enter your column text here", "salient-core"),
			"dependency" => Array('element' => "columns", 'value' => array('3','4')),
		),
		
		array(
			"type" => "textfield",
			"heading" => esc_html__("Column Four Content", "salient-core"),
			"param_name" => "col_4_content",
			"admin_label" => true,
			"description" => esc_html__("Enter your column text here", "salient-core"),
			"dependency" => Array('element' => "columns", 'value' => array('4')),
		),
		
		array(
			"type" => "textfield",
			"heading" => esc_html__("CTA Text", "salient-core"),
			"param_name" => "cta_1_text",
			"description" => esc_html__("Enter your CTA text here" , "salient-core"),
			"group" => "Call To Action Button"
		),
		
		array(
			"type" => "textfield",
			"heading" => esc_html__("CTA Link URL", "salient-core"),
			"param_name" => "cta_1_url",
			"description" => esc_html__("Enter your URL here" , "salient-core"),
			"group" => "Call To Action Button"
		),
		
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => esc_html__("CTA Open in New Tab", "salient-core"),
			"param_name" => "cta_1_open_new_tab",
			"value" => Array(esc_html__("Yes", "salient-core") => 'true'),
			"group" => "Call To Action Button",
			"description" => ""
		),
		
		array(
			"type" => "textfield",
			"heading" => esc_html__("CTA 2 Text", "salient-core"),
			"param_name" => "cta_2_text",
			"description" => esc_html__("Enter your CTA text here" , "salient-core"),
			"group" => "Call To Action Button 2"
		),
		
		array(
			"type" => "textfield",
			"heading" => esc_html__("CTA 2 Link URL", "salient-core"),
			"param_name" => "cta_2_url",
			"description" => esc_html__("Enter your URL here" , "salient-core"),
			"group" => "Call To Action Button 2"
		),
		
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => esc_html__("CTA 2 Open in New Tab", "salient-core"),
			"param_name" => "cta_2_open_new_tab",
			"value" => Array(esc_html__("Yes", "salient-core") => 'true'),
			"description" => "",
			"group" => "Call To Action Button 2"
		),
		
		
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Inherit Font From", "salient-core"),
			'save_always' => true,
			"param_name" => "font_family",
			"value" => array(
				"p" => "p",
				"h6" => "h6",
				"h5" => "h5",
				"h4" => "h4",
				"h3" => "h3"
			)
		),
		
		array(
			"type" => "textfield",
			"heading" => esc_html__("Full Item Link URL", "salient-core"),
			"param_name" => "url",
			"description" => esc_html__("Adding a URL for this will link your entire list item" , "salient-core")
		),
		
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => esc_html__("Open Full Link In New Tab", "salient-core"),
			"param_name" => "open_new_tab",
			"value" => Array(esc_html__("Yes", "salient-core") => 'true'),
			"description" => ""
		),
		
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Hover Color", "salient-core"),
			"param_name" => "hover_color",
			"admin_label" => false,
			"value" => array(
				"Accent-Color" => "accent-color",
				"Extra-Color-1" => "extra-color-1",
				"Extra-Color-2" => "extra-color-2",	
				"Extra-Color-3" => "extra-color-3",
				"Black" => "black",
				"White" => "white"
			),
			'save_always' => true,
			'description' => esc_html__( 'Choose a color from your','salient-core') . ' <a target="_blank" href="'. esc_url(admin_url()) .'?page=Salient&tab=6"> ' . esc_html__('globally defined color scheme','salient-core') . '</a>',
		),
		
	)
);

?>