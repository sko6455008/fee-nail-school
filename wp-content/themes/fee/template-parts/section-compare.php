<?php
// 比較表セクション（池袋ネイルカレッジFee vs 一般的なスクール）— コーディング版
// 再現元: lp-pc-1.webp（y6890〜8250付近）/ lp-sp-1.webp
$u = get_template_directory_uri();
?>
<style>
/* ===== 比較表（PC: 1920px基準） ===== */
.cm { position: relative; box-sizing: border-box; font-size: 1vw;
  font-family: var(--font-round); color: #3a3230; }
.cm * { box-sizing: border-box; }
.cm-grid { display: grid; grid-template-columns: 65.8fr 34.2fr; }
.cm-l { background: #fdf1f1; border-bottom: 0.25vw solid #fff;
  display: flex; flex-direction: column; align-items: center; justify-content: center;
  text-align: center; padding: 1.8vw 2vw; position: relative; }
.cm-r { background: #eae5f8; border-bottom: 0.25vw solid #fff; border-left: 0.25vw solid #fff;
  display: flex; flex-direction: column; align-items: center; justify-content: center;
  text-align: center; padding: 1.8vw 1.5vw; color: #3f3a58; }

/* --- ヘッダー行 --- */
.cm-name { font-weight: 800; font-size: 3.1em; color: #e8397f; letter-spacing: .02em; position: relative; }
.cm-name .fee { font-family: var(--font-script); color: #2f2a28; font-size: 1.15em; padding: 0 .1em;
  background: linear-gradient(transparent 55%, #ffe97a 55% 92%, transparent 92%); }
.cm-oursc { display: inline-block; margin-top: 0.7vw; background: #ec5a96; color: #fff;
  font-weight: 800; font-size: 1.6em; letter-spacing: .3em; padding: 0.3em 2em; line-height: 1.3;
  clip-path: polygon(0 0, 100% 0, calc(100% - 0.6em) 50%, 100% 100%, 0 100%, 0.6em 50%); }
.cm-other { font-weight: 800; font-size: 2.1em; color: #3f3a58; }

/* --- 数字強調（共通） --- */
.cm-big-p { color: #e8397f; font-weight: 800; }
.cm-big-v { color: #6a55c8; font-weight: 800; }

/* --- 行1: 期間 --- */
.cm-r1l { display: flex; align-items: center; justify-content: center; gap: 0.8vw; flex-wrap: wrap; }
.cm-tag { background: #ffe14d; color: #3a3230; font-weight: 800; font-size: 1.7em;
  padding: 0.18em 0.5em; border-radius: 0.25em; }
.cm-m3 { font-weight: 800; font-size: 2em; }
.cm-m3 .n { color: #e8397f; font-size: 2.3em; padding-right: .06em; }
.cm-pill { background: #fff; border-radius: 999px; font-weight: 800; font-size: 1.7em;
  padding: 0.3em 1.1em; }
.cm-m6 { font-weight: 800; font-size: 2.1em; }
.cm-m6 .n { color: #6a55c8; font-size: 2.2em; padding-right: .06em; }

/* --- 行2: 1コマ --- */
.cm-koma { border: 0.18vw solid #f088b0; border-radius: 1.6vw; padding: 1vw 2.6vw 1.2vw; }
.cm-koma-t { font-weight: 800; font-size: 3.2em; color: #e8397f; letter-spacing: .06em; }
.cm-koma-s { margin-top: 0.3vw; font-weight: 700; font-size: 1.55em; }
.cm-koma-s .n { color: #e8397f; font-weight: 800; font-size: 1.25em; padding: 0 .1em; }
.cm-koma3 { font-weight: 800; font-size: 2.1em;
  border-bottom: 0.14vw dotted #8a76d8; padding-bottom: 0.25em; }
.cm-koma3 .n { color: #6a55c8; font-size: 1.35em; padding: 0 .06em; }
.cm-short { margin-top: 0.6vw; font-weight: 800; font-size: 1.8em; }

/* --- 行3: モデル --- */
.cm-model-t { font-weight: 800; font-size: 2.2em; color: #e8397f; letter-spacing: .04em; }
.cm-model-t .sl { color: #e8397f; font-weight: 500; padding: 0 .4em; }
.cm-model-s { margin-top: 0.4vw; font-weight: 700; font-size: 1.7em; }
.cm-model-s .hl { background: linear-gradient(transparent 55%, #ffe97a 55% 92%, transparent 92%); font-weight: 800; }
.cm-model-r { font-weight: 700; font-size: 1.75em; line-height: 1.8; }

/* --- 行4: 0円 --- */
.cm-zero { display: flex; align-items: center; justify-content: center; gap: 0.6vw; }
.cm-zero .t { font-weight: 800; font-size: 2.2em; }
.cm-zero .n { color: #e8397f; font-weight: 800; font-size: 4.6em; line-height: 1; }
.cm-zero .y { color: #e8397f; font-weight: 800; font-size: 2.4em; }
.cm-frees { display: flex; gap: 1.2vw; margin-top: 1vw; width: 100%; justify-content: center; }
.cm-free { background: #fff; border-radius: 0.7vw; flex: 1 1 0; max-width: 19vw;
  display: flex; align-items: center; justify-content: center; gap: 0.6vw; padding: 0.9vw 0.6vw; }
.cm-free img { width: 3.4vw; height: auto; display: block; }
.cm-free .t { font-weight: 800; font-size: 1.5em; }
.cm-free .t .p { color: #e8397f; }
.cm-paid { background: #fff; border-radius: 0.9vw; padding: 1vw 1.6vw; width: 100%; max-width: 28vw; }
.cm-paid-row { display: flex; align-items: center; gap: 1vw; padding: 0.55vw 0;
  font-weight: 700; font-size: 1.6em; color: #3f3a58; }
.cm-paid-row + .cm-paid-row { border-top: 0.12vw dotted #b0a2e0; }
.cm-paid-row svg { width: 1.5em; height: 1.5em; flex: 0 0 auto; color: #6a55c8; }

/* --- 行5: モデル人数 --- */
.cm-r5l { display: flex; align-items: center; justify-content: center; gap: 1.6vw; }
.cm-r5l img { width: 12vw; height: auto; display: block; }
.cm-r5-t { font-weight: 800; font-size: 1.9em; }
.cm-r5-n { font-weight: 800; font-size: 2em; }
.cm-r5-n .n { color: #e8397f; font-size: 2.4em; padding-right: .05em; }
.cm-r5r { display: flex; align-items: center; gap: 1vw; font-weight: 800; font-size: 1.9em; }
.cm-r5r img { width: 5.5vw; height: auto; display: block; }
.cm-r5r .n { color: #6a55c8; font-size: 2.2em; padding-right: .05em; }

.cm-spark { position: absolute; pointer-events: none; color: #f2c94c; }
.cm-spark::before { content: "\2726"; }

/* ===== SP（1080px基準: font-size 2vw） ===== */
@media (max-width: 768px) {
  .cm { font-size: 1.6vw; }
  .cm-grid { grid-template-columns: 62fr 38fr; }
  .cm-l { padding: 2.5vw 1.5vw; }
  .cm-r { padding: 2.5vw 1vw; }
  .cm-name { font-size: 2.4em; }
  .cm-frees { flex-direction: column; align-items: stretch; gap: 1vw; }
  .cm-free { max-width: none; padding: 1.2vw; }
  .cm-free img { width: 5vw; }
  .cm-paid { max-width: none; padding: 1.5vw 2vw; }
  .cm-r5l { flex-direction: column; gap: 1vw; }
  .cm-r5l img { width: 16vw; }
  .cm-r5r { flex-direction: column; gap: 0.5vw; }
  .cm-r5r img { width: 8vw; }
}
</style>
<section class="cm" id="compare">
  <div class="cm-grid">
    <!-- ヘッダー行 -->
    <div class="cm-l">
      <span class="cm-spark" style="left:8vw;top:2vw;font-size:1.6em;"></span>
      <span class="cm-spark" style="right:9vw;top:3vw;font-size:1.2em;"></span>
      <div class="cm-name">池袋ネイルカレッジ<span class="fee">Fee</span></div>
      <span class="cm-oursc">当スクール</span>
    </div>
    <div class="cm-r"><div class="cm-other">一般的なスクール</div></div>

    <!-- 行1: 期間 -->
    <div class="cm-l">
      <span class="cm-spark" style="left:12vw;top:2.5vw;font-size:1.7em;"></span>
      <span class="cm-spark" style="right:13vw;bottom:2.5vw;font-size:1.4em;"></span>
      <div class="cm-r1l">
        <span class="cm-tag">最短</span>
        <span class="cm-m3"><span class="n">3</span>ヶ月</span>
      </div>
      <div style="margin-top:0.7vw;"><span class="cm-pill">でネイリストに！</span></div>
    </div>
    <div class="cm-r"><div class="cm-m6"><span class="n">6</span>ヶ月〜</div></div>

    <!-- 行2: 1コマ -->
    <div class="cm-l">
      <div class="cm-koma">
        <div class="cm-koma-t">1コマ8時間</div>
        <div class="cm-koma-s">総授業時間 <span class="n">480</span> 時間　1時間あたり <span class="n">875</span> 円</div>
      </div>
    </div>
    <div class="cm-r">
      <div class="cm-koma3">1コマ<span class="n">3</span>時間</div>
      <div class="cm-short">短時間授業</div>
    </div>

    <!-- 行3: モデル -->
    <div class="cm-l">
      <div class="cm-model-t"><span class="sl">＼</span>モデルはスクールが用意！<span class="sl">／</span></div>
      <div class="cm-model-s">自分で探す<span class="hl">必要なし</span></div>
    </div>
    <div class="cm-r"><div class="cm-model-r">自分でモデルを探す<br>必要がある</div></div>

    <!-- 行4: 0円 -->
    <div class="cm-l">
      <span class="cm-spark" style="left:14vw;top:2vw;font-size:1.6em;"></span>
      <span class="cm-spark" style="right:14vw;top:2.5vw;font-size:1.3em;"></span>
      <div class="cm-zero"><span class="t">すべて</span><span class="n">0</span><span class="y">円</span><span class="t">で学べる！</span></div>
      <div class="cm-frees">
        <div class="cm-free"><img src="<?php echo $u; ?>/assets/images/parts/cmp-free1.webp" alt="" loading="lazy"><span class="t"><span class="p">商材費</span>無料</span></div>
        <div class="cm-free"><img src="<?php echo $u; ?>/assets/images/parts/cmp-free2.webp" alt="" loading="lazy"><span class="t"><span class="p">教材費</span>無料</span></div>
        <div class="cm-free"><img src="<?php echo $u; ?>/assets/images/parts/cmp-free3.webp" alt="" loading="lazy"><span class="t"><span class="p">アートセミナー</span>無料</span></div>
      </div>
    </div>
    <div class="cm-r">
      <div class="cm-paid">
        <div class="cm-paid-row"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M6 8h12l-1 12H7L6 8z"/><path d="M9 8V6a3 3 0 0 1 6 0v2"/></svg>商材も有料</div>
        <div class="cm-paid-row"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5.5C10.5 4.2 8.5 3.5 6 3.5c-1 0-2 .12-3 .35V19c1-.23 2-.35 3-.35 2.5 0 4.5.7 6 2 1.5-1.3 3.5-2 6-2 1 0 2 .12 3 .35V3.85c-1-.23-2-.35-3-.35-2.5 0-4.5.7-6 2z"/><path d="M12 5.5V21"/></svg>教材費有料</div>
        <div class="cm-paid-row"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M8.5 7.5l3.5 5 3.5-5M12 12.5V17M9.5 13.5h5M9.5 15.5h5"/></svg>オプション別料金</div>
      </div>
    </div>

    <!-- 行5: モデル人数 -->
    <div class="cm-l" style="border-bottom:0;">
      <span class="cm-spark" style="right:16vw;top:2.5vw;font-size:1.8em;"></span>
      <span class="cm-spark" style="right:12vw;bottom:3vw;font-size:1.2em;"></span>
      <div class="cm-r5l">
        <img src="<?php echo $u; ?>/assets/images/parts/cmp-medal.webp" alt="200人以上" loading="lazy">
        <div>
          <div class="cm-r5-t">卒業までのモデル人数</div>
          <div class="cm-r5-n"><span class="n">200</span>人以上</div>
        </div>
      </div>
    </div>
    <div class="cm-r" style="border-bottom:0;">
      <div class="cm-r5r"><img src="<?php echo $u; ?>/assets/images/parts/cmp-ppl.webp" alt="" loading="lazy"><span><span class="n">30</span>人程度</span></div>
    </div>
  </div>
</section>
