<?php
// 入学金0円キャンペーンセクション — コーディング版
// 再現元: 支給デザイン（PC=1920px幅 / SP=1080px幅）のバナー部分を実測して配置。
// 写真・背景は支給素材（assets/images/banner_*）。切り抜きは透過PNGのためマスク不要。
// 配置は vw 単位（PC: 1vw=19.2デザインpx / SP: 1vw=10.8デザインpx）。
// font-size: 1vw を基準にしているので 1em = 1vw。PC・SPそれぞれ実測値をemで直書きする。
$u = get_template_directory_uri();
?>
<style>
/* ===== キャンペーン（PC: 1920px基準 / 1vw = 19.2px） ===== */
.cp { position: relative; font-family: var(--font-round); box-sizing: border-box; font-size: 1vw; }
.cp * { box-sizing: border-box; }

/* --- 上部白帯（デザイン実測: 高さ84px / 文字48px） --- */
.cp-strip { background: #fff; text-align: center;
  font-size: 2.5em; line-height: 1.2; padding: 0.28em 0;
  font-weight: 700; color: #3a3532; letter-spacing: .04em; }
.cp-strip .sl { font-weight: 500; padding: 0 .4em; }
/* 大きい「0」で行の高さが増えないよう line-height を固定 */
.cp-strip .zero { color: #ec5a96; font-weight: 800; font-size: 1.2em; line-height: 1; padding: 0 .14em; }

/* --- 本体（デザイン実測: 1920×1185px） --- */
.cp-body { position: relative; overflow: hidden; height: 61.7vw;
  background: #fbdde9 url('<?php echo $u; ?>/assets/images/banner_bg_pc.png') center / cover no-repeat; }

/* --- 写真（支給素材: 透過PNG切り抜き） --- */
.cp-photo { position: absolute; display: block; }
.cp-photo img { display: block; width: 100%; height: auto; }
.cp-nails { left: -1.5vw; top: -5.8vw; width: 30vw; z-index: 2; }
.cp-gels { left: 0; top: 25.5vw; width: 26vw; z-index: 2; }
.cp-teacher { right: -2.5vw; top: 2vw; width: 50vw; z-index: 2; }

/* --- 吹き出し「スクール見学すると」（支給素材） --- */
.cp-bubble { position: absolute; z-index: 3; left: 55vw; top: -3.3vw; width: 24.4vw; }
.cp-bubble img { display: block; width: 100%; height: auto; }

/* --- 期間限定バッジ（支給素材） --- */
.cp-limited { position: absolute; z-index: 3; left: 10.6vw; top: 15.4vw; width: 20vw; }
.cp-limited img { display: block; width: 100%; height: auto; }
.cp-spark { position: absolute; z-index: 3; color: #f8c94f; }
.cp-spark::before { content: "\2726"; }

/* --- 入学金0円（支給素材） --- */
.cp-main { position: absolute; z-index: 3; left: 20vw; top: 4.1vw; width: 48vw; }
.cp-main img { display: block; width: 100%; height: auto; }

/* --- 【通常】33,000円（白ピル） --- */
.cp-usually { position: absolute; z-index: 4; left: 38.8vw; top: 44.6vw;
  background: #fff; border-radius: 999px; padding: 0.2em 0.45em;
  font-size: 2.45em; line-height: 1.2; font-weight: 700; color: #2f2b29; white-space: nowrap; }

/* --- CTAボタン（デザイン実測: 1270×178px） --- */
.cp-cta { position: absolute; z-index: 4; left: 16.7vw; top: 50.6vw; width: 66vw; height: 9.27vw;
  display: flex; align-items: center; justify-content: center;
  background: linear-gradient(180deg, #ea7599 0%, #e1517d 55%, #d93f6e 100%);
  border-radius: 999px; text-decoration: none;
  box-shadow: 0 0 0 0.35vw rgba(255,255,255,0.6), 0 0.5vw 1.5vw rgba(200,60,105,0.35);
  transition: transform .12s ease, filter .15s ease; }
.cp-cta::before { content: ""; position: absolute; inset: 0.62vw;
  border: 0.26vw dotted rgba(255,255,255,0.9); border-radius: 999px; }
.cp-cta:hover { filter: brightness(1.05); }
.cp-cta:active { transform: scale(0.985); }
.cp-cta .t1 { font-size: 5.5em; font-weight: 800; letter-spacing: .08em;
  background: linear-gradient(180deg, #fffbe8 15%, #ffe07a 85%);
  -webkit-background-clip: text; background-clip: text;
  -webkit-text-fill-color: transparent; color: transparent;
  filter: drop-shadow(0 0.02em 0.04em rgba(150,45,20,.3)); }
.cp-cta .t2 { font-size: 3.65em; font-weight: 800; color: #fff; letter-spacing: .04em; }
.cp-cta .ar { position: absolute; right: 3.4vw; top: 50%; transform: translateY(-50%);
  font-size: 3.4em; color: #fff; font-weight: 400; font-family: sans-serif; }
.cp-cta .sp1 { position: absolute; left: 4.5%; top: 30%; color: #fff; font-size: 2.6em; }
.cp-cta .sp1::before { content: "\2726"; }
.cp-cta .sp2 { position: absolute; left: 8.6%; top: 54%; color: #fff; font-size: 1.4em; }
.cp-cta .sp2::before { content: "\2726"; }

/* --- パール装飾 --- */
.cp-pearl { position: absolute; z-index: 1; border-radius: 50%;
  background: radial-gradient(circle at 35% 30%, #fff, #f3d7e4 70%, #e9bcd2);
  box-shadow: 0 0.1vw 0.3vw rgba(190,120,150,.35); }

/* ===== SP（1080px基準 / 1vw = 10.8px） ===== */
@media (max-width: 768px) {
  .cp-strip { font-size: 3.1em; padding: 0.7em 0; }
  .cp-strip .zero { font-size: 1.25em; }
  .cp-body { height: 94vw;
    background-image: url('<?php echo $u; ?>/assets/images/banner_bg_sp.png'); }
  .cp-nails { left: -2.4vw; top: -4.6vw; width: 32vw; }
  .cp-gels { top: 61vw; width: 31.6vw; }
  .cp-teacher { right: -3vw; top: 10vw; width: 70vw; }
  .cp-bubble { left: 34.4vw; top: -4.6vw; width: 34vw; }
  .cp-limited { left: -4.4vw; top: 39.9vw; width: 39vw; }
  .cp-main { left: 13.4vw; top: 15.6vw; width: 48vw; }
  .cp-usually { left: 26.9vw; top: 57vw; font-size: 3.9em; }
  .cp-cta { left: 13.8vw; top: 79.8vw; width: 74.7vw; height: 12.1vw;
    box-shadow: 0 0 0 0.5vw rgba(255,255,255,0.6), 0 0.8vw 2vw rgba(200,60,105,0.35); }
  .cp-cta::before { inset: 0.9vw; border-width: 0.38vw; }
  .cp-cta .t1 { font-size: 7.4em; }
  .cp-cta .t2 { font-size: 4.25em; }
  .cp-cta .ar { right: 1.8vw; font-size: 4em; }
  .cp-cta .sp1 { font-size: 3em; left: 4%; top: 28%; }
  .cp-cta .sp2 { font-size: 1.7em; left: 8.5%; top: 56%; }
}
</style>
<section class="cp" id="campaign">
  <!-- 上部白帯 -->
  <div class="cp-strip"><span class="sl">＼</span> 今なら入学金 <span class="zero">0</span> 円キャンペーン実施中！<span class="sl">／</span></div>

  <div class="cp-body">
    <!-- 写真（支給素材） -->
    <span class="cp-photo cp-gels"><img src="<?php echo $u; ?>/assets/images/banner_powder.png" alt="カラージェルとジュエリーパーツ" loading="lazy"></span>
    <span class="cp-photo cp-teacher"><img src="<?php echo $u; ?>/assets/images/banner_person.png" alt="講師" loading="lazy"></span>

    <!-- 吹き出し -->
    <span class="cp-bubble"><img src="<?php echo $u; ?>/assets/images/banner_bubble1.png" alt="スクール見学すると" loading="lazy"></span>

    <!-- 期間限定バッジ -->
    <span class="cp-limited"><img src="<?php echo $u; ?>/assets/images/banner_bubble2.png" alt="期間限定" loading="lazy"></span>
    <span class="cp-spark" style="left:9vw;top:16.8vw;font-size:1.5em;"></span>
    <span class="cp-spark" style="left:26.5vw;top:21vw;font-size:1.1em;"></span>

    <!-- 入学金0円 -->
    <div class="cp-main">
      <img src="<?php echo $u; ?>/assets/images/banner_fee.png" alt="入学金0円" loading="lazy">
    </div>
    <div class="cp-usually">【通常】33,000円</div>

    <!-- パール -->
    <span class="cp-pearl" style="left:3vw;top:23vw;width:1.3vw;height:1.3vw;"></span>
    <span class="cp-pearl" style="left:8vw;top:32vw;width:0.9vw;height:0.9vw;"></span>
    <span class="cp-pearl" style="left:2vw;top:45vw;width:1vw;height:1vw;"></span>
    <span class="cp-pearl" style="left:6.5vw;top:50vw;width:1.2vw;height:1.2vw;"></span>

    <!-- CTA -->
    <a class="cp-cta" href="https://lin.ee/IdR5PPL" target="_blank" rel="noopener noreferrer" aria-label="無料相談はこちらから">
      <span class="sp1"></span><span class="sp2"></span>
      <span class="t1">無料相談</span><span class="t2">はこちらから！</span>
    </a>
  </div>
</section>
