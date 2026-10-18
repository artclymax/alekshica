<?php

if (function_exists('acf_add_options_page')) {
	acf_add_options_page(array(
		'page_title' => 'Контактные данные',
		'menu_title' => 'Контактные данные',
		'menu_slug' => 'opt-contacts',
	));

	//acf_add_options_page(array(
	//	'page_title' => 'Общие поля товаров',
	//	'menu_title' => 'Общие поля товаров',
	//	'menu_slug' => 'opt-products',
	//));

	acf_add_options_page(array(
		'page_title' => 'Шапка',
		'menu_title' => 'Шапка',
		'menu_slug' => 'opt-header',
	));

	acf_add_options_page(array(
		'page_title' => 'Подвал / Футер',
		'menu_title' => 'Подвал / Футер',
		'menu_slug' => 'opt-footer',
	));

	acf_add_options_page(array(
		'page_title' => 'Модальные окна',
		'menu_title' => 'Модальные окна',
		'menu_slug' => 'opt-modals',
	));

	acf_add_options_page(array(
		'page_title' => 'Страница благодарности',
		'menu_title' => 'Страница благодарности',
		'menu_slug' => 'opt-thank_you',
	));

	acf_add_options_page(array(
		'page_title' => 'Страница 404',
		'menu_title' => 'Страница 404',
		'menu_slug' => 'opt-page-404',
	));

}

