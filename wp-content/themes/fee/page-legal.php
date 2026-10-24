<?php
// 特定商取引法に基づく表記。LPと共通のヘッダー・フッターを使用する。
get_header();
?>
<main class="legal-page">
  <div class="legal-inner">
    <h1 class="legal-heading"><span><?php fee_text('legal_heading_1'); ?></span><span><?php fee_text('legal_heading_2'); ?></span></h1>
    <dl class="legal-details">
      <div class="legal-row">
        <dt><?php fee_text('legal_business_label'); ?></dt>
        <dd><?php fee_text('legal_business'); ?></dd>
      </div>
      <div class="legal-row">
        <dt><?php fee_text('legal_manager_label'); ?></dt>
        <dd><?php fee_text('legal_manager'); ?></dd>
      </div>
      <div class="legal-row">
        <dt><?php fee_text('legal_address_label'); ?></dt>
        <dd><?php fee_text('legal_address'); ?></dd>
      </div>
      <div class="legal-row">
        <dt><?php fee_text('legal_hours_label'); ?></dt>
        <dd><?php fee_text('legal_hours'); ?></dd>
      </div>
      <div class="legal-row">
        <dt><?php fee_text('legal_service_label'); ?></dt>
        <dd><?php fee_text('legal_service'); ?></dd>
      </div>
      <div class="legal-row">
        <dt><?php fee_text('legal_price_label'); ?></dt>
        <dd><a href="<?php echo esc_url(home_url('/#courses')); ?>"><?php fee_text('legal_price_link'); ?></a><?php fee_text('legal_price_suffix'); ?></dd>
      </div>
      <div class="legal-row">
        <dt><?php fee_text('legal_card_statement_label'); ?></dt>
        <dd><?php fee_text('legal_card_statement'); ?></dd>
      </div>
      <div class="legal-row">
        <dt><?php fee_text('legal_contact_label'); ?></dt>
        <dd><a href="<?php echo esc_url('mailto:' . fee_text_value('legal_email')); ?>"><?php fee_text('legal_email'); ?></a></dd>
      </div>
    </dl>
    <div class="legal-actions">
      <a class="legal-back" href="<?php echo esc_url(home_url('/')); ?>">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m10 5-7 7 7 7M3 12h18"/></svg>
        <?php fee_text('legal_back'); ?>
      </a>
    </div>
  </div>
</main>
<?php get_footer(); ?>
