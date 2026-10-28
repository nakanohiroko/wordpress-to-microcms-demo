<?php
/**
 * タクソノミーのターム。parent を持つものは階層構造になります。
 */
return array(
	'department' => array(
		array( 'slug' => 'engineering-division', 'name' => '技術部門' ),
		array( 'slug' => 'rd', 'name' => '研究開発部', 'parent' => 'engineering-division' ),
		array( 'slug' => 'design', 'name' => '開発設計部', 'parent' => 'engineering-division' ),
		array( 'slug' => 'manufacturing-division', 'name' => '生産部門' ),
		array( 'slug' => 'production-engineering', 'name' => '生産技術部', 'parent' => 'manufacturing-division' ),
		array( 'slug' => 'quality-assurance', 'name' => '品質保証部', 'parent' => 'manufacturing-division' ),
		array( 'slug' => 'production-control', 'name' => '生産管理部', 'parent' => 'manufacturing-division' ),
		array( 'slug' => 'sales-division', 'name' => '営業部門' ),
		array( 'slug' => 'sales', 'name' => '営業本部', 'parent' => 'sales-division' ),
		array( 'slug' => 'admin-division', 'name' => '管理部門' ),
		array( 'slug' => 'administration', 'name' => '管理本部', 'parent' => 'admin-division' ),
	),
	'work_location' => array(
		array(
			'slug'        => 'tokyo',
			'name'        => '東京本社',
			'description' => '営業・設計・管理部門が集まる本社オフィスです。',
			'fields'      => array(
				'field_loc_address' => '東京都品川区東品川9-9-9 ミナモタワー12F',
				'field_loc_access'  => '天王洲アイル駅より徒歩5分',
				'field_loc_photo'   => 'office-tokyo',
			),
		),
		array(
			'slug'        => 'shizuoka',
			'name'        => '静岡工場',
			'description' => 'センサーモジュールの量産拠点。クリーンルームを備えています。',
			'fields'      => array(
				'field_loc_address' => '静岡県浜松市中央区サンプル町1-2-3',
				'field_loc_access'  => '浜松駅より通勤バスで20分（無料送迎あり）',
				'field_loc_photo'   => 'factory-shizuoka',
			),
		),
		array(
			'slug'        => 'tsukuba',
			'name'        => 'つくば研究所',
			'description' => '次世代センサー素子の研究開発を行う拠点です。',
			'fields'      => array(
				'field_loc_address' => '茨城県つくば市サンプル台4-5-6',
				'field_loc_access'  => 'つくば駅よりバスで15分',
				'field_loc_photo'   => 'lab-tsukuba',
			),
		),
	),
	'category' => array(
		array( 'slug' => 'news', 'name' => 'お知らせ' ),
		array( 'slug' => 'event', 'name' => 'イベント' ),
		array( 'slug' => 'blog', 'name' => '社員ブログ' ),
	),
	'post_tag' => array(
		array( 'slug' => 'new-grad', 'name' => '新卒採用' ),
		array( 'slug' => 'career', 'name' => 'キャリア採用' ),
		array( 'slug' => 'engineer', 'name' => 'エンジニア' ),
		array( 'slug' => 'factory', 'name' => '工場' ),
		array( 'slug' => 'lab', 'name' => '研究所' ),
		array( 'slug' => 'training', 'name' => '研修' ),
		array( 'slug' => 'benefits', 'name' => '福利厚生' ),
		array( 'slug' => 'seminar', 'name' => '説明会' ),
		array( 'slug' => 'internship', 'name' => 'インターンシップ' ),
	),
);
