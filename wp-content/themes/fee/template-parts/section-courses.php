<?php
// コース内容（Choose Your Path）セクション — コーディング版
// 寸法はデザインカンプ（全幅=100vw基準）から採寸した値
// ヘッダー左右の素材: corse_left.png / corse_right.png（余白入り透過PNG）
$u = get_template_directory_uri();
?>
<style>
/* ===== コース内容（PC: font-size 1vw = 1em として全サイズを vw 換算） ===== */
.co { position: relative; overflow: hidden; box-sizing: border-box; font-size: 1vw;
  font-family: var(--font-jp); color: #3a3230;
  background: #fffdfc url('<?php echo $u; ?>/assets/images/corse_bg_pc.png') center / cover no-repeat; }
.co * { box-sizing: border-box; }
.co-wc { position: absolute; pointer-events: none; filter: blur(1.2vw); opacity: .5; z-index: 0; }

/* --- ヘッダー --- */
.co-head { position: relative; z-index: 1; text-align: center; padding-top: 1.3vw; min-height: 19.6vw; }
/* 支給素材は余白の大きい透過PNGなので、絵柄の外接矩形が枠と一致するよう拡大・中心合わせする */
.co-head-photo { position: absolute; top: 0; z-index: 0; display: block; }
.co-head-photo img { position: absolute; left: 50%; top: 50%; height: auto;
  width: calc(var(--base) * var(--sw));
  transform: translate(-50%, -50%)
             translate(calc(var(--base) * var(--tx)), calc(var(--base) * var(--ty))); }
.co-head-l { left: 1vw; top: 0.5vw; width: 13.5vw; height: 18.6vw;
  --base: 13.5vw; --sw: 2.873; --tx: -0.042; --ty: 0.063; }
.co-head-r { right: 1vw; top: 0.5vw; width: 18.3vw; height: 18.5vw;
  --base: 18.3vw; --sw: 2.062; --tx: -0.070; --ty: 0.012; }
.co-script { position: relative; font-family: var(--font-script); font-size: 2.7em; line-height: 1.25;
  background: linear-gradient(95deg, #f0a63c 0%, #f0609b 35%, #b183d8 70%, #58b8d8 100%);
  -webkit-background-clip: text; background-clip: text;
  -webkit-text-fill-color: transparent; color: transparent; }
.co-title { position: relative; margin: 0.3vw 0 0; font-weight: 600; font-size: 4.6em;
  letter-spacing: .2em; padding-left: .2em; line-height: 1.25; color: #2f2a28; }
.co-title .g { background: linear-gradient(95deg, #e8628f, #a06ad0);
  -webkit-background-clip: text; background-clip: text;
  -webkit-text-fill-color: transparent; color: transparent; }
.co-ribbon { position: relative; display: inline-block; margin-top: 0.9vw; color: #fff; font-weight: 600;
  font-size: 1.9em; letter-spacing: .16em; padding: 0.42em 1.5em; line-height: 1.35;
  background: linear-gradient(90deg, #f0a63c, #ef5f9a 35%, #8f6fe0 70%, #46a8e0 100%);
  clip-path: polygon(0 0, 100% 0, calc(100% - 0.7em) 50%, 100% 100%, 0 100%, 0.7em 50%); }
/* もこもこ吹き出し */
.co-bubble { position: absolute; z-index: 2; background: #fff; text-align: center;
  width: 13.6vw; height: 8.9vw; display: flex; flex-direction: column;
  align-items: center; justify-content: center;
  font-weight: 700; font-size: 1.37em; line-height: 1.65;
  border-radius: 50% 50% 48% 52% / 55% 52% 48% 45%; }
.co-bubble .p { color: #e8397f; }
.co-bub-l { left: 11.5vw; top: 8vw; transform: rotate(-4deg); }
.co-bub-r { right: 7.5vw; top: 8.6vw; transform: rotate(3deg); }
.co-spark { position: absolute; z-index: 1; pointer-events: none; }
.co-spark::before { content: "\2726"; }

/* --- コースカード --- */
.co-grid { position: relative; z-index: 1; display: grid; grid-template-columns: 1fr 1fr;
  gap: 1.2vw; max-width: 95.4vw; margin: 0.9vw auto 0; padding-bottom: 1.4vw; }
.co-card { position: relative; background: #fff; border-radius: 1.2vw; padding: 1.1vw 1.9vw 1.5vw;
  min-height: 33.2vw;
  display: grid; grid-template-columns: minmax(0, 1fr) 20.3vw; column-gap: 1vw;
  box-shadow: 0 0.3vw 1vw rgba(210,150,170,0.14); }
.co-card1 { border: 0.1vw solid #cfe9e5; }
.co-card2 { border: 0.1vw solid #f3cfdf; }
.co-l, .co-r { display: flex; flex-direction: column; min-width: 0; }

/* ナンバリング（水彩のにじみ風）＋ 期間バッジ（PCデザインには無いのでSPのみ表示） */
.co-nrow { display: flex; align-items: center; gap: 1.2vw; }
.co-num { flex: 0 0 auto; width: 4.2vw; height: 4vw;
  display: flex; align-items: center; justify-content: center;
  color: #fff; font-family: var(--font-en); font-style: italic; font-weight: 600;
  font-size: 1.9em; line-height: 1;
  border-radius: 46% 54% 52% 48% / 52% 46% 54% 48%; }
.co-card1 .co-num { background: radial-gradient(circle at 45% 38%, #7cd6ca, #29a99a 72%); }
.co-card2 .co-num { background: radial-gradient(circle at 45% 38%, #cbaaee, #9b6fd6 72%); }
.co-term { display: none; }

/* タイトルとリードは2枚とも同じ幅に収まるよう、カードごとに文字サイズを調整（デザイン準拠） */
.co-t { margin: 0.9vw 0 0; font-weight: 700; font-size: 2.28em; line-height: 1.3;
  letter-spacing: .02em; white-space: nowrap; }
.co-card2 .co-t { font-size: 2.03em; }
.co-t .p { color: #e8397f; font-size: 1.12em; padding: 0 .1em; }
/* リード文の下線は端がぼけた筆跡風。文字より少し長く引く */
.co-lead { position: relative; align-self: flex-start; margin: 0.9vw 0 0;
  font-weight: 700; font-size: 1.03em; line-height: 1.5; white-space: nowrap;
  padding: 0 0.3em 0.55em; }
.co-card2 .co-lead { font-size: 0.89em; }
.co-lead::after { content: ""; position: absolute; left: 0; right: -0.5em; bottom: 0.05em;
  height: 0.17em; border-radius: 999px;
  background: linear-gradient(90deg, rgba(255,206,90,0) 0%, #ffd166 10%, #ffc233 55%, rgba(255,194,51,0) 100%); }
.co-body { margin: 1vw 0 0; font-weight: 500; font-size: 0.93em; line-height: 1.67; color: #4a4340; }

.co-osusume { margin-top: auto; padding-top: 1.4vw; }
.co-osusume-t { display: block; width: 87%; text-align: center; font-weight: 600;
  font-size: 1.07em; letter-spacing: .1em; padding: 0.28em 0; line-height: 1.4;
  clip-path: polygon(0 0, 100% 0, calc(100% - 0.55em) 50%, 100% 100%, 0 100%, 0.55em 50%); }
.co-card1 .co-osusume-t { background: linear-gradient(90deg, rgba(110,200,190,.45), rgba(110,200,190,.14)); }
.co-card2 .co-osusume-t { background: linear-gradient(90deg, rgba(236,140,180,.42), rgba(236,140,180,.12)); }
.co-ics { display: flex; margin-top: 1.1vw; }
.co-ic { flex: 1 1 0; min-width: 0; display: flex; flex-direction: column; align-items: center;
  gap: 0.7vw; font-weight: 600; font-size: 0.82em; line-height: 1.55; text-align: center; }
/* 支給アイコン（course*.png）は余白が大きい透過PNG。--sw/--tx/--ty で大きさと位置を揃える */
.co-icb { position: relative; width: 4vw; height: 4vw; border-radius: 50%; --icsz: 2.5vw; }
.co-icb img { position: absolute; left: 50%; top: 50%; height: auto;
  width: calc(var(--icsz) * var(--sw));
  transform: translate(-50%, -50%)
             translate(calc(var(--icsz) * var(--tx)), calc(var(--icsz) * var(--ty))); }
.co-card1 .co-icb { background: rgba(110,200,190,.22); }
.co-card2 .co-icb { background: rgba(236,140,180,.20); }
.co-i1 { --sw: 1.812; --tx:  0;      --ty: 0.049; }
.co-i2 { --sw: 1.676; --tx:  0;      --ty: 0.116; }
.co-i3 { --sw: 2.008; --tx: -0.023;  --ty: 0.174; }
.co-i4 { --sw: 2.365; --tx:  0.002;  --ty: 0.109; }
.co-i5 { --sw: 2.138; --tx:  0.002;  --ty: 0.083; }
.co-i6 { --sw: 2.086; --tx: -0.069;  --ty: 0.053; }

/* --- 右カラム（写真 / 価格 / CTA） --- */
.co-photo { position: relative; display: block; }
/* 支給写真（course01/02）に差し替え済み。旧素材はキャッチ文言の焼き込みを隠すため
   拡大トリミングしていたが、新素材では不要なので等倍のcoverに戻している */
.co-pic { display: block; overflow: hidden; border-radius: 0.9vw; height: 18.2vw; }
.co-pic img { display: block; width: 100%; height: 100%; object-fit: cover; }
/* 写真に重なるキャッチ */
.co-no1 { position: absolute; right: -0.4vw; bottom: -2.4vw; z-index: 2; white-space: nowrap;
  color: #e8397f; font-weight: 700; font-style: italic; font-size: 1.7em; line-height: 1.2;
  transform: rotate(-7deg); padding: 0 0.35em 0.22em; }
.co-no1::after { content: ""; position: absolute; left: 0; right: 0; bottom: 0;
  height: 0.16em; border-radius: 999px;
  background: linear-gradient(90deg, rgba(255,206,90,0), #ffd166 18%, #ffb733 72%, rgba(255,183,51,0)); }
.co-up { position: absolute; right: -0.8vw; top: -1vw; z-index: 2; background: #fff;
  border-radius: 0.7vw; padding: 0.5vw 0.9vw; text-align: center; line-height: 1.5;
  color: #e8397f; font-weight: 700; font-size: 1.15em; white-space: nowrap;
  box-shadow: 0 0.2vw 0.6vw rgba(200,150,170,.28); }
.co-up .u { background: linear-gradient(transparent 78%, #ffd166 78% 96%, transparent 96%); }

.co-buy { position: relative; margin-top: auto; padding-top: 1.4vw; }
.co-buy::before { content: ""; position: absolute; left: -1vw; top: 0; bottom: -1vw;
  width: 0.1vw; background: #ece5e2; }
.co-price { text-align: center; font-family: var(--font-en); font-weight: 600; font-size: 2.8em;
  letter-spacing: .01em; white-space: nowrap; line-height: 1.2; }
.co-card1 .co-price { color: #21a89c; }
.co-card2 .co-price { color: #d9569a; }
.co-price .tax { font-family: var(--font-jp); font-size: 0.42em; font-weight: 600; color: #4a4340; }
.co-cta { margin-top: 1.1vw; height: 3.9vw; display: flex; align-items: center; justify-content: center;
  gap: 0.6vw; color: #fff; font-weight: 700; font-size: 1.19em; white-space: nowrap;
  border-radius: 999px; text-decoration: none; line-height: 1.3;
  transition: transform .12s ease, filter .15s ease;
  box-shadow: 0 0.3vw 0.9vw rgba(150,120,140,0.28); }
.co-card1 .co-cta { background: linear-gradient(135deg, #4fcbb8, #1ea3a8); }
.co-card2 .co-cta { background: linear-gradient(135deg, #f37bab, #e0439a); }
.co-cta:hover { filter: brightness(1.05); }
.co-cta:active { transform: scale(0.98); }
.co-cta .ar { font-family: sans-serif; font-size: 1.15em; }

/* --- 注記 --- */
.co-notes { position: relative; z-index: 1; text-align: center; padding-bottom: 2.4vw;
  font-weight: 500; font-size: 1.05em; line-height: 2; color: #6b5b57; }

/* ===== SP（全幅=100vw基準: font-size 2vw = 1em） ===== */
@media (max-width: 768px) {
  .co { font-size: 2vw;
    background-image: url('<?php echo $u; ?>/assets/images/corse_bg_sp.png'); }
  .co-head { padding-top: 3vw; min-height: 35vw; }
  .co-head-l { left: 0; top: 0; width: 24.6vw; height: 33.8vw; --base: 24.6vw; }
  .co-head-r { right: 0; top: 0; width: 24.6vw; height: 33.8vw; --base: 24.6vw; }
  .co-pic { height: 35.9vw; border-radius: 1.8vw; }
  .co-script { font-size: 2.55em; }
  .co-title { font-size: 3.24em; }
  .co-ribbon { font-size: 1.21em; padding: 0.42em 1.3em; }
  /* SPは吹き出しと帯が近いので回転させない */
  .co-bubble { width: 17vw; height: 13.4vw; font-size: 0.92em; line-height: 1.7;
    transform: none; }
  .co-bub-l { left: 7.4vw; top: 14.1vw; }
  .co-bub-r { right: 7.4vw; top: 15.3vw; }

  .co-grid { grid-template-columns: 1fr; gap: 4vw; max-width: 95.3vw; margin-top: 3vw;
    padding-bottom: 3vw; }
  .co-card { grid-template-columns: minmax(0, 1fr) 40.3vw; column-gap: 2vw;
    padding: 3.2vw; min-height: 0; border-radius: 2.4vw; }
  .co-nrow { gap: 2.4vw; }
  .co-num { width: 8.9vw; height: 8.4vw; font-size: 1.9em; }
  /* 期間バッジはSPデザインのみ */
  .co-term { display: inline-flex; align-items: center; gap: 0.7vw;
    padding: 0.35em 1.2em; border-radius: 0.5vw; font-weight: 600; font-size: 1.1em;
    letter-spacing: .05em; line-height: 1.5; }
  .co-term svg { width: 1.15em; height: 1.15em; flex: 0 0 auto; }
  .co-card1 .co-term { background: rgba(110,200,190,.22); color: #1e8f86; }
  .co-card2 .co-term { background: rgba(236,140,180,.20); color: #cf4b8c; }

  .co-t { margin-top: 1.8vw; font-size: 2.24em; }
  .co-card2 .co-t { font-size: 2em; }
  .co-lead { margin-top: 1.6vw; font-size: 1.04em; padding-bottom: 0.6em; }
  .co-card2 .co-lead { font-size: 0.9em; }
  .co-body { margin-top: 1.8vw; font-size: 1em; line-height: 1.76; }
  .co-osusume { padding-top: 2.6vw; }
  .co-osusume-t { font-size: 1.05em; }
  .co-ics { margin-top: 2vw; }
  .co-ic { gap: 1.2vw; font-size: 0.8em; }
  .co-icb { width: 8.9vw; height: 8.9vw; --icsz: 5.5vw; }

  .co-no1 { right: -0.5vw; bottom: -4.4vw; font-size: 2.1em; }
  .co-up { right: -1vw; top: -1.6vw; font-size: 1.3em; padding: 1vw 1.6vw; border-radius: 1.2vw; }
  .co-buy { padding-top: 2.6vw; }
  .co-buy::before { left: -2vw; bottom: -2vw; }
  .co-price { font-size: 2.9em; }
  .co-cta { height: 6.2vw; margin-top: 2.2vw; font-size: 1.25em; }

  .co-notes { font-size: 1.2em; padding: 0 4vw 5vw; }
}
</style>
<section class="co" id="courses">
  <!-- 水彩コーナー -->
  <span class="co-wc" style="left:-6vw;top:-3vw;width:20vw;height:16vw;background:#d8bce8;border-radius:50% 50% 45% 55%/55% 45% 55% 45%;"></span>
  <span class="co-wc" style="right:-6vw;top:-2vw;width:20vw;height:16vw;background:#f6c0d6;border-radius:45% 55% 50% 50%/50% 55% 45% 55%;"></span>
  <span class="co-spark" style="left:29vw;top:2.5vw;color:#f2c94c;font-size:1.6em;"></span>
  <span class="co-spark" style="left:31vw;top:7vw;color:#c5a6ec;font-size:1.1em;"></span>
  <span class="co-spark" style="right:29vw;top:3vw;color:#f2c94c;font-size:1.4em;"></span>
  <span class="co-spark" style="right:31vw;top:7.5vw;color:#ef9ec2;font-size:1.4em;">&#9825;</span>

  <!-- ヘッダー -->
  <div class="co-head">
    <span class="co-head-photo co-head-l"><img src="<?php echo $u; ?>/assets/images/corse_left.png" alt="" loading="lazy" decoding="async"></span>
    <span class="co-head-photo co-head-r"><img src="<?php echo $u; ?>/assets/images/corse_right.png" alt="" loading="lazy" decoding="async"></span>
    <span class="co-bubble co-bub-l"><span><span class="p">初心者</span>も</span><span>安心して</span><span class="p">スタートできる&#9825;</span></span>
    <span class="co-bubble co-bub-r"><span><span class="p">好きなこと</span>を</span><span>一生の仕事に<span class="p">&#9825;</span></span></span>
    <div class="co-script">Choose Your Path &#9825;</div>
    <h2 class="co-title"><span class="g">コース</span>内容</h2>
    <div><span class="co-ribbon">なりたい未来に合わせて選べる&#9825;</span></div>
  </div>

  <!-- コースカード -->
  <div class="co-grid">
    <!-- 3ヶ月即戦力コース -->
    <div class="co-card co-card1">
      <div class="co-l">
        <div class="co-nrow">
          <span class="co-num">01</span>
        </div>
        <h3 class="co-t">3ヶ月<span class="p">即戦力</span>コース</h3>
        <p class="co-lead">短期間でプロデビューを目指したい方へ！</p>
        <p class="co-body">3ヶ月間で480時間分の授業を消化して頂く<br>短期集中型のコースになります。<br>強い意欲を持ち、最短距離でプロデビューを<br>目指したい方におすすめです。</p>
        <div class="co-osusume">
          <span class="co-osusume-t">こんな方におすすめ</span>
          <div class="co-ics">
            <span class="co-ic"><span class="co-icb co-i1"><img src="<?php echo $u; ?>/assets/images/course1.png" alt="" loading="lazy" decoding="async"></span>学習密度が高い</span>
            <span class="co-ic"><span class="co-icb co-i2"><img src="<?php echo $u; ?>/assets/images/course2.png" alt="" loading="lazy" decoding="async"></span>就職までの<br>スピードが早い</span>
            <span class="co-ic"><span class="co-icb co-i3"><img src="<?php echo $u; ?>/assets/images/course3.png" alt="" loading="lazy" decoding="async"></span>サロンワーク<br>特化</span>
          </div>
        </div>
      </div>
      <div class="co-r">
        <span class="co-photo">
          <span class="co-pic"><img <?php fee_img_attr('courses', '1'); ?> loading="lazy"></span>
          <span class="co-no1">人気No.1</span>
        </span>
        <div class="co-buy">
          <div class="co-price">&yen;420,000<span class="tax">（税込）</span></div>
          <a class="co-cta" href="https://lin.ee/IdR5PPL" target="_blank" rel="noopener noreferrer">このコースについて相談する<span class="ar">&#8250;</span></a>
        </div>
      </div>
    </div>

    <!-- 9ヶ月じっくりコース -->
    <div class="co-card co-card2">
      <div class="co-l">
        <div class="co-nrow">
          <span class="co-num">02</span>
        </div>
        <h3 class="co-t">9ヶ月<span class="p">じっくり</span>コース</h3>
        <p class="co-lead">じっくり習得して確実にスキルを身につけたい方へ！</p>
        <p class="co-body">9ヶ月間で480時間分の授業を消化して頂く<br>じっくり習得型のコースになります。<br>ゆとりある期間で技術を定着させ、仕事や生活と<br>両立しながら、プロデビューを目指したい方に<br>おすすめです。</p>
        <div class="co-osusume">
          <span class="co-osusume-t">こんな方におすすめ</span>
          <div class="co-ics">
            <span class="co-ic"><span class="co-icb co-i4"><img src="<?php echo $u; ?>/assets/images/course4.png" alt="" loading="lazy" decoding="async"></span>無理ないペース</span>
            <span class="co-ic"><span class="co-icb co-i5"><img src="<?php echo $u; ?>/assets/images/course5.png" alt="" loading="lazy" decoding="async"></span>働きながら<br>通いやすい</span>
            <span class="co-ic"><span class="co-icb co-i6"><img src="<?php echo $u; ?>/assets/images/course6.png" alt="" loading="lazy" decoding="async"></span>サロンワーク<br>特化</span>
          </div>
        </div>
      </div>
      <div class="co-r">
        <span class="co-photo">
          <span class="co-pic"><img <?php fee_img_attr('courses', '2'); ?> loading="lazy"></span>
          <span class="co-no1">スキルUP</span>
        </span>
        <div class="co-buy">
          <div class="co-price">&yen;450,000<span class="tax">（税込）</span></div>
          <a class="co-cta" href="https://lin.ee/IdR5PPL" target="_blank" rel="noopener noreferrer">このコースについて相談する<span class="ar">&#8250;</span></a>
        </div>
      </div>
    </div>
  </div>

  <!-- 注記 -->
  <div class="co-notes">
    ※分割払いも可能ですのでご相談ください。<br>
  </div>
</section>
