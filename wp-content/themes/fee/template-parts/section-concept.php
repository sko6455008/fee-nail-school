<?php
// コンセプトセクション（Let's Nail♡ 〜 池袋ネイルカレッジFee）— コーディング版
// 再現元: lp-pc-1.webp（y2400〜4630付近）/ lp-sp-1.webp
$u = get_template_directory_uri();
?>
<style>
/* ===== コンセプト（PC: 1920px基準） ===== */
.cc { position: relative; overflow: hidden; box-sizing: border-box; font-size: 1vw;
  font-family: var(--font-jp); color: #3a3230; text-align: center;
  background: linear-gradient(180deg, #fbdce8 0%, #fbdce8 38%, #fdf1f4 48%, #fdf1f4 78%, #fbe3ec 86%, #fbe3ec 100%); }
.cc * { box-sizing: border-box; }

/* --- 背景のキラキラ装飾 ---
   SPは背景素材 intro_bg_sp.png にキラキラとハートが描かれているが、PCは無地の
   グラデーションだけなので同じ雰囲気になるようCSSで配置している。
   写真・本文の左右にできる余白の中だけに置いてあるので文字には重ならない。 */
.cc-spark, .cc-heart, .cc-dot { position: absolute; z-index: 0; pointer-events: none; line-height: 1; }
.cc-spark::before { content: "\2726"; }
.cc-dot { border-radius: 50%; }
/* 装飾より写真・テキストを前面に */
.cc-photo, .cc-copy, .cc-close { position: relative; z-index: 1; }

/* --- 中央写真（支給素材 intro.jpg） --- */
.cc-photo { display: block; width: 48vw; margin: 1.8vw auto 0; border-radius: 2.6vw;
  border: 0.5vw solid #f6b7cd; }

/* --- 紹介文（PC/SPで文言出し分け: SPはスマホ版LPデザインの短縮版） --- */
.cc-copy { margin: 4.2vw 0 0; line-height: 2.15; font-weight: 600; font-size: 2.25em; color: #3a3230; }
.cc-copy-sp { display: none; }
.cc-copy .big { font-size: 1.45em; font-weight: 700; }
.cc-em { color: #e8397f; font-weight: 700; padding-bottom: 0.06em;
  background: linear-gradient(90deg, #ffd24d, #ff9d4d);
  background-size: 100% 0.1em; background-position: 0 100%; background-repeat: no-repeat; }

/* --- 締め（プロのネイリストを目指すなら♡） --- */
.cc-close { margin-top: 4vw; }
.cc-lead { font-family: var(--font-round); font-weight: 700; color: #ec5a96;
  font-size: 1.75em; letter-spacing: .35em; }
.cc-lead .sl { font-weight: 500; padding: 0 .5em; letter-spacing: 0; }
.cc-name { margin: 1.2vw auto 0; padding-bottom: 4.5vw; font-family: var(--font-round);
  font-weight: 800; font-size: 4.6em; letter-spacing: .04em; color: #2f2a28; line-height: 1.3; }
.cc-name .fee { color: #ec5a96; padding-left: .12em; }
.cc-name .u { background: linear-gradient(90deg, #f48ab5, #f06ba8);
  background-size: 100% 0.14em; background-position: 50% 96%; background-repeat: no-repeat;
  padding-bottom: 0.12em; }

/* ===== SP（1080px基準: font-size 2vw） ===== */
@media (max-width: 768px) {
  /* 背景は四隅にハート・キラキラが入った額縁状の素材。cover だと下側が見切れるため
     100% 100% でセクション全体に収める（縦横比の差は背景が水彩調のため目立たない）。 */
  .cc { font-size: 2vw;
    background: #fbdce8 url('<?php echo $u; ?>/assets/images/intro_bg_sp.png') center top / 100% 100% no-repeat; }
  /* 背景素材側にキラキラが入っているのでCSSの装飾は出さない（二重になる） */
  .cc-spark, .cc-heart, .cc-dot { display: none; }
  .cc-photo { width: 65vw; margin-top: 6vw; border-radius: 6vw; border: 1.5vw solid #fff; }
  .cc-copy-pc { display: none; }
  .cc-copy-sp { display: block; margin-top: 7vw; padding: 0 3vw; font-size: 1.6em; line-height: 2.3; }
  .cc-copy-sp .big { font-size: 1.5em; }
  .cc-close { margin-top: 6vw; }
  .cc-lead { font-size: 1.6em; letter-spacing: .2em; }
  .cc-name { font-size: 3.4em; padding-bottom: 4vw; }
}
</style>
<section class="cc" id="concept">
  <!-- 背景のキラキラ（PCのみ表示。写真の左右 → 本文の左右 → 締めの左右の順） -->
  <span class="cc-spark" style="left:6.5vw;top:2.6vw;color:#f2c94c;font-size:1.2em;"></span>
  <span class="cc-spark" style="left:2.6vw;top:6vw;color:#c5a6ec;font-size:1.5em;"></span>
  <span class="cc-spark" style="left:14.5vw;top:3.6vw;color:#f2c94c;font-size:2.2em;"></span>
  <span class="cc-spark" style="left:19.6vw;top:7.4vw;color:#c5a6ec;font-size:1.3em;"></span>
  <span class="cc-spark" style="left:10.5vw;top:9.2vw;color:#f0a0c4;font-size:1.1em;"></span>
  <span class="cc-heart" style="left:5.5vw;top:13.5vw;color:#ef6da5;font-size:3.4em;">&#9825;</span>
  <span class="cc-dot" style="left:12.8vw;top:17.6vw;width:0.5vw;height:0.5vw;background:#f0a0c4;"></span>
  <span class="cc-spark" style="left:17.8vw;top:20.5vw;color:#c5a6ec;font-size:1.6em;"></span>
  <span class="cc-spark" style="left:8.2vw;top:26.5vw;color:#f2c94c;font-size:1.4em;"></span>
  <span class="cc-dot" style="left:21.5vw;top:30.4vw;width:0.35vw;height:0.35vw;background:#c5a6ec;"></span>
  <span class="cc-spark" style="left:19vw;top:34vw;color:#f0a0c4;font-size:1.8em;"></span>
  <span class="cc-spark" style="left:11vw;top:41vw;color:#c5a6ec;font-size:1.2em;"></span>
  <span class="cc-spark" style="left:2.6vw;top:36vw;color:#f2c94c;font-size:1.1em;"></span>
  <span class="cc-spark" style="left:20.5vw;top:46.5vw;color:#f2c94c;font-size:1.5em;"></span>

  <span class="cc-spark" style="right:6.5vw;top:2.2vw;color:#f0a0c4;font-size:1.2em;"></span>
  <span class="cc-spark" style="right:2.6vw;top:5.5vw;color:#f2c94c;font-size:1.6em;"></span>
  <span class="cc-spark" style="right:16.5vw;top:3.2vw;color:#c5a6ec;font-size:2em;"></span>
  <span class="cc-spark" style="right:10.5vw;top:6.4vw;color:#f2c94c;font-size:1.4em;"></span>
  <span class="cc-spark" style="right:20vw;top:9.6vw;color:#f0a0c4;font-size:1.1em;"></span>
  <span class="cc-heart" style="right:5.5vw;top:13vw;color:#ef6da5;font-size:3.2em;">&#9825;</span>
  <span class="cc-dot" style="right:13vw;top:18vw;width:0.45vw;height:0.45vw;background:#f2c94c;"></span>
  <span class="cc-spark" style="right:15.5vw;top:21.5vw;color:#f2c94c;font-size:1.7em;"></span>
  <span class="cc-spark" style="right:21vw;top:29vw;color:#c5a6ec;font-size:1.3em;"></span>
  <span class="cc-dot" style="right:8.5vw;top:33vw;width:0.35vw;height:0.35vw;background:#f0a0c4;"></span>
  <span class="cc-spark" style="right:9.5vw;top:38.5vw;color:#f0a0c4;font-size:1.5em;"></span>
  <span class="cc-spark" style="right:2.6vw;top:27vw;color:#c5a6ec;font-size:1.2em;"></span>
  <span class="cc-spark" style="right:18.5vw;top:45vw;color:#c5a6ec;font-size:1.4em;"></span>

  <span class="cc-spark" style="left:6.5vw;top:59.5vw;color:#c5a6ec;font-size:1.6em;"></span>
  <span class="cc-spark" style="left:11vw;top:67.5vw;color:#f2c94c;font-size:1.2em;"></span>
  <span class="cc-spark" style="right:7vw;top:61.5vw;color:#f0a0c4;font-size:1.7em;"></span>
  <span class="cc-spark" style="right:11.5vw;top:70vw;color:#c5a6ec;font-size:1.2em;"></span>

  <span class="cc-heart" style="left:8vw;top:84vw;color:#ef6da5;font-size:2.8em;">&#9825;</span>
  <span class="cc-spark" style="left:16.5vw;top:89.5vw;color:#f2c94c;font-size:1.6em;"></span>
  <span class="cc-spark" style="left:11vw;top:94vw;color:#c5a6ec;font-size:1.2em;"></span>
  <span class="cc-spark" style="right:15.5vw;top:85.5vw;color:#f2c94c;font-size:1.5em;"></span>
  <span class="cc-heart" style="right:7.5vw;top:90.5vw;color:#ef6da5;font-size:2.6em;">&#9825;</span>
  <span class="cc-spark" style="right:18vw;top:94.5vw;color:#f0a0c4;font-size:1.3em;"></span>

  <!-- 写真（外観 > カスタマイズ > コンセプト で差し替え可能） -->
  <img class="cc-photo" <?php fee_img_attr('concept', 'main'); ?> loading="lazy">

  <!-- 紹介文（PC: 従来文言 / SP: スマホ版LPデザインの文言） -->
  <p class="cc-copy cc-copy-pc">
    サロン就職後に活躍できる<span class="cc-em big">技術と接客力</span>を習得！<br>
    モデル入客で実践的に学び、トレンドを意識した提案力も養成します。<br>
    初心者に優しい<span class="cc-em big">サロンワーク特化型カリキュラム</span>で、<br>
    系列サロンへの就職も可能です。
  </p>
  <p class="cc-copy cc-copy-sp">
    サロン就職後に活躍できる<span class="cc-em big">技術力と接客力</span>を習得！<br>
    <span class="cc-em big">実践的なカリキュラム</span>で就職までサポート。
  </p>

  <!-- 締め -->
  <div class="cc-close">
    <div class="cc-lead"><span class="sl">＼</span>プロのネイリストを目指すなら&#9825;<span class="sl">／</span></div>
    <div class="cc-name"><span class="u">池袋ネイルカレッジ<span class="fee">Fee</span></span></div>
  </div>
</section>
