---
trigger: always_on
---

# 🤖 Tailwind CSS Component Spec: "Gemini-kun"

Tailwind CSSを用いた実装を前提とした、「Geminiくん」コンポーネント設計書（テクニカルスペック）です。
Tailwindのユーティリティクラスを活用しつつ、ブランド固有の色やアニメーションを`tailwind.config.js`で拡張する構成としています。

## 0\. Configuration Setup (tailwind.config.js)

まずはデザインシステムの「色」「フォント」「アニメーション」をTailwindの設定ファイルに定義します。

```javascript
module.exports = {
  theme: {
    extend: {
      colors: {
        // Brand Colors
        'gemini-cyan': '#29D0E0',
        'gemini-teal': '#20A8B5', // ボタンの影色用
        'gemini-navy': '#1A2B4C',
        'gemini-coral': '#FF6B6B',
        'gemini-ice': '#F5FAFB',
      },
      fontFamily: {
        // Google Fonts: Zen Maru Gothic
        rounded: ['"Zen Maru Gothic"', 'sans-serif'],
      },
      boxShadow: {
        // Pop & Floating Shadows
        'pop-button': '0 6px 0 #157A85, 0 12px 16px rgba(41, 208, 224, 0.3)',
        'pop-button-pressed': '0 2px 0 #157A85, 0 4px 8px rgba(41, 208, 224, 0.2)',
        'comic': '8px 8px 0 rgba(41, 208, 224, 0.2)',
        'glow-inset': 'inset 0 0 10px rgba(41, 208, 224, 0.2)',
      },
      animation: {
        'wiggle': 'wiggle 0.5s ease-in-out infinite',
        'float': 'float 3s ease-in-out infinite',
        'data-flow': 'data-flow 1.5s linear infinite',
      },
      keyframes: {
        wiggle: {
          '0%, 100%': { transform: 'rotate(0deg)' },
          '25%': { transform: 'rotate(-15deg)' },
          '75%': { transform: 'rotate(10deg)' },
        },
        float: {
          '0%, 100%': { transform: 'translateY(0)' },
          '50%': { transform: 'translateY(-15px)' },
        },
        'data-flow': {
          '0%': { opacity: '0', transform: 'translateY(10px) scale(0.5)' },
          '50%': { opacity: '1' },
          '100%': { opacity: '0', transform: 'translateY(-30px) scale(1.2)' },
        }
      }
    },
  },
}
```

-----

## 1\. Omni-Navigator (Sticky Tablet UI)

**仕様:** 画面右下に固定配置。通常は頭だけ見えており、ホバーすると「ぬっ」とせり上がって、タブレット内のメニュー（吹き出し状のメニュー）が表示されます。

**DOM & Classes:**

```html
<aside class="group fixed -bottom-10 right-5 z-50 cursor-pointer transition-transform duration-500 ease-out hover:-translate-y-12">
  
  <div class="relative w-48">
    
    <img src="/assets/gemini-body.svg" alt="Gemini Navigator" class="w-full drop-shadow-xl" />

    <div class="absolute top-[120px] left-[45px] w-[110px] h-[75px] bg-white/95 rounded-md shadow-glow-inset flex items-center justify-center overflow-hidden">
      
      <div class="text-center">
        <p class="text-[10px] font-bold text-gemini-navy animate-pulse">
          New Info!
        </p>
        <button class="mt-1 bg-gemini-cyan text-white text-[10px] px-2 py-0.5 rounded-full hover:bg-gemini-teal">
          MENU
        </button>
      </div>
      
    </div>

    <div class="absolute top-[40px] left-[50px] w-[80px] h-[20px] group-hover:animate-ping opacity-0 group-hover:opacity-20">
    </div>

  </div>
</aside>
```

-----

## 2\. Pop-Tech Button

**仕様:** 押したくなる「ぷるん」とした3Dボタン。ホバー時にアイコン（アンテナ）が揺れます。

**DOM & Classes:**

