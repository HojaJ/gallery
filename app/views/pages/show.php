<?php require APPROOT . '/views/inc/header.php'?>

<body>
<?php require APPROOT . '/views/inc/navbar.php'?>

<div class="container">
    <div class="row mt-2">
        <div class="col-md-9">
            <?php $photo = $data[0]; if (isset($data[1])){ $comments = $data[1];} ?>
            <div class="d-flex justify-content-between">
                <a class="page-link" href="<?php echo URLROOT ?>/pages/show/<?php echo ($photo->id > 1) ? $photo->id - 1 : 1; ?>">
                    <i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;Older
                </a>
                <a class="page-link" href="<?php echo URLROOT ?>/pages/show/<?php echo ($photo->id < 8) ? $photo->id + 1 : $photo->id; ?>">
                    Newer&nbsp;<i class="fa fa-arrow-right" aria-hidden="true"></i>
                </a>
            </div>
            <h1><?php  echo $photo->title; ?></h1>
            <img class="img-thumbnail img-show d-block" src="<?php echo URLROOT ?>/public/uploads/<?php echo $photo->filename; ?>" alt="<?php echo $photo->alternate_text; ?>">
            <p class="img-show"><?php echo $photo->description; ?></p>
            <?php if (isset($comments)): ?>
                <h2>Comments</h2>
                <hr>
                <?php foreach($comments as $comment): ?>
                    <div class="mt-5"></div>
                    <div class="media">
                        <img class="d-flex mr-3" src="https://via.placeholder.com/50" alt="Generic placeholder image">
                        <div class="media-body">
                            <h5 class="mt-0"><?php echo $comment->author; ?></h5>
                            <small class="text-black-50 d-block"><?php echo $comment->created_at; ?></small>
                            <?php echo $comment->body; ?>
                            <hr>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>

            <form action="<?php echo URLROOT ?>/admin/addcomment" method="post" class="img-show">
                <input name="photo_id" type="hidden" value="<?php echo $photo->id; ?>">
                <div class="form-group">
                    <label for="author">Comment</label>
                    <input type="text" class="form-control" id="author" placeholder="Author" name="author">
                </div>
                <div class="form-group mt-3">
                    <textarea class="form-control" placeholder="Comment" name="comment"></textarea>
                </div>
                <div class="form-group mt-3">
                    <input type="submit" value="Submit" class="btn btn-success">
                </div>
            </form>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Search Blog</h4>
                    <form class="form-inline">
                        <div class="input-group">
                            <input type="text" class="form-control" aria-describedby="button-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card mt-2">
                <div class="card-body">
                    <h4 class="card-title">Blog Categories</h4>
                    <div class="flex justify-content-around flex-row flex-wrap">
                        <a class="badge badge-info" href="#">
                            <i class="fa fa-tag" aria-hidden="true"></i></i>&nbsp;Categories
                        </a>
                        <a class="badge badge-info" href="#">
                            <i class="fa fa-tag" aria-hidden="true"></i></i>&nbsp;Categories
                        </a>
                        <a class="badge badge-info" href="#">
                            <i class="fa fa-tag" aria-hidden="true"></i></i>&nbsp;Categories
                        </a>
                        <a class="badge badge-info" href="#">
                            <i class="fa fa-tag" aria-hidden="true"></i></i>&nbsp;Categories
                        </a>
                        <a class="badge badge-info" href="#">
                            <i class="fa fa-tag" aria-hidden="true"></i></i>&nbsp;Categories
                        </a>
                    </div>
                </div>
            </div>
            <div class="card mt-2">
                <div class="card-body">
                    <h4 class="card-title">Site Widget</h4>
                    <p class="card-text">
                        Some quick example text to build on the card title
                        and make up the bulk of the card's content.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'?>
