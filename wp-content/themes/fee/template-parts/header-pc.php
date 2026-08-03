<?php
// PCヘッダー（コーディング版LP用）
// index.php（画像版）の .pchead を通常フロー配置に変更して移植したもの。
// 切替完了後は index.php からもこのパーツを読み込む。
?>
<style>
/* PCヘッダー（画像に比例：vw単位） */
.pchead2 { position: relative; z-index: 20;
    height: 5.3vw; display: flex; align-items: center;
    background: #f6ebe6; padding: 0 1.45vw; box-sizing: border-box;
    line-height: 1.25; font-size: 1rem; }
.pchead2-logo { display: flex; flex-direction: column; justify-content: center;
    line-height: 1; text-decoration: none; margin-right: 1.6vw; }
/* スクリプト体(Great Vibes)は字面がemボックスの上下にはみ出すが、background-clip:text は
   ボックスの中しか塗らないため、そのままだとロゴの上端が水平にスパッと欠ける。
   パディングで塗り範囲を広げ、同じ量のネガティブマージンで元のレイアウトに戻している。 */
.pchead2-fee { font-family: var(--font-script); font-size: 2.45vw; line-height: 1;
    padding: 0.14em 0; margin: -0.14em 0;
    background: var(--grad-brand);
    -webkit-background-clip: text; background-clip: text;
    -webkit-text-fill-color: transparent; color: transparent; }
.pchead2-sub { font-family: var(--font-jp); font-size: 0.8vw; color: #6b5b57;
    letter-spacing: .04em; margin-top: 0.2vw; }
.pchead2-nav { display: flex; align-items: center; gap: 1.45vw;
    flex: 1 1 auto; justify-content: end; }
.pchead2-nav a { font-family: var(--font-jp); font-size: 0.92vw; color: #5a4a46;
    text-decoration: none; white-space: nowrap; transition: color .15s ease; outline: none; }
.pchead2-nav a:hover { color: #e0569a; }
.pchead2-pills { display: flex; align-items: center; gap: 0.7vw; margin-left: 1vw; }
.pchead2-pill { display: inline-flex; align-items: center; gap: 0.42vw; border-radius: 999px;
    font-size: 0.84vw; font-weight: 700; text-decoration: none; padding: 0.6vw 1.05vw;
    white-space: nowrap; font-family: var(--font-jp);
    transition: transform .12s ease, filter .15s ease; outline: none; }
.pchead2-pill:active { transform: scale(0.96); }
.pchead2-pill svg { width: 1.05vw; height: 1.05vw; flex: 0 0 auto; }
.pchead2-ig { background: linear-gradient(135deg, #f56fae, #de3f8c); color: #fff;
    box-shadow: 0 0.18vw 0.5vw rgba(222,63,140,.35); }
.pchead2-line { background: linear-gradient(135deg, #ffe7a0, #ffd35d); color: #6a4f1e;
    box-shadow: 0 0.18vw 0.5vw rgba(230,180,60,.35); }
.pchead2-ig:hover, .pchead2-line:hover { filter: brightness(1.05); }
@media (max-width: 768px) {
    .pchead2 { display: none; }
}
</style>
<header class="pchead2">
  <a class="pchead2-logo" href="#pagetop" aria-label="池袋ネイルカレッジ Fee トップへ">
    <span class="pchead2-fee">Fee</span>
    <span class="pchead2-sub">池袋ネイルカレッジ</span>
  </a>
  <nav class="pchead2-nav">
    <a href="#features">アカデミー紹介</a>
    <a href="#atmosphere">授業風景</a>
    <a href="#skills">学べる技術</a>
    <a href="#courses">コース内容</a>
    <a href="#future">卒業後</a>
    <a href="#steps">入校手順</a>
    <a href="#access">アクセス</a>
    <a href="#faq">よくある質問</a>
  </nav>
  <div class="pchead2-pills">
    <a class="pchead2-pill pchead2-ig" href="https://www.instagram.com/fee.nail.academy/" target="_blank" rel="noopener noreferrer">
      <svg viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.2" cy="6.8" r="0.6" fill="currentColor" stroke="none"/></svg>
      Instagram
    </a>
    <a class="pchead2-pill pchead2-line" href="https://lin.ee/IdR5PPL" target="_blank" rel="noopener noreferrer">
      <svg viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4.5" width="18" height="16.5" rx="2.5"/><path d="M3 9.5h18M8 2.5v4M16 2.5v4"/></svg>
      無料LINE相談
    </a>
  </div>
</header>