// OPTIONS
add_action(
	'acf/init',
	function () {
		if (!function_exists('acf_add_local_field_group')) {
			return;
		}

		// HEADER
		acf_add_local_field_group(array(
			'key' => 'group_header_settings',
			'title' => 'Поля шапки',
			'fields' => array(
				array(
					'key' => 'field_header_info_message',
					'name' => 'header_info_message',
					'type' => 'message',
					'message' => '<b>Логотип</b> - перейдите в Панель управления сайтом > Основные настройки > Логотип сайта.<br/><b>Меню</b> - перейдите в Панель управления сайтом > Меню > Меню шапки.<br/><b>Контакты</b> - перейдите в Панель управления сайтом > Редактирование контента > Основные секции > Контактные данные.',
					'new_lines' => 'wpautop',
					'esc_html' => 0,
				),
				array(
					'key' => 'field_header_text',
					'label' => 'Надпись в шапке',
					'name' => 'header_text',
					'type' => 'text',
				),
				// Кнопка
				array(
					'key' => 'field_header_btn',
					'label' => 'Кнопка в шапке',
					'name' => 'header_btn',
					'type' => 'link',
					'instructions' => 'Ссылка на модальное окно (якорь #modal-call) или страницу.',
				),
			),
			'location' => array(
				array(
					array(
						'param' => 'options_page',
						'operator' => '==',
						'value' => 'opt-header',
					),
				),
			),
		));

		// FOOTER
		acf_add_local_field_group(array(
			'key' => 'flds_opt_footer',
			'title' => 'Поля футера',
			'fields' => array(
				array(
					'key' => 'footer_info_message',
					'name' => 'footer_info_message',
					'type' => 'message',
					'message' => '<b>Логотип</b> - перейдите в Панель управления сайтом > Основные настройки > Логотип сайта.<br/><b>Меню</b> - перейдите в Панель управления сайтом > Меню > Меню шапки / футера.<br/><b>Контакты</b> - перейдите в Панель управления сайтом > Редактирование контента > Основные секции > Контактные данные.',
					'new_lines' => 'wpautop',
					'esc_html' => 0,
				),
				array(
					'key' => 'footer_descr',
					'name' => 'footer_descr',
					'label' => 'Описание',
					'type' => 'textarea',
					'new_lines' => 'wpautop',
					'rows' => 2,
				),
				array(
					'key' => 'footer_company',
					'name' => 'footer_company',
					'label' => 'Название компании',
					'type' => 'text',
				),
				array(
					'key' => 'footer_copy',
					'name' => 'footer_copy',
					'label' => 'Копирайт',
					'type' => 'text',
				),
				array(
					'key' => 'footer_links',
					'name' => 'footer_links',
					'label' => 'Ссылки',
					'type' => 'repeater',
					'sub_fields' => array(
						array(
							'key' => 'footer_links_link',
							'name' => 'footer_links_link',
							'label' => 'Ссылка',
							'type' => 'link',
						),
					)
				)
			),
			'location' => array(
				array(
					array(
						'param' => 'options_page',
						'operator' => '==',
						'value' => 'opt-footer',
					),
				),
			),
		));

		// CONTACTS
		acf_add_local_field_group(array(
			'key' => 'group_contacts_page',
			'title' => 'Страница: Контакты',
			'fields' => array(
				array(
					'key' => 'field_contacts_tab_phones',
					'label' => 'Телефон и мессенджеры',
					'name' => 'contacts_tab_phones',
					'type' => 'tab',
				),
				array(
					'key' => 'field_contacts_phones',
					'label' => 'Телефоны',
					'name' => 'contacts_phones',
					'type' => 'repeater',
					'layout' => 'block',
					'collapsed' => 'field_contact_phone_number',
					'button_label' => 'Добавить телефон',
					'sub_fields' => array(
						array(
							'key' => 'field_contact_phone_number',
							'label' => 'Номер телефона',
							'name' => 'phone',
							'type' => 'text',
						),
						array(
							'key' => 'field_contacts_messengers',
							'label' => 'Мессенджеры и соцсети',
							'name' => 'socials',
							'type' => 'repeater',
							'collapsed' => 'field_contact_messengers_link',
							'button_label' => 'Добавить телефон',
							'sub_fields' => array(
								array(
									'key' => 'field_contact_messengers_image',
									'label' => 'Иконка',
									'name' => 'image',
									'type' => 'image',
								),
								array(
									'key' => 'field_contact_messengers_link',
									'label' => 'Номер / Ссылка',
									'name' => 'link',
									'type' => 'text',
									'instructions' => 'Ватсап - https://wa.me/ Телеграм - https://t.me/+  Вайбер - viber://chat?number=',
								),
							)
						),
					)
				),
				array(
					'key' => 'field_contacts_tab_time',
					'label' => 'Время',
					'name' => 'contacts_tab_time',
					'type' => 'tab',
				),
				array(
					'key' => 'field_contacts_time',
					'label' => 'Время',
					'name' => 'contacts_time',
					'type' => 'wysiwyg',
				),
				array(
					'key' => 'field_contacts_tab_address_time',
					'label' => 'Адрес',
					'name' => 'contacts_tab_address_time',
					'type' => 'tab',
				),
				array(
					'key' => 'field_contacts_address',
					'label' => 'Адрес',
					'name' => 'contacts_address',
					'type' => 'wysiwyg',
				),
			),
			'location' => array(
				array(
					array(
						'param' => 'options_page',
						'operator' => '==',
						'value' => 'opt-contacts'
					)
				)
			),
			'menu_order' => 0,
		));

		// MODALS
		acf_add_local_field_group(array(
			'key' => 'group_opt_modals',
			'title' => 'Глобальные модальные окна',
			'fields' => array(
				array(
					'key' => 'field_modals_list',
					'label' => 'Список модальных окон',
					'name' => 'modals',
					'type' => 'repeater',
					'layout' => 'block',
					'collapsed' => 'field_modal_id',
					'button_label' => 'Добавить модальное окно',
					'sub_fields' => array(
						array(
							'key' => 'field_modal_id',
							'label' => 'ID модального окна',
							'name' => 'id',
							'type' => 'text',
							'required' => 1,
							'maxlength' => 50,
							'instructions' => 'Только латиница, цифры, дефис. Пример: <code>order-form</code>. Используется в <code>id</code> и <code>data-modal</code>.',
							'prepend' => '#',
							'character_limit' => 50,
							'allow_custom' => 0,
						),
						array(
							'key' => 'field_modal_title',
							'label' => 'Заголовок',
							'name' => 'title',
							'type' => 'text',
						),
						array(
							'key' => 'field_modal_descr',
							'label' => 'Описание',
							'name' => 'descr',
							'type' => 'wysiwyg',
						),
						array(
							'key' => 'field_modal_shortcode',
							'label' => 'Шорткод формы',
							'name' => 'shortcode',
							'type' => 'text',
							'placeholder' => '[contact-form-7 id="123"]',
							'instructions' => 'Вставьте шорткод форм (CF7, WPForms, Forminator и свой шорткод).',
						),
						array(
							'key' => 'field_modal_image',
							'label' => 'Фон',
							'name' => 'image',
							'type' => 'image',
						),
					),
				),
			),
			'location' => array(
				array(
					array(
						'param' => 'options_page',
						'operator' => '==',
						'value' => 'opt-modals',
					),
				),
			),
		));

		// THANK YOU
		acf_add_local_field_group(array(
			'key' => 'flds_opt_thank_you',
			'title' => 'Страница благодарности',
			'fields' => array(
				array(
					'key' => 'field_thank_you_title',
					'name' => 'thank_you_title',
					'label' => 'Заголовок',
					'type' => 'text',
				),
				array(
					'key' => 'field_thank_you_descr',
					'name' => 'thank_you_descr',
					'label' => 'Описание',
					'type' => 'wysiwyg',
				),
				array(
					'key' => 'field_thank_you_btn',
					'name' => 'thank_you_btn',
					'label' => 'Кнопка',
					'type' => 'link',
				),
				array(
					'key' => 'field_thank_you_image',
					'name' => 'thank_you_image',
					'label' => 'Картинка',
					'type' => 'image',
				)
			),
			'location' => array(
				array(
					array(
						'param' => 'options_page',
						'operator' => '==',
						'value' => 'opt-thank_you',
					),
				),
			),
		));

		// PAGE 404 
		acf_add_local_field_group(array(
			'key' => 'flds_opt_page_404',
			'title' => 'Страница благодарности',
			'fields' => array(
				array(
					'key' => 'field_page_404_title',
					'name' => 'page_404_title',
					'label' => 'Заголовок',
					'type' => 'text',
				),
				array(
					'key' => 'field_page_404_descr',
					'name' => 'page_404_descr',
					'label' => 'Описание',
					'type' => 'wysiwyg',
				),
				array(
					'key' => 'field_page_404_btn',
					'name' => 'page_404_btn',
					'label' => 'Кнопка',
					'type' => 'link',
				),
				array(
					'key' => 'field_page_404_image',
					'name' => 'page_404_image',
					'label' => 'Картинка',
					'type' => 'image',
				),
				array(
					'key' => 'field_page_404_image_404',
					'name' => 'page_404_image_404',
					'label' => 'Картинка c цифрой 404',
					'type' => 'image',
				),
			),
			'location' => array(
				array(
					array(
						'param' => 'options_page',
						'operator' => '==',
						'value' => 'opt-page-404',
					),
				),
			),
		));

		// SECTIONS
	}
);


