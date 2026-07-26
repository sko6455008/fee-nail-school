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

/* --- 中央写真 --- */
.cc-photo { display: block; width: 55.5vw; margin: 1.8vw auto 0; border-radius: 2.6vw;
  border: 0.5vw solid #f6b7cd; }

/* --- 手描き風装飾 --- */
.cc-deco { position: absolute; pointer-events: none; z-index: 2; }
.cc-lets { left: 3vw; top: 8vw; transform: rotate(-8deg); font-family: var(--font-script);
  font-size: 3.4em; line-height: 1.1; text-align: left;
  background: linear-gradient(160deg, #f0a13c 0%, #7cc47f 40%, #58b8d8 70%, #b183d8 100%);
  -webkit-background-clip: text; background-clip: text;
  -webkit-text-fill-color: transparent; color: transparent; }
.cc-lets .ht { -webkit-text-fill-color: #ef6da5; color: #ef6da5; font-size: 0.75em; }
.cc-heart1 { left: 4.5vw; top: 27vw; font-size: 4.6em; color: #e8548e; transform: rotate(-10deg); }
.cc-tape { left: 3.5vw; top: 36vw; width: 8.5vw; height: 3.4vw; transform: rotate(-24deg);
  background: #c9a7e0; opacity: .75;
  background-image: radial-gradient(rgba(255,255,255,.85) 12%, transparent 16%);
  background-size: 1.1vw 1.1vw; }
.cc-pro { right: 5.5vw; top: 5.5vw; transform: rotate(6deg);
  background: linear-gradient(135deg, #e3c3f0, #b99ae4); border-radius: 999px;
  color: #fff; font-family: var(--font-script); font-size: 2.2em;
  padding: 0.55em 1.1em; }
.cc-pro::after { content: ""; position: absolute; left: 12%; bottom: -0.4em;
  width: 0.9em; height: 0.9em; background: #c8a8e8; border-radius: 50%;
  clip-path: inset(40% 0 0 0); }
.cc-dream { right: 5vw; top: 27vw; width: 11vw; height: 10vw; transform: rotate(8deg); }
.cc-dream::before, .cc-dream::after { content: ""; position: absolute; top: 0; width: 5.5vw; height: 8.8vw;
  background: #f7bcd3; border-radius: 2.75vw 2.75vw 0 0; }
.cc-dream::before { left: 5.5vw; transform: rotate(-45deg); transform-origin: 0 100%; }
.cc-dream::after { left: 0; transform: rotate(45deg); transform-origin: 100% 100%; }
.cc-dream .tx { position: relative; z-index: 2; display: block; padding-top: 2vw;
  color: #d9548e; font-family: var(--font-round); font-weight: 700; font-size: 1.75em; line-height: 1.5; }
.cc-spark { position: absolute; pointer-events: none; z-index: 2; }
.cc-spark::before { content: "\2726"; }

/* --- 紹介文 --- */
.cc-copy { margin: 4.2vw 0 0; line-height: 2.15; font-weight: 600; font-size: 2.25em; color: #3a3230; }
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
  .cc { font-size: 2vw; }
  .cc-photo { width: 88vw; margin-top: 4vw; border-radius: 4.5vw; border-width: 1vw; }
  .cc-lets { left: 2vw; top: 3vw; font-size: 2.6em; }
  .cc-heart1 { left: 3vw; top: 40vw; font-size: 3.2em; }
  .cc-tape { left: 2vw; top: 56vw; width: 12vw; height: 5vw; }
  .cc-pro { right: 2.5vw; top: 2.5vw; font-size: 1.7em; }
  .cc-dream { right: 2.5vw; top: 48vw; width: 18vw; height: 16vw; }
  .cc-dream .tx { padding-top: 3.4vw; font-size: 1.4em; }
  .cc-copy { margin-top: 7vw; padding: 0 4vw; font-size: 1.75em; line-height: 2; }
  .cc-close { margin-top: 6vw; }
  .cc-lead { font-size: 1.6em; letter-spacing: .2em; }
  .cc-name { font-size: 3.4em; padding-bottom: 8vw; }
}
</style>
<section class="cc" id="concept">
  <!-- 手描き風装飾 -->
  <span class="cc-deco cc-lets">Let's<br>Nail<span class="ht">&#9825;</span></span>
  <span class="cc-deco cc-heart1">&#9829;</span>
  <span class="cc-deco cc-tape"></span>
  <span class="cc-deco cc-pro">Professional&#9825;</span>
  <span class="cc-deco cc-dream"><span class="tx">夢を&#9786;<br>カタチに</span></span>
  <span class="cc-spark" style="left:2.5vw;top:22vw;color:#f2c94c;font-size:1.6em;"></span>
  <span class="cc-spark" style="left:8.5vw;top:24vw;color:#7fd0dc;font-size:1.1em;"></span>
  <span class="cc-spark" style="right:3vw;top:14vw;color:#f0a0c0;font-size:1.5em;"></span>
  <span class="cc-spark" style="right:12vw;top:24.5vw;color:#c5a6ec;font-size:1.2em;"></span>
  <span class="cc-spark" style="right:4vw;top:43vw;color:#8ad6df;font-size:1.3em;"></span>

  <!-- 写真（仮素材: 既存画像から切り出し） -->
  <img class="cc-photo" src="<?php echo $u; ?>/assets/images/parts/concept-nails.webp" alt="仕上がったネイルの手元" loading="lazy">

  <!-- 紹介文 -->
  <p class="cc-copy">
    サロン就職後に活躍できる<span class="cc-em big">技術と接客力</span>を習得！<br>
    モデル入客で実践的に学び、トレンドを意識した提案力も養成します。<br>
    初心者に優しい<span class="cc-em big">サロンワーク特化型カリキュラム</span>で、<br>
    系列サロンへの就職も可能です。
  </p>

  <!-- 締め -->
  <div class="cc-close">
    <div class="cc-lead"><span class="sl">＼</span>プロのネイリストを目指すなら&#9825;<span class="sl">／</span></div>
    <div class="cc-name"><span class="u">池袋ネイルカレッジ<span class="fee">Fee</span></span></div>
  </div>
</section>
