<?php
// 固定ページ専用の編集フォーム。公開側のスタイルやDOMには管理用要素を追加しない。
add_filter('use_block_editor_for_post', function ($use, $post) {
    return fee_text_page_scope($post->ID) ? false : $use;
}, 10, 2);

add_action('load-post.php', function () {
    $post_id = isset($_GET['post']) ? absint($_GET['post']) : absint($_POST['post_ID'] ?? 0);
    if (fee_text_page_scope($post_id)) {
        remove_post_type_support('page', 'editor');
    }
});

add_action('add_meta_boxes_page', function ($post) {
    if (fee_text_page_scope($post->ID)) {
        add_meta_box('fee-page-text', 'ページのテキスト編集', 'fee_text_editor', 'page', 'normal', 'high');
    }
});

add_action('admin_enqueue_scripts', function ($hook) {
    if ($hook !== 'post.php' || !fee_text_page_scope(absint($_GET['post'] ?? 0))) {
        return;
    }
    $dir = get_template_directory();
    $uri = get_template_directory_uri();
    wp_enqueue_style('fee-page-text-admin', $uri . '/assets/css/page-text-admin.css', [], filemtime($dir . '/assets/css/page-text-admin.css'));
    wp_enqueue_script('fee-page-text-admin', $uri . '/assets/js/page-text-admin.js', [], filemtime($dir . '/assets/js/page-text-admin.js'), true);
});

function fee_text_editor($post) {
    $scope = fee_text_page_scope($post->ID);
    $values = get_post_meta($post->ID, '_fee_page_text', true);
    $values = is_array($values) ? $values : [];
    $sections = fee_text_catalog();
    $anchors = ['fv' => 'fv', 'campaign' => 'campaign', 'concept' => 'concept', 'reasons' => 'features',
        'strengths' => 'strengths', 'compare' => 'compare', 'classroom' => 'atmosphere', 'gallery' => 'gallery',
        'skills' => 'skills', 'courses' => 'courses', 'art' => 'art', 'future' => 'future', 'steps' => 'steps',
        'access' => 'access', 'faq' => 'faq', 'sister' => 'sister', 'manga' => 'manga'];
    wp_nonce_field('fee_text_save_' . $post->ID, 'fee_text_nonce');
    ?>
    <div class="fee-editor" data-post-id="<?php echo esc_attr($post->ID); ?>" data-preview-nonce="<?php echo esc_attr(wp_create_nonce('fee_text_preview_' . $post->ID)); ?>">
      <p class="fee-editor-intro">変更したいセクションを開き、文章を入力してください。<strong>「更新」すると公開ページに反映されます。</strong></p>
      <p class="description">色・文字サイズ・画像配置・改行位置は固定されています。色や大きさが違う文字は入力欄を分けています。画像の中の文字は編集対象外です。長い文章に変更すると折り返しが変わるため、更新前にプレビューでご確認ください。</p>
      <div class="fee-editor-tools">
        <label class="screen-reader-text" for="fee-text-search">編集する文章を検索</label>
        <input type="search" id="fee-text-search" placeholder="セクション名・文章で検索" autocomplete="off">
        <button type="button" class="button button-primary" id="fee-text-preview">変更内容をプレビュー</button>
        <button type="button" class="button" id="fee-text-expand">すべて開く</button>
        <button type="button" class="button" id="fee-text-collapse">すべて閉じる</button>
      </div>
      <p id="fee-text-status" role="status" aria-live="polite"></p>
      <p id="fee-text-empty" hidden>一致する文章がありません。</p>
      <?php $section_number = 0;
      foreach ($sections as $section => $group) :
          if (($scope === 'legal') !== ($section === 'legal')) { continue; }
          ++$section_number;
          $blocks = [];
          $last_context = null;
          foreach ($group['fields'] as $key => $field) {
              $context = !empty($field['subsection']) ? $field['subsection'] . ' — ' . $field['context'] : $field['context'];
              if ($context !== $last_context) { $blocks[] = ['context' => $context, 'fields' => []]; }
              $blocks[count($blocks) - 1]['fields'][$key] = $field;
              $last_context = $context;
          }
          ?>
        <details class="fee-text-section" id="fee-section-<?php echo esc_attr($section); ?>"<?php echo $scope === 'legal' ? ' open' : ''; ?>>
          <summary><span class="fee-section-number"><?php echo esc_html(sprintf('%02d', $section_number)); ?></span><span><?php echo esc_html($group['title']); ?></span><span class="fee-section-count"><?php echo count($group['fields']); ?>項目</span></summary>
          <div class="fee-section-body">
            <?php if (isset($anchors[$section])) : ?>
              <p class="fee-section-view"><a href="<?php echo esc_url(get_permalink($post->ID) . '#' . $anchors[$section]); ?>" target="_blank" rel="noopener">公開中のセクションを見る ↗</a></p>
            <?php endif; ?>
            <?php foreach ($blocks as $block) : ?>
              <fieldset class="fee-text-block">
                <legend><?php echo esc_html($block['context']); ?></legend>
                <div class="fee-text-inputs">
                <?php $part = 0;
                foreach ($block['fields'] as $key => $field) :
                    ++$part;
                    $value = array_key_exists($key, $values) ? $values[$key] : $field['default'];
                    $long = $field['type'] === 'paragraph' || mb_strlen($field['default']) > 35;
                    ?>
                  <div class="fee-text-field<?php echo $long ? ' fee-text-wide' : ''; ?>">
                    <label for="fee-field-<?php echo esc_attr($key); ?>"><?php echo count($block['fields']) > 1 ? esc_html($part . '. ') : ''; ?><?php echo esc_html($field['label']); ?></label>
                    <?php if ($long) : ?>
                      <textarea id="fee-field-<?php echo esc_attr($key); ?>" name="fee_text_fields[<?php echo esc_attr($key); ?>]" rows="<?php echo $field['type'] === 'paragraph' ? '4' : '2'; ?>" data-default="<?php echo esc_attr($field['default']); ?>"><?php echo esc_textarea($value); ?></textarea>
                    <?php else : ?>
                      <input type="<?php echo $field['type'] === 'email' ? 'email' : 'text'; ?>" id="fee-field-<?php echo esc_attr($key); ?>" name="fee_text_fields[<?php echo esc_attr($key); ?>]" value="<?php echo esc_attr($value); ?>" data-default="<?php echo esc_attr($field['default']); ?>"<?php echo $field['type'] === 'email' ? ' required' : ''; ?>>
                    <?php endif; ?>
                    <div class="fee-field-help"><span class="fee-field-count"></span><button type="button" class="button-link fee-field-reset">元の文章に戻す</button></div>
                  </div>
                <?php endforeach; ?>
                </div>
              </fieldset>
            <?php endforeach; ?>
            <?php if ($section === 'faq') : ?><p class="description">質問の追加・削除・並び替えは<a href="<?php echo esc_url(admin_url('edit.php?post_type=fee_faq')); ?>">よくある質問の一覧</a>から行えます。既存の質問と回答の文章は、この画面で変更できます。</p><?php endif; ?>
          </div>
        </details>
      <?php endforeach; ?>
      <input type="hidden" name="fee_text_count" value="<?php echo count(fee_text_fields($scope)); ?>">
    </div>
    <?php
}

