# 🚀 Antigravitie用 開発指示プロンプト (a-blog cms Edition)

**役割:**
あなたは世界最高峰の **a-blog cms テーマ開発者** かつ **UI/UXデザイナー** です。
添付したキャラクター「Geminiくん」をメインビジュアルに据えた、a-blog cms用のカスタムテーマ `themes/gemini` を構築してください。

**⚠️ 技術的制約 (厳守):**
*   **NO React / NO Vue / NO Next.js**: 仮想DOMフレームワークは絶対に使用しないでください。
*   **AHA Stack**: 以下の技術スタックのみを使用すること。
    *   **a-blog cms (Twig)**: テンプレートエンジン
    *   **Tailwind CSS**: スタイリング
    *   **htmx**: 動的コンテンツの読み込み（サーバーサイドレンダリングとの連携）
    *   **Alpine.js**: UIのインタラクション（メニュー開閉など）

---

## Phase 1: クリエイティブアセット生成 (Nano Banana & Veo3)

まず、添付画像を「一貫性維持の参照元 (Character Reference: High)」として使用し、以下の素材を生成・保存してください。

### A. 画像生成 (via Nano Banana)
以下の4パターンを生成し、`/themes/gemini/images/` に保存してください。
1.  `gemini-hero.png`: 高品質な3Dレンダリング風。クリーンな白い抽象空間(#F5FAFB)に浮かび、カメラに向かって温かく微笑んでいる。
2.  `gemini-guide.png`: 上半身ショット。右手で右方向（メニューやコンテンツ）を指差して案内しているポーズ。
3.  `gemini-confused.png`: 404エラーページ用。ケーブルが抜けて困った顔をして頭をかいている。
4.  `gemini-nav-icon.png`: スティッキーナビゲーション用。顔のアップ（円形クロップ）。

### B. 動画生成 (via Veo3)
ヒーローセクション背景用のシームレスなループ動画を作成し、`/themes/gemini/media/` に保存してください。
*   **ファイル名**: `hero-float.mp4`
*   **入力**: 生成した `gemini-hero.png`
*   **指示**: "Slowly floating up and down, breathing idle animation, antenna glowing gently, seamless loop, clean white background."（ゆっくりと上下に浮遊する待機モーション。アンテナが優しく光る。）

---

## Phase 2: デザインシステム設定 (Tailwind CSS)

a-blog cmsの `develop` テーマ構成に合わせた `tailwind.config.js` を定義してください。

*   **Color Palette**:
    *   `gemini-cyan`: `#29D0E0` (Primary / 信頼)
    *   `gemini-navy`: `#1A2B4C` (Text & Secondary / 知性)
    *   `gemini-coral`: `#FF6B6B` (Accent / 行動喚起)
    *   `gemini-ice`: `#F5FAFB` (Background / 空気感)
*   **Typography**:
    *   Japanese: `"Zen Maru Gothic"` (Google Fonts)
    *   English: `"Varela Round"`
*   **Border Radius**:
    *   `button`: `9999px` (完全な丸み/Pill shape)
    *   `card`: `24px` (やわらかい角丸)
    *   `bubble`: `'24px 24px 24px 4px'` (ロボット風吹き出し)

---

## Phase 3: テーマ実装 (Coding)

a-blog cmsの標準的なディレクトリ構造 (`themes/develop` 準拠) に従って、以下のファイルを出力してください。

### 1. `themes/gemini/layouts/master.html` (ベースレイアウト)
*   Google Fonts (Zen Maru Gothic) の読み込み。
*   `acms.css` と Tailwindのビルド済みCSSの読み込み。
*   Alpine.js と htmx のCDN読み込み。

### 2. `themes/gemini/include/header.html`
*   **Alpine.js**: `x-data="{ open: false }"` を使用したハンバーガーメニューの実装。
*   **デザイン**: すりガラス効果（Glassmorphism）のあるスティッキーヘッダー。

### 3. `themes/gemini/templates/index.html` (トップページ)
*   **Hero Section**:
    *   `hero-float.mp4` を背景または中央に配置したフルスクリーンデザイン。
    *   キャッチコピー: 「未来は、もっとやわらかい。」 (Zen Maru Gothic, Bold, Navy)。
    *   CTAボタン: グラデーション (Cyan to Teal)、ホバー時に `animate-wiggle` (アンテナが揺れるアニメーション)。
*   **Sticky Navigator**:
    *   画面右下に固定配置。`gemini-nav-icon.png` を使用。
    *   **Interaction**: ホバー時に Alpine.js の `x-show` で吹き出し（「何かお探しですか？」）を表示。
*   **News Section**:
    *   **htmx Integration**: ページロード時に `hx-get="/include/parts/news-list.html" hx-trigger="load"` でニュースリストを動的に取得・表示する。
    *   レイアウト: Bento Grid（弁当箱）スタイルのカードレイアウト。

### 4. `themes/gemini/include/footer.html`
*   フッターの底辺から `gemini-guide.png` がひょっこり顔を出しているデザイン。

### 5. `themes/gemini/src/css/input.css`
*   Tailwindのディレクティブ定義 (`@tailwind base;` 等)。
*   カスタムクラス `.btn-primary`, `.card-hover` の `@layer components` 定義。

---

# 出力手順
1.  **アセット生成**: まず画像と動画を生成し、完了を報告してください。
2.  **コード生成**: 上記のファイル構造に従って、完全なHTML/Twig/CSSコードを出力してください。Reactのコードは含めないでください。