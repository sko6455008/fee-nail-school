<?php
// ファーストビュー（FV）セクション — コーディング版
// 再現元: lp-pc-1.webp 上部（PC）/ lp-sp-1.webp 上部（SP）
// 写真は既存画像からの切り出し（assets/images/parts/）。差し替えはファイル置き換えのみでOK。
// 配置は vw 単位（PC=1920px基準: 1vw=19.2px / SP=1080px基準: 1vw=10.8px）、文字サイズは em（PC基準 1em=1vw）。
$u = get_template_directory_uri();
?>
<style>
/* ===== FV（PC: 1920px基準） ===== */
.fv { position: relative; overflow: hidden; box-sizing: border-box;
  font-family: var(--font-jp); color: #2f2a28;
  background: linear-gradient(175deg, #f9ece8 0%, #f8e7e3 55%, #f9ebe6 100%);
  font-size: 1vw; height: 51vw; }
.fv * { box-sizing: border-box; }

/* --- 写真（切り出し素材・端をぼかして背景に馴染ませる） --- */
.fv-photo { position: absolute; display: block; }
.fv-photo img { display: block; width: 100%; height: auto; }
.fv-hero { right: 0; top: 0; width: 42.7vw; z-index: 2;
  -webkit-mask-image: linear-gradient(90deg, transparent 0, #000 12%);
  mask-image: linear-gradient(90deg, transparent 0, #000 12%); }
.fv-gels { left: 0; top: 31.1vw; width: 24.5vw; z-index: 2;
  -webkit-mask-image: radial-gradient(115% 115% at 0% 60%, #000 62%, transparent 92%);
  mask-image: radial-gradient(115% 115% at 0% 60%, #000 62%, transparent 92%); }

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
.fv-ribbon { position: absolute; z-index: 3; left: 14vw; top: 0.7vw; margin: 0;
  transform: rotate(-3.4deg); background: #e0569a;
  border-radius: 0.6em 1.2em 0.7em 1.4em / 1.4em 0.8em 1.2em 0.6em;
  color: #fff; font-weight: 600; font-size: 1.75em; letter-spacing: .06em;
  padding: 0.62em 1.15em; white-space: nowrap; }

/* --- メイン見出し --- */
.fv-title { position: absolute; z-index: 3; left: 15.6vw; top: 6vw;
  margin: 0; font-weight: 700; line-height: 1.28; white-space: nowrap;
  font-size: 5.4em; letter-spacing: .02em; color: #2f2a28; }
.fv-title .fv-num { font-family: var(--font-en); font-weight: 600; color: #e0569a;
  font-size: 1.75em; line-height: 1; letter-spacing: 0; padding: 0 .04em; position: relative; }
.fv-title .fv-num::before { content: "\2728"; position: absolute; left: -0.3em; top: -0.14em;
  font-size: 0.2em; }
.fv-title .fv-num::after { content: "\2728"; position: absolute; right: -0.32em; top: -0.16em;
  font-size: 0.24em; }
.fv-title .fv-pro { color: #e0569a; position: relative; padding-bottom: .08em; }
.fv-title .fv-pro::after { content: ""; position: absolute; left: .1em; right: .1em; bottom: -.02em;
  height: .1em; background-image: radial-gradient(circle at 0.11em 50%, #ec5a96 0.075em, transparent 0.09em);
  background-size: 0.36em 100%; background-repeat: repeat-x; }

/* --- 池袋ネイルカレッジ 枠 --- */
.fv-college { position: absolute; z-index: 3; left: 15.6vw; top: 25.4vw; width: 30.5vw;
  border: 0.14em solid; border-image: var(--grad-brand) 1;
  padding: 0.5em 0; text-align: center;
  color: #e0569a; font-weight: 700; font-size: 2.7em; letter-spacing: .18em; white-space: nowrap; }

/* --- Fee スクリプトロゴ --- */
.fv-fee { position: absolute; z-index: 3; left: 26vw; top: 32.4vw; width: 17vw; text-align: center;
  font-family: var(--font-script); font-size: 7.4em; line-height: 1;
  background: var(--grad-brand);
  -webkit-background-clip: text; background-clip: text;
  -webkit-text-fill-color: transparent; color: transparent; }
.fv-fee-heart { position: absolute; z-index: 3; left: 24.5vw; top: 34.6vw;
  font-size: 2.2em; color: #ef79ad; transform: rotate(-12deg); }
.fv-fee-spark { position: absolute; z-index: 3; left: 39.5vw; top: 32.8vw;
  font-size: 1.6em; color: #56c4d8; }

/* --- 丸バッジ（駅チカ・少人数制） --- */
.fv-badge { position: absolute; z-index: 3; left: 47.1vw; top: 32vw;
  width: 12.3vw; height: 12.3vw; border-radius: 50%;
  background: rgba(255,255,255,0.92); box-shadow: 0 0.3vw 1.2vw rgba(200,140,165,0.25);
  display: flex; flex-direction: column; align-items: center; justify-content: center;
  text-align: center; line-height: 1.7; font-weight: 700; color: #4a4341; }
.fv-badge .em { color: #e0569a; position: relative; }
.fv-badge .em::after { content: ""; position: absolute; left: 0; right: 0; bottom: 0.02em;
  height: 0.14em; border-radius: 999px; background: var(--grad-yellow-line); opacity: .9; }
.fv-badge-l1 { font-size: 1.13em; }
.fv-badge-l2 { font-size: 1.13em; }

/* --- ボタン --- */
.fv-btns { position: absolute; z-index: 3; left: 24.5vw; top: 44.3vw;
  display: flex; gap: 1.1vw; }
.fv-btns .btn-pink { font-size: 1.45em; padding: 0.85em 1.6em; }
.fv-btns .btn-white { font-size: 1.45em; padding: 0.85em 1.6em; }
.fv-btns .btn-ic { display: inline-flex; }
.fv-btns .btn-ic svg { width: 1.15em; height: 1.15em; }

/* ===== SP（1080px基準: font-size 2vw = 21.6px相当） ===== */
@media (max-width: 768px) {
  .fv { font-size: 2vw; height: 139vw; }
  .fv-hero { width: 43.5vw;
    -webkit-mask-image: linear-gradient(90deg, transparent 0, #000 14%);
    mask-image: linear-gradient(90deg, transparent 0, #000 14%); }
  .fv-gels { top: 83.3vw; width: 30.6vw; }
  .fv-splash { filter: blur(0.7vw); }
  .fv-splash-purple { left: -4vw; top: 5vw; width: 18vw; height: 14vw; }
  .fv-splash-pink { left: 6vw; top: 3vw; width: 11vw; height: 9vw; }
  .fv-splash-yellow { left: -6vw; top: 29vw; width: 20vw; height: 20vw; }
  .fv-splash-rose { left: -4vw; top: 46vw; width: 17vw; height: 16vw; }
  .fv-ribbon { left: 4.2vw; top: 6.9vw; font-size: 1.85em; transform: rotate(-4deg); }
  .fv-title { left: 5.1vw; top: 23.1vw; font-size: 4.6em; line-height: 1.32; }
  .fv-college { left: 7.9vw; top: 69.9vw; width: 53.7vw; font-size: 2.8em; }
  .fv-fee { left: 20vw; top: 86vw; width: 44vw; font-size: 7.4em; }
  .fv-fee-heart { left: 24vw; top: 91vw; font-size: 2em; }
  .fv-fee-spark { left: 52vw; top: 87vw; font-size: 1.5em; }
  .fv-badge { left: 63.9vw; top: 79.2vw; width: 25.9vw; height: 25.9vw; }
  .fv-badge-l1 { display: none; }
  .fv-badge-l2 { font-size: 1.57em; line-height: 1.9; }
  .fv-btns { left: 34vw; top: 113.9vw; flex-direction: column; gap: 2vw; align-items: stretch; width: 36vw; }
  .fv-btns .btn-pink, .fv-btns .btn-white { font-size: 1.6em; padding: 0.72em 1.4em; }
}
</style>
<section class="fv" id="fv">
  <!-- 水彩スプラッシュ（装飾） -->
  <span class="fv-splash fv-splash-purple"></span>
  <span class="fv-splash fv-splash-pink"></span>
  <span class="fv-splash fv-splash-yellow"></span>
  <span class="fv-splash fv-splash-rose"></span>

  <!-- 写真（仮素材: 既存画像から切り出し） -->
  <span class="fv-photo fv-hero"><img src="<?php echo $u; ?>/assets/images/parts/fv-hero.webp" alt="ジュエリーネイルとカラージェルチャート" fetchpriority="high"></span>
  <span class="fv-photo fv-gels"><img src="<?php echo $u; ?>/assets/images/parts/fv-gels.webp" alt="カラージェル" loading="lazy"></span>

  <!-- キャッチコピー -->
  <p class="fv-ribbon">あなたの「好き」が一生の仕事に&#9825;</p>
  <h1 class="fv-title">最短<b class="fv-num">3</b>ヶ月で<br><span class="fv-pro">プロ</span>のネイリストへ</h1>

  <!-- スクール名 -->
  <div class="fv-college">池袋ネイルカレッジ</div>
  <div class="fv-fee">Fee</div>
  <span class="fv-fee-heart">&#9825;</span>
  <span class="fv-fee-spark">&#10022;</span>

  <!-- 丸バッジ -->
  <div class="fv-badge">
    <span class="fv-badge-l1"><span class="em">駅チカ</span>で通いやすい&#9834;</span>
    <span class="fv-badge-l2"><span class="em">少人数制</span>で<br>しっかり学べる！</span>
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
