<?php
// 卒業後（After Graduation）セクション — コーディング版
// 再現元: lp-pc-2-top.webp（y1310〜2440付近）/ lp-sp-2-top.webp
// 文言は旧HTML版（git 00d4f6a）と現行画像から流用。
$u = get_template_directory_uri();
?>
<style>
/* ===== 卒業後（PC: 1920px基準） ===== */
.fu { position: relative; overflow: hidden; box-sizing: border-box; font-size: 1vw;
  font-family: var(--font-jp); color: #3a3230; background: #fffdfd; }
.fu * { box-sizing: border-box; }
.fu-wc { position: absolute; pointer-events: none; filter: blur(1vw); opacity: .55; z-index: 0; }

/* --- ヘッダー --- */
.fu-head { position: relative; z-index: 1; text-align: center; padding-top: 2vw; }
.fu-script { font-family: var(--font-script); font-size: 2.6em;
  background: linear-gradient(95deg, #f0a63c 0%, #f0609b 40%, #58b8d8 100%);
  -webkit-background-clip: text; background-clip: text;
  -webkit-text-fill-color: transparent; color: transparent; }
.fu-t1 { margin: 0.5vw 0 0; font-weight: 600; font-size: 2.9em; letter-spacing: .3em; color: #2f2a28; }
.fu-t2 { margin: 0.4vw 0 0; font-weight: 600; font-size: 3.6em; letter-spacing: .06em; color: #2f2a28; }
.fu-line { display: block; width: 44vw; height: 0.3vw; margin: 1vw auto 0; border-radius: 999px;
  background: linear-gradient(90deg, #f0609b, #f0a63c 30%, #7cc47f 55%, #58b8d8 75%, #b183d8 100%); }
.fu-spark { position: absolute; z-index: 1; pointer-events: none; }
.fu-spark::before { content: "\2726"; }

/* --- カード（グリッドで整列） --- */
.fu-grid { position: relative; z-index: 1; display: grid; grid-template-columns: repeat(3, 1fr);
  gap: 1.8vw; max-width: 96.5vw; margin: 2.2vw auto 0; }
.fu-card { background: #fff; border-radius: 1.2vw; padding: 1.6vw 1.5vw;
  box-shadow: 0 0.3vw 1vw rgba(200,160,180,0.18);
  display: grid; grid-template-columns: 13vw 1fr; gap: 0.6vw 1.2vw; align-items: start; }
/* カード1は写真左・文字右／カード2・3は文字左・写真右 */
.fu-c1 { grid-template-areas: "photo title" "photo body" "photo sign"; }
.fu-c1 { grid-template-columns: 13vw 1fr; }
.fu-c2, .fu-c3 { grid-template-areas: "title photo" "body photo" "sign photo"; grid-template-columns: 1fr 13vw; }
.fu-photo { grid-area: photo; align-self: center; }
.fu-photo img { display: block; width: 100%; border-radius: 0.9vw; }
.fu-t { grid-area: title; margin: 0; font-weight: 700; font-size: 1.6em; letter-spacing: .06em;
  line-height: 1.5; text-align: center; white-space: nowrap; }
.fu-t-line { display: block; letter-spacing: .28em; font-size: 0.75em; font-weight: 400; }
.fu-body { grid-area: body; font-weight: 600; font-size: 1.25em; line-height: 2; margin: 0; }
.fu-sign { grid-area: sign; justify-self: end; align-self: end;
  font-family: var(--font-script); font-size: 2.4em; white-space: nowrap; transform: rotate(-5deg);
  padding: 0 0.4em 0.1em 0; }
.fu-c1 .fu-t { color: #e8397f; } .fu-c1 .fu-t-line { color: #f08cab; }
.fu-c1 .fu-sign { background: linear-gradient(95deg, #b183d8, #f0609b);
  -webkit-background-clip: text; background-clip: text;
  -webkit-text-fill-color: transparent; color: transparent; }
.fu-c2 .fu-t { color: #7d6fd0; } .fu-c2 .fu-t-line { color: #a89ae0; }
.fu-c2 .fu-sign { background: linear-gradient(95deg, #58a8e0, #8f6fe0);
  -webkit-background-clip: text; background-clip: text;
  -webkit-text-fill-color: transparent; color: transparent; }
.fu-c3 .fu-t { color: #4a90d0; } .fu-c3 .fu-t-line { color: #86b6e4; }
.fu-c3 .fu-sign { background: linear-gradient(95deg, #58c48f, #58a8e0);
  -webkit-background-clip: text; background-clip: text;
  -webkit-text-fill-color: transparent; color: transparent; }

/* --- フッター --- */
.fu-foot { position: relative; z-index: 1; text-align: center; padding: 2.4vw 0 2.8vw;
  font-weight: 600; font-size: 2em; letter-spacing: .08em; color: #2f2a28; }
.fu-foot .p { color: #e8397f; }

/* ===== SP（1080px基準: font-size 2vw） ===== */
@media (max-width: 768px) {
  /* SP用背景のみ支給済み（PC用 graduation_after_bg_pc は未支給） */
  .fu { font-size: 2vw;
    background: #fffdfd url('<?php echo $u; ?>/assets/images/graduation_after_bg_sp.png') center / cover no-repeat; }
  .fu-head { padding-top: 4vw; }
  .fu-script { font-size: 2.2em; }
  .fu-t1 { font-size: 2.4em; }
  .fu-t2 { font-size: 2em; }
  .fu-line { width: 76vw; height: 0.5vw; }
  .fu-grid { grid-template-columns: 1fr; gap: 4vw; max-width: 92vw; margin-top: 4vw; }
  .fu-card { border-radius: 2.4vw; padding: 3.5vw; gap: 1.5vw 3vw; }
  /* デザイン準拠: 写真は 1枚目左・2枚目右・3枚目左 の交互配置で大きめに */
  .fu-c1, .fu-c3 { grid-template-areas: "photo title" "photo body" "photo sign";
    grid-template-columns: 42vw 1fr; }
  .fu-c2 { grid-template-areas: "title photo" "body photo" "sign photo";
    grid-template-columns: 1fr 42vw; }
  .fu-photo img { border-radius: 1.8vw; aspect-ratio: 1/1;}
  /* タイトルの折返しを許可してカード外へのはみ出しを防ぐ */
  .fu-t { font-size: 1.9em; white-space: normal; }
  .fu-body { font-size: 1.4em; line-height: 1.9; }
  .fu-sign { font-size: 2.2em; }
  .fu-foot { font-size: 1.6em; padding: 4.5vw 3vw 5.5vw; }
}
</style>
<section class="fu" id="future">
  <!-- 水彩装飾 -->
  <span class="fu-wc" style="left:-6vw;top:-3vw;width:24vw;height:16vw;background:#e8bce0;border-radius:50% 50% 45% 55%/55% 45% 55% 45%;"></span>
  <span class="fu-wc" style="left:6vw;top:2vw;width:10vw;height:7vw;background:#bfe0f2;border-radius:45% 55% 50% 50%/50% 55% 45% 55%;"></span>
  <span class="fu-wc" style="right:-6vw;top:-3vw;width:24vw;height:16vw;background:#f8d59a;border-radius:45% 55% 50% 50%/50% 55% 45% 55%;"></span>
  <span class="fu-wc" style="left:-6vw;bottom:-4vw;width:22vw;height:15vw;background:#f6b6d0;border-radius:52% 48% 47% 53%/55% 52% 48% 45%;"></span>
  <span class="fu-wc" style="right:-6vw;bottom:-4vw;width:22vw;height:15vw;background:#bfe0f2;border-radius:48% 52% 55% 45%/52% 48% 50% 50%;"></span>

  <!-- ヘッダー -->
  <div class="fu-head">
    <span class="fu-spark" style="left:26vw;top:4vw;color:#f2c94c;font-size:1.8em;"></span>
    <span class="fu-spark" style="left:22vw;top:8vw;color:#8ad6df;font-size:1.3em;"></span>
    <span class="fu-spark" style="right:25vw;top:4.5vw;color:#c5a6ec;font-size:1.6em;"></span>
    <span class="fu-spark" style="right:21vw;top:8.5vw;color:#f2c94c;font-size:1.2em;"></span>
    <div class="fu-script">After Graduation</div>
    <h2 class="fu-t1">卒業後</h2>
    <div class="fu-t2">池袋ネイルカレッジFee を卒業すると...</div>
    <span class="fu-line"></span>
  </div>

  <!-- カード -->
  <div class="fu-grid">
    <div class="fu-card fu-c1">
      <span class="fu-photo"><img src="<?php echo $u; ?>/assets/images/parts/fu-p1.webp" alt="サロンで施術したネイル" loading="lazy"></span>
      <h3 class="fu-t">人気サロンへ就職<span class="fu-t-line">･----･&#10022;----･</span></h3>
      <p class="fu-body">提携サロンへ優先紹介可能！<br>即戦力としてデビューできます。</p>
      <span class="fu-sign">Debut !&#9825;</span>
    </div>
    <div class="fu-card fu-c2">
      <h3 class="fu-t">自宅サロン開業<span class="fu-t-line">&#9734;----･&#10022;----&#8962;</span></h3>
      <span class="fu-photo"><img src="<?php echo $u; ?>/assets/images/parts/fu-p2.webp" alt="自宅サロンでのネイル" loading="lazy"></span>
      <p class="fu-body">低コストで開業するノウハウを伝授。自分のペースで働くライフスタイルを実現します。</p>
      <span class="fu-sign">My Salon &#9825;</span>
    </div>
    <div class="fu-card fu-c3">
      <h3 class="fu-t">フリーランスとして活躍<span class="fu-t-line">･----･&#10022;----&#9825;</span></h3>
      <span class="fu-photo"><img src="<?php echo $u; ?>/assets/images/parts/fu-p3.webp" alt="フリーランスネイリストの作品" loading="lazy"></span>
      <p class="fu-body">シェアサロンを利用したり、出張ネイリストとして自由に働く道もサポートします。</p>
      <span class="fu-sign">Freelance &#9825;</span>
    </div>
  </div>

  <!-- フッター -->
  <div class="fu-foot">あなたらしい未来へ、<span class="p">一歩踏み出すお手伝い</span>をします。</div>
</section>
