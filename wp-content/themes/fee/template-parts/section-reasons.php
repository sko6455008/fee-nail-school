<?php
// アカデミー紹介（Why Choose Us・6つの理由）セクション — コーディング版
// 再現元: lp-pc-1.webp（y4530〜5580付近）/ lp-sp-1.webp
$u = get_template_directory_uri();
?>
<style>
/* ===== 6つの理由（PC: 1920px基準） ===== */
.rs { position: relative; overflow: hidden; box-sizing: border-box; font-size: 1vw;
  font-family: var(--font-round); color: #3a3230;
  background: linear-gradient(180deg, #fbe3ec 0%, #fdeef3 22%, #fdf6f6 40%, #fceef2 100%); }
.rs * { box-sizing: border-box; }

/* --- ヘッダー --- */
.rs-head { text-align: center; padding-top: 2.2vw; position: relative; }
.rs-why { font-family: var(--font-script); font-size: 2.9em; color: #e0569a; }
.rs-why .hh { font-size: 0.7em; letter-spacing: -0.1em; }
.rs-band { display: inline-block; margin-top: 0.8vw; background: #ec5a96; color: #fff;
  font-weight: 700; font-size: 1.3em; letter-spacing: .22em; padding: 0.28em 1.6em; }
.rs-title { margin-top: 0.6vw; font-weight: 800; font-size: 4.2em; letter-spacing: .06em; color: #2f2a28;
  display: flex; align-items: center; justify-content: center; gap: 0.25em; }
.rs-title .sm { display: inline-flex; }
.rs-title .sm svg { width: 1em; height: 1em; }
.rs-title .pk { color: #ec5a96; }
.rs-six { margin-top: 0.3vw; display: flex; align-items: baseline; justify-content: center; gap: 1.2vw;
  font-family: var(--font-jp); }
.rs-six .pre { font-size: 1.5em; font-weight: 600; color: #3a3230; }
.rs-six .big { font-size: 2.9em; font-weight: 700; color: #2f2a28; }
.rs-six .big .n { color: #e8397f; font-size: 1.3em; padding-right: .05em; }
.rs-deco { position: absolute; pointer-events: none; }

/* --- カードグリッド --- */
.rs-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 2.2vw;
  max-width: 94vw; margin: 2.2vw auto 0; padding-bottom: 3vw; }
.rs-card { position: relative; background: #fff; border-radius: 1.2vw;
  box-shadow: 0 0.3vw 1.1vw rgba(210,150,170,0.16);
  display: grid; grid-template-columns: 9.5vw 1fr 20.5vw; gap: 1vw; align-items: center;
  padding: 1.4vw 1.2vw 1.4vw 0.8vw; min-height: 13.5vw; }
.rs-tag { position: absolute; top: 0.9vw; left: 0.9vw; width: 3.4vw; height: 2.9vw;
  display: flex; align-items: center; justify-content: center;
  color: #fff; font-family: var(--font-en); font-weight: 700; font-size: 1.5em;
  clip-path: polygon(0 0, 100% 0, 100% 100%, 55% 86%, 0 100%); }
.rs-ic { justify-self: center; margin-top: 1.6vw; }
.rs-ic img { display: block; width: 8vw; height: auto; }
.rs-body { text-align: left; padding-right: 0.4vw; }
.rs-t { font-weight: 800; font-size: 1.75em; line-height: 1.5; color: #2f2a28; margin: 0 0 0.35em; }
.rs-t .c { display: inline-block; }
.rs-tx { font-size: 1.18em; line-height: 1.95; color: #4a4340; margin: 0; font-weight: 500; }
.rs-hl { background: linear-gradient(transparent 58%, #ffe97a 58% 92%, transparent 92%); font-weight: 700; }
.rs-sub { display: block; max-width: 100%; }
.rs-sub img { display: block; width: 17vw; height: auto; }
.rs-foot { margin: 0.5em 0 0; font-weight: 800; font-size: 1.25em; }
.rs-photo { display: block; width: 100%; border-radius: 0.8vw; }

/* カードごとの色 */
.rs-c1 .rs-tag { background: #ec5a96; } .rs-c1 .rs-t .c { color: #ec5a96; }
.rs-c2 .rs-tag { background: #f0a63c; } .rs-c2 .rs-t .c { color: #f0a63c; border-bottom: 0.12em solid #ffd24d; }
.rs-c3 .rs-tag { background: #a98ce4; } .rs-c3 .rs-t .c { color: #a98ce4; border-bottom: 0.12em solid #cdb6f0; }
.rs-c4 .rs-tag { background: #21bcc0; } .rs-c4 .rs-t .c { color: #21bcc0; }
.rs-c5 .rs-tag { background: #e8537d; } .rs-c5 .rs-t .c { color: #e8537d; }
.rs-c6 .rs-tag { background: #5a9fdb; } .rs-c6 .rs-t .c { color: #5a9fdb; }
.rs-c5 .rs-foot { color: #e8397f; }
.rs-c6 .rs-foot { color: #3a3230; font-size: 1.15em; }

/* ===== SP（1080px基準: font-size 2vw） ===== */
@media (max-width: 768px) {
  .rs { font-size: 2vw; }
  .rs-head { padding-top: 4vw; }
  .rs-why { font-size: 2.4em; }
  .rs-band { font-size: 1.2em; }
  .rs-title { font-size: 3.2em; }
  .rs-six .pre { font-size: 1.3em; }
  .rs-six .big { font-size: 2.3em; }
  .rs-grid { grid-template-columns: 1fr; gap: 4vw; max-width: 94vw; margin-top: 4vw; padding-bottom: 6vw; }
  .rs-card { grid-template-columns: 13vw 1fr 36vw; gap: 2vw; padding: 4.5vw 2.5vw 4.5vw 1.5vw;
    min-height: 30vw; border-radius: 2.8vw; align-items: center; }
  .rs-tag { top: 0; left: 0; width: 8vw; height: 7vw; font-size: 1.7em; border-radius: 0 0 0.8vw 0; }
  .rs-ic { margin-top: 5vw; }
  .rs-ic img { width: 11vw; }
  .rs-t { font-size: 2em; line-height: 1.45; margin-bottom: 0.3em; }
  .rs-tx { font-size: 1.4em; line-height: 1.85; }
  .rs-tx br { display: none; }
  .rs-sub img { width: 30vw; }
  .rs-foot { font-size: 1.4em; }
  .rs-photo { border-radius: 1.8vw; }
}
</style>
<section class="rs" id="features">
  <!-- ヘッダー -->
  <div class="rs-head">
    <span class="rs-deco" style="left:9vw;top:3vw;color:#ef6da5;font-size:2.6em;transform:rotate(-14deg);">&#9829;&#9825;</span>
    <span class="rs-deco" style="right:8vw;top:5vw;color:#e8548e;font-size:3.2em;transform:rotate(10deg);">&#9829;</span>
    <span class="rs-deco" style="right:16vw;top:2.5vw;color:#f2c94c;font-size:1.4em;">&#10022;</span>
    <span class="rs-deco" style="left:17vw;top:8vw;color:#8ad6df;font-size:1.2em;">&#10022;</span>
    <div class="rs-why">Why Choose Us <span class="hh">&#9829;&#9829;</span></div>
    <div><span class="rs-band">なりたい自分になる第一歩を</span></div>
    <h2 class="rs-title">
      <span class="sm"><svg viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="#f2b41e" stroke-width="1.8"><circle cx="12" cy="12" r="10" fill="#ffd94d" stroke="#f2b41e"/><circle cx="8.5" cy="10" r="1.1" fill="#3a3230" stroke="none"/><circle cx="15.5" cy="10" r="1.1" fill="#3a3230" stroke="none"/><path d="M8 14.5c1.2 1.6 2.5 2.4 4 2.4s2.8-.8 4-2.4" stroke="#3a3230" stroke-linecap="round"/></svg></span>
      アカデミー<span class="pk">紹介</span>
    </h2>
    <div class="rs-six">
      <span class="pre">池袋ネイルカレッジ Fee が選ばれる</span>
      <span class="big"><span class="n">6</span>つの理由</span>
    </div>
  </div>

  <!-- カード -->
  <div class="rs-grid">
    <div class="rs-card rs-c1">
      <span class="rs-tag">01</span>
      <span class="rs-ic"><img src="<?php echo $u; ?>/assets/images/parts/rs-ic1.webp" alt="" loading="lazy"></span>
      <div class="rs-body">
        <h3 class="rs-t">サロンワーク<br><span class="c">特化型</span></h3>
        <p class="rs-tx">サロンワークで<span class="rs-hl">即使える</span><br>実践的なネイル技術を、<br>丁寧な指導で習得！</p>
      </div>
      <img class="rs-photo" src="<?php echo $u; ?>/assets/images/parts/rs-photo1.webp" alt="サロンワーク実習の様子" loading="lazy">
    </div>
    <div class="rs-card rs-c2">
      <span class="rs-tag">02</span>
      <span class="rs-ic"><img src="<?php echo $u; ?>/assets/images/parts/rs-ic2.webp" alt="" loading="lazy"></span>
      <div class="rs-body">
        <h3 class="rs-t">少人数制の<br><span class="c">丁寧な指導</span></h3>
        <p class="rs-tx">少人数クラスで<span class="rs-hl">一人ひとり</span>を丁寧にサポート。<br>講師や仲間からアドバイスや<br>フィードバックがもらえる！</p>
      </div>
      <img class="rs-photo" src="<?php echo $u; ?>/assets/images/parts/rs-photo2.webp" alt="少人数制レッスンの様子" loading="lazy">
    </div>
    <div class="rs-card rs-c3">
      <span class="rs-tag">03</span>
      <span class="rs-ic"><img src="<?php echo $u; ?>/assets/images/parts/rs-ic3.webp" alt="" loading="lazy"></span>
      <div class="rs-body">
        <h3 class="rs-t">就職・開業<br><span class="c">サポート充実</span></h3>
        <span class="rs-sub"><img src="<?php echo $u; ?>/assets/images/parts/rs-sub3.webp" alt="履歴書対策・面接対策・開業ノウハウ" loading="lazy"></span>
      </div>
      <img class="rs-photo" src="<?php echo $u; ?>/assets/images/parts/rs-photo3.webp" alt="就職相談の様子" loading="lazy">
    </div>
    <div class="rs-card rs-c4">
      <span class="rs-tag">04</span>
      <span class="rs-ic"><img src="<?php echo $u; ?>/assets/images/parts/rs-ic4.webp" alt="" loading="lazy"></span>
      <div class="rs-body">
        <h3 class="rs-t">他社と比べて<br><span class="c">授業料がお得</span></h3>
        <p class="rs-tx">高品質な授業を<span class="rs-hl">リーズナブル</span>に提供。<br>夢への第一歩を金銭面でも<br>しっかりサポートします。</p>
      </div>
      <img class="rs-photo" src="<?php echo $u; ?>/assets/images/parts/rs-photo4.webp" alt="リーズナブルな授業料" loading="lazy">
    </div>
    <div class="rs-card rs-c5">
      <span class="rs-tag">05</span>
      <span class="rs-ic"><img src="<?php echo $u; ?>/assets/images/parts/rs-ic5.webp" alt="" loading="lazy"></span>
      <div class="rs-body">
        <h3 class="rs-t">初心者に<br><span class="c">優しい</span></h3>
        <span class="rs-sub"><img src="<?php echo $u; ?>/assets/images/parts/rs-sub5.webp" alt="基礎から丁寧に指導・わかりやすいカリキュラム・安心できるサポート体制" loading="lazy"></span>
        <p class="rs-foot"><span class="rs-hl">ゼロから安心してスタートできる！</span></p>
      </div>
      <img class="rs-photo" src="<?php echo $u; ?>/assets/images/parts/rs-photo5.webp" alt="初心者へのレッスン風景" loading="lazy">
    </div>
    <div class="rs-card rs-c6">
      <span class="rs-tag">06</span>
      <span class="rs-ic"><img src="<?php echo $u; ?>/assets/images/parts/rs-ic6.webp" alt="" loading="lazy"></span>
      <div class="rs-body">
        <h3 class="rs-t">最新の<br><span class="c">トレンド技術</span></h3>
        <span class="rs-sub"><img src="<?php echo $u; ?>/assets/images/parts/rs-sub6.webp" alt="最新アート・トレンドデザイン・SNSで話題の技術も" loading="lazy"></span>
        <p class="rs-foot"><span class="rs-hl">今求められる技術</span>をしっかり学べる！</p>
      </div>
      <img class="rs-photo" src="<?php echo $u; ?>/assets/images/parts/rs-photo6.webp" alt="トレンドのネイルデザイン" loading="lazy">
    </div>
  </div>
</section>
