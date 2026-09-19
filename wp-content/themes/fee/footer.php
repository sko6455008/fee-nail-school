<?php
// 共通フッター（LP・漫画・表記ページで共用）
// フッター・画面下部固定CTA・ハンバーガーメニューの開閉JS。スタイルは header.php 側にある。
?>
<!-- フッター -->
<footer class="site-footer">
  <div class="ft-copy">© <?php echo esc_html( date('Y') ); ?> <?php fee_text('footer_001'); ?></div>
  <div class="ft-legal"><a href="<?php echo esc_url(fee_legal_page_url()); ?>"><?php fee_text('footer_002'); ?></a></div>
</footer>

<!-- 画面下部固定CTA -->
<div class="cta-bar">
  <a class="cta-bar-btn" href="https://lin.ee/IdR5PPL" target="_blank" rel="noopener noreferrer" aria-label="無料相談はこちらから">
    <span class="cta-bar-tx"><span class="cta-bar-em"><?php fee_text('footer_003'); ?></span><?php fee_text('footer_004'); ?></span>
  </a>
</div>

<script>
// ハンバーガーメニュー
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
