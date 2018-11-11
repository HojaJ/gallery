<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="<?php echo URLROOT ?>"><?php echo SITENAME ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT ?>/pages/about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT ?>/admin/index">Admin</a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="<?php echo URLROOT ?>/admin/logout">Logout</a>
                    </li>
                <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link text-white" href="<?php echo URLROOT ?>/admin/register">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="<?php echo URLROOT ?>/admin/login">Login</a>
                </li>
                <?php endif; ?>
            </ul>

        </div>
    </div>
</nav>