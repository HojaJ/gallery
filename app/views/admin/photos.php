<?php require APPROOT . '/views/inc/header.php'?>
    <style>
        @media (min-width: 768px){
            .navbar-expand-lg .navbar-nav {
                -ms-flex-direction: column;
                flex-direction: column;
            }
        }
    </style>
    <body class="admin-body-color ">
<?php require APPROOT . '/views/inc/admin_nav.php'?>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col padd-left">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo URLROOT ?>/admin">Admin</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-user"></i> Photos</li>
                        </ol>
                    </nav>
                    <h1>Your Photos</h1>
                    <?php flash('photo_deleted'); ?>
                    <?php flash('update_success');?>
                    <table class="table">
                        <thead class="thead-light">
                        <tr>
                            <th>Photo</th>
                            <th>id</th>
                            <th>FileName</th>
                            <th class="d-none d-md-block">Title</th>
                            <th>Comments</th>
                            <th>Size</th>
                            <th class="d-none d-lg-block">Uploaded At</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(array_key_exists(0, $data)):?>
                        <?php foreach ($data as $photo): ?>
                        <tr>
                            <td>
                                <img class="img-thumbnail img-responsive d-block" src="<?php echo URLROOT ?>/public/uploads/<?php echo $photo->filename; ?>" alt="<?php echo $photo->alternate_text; ?>">
                                <a href="<?php echo URLROOT ?>/admin/deletephoto/<?php echo $photo->id; ?>">Delete</a>
                                <a href="<?php echo URLROOT ?>/admin/editphoto/<?php echo $photo->id; ?>">Edit</a>
                                <a href="<?php echo URLROOT ?>/pages/show/<?php echo $photo->id; ?>" target="_blank">Show</a>
                            </td>
                            <th scope="row"><?php echo $photo->id; ?></th>
                            <td><?php echo $photo->filename; ?></td>
                            <td class="d-none d-md-block"><?php echo $photo->title; ?></td>
                            <td><?php echo $photo->size; ?></td>
                            <td><?php echo formatSizeUnits($photo->size); ?></td>
                            <td class="d-none d-lg-block"><?php echo $photo->uploaded_at; ?></td>
                        </tr>
                        <?php endforeach; ?>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>




<?php require APPROOT . '/views/inc/footer.php'?>