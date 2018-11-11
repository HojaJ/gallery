<?php require APPROOT . '/views/inc/header.php'?>

<body class="bg-dark">
    <div class="container">
        <div class="col-md-6 col-lg-4 mx-auto mt-5">
            <?php flash('register_success'); ?>
            <h2 class="text-white">Login</h2>
            <p class="text-white-50">Please fill out this form to Login</p>
            <form action="<?php echo URLROOT ?>/admin/login" class="login" method="post">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" id="email" name="email" placeholder="Enter Email">
                    <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" class="form-control <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" id="password" name="password" placeholder="Enter Password">
                    <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
                </div>
                <div class="row pt-2">
                    <div class="col">
                        <input type="submit" class="btn btn-info btn-block" value="Login">
                    </div>
                    <div class="col">
                        <a href="<?php echo URLROOT ?>/admin/register" class="btn-block btn-light btn">No account? Register</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

<?php require APPROOT . '/views/inc/footer.php'?>



