<?php
// 入校手順（How to Join）セクション — コーディング版
// 寸法はデザインカンプ（全幅=100vw基準）から採寸した値
// アイコン素材: flow1〜4.png（1024×1536の余白入り透過PNG）
$u = get_template_directory_uri();
?>
<style>
/* ===== 入校手順（PC: font-size 1vw = 1em として全サイズを vw 換算） ===== */
.hj { position: relative; overflow: hidden; box-sizing: border-box; font-size: 1vw;
  font-family: var(--font-round); color: #3a3230;
  background: #fbdce8 url('<?php echo $u; ?>/assets/images/flow_bg_pc.png') center / cover no-repeat; }
.hj * { box-sizing: border-box; }
.hj-blob { position: absolute; pointer-events: none; z-index: 0; }
.hj-dots { position: absolute; pointer-events: none; z-index: 0;
  background-image: radial-gradient(currentColor 22%, transparent 26%); background-size: 1.3vw 1.3vw; }

/* --- ヘッダー --- */
.hj-head { position: relative; z-index: 1; text-align: center; padding-top: 1.1vw; }
.hj-script { display: flex; align-items: center; justify-content: center; gap: 0.9em;
  font-family: var(--font-script); font-size: 4.2em; line-height: 1.15;
  background: linear-gradient(95deg, #f0a63c 0%, #f0609b 40%, #7c8ce0 75%, #58b8d8 100%);
  -webkit-background-clip: text; background-clip: text;
  -webkit-text-fill-color: transparent; color: transparent; }
/* 見出し脇の3本線 */
.hj-slash { flex: 0 0 auto; width: 0.32em; height: 0.5em; color: #ef5f96;
  -webkit-text-fill-color: initial;
  background:
    linear-gradient(currentColor, currentColor) 0 0    / 0.3em 0.07em no-repeat,
    linear-gradient(currentColor, currentColor) 0 50%  / 0.3em 0.07em no-repeat,
    linear-gradient(currentColor, currentColor) 0 100% / 0.3em 0.07em no-repeat;
  transform: rotate(-32deg); }
.hj-slash.r { transform: scaleX(-1) rotate(-32deg); }
.hj-title { margin: 0.5vw 0 0; font-weight: 800; font-size: 5em; letter-spacing: .05em;
  padding-left: .05em; line-height: 1.15; color: #3a2b26; }
.hj-title-line { display: block; width: 32vw; height: 0.9vw; margin: 0.5vw auto 0; border-radius: 999px;
  background: linear-gradient(90deg, #f088b0, #b183d8 50%, #58b8d8 100%); opacity: .9; }
.hj-deco { position: absolute; z-index: 1; pointer-events: none; }

/* --- ステップカード --- */
.hj-grid { position: relative; z-index: 1; display: flex; justify-content: center; align-items: stretch;
  gap: 0.5vw; max-width: 94vw; margin: 1.9vw auto 0; }
.hj-card { position: relative; background: #fff; border-radius: 1.4vw; width: 21.9vw; min-height: 23.7vw;
  padding: 2.6vw 2.3vw 1.5vw; border: 0.12vw solid; }
.hj-arrow { align-self: center; width: 0; height: 0; flex: 0 0 auto;
  border-top: 0.75vw solid transparent; border-bottom: 0.75vw solid transparent;
  border-left: 0.95vw solid #f27fae; }
.hj-num { position: absolute; top: -1.4vw; left: 50%; transform: translateX(-50%);
  width: 3.9vw; height: 3.9vw; border-radius: 50%; color: #fff;
  display: flex; align-items: center; justify-content: center;
  font-weight: 800; font-size: 2.4em; line-height: 1;
  box-shadow: 0 0.2vw 0.5vw rgba(160,110,130,0.28); }
/* アイコン素材(flow*.png)自体に細い円が描かれているので、CSS側でリングは引かない
   （引くと二重丸になる）。--icsz が素材の円の直径になるよう --sw/--tx/--ty を調整済み */
.hj-ring { display: block; position: relative; width: 10.6vw; height: 10.6vw; margin: 0 auto;
  --icsz: 10.6vw; }
.hj-ring img { position: absolute; left: 50%; top: 50%; height: auto;
  width: calc(var(--icsz) * var(--sw));
  transform: translate(-50%, -50%)
             translate(calc(var(--icsz) * var(--tx)), calc(var(--icsz) * var(--ty))); }
.hj-i1 { --sw: 1.513; --tx: -0.002; --ty: 0.070; }
.hj-i2 { --sw: 1.939; --tx:  0.001; --ty: 0.083; }
.hj-i3 { --sw: 1.517; --tx: -0.004; --ty: 0.070; }
.hj-i4 { --sw: 1.533; --tx: -0.002; --ty: 0.082; }
/* タイトルは下半分に蛍光ペン。区切りは別に点線で引く */
.hj-t { margin: 1.1vw 0 0; text-align: center; font-weight: 800; font-size: 2em;
  letter-spacing: .02em; line-height: 1.35; white-space: nowrap; }
/* 02 は文字数が多いので少し小さく（デザイン準拠） */
.hj-s2 .hj-t { font-size: 1.78em; }
.hj-t span { padding: 0 0.25em 0.12em; }
.hj-dot { display: block; width: 100%; height: 0.13vw; margin: 0.85vw 0 0;
  background-repeat: repeat-x; background-size: 0.5vw 0.13vw;
  background-image: radial-gradient(circle at 0.065vw 50%, currentColor 0.065vw, transparent 0.07vw); }
.hj-tx { margin: 0.9vw 0 0; font-family: var(--font-jp); font-weight: 600; font-size: 1.22em;
  line-height: 1.85; text-align: left; }
/* 04 は1行の文字数が多いので少し小さく（デザイン準拠） */
.hj-s4 .hj-tx { font-size: 1.1em; }
.hj-tx .p { font-weight: 700; }

/* ステップごとの配色 */
.hj-s1 { border-color: #f4a7c4; }
.hj-s1 .hj-num { background: #e8397f; }
.hj-s1 .hj-dot { color: #f288b3; }
.hj-s1 .hj-t span { background: linear-gradient(transparent 58%, #ffeaa0 58% 96%, transparent 96%); }
.hj-s1 .hj-tx .p { color: #e8397f; }
.hj-s2 { border-color: #f5c98a; }
.hj-s2 .hj-num { background: #f0912c; }
.hj-s2 .hj-dot { color: #f3b566; }
.hj-s2 .hj-t span { background: linear-gradient(transparent 58%, #ffeaa0 58% 96%, transparent 96%); }
.hj-s2 .hj-tx .p { color: #e8397f; }
.hj-s3 { border-color: #8ed4cc; }
.hj-s3 .hj-num { background: #2fae9f; }
.hj-s3 .hj-dot { color: #6bc7bd; }
.hj-s3 .hj-t span { background: linear-gradient(transparent 58%, #b8ecec 58% 96%, transparent 96%); }
.hj-s3 .hj-tx .p { color: #2fae9f; }
.hj-s4 { border-color: #c8b2ec; }
.hj-s4 .hj-num { background: #9270d2; }
.hj-s4 .hj-dot { color: #b195e2; }
.hj-s4 .hj-t span { background: linear-gradient(transparent 58%, #ffeaa0 58% 96%, transparent 96%); }
.hj-s4 .hj-tx .p { color: #e8397f; }

/* --- First Step バー --- */
.hj-first { position: relative; z-index: 1; max-width: 88.4vw; margin: 2.2vw auto 2.6vw;
  background: #fff; border-radius: 1.6vw; padding: 1.2vw 2vw 1vw;
  border: 0.16vw solid transparent;
  background-image: linear-gradient(#fff, #fff), linear-gradient(90deg, #f0609b, #8f6fe0 55%, #46a8e0 100%);
  background-origin: border-box; background-clip: padding-box, border-box; }
.hj-first-row { display: flex; align-items: center; justify-content: center; gap: 1.4vw; }
.hj-first-script { font-family: var(--font-script); font-size: 2.6em; line-height: 1.2;
  background: linear-gradient(95deg, #f0a63c, #f0609b 50%, #8f6fe0 100%);
  -webkit-background-clip: text; background-clip: text;
  -webkit-text-fill-color: transparent; color: transparent; white-space: nowrap; }
.hj-first-tx { font-family: var(--font-jp); font-weight: 600; font-size: 1.38em; white-space: nowrap; }
.hj-first-tx .p { color: #e8397f; }
.hj-first-btn { display: inline-flex; align-items: center; justify-content: center; gap: 1vw;
  height: 4.8vw; color: #fff; font-weight: 800; font-size: 1.86em; letter-spacing: .04em;
  padding: 0 2.4vw; border-radius: 999px; text-decoration: none; line-height: 1.3; white-space: nowrap;
  background: linear-gradient(90deg, #f0609b, #8f6fe0 55%, #46a8e0 100%);
  box-shadow: 0 0.3vw 1vw rgba(180,100,160,0.32);
  transition: transform .12s ease, filter .15s ease; }
.hj-first-btn:hover { filter: brightness(1.06); }
.hj-first-btn:active { transform: scale(0.98); }
.hj-first-btn .ar { font-family: sans-serif; }
.hj-first-note { margin-top: 0.7vw; text-align: center; font-family: var(--font-jp);
  font-weight: 600; font-size: 1.53em; color: #3a3230;
  display: flex; align-items: center; justify-content: center; gap: 0.5vw; }
.hj-first-note .line-ic { display: inline-flex; align-items: center; justify-content: center;
  width: 1.9em; height: 1.9em; border-radius: 0.45em; background: #06c755; color: #fff;
  font-weight: 800; font-size: 0.55em; letter-spacing: 0; }
.hj-first-note .p { color: #e8397f; }

/* ===== SP（全幅=100vw基準: font-size 2vw = 1em） ===== */
@media (max-width: 768px) {
  .hj { font-size: 2vw;
    background-image: url('<?php echo $u; ?>/assets/images/flow_bg_sp.png'); }
  .hj-head { padding-top: 3vw; }
  .hj-script { font-size: 3.4em; gap: 0.7em; }
  .hj-title { font-size: 4.6em; }
  .hj-title-line { width: 46vw; height: 1.3vw; }
  .hj-grid { flex-direction: column; align-items: center; gap: 1.6vw; margin-top: 3vw; }
  /* SPは[アイコン][テキスト]の横並び。ナンバーは左上角にまたがる */
  .hj-card { width: 90vw; min-height: 22.8vw; border-radius: 2.4vw; border-width: 0.25vw;
    padding: 1.6vw 2vw 1.6vw 10.1vw;
    display: grid; grid-template-columns: 19.1vw minmax(0, 1fr); column-gap: 4.5vw;
    align-content: center; }
  .hj-arrow { transform: rotate(90deg); border-top-width: 1.1vw; border-bottom-width: 1.1vw;
    border-left-width: 1.4vw; }
  .hj-num { top: -1.6vw; left: 2.9vw; transform: none; width: 9.1vw; height: 9.1vw; font-size: 2.5em; }
  .hj-ring { grid-row: 1 / 3; align-self: center; width: 19.1vw; height: 19.1vw;
    --icsz: 19.1vw; }
  .hj-t { margin: 0; text-align: left; font-size: 2.2em; }
  .hj-dot { width: 82%; height: 0.3vw; margin-top: 1.2vw;
    background-size: 1.1vw 0.3vw;
    background-image: radial-gradient(circle at 0.15vw 50%, currentColor 0.15vw, transparent 0.17vw); }
  .hj-tx { margin-top: 1.4vw; font-size: 1.2em; line-height: 1.7; }
  .hj-tx .sp-none { display: none; }

  .hj-first { max-width: 92vw; padding: 3vw 3vw 2.5vw; border-radius: 3vw;
    margin: 4vw auto 5vw; border-width: 0.3vw; }
  .hj-first-row { flex-direction: column; gap: 1vw; }
  .hj-first-script { font-size: 2.4em; }
  .hj-first-tx { font-size: 1.35em; }
  .hj-first-btn { height: 8.4vw; font-size: 1.8em; padding: 0 3vw; gap: 2vw; }
  .hj-first-note { font-size: 1.35em; margin-top: 1.4vw; }
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
    <span class="hj-deco" style="left:29vw;top:5.5vw;color:#ef4d86;font-size:2.4em;transform:rotate(-14deg);">&#9829;</span>
    <span class="hj-deco" style="left:23vw;top:8.5vw;color:#f2c94c;font-size:1.6em;">&#10022;</span>
    <span class="hj-deco" style="right:28vw;top:5vw;color:#ef7fae;font-size:1.9em;transform:rotate(12deg);">&#9829;</span>
    <span class="hj-deco" style="right:22vw;top:6.5vw;color:#f2c443;font-size:2.1em;">&#9734;</span>
    <span class="hj-deco" style="right:17vw;top:9.5vw;color:#a98ce4;font-size:1.3em;">&#9679;</span>
    <div class="hj-script"><span class="hj-slash"></span>How to Join<span class="hj-slash r"></span></div>
    <h2 class="hj-title">入校手順</h2>
    <span class="hj-title-line"></span>
  </div>

  <!-- ステップ -->
  <div class="hj-grid">
    <div class="hj-card hj-s1">
      <span class="hj-num">1</span>
      <span class="hj-ring hj-i1"><img src="<?php echo $u; ?>/assets/images/flow1.png" alt="" loading="lazy" decoding="async"></span>
      <div>
        <h3 class="hj-t"><span>お問い合わせ</span></h3>
        <span class="hj-dot"></span>
        <p class="hj-tx">公式<span class="p">LINE</span>から<br class="sp-none">お気軽にご連絡ください。</p>
      </div>
    </div>
    <span class="hj-arrow"></span>
    <div class="hj-card hj-s2">
      <span class="hj-num">2</span>
      <span class="hj-ring hj-i2"><img src="<?php echo $u; ?>/assets/images/flow2.png" alt="" loading="lazy" decoding="async"></span>
      <div>
        <h3 class="hj-t"><span>無料LINE相談する</span></h3>
        <span class="hj-dot"></span>
        <p class="hj-tx">スクールの雰囲気を<span class="p">見学</span>し、<br>コースの<span class="p">相談</span>をします。</p>
      </div>
    </div>
    <span class="hj-arrow"></span>
    <div class="hj-card hj-s3">
      <span class="hj-num">3</span>
      <span class="hj-ring hj-i3"><img src="<?php echo $u; ?>/assets/images/flow3.png" alt="" loading="lazy" decoding="async"></span>
      <div>
        <h3 class="hj-t"><span>入校手続き</span></h3>
        <span class="hj-dot"></span>
        <p class="hj-tx">申し込み用紙への記入と、<br>授業料の<span class="p">お支払い</span>。</p>
      </div>
    </div>
    <span class="hj-arrow"></span>
    <div class="hj-card hj-s4">
      <span class="hj-num">4</span>
      <span class="hj-ring hj-i4"><img src="<?php echo $u; ?>/assets/images/flow4.png" alt="" loading="lazy" decoding="async"></span>
      <div>
        <h3 class="hj-t"><span>レッスン開始</span></h3>
        <span class="hj-dot"></span>
        <p class="hj-tx">教材を受け取り、<br>いよいよネイリストへの<span class="p">第一歩！</span></p>
      </div>
    </div>
  </div>

  <!-- First Step バー -->
  <div class="hj-first">
    <div class="hj-first-row">
      <span class="hj-first-script">First Step !</span>
      <span class="hj-first-tx">まずは<span class="p">無料カウンセリング・見学</span>へお越しください。</span>
      <a class="hj-first-btn" href="https://lin.ee/IdR5PPL" target="_blank" rel="noopener noreferrer">無料カウンセリング・見学を予約する</a>
    </div>
    <div class="hj-first-note">※公式<span class="p">LINE</span> 24時間受付中！</div>
  </div>
</section>
