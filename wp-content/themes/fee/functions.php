<?php
// テーマのセットアップとスクリプト読み込み
function fee_nail_academy_scripts() {
    // 1. Google Fonts
    wp_enqueue_style(
        'google-fonts', 
        'https://fonts.googleapis.com/css2?family=Great+Vibes&family=M+PLUS+Rounded+1c:wght@500;700;800&family=Playfair+Display:ital,wght@0,400;0,600;1,400&family=Zen+Old+Mincho:wght@400;500;600;700&display=swap',
        [], 
        null
    );

    // 2. メインスタイルシート (style.css) — 更新時刻をバージョンにしてキャッシュを自動更新
    wp_enqueue_style('main-style', get_stylesheet_uri(), [], filemtime(get_stylesheet_directory() . '/style.css'));
}
add_action('wp_enqueue_scripts', 'fee_nail_academy_scripts');

// テーマサポート
add_theme_support('title-tag');
add_theme_support('post-thumbnails');

// Google Analytics (gtag.js)
function fee_nail_academy_google_analytics() {
    $ga_measurement_id = 'G-RJC8TKC65C';
    ?>
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo esc_attr($ga_measurement_id); ?>"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', '<?php echo esc_js($ga_measurement_id); ?>');
    </script>
    <?php
}
add_action('wp_head', 'fee_nail_academy_google_analytics', 1);
