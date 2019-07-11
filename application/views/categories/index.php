<h2><?= $title ?> </h2>
<ul class="list-group">
<?php foreach($categories as $category) : ?>
    <li class="list-group-item">
        <a href="<?= site_url('/categories/posts/'.$category['id']); ?>">
            <?= $category['name']; ?>
        </a>
        <?php if($this->session->userdata('user_id') == $category['user_id']) : ?>
            <form action="categories/delete/<?= $category['id']; ?>" method="POST" class="cat-delete">
                <input type="submit" class="btn-link text-danger" onclick="return confirm('Are you sure to delete?')" value="[X]">
            </form>
        <?php endif; ?>
    </li>
<?php endforeach; ?>
</ul>