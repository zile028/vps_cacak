<?php require_once __DIR__ . "/../partials/top.php"; ?>
<?php require_once __DIR__ . "/../partials/sidebar.php"; ?>

    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <h4>ДОДАВАЊЕ ВЕСТИ</h4>
    <!-- ============================================================== -->
    <!-- Sales Cards  -->
    <!-- ============================================================== -->
<?php require_once "navbar.php" ?>
    <!-- ============================================================== -->
    <!-- Sales chart -->
    <!-- ============================================================== -->
<?php if (isset($error) && count($error) > 0): ?>
    <div class="card p-2">
        <ul class="list-group">
            <?php foreach ($error as $err) : ?>
                <li class="list-group-item list-group-item-danger"><?php echo $err; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>


    <!-- ============================================================== -->
    <!-- Start form -->
    <!-- ============================================================== -->
    <div class="card">
        <form class="card-body" action="/dashboard/news/add" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <h4>Српски</h4>
                    <div class="card">
                        <div class="form-group flex-lg-grow-1 col-sm">
                            <label for="fname" class="control-label col-form-label">Наслов</label>
                            <div class="col-12">
                                <input
                                        type="text"
                                        class="form-control"
                                        id="fname"
                                        placeholder="Наслов"
                                        name="srb[naslov]"
                                        value="<?php echo $naslov ?? '' ?>"
                                />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-12 control-label
                    col-form-label">Вест</label>
                            <?php quillEditor("", "srb[description]"); ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <h4>Енглески</h4>
                    <div class="card">
                        <div class="form-group flex-lg-grow-1 col-sm">
                            <label for="fname" class="control-label col-form-label">Наслов</label>
                            <div class="col-12">
                                <input
                                        type="text"
                                        class="form-control"
                                        id="fname"
                                        placeholder="Наслов"
                                        name="en[naslov]"
                                        value="<?php echo $naslov ?? '' ?>"
                                />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-12 control-label
                    col-form-label">Вест</label>

                            <?php quillEditor("", "en[description]"); ?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php if ($canAtachFile): ?>
                    <div id="fileSelector" class="attachment col-md-6">
                        <label class="btn btn-warning" for="attachment">Додај документ</label>
                        <input id="attachment" class="d-none" type="file" name="attachment[]"
                               multiple>
                    </div>
                <?php endif; ?>
                <div class="d-flex col-md-6 gap-3">
                    <div class="col-md-6 border border-dark p-1" style="height: 200px">
                        <a id="imagePreviewA" href="<?php uploadPath($media[0]->storeName); ?>" target="_blank">
                            <img id="imagePreview" class="h-100 w-100" style="object-fit: contain"
                                 src="<?php uploadPath($media[0]->storeName); ?>"
                                 alt="featured image">
                        </a>
                    </div>

                    <div class="col-md-6">
                        <label for="featuredImage">Насловна слика</label>
                        <?php if (count($media) > 0): ?>
                            <select id="featuredImage" class="form-control select2" data-image="preview"
                                    name="featured_imageID">
                                <?php foreach ($media as $image) : ?>
                                    <option value="<?php echo $image->id; ?>"
                                            data-storeName="<?php uploadPath($image->storeName); ?>">
                                        <?php echo $image->fileName; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        <?php else: ?>
                            <p class="text-danger fw-bold">
                                Насловна слика је обавезна, додајте је
                                прво у медијима како би сте је овде могли одабрати.
                            </p>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="col-md-6">
                    <button class="btn btn-primary">Додај вест</button>
                </div>
            </div>

        </form>
    </div>
    <!-- ============================================================== -->
    <!-- End form -->
    <!-- ============================================================== -->


    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
<?php require_once __DIR__ . "/../partials/bottom.php"; ?>