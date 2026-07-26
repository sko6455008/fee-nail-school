<?php
// 学べる技術（Skills You Learn）セクション — コーディング版
// 再現元: lp-pc-1.webp（y10850〜12150付近）/ lp-sp-2-top.webp
$u = get_template_directory_uri();
?>
<style>
/* ===== 学べる技術（PC: 1920px基準） ===== */
.sk { position: relative; overflow: hidden; box-sizing: border-box; font-size: 1vw;
  font-family: var(--font-jp); color: #3a3230; background: #fffdfc; }
.sk * { box-sizing: border-box; }
.sk-wc { position: absolute; pointer-events: none; filter: blur(1.2vw); opacity: .5; z-index: 0; }

/* --- ヘッダー --- */
.sk-head { position: relative; z-index: 1; text-align: center; padding-top: 1.6vw; min-height: 15vw; }
.sk-head-photo { position: absolute; top: 0; display: block; z-index: 0; }
.sk-head-photo img { display: block; height: auto; }
.sk-head-l { left: 0; top: 0.8vw; } .sk-head-l img { width: 17vw;
  -webkit-mask-image: radial-gradient(120% 120% at 0% 30%, #000 60%, transparent 95%);
  mask-image: radial-gradient(120% 120% at 0% 30%, #000 60%, transparent 95%); }
.sk-head-r { right: 0; } .sk-head-r img { width: 19vw;
  -webkit-mask-image: radial-gradient(120% 120% at 100% 30%, #000 60%, transparent 95%);
  mask-image: radial-gradient(120% 120% at 100% 30%, #000 60%, transparent 95%); }
.sk-script { position: relative; font-family: var(--font-script); font-size: 3em;
  background: linear-gradient(95deg, #f0609b 0%, #f0a63c 35%, #58b8d8 70%, #b183d8 100%);
  -webkit-background-clip: text; background-clip: text;
  -webkit-text-fill-color: transparent; color: transparent; }
.sk-title { position: relative; margin: 0.2vw 0 0; font-weight: 600; font-size: 4.6em;
  letter-spacing: .35em; padding-left: .35em; color: #2f2a28; }
.sk-ribbon { position: relative; display: inline-block; margin-top: 0.8vw; color: #fff; font-weight: 600;
  font-size: 1.9em; letter-spacing: .16em; padding: 0.42em 2.2em; line-height: 1.35;
  background: linear-gradient(90deg, #f0609b, #f0a63c 30%, #58b8d8 65%, #6f7ce0 100%);
  clip-path: polygon(0 0, 100% 0, calc(100% - 0.7em) 50%, 100% 100%, 0 100%, 0.7em 50%); }
.sk-bubble { position: absolute; z-index: 2; background: #fff; text-align: center;
  font-weight: 600; line-height: 1.8; padding: 1.4em 1.2em;
  border-radius: 50% 50% 48% 52% / 55% 52% 48% 45%; }
.sk-bub-l { left: 17.5vw; top: 2.5vw; font-size: 1.45em; color: #3a3230; border: 0.14em solid #cdb6f0;
  transform: rotate(-6deg); }
.sk-bub-r { right: 19vw; top: 2.8vw; font-size: 1.45em; color: #3a3230; border: 0.14em solid #9ccdf0;
  transform: rotate(4deg); }
.sk-bubble .ht { color: #ef6da5; }
.sk-spark { position: absolute; z-index: 1; pointer-events: none; }
.sk-spark::before { content: "\2726"; }

/* --- カードグリッド --- */
.sk-grid { position: relative; z-index: 1; display: grid; grid-template-columns: repeat(3, 1fr);
  gap: 1.8vw 1.1vw; max-width: 96.5vw; margin: 1.6vw auto 0; }
.sk-card { position: relative; background: #fff; border-radius: 1vw; padding: 1.6vw 1.2vw 1.4vw;
  box-shadow: 0 0.25vw 0.9vw rgba(210,150,170,0.13);
  display: grid; grid-template-columns: 1fr 13vw; grid-template-rows: auto 1fr; gap: 0.6vw 0.8vw; }
.sk-num { position: absolute; top: 1vw; left: 1vw; width: 4.9vw; height: 4.9vw; border-radius: 50%;
  display: flex; align-items: center; justify-content: center;
  color: #fff; font-family: var(--font-en); font-style: italic; font-weight: 600; font-size: 2em; }
.sk-t { grid-column: 1 / -1; margin: 0 0 0 6.5vw; font-weight: 700; font-size: 1.9em;
  letter-spacing: .12em; align-self: center; line-height: 1.4;
  display: inline-block; }
.sk-t .u { padding-bottom: 0.14em; background-size: 100% 0.09em;
  background-position: 0 100%; background-repeat: no-repeat; }
.sk-left { display: flex; flex-direction: column; gap: 0.5vw; }
.sk-ic { display: block; margin: 0.2vw auto 0.4vw; }
.sk-ic img { display: block; width: 6vw; height: auto; }
.sk-list { list-style: none; margin: 0; padding: 0 0 0 0.6vw; text-align: left; }
.sk-list li { display: flex; align-items: center; gap: 0.6vw; font-weight: 600;
  font-size: 1.25em; padding: 0.16em 0; letter-spacing: .06em; }
.sk-list .ck { flex: 0 0 auto; width: 1.25em; height: 1.25em; border-radius: 50%;
  border: 0.1em solid currentColor; display: inline-flex; align-items: center; justify-content: center; }
.sk-list .ck svg { width: 62%; height: 62%; }
.sk-photo { align-self: center; }
.sk-photo img { display: block; width: 100%; border-radius: 0.7vw; }

/* カードごとの配色 */
.sk-c1 .sk-num { background: radial-gradient(circle at 40% 35%, #f491b6, #e8628f); }
.sk-c1 .sk-t .u { background-image: linear-gradient(90deg, #ec5a96, #ec5a96); }
.sk-c1 .sk-list .ck { color: #ec5a96; }
.sk-c2 .sk-num { background: radial-gradient(circle at 40% 35%, #f5b96a, #eb9435); }
.sk-c2 .sk-t .u { background-image: linear-gradient(90deg, #f0a63c, #f0a63c); }
.sk-c2 .sk-list .ck { color: #f0a63c; }
.sk-c3 .sk-num { background: radial-gradient(circle at 40% 35%, #62c8bb, #35ab9e); }
.sk-c3 .sk-t .u { background-image: linear-gradient(90deg, #35ab9e, #35ab9e); }
.sk-c3 .sk-list .ck { color: #35ab9e; }
.sk-c4 .sk-num { background: radial-gradient(circle at 40% 35%, #7fb4e8, #5490d6); }
.sk-c4 .sk-t .u { background-image: linear-gradient(90deg, #5490d6, #5490d6); }
.sk-c4 .sk-list .ck { color: #5490d6; }
.sk-c5 .sk-num { background: radial-gradient(circle at 40% 35%, #b696e6, #9270d2); }
.sk-c5 .sk-t .u { background-image: linear-gradient(90deg, #9270d2, #9270d2); }
.sk-c5 .sk-list .ck { color: #9270d2; }
.sk-c6 .sk-num { background: radial-gradient(circle at 40% 35%, #6ec3e8, #3fa6d8); }
.sk-c6 .sk-t .u { background-image: linear-gradient(90deg, #3fa6d8, #3fa6d8); }
.sk-c6 .sk-list .ck { color: #3fa6d8; }
.sk-c6 .sk-list li { font-size: 1.12em; padding: 0.1em 0; }

/* --- 開業サポート帯 --- */
.sk-kaigyo { position: relative; z-index: 1; display: grid; grid-template-columns: 19vw 1fr 19vw;
  gap: 1.6vw; align-items: center; max-width: 96.5vw; margin: 2vw auto 0; padding: 1.2vw 1.6vw;
  background: #fff; border-radius: 1vw; box-shadow: 0 0.25vw 0.9vw rgba(210,150,170,0.13);
  margin-bottom: 2.6vw; }
.sk-kaigyo-photo img { display: block; width: 100%; border-radius: 0.7vw; }
.sk-kaigyo-c { text-align: center; }
.sk-kaigyo-ribbon { display: inline-block; color: #fff; font-weight: 700; font-size: 1.9em;
  letter-spacing: .2em; padding: 0.32em 1.8em; line-height: 1.35;
  background: linear-gradient(90deg, #f0a63c, #f0609b 35%, #58b8d8 70%, #6f7ce0 100%);
  clip-path: polygon(0 0, 100% 0, calc(100% - 0.6em) 50%, 100% 100%, 0 100%, 0.6em 50%); }
.sk-kaigyo-t1 { margin-top: 0.9vw; font-weight: 600; font-size: 1.6em; letter-spacing: .1em; }
.sk-kaigyo-t2 { margin-top: 0.3vw; font-weight: 700; font-size: 2.4em; letter-spacing: .08em; }
.sk-kaigyo-t2 .p { color: #e8397f; }
.sk-kaigyo-r { position: relative; text-align: center; padding: 2vw 4.5vw 2vw 1vw;
  background: #f9cede; opacity: .95;
  border-radius: 47% 53% 50% 50% / 55% 48% 52% 45%; }
.sk-kaigyo-r .tx { color: #4a3a40; font-weight: 700; font-size: 1.45em; line-height: 1.9; }
.sk-kaigyo-r img { position: absolute; right: -1vw; top: 50%; transform: translateY(-50%);
  width: 7.5vw; height: auto; display: block; }

/* ===== SP（1080px基準: font-size 2vw） ===== */
@media (max-width: 768px) {
  .sk { font-size: 2vw; }
  .sk-head { padding-top: 4vw; min-height: 24vw; }
  .sk-head-l img { width: 24vw; }
  .sk-head-r img { width: 26vw; }
  .sk-script { font-size: 2.6em; }
  .sk-title { font-size: 3.6em; }
  .sk-ribbon { font-size: 1.6em; padding: 0.42em 1.4em; }
  .sk-bubble { display: none; }
  .sk-grid { grid-template-columns: 1fr; gap: 3vw; max-width: 92vw; margin-top: 3vw; }
  .sk-card { grid-template-columns: 1fr 24vw; padding: 3vw 2.5vw; border-radius: 2vw; }
  .sk-num { top: 1.6vw; left: 1.6vw; width: 8vw; height: 8vw; font-size: 1.7em; }
  .sk-t { margin-left: 11vw; font-size: 1.8em; }
  .sk-ic img { width: 10vw; }
  .sk-list li { font-size: 1.35em; }
  .sk-c6 .sk-list li { font-size: 1.25em; }
  .sk-photo img { border-radius: 1.2vw; }
  .sk-kaigyo { grid-template-columns: 1fr; gap: 3vw; max-width: 92vw; padding: 3.5vw; margin-bottom: 5vw; }
  .sk-kaigyo-r { padding: 3.5vw 12vw 3.5vw 3vw; max-width: 70vw; margin: 0 auto; }
  .sk-kaigyo-r img { width: 12vw; right: -2vw; }
}
</style>
<section class="sk" id="skills">
  <!-- 水彩コーナー -->
  <span class="sk-wc" style="left:-6vw;top:-3vw;width:20vw;height:16vw;background:#d8bce8;border-radius:50% 50% 45% 55%/55% 45% 55% 45%;"></span>
  <span class="sk-wc" style="right:-6vw;top:-3vw;width:22vw;height:17vw;background:#f8dc9a;border-radius:45% 55% 50% 50%/50% 55% 45% 55%;"></span>
  <span class="sk-wc" style="left:-7vw;bottom:-4vw;width:22vw;height:18vw;background:#f6b6d0;border-radius:52% 48% 47% 53%/55% 52% 48% 45%;"></span>
  <span class="sk-wc" style="right:-6vw;bottom:-4vw;width:20vw;height:16vw;background:#d8bce8;border-radius:48% 52% 55% 45%/52% 48% 50% 50%;"></span>

  <!-- ヘッダー -->
  <div class="sk-head">
    <span class="sk-head-photo sk-head-l"><img src="<?php echo $u; ?>/assets/images/parts/sk-head-l.webp" alt="" loading="lazy"></span>
    <span class="sk-head-photo sk-head-r"><img src="<?php echo $u; ?>/assets/images/parts/sk-head-r.webp" alt="" loading="lazy"></span>
    <span class="sk-bubble sk-bub-l">初心者も<br>安心して<br>スタートできる<span class="ht">&#9825;</span></span>
    <span class="sk-bubble sk-bub-r">好きなことを<br>一生の仕事に<span class="ht">&#9825;</span></span>
    <span class="sk-spark" style="left:31vw;top:4vw;color:#f2c94c;font-size:1.7em;"></span>
    <span class="sk-spark" style="left:33vw;top:8vw;color:#c5a6ec;font-size:1.2em;"></span>
    <span class="sk-spark" style="right:32vw;top:3vw;color:#ef9ec2;font-size:2em;">&#9825;</span>
    <span class="sk-spark" style="right:30vw;top:7.5vw;color:#f2c94c;font-size:1.3em;"></span>
    <div class="sk-script">Skills You Learn</div>
    <h2 class="sk-title">学べる技術</h2>
    <div><span class="sk-ribbon">基礎から応用まで、トータルで身につける！</span></div>
  </div>

  <!-- カード -->
  <div class="sk-grid">
    <div class="sk-card sk-c1">
      <span class="sk-num">01</span>
      <h3 class="sk-t"><span class="u">基礎知識</span></h3>
      <div class="sk-left">
        <span class="sk-ic"><img src="<?php echo $u; ?>/assets/images/parts/sk-ic1.webp" alt="" loading="lazy"></span>
        <ul class="sk-list">
          <li><span class="ck"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 12.5l5 5 10-11"/></svg></span>爪の構造</li>
          <li><span class="ck"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 12.5l5 5 10-11"/></svg></span>病気トラブル</li>
          <li><span class="ck"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 12.5l5 5 10-11"/></svg></span>衛生管理</li>
        </ul>
      </div>
      <span class="sk-photo"><img src="<?php echo $u; ?>/assets/images/parts/sk-p1.webp" alt="基礎知識のテキスト教材" loading="lazy"></span>
    </div>
    <div class="sk-card sk-c2">
      <span class="sk-num">02</span>
      <h3 class="sk-t"><span class="u">ネイルケア</span></h3>
      <div class="sk-left">
        <span class="sk-ic"><img src="<?php echo $u; ?>/assets/images/parts/sk-ic2.webp" alt="" loading="lazy"></span>
        <ul class="sk-list">
          <li><span class="ck"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 12.5l5 5 10-11"/></svg></span>ファイリング</li>
          <li><span class="ck"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 12.5l5 5 10-11"/></svg></span>ハンドケア</li>
          <li><span class="ck"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 12.5l5 5 10-11"/></svg></span>フットケア</li>
          <li><span class="ck"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 12.5l5 5 10-11"/></svg></span>ウォーターケア</li>
        </ul>
      </div>
      <span class="sk-photo"><img src="<?php echo $u; ?>/assets/images/parts/sk-p2.webp" alt="ネイルケアの実習" loading="lazy"></span>
    </div>
    <div class="sk-card sk-c3">
      <span class="sk-num">03</span>
      <h3 class="sk-t"><span class="u">マシーンケア</span></h3>
      <div class="sk-left">
        <span class="sk-ic"><img src="<?php echo $u; ?>/assets/images/parts/sk-ic3.webp" alt="" loading="lazy"></span>
        <ul class="sk-list">
          <li><span class="ck"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 12.5l5 5 10-11"/></svg></span>マシーンケア基礎</li>
          <li><span class="ck"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 12.5l5 5 10-11"/></svg></span>オフ</li>
          <li><span class="ck"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 12.5l5 5 10-11"/></svg></span>プレパレーション</li>
          <li><span class="ck"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 12.5l5 5 10-11"/></svg></span>フィルイン</li>
        </ul>
      </div>
      <span class="sk-photo"><img src="<?php echo $u; ?>/assets/images/parts/sk-p3.webp" alt="マシーンケアの実習" loading="lazy"></span>
    </div>
    <div class="sk-card sk-c4">
      <span class="sk-num">04</span>
      <h3 class="sk-t"><span class="u">長さ出し・補強</span></h3>
      <div class="sk-left">
        <span class="sk-ic"><img src="<?php echo $u; ?>/assets/images/parts/sk-ic4.webp" alt="" loading="lazy"></span>
        <ul class="sk-list">
          <li><span class="ck"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 12.5l5 5 10-11"/></svg></span>ジェル</li>
          <li><span class="ck"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 12.5l5 5 10-11"/></svg></span>チップ</li>
          <li><span class="ck"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 12.5l5 5 10-11"/></svg></span>アクリル技術</li>
        </ul>
      </div>
      <span class="sk-photo"><img src="<?php echo $u; ?>/assets/images/parts/sk-p4.webp" alt="長さ出しの作品例" loading="lazy"></span>
    </div>
    <div class="sk-card sk-c5">
      <span class="sk-num">05</span>
      <h3 class="sk-t"><span class="u">ネイルアート</span></h3>
      <div class="sk-left">
        <span class="sk-ic"><img src="<?php echo $u; ?>/assets/images/parts/sk-ic5.webp" alt="" loading="lazy"></span>
        <ul class="sk-list">
          <li><span class="ck"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 12.5l5 5 10-11"/></svg></span>ワンカラー</li>
          <li><span class="ck"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 12.5l5 5 10-11"/></svg></span>ラメグラ</li>
          <li><span class="ck"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 12.5l5 5 10-11"/></svg></span>マグネット</li>
          <li><span class="ck"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 12.5l5 5 10-11"/></svg></span>トレンドデザイン</li>
        </ul>
      </div>
      <span class="sk-photo"><img src="<?php echo $u; ?>/assets/images/parts/sk-p5.webp" alt="カラフルなネイルアート" loading="lazy"></span>
    </div>
    <div class="sk-card sk-c6">
      <span class="sk-num">06</span>
      <h3 class="sk-t"><span class="u">サロンワーク技術</span></h3>
      <div class="sk-left">
        <span class="sk-ic"><img src="<?php echo $u; ?>/assets/images/parts/sk-ic6.webp" alt="" loading="lazy"></span>
        <ul class="sk-list">
          <li><span class="ck"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 12.5l5 5 10-11"/></svg></span>ヒアリング技術</li>
          <li><span class="ck"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 12.5l5 5 10-11"/></svg></span>メニュー提案の仕方</li>
          <li><span class="ck"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 12.5l5 5 10-11"/></svg></span>施術中の声かけ</li>
          <li><span class="ck"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 12.5l5 5 10-11"/></svg></span>手元の見せ方</li>
          <li><span class="ck"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 12.5l5 5 10-11"/></svg></span>時間管理</li>
          <li><span class="ck"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 12.5l5 5 10-11"/></svg></span>接客マナー</li>
          <li><span class="ck"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 12.5l5 5 10-11"/></svg></span>サロンワークのノウハウ</li>
        </ul>
      </div>
      <span class="sk-photo"><img src="<?php echo $u; ?>/assets/images/parts/sk-p6.webp" alt="サロンワーク研修の様子" loading="lazy"></span>
    </div>
  </div>

  <!-- 開業サポート帯 -->
  <div class="sk-kaigyo">
    <span class="sk-kaigyo-photo"><img src="<?php echo $u; ?>/assets/images/parts/sk-salon.webp" alt="サロンの内装" loading="lazy"></span>
    <div class="sk-kaigyo-c">
      <span class="sk-kaigyo-ribbon">＋開業サポート&#10024;</span>
      <div class="sk-kaigyo-t1">ネイル技術、場所・道具、手続き、集客、運営体制など、</div>
      <div class="sk-kaigyo-t2"><span class="p">開業に必要なこと</span>も学べます。</div>
    </div>
    <div class="sk-kaigyo-r">
      <span class="tx">夢をカタチにする<br>第一歩を<br>応援します&#9825;</span>
      <img src="<?php echo $u; ?>/assets/images/parts/sk-polish.webp" alt="" loading="lazy">
    </div>
  </div>
</section>