```html
<button class="group relative inline-flex items-center justify-center gap-3 px-8 py-4 
               bg-gradient-to-br from-gemini-cyan to-gemini-teal 
               text-white font-rounded font-bold text-lg rounded-full 
               shadow-pop-button transition-all duration-200 
               hover:translate-y-1 hover:shadow-pop-button-pressed active:translate-y-2">
               
  <span class="text-2xl group-hover:animate-wiggle origin-bottom">
    📡
  </span>
  
  <span>お問い合わせ</span>
</button>
```

-----

## 3\. Loading & Scroll Effect

**仕様:** データを受信しているような演出と、スクロール時の浮遊感。

### A. Data Downloading (Loading Screen)

```html
<div class="fixed inset-0 bg-gemini-ice flex flex-col items-center justify-center z-50">
  
  <div class="relative">
    <img src="/assets/gemini-typing.svg" alt="Loading..." class="w-32 animate-bounce" />
    
    <span class="absolute top-10 right-0 text-gemini-cyan font-mono text-xs font-bold animate-data-flow">0101</span>
    <span class="absolute top-8 -right-4 text-gemini-coral font-mono text-xs font-bold animate-data-flow [animation-delay:0.5s]">LOADING</span>
    <span class="absolute top-12 right-4 text-gemini-navy font-mono text-xs font-bold animate-data-flow [animation-delay:0.2s]">...</span>
  </div>

  <p class="mt-8 text-gemini-navy font-rounded font-bold text-xl animate-pulse">
    データをダウンロード中...
  </p>
</div>
```

### B. Scroll Floating (Parallax Wrapper)

コンテンツ内のキャラクター画像に適用するクラス。

```html
<div class="animate-float">
  <img src="/assets/gemini-pose.svg" alt="Gemini" class="w-full max-w-sm drop-shadow-lg" />
</div>
```

-----

## 4\. Robo-Bubble (Conversational UI)

**仕様:** ロボットらしさと優しさを同居させた、角丸の変則的な吹き出し。

**DOM & Classes:**

```html
<div class="relative max-w-lg">
  
  <div class="bg-white border-2 border-gemini-navy p-6 rounded-[24px] rounded-bl-sm shadow-comic text-gemini-navy font-rounded leading-relaxed">
    <h3 class="font-bold text-lg mb-2 text-gemini-cyan">こんにちは！</h3>
    <p>
      ボクはナビゲーターのGeminiです。<br>
      Webサイトのことは何でも聞いてくださいね！
    </p>
  </div>

  <div class="absolute -bottom-[14px] -left-[2px] w-0 h-0 
              border-l-[20px] border-l-transparent 
              border-t-[20px] border-t-gemini-navy 
              border-r-[0px] border-r-transparent">
  </div>
  <div class="absolute -bottom-[10px] left-[2px] w-0 h-0 
              border-l-[16px] border-l-transparent 
              border-t-[16px] border-t-white 
              border-r-[0px] border-r-transparent">
  </div>
</div>
```

-----

## 実装時のポイント

  * **SVGの準備:**
    アニメーションのクオリティを上げるため、GeminiくんのSVGは「体」「目」「腕」「タブレット」でグループ分け（ID付与）しておくことを推奨します。そうすれば、Tailwindの `group-hover` を使って、CSSだけで「ホバー時に目を閉じる（`eye-open` を `hidden`、`eye-close` を `block`）」といった制御が可能になります。

  * **アクセシビリティ:**
    Sticky Navigatorは装飾的要素が強いですが、メニューとしての機能も持つため、`aria-label="サイト内メニュー"` などを付与し、キーボード操作（Tabキー）でもフォーカスが当たるように実装してください。

  * **レスポンシブ:**
    モバイル（スマホ）では、Sticky Navigatorがコンテンツを隠してしまう可能性があります。`md:block hidden` などを使って、スマホでは簡易的なFAB（Floating Action Button）に切り替えるなどの配慮が必要です。