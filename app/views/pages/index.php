<?php
$lastElement = array_pop($data);
$page = intval($lastElement[0]);
$pages = intval($lastElement[1]);
$id = intval($lastElement[2]);
?>
<?php require APPROOT . '/views/inc/header.php'?>

<body>
<?php require APPROOT . '/views/inc/navbar.php'?>

<div class="container">
    <div class="row">
            <?php if (isset($data)): ?>
                <?php foreach($data as $photo): ?>
        <div class="col-lg-3 col-md-6 mt-5">
            <a href="<?php echo URLROOT ?>/pages/show/<?php echo $photo->id; ?>" target="_blank">
                <img class="img-thumbnail mx-auto img-responsive d-block" src="<?php echo URLROOT ?>/public/uploads/<?php echo $photo->filename; ?>" alt="<?php echo $photo->alternate_text; ?>">
            </a>
        </div>
                <?php endforeach; ?>
            <?php endif; ?>
    </div>
    <nav aria-label="..." class="mt-5">
        <ul class="pagination justify-content-center">
            <li class="page-item <?php echo ($page > 1) ? '' : 'disabled'; ?>">
                <a class="page-link" href="<?php echo URLROOT . '/'; echo ($page > 1) ?  $page - 1 : ''; ?>" tabindex="-1">Previous</a>
            </li>
            <?php for ($i = 1; $i <= $pages; $i++): ?>
                <li class="page-item <?php echo ($id == $i) ? 'active' : ''; ?>"><a class="page-link" href="<?php echo URLROOT . '/' . $i; ?>"><?php echo $i; ?></a></li>
            <?php endfor; ?>
            <li class="page-item <?php echo ($page < $pages) ? '' : 'disabled'; ?>">
                <a class="page-link" href="<?php echo URLROOT . '/'; echo ($page < $pages) ?  $page + 1 : ''; ?>">Next</a>
            </li>
        </ul>
    </nav>


</div>
<?php require APPROOT . '/views/inc/footer.php'?>