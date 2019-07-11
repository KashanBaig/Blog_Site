<br>
<h2> <?= $post['title']; ?></h2>
<img src="<?= site_url();?>public/assets/images/posts/<?= $post['post_image']; ?>">
<small class="post-date">Posted on: <?= $post['created_at']; ?> </small><br>
<div class="post-body">
    <?= $post['body']; ?>
</div>
<br>
<?php if($this->session->userdata('user_id') == $post['user_id']) : ?>
    <div class="row">
        <div class="col-sm-1">
            <a class="btn btn-warning btn-block" href="edit/<?= $post['slug']; ?>">Edit</a>
        </div>
        <?= form_open('posts/delete/'.$post['id']); ?>
            <input type="submit" value="Delete" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger">
        </form>
    </div>
<?php endif; ?>
<h3>Comments</h3>
<?php if($comments) : ?>
    <?php foreach($comments as $comment) : ?>
        <div class="card card-body bg-light">
            <h5><?= $comment['body']; ?>  [by <strong><?= $comment['name']; ?></strong>]</h5>
        </div><br>
<?php endforeach; ?>
<?php else : ?>
    <p>No comments to display.</p>
<?php endif; ?>
<h3>Add Comments</h3>
<?= validation_errors(); ?>
<?= form_open('comments/create/'.$post['id']); ?>
    <div class="form-group">
        <label>Name</label>
        <input type="name" name="name" class="form-control"> 
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" class="form-control"> 
    </div>
    <div class="form-group">
        <label>Body</label>
        <textarea type="text" name="body" class="form-control"></textarea>
    </div>
    <input type="hidden" name="slug" value="<?= $post['slug']; ?>">
    <input class="btn btn-success" type="submit" name="Submit">
</form>

