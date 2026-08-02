<?php
// 生徒様の作品例（Student Gallery）セクション — コーディング版
// 再現元: lp-pc-1.webp（y9440〜10850付近）/ lp-sp-1.webp
$u = get_template_directory_uri();
?>
<style>
/* ===== 生徒作品（PC: 1920px基準） ===== */
.gl { position: relative; overflow: hidden; box-sizing: border-box; font-size: 1vw;
  font-family: var(--font-jp); color: #3a3230;
  background: #fff url('<?php echo $u; ?>/assets/images/works_bg_pc.png') center / cover no-repeat; }
.gl * { box-sizing: border-box; }

/* --- 水彩コーナー装飾 --- */
.gl-wc { position: absolute; pointer-events: none; filter: blur(1.2vw); opacity: .5; z-index: 0; }

/* --- ヘッダー --- */
.gl-head { position: relative; z-index: 1; text-align: center; padding-top: 2.6vw; }
.gl-script { color: #e0569a; font-family: var(--font-script); font-size: 2.4em; letter-spacing: .05em; }
.gl-script .sl { font-family: var(--font-jp); font-size: 0.7em; padding: 0 .6em; }
.gl-t1 { margin-top: 0.8vw; font-weight: 700; font-size: 3em; color: #2f2a28; letter-spacing: .06em; }
.gl-t2 { position: relative; display: inline-block; margin-top: 0.4vw; font-weight: 700; font-size: 4.6em;
  letter-spacing: .1em; line-height: 1.25;
  background: linear-gradient(95deg, #f0609b 0%, #f0a63c 30%, #7cc47f 55%, #58b8d8 75%, #b183d8 100%);
  -webkit-background-clip: text; background-clip: text;
  -webkit-text-fill-color: transparent; color: transparent; }
.gl-t2-line { display: block; width: 38vw; height: 0.22vw; margin: 0.5vw auto 0; border-radius: 999px;
  background: linear-gradient(90deg, #f0609b, #f0a63c 30%, #7cc47f 55%, #58b8d8 75%, #b183d8 100%); }
.gl-heart { position: absolute; z-index: 1; color: #ef4d86; }
.gl-sub { margin-top: 1.2vw; font-weight: 600; font-size: 1.75em; line-height: 1.9; color: #3a3230; }
.gl-dots { margin-top: 0.9vw; display: flex; justify-content: center; gap: 1vw; }
.gl-dots span { width: 0.7vw; height: 0.7vw; border-radius: 50%; }

/* --- 写真グリッド（均等セル・写真は外観>カスタマイズで差し替え可能） ---
   行の高さを grid-auto-rows で固定し、画像は height:100% + object-fit:cover で埋める。
   こうしておくとカスタマイザーで縦横比の違う写真に差し替えても高さが揃う。 */
.gl-grid { position: relative; z-index: 1; display: grid; grid-template-columns: repeat(4, 16.2vw);
  grid-auto-rows: 12.38vw; justify-content: center; gap: 1.35vw 2.35vw; margin-top: 2.2vw; }
.gl-grid img { display: block; width: 100%; height: 100%; object-fit: cover; }

/* --- フッター --- */
.gl-foot { position: relative; z-index: 1; text-align: center; padding: 2.6vw 0 3vw;
  font-weight: 600; font-size: 1.5em; letter-spacing: .35em; color: #6b5b57; }
.gl-foot .ht { color: #ef6da5; letter-spacing: 0; }
.gl-spark { position: absolute; z-index: 1; pointer-events: none; }
.gl-spark::before { content: "\2726"; }

/* ===== SP（1080px基準: font-size 2vw） ===== */
@media (max-width: 768px) {
  .gl { font-size: 2vw; padding: 3vw 0 4vw;
    background-image: url('<?php echo $u; ?>/assets/images/works_bg_sp.png'); }
  .gl-wc { display: none; }
  /* デザイン準拠: 白パネルの内側に3列グリッド */
  .gl-panel { position: relative; z-index: 1; background: #fff; border-radius: 3vw;
    margin: 0 3vw; padding: 1vw 0 1vw; overflow: hidden; }
  .gl-head { padding-top: 5vw; }
  .gl-t1 { font-size: 2.4em; }
  .gl-t2 { font-size: 3.3em; }
  .gl-t2-line { width: 62vw; height: 0.4vw; }
  .gl-sub { font-size: 1.5em; padding: 0 4vw; }
  .gl-dots span { width: 1.3vw; height: 1.3vw; }
  .gl-grid { grid-template-columns: repeat(3, 28vw); grid-auto-rows: 21.4vw;
    gap: 2vw; margin-top: 4vw; }
  .gl-foot { padding: 5vw 0 6vw; font-size: 1.4em; letter-spacing: .15em; }
}
</style>
<section class="gl" id="gallery">
  <!-- 水彩コーナー -->
  <span class="gl-wc" style="left:-6vw;top:-4vw;width:22vw;height:18vw;background:#f6b6d0;border-radius:50% 50% 45% 55%/55% 45% 55% 45%;"></span>
  <span class="gl-wc" style="right:-7vw;top:-4vw;width:24vw;height:19vw;background:#f8dc9a;border-radius:45% 55% 50% 50%/50% 55% 45% 55%;"></span>
  <span class="gl-wc" style="left:-8vw;bottom:-6vw;width:26vw;height:22vw;background:#a8d4ee;border-radius:52% 48% 47% 53%/55% 52% 48% 45%;"></span>
  <span class="gl-wc" style="left:-4vw;bottom:14vw;width:18vw;height:14vw;background:#f6c0d6;border-radius:48% 52% 55% 45%/52% 48% 50% 50%;"></span>
  <span class="gl-wc" style="right:-6vw;bottom:-5vw;width:22vw;height:18vw;background:#f9e6ac;border-radius:48% 52% 55% 45%/52% 48% 50% 50%;"></span>

  <div class="gl-panel">
  <!-- ヘッダー -->
  <div class="gl-head">
    <span class="gl-spark" style="left:20vw;top:5vw;color:#f2c94c;font-size:1.7em;"></span>
    <span class="gl-spark" style="left:16vw;top:9vw;color:#c5a6ec;font-size:1.2em;"></span>
    <span class="gl-spark" style="right:19vw;top:5.5vw;color:#8ad6df;font-size:1.5em;"></span>
    <span class="gl-spark" style="right:15vw;top:9.5vw;color:#f2c94c;font-size:1.1em;"></span>
    <div class="gl-script"><span class="sl">＼</span>Student Gallery<span class="sl">／</span></div>
    <div class="gl-t1">初心者からスタートした</div>
    <div class="gl-t2">生徒様の作品例</div>
    <span class="gl-t2-line"></span>
    <p class="gl-sub">初心者の方でも、基礎から丁寧に学ぶことで<br>こんなに素敵な作品が描けるようになります！</p>
    <div class="gl-dots">
      <span style="background:#ef6da5;"></span>
      <span style="background:#f2c443;"></span>
      <span style="background:#7cc47f;"></span>
      <span style="background:#58b8d8;"></span>
      <span style="background:#a98ce4;"></span>
    </div>
  </div>

  <!-- 作品グリッド（写真は 外観 > カスタマイズ > 生徒様の作品例 で管理） -->
  <div class="gl-grid">
    <?php foreach (fee_get_managed_images('fee_gallery_img_', 'gl-%d.webp', '生徒作品例') as $img) : ?>
    <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_attr($img['alt']); ?>" loading="lazy">
    <?php endforeach; ?>
  </div>

  <!-- フッター -->
  <div class="gl-foot">そのほかにもたくさんのデザインを学べます。<span class="ht">&#9825;</span></div>
  </div><!-- /.gl-panel -->
</section>
