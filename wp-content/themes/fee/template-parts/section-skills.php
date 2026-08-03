<?php
// 学べる技術（Skills You Learn）セクション — コーディング版
// 寸法はデザインカンプ（全幅=100vw基準）から採寸した値
// アイコン素材: skills1〜6.png（1024×1536の余白入り透過PNG）/ 開業サポートのボトル: classroom3.png
$u = get_template_directory_uri();
?>
<style>
/* ===== 学べる技術（PC: font-size 1vw = 1em として全サイズを vw 換算） ===== */
.sk { position: relative; overflow: hidden; box-sizing: border-box; font-size: 1vw;
  font-family: var(--font-jp); color: #3a3230;
  background: #fffdfc url('<?php echo $u; ?>/assets/images/skills_bg_pc.png') center / cover no-repeat; }
.sk * { box-sizing: border-box; }
.sk-wc { position: absolute; pointer-events: none; filter: blur(1.2vw); opacity: .5; z-index: 0; }

/* --- ヘッダー --- */
.sk-head { position: relative; z-index: 1; text-align: center; padding: 0.6vw 0 1vw; min-height: 16.3vw; }
.sk-head-photo { position: absolute; top: 0; display: block; z-index: 0; }
.sk-head-photo img { display: block; height: auto; }
.sk-head-l { left: 0; top: 0.6vw; } .sk-head-l img { width: 16.3vw;
  -webkit-mask-image: radial-gradient(120% 120% at 0% 30%, #000 60%, transparent 95%);
  mask-image: radial-gradient(120% 120% at 0% 30%, #000 60%, transparent 95%); }
/* 右はclassroomセクションと同じネイル写真（縦長のためボックス固定＋coverで従来の見え方を維持） */
.sk-head-r { right: 0; } .sk-head-r img { width: 16.5vw; height: 12.93vw; object-fit: cover;
  -webkit-mask-image: radial-gradient(120% 120% at 100% 30%, #000 60%, transparent 95%);
  mask-image: radial-gradient(120% 120% at 100% 30%, #000 60%, transparent 95%); }
.sk-script { position: relative; font-family: var(--font-script); font-size: 3em; line-height: 1.25;
  background: linear-gradient(95deg, #f0609b 0%, #f0a63c 35%, #58b8d8 70%, #b183d8 100%);
  -webkit-background-clip: text; background-clip: text;
  -webkit-text-fill-color: transparent; color: transparent; }
.sk-swoosh { display: block; width: 22vw; height: 0.22vw; margin: -0.2vw auto 0;
  border-radius: 999px;
  background: linear-gradient(90deg, transparent, #f0609b 15%, #f0a63c 40%, #58b8d8 70%, transparent); }
.sk-title { position: relative; margin: 0.5vw 0 0; font-weight: 600; font-size: 4.6em;
  letter-spacing: .35em; padding-left: .35em; line-height: 1.25; color: #2f2a28; }
.sk-ribbon { position: relative; display: inline-block; margin-top: 0.7vw; color: #fff; font-weight: 600;
  font-size: 1.45em; letter-spacing: .1em; padding: 0.4em 2em; line-height: 1.45;
  background: linear-gradient(90deg, #f0609b, #f0a63c 30%, #58b8d8 65%, #6f7ce0 100%);
  clip-path: polygon(0 0, 100% 0, calc(100% - 0.7em) 50%, 100% 100%, 0 100%, 0.7em 50%); }
/* もこもこ吹き出し（雲形マスク＋しっぽ） */
.sk-bubble { position: absolute; z-index: 2; background: #fff; text-align: center;
  font-weight: 600; line-height: 1.85; padding: 1.5em 1.4em; font-size: 1.25em;
  border-radius: 50% 50% 48% 52% / 55% 52% 48% 45%; }
.sk-bubble::after { content: ""; position: absolute; width: 1.4em; height: 1.4em;
  background: inherit; border: inherit; border-radius: 50%; }
.sk-bub-l { left: 18.2vw; top: 3vw; color: #3a3230; border: 0.14em solid #cdb6f0;
  transform: rotate(-6deg); }
.sk-bub-l::after { left: 1.4em; bottom: -1.5em; }
.sk-bub-r { right: 16vw; top: 3.2vw; color: #3a3230; border: 0.14em solid #9ccdf0;
  transform: rotate(4deg); }
.sk-bub-r::after { right: 1.4em; bottom: -1.5em; }
.sk-bubble .ht { color: #ef6da5; }
.sk-spark { position: absolute; z-index: 1; pointer-events: none; }
.sk-spark::before { content: "\2726"; }

/* --- カードグリッド --- */
.sk-grid { position: relative; z-index: 1; display: grid; grid-template-columns: repeat(3, 1fr);
  gap: 2.1vw 0.85vw; max-width: 95.4vw; margin: 0.7vw auto 0; }
/* カード内は [アイコン][テキスト][写真] の3カラム。1行目にタイトル、2行目に本文 */
.sk-card { position: relative; background: #fff; border-radius: 1vw; min-height: 16.4vw;
  box-shadow: 0 0.25vw 0.9vw rgba(210,150,170,0.13);
  padding: 1.9vw 0.4vw 1.05vw 1.5vw;
  display: grid; grid-template-columns: 5.9vw minmax(0, 1fr) 12.6vw;
  grid-template-rows: auto 1fr; column-gap: 0.75vw; }
.sk-num { position: absolute; top: 0.2vw; left: 1.17vw; width: 4.17vw; height: 4.17vw;
  border-radius: 50%; display: flex; align-items: center; justify-content: center;
  color: #fff; font-family: var(--font-en); font-style: italic; font-weight: 600;
  font-size: 1.95em; line-height: 1; }
.sk-t { grid-column: 2 / -1; grid-row: 1; margin: 0; font-weight: 700; font-size: 1.85em;
  letter-spacing: .1em; line-height: 1.35; align-self: start; }
.sk-t .u { display: inline-block; padding-bottom: 0.22em;
  background-size: 100% 0.09em; background-position: 0 100%; background-repeat: no-repeat; }
/* アイコンは淡い円のにじみの上に乗せる。素材ごとの余白差は --sw/--tx/--ty で吸収 */
.sk-ic { grid-column: 1; grid-row: 2; align-self: center; justify-self: center;
  position: relative; width: 5.9vw; height: 5.9vw; --icsz: 4.7vw;
  background: radial-gradient(circle at 50% 50%, var(--blob) 0%, var(--blob) 52%, transparent 74%); }
.sk-ic img { position: absolute; left: 50%; top: 50%; height: auto;
  width: calc(var(--icsz) * var(--sw));
  transform: translate(-50%, -50%)
             translate(calc(var(--icsz) * var(--tx)), calc(var(--icsz) * var(--ty))); }
.sk-c1 .sk-ic { --sw: 1.855; --tx: -0.052; --ty: 0.090; }
.sk-c2 .sk-ic { --sw: 2.000; --tx: -0.119; --ty: 0.134; }
.sk-c3 .sk-ic { --sw: 2.147; --tx: -0.020; --ty: 0.080; }
.sk-c4 .sk-ic { --sw: 1.889; --tx:  0.020; --ty: 0.094; }
.sk-c5 .sk-ic { --sw: 1.644; --tx: -0.058; --ty: 0.139; }
.sk-c6 .sk-ic { --sw: 2.035; --tx:  0.010; --ty: 0.205; }
.sk-list { grid-column: 2; grid-row: 2; align-self: center;
  list-style: none; margin: 0; padding: 0; text-align: left; }
.sk-list li { display: flex; align-items: center; gap: 0.55vw; font-weight: 700;
  font-size: 0.88em; line-height: 1.5; padding: 0.36em 0; letter-spacing: 0; }
.sk-list .ck { flex: 0 0 auto; width: 1.5em; height: 1.5em; border-radius: 50%;
  border: 0.1em solid currentColor; display: inline-flex; align-items: center; justify-content: center; }
.sk-list .ck svg { width: 62%; height: 62%; }
/* 写真は絶対配置。こうしないと画像の実寸がグリッド行の高さを決めてしまう */
.sk-photo { position: relative; grid-column: 3; grid-row: 2; align-self: stretch;
  overflow: hidden; border-radius: 0.6vw; }
.sk-photo img { position: absolute; inset: 0; display: block; width: 100%; height: 100%;
  object-fit: cover; }

/* カードごとの配色 */
.sk-c1 { --acc: #ec5a96; --blob: rgba(236,90,150,.13); }
.sk-c2 { --acc: #f0a63c; --blob: rgba(240,166,60,.14); }
.sk-c3 { --acc: #35ab9e; --blob: rgba(53,171,158,.12); }
.sk-c4 { --acc: #5490d6; --blob: rgba(84,144,214,.12); }
.sk-c5 { --acc: #9270d2; --blob: rgba(146,112,210,.12); }
.sk-c6 { --acc: #3fa6d8; --blob: rgba(63,166,216,.12); }
.sk-card .sk-t .u { background-image: linear-gradient(90deg, var(--acc), var(--acc)); }
.sk-card .sk-list .ck { color: var(--acc); }
.sk-c1 .sk-num { background: radial-gradient(circle at 40% 35%, #f491b6, #e8628f); }
.sk-c2 .sk-num { background: radial-gradient(circle at 40% 35%, #f5b96a, #eb9435); }
.sk-c3 .sk-num { background: radial-gradient(circle at 40% 35%, #62c8bb, #35ab9e); }
.sk-c4 .sk-num { background: radial-gradient(circle at 40% 35%, #7fb4e8, #5490d6); }
.sk-c5 .sk-num { background: radial-gradient(circle at 40% 35%, #b696e6, #9270d2); }
.sk-c6 .sk-num { background: radial-gradient(circle at 40% 35%, #6ec3e8, #3fa6d8); }
/* 06 は項目が7つあるので行間を詰めてカード高さを他と揃える */
.sk-c6 .sk-list li { font-size: 0.8em; line-height: 1.35; padding: 0.09em 0; }

/* --- 開業サポート帯（写真 / テキスト / 応援メッセージ の3カラム） --- */
.sk-kaigyo { position: relative; z-index: 1; display: grid;
  grid-template-columns: 16.7vw minmax(0, 1fr) 24vw;
  gap: 1.5vw; align-items: center; max-width: 89.5vw; margin: 2.4vw auto 2.8vw;
  padding: 1.1vw 1.6vw; background: #fff; border-radius: 1vw;
  box-shadow: 0 0.25vw 0.9vw rgba(210,150,170,0.13); }
.sk-kaigyo-photo { overflow: hidden; border-radius: 0.6vw; height: 10.35vw; }
.sk-kaigyo-photo img { display: block; width: 100%; height: 100%; object-fit: cover; }
.sk-kaigyo-c { text-align: center; }
.sk-kaigyo-ribbon { display: inline-block; color: #fff; font-weight: 700; font-size: 1.55em;
  letter-spacing: .16em; padding: 0.35em 1.7em; line-height: 1.4;
  background: linear-gradient(90deg, #f0a63c, #f0609b 35%, #58b8d8 70%, #6f7ce0 100%);
  clip-path: polygon(0 0, 100% 0, calc(100% - 0.6em) 50%, 100% 100%, 0 100%, 0.6em 50%); }
.sk-kaigyo-t1 { margin-top: 0.8vw; font-weight: 600; font-size: 1.03em; letter-spacing: .04em;
  white-space: nowrap; }
.sk-kaigyo-t2 { margin-top: 0.35vw; font-weight: 700; font-size: 1.89em; letter-spacing: .06em; }
.sk-kaigyo-t2 .p { color: #e8397f; }
.sk-kaigyo-r { position: relative; display: flex; align-items: center; justify-content: center;
  gap: 0.6vw; }
.sk-kaigyo-r .tx { position: relative; text-align: center; padding: 1.4vw 0.6vw;
  color: #4a3a40; font-weight: 700; font-size: 1.48em; line-height: 1.85; }
.sk-kaigyo-r .tx::before { content: ""; position: absolute; inset: -0.4vw -1.8vw; z-index: -1;
  background: radial-gradient(60% 56% at 50% 50%,
    rgba(245,148,183,.80), rgba(248,192,214,.62) 58%, rgba(250,214,229,0) 84%);
  border-radius: 47% 53% 50% 50% / 55% 48% 52% 45%; }
.sk-bt { position: relative; flex: 0 0 auto; width: 7vw; height: 7vw; }
.sk-bt img { position: absolute; left: 50%; top: 50%; height: auto;
  width: calc(7vw * 1.585);
  transform: translate(-50%, -50%) translate(calc(7vw * -0.012), calc(7vw * 0.027)); }

/* ===== SP（1080px基準: font-size 2vw） ===== */
@media (max-width: 768px) {
  .sk { font-size: 2vw;
    background-image: url('<?php echo $u; ?>/assets/images/skills_bg_sp.png'); }
  .sk-head { padding: 2vw 0 1.5vw; min-height: 24vw; }
  /* デザイン準拠: SPは見出し左右の写真なし・吹き出しは右側1つのみ */
  .sk-head-photo { display: none; }
  .sk-script { font-size: 2.6em; }
  .sk-swoosh { width: 40vw; height: 0.4vw; }
  .sk-title { font-size: 3.6em; }
  .sk-ribbon { font-size: 1.35em; padding: 0.4em 1.3em; }
  .sk-bub-l { display: none; }
  .sk-bub-r { right: 3vw; top: 1vw; font-size: 1.25em; padding: 1.2em 1em; }

  /* 写真はカード内の行を伸ばして表示するため、リスト項目数が少ないカードほど小さくなる。
     grid-auto-rows:1fr で全カードを最多項目（06）の高さに揃え、写真サイズを統一する */
  .sk-grid { grid-template-columns: 1fr; grid-auto-rows: 1fr; gap: 3vw;
    max-width: 92vw; margin-top: 3vw; }
  .sk-card { grid-template-columns: 15vw minmax(0, 1fr) 30vw; column-gap: 5vw;
    padding: 5.5vw 2vw 2.5vw 2.5vw; min-height: 0; border-radius: 2vw; }
  .sk-num { top: 1.2vw; left: 2vw; width: 9vw; height: 9vw; font-size: 2.2em; }
  .sk-t { font-size: 2.1em; }
  .sk-ic { width: 15vw; height: 15vw; --icsz: 12vw; }
  .sk-list li { font-size: 1.5em; padding: 0.3em 0; gap: 1vw; }
  .sk-c6 .sk-list li { font-size: 1.1em; padding: 0.16em 0; }
  .sk-photo { border-radius: 1.2vw; }

  .sk-kaigyo { grid-template-columns: 30vw minmax(0, 1fr); gap: 2.5vw; max-width: 92vw;
    padding: 3vw; margin-bottom: 5vw; border-radius: 2vw; }
  .sk-kaigyo-photo { height: 22vw; }
  .sk-kaigyo-ribbon { font-size: 1.5em; padding: 0.3em 1.1em; }
  .sk-kaigyo-t1 { display: none; }
  .sk-kaigyo-t2 { font-size: 1.7em; margin-top: 1.2vw; }
  .sk-kaigyo-r { display: none; }
}
</style>
<section class="sk" id="skills">
  <!-- 水彩コーナー -->
  <span class="sk-wc" style="left:-6vw;top:-3vw;width:20vw;height:16vw;background:#d8bce8;border-radius:50% 50% 45% 55%/55% 45% 55% 45%;"></span>
  <span class="sk-wc" style="right:-6vw;top:-3vw;width:22vw;height:17vw;background:#f8dc9a;border-radius:45% 55% 50% 50%/50% 55% 45% 55%;"></span>
  <span class="sk-wc" style="left:-7vw;bottom:-4vw;width:22vw;height:18vw;background:#f6b6d0;border-radius:52% 48% 47% 53%/55% 52% 48% 45%;"></span>
  <span class="sk-wc" style="right:-6vw;bottom:-4vw;width:20vw;height:16vw;background:#d8bce8;border-radius:48% 52% 55% 45%/52% 48% 50% 50%;"></span>

  <!-- ヘッダー -->
  <div class="sk-head">
    <span class="sk-head-photo sk-head-l"><img src="<?php echo $u; ?>/assets/images/parts/sk-head-l.webp" alt="" loading="lazy"></span>
    <span class="sk-head-photo sk-head-r"><img src="<?php echo $u; ?>/assets/images/classroom2.png" alt="" loading="lazy"></span>
    <span class="sk-bubble sk-bub-l">初心者も<br>安心して<br>スタートできる<span class="ht">&#9825;</span></span>
    <span class="sk-bubble sk-bub-r">好きなことを<br>一生の仕事に<span class="ht">&#9825;</span></span>
    <span class="sk-spark" style="left:31vw;top:4vw;color:#f2c94c;font-size:1.7em;"></span>
    <span class="sk-spark" style="left:33vw;top:8vw;color:#c5a6ec;font-size:1.2em;"></span>
    <span class="sk-spark" style="right:32vw;top:3vw;color:#ef9ec2;font-size:2em;">&#9825;</span>
    <span class="sk-spark" style="right:30vw;top:7.5vw;color:#f2c94c;font-size:1.3em;"></span>
    <div class="sk-script">Skills You Learn</div>
    <span class="sk-swoosh"></span>
    <h2 class="sk-title">学べる技術</h2>
    <div><span class="sk-ribbon">基礎から応用まで、トータルで身につける！</span></div>
  </div>

  <!-- カード -->
  <div class="sk-grid">
    <div class="sk-card sk-c1">
      <span class="sk-num">01</span>
      <h3 class="sk-t"><span class="u">基礎知識</span></h3>
      <span class="sk-ic"><img src="<?php echo $u; ?>/assets/images/skills1.png" alt="" loading="lazy" decoding="async"></span>
      <ul class="sk-list">
        <li><span class="ck"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 12.5l5 5 10-11"/></svg></span>爪の構造</li>
        <li><span class="ck"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 12.5l5 5 10-11"/></svg></span>病気トラブル</li>
        <li><span class="ck"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 12.5l5 5 10-11"/></svg></span>衛生管理</li>
        <li><span class="ck"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 12.5l5 5 10-11"/></svg></span>道具の名称</li>
        <li><span class="ck"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 12.5l5 5 10-11"/></svg></span>技術理論</li>
      </ul>
      <span class="sk-photo"><img src="<?php echo $u; ?>/assets/images/skills01.png" alt="基礎知識のテキスト教材" loading="lazy"></span>
    </div>
    <div class="sk-card sk-c2">
      <span class="sk-num">02</span>
      <h3 class="sk-t"><span class="u">ネイルケア</span></h3>
      <span class="sk-ic"><img src="<?php echo $u; ?>/assets/images/skills2.png" alt="" loading="lazy" decoding="async"></span>
      <ul class="sk-list">
        <li><span class="ck"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 12.5l5 5 10-11"/></svg></span>ファイリング</li>
        <li><span class="ck"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 12.5l5 5 10-11"/></svg></span>ハンドケア</li>
        <li><span class="ck"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 12.5l5 5 10-11"/></svg></span>フットケア</li>
        <li><span class="ck"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 12.5l5 5 10-11"/></svg></span>ウォーターケア</li>
      </ul>
      <span class="sk-photo"><img src="<?php echo $u; ?>/assets/images/skills02.png" alt="ネイルケアの実習" loading="lazy"></span>
    </div>
    <div class="sk-card sk-c3">
      <span class="sk-num">03</span>
      <h3 class="sk-t"><span class="u">マシーンケア</span></h3>
      <span class="sk-ic"><img src="<?php echo $u; ?>/assets/images/skills3.png" alt="" loading="lazy" decoding="async"></span>
      <ul class="sk-list">
        <li><span class="ck"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 12.5l5 5 10-11"/></svg></span>マシーンケア基礎</li>
        <li><span class="ck"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 12.5l5 5 10-11"/></svg></span>オフ</li>
        <li><span class="ck"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 12.5l5 5 10-11"/></svg></span>プレパレーション</li>
        <li><span class="ck"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 12.5l5 5 10-11"/></svg></span>フィルイン</li>
      </ul>
      <span class="sk-photo"><img src="<?php echo $u; ?>/assets/images/parts/sk-p3.webp" alt="マシーンケアの実習" loading="lazy"></span>
    </div>
    <div class="sk-card sk-c4">
      <span class="sk-num">04</span>
      <h3 class="sk-t"><span class="u">長さ出し・補強</span></h3>
      <span class="sk-ic"><img src="<?php echo $u; ?>/assets/images/skills4.png" alt="" loading="lazy" decoding="async"></span>
      <ul class="sk-list">
        <li><span class="ck"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 12.5l5 5 10-11"/></svg></span>ジェル</li>
        <li><span class="ck"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 12.5l5 5 10-11"/></svg></span>チップ</li>
        <li><span class="ck"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 12.5l5 5 10-11"/></svg></span>アクリル技術</li>
      </ul>
      <span class="sk-photo"><img src="<?php echo $u; ?>/assets/images/parts/sk-p4.webp" alt="長さ出しの作品例" loading="lazy"></span>
    </div>
    <div class="sk-card sk-c5">
      <span class="sk-num">05</span>
      <h3 class="sk-t"><span class="u">ネイルアート</span></h3>
      <span class="sk-ic"><img src="<?php echo $u; ?>/assets/images/skills5.png" alt="" loading="lazy" decoding="async"></span>
      <ul class="sk-list">
        <li><span class="ck"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 12.5l5 5 10-11"/></svg></span>ワンカラー</li>
        <li><span class="ck"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 12.5l5 5 10-11"/></svg></span>ラメグラ</li>
        <li><span class="ck"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 12.5l5 5 10-11"/></svg></span>マグネット</li>
        <li><span class="ck"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 12.5l5 5 10-11"/></svg></span>トレンドデザイン</li>
      </ul>
      <span class="sk-photo"><img src="<?php echo $u; ?>/assets/images/parts/sk-p5.webp" alt="カラフルなネイルアート" loading="lazy"></span>
    </div>
    <div class="sk-card sk-c6">
      <span class="sk-num">06</span>
      <h3 class="sk-t"><span class="u">サロンワーク技術</span></h3>
      <span class="sk-ic"><img src="<?php echo $u; ?>/assets/images/skills6.png" alt="" loading="lazy" decoding="async"></span>
      <ul class="sk-list">
        <li><span class="ck"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 12.5l5 5 10-11"/></svg></span>ヒアリング方法</li>
        <li><span class="ck"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 12.5l5 5 10-11"/></svg></span>メニュー提案の仕方</li>
        <li><span class="ck"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 12.5l5 5 10-11"/></svg></span>施術中の声かけ</li>
        <li><span class="ck"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 12.5l5 5 10-11"/></svg></span>手元の見せ方</li>
        <li><span class="ck"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 12.5l5 5 10-11"/></svg></span>時間管理</li>
        <li><span class="ck"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 12.5l5 5 10-11"/></svg></span>接客マナー</li>
        <li><span class="ck"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 12.5l5 5 10-11"/></svg></span>ノウハウ</li>
      </ul>
      <span class="sk-photo"><img src="<?php echo $u; ?>/assets/images/skills06.png" alt="サロンワーク研修の様子" loading="lazy"></span>
    </div>
  </div>

  <!-- 開業サポート帯 -->
  <div class="sk-kaigyo">
    <span class="sk-kaigyo-photo"><img src="<?php echo $u; ?>/assets/images/parts/sk-salon.webp" alt="サロンの内装" loading="lazy"></span>
    <div class="sk-kaigyo-c">
      <span class="sk-kaigyo-ribbon">＋開業サポート&#10024;</span>
      <div class="sk-kaigyo-t1">ネイル技術、場所・道具、手続き、集客、運営体制など、</div>
      <div class="sk-kaigyo-t2"><span class="p">開業に必要なこと</span>も学べます。</div>
    </div>
    <div class="sk-kaigyo-r">
      <span class="tx">夢をカタチにする<br>第一歩を<br>応援します&#9825;</span>
      <span class="sk-bt"><img src="<?php echo $u; ?>/assets/images/classroom3.png" alt="" loading="lazy" decoding="async"></span>
    </div>
  </div>
</section>
