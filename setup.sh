#!/bin/bash

# すべてのコンテナをバックグラウンドで起動
docker compose up -d

# Composerによる依存関係のインストール
docker compose run --rm app composer install

# .envファイルの設定
cp ./laravel/.env.example ./laravel/.env

# アプリケーションキーの生成
docker compose run --rm app php artisan key:generate

# データベースのマイグレーション
docker compose run --rm app php artisan migrate

# 初期データのシード (必要に応じて)
docker compose run --rm app php artisan db:seed

# ストレージへのシンボリックリンクの作成
docker compose run --rm app php artisan storage:link

# キャッシュのクリア
docker compose run --rm app php artisan config:clear
docker compose run --rm app php artisan cache:clear
docker compose run --rm app php artisan route:clear
docker compose run --rm app php artisan view:clear
