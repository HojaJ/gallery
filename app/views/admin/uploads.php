<?php require APPROOT . '/views/inc/header.php'?>
    <style>
        @media (min-width: 768px){
            .navbar-expand-lg .navbar-nav {
                -ms-flex-direction: column;
                flex-direction: column;
            }
        }
    </style>
    <script src='https://devpreview.tiny.cloud/demo/tinymce.min.js'></script>
    <script>tinymce.init({selector: '#desc'});</script>
    <body class="admin-body-color ">
<?php require APPROOT . '/views/inc/admin_nav.php'?>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col padd-left">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Admin</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-fw fa-table"></i> Uploads</li>
                        </ol>
                    </nav>
                    <?php flash('picture_uploaded'); ?>
                    <h1>Upload your image</h1>
                    <form action="<?php echo URLROOT ?>/admin/uploads" method="post" enctype="multipart/form-data" class="col-md-6 mt-4">
                        <div class="form-group">
                            <label for="title">Picture Title</label>
                            <input type="text" class="form-control <?php echo (!empty($data['title_err'])) ? 'is-invalid': '';?>" id="title" placeholder="Enter title" name="title">
                            <span class="invalid-feedback"><?php echo $data['title_err']; ?></span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name="uploaded_file">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                        <div class="form-group mt-3">
                            <textarea class="form-control" id="desc" placeholder="Enter Description" name="desc"></textarea>
                        </div>
                        <div class="form-group mt-3">
                            <input type="submit" value="Upload" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>




<?php require APPROOT . '/views/inc/footer.php'?>