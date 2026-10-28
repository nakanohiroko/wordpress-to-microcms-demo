<?php
/**
 * SCF（ACF互換）のフィールドグループ定義。
 * seed.php が acf_import_field_group() でデータベースに取り込むため、
 * 管理画面の「SCF > フィールドグループ」に一覧表示され、編集もできます。
 */

return array(

	// ------------------------------------------------------------------
	// 募集職種
	// ------------------------------------------------------------------
	array(
		'key'      => 'group_minamo_job',
		'title'    => '募集職種の詳細',
		'fields'   => array(
			array( 'key' => 'field_job_is_open', 'name' => 'is_open', 'label' => '募集中', 'type' => 'true_false', 'ui' => 1, 'default_value' => 1 ),
			array( 'key' => 'field_job_hiring_type', 'name' => 'hiring_type', 'label' => '採用区分', 'type' => 'select', 'choices' => array( 'new_grad' => '新卒採用', 'career' => 'キャリア採用' ), 'required' => 1 ),
			array( 'key' => 'field_job_employment_type', 'name' => 'employment_type', 'label' => '雇用形態', 'type' => 'select', 'choices' => array( 'fulltime' => '正社員', 'contract' => '契約社員' ), 'default_value' => 'fulltime' ),
			array( 'key' => 'field_job_category', 'name' => 'job_category', 'label' => '職種カテゴリ', 'type' => 'radio', 'choices' => array( 'engineering' => '技術系', 'business' => '事務・営業系' ), 'layout' => 'horizontal' ),
			array( 'key' => 'field_job_description', 'name' => 'description', 'label' => '仕事内容', 'type' => 'wysiwyg', 'toolbar' => 'basic', 'media_upload' => 0 ),
			array(
				'key'          => 'field_job_required_skills',
				'name'         => 'required_skills',
				'label'        => '必須スキル・経験',
				'type'         => 'repeater',
				'layout'       => 'table',
				'button_label' => '項目を追加',
				'sub_fields'   => array(
					array( 'key' => 'field_job_required_skill_text', 'name' => 'text', 'label' => '内容', 'type' => 'text' ),
				),
			),
			array(
				'key'          => 'field_job_preferred_skills',
				'name'         => 'preferred_skills',
				'label'        => '歓迎スキル・経験',
				'type'         => 'repeater',
				'layout'       => 'table',
				'button_label' => '項目を追加',
				'sub_fields'   => array(
					array( 'key' => 'field_job_preferred_skill_text', 'name' => 'text', 'label' => '内容', 'type' => 'text' ),
				),
			),
			array( 'key' => 'field_job_salary', 'name' => 'salary', 'label' => '給与', 'type' => 'textarea', 'rows' => 3, 'new_lines' => 'br' ),
			array( 'key' => 'field_job_working_hours', 'name' => 'working_hours', 'label' => '勤務時間', 'type' => 'text' ),
			array( 'key' => 'field_job_deadline', 'name' => 'deadline', 'label' => '応募締切', 'type' => 'date_picker', 'display_format' => 'Y/m/d', 'return_format' => 'Y-m-d' ),
			array( 'key' => 'field_job_related_people', 'name' => 'related_people', 'label' => 'この職種で働く社員', 'type' => 'relationship', 'post_type' => array( 'interview' ), 'return_format' => 'id', 'filters' => array( 'search' ) ),
		),
		'location' => array( array( array( 'param' => 'post_type', 'operator' => '==', 'value' => 'job' ) ) ),
		'menu_order' => 0,
	),

	// ------------------------------------------------------------------
	// 働く人
	// ------------------------------------------------------------------
	array(
		'key'      => 'group_minamo_interview',
		'title'    => '社員インタビューの詳細',
		'fields'   => array(
			array( 'key' => 'field_iv_name', 'name' => 'person_name', 'label' => '氏名', 'type' => 'text', 'required' => 1 ),
			array( 'key' => 'field_iv_name_en', 'name' => 'person_name_en', 'label' => '氏名（ローマ字）', 'type' => 'text' ),
			array( 'key' => 'field_iv_photo', 'name' => 'photo', 'label' => '写真', 'type' => 'image', 'return_format' => 'id', 'preview_size' => 'medium' ),
			array( 'key' => 'field_iv_role', 'name' => 'role', 'label' => '役職・担当', 'type' => 'text' ),
			array( 'key' => 'field_iv_joined_year', 'name' => 'joined_year', 'label' => '入社年', 'type' => 'number', 'min' => 1980, 'max' => 2030 ),
			array( 'key' => 'field_iv_joined_type', 'name' => 'joined_type', 'label' => '入社区分', 'type' => 'select', 'choices' => array( 'new_grad' => '新卒入社', 'career' => 'キャリア入社' ) ),
			array( 'key' => 'field_iv_catchcopy', 'name' => 'catchcopy', 'label' => 'キャッチコピー', 'type' => 'text' ),
			array(
				'key'          => 'field_iv_qa',
				'name'         => 'qa',
				'label'        => 'インタビュー（Q&A）',
				'type'         => 'repeater',
				'layout'       => 'block',
				'button_label' => '質問を追加',
				'sub_fields'   => array(
					array( 'key' => 'field_iv_qa_question', 'name' => 'question', 'label' => '質問', 'type' => 'text' ),
					array( 'key' => 'field_iv_qa_answer', 'name' => 'answer', 'label' => '回答', 'type' => 'textarea', 'new_lines' => 'wpautop' ),
				),
			),
			array(
				'key'          => 'field_iv_schedule',
				'name'         => 'schedule',
				'label'        => '1日のスケジュール',
				'type'         => 'repeater',
				'layout'       => 'table',
				'button_label' => '予定を追加',
				'sub_fields'   => array(
					array( 'key' => 'field_iv_schedule_time', 'name' => 'time', 'label' => '時刻', 'type' => 'text' ),
					array( 'key' => 'field_iv_schedule_content', 'name' => 'content', 'label' => '内容', 'type' => 'text' ),
				),
			),
			array( 'key' => 'field_iv_related_jobs', 'name' => 'related_jobs', 'label' => '関連する募集職種', 'type' => 'relationship', 'post_type' => array( 'job' ), 'return_format' => 'id', 'filters' => array( 'search' ) ),
		),
		'location' => array( array( array( 'param' => 'post_type', 'operator' => '==', 'value' => 'interview' ) ) ),
		'menu_order' => 0,
	),

	// ------------------------------------------------------------------
	// 拠点（タクソノミーのタームに付くフィールド）
	// ------------------------------------------------------------------
	array(
		'key'      => 'group_minamo_location',
		'title'    => '拠点情報',
		'fields'   => array(
			array( 'key' => 'field_loc_address', 'name' => 'address', 'label' => '住所', 'type' => 'text' ),
			array( 'key' => 'field_loc_access', 'name' => 'access', 'label' => 'アクセス', 'type' => 'textarea', 'rows' => 2 ),
			array( 'key' => 'field_loc_photo', 'name' => 'photo', 'label' => '拠点写真', 'type' => 'image', 'return_format' => 'id' ),
		),
		'location' => array( array( array( 'param' => 'taxonomy', 'operator' => '==', 'value' => 'work_location' ) ) ),
	),

	// ------------------------------------------------------------------
	// SEO（投稿・募集職種）
	// ------------------------------------------------------------------
	array(
		'key'      => 'group_minamo_seo',
		'title'    => 'SEO設定',
		'fields'   => array(
			array( 'key' => 'field_seo_title', 'name' => 'seo_title', 'label' => 'タイトルタグ', 'type' => 'text', 'instructions' => '空欄の場合は記事タイトルを使用' ),
			array( 'key' => 'field_seo_description', 'name' => 'seo_description', 'label' => 'meta description', 'type' => 'textarea', 'rows' => 3 ),
			array( 'key' => 'field_seo_og_image', 'name' => 'og_image', 'label' => 'OGP画像', 'type' => 'image', 'return_format' => 'id' ),
			array( 'key' => 'field_seo_noindex', 'name' => 'noindex', 'label' => '検索エンジンにインデックスさせない', 'type' => 'true_false', 'ui' => 1 ),
		),
		'location' => array(
			array( array( 'param' => 'post_type', 'operator' => '==', 'value' => 'post' ) ),
			array( array( 'param' => 'post_type', 'operator' => '==', 'value' => 'job' ) ),
		),
		'position'   => 'side',
		'menu_order' => 10,
	),

	// ------------------------------------------------------------------
	// 採用サイト設定（オプションページ）
	// ------------------------------------------------------------------
	array(
		'key'      => 'group_minamo_settings',
		'title'    => '採用サイト共通コンテンツ',
		'fields'   => array(
			array( 'key' => 'field_set_tab_numbers', 'label' => '数字で見るミナモ精工', 'type' => 'tab', 'name' => '' ),
			array(
				'key'          => 'field_set_numbers',
				'name'         => 'numbers',
				'label'        => '数字で見るミナモ精工',
				'type'         => 'repeater',
				'layout'       => 'table',
				'button_label' => '項目を追加',
				'sub_fields'   => array(
					array( 'key' => 'field_set_numbers_label', 'name' => 'label', 'label' => '項目名', 'type' => 'text' ),
					array( 'key' => 'field_set_numbers_value', 'name' => 'value', 'label' => '数値', 'type' => 'text' ),
					array( 'key' => 'field_set_numbers_unit', 'name' => 'unit', 'label' => '単位', 'type' => 'text' ),
					array( 'key' => 'field_set_numbers_note', 'name' => 'note', 'label' => '注記', 'type' => 'text' ),
				),
			),

			array( 'key' => 'field_set_tab_benefits', 'label' => '福利厚生', 'type' => 'tab', 'name' => '' ),
			array(
				'key'          => 'field_set_benefits',
				'name'         => 'benefits',
				'label'        => '福利厚生',
				'type'         => 'repeater',
				'layout'       => 'block',
				'button_label' => '制度を追加',
				'sub_fields'   => array(
					array( 'key' => 'field_set_benefits_category', 'name' => 'category', 'label' => '分類', 'type' => 'select', 'choices' => array( 'holiday' => '休暇', 'living' => '住まい・生活', 'growth' => '成長支援', 'health' => '健康' ) ),
					array( 'key' => 'field_set_benefits_name', 'name' => 'name', 'label' => '制度名', 'type' => 'text' ),
					array( 'key' => 'field_set_benefits_description', 'name' => 'description', 'label' => '説明', 'type' => 'textarea', 'rows' => 2 ),
				),
			),

			array( 'key' => 'field_set_tab_flow', 'label' => '採用フロー', 'type' => 'tab', 'name' => '' ),
			array(
				'key'          => 'field_set_flow_new_grad',
				'name'         => 'flow_new_grad',
				'label'        => '採用フロー（新卒）',
				'type'         => 'repeater',
				'layout'       => 'table',
				'button_label' => 'ステップを追加',
				'sub_fields'   => array(
					array( 'key' => 'field_set_flow_new_grad_title', 'name' => 'title', 'label' => 'ステップ', 'type' => 'text' ),
					array( 'key' => 'field_set_flow_new_grad_description', 'name' => 'description', 'label' => '内容', 'type' => 'text' ),
				),
			),
			array(
				'key'          => 'field_set_flow_career',
				'name'         => 'flow_career',
				'label'        => '採用フロー（キャリア）',
				'type'         => 'repeater',
				'layout'       => 'table',
				'button_label' => 'ステップを追加',
				'sub_fields'   => array(
					array( 'key' => 'field_set_flow_career_title', 'name' => 'title', 'label' => 'ステップ', 'type' => 'text' ),
					array( 'key' => 'field_set_flow_career_description', 'name' => 'description', 'label' => '内容', 'type' => 'text' ),
				),
			),

			array( 'key' => 'field_set_tab_faq', 'label' => 'よくある質問', 'type' => 'tab', 'name' => '' ),
			array(
				'key'          => 'field_set_faq',
				'name'         => 'faq',
				'label'        => 'よくある質問',
				'type'         => 'repeater',
				'layout'       => 'block',
				'button_label' => '質問を追加',
				'sub_fields'   => array(
					array( 'key' => 'field_set_faq_category', 'name' => 'category', 'label' => '分類', 'type' => 'select', 'choices' => array( 'selection' => '選考について', 'work' => '働き方について', 'other' => 'その他' ) ),
					array( 'key' => 'field_set_faq_question', 'name' => 'question', 'label' => '質問', 'type' => 'text' ),
					array( 'key' => 'field_set_faq_answer', 'name' => 'answer', 'label' => '回答', 'type' => 'wysiwyg', 'toolbar' => 'basic', 'media_upload' => 0 ),
				),
			),
		),
		'location' => array( array( array( 'param' => 'options_page', 'operator' => '==', 'value' => 'minamo-recruit-settings' ) ) ),
	),
);
