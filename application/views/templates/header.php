<html>
    <head>
        <title>Practice</title>
        <link rel="stylesheet" href="<?= base_url() ?>/public/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>/public/css/style.css">
        <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="<?= base_url(); ?>">ciBlog</a>
                <div class="navbar-collapse collapse show" id="navbarColor02" style="">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url(); ?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url(); ?>about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('posts'); ?>">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('categories'); ?>">Categories</a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <?php if(!$this->session->userdata('logged_in')) : ?>
                            <li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>users/login">Login</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>users/register">Register</a></li>
                        <?php endif; ?>
                        <?php if($this->session->userdata('logged_in')) : ?>
                            <li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>posts/create">Create Post</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>categories/create">Create Category</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>users/logout">Logout</a></li>
                        <?php endif; ?>
                    </ul>
                
                </div>
            </div>
        </nav>
        <br>
        <div class="container">
            <!-- Flash Messages -->
            <?php if($this->session->flashdata('user_registered')): ?>
                <?= '<p class="alert alert-success">'.$this->session->flashdata('user_registered').'</p>';?>
            <?php endif; ?>

            <?php if($this->session->flashdata('post_created')): ?>
                <?= '<p class="alert alert-success">'.$this->session->flashdata('post_created').'</p>';?>
            <?php endif; ?>

            <?php if($this->session->flashdata('category_created')): ?>
                <?= '<p class="alert alert-success">'.$this->session->flashdata('category_created').'</p>';?>
            <?php endif; ?>

            <?php if($this->session->flashdata('post_updated')): ?>
                <?= '<p class="alert alert-success">'.$this->session->flashdata('post_updated').'</p>';?>
            <?php endif; ?>

            <?php if($this->session->flashdata('post_deleted')): ?>
                <?= '<p class="alert alert-success">'.$this->session->flashdata('post_deleted').'</p>';?>
            <?php endif; ?>

            <?php if($this->session->flashdata('login_failed')): ?>
                <?= '<p class="alert alert-danger">'.$this->session->flashdata('login_failed').'</p>';?>
            <?php endif; ?>

            <?php if($this->session->flashdata('user_loggedin')): ?>
                <?= '<p class="alert alert-success">'.$this->session->flashdata('user_loggedin').'</p>';?>
            <?php endif; ?>

            <?php if($this->session->flashdata('user_logged_out')): ?>
                <?= '<p class="alert alert-success">'.$this->session->flashdata('user_logged_out').'</p>';?>
            <?php endif; ?>
            
            <?php if($this->session->flashdata('category_deleted')): ?>
                <?= '<p class="alert alert-success">'.$this->session->flashdata('category_deleted').'</p>';?>
            <?php endif; ?>