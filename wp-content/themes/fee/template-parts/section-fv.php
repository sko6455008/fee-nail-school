<?php
// ファーストビュー（FV）セクション — コーディング版
// レイアウト再現元: 支給デザイン（PC版 / スマホ版）
// 写真・背景は支給素材（assets/images/FV_*）。透過PNGのためマスク不要。
// 各素材は周囲に透明余白があるため、被写体の実位置（下記%）を基準に配置している。
//   FV_nail   : 被写体 x 12.8〜86.0% / y 0〜100%（上下は素材の時点で見切れている正方形）
//   FV_powder : 被写体 x 3.9〜75.6% / y 24.5〜71.0%
//   FV_color  : 被写体 x 3.0〜94.9% / y 29.9〜71.2%（扇の柄が外を向くよう回転させて使う）
// 配置は vw 単位（PC=1920px基準: 1vw=19.2px / SP=1080px基準: 1vw=10.8px）、文字サイズは em（PC基準 1em=1vw / SP 1em=2vw）。
$u = get_template_directory_uri();
?>
<style>
/* ===== FV（PC: 1920px基準） ===== */
.fv { position: relative; overflow: hidden; box-sizing: border-box;
  font-family: var(--font-jp); color: #2f2a28;
  background: #f9ece8 url('<?php echo $u; ?>/assets/images/FV_bg_pc.png') center / cover no-repeat;
  font-size: 1vw; height: 51vw; }
.fv * { box-sizing: border-box; }

/* --- 写真（支給素材: 透過PNG切り抜き） --- */
.fv-photo { position: absolute; display: block; z-index: 2; }
.fv-photo img { display: block; width: 100%; height: auto; }
/* ジュエリーネイル（右側。支給デザインPC版と同じ位置・倍率に合わせている。
   デザイン上でも素材の上端はヘッダーに隠れ、下端は途中で切れて下に余白が入る）
   ※topはヘッダー高さ5.3vwを差し引いた値 */
.fv-hero { left: 50.1vw; top: -10.3vw; width: 52.3vw; }
/* カラージェル3色（左下・左端は見切れ） */
.fv-powder { left: -5vw; top: 19vw; width: 32vw; }
/* カラーチャート（右下・柄が右下を向くよう回転。右端と下端は見切れ） */
.fv-color { left: 81.5vw; top: 24.1vw; width: 35vw; }
.fv-color img { transform: rotate(-45deg); }

/* --- 水彩風スプラッシュ（CSS近似） --- */
.fv-splash { position: absolute; z-index: 1; pointer-events: none; filter: blur(0.35vw); opacity: .75; }
.fv-splash-purple { left: -2.5vw; top: 5vw; width: 11vw; height: 8.5vw; background: #e3b7e0;
  border-radius: 55% 45% 60% 40% / 50% 55% 45% 50%; }
.fv-splash-pink { left: 2.8vw; top: 3.4vw; width: 7vw; height: 5.5vw; background: #f6a9c8;
  border-radius: 45% 55% 50% 50% / 60% 45% 55% 40%; }
.fv-splash-yellow { left: -3.5vw; top: 16vw; width: 12vw; height: 12vw; background: #f8d374;
  border-radius: 50% 50% 45% 55% / 55% 45% 55% 45%; }
.fv-splash-rose { left: -2vw; top: 24.5vw; width: 10vw; height: 9vw; background: #f4b7d0;
  border-radius: 48% 52% 55% 45% / 52% 48% 50% 50%; }

/* --- リボン帯（筆風） --- */
.fv-ribbon { position: absolute; z-index: 3; left: 13.4vw; top: 1.8vw; margin: 0;
  transform: rotate(-3.4deg); background: #e0569a;
  border-radius: 0.6em 1.2em 0.7em 1.4em / 1.4em 0.8em 1.2em 0.6em;
  color: #fff; font-weight: 600; font-size: 1.6em; letter-spacing: .06em;
  line-height: 1.5; padding: 0.55em 1.3em; white-space: nowrap; }

