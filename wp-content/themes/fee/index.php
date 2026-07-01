<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script>
    /* リロード時はホーム「/」へ遷移（初回訪問はそのまま表示・URLのアンカーは解除） */
    (function(){
      try{
        var t;
        var e = (window.performance && performance.getEntriesByType) ? performance.getEntriesByType('navigation')[0] : null;
        if(e && e.type){ t = e.type; }
        else if(window.performance && performance.navigation){ t = (performance.navigation.type === 1) ? 'reload' : 'navigate'; }
        if(t === 'reload'){
          var atHome = (location.pathname === '/' && !location.hash && !location.search);
          if(!atHome){ window.location.replace('/'); }
        }
      }catch(err){}
    })();
    </script>
    <title><?php bloginfo('name'); ?> | <?php bloginfo('description'); ?></title>
    <?php wp_head(); ?>
    <style>
        html { scroll-behavior: smooth; }
        html, body { margin: 0; padding: 0; background: #FAF8F7; }
        .lp { width: 100%; margin: 0 auto; }
        .lp-fig { position: relative; width: 100%; font-size: 0; line-height: 0; }
        .lp-fig > img { display: block; width: 100%; height: auto; }
        /* クリック領域（透明・枠なし／縁の出ないソフト発光と押し込みで誘導） */
        .hs { position: absolute; display: block; z-index: 5; cursor: pointer;
              background: transparent; border: 0; outline: none !important;
              -webkit-tap-highlight-color: transparent;
              transition: transform .12s ease; }
        .hs:focus, .hs:focus-visible, .hs:active, .hs:focus-within {
              outline: none !important; box-shadow: none !important; border: 0 !important; }
        /* 中心からにじむ発光（端は透明にフェード＝輪郭/枠が出ない） */
        .hs::after { content: ""; position: absolute; inset: 0; pointer-events: none;
              background: radial-gradient(ellipse 72% 135% at 50% 50%, rgba(255,255,255,0.50), rgba(255,255,255,0) 70%);
              opacity: 0; transition: opacity .25s ease; }
        .hs:hover::after { opacity: .55; }
        .hs:active { transform: scale(0.96); }
        @keyframes hs-glow {
            0%, 100% { opacity: 0; }
            50%      { opacity: .5; }
        }
        /* 主要CTAは待機中もやわらかく明滅して視線を誘導（縁なし） */
        .hs.cta::after { animation: hs-glow 2.6s ease-in-out infinite; }
        .hs.cta:hover::after { animation: none; opacity: .55; }
        @media (prefers-reduced-motion: reduce) {
            .hs.cta::after { animation: none; }
        }
        /* 個別にアニメーション無効（FVのボタン等：完全に静止） */
        .hs.no-fx::after { content: none; }
        .hs.no-fx:active { transform: none; }
        /* PCヘッダー（コード化・画像に比例：vw単位） */
        .pchead { position: absolute; top: 0; left: 0; right: 0; z-index: 20;
            height: 5.3vw; display: flex; align-items: center;
            background: #f6ebe6; padding: 0 1.45vw; box-sizing: border-box;
            line-height: 1.25; font-size: 1rem; }
        .pchead-logo { display: flex; flex-direction: column; justify-content: center;
            line-height: 1; text-decoration: none; margin-right: 1.6vw; }
        .pchead-fee { font-family: "Great Vibes", cursive; font-size: 2.45vw; line-height: 1;
            background: linear-gradient(100deg, #e85a9b 0%, #b06fd0 52%, #46c3d8 100%);
            -webkit-background-clip: text; background-clip: text;
            -webkit-text-fill-color: transparent; color: transparent; }
        .pchead-sub { font-family: "Zen Old Mincho", serif; font-size: 0.8vw; color: #6b5b57;
            letter-spacing: .04em; margin-top: 0.2vw; }
        .pchead-nav { display: flex; align-items: center; gap: 1.45vw;
            flex: 1 1 auto; justify-content: end; }
        .pchead-nav a { font-family: "Zen Old Mincho", serif; font-size: 0.92vw; color: #5a4a46;
            text-decoration: none; white-space: nowrap; transition: color .15s ease; outline: none; }
        .pchead-nav a:hover { color: #e0569a; }
        .pchead-pills { display: flex; align-items: center; gap: 0.7vw; margin-left: 1vw; }
        .pchead-pill { display: inline-flex; align-items: center; gap: 0.42vw; border-radius: 999px;
            font-size: 0.84vw; font-weight: 700; text-decoration: none; padding: 0.6vw 1.05vw;
            white-space: nowrap; font-family: "Zen Old Mincho", serif;
            transition: transform .12s ease, filter .15s ease; outline: none; }
        .pchead-pill:active { transform: scale(0.96); }
        .pchead-pill svg { width: 1.05vw; height: 1.05vw; flex: 0 0 auto; }
        .pchead-ig { background: linear-gradient(135deg, #f56fae, #de3f8c); color: #fff;
            box-shadow: 0 0.18vw 0.5vw rgba(222,63,140,.35); }
        .pchead-line { background: linear-gradient(135deg, #ffe7a0, #ffd35d); color: #6a4f1e;
            box-shadow: 0 0.18vw 0.5vw rgba(230,180,60,.35); }
        .pchead-ig:hover, .pchead-line:hover { filter: brightness(1.05); }
        .anc { position: absolute; left: 0; width: 1px; height: 1px; scroll-margin-top: 16px; }
        /* アクセス情報カード（コード化・画像に比例） */
        .acard { position: absolute; z-index: 10; box-sizing: border-box;
            background: #fffafa; border: 0.12em solid #f4c4d6; border-radius: 1.5em;
            box-shadow: 0 0.4em 1.2em rgba(200,140,165,0.18);
            padding: 1.1em 1.5em; display: flex; flex-direction: column; justify-content: center;
            overflow: hidden;
            font-family: "Zen Old Mincho","Yu Mincho",serif; color: #4f4642; line-height: 1.5; gap: 0.45em; }
        .acard-ttl { font-size: 1.6em; font-weight: 700; color: #3f3a38; line-height: 1.2;
            width: fit-content; padding-bottom: 0.25em; border-bottom: 0.16em solid;
            border-image: linear-gradient(90deg, #ffd24d, #ff9d4d) 1; }
        .acard-ttl-em { color: #ec5a96; }
        .acard-row { display: flex; align-items: flex-start; gap: 0.75em; }
        .acard-ic { flex: 0 0 auto; width: 2.5em; height: 2.5em; border-radius: 50%;
            display: flex; align-items: center; justify-content: center; margin-top: 0.1em; }
        .acard-ic svg { width: 1.35em; height: 1.35em; }
        .acard-ic-pin { background: #fbe2ec; color: #ec5a96; }
        .acard-ic-clock { background: #d9f3f4; color: #21bcc0; }
        .acard-ic-tel { background: #fdf0cf; color: #f0a93c; }
        .acard-h { font-size: 0.92em; font-weight: 700; margin-bottom: 0.18em; letter-spacing: .04em; }
        .acard-h-pink { color: #ec5a96; }
        .acard-h-teal { color: #21bcc0; }
        .acard-h-tel { color: #f0a93c; }
        .acard-txt { font-size: 1.04em; line-height: 1.6; }
        .acard-pink { color: #ec5a96; font-weight: 700; }
        .acard-teal { color: #21bcc0; font-weight: 700; }
        .acard-tel { display: inline-block; font-size: 1.28em; font-weight: 700; letter-spacing: .02em;
            color: #4f4642; text-decoration: none; border-bottom: 0.1em solid #ffcf5a;
            padding-bottom: 0.04em; outline: none; -webkit-tap-highlight-color: transparent; }
        .acard-div { border: 0; border-top: 1.5px dashed #f0c8d6; margin: 0.05em 0; }
        .lp-pc .acard { font-size: 1.49vw; }
        .lp-sp .acard { font-size: 2.7vw; }
        /* 「マップで見る」ボタン（コード化・焼き込みボタンの上に重ねる） */
        .map-btn { position: absolute; z-index: 11; display: inline-flex; align-items: center; gap: 0.4em;
            background: #fff; color: #ec5a96; font-weight: 700; text-decoration: none;
            border: 0.14em solid #f6c4d6; border-radius: 999px; line-height: 1;
            box-shadow: 0 0.18em 0.5em rgba(180,120,140,0.22);
            font-family: "Zen Old Mincho","Yu Mincho",serif; white-space: nowrap;
            outline: none; -webkit-tap-highlight-color: transparent;
            transition: transform .12s ease, filter .15s ease; }
        .map-btn:hover { filter: brightness(1.02); }
        .map-btn:active { transform: scale(0.96); }
        .map-btn .mb-pin { width: 1.2em; height: 1.2em; flex: 0 0 auto; }
        .map-btn .mb-ext { width: 0.9em; height: 0.9em; flex: 0 0 auto; }
        .access-map .map-btn { position: absolute; top: 0.7em; left: 0.7em; }
        .lp-pc .access .map-btn { font-size: 1.32em; padding: 0.6em 1.05em; }
        .lp-sp .access .map-btn { font-size: 1.18em; padding: 0.52em 0.85em; }

        /* ===== アクセス（完全コード化・焼き込み帯を覆う不透明オーバーレイ） ===== */
        .access { position: absolute; left: 0; right: 0; z-index: 12; background: #FEF9F4;
            overflow: hidden; box-sizing: border-box; color: #5b4b46;
            font-family: "Zen Old Mincho","Yu Mincho",serif; }
        .access * { box-sizing: border-box; }
        .access-inner { position: relative; z-index: 2; height: 100%; display: flex; flex-direction: column; justify-content: center; }
        .access-head { text-align: center; position: relative; }
        .access-head .ah-script { font-family: "Great Vibes", cursive; line-height: 1.15; display: block;
            background: linear-gradient(95deg, #f0609b 0%, #b06fd0 55%, #46c3d8 100%);
            -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent; color: transparent; }
        .access-head .ah-jp { font-weight: 700; color: #5b4b46; letter-spacing: .14em; display: inline-block; }
        .access-head .ah-jp u { text-decoration: none; position: relative; padding: 0 .15em; }
        .access-head .ah-jp u::after { content: ""; position: absolute; left: 0; right: 0; bottom: -.16em;
            height: .13em; border-radius: 999px; background: linear-gradient(90deg, #ffd24d, #ffb24d); }
        .access-body { position: relative; z-index: 2; display: flex; align-items: stretch; }
        .access-map { position: relative; display: block; border-radius: 1.3em; overflow: hidden;
            border: .35em solid #fff; box-shadow: 0 .5em 1.4em rgba(200,140,165,.20); background: #e8eef0; text-decoration: none; }
        /* iframeを上方向へずらし、上端の場所カード(default-place-card-container)をクリップで隠す。
           下端のGoogleロゴ・著作権帯は残る（iframe下端＝コンテナ下端で揃う） */
        .access-map iframe { position: relative; top: -5.6em; width: 100%; height: calc(100% + 5.6em);
            border: 0; display: block; }
        /* 装飾 */
        .access .deco { position: absolute; z-index: 1; pointer-events: none; }
        .dco-blob { border-radius: 52% 48% 47% 53% / 55% 52% 48% 45%; }
        .dco-stripe { background-image: repeating-linear-gradient(45deg, currentColor 0 .42em, transparent .42em .9em);
            border-radius: 42% 58% 52% 48% / 56% 44% 56% 44%; opacity: .9; }
        .dco-dots { background-image: radial-gradient(currentColor 26%, transparent 28%); background-size: 1.05em 1.05em; }
        .dco-spark { background: currentColor; clip-path: polygon(50% 0,60% 40%,100% 50%,60% 60%,50% 100%,40% 60%,0 50%,40% 40%); }
        .dco-heart { color: #f7a8c6; line-height: 1; }
        /* PC */
        .lp-pc .access { font-size: 1.04vw; }
        .lp-pc .access-inner { padding: 1.0em 3.4em 1.2em; }
        .lp-pc .access-head .ah-script { font-size: 2.6em; }
        .lp-pc .access-head .ah-jp { font-size: 3.3em; margin-top: .2em; }
        .lp-pc .access-body { margin-top: 3.4em; gap: 2.4em; }
        .lp-pc .access-map { width: 50%; aspect-ratio: 910 / 656; }
        .lp-pc .access .acard { position: static; width: 50%; font-size: 1.0em; border-radius: 1.5em; }
        /* SP */
        .lp-sp .access { font-size: 2.3vw; }
        .lp-sp .access-inner { padding: 0 1.2em;}
        .lp-sp .access-head .ah-script { font-size: 2.2em; }
        .lp-sp .access-head .ah-jp { font-size: 2.5em; margin-top: .1em; }
        .lp-sp .access-body { flex-direction: column; margin-top: 0.9em; gap: 0.9em; }
        .lp-sp .access-map { width: 100%; aspect-ratio: 16 / 9; }
        .lp-sp .access .acard { position: static; width: 100%; font-size: 1.05em; border-radius: 1.3em; }
        /* よくある質問（1列・HTMLアコーディオン） */
        .pcfaq { background: #FEF9F4; padding: 6px 0 70px; }
        .pcfaq-inner { max-width: 1180px; margin: 0 auto; padding: 0 24px; box-sizing: border-box; }
        .pcfaq-item { margin: 0 0 20px; }
        .pcfaq-q { width: 100%; box-sizing: border-box; display: flex; align-items: center; gap: 20px;
            background: #fff; border: 2px solid var(--c); border-radius: 44px; padding: 18px 30px;
            cursor: pointer; box-shadow: 0 4px 16px rgba(180,120,140,0.10);
            transition: box-shadow .2s ease, transform .1s ease; outline: none !important;
            -webkit-tap-highlight-color: transparent; }
        .pcfaq-q:hover { box-shadow: 0 8px 22px rgba(180,120,140,0.18); }
        .pcfaq-q:active { transform: scale(0.996); }
        .pcfaq-q:focus, .pcfaq-q:focus-visible { outline: none !important; box-shadow: 0 4px 16px rgba(180,120,140,0.10); }
        .pcfaq-badge { flex: 0 0 auto; width: 48px; height: 48px; border-radius: 50%;
            background: var(--c); color: #fff; font-family: "Playfair Display", serif; font-weight: 700;
            font-size: 20px; display: flex; align-items: center; justify-content: center; }
        .pcfaq-qt { flex: 1 1 auto; text-align: left; font-family: "Zen Old Mincho", serif;
            font-weight: 600; font-size: 21px; color: #4a4a4a; line-height: 1.4; }
        .pcfaq-plus { flex: 0 0 auto; width: 38px; height: 38px; border-radius: 50%;
            background: var(--c); color: #fff; font-size: 26px; line-height: 1;
            display: flex; align-items: center; justify-content: center;
            transition: transform .25s ease; }
        .pcfaq-item.open .pcfaq-plus { transform: rotate(45deg); }
        .pcfaq-a { overflow: hidden; max-height: 0; transition: max-height .35s ease; }
        .pcfaq-a-in { display: flex; gap: 14px; align-items: flex-start;
            margin: 10px 12px 4px; padding: 18px 22px;
            background: var(--cl); border: 1.5px solid var(--c); border-radius: 22px; }
        .pcfaq-a-badge { flex: 0 0 auto; width: 40px; height: 40px; border-radius: 50%;
            background: var(--c); color: #fff; font-family: "Playfair Display", serif; font-weight: 700;
            font-size: 18px; display: flex; align-items: center; justify-content: center; margin-top: 1px; }
        .pcfaq-a-text { flex: 1 1 auto; font-family: "Zen Old Mincho", serif; font-size: 16.5px;
            line-height: 1.9; color: #5D4E4A; padding-top: 4px; }
        .pcfaq-item.open .pcfaq-a { max-height: 440px; }
        @media (max-width: 768px) {
            .pcfaq { padding: 4px 0 56px; }
            .pcfaq-inner { padding: 0 16px; }
            .pcfaq-item { margin: 0 0 14px; }
            .pcfaq-q { gap: 12px; padding: 14px 16px; border-radius: 30px; }
            .pcfaq-badge { width: 38px; height: 38px; font-size: 16px; }
            .pcfaq-qt { font-size: 16px; }
            .pcfaq-plus { width: 30px; height: 30px; font-size: 21px; }
            .pcfaq-a-in { padding: 14px 15px; gap: 10px; margin: 8px 6px 2px; }
            .pcfaq-a-badge { width: 32px; height: 32px; font-size: 15px; }
            .pcfaq-a-text { font-size: 14.5px; }
            .pcfaq-item.open .pcfaq-a { max-height: 560px; }
        }
        /* PC / SP 切替（768px以下でSP版を表示） */
        .lp-pc { display: block; }
        .lp-sp { display: none; }
        @media (max-width: 768px) {
            .lp-pc { display: none; }
            .lp-sp { display: block; }
        }
        /* ハンバーガーメニュー（SP専用） */
        .sp-burger { position: fixed; top: 14px; right: 14px; z-index: 1100;
            width: 52px; height: 52px; border: 0; border-radius: 50%; padding: 0;
            background: rgba(255,255,255,0.92); box-shadow: 0 4px 14px rgba(180,120,140,0.35);
            cursor: pointer; }
        .sp-burger span { display: block; width: 26px; height: 3px; margin: 5px auto;
            background: #d96a8e; border-radius: 3px; transition: transform .25s ease, opacity .25s ease; }
        .sp-burger.open span:nth-child(1) { transform: translateY(8px) rotate(45deg); }
        .sp-burger.open span:nth-child(2) { opacity: 0; }
        .sp-burger.open span:nth-child(3) { transform: translateY(-8px) rotate(-45deg); }
        .sp-overlay { position: fixed; inset: 0; z-index: 1050;
            background: rgba(60,40,50,0.45); opacity: 0; visibility: hidden; transition: .25s; }
        .sp-overlay.open { opacity: 1; visibility: visible; }
        .sp-nav { position: fixed; top: 0; right: 0; z-index: 1060;
            width: 74%; max-width: 320px; height: 100%; box-sizing: border-box;
            background: linear-gradient(160deg, #fff0f6, #fef9f5);
            box-shadow: -8px 0 30px rgba(180,120,140,0.3);
            transform: translateX(100%); transition: transform .28s ease;
            overflow-y: auto; -webkit-overflow-scrolling: touch; padding: 78px 0 30px; }
        .sp-nav.open { transform: translateX(0); }
        .sp-nav a { display: block; padding: 15px 26px; font-size: 16px; color: #5D4E4A;
            text-decoration: none; font-family: "Zen Old Mincho","Yu Mincho",serif;
            border-bottom: 1px solid rgba(217,142,152,0.22); }
        .sp-nav a:active { background: rgba(217,142,152,0.12); }
        .sp-nav a.ext { color: #d96a8e; font-weight: 700; }
        .sp-burger:focus, .sp-burger:focus-visible,
        .sp-nav a:focus, .sp-nav a:focus-visible { outline: none !important; box-shadow: none !important; }
        .sp-nav .sp-nav-ttl { padding: 0 26px 10px; font-family: "Playfair Display",serif;
            font-size: 13px; letter-spacing: .15em; color: #b98; }
        /* フッター */
        .site-footer { background: linear-gradient(160deg, #fde4ee, #f9d2e1);
            color: #5D4E4A; font-family: "Zen Old Mincho","Yu Mincho",serif;
            padding: 34px 24px 110px; }
        .ft-copy { text-align: center; font-size: 13px; color: #8B7B7A; letter-spacing: .03em; }
        @media (max-width: 768px) {
            .site-footer { padding: 28px 20px 100px; }
            .ft-copy { font-size: 12px; }
        }
        /* 画面下部固定CTA */
        .cta-bar { position: fixed; left: 0; right: 0; bottom: 0; z-index: 900;
            display: flex; justify-content: center; padding: 10px 14px calc(10px + env(safe-area-inset-bottom));
            background: linear-gradient(to top, rgba(255,255,255,0.95), rgba(255,255,255,0));
            pointer-events: none; }
        .cta-bar-btn { pointer-events: auto; display: inline-flex; align-items: center; gap: 10px;
            width: 100%; max-width: 560px; justify-content: center; box-sizing: border-box;
            background: linear-gradient(135deg, #ff86b9, #ec5a96); color: #fff;
            font-family: "Zen Old Mincho","Yu Mincho",serif; font-weight: 700; font-size: 19px;
            padding: 15px 24px; border-radius: 999px; text-decoration: none;
            border: 2px solid rgba(255,255,255,0.75);
            box-shadow: 0 8px 24px rgba(217,106,142,0.45);
            animation: cta-bob 2.4s ease-in-out infinite; }
        .cta-bar-btn:hover { filter: brightness(1.05); }
        .cta-bar-btn:active { transform: scale(0.98); }
        .cta-bar-em { color: #ffe79a; }
        .cta-bar-ic { flex: 0 0 auto; }
        .cta-bar-arrow { font-size: 22px; line-height: 1; margin-left: 2px; }
        @keyframes cta-bob { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-3px); } }
        @media (max-width: 768px) {
            .cta-bar-btn { font-size: 17px; padding: 14px 18px; }
        }
        @media (prefers-reduced-motion: reduce) {
            .cta-bar-btn { animation: none; }
        }
    </style>
</head>
<body <?php body_class(); ?>>

<?php $u = get_template_directory_uri(); ?>
<?php
$acard_html = <<<'HTML'
  <div class="acard-ttl"><span class="acard-ttl-em">池袋</span> ネイルカレッジ Fee</div>
  <div class="acard-row">
    <span class="acard-ic acard-ic-pin"><svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2C8.1 2 5 5.1 5 9c0 5.2 7 13 7 13s7-7.8 7-13c0-3.9-3.1-7-7-7zm0 9.5A2.5 2.5 0 1 1 12 6.5a2.5 2.5 0 0 1 0 5z"/></svg></span>
    <div>
      <div class="acard-h acard-h-pink">・所在地</div>
      <div class="acard-txt">〒171-0014<br>東京都豊島区池袋2-53-12<br>池袋駅西口 <span class="acard-pink">徒歩3分</span></div>
    </div>
  </div>
  <hr class="acard-div">
  <div class="acard-row">
    <span class="acard-ic acard-ic-clock"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M12 7.5v5l3.3 2"/></svg></span>
    <div>
      <div class="acard-h acard-h-teal">・営業時間</div>
      <div class="acard-txt">平日：11:00 - 21:00<br>土日祝：10:00 - 20:00<br>定休日：<span class="acard-teal">無休</span></div>
    </div>
  </div>
  <hr class="acard-div">
  <div class="acard-row">
    <span class="acard-ic acard-ic-tel"><svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M6.6 10.8c1.4 2.8 3.8 5.1 6.6 6.6l2.2-2.2c.3-.3.7-.4 1-.2 1.1.4 2.3.6 3.6.6.6 0 1 .4 1 1V20c0 .6-.4 1-1 1-9.4 0-17-7.6-17-17 0-.6.4-1 1-1h3.5c.6 0 1 .4 1 1 0 1.2.2 2.4.6 3.6.1.4 0 .7-.2 1l-2.3 2.2z"/></svg></span>
    <div>
      <div class="acard-h acard-h-tel">・お問い合わせ</div>
      <a class="acard-tel" href="https://lin.ee/pc9cpjG" target="_blank" rel="noopener noreferrer">LINEで相談する</a>
    </div>
  </div>
HTML;
$mapbtn_html = <<<'HTML'
<svg class="mb-pin" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2C8.1 2 5 5.1 5 9c0 5.2 7 13 7 13s7-7.8 7-13c0-3.9-3.1-7-7-7zm0 9.5A2.5 2.5 0 1 1 12 6.5a2.5 2.5 0 0 1 0 5z"/></svg><span>マップで見る</span><svg class="mb-ext" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14 4h6v6"/><path d="M20 4l-9 9"/><path d="M18 13.5V19a1.5 1.5 0 0 1-1.5 1.5h-11A1.5 1.5 0 0 1 4 19V8a1.5 1.5 0 0 1 1.5-1.5H10"/></svg>
HTML;
$mapurl = "https://www.google.com/maps/search/?api=1&query=%E6%9D%B1%E4%BA%AC%E9%83%BD%E8%B1%8A%E5%B3%B6%E5%8C%BA%E6%B1%A0%E8%A2%8B2-53-12";
$access_html = <<<HTML
<span class="deco dco-blob" style="top:-4%;left:-3%;width:13em;height:11em;background:#fcd2e2;"></span>
<span class="deco dco-stripe" style="top:14%;left:-2%;width:7em;height:5.5em;color:#ffe08a;"></span>
<span class="deco dco-dots" style="top:6%;left:6%;width:5em;height:3em;color:#cfeaf2;transform:rotate(-8deg);"></span>
<span class="deco dco-blob" style="top:-5%;right:-3%;width:12em;height:10em;background:#e6d6f6;"></span>
<span class="deco dco-dots" style="top:4%;right:7%;width:4.5em;height:3em;color:#bfe6f0;"></span>
<span class="deco dco-blob" style="bottom:-5%;left:-3%;width:11em;height:9em;background:#fcd9e6;"></span>
<span class="deco dco-dots" style="bottom:6%;left:7%;width:5em;height:3em;color:#f8c6da;"></span>
<span class="deco dco-stripe" style="bottom:2%;right:-2%;width:8em;height:6em;color:#ffe08a;"></span>
<span class="deco dco-blob" style="bottom:-4%;right:5%;width:6em;height:5em;background:#fbd2e2;"></span>
<span class="deco dco-spark" style="top:20%;left:30%;width:1.6em;height:1.6em;color:#8ad6df;"></span>
<span class="deco dco-spark" style="top:12%;right:30%;width:1.9em;height:1.9em;color:#c5a6ec;"></span>
<span class="deco dco-spark" style="top:30%;right:24%;width:1.3em;height:1.3em;color:#ffd24d;"></span>
<span class="deco dco-heart" style="top:14%;left:24%;font-size:1.7em;">&#9829;</span>
<div class="access-inner">
  <div class="access-head">
    <span class="ah-script">Location</span>
    <div class="ah-jp"><u>アクセス</u></div>
  </div>
  <div class="access-body">
    <div class="access-map">
      <iframe src="https://maps.google.com/maps?q=%E6%9D%B1%E4%BA%AC%E9%83%BD%E8%B1%8A%E5%B3%B6%E5%8C%BA%E6%B1%A0%E8%A2%8B2-53-12&z=16&hl=ja&output=embed" loading="lazy" title="池袋ネイルカレッジ Fee アクセスマップ" referrerpolicy="no-referrer-when-downgrade"></iframe>
      <a class="map-btn" href="{$mapurl}" target="_blank" rel="noopener noreferrer" aria-label="Googleマップで見る">{$mapbtn_html}</a>
    </div>
    <div class="acard">{$acard_html}</div>
  </div>
</div>
HTML;
?>
<div class="lp lp-pc">

  <div class="lp-fig">
    <img src="<?php echo $u; ?>/assets/images/lp-pc-1.webp" alt="池袋ネイルカレッジ Fee" width="1920" height="13200" fetchpriority="high">
    <span id="pagetop" class="anc" style="top:0.000%"></span>
    <span id="features" class="anc" style="top:35.606%"></span>
    <span id="atmosphere" class="anc" style="top:62.500%"></span>
    <span id="skills" class="anc" style="top:82.197%"></span>
    <span id="courses" class="anc" style="top:92.045%"></span>
    <!-- コード化ヘッダー（PC） -->
    <header class="pchead">
      <a class="pchead-logo" href="#pagetop" aria-label="池袋ネイルカレッジ Fee トップへ">
        <span class="pchead-fee">Fee</span>
      </a>
      <nav class="pchead-nav">
        <a href="#features">アカデミー紹介</a>
        <a href="#atmosphere">授業風景</a>
        <a href="#skills">学べる技術</a>
        <a href="#courses">コース内容</a>
        <a href="#future">卒業後</a>
        <a href="#steps">入校手順</a>
        <a href="#access">アクセス</a>
        <a href="#faq">よくある質問</a>
      </nav>
      <div class="pchead-pills">
        <a class="pchead-pill pchead-ig" href="https://www.instagram.com/fee.nail.academy/" target="_blank" rel="noopener noreferrer">
          <svg viewBox="0 0 24 24" aria-hidden="true" fill="currentColor"><path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5s-3 1.34-3 3 1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5C15 14.17 10.33 13 8 13zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/></svg>
          Instagram
        </a>
        <a class="pchead-pill pchead-line" href="https://lin.ee/IdR5PPL" target="_blank" rel="noopener noreferrer">
          <svg viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4.5" width="18" height="16.5" rx="2.5"/><path d="M3 9.5h18M8 2.5v4M16 2.5v4"/></svg>
          無料LINE相談
        </a>
      </div>
    </header>
    <a class="hs no-fx" href="https://lin.ee/IdR5PPL" target="_blank" rel="noopener noreferrer" style="left:25.000%;top:7.258%;width:15.365%;height:0.432%" aria-label="無料LINE相談する"></a>
    <a class="hs no-fx" href="#courses" style="left:41.667%;top:7.258%;width:15.104%;height:0.432%" aria-label="コース詳細を見る"></a>
    <a class="hs cta" href="https://lin.ee/IdR5PPL" target="_blank" rel="noopener noreferrer" style="left:17.969%;top:16.076%;width:67.552%;height:1.273%" aria-label="無料相談はこちらから"></a>
    <a class="hs cta" href="https://lin.ee/IdR5PPL" target="_blank" rel="noopener noreferrer" style="left:27.396%;top:98.780%;width:20.208%;height:0.598%" aria-label="このコースについて相談する"></a>
    <a class="hs cta" href="https://lin.ee/IdR5PPL" target="_blank" rel="noopener noreferrer" style="left:75.885%;top:98.780%;width:20.000%;height:0.606%" aria-label="このコースについて相談する"></a>
  </div>

  <div class="lp-fig">
    <img src="<?php echo $u; ?>/assets/images/lp-pc-2-top.webp" alt="池袋ネイルカレッジ Fee 入校手順・アクセス・よくある質問" width="1920" height="4800" loading="lazy">
    <span id="future" class="anc" style="top:0.417%"></span>
    <span id="steps" class="anc" style="top:50.833%"></span>
    <span id="access" class="anc" style="top:71.667%"></span>
    <span id="faq" class="anc" style="top:89.000%"></span>
    <a class="hs cta" href="https://lin.ee/IdR5PPL" target="_blank" rel="noopener noreferrer" style="left:52.604%;top:65.729%;width:38.281%;height:2.563%" aria-label="無料カウンセリング・見学を予約する"></a>
    <!-- アクセス（完全コード化・焼き込み帯を覆う） -->
    <div class="access" style="top:68.96%;height:24%"><?php echo $access_html; ?></div>
  </div>


</div>

<div class="lp lp-sp">

  <button class="sp-burger" id="spBurger" aria-label="メニューを開く" aria-expanded="false">
    <span></span><span></span><span></span>
  </button>
  <div class="sp-overlay" id="spOverlay"></div>
  <nav class="sp-nav" id="spNav" aria-label="メニュー">
    <div class="sp-nav-ttl">MENU</div>
    <a href="#sp-features">アカデミー紹介</a>
    <a href="#sp-atmosphere">授業風景</a>
    <a href="#sp-skills">学べる技術</a>
    <a href="#sp-courses">コース内容</a>
    <a href="#sp-future">卒業後</a>
    <a href="#sp-steps">入校手順</a>
    <a href="#sp-access">アクセス</a>
    <a href="#sp-faq">よくある質問</a>
    <a class="ext" href="https://www.instagram.com/fee.nail.academy/" target="_blank" rel="noopener noreferrer">Instagram</a>
    <a class="ext" href="https://lin.ee/IdR5PPL" target="_blank" rel="noopener noreferrer">無料LINE相談</a>
  </nav>

  <div class="lp-fig">
    <img src="<?php echo $u; ?>/assets/images/lp-sp-1.webp" alt="池袋ネイルカレッジ Fee" width="1080" height="13179" fetchpriority="high">
    <span id="sp-pagetop" class="anc" style="top:0"></span>
    <span id="sp-features" class="anc" style="top:30.200%"></span>
    <span id="sp-atmosphere" class="anc" style="top:75.580%"></span>
    <a class="hs no-fx" href="https://lin.ee/IdR5PPL" target="_blank" rel="noopener noreferrer" style="left:25.740%;top:9.460%;width:39.540%;height:0.463%" aria-label="無料LINE相談する"></a>
    <a class="hs no-fx" href="#sp-courses" style="left:23.150%;top:10.150%;width:43.060%;height:0.546%" aria-label="コース詳細を見る"></a>
    <a class="hs cta" href="https://lin.ee/IdR5PPL" target="_blank" rel="noopener noreferrer" style="left:11.110%;top:18.330%;width:76.390%;height:1.138%" aria-label="無料相談はこちらから"></a>
  </div>

  <div class="lp-fig">
    <img src="<?php echo $u; ?>/assets/images/lp-sp-2-top.webp" alt="池袋ネイルカレッジ Fee 学べる技術・コース・アクセス・よくある質問" width="1080" height="10420" loading="lazy">
    <span id="sp-skills" class="anc" style="top:0.571%"></span>
    <span id="sp-courses" class="anc" style="top:16.503%"></span>
    <span id="sp-future" class="anc" style="top:50.863%"></span>
    <span id="sp-steps" class="anc" style="top:67.179%"></span>
    <span id="sp-access" class="anc" style="top:84.069%"></span>
    <span id="sp-faq" class="anc" style="top:98.000%"></span>
    <a class="hs cta" href="https://lin.ee/IdR5PPL" target="_blank" rel="noopener noreferrer" style="left:36.760%;top:26.296%;width:50.280%;height:0.864%" aria-label="このコースについて相談する"></a>
    <a class="hs cta" href="https://lin.ee/IdR5PPL" target="_blank" rel="noopener noreferrer" style="left:36.760%;top:32.918%;width:50.280%;height:0.864%" aria-label="このコースについて相談する"></a>
    <a class="hs cta" href="https://lin.ee/IdR5PPL" target="_blank" rel="noopener noreferrer" style="left:10.930%;top:81.747%;width:76.570%;height:0.864%" aria-label="無料カウンセリング・見学を予約する"></a>
    <!-- アクセス（完全コード化・焼き込み帯を覆う） -->
    <div class="access" style="top:83.3%;height:13.4%"><?php echo $access_html; ?></div>
  </div>

</div>

<!-- よくある質問（PC・SP共通／1列アコーディオン） -->
<div class="pcfaq">
  <div class="pcfaq-inner">
    <div class="pcfaq-item" style="--c:#ec5a96;--cl:#fdeef4">
      <button class="pcfaq-q" aria-expanded="false"><span class="pcfaq-badge">Q.</span><span class="pcfaq-qt">お支払いは分割は可能ですか？</span><span class="pcfaq-plus">+</span></button>
      <div class="pcfaq-a"><div class="pcfaq-a-in"><span class="pcfaq-a-badge">A.</span><span class="pcfaq-a-text">はい、分割でのお支払いも対応しています。例えば24分割なら月4,000円(税込)〜お支払いも可能です。詳細はお問い合わせください。</span></div></div>
    </div>
    <div class="pcfaq-item" style="--c:#21bcc0;--cl:#e4f7f7">
      <button class="pcfaq-q" aria-expanded="false"><span class="pcfaq-badge">Q.</span><span class="pcfaq-qt">追加料金はかかりますか？</span><span class="pcfaq-plus">+</span></button>
      <div class="pcfaq-a"><div class="pcfaq-a-in"><span class="pcfaq-a-badge">A.</span><span class="pcfaq-a-text">基本的なコース費用以外に追加料金はかかりません。ただしオプションコースを受講される場合と道具購入の場合は別途費用がかかります。</span></div></div>
    </div>
    <div class="pcfaq-item" style="--c:#f2c01e;--cl:#fdf4dc">
      <button class="pcfaq-q" aria-expanded="false"><span class="pcfaq-badge">Q.</span><span class="pcfaq-qt">欠席するとどうなりますか？</span><span class="pcfaq-plus">+</span></button>
      <div class="pcfaq-a"><div class="pcfaq-a-in"><span class="pcfaq-a-badge">A.</span><span class="pcfaq-a-text">欠席された場合、振替授業の対応もしています。事前にご連絡頂ければ、別の日程で受講することも可能です。</span></div></div>
    </div>
    <div class="pcfaq-item" style="--c:#a98ce4;--cl:#f1ecfb">
      <button class="pcfaq-q" aria-expanded="false"><span class="pcfaq-badge">Q.</span><span class="pcfaq-qt">全くの初心者ですが大丈夫ですか？</span><span class="pcfaq-plus">+</span></button>
      <div class="pcfaq-a"><div class="pcfaq-a-in"><span class="pcfaq-a-badge">A.</span><span class="pcfaq-a-text">はい、全くの初心者でも大丈夫です。基礎から丁寧に指導しますので、安心してご受講ください。</span></div></div>
    </div>
    <div class="pcfaq-item" style="--c:#ec5a96;--cl:#fdeef4">
      <button class="pcfaq-q" aria-expanded="false"><span class="pcfaq-badge">Q.</span><span class="pcfaq-qt">持っている道具を使っても大丈夫ですか？</span><span class="pcfaq-plus">+</span></button>
      <div class="pcfaq-a"><div class="pcfaq-a-in"><span class="pcfaq-a-badge">A.</span><span class="pcfaq-a-text">はい、ご自身でお持ちの道具を使用して頂いても問題ありません。ただし、授業で必要な道具については事前にご確認ください。</span></div></div>
    </div>
    <div class="pcfaq-item" style="--c:#21bcc0;--cl:#e4f7f7">
      <button class="pcfaq-q" aria-expanded="false"><span class="pcfaq-badge">Q.</span><span class="pcfaq-qt">道具の購入はできますか？</span><span class="pcfaq-plus">+</span></button>
      <div class="pcfaq-a"><div class="pcfaq-a-in"><span class="pcfaq-a-badge">A.</span><span class="pcfaq-a-text">はい、アカデミーで推奨する道具の購入も可能です。詳細は入学時にご案内いたします。</span></div></div>
    </div>
  </div>
</div>

<!-- フッター -->
<footer class="site-footer">
  <div class="ft-copy">© <?php echo esc_html( date('Y') ); ?> Fee nail academy</div>
</footer>

<!-- 画面下部固定CTA -->
<div class="cta-bar">
  <a class="cta-bar-btn" href="https://lin.ee/IdR5PPL" target="_blank" rel="noopener noreferrer" aria-label="無料相談はこちらから">
    <span class="cta-bar-tx"><span class="cta-bar-em">無料相談</span>はこちらから！</span>
  </a>
</div>

<script>
// よくある質問アコーディオン（PC・SP共通）
(function(){
  var qs = document.querySelectorAll('.pcfaq-q');
  qs.forEach(function(q){
    q.addEventListener('click', function(){
      var item = q.parentNode;
      var isOpen = item.classList.contains('open');
      document.querySelectorAll('.pcfaq-item.open').forEach(function(it){
        it.classList.remove('open');
        var b = it.querySelector('.pcfaq-q'); if(b){ b.setAttribute('aria-expanded','false'); }
      });
      if(!isOpen){ item.classList.add('open'); q.setAttribute('aria-expanded','true'); }
    });
  });
})();
// ハンバーガーメニュー
(function(){
  var burger = document.getElementById('spBurger');
  var nav = document.getElementById('spNav');
  var ov = document.getElementById('spOverlay');
  if(!burger || !nav || !ov) return;
  function closeMenu(){
    burger.classList.remove('open'); nav.classList.remove('open'); ov.classList.remove('open');
    burger.setAttribute('aria-expanded','false');
  }
  function toggleMenu(){
    if(nav.classList.contains('open')){ closeMenu(); }
    else {
      burger.classList.add('open'); nav.classList.add('open'); ov.classList.add('open');
      burger.setAttribute('aria-expanded','true');
    }
  }
  burger.addEventListener('click', toggleMenu);
  ov.addEventListener('click', closeMenu);
  nav.querySelectorAll('a').forEach(function(a){ a.addEventListener('click', closeMenu); });
})();
</script>

<?php wp_footer(); ?>
</body>
</html>
