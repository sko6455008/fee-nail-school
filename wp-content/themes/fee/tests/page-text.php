<?php
// Run with Local's PHP configuration: php -c /path/to/php.ini wp-content/themes/fee/tests/page-text.php
// Database writes are rolled back; execution is restricted to a local development hostname.
if (PHP_SAPI !== 'cli') { exit; }
require dirname(__DIR__, 4) . '/wp-load.php';
if (!preg_match('/(?:\.local$|^localhost$|^127\.0\.0\.1$)/', wp_parse_url(home_url(), PHP_URL_HOST))) {
    throw new RuntimeException('Run this check only on a local development site.');
}
function fee_test_check($condition, $message) {
    if (!$condition) { throw new RuntimeException($message); }
    echo 'PASS: ' . $message . PHP_EOL;
}
global $wpdb;
$admins = get_users(['role' => 'administrator', 'number' => 1]);
$page_id = fee_text_page_id('legal');
$lp_id = fee_text_page_id();
$wpdb->query('START TRANSACTION');
try {
    $original = get_post_meta($page_id, '_fee_page_text', true);
    $_POST = ['fee_text_fields' => ['legal_manager' => '保存テスト'], 'fee_text_count' => 1];
    wp_set_current_user(0);
    fee_text_save_page($page_id);
    fee_test_check(get_post_meta($page_id, '_fee_page_text', true) === $original, 'Anonymous writes are rejected');
    wp_set_current_user($admins[0]->ID);
    $_POST['fee_text_nonce'] = 'invalid';
    fee_text_save_page($page_id);
    fee_test_check(get_post_meta($page_id, '_fee_page_text', true) === $original, 'Invalid nonce is rejected');
    $_POST['fee_text_nonce'] = wp_create_nonce('fee_text_save_' . $page_id);
    $_POST['fee_text_count'] = 2;
    fee_text_save_page($page_id);
    fee_test_check(get_post_meta($page_id, '_fee_page_text', true) === $original, 'Truncated forms keep existing content');
    $_POST['fee_text_count'] = 1;
    fee_text_save_page($page_id);
    fee_test_check(fee_text_value('legal_manager') === '保存テスト', 'Authorized page field saves and renders');
    $sanitized = fee_text_sanitize_values(['legal_business' => '<b>名前</b><script>alert(1)</script>', 'legal_email' => 'invalid', 'not_a_field' => 'x'], 'legal', ['legal_email' => 'info@example.com']);
    fee_test_check($sanitized['legal_business'] === '名前' && $sanitized['legal_email'] === 'info@example.com' && !isset($sanitized['not_a_field']), 'HTML, unknown fields, and invalid email cannot alter structure or links');
    update_post_meta($page_id, '_fee_page_text', ['legal_manager' => '<img src=x onerror=alert(1)>']);
    ob_start(); fee_text('legal_manager'); $rendered = ob_get_clean();
    fee_test_check(strpos($rendered, '<img') === false && strpos($rendered, '&lt;img') !== false, 'Output is escaped even if stored data was modified outside the editor');
    update_post_meta($page_id, '_fee_page_text', ['legal_manager' => '']);
    fee_test_check(fee_text_value('legal_manager') === '', 'An explicitly empty field stays empty');
    update_post_meta($page_id, '_fee_page_text', ['legal_manager' => '復元する文章']);
    $_POST = [];
    $revision = wp_save_post_revision($page_id);
    fee_test_check(is_int($revision) && $revision > 0, 'Text-only edits have a WordPress revision');
    update_post_meta($page_id, '_fee_page_text', ['legal_manager' => '復元前']);
    wp_restore_post_revision($revision);
    fee_test_check(fee_text_value('legal_manager') === '復元する文章', 'Restoring a revision restores page text');
    update_post_meta($lp_id, '_fee_page_text', ['access_address' => '東京都池袋 テスト住所']);
    ob_start(); get_template_part('template-parts/section-access'); $access = ob_get_clean();
    fee_test_check(strpos($access, '東京都池袋 テスト住所') !== false && strpos($access, rawurlencode('東京都池袋 テスト住所')) !== false, 'Access address and map share the same edited value');
    $faq = get_posts(['post_type' => 'fee_faq', 'post_status' => 'publish', 'numberposts' => 1, 'orderby' => ['menu_order' => 'ASC', 'date' => 'ASC']])[0];
    update_post_meta($lp_id, '_fee_page_text', ['faq_' . $faq->ID . '_question' => '質問テスト', 'faq_' . $faq->ID . '_answer' => "回答1\n\n回答2"]);
    $items = fee_faq_items();
    fee_test_check($items[0]['q'] === '質問テスト' && $items[0]['a'] === "<p>回答1</p>\n<p>回答2</p>\n", 'FAQ text can be edited on the LP page with paragraphs preserved');
    wp_update_post(['ID' => $faq->ID, 'post_title' => '既存画面の質問']);
    $saved = get_post_meta($lp_id, '_fee_page_text', true);
    fee_test_check(!isset($saved['faq_' . $faq->ID . '_question']), 'Existing FAQ editor clears stale page overrides');
} finally {
    $wpdb->query('ROLLBACK');
    wp_cache_flush();
    $_POST = [];
}
echo "All database changes rolled back.\n";
