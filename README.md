# Fee Nail Academy WordPress Theme

Fee Nail Academyのランディングページ用WordPressテーマです。

## 📋 概要

このテーマは、Fee Nail Academy（池袋のネイルアカデミー）のランディングページとして作成されたWordPressテーマです。
https://nail-school-tokyo.com/

## ✨ 主な機能

- **レスポンシブデザイン**: モバイル、タブレット、デスクトップに対応
- **モダンなUI**: Tailwind CSSを使用したモダンなデザイン
- **スムーズスクロール**: セクション間のスムーズなスクロール機能
- **ハンバーガーメニュー**: モバイル用のハンバーガーメニュー
- **FAQアコーディオン**: よくある質問のアコーディオン機能
- **パーティクルエフェクト**: 背景のパーティクルアニメーション
- **LINE連携**: LINE友だち追加へのリンク機能

## 🎨 デザイン

- **メインカラー**: `#D98E98`
- **フォント**: 
  - 日本語: Zen Old Mincho
  - 英語: Playfair Display, Great Vibes

## 📁 ディレクトリ構造

```
wp-content/themes/fee/
├── assets/
│   ├── css/
│   └── images/
│       ├── banner.webp
│       ├── nail1.webp
│       ├── nail2.webp
│       ├── nail3.webp
│       ├── nail4.webp
│       ├── nail5.webp
│       ├── top.webp
│       ├── tool.webp
│       ├── tools.webp
│       └── tips.webp
├── functions.php
├── index.php
├── main.js
└── style.css
```

## 🚀 セットアップ

### 必要な環境

- WordPress 5.0以上
- PHP 7.4以上

### インストール方法

1. このテーマを`wp-content/themes/fee/`に配置
2. WordPress管理画面の「外観」→「テーマ」から「Fee Nail Academy LP」を有効化

### 設定

特に必要な設定はありません。テーマを有効化するだけで使用できます。

## 📝 主要ファイル

- **index.php**: メインテンプレートファイル
- **functions.php**: テーマの機能定義（スタイルシート、スクリプトの読み込み、Tailwind設定など）
- **style.css**: カスタムスタイル
- **main.js**: JavaScript機能（スクロール、FAQ、パーティクルなど）

## 🛠️ 技術スタック

- **WordPress**: CMS
- **Tailwind CSS**: スタイリング（CDN経由）
- **Lucide Icons**: アイコンライブラリ
- **Vanilla JavaScript**: インタラクティブ機能

## 📱 セクション構成

1. **Hero**: メインビジュアル
2. **Banner**: キャンペーンバナー
3. **Intro**: アカデミー紹介
4. **Features**: アカデミーの特徴
5. **Skills**: 学べる技術
6. **Courses**: コース内容
7. **Future**: 卒業後の進路
8. **Steps**: 入校手順
9. **Access**: アクセス情報
10. **FAQ**: よくある質問

## 🎯 カスタマイズ

### カラーの変更

`functions.php`の`tailwind.config`内でカラーを変更できます：

```javascript
colors: {
  'rose-gold': '#D98E98',
  'rose-gold-dark': '#C07A85',
  // ...
}
```

### 画像の変更

`assets/images/`ディレクトリ内の画像を置き換えることで、各セクションの画像を変更できます。

## 📄 ライセンス

このテーマはFee Nail Academy専用のテーマです。

---

**Version**: 1.0  
**Last Updated**: 2024

