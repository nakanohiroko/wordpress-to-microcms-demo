<?php
/**
 * 働く人（社員インタビュー）。
 * related_jobs は jobs.php の related_people から自動的に逆参照されます。
 */
return array(
	array(
		'slug' => 'researcher-ito', 'title' => '「まだ世界にないセンサー」を、つくばから。', 'date' => '2025-09-01 10:00:00', 'photo' => 'person-01',
		'terms' => array( 'department' => array( 'rd' ), 'work_location' => array( 'tsukuba' ) ),
		'fields' => array(
			'person_name' => '伊藤 さくら', 'person_name_en' => 'Sakura Ito', 'role' => '研究開発部 主任研究員', 'joined_year' => 2019, 'joined_type' => 'new_grad',
			'catchcopy' => '「まだ世界にないセンサー」を、つくばから。',
			'qa' => array(
				array( 'question' => '入社の決め手は？', 'answer' => '学生時代に研究していたMEMS技術を、製品として世に出せる環境だったからです。研究所の設備が想像以上に充実していたのも大きかったです。' ),
				array( 'question' => '現在の仕事内容を教えてください。', 'answer' => '振動センサーの次世代素子の開発を担当しています。シミュレーションで構造を詰め、試作して評価する、の繰り返しです。' ),
				array( 'question' => 'やりがいを感じる瞬間は？', 'answer' => '自分が設計した素子が静岡工場で量産されたときは本当に感動しました。研究で終わらないのがメーカーの醍醐味です。' ),
			),
			'schedule' => array(
				array( 'time' => '9:30', 'content' => '出社・メールチェック' ),
				array( 'time' => '10:00', 'content' => 'チームの進捗ミーティング' ),
				array( 'time' => '11:00', 'content' => 'シミュレーション' ),
				array( 'time' => '13:00', 'content' => '試作品の評価' ),
				array( 'time' => '16:00', 'content' => '大学との共同研究打ち合わせ（オンライン）' ),
				array( 'time' => '18:00', 'content' => '退社' ),
			),
		),
	),
	array(
		'slug' => 'embedded-yamamoto', 'title' => 'Web業界から、手で触れるものづくりへ。', 'date' => '2025-09-15 10:00:00', 'photo' => 'person-02',
		'terms' => array( 'department' => array( 'design' ), 'work_location' => array( 'tokyo' ) ),
		'fields' => array(
			'person_name' => '山本 大輔', 'person_name_en' => 'Daisuke Yamamoto', 'role' => '開発設計部 組込みソフトウェアエンジニア', 'joined_year' => 2021, 'joined_type' => 'career',
			'catchcopy' => 'Web業界から、手で触れるものづくりへ。',
			'qa' => array(
				array( 'question' => '前職では何をしていましたか？', 'answer' => 'Web系の受託開発会社でバックエンドを担当していました。自分の書いたコードが物理的に動くものに関わりたくて転職しました。' ),
				array( 'question' => '転職して戸惑ったことは？', 'answer' => 'メモリやリアルタイム性の制約です。ただ、先輩がペアで丁寧に教えてくれたので、半年ほどで一人で担当を持てるようになりました。' ),
				array( 'question' => '前職の経験が活きている場面は？', 'answer' => 'テスト自動化やCIの仕組みづくりです。チームに提案して、今では評価工程の多くを自動化できています。' ),
			),
			'schedule' => array(
				array( 'time' => '10:00', 'content' => '出社（フレックス）' ),
				array( 'time' => '10:30', 'content' => 'コードレビュー' ),
				array( 'time' => '13:00', 'content' => 'ファームウェア実装' ),
				array( 'time' => '15:00', 'content' => '実機での動作確認' ),
				array( 'time' => '19:00', 'content' => '退社' ),
			),
		),
	),
	array(
		'slug' => 'circuit-kobayashi', 'title' => '1年目から、量産品の回路を任される。', 'date' => '2026-04-20 10:00:00', 'photo' => 'person-03',
		'terms' => array( 'department' => array( 'design' ), 'work_location' => array( 'tokyo' ) ),
		'fields' => array(
			'person_name' => '小林 陽向', 'person_name_en' => 'Hinata Kobayashi', 'role' => '開発設計部 回路設計エンジニア', 'joined_year' => 2024, 'joined_type' => 'new_grad',
			'catchcopy' => '1年目から、量産品の回路を任される。',
			'qa' => array(
				array( 'question' => '配属後の最初の仕事は？', 'answer' => '既存製品の改良版の電源回路でした。先輩の設計を読み解くところから始め、2年目には新製品の信号処理回路を担当しました。' ),
				array( 'question' => '職場の雰囲気は？', 'answer' => '質問しやすい雰囲気です。設計レビューでは年次に関係なく意見を出し合います。' ),
			),
			'schedule' => array(
				array( 'time' => '9:00', 'content' => '出社' ),
				array( 'time' => '9:30', 'content' => '回路設計・シミュレーション' ),
				array( 'time' => '14:00', 'content' => '設計レビュー' ),
				array( 'time' => '16:00', 'content' => '基板の評価' ),
				array( 'time' => '18:00', 'content' => '退社' ),
			),
		),
	),
	array(
		'slug' => 'production-nakamura', 'title' => '工場の「当たり前」を、毎日少しずつ更新する。', 'date' => '2025-10-01 10:00:00', 'photo' => 'person-04',
		'terms' => array( 'department' => array( 'production-engineering' ), 'work_location' => array( 'shizuoka' ) ),
		'fields' => array(
			'person_name' => '中村 拓也', 'person_name_en' => 'Takuya Nakamura', 'role' => '生産技術部 課長', 'joined_year' => 2016, 'joined_type' => 'new_grad',
			'catchcopy' => '工場の「当たり前」を、毎日少しずつ更新する。',
			'qa' => array(
				array( 'question' => '生産技術とはどんな仕事ですか？', 'answer' => '「どうつくるか」を考える仕事です。設計部門の図面を、品質を保ちながら効率よく量産できる工程に落とし込みます。' ),
				array( 'question' => '印象に残っているプロジェクトは？', 'answer' => '新しいクリーンルームの立ち上げです。設備の選定から作業者の動線まで、ゼロから設計しました。' ),
				array( 'question' => '静岡での暮らしはどうですか？', 'answer' => '社宅が工場から車で10分なので通勤が楽です。休日は家族で海や山に出かけています。' ),
			),
			'schedule' => array(
				array( 'time' => '8:30', 'content' => '朝礼・ライン巡回' ),
				array( 'time' => '10:00', 'content' => '設備メーカーとの打ち合わせ' ),
				array( 'time' => '13:00', 'content' => '改善施策の検証' ),
				array( 'time' => '15:30', 'content' => 'メンバーとの1on1' ),
				array( 'time' => '17:30', 'content' => '退社' ),
			),
		),
	),
	array(
		'slug' => 'qa-watanabe', 'title' => '食品メーカーの品質管理から、精密機器の品質保証へ。', 'date' => '2025-11-10 10:00:00', 'photo' => 'person-05',
		'terms' => array( 'department' => array( 'quality-assurance' ), 'work_location' => array( 'shizuoka' ) ),
		'fields' => array(
			'person_name' => '渡辺 真由', 'person_name_en' => 'Mayu Watanabe', 'role' => '品質保証部', 'joined_year' => 2022, 'joined_type' => 'career',
			'catchcopy' => '食品メーカーの品質管理から、精密機器の品質保証へ。',
			'qa' => array(
				array( 'question' => '異業種からの転職に不安はありましたか？', 'answer' => '製品知識はゼロでしたが、品質管理の考え方は共通していました。入社後の研修で製品の基礎を学べたので安心でした。' ),
				array( 'question' => '仕事で大切にしていることは？', 'answer' => '現場の声を聞くことです。数字だけでは見えない不具合の兆しを、製造メンバーとの会話から見つけることがあります。' ),
			),
			'schedule' => array(
				array( 'time' => '8:30', 'content' => '出社・前日の検査データ確認' ),
				array( 'time' => '10:00', 'content' => '信頼性試験の立ち会い' ),
				array( 'time' => '13:00', 'content' => '顧客向け報告書の作成' ),
				array( 'time' => '17:15', 'content' => '退社' ),
			),
		),
	),
	array(
		'slug' => 'control-kato', 'title' => 'モノと情報の流れを、まるごと設計する。', 'date' => '2026-05-11 10:00:00', 'photo' => 'person-06',
		'terms' => array( 'department' => array( 'production-control' ), 'work_location' => array( 'shizuoka' ) ),
		'fields' => array(
			'person_name' => '加藤 恵', 'person_name_en' => 'Megumi Kato', 'role' => '生産管理部', 'joined_year' => 2023, 'joined_type' => 'new_grad',
			'catchcopy' => 'モノと情報の流れを、まるごと設計する。',
			'qa' => array(
				array( 'question' => '文系出身でも大丈夫でしたか？', 'answer' => '経済学部出身です。製品の仕組みは研修や現場で学べましたし、むしろ数字を扱う力が活きています。' ),
				array( 'question' => 'これからの目標は？', 'answer' => '需要予測の精度を上げて、欠品も過剰在庫も減らしたいです。データ分析の勉強も始めました。' ),
			),
			'schedule' => array(
				array( 'time' => '8:30', 'content' => '出社・受注状況の確認' ),
				array( 'time' => '10:00', 'content' => '生産計画会議' ),
				array( 'time' => '13:00', 'content' => '部材の納期調整' ),
				array( 'time' => '17:15', 'content' => '退社' ),
			),
		),
	),
	array(
		'slug' => 'sales-takahashi', 'title' => 'お客様の「困った」を、技術で解決する営業。', 'date' => '2025-08-20 10:00:00', 'photo' => 'person-07',
		'terms' => array( 'department' => array( 'sales' ), 'work_location' => array( 'tokyo' ) ),
		'fields' => array(
			'person_name' => '高橋 翔', 'person_name_en' => 'Sho Takahashi', 'role' => '営業本部 第一営業部', 'joined_year' => 2018, 'joined_type' => 'new_grad',
			'catchcopy' => 'お客様の「困った」を、技術で解決する営業。',
			'qa' => array(
				array( 'question' => 'ミナモ精工の営業の特徴は？', 'answer' => 'カタログ品を売るだけでなく、お客様の装置に合わせたカスタム提案が多いことです。設計部門と一緒に客先へ行くこともよくあります。' ),
				array( 'question' => '印象に残っている案件は？', 'answer' => '物流ロボット向けの新型センサーです。提案から量産まで2年かかりましたが、街で採用製品を見かけたときは嬉しかったです。' ),
				array( 'question' => '就活生へのメッセージ', 'answer' => '技術がわからなくても大丈夫です。わからないことを素直に聞ける人が伸びる会社だと思います。' ),
			),
			'schedule' => array(
				array( 'time' => '9:00', 'content' => '出社・メール対応' ),
				array( 'time' => '10:30', 'content' => '客先訪問（設計部門と同行）' ),
				array( 'time' => '14:00', 'content' => '提案資料の作成' ),
				array( 'time' => '16:00', 'content' => '社内の案件会議' ),
				array( 'time' => '18:00', 'content' => '退社' ),
			),
		),
	),
	array(
		'slug' => 'hr-matsumoto', 'title' => '人を知り、会社をつくる仕事。', 'date' => '2026-02-02 10:00:00', 'photo' => 'person-08',
		'status' => 'draft',
		'terms' => array( 'department' => array( 'administration' ), 'work_location' => array( 'tokyo' ) ),
		'fields' => array(
			'person_name' => '松本 彩', 'person_name_en' => 'Aya Matsumoto', 'role' => '管理本部 人事課', 'joined_year' => 2020, 'joined_type' => 'career',
			'catchcopy' => '人を知り、会社をつくる仕事。',
			'qa' => array(
				array( 'question' => '（下書き）現在の仕事内容', 'answer' => '原稿確認中' ),
			),
			'schedule' => array(),
		),
	),
);
