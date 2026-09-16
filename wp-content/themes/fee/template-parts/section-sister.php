<?php
// 姉妹アカデミー紹介セクション — コーディング版
// Q&Aと漫画の間に置く。ルティナ占いアカデミー（lutina-academy.jp）へ別タブで飛ぶカードを1枚だけ表示する。
// 画像は使わず、見出し・カード・ボタンはすべてコードで組んでいる（1em = PC 1vw / SP 2vw）。
$sa_link = 'https://lutina-academy.jp/';
?>
<style>
/* ===== 姉妹アカデミー（PC: 1920px基準 / 1em = 1vw） ===== */
.sa { position: relative; overflow: hidden; box-sizing: border-box; text-align: center;
  font-family: var(--font-round); font-size: 1vw; color: #3a3230;
  background: linear-gradient(180deg, #fdf3f7 0%, #f3ecfb 100%);
  padding: 3vw 0 3.4vw; }
.sa * { box-sizing: border-box; }
/* 背景のキラキラ装飾（他セクションと同じ4方向の星） */
.sa-deco { position: absolute; z-index: 0; pointer-events: none; line-height: 1; }
.sa-deco::before { content: "\2726"; }

/* --- 見出し --- */
.sa-head { position: relative; z-index: 1; }
.sa-script { font-family: var(--font-script); font-size: 2.6em; line-height: 1;
  background: var(--grad-brand);
  -webkit-background-clip: text; background-clip: text;
  -webkit-text-fill-color: transparent; color: transparent; }
.sa-title { margin: 0.4vw 0 0; font-weight: 800; font-size: 3.2em; letter-spacing: .08em; color: #2f2a28; }
.sa-title .pk { color: #ec5a96; }

/* --- カード（カード全体が外部リンク） --- */
.sa-card { position: relative; z-index: 1; display: flex; align-items: center; gap: 2.4em;
  width: 62vw; margin: 1.8vw auto 0; padding: 2em 2.6em; text-align: left;
  background: #fff; border: 0.15em solid #e3d6f6; border-radius: 1.6em;
  text-decoration: none; color: inherit;
  box-shadow: 0 0.5em 1.6em rgba(160,120,200,.18);
  transition: transform .15s ease, box-shadow .15s ease;
  outline: none; -webkit-tap-highlight-color: transparent; }
.sa-card:hover { transform: translateY(-0.2em); box-shadow: 0 0.9em 2em rgba(160,120,200,.26); }
.sa-card:active { transform: scale(.99); }
/* 左：ロゴ風の校名ブロック（ルティナのイメージに合わせた紫のグラデ） */
.sa-logo { flex: 0 0 auto; width: 15em; padding: 1.7em 1em; border-radius: 1.2em; text-align: center;
  background: linear-gradient(150deg, #6b4fb0, #a98ce4); color: #fff; }
.sa-logo-en { font-family: var(--font-en); font-weight: 600; font-size: 2.1em; line-height: 1.15; letter-spacing: .02em; }
.sa-logo-jp { margin-top: .7em; font-size: 1em; letter-spacing: .1em; opacity: .92; }
/* 右：説明文とボタン */
.sa-body { flex: 1 1 auto; min-width: 0; }
.sa-txt { margin: .6em 0 0; font-family: var(--font-jp); font-weight: 600; font-size: 1.35em; line-height: 1.8; color: #4a423f; }
/* ボタンは説明文の下に中央揃えで置く（PC・SP共通） */
.sa-btn { display: flex; width: fit-content; align-items: center; gap: .5em; margin: 1em auto 0;
  background: var(--grad-pink-btn); color: #fff; font-weight: 800; font-size: 1.45em; letter-spacing: .06em;
  padding: .6em 1.6em; border-radius: 999px; box-shadow: 0 0.3em 0.9em rgba(236,90,150,.35); }
.sa-btn svg { width: 1em; height: 1em; flex: 0 0 auto; }

/* ===== SP（1080px基準: 1em = 2vw） ===== */
@media (max-width: 768px) {
  .sa { font-size: 2vw; padding: 6vw 4vw 7vw; }
  .sa-script { font-size: 2.4em; }
  .sa-title { font-size: 2.6em; margin-top: 1vw; }
  /* SPはロゴブロックを上、説明文を下に縦積み */
  .sa-card { flex-direction: column; gap: 1.6em; width: 100%; margin-top: 4vw;
    padding: 2em 1.8em 2.2em; text-align: center; border-radius: 2em; }
  .sa-logo { width: 100%; padding: 1.4em 1em; }
  .sa-logo-en { font-size: 2.2em; }
  .sa-txt { font-size: 1.45em; line-height: 1.75; }
  .sa-btn { font-size: 1.6em; padding: .7em 1.8em; }
}
</style>
<section class="sa" id="sister">
  <span class="sa-deco" style="left:8vw;top:3vw;font-size:2em;color:#c5a6ec;"></span>
  <span class="sa-deco" style="left:14vw;top:9vw;font-size:1.2em;color:#f2c94c;"></span>
  <span class="sa-deco" style="right:9vw;top:4vw;font-size:1.6em;color:#8ad6df;"></span>
  <span class="sa-deco" style="right:15vw;top:11vw;font-size:2.2em;color:#f7a8c6;"></span>

  <div class="sa-head">
    <div class="sa-script">Sister Academy</div>
    <h2 class="sa-title">姉妹アカデミーは<span class="pk">こちら</span></h2>
  </div>

  <a class="sa-card" href="<?php echo esc_url($sa_link); ?>" target="_blank" rel="noopener noreferrer">
    <div class="sa-body">
      <p class="sa-txt">東京・池袋で、実力派占い師から本格的な占いを学べる姉妹校です。副業からプロデビューまで、あなたの「なりたい」を全力でサポートします。</p>
      <span class="sa-btn">サイトを見る
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14 4h6v6"/><path d="M20 4l-9 9"/><path d="M18 13.5V19a1.5 1.5 0 0 1-1.5 1.5h-11A1.5 1.5 0 0 1 4 19V8a1.5 1.5 0 0 1 1.5-1.5H10"/></svg>
      </span>
    </div>
  </a>
</section>
