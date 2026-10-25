<?php
// 表示用のHTMLには触れず、固定ページのメタデータから文字だけを取得する。
function fee_text_catalog() {
    static $catalog;
    if (isset($catalog)) {
        return $catalog;
    }
    $catalog = json_decode(file_get_contents(__DIR__ . '/page-text-fields.json'), true);
    $posts = get_posts(['post_type' => 'fee_faq', 'post_status' => 'publish', 'numberposts' => -1,
        'orderby' => ['menu_order' => 'ASC', 'date' => 'ASC']]);
    foreach ($posts as $index => $post) {
        $context = '質問 ' . ($index + 1);
        foreach (['question' => $post->post_title, 'answer' => $post->post_content] as $part => $text) {
            $catalog['faq']['fields']['faq_' . $post->ID . '_' . $part] = [
                'label' => $part === 'question' ? '質問' : '回答', 'context' => $context,
                'raw' => $text, 'default' => $part === 'question' ? $text : trim(wp_strip_all_tags($text)),
                'type' => $part === 'question' ? 'text' : 'paragraph',
            ];
        }
    }
    return $catalog;
}

function fee_text_fields($scope = 'lp') {
    $fields = [];
    foreach (fee_text_catalog() as $section => $group) {
        if (($scope === 'legal') === ($section === 'legal')) {
            $fields += $group['fields'];
        }
    }
    return $fields;
}

function fee_text_page_id($scope = 'lp') {
    return (int) get_option($scope === 'legal' ? 'fee_legal_text_page_id' : 'fee_lp_text_page_id', 0);
}

function fee_text_page_scope($post_id) {
    if ((int) $post_id === fee_text_page_id('lp') && $post_id) {
        return 'lp';
    }
    if ((int) $post_id === fee_text_page_id('legal') && $post_id) {
        return 'legal';
    }
    return '';
}

// 既存のトップページ設定があればその固定ページを使う。未設定ならLP用に一度だけ作成する。
// テーマをFTPで反映する運用のため、テーマ切替時だけでなく初回アクセス時にも実行する。
function fee_text_prepare_pages() {
    if (!get_option('fee_lp_text_page_id')) {
        $page_id = get_option('show_on_front') === 'page' ? (int) get_option('page_on_front') : 0;
        if (!$page_id) {
            $page = get_page_by_path('fee-lp');
            $page_id = $page ? $page->ID : wp_insert_post([
                'post_type' => 'page', 'post_status' => 'publish', 'post_name' => 'fee-lp',
                'post_title' => 'LP（トップページ）', 'post_content' => '',
                'comment_status' => 'closed', 'ping_status' => 'closed',
            ], true);
            if (!is_wp_error($page_id) && $page_id) {
                update_option('show_on_front', 'page');
                update_option('page_on_front', $page_id);
            }
        }
        if (!is_wp_error($page_id) && $page_id) {
            update_option('fee_lp_text_page_id', (int) $page_id, false);
        }
    }
    if (!get_option('fee_legal_text_page_id')) {
        $page = get_page_by_path('legal');
        if ($page) {
            update_option('fee_legal_text_page_id', $page->ID, false);
        }
    }
}
add_action('init', 'fee_text_prepare_pages', 25);

// 旧名称のまま保存された初期値も一度だけ更新する。独自の文章やカード明細名は維持。
function fee_text_restore_fee_brand() {
    if (get_option('fee_brand_restored_v1')) {
        return;
    }
    $old_values = [
        'header_001' => 'Ica',
        'header_002' => '池袋キャリアアカデミー',
        'fv_008' => '池袋キャリアアカデミー',
        'fv_009' => 'Ica',
        'concept_009' => 'Ica',
        'concept_010' => '池袋キャリアアカデミー',
        'reasons_005' => 'ICA 池袋キャリアアカデミー が選ばれる',
        'strengths_001' => 'ICA 池袋キャリアアカデミー が選ばれる理由',
        'compare_001' => 'Ica',
        'compare_002' => '池袋',
        'compare_003' => 'キャリアアカデミー',
        'future_003' => 'ICA 池袋キャリアアカデミー を卒業すると...',
        'access_004' => 'ICA',
        'access_005' => '池袋',
        'access_006' => 'キャリアアカデミー',
        'footer_001' => 'ICA 池袋キャリアアカデミー',
        'legal_business' => 'ICA池袋キャリアアカデミー',
    ];
    foreach (['lp', 'legal'] as $scope) {
        $page_id = fee_text_page_id($scope);
        if (!$page_id) {
            return; // 固定ページの準備が終わるまで完了扱いにしない。
        }
        $values = get_post_meta($page_id, '_fee_page_text', true);
        if (!is_array($values)) {
            continue;
        }
        $updated = $values;
        foreach (fee_text_fields($scope) as $key => $field) {
            if (isset($old_values[$key], $values[$key]) && $values[$key] === $old_values[$key]) {
                $updated[$key] = $field['default'];
            }
        }
        if ($updated !== $values && !update_post_meta($page_id, '_fee_page_text', wp_slash($updated))) {
            return;
        }
    }
    $name = get_option('blogname', '');
    $restored_name = strtr($name, [
        'ICA 池袋キャリアアカデミー' => 'Fee Nail Academy',
        'ICA池袋キャリアアカデミー' => 'Fee Nail Academy',
        'Ica 池袋キャリアアカデミー' => 'Fee Nail Academy',
        'Ica池袋キャリアアカデミー' => 'Fee Nail Academy',
        '池袋キャリアアカデミー' => 'Fee Nail Academy',
    ]);
    if (in_array($name, ['ICA', 'Ica'], true)) {
        $restored_name = 'Fee Nail Academy';
    }
    if ($restored_name !== $name && !update_option('blogname', $restored_name)) {
        return;
    }
    update_option('fee_brand_restored_v1', 1, false);
}
add_action('init', 'fee_text_restore_fee_brand', 30);

