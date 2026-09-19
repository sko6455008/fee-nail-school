(function () {
  'use strict';
  var editor = document.querySelector('.fee-editor');
  if (!editor) return;
  var form = editor.closest('form');
  var fields = Array.from(editor.querySelectorAll('[data-default]'));
  var sections = Array.from(editor.querySelectorAll('.fee-text-section'));
  var status = document.getElementById('fee-text-status');
  var dirty = false;
  fields.forEach(function (input) {
    input.dataset.saved = input.value;
    function refresh() {
      var field = input.closest('.fee-text-field');
      var count = Array.from(input.value).length;
      var original = Array.from(input.dataset.default).length;
      field.classList.toggle('is-changed', input.value !== input.dataset.saved);
      field.classList.toggle('is-long', count > Math.max(original * 1.5, original + 10));
      field.querySelector('.fee-field-count').textContent = count + '文字 ／ 元の文章 ' + original + '文字';
      dirty = fields.some(function (item) { return item.value !== item.dataset.saved; });
    }
    input.addEventListener('input', refresh);
    input.closest('.fee-text-field').querySelector('.fee-field-reset').addEventListener('click', function () {
      input.value = input.dataset.default;
      refresh();
      input.focus();
    });
    refresh();
  });
  form.addEventListener('submit', function () { dirty = false; });
  window.addEventListener('beforeunload', function (event) {
    if (dirty) { event.preventDefault(); event.returnValue = ''; }
  });
  document.getElementById('fee-text-expand').addEventListener('click', function () { sections.forEach(function (s) { s.open = true; }); });
  document.getElementById('fee-text-collapse').addEventListener('click', function () { sections.forEach(function (s) { s.open = false; }); });
  document.getElementById('fee-text-search').addEventListener('input', function (event) {
    var query = event.target.value.toLocaleLowerCase().trim();
    var found = false;
    sections.forEach(function (section) {
      var titleMatch = section.querySelector('summary').textContent.toLocaleLowerCase().includes(query);
      var any = false;
      section.querySelectorAll('.fee-text-block').forEach(function (block) {
        var text = block.textContent + ' ' + Array.from(block.querySelectorAll('[data-default]')).map(function (input) { return input.value; }).join(' ');
        var match = !query || titleMatch || text.toLocaleLowerCase().includes(query);
        block.hidden = !match;
        any = any || match;
      });
      section.hidden = !any;
      if (query && any) section.open = true;
      found = found || any;
    });
    document.getElementById('fee-text-empty').hidden = found;
  });
  var busy = false;
  async function preview(event) {
    if (event) { event.preventDefault(); event.stopImmediatePropagation(); }
    if (busy || !form.reportValidity()) return;
    var popup = window.open('about:blank', '_blank');
    if (!popup) { status.textContent = 'プレビューを開くため、このサイトのポップアップを許可してください。'; return; }
    popup.opener = null;
    busy = true;
    status.textContent = 'プレビューを準備しています…';
    var data = new FormData();
    data.set('action', 'fee_text_preview');
    data.set('post_id', editor.dataset.postId);
    data.set('nonce', editor.dataset.previewNonce);
    data.set('fee_text_count', String(fields.length));
    fields.forEach(function (input) { data.append(input.name, input.value); });
    try {
      var response = await fetch(window.ajaxurl, {method: 'POST', credentials: 'same-origin', body: data});
      var result = await response.json();
      if (!response.ok || !result.success) throw new Error(result.data && result.data.message || 'プレビューを作成できませんでした。');
      popup.location.href = result.data.url;
      status.textContent = '別タブでプレビューを開きました。公開ページはまだ変更されていません。';
    } catch (error) {
      popup.close();
      status.textContent = error.message + ' 入力内容はこの画面に残っています。';
    } finally { busy = false; }
  }
  document.getElementById('fee-text-preview').addEventListener('click', preview);
  var nativePreview = document.getElementById('post-preview');
  if (nativePreview) nativePreview.addEventListener('click', preview, true);
}());
