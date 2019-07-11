<?= form_open('users/login'); ?>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <h1 class="text-center mt-2"> <?= $title; ?>
            <br>
            <div class="form-group">
                <input type="text" placeholder="Enter Username" name="username" class="form-control mt-3" autofocus required>
            </div>
            <div class="form-group">
                <input type="password" placeholder="Enter Password" name="password" class="form-control" required>
            </div>
            <button class="btn btn-success btn-block" type="submit">Login</button>
        </div>
    </div>
<?= form_close(); ?>