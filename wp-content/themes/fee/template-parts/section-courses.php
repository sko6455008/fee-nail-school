<?php
// コース内容（Choose Your Path）セクション — コーディング版
// 見出しまわりの寸法はデザインカンプ（全幅=100vw基準）から採寸した値
// ヘッダー左右の素材: corse_left.png / corse_right.png（余白入り透過PNG）
// 構成:
//   即戦力ネイリストコースの3ヶ月 / 6ヶ月 / 9ヶ月、アートコースの4グループ。
// 7つのプランをカードで常時表示。SPではカードの説明文（co-item-body）を省略。
// コース名・時間・料金・説明文はこのファイルに直書き。料金はすべて税込表記。
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
/* 上の倍率(--sw)・位置(--tx/--ty)は支給素材の余白に合わせた値なので、管理画面から
   差し替えたときはそのまま使えない。差し替え時は拡大せず、枠の中に丸ごと収める。 */
.co-head-photo.is-custom img { width: 100%; height: 100%; object-fit: contain;
  transform: translate(-50%, -50%); }
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

/* --- コースグループ（期間ごとに見出しとカードを常時表示） --- */
.co-group { position: relative; z-index: 1; max-width: 95.4vw; margin: 0.9vw auto 0;
  background: #fff; border-radius: 1.2vw; padding: 1.6vw 1.9vw 1.9vw; font-size: clamp(16px, 1.25vw, 22px);
  box-shadow: 0 0.3vw 1vw rgba(210,150,170,0.14);
  --gc: #21a89c; --gc-l: rgba(110,200,190,.18); --gline: #e3f1ef; }   /* グループ色（初期値: ティール） */
.co-group + .co-group { margin-top: clamp(24px, 2.4vw, 48px); }
.co-g1 { border: 0.1vw solid #cfe9e5; }
.co-g2 { border: 0.1vw solid #f3cfdf; --gc: #d9569a; --gc-l: rgba(236,140,180,.18); --gline: #f6e6ec; }

/* グループ見出し: 左に写真、右に [ナンバー＋コース名] / [リード＋おすすめチップ]
   写真は右側テキストの高さいっぱいに伸ばして、写真だけが小さく浮かないようにする */
.co-ghead { display: grid; grid-template-columns: 15vw minmax(0, 1fr); grid-template-rows: auto auto;
  column-gap: 1.6vw; row-gap: 0.8vw; align-items: center; }
.co-gpic { position: relative; grid-row: 1 / 3; align-self: stretch; min-height: 10.5vw;
  overflow: hidden; border-radius: 0.9vw; }
.co-gpic img { position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; display: block; }
.co-gtitle { display: flex; align-items: center; gap: 1vw; min-width: 0; }
/* ナンバリング（水彩のにじみ風） */
.co-num { flex: 0 0 auto; width: 3.6vw; height: 3.4vw;
  display: flex; align-items: center; justify-content: center;
  color: #fff; font-family: var(--font-en); font-style: italic; font-weight: 600;
  font-size: 1.6em; line-height: 1;
  border-radius: 46% 54% 52% 48% / 52% 46% 54% 48%; }
.co-g1 .co-num { background: radial-gradient(circle at 45% 38%, #7cd6ca, #29a99a 72%); }
.co-g2 .co-num { background: radial-gradient(circle at 45% 38%, #cbaaee, #9b6fd6 72%); }
.co-t { display: flex; align-items: center; flex-wrap: wrap; gap: .25em .6em;
  margin: 0; font-weight: 700; font-size: clamp(26px, 2.4vw, 44px); line-height: 1.4; letter-spacing: .02em; }
.co-t .p { display: inline-block; color: #e8397f; font-size: 1.12em; padding: 0 .1em; }
.co-duration { display: inline-flex; align-items: baseline; gap: .08em; padding: .08em .45em .13em;
  border-radius: .25em; background: var(--gc-l); color: var(--gc); white-space: nowrap; }
.co-duration strong { font-family: var(--font-en); font-size: 1.5em; line-height: 1; }
.co-gdesc { min-width: 0; }
/* リード文の下線は端がぼけた筆跡風。文字より少し長く引く */
.co-lead { position: relative; display: inline-block; margin: 0;
  font-weight: 700; font-size: 1.03em; line-height: 1.5; padding: 0 0.3em 0.5em; }
.co-lead::after { content: ""; position: absolute; left: 0; right: -0.5em; bottom: 0.05em;
  height: 0.17em; border-radius: 999px;
  background: linear-gradient(90deg, rgba(255,206,90,0) 0%, #ffd166 10%, #ffc233 55%, rgba(255,194,51,0) 100%); }
/* 「こんな方におすすめ」: 見出しラベル＋アイコン入りチップを横一列に */
.co-recs { display: flex; align-items: center; flex-wrap: wrap; gap: 0.6vw 0.7vw; margin-top: 0.9vw; }
.co-recs-t { font-weight: 700; font-size: 0.95em; letter-spacing: .08em; color: var(--gc); margin-right: 0.3vw; }
.co-chip { display: inline-flex; align-items: center; gap: 0.5vw; padding: 0.3vw 1vw 0.3vw 0.4vw;
  border-radius: 999px; background: var(--gc-l); font-weight: 600; font-size: 0.9em; line-height: 1.3;
  white-space: nowrap; }
/* 支給アイコン（course*.png）は余白が大きい透過PNG。--sw/--tx/--ty で大きさと位置を揃える */
.co-icb { position: relative; flex: 0 0 auto; width: 2.6vw; height: 2.6vw; border-radius: 50%;
  background: #fff; --icsz: 1.6vw; }
.co-icb img { position: absolute; left: 50%; top: 50%; height: auto;
  width: calc(var(--icsz) * var(--sw));
  transform: translate(-50%, -50%)
             translate(calc(var(--icsz) * var(--tx)), calc(var(--icsz) * var(--ty))); }
.co-i1 { --sw: 1.812; --tx:  0;      --ty: 0.049; }
.co-i2 { --sw: 1.676; --tx:  0;      --ty: 0.116; }
.co-i3 { --sw: 2.008; --tx: -0.023;  --ty: 0.174; }
.co-i4 { --sw: 2.365; --tx:  0.002;  --ty: 0.109; }
.co-i5 { --sw: 2.138; --tx:  0.002;  --ty: 0.083; }
.co-i6 { --sw: 2.086; --tx: -0.069;  --ty: 0.053; }

/* --- コースカード（PC2列、1プランのグループは全幅） --- */
.co-items { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: clamp(16px, 1.6vw, 32px);
  margin-top: 1.5vw; padding-top: 1.4vw; border-top: 1px solid var(--gline); }
.co-item { min-width: 0; display: flex; flex-direction: column;
  border-radius: 1vw; padding: clamp(20px, 1.8vw, 36px); border: 1px solid; }
.co-item:only-child { grid-column: 1 / -1; }
.co-g1 .co-item { background: #f4fbfa; border-color: #cfe9e5; }
.co-g2 .co-item { background: #fff5f9; border-color: #f3cfdf; }
/* 期間バッジ ＋ 授業時間 */
.co-item-head { display: flex; align-items: center; flex-wrap: wrap; gap: 0.5vw 0.9vw; }
.co-item-term { display: inline-block; color: #fff; font-weight: 700; font-size: 0.95em;
  letter-spacing: .06em; padding: 0.3em 0.95em; border-radius: 999px; line-height: 1.3; white-space: nowrap; }
.co-g1 .co-item-term { background: linear-gradient(135deg, #4fcbb8, #1ea3a8); }
.co-g2 .co-item-term { background: linear-gradient(135deg, #f37bab, #e0439a); }
.co-item-hours { display: flex; align-items: baseline; flex-wrap: wrap; column-gap: .12em;
  font-weight: 700; font-size: 1.5em; line-height: 1.4; color: #2f2a28; }
.co-item-hours .n { font-family: var(--font-en); font-size: 1.45em; padding: 0 .04em; color: var(--gc); }
.co-item-hours small { font-size: .65em; font-weight: 600; color: #6b5b57; white-space: nowrap; }
/* 説明文（支給テキストをそのまま掲載） */
.co-item-body { margin: 1em 0 0; font-weight: 500; font-size: 1em; line-height: 1.85; color: #4a4340; }
.co-item-body p { margin: 0; }
.co-item-body p + p { margin-top: 0.5em; }
/* 「〜な方におすすめ」は薄い黄色の箱で目立たせる */
.co-item-rec { margin: 1em 0 1.2em; padding: 0.65em 0.8em; border-radius: 0.5em;
  background: rgba(255,209,102,.26); font-weight: 700; font-size: 1em; line-height: 1.7; color: #2f2a28; }
/* 下段: 左に料金、右に相談ボタン（カードの高さが揃うよう常に最下部へ） */
.co-item-foot { margin-top: auto; padding-top: 1vw; border-top: 0.1vw solid #e6ddd9;
  display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 0.8vw 1vw; }
.co-item-price { display: flex; align-items: baseline; flex-wrap: wrap; gap: .2em .5em; }
.co-item-fee { font-size: 0.9em; font-weight: 600; letter-spacing: .1em; color: #6b5b57; }
.co-price { font-family: var(--font-en); font-weight: 600; font-size: 2.3em; letter-spacing: .01em;
  line-height: 1.2; color: var(--gc); white-space: nowrap; }
.co-price .tax { font-family: var(--font-jp); font-size: 0.42em; font-weight: 600; color: #4a4340; }
.co-cta { flex: 0 0 auto; min-height: 48px; padding: .65em 1.4em; display: inline-flex; align-items: center; justify-content: center;
  gap: 0.4vw; color: #fff; font-weight: 700; font-size: 1em; white-space: nowrap;
  border-radius: 999px; text-decoration: none; line-height: 1.3;
  transition: transform .12s ease, filter .15s ease;
  box-shadow: 0 0.3vw 0.9vw rgba(150,120,140,0.28); }
.co-g1 .co-cta { background: linear-gradient(135deg, #4fcbb8, #1ea3a8); }
.co-g2 .co-cta { background: linear-gradient(135deg, #f37bab, #e0439a); }
.co-cta:hover { filter: brightness(1.05); }
.co-cta:active { transform: scale(0.98); }
.co-cta:focus-visible { outline: 3px solid var(--gc); outline-offset: 4px; }
.co-cta .ar { font-family: sans-serif; font-size: 1.15em; }

/* --- 注記 --- */
.co-notes { position: relative; z-index: 1; text-align: center; padding: 1.4vw 0 2.4vw;
  font-weight: 500; font-size: clamp(16px, 1.2vw, 22px); line-height: 2; color: #6b5b57; }

/* ===== SP（全幅=100vw基準: font-size 2vw = 1em） ===== */
@media (max-width: 768px) {
  .co { font-size: 2vw;
    background-image: url('<?php echo $u; ?>/assets/images/corse_bg_sp.png'); }
  .co-head { padding-top: 3vw; min-height: 35vw; }
  .co-head-l { left: 0; top: 0; width: 24.6vw; height: 33.8vw; --base: 24.6vw; }
  .co-head-r { right: 0; top: 0; width: 24.6vw; height: 33.8vw; --base: 24.6vw; }
  .co-script { font-size: 2.55em; }
  .co-title { font-size: 3.24em; }
  .co-ribbon { font-size: 1.7em; padding: 0.42em 1.3em; }
  /* SPでは左右の吹き出しを非表示にする */
  .co-bubble.co-bub-l, .co-bubble.co-bub-r { display: none; }

  .co-group { max-width: 95.3vw; margin-top: 3vw; padding: 4vw; border-radius: 3vw;
    font-size: clamp(16px, 3.6vw, 20px); }
  .co-group + .co-group { margin-top: 6vw; }
  /* SPは正方形の写真の下側を白く透かし、コース名と期間を左下にまとめる */
  .co-ghead { grid-template-columns: minmax(0, 1fr); grid-template-rows: auto auto;
    row-gap: clamp(18px, 5vw, 28px); align-items: start; }
  .co-gpic { grid-area: 1 / 1; width: 100%; max-width: 440px; height: auto; aspect-ratio: 1 / 1;
    min-height: 0; justify-self: center; align-self: start; border-radius: clamp(12px, 3vw, 20px); background: #fff; }
  .co-gpic::after { content: ""; position: absolute; inset: 0;
    background: linear-gradient(180deg, rgba(255, 253, 252, 0) 20%, rgba(255, 253, 252, .3) 50%,
      rgba(255, 253, 252, .9) 100%, #fffdfc 100%); }
  .co-gtitle { grid-area: 1 / 1; position: relative; z-index: 1; width: 100%; max-width: 440px;
    justify-self: center; align-self: stretch; align-items: flex-end; justify-content: flex-start;
    padding: clamp(18px, 5vw, 28px); color: #3a3230; text-align: left; }
  .co-num { display: none; }
  .co-t { align-items: flex-start; flex-direction: column; flex-wrap: nowrap; gap: .4em;
    font-size: clamp(20px, 5.7vw, 28px); line-height: 1.5; letter-spacing: .02em; }
  .co-t .p { display: inline; color: inherit; font-size: 1em; padding: 0; }
  .co-duration { gap: .15em; padding: 0; border: 0; border-radius: 0;
    background: none; color: #287b72; font-size: 1em; line-height: 1.1; }
  .co-duration strong { font-size: 3em; font-weight: 600; }
  .co-g2 .co-t { font-size: clamp(26px, 6.8vw, 36px); }
  .co-gdesc { grid-area: 2 / 1; }
  .co-lead { font-size: 1.04em; padding-bottom: 0.6em; }
  .co-recs { gap: 1.2vw 1.5vw; margin-top: 2vw; }
  .co-recs-t { font-size: 0.95em; width: 100%; margin-right: 0; }
  .co-chip { font-size: 0.9em; gap: 2vw; padding: 1vw 2.5vw 1vw 1vw; max-width: 100%; white-space: normal; }
  .co-icb { width: 28px; height: 28px; --icsz: 18px; }

  .co-items { grid-template-columns: minmax(0, 1fr); gap: 4vw; margin-top: 4vw; padding-top: 4vw; }
  .co-item { padding: 4vw; border-radius: 2.5vw; }
  .co-item-head { gap: 2vw; }
  .co-item-term { font-size: .95em; }
  .co-item-hours { font-size: 1.4em; width: 100%; }
  .co-item-body { display: none; }
  .co-item-rec { margin: 3vw 0 4vw; font-size: 1em; }
  /* SPは料金を中央、ボタンを全幅に */
  .co-item-foot { flex-direction: column; align-items: stretch; gap: 3vw; padding-top: 4vw; border-top-width: 1px; }
  .co-item-price { justify-content: center; gap: 1vw; }
  .co-item-fee { font-size: 0.95em; }
  .co-price { font-size: 2.1em; }
  .co-cta { min-height: 48px; font-size: 1em; padding: .8em .6em; }

  .co-notes { font-size: 16px; padding: 5vw 4vw 7vw; }
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
    <span class="co-head-photo co-head-l<?php echo fee_img_is_custom('courses', 'head_l') ? ' is-custom' : ''; ?>"><img <?php fee_img_attr('courses', 'head_l'); ?> loading="lazy" decoding="async"></span>
    <span class="co-head-photo co-head-r<?php echo fee_img_is_custom('courses', 'head_r') ? ' is-custom' : ''; ?>"><img <?php fee_img_attr('courses', 'head_r'); ?> loading="lazy" decoding="async"></span>
    <span class="co-bubble co-bub-l"><span><span class="p">初心者</span>も</span><span>安心して</span><span class="p">スタートできる&#9825;</span></span>
    <span class="co-bubble co-bub-r"><span><span class="p">好きなこと</span>を</span><span>一生の仕事に<span class="p">&#9825;</span></span></span>
    <div class="co-script">Choose Your Path &#9825;</div>
    <h2 class="co-title"><span class="g">コース</span>内容</h2>
    <div><span class="co-ribbon">なりたい未来に合わせて選べる&#9825;</span></div>
  </div>

  <!-- グループ1: 即戦力ネイリストコース 3ヶ月 -->
  <section class="co-group co-g1" aria-labelledby="co-title-3m">
    <div class="co-ghead">
      <span class="co-gpic"><img <?php fee_img_attr('courses', '1'); ?> loading="lazy"></span>
      <div class="co-gtitle">
        <span class="co-num">01</span>
        <h3 class="co-t" id="co-title-3m"><span>即戦力ネイリスト<span class="p">コース</span></span><span class="co-duration"><strong>3</strong>ヶ月</span></h3>
      </div>
      <div class="co-gdesc">
        <p class="co-lead">基礎技術からサロンワークまで集中的に学び、短期間でプロデビューを目指すコース</p>
        <div class="co-recs">
          <span class="co-recs-t">こんな方におすすめ</span>
          <span class="co-chip"><span class="co-icb co-i1"><img src="<?php echo $u; ?>/assets/images/course1.png" alt="" loading="lazy" decoding="async"></span>基礎からサロンワークまで</span>
          <span class="co-chip"><span class="co-icb co-i2"><img src="<?php echo $u; ?>/assets/images/course2.png" alt="" loading="lazy" decoding="async"></span>短期集中でプロデビュー</span>
          <span class="co-chip"><span class="co-icb co-i3"><img src="<?php echo $u; ?>/assets/images/course3.png" alt="" loading="lazy" decoding="async"></span>サロンワーク特化</span>
        </div>
      </div>
    </div>

    <div class="co-items">
      <div class="co-item">
        <div class="co-item-head">
          <span class="co-item-term">3ヶ月コース</span>
          <span class="co-item-hours">全<span class="n">240</span>時間 <small>（4時間×60回）</small></span>
        </div>
        <div class="co-item-body">
          <p>3ヶ月間で全240時間の授業を受講する、短期集中型のコースです。</p>
          <p>基礎技術からサロンワークまで集中的に学び、限られた期間で効率よく技術を身につけます。</p>
        </div>
        <p class="co-item-rec">強い意欲を持ち、最短距離でプロデビューを目指したい方におすすめです。</p>
        <div class="co-item-foot">
          <div class="co-item-price"><span class="co-item-fee">受講料</span><span class="co-price">&yen;350,000<span class="tax">（税込）</span></span></div>
          <a class="co-cta" href="https://lin.ee/IdR5PPL" target="_blank" rel="noopener noreferrer">このコースを相談する<span class="ar">&#8250;</span></a>
        </div>
      </div>

      <div class="co-item">
        <div class="co-item-head">
          <span class="co-item-term">3ヶ月コース</span>
          <span class="co-item-hours">全<span class="n">480</span>時間 <small>（4時間×120回）</small></span>
        </div>
        <div class="co-item-body">
          <p>3ヶ月間で全480時間の授業を受講する、より実践量の多い短期集中型のコースです。</p>
          <p>基礎技術から応用技術、モデル施術、サロンワークまで、豊富な練習時間を通して即戦力となる技術を身につけます。</p>
        </div>
        <p class="co-item-rec">強い意欲を持ち、短期間で徹底的に学び、最短距離でプロデビューを目指したい方におすすめです。</p>
        <div class="co-item-foot">
          <div class="co-item-price"><span class="co-item-fee">受講料</span><span class="co-price">&yen;450,000<span class="tax">（税込）</span></span></div>
          <a class="co-cta" href="https://lin.ee/IdR5PPL" target="_blank" rel="noopener noreferrer">このコースを相談する<span class="ar">&#8250;</span></a>
        </div>
      </div>
    </div>

  </section>

  <!-- グループ2: 即戦力ネイリストコース 6ヶ月 -->
  <section class="co-group co-g1" aria-labelledby="co-title-6m">
    <div class="co-ghead">
      <span class="co-gpic"><img <?php fee_img_attr('courses', '6m'); ?> loading="lazy"></span>
      <div class="co-gtitle">
        <span class="co-num">02</span>
        <h3 class="co-t" id="co-title-6m"><span>即戦力ネイリスト<span class="p">コース</span></span><span class="co-duration"><strong>6</strong>ヶ月</span></h3>
      </div>
      <div class="co-gdesc">
        <p class="co-lead">基礎からサロンワークまで段階的に学び、自分のペースで技術を身につけるコース</p>
        <div class="co-recs">
          <span class="co-recs-t">こんな方におすすめ</span>
          <span class="co-chip"><span class="co-icb co-i1"><img src="<?php echo $u; ?>/assets/images/course1.png" alt="" loading="lazy" decoding="async"></span>基礎からサロンワークまで</span>
          <span class="co-chip"><span class="co-icb co-i2"><img src="<?php echo $u; ?>/assets/images/course2.png" alt="" loading="lazy" decoding="async"></span>仕事や生活と両立</span>
          <span class="co-chip"><span class="co-icb co-i3"><img src="<?php echo $u; ?>/assets/images/course3.png" alt="" loading="lazy" decoding="async"></span>無理なく技術を習得</span>
        </div>
      </div>
    </div>
    <div class="co-items">
      <div class="co-item">
        <div class="co-item-head">
          <span class="co-item-term">6ヶ月コース</span>
          <span class="co-item-hours">全<span class="n">192</span>時間 <small>（4時間×48回）</small></span>
        </div>
        <div class="co-item-body">
          <p>6ヶ月間で全192時間の授業を受講する、無理なく学べる習得型のコースです。</p>
          <p>基礎からサロンワークまで段階的に学び、ゆとりある期間の中で技術を着実に定着させます。</p>
        </div>
        <p class="co-item-rec">仕事や生活と両立しながら、自分のペースでプロデビューを目指したい方におすすめです。</p>
        <div class="co-item-foot">
          <div class="co-item-price"><span class="co-item-fee">受講料</span><span class="co-price">&yen;330,000<span class="tax">（税込）</span></span></div>
          <a class="co-cta" href="https://lin.ee/IdR5PPL" target="_blank" rel="noopener noreferrer">このコースを相談する<span class="ar">&#8250;</span></a>
        </div>
      </div>
    </div>

  </section>

  <!-- グループ3: 即戦力ネイリストコース 9ヶ月 -->
  <section class="co-group co-g1" aria-labelledby="co-title-9m">
    <div class="co-ghead">
      <span class="co-gpic"><img <?php fee_img_attr('courses', '9m'); ?> loading="lazy"></span>
      <div class="co-gtitle">
        <span class="co-num">03</span>
        <h3 class="co-t" id="co-title-9m"><span>即戦力ネイリスト<span class="p">コース</span></span><span class="co-duration"><strong>9</strong>ヶ月</span></h3>
      </div>
      <div class="co-gdesc">
        <p class="co-lead">十分な練習期間を確保し、サロンワークに必要な実践力をじっくり養うコース</p>
        <div class="co-recs">
          <span class="co-recs-t">こんな方におすすめ</span>
          <span class="co-chip"><span class="co-icb co-i1"><img src="<?php echo $u; ?>/assets/images/course1.png" alt="" loading="lazy" decoding="async"></span>基礎から応用まで</span>
          <span class="co-chip"><span class="co-icb co-i2"><img src="<?php echo $u; ?>/assets/images/course2.png" alt="" loading="lazy" decoding="async"></span>じっくり着実に学べる</span>
          <span class="co-chip"><span class="co-icb co-i3"><img src="<?php echo $u; ?>/assets/images/course3.png" alt="" loading="lazy" decoding="async"></span>実践力を身につけたい</span>
        </div>
      </div>
    </div>
    <div class="co-items">
      <div class="co-item">
        <div class="co-item-head">
          <span class="co-item-term">9ヶ月コース</span>
          <span class="co-item-hours">全<span class="n">240</span>時間 <small>（4時間×60回）</small></span>
        </div>
        <div class="co-item-body">
          <p>9ヶ月間で全240時間の授業を受講する、じっくり習得型のコースです。</p>
          <p>十分な練習期間を確保しながら、一つひとつの技術を丁寧に身につけ、サロンワークに必要な実践力を養います。</p>
        </div>
        <p class="co-item-rec">仕事や生活と両立しながら、時間をかけて着実にプロデビューを目指したい方におすすめです。</p>
        <div class="co-item-foot">
          <div class="co-item-price"><span class="co-item-fee">受講料</span><span class="co-price">&yen;450,000<span class="tax">（税込）</span></span></div>
          <a class="co-cta" href="https://lin.ee/IdR5PPL" target="_blank" rel="noopener noreferrer">このコースを相談する<span class="ar">&#8250;</span></a>
        </div>
      </div>

      <div class="co-item">
        <div class="co-item-head">
          <span class="co-item-term">9ヶ月コース</span>
          <span class="co-item-hours">全<span class="n">480</span>時間 <small>（4時間×120回）</small></span>
        </div>
        <div class="co-item-body">
          <p>9ヶ月間で全480時間の授業を受講する、実践重視のプロフェッショナルコースです。</p>
          <p>基礎技術から応用技術、モデル施術、サロンワークまで、豊富な実践経験を積みながら、技術力・施術スピード・接客力を総合的に身につけます。</p>
        </div>
        <p class="co-item-rec">じっくり時間をかけて高い技術力を習得し、卒業後すぐに現場で活躍できるネイリストを目指したい方におすすめです。</p>
        <div class="co-item-foot">
          <div class="co-item-price"><span class="co-item-fee">受講料</span><span class="co-price">&yen;550,000<span class="tax">（税込）</span></span></div>
          <a class="co-cta" href="https://lin.ee/IdR5PPL" target="_blank" rel="noopener noreferrer">このコースを相談する<span class="ar">&#8250;</span></a>
        </div>
      </div>
    </div>
  </section>

  <!-- グループ4: アートコース -->
  <section class="co-group co-g2" aria-labelledby="co-title-art">
    <div class="co-ghead">
      <span class="co-gpic"><img <?php fee_img_attr('courses', '2'); ?> loading="lazy"></span>
      <div class="co-gtitle">
        <span class="co-num">04</span>
        <h3 class="co-t" id="co-title-art"><span>アート<span class="p">コース</span></span></h3>
      </div>
      <div class="co-gdesc">
        <p class="co-lead">アート技術に絞って、必要な内容を効率よく学べる3ヶ月のライトプラン</p>
        <div class="co-recs">
          <span class="co-recs-t">こんな方におすすめ</span>
          <span class="co-chip"><span class="co-icb co-i4"><img src="<?php echo $u; ?>/assets/images/course4.png" alt="" loading="lazy" decoding="async"></span>短期間で効率よく学べる</span>
          <span class="co-chip"><span class="co-icb co-i5"><img src="<?php echo $u; ?>/assets/images/course5.png" alt="" loading="lazy" decoding="async"></span>アート技術に特化</span>
          <span class="co-chip"><span class="co-icb co-i6"><img src="<?php echo $u; ?>/assets/images/course6.png" alt="" loading="lazy" decoding="async"></span>サロンで活かせる表現力</span>
        </div>
      </div>
    </div>

    <div class="co-items">
      <div class="co-item">
        <div class="co-item-head">
          <span class="co-item-term">3ヶ月コース</span>
          <span class="co-item-hours">全<span class="n">24</span>時間 <small>（4時間×6回）</small></span>
        </div>
        <div class="co-item-body">
          <p>3ヶ月間で全24時間の授業を受講する、アート技術に特化したライトプランです。</p>
          <p>ネイルアートの基礎やデザイン技術を中心に学び、通常のネイル施術に活かせる表現力を身につけます。</p>
        </div>
        <p class="co-item-rec">アート技術を重点的に学びたい方や、必要な内容を絞って効率よく受講したい方におすすめです。</p>
        <div class="co-item-foot">
          <div class="co-item-price"><span class="co-item-fee">受講料</span><span class="co-price">&yen;128,000<span class="tax">（税込）</span></span></div>
          <a class="co-cta" href="https://lin.ee/IdR5PPL" target="_blank" rel="noopener noreferrer">このコースを相談する<span class="ar">&#8250;</span></a>
        </div>
      </div>

      <div class="co-item">
        <div class="co-item-head">
          <span class="co-item-term">3ヶ月コース</span>
          <span class="co-item-hours">全<span class="n">40</span>時間 <small>（4時間×10回）</small></span>
        </div>
        <div class="co-item-body">
          <p>3ヶ月間で全40時間の授業を受講する、アート技術をより実践的に学べるライトプランです。</p>
          <p>基本的なアート技術から応用デザインまで、練習時間を確保しながら幅広く習得します。</p>
        </div>
        <p class="co-item-rec">ネイルアートの技術力を高めたい方や、サロンで活かせるデザインの幅を広げたい方におすすめです。</p>
        <div class="co-item-foot">
          <div class="co-item-price"><span class="co-item-fee">受講料</span><span class="co-price">&yen;178,000<span class="tax">（税込）</span></span></div>
          <a class="co-cta" href="https://lin.ee/IdR5PPL" target="_blank" rel="noopener noreferrer">このコースを相談する<span class="ar">&#8250;</span></a>
        </div>
      </div>
    </div>
  </section>

  <!-- 注記 -->
  <div class="co-notes">
    ※分割払いも可能ですのでご相談ください。<br>
  </div>
</section>
