<?php
// 入学金0円キャンペーンセクション — コーディング版
// 再現元: lp-pc-1.webp（y1050〜2400付近）/ lp-sp-1.webp
// 写真は既存画像からの切り出し（assets/images/parts/）。
// 配置は vw 単位（PC=1920px基準 / SP=1080px基準）、文字サイズは em。
$u = get_template_directory_uri();
?>
<style>
/* ===== キャンペーン（PC: 1920px基準） ===== */
.cp { position: relative; font-family: var(--font-round); box-sizing: border-box; font-size: 1vw; }
.cp * { box-sizing: border-box; }

/* --- 上部白帯 --- */
.cp-strip { background: #fff; text-align: center; padding: 1.05em 0;
  font-size: 2.15em; font-weight: 700; color: #3a3532; letter-spacing: .04em; }
.cp-strip .sl { font-weight: 500; padding: 0 .35em; }
.cp-strip .zero { color: #ec5a96; font-weight: 800; font-size: 1.15em; padding: 0 .12em; }

/* --- 本体 --- */
.cp-body { position: relative; overflow: hidden; height: 65.4vw;
  background:
    radial-gradient(1.1em 1.1em at 12% 78%, rgba(255,255,255,.85) 30%, transparent 60%),
    radial-gradient(0.8em 0.8em at 30% 22%, rgba(255,255,255,.8) 30%, transparent 60%),
    radial-gradient(0.9em 0.9em at 55% 12%, rgba(255,255,255,.75) 30%, transparent 60%),
    radial-gradient(0.7em 0.7em at 88% 30%, rgba(255,255,255,.8) 30%, transparent 60%),
    radial-gradient(1em 1em at 70% 85%, rgba(255,255,255,.7) 30%, transparent 60%),
    linear-gradient(180deg, #fbdde9 0%, #fcd6e4 60%, #fbd9e6 100%); }

/* --- 写真（切り出し素材） --- */
.cp-photo { position: absolute; display: block; }
.cp-photo img { display: block; width: 100%; height: auto; }
.cp-nails { left: 0; top: 0; width: 24vw; z-index: 2;
  -webkit-mask-image: radial-gradient(130% 130% at 20% 15%, #000 58%, transparent 90%);
  mask-image: radial-gradient(130% 130% at 20% 15%, #000 58%, transparent 90%); }
.cp-gels { left: 6.8vw; top: 28.4vw; width: 27vw; z-index: 2;
  -webkit-mask-image: radial-gradient(100% 100% at 50% 55%, #000 55%, transparent 85%);
  mask-image: radial-gradient(100% 100% at 50% 55%, #000 55%, transparent 85%); }
.cp-teacher { right: 0; top: 0; width: 38vw; z-index: 2;
  -webkit-mask-image: linear-gradient(90deg, transparent 0, #000 10%);
  mask-image: linear-gradient(90deg, transparent 0, #000 10%); }

/* --- 吹き出し「スクール見学すると」 --- */
.cp-bubble { position: absolute; z-index: 3; left: 51vw; top: 0.8vw;
  background: #fff; border: 0.16em solid #6db1e8;
  border-radius: 48% 52% 55% 45% / 55% 48% 52% 45%;
  padding: 1.3em 1.5em 1.6em; text-align: center;
  color: #3d8ed6; font-weight: 700; font-size: 1.75em; line-height: 1.45; }
.cp-bubble::after { content: ""; position: absolute; left: 18%; bottom: -0.55em;
  width: 1em; height: 1em; background: #fff; border: 0.16em solid #6db1e8;
  border-radius: 50%; clip-path: inset(45% 0 0 0); transform: rotate(20deg); }
.cp-bubble .hb { color: #ec5a96; font-size: 1.05em; }

/* --- 期間限定バッジ --- */
.cp-limited { position: absolute; z-index: 3; left: 12.5vw; top: 18vw;
  width: 12vw; height: 12vw; background: #fff;
  border-radius: 46% 54% 50% 50% / 52% 46% 54% 48%;
  display: flex; align-items: center; justify-content: center; text-align: center;
  color: #ec5a96; font-weight: 800; }
.cp-limited::before { content: ""; position: absolute; inset: 0.45vw;
  border: 0.14vw dashed #f39dc4; border-radius: inherit; }
.cp-limited::after { content: "\2764\2764"; position: absolute; top: 0.55vw; left: 50%;
  transform: translateX(-50%); font-size: 1.1em; letter-spacing: .1em; color: #ef6da5; }
.cp-limited .tx { font-size: 2.8em; line-height: 1.3; letter-spacing: .12em; }
.cp-spark { position: absolute; z-index: 3; color: #f8c94f; }
.cp-spark::before { content: "\2726"; }

/* --- 入学金0円 --- */
.cp-main { position: absolute; z-index: 3; left: 34vw; top: 8.5vw; width: 26vw; text-align: center; }
.cp-nyugaku { font-size: 3.3em; font-weight: 800; color: #ec5a96; letter-spacing: .2em; }
.cp-zero { position: relative; display: inline-flex; align-items: flex-end; line-height: 0.95; }
.cp-zero-num { position: relative; font-weight: 800; font-size: 29em; line-height: 0.95;
  background: linear-gradient(180deg, #fde189 4%, #fbcfa0 38%, #f8b7cf 68%, #f5a5c6 100%);
  -webkit-background-clip: text; background-clip: text;
  -webkit-text-fill-color: transparent; color: transparent;
  -webkit-text-stroke: 0.017em #e94c8b;
  filter: drop-shadow(0 0 0.012em #fff) drop-shadow(0 0.01em 0.02em rgba(233,76,139,.35)); }
.cp-zero-yen { font-weight: 800; font-size: 8em; line-height: 1; margin-left: 0.06em;
  color: #fff; -webkit-text-stroke: 0.045em #e94c8b; paint-order: stroke fill;
  transform: translateY(-0.18em); }
.cp-zero-dash { position: absolute; right: -3vw; top: 2.5vw; z-index: 3; color: #d94f8c; font-size: 2.2em; }
.cp-usually { display: inline-block; margin-top: 0.3vw; background: #fff; border-radius: 999px;
  padding: 0.42em 1.3em; font-size: 2.05em; font-weight: 700; color: #4a4441; }

/* --- CTAボタン --- */
.cp-cta { position: absolute; z-index: 4; left: 18.5vw; top: 49.8vw; width: 63vw; height: 9.4vw;
  display: flex; align-items: center; justify-content: center; gap: 0.3vw;
  background: linear-gradient(135deg, #f873ac, #ec5a96);
  border-radius: 999px; text-decoration: none;
  box-shadow: 0 0.5vw 1.6vw rgba(217,80,140,0.45);
  transition: transform .12s ease, filter .15s ease; }
.cp-cta::before { content: ""; position: absolute; inset: 0.55vw;
  border: 0.14vw dashed rgba(255,255,255,0.85); border-radius: 999px; }
.cp-cta:hover { filter: brightness(1.05); }
.cp-cta:active { transform: scale(0.985); }
.cp-cta .t1 { font-size: 3.4em; font-weight: 800; letter-spacing: .08em;
  background: linear-gradient(180deg, #fff3c2 20%, #ffd960 80%);
  -webkit-background-clip: text; background-clip: text;
  -webkit-text-fill-color: transparent; color: transparent;
  filter: drop-shadow(0 0.02em 0.03em rgba(150,60,20,.25)); }
.cp-cta .t2 { font-size: 2.6em; font-weight: 800; color: #fff; letter-spacing: .06em; }
.cp-cta .ar { font-size: 2.6em; color: #fff; font-weight: 800; margin-left: 0.3vw; font-family: sans-serif; }
.cp-cta .sp1 { position: absolute; left: 4%; top: 18%; color: #fff; font-size: 1.6em; }
.cp-cta .sp1::before { content: "\2726"; }
.cp-cta .sp2 { position: absolute; left: 7.5%; bottom: 16%; color: #fff; font-size: 1.1em; }
.cp-cta .sp2::before { content: "\2726"; }

/* --- パール装飾 --- */
.cp-pearl { position: absolute; z-index: 1; border-radius: 50%;
  background: radial-gradient(circle at 35% 30%, #fff, #f3d7e4 70%, #e9bcd2);
  box-shadow: 0 0.1vw 0.3vw rgba(190,120,150,.35); }

/* ===== SP（1080px基準: font-size 2vw） ===== */
@media (max-width: 768px) {
  .cp { font-size: 2vw; }
  .cp-strip { font-size: 1.9em; padding: 1em 0; }
  .cp-body { height: 100vw;
    background:
      radial-gradient(0.9em 0.9em at 8% 70%, rgba(255,255,255,.85) 30%, transparent 60%),
      radial-gradient(0.7em 0.7em at 40% 15%, rgba(255,255,255,.8) 30%, transparent 60%),
      radial-gradient(0.8em 0.8em at 90% 45%, rgba(255,255,255,.7) 30%, transparent 60%),
      linear-gradient(180deg, #fbdde9 0%, #fcd6e4 60%, #fbd9e6 100%); }
  .cp-nails { width: 36vw; }
  .cp-gels { left: 17vw; top: 80vw; width: 30vw; }
  .cp-teacher { width: 41vw; top: 11vw; }
  .cp-bubble { left: 39.5vw; top: 1.9vw; font-size: 1.6em; padding: 1.1em 1.2em 1.4em; }
  .cp-limited { left: 3.7vw; top: 59vw; width: 19.5vw; height: 19.5vw; }
  .cp-limited .tx { font-size: 2em; }
  .cp-limited::before { inset: 0.8vw; border-width: 0.28vw; }
  .cp-limited::after { top: 1vw; font-size: 0.9em; }
  .cp-main { left: 20vw; top: 19vw; width: 40vw; }
  .cp-nyugaku { font-size: 2.6em; }
  .cp-zero-num { font-size: 22em; }
  .cp-zero-yen { font-size: 6.5em; }
  .cp-zero-dash { right: -5vw; top: 4vw; }
  .cp-usually { font-size: 1.4em; }
  .cp-cta { left: 7vw; top: 79vw; width: 79vw; height: 13.9vw; }
  .cp-cta::before { inset: 1vw; border-width: 0.28vw; }
  .cp-cta .t1 { font-size: 2.5em; }
  .cp-cta .t2 { font-size: 1.9em; }
  .cp-cta .ar { font-size: 1.9em; }
}
</style>
<section class="cp" id="campaign">
  <!-- 上部白帯 -->
  <div class="cp-strip"><span class="sl">＼</span> 今なら入学金 <span class="zero">0</span> 円キャンペーン実施中！<span class="sl">／</span></div>

  <div class="cp-body">
    <!-- 写真（仮素材: 既存画像から切り出し） -->
    <span class="cp-photo cp-nails"><img src="<?php echo $u; ?>/assets/images/parts/cp-nails.webp" alt="ニュアンスネイルの作品例" loading="lazy"></span>
    <span class="cp-photo cp-gels"><img src="<?php echo $u; ?>/assets/images/parts/cp-gels.webp" alt="カラージェルとジュエリーパーツ" loading="lazy"></span>
    <span class="cp-photo cp-teacher"><img src="<?php echo $u; ?>/assets/images/parts/cp-teacher.webp" alt="講師" loading="lazy"></span>

    <!-- 吹き出し -->
    <div class="cp-bubble">スクール<br>見学すると<span class="hb">&#10084;</span></div>

    <!-- 期間限定バッジ -->
    <div class="cp-limited"><span class="tx">期間<br>限定</span></div>
    <span class="cp-spark" style="left:10vw;top:16.5vw;font-size:1.5em;"></span>
    <span class="cp-spark" style="left:24vw;top:19vw;font-size:1.1em;"></span>

    <!-- 入学金0円 -->
    <div class="cp-main">
      <div class="cp-nyugaku">入学金</div>
      <div class="cp-zero"><span class="cp-zero-num">0</span><span class="cp-zero-yen">円</span><span class="cp-zero-dash">＼&#65372;／</span></div>
      <div class="cp-usually">【通常】33,000円</div>
    </div>

    <!-- パール -->
    <span class="cp-pearl" style="left:4vw;top:24vw;width:1.3vw;height:1.3vw;"></span>
    <span class="cp-pearl" style="left:9vw;top:33vw;width:0.9vw;height:0.9vw;"></span>
    <span class="cp-pearl" style="left:30vw;top:26.5vw;width:1vw;height:1vw;"></span>
    <span class="cp-pearl" style="left:33vw;top:44vw;width:1.2vw;height:1.2vw;"></span>

    <!-- CTA -->
    <a class="cp-cta" href="https://lin.ee/IdR5PPL" target="_blank" rel="noopener noreferrer" aria-label="無料相談はこちらから">
      <span class="sp1"></span><span class="sp2"></span>
      <span class="t1">無料相談</span><span class="t2">はこちらから！</span><span class="ar">&#8250;</span>
    </a>
  </div>
</section>
