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

// カスタマイザーの並び順は下の fee_image_slots() と共通で、LPのセクションの並び順に合わせている。
// 数値は10刻み。間に挟みたいセクションができたら中間の値を使えば renumber せずに済む。
function fee_customize_register($wp_customize) {
    $groups = [
        'fee_gallery' => [
            'title'    => '生徒様の作品例（写真12枚）',
            'prefix'   => 'fee_gallery_img_',
            'priority' => 250, // LP: 授業風景 の次
        ],
        'fee_art' => [
            'title'    => '卒業までにできるアート（写真12枚）',
            'prefix'   => 'fee_art_img_',
            'priority' => 280, // LP: コース内容 の次
        ],
    ];
    foreach ($groups as $section_id => $g) {
        $wp_customize->add_section($section_id, [
            'title'       => $g['title'],
            'priority'    => $g['priority'],
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

// =====================================================================
// 各セクションの写真のWordPress管理（外観 > カスタマイズ）
// 「1枠＝1枚」の固定スロット方式。上のギャラリー（並べて何枚でも出す方式）とは別。
// 未設定の枠はテーマ同梱の写真（assets/images/ 配下）がそのまま表示される。
// 枠を増やすときはこの配列に足すだけで、カスタマイザーの項目も自動で増える。
// file はいずれも assets/images/ からの相対パス。
// =====================================================================
function fee_image_slots() {
    return [
        'campaign' => [
            'title'    => 'キャンペーン（写真2枚）',
            'priority' => 210, // LP: FV の次
            'items' => [
                // nail は固定ボックスに cover で切り抜いて表示するため、縦横比が違っても崩れない
                'nail'   => ['label' => 'ネイル写真（左上）',   'file' => 'campaign_nail.png', 'alt' => 'ネイルの作品例'],
                'person' => ['label' => '講師の写真（右側）', 'file' => 'banner_person.png', 'alt' => '講師'],
            ],
        ],
        'concept' => [
            'title'    => 'コンセプト（写真1枚）',
            'priority' => 220, // LP: キャンペーン の次
            'items' => [
                'main' => ['label' => 'ネイル写真（中央）', 'file' => 'intro.jpg', 'alt' => '仕上がったネイルの手元'],
            ],
        ],
        'features' => [
            'title'    => 'アカデミー紹介（写真6枚）',
            'priority' => 230, // LP: コンセプト の次
            'items' => [
                '1' => ['label' => '01 サロンワーク特化型', 'file' => 'features01.png', 'alt' => 'サロンワーク実習の様子'],
                '2' => ['label' => '02 少人数制',           'file' => 'features02.png', 'alt' => '少人数制レッスンの様子'],
                '3' => ['label' => '03 就職・開業',         'file' => 'features03.png', 'alt' => '就職相談の様子'],
                '4' => ['label' => '04 授業料がお得',       'file' => 'features04.png', 'alt' => 'リーズナブルな授業料'],
                '5' => ['label' => '05 初心者歓迎',         'file' => 'features05.png', 'alt' => '初心者へのレッスン風景'],
                '6' => ['label' => '06 最新トレンド',       'file' => 'features06.jpg', 'alt' => 'トレンドのネイルデザイン'],
            ],
        ],
        'classroom' => [
            'title'    => '授業風景（写真7枚）',
            'priority' => 240, // LP: 他社比較 の次
            'items' => [
                '1' => ['label' => '1枚目（上段の大きい写真）', 'file' => 'classroom01.png', 'alt' => 'カラー選びのレッスン風景'],
                '2' => ['label' => '2枚目',                     'file' => 'classroom05.png', 'alt' => '講師の指導風景'],
                '3' => ['label' => '3枚目',                     'file' => 'classroom04.png', 'alt' => 'マシーンケアの実習'],
                '4' => ['label' => '4枚目（スマホでは非表示）', 'file' => 'classroom03.jpg', 'alt' => 'ジェル塗布の実習'],
                '5' => ['label' => '5枚目',                     'file' => 'classroom02.png', 'alt' => 'ハンドケアのレッスン風景'],
                '6' => ['label' => '6枚目（スマホでは非表示）', 'file' => 'classroom06.png', 'alt' => 'ジェルの筆づかい'],
                '7' => ['label' => '7枚目',                     'file' => 'classroom07.png', 'alt' => 'ファイリングの実習'],
            ],
        ],
        'skills' => [
            'title'    => '学べる技術（写真6枚）',
            'priority' => 260, // LP: 生徒様の作品例 の次
            'items' => [
                '1' => ['label' => '01 基礎知識',       'file' => 'skills01.png',       'alt' => '基礎知識のテキスト教材'],
                '2' => ['label' => '02 ネイルケア',     'file' => 'skills02.png',       'alt' => 'ネイルケアの実習'],
                '3' => ['label' => '03 マシーンケア',   'file' => 'parts/sk-p3.webp',   'alt' => 'マシーンケアの実習'],
                '4' => ['label' => '04 長さ出し・補強', 'file' => 'parts/sk-p4.webp',   'alt' => '長さ出しの作品例'],
                '5' => ['label' => '05 ネイルアート',   'file' => 'parts/sk-p5.webp',   'alt' => 'カラフルなネイルアート'],
                '6' => ['label' => '06 サロンワーク技術', 'file' => 'skills06.png',     'alt' => 'サロンワーク研修の様子'],
            ],
        ],
        'courses' => [
            'title'    => 'コース内容（写真2枚）',
            'priority' => 270, // LP: 学べる技術 の次
            'items' => [
                '1' => ['label' => '3ヶ月即戦力コース',   'file' => 'course01.jpg',  'alt' => '3ヶ月即戦力コースの作品例'],
                '2' => ['label' => '9ヶ月じっくりコース', 'file' => 'course02.jpeg', 'alt' => '9ヶ月じっくりコースの作品例'],
            ],
        ],
        'future' => [
            'title'    => '卒業後（写真3枚）',
            'priority' => 290, // LP: 卒業までにできるアート の次
            'items' => [
                '1' => ['label' => '人気サロンへ就職',       'file' => 'parts/fu-p1.webp', 'alt' => 'サロンで施術したネイル'],
                '2' => ['label' => '自宅サロン開業',         'file' => 'parts/fu-p2.webp', 'alt' => '自宅サロンでのネイル'],
                '3' => ['label' => 'フリーランスとして活躍', 'file' => 'parts/fu-p3.webp', 'alt' => 'フリーランスネイリストの作品'],
            ],
        ],
    ];
}

function fee_customize_register_slots($wp_customize) {
    foreach (fee_image_slots() as $group => $g) {
        $section_id = 'fee_sec_' . $group;
        $wp_customize->add_section($section_id, [
            'title'       => $g['title'],
            'priority'    => $g['priority'],
            'description' => '空欄のままにするとテーマ同梱の写真が表示されます。代替テキストはメディアライブラリ側の設定が使われます。',
        ]);
        foreach ($g['items'] as $key => $item) {
            $setting_id = 'fee_img_' . $group . '_' . $key;
            $wp_customize->add_setting($setting_id, [
                'default'           => 0,
                'sanitize_callback' => 'absint',
            ]);
            $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, $setting_id, [
                'label'     => $item['label'],
                'section'   => $section_id,
                'mime_type' => 'image',
            ]));
        }
    }
}
add_action('customize_register', 'fee_customize_register_slots');

// 指定した枠の写真を返す。カスタマイザー未設定ならテーマ同梱の写真。
// 戻り値: ['url' => 画像URL, 'alt' => 代替テキスト]
function fee_img($group, $key) {
    $slots = fee_image_slots();
    if (!isset($slots[$group]['items'][$key])) {
        return ['url' => '', 'alt' => ''];
    }
    $item = $slots[$group]['items'][$key];
    $id   = (int) get_theme_mod('fee_img_' . $group . '_' . $key, 0);
    if ($id) {
        // 差し替え後も見た目が変わらないよう、縮小せず原寸(full)を使う
        $url = wp_get_attachment_image_url($id, 'full');
        if ($url) {
            $alt = get_post_meta($id, '_wp_attachment_image_alt', true);
            return ['url' => $url, 'alt' => $alt !== '' ? $alt : $item['alt']];
        }
    }
    return [
        'url' => get_template_directory_uri() . '/assets/images/' . $item['file'],
        'alt' => $item['alt'],
    ];
}

// <img> タグの src / alt をまとめて出力する（テンプレート側を1行に収めるため）
// 使い方: img タグの属性位置で fee_img_attr('features', '1') を呼ぶ
function fee_img_attr($group, $key) {
    $im = fee_img($group, $key);
    echo 'src="' . esc_url($im['url']) . '" alt="' . esc_attr($im['alt']) . '"';
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
