<?php
/**
 * ミナモ精工 採用サイト デモデータ投入スクリプト
 *
 * Blueprint の runPHP ステップから、wp-load.php を読み込んだ後に実行されます。
 * SCF（Secure Custom Fields）が有効化されている必要があります。
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Load WordPress first.' );
}

require_once ABSPATH . 'wp-admin/includes/image.php';
require_once ABSPATH . 'wp-admin/includes/file.php';
require_once ABSPATH . 'wp-admin/includes/media.php';
require_once ABSPATH . 'wp-admin/includes/post.php';

if ( ! function_exists( 'acf_import_field_group' ) ) {
	exit( 'Secure Custom Fields is not active.' );
}

$minamo_dir = __DIR__;
$minamo     = array(
	'images' => array(), // 画像キー => 添付ファイルID
	'posts'  => array(), // スラッグ => 投稿ID（全投稿タイプ共通）
	'users'  => array(), // ログイン名 => ユーザーID
	'keys'   => array(), // フィールド名 => フィールドキー（グループごと）
);

// 管理者として実行（カスタムHTMLやstyle属性がkses で削除されないようにする）
wp_set_current_user( 1 );
kses_remove_filters();

// 画像のリサイズを最小限にして投入を速くする
add_filter( 'intermediate_image_sizes_advanced', function ( $sizes ) {
	return array_intersect_key( $sizes, array_flip( array( 'thumbnail', 'medium', 'large' ) ) );
} );
add_filter( 'big_image_size_threshold', '__return_false' );

// ---------------------------------------------------------------------
// ヘルパー
// ---------------------------------------------------------------------

/** プレースホルダー {{home}} {{img:key}} {{id:slug}} を置換 */
function minamo_replace( $value ) {
	global $minamo;
	if ( is_array( $value ) ) {
		return array_map( 'minamo_replace', $value );
	}
	if ( ! is_string( $value ) ) {
		return $value;
	}
	$value = str_replace( '{{home}}', untrailingslashit( home_url() ), $value );
	$value = preg_replace_callback( '/\{\{img:([a-z0-9\-]+)\}\}/', function ( $m ) use ( $minamo ) {
		$id = $minamo['images'][ $m[1] ] ?? 0;
		return $id ? wp_get_attachment_image_url( $id, 'large' ) : '';
	}, $value );
	$value = preg_replace_callback( '/\{\{id:([a-z0-9\-]+)\}\}/', function ( $m ) use ( $minamo ) {
		return (string) ( $minamo['posts'][ $m[1] ] ?? 0 );
	}, $value );
	return $value;
}

/** 画像キーを添付ファイルIDに変換（値がそのまま画像キーの場合） */
function minamo_image_id( $key ) {
	global $minamo;
	return $minamo['images'][ $key ] ?? 0;
}

/** ブロック定義の配列から、Gutenberg のブロックマークアップを生成 */
function minamo_blocks( array $blocks ) {
	return implode( "\n\n", array_map( 'minamo_block', $blocks ) );
}

