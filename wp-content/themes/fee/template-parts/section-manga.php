<?php
// 漫画紹介セクション — コーディング版
// 背景（manga_bg.png）・見出し・ボタンはコード、漫画のコマだけ画像（manga.webp）。
// manga.webp は支給データから背景を抜いた透過画像なので、背景の見え方が変わっても縁が出ない。
$u = get_template_directory_uri();
// ボタンのリンク先は漫画ページ（page-manga.php）。ページ自体は functions.php が自動で用意する。
$mg_link = home_url('/manga/');
?>
<style>
/* ===== 漫画紹介 ===== */
/* 1em = 1vw。数値は支給データ（横1920px）の実寸をそのまま vw に置き換えている */
.mg { position: relative; box-sizing: border-box; text-align: center;
  font-family: var(--font-round); font-size: 1vw;
  background: #fff url('<?php echo $u; ?>/assets/images/manga_bg.png') center / cover no-repeat;
  padding: 3.58em 0 2.2em; }
.mg * { box-sizing: border-box; }

/* 見出し */
.mg-head { margin: 0; font-size: 4.13em; font-weight: 800; line-height: 1.3;
  letter-spacing: .01em; color: #ff7ecd; }
/* 「漫画」だけ1.3倍。line-height を打ち消しておかないと見出しの行の高さが増えてしまう */
.mg-em { position: relative; color: #ffbe3d; font-size: 1.3em; line-height: 1; margin-left: .165em; }
/* 「漫画」の右上のキラキラ（3本の線）。以下の値は .mg-em の文字サイズ基準 */
.mg-sp { position: absolute; display: block; width: .048em; border-radius: 999px;
  background: #35d0eb; transform-origin: 50% 0; }
.mg-sp1 { left: 1.794em; top: -.178em; height: .301em; transform: rotate(-15deg); }
.mg-sp2 { left: 2.270em; top: -.154em; height: .378em; transform: rotate(28deg); }
.mg-sp3 { left: 2.494em; top: .197em; height: .291em; transform: rotate(75deg); }

/* 漫画のコマ */
.mg-photo { display: block; width: 88.75em; height: auto; margin: 1.89em auto 0; }

/* ボタン */
.mg-btn { display: flex; align-items: center; justify-content: center; gap: 2em;
  width: 88.75em; height: 8.3em; margin: .7em auto 0;
  background: #ffbe3d; border-radius: 1em; text-decoration: none;
  box-shadow: .35em .3em .5em rgba(120,95,125,.45);
  outline: none; -webkit-tap-highlight-color: transparent;
  transition: transform .12s ease, filter .15s ease; }
.mg-btn:hover { filter: brightness(1.04); }
.mg-btn:active { transform: scale(.985); }
.mg-btn-tx { font-size: 4.63em; font-weight: 800; line-height: 1; letter-spacing: .02em;
  color: #fff;
  /* 白文字の黒フチ。8方向に影を置いて縁取りにする */
  text-shadow: .06em 0 0 #2b2b2b, -.06em 0 0 #2b2b2b, 0 .06em 0 #2b2b2b, 0 -.06em 0 #2b2b2b,
    .045em .045em 0 #2b2b2b, -.045em .045em 0 #2b2b2b,
    .045em -.045em 0 #2b2b2b, -.045em -.045em 0 #2b2b2b; }
.mg-btn-ic { flex: 0 0 auto; display: flex; align-items: center; justify-content: center;
  width: 6.15em; height: 6.15em; border-radius: 50%; background: #fff; }
.mg-btn-ic::before { content: ""; display: block; margin-left: .5em;
  border-style: solid; border-width: 1.45em 0 1.45em 2.5em;
  border-color: transparent transparent transparent #ffbe3d; }

@media (max-width: 768px) {
  /* 1em = 2vw に切り替わるので、寸法はすべて半分の値で指定する */
  .mg { font-size: 2vw; padding: 3.4em 0 4em; }
  .mg-head { font-size: 3.3em; }
  .mg-photo { width: 47em; margin-top: 1.6em; }
  /* 高さは指で押しやすいよう44px前後を確保する */
  .mg-btn { width: 47em; height: 5.6em; gap: 1em; border-radius: .6em; margin-top: .8em;
    box-shadow: .2em .18em .3em rgba(120,95,125,.45); }
  .mg-btn-tx { font-size: 2.35em; }
  .mg-btn-ic { width: 3.4em; height: 3.4em; }
  .mg-btn-ic::before { margin-left: .28em; border-width: .8em 0 .8em 1.38em; }
}
</style>
<section class="mg" id="manga">
  <h2 class="mg-head">当スクールを<span class="mg-em">漫画<i class="mg-sp mg-sp1"></i><i class="mg-sp mg-sp2"></i><i class="mg-sp mg-sp3"></i></span>でご紹介</h2>

  <img class="mg-photo" src="<?php echo $u; ?>/assets/images/manga.webp"
       alt="毎日の仕事にうんざりしていた主人公が、ネイルを仕事にしたいと思いスクールを見つけるまでの漫画"
       width="1704" height="643" loading="lazy" decoding="async">

  <a class="mg-btn" href="<?php echo esc_url($mg_link); ?>">
    <span class="mg-btn-tx">気になる続きはこちらをタップ！</span>
    <span class="mg-btn-ic" aria-hidden="true"></span>
  </a>
</section>
