<?php
$tags = explode(',', (string) $req['tags']);
?>

<form class="form">
  <div class="form-group">
    <div class="col-control">
      <?php foreach (wei()->tag()->enabled()->findAll() as $tag) : ?>
        <div class="custom-control custom-checkbox custom-checkbox-success">
          <input class="js-product-tag custom-control-input" type="checkbox" name="tags[]" value="<?= $tag['id'] ?>"
            id="tag-<?= $tag['id'] ?>"
            <?= in_array($tag['id'], $tags) ? 'checked' : '' ?>>
          <label class="custom-control-label" for="tag-<?= $tag['id'] ?>">
            <?= $tag['name'] ?>
          </label>
        </div>
      <?php endforeach ?>
    </div>
  </div>
  <div class="tag-from-group py-2 text-center">
    <button class="js-product-tag-ok btn btn-primary" type="button">确定</button>
    &nbsp;
    <a class="btn btn-secondary"
      href="<?= $url->query(ltrim($req->getPathInfo(), '/'), ['tags' => '']) ?>">取消选择</a>
  </div>
</form>

<?= $block->js() ?>
<script>
  // 选中标签,点击确定
  $('.js-product-tag-ok').click(function () {
    var tags = [];
    $('.js-product-tag:checked').each(function () {
      tags.push($(this).val());
    });
    window.location = window.location + (window.location.href.indexOf('?') == -1 ? '?' : '&') + 'tags='
      + tags.join(',');
  });
</script>
<?= $block->end() ?>
