<?php
// 入校手順（How to Join）セクション — コーディング版
// 再現元: lp-pc-2-top.webp（y2440〜3440付近）/ lp-sp-2-top.webp
// 文言は旧HTML版（git 00d4f6a）と現行画像から流用。
$u = get_template_directory_uri();
?>
<style>
/* ===== 入校手順（PC: 1920px基準） ===== */
.hj { position: relative; overflow: hidden; box-sizing: border-box; font-size: 1vw;
  font-family: var(--font-round); color: #3a3230; background: #fbdce8; }
.hj * { box-sizing: border-box; }
.hj-blob { position: absolute; pointer-events: none; z-index: 0; }
.hj-dots { position: absolute; pointer-events: none; z-index: 0;
  background-image: radial-gradient(currentColor 22%, transparent 26%); background-size: 1.3vw 1.3vw; }

/* --- ヘッダー --- */
.hj-head { position: relative; z-index: 1; text-align: center; padding-top: 2.4vw; }
.hj-script { font-family: var(--font-script); font-size: 3em;
  background: linear-gradient(95deg, #f0a63c 0%, #f0609b 40%, #7c8ce0 75%, #58b8d8 100%);
  -webkit-background-clip: text; background-clip: text;
  -webkit-text-fill-color: transparent; color: transparent; }
.hj-script .sl { -webkit-text-fill-color: #e8397f; color: #e8397f; font-family: var(--font-jp); font-size: 0.6em; padding: 0 .6em; }
.hj-title { margin: 0.4vw 0 0; font-weight: 800; font-size: 4.8em; letter-spacing: .18em; color: #2f2a28; }
.hj-title-line { display: block; width: 26vw; height: 0.6vw; margin: 0.5vw auto 0; border-radius: 999px;
  background: linear-gradient(90deg, #f088b0, #b183d8 50%, #58b8d8 100%); opacity: .85; }
.hj-deco { position: absolute; z-index: 1; pointer-events: none; }

/* --- ステップカード --- */
.hj-grid { position: relative; z-index: 1; display: flex; justify-content: center; align-items: stretch;
  gap: 1.1vw; max-width: 96vw; margin: 3vw auto 0; }
.hj-card { position: relative; background: #fff; border-radius: 1.1vw; width: 19.2vw;
  padding: 3.4vw 1.4vw 1.8vw; text-align: center; border: 0.14vw solid; }
.hj-arrow { align-self: center; width: 0; height: 0; flex: 0 0 auto;
  border-top: 0.85vw solid transparent; border-bottom: 0.85vw solid transparent;
  border-left: 1.05vw solid #f088b0; }
.hj-num { position: absolute; top: -1.5vw; left: 50%; transform: translateX(-50%);
  width: 3.1vw; height: 3.1vw; border-radius: 50%; color: #fff;
  display: flex; align-items: center; justify-content: center;
  font-weight: 800; font-size: 1.7em; box-shadow: 0 0.2vw 0.5vw rgba(160,110,130,0.3); }
.hj-ic { display: block; margin: 0 auto; }
.hj-ic img { display: block; width: 9.5vw; height: auto; margin: 0 auto; }
.hj-t { margin: 1vw 0 0; font-weight: 800; font-size: 1.75em; letter-spacing: .08em;
  display: inline-block; padding-bottom: 0.3em; background-size: 100% 0.12em;
  background-position: 50% 100%; background-repeat: no-repeat; }
.hj-tx { margin: 0.7vw 0 0; font-family: var(--font-jp); font-weight: 600; font-size: 1.3em;
  line-height: 2; text-align: center; }
.hj-tx .p { color: #e8397f; }
/* ステップごとの配色 */
.hj-s1 { border-color: #f4a7c4; } .hj-s1 .hj-num { background: #e8397f; }
.hj-s1 .hj-t { background-image: radial-gradient(circle at 0.12em 50%, #e8397f 0.07em, transparent 0.09em); background-size: 0.4em 0.12em; background-repeat: repeat-x; }
.hj-s2 { border-color: #f5c98a; } .hj-s2 .hj-num { background: #f0912c; }
.hj-s2 .hj-t { background-image: linear-gradient(90deg, #ffe14d, #ffd24d); background-size: 100% 0.16em; }
.hj-s3 { border-color: #8ed4cc; } .hj-s3 .hj-num { background: #2fae9f; }
.hj-s3 .hj-t { background-image: radial-gradient(circle at 0.12em 50%, #2fae9f 0.07em, transparent 0.09em); background-size: 0.4em 0.12em; background-repeat: repeat-x; }
.hj-s4 { border-color: #c8b2ec; } .hj-s4 .hj-num { background: #9270d2; }
.hj-s4 .hj-t { background-image: radial-gradient(circle at 0.12em 50%, #9270d2 0.07em, transparent 0.09em); background-size: 0.4em 0.12em; background-repeat: repeat-x; }

/* --- First Step バー --- */
.hj-first { position: relative; z-index: 1; max-width: 88vw; margin: 2.6vw auto 0;
  background: #fff; border-radius: 1.4vw; padding: 1.6vw 2.4vw 1.4vw;
  border: 0.18vw solid transparent;
  background-image: linear-gradient(#fff, #fff), linear-gradient(90deg, #f0609b, #8f6fe0 55%, #46a8e0 100%);
  background-origin: border-box; background-clip: padding-box, border-box;
  margin-bottom: 3vw; }
.hj-first-row { display: flex; align-items: center; justify-content: center; gap: 1.6vw; flex-wrap: wrap; }
.hj-first-script { font-family: var(--font-script); font-size: 2.5em;
  background: linear-gradient(95deg, #f0a63c, #f0609b 50%, #8f6fe0 100%);
  -webkit-background-clip: text; background-clip: text;
  -webkit-text-fill-color: transparent; color: transparent; white-space: nowrap; }
.hj-first-tx { font-family: var(--font-jp); font-weight: 600; font-size: 1.5em; }
.hj-first-tx .p { color: #e8397f; }
.hj-first-btn { display: inline-flex; align-items: center; gap: 0.8vw;
  color: #fff; font-weight: 800; font-size: 1.8em; letter-spacing: .06em;
  padding: 0.65em 1.5em; border-radius: 999px; text-decoration: none; line-height: 1.3;
  background: linear-gradient(90deg, #f0609b, #8f6fe0 55%, #46a8e0 100%);
  box-shadow: 0 0.3vw 1vw rgba(180,100,160,0.35);
  transition: transform .12s ease, filter .15s ease; }
.hj-first-btn:hover { filter: brightness(1.06); }
.hj-first-btn:active { transform: scale(0.98); }
.hj-first-btn .ar { font-family: sans-serif; }
.hj-first-note { margin-top: 0.9vw; text-align: center; font-family: var(--font-jp);
  font-weight: 600; font-size: 1.35em; color: #3a3230;
  display: flex; align-items: center; justify-content: center; gap: 0.6vw; }
.hj-first-note .line-ic { display: inline-flex; align-items: center; justify-content: center;
  width: 1.7em; height: 1.7em; border-radius: 0.4em; background: #06c755; color: #fff;
  font-weight: 800; font-size: 0.55em; letter-spacing: 0; }
.hj-first-note .p { color: #e8397f; }

/* ===== SP（1080px基準: font-size 2vw） ===== */
@media (max-width: 768px) {
  .hj { font-size: 2vw; }
  .hj-head { padding-top: 5vw; }
  .hj-script { font-size: 2.4em; }
  .hj-title { font-size: 3.8em; }
  .hj-title-line { width: 44vw; height: 1vw; }
  .hj-grid { flex-direction: column; align-items: center; gap: 3vw; margin-top: 5vw; }
  .hj-card { width: 80vw; padding: 6vw 4vw 4vw;
    display: grid; grid-template-columns: 20vw 1fr; gap: 0 3vw; align-items: center; text-align: left; }
  .hj-arrow { transform: rotate(90deg); }
  .hj-num { top: -2.5vw; left: 2vw; transform: none; width: 5.5vw; height: 5.5vw; font-size: 1.6em; }
  .hj-ic { grid-row: 1 / 3; }
  .hj-ic img { width: 18vw; }
  .hj-t { margin: 0; font-size: 1.9em; justify-self: start; }
  .hj-tx { text-align: left; margin-top: 1vw; font-size: 1.45em; }
  .hj-first { max-width: 92vw; padding: 3.5vw 4vw; border-radius: 2.4vw; margin-top: 5vw; margin-bottom: 6vw; }
  .hj-first-row { gap: 1.5vw; }
  .hj-first-script { font-size: 2.2em; }
  .hj-first-tx { font-size: 1.4em; }
  .hj-first-btn { font-size: 1.7em; }
  .hj-first-note { font-size: 1.35em; }
}
</style>
<section class="hj" id="steps">
  <!-- 背景装飾 -->
  <span class="hj-blob" style="left:-5vw;top:-4vw;width:16vw;height:12vw;background:#f7c4d8;border-radius:50% 50% 45% 55%/55% 45% 55% 45%;"></span>
  <span class="hj-dots" style="left:2vw;top:6vw;width:8vw;height:5vw;color:#f3a9c6;"></span>
  <span class="hj-blob" style="right:-5vw;top:-4vw;width:15vw;height:11vw;background:#e3d0f2;border-radius:45% 55% 50% 50%/50% 55% 45% 55%;"></span>
  <span class="hj-dots" style="right:3vw;top:5vw;width:7vw;height:4.5vw;color:#c9aee6;"></span>
  <span class="hj-blob" style="left:-4vw;bottom:-4vw;width:13vw;height:10vw;background:#f7c4d8;border-radius:52% 48% 47% 53%/55% 52% 48% 45%;"></span>
  <span class="hj-blob" style="right:-4vw;bottom:-5vw;width:14vw;height:11vw;background:#f9d4a8;border-radius:48% 52% 55% 45%/52% 48% 50% 50%;"></span>
  <span class="hj-dots" style="right:5vw;bottom:4vw;width:7vw;height:4.5vw;color:#f0b988;"></span>

  <!-- ヘッダー -->
  <div class="hj-head">
    <span class="hj-deco" style="left:30vw;top:6vw;color:#ef4d86;font-size:2.6em;transform:rotate(-14deg);">&#9829;</span>
    <span class="hj-deco" style="left:24vw;top:9vw;color:#f2c94c;font-size:1.6em;">&#10022;</span>
    <span class="hj-deco" style="right:29vw;top:5.5vw;color:#ef7fae;font-size:2em;transform:rotate(12deg);">&#9829;</span>
    <span class="hj-deco" style="right:23vw;top:7vw;color:#f2c443;font-size:2.2em;">&#9734;</span>
    <span class="hj-deco" style="right:18vw;top:10vw;color:#a98ce4;font-size:1.4em;">&#9679;</span>
    <div class="hj-script"><span class="sl">＝</span>How to Join<span class="sl">＝</span></div>
    <h2 class="hj-title">入校手順</h2>
    <span class="hj-title-line"></span>
  </div>

  <!-- ステップ -->
  <div class="hj-grid">
    <div class="hj-card hj-s1">
      <span class="hj-num">1</span>
      <span class="hj-ic"><img src="<?php echo $u; ?>/assets/images/parts/hj-ic1.webp" alt="" loading="lazy"></span>
      <div><h3 class="hj-t">お問い合わせ</h3></div>
      <p class="hj-tx">公式<span class="p">LINE</span>から<br>お気軽にご連絡ください。</p>
    </div>
    <span class="hj-arrow"></span>
    <div class="hj-card hj-s2">
      <span class="hj-num">2</span>
      <span class="hj-ic"><img src="<?php echo $u; ?>/assets/images/parts/hj-ic2.webp" alt="" loading="lazy"></span>
      <div><h3 class="hj-t">無料LINE相談する</h3></div>
      <p class="hj-tx">スクールの雰囲気を<span class="p">見学</span>し、<br>コースの<span class="p">相談</span>をします。</p>
    </div>
    <span class="hj-arrow"></span>
    <div class="hj-card hj-s3">
      <span class="hj-num">3</span>
      <span class="hj-ic"><img src="<?php echo $u; ?>/assets/images/parts/hj-ic3.webp" alt="" loading="lazy"></span>
      <div><h3 class="hj-t">入校手続き</h3></div>
      <p class="hj-tx">申し込み用紙への記入と、<br>授業料の<span class="p">お支払い</span>。</p>
    </div>
    <span class="hj-arrow"></span>
    <div class="hj-card hj-s4">
      <span class="hj-num">4</span>
      <span class="hj-ic"><img src="<?php echo $u; ?>/assets/images/parts/hj-ic4.webp" alt="" loading="lazy"></span>
      <div><h3 class="hj-t">レッスン開始</h3></div>
      <p class="hj-tx">教材を受け取り、<br>いよいよネイリストへの<span class="p">第一歩！</span></p>
    </div>
  </div>

  <!-- First Step バー -->
  <div class="hj-first">
    <div class="hj-first-row">
      <span class="hj-first-script">First Step !</span>
      <span class="hj-first-tx">まずは<span class="p">無料カウンセリング・見学</span>へお越しください。</span>
      <a class="hj-first-btn" href="https://lin.ee/IdR5PPL" target="_blank" rel="noopener noreferrer">無料カウンセリング・見学を予約する<span class="ar">&#8250;</span></a>
    </div>
    <div class="hj-first-note"><span class="line-ic">LINE</span>※公式<span class="p">LINE</span> 24時間受付中！</div>
  </div>
</section>
