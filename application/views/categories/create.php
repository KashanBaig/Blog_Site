<h2><?= $title; ?></h2>

<div style="color:red"><?= validation_errors(); ?></div>
<?= form_open_multipart('categories/create') ?>

    <div class="form-goup">
        <label>Category Name</label>
        <input type="text" name="name" autofocus class="form-control" placeholder="Enter Name">
    </div>
    <br>
    <input type="submit" value="Submit" class="btn btn-success">
<?= form_close(); ?>