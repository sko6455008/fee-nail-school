<?php
// 7つの強みセクション — コーディング版
// 再現元: lp-pc-1.webp（y5580〜6890付近）/ lp-sp-1.webp
$u = get_template_directory_uri();
?>
<style>
/* ===== 7つの強み（PC: 1920px基準） ===== */
.st { position: relative; overflow: hidden; box-sizing: border-box; font-size: 1vw;
  font-family: var(--font-round); color: #3a3230;
  background: #fffdfc url('<?php echo $u; ?>/assets/images/strength_bg_pc.png') center / cover no-repeat; }
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

/* --- カード共通（デザイン実測: カード幅45vw / 高さ13.6vw） --- */
.st-grid4 { position: relative; z-index: 1; display: grid; grid-template-columns: 1fr 1fr;
  gap: 1.3vw 2.3vw; max-width: 92.5vw; margin: 2.4vw auto 0; }
.st-grid3 { position: relative; z-index: 1; display: grid; grid-template-columns: 1fr 1fr 1fr;
  gap: 1.7vw; max-width: 92.5vw; margin: 1.3vw auto 0; }
.st-card { position: relative; border-radius: 1.2vw; padding: 1.2vw 2vw 1.2vw 7.5vw;
  display: grid; grid-template-columns: var(--icw) 1fr; align-items: center; gap: 2vw;
  min-height: 13.6vw; --icw: 9vw;
  box-shadow: 0 0.25vw 0.9vw rgba(210,150,170,0.12); }

/* --- ナンバリング（カード色で塗った丸。数字は白抜き） --- */
.st-num { position: absolute; top: 0.3vw; left: 0.6vw; width: 6.4vw; height: 6.4vw;
  display: flex; align-items: center; justify-content: center;
  background: var(--acc); color: #fff; border-radius: 50%;
  font-family: var(--font-en); font-weight: 700; font-size: 2.4em; line-height: 1; }

/* --- アイコン（支給素材は1024×1536で中身の大きさがバラバラなので、
       --sw で横幅を、--ty で上下位置を揃えてから表示する） --- */
.st-ic { position: relative; justify-self: center; width: var(--icw); height: var(--icw); }
.st-ic img { position: absolute; left: 50%; top: 50%; height: auto;
  width: calc(var(--icw) * var(--sw));
  transform: translate(-50%, -50%) translateY(calc(var(--icw) * var(--ty))); }

.st-body { text-align: center; }
.st-ribbon { display: inline-block; position: relative; color: #fff; font-weight: 800;
  font-size: 2em; letter-spacing: .28em; padding: 0.22em 1.4em; line-height: 1.2;
  background: var(--acc);
  clip-path: polygon(0 0, 100% 0, calc(100% - 0.55em) 50%, 100% 100%, 0 100%, 0.55em 50%); }
.st-big { margin-top: 0.4vw; font-weight: 800; font-size: 2.75em; line-height: 1.3; }
.st-sub { margin-top: 0.15vw; font-weight: 700; font-size: 1.75em; line-height: 1.45; color: #3a3230; }

/* カードごとの配色（--acc = ナンバリングとリボンの色）と
   アイコン正規化係数（--sw = 横幅倍率 / --ty = 上下位置補正） */
.st-c1 { background: #fdeef2; --acc: #ec5a96; }
.st-c1 .st-ic { --sw: 1.605; --ty: 0.102; }
.st-c1 .st-big { color: #e8397f; } .st-c1 .st-big .hl { background: linear-gradient(transparent 15%, #fbd7e5 15% 90%, transparent 90%); }
.st-c2 { background: #fdf6e5; --acc: #f0a63c; }
.st-c2 .st-ic { --sw: 1.757; --ty: 0.021; }
.st-c2 .st-big .n2 { color: #f0a63c; font-size: 1.25em; }
.st-c3 { background: #eaf6ec; --acc: #6bbf7e; }
.st-c3 .st-ic { --sw: 1.564; --ty: 0.083; }
.st-c3 .st-big .n2 { color: #6bbf7e; font-size: 1.25em; }
.st-c4 { background: #e9f2fb; --acc: #5a9fdb; }
.st-c4 .st-ic { --sw: 1.832; --ty: 0.048; }
.st-c4 .st-big { color: #4a90d0; }
.st-c4 .st-sub .b { color: #4a90d0; }
.st-c5 { background: #f3edfb; --acc: #a98ce4; }
.st-c5 .st-ic { --sw: 1.657; --ty: 0.095; }
.st-c5 .st-big { color: #8a68cc; }
.st-c6 { background: #fdeff3; --acc: #ef6da5; }
.st-c6 .st-ic { --sw: 1.600; --ty: 0.061; }
.st-c6 .st-sub .b { color: #ef6da5; }
.st-c7 { background: #e8f5f5; --acc: #3fb4b8; }
.st-c7 .st-ic { --sw: 1.593; --ty: 0.085; }

/* 3列カードはやや小さめ（カード別の指定より後ろに置いて上書きさせる） */
.st-grid3 .st-card { grid-template-columns: var(--icw) 1fr; gap: 1.6vw;
  padding: 1.1vw 1.2vw 1.1vw 3.4vw; min-height: 12.4vw; --icw: 5.6vw; }
.st-grid3 .st-num { width: 5.2vw; height: 5.2vw; font-size: 2em; }
.st-grid3 .st-ribbon { font-size: 1.8em; letter-spacing: .18em; }
.st-grid3 .st-big { font-size: 1.8em; }
.st-grid3 .st-sub { font-size: 1.35em; }
.st-grid3 .st-c5 .st-big { font-size: 1.5em; }
.st-grid3 .st-c6 .st-sub { font-size: 1.25em; }
.st-grid3 .st-c7 .st-sub { font-size: 1.3em; }

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
  .st { font-size: 2vw;
    background-image: url('<?php echo $u; ?>/assets/images/strength_bg_sp.png'); }
  .st-head { padding-top: 5vw; }
  .st-lead { font-size: 1.5em; }
  .st-title { font-size: 3.6em; }
  .st-arc { width: 50vw; }
  /* SPもデザイン実測（カード幅94vw / 高さ22.7vw）に合わせる */
  .st-grid4, .st-grid3 { grid-template-columns: 1fr; gap: 1.5vw; max-width: 94vw; margin-top: 4.5vw; }
  .st-card, .st-grid3 .st-card { grid-template-columns: var(--icw) 1fr; gap: 3vw;
    padding: 2vw 1vw 2vw 24vw; min-height: 22.7vw; border-radius: 2.5vw; --icw: 22vw; }
  .st-num, .st-grid3 .st-num { top: 4vw; left: 5.4vw; width: 15.4vw; height: 15.4vw; font-size: 2.6em; }
  .st-ribbon, .st-grid3 .st-ribbon { font-size: 2em; letter-spacing: .22em; padding: 0.22em 1.1em; }
  .st-big, .st-grid3 .st-big { font-size: 2.1em; }
  .st-sub, .st-grid3 .st-sub { font-size: 1.4em; }
  .st-grid3 .st-c5 .st-big { font-size: 1.75em; }
  .st-grid3 .st-c6 .st-sub, .st-grid3 .st-c7 .st-sub { font-size: 1.4em; }
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
      <span class="st-ic"><img src="<?php echo $u; ?>/assets/images/strength1.png" alt="" loading="lazy"></span>
      <div class="st-body">
        <span class="st-ribbon">圧倒的学習時間</span>
        <div class="st-big"><span class="hl">1コマ8時間！</span></div>
        <div class="st-sub">基礎から応用まで学べる！</div>
      </div>
    </div>
    <div class="st-card st-c2">
      <span class="st-num">02</span>
      <span class="st-ic"><img src="<?php echo $u; ?>/assets/images/strength2.png" alt="" loading="lazy"></span>
      <div class="st-body">
        <span class="st-ribbon">総授業時間</span>
        <div class="st-big"><span class="n2">480</span>時間以上</div>
        <div class="st-sub">即戦力を目指せる！</div>
      </div>
    </div>
    <div class="st-card st-c3">
      <span class="st-num">03</span>
      <span class="st-ic"><img src="<?php echo $u; ?>/assets/images/strength3.png" alt="" loading="lazy"></span>
      <div class="st-body">
        <span class="st-ribbon">実践人数</span>
        <div class="st-big"><span class="n2">240</span>人越え</div>
        <div class="st-sub">実践重視の環境！</div>
      </div>
    </div>
    <div class="st-card st-c4">
      <span class="st-num">04</span>
      <span class="st-ic"><img src="<?php echo $u; ?>/assets/images/strength4.png" alt="" loading="lazy"></span>
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
      <span class="st-ic"><img src="<?php echo $u; ?>/assets/images/strength5.png" alt="" loading="lazy"></span>
      <div class="st-body">
        <span class="st-ribbon">人気セミナー</span>
        <div class="st-big">トレンドアート受け放題</div>
        <div class="st-sub">最新デザインが学べる！</div>
      </div>
    </div>
    <div class="st-card st-c6">
      <span class="st-num">06</span>
      <span class="st-ic"><img src="<?php echo $u; ?>/assets/images/strength6.png" alt="" loading="lazy"></span>
      <div class="st-body">
        <span class="st-ribbon">開業支援</span>
        <div class="st-sub">開業の<span class="b">ノウハウや集客方法</span>なども手厚くサポート</div>
      </div>
    </div>
    <div class="st-card st-c7">
      <span class="st-num">07</span>
      <span class="st-ic"><img src="<?php echo $u; ?>/assets/images/strength7.png" alt="" loading="lazy"></span>
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
