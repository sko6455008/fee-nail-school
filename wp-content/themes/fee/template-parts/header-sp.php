<?php
// SPハンバーガーメニュー（コーディング版LP用）
// index.php（画像版）の .sp-burger / .sp-nav を移植したもの（アンカーは #sp-* ではなく実IDへ統一）。
// 開閉JSは呼び出し側（preview.php / 切替後のindex.php）に配置する。
?>
<style>
/* ハンバーガーメニュー（SP専用） */
.sp2-burger { position: fixed; top: 14px; right: 14px; z-index: 1100;
    width: 52px; height: 52px; border: 0; border-radius: 50%; padding: 0;
    background: rgba(255,255,255,0.92); box-shadow: 0 4px 14px rgba(180,120,140,0.35);
    cursor: pointer; display: none; }
.sp2-burger span { display: block; width: 26px; height: 3px; margin: 5px auto;
    background: #d96a8e; border-radius: 3px; transition: transform .25s ease, opacity .25s ease; }
.sp2-burger.open span:nth-child(1) { transform: translateY(8px) rotate(45deg); }
.sp2-burger.open span:nth-child(2) { opacity: 0; }
.sp2-burger.open span:nth-child(3) { transform: translateY(-8px) rotate(-45deg); }
.sp2-overlay { position: fixed; inset: 0; z-index: 1050;
    background: rgba(60,40,50,0.45); opacity: 0; visibility: hidden; transition: .25s; }
.sp2-overlay.open { opacity: 1; visibility: visible; }
.sp2-nav { position: fixed; top: 0; right: 0; z-index: 1060;
    width: 74%; max-width: 320px; height: 100%; box-sizing: border-box;
    background: linear-gradient(160deg, #fff0f6, #fef9f5);
    box-shadow: -8px 0 30px rgba(180,120,140,0.3);
    transform: translateX(100%); transition: transform .28s ease;
    overflow-y: auto; -webkit-overflow-scrolling: touch; padding: 78px 0 30px; }
.sp2-nav.open { transform: translateX(0); }
.sp2-nav a { display: block; padding: 15px 26px; font-size: 16px; color: #5D4E4A;
    text-decoration: none; font-family: var(--font-jp);
    border-bottom: 1px solid rgba(217,142,152,0.22); }
.sp2-nav a:active { background: rgba(217,142,152,0.12); }
.sp2-nav a.ext { color: #d96a8e; font-weight: 700; }
.sp2-burger:focus, .sp2-burger:focus-visible,
.sp2-nav a:focus, .sp2-nav a:focus-visible { outline: none !important; box-shadow: none !important; }
.sp2-nav .sp2-nav-ttl { padding: 0 26px 10px; font-family: var(--font-en);
    font-size: 13px; letter-spacing: .15em; color: #b98; }
@media (max-width: 768px) {
    .sp2-burger { display: block; }
}
</style>
<button class="sp2-burger" id="spBurger2" aria-label="メニューを開く" aria-expanded="false">
  <span></span><span></span><span></span>
</button>
<div class="sp2-overlay" id="spOverlay2"></div>
<nav class="sp2-nav" id="spNav2" aria-label="メニュー">
  <div class="sp2-nav-ttl">MENU</div>
  <a href="#features">アカデミー紹介</a>
  <a href="#atmosphere">授業風景</a>
  <a href="#skills">学べる技術</a>
  <a href="#courses">コース内容</a>
  <a href="#future">卒業後</a>
  <a href="#steps">入校手順</a>
  <a href="#access">アクセス</a>
  <a href="#faq">よくある質問</a>
  <a class="ext" href="https://www.instagram.com/fee.nail.academy/" target="_blank" rel="noopener noreferrer">Instagram</a>
  <a class="ext" href="https://lin.ee/IdR5PPL" target="_blank" rel="noopener noreferrer">無料LINE相談</a>
</nav>
