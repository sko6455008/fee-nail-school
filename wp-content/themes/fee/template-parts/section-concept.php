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
  <!-- 写真（支給素材） -->
  <img class="cc-photo" src="<?php echo $u; ?>/assets/images/intro.jpg" alt="仕上がったネイルの手元" loading="lazy">

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
