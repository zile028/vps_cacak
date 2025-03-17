<?php require_once __DIR__ . "/../partials/top.php"; ?>
<?php require_once __DIR__ . "/../partials/sidebar.php"; ?>
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<div class="d-flex align-items-center justify-content-start">
    <a class="btn btn-primary me-3" href="<?php echo referer(); ?>"><i class="mdi mdi-arrow-left"></i></a>
    <h4 class="m-0">УРЕЂИВАЊЕ МЕДИЈА</h4>
</div>
<div class="card container-fluid p-3">
    <div class="row">
        <div class="col-md-6">
            <form class="form gap-2 align-items-center" action="/media/edit/<?php echo $file->id; ?>"
                  method="post">
                <input type="hidden" name="_method" value="patch">
                <div class="col-12 d-flex flex-column align-items-start gap-2">
                    <label for="fileName" style="white-space: nowrap">Назив фајла</label>
                    <input id="fileName" type="text" name="fileName"
                           class="form-control w-100"
                           placeholder="Назив"
                           value="<?php echo $file->fileName; ?>">
                    <button class="btn btn-primary col">САЧУВАЈ</button>
                </div>
            </form>
            <ul class="list-group">
                <li class="list-group-item">Type: <?php echo $file->type; ?></li>
                <li class="list-group-item">Size: <?php sizeInMB($file->size); ?></li>
                <li class="list-group-item">Created at: <?php dateDDMMYYY($file->createdAt); ?></li>
                <li class="list-group-item">Link: <?php uploadPath($file->storeName) ?></li>

            </ul>
        </div>
        <div class="col-md-6">
            <?php if (str_contains($file->mimetype, "image")): ?>
                <img class="img-fluid"
                     src="<?php uploadPath($file->storeName); ?>"
                     alt="<?php echo $file->fileName; ?>"/>
            <?php else: ?>
                <div style="height: 300px; width: 100%; object-fit: cover"
                     class="d-flex justify-content-center align-items-center border-1 border-secondary border">
                    <h3 class="text-uppercase display-7"><?php echo $file->type; ?></h3>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Page Content -->
<!-- ============================================================== -->
<?php require_once __DIR__ . "/../partials/bottom.php"; ?>