function fee_text_save_page($post_id) {
    $scope = fee_text_page_scope($post_id);
    if (!$scope || wp_is_post_revision($post_id) || (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        || !current_user_can('edit_post', $post_id) || !isset($_POST['fee_text_nonce'])
        || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['fee_text_nonce'])), 'fee_text_save_' . $post_id)) {
        return;
    }
    $input = isset($_POST['fee_text_fields']) && is_array($_POST['fee_text_fields']) ? wp_unslash($_POST['fee_text_fields']) : [];
    if (!$input || count($input) !== absint($_POST['fee_text_count'] ?? 0)) {
        add_filter('redirect_post_location', function ($url) { return add_query_arg('fee_text_error', 'incomplete', $url); });
        return;
    }
    $values = fee_text_sanitize_values($input, $scope, get_post_meta($post_id, '_fee_page_text', true));
    update_post_meta($post_id, '_fee_page_text', wp_slash($values));
}
add_action('save_post_page', 'fee_text_save_page');

add_action('admin_notices', function () {
    if (isset($_GET['fee_text_error']) && $_GET['fee_text_error'] === 'incomplete') {
        echo '<div class="notice notice-error"><p>文章の送信が完了しなかったため、テキストを保存していません。再読み込みしてからもう一度お試しください。</p></div>';
    }
});

add_action('wp_ajax_fee_text_preview', function () {
    $post_id = absint($_POST['post_id'] ?? 0);
    check_ajax_referer('fee_text_preview_' . $post_id, 'nonce');
    $scope = fee_text_page_scope($post_id);
    if (!$scope || !current_user_can('edit_post', $post_id)) {
        wp_send_json_error(['message' => 'このページを編集する権限がありません。'], 403);
    }
    $input = isset($_POST['fee_text_fields']) && is_array($_POST['fee_text_fields']) ? wp_unslash($_POST['fee_text_fields']) : [];
    if (!$input || count($input) !== absint($_POST['fee_text_count'] ?? 0)) {
        wp_send_json_error(['message' => '文章の送信が完了しませんでした。もう一度お試しください。'], 400);
    }
    $values = fee_text_sanitize_values($input, $scope, get_post_meta($post_id, '_fee_page_text', true));
    $token = strtolower(wp_generate_password(24, false, false));
    set_transient('fee_text_' . get_current_user_id() . '_' . $token, ['post_id' => $post_id, 'values' => $values], 30 * MINUTE_IN_SECONDS);
    wp_send_json_success(['url' => add_query_arg('fee_text_preview', $token, get_permalink($post_id))]);
});

// 既存のQ&A編集画面から変更した場合も、そちらの変更を優先して二重管理を防ぐ。
add_action('save_post_fee_faq', function ($post_id) {
    if (wp_is_post_revision($post_id) || (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)) { return; }
    $page_id = fee_text_page_id();
    $values = get_post_meta($page_id, '_fee_page_text', true);
    if (is_array($values)) {
        unset($values['faq_' . $post_id . '_question'], $values['faq_' . $post_id . '_answer']);
        update_post_meta($page_id, '_fee_page_text', wp_slash($values));
    }
});
