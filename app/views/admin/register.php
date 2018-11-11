<?php require APPROOT . '/views/inc/header.php'?>

    <body class="bg-dark">
<div class="container">
    <div class="col-md-6 col-lg-4 mx-auto mt-5">
        <h2 class="text-white">Create an account</h2>
        <p class="text-white-50">Please fill out this form to register</p>
        <form action="<?php echo URLROOT ?>/admin/register" class="form" method="post">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" id="name" name="name" placeholder="Enter Name"  value="<?php echo $data['name']; ?>">
                <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" id="email" name="email" placeholder="Enter Email"  value="<?php echo $data['email']; ?>">
                <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="text" class="form-control <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" id="password" name="password" placeholder="Enter Password">
                <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
            </div>
            <div class="form-group">
                <label for="con_password">Confirm Password</label>
                <input type="text" class="form-control <?php echo (!empty($data['con_password_err'])) ? 'is-invalid' : ''; ?>" id="con_password" name="con_password" placeholder="Confirm Password">
                <span class="invalid-feedback"><?php echo $data['con_password_err']; ?></span>
            </div>
            <div class="row pt-2">
                <div class="col">
                    <input type="submit" class="btn btn-info btn-block" value="Register">
                </div>
                <div class="col">
                    <a href="<?php echo URLROOT ?>/admin/login" class="btn-block btn-light btn">Have Account? Login</a>
                </div>
            </div>
        </form>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'?>