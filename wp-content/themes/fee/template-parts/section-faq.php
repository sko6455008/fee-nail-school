<?php
// よくある質問（Q&A）セクション — コーディング版
// 見出しを新規コード化し、アコーディオン本体は index.php（画像版）のコード化済み .pcfaq を移設。
// 質問と回答は管理画面の「よくある質問」（カスタム投稿）から取得する。1件も無ければセクションごと非表示。
$u    = get_template_directory_uri();
$faqs = fee_faq_items();
if (!$faqs) {
    return;
}
// バッジ・枠線の色は表示順に4色を繰り返す（[濃い色, 回答の背景色]）
$fq_colors = [
    ['#ec5a96', '#fdeef4'],
    ['#21bcc0', '#e4f7f7'],
    ['#f2c01e', '#fdf4dc'],
    ['#a98ce4', '#f1ecfb'],
];
?>
<style>
/* ===== Q&A見出し ===== */
.fq { position: relative; overflow: hidden; box-sizing: border-box;
  background: #FEF9F4 url('<?php echo $u; ?>/assets/images/qa_bg_pc.png') center / cover no-repeat;
  font-family: var(--font-jp); font-size: 1vw; }
.fq * { box-sizing: border-box; }
.fq-wc { position: absolute; pointer-events: none; filter: blur(1vw); opacity: .5; z-index: 0; }
.fq-head { position: relative; z-index: 1; text-align: center; padding: 2.4vw 0 1.6vw; }
.fq-qa { font-family: var(--font-round); font-weight: 800; font-size: 6em; line-height: 1.1; letter-spacing: .02em; }
.fq-qa .q { background: linear-gradient(160deg, #f58fb7, #e8397f);
  -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent; color: transparent; }
.fq-qa .amp { font-size: 0.75em; background: linear-gradient(160deg, #ffd94d, #f0a63c);
  -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent; color: transparent; }
.fq-qa .a { background: linear-gradient(160deg, #6ec3e8, #21bcc0);
  -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent; color: transparent; }
.fq-jp { margin-top: 0.4vw; font-weight: 700; font-size: 2.7em; letter-spacing: .18em; color: #2f2a28; }
.fq-jp .sl { color: #ef6da5; font-weight: 500; padding: 0 .5em; }
.fq-deco { position: absolute; z-index: 1; pointer-events: none; }

/* ===== アコーディオン（index.phpの.pcfaqを移設） ===== */
/* 背景はセクション（.fq）の qa_bg 画像を透過で見せる */
.pcfaq2 { background: transparent; padding: 6px 0 70px; font-size: 16px; }
.pcfaq2-inner { max-width: 1180px; margin: 0 auto; padding: 0 24px; box-sizing: border-box; }
.pcfaq2-item { margin: 0 0 20px; }
.pcfaq2-q { width: 100%; box-sizing: border-box; display: flex; align-items: center; gap: 20px;
    background: #fff; border: 2px solid var(--c); border-radius: 44px; padding: 18px 30px;
    cursor: pointer; box-shadow: 0 4px 16px rgba(180,120,140,0.10);
    transition: box-shadow .2s ease, transform .1s ease; outline: none !important;
    -webkit-tap-highlight-color: transparent; }
.pcfaq2-q:hover { box-shadow: 0 8px 22px rgba(180,120,140,0.18); }
.pcfaq2-q:active { transform: scale(0.996); }
.pcfaq2-q:focus, .pcfaq2-q:focus-visible { outline: none !important; box-shadow: 0 4px 16px rgba(180,120,140,0.10); }
.pcfaq2-badge { flex: 0 0 auto; width: 48px; height: 48px; border-radius: 50%;
    background: var(--c); color: #fff; font-family: var(--font-en); font-weight: 700;
    font-size: 20px; display: flex; align-items: center; justify-content: center; }
.pcfaq2-qt { flex: 1 1 auto; text-align: left; font-family: var(--font-jp);
    font-weight: 600; font-size: 21px; color: #4a4a4a; line-height: 1.4; }
.pcfaq2-plus { flex: 0 0 auto; width: 38px; height: 38px; border-radius: 50%;
    background: var(--c); color: #fff; font-size: 26px; line-height: 1;
    display: flex; align-items: center; justify-content: center;
    transition: transform .25s ease; }
.pcfaq2-item.open .pcfaq2-plus { transform: rotate(45deg); }
.pcfaq2-a { overflow: hidden; max-height: 0; transition: max-height .35s ease; }
.pcfaq2-a-in { display: flex; gap: 14px; align-items: flex-start;
    margin: 10px 12px 4px; padding: 18px 22px;
    background: var(--cl); border: 1.5px solid var(--c); border-radius: 22px; }
.pcfaq2-a-badge { flex: 0 0 auto; width: 40px; height: 40px; border-radius: 50%;
    background: var(--c); color: #fff; font-family: var(--font-en); font-weight: 700;
    font-size: 18px; display: flex; align-items: center; justify-content: center; margin-top: 1px; }
.pcfaq2-a-text { flex: 1 1 auto; min-width: 0; font-family: var(--font-jp); font-size: 16.5px;
    line-height: 1.9; color: #5D4E4A; padding-top: 4px; }
/* 回答は管理画面のエディタで書くため、段落・リストの余白をここで整える */
.pcfaq2-a-text > :first-child { margin-top: 0; }
.pcfaq2-a-text > :last-child { margin-bottom: 0; }
.pcfaq2-a-text p { margin: 0 0 0.8em; }
.pcfaq2-a-text ul, .pcfaq2-a-text ol { margin: 0 0 0.8em; padding-left: 1.4em; }
.pcfaq2-a-text a { color: var(--c); text-decoration: underline; }
/* 実際の高さは開くときにJSが実測して指定する。ここはJSが動かない場合の保険 */
.pcfaq2-item.open .pcfaq2-a { max-height: 1200px; }
@media (max-width: 768px) {
    .fq { font-size: 2vw;
      background-image: url('<?php echo $u; ?>/assets/images/qa_bg_sp.png'); }
    .fq-head { padding: 5vw 0 3vw; }
    .fq-qa { font-size: 4.6em; }
    .fq-jp { font-size: 2.2em; }
    .pcfaq2 { padding: 4px 0 56px; }
    .pcfaq2-inner { padding: 0 16px; }
    .pcfaq2-item { margin: 0 0 14px; }
    .pcfaq2-q { gap: 12px; padding: 14px 16px; border-radius: 30px; }
    .pcfaq2-badge { width: 38px; height: 38px; font-size: 16px; }
    .pcfaq2-qt { font-size: 16px; }
    .pcfaq2-plus { width: 30px; height: 30px; font-size: 21px; }
    .pcfaq2-a-in { padding: 14px 15px; gap: 10px; margin: 8px 6px 2px; }
    .pcfaq2-a-badge { width: 32px; height: 32px; font-size: 15px; }
    .pcfaq2-a-text { font-size: 14.5px; }
}
</style>
<section class="fq" id="faq">
  <!-- 水彩装飾 -->
  <span class="fq-wc" style="left:-6vw;top:-3vw;width:20vw;height:15vw;background:#f6b6d0;border-radius:50% 50% 45% 55%/55% 45% 55% 45%;"></span>
  <span class="fq-wc" style="right:-6vw;top:-3vw;width:20vw;height:15vw;background:#e3d0f2;border-radius:45% 55% 50% 50%/50% 55% 45% 55%;"></span>

  <!-- 見出し -->
  <div class="fq-head">
    <span class="fq-deco" style="left:32vw;top:2.5vw;color:#ef7fae;font-size:2.4em;transform:rotate(-14deg);">&#9829;</span>
    <span class="fq-deco" style="left:27vw;top:5vw;color:#f2c94c;font-size:1.5em;">&#10022;</span>
    <span class="fq-deco" style="right:31vw;top:3vw;color:#8ad6df;font-size:1.6em;">&#10022;</span>
    <span class="fq-deco" style="right:26vw;top:6vw;color:#ef7fae;font-size:1.9em;transform:rotate(12deg);">&#9825;</span>
    <div class="fq-qa"><span class="q">Q</span><span class="amp">&amp;</span><span class="a">A</span></div>
    <div class="fq-jp"><span class="sl">＼</span>よくある質問<span class="sl">／</span></div>
  </div>

  <!-- アコーディオン -->
  <div class="pcfaq2">
    <div class="pcfaq2-inner">
<?php foreach ($faqs as $i => $fq) :
        $c = $fq_colors[$i % count($fq_colors)]; ?>
      <div class="pcfaq2-item" style="--c:<?php echo esc_attr($c[0]); ?>;--cl:<?php echo esc_attr($c[1]); ?>">
        <button class="pcfaq2-q" aria-expanded="false"><span class="pcfaq2-badge">Q.</span><span class="pcfaq2-qt"><?php echo esc_html($fq['q']); ?></span><span class="pcfaq2-plus">+</span></button>
        <div class="pcfaq2-a"><div class="pcfaq2-a-in"><span class="pcfaq2-a-badge">A.</span><div class="pcfaq2-a-text"><?php echo wp_kses_post($fq['a']); ?></div></div></div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<script>
// よくある質問アコーディオン（他の項目を閉じる排他制御）
// 回答の長さは管理画面で変わるので、開く高さは固定値ではなく毎回実測する
(function(){
  function closeItem(it){
    it.classList.remove('open');
    var a = it.querySelector('.pcfaq2-a'); if(a){ a.style.maxHeight = ''; }
    var b = it.querySelector('.pcfaq2-q'); if(b){ b.setAttribute('aria-expanded','false'); }
  }
  document.querySelectorAll('.pcfaq2-q').forEach(function(q){
    q.addEventListener('click', function(){
      var item = q.parentNode;
      var isOpen = item.classList.contains('open');
      document.querySelectorAll('.pcfaq2-item.open').forEach(closeItem);
      if(!isOpen){
        item.classList.add('open');
        q.setAttribute('aria-expanded','true');
        var a = item.querySelector('.pcfaq2-a');
        if(a){ a.style.maxHeight = a.scrollHeight + 'px'; }
      }
    });
  });
  // 画面幅が変わると回答の行数も変わるため、開いている項目の高さを取り直す
  window.addEventListener('resize', function(){
    document.querySelectorAll('.pcfaq2-item.open .pcfaq2-a').forEach(function(a){
      a.style.maxHeight = '';
      a.style.maxHeight = a.scrollHeight + 'px';
    });
  });
})();
</script>
