<?php
// 卒業までにできるアート（Graduation Nails）セクション — コーディング版
// 再現元: lp-pc-2-top.webp（y0〜1310付近）/ lp-sp-2-top.webp
$u = get_template_directory_uri();
?>
<style>
/* ===== 卒業までにできるアート（PC: 1920px基準） ===== */
/* ※CTAの矢印 <span class="ar"> と衝突しないよう section.ar でスコープする */
/* 背景素材（graduate_art_bg_pc.png）が「白い角丸パネル＋水彩コーナー」まで含んだ1枚絵なので、
   CSS側で白パネルや装飾を重ねない（＝レイヤーを2枚にしない）。
   cover だと上下が切れて角丸・コーナー装飾が消えるため 100% 100% で全体を収める。 */
section.ar { position: relative; overflow: hidden; box-sizing: border-box; font-size: 1vw;
  font-family: var(--font-jp); color: #3a3230;
  background: #fff url('<?php echo $u; ?>/assets/images/graduate_art_bg_pc.png') center / 100% 100% no-repeat; }
section.ar * { box-sizing: border-box; }
.ar-panel { position: relative; padding: 3vw 0 3.4vw; }

/* --- ヘッダー --- */
.ar-head { position: relative; z-index: 1; text-align: center; }
.ar-script { font-family: var(--font-script); font-size: 2.3em; color: #ef8347; letter-spacing: .04em; }
.ar-script .sl { font-family: var(--font-jp); color: #ef6da5; font-size: 0.8em; padding: 0 .6em; }
.ar-title { margin: 0.3vw 0 0; font-weight: 600; font-size: 3.9em; letter-spacing: .1em; color: #2f2a28; }
.ar-title .p { color: #e8397f; }
.ar-sub { margin-top: 0.9vw; font-weight: 600; font-size: 1.55em; line-height: 2; color: #3a3230; }

/* --- 作品グリッド（均等セル・写真は外観>カスタマイズで差し替え可能） ---
   行の高さを grid-auto-rows で固定し、画像は height:100% + object-fit:cover で埋める。
   こうしておくとカスタマイザーで縦横比の違う写真に差し替えても高さが揃う。
   セルの縦横比は同梱写真 art-*.webp（305×190）に合わせた 1.605。写真はチップ上端が
   どれも上から約10%の位置に来るよう下の余白を切り詰めてあるので、拡大せずに揃う。 */
.ar-grid { position: relative; z-index: 1; display: grid; grid-template-columns: repeat(4, 20.5vw);
  grid-auto-rows: 12.77vw; justify-content: center; gap: 1.5vw 1.8vw; margin-top: 1.6vw; }
.ar-grid img { display: block; width: 100%; height: 100%; object-fit: cover; }

/* --- フッター --- */
.ar-foot { position: relative; z-index: 1; text-align: center; margin-top: 2vw;
  font-family: var(--font-round); font-weight: 700; font-size: 1.7em; line-height: 2; color: #e8397f; }

/* ===== SP（1080px基準: font-size 2vw） ===== */
@media (max-width: 768px) {
  section.ar { font-size: 2vw;
    background-image: url('<?php echo $u; ?>/assets/images/graduation_art_bg_sp.png'); }
  .ar-panel { padding: 6vw 0 7vw; }
  .ar-script { font-size: 2em; }
  .ar-title { font-size: 2.9em; }
  .ar-sub { font-size: 1.45em; padding: 0 4vw; }
  /* デザイン準拠: SPは3列グリッド */
  .ar-grid { grid-template-columns: repeat(3, 28.5vw); grid-auto-rows: 17.75vw;
    gap: 2vw; margin-top: 3.5vw; }
  .ar-foot { font-size: 1.5em; margin-top: 4vw; }
}
</style>
<section class="ar" id="art">
  <div class="ar-panel">
    <!-- ヘッダー -->
    <div class="ar-head">
      <div class="ar-script"><span class="sl">＼</span>Graduation Nails<span class="sl">／</span></div>
      <h2 class="ar-title">卒業までにできる<span class="p">アート</span></h2>
      <p class="ar-sub">基礎から応用まで、段階的にステップアップ！<br>卒業までに習得できるアートの一例をご紹介します。</p>
    </div>

    <!-- 作品グリッド（写真は 外観 > カスタマイズ > 卒業までにできるアート で管理） -->
    <div class="ar-grid">
      <?php foreach (fee_get_managed_images('fee_art_img_', 'art-%d.webp', '卒業までにできるアート例') as $img) : ?>
      <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_attr($img['alt']); ?>" loading="lazy">
      <?php endforeach; ?>
    </div>

    <!-- フッター -->
    <div class="ar-foot">たくさんのアートを習得して、<br>あなたらしい「好き」を仕事にしていきましょう&#9825;</div>
  </div>
</section>
