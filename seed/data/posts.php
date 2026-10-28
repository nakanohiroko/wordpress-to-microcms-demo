<?php
/**
 * 投稿（お知らせ・イベント・社員ブログ）。
 * 移行の「あるある」をあえて混ぜています。
 *   - クラシックエディタ時代のHTML本文（classic）
 *   - 独自ショートコード／[gallery] ショートコード
 *   - YouTube埋め込み、テーブル、カラム、ボタン、カスタムHTMLブロック
 *   - 本文内のWordPressドメインの画像URL・絶対URLリンク
 *   - 下書き・予約投稿・複数の投稿者
 * {{home}} はサイトURL、{{img:キー}} は画像URLに置換されます。
 */
return array(
	// ---------------- 2023年（クラシックエディタ時代） ----------------
	array(
		'slug' => 'recruit-site-open', 'title' => '採用サイトをリニューアルしました', 'date' => '2023-04-03 10:00:00',
		'author' => 'hr_tanaka', 'category' => 'news', 'tags' => array(),
		'classic' => '<p>いつもミナモ精工の採用情報をご覧いただき、ありがとうございます。<br>
本日、採用サイトを全面リニューアルいたしました。</p>
<p>新しいサイトでは、<strong>社員インタビュー</strong>や<strong>募集職種の検索</strong>など、ミナモ精工で働くイメージを持っていただけるコンテンツを充実させました。</p>
<p>今後ともよろしくお願いいたします。</p>',
	),
	array(
		'slug' => '2024-seminar-schedule', 'title' => '2024年度 新卒向け会社説明会の日程を公開しました', 'date' => '2023-06-01 10:00:00',
		'author' => 'hr_tanaka', 'category' => 'event', 'tags' => array( 'new-grad', 'seminar' ),
		'classic' => '<p>2024年度新卒採用の会社説明会日程を公開しました。</p>
<table border="1" cellpadding="5">
<tr><td><b>日程</b></td><td><b>形式</b></td><td><b>会場</b></td></tr>
<tr><td>6月15日（木）</td><td>オンライン</td><td>Zoom</td></tr>
<tr><td>6月22日（木）</td><td>対面</td><td>東京本社</td></tr>
<tr><td>7月6日（木）</td><td>対面＋工場見学</td><td>静岡工場</td></tr>
</table>
<p><span style="color: #ff0000;">※静岡工場の回は定員20名です。お早めにお申し込みください。</span></p>
<p>お申し込みは<a href="{{home}}/entry/">こちら</a>から。</p>',
	),
	array(
		'slug' => 'summer-internship-2023-report', 'title' => '夏のインターンシップを開催しました', 'date' => '2023-09-12 15:00:00',
		'author' => 'hr_tanaka', 'category' => 'event', 'tags' => array( 'internship', 'new-grad' ), 'image' => 'blog-internship',
		'classic' => '<p>8月に3日間の技術系インターンシップを開催し、12名の学生の皆さんにご参加いただきました。</p>
<p><img class="aligncenter size-large" src="{{img:blog-internship}}" alt="インターンシップの様子" width="1200" height="800" /></p>
<p>1日目は会社紹介と工場見学、2日目と3日目はチームに分かれて「センサーを使った課題解決」に取り組みました。</p>
<p>参加された皆さん、ありがとうございました！</p>',
	),

	// ---------------- 2024年 ----------------
	array(
		'slug' => 'clean-room-tour', 'title' => '静岡工場のクリーンルームを紹介します', 'date' => '2024-02-14 12:00:00',
		'author' => 'pr_sato', 'category' => 'blog', 'tags' => array( 'factory' ), 'image' => 'blog-cleanroom',
		'blocks' => array(
			array( 'p', '広報の佐藤です。今回は、普段はなかなか入れない静岡工場のクリーンルームを紹介します。' ),
			array( 'img', 'blog-cleanroom', 'クリーンルーム内の作業風景' ),
			array( 'h2', 'クリーンルームとは？' ),
			array( 'p', '空気中のちりやほこりを一定以下に管理した部屋のことです。センサー素子はとても小さいため、わずかなほこりでも不良の原因になります。' ),
			array( 'h2', '入室までの手順' ),
			array( 'list', array( '専用の防塵服に着替える', 'エアシャワーでほこりを落とす', '手袋とマスクを二重に着用する' ), true ),
			array( 'p', '慣れるまでは着替えだけで10分以上かかりました。' ),
		),
		'seo' => array( 'seo_description' => '普段は入れない静岡工場のクリーンルームを、広報担当がレポートします。' ),
	),
	array(
		'slug' => 'new-employee-training-2024', 'title' => '2024年度 新入社員研修がスタートしました', 'date' => '2024-04-08 10:00:00',
		'author' => 'hr_tanaka', 'category' => 'news', 'tags' => array( 'new-grad', 'training' ), 'image' => 'blog-training',
		'blocks' => array(
			array( 'p', '4月1日に入社した18名の新入社員の研修がスタートしました。' ),
			array( 'table', array( array( '期間', '内容', '場所' ), array( '4月', 'ビジネスマナー・会社理解', '東京本社' ), array( '5月', '工場実習', '静岡工場' ), array( '6月', '部門別研修', '各拠点' ) ) ),
			array( 'p', '7月の配属に向けて、3か月間しっかり学んでいきます。' ),
		),
	),
	array(
		'slug' => 'engineer-blog-git', 'title' => '組込み開発チームでGitの運用ルールを見直した話', 'date' => '2024-05-22 18:00:00',
		'author' => 'dev_suzuki', 'category' => 'blog', 'tags' => array( 'engineer' ),
		'blocks' => array(
			array( 'p', '開発設計部の鈴木です。チームのGit運用を見直したので、その経緯を紹介します。' ),
			array( 'h2', '以前の課題' ),
			array( 'p', 'ブランチの命名がバラバラで、どの変更がどの製品向けなのかがわかりにくい状態でした。' ),
			array( 'h2', '決めたルール' ),
			array( 'code', "feature/{製品型番}/{チケット番号}-{概要}\nfix/{製品型番}/{チケット番号}-{概要}" ),
			array( 'p', 'あわせてプルリクエストのテンプレートも用意し、レビューの観点をそろえました。' ),
			array( 'shortcode', '[minamo_note type="info"]組込みソフトウェアエンジニアを募集中です。[minamo_button url="{{home}}/jobs/embedded-software-engineer/" label="募集要項を見る"][/minamo_note]' ),
		),
	),
	array(
		'slug' => 'sensor-expo-2024', 'title' => '「センサーエキスポ2024」に出展しました', 'date' => '2024-07-05 11:00:00',
		'author' => 'pr_sato', 'category' => 'news', 'tags' => array(), 'image' => 'blog-expo',
		'blocks' => array(
			array( 'p', '6月に東京ビッグサイトで開催された展示会に出展しました。' ),
			array( 'img', 'blog-expo', 'ブースの様子' ),
			array( 'p', 'ブースでは新製品の振動センサーを展示し、3日間で800名以上の方にお立ち寄りいただきました。' ),
			array( 'embed', 'https://www.youtube.com/watch?v=REPLACE_WITH_VIDEO_ID' ),
		),
	),
	array(
		'slug' => 'summer-internship-2024', 'title' => '2024年 夏のインターンシップ参加者を募集します', 'date' => '2024-06-03 10:00:00',
		'author' => 'hr_tanaka', 'category' => 'event', 'tags' => array( 'internship', 'new-grad' ),
		'blocks' => array(
			array( 'p', '大学3年生・修士1年生を対象とした、夏のインターンシップの参加者を募集します。' ),
			array( 'columns', array(
				array( array( 'h3', '技術コース' ), array( 'p', '3日間・静岡工場<br>センサーの評価実習と工場見学' ) ),
				array( array( 'h3', 'ビジネスコース' ), array( 'p', '1日間・東京本社<br>BtoB営業の提案ワーク' ) ),
			) ),
			array( 'buttons', array( array( '申し込む', '{{home}}/entry/' ) ) ),
		),
	),
	array(
		'slug' => 'factory-festival-2024', 'title' => '静岡工場で「ミナモ夏まつり」を開催しました', 'date' => '2024-08-26 10:00:00',
		'author' => 'pr_sato', 'category' => 'blog', 'tags' => array( 'factory', 'benefits' ), 'image' => 'blog-event',
		'blocks' => array(
			array( 'p', '毎年恒例の夏まつりを開催しました。社員とご家族、近隣の方を含め、約600名が参加しました。' ),
			array( 'gallery', array( 'blog-event', 'factory-shizuoka', 'blog-team' ) ),
			array( 'p', '屋台や工場見学ツアーのほか、子ども向けの「センサー工作教室」も好評でした。' ),
		),
	),
	array(
		'slug' => 'flex-time-update', 'title' => 'フレックスタイム制度を拡充しました', 'date' => '2024-10-01 10:00:00',
		'author' => 'hr_tanaka', 'category' => 'news', 'tags' => array( 'benefits' ),
		'blocks' => array(
			array( 'p', '10月より、東京本社・つくば研究所でフレックスタイム制度の対象者を拡大しました。' ),
			array( 'html', '<div class="notice-box" style="border:2px solid #0f6e7a;padding:16px"><p><strong>変更点</strong></p><p>コアタイム：10:00〜15:00 → <span class="minamo-red">11:00〜15:00</span></p></div>' ),
			array( 'p', '制度の詳細は<a href="{{home}}/company/overview/">会社概要</a>ページもあわせてご覧ください。' ),
		),
	),
	array(
		'slug' => 'tsukuba-lab-open-house', 'title' => 'つくば研究所の一般公開に参加しました', 'date' => '2024-11-18 10:00:00',
		'author' => 'pr_sato', 'category' => 'blog', 'tags' => array( 'lab' ), 'image' => 'lab-tsukuba',
		'blocks' => array(
			array( 'p', 'つくば市内の研究機関が一斉に施設を公開するイベントに、今年もつくば研究所が参加しました。' ),
			array( 'img', 'lab-tsukuba', '' ),
			array( 'p', '研究員による「センサーのしくみ」ミニ講座には、小学生から大人まで多くの方にご参加いただきました。' ),
		),
	),
	array(
		'slug' => '2026-new-grad-entry-open', 'title' => '2026年度新卒採用のエントリー受付を開始しました', 'date' => '2025-03-01 09:00:00',
		'author' => 'hr_tanaka', 'category' => 'news', 'tags' => array( 'new-grad' ),
		'blocks' => array(
			array( 'p', '本日より、2026年度新卒採用のエントリー受付を開始しました。' ),
			array( 'buttons', array( array( '募集職種を見る', '{{home}}/jobs/' ), array( 'エントリー', '{{home}}/entry/' ) ) ),
		),
		'seo' => array( 'seo_title' => '2026年度新卒採用 エントリー受付開始｜ミナモ精工', 'seo_description' => 'ミナモ精工の2026年度新卒採用エントリー受付を開始しました。' ),
	),

	// ---------------- 2025年 ----------------
	array(
		'slug' => 'new-employee-training-2025', 'title' => '2025年度 新入社員研修レポート', 'date' => '2025-04-15 10:00:00',
		'author' => 'hr_tanaka', 'category' => 'blog', 'tags' => array( 'new-grad', 'training' ), 'image' => 'blog-training',
		'blocks' => array(
			array( 'p', '今年は21名の新入社員を迎えました。研修の様子を紹介します。' ),
			array( 'h2', 'グループワーク「ミナモ精工の製品を説明しよう」' ),
			array( 'p', '配属前の新入社員が、自社製品の価値を学生向けに説明する資料をつくりました。' ),
			array( 'img', 'blog-team', '発表の様子' ),
			array( 'quote', '技術的なことを、知らない人にわかりやすく伝える難しさを実感しました。', '新入社員 Aさん' ),
		),
	),
	array(
		'slug' => 'engineer-blog-ci', 'title' => 'ファームウェアの評価をCIで自動化した', 'date' => '2025-05-28 18:00:00',
		'author' => 'dev_suzuki', 'category' => 'blog', 'tags' => array( 'engineer' ), 'image' => 'blog-product',
		'blocks' => array(
			array( 'p', '開発設計部の鈴木です。今回は、実機を使ったファームウェア評価をCIに組み込んだ話です。' ),
			array( 'h2', '構成' ),
			array( 'list', array( 'GitHub Actionsのセルフホストランナーを社内に設置', '評価用の実機をUSB経由で接続', 'Pythonのテストスクリプトで計測値を検証' ) ),
			array( 'p', '詳しくは<a href="{{home}}/people/embedded-yamamoto/">山本さんのインタビュー</a>でも触れています。' ),
			array( 'separator' ),
			array( 'p', '<em>※本記事の内容は2025年5月時点のものです。</em>' ),
		),
	),
	array(
		'slug' => 'career-seminar-2025', 'title' => 'エンジニア向けキャリア採用説明会を開催します', 'date' => '2025-06-10 10:00:00',
		'author' => 'hr_tanaka', 'category' => 'event', 'tags' => array( 'career', 'engineer', 'seminar' ),
		'blocks' => array(
			array( 'p', '現役エンジニアが仕事内容や働き方を紹介する、オンライン説明会を開催します。' ),
			array( 'table', array( array( '日時', '2025年7月10日（木）19:00〜20:00' ), array( '形式', 'オンライン（Zoom）' ), array( '登壇者', '開発設計部 山本、研究開発部 伊藤' ) ) ),
			array( 'shortcode', '[minamo_button url="{{home}}/entry/" label="説明会に申し込む"]' ),
		),
	),
	array(
		'slug' => 'summer-festival-2025', 'title' => '今年も「ミナモ夏まつり」を開催しました', 'date' => '2025-08-25 10:00:00',
		'author' => 'pr_sato', 'category' => 'blog', 'tags' => array( 'factory', 'benefits' ), 'image' => 'blog-event',
		'blocks' => array(
			array( 'p', '昨年に続き、静岡工場で夏まつりを開催しました。今年は過去最多の約750名にご来場いただきました。' ),
			array( 'img', 'blog-event', '' ),
			array( 'p', '昨年の様子は<a href="{{home}}/blog/factory-festival-2024/">こちらの記事</a>をご覧ください。' ),
		),
	),
	array(
		'slug' => 'qualification-support', 'title' => '資格取得支援制度で、昨年度は86名が資格を取得', 'date' => '2025-09-09 10:00:00',
		'author' => 'hr_tanaka', 'category' => 'news', 'tags' => array( 'benefits' ),
		'blocks' => array(
			array( 'p', '2024年度は、資格取得支援制度を利用して86名の社員が資格を取得しました。' ),
			array( 'table', array( array( '資格', '取得者数' ), array( '電気主任技術者', '4名' ), array( 'QC検定2級', '23名' ), array( 'TOEIC 730点以上', '11名' ), array( '日商簿記2級', '6名' ), array( 'その他', '42名' ) ) ),
		),
	),
	array(
		'slug' => 'autumn-internship-2025', 'title' => '秋の1day仕事体験（静岡工場）', 'date' => '2025-10-01 10:00:00',
		'author' => 'hr_tanaka', 'category' => 'event', 'tags' => array( 'internship', 'factory' ), 'image' => 'factory-shizuoka',
		'blocks' => array(
			array( 'p', '生産技術・品質保証の仕事を1日で体験できるプログラムです。' ),
			array( 'list', array( '日程：2025年11月8日（土）', '対象：大学2年生以上（学部学科不問）', '定員：16名' ) ),
			array( 'shortcode', '[minamo_note type="warning"]当日は動きやすい服装でお越しください。[/minamo_note]' ),
		),
	),
	array(
		'slug' => 'year-end-holidays-2025', 'title' => '年末年始休業のお知らせ', 'date' => '2025-12-01 10:00:00',
		'author' => 'hr_tanaka', 'category' => 'news', 'tags' => array(),
		'blocks' => array(
			array( 'p', '誠に勝手ながら、2025年12月27日（土）〜2026年1月4日（日）を年末年始休業とさせていただきます。期間中のお問い合わせへの回答は、1月5日以降となります。' ),
		),
	),

	// ---------------- 2026年 ----------------
	array(
		'slug' => '2027-new-grad-entry-open', 'title' => '2027年度新卒採用のエントリー受付を開始しました', 'date' => '2026-03-01 09:00:00',
		'author' => 'hr_tanaka', 'category' => 'news', 'tags' => array( 'new-grad' ),
		'blocks' => array(
			array( 'p', '本日より、2027年度新卒採用のエントリー受付を開始しました。今年度は技術系・事務系あわせて25名程度の採用を予定しています。' ),
			array( 'buttons', array( array( '技術系総合職', '{{home}}/jobs/new-grad-engineering-2027/' ), array( '事務系総合職', '{{home}}/jobs/new-grad-business-2027/' ) ) ),
		),
		'seo' => array( 'seo_title' => '2027年度新卒採用 エントリー受付開始｜ミナモ精工' ),
	),
	array(
		'slug' => 'new-employee-training-2026', 'title' => '2026年度 新入社員23名が入社しました', 'date' => '2026-04-02 10:00:00',
		'author' => 'hr_tanaka', 'category' => 'news', 'tags' => array( 'new-grad', 'training' ), 'image' => 'blog-team',
		'blocks' => array(
			array( 'p', '4月1日、23名の新入社員を迎え、入社式を行いました。' ),
			array( 'img', 'blog-team', '入社式の様子' ),
			array( 'p', '今年から研修期間中に全拠点を回るプログラムを取り入れています。' ),
		),
	),
	array(
		'slug' => 'engineer-blog-rust', 'title' => '組込みRustを試してみた（社内勉強会レポート）', 'date' => '2026-05-14 18:00:00',
		'author' => 'dev_suzuki', 'category' => 'blog', 'tags' => array( 'engineer' ),
		'blocks' => array(
			array( 'p', '有志で開いている技術勉強会で、組込みRustを試してみました。' ),
			array( 'code', "#![no_std]\n#![no_main]\n\nuse cortex_m_rt::entry;\n\n#[entry]\nfn main() -> ! {\n    loop {}\n}" ),
			array( 'p', '量産製品への採用はまだ先ですが、評価ツールから少しずつ取り入れていく予定です。' ),
		),
	),
	array(
		'slug' => 'sensor-expo-2026', 'title' => '「センサーエキスポ2026」出展のお知らせ', 'date' => '2026-06-01 10:00:00',
		'author' => 'pr_sato', 'category' => 'news', 'tags' => array(), 'image' => 'blog-expo',
		'blocks' => array(
			array( 'p', '今年もセンサーエキスポに出展します。採用担当もブースにおりますので、お気軽にお声がけください。' ),
			array( 'table', array( array( '会期', '2026年6月24日（水）〜26日（金）' ), array( '会場', '東京ビッグサイト 東ホール' ), array( '小間番号', 'E-123' ) ) ),
		),
	),
	array(
		'slug' => 'summer-internship-2026', 'title' => '2026年 夏のインターンシップ（技術コース・ビジネスコース）', 'date' => '2026-06-05 10:00:00',
		'author' => 'hr_tanaka', 'category' => 'event', 'tags' => array( 'internship', 'new-grad' ), 'image' => 'blog-internship',
		'blocks' => array(
			array( 'p', '今年の夏も、技術コースとビジネスコースの2つのインターンシップを開催します。' ),
			array( 'columns', array(
				array( array( 'h3', '技術コース' ), array( 'p', '3日間・静岡工場<br>8月18日〜20日' ) ),
				array( array( 'h3', 'ビジネスコース' ), array( 'p', '1日間・東京本社<br>8月27日' ) ),
			) ),
			array( 'p', '昨年の様子は<a href="{{home}}/?p={{id:summer-internship-2024}}">こちら</a>。' ),
			array( 'buttons', array( array( '申し込む', '{{home}}/entry/' ) ) ),
		),
	),
	array(
		'slug' => 'remote-work-policy', 'title' => 'リモートワーク制度の運用ルールを更新しました', 'date' => '2026-07-01 10:00:00',
		'author' => 'hr_tanaka', 'category' => 'news', 'tags' => array( 'benefits' ),
		'blocks' => array(
			array( 'p', '7月より、東京本社の設計・管理部門でリモートワークの上限を週2日に拡大しました。' ),
			array( 'p', '詳しくは<a href="{{home}}/company/">会社を知る</a>ページの「よくある質問」をご覧ください。' ),
		),
	),
	array(
		'slug' => 'summer-festival-2026', 'title' => '「ミナモ夏まつり2026」フォトレポート', 'date' => '2026-08-24 10:00:00',
		'author' => 'pr_sato', 'category' => 'blog', 'tags' => array( 'factory', 'benefits' ), 'image' => 'blog-event',
		'blocks' => array(
			array( 'p', '今年の夏まつりの様子を写真で振り返ります。' ),
			array( 'gallery', array( 'blog-event', 'blog-team', 'factory-shizuoka', 'blog-cleanroom' ) ),
		),
	),
	array(
		'slug' => 'career-seminar-2026-autumn', 'title' => '秋のキャリア採用説明会（オンライン）', 'date' => '2026-09-15 10:00:00',
		'author' => 'hr_tanaka', 'category' => 'event', 'tags' => array( 'career', 'seminar' ),
		'blocks' => array(
			array( 'p', '生産技術・品質保証・営業のキャリア採用説明会を開催します。' ),
			array( 'table', array( array( '日時', '2026年10月22日（木）19:00〜20:00' ), array( '形式', 'オンライン' ) ) ),
			array( 'shortcode', '[minamo_button url="{{home}}/entry/" label="申し込む"]' ),
		),
	),
	array(
		'slug' => 'lab-new-building', 'title' => 'つくば研究所 新研究棟の建設を開始しました', 'date' => '2026-10-05 10:00:00',
		'author' => 'pr_sato', 'category' => 'news', 'tags' => array( 'lab' ), 'image' => 'lab-tsukuba',
		'blocks' => array(
			array( 'p', 'つくば研究所の敷地内で、新研究棟の建設を開始しました。2028年春の完成を予定しています。' ),
		),
		'seo' => array( 'seo_description' => 'つくば研究所に新研究棟を建設。2028年春の完成予定です。', 'og_image' => 'lab-tsukuba' ),
	),

	// ---------------- 予約投稿・下書き ----------------
	array(
		'slug' => 'winter-internship-2026', 'title' => '冬のインターンシップ参加者募集', 'date' => '2026-11-16 10:00:00', 'status' => 'future',
		'author' => 'hr_tanaka', 'category' => 'event', 'tags' => array( 'internship', 'new-grad' ),
		'blocks' => array(
			array( 'p', '12月に開催する冬のインターンシップの参加者を募集します。（予約投稿）' ),
		),
	),
	array(
		'slug' => 'engineer-blog-draft', 'title' => '【下書き】センサーデータの可視化ダッシュボードを作った話', 'date' => '2026-10-20 18:00:00', 'status' => 'draft',
		'author' => 'dev_suzuki', 'category' => 'blog', 'tags' => array( 'engineer' ),
		'blocks' => array(
			array( 'p', '（執筆中）' ),
		),
	),
	array(
		'slug' => 'new-year-2027-draft', 'title' => '【下書き】新年のごあいさつ', 'date' => '2026-12-28 10:00:00', 'status' => 'draft',
		'author' => 'pr_sato', 'category' => 'news', 'tags' => array(),
		'blocks' => array(
			array( 'p', '（原稿確認中）' ),
		),
	),
);
