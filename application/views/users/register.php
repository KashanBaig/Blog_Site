<?= form_open('users/register'); ?>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-6">
            <div style="color:red"><?= validation_errors(); ?></div>
            <h1 class="text-center"><?= $title; ?></h1>
            <div class="form-group">
                <label>Name</label>
                <input type="name" name="name" value="<?= isset($post_data['name']) ? $post_data['name'] : '' ?>" placeholder="Enter Name" class="form-control">
            </div>
            <div class="form-group">
                <label>Zipcode</label>
                <input type="name" name="zipcode" value="<?= isset($post_data['zipcode']) ? $post_data['zipcode'] : '' ?>" placeholder="Enter zipcode" class="form-control">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="<?= isset($post_data['email']) ? $post_data['email'] : '' ?>" placeholder="Enter Email" class="form-control">
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="username" name="username" value="<?= isset($post_data['username']) ? $post_data['username'] : '' ?>" placeholder="Enter Username" class="form-control">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" value="<?= isset($post_data['password']) ? $post_data['password'] : '' ?>" placeholder="Enter Password" class="form-control">
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="cpassword" value="<?= isset($post_data['cpassword']) ? $post_data['cpassword'] : '' ?>" placeholder="Enter Confirm Password" class="form-control">
            </div>
            <input type="submit" value="Submit" class="btn btn-success btn-block">
        </div>
    </div>
<?= form_close(); ?>