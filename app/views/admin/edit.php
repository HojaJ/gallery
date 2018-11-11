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
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
                <h1>Edit your image</h1>
                <form action="<?php echo URLROOT ?>/admin/editphoto/<?php echo $data->id; ?>" method="post">
                    <div class="row">
                        <div class="col-md-8 mt-4">
                            <div class="form-group">
                                <label for="title">Picture Title</label>
                                <input type="text" class="form-control" id="title" placeholder="Enter title" name="title" value="<?php echo $data->title; ?>">
                            </div>
                            <div class="form-group">
                                <a href="#">
                                    <img class="img-thumbnail img-responsive" src="<?php echo URLROOT ?>/public/uploads/<?php echo $data->filename; ?>" alt="<?php echo $data->alternate_text; ?>">
                                </a>
                            </div>
                            <div class="form-group">
                                <label for="caption">Picture Caption</label>
                                <input type="text" class="form-control" id="caption" placeholder="Enter Caption"  name="caption" value="<?php echo $data->caption; ?>">
                            </div>
                            <div class="form-group">
                                <label for="alt_text">Alternate Text</label>
                                <input type="text" class="form-control" id="alt_text" placeholder="Enter Alternate" name="alt_text" value="<?php echo $data->alternate_text; ?>">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" id="desc" placeholder="Enter Description" name="desc"><?php echo $data->description; ?></textarea>
                            </div>
                        </div>

                        <div class="col-md-4 mt-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Save</h4>
                                    <p class="card-text"><i class="fa fa-calendar" aria-hidden="true"></i> Uploaded on:
                                        <strong><?php echo $data->uploaded_at; ?></strong></p>
                                    <p class="card-text">Photo Id: <strong><?php echo $data->id; ?></strong></p>
                                    <p class="card-text">FileName: <strong><?php echo $data->filename; ?></strong></p>
                                    <p class="card-text">File Type: <strong><?php echo $data->type; ?></strong></p>
                                    <p class="card-text">File Size:
                                        <strong><?php echo formatSizeUnits($data->size); ?></strong></p>
                                    <a href="<?php echo URLROOT ?>/admin/deletephoto/<?php echo $data->id; ?>"
                                       class="btn btn-danger">Delete</a>
                                    <input type="submit" class="btn btn-success" value="Update">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php require APPROOT . '/views/inc/footer.php'?>