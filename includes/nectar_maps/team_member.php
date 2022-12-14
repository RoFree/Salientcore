<?php 

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

return array(
	"name" => esc_html__("Team Member", "salient-core"),
	"base" => "team_member",
	"icon" => "icon-wpb-team-member",
	"category" => esc_html__('Nectar Elements', 'salient-core'),
	"description" => esc_html__('Add a team member element', 'salient-core'),
	"params" => array(
		array(
			"type" => "fws_image",
			"heading" => esc_html__("Image", "salient-core"),
			"param_name" => "image_url",
			"value" => "",
			"description" => esc_html__("Select image from media library.", "salient-core")
		),
		array(
			"type" => "fws_image",
			"heading" => esc_html__("Bio Image", "salient-core"),
			"param_name" => "bio_image_url",
			"value" => "",
			"dependency" => Array('element' => "team_memeber_style", 'value' => array('bio_fullscreen')),
			"description" => esc_html__("Image Size Guidelines", "salient-core") . "<br/><strong>" . esc_html__("Bio Image:", "salient-core") . "</strong>" . esc_html__("large with a portrait aspect ratio - will be shown at the full screen height at 50% of the page width.", "salient-core") . "<br/> <strong>" . esc_html__("Team Small Image:", "salient-core") . "</strong> " . esc_html__("Will display at 500x500 so ensure the image you're uploading is at least that size.", "salient-core")
		),
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Team Member Stlye", "salient-core"),
			"param_name" => "team_memeber_style",
			"value" => array(
				esc_html__("Meta below", "salient-core") => "meta_below",
				esc_html__("Meta overlaid", "salient-core") => "meta_overlaid",
				esc_html__("Meta overlaid alt", "salient-core") => "meta_overlaid_alt",
				esc_html__("Bio Shown Fullscreen Modal", "salient-core") => "bio_fullscreen"
			),
			'save_always' => true,
			"description" => esc_html__("Please select the style you desire for your team member.", "salient-core")
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Name", "salient-core"),
			"param_name" => "name",
			"admin_label" => true,
			"description" => esc_html__("Please enter the name of your team member", "salient-core")
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Job Position", "salient-core"),
			"param_name" => "job_position",
			"admin_label" => true,
			"description" => esc_html__("Please enter the job position for your team member", "salient-core")
		),
		array(
			"type" => "textarea",
			"heading" => esc_html__("Team Member Bio", "salient-core"),
			"param_name" => "team_member_bio",
			"description" => esc_html__("The main text portion of your team member", "salient-core"),
			"dependency" => Array('element' => "team_memeber_style", 'value' => array('bio_fullscreen'))
		),
		array(
			"type" => "textarea",
			"heading" => esc_html__("Description", "salient-core"),
			"param_name" => "description",
			"description" => esc_html__("The main text portion of your team member", "salient-core"),
			"dependency" => Array('element' => "team_memeber_style", 'value' => array('meta_below'))
		),
		array(
			"type" => "iconpicker",
			"heading" => esc_html__("Social Icon", "salient-core"),
			"param_name" => "social_icon_1",
			"settings" => array( "emptyIcon" => true, "iconsPerPage" => 4000 ),
			"dependency" => Array('element' => "team_memeber_style", 'value' => array('bio_fullscreen')),
			"description" => ''
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Social Link", "salient-core"),
			"param_name" => "social_link_1",
			"dependency" => Array('element' => "team_memeber_style", 'value' => array('bio_fullscreen')),
			"description" => esc_html__("Please enter the URL here", "salient-core")
		),
		array(
			"type" => "iconpicker",
			"heading" => esc_html__("Social Icon 2", "salient-core"),
			"param_name" => "social_icon_2",
			"settings" => array( "emptyIcon" => true, "iconsPerPage" => 4000),
			"dependency" => Array('element' => "team_memeber_style", 'value' => array('bio_fullscreen')),
			"description" => ''
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Social Link 2", "salient-core"),
			"param_name" => "social_link_2",
			"dependency" => Array('element' => "team_memeber_style", 'value' => array('bio_fullscreen')),
			"description" => esc_html__("Please enter the URL here", "salient-core")
		),
		
		array(
			"type" => "iconpicker",
			"heading" => esc_html__("Social Icon 3", "salient-core"),
			"param_name" => "social_icon_3",
			"settings" => array( "emptyIcon" => true, "iconsPerPage" => 4000),
			"dependency" => Array('element' => "team_memeber_style", 'value' => array('bio_fullscreen')),
			"description" => ''
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Social Link 3", "salient-core"),
			"param_name" => "social_link_3",
			"dependency" => Array('element' => "team_memeber_style", 'value' => array('bio_fullscreen')),
			"description" => esc_html__("Please enter the URL here", "salient-core")
		),
		
		array(
			"type" => "iconpicker",
			"heading" => esc_html__("Social Icon 4", "salient-core"),
			"param_name" => "social_icon_4",
			"settings" => array( "emptyIcon" => true, "iconsPerPage" => 4000),
			"dependency" => Array('element' => "team_memeber_style", 'value' => array('bio_fullscreen')),
			"description" => ''
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Social Link 4", "salient-core"),
			"param_name" => "social_link_4",
			"dependency" => Array('element' => "team_memeber_style", 'value' => array('bio_fullscreen')),
			"description" => esc_html__("Please enter the URL here", "salient-core")
		),
		
		array(
			"type" => "textarea",
			"heading" => esc_html__("Social Media", "salient-core"),
			"param_name" => "social",
			"dependency" => Array('element' => "team_memeber_style", 'value' => array('meta_below')),
			"description" => esc_html__("Enter any social media links with a comma separated list. e.g. Facebook,http://facebook.com, Twitter,http://twitter.com", "salient-core")
		),
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Team Member Link Type", "salient-core"),
			"param_name" => "link_element",
			"value" => array(
				"None" => "none",
				"Image" => "image",
				"Name" => "name",	
				"Both" => "both"
			),
			'save_always' => true,
			"dependency" => Array('element' => "team_memeber_style", 'value' => array('meta_below')),
			"description" => esc_html__("Please select how you wish to link your team member to an arbitrary URL", "salient-core")
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Team Member Link URL", "salient-core"),
			"param_name" => "link_url",
			"admin_label" => false,
			"description" => esc_html__("Please enter the URL for your team member link", "salient-core"),
			"dependency" => Array('element' => "link_element", 'value' => array('image', 'name', 'both'))
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Team Member Link URL", "salient-core"),
			"param_name" => "link_url_2",
			"admin_label" => false,
			"description" => esc_html__("Please enter the URL for your team member link", "salient-core"),
			"dependency" => Array('element' => "team_memeber_style", 'value' => array('meta_overlaid','meta_overlaid_alt')),
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Open Team Member Link In New Tab",
			"value" => array("Yes, please" => "true" ),
			"param_name" => "team_member_link_new_tab",
			"description" => "",
			"dependency" => Array('element' => "team_memeber_style", 'value' => array('meta_below','meta_overlaid','meta_overlaid_alt')),
		),
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Link Color", "salient-core"),
			"param_name" => "color",
			"value" => array(
				esc_html__( "Accent Color", "salient-core") => "Accent-Color",
				esc_html__( "Extra Color 1", "salient-core") => "Extra-Color-1",
				esc_html__( "Extra Color 2", "salient-core") => "Extra-Color-2",	
				esc_html__( "Extra Color 3", "salient-core") => "Extra-Color-3"
			),
			'save_always' => true,
			"dependency" => Array('element' => "team_memeber_style", 'value' => array('meta_below')),
			'description' => esc_html__( 'Choose a color from your','salient-core') . ' <a target="_blank" href="'. esc_url(admin_url()) .'?page=Salient&tab=6"> ' . esc_html__('globally defined color scheme','salient-core') . '</a>',
		)
	)
);

?>