<?php
// アカデミー紹介（Why Choose Us・6つの理由）セクション — コーディング版
// 再現元: 支給デザイン（PC=1920px幅 / SP=1080px幅）を実測して配置。
// アイコンは支給素材 reason1〜6.png（1024×1536の透過PNG。丸の大きさ・位置が
// 画像ごとに違うため、--sc / --ty で丸の直径と中心を揃えて表示している）。
// 見出し・本文はPC/SPで共通（SP用の抜粋版は持たない）。
$u = get_template_directory_uri();
?>
<style>
/* ===== 6つの理由（PC: 1920px基準 / 1em = 1vw） ===== */
.rs { position: relative; overflow: hidden; box-sizing: border-box; font-size: 1vw;
  font-family: var(--font-round); color: #3a3230;
  background: linear-gradient(180deg, #fbe3ec 0%, #fdeef3 22%, #fdf6f6 40%, #fceef2 100%);
  --icsz: 8.2vw; }
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
.rs-six { margin-top: 0.3vw; display: flex; align-items: center; justify-content: center; gap: 1.2vw;
  font-family: var(--font-jp); }
.rs-six .pre { font-size: 1.5em; font-weight: 600; color: #3a3230; }
.rs-six .big { font-size: 2.9em; font-weight: 700; color: #2f2a28; }
.rs-six .big .n { color: #e8397f; font-size: 1.3em; padding-right: .05em; }
.rs-deco { position: absolute; pointer-events: none; }

/* --- カードグリッド（デザイン実測: カード幅46.5vw / 列間2.1vw / 行間1.4vw） --- */
/* 本文の行数がカードごとに違うため、grid-auto-rows:1fr で全行を最大の高さに揃える
   （これがないと3行のカードだけ min-height まで縮んで段差になる） */
.rs-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 1.4vw 2.1vw;
  grid-auto-rows: 1fr;
  max-width: 95vw; margin: 2.2vw auto 0; padding-bottom: 3vw; }
/* min-width:0 がないとテキスト列の最小幅でカードがはみ出す（PCで見切れる原因） */
.rs-card { position: relative; min-width: 0; background: #fff; border-radius: 1.1vw;
  box-shadow: 0 0.3vw 1.1vw rgba(210,150,170,0.16);
  display: grid; grid-template-columns: 10.8vw minmax(0, 1fr) 18.6vw; gap: 0.8vw;
  align-items: center; padding: 1.2vw 0.7vw; min-height: 13.4vw; }

/* --- 番号リボン（カード左上・下辺がV字にへこんだ帯） --- */
.rs-tag { position: absolute; top: -0.9vw; left: -0.4vw; width: 5vw; height: 4.3vw;
  display: flex; align-items: center; justify-content: center; padding-bottom: 0.5vw;
  color: #fff; font-family: var(--font-en); font-weight: 700; font-size: 2.08em; line-height: 1;
  clip-path: polygon(0 0, 100% 0, 100% 100%, 50% 82%, 0 100%); }

/* --- アイコン（丸の直径を --icsz に揃える。--sc=画像高さ倍率 / --ty=縦位置補正） --- */
.rs-ic { position: relative; justify-self: center;
  width: var(--icsz); height: var(--icsz); }
.rs-ic img { position: absolute; left: 50%; top: 0; width: auto;
  height: calc(var(--icsz) * var(--sc));
  transform: translate(-50%, calc(var(--icsz) * var(--ty))); }

/* --- 本文 --- */
.rs-body { min-width: 0; text-align: left; }
.rs-t { font-weight: 800; font-size: 1.77em; line-height: 1.4; color: #2f2a28; margin: 0 0 0.3em; }
.rs-t .c { display: inline-block; }
.rs-tx { font-size: 0.95em; line-height: 1.9; color: #4a4340; margin: 0; font-weight: 500; }
.rs-hl { background: linear-gradient(transparent 58%, #ffe97a 58% 92%, transparent 92%); font-weight: 700; }

/* --- 写真（枠を行の高さいっぱいに伸ばし、画像は中で切り抜き表示） --- */
.rs-pic { position: relative; align-self: stretch; overflow: hidden; border-radius: 0.7vw; }
.rs-pic img { position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; }

/* カードごとの色・アイコン正規化係数 */
.rs-c1 .rs-tag { background: #ec5a96; } .rs-c1 .rs-t .c { color: #ec5a96; }
.rs-c2 .rs-tag { background: #f0a63c; } .rs-c2 .rs-t .c { color: #f0a63c; border-bottom: 0.12em solid #ffd24d; }
.rs-c3 .rs-tag { background: #a98ce4; } .rs-c3 .rs-t .c { color: #a98ce4; border-bottom: 0.12em solid #cdb6f0; }
.rs-c4 .rs-tag { background: #21bcc0; } .rs-c4 .rs-t .c { color: #21bcc0; }
.rs-c5 .rs-tag { background: #e8537d; } .rs-c5 .rs-t .c { color: #e8537d; }
.rs-c6 .rs-tag { background: #5a9fdb; } .rs-c6 .rs-t .c { color: #5a9fdb; }
.rs-c1 .rs-ic { --sc: 2.458; --ty: -0.623; }
.rs-c2 .rs-ic { --sc: 2.306; --ty: -0.584; }
.rs-c3 .rs-ic { --sc: 2.128; --ty: -0.513; }
.rs-c4 .rs-ic { --sc: 2.514; --ty: -0.649; }
.rs-c5 .rs-ic { --sc: 2.016; --ty: -0.456; }
.rs-c6 .rs-ic { --sc: 2.438; --ty: -0.668; }

/* ===== SP（1080px基準 / 1em = 2vw） ===== */
@media (max-width: 768px) {
  .rs { font-size: 2vw; --icsz: 14vw; }
  .rs-head { padding-top: 4vw; }
  .rs-why { font-size: 2.6em; }
  .rs-band { font-size: 1.3em; background: #3a3230; border-radius: 999px; }
  .rs-title { font-size: 3.8em; }
  /* デザイン準拠: 「〜が選ばれる」と「6つの理由」を2行積みに */
  .rs-six { flex-direction: column; gap: 0.5vw; }
  .rs-six .pre { font-size: 1.3em; }
  .rs-six .big { font-size: 2.6em; }
  /* SPは1列で本文量の差が大きいため、高さ揃えはせず内容なりにする */
  .rs-grid { grid-template-columns: 1fr; grid-auto-rows: auto; gap: 1.8vw;
    max-width: 95vw; margin-top: 4vw; padding-bottom: 6vw; }
  /* 本文をそのまま載せるため、アイコンを小さめにしてテキスト列を広く取る */
  .rs-card { grid-template-columns: 12vw minmax(0, 1fr) 40vw; gap: 1vw;
    padding: 1.5vw 0.8vw 1.5vw 1.5vw; min-height: 30vw; border-radius: 3vw; }
  .rs-tag { top: -1.2vw; left: -0.5vw; width: 7.4vw; height: 8.8vw;
    padding-bottom: 1vw; font-size: 2.35em; }
  .rs-t { font-size: 2.1em; line-height: 1.35; margin-bottom: 0.3em; }
  .rs-t .c { border-bottom: 0.25vw solid currentColor; padding-bottom: 0.1em; }
  .rs-c1 .rs-t .c { border-bottom-color: #f7b9d2; }
  .rs-c2 .rs-t .c { border-bottom-color: #f8d9a8; }
  .rs-c3 .rs-t .c { border-bottom-color: #d6c8f2; }
  .rs-c4 .rs-t .c { border-bottom-color: #a5e3e5; }
  .rs-c5 .rs-t .c { border-bottom-color: #f5b5c6; }
  .rs-c6 .rs-t .c { border-bottom-color: #b6d5ee; }
  .rs-body { padding: 7px; }
  /* SPはPC用の改行位置を使わず、列幅にまかせて自然に折り返す */
  .rs-tx { font-size: 1.4em; line-height: 1.85; }
  .rs-tx br { display: none; }
  /* SPは本文が増えてカードが縦長になるため、写真は横長比率を保って上下中央に置く
     （高さいっぱいに伸ばすと左右が切れすぎて被写体が欠ける） */
  .rs-pic { align-self: center; aspect-ratio: 3 / 2; border-radius: 1.8vw; }
}
</style>
<section class="rs" id="features">
  <!-- ヘッダー -->
  <div class="rs-head">
    <span class="rs-deco" style="left:9vw;top:3vw;color:#ef6da5;font-size:2.6em;transform:rotate(-14deg);">&#9829;&#9825;</span>
    <span class="rs-deco" style="right:8vw;top:5vw;color:#e8548e;font-size:3.2em;transform:rotate(10deg);">&#9829;</span>
    <span class="rs-deco" style="right:16vw;top:2.5vw;color:#f2c94c;font-size:1.4em;">&#10022;</span>
    <span class="rs-deco" style="left:17vw;top:8vw;color:#8ad6df;font-size:1.2em;">&#10022;</span>
    <div class="rs-why">Why Choose Us</div>
    <div><span class="rs-band">なりたい自分になる第一歩を</span></div>
    <h2 class="rs-title">
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
      <span class="rs-ic"><img src="<?php echo $u; ?>/assets/images/reason1.png" alt="" loading="lazy"></span>
      <div class="rs-body">
        <h3 class="rs-t">サロンワーク<br><span class="c">特化型</span></h3>
        <p class="rs-tx">サロンワークで<span class="rs-hl">即使える</span><br>実践的なネイル技術を、<br>丁寧な指導で習得！</p>
      </div>
      <span class="rs-pic"><img src="<?php echo $u; ?>/assets/images/features01.png" alt="サロンワーク実習の様子" loading="lazy"></span>
    </div>
    <div class="rs-card rs-c2">
      <span class="rs-tag">02</span>
      <span class="rs-ic"><img src="<?php echo $u; ?>/assets/images/reason2.png" alt="" loading="lazy"></span>
      <div class="rs-body">
        <h3 class="rs-t">少人数制の<br><span class="c">丁寧な指導</span></h3>
        <p class="rs-tx">少人数クラスで<span class="rs-hl">一人ひとり</span>を<br>丁寧にサポート。<br>講師や仲間からアドバイスや<br>フィードバックがもらえる！</p>
      </div>
      <span class="rs-pic"><img src="<?php echo $u; ?>/assets/images/features02.png" alt="少人数制レッスンの様子" loading="lazy"></span>
    </div>
    <div class="rs-card rs-c3">
      <span class="rs-tag">03</span>
      <span class="rs-ic"><img src="<?php echo $u; ?>/assets/images/reason3.png" alt="" loading="lazy"></span>
      <div class="rs-body">
        <h3 class="rs-t">就職・開業<br><span class="c">サポート充実</span></h3>
        <p class="rs-tx">履歴書・面接対策から<br><span class="rs-hl">開業ノウハウ</span>まで、<br>卒業後もしっかり伴走！</p>
      </div>
      <span class="rs-pic"><img src="<?php echo $u; ?>/assets/images/features03.png" alt="就職相談の様子" loading="lazy"></span>
    </div>
    <div class="rs-card rs-c4">
      <span class="rs-tag">04</span>
      <span class="rs-ic"><img src="<?php echo $u; ?>/assets/images/reason4.png" alt="" loading="lazy"></span>
      <div class="rs-body">
        <h3 class="rs-t">他社と比べて<br><span class="c">授業料がお得</span></h3>
        <p class="rs-tx">高品質な授業を<br><span class="rs-hl">リーズナブル</span>に提供。<br>夢への第一歩を金銭面でも<br>しっかりサポートします。</p>
      </div>
      <span class="rs-pic"><img src="<?php echo $u; ?>/assets/images/features04.png" alt="リーズナブルな授業料" loading="lazy"></span>
    </div>
    <div class="rs-card rs-c5">
      <span class="rs-tag">05</span>
      <span class="rs-ic"><img src="<?php echo $u; ?>/assets/images/reason5.png" alt="" loading="lazy"></span>
      <div class="rs-body">
        <h3 class="rs-t">初心者に<br><span class="c">優しい</span></h3>
        <p class="rs-tx"><span class="rs-hl">基礎から丁寧</span>に指導。<br>わかりやすいカリキュラムで<br>ゼロから安心してスタート！</p>
      </div>
      <span class="rs-pic"><img src="<?php echo $u; ?>/assets/images/features05.png" alt="初心者へのレッスン風景" loading="lazy"></span>
    </div>
    <div class="rs-card rs-c6">
      <span class="rs-tag">06</span>
      <span class="rs-ic"><img src="<?php echo $u; ?>/assets/images/reason6.png" alt="" loading="lazy"></span>
      <div class="rs-body">
        <h3 class="rs-t">最新の<br><span class="c">トレンド技術</span></h3>
        <p class="rs-tx"><span class="rs-hl">最新アート</span>やトレンド<br>デザイン、SNSで話題の<br>技術まで幅広く習得！</p>
      </div>
      <span class="rs-pic"><img src="<?php echo $u; ?>/assets/images/features06.jpg" alt="トレンドのネイルデザイン" loading="lazy"></span>
    </div>
  </div>
</section>
