<?php
// 卒業までにできるアート（Graduation Nails）セクション — コーディング版
// 再現元: lp-pc-2-top.webp（y0〜1310付近）/ lp-sp-2-top.webp
$u = get_template_directory_uri();
?>
<style>
/* ===== 卒業までにできるアート（PC: 1920px基準） ===== */
.ar { position: relative; overflow: hidden; box-sizing: border-box; font-size: 1vw;
  font-family: var(--font-jp); color: #3a3230; background: #fdeef3; padding: 0.8vw; }
.ar * { box-sizing: border-box; }
.ar-panel { position: relative; background: #fff; border-radius: 1.4vw; overflow: hidden;
  padding: 1.6vw 0 2.4vw; }
.ar-stripe { position: absolute; pointer-events: none; width: 12vw; height: 12vw; opacity: .5;
  background-image: repeating-linear-gradient(45deg, #f8b9d0 0 0.5vw, transparent 0.5vw 1.3vw); }
.ar-wc { position: absolute; pointer-events: none; filter: blur(1vw); opacity: .5; }

/* --- ヘッダー --- */
.ar-head { position: relative; z-index: 1; text-align: center; }
.ar-script { font-family: var(--font-script); font-size: 2.3em; color: #ef8347; letter-spacing: .04em; }
.ar-script .sl { font-family: var(--font-jp); color: #ef6da5; font-size: 0.8em; padding: 0 .6em; }
.ar-title { margin: 0.3vw 0 0; font-weight: 600; font-size: 3.9em; letter-spacing: .1em; color: #2f2a28; }
.ar-title .p { color: #e8397f; }
.ar-sub { margin-top: 0.9vw; font-weight: 600; font-size: 1.55em; line-height: 2; color: #3a3230; }
.ar-spark { position: absolute; z-index: 1; pointer-events: none; }
.ar-spark::before { content: "\2726"; }

/* --- 作品グリッド（均等セル・写真は外観>カスタマイズで差し替え可能） --- */
.ar-grid { position: relative; z-index: 1; display: grid; grid-template-columns: repeat(4, 20.5vw);
  justify-content: center; gap: 1.5vw 1.8vw; margin-top: 1.6vw; }
.ar-grid img { display: block; width: 100%; aspect-ratio: 305 / 233; object-fit: cover; }

/* --- フッター --- */
.ar-foot { position: relative; z-index: 1; text-align: center; margin-top: 2vw;
  font-family: var(--font-round); font-weight: 700; font-size: 1.7em; line-height: 2; color: #e8397f; }

/* ===== SP（1080px基準: font-size 2vw） ===== */
@media (max-width: 768px) {
  .ar { font-size: 2vw; padding: 1.6vw; }
  .ar-panel { border-radius: 2.4vw; padding: 3.5vw 0 5vw; }
  .ar-script { font-size: 2em; }
  .ar-title { font-size: 2.9em; }
  .ar-sub { font-size: 1.45em; padding: 0 4vw; }
  .ar-grid { grid-template-columns: repeat(2, 43vw); gap: 2.5vw; margin-top: 3.5vw; }
  .ar-foot { font-size: 1.5em; margin-top: 4vw; }
}
</style>
<section class="ar" id="art">
  <div class="ar-panel">
    <span class="ar-stripe" style="left:-4vw;top:-4vw;transform:rotate(0deg);"></span>
    <span class="ar-stripe" style="right:-4vw;top:-4vw;"></span>
    <span class="ar-wc" style="left:-5vw;bottom:-4vw;width:18vw;height:14vw;background:#f6b6d0;border-radius:50% 50% 45% 55%/55% 45% 55% 45%;"></span>
    <span class="ar-wc" style="right:-5vw;bottom:-4vw;width:18vw;height:14vw;background:#f8ceda;border-radius:45% 55% 50% 50%/50% 55% 45% 55%;"></span>

    <!-- ヘッダー -->
    <div class="ar-head">
      <span class="ar-spark" style="left:16vw;top:5vw;color:#ef6da5;font-size:1.9em;"></span>
      <span class="ar-spark" style="left:22vw;top:7.5vw;color:#ef8347;font-size:1.3em;"></span>
      <span class="ar-spark" style="right:22vw;top:5vw;color:#ef6da5;font-size:1.7em;"></span>
      <span class="ar-spark" style="right:16vw;top:6.5vw;color:#ef8347;font-size:1.2em;"></span>
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
