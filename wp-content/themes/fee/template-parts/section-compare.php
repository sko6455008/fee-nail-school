<?php
// 比較表セクション（池袋ネイルカレッジFee vs 一般的なスクール）— コーディング版
// アイコン素材: compare_icon1〜6.png / compare_badge.png / compare_person.png
// 寸法はデザインカンプ（PC 全幅=100vw基準 / SP 全幅=100vw基準）から採寸した値
$u = get_template_directory_uri();
?>
<style>
/* ===== 比較表（PC: font-size 1vw = 1em として全サイズを vw 換算） ===== */
.cm { position: relative; box-sizing: border-box; font-size: 1vw;
  font-family: var(--font-round); color: #3a3230;
  --pink: #f5106e;      /* 数字・見出しの濃ピンク */
  --pink-l: #f7a8c4;    /* 枠線などの淡ピンク */
  --purple: #5a24bb;    /* 右列の数字 */
  --purple-l: #8050e8;  /* 右列の罫線・アイコン */
  --yellow: #f8d820;    /* 「最短」タグ */
  --marker: #ffe070;    /* 蛍光ペン風のライン */
}
.cm * { box-sizing: border-box; }
.cm-grid { display: grid; grid-template-columns: 65.7fr 34.3fr; padding:3vw 0;}
.cm-l, .cm-r { position: relative;
  display: flex; flex-direction: column; align-items: center; justify-content: center;
  text-align: center; }
