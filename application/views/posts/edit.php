<h2><?= $title ?></h2>
<?= validation_errors(); ?>
<?= form_open('posts/update'); ?>
  <input type="hidden" name="id" value="<?=$post['id']; ?>">
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" value="<?= $post['title']; ?>" class="form-control" name="title">
  </div>
  <div class="form-group">
    <label for="body">Body</label>
    <textarea class="form-control" id="editor1" name="body"><?= $post['body']; ?></textarea>
  </div>
  <div class="form-group">
    <label>Category</label>
    <select name='category_id' class='form-control'>
      <?php foreach($categories as $category) : ?>
        <option value="<?= $category['id']; ?>"><?= $category['name']; ?></option>
      <?php endforeach; ?>
    </select>
  </div>
  <input type="submit" class="btn btn-success" value="Update">
<?= form_close(); ?>