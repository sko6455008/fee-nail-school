<?php
// テーマのセットアップとスクリプト読み込み
function fee_nail_academy_scripts() {
    // 1. Google Fonts
    wp_enqueue_style(
        'google-fonts', 
        'https://fonts.googleapis.com/css2?family=Great+Vibes&family=Playfair+Display:ital,wght@0,400;0,600;1,400&family=Zen+Old+Mincho:wght@400;500;600;700&display=swap', 
        [], 
        null
    );

    // 2. メインスタイルシート (style.css)
    wp_enqueue_style('main-style', get_stylesheet_uri());

    // 3. Tailwind CSS (CDN)
    // 本番環境ではビルドプロセスを経ることが望ましいですが、LP移植のためCDNを使用します
    wp_enqueue_script('tailwindcss', 'https://cdn.tailwindcss.com', [], null, false);

    // 4. Lucide Icons (Reactアイコンの代替)
    wp_enqueue_script('lucide-icons', 'https://unpkg.com/lucide@latest', [], null, true);

    // 5. メインJS
    wp_enqueue_script('fee-nail-main', get_template_directory_uri() . '/main.js', ['lucide-icons'], null, true);
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
add_action('wp_head', 'add_tailwind_config', 20);

// テーマサポート
add_theme_support('title-tag');
add_theme_support('post-thumbnails');
