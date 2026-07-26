<?php
// コーディング版LP 開発プレビュー（/?lp=dev で表示・完成後に削除）
// 画像版（index.php）と見比べるための骨格。リロード時リダイレクトJSは入れない。
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex">
    <title><?php bloginfo('name'); ?> | コーディング版プレビュー</title>
    <?php wp_head(); ?>
    <style>
        html { scroll-behavior: smooth; }
        html, body { margin: 0; padding: 0; background: #FAF8F7; }
        /* フッター（index.phpと同一・切替時はindex.php側を正とする） */
        .site-footer { background: linear-gradient(160deg, #fde4ee, #f9d2e1);
            color: #5D4E4A; font-family: var(--font-jp);
            padding: 34px 24px 110px; }
        .ft-copy { text-align: center; font-size: 13px; color: #8B7B7A; letter-spacing: .03em; }
        @media (max-width: 768px) {
            .site-footer { padding: 28px 20px 100px; }
            .ft-copy { font-size: 12px; }
        }
        /* 画面下部固定CTA（index.phpと同一） */
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

<main id="pagetop">
  <?php get_template_part('template-parts/section-fv'); ?>
  <?php get_template_part('template-parts/section-campaign'); ?>
  <?php get_template_part('template-parts/section-concept'); ?>
  <?php get_template_part('template-parts/section-reasons'); ?>
  <?php get_template_part('template-parts/section-strengths'); ?>
  <?php get_template_part('template-parts/section-compare'); ?>
  <?php get_template_part('template-parts/section-classroom'); ?>
  <?php get_template_part('template-parts/section-gallery'); ?>
  <?php get_template_part('template-parts/section-skills'); ?>
  <?php get_template_part('template-parts/section-courses'); ?>
  <?php get_template_part('template-parts/section-art'); ?>
  <?php get_template_part('template-parts/section-future'); ?>
  <?php get_template_part('template-parts/section-steps'); ?>
  <?php get_template_part('template-parts/section-access'); ?>
  <?php get_template_part('template-parts/section-faq'); ?>
</main>

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
// ハンバーガーメニュー（index.phpと同一ロジック・ID違い）
(function(){
  var burger = document.getElementById('spBurger2');
  var nav = document.getElementById('spNav2');
  var ov = document.getElementById('spOverlay2');
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
