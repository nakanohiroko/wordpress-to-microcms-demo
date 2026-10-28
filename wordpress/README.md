# 移行元WordPressサイト（ミナモ精工 採用サイト）

WordPress → microCMS 移行デモで使う、移行元のWordPressサイトです。
WordPress Playground の Blueprint で、毎回同じ状態のサイトを数十秒で立ち上げられます。

## 起動方法

ブラウザで次のURLを開きます。

```
https://playground.wordpress.net/?blueprint-url=https://raw.githubusercontent.com/nakanohiroko/wordpress-to-microcms-demo/main/wordpress/blueprint.json
```

管理画面にログインした状態で開きます。

## フォルダ構成

```
wordpress/
├── blueprint.json            Playground の起動設定
├── mu-plugins/
│   └── minamo-recruit.php    カスタム投稿タイプ・タクソノミー・オプションページ・ショートコードの登録
└── seed/
    ├── seed.php              デモデータ投入スクリプト（Blueprint の runPHP から実行）
    ├── field-groups.php      SCF のフィールドグループ定義（DBに取り込むので管理画面で編集可能）
    ├── data/                 投入するコンテンツ
    │   ├── users.php         投稿者 3名
    │   ├── terms.php         部署（階層あり）・拠点・カテゴリー・タグ
    │   ├── pages.php         固定ページ 5件
    │   ├── interviews.php    働く人 8件
    │   ├── jobs.php          募集職種 12件
    │   ├── posts.php         お知らせ・イベント・社員ブログ 31件
    │   └── options.php       採用サイト設定（オプションページ）の値
    └── images/               ダミー画像 18枚
```

## コンテンツ構成

| WordPress側 | 種類 | 主なフィールド | microCMSでの想定 |
|---|---|---|---|
| 募集職種（`job`） | カスタム投稿タイプ | 採用区分、雇用形態、仕事内容、必須・歓迎スキル（リピーター）、給与、応募締切、関連社員（リレーションシップ） | リスト形式 |
| 働く人（`interview`） | カスタム投稿タイプ | 氏名、写真、入社年、Q&A（リピーター）、1日のスケジュール（リピーター）、関連職種（リレーションシップ） | リスト形式 |
| お知らせ・ブログ（`post`） | 投稿 | カテゴリー、タグ、アイキャッチ、SEO設定 | リスト形式 |
| 部署（`department`） | 階層タクソノミー | 親子関係 | リスト形式（親を参照） |
| 拠点（`work_location`） | タクソノミー | 住所、アクセス、写真（タームのカスタムフィールド） | リスト形式 |
| 会社概要・事業紹介など | 固定ページ（親子階層） | 本文にHTML直書き | オブジェクト形式（構造化し直す） |
| 採用サイト設定 | オプションページ | 数字で見る、福利厚生、採用フロー、FAQ（すべてリピーター） | オブジェクト形式 |

## 意図的に入れている「移行のあるある」

- クラシックエディタ時代のHTML本文（`<table border="1">`、`<span style="color">`、`<br>`改行）
- 独自ショートコード `[minamo_button]` `[minamo_note]`（mu-plugin に依存）
- 添付ファイルIDに依存する `[gallery ids="..."]` ショートコード
- 未インストールのプラグインのショートコード `[contact-form-7]`（エントリーページ）
- カスタムHTMLブロック（インラインstyle、独自クラス）
- カラム・ボタン・テーブル・コード・引用・YouTube埋め込みブロック
- 本文内のWordPressドメインの画像URL、絶対URLの内部リンク、`/?p=ID` 形式のリンク
- 一部の画像の代替テキストが空
- 下書き（投稿2件・インタビュー1件）、予約投稿1件
- 複数の投稿者
- 募集終了した職種（`is_open` が false）
- SEO設定が一部の記事にしか入っていない

## 注意

- YouTube埋め込みのURLは仮の値（`REPLACE_WITH_VIDEO_ID`）です。実在の動画に差し替えてください。
- `preferredVersions.wp` は `latest` です。イベント直前にバージョンを固定すると、当日の挙動が変わるリスクを避けられます。
- 社名・住所・人物はすべて架空です。
