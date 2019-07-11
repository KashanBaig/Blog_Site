<h2><?= $title ?></h2>
<div style="color:red"><?= validation_errors(); ?></div>
<?= form_open_multipart('posts/create'); ?>
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" value="<?= isset($post_data['title']) ? $post_data['title'] : '' ?>" autofocus name="title" placeholder="Add Title">
  </div>
  <div class="form-group">
    <label for="body">Body</label>
    <textarea class="form-control" id="editor1" name="body" value="<?= isset($post_data['body']) ? $post_data['body'] : '' ?>" placeholder="Add Body"></textarea>
  </div>
  <div class="form-group">
    <label>Category</label>
    <select name='category_id' class='form-control'>
      <?php foreach($categories as $category) : ?>
        <option value="<?= $category['id']; ?>"><?= $category['name']; ?></option>
      <?php endforeach; ?>
    </select>
  </div>
  <div class="form-group">
    <label>Upload Image</label><br>
    <input type="file" name="userfile" size="20">
  </div>
  <input type="submit" class="btn btn-success" value="Submit">
<?= form_close(); ?>