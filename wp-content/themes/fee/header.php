<?php
// 共通ヘッダー（LP・漫画ページで共用）
// <head> とヘッダーまで。以降の中身は index.php / page-manga.php 側にある。
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php if ( is_front_page() ) : ?>
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
<?php endif; ?>
    <?php // <title> は add_theme_support('title-tag') により wp_head() が出力する（直書きすると二重になる） ?>
    <?php wp_head(); ?>
    <style>
        html { scroll-behavior: smooth; }
        html, body { margin: 0; padding: 0; background: #FAF8F7; }
        /* フッター */
        .site-footer { background: linear-gradient(160deg, #fde4ee, #f9d2e1);
            color: #5D4E4A; font-family: var(--font-jp);
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
            font-family: var(--font-jp); font-weight: 700; font-size: 19px;
            padding: 15px 24px; border-radius: 999px; text-decoration: none;
            border: 2px solid rgba(255,255,255,0.75);
            box-shadow: 0 8px 24px rgba(217,106,142,0.45);
            animation: cta-bob 2.4s ease-in-out infinite; }
        .cta-bar-btn:hover { filter: brightness(1.05); }
        .cta-bar-btn:active { transform: scale(0.98); }
        .cta-bar-em { color: #ffe79a; }
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

<?php get_template_part('template-parts/header-pc'); ?>
<?php get_template_part('template-parts/header-sp'); ?>
