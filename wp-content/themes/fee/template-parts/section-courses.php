<?php
// コース内容（Choose Your Path）セクション — コーディング版
// 再現元: lp-pc-1.webp（y12150〜13200付近）/ lp-sp-2-top.webp
// 文言は旧HTML版（git 00d4f6a）と現行画像から流用。
$u = get_template_directory_uri();
?>
<style>
/* ===== コース内容（PC: 1920px基準） ===== */
.co { position: relative; overflow: hidden; box-sizing: border-box; font-size: 1vw;
  font-family: var(--font-jp); color: #3a3230; background: #fffdfc; }
.co * { box-sizing: border-box; }
.co-wc { position: absolute; pointer-events: none; filter: blur(1.2vw); opacity: .5; z-index: 0; }

/* --- ヘッダー --- */
.co-head { position: relative; z-index: 1; text-align: center; padding-top: 1.4vw; }
.co-script { font-family: var(--font-script); font-size: 3em;
  background: linear-gradient(95deg, #f0a63c 0%, #f0609b 35%, #b183d8 70%, #58b8d8 100%);
  -webkit-background-clip: text; background-clip: text;
  -webkit-text-fill-color: transparent; color: transparent; }
.co-title { margin: 0.2vw 0 0; font-weight: 600; font-size: 4.6em; letter-spacing: .2em; color: #2f2a28; }
.co-title .g { background: linear-gradient(95deg, #e8628f, #a06ad0);
  -webkit-background-clip: text; background-clip: text;
  -webkit-text-fill-color: transparent; color: transparent; }
.co-ribbon { display: inline-block; margin-top: 0.8vw; color: #fff; font-weight: 600;
  font-size: 1.9em; letter-spacing: .16em; padding: 0.42em 2.2em; line-height: 1.35;
  background: linear-gradient(90deg, #f0a63c, #ef5f9a 35%, #8f6fe0 70%, #46a8e0 100%);
  clip-path: polygon(0 0, 100% 0, calc(100% - 0.7em) 50%, 100% 100%, 0 100%, 0.7em 50%); }
.co-spark { position: absolute; z-index: 1; pointer-events: none; }
.co-spark::before { content: "\2726"; }

/* --- コースカード（左: 説明 / 右: 写真・価格・CTA） --- */
.co-grid { position: relative; z-index: 1; display: grid; grid-template-columns: 1fr 1fr;
  gap: 2.3vw; max-width: 94.5vw; margin: 2.4vw auto 0; padding-bottom: 1.5vw; }
.co-card { position: relative; background: #fff; border-radius: 1.2vw; padding: 2vw 1.8vw;
  display: flex; gap: 1.6vw; align-items: stretch;
  box-shadow: 0 0.3vw 1vw rgba(210,150,170,0.14); }
.co-card1 { border: 0.12vw solid #bfe4e0; }
.co-card2 { border: 0.12vw solid #f4c4d6; }
.co-num { position: absolute; top: 1.1vw; left: 1.3vw; width: 4.6vw; height: 4.6vw; border-radius: 50%;
  display: flex; align-items: center; justify-content: center;
  color: #fff; font-family: var(--font-en); font-style: italic; font-weight: 600; font-size: 1.9em; }
.co-card1 .co-num { background: radial-gradient(circle at 40% 35%, #5cc8bc, #2fae9f); }
.co-card2 .co-num { background: radial-gradient(circle at 40% 35%, #e88ab8, #d9569a); }
.co-l { flex: 1 1 auto; min-width: 0; display: flex; flex-direction: column; padding-top: 3.6vw; }
.co-r { flex: 0 0 21vw; display: flex; flex-direction: column; padding-top: 1vw; }
.co-t { margin: 0; font-weight: 700; font-size: 2em; letter-spacing: .02em; line-height: 1.4; white-space: nowrap; }
.co-t .p { color: #e8397f; font-size: 1.15em; padding: 0 .06em; }
.co-lead { margin-top: 0.7vw; align-self: flex-start; font-weight: 700; font-size: 1.4em;
  padding-bottom: 0.15em;
  background: linear-gradient(90deg, #ffd24d, #ffb24d);
  background-size: 100% 0.14em; background-position: 0 100%; background-repeat: no-repeat; }
.co-body { margin: 0.8vw 0 0; font-weight: 500; font-size: 1.3em; line-height: 2; color: #4a4340; }
.co-osusume { margin-top: auto; padding-top: 1vw; }
.co-osusume-t { display: block; text-align: center; font-weight: 600; font-size: 1.35em;
  letter-spacing: .12em; padding: 0.25em 0; }
.co-card1 .co-osusume-t { background: linear-gradient(90deg, rgba(120,200,190,.35), rgba(120,200,190,.12)); }
.co-card2 .co-osusume-t { background: linear-gradient(90deg, rgba(233,140,180,.3), rgba(233,140,180,.1)); }
.co-ics { display: flex; justify-content: space-around; align-items: flex-start; margin-top: 0.9vw; }
.co-ic { display: flex; flex-direction: column; align-items: center; gap: 0.5vw;
  font-weight: 600; font-size: 1.1em; text-align: center; line-height: 1.6; width: 33%; }
.co-ic img { display: block; width: 5vw; height: auto; border-radius: 50%; }
.co-photo { position: relative; display: block; }
.co-photo img { display: block; width: 100%; border-radius: 0.9vw; }
.co-badge1 { position: absolute; right: -0.4vw; bottom: -1.3vw; transform: rotate(-6deg);
  font-family: var(--font-script); font-size: 2.4em; color: #d8a018; white-space: nowrap; z-index: 2; }
.co-badge1 .sp { font-size: 0.7em; }
.co-price { margin-top: 1.8vw; text-align: center; font-family: var(--font-en); font-weight: 600;
  font-size: 2.7em; letter-spacing: .02em; white-space: nowrap; }
.co-card1 .co-price { color: #2fae9f; }
.co-card2 .co-price { color: #d9569a; }
.co-price .tax { font-family: var(--font-jp); font-size: 0.45em; font-weight: 600; color: #4a4340; }
.co-cta { margin-top: 0.9vw; display: flex; align-items: center; justify-content: center; gap: 0.5vw;
  color: #fff; font-family: var(--font-jp); font-weight: 700; font-size: 1.3em;
  white-space: nowrap; padding: 0.85em 0.6em; border-radius: 999px; text-decoration: none; line-height: 1.3;
  transition: transform .12s ease, filter .15s ease;
  box-shadow: 0 0.3vw 0.9vw rgba(150,120,140,0.3); }
.co-card1 .co-cta { background: linear-gradient(135deg, #46c8b8, #21a8ac); }
.co-card2 .co-cta { background: linear-gradient(135deg, #f37bab, #e0439a); }
.co-cta:hover { filter: brightness(1.05); }
.co-cta:active { transform: scale(0.98); }
.co-cta .ar { font-family: sans-serif; }

/* --- 注記 --- */
.co-notes { position: relative; z-index: 1; text-align: center; padding-bottom: 2.6vw;
  font-weight: 500; font-size: 1.25em; line-height: 2; color: #6b5b57; }

/* ===== SP（1080px基準: font-size 2vw） ===== */
@media (max-width: 768px) {
  .co { font-size: 2vw; }
  .co-head { padding-top: 3.5vw; }
  .co-script { font-size: 2.6em; }
  .co-title { font-size: 3.6em; }
  .co-ribbon { font-size: 1.6em; padding: 0.42em 1.4em; }
  .co-grid { grid-template-columns: 1fr; gap: 5vw; max-width: 92vw; margin-top: 4vw; padding-bottom: 3vw; }
  .co-card { flex-direction: column; gap: 2vw; padding: 4vw 3.5vw; border-radius: 2.4vw; }
  .co-num { top: 2vw; left: 2vw; width: 8vw; height: 8vw; font-size: 1.7em; }
  .co-l { padding-top: 7vw; }
  .co-r { flex: 1 1 auto; padding-top: 1vw; }
  .co-t { font-size: 2.3em; }
  .co-lead { font-size: 1.5em; }
  .co-body { font-size: 1.45em; }
  .co-osusume { margin-top: 2vw; }
  .co-osusume-t { font-size: 1.4em; }
  .co-ic img { width: 10vw; }
  .co-ic { font-size: 1.25em; }
  .co-photo { max-width: 70vw; margin: 0 auto; }
  .co-badge1 { font-size: 2.2em; right: 1vw; bottom: -1vw; }
  .co-price { font-size: 2.7em; margin-top: 2.5vw; }
  .co-cta { font-size: 1.6em; margin-top: 1.5vw; }
  .co-notes { font-size: 1.3em; padding: 0 4vw 6vw; }
}
</style>
<section class="co" id="courses">
  <!-- 水彩コーナー -->
  <span class="co-wc" style="left:-6vw;top:-3vw;width:20vw;height:16vw;background:#d8bce8;border-radius:50% 50% 45% 55%/55% 45% 55% 45%;"></span>
  <span class="co-wc" style="right:-6vw;top:-2vw;width:20vw;height:16vw;background:#f6c0d6;border-radius:45% 55% 50% 50%/50% 55% 45% 55%;"></span>
  <span class="co-spark" style="left:24vw;top:3vw;color:#f2c94c;font-size:1.8em;"></span>
  <span class="co-spark" style="left:20vw;top:8vw;color:#c5a6ec;font-size:1.2em;"></span>
  <span class="co-spark" style="right:23vw;top:3.5vw;color:#f2c94c;font-size:1.5em;"></span>
  <span class="co-spark" style="right:19vw;top:8vw;color:#ef9ec2;font-size:1.6em;">&#9825;</span>

  <!-- ヘッダー -->
  <div class="co-head">
    <div class="co-script">Choose Your Path &#9825;</div>
    <h2 class="co-title"><span class="g">コース</span>内容</h2>
    <div><span class="co-ribbon">なりたい未来に合わせて選べる&#9825;</span></div>
  </div>

  <!-- コースカード -->
  <div class="co-grid">
    <!-- 3ヶ月即戦力コース -->
    <div class="co-card co-card1">
      <span class="co-num">01</span>
      <div class="co-l">
        <h3 class="co-t">3ヶ月 <span class="p">即戦力</span> コース</h3>
        <span class="co-lead">短期間でプロデビューを目指したい方へ！</span>
        <p class="co-body">3ヶ月間で480時間分の授業を消化して頂く短期集中型のコースになります。強い意欲を持ち、最短距離でプロデビューを目指したい方におすすめです。</p>
        <div class="co-osusume">
          <span class="co-osusume-t">こんな方におすすめ</span>
          <div class="co-ics">
            <span class="co-ic"><img src="<?php echo $u; ?>/assets/images/parts/co-ic1.webp" alt="" loading="lazy">学習密度が高い</span>
            <span class="co-ic"><img src="<?php echo $u; ?>/assets/images/parts/co-ic2.webp" alt="" loading="lazy">就職までの<br>スピードが早い</span>
            <span class="co-ic"><img src="<?php echo $u; ?>/assets/images/parts/co-ic3.webp" alt="" loading="lazy">サロンワーク<br>特化</span>
          </div>
        </div>
      </div>
      <div class="co-r">
        <span class="co-photo">
          <img src="<?php echo $u; ?>/assets/images/parts/co-photo1.webp" alt="3ヶ月即戦力コースの作品例" loading="lazy">
          <span class="co-badge1">人気No.1<span class="sp">&#10024;</span></span>
        </span>
        <div class="co-price">&yen;420,000 <span class="tax">(税込)</span></div>
        <a class="co-cta" href="https://lin.ee/IdR5PPL" target="_blank" rel="noopener noreferrer">このコースについて相談する<span class="ar">&#8250;</span></a>
      </div>
    </div>

    <!-- 9ヶ月じっくりコース -->
    <div class="co-card co-card2">
      <span class="co-num">02</span>
      <div class="co-l">
        <h3 class="co-t">9ヶ月 <span class="p">じっくり</span> コース</h3>
        <span class="co-lead">じっくり習得して確実にスキルを身につけたい方へ！</span>
        <p class="co-body">9ヶ月間で480時間分の授業を消化して頂くじっくり習得型のコースになります。ゆとりある期間で技術を定着させ、仕事や生活と両立しながら、プロデビューを目指したい方におすすめです。</p>
        <div class="co-osusume">
          <span class="co-osusume-t">こんな方におすすめ</span>
          <div class="co-ics">
            <span class="co-ic"><img src="<?php echo $u; ?>/assets/images/parts/co-ic4.webp" alt="" loading="lazy">無理ないペース</span>
            <span class="co-ic"><img src="<?php echo $u; ?>/assets/images/parts/co-ic5.webp" alt="" loading="lazy">働きながら<br>通いやすい</span>
            <span class="co-ic"><img src="<?php echo $u; ?>/assets/images/parts/co-ic6.webp" alt="" loading="lazy">サロンワーク<br>特化</span>
          </div>
        </div>
      </div>
      <div class="co-r">
        <span class="co-photo">
          <img src="<?php echo $u; ?>/assets/images/parts/co-photo2.webp" alt="9ヶ月じっくりコースの作品例" loading="lazy">
        </span>
        <div class="co-price">&yen;450,000 <span class="tax">(税込)</span></div>
        <a class="co-cta" href="https://lin.ee/IdR5PPL" target="_blank" rel="noopener noreferrer">このコースについて相談する<span class="ar">&#8250;</span></a>
      </div>
    </div>
  </div>

  <!-- 注記 -->
  <div class="co-notes">
    ※分割払いも可能ですのでご相談ください。<br>
    ※卒業後、1単位(4時間)5,000円(税込)で受講可能です。
  </div>
</section>
