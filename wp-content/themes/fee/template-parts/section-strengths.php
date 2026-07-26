<?php
// 7つの強みセクション — コーディング版
// 再現元: lp-pc-1.webp（y5580〜6890付近）/ lp-sp-1.webp
$u = get_template_directory_uri();
?>
<style>
/* ===== 7つの強み（PC: 1920px基準） ===== */
.st { position: relative; overflow: hidden; box-sizing: border-box; font-size: 1vw;
  font-family: var(--font-round); color: #3a3230; background: #fffdfc; }
.st * { box-sizing: border-box; }

/* --- 水彩ブロブ装飾 --- */
.st-blob { position: absolute; pointer-events: none; filter: blur(1vw); opacity: .55; z-index: 0; }

/* --- ヘッダー --- */
.st-head { position: relative; z-index: 1; text-align: center; padding-top: 3vw; }
.st-lead { font-weight: 700; color: #e0569a; font-size: 1.6em; letter-spacing: .18em; }
.st-lead .sl { padding: 0 .6em; letter-spacing: 0; }
.st-title { margin-top: 0.6vw; font-weight: 800; font-size: 4.4em; letter-spacing: .05em; line-height: 1.2; }
.st-title .n { color: #e8397f; font-size: 1.25em; }
.st-title .g { background: var(--grad-brand);
  -webkit-background-clip: text; background-clip: text;
  -webkit-text-fill-color: transparent; color: transparent; }
.st-arc { display: block; width: 30vw; margin: 0.4vw auto 0; }
.st-deco { position: absolute; pointer-events: none; z-index: 1; }

/* --- カード共通 --- */
.st-grid4 { position: relative; z-index: 1; display: grid; grid-template-columns: 1fr 1fr;
  gap: 1.6vw 2.3vw; max-width: 92.5vw; margin: 2.4vw auto 0; }
.st-grid3 { position: relative; z-index: 1; display: grid; grid-template-columns: 1fr 1fr 1fr;
  gap: 1.7vw; max-width: 92.5vw; margin: 1.6vw auto 0; }
.st-card { position: relative; border-radius: 1.2vw; padding: 1.6vw 1.4vw 1.5vw;
  display: grid; grid-template-columns: 10.5vw 1fr; align-items: center; gap: 0.8vw;
  box-shadow: 0 0.25vw 0.9vw rgba(210,150,170,0.12); }
.st-num { position: absolute; top: -0.7vw; left: -0.5vw; width: 4.6vw; height: 4.6vw; border-radius: 50%;
  background: #fff; display: flex; align-items: center; justify-content: center;
  font-family: var(--font-en); font-weight: 700; font-size: 1.7em;
  box-shadow: 0 0.15vw 0.5vw rgba(180,130,150,0.25); }
.st-ic { justify-self: center; }
.st-ic img { display: block; width: 8.6vw; height: auto; }
.st-body { text-align: center; padding-right: 1vw; }
.st-ribbon { display: inline-block; position: relative; color: #fff; font-weight: 800;
  font-size: 1.6em; letter-spacing: .28em; padding: 0.32em 1.5em; line-height: 1.3;
  clip-path: polygon(0 0, 100% 0, calc(100% - 0.55em) 50%, 100% 100%, 0 100%, 0.55em 50%); }
.st-big { margin-top: 0.6vw; font-weight: 800; font-size: 2.5em; line-height: 1.4; }
.st-sub { margin-top: 0.15vw; font-weight: 700; font-size: 1.45em; color: #3a3230; }

/* カードごとの配色 */
.st-c1 { background: #fdeef2; } .st-c1 .st-num { color: #ec5a96; } .st-c1 .st-ribbon { background: #ec5a96; }
.st-c1 .st-big { color: #e8397f; } .st-c1 .st-big .hl { background: linear-gradient(transparent 15%, #fbd7e5 15% 90%, transparent 90%); }
.st-c2 { background: #fdf6e5; } .st-c2 .st-num { color: #f0a63c; } .st-c2 .st-ribbon { background: #f0a63c; }
.st-c2 .st-big .n2 { color: #f0a63c; font-size: 1.5em; }
.st-c3 { background: #eaf6ec; } .st-c3 .st-num { color: #6bbf7e; } .st-c3 .st-ribbon { background: #6bbf7e; }
.st-c3 .st-big .n2 { color: #6bbf7e; font-size: 1.5em; }
.st-c4 { background: #e9f2fb; } .st-c4 .st-num { color: #5a9fdb; } .st-c4 .st-ribbon { background: #5a9fdb; }
.st-c4 .st-big { color: #4a90d0; }
.st-c4 .st-sub .b { color: #4a90d0; }
.st-c5 { background: #f3edfb; } .st-c5 .st-num { color: #a98ce4; } .st-c5 .st-ribbon { background: #a98ce4; }
.st-c5 .st-big { color: #8a68cc; font-size: 1.65em; }
.st-c6 { background: #fdeff3; } .st-c6 .st-num { color: #ef6da5; } .st-c6 .st-ribbon { background: #ef6da5; }
.st-c6 .st-sub { font-size: 1.3em; text-align: left; }
.st-c6 .st-sub .b { color: #ef6da5; }
.st-c7 { background: #e8f5f5; } .st-c7 .st-num { color: #3fb4b8; } .st-c7 .st-ribbon { background: #3fb4b8; }
.st-c7 .st-sub { font-size: 1.35em; }

/* 3列カードはやや小さめ */
.st-grid3 .st-card { grid-template-columns: 8vw 1fr; padding: 1.7vw 1vw 1.5vw; }
.st-grid3 .st-ic img { width: 7vw; }
.st-grid3 .st-ribbon { font-size: 1.35em; letter-spacing: .18em; }

/* --- 締めの一言 --- */
.st-close { position: relative; z-index: 1; text-align: center; padding: 2vw 0 2.6vw;
  font-weight: 700; font-size: 1.75em; }
.st-close .c1 { color: #ef8bab; }
.st-close .c2 { color: #f0a63c; }
.st-close .c3 { color: #5bbfc9; }
.st-close .dark { color: #3a3230; }
.st-close .fee { font-family: var(--font-script); color: #e0569a; font-size: 1.25em; padding: 0 .1em; }

/* ===== SP（1080px基準: font-size 2vw） ===== */
@media (max-width: 768px) {
  .st { font-size: 2vw; }
  .st-head { padding-top: 5vw; }
  .st-lead { font-size: 1.5em; }
  .st-title { font-size: 3.6em; }
  .st-arc { width: 50vw; }
  .st-grid4, .st-grid3 { grid-template-columns: 1fr; gap: 4vw; max-width: 90vw; margin-top: 4.5vw; }
  .st-card, .st-grid3 .st-card { grid-template-columns: 16vw 1fr; padding: 3.5vw 2.5vw; border-radius: 2.5vw; }
  .st-num { top: -1.5vw; left: -1.2vw; width: 8.5vw; height: 8.5vw; font-size: 1.5em; }
  .st-ic img, .st-grid3 .st-ic img { width: 13vw; }
  .st-ribbon, .st-grid3 .st-ribbon { font-size: 1.55em; }
  .st-big { font-size: 2.3em; }
  .st-sub { font-size: 1.4em; }
  .st-close { padding: 4vw 3vw 6vw; font-size: 1.5em; }
}
</style>
<section class="st" id="strengths">
  <!-- 水彩装飾 -->
  <span class="st-blob" style="left:-6vw;top:-2vw;width:24vw;height:14vw;background:#f8c5da;border-radius:50% 50% 45% 55%/55% 45% 55% 45%;"></span>
  <span class="st-blob" style="right:-6vw;top:-3vw;width:26vw;height:15vw;background:#fbe3a8;border-radius:45% 55% 50% 50%/50% 55% 45% 55%;"></span>
  <span class="st-blob" style="left:-7vw;bottom:26vw;width:20vw;height:13vw;background:#bfe0f2;border-radius:52% 48% 47% 53%/55% 52% 48% 45%;"></span>
  <span class="st-blob" style="right:-7vw;bottom:24vw;width:22vw;height:14vw;background:#f8cfE0;border-radius:48% 52% 55% 45%/52% 48% 50% 50%;"></span>
  <span class="st-deco" style="left:20vw;top:5vw;color:#f2c94c;font-size:1.8em;">&#10022;</span>
  <span class="st-deco" style="left:26vw;top:8.5vw;color:#c5a6ec;font-size:1.2em;">&#10022;</span>
  <span class="st-deco" style="right:21vw;top:5.5vw;color:#8ad6df;font-size:1.5em;">&#10022;</span>
  <span class="st-deco" style="right:27vw;top:9vw;color:#f2c94c;font-size:1.1em;">&#10022;</span>
  <span class="st-deco" style="right:16vw;top:7vw;color:#f7a8c6;font-size:2em;">&#9825;</span>

  <!-- ヘッダー -->
  <div class="st-head">
    <div class="st-lead"><span class="sl">＼</span>Fee が選ばれる理由<span class="sl">／</span></div>
    <h2 class="st-title"><span class="n">7</span>つの<span class="g">強み</span></h2>
    <svg class="st-arc" viewBox="0 0 300 22" aria-hidden="true">
      <defs><linearGradient id="starc" x1="0" y1="0" x2="1" y2="0">
        <stop offset="0" stop-color="#e85a9b"/><stop offset="0.5" stop-color="#b06fd0"/><stop offset="1" stop-color="#46c3d8"/>
      </linearGradient></defs>
      <path d="M8 16 Q150 -8 292 16" fill="none" stroke="url(#starc)" stroke-width="3" stroke-linecap="round" stroke-dasharray="1 7"/>
    </svg>
  </div>

  <!-- 01〜04 -->
  <div class="st-grid4">
    <div class="st-card st-c1">
      <span class="st-num">01</span>
      <span class="st-ic"><img src="<?php echo $u; ?>/assets/images/parts/st-ic1.webp" alt="" loading="lazy"></span>
      <div class="st-body">
        <span class="st-ribbon">圧倒的学習時間</span>
        <div class="st-big"><span class="hl">1コマ8時間！</span></div>
        <div class="st-sub">基礎から応用まで学べる！</div>
      </div>
    </div>
    <div class="st-card st-c2">
      <span class="st-num">02</span>
      <span class="st-ic"><img src="<?php echo $u; ?>/assets/images/parts/st-ic2.webp" alt="" loading="lazy"></span>
      <div class="st-body">
        <span class="st-ribbon">総授業時間</span>
        <div class="st-big"><span class="n2">480</span>時間以上</div>
        <div class="st-sub">即戦力を目指せる！</div>
      </div>
    </div>
    <div class="st-card st-c3">
      <span class="st-num">03</span>
      <span class="st-ic"><img src="<?php echo $u; ?>/assets/images/parts/st-ic3.webp" alt="" loading="lazy"></span>
      <div class="st-body">
        <span class="st-ribbon">実践人数</span>
        <div class="st-big"><span class="n2">240</span>人越え</div>
        <div class="st-sub">実践重視の環境！</div>
      </div>
    </div>
    <div class="st-card st-c4">
      <span class="st-num">04</span>
      <span class="st-ic"><img src="<?php echo $u; ?>/assets/images/parts/st-ic4.webp" alt="" loading="lazy"></span>
      <div class="st-body">
        <span class="st-ribbon">自習室</span>
        <div class="st-big">使い放題</div>
        <div class="st-sub">授業がない日も<span class="b">自由に使える！</span></div>
      </div>
    </div>
  </div>

  <!-- 05〜07 -->
  <div class="st-grid3">
    <div class="st-card st-c5">
      <span class="st-num">05</span>
      <span class="st-ic"><img src="<?php echo $u; ?>/assets/images/parts/st-ic5.webp" alt="" loading="lazy"></span>
      <div class="st-body">
        <span class="st-ribbon">人気セミナー</span>
        <div class="st-big">トレンドアート受け放題</div>
        <div class="st-sub">最新デザインが学べる！</div>
      </div>
    </div>
    <div class="st-card st-c6">
      <span class="st-num">06</span>
      <span class="st-ic"><img src="<?php echo $u; ?>/assets/images/parts/st-ic6.webp" alt="" loading="lazy"></span>
      <div class="st-body">
        <span class="st-ribbon">開業支援</span>
        <div class="st-sub">開業の<span class="b">ノウハウや集客方法</span>なども手厚くサポート</div>
      </div>
    </div>
    <div class="st-card st-c7">
      <span class="st-num">07</span>
      <span class="st-ic"><img src="<?php echo $u; ?>/assets/images/parts/st-ic7.webp" alt="" loading="lazy"></span>
      <div class="st-body">
        <span class="st-ribbon">就職相談</span>
        <div class="st-sub">就職までしっかりサポート！</div>
      </div>
    </div>
  </div>

  <!-- 締め -->
  <div class="st-close">
    <span class="c1">学ぶ環境も、</span><span class="c2">サポートも、</span><span class="c3">すべてが充実！</span>
    <span class="dark">　夢に向かうあなたを、<span class="fee">Fee</span> が全力で応援します！</span>
  </div>
</section>