function minamo_block( array $b ) {
	$type = $b[0];
	switch ( $type ) {
		case 'p':
			return "<!-- wp:paragraph -->\n<p>{$b[1]}</p>\n<!-- /wp:paragraph -->";

		case 'h2':
			return "<!-- wp:heading -->\n<h2 class=\"wp-block-heading\">{$b[1]}</h2>\n<!-- /wp:heading -->";

		case 'h3':
			return "<!-- wp:heading {\"level\":3} -->\n<h3 class=\"wp-block-heading\">{$b[1]}</h3>\n<!-- /wp:heading -->";

		case 'img':
			$id      = minamo_image_id( $b[1] );
			$url     = wp_get_attachment_image_url( $id, 'large' );
			$alt     = esc_attr( get_post_meta( $id, '_wp_attachment_image_alt', true ) );
			$caption = ! empty( $b[2] ) ? "<figcaption class=\"wp-element-caption\">{$b[2]}</figcaption>" : '';
			return "<!-- wp:image {\"id\":{$id},\"sizeSlug\":\"large\",\"linkDestination\":\"none\"} -->\n"
				. "<figure class=\"wp-block-image size-large\"><img src=\"{$url}\" alt=\"{$alt}\" class=\"wp-image-{$id}\"/>{$caption}</figure>\n"
				. '<!-- /wp:image -->';

		case 'list':
			$ordered = ! empty( $b[2] );
			$tag     = $ordered ? 'ol' : 'ul';
			$attrs   = $ordered ? ' {"ordered":true}' : '';
			$items   = implode( "\n", array_map( function ( $item ) {
				return "<!-- wp:list-item -->\n<li>{$item}</li>\n<!-- /wp:list-item -->";
			}, $b[1] ) );
			return "<!-- wp:list{$attrs} -->\n<{$tag} class=\"wp-block-list\">{$items}</{$tag}>\n<!-- /wp:list -->";

		case 'table':
			$rows = implode( '', array_map( function ( $row ) {
				return '<tr>' . implode( '', array_map( function ( $cell ) {
					return "<td>{$cell}</td>";
				}, $row ) ) . '</tr>';
			}, $b[1] ) );
			return "<!-- wp:table -->\n<figure class=\"wp-block-table\"><table class=\"has-fixed-layout\"><tbody>{$rows}</tbody></table></figure>\n<!-- /wp:table -->";

		case 'quote':
			$cite = ! empty( $b[2] ) ? "<cite>{$b[2]}</cite>" : '';
			return "<!-- wp:quote -->\n<blockquote class=\"wp-block-quote\"><!-- wp:paragraph -->\n<p>{$b[1]}</p>\n<!-- /wp:paragraph -->{$cite}</blockquote>\n<!-- /wp:quote -->";

		case 'code':
			$code = esc_html( $b[1] );
			return "<!-- wp:code -->\n<pre class=\"wp-block-code\"><code>{$code}</code></pre>\n<!-- /wp:code -->";

		case 'separator':
			return "<!-- wp:separator -->\n<hr class=\"wp-block-separator has-alpha-channel-opacity\"/>\n<!-- /wp:separator -->";

		case 'buttons':
			$buttons = implode( "\n\n", array_map( function ( $btn ) {
				return "<!-- wp:button -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link wp-element-button\" href=\"{$btn[1]}\">{$btn[0]}</a></div>\n<!-- /wp:button -->";
			}, $b[1] ) );
			return "<!-- wp:buttons -->\n<div class=\"wp-block-buttons\">{$buttons}</div>\n<!-- /wp:buttons -->";

		case 'columns':
			$cols = implode( "\n\n", array_map( function ( $col ) {
				return "<!-- wp:column -->\n<div class=\"wp-block-column\">" . minamo_blocks( $col ) . "</div>\n<!-- /wp:column -->";
			}, $b[1] ) );
			return "<!-- wp:columns -->\n<div class=\"wp-block-columns\">{$cols}</div>\n<!-- /wp:columns -->";

		case 'embed':
			$url = $b[1];
			return "<!-- wp:embed {\"url\":\"{$url}\",\"type\":\"video\",\"providerNameSlug\":\"youtube\",\"responsive\":true,\"className\":\"wp-embed-aspect-16-9 wp-has-aspect-ratio\"} -->\n"
				. "<figure class=\"wp-block-embed is-type-video is-provider-youtube wp-block-embed-youtube wp-embed-aspect-16-9 wp-has-aspect-ratio\"><div class=\"wp-block-embed__wrapper\">\n{$url}\n</div></figure>\n"
				. '<!-- /wp:embed -->';

		case 'html':
			return "<!-- wp:html -->\n{$b[1]}\n<!-- /wp:html -->";

		case 'shortcode':
			return "<!-- wp:shortcode -->\n{$b[1]}\n<!-- /wp:shortcode -->";

		case 'gallery':
			// 旧来の [gallery] ショートコード（添付ファイルIDに依存する例）
			$ids = implode( ',', array_map( 'minamo_image_id', $b[1] ) );
			return "<!-- wp:shortcode -->\n[gallery ids=\"{$ids}\" columns=\"3\" size=\"medium\"]\n<!-- /wp:shortcode -->";
	}
	return '';
}

/** フィールド名 => キーの対応表をフィールドグループ定義から作る */
function minamo_field_key( $group_key, $name ) {
	global $minamo;
	return $minamo['keys'][ $group_key ][ $name ] ?? $name;
}

/** フィールド値をまとめて保存（画像キーはIDへ、文字列はプレースホルダー置換） */
function minamo_save_fields( $group_key, array $fields, $object_id, array $image_fields = array() ) {
	foreach ( $fields as $name => $value ) {
		if ( in_array( $name, $image_fields, true ) ) {
			$value = minamo_image_id( $value );
		}
		update_field( minamo_field_key( $group_key, $name ), minamo_replace( $value ), $object_id );
	}
}

