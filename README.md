# TodoリストのLaravel WebAPI

タスクの投稿、一覧表示、更新、削除を行う、WebAPI

## 要件
- Docker
- Docker Compose

## 使用技術
<p style="display: inline">
  <!-- バックエンドのフレームワーク一覧 -->
  <img src="https://img.shields.io/badge/laravel-%23FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white">
  <img src="https://img.shields.io/badge/nginx-%23009639.svg?style=for-the-badge&logo=nginx&logoColor=white">
  <img src="https://img.shields.io/badge/mysql-4479A1.svg?style=for-the-badge&logo=mysql&logoColor=white">
  <img src="https://img.shields.io/badge/docker-%230db7ed.svg?style=for-the-badge&logo=docker&logoColor=white">

</p>

## 環境構築

1. レポジトリのクローン:
   ```bash
   git clone git@github.com:kyosuke03155/laravel-api.git
   ```

2. プロジェクトのルートディレクトリでシェルスクリプトを実行:
   ```bash
   sh setup.sh
   ```

3. (終了時)コンテナの停止
   ```bash
   docker compose down
   ```