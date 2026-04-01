# Calendar App — スケジュール共有カレンダーアプリケーション

## Project Overview
Laravel製のカレンダーアプリ。複数ユーザー間でスケジュールを共有し、日程の確認・予定の追加・詳細表示が可能。Laravel Breezeによる認証機能付き。

## Tech Stack
- PHP 8.0+ / Laravel 9
- Laravel Breeze (認証)
- Laravel Sanctum (API認証)
- Blade テンプレート
- Tailwind CSS / Vite
- Docker (docker-compose.yml)
- PHPUnit (テスト)

## Repository Structure
- `app/` — アプリケーションコード (Models, Http, View等)
- `resources/views/` — Bladeテンプレート (calendar/, auth/, dashboard等)
- `routes/` — ルーティング定義
- `database/migrations/` — DBマイグレーション (users, calendars)
- `config/` — Laravel設定ファイル
- `tests/` — テストコード

## GitHub
- Repository: shutouyusei/calendar

## Rules for Claude
- All commit messages in English, format: `<type>: <description>`
- Types: feat, fix, refactor, docs, test, chore
- One logical change per commit