/** 投稿・固定ページ・カスタム投稿を作成 */
function minamo_insert( $post_type, array $item, array $extra = array() ) {
	global $minamo;

	if ( isset( $item['classic'] ) ) {
		$content = minamo_replace( $item['classic'] );
	} elseif ( isset( $item['blocks'] ) ) {
		$content = minamo_replace( minamo_blocks( $item['blocks'] ) );
	} else {
		$content = '';
	}

	$date   = $item['date'] ?? current_time( 'mysql' );
	$postarr = array_merge( array(
		'post_type'     => $post_type,
		'post_title'    => $item['title'],
		'post_name'     => $item['slug'],
		'post_content'  => wp_slash( $content ),
		'post_excerpt'  => $item['excerpt'] ?? '',
		'post_status'   => $item['status'] ?? 'publish',
		'post_date'     => $date,
		'post_date_gmt' => get_gmt_from_date( $date ),
		'post_author'   => $minamo['users'][ $item['author'] ?? '' ] ?? 1,
		'menu_order'    => $item['menu_order'] ?? 0,
	), $extra );

	$id = wp_insert_post( $postarr, true );
	if ( is_wp_error( $id ) ) {
		echo 'ERROR: ' . $item['slug'] . ' ' . $id->get_error_message() . "\n";
		return 0;
	}
	$minamo['posts'][ $item['slug'] ] = $id;

	if ( ! empty( $item['image'] ) ) {
		set_post_thumbnail( $id, minamo_image_id( $item['image'] ) );
	}
	foreach ( $item['terms'] ?? array() as $taxonomy => $slugs ) {
		wp_set_object_terms( $id, $slugs, $taxonomy );
	}
	if ( ! empty( $item['seo'] ) ) {
		minamo_save_fields( 'group_minamo_seo', $item['seo'], $id, array( 'og_image' ) );
	}
	return $id;
}

// ---------------------------------------------------------------------
// 1. 不要な初期データを削除
// ---------------------------------------------------------------------
wp_delete_post( 1, true ); // Hello world!
wp_delete_post( 2, true ); // Sample Page

// ---------------------------------------------------------------------
// 2. パーマリンク
// ---------------------------------------------------------------------
global $wp_rewrite;
$wp_rewrite->set_permalink_structure( '/blog/%postname%/' );

// ---------------------------------------------------------------------
// 3. フィールドグループをデータベースに取り込む（SCF管理画面で表示・編集可能）
// ---------------------------------------------------------------------
$field_groups = require $minamo_dir . '/field-groups.php';
foreach ( $field_groups as $group ) {
	acf_import_field_group( $group );
	foreach ( $group['fields'] as $field ) {
		if ( ! empty( $field['name'] ) ) {
			$minamo['keys'][ $group['key'] ][ $field['name'] ] = $field['key'];
		}
	}
}
echo 'Field groups: ' . count( $field_groups ) . "\n";

// ---------------------------------------------------------------------
// 4. ユーザー
// ---------------------------------------------------------------------
foreach ( require $minamo_dir . '/data/users.php' as $user ) {
	$user_id = wp_insert_user( array_merge( $user, array(
		'user_pass'  => wp_generate_password( 16 ),
		'user_email' => $user['user_login'] . '@minamo-seiko.example',
		'nickname'   => $user['display_name'],
	) ) );
	if ( ! is_wp_error( $user_id ) ) {
		$minamo['users'][ $user['user_login'] ] = $user_id;
	}
}
echo 'Users: ' . count( $minamo['users'] ) . "\n";

// ---------------------------------------------------------------------
// 5. 画像をメディアライブラリに登録
// ---------------------------------------------------------------------
$image_alts = array(
	'office-tokyo'     => '東京本社の外観',
	'factory-shizuoka' => '静岡工場の外観',
	'lab-tsukuba'      => 'つくば研究所',
	'blog-internship'  => 'インターンシップの様子',
	'blog-cleanroom'   => 'クリーンルームでの作業',
	'blog-training'    => '新入社員研修',
	'blog-expo'        => '展示会のブース',
	'blog-event'       => '夏まつりの様子',
	'blog-team'        => 'チームの集合写真',
	'blog-product'     => '製品開発の様子',
);
foreach ( glob( $minamo_dir . '/images/*.jpg' ) as $path ) {
	$key = basename( $path, '.jpg' );
	$tmp = wp_tempnam( $key . '.jpg' );
	copy( $path, $tmp );
	$attachment_id = media_handle_sideload(
		array( 'name' => $key . '.jpg', 'tmp_name' => $tmp ),
		0,
		$image_alts[ $key ] ?? $key
	);
	if ( is_wp_error( $attachment_id ) ) {
		echo 'ERROR image ' . $key . ': ' . $attachment_id->get_error_message() . "\n";
		continue;
	}
	// 一部の画像はあえて代替テキストを空のままにする（移行時のチェック対象の例）
	if ( isset( $image_alts[ $key ] ) ) {
		update_post_meta( $attachment_id, '_wp_attachment_image_alt', $image_alts[ $key ] );
	}
	$minamo['images'][ $key ] = $attachment_id;
}
echo 'Images: ' . count( $minamo['images'] ) . "\n";

