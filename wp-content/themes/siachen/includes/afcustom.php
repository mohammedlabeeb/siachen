<?php
include_once('advanced-custom-fields/acf.php');
if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_business-communication',
		'title' => 'Business Communication',
		'fields' => array (
			array (
				'key' => 'field_55a40599e03fe',
				'label' => 'Postal Address',
				'name' => 'address',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'br',
			),
			array (
				'key' => 'field_55a405f8e03ff',
				'label' => 'Land Line',
				'name' => 'land_line',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_55a40616e0400',
				'label' => 'Mobile',
				'name' => 'mobile',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_55a40620e0401',
				'label' => 'Alternate Number',
				'name' => 'alternate_number',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_55a4062ae0402',
				'label' => 'FAX',
				'name' => 'fax',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_55a4063ce0403',
				'label' => 'E-mail',
				'name' => 'e-mail',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_55a4064ae0404',
				'label' => 'Web Site Address',
				'name' => 'web_site_address',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => 'http://',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_55a40659e0405',
				'label' => 'Twitter ID:',
				'name' => 'twitter_id',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_55a4069de0406',
				'label' => 'Facebook page:',
				'name' => 'facebook_page',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_55a406abe0407',
				'label' => 'Whatsapp',
				'name' => 'whatsapp',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_55a406dae0408',
				'label' => 'skype ID:',
				'name' => 'skype_id',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_55a406e9e0409',
				'label' => 'Preferred Method of contact:',
				'name' => 'preferred_method_of_contact',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'business',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_business-primary-details',
		'title' => 'Business Primary Details',
		'fields' => array (
			array (
				'key' => 'field_55a402caaf6cd',
				'label' => 'Business Summary',
				'name' => 'business_summary',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => 5,
				'formatting' => 'br',
			),
			array (
				'key' => 'field_55a40328af6ce',
				'label' => 'Established Year',
				'name' => 'established_year',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_55a403a13fca4',
				'label' => 'Position in the company:',
				'name' => 'position_in',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_55a403d53fca5',
				'label' => 'Number Of employees',
				'name' => 'number_of_employess',
				'type' => 'number',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => 0,
				'max' => '',
				'step' => 1,
			),
			array (
				'key' => 'field_55a404153fca6',
				'label' => 'Country',
				'name' => 'country',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_55a404eb3fca7',
				'label' => 'State / Province',
				'name' => 'state',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_55a4050b3fca8',
				'label' => 'City',
				'name' => 'city',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_55a405223fca9',
				'label' => 'Nearest major city',
				'name' => 'nearest_major_city',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_55a4053b3fcaa',
				'label' => 'Branch locations',
				'name' => 'branch_locations',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'br',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'business',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_customer-impression',
		'title' => 'Customer Impression:',
		'fields' => array (
			array (
				'key' => 'field_55a408d69e1d5',
				'label' => 'prestigious projects',
				'name' => 'prestigious_projects',
				'type' => 'wysiwyg',
				'instructions' => 'Write about your prestigious projects you have undertaken or about the largest order you have worked on.',
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'yes',
			),
			array (
				'key' => 'field_55a4090c9e1d6',
				'label' => 'Why Customer Choose you ?',
				'name' => 'why_choose_you',
				'type' => 'wysiwyg',
				'instructions' => 'Write in 100 words what makes you a superior business why a customer must choose you over others?',
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'yes',
			),
			array (
				'key' => 'field_55a409439e1d7',
				'label' => 'awards and recognitions',
				'name' => 'awards',
				'type' => 'wysiwyg',
				'instructions' => 'Any awards and recognitions you have won?',
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'yes',
			),
			array (
				'key' => 'field_55a409689e1d8',
				'label' => 'Refferals',
				'name' => 'refferals',
				'type' => 'wysiwyg',
				'instructions' => 'Refer one or two of your most happy customer contacts and reference?',
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'yes',
			),
			array (
				'key' => 'field_55a40cce9e1d9',
				'label' => 'Future Plans',
				'name' => 'future_plans',
				'type' => 'wysiwyg',
				'instructions' => 'Write about your future plans. How do you think your customer will benefit from your innovations?',
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'yes',
			),
			array (
				'key' => 'field_55a40cf59e1da',
				'label' => 'leveraging technology',
				'name' => 'leveraging_technology',
				'type' => 'wysiwyg',
				'instructions' => 'How are you leveraging technology?',
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'yes',
			),
			array (
				'key' => 'field_55a40d409e1db',
				'label' => 'financial strengths:',
				'name' => 'financial_strengths',
				'type' => 'wysiwyg',
				'instructions' => 'Please make a mention of your financial strengths:',
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'yes',
			),
			array (
				'key' => 'field_55a40d989e1dc',
				'label' => 'Corporate responsibility',
				'name' => 'corporate',
				'type' => 'wysiwyg',
				'instructions' => 'Your Corporate responsibility record',
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'yes',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'business',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_products-services-additional-business-information',
		'title' => 'PRODUCTS / SERVICES - Additional Business Information',
		'fields' => array (
			array (
				'key' => 'field_55a4081ff3f89',
				'label' => 'Products',
				'name' => 'products',
				'type' => 'wysiwyg',
				'instructions' => 'Write about all products, and technology you sell or deal with.',
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'yes',
			),
			array (
				'key' => 'field_55a4083cf3f8a',
				'label' => 'Services / Solutions',
				'name' => 'services',
				'type' => 'wysiwyg',
				'instructions' => 'Write about all services and the highlights of your services.',
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'yes',
			),
			array (
				'key' => 'field_55a40869f3f8b',
				'label' => 'Major Customers',
				'name' => 'customers',
				'type' => 'wysiwyg',
				'instructions' => 'Write about your most important customers.',
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'yes',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'business',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_taxonomy-custom',
		'title' => 'Taxonomy Custom',
		'fields' => array (
			array (
				'key' => 'field_55a19fafb70f8',
				'label' => 'icon class',
				'name' => 'icon_class',
				'type' => 'text',
				'instructions' => 'Check icon list here <a target="__blank" href="http://getbootstrap.com/components/#glyphicons " >http://getbootstrap.com/components/#glyphicons </a>',
				'required' => 0,
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'ef_taxonomy',
					'operator' => '==',
					'value' => 'business_type',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}
