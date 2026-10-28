<?php
/**
 * 採用サイト設定（オプションページ）の値。
 */
return array(
	'numbers' => array(
		array( 'label' => '従業員数', 'value' => '812', 'unit' => '名', 'note' => '2026年4月時点' ),
		array( 'label' => '平均年齢', 'value' => '39.4', 'unit' => '歳', 'note' => '' ),
		array( 'label' => '技術職の割合', 'value' => '58', 'unit' => '%', 'note' => '' ),
		array( 'label' => '年間休日', 'value' => '125', 'unit' => '日', 'note' => '2025年度実績' ),
		array( 'label' => '育児休業取得率（男性）', 'value' => '76', 'unit' => '%', 'note' => '2025年度実績' ),
		array( 'label' => '新卒3年後定着率', 'value' => '94', 'unit' => '%', 'note' => '2022年入社' ),
	),
	'benefits' => array(
		array( 'category' => 'holiday', 'name' => 'リフレッシュ休暇', 'description' => '勤続5年ごとに5日間の特別休暇を付与します。' ),
		array( 'category' => 'holiday', 'name' => '時間単位有給休暇', 'description' => '年5日分まで、1時間単位で有給休暇を取得できます。' ),
		array( 'category' => 'living', 'name' => '社宅・住宅手当', 'description' => '静岡・つくば勤務者向けの社宅を用意。東京勤務者には住宅手当を支給します。' ),
		array( 'category' => 'living', 'name' => '通勤バス', 'description' => '浜松駅と静岡工場の間で無料の通勤バスを運行しています。' ),
		array( 'category' => 'growth', 'name' => '資格取得支援', 'description' => '業務に関連する資格の受験料と講座費用を会社が負担します。' ),
		array( 'category' => 'growth', 'name' => '学会参加支援', 'description' => '国内外の学会への参加・発表を支援します。' ),
		array( 'category' => 'health', 'name' => '人間ドック補助', 'description' => '35歳以上の社員の人間ドック費用を全額補助します。' ),
	),
	'flow_new_grad' => array(
		array( 'title' => 'エントリー', 'description' => 'マイページからエントリー' ),
		array( 'title' => '会社説明会', 'description' => 'オンラインまたは工場見学付きの対面' ),
		array( 'title' => '書類選考・適性検査', 'description' => 'エントリーシートとWeb適性検査' ),
		array( 'title' => '面接（2〜3回）', 'description' => '最終面接は対面で実施' ),
		array( 'title' => '内定', 'description' => '' ),
	),
	'flow_career' => array(
		array( 'title' => '応募', 'description' => 'エントリーフォームから応募' ),
		array( 'title' => '書類選考', 'description' => '1週間程度で結果をご連絡' ),
		array( 'title' => '面接（2回）', 'description' => '1次はオンライン、最終は対面' ),
		array( 'title' => '内定', 'description' => '入社時期はご相談に応じます' ),
	),
	'faq' => array(
		array( 'category' => 'selection', 'question' => '文系でも技術系総合職に応募できますか？', 'answer' => '<p>技術系総合職は理工系の方を対象としています。文系の方は事務系総合職へご応募ください。</p>' ),
		array( 'category' => 'selection', 'question' => '複数の職種に同時に応募できますか？', 'answer' => '<p>キャリア採用では2職種まで同時に応募いただけます。</p>' ),
		array( 'category' => 'work', 'question' => 'リモートワークはできますか？', 'answer' => '<p>東京本社の設計・管理部門では、週2日までリモートワークが可能です。工場・研究所勤務は原則出社です。</p>' ),
		array( 'category' => 'work', 'question' => '転勤はありますか？', 'answer' => '<p>拠点間の異動はありますが、本人の希望と事情を考慮して決定します。</p>' ),
		array( 'category' => 'other', 'question' => '工場見学はできますか？', 'answer' => '<p>説明会の一部で静岡工場の見学を実施しています。日程は<a href="{{home}}/blog/category/event/">イベント情報</a>をご確認ください。</p>' ),
	),
);
