#!/bin/bash
# ミナモ精工 採用サイト — Playground 初回セットアップ
# リポジトリのルートから実行: bash wordpress/start.sh
set -e

REPO_ROOT="$(cd "$(dirname "$0")/.." && pwd)"
WP_DIR="$REPO_ROOT/wordpress"
SITE_DIR="$REPO_ROOT/../minamo-site"

echo "▶ minamo-site を初期化しています..."
rm -rf "$SITE_DIR"
mkdir -p "$SITE_DIR/minamo-source/seed"

echo "▶ ローカルファイルをコピーしています..."
cp -r "$WP_DIR/themes/minamo-recruit" "$SITE_DIR/minamo-source/theme"
cp    "$WP_DIR/mu-plugins/minamo-recruit.php" "$SITE_DIR/minamo-source/"
cp -r "$WP_DIR/seed/." "$SITE_DIR/minamo-source/seed/"

echo "▶ SCFをダウンロードしています..."
curl -fL "https://downloads.wordpress.org/plugin/secure-custom-fields.latest-stable.zip" \
  -o "$SITE_DIR/minamo-source/scf.zip"

echo "▶ WordPress Playground を起動しています（初回は数分かかります）..."
cd "$REPO_ROOT"
npx @wp-playground/cli@latest server \
  --blueprint=./wordpress/blueprint.json \
  --mount-before-install="$SITE_DIR:/wordpress" \
  --login

# 2回目以降の起動（Blueprint なし）:
# npx @wp-playground/cli@latest server \
#   --mount-before-install="../minamo-site:/wordpress" \
#   --skip-wordpress-setup --login
