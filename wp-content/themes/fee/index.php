<?php
// 池袋ネイルカレッジFee LP — コーディング版
// 各セクションは template-parts/section-*.php に分割（1セクション=1ファイル）。
// 文字はHTML直書き・写真は assets/images/parts/ のファイル差し替えで個別に編集できる。
// <head>とヘッダーは header.php、フッターとCTAバーは footer.php（漫画ページと共用）。
get_header();
?>

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
  <?php get_template_part('template-parts/section-manga'); ?>
</main>

<?php get_footer(); ?>
