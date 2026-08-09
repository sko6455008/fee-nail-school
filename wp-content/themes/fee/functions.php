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
            'size'     => [311, 238],
        ],
        'fee_art' => [
            'title'    => '卒業までにできるアート（写真12枚）',
            'prefix'   => 'fee_art_img_',
            'priority' => 280, // LP: コース内容 の次
            'size'     => [394, 245],
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
// desc（任意）を書くと、カスタマイザーの各項目の下に注意書きとして表示される。
// size は [横, 縦] の実測表示サイズ（画面幅1920pxのとき / 単位px）。ここから推奨サイズを自動で作る。
//   グループに書けばその中の既定値になり、item 側に書けばその枠だけ上書きできる。
// =====================================================================

// 推奨サイズの案内文を作る。表示サイズはCSSで固定なので、画像を大きくしても表示は大きくならない。
// 高解像度の画面でぼやけないよう表示サイズの約2倍を目安にしつつ、これ以上大きくしても
// 見た目がほぼ変わらずファイルだけ重くなるため1200pxで頭打ちにしている。
// 縦は表示の縦横比から算出（10px単位に丸め）。この比率で作れば切り取られる部分が出ない。
function fee_img_size_note($size) {
    if (!is_array($size) || empty($size[0]) || empty($size[1])) {
        return '';
    }
    $w = (int) $size[0];
    $h = (int) $size[1];
    $rw = min(1200, (int) ceil($w * 2 / 100) * 100);
    $rh = (int) round($rw * $h / $w / 10) * 10;
    return sprintf('推奨サイズ：%d×%d(横×縦)', $rw, $rh);
}

function fee_image_slots() {
    // 背景に溶け込ませて配置している写真の共通注意書き
    $note_alpha = '<strong>背景を切り抜いた透過画像（PNG）をご用意ください。</strong>';
    return [
        'fv' => [
            'title'    => 'ファーストビュー（写真1枚）',
            'priority' => 205, // LP: 一番上
            'items' => [
                'nail' => ['label' => 'ネイル写真（右側の手元）', 'file' => 'FV_nail.png', 'alt' => 'ジュエリーネイル',
                           'size' => [1004, 1004], 'desc' => $note_alpha],
            ],
        ],
        'campaign' => [
            'title'    => 'キャンペーン（写真2枚）',
            'priority' => 210, // LP: FV の次
            'items' => [
                // nail は固定ボックスに cover で切り抜いて表示するため、縦横比が違っても崩れない
                'nail'   => ['label' => 'ネイル写真（左上）',   'file' => 'campaign_nail.png', 'alt' => 'ネイルの作品例', 'size' => [576, 576]],
                'person' => ['label' => '講師の写真（右側）', 'file' => 'banner_person.png', 'alt' => '講師',
                             'size' => [960, 960]],
            ],
        ],
        'concept' => [
            'title'    => 'コンセプト（写真1枚）',
            'priority' => 220, // LP: キャンペーン の次
            'items' => [
                'main' => ['label' => 'ネイル写真（中央）', 'file' => 'intro.jpg', 'alt' => '仕上がったネイルの手元',
                           'size' => [922, 983]],
            ],
        ],
        'features' => [
            'title'    => 'アカデミー紹介（写真6枚）',
            'priority' => 230, // LP: コンセプト の次
            'size'     => [357, 223],
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
            'size'     => [454, 307], // 下段の4枚。上段3枚だけ item 側で上書きする
            'items' => [
                '1' => ['label' => '1枚目（上段の大きい写真）', 'file' => 'classroom01.png', 'alt' => 'カラー選びのレッスン風景', 'size' => [608, 307]],
                '2' => ['label' => '2枚目',                     'file' => 'classroom05.png', 'alt' => '講師の指導風景',       'size' => [608, 307]],
                '3' => ['label' => '3枚目',                     'file' => 'classroom04.png', 'alt' => 'マシーンケアの実習',   'size' => [608, 307]],
                '4' => ['label' => '4枚目（スマホでは非表示）', 'file' => 'classroom03.jpg', 'alt' => 'ジェル塗布の実習'],
                '5' => ['label' => '5枚目',                     'file' => 'classroom02.png', 'alt' => 'ハンドケアのレッスン風景'],
                '6' => ['label' => '6枚目（スマホでは非表示）', 'file' => 'classroom06.png', 'alt' => 'ジェルの筆づかい'],
                '7' => ['label' => '7枚目',                     'file' => 'classroom07.png', 'alt' => 'ファイリングの実習'],
            ],
        ],
        'skills' => [
            'title'    => '学べる技術（写真8枚）',
            'priority' => 260, // LP: 生徒様の作品例 の次
            'size'     => [242, 203], // カード内の写真6枚
            'items' => [
                // 見出し左右の写真は、まわりをぼかして背景になじませている
                'head_l' => ['label' => '見出しの左の写真', 'file' => 'parts/sk-head-l.webp', 'alt' => '', 'size' => [313, 261],
                             'desc' => $note_alpha],
                'head_r' => ['label' => '見出しの右の写真', 'file' => 'classroom2.png', 'alt' => '', 'size' => [317, 248],
                             'desc' => $note_alpha],
                '1' => ['label' => '01 基礎知識',       'file' => 'skills01.png',       'alt' => '基礎知識のテキスト教材'],
                '2' => ['label' => '02 ネイルケア',     'file' => 'skills02.png',       'alt' => 'ネイルケアの実習'],
                '3' => ['label' => '03 マシーンケア',   'file' => 'parts/sk-p3.webp',   'alt' => 'マシーンケアの実習'],
                '4' => ['label' => '04 長さ出し・補強', 'file' => 'parts/sk-p4.webp',   'alt' => '長さ出しの作品例'],
                '5' => ['label' => '05 ネイルアート',   'file' => 'parts/sk-p5.webp',   'alt' => 'カラフルなネイルアート'],
                '6' => ['label' => '06 サロンワーク技術', 'file' => 'skills06.png',     'alt' => 'サロンワーク研修の様子'],
            ],
        ],
        'courses' => [
            'title'    => 'コース内容（写真4枚）',
            'priority' => 270, // LP: 学べる技術 の次
            'size'     => [390, 349], // コースカード内の写真2枚
            'items' => [
                // 見出し左右は背景の上に直接置く飾りなので、透過されていないと成立しない
                'head_l' => ['label' => '見出しの左の写真', 'file' => 'corse_left.png', 'alt' => '', 'size' => [259, 357],
                             'desc' => $note_alpha . '差し替えると、余白を切り詰めた絵柄がそのまま枠に収まる表示に切り替わります。'],
                'head_r' => ['label' => '見出しの右の写真', 'file' => 'corse_right.png', 'alt' => '', 'size' => [351, 355],
                             'desc' => $note_alpha . '差し替えると、余白を切り詰めた絵柄がそのまま枠に収まる表示に切り替わります。'],
                '1' => ['label' => '3ヶ月即戦力コース',   'file' => 'course01.jpg',  'alt' => '3ヶ月即戦力コースの作品例'],
                '2' => ['label' => '9ヶ月じっくりコース', 'file' => 'course02.jpeg', 'alt' => '9ヶ月じっくりコースの作品例'],
            ],
        ],
        'future' => [
            'title'    => '卒業後（写真3枚）',
            'priority' => 290, // LP: 卒業までにできるアート の次
            // PCは横幅だけ揃えて高さは縦横比なり。スマホでは正方形に切り抜かれる
            'items' => [
                '1' => ['label' => '人気サロンへ就職',       'file' => 'parts/fu-p1.webp', 'alt' => 'サロンで施術したネイル', 'size' => [250, 252]],
                '2' => ['label' => '自宅サロン開業',         'file' => 'parts/fu-p2.webp', 'alt' => '自宅サロンでのネイル', 'size' => [250, 303]],
                '3' => ['label' => 'フリーランスとして活躍', 'file' => 'parts/fu-p3.webp', 'alt' => 'フリーランスネイリストの作品', 'size' => [250, 297]],
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
            $args = [
                'label'     => $item['label'],
                'section'   => $section_id,
                'mime_type' => 'image',
            ];
            // 推奨サイズを先に、透過などの個別の注意書きをその下に出す
            $size  = isset($item['size'])  ? $item['size']  : (isset($g['size'])  ? $g['size']  : null);
            $desc  = array_filter([fee_img_size_note($size), isset($item['desc']) ? $item['desc'] : '']);
            if ($desc) {
                $args['description'] = implode('<br>', $desc);
            }
            $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, $setting_id, $args));
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

// その枠が管理画面から差し替えられているか。
// テーマ同梱の写真に合わせて位置や倍率を作り込んである箇所は、差し替え時だけCSSを切り替える。
function fee_img_is_custom($group, $key) {
    $id = (int) get_theme_mod('fee_img_' . $group . '_' . $key, 0);
    return $id > 0 && wp_get_attachment_image_url($id, 'full') !== false;
}

// <img> タグの src / alt をまとめて出力する（テンプレート側を1行に収めるため）
// 使い方: img タグの属性位置で fee_img_attr('features', '1') を呼ぶ
function fee_img_attr($group, $key) {
    $im = fee_img($group, $key);
    echo 'src="' . esc_url($im['url']) . '" alt="' . esc_attr($im['alt']) . '"';
}

// =====================================================================
// よくある質問（Q&A）のWordPress管理
// 管理画面の「よくある質問」から登録・編集・並べ替え・削除ができる。
// 　タイトル欄 = 質問 / 本文欄 = 回答 / ページ属性の「順序」= 表示順
// バッジの色は表示順に4色を自動で繰り返すので、管理画面での指定は不要。
// =====================================================================

// コード化した時点でLPに載っていた6件。初回だけ投稿として自動登録する（下の seed 関数）。
// 投稿が1件も無い状態でも見出しだけのセクションにならないよう、表示側の予備データも兼ねる。
function fee_faq_default_items() {
    return [
        ['お支払いは分割は可能ですか？', 'はい、分割でのお支払いも対応しています。例えば24分割なら月4,000円(税込)〜お支払いも可能です。詳細はお問い合わせください。'],
        ['追加料金はかかりますか？', '基本的なコース費用以外に追加料金はかかりません。ただしオプションコースを受講される場合と道具購入の場合は別途費用がかかります。'],
        ['欠席するとどうなりますか？', '欠席された場合、振替授業の対応もしています。事前にご連絡頂ければ、別の日程で受講することも可能です。'],
        ['全くの初心者ですが大丈夫ですか？', 'はい、全くの初心者でも大丈夫です。基礎から丁寧に指導しますので、安心してご受講ください。'],
        ['持っている道具を使っても大丈夫ですか？', 'はい、ご自身でお持ちの道具を使用して頂いても問題ありません。ただし、授業で必要な道具については事前にご確認ください。'],
        ['道具の購入はできますか？', 'はい、アカデミーで推奨する道具の購入も可能です。詳細は入学時にご案内いたします。'],
    ];
}

function fee_register_faq_post_type() {
    register_post_type('fee_faq', [
        'labels' => [
            'name'               => 'よくある質問',
            'singular_name'      => 'よくある質問',
            'menu_name'          => 'よくある質問',
            'all_items'          => 'Q&A一覧',
            'add_new'            => '新規追加',
            'add_new_item'       => 'Q&Aを新規追加',
            'edit_item'          => 'Q&Aを編集',
            'new_item'           => 'Q&Aを新規追加',
            'search_items'       => 'Q&Aを検索',
            'not_found'          => 'Q&Aがまだ登録されていません',
            'not_found_in_trash' => 'ゴミ箱にQ&Aはありません',
        ],
        // 単体ページは作らず、トップページのQ&Aセクションにだけ表示する
        'public'              => false,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 25,
        'menu_icon'           => 'dashicons-editor-help',
        'supports'            => ['title', 'editor', 'page-attributes'],
        'has_archive'         => false,
        'publicly_queryable'  => false,
        'exclude_from_search' => true,
        'rewrite'             => false,
        // 回答は短い文章なので、ブロックエディタではなく従来のエディタで編集する
        'show_in_rest'        => false,
        'capability_type'     => 'post',
    ]);
}
add_action('init', 'fee_register_faq_post_type');

// 既存の6件を初回アクセス時に1回だけ登録する。
// このテーマはFTPアップロードで反映するためインストーラを持てず、ここで初期データを流し込む。
function fee_faq_seed_default_posts() {
    if (get_option('fee_faq_seeded')) {
        return;
    }
    // 途中でエラーが起きても二重登録しないよう、先にフラグを立てる
    update_option('fee_faq_seeded', 1, false);

    // すでに手動で登録済みなら何もしない（ゴミ箱の分も数える）
    $exists = get_posts([
        'post_type'   => 'fee_faq',
        'post_status' => 'any',
        'numberposts' => 1,
        'fields'      => 'ids',
    ]);
    if ($exists) {
        return;
    }
    $order = 1;
    foreach (fee_faq_default_items() as $item) {
        wp_insert_post([
            'post_type'    => 'fee_faq',
            'post_status'  => 'publish',
            'post_title'   => $item[0],
            'post_content' => $item[1],
            'menu_order'   => $order++,
        ]);
    }
}
add_action('init', 'fee_faq_seed_default_posts', 20);

// 表示用のQ&A一覧を返す。戻り値: [ ['q' => 質問, 'a' => 回答HTML], ... ]
// 公開中の投稿のみ。すべて削除するとQ&Aセクション自体が非表示になる。
function fee_faq_items() {
    $posts = get_posts([
        'post_type'   => 'fee_faq',
        'post_status' => 'publish',
        'numberposts' => -1,
        'orderby'     => ['menu_order' => 'ASC', 'date' => 'ASC'],
    ]);
    $items = [];
    foreach ($posts as $p) {
        $items[] = [
            'q' => $p->post_title,
            // the_content フィルタは他プラグインの追記が混ざるため、段落化だけ自前で行う
            'a' => wpautop(do_shortcode($p->post_content)),
        ];
    }
    if (!$items && !get_option('fee_faq_seeded')) {
        // 初期データの登録前（テーマを入れ替えた直後など）はコード内蔵のデータで表示する
        foreach (fee_faq_default_items() as $item) {
            $items[] = ['q' => $item[0], 'a' => wpautop($item[1])];
        }
    }
    return $items;
}

// 管理画面の一覧は「順序」の昇順で並べる（列見出しで並べ替えたときはそちらを優先）
function fee_faq_admin_order($query) {
    if (!is_admin() || !$query->is_main_query()) {
        return;
    }
    if ($query->get('post_type') !== 'fee_faq' || $query->get('orderby')) {
        return;
    }
    $query->set('orderby', ['menu_order' => 'ASC', 'date' => 'ASC']);
}
add_action('pre_get_posts', 'fee_faq_admin_order');

// 一覧に「回答」の抜粋と「順序」を出して、開かなくても中身と並びが分かるようにする
function fee_faq_admin_columns($columns) {
    $new = [];
    foreach ($columns as $key => $label) {
        if ($key === 'title') {
            $new['title']   = '質問';
            $new['fee_a']   = '回答';
        } elseif ($key === 'date') {
            $new['fee_ord'] = '順序';
            $new['date']    = $label;
        } else {
            $new[$key] = $label;
        }
    }
    return $new;
}
add_filter('manage_fee_faq_posts_columns', 'fee_faq_admin_columns');

function fee_faq_admin_column_content($column, $post_id) {
    if ($column === 'fee_a') {
        echo esc_html(wp_trim_words(wp_strip_all_tags(get_post_field('post_content', $post_id)), 40, '…'));
    } elseif ($column === 'fee_ord') {
        echo (int) get_post_field('menu_order', $post_id);
    }
}
add_action('manage_fee_faq_posts_custom_column', 'fee_faq_admin_column_content', 10, 2);

// タイトル欄が「質問」だと分かるようにプレースホルダを差し替える
function fee_faq_title_placeholder($text, $post) {
    return ($post->post_type === 'fee_faq') ? '質問を入力（例：お支払いは分割は可能ですか？）' : $text;
}
add_filter('enter_title_here', 'fee_faq_title_placeholder', 10, 2);

// 編集画面に入力ルールを明記する（本文欄＝回答、並び順＝ページ属性の順序）
function fee_faq_edit_hint($post) {
    if ($post->post_type !== 'fee_faq') {
        return;
    }
    echo '<p style="margin:12px 0 0;color:#555;">上の欄に<strong>質問</strong>、下の欄に<strong>回答</strong>を入力してください。'
       . '表示順は右側「ページ属性」の<strong>順序</strong>（数字が小さいほど上）で決まります。'
       . 'アイコンの色は表示順に合わせて自動で切り替わります。</p>';
}
add_action('edit_form_after_title', 'fee_faq_edit_hint');

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
