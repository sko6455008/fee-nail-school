<?php
// 特定商取引法に基づく表記。LPと共通のヘッダー・フッターを使用する。
get_header();
?>
<main class="legal-page">
  <div class="legal-inner">
    <h1 class="legal-heading"><span>特定商取引法に基づく</span><span>表記</span></h1>
    <dl class="legal-details">
      <div class="legal-row">
        <dt>事業者名</dt>
        <dd>ICA池袋キャリアアカデミー</dd>
      </div>
      <div class="legal-row">
        <dt>運営責任者</dt>
        <dd>福崎なつみ</dd>
      </div>
      <div class="legal-row">
        <dt>住所</dt>
        <dd>東京都豊島区池袋2丁目53-12 中條ビル7F</dd>
      </div>
      <div class="legal-row">
        <dt>営業時間</dt>
        <dd>12:00～22:00</dd>
      </div>
      <div class="legal-row">
        <dt>事業内容</dt>
        <dd>アカデミー</dd>
      </div>
      <div class="legal-row">
        <dt>料金</dt>
        <dd><a href="<?php echo esc_url(home_url('/#courses')); ?>">こちら</a>をご覧ください</dd>
      </div>
      <div class="legal-row">
        <dt>お問い合わせ</dt>
        <dd><a href="mailto:kaimono.ofuku@gmail.com">kaimono.ofuku@gmail.com</a></dd>
      </div>
    </dl>
    <div class="legal-actions">
      <a class="legal-back" href="<?php echo esc_url(home_url('/')); ?>">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m10 5-7 7 7 7M3 12h18"/></svg>
        トップページに戻る
      </a>
    </div>
  </div>
</main>
<?php get_footer(); ?>