add_action('acf/init', 'register_fields');
function register_fields()
{
	//! === HOME PAGE
	// hero
	acf_add_local_field_group([
		'key' => 'group_hero_catalog_section',
		'title' => 'Первый экран',
		'fields' => [
			[
				'key' => 'field_hero_catalog_title',
				'label' => 'Заголовок',
				'name' => 'hero_catalog_title',
				'type' => 'text'
			],
			[
				'key' => 'field_hero_catalog_descr',
				'label' => 'Описание',
				'name' => 'hero_catalog_descr',
				'type' => 'wysiwyg',
			],
			[
				'key' => 'field_hero_catalog_items',
				'label' => 'Список категорий',
				'name' => 'hero_catalog_items',
				'type' => 'repeater',
				'layout' => 'block',
				'collapsed' => 'field_hero_catalog_items_text',
				'sub_fields' => [
					[
						'key' => 'field_hero_catalog_items_image',
						'label' => 'Изображение',
						'name' => 'image',
						'type' => 'image'
					],
					[
						'key' => 'field_hero_catalog_items_text',
						'label' => 'Текст',
						'name' => 'text',
						'type' => 'text'
					],
				],
			],
			[
				'key' => 'field_hero_catalog_btn',
				'label' => 'Кнопка CTA',
				'name' => 'hero_catalog_btn',
				'type' => 'link'
			],
			[
				'key' => 'field_hero_catalog_bg_big',
				'label' => 'Фон (Десктоп)',
				'name' => 'hero_catalog_bg_big',
				'type' => 'image'
			],
			[
				'key' => 'field_hero_catalog_bg_small',
				'label' => 'Фон (Планшет/Мобильный)',
				'name' => 'hero_catalog_bg_small',
				'type' => 'image'
			],
		],
		'location' => [
			[
				[
					'param' => 'post_template',
					'operator' => '==',
					'value' => 'front-page.php'
				]
			]
		],
		'menu_order' => 1,
	]);

	// benefits
	acf_add_local_field_group([
		'key' => 'group_benefits_catalog_section',
		'title' => 'Почему выбирают нас',
		'fields' => [
			[
				'key' => 'field_benefits_catalog_label',
				'label' => 'Надзаголовок',
				'name' => 'benefits_catalog_label',
				'type' => 'text'
			],
			[
				'key' => 'field_benefits_catalog_title',
				'label' => 'Заголовок',
				'name' => 'benefits_catalog_title',
				'type' => 'text'
			],
			[
				'key' => 'field_benefits_catalog_descr',
				'label' => 'Описание',
				'name' => 'benefits_catalog_descr',
				'type' => 'wysiwyg',
			],
			[
				'key' => 'field_benefits_catalog_bg_big',
				'label' => 'Картинка',
				'name' => 'benefits_catalog_bg_big',
				'type' => 'image'
			],
			[
				'key' => 'field_benefits_catalog_items',
				'label' => 'Список преимуществ',
				'name' => 'benefits_catalog_items',
				'type' => 'repeater',
				'layout' => 'block',
				'collapsed' => 'field_benefits_catalog_items_title',
				'sub_fields' => [
					[
						'key' => 'field_benefits_catalog_items_icon',
						'label' => 'Иконка',
						'name' => 'icon',
						'type' => 'image'
					],
					[
						'key' => 'field_benefits_catalog_items_title',
						'label' => 'Заголовок',
						'name' => 'title',
						'type' => 'text'
					],
					[
						'key' => 'field_benefits_catalog_items_descr',
						'label' => 'Описание',
						'name' => 'descr',
						'type' => 'textarea',
						'rows' => 2,
						'new_lines' => 'wpautop'
					],
				],
			],
			[
				'key' => 'field_benefits_catalog_contacts_title',
				'label' => 'Заголовок блока контактов',
				'name' => 'benefits_catalog_contacts_title',
				'type' => 'textarea',
				'rows' => 2,
				'new_lines' => 'wpautop'
			],
		],
		'location' => [
			[
				[
					'param' => 'post_template',
					'operator' => '==',
					'value' => 'front-page.php'
				]
			]
		],
		'menu_order' => 2,
	]);

	// catalog
	acf_add_local_field_group([
		'key' => 'group_catalog_section',
		'title' => 'Секция "Каталог"',
		'fields' => [
			[
				'key' => 'field_catalog_label',
				'label' => 'Надзаголовок',
				'name' => 'catalog_label',
				'type' => 'text'
			],
			[
				'key' => 'field_catalog_title',
				'label' => 'Заголовок',
				'name' => 'catalog_title',
				'type' => 'text'
			],
			[
				'key' => 'field_catalog_descr',
				'label' => 'Описание',
				'name' => 'catalog_descr',
				'type' => 'wysiwyg',
			],
			[
				'key' => 'field_catalog_info_message',
				'name' => 'catalog_info_message',
				'type' => 'message',
				'message' => '<b>Бытовки</b> - перейдите в Панель управления сайтом > Записи > Бытовки',
				'new_lines' => 'wpautop',
				'esc_html' => 0,
			],
		],
		'location' => [
			[
				[
					'param' => 'post_template',
					'operator' => '==',
					'value' => 'front-page.php'
				]
			]
		],
		'menu_order' => 3,
	]);

	// custom
	acf_add_local_field_group([
		'key' => 'group_custom_section',
		'title' => 'Секция "Под заказ"',
		'fields' => [
			[
				'key' => 'field_custom_label',
				'label' => 'Надзаголовок',
				'name' => 'custom_label',
				'type' => 'text'
			],
			[
				'key' => 'field_custom_title',
				'label' => 'Заголовок',
				'name' => 'custom_title',
				'type' => 'text'
			],
			[
				'key' => 'field_custom_descr',
				'label' => 'Описание',
				'name' => 'custom_descr',
				'type' => 'wysiwyg',
			],
			[
				'key' => 'field_custom_terms',
				'label' => 'Условия',
				'name' => 'custom_terms',
				'type' => 'repeater',
				'layout' => 'block',
				'collapsed' => 'field_custom_terms_text',
				'sub_fields' => [
					[
						'key' => 'field_custom_terms_text',
						'label' => 'Текст',
						'name' => 'term',
						'type' => 'wysiwyg',
					],
				],
			],
			[
				'key' => 'field_custom_options',
				'label' => 'Список опций',
				'name' => 'custom_options',
				'type' => 'repeater',
				'layout' => 'block',
				'collapsed' => 'field_custom_options_title',
				'sub_fields' => [
					[
						'key' => 'field_custom_options_icon',
						'label' => 'Иконка',
						'name' => 'icon',
						'type' => 'image'
					],
					[
						'key' => 'field_custom_options_title',
						'label' => 'Заголовок',
						'name' => 'title',
						'type' => 'text'
					],
					[
						'key' => 'field_custom_options_descr',
						'label' => 'Описание',
						'name' => 'descr',
						'type' => 'textarea',
						'rows' => 3,
						'new_lines' => 'wpautop'
					],
				],
			],
			[
				'key' => 'field_custom_image_1',
				'label' => 'Изображение 1',
				'name' => 'image_1',
				'type' => 'image'
			],
			[
				'key' => 'field_custom_image_2',
				'label' => 'Изображение 2',
				'name' => 'image_2',
				'type' => 'image'
			],
		],
		'location' => [
			[
				[
					'param' => 'post_template',
					'operator' => '==',
					'value' => 'front-page.php'
				]
			]
		],
		'menu_order' => 4,
	]);

	// services
	acf_add_local_field_group([
		'key' => 'group_services_section',
		'title' => 'Секция "Дополнительные направления"',
		'fields' => [
			[
				'key' => 'field_services_label',
				'label' => 'Надзаголовок',
				'name' => 'services_label',
				'type' => 'text'
			],
			[
				'key' => 'field_services_title',
				'label' => 'Заголовок',
				'name' => 'services_title',
				'type' => 'text'
			],
			[
				'key' => 'field_services_descr',
				'label' => 'Описание',
				'name' => 'services_descr',
				'type' => 'wysiwyg',
			],
			[
				'key' => 'field_services_info_message',
				'name' => 'services_info_message',
				'type' => 'message',
				'message' => '<b>Дополнительные направления</b> - перейдите в Панель управления сайтом > Записи > Дополнительные направления',
				'new_lines' => 'wpautop',
				'esc_html' => 0,
			],
			[
				'key' => 'field_services_additional_title',
				'label' => 'Заголовок доп. блока',
				'name' => 'services_additional_title',
				'type' => 'text',
				'default_value' => 'Также доступно'
			],
			[
				'key' => 'field_services_additional_list',
				'label' => 'Список услуг',
				'name' => 'services_additional_list',
				'type' => 'repeater',
				'layout' => 'block',
				'collapsed' => 'field_services_additional_list_title',
				'sub_fields' => [
					[
						'key' => 'field_services_additional_list_image',
						'label' => 'Иконка',
						'name' => 'image',
						'type' => 'image'
					],
					[
						'key' => 'field_services_additional_list_title',
						'label' => 'Заголовок',
						'name' => 'title',
						'type' => 'text'
					],
					[
						'key' => 'field_services_additional_list_descr',
						'label' => 'Описание',
						'name' => 'descr',
						'type' => 'textarea',
						'rows' => 3,
						'new_lines' => 'wpautop'
					],
				],
			],
		],
		'location' => [
			[
				[
					'param' => 'post_template',
					'operator' => '==',
					'value' => 'front-page.php'
				]
			]
		],
		'menu_order' => 5,
	]);

	// portfolio
	acf_add_local_field_group([
		'key' => 'group_portfolio_section',
		'title' => 'Секция "Портфолио"',
		'fields' => [
			[
				'key' => 'field_portfolio_label',
				'label' => 'Надзаголовок',
				'name' => 'portfolio_label',
				'type' => 'text'
			],
			[
				'key' => 'field_portfolio_title',
				'label' => 'Заголовок',
				'name' => 'portfolio_title',
				'type' => 'text'
			],
			[
				'key' => 'field_portfolio_descr',
				'label' => 'Описание',
				'name' => 'portfolio_descr',
				'type' => 'wysiwyg',
			],
			[
				'key' => 'field_portfolio_info_message',
				'name' => 'portfolio_info_message',
				'type' => 'message',
				'message' => '<b>Портфолио</b> - перейдите в Панель управления сайтом > Записи > Портфолио',
				'new_lines' => 'wpautop',
				'esc_html' => 0,
			],
		],
		'location' => [
			[
				[
					'param' => 'post_template',
					'operator' => '==',
					'value' => 'front-page.php'
				]
			]
		],
		'menu_order' => 6,
	]);

	// steps
	acf_add_local_field_group([
		'key' => 'group_steps_section',
		'title' => 'Секция "Этапы работы"',
		'fields' => [
			[
				'key' => 'field_steps_label',
				'label' => 'Надзаголовок',
				'name' => 'steps_label',
				'type' => 'text'
			],
			[
				'key' => 'field_steps_title',
				'label' => 'Заголовок',
				'name' => 'steps_title',
				'type' => 'text'
			],
			[
				'key' => 'field_steps_descr',
				'label' => 'Описание',
				'name' => 'steps_descr',
				'type' => 'wysiwyg',
			],
			[
				'key' => 'field_steps_terms',
				'label' => 'Условия',
				'name' => 'steps_terms',
				'type' => 'repeater',
				'layout' => 'block',
				'collapsed' => 'field_steps_terms_text',
				'sub_fields' => [
					[
						'key' => 'field_steps_terms_text',
						'label' => 'Текст',
						'name' => 'term',
						'type' => 'wysiwyg',
					]
				]
			],
			[
				'key' => 'field_steps_list',
				'label' => 'Этапы',
				'name' => 'steps_list',
				'type' => 'repeater',
				'layout' => 'block',
				'collapsed' => 'field_steps_list_title',
				'sub_fields' => [
					[
						'key' => 'field_steps_list_icon',
						'label' => 'Иконка',
						'name' => 'icon',
						'type' => 'image'
					],
					[
						'key' => 'field_steps_list_title',
						'label' => 'Заголовок',
						'name' => 'title',
						'type' => 'text'
					],
					[
						'key' => 'field_steps_list_descr',
						'label' => 'Описание',
						'name' => 'descr',
						'type' => 'textarea',
						'rows' => 3,
						'new_lines' => 'wpautop'
					]
				]
			],
		],
		'location' => [
			[
				[
					'param' => 'post_template',
					'operator' => '==',
					'value' => 'front-page.php'
				]
			]
		],
		'menu_order' => 7,
	]);

	// contacts
	acf_add_local_field_group([
		'key' => 'group_contacts_section',
		'title' => 'Секция "Контакты"',
		'fields' => [
			[
				'key' => 'field_contacts_label',
				'label' => 'Надзаголовок',
				'name' => 'contacts_label',
				'type' => 'text'
			],
			[
				'key' => 'field_contacts_title',
				'label' => 'Заголовок',
				'name' => 'contacts_title',
				'type' => 'text'
			],
			[
				'key' => 'field_contacts_descr',
				'label' => 'Описание',
				'name' => 'contacts_descr',
				'type' => 'wysiwyg',
			],
			[
				'key' => 'field_contacts_info_message',
				'name' => 'contacts_info_message',
				'type' => 'message',
				'message' => '<b>Контакты</b> - перейдите в Панель управления сайтом > Редактирование контента > Основные секции > Контактные данные.',
				'new_lines' => 'wpautop',
				'esc_html' => 0,
			],
			[
				'key' => 'field_contacts_image',
				'label' => 'Фоновое изображение',
				'name' => 'contacts_image',
				'type' => 'image'
			],
		],
		'location' => [
			[
				[
					'param' => 'post_template',
					'operator' => '==',
					'value' => 'front-page.php'
				]
			]
		],
		'menu_order' => 8,
	]);

	// ! cabin
	acf_add_local_field_group([
		'key' => 'group_cabin_fields',
		'title' => 'Поля бытовки',
		'fields' => [
			[
				'key' => 'field_cabin_price',
				'label' => 'Цена',
				'name' => 'price',
				'type' => 'text'
			],
			[
				'key' => 'field_cabin_params',
				'label' => 'Характеристики',
				'name' => 'params',
				'type' => 'repeater',
				'layout' => 'block',
				'collapsed' => 'field_cabin_params_name',
				'sub_fields' => [
					[
						'key' => 'field_cabin_params_name',
						'label' => 'Название',
						'name' => 'name',
						'type' => 'text'
					],
					[
						'key' => 'field_cabin_params_value',
						'label' => 'Значение',
						'name' => 'value',
						'type' => 'text'
					],
				],
			],
		],
		'location' => [
			[
				[
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'cabin'
				]
			]
		],
		'menu_order' => 1,
	]);

	// ! add_service
	acf_add_local_field_group([
		'key' => 'group_additional_service_fields',
		'title' => 'Поля направления',
		'fields' => [
			[
				'key' => 'field_additional_service_price',
				'label' => 'Цена',
				'name' => 'price',
				'type' => 'text'
			],
		],
		'location' => [
			[
				[
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'additional_service'
				]
			]
		],
		'menu_order' => 1,
	]);
}
