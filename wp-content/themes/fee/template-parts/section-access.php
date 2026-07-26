<?php
// アクセス（Location）セクション — コーディング版
// index.php（画像版）のオーバーレイ実装（$access_html / .access / .acard）を通常フローに移設したもの。
// 住所・営業時間などの情報は index.php の現行コード化済み内容を正とする。
$mapurl = "https://www.google.com/maps/search/?api=1&query=%E6%9D%B1%E4%BA%AC%E9%83%BD%E8%B1%8A%E5%B3%B6%E5%8C%BA%E6%B1%A0%E8%A2%8B2-53-12";
?>
<style>
/* ===== アクセス（通常フロー版） ===== */
.ac2 { position: relative; overflow: hidden; box-sizing: border-box; background: #FEF9F4;
  color: #5b4b46; font-family: var(--font-jp); font-size: 1.04vw; }
.ac2 * { box-sizing: border-box; }
.ac2-inner { position: relative; z-index: 2; padding: 2.2em 3.4em 3em; }
.ac2-head { text-align: center; position: relative; }
.ac2-head .ah-script { font-family: var(--font-script); font-size: 2.6em; line-height: 1.15; display: block;
  background: linear-gradient(95deg, #f0609b 0%, #b06fd0 55%, #46c3d8 100%);
  -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent; color: transparent; }
.ac2-head .ah-jp { font-size: 3.3em; font-weight: 700; color: #5b4b46; letter-spacing: .14em;
  display: inline-block; margin-top: .2em; }
.ac2-head .ah-jp u { text-decoration: none; position: relative; padding: 0 .15em; }
.ac2-head .ah-jp u::after { content: ""; position: absolute; left: 0; right: 0; bottom: -.16em;
  height: .13em; border-radius: 999px; background: var(--grad-yellow-line); }
.ac2-body { position: relative; z-index: 2; display: flex; align-items: stretch; margin-top: 3.4em; gap: 2.4em; }
.ac2-map { position: relative; display: block; border-radius: 1.3em; overflow: hidden;
  border: .35em solid #fff; box-shadow: 0 .5em 1.4em rgba(200,140,165,.20); background: #e8eef0;
  text-decoration: none; width: 50%; aspect-ratio: 910 / 656; }
/* iframeを上方向へずらし、上端の場所カードをクリップで隠す */
.ac2-map iframe { position: relative; top: -5.6em; width: 100%; height: calc(100% + 5.6em);
  border: 0; display: block; }
/* マップで見るボタン */
.ac2-mapbtn { position: absolute; top: 0.7em; left: 0.7em; z-index: 11;
  display: inline-flex; align-items: center; gap: 0.4em;
  background: #fff; color: #ec5a96; font-weight: 700; text-decoration: none;
  border: 0.14em solid #f6c4d6; border-radius: 999px; line-height: 1;
  box-shadow: 0 0.18em 0.5em rgba(180,120,140,0.22);
  font-family: var(--font-jp); white-space: nowrap;
  outline: none; -webkit-tap-highlight-color: transparent;
  transition: transform .12s ease, filter .15s ease;
  font-size: 1.32em; padding: 0.6em 1.05em; }
.ac2-mapbtn:hover { filter: brightness(1.02); }
.ac2-mapbtn:active { transform: scale(0.96); }
.ac2-mapbtn .mb-pin { width: 1.2em; height: 1.2em; flex: 0 0 auto; }
.ac2-mapbtn .mb-ext { width: 0.9em; height: 0.9em; flex: 0 0 auto; }
/* 情報カード */
.ac2 .acard2 { width: 50%; background: #fffafa; border: 0.12em solid #f4c4d6; border-radius: 1.5em;
  box-shadow: 0 0.4em 1.2em rgba(200,140,165,0.18);
  padding: 1.1em 1.5em; display: flex; flex-direction: column; justify-content: center;
  overflow: hidden; color: #4f4642; line-height: 1.5; gap: 0.45em; }
.acard2-ttl { font-size: 1.6em; font-weight: 700; color: #3f3a38; line-height: 1.2;
  width: fit-content; padding-bottom: 0.25em; border-bottom: 0.16em solid;
  border-image: linear-gradient(90deg, #ffd24d, #ff9d4d) 1; }
.acard2-ttl-em { color: #ec5a96; }
.acard2-row { display: flex; align-items: flex-start; gap: 0.75em; }
.acard2-ic { flex: 0 0 auto; width: 2.5em; height: 2.5em; border-radius: 50%;
  display: flex; align-items: center; justify-content: center; margin-top: 0.1em; }
.acard2-ic svg { width: 1.35em; height: 1.35em; }
.acard2-ic-pin { background: #fbe2ec; color: #ec5a96; }
.acard2-ic-clock { background: #d9f3f4; color: #21bcc0; }
.acard2-ic-tel { background: #fdf0cf; color: #f0a93c; }
.acard2-h { font-size: 0.92em; font-weight: 700; margin-bottom: 0.18em; letter-spacing: .04em; }
.acard2-h-pink { color: #ec5a96; }
.acard2-h-teal { color: #21bcc0; }
.acard2-h-tel { color: #f0a93c; }
.acard2-txt { font-size: 1.04em; line-height: 1.6; }
.acard2-pink { color: #ec5a96; font-weight: 700; }
.acard2-teal { color: #21bcc0; font-weight: 700; }
.acard2-tel { display: inline-block; font-size: 1.28em; font-weight: 700; letter-spacing: .02em;
  color: #4f4642; text-decoration: none; border-bottom: 0.1em solid #ffcf5a;
  padding-bottom: 0.04em; outline: none; -webkit-tap-highlight-color: transparent; }
.acard2-div { border: 0; border-top: 1.5px dashed #f0c8d6; margin: 0.05em 0; }
/* 装飾（style.cssの .deco / .dco-* を使用） */

/* ===== SP ===== */
@media (max-width: 768px) {
  .ac2 { font-size: 2.3vw; }
  .ac2-inner { padding: 2em 1.2em 2.4em; }
  .ac2-head .ah-script { font-size: 2.2em; }
  .ac2-head .ah-jp { font-size: 2.5em; margin-top: .1em; }
  .ac2-body { flex-direction: column; margin-top: 1.5em; gap: 0.9em; }
  .ac2-map { width: 100%; aspect-ratio: 16 / 9; }
  .ac2-mapbtn { font-size: 1.18em; padding: 0.52em 0.85em; }
  .ac2 .acard2 { width: 100%; font-size: 1.05em; border-radius: 1.3em; }
}
</style>
<section class="ac2" id="access">
  <!-- 装飾 -->
  <span class="deco dco-blob" style="top:-4%;left:-3%;width:13em;height:11em;background:#fcd2e2;"></span>
  <span class="deco dco-stripe" style="top:14%;left:-2%;width:7em;height:5.5em;color:#ffe08a;"></span>
  <span class="deco dco-dots" style="top:6%;left:6%;width:5em;height:3em;color:#cfeaf2;transform:rotate(-8deg);"></span>
  <span class="deco dco-blob" style="top:-5%;right:-3%;width:12em;height:10em;background:#e6d6f6;"></span>
  <span class="deco dco-dots" style="top:4%;right:7%;width:4.5em;height:3em;color:#bfe6f0;"></span>
  <span class="deco dco-blob" style="bottom:-5%;left:-3%;width:11em;height:9em;background:#fcd9e6;"></span>
  <span class="deco dco-dots" style="bottom:6%;left:7%;width:5em;height:3em;color:#f8c6da;"></span>
  <span class="deco dco-stripe" style="bottom:2%;right:-2%;width:8em;height:6em;color:#ffe08a;"></span>
  <span class="deco dco-blob" style="bottom:-4%;right:5%;width:6em;height:5em;background:#fbd2e2;"></span>
  <span class="deco dco-spark" style="top:20%;left:30%;width:1.6em;height:1.6em;color:#8ad6df;"></span>
  <span class="deco dco-spark" style="top:12%;right:30%;width:1.9em;height:1.9em;color:#c5a6ec;"></span>
  <span class="deco dco-spark" style="top:30%;right:24%;width:1.3em;height:1.3em;color:#ffd24d;"></span>
  <span class="deco dco-heart" style="top:14%;left:24%;font-size:1.7em;">&#9829;</span>

  <div class="ac2-inner">
    <div class="ac2-head">
      <span class="ah-script">Location</span>
      <div class="ah-jp"><u>アクセス</u></div>
    </div>
    <div class="ac2-body">
      <div class="ac2-map">
        <iframe src="https://maps.google.com/maps?q=%E6%9D%B1%E4%BA%AC%E9%83%BD%E8%B1%8A%E5%B3%B6%E5%8C%BA%E6%B1%A0%E8%A2%8B2-53-12&z=16&hl=ja&output=embed" loading="lazy" title="池袋ネイルカレッジ Fee アクセスマップ" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <a class="ac2-mapbtn" href="<?php echo esc_url( $mapurl ); ?>" target="_blank" rel="noopener noreferrer" aria-label="Googleマップで見る">
          <svg class="mb-pin" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2C8.1 2 5 5.1 5 9c0 5.2 7 13 7 13s7-7.8 7-13c0-3.9-3.1-7-7-7zm0 9.5A2.5 2.5 0 1 1 12 6.5a2.5 2.5 0 0 1 0 5z"/></svg><span>マップで見る</span><svg class="mb-ext" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14 4h6v6"/><path d="M20 4l-9 9"/><path d="M18 13.5V19a1.5 1.5 0 0 1-1.5 1.5h-11A1.5 1.5 0 0 1 4 19V8a1.5 1.5 0 0 1 1.5-1.5H10"/></svg>
        </a>
      </div>
      <div class="acard2">
        <div class="acard2-ttl"><span class="acard2-ttl-em">池袋</span> ネイルカレッジ Fee</div>
        <div class="acard2-row">
          <span class="acard2-ic acard2-ic-pin"><svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2C8.1 2 5 5.1 5 9c0 5.2 7 13 7 13s7-7.8 7-13c0-3.9-3.1-7-7-7zm0 9.5A2.5 2.5 0 1 1 12 6.5a2.5 2.5 0 0 1 0 5z"/></svg></span>
          <div>
            <div class="acard2-h acard2-h-pink">・所在地</div>
            <div class="acard2-txt">〒171-0014<br>東京都豊島区池袋2-53-12<br>池袋駅西口 <span class="acard2-pink">徒歩3分</span></div>
          </div>
        </div>
        <hr class="acard2-div">
        <div class="acard2-row">
          <span class="acard2-ic acard2-ic-clock"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M12 7.5v5l3.3 2"/></svg></span>
          <div>
            <div class="acard2-h acard2-h-teal">・営業時間</div>
            <div class="acard2-txt">平日：11:00 - 21:00<br>土日祝：10:00 - 20:00<br>定休日：<span class="acard2-teal">無休</span></div>
          </div>
        </div>
        <hr class="acard2-div">
        <div class="acard2-row">
          <span class="acard2-ic acard2-ic-tel"><svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M6.6 10.8c1.4 2.8 3.8 5.1 6.6 6.6l2.2-2.2c.3-.3.7-.4 1-.2 1.1.4 2.3.6 3.6.6.6 0 1 .4 1 1V20c0 .6-.4 1-1 1-9.4 0-17-7.6-17-17 0-.6.4-1 1-1h3.5c.6 0 1 .4 1 1 0 1.2.2 2.4.6 3.6.1.4 0 .7-.2 1l-2.3 2.2z"/></svg></span>
          <div>
            <div class="acard2-h acard2-h-tel">・お問い合わせ</div>
            <a class="acard2-tel" href="https://lin.ee/pc9cpjG" target="_blank" rel="noopener noreferrer">LINEで相談する</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
