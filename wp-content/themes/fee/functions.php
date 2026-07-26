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

    // 3〜5. 旧LP（HTML版）用のスクリプトは画像版では不要のため停止
    // wp_enqueue_script('tailwindcss', 'https://cdn.tailwindcss.com', [], null, false);
    // wp_enqueue_script('lucide-icons', 'https://unpkg.com/lucide@latest', [], null, true);
    // wp_enqueue_script('fee-nail-main', get_template_directory_uri() . '/main.js', ['lucide-icons'], null, true);
}
add_action('wp_enqueue_scripts', 'fee_nail_academy_scripts');

// Tailwind設定をヘッダーに出力
function add_tailwind_config() {
    ?>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: {
              'dusty-rose': '#D98E98',
              'champagne-pink': '#F5E6E8',
              'silver-glitter': '#E8E8E8',
              'pearl-white': '#FEFEFE',
              'text-main': '#5D4E4A',
              'text-sub': '#8B7B7A',
              'rose-gold': '#D98E98',
              'rose-gold-dark': '#C07A85',
            },
            fontFamily: {
              serif: ['"Playfair Display"', 'serif'],
              script: ['"Great Vibes"', 'cursive'],
              japanese: ['"Zen Old Mincho"', 'serif'],
              sans: ['Helvetica', 'Arial', 'sans-serif'],
            },
            backgroundImage: {
              'soft-gradient': 'linear-gradient(135deg, #FAF8F7 0%, #FFF0F5 50%, #FAF8F7 100%)',
              'shimmer': 'linear-gradient(45deg, rgba(255,255,255,0) 40%, rgba(255,255,255,0.5) 50%, rgba(255,255,255,0) 60%)',
            },
            animation: {
              'float': 'float 6s ease-in-out infinite',
              'twinkle': 'twinkle 4s ease-in-out infinite',
              'shimmer': 'shimmer 2s infinite',
              'spin-slow': 'spin 8s linear infinite',
            },
            keyframes: {
              float: {
                '0%, 100%': { transform: 'translateY(0)' },
                '50%': { transform: 'translateY(-10px)' },
              },
              twinkle: {
                '0%, 100%': { opacity: 0.3, transform: 'scale(0.8)' },
                '50%': { opacity: 1, transform: 'scale(1.2)' },
              },
              shimmer: {
                '0%': { transform: 'translateX(-100%)' },
                '100%': { transform: 'translateX(100%)' },
              }
            }
          },
        },
      }
    </script>
    <?php
}
// 画像版では Tailwind 設定は不要のため停止
// add_action('wp_head', 'add_tailwind_config', 20);

// テーマサポート
add_theme_support('title-tag');
add_theme_support('post-thumbnails');

// 開発用プレビュー: /?lp=dev でコーディング版LP（preview.php）を表示（試作確認用・完成後に削除）
add_filter('template_include', function ($template) {
    if (isset($_GET['lp']) && $_GET['lp'] === 'dev') {
        $preview = get_template_directory() . '/preview.php';
        if (file_exists($preview)) {
            return $preview;
        }
    }
    return $template;
});

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