/* --- メイン見出し（SPのみ3行に改行） --- */
.fv-br-sp { display: none; }
.fv-title { position: absolute; z-index: 3; left: 15.6vw; top: 7vw;
  margin: 0; font-weight: 700; line-height: 1.2; white-space: nowrap;
  font-size: 5.3em; letter-spacing: .02em; color: #2f2a28; }
.fv-title .fv-num { font-family: var(--font-en); font-weight: 600; color: #e0569a;
  font-size: 1.75em; line-height: 1; letter-spacing: 0; padding: 0 .04em; position: relative; }
/* デザイン同様「プロ」だけ一段大きく見せる */
.fv-title .fv-pro { color: #e0569a; position: relative; padding-bottom: .08em; font-size: 1.12em; }
.fv-title .fv-pro::after { content: ""; position: absolute; left: .1em; right: .1em; bottom: -.04em;
  height: .1em; background-image: radial-gradient(circle at 0.125em 50%, #ef8fb5 0.05em, transparent 0.065em);
  background-size: 0.25em 100%; background-repeat: repeat-x; }
/* SP用のドット（デザインでは見出しの最終行の下に入る） */

/* --- 池袋ネイルカレッジ 枠（角丸・ピンク〜ゴールドの細いグラデ罫） --- */
.fv-college { position: absolute; z-index: 3; left: 15.6vw; top: 26.3vw; width: 31.4vw;
  padding: 0.5em 0; text-align: center; line-height: 1.2;
  color: #e0569a; font-weight: 700; font-size: 2.9em; letter-spacing: .1em; white-space: nowrap; }
.fv-college::before { content: ""; position: absolute; inset: 0; border-radius: 0.42em;
  padding: 0.07em; background: linear-gradient(100deg, #ef9ec2 0%, #e6c68d 48%, #ef9ec2 100%);
  -webkit-mask: linear-gradient(#000 0 0) content-box, linear-gradient(#000 0 0);
  -webkit-mask-composite: xor; mask: linear-gradient(#000 0 0) content-box, linear-gradient(#000 0 0);
  mask-composite: exclude; pointer-events: none; }

/* --- Fee スクリプトロゴ --- */
.fv-fee { position: absolute; z-index: 3; left: 25.4vw; top: 36.1vw; width: 17vw; text-align: center;
  font-family: var(--font-script); font-size: 7.5em; line-height: 1;
  background: var(--grad-brand);
  -webkit-background-clip: text; background-clip: text;
  -webkit-text-fill-color: transparent; color: transparent; }
.fv-fee-heart { position: absolute; z-index: 3; left: 25.2vw; top: 36.2vw;
  font-size: 2.2em; color: #c9a0e8; transform: rotate(-12deg); }
.fv-fee-heart2 { position: absolute; z-index: 3; left: 25.6vw; top: 38.6vw;
  font-size: 1.5em; color: #ef79ad; }
.fv-fee-spark { position: absolute; z-index: 3; left: 38.8vw; top: 34.2vw;
  font-size: 1.6em; color: #56c4d8; }

/* --- 丸バッジ（駅チカ・少人数制） --- */
.fv-badge { position: absolute; z-index: 4; left: 48.8vw; top: 29vw;
  width: 15vw; height: 15vw; border-radius: 50%;
  background: rgba(255,255,255,0.88); box-shadow: 0 0.3vw 1.2vw rgba(200,140,165,0.22);
  display: flex; flex-direction: column; align-items: center; justify-content: center;
  text-align: center; line-height: 1.6; font-weight: 700; color: #4a4341; }
.fv-badge .em { color: #e0569a; position: relative; }
.fv-badge .em::after { content: ""; position: absolute; left: 0; right: 0; bottom: 0.02em;
  height: 0.14em; border-radius: 999px; background: var(--grad-yellow-line); opacity: .9; }
.fv-badge-l1 { font-size: 1.4em; }
.fv-badge-l2 { font-size: 1.5em; }
.fv-badge-l3 { font-size: 1.4em; }

/* --- ボタン --- */
.fv-btns { position: absolute; z-index: 3; left: 24.8vw; top: 45.4vw;
  display: flex; gap: 0.7vw; }
.fv-btns .btn-pink { font-size: 1.35em; padding: 0.8em 1.5em; }
.fv-btns .btn-white { font-size: 1.35em; padding: 0.8em 1.5em; }
.fv-btns .btn-ic { display: inline-flex; }
.fv-btns .btn-ic svg { width: 1.15em; height: 1.15em; }

/* ===== SP（1080px基準: font-size 2vw = 21.6px相当） ===== */
@media (max-width: 768px) {
  .fv { font-size: 2vw; height: 135vw;
    background-image: url('<?php echo $u; ?>/assets/images/FV_bg_sp.png'); }
  /* 写真（SPはPCより大きく、ネイルは右上いっぱい・ジェルは左下・チャートは右下） */
  /* SPも支給デザインSP版に合わせる（右端は画面外へ見切れる） */
  .fv-hero { left: 40vw; top: 10vw; width: 90.2vw; }
  .fv-powder { left: -12vw; top: 65vw; width: 57vw; }
  .fv-color { left: 55.7vw; top: 81.9vw; width: 55vw; }
  .fv-splash { filter: blur(0.7vw); }
  .fv-splash-purple { left: -4vw; top: 5vw; width: 18vw; height: 14vw; }
  .fv-splash-pink { left: 6vw; top: 3vw; width: 11vw; height: 9vw; }
  .fv-splash-yellow { left: -6vw; top: 29vw; width: 20vw; height: 20vw; }
  .fv-splash-rose { left: -4vw; top: 46vw; width: 17vw; height: 16vw; }
  .fv-ribbon { left: 2.4vw; top: 12.4vw; font-size: 1.45em; padding: 0.4em 1.1em;
    transform: rotate(-4deg); }
  .fv-br-sp { display: inline; }
  .fv-title { left: 4.8vw; top: 22.9vw; font-size: 4.7em; line-height: 1.335; }
  /* SPは見出しが3行になるため、ドットは最終行の下に独立表示 */
  .fv-title .fv-pro::after { display: none; }
  .fv-college { left: 7.6vw; top: 69.7vw; width: 56.3vw; font-size: 2.65em; letter-spacing: .1em; }
  .fv-fee { left: 20vw; top: 83vw; width: 44vw; font-size: 7.5em; }
  .fv-fee-heart { left: 24.3vw; top: 88.4vw; font-size: 2em; }
  .fv-fee-heart2 { display: none; }
  .fv-fee-spark { left: 52vw; top: 87vw; font-size: 1.5em; }
  .fv-badge { left: 66vw; top: 77vw; width: 26vw; height: 26vw; }
  .fv-badge-l1 { display: none; }
  .fv-badge-l2 { font-size: 1.7em; }
  .fv-badge-l3 { font-size: 1.4em; }
  .fv-btns { left: 34.6vw; top: 113.4vw; flex-direction: column; gap: 1.9vw; align-items: stretch; width: 34.6vw; }
  .fv-btns .btn-pink, .fv-btns .btn-white { font-size: 1.4em; padding: 0.85em 1em; }
}
</style>
<section class="fv" id="fv">
  <!-- 水彩スプラッシュ（装飾） -->
  <span class="fv-splash fv-splash-purple"></span>
  <span class="fv-splash fv-splash-pink"></span>
  <span class="fv-splash fv-splash-yellow"></span>
  <span class="fv-splash fv-splash-rose"></span>

  <!-- 写真（支給素材） -->
  <span class="fv-photo fv-hero"><img src="<?php echo $u; ?>/assets/images/FV_nail.png" alt="ジュエリーネイル" fetchpriority="high"></span>
  <span class="fv-photo fv-powder"><img src="<?php echo $u; ?>/assets/images/FV_powder.png" alt="カラージェル" loading="lazy"></span>
  <span class="fv-photo fv-color"><img src="<?php echo $u; ?>/assets/images/FV_color.png" alt="カラーチャート" loading="lazy"></span>

  <!-- キャッチコピー -->
  <p class="fv-ribbon">あなたの「好き」が一生の仕事に&#9825;</p>
  <h1 class="fv-title">最短<b class="fv-num">3</b>ヶ月で<br><span class="fv-pro">プロ</span>の<br class="fv-br-sp">ネイリストへ</h1>

  <!-- スクール名 -->
  <div class="fv-college">池袋ネイルカレッジ</div>
  <div class="fv-fee">Fee</div>
  <span class="fv-fee-heart">&#9825;</span>
  <span class="fv-fee-heart2">&#9829;</span>
  <span class="fv-fee-spark">&#10022;</span>

  <!-- 丸バッジ -->
  <div class="fv-badge">
    <span class="fv-badge-l1"><span class="em">駅チカ</span>で<br>通いやすい&#9834;</span>
    <span class="fv-badge-l2"><span class="em">少人数制</span>で</span>
    <span class="fv-badge-l3">しっかり学べる！</span>
  </div>

  <!-- ボタン -->
  <div class="fv-btns">
    <a class="btn-pink" href="https://lin.ee/IdR5PPL" target="_blank" rel="noopener noreferrer">
      <span class="btn-ic"><svg viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4.5" width="18" height="16.5" rx="2.5"/><path d="M3 9.5h18M8 2.5v4M16 2.5v4"/></svg></span>
      無料LINE相談する<span class="btn-arrow">&#8250;</span>
    </a>
    <a class="btn-white" href="#courses">コース詳細を見る<span class="btn-arrow">&#8250;</span></a>
  </div>
</section>