// ---------------------------------------------------------------------
// 6. タクソノミーのターム
// ---------------------------------------------------------------------
foreach ( require $minamo_dir . '/data/terms.php' as $taxonomy => $terms ) {
	foreach ( $terms as $term ) {
		$args = array( 'slug' => $term['slug'], 'description' => $term['description'] ?? '' );
		if ( ! empty( $term['parent'] ) ) {
			$parent         = get_term_by( 'slug', $term['parent'], $taxonomy );
			$args['parent'] = $parent ? $parent->term_id : 0;
		}
		$existing = get_term_by( 'slug', $term['slug'], $taxonomy );
		$result   = $existing
			? array( 'term_id' => $existing->term_id )
			: wp_insert_term( $term['name'], $taxonomy, $args );
		if ( is_wp_error( $result ) ) {
			echo 'ERROR term ' . $term['slug'] . ': ' . $result->get_error_message() . "\n";
			continue;
		}
		if ( ! empty( $term['fields'] ) ) {
			foreach ( $term['fields'] as $field_key => $value ) {
				// 画像フィールドは画像キーを添付ファイルIDに変換して保存する
				$value = 'field_loc_photo' === $field_key ? minamo_image_id( $value ) : minamo_replace( $value );
				update_field( $field_key, $value, 'term_' . $result['term_id'] );
			}
		}
	}
}
// 「未分類」カテゴリーを削除
$uncategorized = get_term_by( 'slug', 'uncategorized', 'category' );
if ( $uncategorized ) {
	$news = get_term_by( 'slug', 'news', 'category' );
	update_option( 'default_category', $news->term_id );
	wp_delete_term( $uncategorized->term_id, 'category' );
}
echo "Terms: done\n";

// ---------------------------------------------------------------------
// 7. 固定ページ
// ---------------------------------------------------------------------
foreach ( require $minamo_dir . '/data/pages.php' as $page ) {
	$extra = array();
	if ( ! empty( $page['parent'] ) ) {
		$extra['post_parent'] = $minamo['posts'][ $page['parent'] ] ?? 0;
	}
	minamo_insert( 'page', $page, $extra );
}
echo "Pages: done\n";

// ---------------------------------------------------------------------
// 8. 働く人（先に作成して、募集職種から参照できるようにする）
// ---------------------------------------------------------------------
$interviews = require $minamo_dir . '/data/interviews.php';
foreach ( $interviews as $iv ) {
	$iv['image'] = $iv['photo'];
	$iv['excerpt'] = $iv['fields']['catchcopy'];
	$id = minamo_insert( 'interview', $iv );
	if ( $id ) {
		minamo_save_fields( 'group_minamo_interview', $iv['fields'], $id );
		update_field( 'field_iv_photo', minamo_image_id( $iv['photo'] ), $id );
	}
}
echo 'Interviews: ' . count( $interviews ) . "\n";

// ---------------------------------------------------------------------
// 9. 募集職種（働く人との相互参照も設定）
// ---------------------------------------------------------------------
$jobs         = require $minamo_dir . '/data/jobs.php';
$reverse_refs = array(); // interview ID => job IDs
foreach ( $jobs as $job ) {
	$id = minamo_insert( 'job', $job );
	if ( ! $id ) {
		continue;
	}
	minamo_save_fields( 'group_minamo_job', $job['fields'], $id );

	$people_ids = array();
	foreach ( $job['related_people'] ?? array() as $slug ) {
		if ( ! empty( $minamo['posts'][ $slug ] ) ) {
			$people_ids[]                                  = $minamo['posts'][ $slug ];
			$reverse_refs[ $minamo['posts'][ $slug ] ][] = $id;
		}
	}
	update_field( 'field_job_related_people', $people_ids, $id );
}
foreach ( $reverse_refs as $interview_id => $job_ids ) {
	update_field( 'field_iv_related_jobs', $job_ids, $interview_id );
}
echo 'Jobs: ' . count( $jobs ) . "\n";

// ---------------------------------------------------------------------
// 10. 投稿（お知らせ・イベント・社員ブログ）
// ---------------------------------------------------------------------
$posts = require $minamo_dir . '/data/posts.php';
foreach ( $posts as $post ) {
	$id = minamo_insert( 'post', $post );
	if ( ! $id ) {
		continue;
	}
	$category = get_term_by( 'slug', $post['category'], 'category' );
	wp_set_post_categories( $id, array( $category->term_id ) );
	if ( ! empty( $post['tags'] ) ) {
		wp_set_object_terms( $id, $post['tags'], 'post_tag' );
	}
}
echo 'Posts: ' . count( $posts ) . "\n";

// ---------------------------------------------------------------------
// 11. 採用サイト設定（オプションページ）
// ---------------------------------------------------------------------
minamo_save_fields( 'group_minamo_settings', require $minamo_dir . '/data/options.php', 'option' );
echo "Options: done\n";

// ---------------------------------------------------------------------
// 12. 仕上げ
// ---------------------------------------------------------------------
flush_rewrite_rules( false );
echo "Done.\n";