.cm-l { background: #fff5f6; border-bottom: 0.1vw solid #f6dbe3; padding: 0.6vw 2vw; }
.cm-r { background: #f0e8fd; border-bottom: 0.1vw solid #ded3f4; border-left: 0.1vw solid #e6dcf2;
  padding: 0.6vw 1.5vw; color: #3d3550; }
.cm-hd   { min-height: 9.6vw; }
.cm-row1 { min-height: 9.95vw; }
.cm-row2 { min-height: 10.9vw; }
.cm-row3 { min-height: 7.7vw; }
.cm-row4 { min-height: 15.9vw; }
.cm-row5 { min-height: 11.7vw; border-bottom: 0; }

/* --- 装飾: 黄色い4方向キラキラ --- */
.cm-spark { position: absolute; pointer-events: none; color: #f8d548; line-height: 1; }
.cm-spark::before { content: "\2726"; display: block; transform: scaleY(1.25); }
/* --- 装飾: 見出し両脇の3本線 --- */
.cm-slash { display: inline-block; width: 0.45em; height: 0.72em; vertical-align: middle;
  flex: 0 0 auto; color: var(--pink);
  background:
    linear-gradient(currentColor, currentColor) 0 0    / 0.42em 0.1em no-repeat,
    linear-gradient(currentColor, currentColor) 0 50%  / 0.42em 0.1em no-repeat,
    linear-gradient(currentColor, currentColor) 0 100% / 0.42em 0.1em no-repeat;
  transform: rotate(-32deg); }
.cm-slash.r { transform: scaleX(-1) rotate(-32deg); }
/* --- 装飾: 蛍光ペン --- */
.cm-mk { background: linear-gradient(transparent 55%, var(--marker) 55% 88%, transparent 88%); }
.cm-ul { background: linear-gradient(transparent 84%, var(--marker) 84% 100%); padding-bottom: 0.1em; }

/* --- ヘッダー行 --- */
.cm-name { display: flex; align-items: center; justify-content: center; gap: 0.5em;
  font-weight: 800; font-size: 4.05em; color: var(--pink); letter-spacing: .01em; line-height: 1;
  text-shadow: 0 0.055em 0 #fff, 0 -0.055em 0 #fff, 0.055em 0 0 #fff, -0.055em 0 0 #fff; }
.cm-name .fee { font-family: var(--font-script); color: #2f2a28; font-size: 1.15em;
  line-height: 1; padding: 0 .08em; text-shadow: none; }
.cm-oursc { display: inline-block; margin-top: 0.75vw; background: #f82878; color: #fff;
  font-weight: 800; font-size: 1.85em; letter-spacing: .3em; line-height: 1.35;
  padding: 0.2em 4.9em 0.2em 5.2em;
  clip-path: polygon(0 0, 100% 0, calc(100% - 0.62em) 50%, 100% 100%, 0 100%, 0.62em 50%); }
.cm-other { font-weight: 800; font-size: 1.95em; }

/* --- 行1: 期間 --- */
.cm-r1l { display: flex; align-items: center; justify-content: center; gap: 0.45vw; }
.cm-tag { background: var(--yellow); color: #3a3230; font-weight: 800; font-size: 2.3em;
  padding: 0.16em 0.45em; border-radius: 0.28em; line-height: 1.2; }
.cm-m3 { font-weight: 800; font-size: 2.6em; line-height: 1.1; }
.cm-m3 .n { color: var(--pink); font-size: 2.65em; line-height: 0.72; padding-right: .04em; }
.cm-pill { margin-top: 0.25vw; background: #fff; border-radius: 999px; font-weight: 800;
  font-size: 1.95em; line-height: 1.3; padding: 0.22em 0.95em; }
.cm-m6 { font-weight: 800; font-size: 2.75em; line-height: 1.1; }
.cm-m6 .n { color: var(--purple); font-size: 2.2em; line-height: 0.72; padding-right: .04em; }

/* --- 行2: 1コマ --- */
.cm-koma { width: 50.9vw; border: 0.16vw solid var(--pink-l); border-radius: 1.5vw;
  padding: 0.6vw 1vw 0.7vw; }
.cm-koma-t { display: flex; align-items: center; justify-content: center; gap: 0.35em;
  font-weight: 800; font-size: 4.2em; color: var(--pink); line-height: 0.9; }
.cm-koma-t .n { font-size: 1.64em; line-height: 0.72; }
.cm-koma-s { margin-top: 0.15vw; font-weight: 700; font-size: 2em; line-height: 1.2; }
.cm-koma-s .n { color: var(--pink); font-weight: 800; font-size: 1.2em; line-height: 1; padding: 0 .1em; }
.cm-koma-s .sp { display: none; }
.cm-koma3 { font-weight: 800; font-size: 2.85em; line-height: 1.25;
  border-bottom: 0.12vw dotted var(--purple-l); padding-bottom: 0.3em; }
.cm-koma3 .n { color: var(--purple); font-size: 1.75em; line-height: 0.72; padding: 0 .04em; }
.cm-short { margin-top: 0.55vw; font-weight: 800; font-size: 2.37em; line-height: 1.3; }

/* --- 行3: モデル --- */
.cm-model-t { display: flex; align-items: center; justify-content: center; gap: 0.45em;
  font-weight: 800; font-size: 2.5em; color: var(--pink); letter-spacing: .03em; line-height: 1.25; }
.cm-model-s { margin-top: 0.35vw; font-weight: 700; font-size: 2em; line-height: 1.35; }
.cm-model-r { font-weight: 700; font-size: 2.15em; line-height: 1.6; }

/* --- 行4: 0円 --- */
.cm-zerobox { width: 100%; }
.cm-zero { display: flex; align-items: baseline; justify-content: center; line-height: 1; }
.cm-zero .t { font-weight: 800; font-size: 2.55em; }
.cm-zero .n { color: var(--pink); font-weight: 800; font-size: 7.1em; line-height: 0.78;
  padding: 0 .04em 0 .1em; }
.cm-zero .y { color: var(--pink); font-weight: 800; font-size: 4em; padding-right: .12em; }
.cm-frees { display: flex; gap: 1.3vw; margin-top: 0.8vw; justify-content: center; }
.cm-free { background: #fff; border-radius: 0.8vw; flex: 1 1 0; max-width: 19.7vw; height: 7.7vw;
  display: grid; grid-template-columns: auto minmax(0, 1fr); align-items: center;
  padding: 0 0.7vw; }
.cm-free .t { font-weight: 800; font-size: 2em; line-height: 1.3; text-align: center;
  white-space: nowrap; }
.cm-free .t .p { color: var(--pink); }
.cm-free3 + .t { font-size: 1.35em; }   /* 「アートセミナー無料」は文字数が多いので小さめ */
.cm-paid { background: #fff; border-radius: 0.9vw; width: 28.6vw; height: 14.3vw;
  display: flex; flex-direction: column; justify-content: center; padding: 0 1.3vw; }
.cm-paid-row { display: flex; align-items: center; gap: 0.5vw; flex: 1 1 0;
  font-weight: 700; font-size: 1.85em; }
.cm-paid-row + .cm-paid-row { border-top: 0.1vw dotted var(--purple-l); }

/* --- 行5: モデル人数 --- */
.cm-r5l { display: flex; align-items: center; justify-content: center; gap: 3vw; }
.cm-r5-t { font-weight: 800; font-size: 1.85em; line-height: 1.3; }
.cm-r5-n { margin-top: 0.2vw; font-weight: 800; font-size: 3em; line-height: 1.15; }
.cm-r5-n .n { color: var(--pink); font-size: 1.97em; line-height: 0.78; padding-right: .03em; }
.cm-r5-n .s { color: var(--pink); }
.cm-r5r { display: flex; align-items: center; justify-content: center; gap: 1.8vw;
  font-weight: 800; font-size: 2.4em; line-height: 1.1; }
.cm-r5r .n { color: var(--purple); font-size: 2.6em; line-height: 0.78; padding-right: .03em; }

/* --- 支給アイコン（1536×1024の余白入りPNG。--sw で拡大率、--tx/--ty で中心合わせ） --- */
.cm-ic { position: relative; flex: 0 0 auto; width: var(--icsz); height: var(--icsz); }
.cm-ic img { position: absolute; left: 50%; top: 50%; height: auto;
  width: calc(var(--icsz) * var(--sw));
  transform: translate(-50%, -50%)
             translate(calc(var(--icsz) * var(--tx)), calc(var(--icsz) * var(--ty))); }
.cm-free .cm-ic { --icsz: 6.4vw; }
.cm-free1 { --sw: 2.306; --tx: 0;      --ty: 0.039; }
.cm-free2 { --sw: 2.560; --tx: 0;      --ty: 0.028; }
.cm-free3 { --sw: 2.070; --tx: 0.024;  --ty: 0.030; }
.cm-paid-row .cm-ic { --icsz: 4.3vw; }
.cm-paid1 { --sw: 3.000; --tx: 0; --ty: 0.093; }
.cm-paid2 { --sw: 2.926; --tx: 0; --ty: 0.057; }
.cm-paid3 { --sw: 3.597; --tx: 0; --ty: 0.054; }
.cm-badge { --icsz: 10.5vw; --sw: 2.266; --tx: -0.010; --ty: 0.082; }
.cm-ppl   { --icsz: 5.8vw; --sw: 2.590; --tx: 0.003;  --ty: 0.053; }

/* ===== SP（全幅=100vw基準: font-size 1.6vw = 1em） ===== */
@media (max-width: 768px) {
  .cm { font-size: 1.6vw; }
  .cm-grid { grid-template-columns: 67.7fr 32.3fr; }
  .cm-l { padding: 0.6vw 1.5vw; border-bottom-width: 0.25vw; }
  .cm-r { padding: 0.6vw 1vw; border-bottom-width: 0.25vw; border-left-width: 0.25vw; }
  .cm-hd   { min-height: 16.3vw; }
  .cm-row1 { min-height: 16.3vw; }
  .cm-row2 { min-height: 23.4vw; }
  .cm-row3 { min-height: 14.3vw; }
  .cm-row4 { min-height: 43.1vw; }
  .cm-row5 { min-height: 16.3vw; }

  .cm-name { font-size: 3.1em; gap: 0.3em; }
  .cm-oursc { margin-top: 1.4vw; font-size: 1.96em; letter-spacing: .28em;
    padding: 0.24em 3.3em 0.24em 3.6em; }
  .cm-other { font-size: 1.88em; }

  .cm-r1l { gap: 1vw; }
  .cm-tag { font-size: 2.4em; }
  .cm-m3 { font-size: 2.5em; }
  .cm-m3 .n { font-size: 3.45em; }
  .cm-pill { margin-top: 0.3vw; font-size: 2.05em; padding: 0.24em 1.2em; }
  .cm-m6 { font-size: 3.1em; }
  .cm-m6 .n { font-size: 2.8em; }

  .cm-koma { width: 60.9vw; border-width: 0.3vw; border-radius: 3vw; padding: 1.4vw 1vw 1.6vw; }
  .cm-koma-t { font-size: 4.2em; gap: 0.25em; }
  .cm-koma-t .n { font-size: 1.72em; }
  .cm-koma-s { margin-top: 0.4vw; font-size: 2.3em; line-height: 1.15; }
  .cm-koma-s .pc { display: none; }
  .cm-koma-s .sp { display: block; }
  .cm-koma3 { font-size: 2.3em; border-bottom-width: 0.25vw; }
  .cm-koma3 .n { font-size: 1.83em; }
  .cm-short { margin-top: 1vw; font-size: 2.71em; }

  .cm-model-t { font-size: 2.5em; gap: 0.25em; }
  .cm-model-s { margin-top: 0.6vw; font-size: 2.15em; }
  .cm-model-r { font-size: 1.8em; line-height: 1.55; }

  /* SP はピンク枠の中に「0円」とバナー3本をまとめる */
  .cm-zerobox { border: 0.3vw solid var(--pink-l); border-radius: 3vw; padding: 1vw 3.1vw 1.4vw; }
  .cm-zero .t { font-size: 2.86em; }
  .cm-zero .n { font-size: 8.2em; }
  .cm-zero .y { font-size: 4.6em; }
  .cm-frees { flex-direction: column; gap: 0.7vw; margin-top: 1vw; }
  .cm-free { max-width: none; height: 9.4vw; border-radius: 999px; padding: 0 1.2vw; }
  .cm-free .t { font-size: 3.4em; }
  .cm-free3 + .t { font-size: 2.5em; }
  .cm-paid { width: 100%; height: auto; border-radius: 2vw; padding: 1vw 1vw; }
  .cm-paid-row { gap: 1.3vw; font-size: 1.75em; padding: 1.4vw 0; }
  .cm-paid-row + .cm-paid-row { border-top-width: 0.25vw; }

  .cm-r5l { gap: 2vw; }
  .cm-r5-t { font-size: 2em; }
  .cm-r5-n { font-size: 2.7em; }
  .cm-r5-n .n { font-size: 2.75em; }
  .cm-r5r { gap: 1.4vw; font-size: 1.73em; }
  .cm-r5r .n { font-size: 3em; }

  .cm-free .cm-ic { --icsz: 9.2vw; }
  .cm-paid-row .cm-ic { --icsz: 4.2vw; }
  .cm-badge { --icsz: 14.5vw; }
  .cm-ppl   { --icsz: 6.6vw; }
}
</style>
<section class="cm" id="compare">
  <div class="cm-grid">
    <!-- ヘッダー行 -->
    <div class="cm-l cm-hd">
      <span class="cm-spark" style="left:5vw;top:5.2vw;font-size:1.9em;"></span>
      <span class="cm-spark" style="left:2.6vw;top:3.4vw;font-size:1.2em;"></span>
      <div class="cm-name">
        <span class="cm-mk">池袋ネイルカレッジ<span class="fee">Fee</span></span>
      </div>
      <span class="cm-oursc">当スクール</span>
    </div>
    <div class="cm-r cm-hd"><div class="cm-other">一般的なスクール</div></div>

    <!-- 行1: 期間 -->
    <div class="cm-l cm-row1">
      <span class="cm-spark" style="left:14vw;top:2.4vw;font-size:1.8em;"></span>
      <span class="cm-spark" style="left:11.5vw;top:4.4vw;font-size:1.1em;"></span>
      <span class="cm-spark" style="right:11vw;top:2.6vw;font-size:1.8em;"></span>
      <span class="cm-spark" style="right:13.5vw;top:4.6vw;font-size:1.1em;"></span>
      <div class="cm-r1l">
        <span class="cm-tag">最短</span>
        <span class="cm-m3"><span class="n">3</span>ヶ月</span>
      </div>
      <div class="cm-pill">でネイリストに！</div>
    </div>
    <div class="cm-r cm-row1"><div class="cm-m6"><span class="n">6</span>ヶ月〜</div></div>

    <!-- 行2: 1コマ -->
    <div class="cm-l cm-row2">
      <div class="cm-koma">
        <div class="cm-koma-t">
          <span class="cm-slash"></span>
          <span class="cm-mk"><span class="n">1</span>コマ<span class="n">8</span>時間</span>
          <span class="cm-slash r"></span>
        </div>
        <div class="cm-koma-s">総授業時間 <span class="n">480</span> 時間<span class="pc">　</span><span class="sp"></span>1時間あたり <span class="n">875</span> 円</div>
      </div>
    </div>
    <div class="cm-r cm-row2">
      <div class="cm-koma3">1コマ<span class="n">3</span>時間</div>
      <div class="cm-short">短時間授業</div>
    </div>

    <!-- 行3: モデル -->
    <div class="cm-l cm-row3">
      <div class="cm-model-t">
        <span class="cm-slash"></span>モデルはスクールが用意！<span class="cm-slash r"></span>
      </div>
      <div class="cm-model-s">自分で探す<span class="cm-mk">必要なし</span></div>
    </div>
    <div class="cm-r cm-row3"><div class="cm-model-r">自分でモデルを探す<br>必要がある</div></div>

    <!-- 行4: 0円 -->
    <div class="cm-l cm-row4">
      <span class="cm-spark" style="left:9vw;top:3vw;font-size:1.9em;"></span>
      <span class="cm-spark" style="left:12vw;top:5.2vw;font-size:1.1em;"></span>
      <span class="cm-spark" style="right:8vw;top:3.2vw;font-size:1.9em;"></span>
      <span class="cm-spark" style="right:11vw;top:5.4vw;font-size:1.1em;"></span>
      <div class="cm-zerobox">
        <div class="cm-zero"><span class="t">すべて</span><span class="n">0</span><span class="y">円</span><span class="t">で学べる！</span></div>
        <div class="cm-frees">
          <div class="cm-free">
            <span class="cm-ic cm-free1"><img src="<?php echo $u; ?>/assets/images/compare_icon1.png" alt="" loading="lazy" decoding="async"></span>
            <span class="t"><span class="p">商材費</span>無料</span>
          </div>
          <div class="cm-free">
            <span class="cm-ic cm-free2"><img src="<?php echo $u; ?>/assets/images/compare_icon2.png" alt="" loading="lazy" decoding="async"></span>
            <span class="t"><span class="p">教材費</span>無料</span>
          </div>
          <div class="cm-free">
            <span class="cm-ic cm-free3"><img src="<?php echo $u; ?>/assets/images/compare_icon3.png" alt="" loading="lazy" decoding="async"></span>
            <span class="t"><span class="p">アートセミナー</span>無料</span>
          </div>
        </div>
      </div>
    </div>
    <div class="cm-r cm-row4">
      <div class="cm-paid">
        <div class="cm-paid-row">
          <span class="cm-ic cm-paid1"><img src="<?php echo $u; ?>/assets/images/compare_icon4.png" alt="" loading="lazy" decoding="async"></span>商材も有料
        </div>
        <div class="cm-paid-row">
          <span class="cm-ic cm-paid2"><img src="<?php echo $u; ?>/assets/images/compare_icon5.png" alt="" loading="lazy" decoding="async"></span>教材費有料
        </div>
        <div class="cm-paid-row">
          <span class="cm-ic cm-paid3"><img src="<?php echo $u; ?>/assets/images/compare_icon6.png" alt="" loading="lazy" decoding="async"></span>オプション別料金
        </div>
      </div>
    </div>

    <!-- 行5: モデル人数 -->
    <div class="cm-l cm-row5">
      <span class="cm-spark" style="right:13vw;top:2.4vw;font-size:1.9em;"></span>
      <span class="cm-spark" style="right:9vw;bottom:2.6vw;font-size:1.3em;"></span>
      <div class="cm-r5l">
        <span class="cm-ic cm-badge"><img src="<?php echo $u; ?>/assets/images/compare_badge.png" alt="卒業までのモデル人数200人以上" loading="lazy" decoding="async"></span>
        <div>
          <div class="cm-r5-t">卒業までのモデル人数</div>
          <div class="cm-r5-n cm-ul"><span class="n">200</span><span class="s">人以上</span></div>
        </div>
      </div>
    </div>
    <div class="cm-r cm-row5">
      <div class="cm-r5r">
        <span class="cm-ic cm-ppl"><img src="<?php echo $u; ?>/assets/images/compare_person.png" alt="" loading="lazy" decoding="async"></span>
        <span><span class="n">30</span>人程度</span>
      </div>
    </div>
  </div>
</section>
