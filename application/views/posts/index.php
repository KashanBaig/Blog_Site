<h2><?= $title ?></h2>
<?php foreach($posts as $post) : ?>
    <h3><?= $post['title']; ?></h3>
    <div class="row">
        <div class="col-md-3">
            <img src="<?= site_url();?>public/assets/images/posts/<?= $post['post_image']; ?>">
        </div>
        <div class="col-md-9">
            <small class="post-date">Psoted on: <?= $post['created_at']; ?> in <strong><?= $post['name']; ?></strong></small><br>
            <?= word_limiter($post['body'], 50); ?>
            <br><br>
            <p><a class="btn btn-secondary" href="<?= base_url('posts/'.$post['slug']); ?>">Read more</a></p>
        </div>
    </div>
    <br><br>
<?php endforeach; ?>
<div class="pagination-links">
    <?= $this->pagination->create_links(); ?>
</div>