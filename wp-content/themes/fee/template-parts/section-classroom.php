<?php
// 授業風景（Classroom）セクション — コーディング版
// 再現元: lp-pc-1.webp（y8250〜9440付近）/ lp-sp-1.webp
$u = get_template_directory_uri();
?>
<style>
/* ===== 授業風景（PC: 1920px基準） ===== */
.cl { position: relative; overflow: hidden; box-sizing: border-box; font-size: 1vw;
  font-family: var(--font-jp); color: #5b4a35;
  background: #f8f0e2 url('<?php echo $u; ?>/assets/images/classroom_bg_pc.png') center / cover no-repeat; }
.cl * { box-sizing: border-box; }

/* --- ヘッダー --- */
.cl-head { position: relative; text-align: center; padding: 1.4vw 0 1.6vw; min-height: 11vw; }
/* 見出し左右の写真は支給素材（classroom1/2 透過切り抜き）。中央帯を切り抜いて表示 */
.cl-head-photo { position: absolute; top: 0; display: block; z-index: 1; }
.cl-head-photo img { display: block; object-fit: cover; }
.cl-head-l { left: 0; } .cl-head-l img { width: 21vw; height: 12vw; }
.cl-head-r { right: 0; } .cl-head-r img { width: 21vw; height: 12vw; }
.cl-script { font-family: var(--font-script); font-size: 2.4em; color: #c58ea0; }
.cl-title { position: relative; z-index: 2; margin: 0.1vw 0 0; font-weight: 600; font-size: 4.3em;
  letter-spacing: .55em; padding-left: .55em; color: #6b5137; }
.cl-title-line { display: block; width: 30vw; height: 0.18vw; margin: 0.7vw auto 0;
  background: linear-gradient(90deg, transparent, #b89be0 25% 75%, transparent); }
.cl-sub { position: relative; z-index: 2; margin-top: 0.9vw; font-weight: 600; font-size: 1.7em;
  letter-spacing: .2em; color: #6b5137; }
.cl-spark { position: absolute; z-index: 2; pointer-events: none; color: #e8bd5a; }
.cl-spark::before { content: "\2726"; }

/* --- 写真グリッド（均等セル） --- */
.cl-grid1 { display: grid; grid-template-columns: repeat(3, 1fr); gap: 0.5vw;
  max-width: 96vw; margin: 0 auto; }
.cl-grid2 { display: grid; grid-template-columns: repeat(4, 1fr); gap: 0.5vw;
  max-width: 96vw; margin: 0.5vw auto 0; }
.cl-grid1 img, .cl-grid2 img { display: block; width: 100%; height: 16vw;
  object-fit: cover; border-radius: 0.5vw; }

/* --- 下部インフォバー --- */
.cl-info { display: grid; grid-template-columns: 26vw 20vw 1fr; gap: 1.6vw; align-items: center;
  max-width: 96vw; margin: 1.4vw auto 0; padding: 1.4vw 1.8vw 1.6vw;
  background: #fbf5e9; border-radius: 1vw; margin-bottom: 2vw; }
.cl-osusume { display: inline-block; background: #f2c443; color: #5b4a35;
  font-weight: 700; font-size: 1.5em; letter-spacing: .12em; padding: 0.25em 1.1em;
  border-radius: 0.3em 0.9em 0.35em 1em / 0.9em 0.35em 1em 0.3em; }
.cl-check { list-style: none; margin: 0.8vw 0 0; padding: 0; text-align: left; }
.cl-check li { display: flex; align-items: center; gap: 0.7vw; font-weight: 600;
  font-size: 1.45em; padding: 0.22em 0; }
.cl-check .ck { flex: 0 0 auto; width: 1.4em; height: 1.4em; border-radius: 50%;
  display: inline-flex; align-items: center; justify-content: center; color: #fff; font-size: 0.85em; }
.cl-check .ck svg { width: 65%; height: 65%; }
.ck-pink { background: #f0708f; } .ck-purple { background: #a98ce4; } .ck-teal { background: #4cbfa9; }
.cl-blob { position: relative; text-align: center; padding: 3.2vw 1.5vw;
  background: url('<?php echo $u; ?>/assets/images/classroom4.png') center / contain no-repeat; }
.cl-blob .tx { color: #463a5c; font-weight: 700; font-size: 1.55em; line-height: 1.9; }
.cl-msg { text-align: left; position: relative; padding-right: 11vw; }
.cl-msg-t { color: #7d5fc0; font-weight: 700; font-size: 1.6em;
  border-bottom: 0.13vw dotted #a98ce4; display: inline-block; padding-bottom: 0.2em; }
.cl-msg-b { margin-top: 0.8vw; font-weight: 500; font-size: 1.35em; line-height: 2; color: #5b4a35; }
.cl-msg img { position: absolute; right: 0; top: 50%; transform: translateY(-50%);
  width: 10vw; height: 10vw; object-fit: cover; display: block; }

/* --- 水彩コーナー装飾 --- */
.cl-blob-deco { position: absolute; pointer-events: none; filter: blur(0.8vw); opacity: .55; z-index: 0; }

/* ===== SP（1080px基準: font-size 2vw） ===== */
@media (max-width: 768px) {
  .cl { font-size: 2vw; padding: 3vw 0;
    background-image: url('<?php echo $u; ?>/assets/images/classroom_bg_sp.png'); }
  .cl-head { padding: 3vw 0; min-height: 24vw; }
  .cl-head-l img { width: 27vw; height: 24vw; }
  .cl-head-r img { width: 27vw; height: 24vw; }
  .cl-script { font-size: 2em; }
  .cl-title { font-size: 3.4em; letter-spacing: .3em; padding-left: .3em; }
  .cl-title-line { width: 46vw; height: 0.35vw; }
  .cl-sub { font-size: 1.5em; letter-spacing: .1em; }
  .cl-grid1 { grid-template-columns: 1fr 1fr; gap: 1.6vw; max-width: 94vw; }
  .cl-grid2 { grid-template-columns: 1fr 1fr; gap: 1.6vw; max-width: 94vw; margin-top: 1.6vw; }
  .cl-grid1 img:first-child { grid-column: 1 / -1; height: 52vw; }
  .cl-grid1 img, .cl-grid2 img { border-radius: 1.2vw; height: 30vw; }
  /* デザイン（スマホ版LP）に合わせて写真は5枚のみ・下部インフォバーは非表示 */
  .cl-grid2 img:nth-child(1), .cl-grid2 img:nth-child(3) { display: none; }
  .cl-info { display: none; }
}
</style>
<section class="cl" id="atmosphere">
  <!-- ヘッダー -->
  <div class="cl-head">
    <span class="cl-head-photo cl-head-l"><img src="<?php echo $u; ?>/assets/images/classroom1.png" alt="" loading="lazy"></span>
    <span class="cl-head-photo cl-head-r"><img src="<?php echo $u; ?>/assets/images/classroom2.png" alt="" loading="lazy"></span>
    <span class="cl-spark" style="left:26vw;top:1.5vw;font-size:1.6em;"></span>
    <span class="cl-spark" style="left:23.5vw;top:4.5vw;font-size:1.1em;"></span>
    <span class="cl-spark" style="right:27vw;top:2vw;font-size:1.4em;"></span>
    <span class="cl-spark" style="right:24vw;top:5vw;font-size:1em;"></span>
    <div class="cl-script">Classroom</div>
    <h2 class="cl-title">授業風景</h2>
    <span class="cl-title-line"></span>
    <div class="cl-sub">少人数制で、楽しくしっかり学べる&#9825;</div>
  </div>

  <!-- 写真グリッド（支給写真 classroom0N.png。02と05、03と04は表示位置を入れ替えている） -->
  <div class="cl-grid1">
    <img src="<?php echo $u; ?>/assets/images/classroom01.png" alt="カラー選びのレッスン風景" loading="lazy">
    <img src="<?php echo $u; ?>/assets/images/classroom05.png" alt="講師の指導風景" loading="lazy">
    <img src="<?php echo $u; ?>/assets/images/classroom04.png" alt="マシーンケアの実習" loading="lazy">
  </div>
  <div class="cl-grid2">
    <img src="<?php echo $u; ?>/assets/images/classroom03.jpg" alt="ジェル塗布の実習" loading="lazy">
    <img src="<?php echo $u; ?>/assets/images/classroom02.png" alt="ハンドケアのレッスン風景" loading="lazy">
    <img src="<?php echo $u; ?>/assets/images/classroom06.png" alt="ジェルの筆づかい" loading="lazy">
    <img src="<?php echo $u; ?>/assets/images/classroom07.png" alt="ファイリングの実習" loading="lazy">
  </div>

  <!-- インフォバー -->
  <div class="cl-info">
    <div>
      <span class="cl-osusume">こんな方におすすめ！</span>
      <ul class="cl-check">
        <li><span class="ck ck-pink"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.4" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 12.5l5 5 10-11"/></svg></span>ネイルが大好き！</li>
        <li><span class="ck ck-purple"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.4" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 12.5l5 5 10-11"/></svg></span>手に職をつけて働きたい！</li>
        <li><span class="ck ck-teal"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.4" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 12.5l5 5 10-11"/></svg></span>自分のサロンを持ちたい！</li>
        <li><span class="ck ck-purple"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.4" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 12.5l5 5 10-11"/></svg></span>オシャレな仕事がしたい！</li>
      </ul>
    </div>
    <div class="cl-blob"><span class="tx">夢をカタチにする<br>第一歩を<br>応援します&#9825;</span></div>
    <div class="cl-msg">
      <span class="cl-msg-t">少人数制だから、一人ひとりにしっかり向き合います。</span>
      <p class="cl-msg-b">わからないことはすぐに質問できて、苦手なところも丁寧にサポート。<br>楽しく学びながら、着実にスキルを身につけられる環境です。</p>
      <img src="<?php echo $u; ?>/assets/images/classroom3.png" alt="" loading="lazy">
    </div>
  </div>
</section>
