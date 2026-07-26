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

// =====================================================================
// ギャラリー写真のWordPress管理（外観 > カスタマイズ）
// 「生徒様の作品例」「卒業までにできるアート」の写真を最大12枚まで
// メディアライブラリから差し替え・削除できるようにする。
// =====================================================================
define('FEE_GALLERY_MAX', 12);

function fee_customize_register($wp_customize) {
    $groups = [
        'fee_gallery' => [
            'title'   => '生徒様の作品例（写真12枚）',
            'prefix'  => 'fee_gallery_img_',
        ],
        'fee_art' => [
            'title'   => '卒業までにできるアート（写真12枚）',
            'prefix'  => 'fee_art_img_',
        ],
    ];
    foreach ($groups as $section_id => $g) {
        $wp_customize->add_section($section_id, [
            'title'       => $g['title'],
            'priority'    => 160,
            'description' => '1枚でも設定するとページには設定した写真だけが表示されます（空欄の枠は表示されません）。すべて空欄に戻すとテーマ内蔵の写真に戻ります。',
        ]);
        for ($i = 1; $i <= FEE_GALLERY_MAX; $i++) {
            $setting_id = $g['prefix'] . $i;
            $wp_customize->add_setting($setting_id, [
                'default'           => 0,
                'sanitize_callback' => 'absint',
            ]);
            $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, $setting_id, [
                'label'     => '写真 ' . $i,
                'section'   => $section_id,
                'mime_type' => 'image',
            ]));
        }
    }
}
add_action('customize_register', 'fee_customize_register');

// カスタマイザーで設定された写真の一覧を返す（未設定ならテーマ内蔵のデフォルト写真）
// 戻り値: [ ['url' => 画像URL, 'alt' => 代替テキスト], ... ]
function fee_get_managed_images($prefix, $default_file_pattern, $default_alt) {
    $images = [];
    for ($i = 1; $i <= FEE_GALLERY_MAX; $i++) {
        $id = (int) get_theme_mod($prefix . $i, 0);
        if ($id) {
            $url = wp_get_attachment_image_url($id, 'large');
            if ($url) {
                $alt = get_post_meta($id, '_wp_attachment_image_alt', true);
                $images[] = ['url' => $url, 'alt' => $alt !== '' ? $alt : ($default_alt . ' ' . $i)];
            }
        }
    }
    if (!$images) {
        // 未設定時はテーマ内蔵写真（assets/images/parts/）を表示
        $base = get_template_directory_uri() . '/assets/images/parts/';
        for ($i = 1; $i <= FEE_GALLERY_MAX; $i++) {
            $images[] = ['url' => $base . sprintf($default_file_pattern, $i), 'alt' => $default_alt . ' ' . $i];
        }
    }
    return $images;
}

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