// ページ名やスラッグを編集しても専用の表示を維持する。
add_filter('template_include', function ($template) {
    $scope = fee_text_page_scope(get_queried_object_id());
    return $scope ? get_template_directory() . ($scope === 'legal' ? '/page-legal.php' : '/index.php') : $template;
});

function fee_text_values($scope = 'lp') {
    $post_id = fee_text_page_id($scope);
    $preview = fee_text_preview_values($post_id);
    if (is_array($preview)) {
        return $preview;
    }
    $values = $post_id ? get_post_meta($post_id, '_fee_page_text', true) : [];
    return is_array($values) ? $values : [];
}

function fee_text_field($key) {
    static $fields;
    if (!isset($fields)) {
        $fields = fee_text_fields('lp') + fee_text_fields('legal');
    }
    return $fields[$key] ?? null;
}

function fee_text_value($key) {
    $field = fee_text_field($key);
    if (!$field) {
        return '';
    }
    $values = fee_text_values(strpos($key, 'legal_') === 0 ? 'legal' : 'lp');
    return array_key_exists($key, $values) ? (string) $values[$key] : $field['default'];
}

function fee_text($key) {
    $field = fee_text_field($key);
    if (!$field) {
        return;
    }
    $value = fee_text_value($key);
    // 未変更の文字は元のエンティティや空白まで維持する。管理画面の入力値は必ずエスケープ。
    echo $value === $field['default'] ? $field['raw'] : esc_html($value);
}

function fee_text_sanitize_values($input, $scope, $previous = []) {
    $values = is_array($previous) ? $previous : [];
    foreach (fee_text_fields($scope) as $key => $field) {
        if (!isset($input[$key]) || !is_string($input[$key])) {
            continue; // 欠けたフィールドで既存の文章を消さない。
        }
        $value = $field['type'] === 'paragraph' ? sanitize_textarea_field($input[$key]) : sanitize_text_field($input[$key]);
        if ($field['type'] === 'email' && !is_email($value)) {
            continue; // メールアドレスの誤入力でリンクを壊さない。
        }
        $values[$key] = $value;
    }
    return $values;
}

add_action('init', function () {
    register_post_meta('page', '_fee_page_text', [
        'type' => 'object', 'single' => true, 'show_in_rest' => false, 'revisions_enabled' => true,
        'auth_callback' => function ($allowed, $key, $post_id) { return current_user_can('edit_post', $post_id); },
    ]);
});

// プレビューは編集者本人だけに表示し、公開中の文章は更新しない。
function fee_text_preview_values($post_id) {
    static $cache = [];
    if (array_key_exists($post_id, $cache)) {
        return $cache[$post_id];
    }
    $cache[$post_id] = null;
    if (!$post_id || empty($_GET['fee_text_preview']) || !is_user_logged_in() || !current_user_can('edit_post', $post_id)) {
        return null;
    }
    $token = sanitize_key(wp_unslash($_GET['fee_text_preview']));
    $preview = get_transient('fee_text_' . get_current_user_id() . '_' . $token);
    if (is_array($preview) && (int) $preview['post_id'] === $post_id) {
        $cache[$post_id] = $preview['values'];
    }
    return $cache[$post_id];
}

add_action('template_redirect', function () {
    if (is_array(fee_text_preview_values(get_queried_object_id()))) {
        if (!defined('DONOTCACHEPAGE')) {
            define('DONOTCACHEPAGE', true);
        }
        nocache_headers();
        add_filter('wp_robots', 'wp_robots_no_robots');
    }
});

require_once __DIR__ . '/page-text-admin.php';
