<?php
/**
 * 固定ページ。
 * 会社概要などは「本文にHTMLで直書き」された状態を再現しています
 * （構造化されていない情報を、移行時にどう扱うかを見せるため）。
 * {{home}} はサイトURL、{{img:キー}} は画像URLに置換されます。
 */
return array(
	array(
		'slug' => 'company', 'title' => '会社を知る', 'menu_order' => 10,
		'blocks' => array(
			array( 'p', 'ミナモ精工は、産業用センサーと精密部品をつくるBtoBメーカーです。あなたの身の回りの工場やロボット、物流倉庫の中で、私たちの製品が静かに働いています。' ),
			array( 'list', array( '<a href="{{home}}/company/overview/">会社概要</a>', '<a href="{{home}}/company/business/">事業紹介</a>', '<a href="{{home}}/company/message/">代表メッセージ</a>' ) ),
		),
	),
	array(
		'slug' => 'overview', 'title' => '会社概要', 'parent' => 'company', 'menu_order' => 1,
		// クラシックエディタ時代に作られ、HTMLで直書きされたままのページ
		'classic' => '<table class="company-table" style="width:100%;border-collapse:collapse">
<tbody>
<tr><th style="width:30%">社名</th><td>株式会社ミナモ精工（MINAMO SEIKO Co., Ltd.）</td></tr>
<tr><th>設立</th><td>1978年4月</td></tr>
<tr><th>資本金</th><td>4億8,000万円</td></tr>
<tr><th>代表者</th><td>代表取締役社長　水野 浩一</td></tr>
<tr><th>従業員数</th><td>812名（2026年4月時点）</td></tr>
<tr><th>売上高</th><td>214億円（2025年度）</td></tr>
<tr><th>事業内容</th><td>産業用センサー、精密部品の研究開発・製造・販売</td></tr>
<tr><th>拠点</th><td>東京本社（品川区）<br>静岡工場（浜松市）<br>つくば研究所（つくば市）</td></tr>
</tbody>
</table>
<p>&nbsp;</p>
<h3>沿革</h3>
<p>1978年　東京都大田区にて創業<br>
1991年　静岡工場 竣工<br>
2005年　振動センサー「MS-Vシリーズ」発売<br>
2014年　つくば研究所 開設<br>
2022年　静岡工場に新クリーンルーム棟を増設</p>
<p><img class="alignnone size-large" src="{{img:office-tokyo}}" alt="東京本社" width="1200" height="800" /></p>',
	),
	array(
		'slug' => 'business', 'title' => '事業紹介', 'parent' => 'company', 'menu_order' => 2,
		'blocks' => array(
			array( 'p', 'ミナモ精工の事業は、大きく3つの領域に分かれています。' ),
			array( 'h2', '産業用センサー事業' ),
			array( 'columns', array(
				array( array( 'img', 'factory-shizuoka' ) ),
				array( array( 'p', '工作機械やロボットの異常を検知する振動センサー、位置を測る変位センサーなどを開発・製造しています。売上の約7割を占める主力事業です。' ) ),
			) ),
			array( 'h2', '精密部品事業' ),
			array( 'p', '創業以来培ってきた微細加工技術を活かし、医療機器や計測機器向けの精密部品を製造しています。' ),
			array( 'h2', '新規事業（研究開発）' ),
			array( 'p', 'つくば研究所を中心に、次世代MEMSセンサーや、センサーデータを活用した予知保全サービスの開発に取り組んでいます。' ),
			array( 'html', '<div class="business-ratio"><span class="minamo-red">売上構成比</span>：産業用センサー 72% ／ 精密部品 25% ／ その他 3%</div>' ),
		),
	),
	array(
		'slug' => 'message', 'title' => '代表メッセージ', 'parent' => 'company', 'menu_order' => 3,
		'blocks' => array(
			array( 'quote', '見えないところで、世界を支える。', '代表取締役社長　水野 浩一' ),
			array( 'p', '私たちの製品は、最終製品の中に組み込まれるため、一般の方の目に触れることはほとんどありません。しかし、工場の安全や物流の効率を、確かに支えています。' ),
			array( 'p', '技術は人がつくるものです。好奇心を持ち、自分の頭で考え、仲間と議論できる人と一緒に、次の50年をつくっていきたいと考えています。' ),
		),
	),
	array(
		'slug' => 'entry', 'title' => 'エントリー', 'menu_order' => 20,
		'blocks' => array(
			array( 'p', '下記フォームよりエントリーしてください。新卒採用の方は、マイページからのエントリーも受け付けています。' ),
			// 未インストールのフォームプラグインのショートコード（移行対象外の切り分けの例）
			array( 'shortcode', '[contact-form-7 id="128" title="エントリーフォーム"]' ),
			array( 'buttons', array( array( '新卒採用マイページ', 'https://mypage.example.com/minamo-seiko/' ) ) ),
		),
	),
);
