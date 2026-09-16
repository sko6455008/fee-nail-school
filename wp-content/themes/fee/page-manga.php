<?php
// 漫画ページ（/manga）— LPの「気になる続きはこちらをタップ！」の遷移先。
// 漫画は manga_1 → manga_2 の順に隙間なしで縦に並べる。
// ヘッダー・フッター・画面下部固定CTAはLPと共通（header.php / footer.php）。
$u = get_template_directory_uri();
get_header();
?>
<style>
/* 漫画ページ */
.mgp { background: #FAF8F7; }
/* 漫画の最後がフッターにくっつかないよう少しだけ余白をとる
   （画面下部の固定CTAの分はフッター側のpaddingで確保済み） */
.mgp-inner { max-width: 1000px; margin: 0 auto;}
/* inline要素だと画像の下に行間のすき間が出るので block にして詰める */
.mgp-inner img { display: block; width: 100%; height: auto; }
</style>
<main class="mgp">
  <div class="mgp-inner">
    <img src="<?php echo $u; ?>/assets/images/manga_1.webp"
         alt="漫画 前編：ネイルを仕事にしたいと思った主人公がスクールを見学するまで"
         width="1920" height="7765" decoding="async">
    <img src="<?php echo $u; ?>/assets/images/manga_2.webp"
         alt="漫画 後編：レッスンを重ねてネイリストとして働きはじめるまで"
         width="1920" height="7765" loading="lazy" decoding="async">
  </div>
</main>
<?php get_footer(); ?>
